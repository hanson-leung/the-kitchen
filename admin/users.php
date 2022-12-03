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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/users_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

 <!-- additional stylesheets -->
 <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/profile.css"/>
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
            <h1>View Users</h1>
            <p>There are <?php echo $num_results ?> accounts</p>
        </div>

        <?php
            echo $alert;
        ?>

        <!-- card container -->
        <div class="bigcontainer">

                    <?php
                //  loop through results
                while ($currentrow = mysqli_fetch_array($results)) {
                        $user_id = $currentrow["user_id"];
                        $fname = $currentrow["fname"];
                        $lname = $currentrow["lname"];
                        $email = $currentrow["email"];
                        $phone =  $currentrow["phone"];
                        $security_level =  $currentrow["security_level"];

                        echo
                        "<div class='container'><a class='card' href='" . $link . "/user/edit/edit.php?user=" . $user_id . "'>" .
                            "<p>" . $fname . " " . $lname . "</p>" .
                            "<p>" . $email . "</p>" .
                            "<p>" . $phone . "</p>" .
                            "<p>" . $security_level . "</p>" .
                        "</a></div>";
                }
            ?>
        </div>

         <!-- card container -->

    </div>

</body>
</html>
