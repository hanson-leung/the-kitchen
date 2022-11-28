<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';

$sql = "UPDATE user SET
            fname = '" . $_REQUEST['fname'] . "',
            lname = '" . $_REQUEST['lname'] . "',
            email = '" . $_REQUEST['email'] . "',
            phone = '" . $_REQUEST['phone'] . "',
            security_level = '" . $_REQUEST['security_level'] . "'
        WHERE user_id = " . $_REQUEST['user_id'];

echo $sql;

$results = $mysql->query($sql);


if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
    header("Location: <?php echo $link ?>/admin/users.php?alert=2");
    exit();
} else {
    header("Location: <?php echo $link ?>/user/profile.php?alert=1");
    exit();
}

?>  

