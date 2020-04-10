<?php
session_start();

$pagename = "SignUp/Login"; //create and populate a variable called $pagename
#echo "<link rel = 'stylesheet' type = 'text/css' href = 'stylesheet.css'>"; //call in stylesheet
echo "<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>";

echo "<title>".$pagename."</title>"; //display the name of the page as window title
echo "<body>";

include ("headfile.html");   //include header layout file
include ("detectlogin.php");

echo "<br>";
echo "<h4>SignUp</h4>";  //display the name of the page on the webpage
echo "<br>";
echo "<h5>Hello! Welcome to Dental Consultancy!</h5> <br>If you are new here, please sign up for consultancy. <br><br>"; 
echo"<div id='signupForm'>";
if(!isset($_SESSION['userid'])){
    echo "<form action = 'signup_process.php' method = 'post'>";

    echo "<table style = 'border-collapse:collapse;table-layout:fixed;'>";
    echo "<tr>";
    echo "<td> *First Name: </td><td> <input type = 'text' name = 'firstName'/></td>" ;
    echo "<td></td>";
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Last Name: </td> <td>  <input type = 'text' name = 'lastName'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Address: </td> <td>  <input type = 'text' name = 'address' height = '2'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Tel No: </td> <td>  <input type = 'text' name = 'telNo'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Email: </td> <td>  <input type = 'email' name = 'emailAddress'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Password: </td> <td>  <input type = 'password' name = 'password'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> *Confirm Password: </td> <td>  <input type = 'password' name = 'confirmPassword'/> </td> " ;
    echo "</tr>";

    echo "<tr style='height:50px'>";
    echo "<td> <input type = 'submit' value='Sign Up'> </td> <td> <input type = 'reset' value = 'Clear Form'> </td>";
    echo "</tr>";

    echo "</table>";
    echo "</form>";
}else{
    echo "<p> You are already logged in to the system... </p>";
}
echo"</div>";

$login= "Login";
echo "<h4>LogIn</h4>"; 
echo "If you are an existing member, please log in for consultancy. <br>"; 
echo"<div id='loginForm'>";
echo "<br>";
if(!isset($_SESSION['userid'])){
    echo "<form action = 'login_process.php' method = 'post'>";

    echo "<table style = 'border-collapse:collapse'>";
    echo "<tr>";
    echo "<td> Email: </td> <td> <input type = 'text' name = 'emailAddress'/> </td> " ;
    echo "</tr>";
    echo "<tr style='height:50px'>";
    echo "<td> Password: </td> <td>  <input type = 'password' name = 'password'/> </td> " ;
    echo "</tr>";
    echo "<tr style='height:50px'>";
    echo "<td> <input type = 'submit' value='Log In'> </td> <td> <input type = 'reset' value = 'Clear Form'> </td>";
    echo "</tr>";
    echo "</table>";
    echo"</form>";
}else{
    echo "<p>You are already logged in to the system... </p>";
}
echo"</div>";

include ("footfile.html"); //include footer layout

echo "</body>";
?>