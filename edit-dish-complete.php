<?php
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';

$sql = "UPDATE recipe SET
            recipe = '" . $_REQUEST['recipe'] . "',
            cuisine_id = '" . $_REQUEST['cuisine'] . "',
            prep_time = '" . $_REQUEST['prep_time'] . "',
            cooking_time = '" . $_REQUEST['cooking_time'] . "',
            img_url = '" . $_REQUEST['img_url'] . "',
            recipe_url = '" . $_REQUEST['recipe_url'] . "',
            status = '1'
        WHERE recipe_id = " . $_REQUEST['recipe_id'];

echo $sql;

$results = $mysql->query($sql);

header("Location: /user/user-recipes.php?alert=1");
exit();

?>
