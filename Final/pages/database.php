<?php 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'garcierl');
define('DB_PASSWORD', 'claudette quills emery scheduled');
define('DB_NAME', 'garcierl_db');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}