<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
?>

<html>
<!-- begin header -->

<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>stylesheets/allergies.css"/>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

        <form action="<?php echo $link ?>/user/allergies/add-allergy-complete.php">
            <select name="ingredient">
                <?php
                $sql = "SELECT * FROM ingredient";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                echo "<option value='" . $currentrow["ingredient_id"] . "'>" . $currentrow["ingredient"] . "</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
            <br>
            <input type="submit" value="Add" style = "width:100px;">
        </form>
    </div>
</body>
</html>