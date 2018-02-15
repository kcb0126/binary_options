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
	$amt = abs($amt);
	// direction: "up" means 'buy', "down" means 'sell'
	$direction = ($_POST['direction'] == "up" ? "up" : "down");
//	$msql = mysqli_query($con, "SELECT * FROM markets WHERE id='$market'");

    $expiry = mysqli_real_escape_string($con, $_POST['expiry']);
    $expiry = (int)$expiry;

    $startingrate = mysqli_real_escape_string($con, $_POST['startingrate']);
    $startingrate = (float)$startingrate;

	mysqli_query($con, "START TRANSACTION");
	$userSQL = mysqli_query($con, "SELECT * FROM users WHERE email='$_SESSION[email]' AND password='$_SESSION[password]' FOR UPDATE");
	$userInfo = mysqli_fetch_array($userSQL);

//	if(!mysqli_num_rows($msql))
//		die(json_encode(array("status"=>false, "message"=>"Market not found / closed.")));

//	$mdata = mysqli_fetch_array($msql);
//	if(time () - $mdata['starttime'])
//		die(json_encode(array("status"=>false, "message"=>"Bets are closed.")));

	if($userInfo['demoBalance'] < $amt)
		die(json_encode(array("status"=>false, "message"=>"Insufficient funds.")));

    mysqli_query($con, "UPDATE users SET demoBalance=demoBalance-$amt WHERE id='$userInfo[id]'");

	if(!mysqli_affected_rows($con)){
		mysqli_query($con, "ROLLBACK");
		die(json_encode(array("status"=>false, "message"=>"System error1.")));
	}

    mysqli_query($con, "INSERT INTO demobets (userid, marketid, amount, startingrate, direction, date, expiry) VALUES ('$userInfo[id]', '$market', '$amt', '$startingrate', '$direction', '".time()."', '$expiry')");
	if(!mysqli_affected_rows($con)){
		mysqli_query($con, "ROLLBACK");
		die(json_encode(array("status"=>false, "message"=>"System error2.")));
	}

	$userSQL = mysqli_query($con, "SELECT * FROM users WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'");
	$userInfo = mysqli_fetch_array($userSQL);
    mysqli_query($con, "COMMIT");
	die(json_encode(array("status"=>true, "newBalance"=>$userInfo['demoBalance'])));
}

die(json_encode(array("status"=>false, "message"=>"Invalid data.")));
