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
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/dish_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

        <h1><?php echo $recipe ?></h1>
        <?php echo $edit ?>
        <img src="<?php echo $img_url ?>" class="headline_img">
        <p><?php echo $cuisine ?></p>
        <p><?php echo $prep_time ?></p>
        <p><?php echo $cooking_time ?></p>
        <p><?php echo $total_time ?></p>
        <p><?php echo $recipe_url ?></p>


        <?php
        // loop through ingredient_view where recipe_id matches
            $sql_ingredient = "SELECT * from ingredient_view WHERE recipe_id = " . $_REQUEST["recipe"];
            $ingredient_results = $mysql->query($sql_ingredient);
            while ($currentrow = mysqli_fetch_array($ingredient_results)) {
                echo "<div>";
                echo   "<p>" . $currentrow["quantity"] . "</p>";
                echo   "<p>" . $currentrow["unit"] . "</p>";
                echo   "<p>" . $currentrow["ingredient"] . "</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>