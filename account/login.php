<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/login.css"/>


<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container small">
        <div class="gap-2rem">
            <h1>Log in</h1>
            <p>
                The Kitchen
            </p>
        </div>

        <!-- display errors, if any exist; see login_logic.php to edit -->
        <?php
            echo $alert;
        ?>
        
        <div class="searchbox grid-rows grid-gap-2rem">
            <form class="signup grid-rows grid-gap-2rem" action="<?php echo $link ?>/account/login-complete.php">
                <!-- search -->
                <div id="email">
                    <input class="" type="email" name="email" placeholder="Email" required/>
                </div>
                <div id="password">
                    <input class="" type="text" name="password" placeholder="Password" required/>
                </div>
                <div>
                    <input type="submit" style="width:auto;">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
