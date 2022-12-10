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
?>

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>stylesheets/misc.css"/>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>
        <div class="main-container small">
        <div class="gap-2rem">
            <h1>Add Recipes</h1>
            <p>Feeling inspired? Add your own recipe and give back to the community!</p>
        </div>
        <form action="<?php echo $link ?>/add-dish-complete.php" class="grid-rows grid-gap-2rem">
            <input type="text" name="recipe" placeholder="Recipe Name">
            <input type="text" name="prep_time" placeholder="Prep Time (Min)">
            <input type="text" name="cooking_time" placeholder="Cooking Time (Min)">
            <input type="text" name="recipe_url" placeholder="Recipe Link">
            <input type="text" name="img_url" placeholder="Image Link">
            <p><strong>Cuisine</strong></p>
            <select name="cuisine">
                <?php
                $sql = "SELECT * FROM cuisine";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                echo "<option value='" . $currentrow["cuisine_id"] . "'>" . $currentrow["cuisine"] . "</option>";
                }
                ?>
            </select>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
            
            <input type="submit" value="Add Recipe" style = "width:auto;">
            
        </form>
    </div>
    </div>
</body>
</html>