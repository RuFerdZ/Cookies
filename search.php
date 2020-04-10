<?php
$pagename="Dental Consultancy"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headFile.html");
// php search data in mysql database using PDO
// set data in input text

$id = "";

if(isset($_POST['Find']))
{
        // connect to mysql
    include 'db.php';
    
    // id to search
    $id = $_POST['id'];
    
     // mysql search query

 $pdoQuery = "SELECT * FROM dentist WHERE fname LIKE :id OR lname LIKE :id";
	 
    $pdoResult = $dbh->prepare($pdoQuery);
    
    //set your id to the query id
	$pdoExec = $pdoResult->execute(array(":id"=>'%'.$id.'%'));
    
    
    if($pdoExec)
    {
            // if id exist 
            // show data in inputs
        if($pdoResult->rowCount()>0)
        {
            foreach($pdoResult as $row)
            {
				
               echo "<h5><br>Doctors Name :  ".$row['fname']." ".$row['lname']." - Doctor ID ".$row['dentistID']."</h5>";
            }
        }
            // if the id not exist
            // show a message and clear inputs
        else{
            echo 'No Data With This Name';
        }
    }else{
        echo 'ERROR Data Not Inserted';
    }
}

	echo "</body>";
?>

<!DOCTYPE html>
<html>
<head>
       <title> SEARCH DOCTOR'S INFO </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=3.0">
</head>
<body>
           <form action="search.php" method="post">
           Doctor's Name To Search : <input type="text" name="id" value="<?php echo $id;?>"><br><br>
			<br>
			<input type="submit" name="Find" value="Find Data">
</form>
</body>
</html>
<?php
include ("footFile.html");
?>
