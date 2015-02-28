<?php

$_SESSION['_user_agent'] = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['_remote_addr'] = $_SERVER['REMOTE_ADDR'];


require_once('databaseConnect.php');
require_once('functions.php');

#username and password variables from login.php
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";	
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";	

if (checkCredentials($username,$password))
{
echo ("username: ".$username ."<br> password: ". $password);
}
else{
echo ("false");
}


//generate the test password
//echo password_hash("test", PASSWORD_DEFAULT)."\n";

#######login Functions#########

function login()
{
	
}

function logout()
{
	
}

function isLoggedIn()
{
	
}


function hashPassword()
{
	
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
			//$crypt_pass = crypt($password, $row["password"]);
			if (password_verify($password, $row["password"]))
			{
				return true;
			}
			//if($row["password"] == $crypt_pass)
			if($row["password"] == $password)
			{
				//return true;
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
function validPass()
{
	
	return true;
}

#checks to see that the email is valid
function validEmail()
{
	
	return true;
}

#checks to see that the username is valid
function validUsername()
{
	
	return true;
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