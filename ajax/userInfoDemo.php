<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
    die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

$json = array("status"=>true, "bitcoinBalance"=>$userInfo['bitcoinBalance'], "ethereumBalance"=>$userInfo['ethereumBalance'], "demoBalance"=>$userInfo['demoBalance'], "orders"=>array());

$marketid = mysqli_real_escape_string($con, $_GET['market']);
if(empty($marketid))
    die(json_encode(array("status"=>true, "depositAddress"=>$userInfo['depositAddress'])));

$betsSQL = mysqli_query($con, "SELECT * FROM demobets WHERE userId='{$userInfo['id']}'");

while($data = mysqli_fetch_array($betsSQL))
{
    // pair is $marketid
    // amount is $data['amount']
    // Starting Rate is $data['startingrate']
    // Current Rate is known in client
    // expiration Time:
    $expiry = 0 + $data['date'] + $data['expiry'] - time();
    $status = $expiry > 0 ? "open" : "closed";
    if($expiry < 0) $expiry = 0;
    $json['orders'][] = array("marketid"=>$data['marketid'],
                                "status"=>$status,
                                "amount"=>$data['amount'],
                                "startingrate"=>$data['startingrate'],
                                "direction"=>$data['direction'],
                                "expiry"=>$data['expiry'],
                                "timeleft"=>$expiry);
}

$archivedBetsSQL = mysqli_query($con, "SELECT * FROM archiveddemobets WHERE userid='{$userInfo['id']}'");
while ($data = mysqli_fetch_array($archivedBetsSQL)) {
    $json['history'][] = array(
        "marketid" => $marketid,
        "amount" => $data['amount'],
        "profit" => $data['profit'],
        "pair" => $data['pair'],
        "startingdate" => date("d/m/Y h:i:s", $data['startingdate']),
        "finishtime" => date("d/m/Y h:i:s", $data['finishtime']),
        "startrate" => $data['startrate'],
        "closerate" => $data['closerate'],
        "betstatus" => $data['betstatus'],
        "direction" => $data['direction']
    );
}


//$archivedBetsSQL = mysqli_query($con, "SELECT bets.*, all_markets.* FROM (SELECT all_markets.* FROM markets AS all_markets INNER JOIN markets AS current_market ON all_markets.pair=current_market.pair WHERE current_market.id='$marketid') AS all_markets INNER JOIN bets as bets ON bets.marketid=all_markets.id WHERE bets.userid='$userInfo[id]");
//while($data = mysqli_fetch_array($archivedBetsSQL))
//{
//    $json['orders'][] = array("status"=>"closed", "amount"=>$data['amount'],"startPrice"=>$data['startprice'],"finishPrice"=>$data['finishprice'], "startTime"=>$data['starttime'], "expiry"=>($data['starttime'] + $data['duration']), "target" => $data['direction'], "profit"=>$data['profit']);
//}

die(json_encode($json));
