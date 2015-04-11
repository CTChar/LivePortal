<?php
require_once('databaseConnect.php');

#################### Error Processing ####################
$errors = array();

function printErrors($errors)
{
	if (isset($_REQUEST["loginButton"]))
	{
		echo ("<script>$('#signIn').modal('show')</script>");
	}
	if (isset($_REQUEST['sendMessage']))
	{
		echo ("<script>$('#sendMessage').modal('show')</script>");
	}
	if (count($errors) > 0)
	{
		for($x = 0; $x < count($errors); $x++) 
		{
			echo ('<span class="error">'.$errors[$x]."</span><br>");
		}
	}
}
#################### Error Processing ####################


#################### start process user logout ####################
if (isset($_REQUEST["logout"]) && $_REQUEST["logout"] == true)
{
	logout();
}
#################### end process user logout ####################



#################### start login Functions ####################

function login($username,$password)
{
	global $errors;
	if (checkCredentials($username,$password))
	{
		$_SESSION['_user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['_remote_addr'] = $_SERVER['REMOTE_ADDR'];
		
		$_SESSION['username'] = $username;
		
		
		$userId =  getFromTable ('Accounts','username',$username,'accountId');
		//echo ($userId);
		$_SESSION['userId'] = $userId;
		
		
		
		header('Location: index.php');
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





#################### start registration functions ####################

#registers the user
function register($username,$email,$password,$confirmPassword,$dob)
{
	global $db,$errors;
	//validate username
	if (!checkUsername($username))
	{
		if (validUsername($username))
		{
			if (validPass($password))
			//validate password
			{
				if (comparePassword($password,$confirmPassword))
				{
					//validate email
					if (!emailNotUsed($email))
					{
					if (validEmail($email))
					{
						if (validDob($dob))
						{
							$passwordH = hashPassword($password);
							$rkey = randomKey();
							$username = strtolower($username);
							$email = strtolower($email);
							//$rkey = "3f5";
							$query = "INSERT INTO `liveportal`.`Accounts` (`accountId`, `username`, `password`, `email`, `registerDate`, `DOB`, `canStream`, `streamKey`) VALUES (NULL, '".$username."', '".$passwordH."', '".$email."', CURRENT_TIMESTAMP, '".$dob."', '1', '$rkey');";
						
							//$sql   = "INSERT INTO `liveportal`.`Accounts` (`accountId`, `username`, `password`, `email`, `registerDate`, `DOB`, `canStream`, `streamKey`) VALUES (NULL, \'safgfdg\', \'dsgdsfgfdsg\', \'dsfgsdgdsfgd\', CURRENT_TIMESTAMP, \'2015-03-11\', \'1\', NULL, \'dsfgdsfgdsbg\');";
							
						
							$result = mysqli_query($db, $query);
							if($result == false)
							{
								//printf("Errorcode account create: %d\n", mysqli_error($db));
								printf("Errorcode account create: %s\n", mysqli_error($db));
							}
							else
							{
								$accountId = mysqli_insert_id($db);
							
		
							
								//create profile
								$query = "INSERT INTO `liveportal`.`Profiles` (`profileId`, `language`, `bio`, `Accounts_accountId`, `phone`, `country`) VALUES (NULL, NULL, NULL, '".$accountId."', NULL, NULL)";
								$result = mysqli_query($db, $query);
								if($result == false)
								{
									printf("Errorcode profile create: %s\n", mysqli_error($db));
								}
								else
								{
									$profileId = mysqli_insert_id($db);
									$query = "UPDATE  `liveportal`.`Accounts` SET  `Profiles_profileId` =  '".$profileId."' WHERE  `Accounts`.`accountId` =".$accountId;
									$result = mysqli_query($db, $query);
									if($result == false)
									{
										printf("Errorcode account profile id update: %s\n", mysqli_error($db));
									}
									
									//header('Location: login.php?username='.$username.'&password='.$password);
									login($username,$password);
								}
							}
						}else printErrors($errors);
					}else printErrors($errors);
				}else printErrors($errors);
				}else printErrors($errors);
			}else printErrors($errors);
		}else printErrors($errors);
	}else printErrors($errors);
}

#checks to see that username is not in use
//true if taken false if not taken
function checkUsername($username)
{
	
	global $db,$errors;
	$query = "SELECT * FROM Accounts WHERE username = '".$username."'";
	
	
	$result = mysqli_query($db, $query);
	if ($db->errno)
	{
		echo "Error: (" . $db->errno . ") " . $db->error;
	}
	else
	{
		 while($row = mysqli_fetch_array($result)) 
		{
			$errors[]="The username $username is already taken";
			return true;
		}
	}
}

function isId($id)
{
	global $db,$errors;
	$query = "SELECT * FROM `Accounts` WHERE `accountId` = ".$id;
	
	$result = mysqli_query($db, $query);
	if ($db->errno)
	{
		echo "Error: (" . $db->errno . ") " . $db->error;
	}
	else
	{
		 while($row = mysqli_fetch_array($result)) 
		{
			return true;
		}
	}
	return false;
}

#checks to see that username is more than 8 characters
function validUsername($candidate)
{
	global $errors;
	if(strlen($candidate)<8)
	{
		$errors[]="The username $candidate is not at least 8 characters";
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

	$fail = 0;
   if(preg_match_all($r1,$candidate, $o)<2) 
   {
	   $errors[]="The password must conatin at least 2 uppercase letters";
	   //return FALSE;
	   $fail = 1;
   }
   if(preg_match_all($r2,$candidate, $o)<2) 
   {
	   $errors[]="The password must contain at least 2 lowercase letters";
	   //return FALSE;
	   $fail = 1;
   }
   if(preg_match_all($r3,$candidate, $o)<2) 
   {
	   $errors[]="The password must contain at least 2 special characters !@#$%^&*()\-_=+{};:,<.>]";
	   //return FALSE;
	   $fail = 1;
   }
   if(preg_match_all($r4,$candidate, $o)<2) 
   {
	   $errors[]="The password must contain at least 2 numbers";
	   //return FALSE;
	   $fail = 1;
   }
   if(strlen($candidate)<8) 
   {
	   $errors[]="The password must contain at least 8 characters";
	  // return FALSE;
	   $fail = 1;
   }
   if ($fail == 0)
   {
   return TRUE;
   }
   else
   {
	return false;
	}
}
//compares two things
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

function emailNotUsed($email)
{
	global $db,$errors;
	$query = "SELECT * FROM Accounts WHERE email = '".$email."'";
	
	
	$result = mysqli_query($db, $query);
	if ($db->errno)
	{
		echo "Error: (" . $db->errno . ") " . $db->error;
	}
	else
	{
		 while($row = mysqli_fetch_array($result)) 
		{
			$errors[]="The email $email is already taken";
			return true;
		}
	}
}

//validates DOB dd-mm-yyyy format
function validDob($dob)
{
	//bool checkdate ( int $month , int $day , int $year )
	global $errors;
	if (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$dob))
    {
        return true;
    }else{
	$errors[]="That is not a valid date of birth";
        return false;
    }
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


#################### start other functions ####################
function getUsername($userId)
{
	global $db;
	
	$query = "SELECT * FROM Accounts WHERE accountId = '".$userId."'";

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return $row['username'];
		}
	}
}

function getStreamKey($userId)
{
	global $db;
	
	$query = "SELECT * FROM Accounts WHERE accountId = '".$userId."'";

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return $row['streamKey'];
		}
	}
}

