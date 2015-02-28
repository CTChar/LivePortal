<?php
session_start();


require_once('databaseConnect.php');

function canStream($userId)
{
	global $db;

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
function sessionIsOK ()
{
    return ($_SESSION['_user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
        $_SESSION['_remote_addr'] == $_SERVER['REMOTE_ADDR']);
}


?>