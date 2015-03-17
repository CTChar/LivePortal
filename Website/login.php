<?php
require_once('includes/functions.php');

#################### start process user login ####################
#username and password variables from login.php
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";	
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";	

if (isset($_REQUEST["loginButton"]))
{
	login($username,$password);
}
#################### end process user login ####################


require_once('includes/header.php');
?>


		<form action="login.php">
		Username:<br>
		<input type="text" id="username" name="username" value="<?php echo("$username"); ?>">
		<br>
		Password:<br>
		<input type="password" id="password" name="password" value="<?php echo("$password"); ?>">
		<br><br>
		<input type="submit" name="loginButton" value="Submit">
		</form>



<?php
require_once('includes/footer.php')

?>