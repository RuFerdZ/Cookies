<?php
	session_start();
	include("db.php");
	$pagename="Order Confirmation"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=css/bootstrap.min.css>";
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<script src='js/jquery.slim.min.js'></script>";
	echo "<script src='js/popper.min.js'></script>";
	echo "<script src='js/bootstrap.min.js'></script>";

	
	
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	//display random text
	  

	$dentistId = $_SESSION['userId'];
	$appNo = $_SESSION['total'];
	$userId = $_SESSION['userid'];
	$appTime= date('Y-m-d H:i:s');


	try{
		$SQL = "insert into appoinment(appNo, appTime,dentistId,userId) values ('$appNo','$appTime','$dentistId','$userId')";

		$exeSQL=mysqli_query($conn, $SQL) or die(mysqli_error($conn));
		

		$arrayp=mysqli_fetch_array($exeSQL);


		echo "<p>You appointment has been confirmed </p>";
		echo "<p>You appointment  Reference Number: <b>".$appNo."</b></p>";
		echo "<p> we will mail you the  <b>".$appNo."</b></p>";

	


	}catch(Exception $e){
		echo "Error in Checkout!!";
	}	

	echo "To logout and leave the system: <a href='logout.php'>Logout</a>";

	
	include("footfile.html"); //include head layout
	echo "</body>";
?>