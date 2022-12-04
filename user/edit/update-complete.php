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
    header("Location:" . $link . "/admin/users.php?alert=2");
    exit();
} else {
    header("Location:" . $link . "/user/profile.php?alert=1");
    exit();
}

?>  

