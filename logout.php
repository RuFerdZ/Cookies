<?php
session_start();


$pagename = "Log Out"; //create and populate a variable called $pagename
echo "<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
if(isset($_SESSION['userid'])){
    echo "<p> Thank you for logging out... Wishing to see you again </p>";
    //freeing all the set session variables
    session_unset();
    //destroying all the data that is related to the session
    session_destroy();
    echo "<p> You are now logged out of the system </p>";
}else{
    echo "<p> You are not logged in in order to log out...<p>";
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>