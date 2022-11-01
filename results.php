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
    $sql = "SELECT * FROM recipe WHERE 1=1 ";

    if ($_REQUEST['search'] != "") {
        $sql = $sql . "AND recipe LIKE %'" . $_REQUEST["search"] . "'% ";
    }

    if ($_REQUEST['cuisine'] != "all") {
        $sql = $sql . "AND cuisine = '" . $_REQUEST["cuisine"] . "' ";
    }

    // if ($_REQUEST['professor'] != "all") {
    //     $sql = $sql . "AND professor = '" . $_REQUEST["professor"] . "' ";
    // }

    // if ($_REQUEST['location'] != "all") {
    //     $sql = $sql . "AND location = '" . $_REQUEST["location"] . "' ";
    // }

    // if ($_REQUEST['course_start'] != "all") {
    //     $sql = $sql . "AND course_start = '" . $_REQUEST["course_start"] . "' ";
    // }

    // if ($_REQUEST['course_end'] != "all") {
    //     $sql = $sql . "AND course_end = '" . $_REQUEST["course_end"] . "' ";
    // }

    //  Create a results variable
    $results = $mysql->query($sql);

    // 3. parse results
    echo $sql;
    echo " There are " . $results->num_rows . " records matching your search";

        // //  Making a loop
        // while ($currentrow = mysqli_fetch_array($results)) {
        //     echo "<div class='column'>" .
        //         "<a href='detail_classdrilldown.php?recordid=" . $currentrow["main_id"] . "'>[Details]</a>" .
        //         "<a href='edit_classdrilldown.php?recordid=" . $currentrow["main_id"] . "'>[Edit]</a>" .
        //         "<div>" . $currentrow["course_name"] . "</div>" .
        //         "<div>" . $currentrow["course_start"] . "</div>" .
        //         "<div>" . $currentrow["meeting_date"] . "</div></div>";
        // }
        ?>