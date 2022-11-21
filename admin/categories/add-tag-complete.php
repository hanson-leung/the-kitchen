<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// if no data is set, redirect

if (!isset($_REQUEST["tag"])) {
    header("Location: /admin/categories/categories.php?alert=3");
    exit();
}

$sql = "INSERT INTO tag
            (tag)
            VALUES 
            ('" . $_REQUEST["tag"] . "')";


echo $sql;

$results = $mysql->query($sql);


// redirect once done
header("Location: /admin/categories/categories.php?alert=2");
exit();
?>  

