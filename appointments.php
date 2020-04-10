<?php
include("db.php");
session_start();
$pagename="Appointment Details"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=css/bootstrap.min.css>";
echo "<title>" .$pagename. "</title>"; //display name of the page as window title
echo "<body>";

include ("headFile.html");
echo "<script src='js/jquery.slim.min.js'></script>";
echo "<script src='js/popper.min.js'></script>";
echo "<script src='js/bootstrap.min.js'></script>";

if(isset($_POST['doc_Id'])){
			$deldocid = $_POST['doc_Id'];
	
			unset($_SESSION['basket'][$deldocid]);

			echo "<p>appointment removed </p>";
		}
		
if(isset($_POST['doc_Id'])){
	$newdoc_Id =$_POST['doc_Id'];
	$newdocname= $_POST['doc_name'];
	echo"Selected Doctor ID is - $newdoc_Id";
	echo"</br>";
	
	


	//create a new cell in the basket session array. Index this cell with the new product id.
	//Inside the cell store the required product quantity
	
	$_SESSION['basket'][$newdoc_Id]=$newdocname;
	//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
	echo "<p>1 item added";}
else {
	echo "basket is unchanged";
}
	$total=0;
	if(isset($_SESSION['basket'])){
     echo"<table style='width:100%'>";
			 echo"<tr>";
			
				 echo" <th>Doctor Id </th>";
				 echo" <th>Doctor  First  Name</th>";
				 echo" <th>Doctor  Last  Name</th>";
				 echo" <th>Dentist Fee</th>";
				 echo"<th>Subtotal</th>";
				 
			 echo"  </tr>";
		 
			
			foreach($_SESSION['basket'] as $index =>$value){
			$SQL="select fname, lname , rate from dentist where dentistID=$value"; 
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error()); 
			while ($arrayp=mysqli_fetch_array($exeSQL) )      
			{  
			echo"<tr>";
				
				echo" <th>$value</th>";
				echo" <th>".$arrayp['fName']."</th>";
				echo" <th> $".$arrayp['lname']."</th>";
				echo "<td> $".$arrayp['rate']."</td>";
				echo "<td> <form action='appointment.php' method='POST'> <input type='submit' value='Remove'></td>";
				echo "<input type=hidden name= value=$index> </form>";
				echo" </tr>";
	 
	        }
            }
            
         
	echo"</table>";
	echo "<a href='clearbasket.php'>Clear Basket</a>";
	}
	if(isset($_SESSION['userId'])){

		echo "<br><br>To confirm booking :  <a href='checkout.php'>Confirm Order</a>";	
	}else{
			echo "<br><br>New Patient : <a href='signup.php'>Sign-up</a>";
			echo "<br> Log In here : <a href='login.php'>Login</a>";
	}

include("footFile.html"); //include head layout
echo "</body>";

?>