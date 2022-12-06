<?php
session_start();
// check if on localhost or on server
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
?>

<html>
<link rel="stylesheet" href="stylesheets/results.css"/>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/dish_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';

?>

<!-- begin body -->
<body>
<div class="root">
    <!-- insert navbar -->
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
    ?>

    <div id="maincontainer">
        <div id="titlebutton" class="">
            <p class="cusine" style="padding-bottom: 1rem"> <?php echo $cuisine ?></p>
            <div id="title">
                <h1><?php echo $recipe ?></h1>
                <img src="<?php echo $img_url ?>" class="headline_img">
            </div>

        </div><!--close titlebutton-->


        <?php echo $edit ?>

        <div id="detailbox">
            <div id="url">
                    <a style = "width:100%;" href="<?php echo $recipe_url ?>" target="_blank"><input type="submit" value="See the full recipe ⎘" ></a>
                </button>
            </div>
            <br>
            <div id="cooktime">
                <h2 class="detailheader">Recipe Time</h2><br>
                <p class="detailp">Prep Time: <?php echo $prep_time?> Mins</p>
                <p class="detailp">Cooking Time: <?php echo $cooking_time?> Mins</p>
                <p class="detailp orangetext">Total Time: <?php echo $total_time?> Mins</p>
            </div>
            <br>

            <?php
            $recipeTime = ["<strong><ul><li>Prep Time:</strong> $prep_time Mins</li>",
                "<strong><li>Cooking Time:</strong> $cooking_time Mins</li>",
                "<strong><li>Total Time:</strong> $total_time Mins</li></ul>"
            ];
            $formatRecipeTime = implode(", ", $recipeTime)."<br>";
            $formatRecipeTime = str_replace(',', '', $formatRecipeTime);

            ?>

            <h2 class="detailheader">Ingredients</h2>
            <?php
            // loop through ingredient_view where recipe_id matches

            $allIngredients = [];
            $sql_ingredient = "SELECT * from ingredient_view WHERE recipe_id = " . $_REQUEST["recipe"];
            $ingredient_results = $mysql->query($sql_ingredient);

            while ($currentrow = mysqli_fetch_array($ingredient_results)) {
                echo "<div>";
                echo "<p class='detailp'><ul><li>" . $currentrow["quantity"] . " " . $currentrow["unit"] . " " . $currentrow["ingredient"] . "</li></ul></p>";
                echo "</div>";

                array_push($allIngredients, "<ul><li>" . $currentrow["quantity"] . " " . $currentrow["unit"] . " " . $currentrow["ingredient"] . "</li></ul>");
            }


            $formatAllIngredients = implode(", ", $allIngredients)."<br>";
            $formatAllIngredients = str_replace(',', '', $formatAllIngredients);

            ?>

            <br><br>
            
            <h2 class="detailheader">Share this Recipe</h2>
            <br><br>

            <?php

            if(empty($_REQUEST["destinationemail"])) {
                ?>
                <form class="signup grid-rows" action="" method="post">
                    <div id="email">
                        <input class="" type="text" name="destinationemail" placeholder="example@gmail.com" required/>
                        <br><br>
                    </div>

                    <div style="width:25%">
                        <input type="submit" value="Send Email"/>
                    </div>
                </form>
                <?php

            } else {
                // form was submitted so email results

                $to = $_REQUEST["destinationemail"];
                $subject = "Ingredients for " . $recipe . "";
                $url = $recipe_url;
                $message = "Recipe name: " . $recipe . "\r ";
                $message .= "Cuisine name: " . $cuisine . "\r ";
                $message .= "Recipe URL: " . $recipe_url . "\r ";
                $message .= "Time: " . $formatRecipeTime . "\r ";
                $message .= "Ingredients: " . $formatAllIngredients . "\r ";
                $from = "thekitchenbot@gmail.com";
                $headers = "FROM: The Kitchen < thekitchenbot@gmail.com>";
                $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r ";
                $test = mail($to,$subject,$message,$headers);

                if ($test == 1) {
                    ?>
                    <p>
            <?php
                    echo "<h3>Thank You! The following email was sent:</h3>";
                    echo "<br><br>";
                    echo "<hr><p>Email string: " . "mail($to,$subject,$message,$headers</p>";
                    ?>
                        <br><br>
                    <div id="url">
                        <a style = "width:100%;" href="<?php echo $link ?>/index.php"><input type="submit" value="Back to Homepage" style="background-color: var(--orange); color:white;"></a>
                        </button>
                    </div>
                        <?php
                } else {
                    echo "ERROR. |" , $test . "| Your email was not sent.";
                }
                exit();
            }
            ?>
                    </p>


        </div>

        <!--<form action="<?php /*echo $link */ ?>email.php">
            <div style="width:25%">
                <br>
                <input type="submit" value="Share"/>
            </div>
        </form>-->

    </div><!--close detailbox-->
</div><!--close maincontainer-->

</div>
</body>
</html>