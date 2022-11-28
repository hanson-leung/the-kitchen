<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/recipelist_logic.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
adminOnly();
?>

<html>
<!-- begin header -->

    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/recipe-list.css"/>

<!-- insert php logic -->
<?php

?>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

<p>There are 
    <?php
     echo $num_results;
    ?>
 results.</p>

        <div class="results-container grid-gap-2rem">
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
                        "<a class='card' href='<?php echo $link ?>/edit-dish.php?recipe=" . $recipe_id . "'>" .
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
        <div class="grid-rows grid-gap-2rem">
            <button onclick="nextpage()">
                Next Page
            </button>
            <button onclick="prevpage()">
                Previous Page
            </button>
        </div>


    </div>
</script>
</body>
</html>