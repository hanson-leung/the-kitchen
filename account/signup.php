<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_logic.php';
?>


<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container">
        <div class="gap-2rem">
            <h1>Join Us</h1>
            <p>
                The Kitchen
            </p>
        </div>

        <?php echo $alert ?>

        <div class="searchbox grid-rows grid-gap-2rem">
            <form class="signup grid-rows grid-gap-2rem" action="<?php echo $link ?>/account/signup-complete.php">
                <!-- search -->
                <div id="fname">
                    <input class="" type="text" name="fname" placeholder="First Name" required/>
                </div>
                <div id="lname">
                    <input class="" type="text" name="lname" placeholder="Last Name" required/>
                </div>
                <div id="email">
                    <input class="" type="email" name="email" placeholder="Email" required/>
                </div>
                <div id="phone">
                    <input class="" type="tel" name="phone" placeholder="Phone" required/>
                </div>
                <div id="password">
                    <input class="" minlength="8" type="text" name="password" placeholder="Password" required/>
                </div>
                <div id="security-level">
                    <input class="" type="hidden" name="security-level" value="0" required/>
                </div>
                <div id="submit" >
                    <input type="submit"/>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
