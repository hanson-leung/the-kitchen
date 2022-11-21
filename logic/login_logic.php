<?php
    // set alert variable to empty
    $alert = '';

    // if error is not set, do nothing
    if (empty($_REQUEST["error"])) {
    }
    
    // if error is set to 1, set the following error
    elseif ($_REQUEST["error"] == 1) {
        $alert =  
            '<div class="error">
                <p>The username or password is incorrect. Please try again or <a href="/account/reset-password.php" class="link">reset your password</a>.</p>
            </div>';
    
    // if error is set to 2, set the following error
    } 
    elseif ($_REQUEST["error"] == 2) {
        $alert =  
            '<div class="error">
                <p>The email you entered is already in use. Please try again or <a href="/account/reset-password.php" class="link">reset your password</a>.</p>
            </div>';
    
    // if error is set to any, set the following error
    }
     else {
        $alert =  
            '<div class="error">
                <p>An error occurred. Please try again or <a href="signup.php" class="link">create an account</a>.</p>
            </div>';
    }
?>

