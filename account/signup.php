<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_logic.php';
?>
<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/signup.css"/>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container small">
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
                    <input type="submit" style="width:auto;"/>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
