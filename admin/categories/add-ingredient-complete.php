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
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// if no data is set, redirect

if (!isset($_REQUEST["ingredient"])) {
    header("Location:" . $link . "/admin/categories/categories.php?alert=3");
    exit();
}

$sql = "INSERT INTO ingredient
            (ingredient)
            VALUES 
            ('" . $_REQUEST["ingredient"] . "')";


echo $sql;

$results = $mysql->query($sql);


// redirect once done
header("Location:" . $link . "/admin/categories/categories.php?alert=2");
exit();
?>  

