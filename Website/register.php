<?php
require_once('includes/functions.php');

#################### start registration process ####################
$username = isset($_REQUEST["username"]) ? clean($_REQUEST["username"]) : "";	
$email = isset($_REQUEST["email"]) ? clean($_REQUEST["email"]) : "";	
$password = isset($_REQUEST["password"]) ? clean($_REQUEST["password"]) : "";	
$confirmPassword = isset($_REQUEST["confirmPassword"]) ? clean($_REQUEST["confirmPassword"]) : "";	
$dob = isset($_REQUEST["dob"]) ? clean($_REQUEST["dob"]) : "";	

#################### end registration process ####################

require_once('includes/header.php');

if (isset($_REQUEST["registerButton"]))
{
	register($username,$email,$password,$confirmPassword,$dob);
}
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
		<label for="email">Email</label>
		<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo("$email"); ?>">
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
	<div class="form-group">
		<label for="confirmPassword">Confirm Password</label>
		<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" value="<?php echo("$confirmPassword"); ?>">
	</div>
	<div class="form-group">
		<label for="dob">Date of Birth</label>
		<input type="date" id="dob" name="dob" class="form-control" placeholder="mm/dd/yyyy" value="<?php echo("$dob"); ?>">
	</div>
	<input type="submit" name="registerButton" class="btn btn-default" value="Register">
</form>


<?php
require_once('includes/footer.php')

?>