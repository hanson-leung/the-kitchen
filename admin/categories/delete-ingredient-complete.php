<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

// if no data is set, redirect

if (!isset($_REQUEST["ingredient"])) {
    header("Location: /admin/categories/categories.php?alert=3");
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
                header("Location: /support/error.php?code=0");
                exit();
            } elseif ($_REQUEST["confirm"] == 1) {
               echo '<a href="/admin/categories/delete-ingredient-complete.php?confirm=2&ingredient=' . $_REQUEST["ingredient"] .'" class="link">Confirm Delete</a>';
            } elseif ($_REQUEST["confirm"] == 2) {
                $sql = 'DELETE FROM ingredient WHERE ingredient_id = "' . $_REQUEST['ingredient'] .'"';
                echo $sql;
                $results = $mysql->query($sql);
                // alert that ingredient has been deleted
                header("Location: /admin/categories/categories.php?alert=1");
                exit();
        }
?>

      
    </div>
</body>
</html>
