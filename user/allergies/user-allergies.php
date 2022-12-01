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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/userallergy_logic.php';
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
           echo $alert;
        ?>



        <?php
            // searching through database
            $sql = "SELECT * FROM allergy_view WHERE user_id = " . $_SESSION["user_id"];
            $results = $mysql->query($sql);
            while ($currentrow = mysqli_fetch_array($results)) {
                echo "<div>";
                echo   "<p>" . $currentrow["ingredient"] . "</p>";
                echo "</div>";
            }
        ?>
        <a href='<?php echo $link ?>/user/allergies/add.php' class="link">Add Allergy</a>
    </div>
</body>
</html>
