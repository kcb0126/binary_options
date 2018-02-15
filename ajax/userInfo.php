<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

$json = array("status"=>true, "bitcoinBalance"=>$userInfo['bitcoinBalance'], "ethereumBalance"=>$userInfo['ethereialance'], "balance"=>$userInfo['balance'], "orders"=>array());

$marketid = mysqli_real_escape_string($con, $_GET['market']);
if(empty($marketid))
	die(json_encode(array("status"=>true, "depositAddress"=>$userInfo['depositAddress'])));

$betsSQL = mysqli_query($con, "SELECT * FROM bets WHERE marketid='$marketid'");

while($data = mysqli_fetch_array($marketsSQL))
{
	$json['orders'][] = array("status"=>"open", "amount"=>$data['amount'],"startPrice"=>$data['startprice'],"target"=>$data['direction']);
}

$archivedBetsSQL = mysqli_query($con, "SELECT bets.*, all_markets.* FROM (SELECT all_markets.* FROM markets AS all_markets INNER JOIN markets AS current_market ON all_markets.pair=current_market.pair WHERE current_market.id='$marketid') AS all_markets INNER JOIN bets as bets ON bets.marketid=all_markets.id WHERE bets.userid='$userInfo[id]");
while($data = mysqli_fetch_array($archivedBetsSQL))
{
	$json['orders'][] = array("status"=>"closed", "amount"=>$data['amount'],"startPrice"=>$data['startprice'],"finishPrice"=>$data['finishprice'], "startTime"=>$data['starttime'], "expiry"=>($data['starttime'] + $data['duration']), "target" => $data['direction'], "profit"=>$data['profit']);
}

die(json_encode($json));
