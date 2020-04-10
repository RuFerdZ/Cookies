<?php
if(isset($_SESSION['userid'])){
    $fName = $_SESSION['fname'];
    $sName = $_SESSION['sname'];
    $userId = $_SESSION['userid'];
    $userType = $_SESSION['user_type'];
    echo "<div style = 'float: right'>";
    echo "<span style = 'text-align: right'> $fName $sName / $userType No: $userId </span>";
    echo "</div>";
}

?>