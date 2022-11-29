<?php
// redirect if no search terms exist
if (empty($_REQUEST["page"])) {
    header("Location: ' . $link . '/index.php?error=2");
    exit(); 
}



// pagination settings
$page = $_REQUEST["page"];
$limit = 8;
$offset = ($page - 1) * $limit;

// sql pagination string
$sql_pagination = "LIMIT " . $limit . " OFFSET " . $offset;


// searching through database
    // base sql statement, only showing recipes with a status of 2 (have been approved)
    $sql = "";
    $sql_base = "SELECT * FROM main_view WHERE status_id = '2' ";
    $sql_conditional = "";

    // if user types in a search term
    if ($_REQUEST['search'] != "") {
    $sql_conditional = $sql_conditional . "AND recipe LIKE '%" . $_REQUEST["search"] . "%' ";
    }

    // if user selects a cuisine type
    if ($_REQUEST['cuisine'] != "any") {
    $sql_conditional = $sql_conditional . "AND cuisine_id = '" . $_REQUEST["cuisine"] . "' ";
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
        $sql_conditional = $sql_conditional . " AND " . $time[$_REQUEST['cooking_time']]. " ";
        }

    // limits number of results returned to the user
    $sql = $sql_base . $sql_conditional . $sql_pagination;

    $results = $mysql->query($sql);
    $num_results = $results->num_rows;

    // add count
    $sql_base = "SELECT COUNT(recipe) AS count FROM main_view WHERE status_id = '2' ";
    $sql = $sql_base . $sql_conditional;
    $count = $mysql->query($sql);

    $currentrow = mysqli_fetch_array($count);
    $total_count = $currentrow['count'];


    // display depending on num of matches
    $alert = "";

    if ($num_results == 0) {
        $alert =
            '<div class="alert">
                <p>Looks we could not find any good matches. Help us grow our community by adding your favorites recipes to our site. Upload them <a href="' . $link . '/add-dish.php" class="link">here</a> or try <a href="' . $link . '/index.php" class="link">searching again</a>!</p>
            </div>';
    } else {
        $alert =
       '<p> We found ' . $total_count . ' crowd-sourced recipes for you to enjoy!</p>';
    }
    

    // pagination setting

    // determine number of required pages

    // $total_pages ceil ($total_count / $limit);
    // if (!isset ($_GET['page']) ) {  
    //     $page_number = 1;  
    // } else {  
    //     $page_number = $_GET['page'];  
    // }    

    // $initial_page = ($page_number-1) * $limit;  
    // $getQuery = "SELECT *FROM Countries LIMIT " . $initial_page . ',' . $limit;  

    //     for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

    //     echo '<a href = "index.php?page=' . $page_number . '">' . $page_number . ' </a>';  

    // }    
?>