<?php
session_start();

$pagename = "Sign Up"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"mystylesheet.css\">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage
echo "<br>";
if(!isset($_SESSION['userid'])){
    echo "<form action = 'signup_process.php' method = 'post'>";

    echo "<table style = 'border-collapse:collapse'>";
    echo "<tr>";
    echo "<td> *First Name: </td> <td> <input type = 'text' name = 'firstName'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Last Name: </td> <td>  <input type = 'text' name = 'lastName'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Address: </td> <td>  <input type = 'text' name = 'address' height = '2'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Postcode: </td> <td> <input type = 'text' name = 'postcode'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Tel No: </td> <td>  <input type = 'text' name = 'telNo'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Email: </td> <td>  <input type = 'email' name = 'emailAddress'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Password: </td> <td>  <input type = 'password' name = 'password'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> *Confirm Password: </td> <td>  <input type = 'password' name = 'confirmPassword'/> </td> " ;
    echo "</tr>";
    echo "<tr>";
    echo "<td> <input type = 'submit' value='Sign Up'> </td> <td> <input type = 'reset' value = 'Clear Form'> </td>";
    echo "</tr>";

    echo "</table>";
    echo "</form>";
}else{
    echo "<p> You are already logged in to the system... </p>";
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>