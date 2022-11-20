<?php
if($_SESSION["logged_in"]!=1) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}

// to use moderator or admin check functions, insert the function name before the logic_check.php include code

function moderatorCheck() {
    if($_SESSION["security_level"]<=1) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}
}

function adminCheck() {
    if($_SESSION["security_level"]<=2) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}
}
?>