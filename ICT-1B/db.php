<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'w1743064_0';

//creating a DB connection
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

//displaying a message if the connection fails
if(!$conn){
    die('Could not connect : '.mysqli_error($conn));
}

//select the database
mysqli_select_db($conn, $dbname);

?>