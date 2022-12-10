<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/index_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/profile_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/dish_logic.php';


?>

<html>
<!-- begin header -->
<?php
?>
    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/home.css"/>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
           echo $alert;
        ?>

    <div class="main-container" style="grid-gap: 3rem;">

        <?php

        echo $email;
        echo $recipe;

        ?>
    </div>

</body>
</html>
