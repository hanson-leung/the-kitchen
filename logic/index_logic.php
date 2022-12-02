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
                <p></p>
            </div>';
    
    // if error is set to 2, set the following error
    } 
    elseif ($_REQUEST["error"] == 2) {
        $alert =  
            '<div class="alert">
                <p>Please enter a valid search criteria.</p>
            </div>';
    
    // if error is set to any, set the following error
    }
     else {
        $alert =  
            '<div class="error">
                <p>An error occurred. Please try again or <a href="' . $link . '/account/signup.php" class="link">create an account</a>.</p>
            </div>';
    }


    // logout alerts
    
    if (empty($_REQUEST["logout"])) {
    } elseif ($_REQUEST["logout"] == 1) {
        $alert =  
            '<div class="alert">
                <p>Logout Complete</p>
            </div>';
    } elseif ($_REQUEST["logout"] == 2) {
        $alert =  
            '<div class="alert">
                <p>Login Complete</p>
            </div>';
    }
?>