<?php

$host = "liveportal.gq";
$user = "rdb05250";
$password = "uG0hacor3If#";
$database = "rdb05250_liveportal";


$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";




DEFINE ('DB_USER', 'rdb05250');

DEFINE ('DB_PASSWORD', 'uG0hacor3If#');

DEFINE ('DB_HOST', 'liveportal.gq');

DEFINE ('DB_NAME', 'rdb05250_liveportal');




?>