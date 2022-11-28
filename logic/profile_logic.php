<?php
// searching through database to populate account page
    $sql = "SELECT * FROM user WHERE user_id = " . $_SESSION["user_id"];
    $results = $mysql->query($sql);
        while ($currentrow = $results->fetch_assoc()) {
        $email = $currentrow["email"];
        $phone = $currentrow["phone"];
        $fname = $currentrow["fname"];
        $lname = $currentrow["lname"];
        $user_id = $currentrow["user_id"];
    }   

// set alert for new users
$alert = "";

if(isset($_REQUEST["signup"])) {
    $alert =
        '<div class="alert">
            <p>Thanks for joining. Start by customizing your <a href="<?php echo $link ?>/user-allergies.php" class="link">allergy profile</a>.</p>
        </div>';
}

 // if error is not set, do nothing
    if (empty($_REQUEST["alert"])) {
    }
    
    // if error is set to 2, set the following error
    elseif ($_REQUEST["alert"] == 1) {
        $alert =  
            '<div class="alert">
                <p>Your profile has been updated! Changed to you name may require you to sign out and back in to take effect.</p>
            </div>';
    
    // if error is set any number, set the following error
    } 

    else {
        $alert =  
            '<div class="alert">
                <p>An error occurred. Please try again later.</p>
            </div>';
    }
?>