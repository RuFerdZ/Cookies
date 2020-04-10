<?php
	$dbuser = 'cookies';
	$dbpass = 'NoCookies4U';
    try {
        $dbh = new PDO('mysql:host=128.199.253.218;dbname=CookieJar', $dbuser, $dbpass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
    // foreach ($dbh->query('SELECT * from dentist') as $row) {
    //     print_r($row);
    // }
?>