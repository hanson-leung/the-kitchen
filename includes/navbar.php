<div class="header">
    <a href="/index.php">
        <img class="logo" src="/uploads/branding/logo2.png" alt="logo" />
    </a>

    <?php
    // display menu for account holders
    if (isset($_SESSION['logged_in'])) {
        if ($_SESSION['logged_in'] == 1) {
        echo
        '<div>
            <div id="dropdown-parent">
                <p>Hi ' . $_SESSION['user_fname'] . '</p>
                <a href="#" class="menu">
                    <p>Menu</p>
                </a>
            </div>
            <div id="dropdown" class="grid-rows grid-gap-2rem">
                <a href="/user/profile.php">
                    Account
                </a>
                <a href="/user/user-recipes.php">
                    Your Recipes
                </a>
                <a href="/add-dish.php">
                    Add Recipes
                </a>';

            if ($_SESSION['logged_in'] == 1 && $_SESSION['security_level'] >= 1) {
                echo
                '
                    <a href="/admin/admin-dashboard.php">
                        Admin Panel
                    </a>
                ';
            }

            echo
                '<a href="/account/logout-complete.php">
                    Log Out
                </a>
            </div>
        </div>';
        } 
    }

    // display menu for guests
    else {
    echo 
    '<div class="grid-columns grid-end grid-gap-2rem">
        <div class="text" id="login" >
            <a href="/account/login.php" id="loginbutton">Login</a>
        </div>

        <a href="/account/signup.php" class="no-declaration">
            <button id="signup">Sign Up</button>
        </a>
    </div>';
    }
    ?>
</div>

<!-- toggle menu on click -->
<script>
    $(".menu").on("click", function(){
        $("#dropdown").toggleClass("active");
    })
</script>