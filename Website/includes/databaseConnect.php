<?php

session_start();

/*
$host = "liveportal.gq";
$user = "rdb05250_live";
$password = "b3XfYkqSKzOqLDaP59Ho";
$database = "rdb05250_liveportal";
*/


$host = "server.liveportal.gq";
$user = "liveportal";
$password = "password";
$database = "liveportal";


$db = new mysqli($host, $user, $password, $database);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

//echo $db->host_info . "\n";



?>