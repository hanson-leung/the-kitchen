<?php

// searching through database
    $sql = "SELECT * FROM user WHERE user_id = " . $_SESSION["user_id"];
    $results = $mysql->query($sql);
        while ($currentrow = $results->fetch_assoc()) {
        $email = $currentrow["email"];
        $phone = $currentrow["phone"];
    }   

    
$alert = "";

if(isset($_REQUEST["signup"])) {
    $alert =
        '<div class="alert">
            <p>Thanks for joining. Start by customizing your <a href="/user-allergies.php" class="link">allergy profile</a>.</p>
        </div>';
}
?>