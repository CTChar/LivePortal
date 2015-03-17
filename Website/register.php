<?php
require_once('includes/functions.php');

#################### start registration process ####################
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";	
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";	
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";	
$confirmPassword = isset($_REQUEST["confirmPassword"]) ? $_REQUEST["confirmPassword"] : "";	
$dob = isset($_REQUEST["dob"]) ? $_REQUEST["dob"] : "";	
//$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";	
//$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : "";	
//$state = isset($_REQUEST["state"]) ? $_REQUEST["state"] : "";	

//$registerButton = isset($_REQUEST["registerButton"]) ? $_REQUEST["registerButton"] : "";	


if (isset($_REQUEST["registerButton"]))
{
	register($username,$email,$password,$confirmPassword,$dob);
}
#################### end registration process ####################

require_once('includes/header.php');
?>



		<form action="register.php">
		Username:<br>
		<input type="text" id="username" name="username" value="<?php echo("$username"); ?>">
		<br>
		Email:<br>
		<input type="email" id="email" name="email" value="<?php echo("$email"); ?>">
		<br>
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