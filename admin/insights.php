<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
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
        
        <!-- top card container -->
        <div class="grid-columns grid-gap-2rem">
            <a href="/admin/recipe-check.php" class="card top">
                <p>There are X total recipes</p>
            </a>

            <a href="/admin/recipe-check.php" class="card top">
                <p>X is the top contributor</p>
            </a>

            <a href="/admin/recipe-check.php" class="card top">
                <p>X is the most popular recipe</p>
            </a>
        </div>

        <!-- bottom card container -->
        <div class="grid-columns grid-gap-2rem">
            <a href="/admin/recipe-check.php" class="card">
                <p>There are 4 reviews awaiting approval</p>
            </a>

            <a href="/admin/recipe-check.php" class="card">
                <p>There are 4 reviews awaiting approval</p>
            </a>
        </div>
    </div>

</body>
</html>
