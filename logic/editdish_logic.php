<?php
// search db if there is a matching user id and recipe
    $sql = "SELECT * FROM recipe WHERE user_id = " . $_SESSION["user_id"] . " AND recipe_id = " . $_REQUEST["recipe"];
    $results = $mysql->query($sql);
    $num_results = $results->num_rows;

// if there are no matching results, boot them out
    if ($num_results == 0) {
        // if not a mod or admin
        if ($_SESSION["security_level"] == 0) {
         // redirect to 403 page
        header("Location:" . $link . "/support/error.php?code=403");
        exit();
        }
    }

// prevent admins from landing on a recipe that doesn't exist
    $sql = "SELECT * FROM recipe WHERE recipe_id = " . $_REQUEST["recipe"];;
    $results = $mysql->query($sql);
    $num_results = $results->num_rows;

// if there are no matching results, boot them to an error page
    if ($num_results == 0) {
        header("Location:" . $link . "/support/error.php?code=404");
        exit();
        }

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
        $status_id = $currentrow["status_id"];
        $status = $currentrow["status"];
    }      
?>