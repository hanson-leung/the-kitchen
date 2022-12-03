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
            <div>
                <form action="<?php echo $link ?>/admin/categories/delete-cuisine-complete.php">
                    <p><strong>Cuisine<select name="cuisine"></strong></p>
                        <?php
                        $sql = "SELECT * FROM cuisine";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["cuisine_id"] . "'>" . $currentrow["cuisine"] . "</option>";
                        }
                        ?>
                    </select>

                    <input type="hidden" name="confirm" value="1">
                    <br>
                    <br>
                    <input value="Delete" type="submit" style="width:auto;">
                </form>
                <form action="<?php echo $link ?>/admin/categories/add-cuisine-complete.php">
                    <input type="text" name="cuisine">
                    
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>
            
            <div>
                <form action="<?php echo $link ?>/admin/categories/delete-tag-complete.php">
                <p><strong>Tag<select name="tag"></strong></p>
                        <?php
                        $sql = "SELECT * FROM tag";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["tag_id"] . "'>" . $currentrow["tag"] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="confirm" value="1">
                    <br>
                    <br>
                    <input value="Delete" type="submit" style="width:auto;">
                </form>
                <form action="<?php echo $link ?>/admin/categories/add-tag-complete.php">
                    <input type="text" name="tag">
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>

            <div>
                <form action="<?php echo $link ?>/admin/categories/delete-ingredient-complete.php">
                <br><br><p><strong>Ingredients<select name="ingredient"></strong></p>
                        <?php
                        $sql = "SELECT * FROM ingredient";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["ingredient_id"] . "'>" . $currentrow["ingredient"] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="confirm" value="1">
                    <br>
                    <br>
                    <input value="Delete" type="submit" style="width:auto;">
                </form>
                <form action="<?php echo $link ?>/admin/categories/add-ingredient-complete.php">
                    <input type="text" name="ingredient">
                    <input value="Add" type="submit" style="width:auto;">
                </form>
            </div>
        </div>

    </div>

</body>
                    
</html>
