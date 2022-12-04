
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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/userrecipes_logic.php';
?>

<html>
<head>
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/results.css"/>

</head>
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

    <div class="main-container small">
        <?php echo $alert; ?>

        <div class="gap-2rem">
            <h1>Hi, <?php echo $_SESSION["user_fname"] ?></h1>
        </div>
        
        <div>

            <?php echo "<p class='alert2'>" . $alert_2 . "</p>";?>
            <br>

            <div class="results-container2 grid-gap-2rem">

            <?php
                //  loop through results
                while ($currentrow = mysqli_fetch_array($results)) {
                        $recipe_id = $currentrow["recipe_id"];
                        $recipe = $currentrow["recipe"];
                        $img_url = $currentrow["img_url"];
                        $cuisine =  $currentrow["cuisine"];
                        $total_time = round(($currentrow["total_time"]/60), 1) . " min";

                        echo
                        "<div class='grid-rows grid-gap-2rem'><a class='card' href='" . $link . "/dish.php?recipe=" . $recipe_id . "'>" .
                            "<img src='" . $img_url . "' class='card-img'>" .
                            "<h2>" . $recipe . "</h2>" .
                            "<p>" . $total_time . "</p></a><a class='editdish' href='" . $link . "/edit-dish.php?recipe=" . $recipe_id . "'><input type='submit' value='Edit Dish'></a></div> ";
                }
            ?>
        </div>
        </div>
    </div>

</body>
</html>
