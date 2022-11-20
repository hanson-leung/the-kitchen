<?php
    // set alert variable to empty
    $alert = '';

    // if error is not set, do nothing
    if (empty($_REQUEST["alert"])) {
    }
    
    // if error is set to 1, set the following error
    elseif ($_REQUEST["alert"] == 1) {
        $alert =  
            '<div class="alert">
                <p>Your changes have been noted! Please wait 24-48 hours for moderator approval.</p>
            </div>';
    
    // if error is set any number, set the following error
    } else {
        $alert =  
            '<div class="alert">
                <p>An error occurred. Please try again later.</p>
            </div>';
    }

    // searching through database
    $sql = "SELECT * FROM main_view WHERE user_id = " . $_SESSION["user_id"];
    $results = $mysql->query($sql);

    // count number of recipes made by user
    $num_results = $results->num_rows;

    $alert_2 = "";

    if ($num_results == 0) {
        $alert_2 =
            '<div class="alert">
                <p>Looks like you have not submitted any recipes yet. Help us grow our community by adding your favorites to our site. Upload them <a href="/add-dish.php" class="link">here</a>!</p>
            </div>';
    } else {
        $alert_2 =
        '<p>Here are the recipes you have contributed to our community. Thanks!</p>';
    }
?>