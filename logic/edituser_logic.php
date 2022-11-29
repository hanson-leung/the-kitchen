<?php
// search db if there is a matching user id and recipe
    $sql = "SELECT user_id FROM user WHERE user_id = " . $_REQUEST["user"];
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
    $sql = "SELECT * FROM user WHERE user_id = " . $_REQUEST["user"];
    $results = $mysql->query($sql);
    $num_results = $results->num_rows;

// if there are no matching results, boot them to an error page
    if ($num_results == 0) {
        header("Location:" . $link . "support/error.php?code=404");
        exit();
        }

?>