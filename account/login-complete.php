<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}

include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';

sleep(0);
$email = "'" . strtolower($_REQUEST["email"]) . "'";
$password = "'" . $_REQUEST["password"] . "'";


// check if user exists
$sql = "SELECT * FROM user WHERE
    email = $email AND
    password = $password";

$results = $mysql->query($sql);

// get user id and set to variable user_id
  
            
if ($results->num_rows == 1) {
    while ($currentrow = $results->fetch_assoc()) {
        $user_id = $currentrow["user_id"];
        $security_level = $currentrow["security_level"];
        $fname = ucwords($currentrow["fname"]);
    }    

    // set session variables
    $_SESSION["logged_in"]=1;
    $_SESSION["security_level"]=$security_level;
    $_SESSION["user_id"]=$user_id;
    $_SESSION["user_fname"]=$fname;

    if (!isset($_REQUEST["signup"])) {
    header("Location:" . $link . "/index.php?logout=2");
    exit(); 
    } else {
        header("Location:" . $link . "/user/profile.php?signup=1");
        exit(); 
    }
}
    else {
    // redirect back if no match with error code
    header("Location:" . $link . "/account/login.php?error=1");
    exit();
}
?>

