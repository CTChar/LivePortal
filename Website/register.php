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
	
	
	<link rel="stylesheet" href="login_style.css">
  
</head>
	<body>
		<form action="includes/loginFunctions.php">
		Username:<br>
		<input type="text" id="username" name="username" value="test">
		<br>
		Email:<br>
		<input type="email" id="email" name="email" value="test">
		<br>
		Password:<br>
		<input type="password" id="password" name="password" value="test">
		<br>
		Confirm Password:<br>
		<input type="password" id="confirmPassword" name="confirmPassword" value="test">
		<br>
		DOB<br>
		<input type="date" id="dob" name="dob" value="test">
		<br>
		<!--
		Phone Number:<br>
		<input type="tel" id="phone" name="phone" value="test">
		<br>
		Country:<br>
		<input type="text" id="country" name="country" value="test">
		<br>
		State:<br>
		<input type="text" id="state" name="state" value="test">
		<br>
		-->
		
		<input type="submit" name="registerButton" value="Submit">
		</form>

	</body>
</html>