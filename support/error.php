<?php
session_start();
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

    if ($_REQUEST["code"] == "403") {
        $error = "403 Forbidden Access";
        $desc = "The page your are trying to access has restricted access.";
        $action = "Please <a href='<?php echo $link ?>/account/login.php' class='link'>login</a> to see this page.";
    } elseif ($_REQUEST["code"] == "404") {
        $error = "404 Page Not Found";
        $desc = "The page your are looking for cannot be found or may be been moved.";
        $action = "Let's take you <a href='<?php echo $link ?>/index.php' class='link'>home</a>.";
    } else {
        $error = "An Unknown Error Occurred";
        $desc = "It's not your fault, something is going on. Please try again in a few minutes.";
        $action = "Let's take you <a href='<?php echo $link ?>/index.php' class='link' >home</a>.";
    }


?>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container">
        <h1><?php echo $error ?></h1>
        <p><?php echo $desc ?></p>
        <p><?php echo $action ?></p>
    </div>

</body>
</html>
