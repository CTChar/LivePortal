<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>LivePortal.gq</title>
	<meta charset="utf-8">
	<!--include jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--include bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!--include angular-->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
	
	
	<link rel="stylesheet" href="styles/style.css">
  
</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#"><img src="images/livePortal.png"></a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="testStreamPage.html">Stream Page html</a></li>
					<!-- <li><a href="testStreamPage.php">Stream Page php</a></li> -->
					<li><a href="#">Browse</a></li>
					<li><a href="#">Favorites</a></li>
					<li><a href="#">Messages <span class="badge">12</span></a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Username<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Profile</a></li>
							<li><a href="#">Settings</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<?php
					//if logged in show logout button
					if (isLoggedIn())
					{
					?>
						<li><a href="includes/functions.php?logout=true"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					<?php
					}
					//else show login button
					else
					{
					?>
					
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php
					}
					?>
					
					
					
				
				
				
				
				</ul>
			</div>
		  </div>
		</nav>