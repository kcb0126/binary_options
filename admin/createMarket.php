<?php
header("Content-Type: application/json");
require("functions.php");
if($adminInfo)
	die(json_encode(array("status"=>false, "message"=>"Not logged in.")));

if($_POST){
	$starttime = mysqli_real_escape_string($con, $_POST['starttime']);
	$pair = mysqli_real_escape_string($con, $_POST['pair']);
	$duration = (int)$_POST['duration'];
	if($amt < 10)
		die(json_encode(array("status"=>false, "message"=>"Duration should be at least 10 seconds.")));

	if(!mysqli_query($con, "INSERT INTO markets (pair, starttime, addedtime, duration) VALUES ('$pair', '$starttime', '".time()."', '$duration')"))
		die(json_encode(array("status"=>false, "message"=>"System error.")));
	else
		die(json_encode(array("status"=>true)));
}

die(json_encode(array("status"=>false, "message"=>"Invalid data.")));
