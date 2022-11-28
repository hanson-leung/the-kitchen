<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/logic/link_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/login_check.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/userrecipes_logic.php';
?>

<html>
<!-- begin header -->
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
        <?php echo $alert; ?>

        <div class="gap-2rem">
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?></h1>
        </div>
        
        <div>

        <?php echo $alert_2; ?>
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
                        "<a class='card' href='<?php echo $link ?>/dish.php?recipe=" . $recipe_id . "'>" .
                            "<img src='" . $img_url . "' class='card-img'>" .
                            "<h2>" . $recipe . "</h2>" .
                            "<p>" . $total_time . "</p></a><a href='<?php echo $link ?>/edit-dish.php?recipe=" . $recipe_id . "'>Edit Dish</a> ";
                }
            ?>
        </div>
        </div>
    </div>

</body>
</html>
