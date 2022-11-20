<?php
// searching through database
    // base sql statement, only showing recipes with a status of 2 (have been approved)
    $sql = "";
    $sql_base = "SELECT * FROM main_view WHERE 1=1 ";
    $sql_conditional = "";

    // limits number of results returned to the user
    $sql = $sql_base . $sql_conditional . "ORDER BY recipe";

    $results = $mysql->query($sql);
    $num_results = $results->num_rows;
?>