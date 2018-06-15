<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 4/1/18
 * Time: 6:00 PM
 */

require 'log.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'stargazer_profiles');

// Create connection
//$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    write_log("Connection successful.");
}
