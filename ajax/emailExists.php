<?php
header("Content-Type: application/json");
require("functions.php");
if($userInfo)
	die(json_encode(array("status"=>false, "message"=>"Already logged in!")));

if($_POST){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	die(json_encode(array("status"=>true, "exists"=>!!mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='$email'")))));
}

die(json_encode(array("status"=>false, "message"=>"Please enter a valid email")));