//returns value from database where $value is a column of the database
function getFromAccounts($userId,$value)
{
	global $db;
	
	$query = "SELECT * FROM Accounts WHERE accountId = '".$userId."'";

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return $row[$value];
		}
	}
}

//returns value from database where 
//$table is the table to look in 
//$key is the row to find 
//$value is a column of the database
//$return what you want to return

function getFromTable($table,$key,$value,$return)
{
	global $db;
	
	$query = "SELECT * FROM ".$table." WHERE ".$key." = '".$value."'";

	$result = mysqli_query($db, $query);
	if ($db->errno)
	{
		echo "Error: (" . $db->errno . ") " . $db->error;
	}
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return $row[$return];
		}
	}
}

function canStream($userId)
{
	global $db;
	
	$query = "SELECT * FROM Accounts WHERE accountId = '".$userId."'";

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			if ($row['canStream'] == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
}

// sanitize user input
function clean($value)
{ 
	global $db;
    $escaped = mysqli_real_escape_string($db,$value);
    $cleanValue = filter_var($escaped, FILTER_SANITIZE_SPECIAL_CHARS);
    
    return $cleanValue;
}

//check for the proper user agent and ip address
function sessionIsOK()
{
    return ($_SESSION['_user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
        $_SESSION['_remote_addr'] == $_SERVER['REMOTE_ADDR']);
}

function randomKey() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 20; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
	$pass = implode($pass);
    return $pass; //turn the array into a string
}
#################### end other functions ####################

#################### Favorite Process ####################
function favorited($favoritor,$favoritee)
{
	//should not be able to favorite yourself
	if ($favoritor == $favoritee)
	{
		return true;
	}
	global $db;
	$query = "SELECT * FROM `Favorites` WHERE `favoritorAccountId` = ".$favoritor." and `favoritedAccountId` = ".$favoritee;

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return true;
		}
	}
	return false;
}

