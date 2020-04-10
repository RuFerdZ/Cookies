<?php
include ("db.php");  //include db.php file to connect to DB

$pagename="Dental Consultancy";

echo "<link rel=stylesheet type=text/css href=css/bootstrap.min.css>";
echo "<title>" .$pagename. "</title>";
echo "<body>";
include ("headFile.html");

$SQL = "SELECT dentistID, fname, lname, contactNo, email, address, dentistImage, rate FROM dentist";

echo "<div class='container' style='margin-top:1%;'>";
date_default_timezone_set('Asia/Colombo');
$today = date("F j, Y, g:i a"); 
echo "<p class=float-right mb-5>".$today."</p>";
echo "<h3 style='margin-bottom:2%;'>";
echo "View All Dentists Here";
echo "</h3>";
echo "<div class='card-deck pb-5'>";

//display all dentists in the database
foreach ($dbh->query($SQL) as $row) {
    echo "<div class='card'>";
        echo "<a href=appointments.php".$row['dentistID'].">";
        echo "<img class='card-img-top' src=".$row['dentistImage']." alt='Doctor image'>";
        echo "</a>";
        echo "<div class='card-body'>";
            echo "<h5 class='card-title'>Dr. ".$row['fname']. " " .$row['lname']."</h5>";
            echo "<p class='card-text'>Contact : ".$row['contactNo']."</p>";
            echo "<p class='card-text'>E-mail : ".$row['email']."</small></p>";
            echo "<p class='card-text'>Address : ".$row['address']."</small></p>";
            echo "<p class='card-text'><small class='text-muted'>Rate per session : $".$row['rate']."</small></p>";
            echo "<form method='POST' action='appointments.php'>";
                echo "<input type=submit class='btn btn-dark text-center' value = 'Book Appointment'>";
                echo "<input type=hidden name = doc_Id value = ".$row['dentistID'].">";
                echo "<input type=hidden name = doc_lName value = ".$row['lname'].">";
            echo "</form>";    
        echo "</div>";
    echo "</div>";
} 
echo "</div>";
echo "</div>"; 

echo "<script src='js/jquery.slim.min.js'></script>";
echo "<script src='js/popper.min.js'></script>";
echo "<script src='js/bootstrap.min.js'></script>";
include("footFile.html");
echo "</body>";
?>