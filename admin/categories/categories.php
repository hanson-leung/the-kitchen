<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/categories_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<link rel="stylesheet" href="/<?php echo $link ?>stylesheets/login.css"/>


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
            <h1>View Categories</h1>
            
        </div>

        <?php
            echo $alert;
        ?>

  <!-- card container -->
        <div class="topcontainer">
            <div class="grid-rows grid-gap-2rem">
                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/delete-cuisine-complete.php">
                    <p><strong>Cuisine</strong></p><select name="cuisine">
                        <?php
                        $sql = "SELECT * FROM cuisine";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["cuisine_id"] . "'>" . $currentrow["cuisine"] . "</option>";
                        }
                        ?>
                    </select>

                    <input type="hidden" name="confirm" value="1">
                    <input value="Delete" type="submit" style="width:auto;">
                </form>

                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/add-cuisine-complete.php">
                    <input type="text" required placeholder="Cuisine Name" name="cuisine">
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>
            
            <div class="grid-rows grid-gap-2rem">
                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/delete-tag-complete.php">
                <p><strong>Tag</strong></p><select name="tag">
                        <?php
                        $sql = "SELECT * FROM tag";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["tag_id"] . "'>" . $currentrow["tag"] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="confirm" value="1">
                    <input value="Delete" type="submit" style="width:auto;">
                </form>

                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/add-tag-complete.php">
                    <input type="text" required placeholder="Tag Name" name="tag">
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>

            <div class="grid-rows grid-gap-2rem">
                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/delete-ingredient-complete.php">
                <p><strong>Ingredients</strong></p><select name="ingredient">
                        <?php
                        $sql = "SELECT * FROM ingredient";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["ingredient_id"] . "'>" . $currentrow["ingredient"] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="confirm" value="1">
                    <input value="Delete" type="submit" style="width:auto;">
                </form>

                <form class="grid-rows grid-gap-2rem" action="<?php echo $link ?>/admin/categories/add-ingredient-complete.php">
                    <input type="text" required placeholder="Ingredient Name" name="ingredient">
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>
        </div>

    </div>

</body>
                    
</html>
