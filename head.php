<?php session_start() ?>
<?php error_reporting(0) ?>
<?php require_once('lang.php'); ?>
<?php require_once('fonctions.php'); ?>
<?php require_once('tabs.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SOMLAKO</title>
		<meta charset="iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-glyphicons.css" />
		<link rel="stylesheet" href="css/datepicker.css" />
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<link rel="stylesheet" href="css/icheck/flat/blue.css" />
		<link rel="stylesheet" href="css/select2.css" />
		<link rel="stylesheet" href="css/fullcalendar.css" />	
		<link rel="stylesheet" href="css/unicorn.main.css" />
		<link rel="stylesheet" href="css/unicorn.red-green.css" class="skin-color" />
		<link rel="stylesheet" href="font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/javascript.js"></script>
	</head>
	<body>
    <?php
		if($_SESSION['admin']!="SOMLAKO")
		{
			redirect('login.php');
		}


	?>
		<div id="header">
			<h1><a href="">Gestion patisserie</a></h1>	
			<a id="menu-trigger" href="#"><i class="glyphicon glyphicon-align-justify"></i></a>	
		</div>
		
		<div id="user-nav">
            <ul class="btn-group">
                <li class="btn dropdown" id="menu-messages">
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                
                <li class="btn"><a title="" href="deconnexion.php"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>