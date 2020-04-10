<?php
session_start();
include ('db.php');

$pagename = "Your Login Results"; //create and populate a variable called $pagename
echo "<link rel = \"stylesheet\" type = \"text/css\" href = css/bootstrap.min.css">"; //call in stylesheet

echo "<title>".$pagename."</title>"; //display the name of the page as window title

echo "<body>";

include ("headfile.html");   //include header layout file

echo "<h4>".$pagename."</h4>";  //display the name of the page on the webpage

//checking if both fields are not empty
if(isset($_POST['emailAddress']) && ($_POST['password'])){

    //checking if email is in the correct format
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if(preg_match($regex, $_POST['emailAddress'])){
        $email = mysqli_real_escape_string($conn, $_POST['emailAddress']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $sql = "SELECT * from users where userEmail = '$email'";
        $exeSQL = mysqli_query($conn, $sql) or die;
        if (!$exeSQL) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $arrayu = mysqli_fetch_array($exeSQL);

        if(!isset($arrayu['userEmail'])){
            echo "<p> The email is not registered with Hometeq </p>";
            echo "<p> If you are a new user: <a href = 'signup.php'> Sign Up </a> </p>";
            echo "<p> If you want to log in again: <a href = 'login.php'> Log In </a> </p>";
        }else{
            if($arrayu['userPassword'] != $password){
                echo "<p> The password you have entered for your account is incorrect </p>";
                echo "<p> Try logging in again: <a href = 'login.php'> Log In </a> </p> ";
            }else{
                $_SESSION['userid'] = $arrayu['userId'];
                $_SESSION['usertype'] = $arrayu['userType'];
                $_SESSION['fname'] = $arrayu['userFName'];
                $_SESSION['sname'] = $arrayu['userSName'];

                $fName = $_SESSION['fname'];
                $sName = $_SESSION['sname'];
                $type = $_SESSION['usertype'];

                echo "<p> You have successfully logged in </p>";
                echo "<p> Welcome $fName $sName </p>";
                if($type == "Hometeq Customer"){
                    $_SESSION['user_type'] = 'Customer';
                    echo "<p> You have logged in as a $type.";
                    echo "<p> Continue shopping for <a href = 'index.php'> HomeTeq Shopping Site </a> </p>";
                    echo "<p> View your <a href = 'basket.php'> Smart Basket </a> </p>";
                }else if($type == "Admin"){
                    $_SESSION['user_type'] = 'Administrator';
                    echo "<p> You have logged in as <b>Admin</b> </p>";
                    echo "<p> Go to home page: <a href = 'index.php'> HomeTeq Shopping Site </a> </p>";
                }

            }
        }


    }else{
        echo "<p> The email you have entered is not in the correct format </p>";
        echo "<p> Click <a href = 'login.php'> Log In </a> to log in again </p>";

    }

}else{
    echo "<p> At least one of the field is empty... Please try again. </p>";
    echo "<p> Click <a href = 'login.php'> Log In </a> to log in again </p>";
}


include ("footfile.html"); //include footer layout

echo "</body>";
?>
