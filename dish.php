<?php
session_start();
// check if on localhost or on server
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
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

?>

<!-- begin body -->
<body>
<div class="root">
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
                    <a style = "width:100%;" href="<?php echo $recipe_url ?>" target="_blank"><input type="submit" value="See the full recipe" ></a>
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
                echo "<li><p class='detailp'>" . $currentrow["quantity"] . " " . $currentrow["unit"] . " " . $currentrow["ingredient"] . "</p></li>";
                echo "</ul></div>";
            }

            $recipeName = $recipe;

            ?>

            <br><br>
            <hr>
            <p class="detailheader">Share this Recipe</p>

            <?php
            if(empty($_REQUEST["destinationemail"])) {
            ?>
                <form class="signup grid-rows"
                      action="<?php echo $link ?>email-confirm.php" method="get">
                    <br>

                    <div id="email">
                        <input class="" type="email" name="destinationEmail" placeholder="example@gmail.com" required/>
                        <br>
                    </div>

                    <br><br>
                    <p class="detailp" style="line-height: 2.5em">What should we include:</p>
                    <div style="font-family: Helvetica; line-height: 30px; padding-left: 1em">

                        <input type="checkbox" id="emailChoice0" name="receive" value="cuisine"/>
                        <label for="contactChoice1">Cuisine</label>
                        <br>

                        <input type="checkbox" id="emailChoice1" name="receive" value="link"/>
                        <label for="contactChoice1">Recipe URL</label>
                        <br>

                        <input type="checkbox" id="emailChoice2" name="receive" value="prepTime"/>
                        <label for="contactChoice2">Prep Time</label>
                        <br>

                        <input type="checkbox" id="emailChoice3" name="receive" value="cookTime"/>
                        <label for="contactChoice2">Cook Time</label>
                        <br>

                        <input type="checkbox" id="emailChoice4" name="receive" value="totalTime"/>
                        <label for="contactChoice2">Total Time</label>
                        <br>

                        <input type="checkbox" id="emailChoice5" name="receive" value="ingredients"/>
                        <label for="contactChoice2">Ingredients</label>
                        <br><br>
                    </div>

                    <input type="submit" value="Send Email"/>
                </form>
            <?php

    } else {
        // form was submitted so email results

        $to = "nhso@usc.edu";
        $subject = "Ingredients for: " . "recipe" ;
        $message = "testing";
        $from = "thekitchenbot@gmail.com";
        $headers = "FROM: The Kitchen < thekitchenbot@gmail.com>";
        $test = mail($to,$subject,$message,$headers);

        if ($test == 1) {
            echo "Thank  You. Your email was sent.";
            echo "<br><br><em>(Server response: " . $test . ")</em> ";
            echo "<hr>Email string:" . "mail($to,$subject,$message,$headers)";
        } else {
            echo "ERROR. |" , $test . "| Your email was not sent.";
            // probably should send email to webmaster that there was a problem.
        }
        exit();
    }
    ?>
<!--

                    <form class="signup grid-rows"
                          action="">
                        <br>

                        <div id="email">
                            <input class="" type="email" name="destinationEmail" placeholder="example@gmail.com" required/>
                            <br>
                        </div>

                        <br><br>
                        <p class="detailp" style="line-height: 2.5em">What should we include:</p>
                        <div style="font-family: Helvetica; line-height: 30px; padding-left: 1em">

                            <input type="checkbox" id="emailChoice0" name="receive" value="cuisine"/>
                            <label for="contactChoice1">Cuisine</label>
                            <br>

                            <input type="checkbox" id="emailChoice1" name="receive" value="link"/>
                            <label for="contactChoice1">Recipe URL</label>
                            <br>

                            <input type="checkbox" id="emailChoice2" name="receive" value="prepTime"/>
                            <label for="contactChoice2">Prep Time</label>
                            <br>

                            <input type="checkbox" id="emailChoice3" name="receive" value="cookTime"/>
                            <label for="contactChoice2">Cook Time</label>
                            <br>

                            <input type="checkbox" id="emailChoice4" name="receive" value="totalTime"/>
                            <label for="contactChoice2">Total Time</label>
                            <br>

                            <input type="checkbox" id="emailChoice5" name="receive" value="ingredients"/>
                            <label for="contactChoice2">Ingredients</label>
                            <br><br>
                        </div>

                        <input type="submit" value="Send Email"/>
                    </form>
                    --><?php
            /*                    // END of form... now close "if" branch...
                            } else {
                                // form was submitted so email results

                                $to = "nhso@usc.edu"; // populated by form
                                // this would be the permanent address  you want all feedback to go to.
                                $subject = "Ingredients for: " . $recipe; // from the form

                                $message = $_REQUEST["userfeedback"]; // from the form
                                $from = "thekitchenbot@gmail.com"; // from the form
                                $headers = "From: $from"; // create a header entry for "FROM" field of email
                                $headers = "From:$from"; // create a header entry for "FROM" field of email
                                $headers = "FROM: The Kitchen < thekitchenbot@gmail.com>";
                                // More complicated "FROM" field that has name <email> syntax
                                $test = mail($to, $subject, $message, $headers);

                                if ($test == 1) {
                                    echo "Thank  You. Your email was sent.";
                                    echo "<br><br><em>(Server response: " . $test . ")</em> ";
                                    echo "<hr>Email string:" . "mail($to,$subject,$message,$headers)";
                                } else {
                                    echo "ERROR. |", $test . "| Your email was not sent.";
                                    // probably should send email to webmaster that there was a problem.
                                }
                                exit();
                            }*/
            ?>
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