<?php
session_start();
session_unset();
    header("Location: <?php echo $link ?>/index.php?logout=1");
    exit();
?>