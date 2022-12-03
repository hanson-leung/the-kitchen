<?php
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';


// get search url
$search_path = $_SERVER['REQUEST_URI'];

// take the url change it to results.php
$search_path = str_replace('search-analytics.php', 'results.php', $search_path);


if (isset($_REQUEST['page']) && $_REQUEST["search"]!='') {
    $sql = "INSERT INTO dv_search
            (dv_search)
            VALUES 
            ('" . $_REQUEST["search"] . "')";

    $results = $mysql->query($sql);


    header("Location:" . $search_path);
    exit();
} elseif ($_REQUEST["search"]=='') {
    header("Location:" . $search_path);
    exit();
} else {
    header("Location:" . $link . "index.php");
    exit();
};

?>
