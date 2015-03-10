<?php
require_once('databaseConnect.php');
require_once('functions.php');


$errors = array();
printErrors($errors);

function printErrors($errors)
{
	if (count($errors) > 0)
	{
		for($x = 0; $x < count($errors); $x++) 
		{
			echo $errors[$x];
			echo "<br>";
		}
	}
}

#################### start process user login ####################
#username and password variables from login.php
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";	
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";	

if (isset($_REQUEST["loginButton"]))
{
	login($username,$password);
}
#################### end process user login ####################

#################### start process user logout ####################
if (isset($_REQUEST["logout"]) && $_REQUEST["logout"] == true)
{
	logout();
}
#################### end process user logout ####################



//generate the test password
//echo password_hash("test", PASSWORD_DEFAULT)."\n";

#################### start login Functions ####################

function login($username,$password)
{
	global $errors;
	if (checkCredentials($username,$password))
	{
		$_SESSION['_user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['_remote_addr'] = $_SERVER['REMOTE_ADDR'];
		
		$_SESSION['username'] = $username;
		
		header('Location: ../index.php');
	}
	printErrors($errors);
	//echo($_SESSION['_user_agent']." <br> ".$_SESSION['_remote_addr']." <br> ".$_SESSION['username']);
	
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
	
	
	header('Location: ../index.php');
}

//check that the user is logged in
function isLoggedIn()
{
	if (isset($_SESSION['username']) && isset($_SESSION['_user_agent']) && isset($_SESSION['_remote_addr']))
	{
		global $db;
		$query = "SELECT * FROM Accounts WHERE username = '".$_SESSION['username']."'";
	
		$result = mysqli_query($db, $query);
		//echo (mysqli_fetch_assoc($result));
		
		//if there is a username of that value and the user agent and ip address are okay then the user is logged in
		if($result != false && $_SESSION['_user_agent'] == $_SERVER['HTTP_USER_AGENT'] && $_SESSION['_remote_addr'] == $_SERVER['REMOTE_ADDR'])
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
	global $db,$errors;
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
	$errors[]="The username or password are incorrect";
	return false;
}
#################### end login Functions ####################


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


#################### start registration functions ####################

#registers the user
function register($username,$email,$password,$confirmPassword,$dob)
{
	//validate username
	if (checkUsername($username))
	{
		if (validUsername($username))
		{
			//validate password
			if (comparePassword($password,$confirmPassword))
			{
				if (validPass($password))
				{
					//validate email
					if (validEmail($email))
					{
						$query = "INSERT INTO `liveportal`.`Accounts` (`accountId`, `username`, `password`, `email`, `registerDate`, `DOB`, `canStream`, `streamKey`) VALUES (NULL, '".$username."', '".$password."', '".$email."', CURRENT_TIMESTAMP, '".$dob."', '0', NULL)";
					
						$result = mysqli_query($link, $query);
						if($result == false)
						{
							printf("Errorcode: %d\n", mysqli_errno($link));
						}
						else
						{
							$accountId = mysqli_insert_id($link);
						}
	
						
						
						$query = "INSERT INTO `liveportal`.`Profiles` (`profileId`, `language`, `displayName`, `bio`, `Accounts_accountId`, `phone`, `country`) VALUES (NULL, NULL, NULL, NULL, '3', NULL, NULL)";
						$result = mysqli_query($link, $query);
						if($result == false)
						{
							printf("Errorcode: %d\n", mysqli_errno($link));
						}
					}
				}
			}
		}
	}
}

#checks to see that username is not in use
//true if taken false if not taken
function checkUsername($username)
{
	
	global $db,$errors;
	$query = "SELECT * FROM Accounts WHERE username = '".$username."'";

	$result = mysqli_query($db, $query);
	//echo (mysqli_fetch_assoc($result));
	
	//if there is a username of that value and the user agent and ip address are okay then the user is logged in
	if($result != false)
	{
		$errors[]="The username $username is already taken";
		return true;
	}
	else
	{
		return false;
	}
}

#checks to see that username is more than 8 characters
function validUsername($candidate)
{
	global $errors;
	if(strlen($candidate)<8)
	{
		$errors[]="$candidate is not at least 8 characters";
		return false;
	}
	return true;
}

#checks to see that the password is valid
function validPass($candidate) 
{
	global $errors;
   $r1='/[A-Z]/';  //Uppercase
   $r2='/[a-z]/';  //lowercase
   $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
   $r4='/[0-9]/';  //numbers

   if(preg_match_all($r1,$candidate, $o)<2) 
   {
	   $errors[]="The password must conatin at least 2 uppercase letters";
	   return FALSE;
   }
   if(preg_match_all($r2,$candidate, $o)<2) 
   {
	   $errors[]="the password must contain at least 2 lowercase letters";
	   return FALSE;
   }
   if(preg_match_all($r3,$candidate, $o)<2) 
   {
	   $errors[]="the password must contain at least 2 special characters";
	   return FALSE;
   }
   if(preg_match_all($r4,$candidate, $o)<2) 
   {
	   $errors[]="the password must contain at least 2 numbers";
	   return FALSE;
   }
   if(strlen($candidate)<8) 
   {
	   $errors[]="the password must contain at least 8 characters";
	   return FALSE;
   }
   return TRUE;
}

function comparePassword($pass1,$pass2)
{
	global $errors;
	if ($pass1 == $pass2)
	{
		return true;
	}
	$errors[]="The passwords do not match";
	return false;
}

//check to see that a phone number is valid
function validPhone($phone)
{
	//Here's a regex for a 7 or 10 digit number, with extensions allowed, delimiters are spaces, dashes, or periods:
	//http://stackoverflow.com/questions/123559/a-comprehensive-regex-for-phone-number-validation
	$validPhone = '^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$';
	if(preg_match($validPhone, $phone) != 0)
	{
		return true;
	}
	return false;
}

#checks to see that the email is valid
function validEmail($email)
{
	global $errors;
	$validEmailExpr = '/^[a-z0-9\-.]+@[a-z0-9\-]+\.[a-z0-9\-.]+$/i';
	if(preg_match($validEmailExpr, $email) != 0)
	{
		return true;
	}
	$errors[]="$email is not a valid email";
	return false;
}

//validates DOB dd-mm-yyyy format
function validDob($dob)
{
	global $errors;
	$validDOBExpr = '^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$';
	if(preg_match($validDOBExpr, $dob) != 0)
	{
		return true;
	}
	$errors[]="That is not a valid date of birth";
	return false;
}

//returns a hashed password
function hashPassword($toHash)
{
	return password_hash($toHash, PASSWORD_DEFAULT);
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

#################### end registration functions ####################

?>