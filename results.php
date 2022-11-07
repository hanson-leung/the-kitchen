<?php
// connect to database
$host = "webdev.iyaclasses.com";
$user = "hansonle";
$pw = "AcadDev_Leung_5214698370";
$dbname = "hansonle_thekitchen";

$mysql = new mysqli(
    $host,
    $user,
    $pw,
    $dbname
);

if ($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}


    // if none set
    $sql = "SELECT * FROM main_view WHERE 1=1 ";

    if ($_REQUEST['search'] != "") {
        $sql = $sql . "AND recipe LIKE '%" . $_REQUEST["search"] . "%' ";
    }

    if ($_REQUEST['cuisine'] != "any") {
        $sql = $sql . "AND cuisine_id = '" . $_REQUEST["cuisine"] . "' ";
    }

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
        $sql = $sql . " AND " . $time[$_REQUEST['cooking_time']] . " ";
    }

    // if ($_REQUEST['ingredient'] != "any") {
    //     $sql = $sql . "AND cuisine = '" . $_REQUEST["cuisine"] . "' ";
    // }

    // echo '<pre>'; print_r($_REQUEST["ingredients"]); echo '</pre>';

    

        ?>

<!-- head -->
<head>
    <title>The Kitchen</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Find your next favorite recipe."/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- stylesheets -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
            integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="stylesheets/main.css"/>
    <link rel="stylesheet" href="stylesheets/results.css"/>
</head>
<body>
    <div  class="root">
    
    <?php
    include 'header.php';
    ?>
    <div class="results-container grid-gap-2rem">
    <?php
        //  Create a results variable
    $results = $mysql->query($sql);

    // // 3. parse results
    echo $sql;
    echo " There are " . $results->num_rows . " records matching your search";

        //  Making a loop
        while ($currentrow = mysqli_fetch_array($results)) {
            echo "<div class='card'>" .
            "<img src='" . $currentrow["img_url"] . "' class='card-img'>" .
                // "<a href='recipe.php?recordid=" . $currentrow["recipe_id"] . "'>Details</a>" .
                // "<a href='edit_recipe.php?recordid=" . $currentrow["recipe_id"] . "'>Edit</a>" .
                "<h2>" . $currentrow["recipe"] . "</h2>" .
                "<p>" . ($currentrow["total_time"]/60) . " min</p></div>";
        }
    ?>
    </div>
    </div>
</body>