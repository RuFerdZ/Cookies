<?php
include("db.php");
$userID = 1;
$receiverID = $_GET['receiverID'];
// if ($receiverID == null) {
//     $receiverID = $_GET['receiverID'];
// }
if (isset($_GET['message'])) {
    try {
        $sql = "INSERT INTO `message` (`message`, `senderID`, `receiverID`) VALUES ('" . $_GET['message'] . "', " . $userID . ", " . $_GET['receiverID'] . ")";
        $dbh->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3">
                <?php
                foreach ($dbh->query('SELECT userID,userFname,userSName from user') as $row) {
                    if ($userID == $row['userID']) {
                        continue;
                    }
                    echo '<a href=messages.php?receiverID=' . $row['userID'] . '>';
                    echo '<div class="d-flex align-items-center border border-dark p-2">';
                    echo '<i class="far fa-user-circle" style="font-size: 50px;"></i>';
                    echo '<span class="ml-4" style="font-size: 17px;">' . $row['userFname'] . ' ' . $row['userSName'] . '</span>';
                    echo '</div>';
                    echo '</a>';
                }
                ?>
            </div>
            <div class="col-sm">
                <table style="width: 100%;">
                    <?php
                    echo '<tr>';
                    echo '<th class="text-right pb-4 ">';
                    echo '<div class="border border-dark p-2 ">';
                    echo '<i class="far fa-user-circle fa-lg"></i>';
                    echo '<span class="ml-4" style="font-size: 20px;">Put a Name Here</span>';
                    echo '</div>';
                    echo '</th>';
                    echo '</tr>';
                    $sql = "SELECT message.message, message.senderID, message.receiverID, CONCAT(user.userFname, ' ', user.userSName) as receiverName FROM message INNER JOIN user ON user.userID=receiverID WHERE senderID = " . $receiverID . " or receiverID = " . $receiverID." ORDER BY `createdAt`";
    
                    foreach ($dbh->query($sql) as $row) {
                        if ($row['senderID'] ==  $receiverID) {
                            echo '<tr class="mb-2">';
                            echo '<td><span class="rounded p-2">' . $row['message'] . '</span></td>';
                            echo '</tr>';
                        } else {
                            echo '<tr class="text-right mb-2">';
                            echo '<td><span class="rounded bg-success p-2">' . $row['message'] . '</span></td>';
                            echo '</tr>';
                        }
                    }
                    ?>

                </table>
                <form method="GET">
                    <div class="input-group mb-3">
                        <input name="message" type="text" class="form-control" placeholder="Type a message" aria-label="Type a message" aria-describedby="send-message">
                        <?php
                        echo '<input type="hidden" name="receiverID" value=' . $_GET['receiverID'] . '>'
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="send-message"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <script src="https://kit.fontawesome.com/724d324fa8.js" crossorigin="anonymous"></script>
    </div>
</body>

</html>