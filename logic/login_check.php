<?php
if($_SESSION["logged_in"]!=1) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}

// to use moderator or admin check functions, insert the function name after the logic_check.php include code

function moderatorOnly() {
    if($_SESSION["security_level"]!=1 || $_SESSION["security_level"]!=2) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}
}

function adminOnly() {
    if($_SESSION["security_level"]!=2) {
    // redirect to 403 page
    header("Location: /support/error.php?code=403");
    exit();
}
}



// allow mods and admins to see

function moderatorView($codeToVerify) {
    if($_SESSION["security_level"]==1 || $_SESSION["security_level"]==2) {
    echo $codeToVerify;
}
}

function adminView($codeToVerify) {
    if($_SESSION["security_level"]!=2) {
        $code;
}
}

?>