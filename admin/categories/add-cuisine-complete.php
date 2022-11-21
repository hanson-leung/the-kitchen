<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// if no data is set, redirect

if (!isset($_REQUEST["cuisine"])) {
    header("Location: /admin/categories/categories.php?alert=3");
    exit();
}

$sql = "INSERT INTO cuisine
            (cuisine)
            VALUES 
            ('" . $_REQUEST["cuisine"] . "')";


echo $sql;

$results = $mysql->query($sql);


// redirect once done
header("Location: /admin/categories/categories.php?alert=2");
exit();
?>  

