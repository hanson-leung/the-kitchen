<?php
session_start();
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


<!-- begin body -->
<body>
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
            <a href="/admin/recipe-check.php" class="card">
            <p>There are <?php echo $num_results ?> reviews awaiting approval</p>
            </a>
        </div>

         <!-- card container -->
        <div class="grid-columns grid-gap-2rem">
            <a href="/admin/recipe-list.php" class="card">
                <p>Modify Recipes</p>
            </a>

            <a href="/admin/recipe-check.php" class="card">
                <p>Modify Categories</p>
            </a>

            <a href="/admin/users.php" class="card">
                <p>Modify Users</p>
            </a>

            <a href="/admin/recipe-check.php" class="card">
                <p>View Insights</p>
            </a>
        </div>
    </div>

</body>
</html>
