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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/profile_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- additional stylesheets --!>
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/profile.css"/>


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
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?> </h1>
            <p style="color: var(--orange)"><strong>Account Info:</strong></p>
            <p><strong>Name:</strong> <?php echo $fname ." " .  $lname ?></p>
            <p><strong>Email: </strong><?php echo $email ?></p>
            <p><strong>Phone: </strong><?php echo $phone ?></p>
            <!-- <p><?php echo print_r($_SESSION); ?></p> --!>
            <p><strong>Profile</strong></p>
            <a href="<?php echo $link ?>/user/edit/edit.php?user=<?php echo $user_id ?>" class="link">Update Profile</a>
            <p><strong>Recipes</strong></p>
            <a href="<?php echo $link ?>/user/user-recipes.php" class="link">Your Recipes</a>
            <p><strong>Allergies</strong></p>
            <a href="<?php echo $link ?>/user/allergies/user-allergies.php" class="link">Your Allergies</a>
        </div>
    </div>

</body>
</html>


