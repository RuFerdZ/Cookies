<?php
session_start();
include("db.php");

$pagename="Clear smart basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=css/bootstrap.min.css>";
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";

include ("headfile.html"); //include header layout file
echo "<script src='js/jquery.slim.min.js'></script>";
echo "<script src='js/popper.min.js'></script>";
echo "<script src='js/bootstrap.min.js'></script>";


echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
unset($_SESSION['basket']);


echo"<p>No Doctor appointments selected</P>";

include("footfile.html"); //include head layout
echo "</body>";
?>