<?php
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';

$sql = "INSERT INTO user
        (fname, lname, email, phone, password, security_level)
        VALUES 
        ('" . $_REQUEST["fname"] . "', 
        '" . $_REQUEST["lname"] . "', 
        '" . $_REQUEST["email"] . "', 
        '" . $_REQUEST["phone"] . "', 
        '" . $_REQUEST["password"] . "', 
        '" . $_REQUEST["security-level"] . "')";

$results = $mysql->query($sql);

header("Location: /account/login-complete.php?signup=1&email=" . $_REQUEST["email"] . "&password=" . $_REQUEST["password"]);
exit();

?>
