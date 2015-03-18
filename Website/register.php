<?php
require_once('includes/functions.php');

#################### start registration process ####################
$username = isset($_REQUEST["username"]) ? clean($_REQUEST["username"]) : "";	
$email = isset($_REQUEST["email"]) ? clean($_REQUEST["email"]) : "";	
$password = isset($_REQUEST["password"]) ? clean($_REQUEST["password"]) : "";	
$confirmPassword = isset($_REQUEST["confirmPassword"]) ? clean($_REQUEST["confirmPassword"]) : "";	
$dob = isset($_REQUEST["dob"]) ? clean($_REQUEST["dob"]) : "";	

//$registerButton = isset($_REQUEST["registerButton"]) ? $_REQUEST["registerButton"] : "";	


if (isset($_REQUEST["registerButton"]))
{
	register($username,$email,$password,$confirmPassword,$dob);
}
#################### end registration process ####################

require_once('includes/header.php');
?>



		<form action="register.php">
		>=8 characters <br/>
		Username:<br>
		<input type="text" id="username" name="username" value="<?php echo("$username"); ?>">
		<br>
		Email:<br>
		<input type="email" id="email" name="email" value="<?php echo("$email"); ?>">
		<br>
		>=2 Uppercase <br/>
		>=2 Lowercase <br/>
		>=2 [!@#$%^&*()\-_=+{};:,<.>] <br/>
		>=2 numbers 0-9 <br/>
		>=8 characters <br/>
		Password:<br>
		<input type="password" id="password" name="password" value="<?php echo("$password"); ?>">
		<br>
		Confirm Password:<br>
		<input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo("$confirmPassword"); ?>">
		<br>
		DOB<br>
		<input type="date" id="dob" name="dob" value="<?php echo("$dob"); ?>">
		<br>
		<input type="submit" name="registerButton" value="Submit">
		</form>


<?php
require_once('includes/footer.php')

?>