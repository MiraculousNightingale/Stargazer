<?php
require_once 'db_config.php';
// Create connection
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}