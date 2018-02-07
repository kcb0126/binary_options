<?php
@session_start();
$con = mysqli_connect("localhost", "root", "", "binaryoptions");
//$con = mysqli_connect("localhost", "sh4dow", "Sh4d0wbyte", "binaryoptions");
$btcNode = "https://example.com/";
$btcNodeAuthToken = "asd";

if (!$con) {
	http_response_code(500);
	die('Database connection error.');
}

function verifyOTP($otp, $secret)
{
	require_once ("GoogleAuthenticator.php");

	$g = new GoogleAuthenticator();
	return $g->checkCode($secret, $otp);
}

function generateOTPSecret()
{
	require_once ("GoogleAuthenticator.php");

	$g = new GoogleAuthenticator();
	return $g->generateSecret();
}

function validateBitcoinAddress($address)
{
	$decoded = decodeBase58($address);
	$d1 = hash("sha256", substr($decoded, 0, 21) , true);
	$d2 = hash("sha256", $d1, true);
	if (substr_compare($decoded, $d2, 21, 4)) return false;
	return true;
}

function decodeBase58($input)
{
	$alphabet = "123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
	$out = array_fill(0, 25, 0);
	for ($i = 0; $i < strlen($input); $i++) {
		if (($p = strpos($alphabet, $input[$i])) === false) return false;
		$c = $p;
		for ($j = 25; $j--;) {
			$c+= (int)(58 * $out[$j]);
			$out[$j] = (int)($c % 256);
			$c/= 256;
			$c = (int)$c;
		}

		if ($c != 0) return false;
	}

	$result = "";
	foreach($out as $val) {
		$result.= chr($val);
	}

	return $result;
}

if(isset($_SESSION['email']))
{
	$userSQL = mysqli_query($con, "SELECT * FROM users WHERE email='$_SESSION[email]' AND password='$_SESSION[password]'");
	if(mysqli_num_rows($userSQL) == 0)
	{
		session_destroy();
		header("Location: index.php");
		die();
	}
	$userInfo = mysqli_fetch_array($userSQL);
} else {
	$userInfo = false;
}

if(isset($_GET['v']) && $_GET['v'] < 1000000 && $_GET['v'] > 0)
	$_SESSION['ref'] = (int)$_GET['v'];
