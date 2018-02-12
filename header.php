<!DOCTYPE html>
<html lang="en">

<head>
    <title>BTC/ETH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">


         <link rel="stylesheet" href="css/jquery.mobile-1.4.2.min.css" />

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

       <script src="js/jquery.mobile-1.4.2.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container-fluid">


        <div class="row">
            <div class="container">

                <div class="move-right-position">
										<?php $file = basename($_SERVER['PHP_SELF']); ?>
                    <div class="topnav" id="myTopnav">
                        <img src="image/logo2.png" class="img-responsive header-logo logo">
                        <a href="markets.php"<?=($file == "markets.php" ? ' class="active"' : '')?>><i class="fa fa-home"></i> <span>Home </span></a>
                        <a href="dash.php"<?=($file == "dash.php" ? ' class="active"' : '')?>><i class="fa fa-user"></i>  <span>Profile </span></a>
                        <a href="deposit.php"<?=($file == "deposit.php" ? ' class="active"' : '')?>><i class="fa fa-credit-card"></i>  <span>Deposit </span></a>
                        <a href=""<?=($file == "withdraw.php" ? ' class="active"' : '')?>><i class="fa fa-bank"></i>  <span>Withdraw </span></a>
                        <a href="affiliate.php"<?=($file == "affiliate.php" ? ' class="active"' : '')?>><i class="fa fa-users"></i>  <span>Affiliate </span></a>
                        <a href="logout.php"><i class="fa fa-sign-out"></i>  <span>Logout </span></a>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction2()">&#9776;</a>
                    </div>
