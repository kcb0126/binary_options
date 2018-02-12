<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

if($_POST){
	$market = mysqli_real_escape_string($con, $_POST['market']);
	$amt = mysqli_real_escape_string($con, $_POST['amount']);
	if($amt < 0 || (!is_numeric($amt) && !is_float($amt) && !is_integer($amt)) || $amt > 999)
		die(json_encode(array("status"=>false, "message"=>"Invalid amount.")));

	$amt = (float)$amt;
	$direction = ($_POST['direction'] == "up" ? "up" : "down");
	$msql = mysqli_query($con, "SELECT * FROM markets WHERE id='$market'");

	mysqli_query($con, "START TRANSACTION");
	$userSQL = mysqli_query($con, "SELECT * FROM users WHERE email='$_SESSION[email]' AND password='$_SESSION[password]' FOR UPDATE");
	$userInfo = mysqli_fetch_array($userSQL);

	if(!mysqli_num_rows($msql))
		die(json_encode(array("status"=>false, "message"=>"Market not found / closed.")));

	$mdata = mysqli_fetch_array($msql);
	if(time () - $mdata['starttime'])
		die(json_encode(array("status"=>false, "message"=>"Bets are closed.")));

	if($userInfo['balance'] < $amt)
		die(json_encode(array("status"=>false, "message"=>"Insufficient funds.")));

	if(!mysqli_affected_rows(mysqli_query($con, "UPDATE users SET balance=balance-'$userInfo[balance]' WHERE id='$userInfo[id]'"))){
		mysqli_query($con, "ROLLBACK");
		die(json_encode(array("status"=>false, "message"=>"System error.")));
	}
	if(!mysqli_affected_rows(mysqli_query($con, "INSERT INTO bets (userid, marketid, amount, direction, date) VALUES ('$userInfo[id]', '$mdata[id]', '$amt', '$direction', '".time()."')"))){
		mysqli_query($con, "ROLLBACK");
		die(json_encode(array("status"=>false, "message"=>"System error.")));
	}

	$userSQL = mysqli_query($con, "SELECT * FROM users WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'");
	$userInfo = mysqli_fetch_array($userSQL);
	mysqli_query($con, "COMMIT");
    die(json_encode(array("status"=>true, "newBalance"=>$userInfo['balance'])));
}

die(json_encode(array("status"=>false, "message"=>"Invalid data.")));
