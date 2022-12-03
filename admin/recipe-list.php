<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/recipelist_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
adminOnly();
?>

<html>
<!-- begin header -->

    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/results.css"/>

<!-- insert php logic -->
<?php

?>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>
        <div class="main-container">
        <!-- welcome text -->
        <div class="gap-2rem">
        <h1>Modify Recipes</h1>
        </div>
        <div class="grid-gap-2rem">
            <p>There are <?php echo $num_results ?> recipes. Click on each recipe to modify.</p>
</div>
 
        <div class="results-container2 grid-gap-2rem">
            <?php
                //  loop through results
                while ($currentrow = mysqli_fetch_array($results)) {
                        $recipe_id = $currentrow["recipe_id"];
                        $recipe = $currentrow["recipe"];
                        $img_url = $currentrow["img_url"];
                        $cuisine =  $currentrow["cuisine"];
                        $prep_time =  $currentrow["prep_time"];
                        $cooking_time =  $currentrow["cooking_time"];
                        $total_time = $currentrow["total_time"];
                        $recipe_url = $currentrow["recipe_url"];
                        $total_time = ($currentrow["total_time"]/60) . " min";

                        echo
                        "<a class='card' href='" . $link . "/edit-dish.php?recipe=" . $recipe_id . "'>" .
                            "<img src='" . $img_url . "' class='card-img'>" .
                            "<h2>" . $cuisine . "</h2>" .
                            "<p>" . $recipe_url . "</p>" .
                            "<p>" . $prep_time . "</p>" .
                            "<p>" . $cooking_time . "</p>" .
                            "<p>" . $total_time . "</p>
                        </a>";
                }
            ?>
        </div>

        <!-- next/prev page buttons -->
        


    </div>
</script>
</body>
</html>