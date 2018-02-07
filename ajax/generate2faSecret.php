<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

if(!$_POST){
	$otpsecret = generateOTPSecret();
	if(mysqli_query($con, "UPDATE users SET depositAddress='$otpsecret' WHERE id='$userInfo[id]'"))
		die(json_encode(array("status"=>true, "otpSecret"=>$otpsecret)));
	else
		die(json_encode(array("status"=>false, "message"=>"Database error.")));
} else {
	if(!verifyOTP($_POST['otp'], $userInfo['2faSecret']) || empty($userInfo['2faSecret']))
		die(json_encode(array("status"=>false, "message"=>"2FA token is not correct.")));

	if(mysqli_query($con, "UPDATE users SET 2faactivated='1' WHERE id='$userInfo[id]'"))
		die(json_encode(array("status"=>true)));
	else
		die(json_encode(array("status"=>false, "message"=>"Database error.")));
}
