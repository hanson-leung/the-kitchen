<?php
session_start();
session_unset();
    header("Location: /index.php?logout=1");
    exit();
?>