function favorite($favorite)
{
	$query = "INSERT INTO `liveportal`.`Favorites` (`favId`, `favoritorAccountId`, `favoritedAccountId`, `favoritedTime`) VALUES (NULL, '".$_SESSION['userId']."', '".$favorite."', CURRENT_TIMESTAMP)";

	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode add Favorite: %s\n", mysqli_error($db));
	}
}

function unfavorite($unfavorite)
{
	//should not be able to favorite yourself
	if ($_SESSION['userId'] == $unfavorite)
	{
		return true;
	}
	global $db;
	$query = "DELETE FROM `Favorites` WHERE `favoritorAccountId` = ".$_SESSION['userId']." and `favoritedAccountId` = ".$unfavorite;

	$result = mysqli_query($db, $query);
	
	if($result != false)
	{
		return true;
	}
	return false;
}

//favorite a user
if (isset($_REQUEST["favoriteSubmit"]) && !favorited($_SESSION['userId'],$_REQUEST["userId"]) && isloggedin())
{
	$query = "INSERT INTO `liveportal`.`Favorites` (`favId`, `favoritorAccountId`, `favoritedAccountId`, `favoritedTime`) VALUES (NULL, '".$_SESSION['userId']."', '".$_REQUEST["userId"]."', CURRENT_TIMESTAMP)";

	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode add Favorite: %s\n", mysqli_error($db));
	}
}

//unfavorite a user
if (isset($_REQUEST["unFavoriteSubmit"]) && favorited($_SESSION['userId'],$_REQUEST["unfollowUserId"]))
{
	unfavorite($_REQUEST['unfollowUserId']);
	if (basename($_SERVER['PHP_SELF']) == "browse.php")
	{
		$location = "Location: ".basename($_SERVER['PHP_SELF']);
	}
	elseif (basename($_SERVER['PHP_SELF']) == "favorites.php")
	{
		$location = "Location: ".basename($_SERVER['PHP_SELF'])."?userId=".$_REQUEST["userId"];
	}
	else
	{
		$location = "Location: ".basename($_SERVER['PHP_SELF'])."?userId=".$_REQUEST["unfollowUserId"];
	}
	header($location);
}
#################### End Favorite Process ####################

#################### gravatar logos ####################

function getAvatar($toHash,$size)
{
	$link = "http://www.gravatar.com/avatar/".md5( strtolower( trim( $toHash ) ) )."?d=retro&s=".$size;
	return $link;
}

function getAvatarImg($toHash,$size)
{
	$link = "http://www.gravatar.com/avatar/".md5( strtolower( trim( $toHash ) ) )."?d=retro&s=".$size;
	$img = '<img src="" alt="" class="img-thumbnail" >';
	return $link;
}



#################### End gravatar logos ####################


#################### Messages ####################
function getMessageCount()
{
	global $db;
	$query = "SELECT count(*) AS count FROM `Messages` WHERE `toId` = ".$_SESSION['userId']." AND messageRead = 0";
	
	$result = mysqli_query($db, $query);
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			return $row['count'];
		}
	}
}

function sendMessage($to,$subject,$message)
{
	global $db,$errors;
	if (validMessage($subject,$message))
	{
		$query = "INSERT INTO `liveportal`.`Messages` (`messageId`, `fromId`, `toId`, `subject`, `message`, `fromDeleted`, `toDeleted`, `archived`, `messageRead`) VALUES (NULL, '".$_SESSION['userId']."', '".$to."', '".$subject."', '".$message."', '0', '0', '0', '0')";
		$result = mysqli_query($db, $query);
		if($result == false)
		{
			printf("Errorcode send message: %s\n", mysqli_error($db));
		}
			header("Location: profile.php?userId=".$to."&sent=sent");
	}
}

function validMessage($subject,$message)
{
	global $errors;
	if(strlen($subject)<3)
	{
		$errors[]="The subject must be at least 3 characters";
		return false;
	}
	elseif (strlen($message)<3)
	{
		$errors[]="The message must be at least 3 characters";
		return false;
	}
	return true;
}

#################### end Messages ####################




#################### Permissions ####################

//is u1 allowed to see the thing that u2 owns
function permitted($u1,$u2)
{


}


#################### Permissions ####################









?>









