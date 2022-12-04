<?php



// search through main_view  where recipe_id matches, assign results to php variables
    $sql_recipe = "SELECT * from main_view WHERE recipe_id = " . $_REQUEST["recipe"];
    $recipe_results = $mysql->query($sql_recipe);
    while ($currentrow = $recipe_results->fetch_assoc()) {
        $img_url = $currentrow["img_url"];
        $recipe = $currentrow["recipe"];
        $cuisine =  $currentrow["cuisine"];
        $prep_time =  $currentrow["prep_time"] / 60;
        $prep_time = round($prep_time, 1);
        $cooking_time = $currentrow["cooking_time"] / 60;
        $cooking_time = round($cooking_time, 1);
        $total_time = $currentrow["total_time"] / 60;
        $total_time = round($total_time, 1);
        $recipe_url = $currentrow["recipe_url"];
        $user_id = $currentrow["user_id"];
    }     

    
    $edit = "";
    // run if user is logged in
    if(isset($_SESSION["logged-in"])) {
        // if logged in, and created recipe, allow to edit
        if ($_SESSION["logged_in"] == 1 && $_SESSION["user_id"] == $user_id || $_SESSION["security_level"] >= 1) {
            $edit = "<a href='" . $link . "/edit-dish.php?recipe=" . $_REQUEST["recipe"] . "' class='link'>Edit</a>";
        } 
    }

?>