<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = '/home/hansonle/public_html/acad276/the-kitchen';
    $link = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
adminOnly();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/recipecheck_logic.php';
?>

<html>
<!-- begin header -->

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/results.css"/>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>


<!-- begin body -->
<body>
    <div  class="root">
        <!-- insert navbar -->
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <div class="main-container">
        <!-- welcome text -->
        <div class="gap-2rem">
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?></h1>
        </div>
        <div class="grid-gap-2rem">  
            <p>There are currently <?php echo $num_results ?> reviews awaiting approval</p>
        </div>

        <?php
            echo $alert
        ?>
        <!-- card container -->
        <div class="results-container grid-gap-2rem">

                    <?php
                //  loop through results
                while ($currentrow = mysqli_fetch_array($results)) {
                        $recipe_id = $currentrow["recipe_id"];
                        $recipe = $currentrow["recipe"];
                        $img_url = $currentrow["img_url"];
                        $cuisine =  $currentrow["cuisine"];
                        $total_time = ($currentrow["total_time"]/60) . " min";

                        echo
                        "<div class='grid-rows grid-gap-2rem'><a class='card' href='" . $link . "/edit-dish.php?recipe=" . $recipe_id . "'>" .
                            "<img src='" . $img_url . "' class='card-img'>" .
                            "<h2>" . $recipe . "</h2>" .
                            "<p>" . $total_time . "</p></a><a href='" . $link . "/edit-dish.php?recipe=" . $recipe_id . "'><input type='submit' value='Edit Dish' style = 'width:200px;'></a></div>";
                }
            ?>
        </div>

         <!-- card container -->

    </div>

</body>
</html>
