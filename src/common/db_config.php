<?php

//Obsolete
//require '../misc/log.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'stargazer_db');

// Create connection
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
//    write_log("Connection successful.");
}