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
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/edituser_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/misc.css" />

<!-- begin body -->

<body>
    <div class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>
        <div class="main-container small">
        <h1>Update User Profile</h1>

        <?php
        // search through main_view  where recipe_id matches, assign results to php variables
            $sql = "SELECT * from user WHERE user_id = " . $_REQUEST["user"];
            $results = $mysql->query($sql);
            while ($currentrow = $results->fetch_assoc()) {
                        $user_id =  $currentrow["user_id"];
                        $security_level = $currentrow["security_level"];
                        $phone =  $currentrow["phone"];
                        $fname = $currentrow["fname"];
                        $lname = $currentrow["lname"];
                        $email = $currentrow["email"];
                        $phone =  $currentrow["phone"];
            }      
        ?>

        <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/user/edit/update-complete.php">
            <?php
              if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
                echo '<p><strong>Admin Status</strong></p>';
                include $_SERVER['DOCUMENT_ROOT'] . '/logic/edituser_forminclude.php';
              } else {
                  echo ' <input type="hidden" name="security_level" value="' . $security_level . '">';
              }
            ?>


            <p><strong>First Name </strong></p><input type="text" name="fname" value="<?php echo $fname ?>">
            <p><strong>Last Name </strong></p><input type="text" name="lname" value="<?php echo $lname ?>">
            <p><strong>Email </strong></p><input type="text" name="email" value="<?php echo $email ?>">
            <p><strong>Phone </strong></p><input type="text" name="phone" value="<?php echo $phone ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input type="submit" name="update" value="Update" style="width:100px;">
        </form>


        <a href="<?php echo $link ?>/user/edit/delete-complete.php?confirm=1&user=<?php echo $user_id?>"><input
                type="submit" value="Delete User"></a>
    </div>
    </div>
</body>

</html>