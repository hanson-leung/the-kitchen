<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// if no data is set, redirect

if (!isset($_REQUEST["ingredient"])) {
    header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=3");
    exit();
}

$sql = "INSERT INTO ingredient
            (ingredient)
            VALUES 
            ('" . $_REQUEST["ingredient"] . "')";


echo $sql;

$results = $mysql->query($sql);


// redirect once done
header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=2");
exit();
?>  

