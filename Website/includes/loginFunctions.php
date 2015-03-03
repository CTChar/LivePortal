<?php




require_once('databaseConnect.php');
require_once('functions.php');

#username and password variables from login.php
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";	
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";	

login($username,$password);
//generate the test password
//echo password_hash("test", PASSWORD_DEFAULT)."\n";

#######login Functions#########

function login($username,$password)
{
	if (checkCredentials($username,$password))
	{
		$_SESSION['_user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['_remote_addr'] = $_SERVER['REMOTE_ADDR'];
		
		$_SESSION['username'] = $username;
		
	}
	echo($_SESSION['_user_agent']." <br> ".$_SESSION['_remote_addr']." <br> ".$_SESSION['username']);
}

function logout()
{
	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	// Finally, destroy the session.
	session_destroy();
}

//check that the user is logged in
function isLoggedIn()
{
	if (isset($_SESSION['username']))
	{
		global $db;
		$query = "SELECT * FROM Accounts WHERE username = '".$_SESSION['username']."'";
	
		$result = mysqli_query($db, $query);
		//echo (mysqli_fetch_assoc($result));
		if($result != false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function checkCredentials($username, $password)
{
	global $db;
	$query = "SELECT * FROM Accounts WHERE username = '".clean($username)."'";
	
	$result = mysqli_query($db, $query);
	//echo (mysqli_fetch_assoc($result));
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			if (password_verify($password, $row["password"]))
			{
				return true;
			}
		}
	}
	return false;
}


######### registration functions ##########

#registers the user
function register()
{
	
}

#checks to see that username is not in use
function checkUsername()
{
	return true;
}

#checks to see that the password is valid
function validPass($candidate) {
   $r1='/[A-Z]/';  //Uppercase
   $r2='/[a-z]/';  //lowercase
   $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
   $r4='/[0-9]/';  //numbers

   if(preg_match_all($r1,$candidate, $o)<2) return FALSE;

   if(preg_match_all($r2,$candidate, $o)<2) return FALSE;

   if(preg_match_all($r3,$candidate, $o)<2) return FALSE;

   if(preg_match_all($r4,$candidate, $o)<2) return FALSE;

   if(strlen($candidate)<8) return FALSE;

   return TRUE;
}

#checks to see that the email is valid
function validEmail($email)
{
	$validEmailExpr = '/^[a-z0-9\-.]+@[a-z0-9\-]+\.[a-z0-9\-.]+$/i';
	if(preg_match($validEmailExpr, $email) != 0)
	{
		return true;
	}
	return false;
}

#checks to see that the username is valid
function validUsername()
{
	return true;
}

//returns a hashed password
function hashPassword($toHash)
{
	return password_hash($toHash, PASSWORD_DEFAULT);
}

/* creates a random salt for sha-512 password encryption*/
function makeSalt() 
{
	static $seed = "./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$algo = '$6$';
	$strength = 'rounds=5000';
	$salt = '$';
	for ($i = 0; $i < 16; $i++) {
		$salt .= substr($seed, mt_rand(0, 63), 1);
	}
	$salt .= '$';
	return $algo . $strength . $salt;
}

/* creates a random password*/
function makePass() 
{
	$pass = "";
	static $options = "./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	for ($i = 0; $i < 30; $i++) {
		$pass .= substr($options, mt_rand(0, 63), 1);
	}
	return $pass;
}


?>