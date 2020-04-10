<?php
	session_start();
	include('db.php');

	$userid =$_POST['userid'];
	$docid = $_POST['docid'];
	$star = $_POST['rating-star2'];
	$review = $_POST['text'];

	echo "<br> Rating: ";
	echo $star;
	echo " out of 5";
	echo "<br> Message: ";
	echo $review;

	$sql = "INSERT INTO review (dentistID, userID, starReviews,message)
			VALUES ('$docid', '$userid', '$star','$review')";

	if ($dbh->query($sql) === TRUE) {
	    echo "Review Added Successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $dbh->error;
	}
 
?>