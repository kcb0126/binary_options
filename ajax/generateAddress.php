<?php
header("Content-Type: application/json");
require("functions.php");
if(!$userInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

if(empty($userInfo['depositAddress']) || $userInfo['depositAddress'] == "null"){
	$address = file_get_contents($btcNode."/".$btcNodeAuthToken."/generate-address");
	if(!validateBitcoinAddress($address))
		die(json_encode(array("status"=>false, "message"=>"Server error.")));
	if(mysqli_query($con, "UPDATE users SET depositAddress='$address' WHERE id='$userInfo[id]'"))
		die(json_encode(array("status"=>true, "address"=>$address)));
	else
		die(json_encode(array("status"=>false, "message"=>"Database error.")));
} else
	die(json_encode(array("status"=>false, "message"=>"Address already exists.")));
