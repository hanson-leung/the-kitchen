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
// check if user created dish, or is mod or admin
include $_SERVER['DOCUMENT_ROOT'] . '/logic/editdish_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
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
               echo '<a href="<?php echo $link ?>/delete-dish-complete.php?confirm=2&recipe=' . $_REQUEST["recipe"] .'" class="link">Confirm Delete</a>';
            } elseif ($_REQUEST["confirm"] == 2) {
                $sql = 'DELETE FROM recipe WHERE recipe_id = "' . $_REQUEST['recipe'] .'"';
                echo $sql;
                $results = $mysql->query($sql);
                // alert that recipe has been deleted
                header("Location: <?php echo $link ?>/user/user-recipes.php?alert=3");
                exit();
        }
?>

      
    </div>
</body>
</html>
