<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
    $link = "<?php echo $link ?>";
}
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

        <form action="add-dish-complete.php">
            <input type="text" name="recipe" placeholder="Recipe Name">
            <input type="text" name="prep_time" placeholder="Prep Time">
            <input type="text" name="cooking_time" placeholder="Cooking Time">
            <input type="text" name="recipe_url" placeholder="Link to Recipe">
            <input type="text" name="img_url" placeholder="Image URL">
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
            <input type="submit" value="Add Recipe">
        </form>
    </div>
</body>
</html>