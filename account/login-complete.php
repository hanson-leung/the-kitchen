<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';

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
    header("Location: <?php echo $link ?>/index.php");
    exit(); 
    } else {
        header("Location: <?php echo $link ?>/user/profile.php?signup=1");
        exit(); 
    }
}
    else {
    // redirect back if no match with error code
    header("Location: <?php echo $link ?>/account/login.php?error=1");
    exit();
}
?>

