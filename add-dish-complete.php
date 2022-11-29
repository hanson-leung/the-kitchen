<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// check user security level, and allow for immediate or delayed publishing
$status = "1";

if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
        // immediately published
        $status = "2";
}

$sql = "INSERT INTO recipe
        (recipe, cuisine_id, user_id, prep_time, cooking_time, img_url, recipe_url, status_id)
        VALUES 
        ('" . $_REQUEST["recipe"] . "', 
        '" . $_REQUEST["cuisine"] . "', 
        '" . $_REQUEST["user_id"] . "', 
        '" . $_REQUEST["prep_time"] . "', 
        '" . $_REQUEST["cooking_time"] . "', 
        '" . $_REQUEST["img_url"] . "', 
        '" . $_REQUEST["recipe_url"] . "', 
        '" . $status . "')";

echo $sql;

$results = $mysql->query($sql);


// if moderator or admin, alert that it is live
if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
    header("Location:" . $link . "/user/user-recipes.php?alert=2");
    exit();

// if normal user, alert that it is awaiting approval
} else {
    header("Location:" . $link . "/user/user-recipes.php?alert=1");
    exit();
}
?>

