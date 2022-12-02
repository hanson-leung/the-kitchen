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
<link rel="stylesheet" href="stylesheets/results.css"/>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/dish_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/profile_logic.php';
?>

<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div id="maincontainer">
        <div id="titlebutton">
            <p class="cusine"> <?php echo $cuisine ?></p>
            <div id="title">
        <h1><?php echo $recipe ?></h1>
                <img src="<?php echo $img_url ?>" class="headline_img">
                </div>

        </div><!--close titlebutton-->


        <?php echo $edit ?>

        <div id="detailbox">
            <div id="url">
                <button type="button" class="orange white">
                    <a href="<?php echo $recipe_url ?>" target="_blank">See the Full Recipe</a>
                </button>
            </div>
            <br>
            <div id="cooktime">
                <p class="detailheader">Recipe Time</p><br>
                <p class="detailp">Prep Time: <?php echo $prep_time ?> Mins</p>
                <p class="detailp">Cooking Time: <?php echo $cooking_time ?> Mins</p>
                <p class="detailp orangetext">Total Time: <?php echo $total_time ?> Mins</p>
            </div>
    <br>
            <p class="detailheader">Ingredients</p>
        <?php
        // loop through ingredient_view where recipe_id matches
            $sql_ingredient = "SELECT * from ingredient_view WHERE recipe_id = " . $_REQUEST["recipe"];
            $ingredient_results = $mysql->query($sql_ingredient);
            
            while ($currentrow = mysqli_fetch_array($ingredient_results)) {
                echo "<div><ul>";
                echo   "<li><p class='detailp'>" . $currentrow["quantity"] . " " . $currentrow["unit"] . " " . $currentrow["ingredient"] . "</p></li>";
                echo "</ul></div>";
            }
        ?>


        <form action="<?php echo $link ?>email-confirm.php" method="get">

            <div style="width:25%">
                <input type="submit" value="Email me"/>
            </div>
        </form>



        </div><!--close detailbox-->
    </div><!--close maincontainer-->

    </div>
</body>
</html>