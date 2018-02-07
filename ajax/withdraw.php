<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

$amount = mysqli_real_escape_string($con, $_POST['amount']);
$to = mysqli_real_escape_string($con, $_POST['address']);
$_2fa = mysqli_real_escape_string($con, $_POST['2fa']);
if(!mysqli_num_rows($sql) || (!verifyOTP($_2fa, $data['2fasecret']) && $data['2fasecret'] != ""))
	die(json_encode(array("status"=>false, "message"=>"2FA authentication failed.")));
