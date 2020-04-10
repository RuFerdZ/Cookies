<?php
session_start();
include ('db.php');

$pagename = "Your Sign Up Results"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = css/bootstrap.min.css>"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//initiating the variables
if(isset($_POST['firstName'])&& $_POST['lastName'] && $_POST['address'] && $_POST['postcode'] && $_POST['telNo'] && $_POST['emailAddress'] && $_POST['password'] && $_POST['confirmPassword']){
         
    if($_POST['password'] == $_POST['confirmPassword']){

        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if(preg_match($regex, $_POST['emailAddress'])){

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $address =$_POST['address'];
                $postcode =$_POST['postcode'];
                $telNo =$_POST['telNo'];
                $emailAddress =$_POST['emailAddress'];
                $password = $_POST['password'];
                $type = "Hometeq Customer";

                    $sql = "INSERT INTO users (userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('{$type}','{$firstName}', '{$lastName}', '{$address}', '{$postcode}', '{$telNo}', '{$emailAddress}', '{$password}')";
                    $executeQuery = mysqli_query($conn, $sql);
                    $errNo = mysqli_errno($conn);
                    
                    //if errNo is 0, then all clear for registration
                    if($errNo == 0){
                        echo "<p> You have successfully registered to Hometeq </p>";
                        echo "<p> Access the Log In page: <a href = 'login.php'> Log In </a> </p>";
                    }else{
                        echo "<p> There is an error in the registration </p>";
                        if($errNo == 1062){
                            echo "<p> Email you are registering with already exists </p>";
                            echo "<p> Click <a href = 'signup.php' style = 'color:black'> Sign Up </a> to register again </p>";

                        }else if($errNo == 1064){
                            echo "<p> Invalid characters have been entered. Please register again </p>";
                            echo "<p> Click <a href = 'signup.php' style = 'color:black'> Sign Up </a> to register again </p>";
                        }
                    }

        }else{
            echo "<p> The email is not in the correct format </p>";
            echo "<p> Click <a href = 'signup.php' style = 'color:black'> Sign Up </a> to register again </p>";

        }
                    
    }else{
             echo "<p> The passwords don't match </p>";
             echo "<p> Click <a href = 'signup.php' style = 'color:black'> Sign Up </a> to register again </p>";

         }
 }else{
     echo "<p>Atleast one field is empty &nbsp</p> <p> <a href = 'signup.php' style = 'color: black'> Click here to Sign Up </a> again </p>";
 }


include ("footfile.html"); //include footer layout

echo "</body>";
?>
