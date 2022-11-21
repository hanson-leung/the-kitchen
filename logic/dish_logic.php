<?php

// search through main_view  where recipe_id matches, assign results to php variables
    $sql_recipe = "SELECT * from main_view WHERE recipe_id = " . $_REQUEST["recipe"];
    $recipe_results = $mysql->query($sql_recipe);
    while ($currentrow = $recipe_results->fetch_assoc()) {
        $img_url = $currentrow["img_url"];
        $recipe = $currentrow["recipe"];
        $cuisine =  $currentrow["cuisine"];
        $prep_time =  $currentrow["prep_time"];
        $cooking_time =  $currentrow["cooking_time"];
        $total_time = $currentrow["total_time"];
        $recipe_url = $currentrow["recipe_url"];
        $user_id = $currentrow["user_id"];
    }     


$edit = "";

// if logged in, and created recipe, allow to edit
if ($_SESSION["logged_in"] == 1 && $_SESSION["user_id"] == $user_id || $_SESSION["security_level"] >= 1) {
     $edit = "<a href='edit-dish.php?recipe=" . $_REQUEST["recipe"] . "' class='link'>Edit</a>";
} else {

}
?>