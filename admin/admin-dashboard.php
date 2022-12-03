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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/admindashboard_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- additional stylesheets -->


<!-- begin body -->
<body style="background-image: url('../uploads/branding/Background\ _ver3.jpg');
      background-position: top;
      background-repeat: no-repeat;
      background-size: cover;"
>
    <div  class="root">
        <!-- insert navbar -->
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container">
        <!-- welcome text -->
        <div class="gap-2rem">
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?></h1>
        </div>

        <!-- card container -->
        <div class="grid-columns grid-gap-2rem">
            
            <p>There are <a href="<?php echo $link ?>/admin/recipe-check.php" class="link"><strong><?php echo $num_results ?> reviews </strong></a> awaiting approval</p>
            
        </div>

         <!-- card container -->
        <div class="grid-columns grid-gap-2rem">
            <a href="<?php echo $link ?>/admin/recipe-list.php" class="link3">
                <p>Modify Recipes</p>
            </a>

            <a href="<?php echo $link ?>/admin/categories/categories.php" class="link3">
                <p>Modify Categories</p>
            </a>

            <a href="<?php echo $link ?>/admin/users.php" class="link3">
                <p>Modify Users</p>
            </a>

            <a href="<?php echo $link ?>/admin/data/insights.php" class="link3">
                <p>View Insights</p>
            </a>
        </div>
    </div>

</body>
</html>
