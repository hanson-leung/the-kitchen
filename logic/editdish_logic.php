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
        header("Location: /support/error.php?code=403");
        exit();
        }
    }
?>