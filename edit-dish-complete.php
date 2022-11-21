<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// check user security level, and allow for immediate or delayed publishing
$status = "1";

if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
        // immediately published
        $status = $_REQUEST['status'];
}

$sql = "UPDATE recipe SET
            recipe = '" . $_REQUEST['recipe'] . "',
            cuisine_id = '" . $_REQUEST['cuisine'] . "',
            prep_time = '" . $_REQUEST['prep_time'] . "',
            cooking_time = '" . $_REQUEST['cooking_time'] . "',
            img_url = '" . $_REQUEST['img_url'] . "',
            recipe_url = '" . $_REQUEST['recipe_url'] . "',
            status_id = '" . $status . "'
        WHERE recipe_id = " . $_REQUEST['recipe_id'];

echo $sql;

$results = $mysql->query($sql);


if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
    header("Location: /admin/recipe-check.php?alert=2");
    exit();
} else {
    header("Location: /user/user-recipes.php?alert=1");
    exit();
}

?>  

