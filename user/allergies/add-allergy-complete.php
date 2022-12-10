<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


$sql = "SELECT * FROM user_ingredient_xref WHERE user_id = ". $_REQUEST["user_id"] . " AND ingredient_id = " . $_REQUEST["ingredient"];

$results = $mysql->query($sql);

// check if it already exists
$num_results = $results->num_rows;

if ($num_results >= 1) {
    header("Location:" . $link . "/user/allergies/user-allergies.php?alert=3");
    exit();
} else {
    $sql = "INSERT INTO user_ingredient_xref
            (user_id, ingredient_id)
            VALUES 
            ('" . $_REQUEST["user_id"] . "', 
            '" . $_REQUEST["ingredient"] . "')";

    echo $sql;

    $results = $mysql->query($sql);

    header("Location:" . $link . "/user/allergies/user-allergies.php?alert=1");
    exit();
}
?>

