<?php
session_start();
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
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
        <div class="gap-2rem">
            <h1>Reset Password</h1>
            <p>
                The Kitchen
            </p>
        </div>

        <div class="searchbox grid-rows grid-gap-2rem">
            <form class="signup grid-rows grid-gap-2rem" action="signup-complete.php">
                <!-- search -->
                <div id="email">
                    <input class="" type="email" name="email" placeholder="Email" required/>
                </div>
                <div id="submit" >
                    <input type="submit"/>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
