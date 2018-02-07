<?php
$start = microtime(true);
require("ajax/functions.php");
$sql = mysqli_query($con, "SELECT * FROM markets WHERE starttime + duration <= '" . time() . "'");
echo "Processing finished markets..\n";
while ($data = mysqli_fetch_array($sql)) {
    echo "Market ID: " . $data['id'] . "\n";
    mysqli_query($con, "START TRANSACTION");
    $totalsql = mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM bets WHERE marketid='$data[id]'");
    if (!$totalsql) {
        mysqli_query($con, "ROLLBACK");
        die("Error while reading total amounts, exiting");
    }
    $totaldata    = mysqli_fetch_array($totalsql);
    $totaldown    = $totaldata['down'];
    $totalup      = $totaldata['up'];
    $currentPrice = priceGet($data['pair']);
    if ($data['startprice'] > $currentPrice)
        $winner = "down";
    elseif ($data['startprice'] < $currentPrice)
        $winner = "up";
    else
        $winner = "refund";
    $total    = ($totaldown + $totalup) / 100 * 95; //commission rate: %5
    $multiply = $total / ($winner == "refund" ? $total : ($winner == "down" ? $totaldown : $totalup));
    echo "Total down amount: $totaldown\n";
    echo "Total up amount: $totalup\n";
    echo "Total amount (commissioned): $total\n";
    echo "Winner: $winner\n";
    echo "Winner multiply amount (commissioned_total / winner_total): $multiply\n";
    $betssql = mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM bets WHERE marketid='$sql'");
    while ($betdata = mysqli_fetch_array($betsql)) {
        echo "Processing bet $betdata[id]..\n";
        if ($winner == $betdata['direction'] || $winner == "refund") {
            $add = ($betdata['amount'] * $multiply);
            echo "Winner, add $add BTC to user $betdata[userid]..\n";
            mysqli_query($con, "UPDATE users SET balance=balance+'" . $add . "' WHERE id='$betdata[userid]'");
            if (!mysqli_affected_rows($con)) {
                mysqli_query($con, "ROLLBACK");
                die("Error while updating user balance (user id = $betdata[userid]), exiting");
            }
        } else {
            echo "Loser, not updating\n";
        }
        if (!mysqli_query($con, "INSERT INTO archivedBets (amount, target, profit, pair, userid, marketid, direction, date) VALUES ('$betdata[amount]', '" . ($add - $betdata['amount']) . "', '$data[pair]', '$betdata[userid]', '$data[id]', '$betdata[direction]', '$betdata[date]')")) {
            mysqli_query($con, "ROLLBACK");
            die("Error while moving to archive");
        }
        mysqli_query($con, "DELETE FROM bets WHERE id='$betdata[id]'");
        if (!mysqli_affected_rows($con)) {
            mysqli_query($con, "ROLLBACK");
            die("Error while deleting bet");
        }
        echo "Bet processed\n";
    }
    if (!mysqli_query($con, "INSERT INTO archivedMarkets (pair, starttime, startprice, finishprice, duration) VALUES ('$data[pair]', '$data[starttime]', '$data[startprice]', '$currentPrice', '$data[duration]')")) {
        mysqli_query($con, "ROLLBACK");
        die("Error while moving to archive");
    }
    mysqli_query($con, "DELETE FROM markets WHERE id='$data[id]'");
    if (!mysqli_affected_rows($con)) {
        mysqli_query($con, "ROLLBACK");
        die("Error while deleting market");
    }
    echo "Market finished, committing..\n\n";
    mysqli_query($con, "COMMIT");
}
echo "\nFinished processing all bets\n\n";
echo "Starting markets..\n";
$sql = mysqli_query($con, "SELECT * FROM markets WHERE starttime >= '" . time() . "' AND startprice='0'");
while ($data = mysqli_fetch_array($sql)) {
    $currentPrice = priceGet($data['pair']);
    if (!mysqli_query($con, "UPDATE markets SET startprice='$currentprice' WHERE id='$data[id]'"));
    die("Updating market start price failed, current price: $currentprice, id: $data[id]");
}
echo "\nDone\n\n";
echo "Refreshing retrieveMarkets.php\n";
$json = array(
    "success" => true,
    "markets" => array()
);
$sql  = mysqli_query($con, "SELECT * FROM markets WHERE starttime + duration >= '" . time() . "'");
while ($data = mysqli_fetch_array($sql)) {
    $currentPrice      = priceGet($data['pair']);
    $totaldata         = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM bets WHERE marketid='$data[id]'"));
    $total             = ($totaldata['down'] + $totaldata['up']);
    $totaldown         = $totaldata['down'];
    $totalup           = $totaldata['up'];
    $json["markets"][] = array(
        "id" => $data['id'],
        "pair" => $data['pair'],
        "starttime" => $data['starttime'],
        "duration" => $data['duration'],
        "totalBetsDown" => $totaldown,
        "totalBetsUp" => $totalup,
        "price" => $currentPrice
    );
}
file_put_contents("ajax/retrieveMarkets.php", json_encode($json));
echo "Finished refreshing\n\n";
echo "\nCronjob done, time elapsed: " . (microtime(true) - $start) . " seconds";
