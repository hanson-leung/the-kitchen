<?php
    // set alert variable to empty
    $alert = '';

    // if error is not set, do nothing
    if (empty($_REQUEST["alert"])) {
    }
    
    // if error is set to 1, set the following error
    elseif ($_REQUEST["alert"] == 1) {
        $alert =  
            '<div class="alert">
                <p>Allergy has been added!</p>
            </div>';
    
    // if error is set to 2, set the following error
    }     elseif ($_REQUEST["alert"] == 2) {
        $alert =  
            '<div class="error">
                <p>Allergy has been deleted!</p>
            </div>';
    
    // if error is set any number, set the following error
    } elseif ($_REQUEST["alert"] == 3) {
        $alert =  
            '<div class="error">
                <p>Allergy already exists!</p>
            </div>';
    
    // if error is set any number, set the following error
    } else {
        $alert =  
            '<div class="alert">
                <p>An error occurred. Please try again later.</p>
            </div>';
    }

    ?>