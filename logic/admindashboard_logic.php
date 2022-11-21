    <?php
    
    // searching through database
    $sql = "SELECT * FROM main_view WHERE status_id = 1";
    $results = $mysql->query($sql);

    // count number of recipes made by user
    $num_results = $results->num_rows;

    ?>
