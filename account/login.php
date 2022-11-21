<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

    <!-- additional stylesheets -->
    <link rel="stylesheet" href="../../stylesheets/login.css"/>


<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container">
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
            <form class="signup grid-rows grid-gap-2rem" action="/account/login-complete.php">
                <!-- search -->
                <div id="email">
                    <input class="" type="email" name="email" placeholder="Email" required/>
                </div>
                <div id="password">
                    <input class="" type="text" name="password" placeholder="Password" required/>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>

</body>
</html>