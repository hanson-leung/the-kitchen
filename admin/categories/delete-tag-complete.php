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
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// if no data is set, redirect

if (!isset($_REQUEST["tag"])) {
    header("Location:" . $link . "/admin/categories/categories.php?alert=3");
    exit();
}
?>


<html>
<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

        <?php
            if (empty($_REQUEST["confirm"])) {
                header("Location:" . $link . "/support/error.php?code=0");
                exit();
            } elseif ($_REQUEST["confirm"] == 1) {
               echo '<a href="' . $link . '/admin/categories/delete-tag-complete.php?confirm=2&tag=' . $_REQUEST["tag"] .'" class="link">Confirm Delete</a>';
            } elseif ($_REQUEST["confirm"] == 2) {
                $sql = 'DELETE FROM tag WHERE tag_id = "' . $_REQUEST['tag'] .'"';
                echo $sql;
                $results = $mysql->query($sql);
                // alert that tag has been deleted
                header("Location:" . $link . "/admin/categories/categories.php?alert=1");
                exit();
        }
?>

      
    </div>
</body>
</html>
