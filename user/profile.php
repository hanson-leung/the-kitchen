<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/profile_logic.php';
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

        <?php
            echo $alert;
        ?>

    <div class="main-container">
        <div class="gap-2rem">
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?></h1>
        </div>
        <p>Account Info</p>
            <p><?php echo $fname ." " .  $lname ?></p>
            <p><?php echo $email ?></p>
            <p><?php echo $phone ?></p>
            <p><?php echo print_r($_SESSION); ?></p>
            <a href="/user/edit/edit.php?user=<?php echo $user_id ?>" class="link">Update Profile</a>
        </div>
        <p>Recipes</p>
            <a href="/user/user-recipes.php" class="link">Your Recipes</a>
        </div>
    </div>

</body>
</html>
