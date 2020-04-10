<?php
session_start();
include ('db.php');

$pagename = "Your Login Results"; //create and populate a variable called $pagename
echo "<link rel='stylesheet' type='text/css' href=css/bootstrap.min.css>"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//checking if both fields are not empty
if(isset($_POST['emailAddress']) && ($_POST['password'])){
        $email =$_POST['emailAddress'];
        $password = $_POST['password'];

        try {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $stmt = $dbh->prepare("SELECT * from user where userEmail = '$email'");
        // $stmt->execute();

        // set the resulting array to associative
        // $arrayu = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $sql = "SELECT * from user where userEmail = '". $email ."'";
            foreach ($dbh->query($sql) as $arrayu) {
            // foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
                if(!isset($arrayu['userEmail'])){
                    echo "<p> The email is not registered with Dental Consultancy </p>";
                    echo "<p> If you are a new user: <a href = 'signup.php'> Sign Up </a> </p>";
                    echo "<p> If you want to log in again: <a href = 'signup.php'> Log In </a> </p>";
                }else{
                    if($arrayu['userPassword'] !== $password){
                        echo "<p> The password you have entered for your account is incorrect </p>";
                        echo "<p> Try logging in again: <a href = 'home.php'> Log In </a> </p> ";
                    }else{
                        $_SESSION['userid'] = $arrayu['userId'];
                        $_SESSION['usertype'] = $arrayu['userType'];
                        $_SESSION['fname'] = $arrayu['userFName'];
                        $_SESSION['sname'] = $arrayu['userSName'];
        
                        $fName =$arrayu['userFName'];
                        $sName = $arrayu['userSName'];
                        $type =  $arrayu['userType'];
        
                        echo "<p> You have successfully logged in </p>";
                        echo "<p> Welcome $fName $sName</p>";
                        echo "<p> Visit<a href = 'home.php'> Dental Consultancy Home Page </a> to book your appointment.</p>";
                        }
                }
        
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
}else{
    echo "<p> At least one of the field is empty... Please try again. </p>";
    echo "<p> Click <a href = 'login.php'> Log In </a> to log in again </p>";
}

include ("footfile.html"); //include footer layout

echo "</body>";
?>
