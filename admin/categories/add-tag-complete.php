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
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// if no data is set, redirect

if (!isset($_REQUEST["tag"])) {
    header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=3");
    exit();
}

$sql = "INSERT INTO tag
            (tag)
            VALUES 
            ('" . $_REQUEST["tag"] . "')";


echo $sql;

$results = $mysql->query($sql);


// redirect once done
header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=2");
exit();
?>  

