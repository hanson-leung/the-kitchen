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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// if no data is set, redirect

if (!isset($_REQUEST["cuisine"])) {
    header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=3");
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
                header("Location: <?php echo $link ?>/support/error.php?code=0");
                exit();
            } elseif ($_REQUEST["confirm"] == 1) {
               echo '<a href="<?php echo $link ?>/admin/categories/delete-cuisine-complete.php?confirm=2&cuisine=' . $_REQUEST["cuisine"] .'" class="link">Confirm Delete</a>';
            } elseif ($_REQUEST["confirm"] == 2) {
                $sql = 'DELETE FROM cuisine WHERE cuisine_id = "' . $_REQUEST['cuisine'] .'"';
                echo $sql;
                $results = $mysql->query($sql);
                // alert that cuisine has been deleted
                header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=1");
                exit();
        }
?>

      
    </div>
</body>
</html>
