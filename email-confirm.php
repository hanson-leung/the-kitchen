<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/index_logic.php';
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

    <div class="main-container" style="grid-gap: 3rem">

        <?php
            echo "<h1>" . "Your recipe was sent successfully!" . "</h1>";
        ?>

        <a href="<?php echo $link ?>index.php" style="color:var(--orange);"><u>&larr; Back to Homepage</u></a>
    </div>

</body>
</html>
