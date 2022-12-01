<?php
session_start();
session_unset();
    header("Location:" . $link . "/index.php?logout=1");
    exit();
?>