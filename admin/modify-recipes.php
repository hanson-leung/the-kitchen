<?php
session_start();
?>

<html>
    <!-- head -->
    <head>
        <title>The Kitchen</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Find your next favorite recipe."/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <!-- stylesheets -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
            integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="../stylesheets/main.css"/>
    </head>

    <!-- begin body -->
    <body>
    <div  class="root">


    <div class="results-container grid-gap-2rem">

    <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
    $sql = "SELECT * FROM recipe";
        //  Create a results variable
    $results = $mysql->query($sql);

    // // 3. parse results
    echo $sql;
    echo " There are " . $results->num_rows . " records matching your search";

        //  Making a loop
        while ($currentrow = mysqli_fetch_array($results)) {
            echo "<div class='card'>" .
            "<img src='" . $currentrow["img_url"] . "' class='card-img'>" .
                // "<a href='recipe.php?recordid=" . $currentrow["recipe_id"] . "'>Details</a>" .
                // "<a href='edit_recipe.php?recordid=" . $currentrow["recipe_id"] . "'>Edit</a>" .
                "<h2>" . $currentrow["recipe"] . "</h2>" .
                "<p>" . ($currentrow["total_time"]/60) . " min</p></div>";
        }
    ?>

    </div>
    </div>

        <form>
            <div class="img">
                <img src="">
                <input value="" type="text" name="img">
            </div>
            <p class="recipe_url">
                <input value="" type="text" name="recipe_url">
            </p>
            <p class="recipe">
                <input value="" type="text" name="recipe">
            </p>
            <p class="tag">
                <select name="tag">
                </select>
            </p>
            <p class="cuisine">
                <select name="cuisine">
                </select>
            </p>
            <p class="user_id">
                <select name="user_id">
                </select>
            </p>
            <p class="prep_time">
                <input value="" type="number" name="prep_time">
            </p>
            <p class="cooking_time">
            <p class="prep_time">
                <input value="" type="number" name="cooking_time">
            </p>
        </form>
</body>
    </html>
