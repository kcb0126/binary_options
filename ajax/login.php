<?php
header("Content-Type: application/json");
require("functions.php");
if($userInfo)
	die(json_encode(array("status"=>false, "message"=>"Already logged in, redirecting..<script>setTimeout(function(){ window.location='index.php'; }, 750);</script>")));

if($_POST){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = sha1($email . $_POST['password']);
	if(isset($_POST['password2']))
	{
		//register
		$passwordrepeat = sha1($email . $_POST['password2']);
		if($password != $passwordrepeat)
			die(json_encode(array("status"=>false, "message"=>"Passwords doesn't match.")));
		if(strlen($_POST['password']) < 5)
			die(json_encode(array("status"=>false, "message"=>"Password is too short.")));
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			die(json_encode(array("status"=>false, "message"=>"Email isn't valid.")));
		if(strlen($email) < 5)
			die(json_encode(array("status"=>false, "message"=>"Email is too short.")));
		$sql = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($sql))
			die(json_encode(array("status"=>false, "message"=>"Email already exists.")));

//		if(!mysqli_query($con, "INSERT INTO users (email, password, balance, depositAddress, 2fasecret, 2faactivated, referrer, signupdate) VALUES ('$email', '$password', '0', 'null', '', '0', '".(int)$_SESSION['ref']."', '".time()."')"))
        $referrer = array_key_exists('ref' ,$_SESSION) ? (int)$_SESSION['ref'] : 0;
        if(!mysqli_query($con, "INSERT INTO users (email, password, bitcoinBalance, ethereumBalance, demoBalance, depositAddress, 2fasecret, 2faactivated, referrer, signupdate) VALUES ('$email', '$password', '0', '0', '0', 'null', '', '0', '".$referrer."', '".time()."')"))
			die(json_encode(array("status"=>false, "message"=>"Database error.")));

		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		die(json_encode(array("status"=>true)));
	} else {
		//login
		$_2fa = mysqli_real_escape_string($con, $_POST['2fa']);
		if(strlen($_POST['password']) < 5 || strlen($email) < 5)
			die(json_encode(array("status"=>false, "message"=>"Authentication failed.")));

		$sql = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		$data = mysqli_fetch_array($sql);
		if(!mysqli_num_rows($sql) || (!verifyOTP($_2fa, $data['2fasecret']) && $data['2fasecret'] != ""))
			die(json_encode(array("status"=>false, "message"=>"Authentication failed.")));
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		die(json_encode(array("status"=>true)));
	}
}
