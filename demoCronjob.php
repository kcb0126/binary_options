<?php
$start = microtime(true);
require("ajax/functions.php");
$sql = mysqli_query($con, "SELECT * FROM demobets WHERE date + expiry <= '" . time() . "'");
echo "Processing finished demobets..\n";

$filename = "log/markets.json";
$myfile = fopen($filename, "r") or die("Unable to open file!");
$markets = json_decode(fread($myfile,filesize($filename)), true);
fclose($myfile);

$market_names = ['Nothing', 'btc-eth', 'btc-ltc', 'btc-neo', 'btc-xrp', 'eth-btc', 'eth-ltc', 'eth-neo', 'eth-xrp'];
$pair_names = ['Notused', 'BTC/ETH', 'BTC/LTC', 'BTC/NEO', 'BTC/XRP', 'ETH/BTC', 'ETH/LTC', 'ETH/NEO', 'ETH/XRP'];

$profit_percentages = [60=>1.65, 300=>1.75, 900=>1.85];

while ($demobet = mysqli_fetch_array($sql)) {
    $market_id = $demobet['marketid'];
    $market_name = $market_names[$market_id];
    $starting_rate = $demobet['startingrate'];
    $current_rate = $markets[$market_name];
    $direction = $demobet['direction'];
    $expiry = $demobet['expiry'];
    $profit_percentage = $profit_percentages[$expiry];
    $amount = $demobet['amount'];
    $betid = $demobet['id'];
    $pairname = $pair_names[$market_id];
    $userid = $demobet['userid'];
    $startingdate = $demobet['date'];
    $finishtime = $startingdate + $expiry;

    $profit = 0;
    $betStatus = 0; // 1: win, 2: tie, 3: lose

    if($direction == 'up') {
        if($starting_rate < $current_rate) {
            $profit = $amount * $profit_percentage;
            $betStatus = 1;
        }
        else if($starting_rate == $current_rate) {
            $profit = $amount;
            $betStatus = 2;
        }
        else {
            $profit = 0;
            $betStatus = 3;
        }
    }
    else if($direction == 'down') {
        if($starting_rate > $current_rate) {
            $profit = $amount * $profit_percentage;
            $betStatus = 1;
        }
        else if($starting_rate == $current_rate) {
            $profit = $amount;
            $betStatus = 2;
        }
        else {
            $profit = 0;
            $betStatus = 3;
        }
    }

    mysqli_query($con, "START TRANSACTION");

    // delete old data from demobets table
    mysqli_query($con, "DELETE FROM demobets WHERE id=".$demobet['id']);
    if(!mysqli_affected_rows($con)) {
        mysqli_query($con, "ROLLBACK");
        die("Error while delete row in demobets table");
    }

    // add to archiveddemobets table
    $query_for_add_archivedemobets = "INSERT INTO archiveddemobets (amount,profit,startrate,closerate,pair,userid,marketid,direction,startingdate,finishtime,betstatus)
                  VALUES($amount, $profit, $starting_rate, $current_rate, '$pairname', $userid, $market_id, '$direction', $startingdate, $finishtime, $betStatus)";
    if(!mysqli_query($con, $query_for_add_archivedemobets)) {
        mysqli_query($con, "ROLLBACK");
        die("Error while inserting into archiveddemobets");
    }

    // update user balance;
    if(!mysqli_query($con, "UPDATE users SET demoBalance = demoBalance + $profit WHERE id = $userid")) {
        mysqli_query($con, "ROLLBACK");
        die("Error while updating users table.");
    }

    mysqli_query($con, "COMMIT");

}

echo "\nCronjob done, time elapsed: " . (microtime(true) - $start) . " seconds";

die(0);

while ($data = mysqli_fetch_array($sql)) {
    echo "Market ID: " . $data['id'] . "\n";
    mysqli_query($con, "START TRANSACTION");
    $totalsql = mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM demoBets WHERE marketid='$data[id]'");
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
    $betssql = mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM demoBets WHERE marketid='$sql'");
    while ($betdata = mysqli_fetch_array($betsql)) {
        echo "Processing bet $betdata[id]..\n";
        if ($winner == $betdata['direction'] || $winner == "refund") {
            $add = ($betdata['amount'] * $multiply);
            echo "Winner, add $add BTC to user $betdata[userid]..\n";
            mysqli_query($con, "UPDATE users SET demoBalance=demoBalance+'" . $add . "' WHERE id='$betdata[userid]'");
            if (!mysqli_affected_rows($con)) {
                mysqli_query($con, "ROLLBACK");
                die("Error while updating user balance (user id = $betdata[userid]), exiting");
            }
        } else {
            echo "Loser, not updating\n";
        }
        if (!mysqli_query($con, "INSERT INTO archivedDemoBets (amount, target, profit, pair, userid, marketid, direction, date) VALUES ('$betdata[amount]', '" . ($add - $betdata['amount']) . "', '$data[pair]', '$betdata[userid]', '$data[id]', '$betdata[direction]', '$betdata[date]')")) {
            mysqli_query($con, "ROLLBACK");
            die("Error while moving to archive");
        }
        mysqli_query($con, "DELETE FROM demoBets WHERE id='$betdata[id]'");
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
    $totaldata         = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(case when direction='up' then amount else 0 end) as up, SUM(case when direction='down' then amount else 0 end) as down FROM demoBets WHERE marketid='$data[id]'"));
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
