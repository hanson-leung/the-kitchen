<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
    $link = "<?php echo $link ?>";
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// if no data is set, redirect

if (!isset($_REQUEST["ingredient"])) {
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
               echo '<a href="<?php echo $link ?>/admin/categories/delete-ingredient-complete.php?confirm=2&ingredient=' . $_REQUEST["ingredient"] .'" class="link">Confirm Delete</a>';
            } elseif ($_REQUEST["confirm"] == 2) {
                $sql = 'DELETE FROM ingredient WHERE ingredient_id = "' . $_REQUEST['ingredient'] .'"';
                echo $sql;
                $results = $mysql->query($sql);
                // alert that ingredient has been deleted
                header("Location: <?php echo $link ?>/admin/categories/categories.php?alert=1");
                exit();
        }
?>

      
    </div>
</body>
</html>
