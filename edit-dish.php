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
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/editdish_logic.php';
?>

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/misc.css"/>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>
        
        <div class="main-container small">
        <div class="grid-rows grid-gap-2rem">
            <h1>Update Recipe</h1>
            <p>Feeling creative? Customize recipes to create a personalized dish!</p>
        </div>
        
        
        
        <form action="<?php echo $link ?>/edit-dish-complete.php" class="grid-rows grid-gap-2rem">
            <?php
              if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
                echo '<p><strong>Status</strong></p>';
                include $_SERVER['DOCUMENT_ROOT'] . '/logic/editdish_forminclude.php';
              } else {
                  echo ' <input type="hidden" name="status" value="1">';
              }
            ?>
            
            
            <p><strong>Dish</strong></p><input type="text" name="recipe" value="<?php echo $recipe ?>">
            <p><strong>Prep Time</strong></p><input type="text" name="prep_time" value="<?php echo $prep_time ?>">
            <p><strong>Cooking Time</strong></p><input type="text" name="cooking_time" value="<?php echo $cooking_time ?>">
            <p><strong>Recipe Link</strong></p><input type="text" name="recipe_url" value="<?php echo $recipe_url ?>">
            <p><strong>Image Link</strong></p><input type="text" name="img_url" value="<?php echo $img_url ?>">
            
            <p><strong>Cuisine</strong></p><select name="cuisine">
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
            <input type="submit" name="update" value="Update" style="width:auto;">
        </form>
        
        
        
        <a href="<?php echo $link ?>/delete-dish-complete.php?confirm=1&recipe=<?php echo $_REQUEST["recipe"]?>"><input type = "submit" value = "Delete Recipe"></a>
        
        
        


        <!-- <h2>Ingredients</h2>
        <form action="<?php echo $link ?>edit-dish-complete.php">
            <select name="cuisine">
                <option value="<?php echo $ingredients ?>" selected><?php echo $cuisine ?></option>
                <?php
                $sql = "SELECT * FROM cuisine";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                    echo "<option value='" . $currentrow["ingredients"] . "'>" . $currentrow["cuisine"] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id ?>">
            <input type="submit" name="update" value="Update">
        </form>
        <div id="extra_field" style="display: none">
            <input type="text" name="item[]" placeholder="check list item" class="input-text">
        </div>
         -->


    </div>
    </div>
</body>
</html>