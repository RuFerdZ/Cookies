<?php
	session_start();
	include('db.php');

	$userid = $_SESSION['userid'];
	$docid = $_POST['docid'];
	$star = $_POST['rating-star2'];
	$review = $_POST['text'];

	echo "<br> Rating: ";
	echo $star;
	echo " out of 5";
	echo "<br> Message: ";
	echo $review;

	try {
		$sql = "INSERT INTO review (dentistID, userID, starReviews,message)
				VALUES (" . $docid . ", " . $userid . ", " . $star . ",'" . $review . "')";
		$dbh->exec($sql);
		echo "Review Added Successfully";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
 
?>