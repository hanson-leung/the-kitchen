<?php
// get # of recipes
    $sql = "SELECT COUNT(recipe) AS recipe_count FROM main_view";
    $results = $mysql->query($sql);

    $currentrow = mysqli_fetch_array($results);
    $total_recipes = $currentrow['recipe_count'];

// get # of users


// get top contributor
    $sql = "SELECT fname, COUNT(fname) AS `top_contrib` FROM main_view GROUP BY fname ORDER BY `top_contrib` DESC LIMIT 1";
    $results = $mysql->query($sql);

    $currentrow = mysqli_fetch_array($results);
    $top_contributor = $currentrow['fname'];
    $top_contributor_submissions = $currentrow['top_contrib'];


// get popular search terms
    $sql = "SELECT dv_search, COUNT(dv_search) AS `search_num` FROM dv_search GROUP BY dv_search ORDER BY `search_num` DESC LIMIT 3";
    $search_results = $mysql->query($sql);

// get popular recipes
    $sql = "SELECT recipe dv_recipe, COUNT(dv_recipe) AS `recipe_num` FROM dv_recipe_view GROUP BY dv_recipe ORDER BY `recipe_num` DESC LIMIT 3";
    $recipe_results = $mysql->query($sql);
?>