<?php
$db_host 		= 'localhost';
$db_user 		= 'root';
$db_password 	= '';
$db_name 		= 'nico';
$db = new mysqli($db_host , $db_user ,$db_password, $db_name);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>