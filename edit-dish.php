<?php
session_start();
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

        <?php
        // search through main_view  where recipe_id matches, assign results to php variables
            $sql_recipe = "SELECT * from main_view WHERE recipe_id = " . $_REQUEST["recipe"];
            $recipe_results = $mysql->query($sql_recipe);
            while ($currentrow = $recipe_results->fetch_assoc()) {
                $img_url = $currentrow["img_url"];
                $recipe = $currentrow["recipe"];
                $recipe_id = $currentrow["recipe_id"];
                $cuisine =  $currentrow["cuisine"];
                $cuisine_id =  $currentrow["cuisine_id"];
                $prep_time =  $currentrow["prep_time"];
                $cooking_time =  $currentrow["cooking_time"];
                $total_time = $currentrow["total_time"];
                $recipe_url = $currentrow["recipe_url"];
            }      
        ?> 

        <form action="edit-dish-complete.php">
            <input type="text" name="recipe" value="<?php echo $recipe ?>">
            <input type="text" name="prep_time" value="<?php echo $prep_time ?>">
            <input type="text" name="cooking_time" value="<?php echo $cooking_time ?>">
            <input type="text" name="recipe_url" value="<?php echo $recipe_url ?>">
            <input type="text" name="img_url" value="<?php echo $img_url ?>">
            <select name="cuisine">
                <option value="<?php echo $cuisine_id ?>" selected><?php echo $cuisine ?></option>
                <?php
                $sql = "SELECT * FROM cuisine";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                    echo "<option value='" . $currentrow["cuisine_id"] . "'>" . $currentrow["cuisine"] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id ?>">
            <input type="submit" value="Update">
        </form>



    </div>
</body>
</html>