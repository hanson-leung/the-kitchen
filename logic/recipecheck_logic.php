<?php
    // set alert variable to empty
    $alert = '';

    // if error is not set, do nothing
    if (empty($_REQUEST["alert"])) {
    }
    
    // if error is set to 1, set the following error
    elseif ($_REQUEST["alert"] == 2) {
        $alert =  
            '<div class="alert">
                <p>Recipe status updated!</p>
            </div>';
    
    // if error is set any number, set the following error
    } else {
        $alert =  
            '<div class="alert">
                <p>An error occurred. Please try again later.</p>
            </div>';
    }

    // searching through database
    $sql = "SELECT * FROM main_view WHERE status_id = 1";
    $results = $mysql->query($sql);

    // count number of recipes made by user
    $num_results = $results->num_rows;

    ?>