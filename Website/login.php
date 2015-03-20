<?php
require_once('includes/functions.php');

#################### start process user login ####################
#username and password variables from login.php
$username = isset($_REQUEST["username"]) ? clean($_REQUEST["username"]) : "";	
$password = isset($_REQUEST["password"]) ? clean($_REQUEST["password"]) : "";	

if (isset($_REQUEST["loginButton"]))
{
	login($username,$password);
}
#################### end process user login ####################


require_once('includes/header.php');
?>

	<form action="register.php">
		<div class="form-group">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo("$username"); ?>">
		Usernames must contain 
		<ul>
			<li>8 or more characters Ex. A B C 1 2 3 ! @ #</li>
		</ul>
		</div>
		<div class="form-group">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo("$password"); ?>">
		Passwords must contain: 
			<ul>
				<li>2 or more uppercase letters Ex. A B C</li> 
				<li>2 or more lowercase letters Ex. a b c</li> 
				<li>2 or more special symbols [ ! @ # $ % ^ & * ( ) \ - _ = + { } ; : , < . > ]</li> 
				<li>2 or more numbers Ex. 1 2 3 </li> 
				<li>8 or more characters Ex. A B C 1 2 3 ! @ #</li> 
			</ul>
		</div>
		<input type="submit" name="loginButton"  class="btn btn-default" value="Login">
	</form>
<?php
require_once('includes/footer.php')

?>