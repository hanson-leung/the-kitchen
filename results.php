<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
?>

<html>
<!-- begin header -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
    <!-- additional stylesheets -->
    <link rel="stylesheet" href="stylesheets/results.css"/>

<!-- insert php logic -->
<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/logic/results_logic.php';
?>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
        ?>

    <?php
        echo $alert;
    ?>

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
                        "<a class='card' href='" . $link . "/dish.php?recipe=" . $recipe_id . "'>" .
                            "<img src='" . $img_url . "' class='card-img'>" .
                            "<h2>" . $recipe . "</h2>" .
                            "<p class='cardmargin'>" . $total_time . "</p></a>";
                }
            ?>
        </div>

        <!-- next/prev page buttons -->
        <div id="pagebuttons">

            <div id="previouspage">
                <button input type="submit">
            <a onclick="prevpage()">
                Previous Page
            </a></button></div>
            <div id="nextpage">
                <button input type="submit">
                    <a href=>
                        Next Page
                    </a></button></div>
        </div>


    </div>
</script>
</body>
</html>