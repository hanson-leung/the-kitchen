<?php
// pagination settings
$page = $_REQUEST["page"];
$limit = 6;
$offset = ($page - 1) * 6;


// searching through database
    // base sql statement
    $sql = "SELECT * FROM main_view WHERE 1=1 ";

    // if user types in a search term
    if ($_REQUEST['search'] != "") {
    $sql = $sql . "AND recipe LIKE '%" . $_REQUEST["search"] . "%' ";
    }

    // if user selects a cuisine type
    if ($_REQUEST['cuisine'] != "any") {
    $sql = $sql . "AND cuisine_id = '" . $_REQUEST["cuisine"] . "' ";
    }

    // if user selects a cooking time
    if ($_REQUEST['cooking_time'] != "any") {

        // assign db column name to variable
        $sum_prepcookingtime = "total_time";

        // create array to set values equal to ranges
        $time = [
        "0" => "$sum_prepcookingtime <= 600",
        "1" => "600 < $sum_prepcookingtime <= 1800",
        "2" => "$sum_prepcookingtime > 1800",
        ];

        // parse array
        $sql = $sql . " AND " . $time[$_REQUEST['cooking_time']]. " ";
        }

    // limits number of results returned to the user
    $sql = $sql . "LIMIT " . $limit . " OFFSET " . $offset;

    $results = $mysql->query($sql);
    $num_results = $results->num_rows;

    $alert = "";

    if ($num_results == 0) {
        $alert =
            '<div class="alert">
                <p>Looks we could not find any good matches. Help us grow our community by adding your favorites recipes to our site. Upload them <a href="/add-dish.php" class="link">here</a> or try <a href="/index.php" class="link">searching again</a>!</p>
            </div>';
    } else {
        $alert =
        '<p>Enjoy the taste of our crowd-sourced recipes!</p>';
    }
?>