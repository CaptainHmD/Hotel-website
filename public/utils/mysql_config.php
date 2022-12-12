<?php
/* Database credentials.*/
define('DB_SERVER', '172.104.152.80');
define('DB_USERNAME', 'hotel_management_user');
define('DB_PASSWORD', getenv("MYSQL_UNI_HOTEL_USER_PASS"));
define('DB_NAME', 'hotel_management_system');
 
/* Attempt to connect to MySQL database */
$mysqli_conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli_conn === false){
    die("ERROR: Could not connect. " . $mysqli_conn->connect_error);
}
?>
