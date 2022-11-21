<?php
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';

// check if same email exists
$sql = "SELECT email FROM user WHERE email = '" . $_REQUEST["email"] . "'";
echo $sql;
$results = $mysql->query($sql);

// count number of recipes made by user
$num_results = $results->num_rows;

if ($num_results == 0) {
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
} else {
    header("Location: /account/signup.php?error=2");
    exit();
};

?>
