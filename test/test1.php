<?php

// Connection
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'casa order project';
$db_port = 3306;

$mysqli = new mysqli(
   $db_host,
   $db_user,
   $db_password,
   $db_db
);

if ($mysqli->connect_error) {
   echo 'Errno: ' . $mysqli->connect_errno;
   echo '<br />';
   echo 'Error: ' . $mysqli->connect_error;

} else {
   echo 'Success: a proper connection to mySQL was made.';
   echo '<br />';
   echo 'Host Information: ' . $mysqli->host_info;
   echo '<br />';
   echo 'Protocol Version: ' . $mysqli->protocol_version . '<br />';
}

$string1 = 'Can you';
$string2 = ' do this?';

$string1 .= $string2;
print_r($string1);

$mysqli->close();
?>