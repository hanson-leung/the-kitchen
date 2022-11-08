<?php
// connect to database
$host = "webdev.iyaclasses.com";
$user = "hansonle";
$pw = "AcadDev_Leung_5214698370";
$dbname = "hansonle_thekitchen";

$mysql = new mysqli(
    $host,
    $user,
    $pw,
    $dbname
);

if ($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
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
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="stylesheets/home.css"/>
    </head>

    <!-- begin body -->
    <body class="root" >

    <!-- header -->
    <?php
    include 'header.php';
    ?>

    <div class="main-container">
        <div class="gap-2rem">
            <h1>What's Cookin', Good Lookin'?</h1>
            <p>
                Find your next favorite recipe, tailored specifically for you.
            </p>
        </div>

        <div class="searchbox grid-rows grid-gap-2rem">
            <form class="filter" action="results.php">
                <!-- search -->
                <div id="search">
                    <p class="filter-term"><strong>SEARCH</strong></p>
                    <input class="searchbar" type="text" name="search" placeholder="What's on the menu?"/>
                </div>

                <!-- cuisine type -->
                <div>
                    <p class="filter-term"><strong>CUISINE</strong></p>
                    <select name="cuisine">
                        <option value="any" selected>No Preference</option>
                        <?php
                        $sql = "SELECT * FROM cuisine";
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo "<option value='" . $currentrow["cuisine_id"] . "'>" . $currentrow["cuisine"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- cooking time -->
                <div>
                    <p class="filter-term"><strong>COOKING TIME</strong></p>
                    <select name="cooking_time">
                        <option value="any" selected>No Preference</option>
                        <option value="0">Quick</option>
                        <option value="1">Eh</option>
                        <option value="2">Hefty</option>
                    </select>
                </div>

                <!-- ingredients -->
                <!-- <div>
                <p class="filter-term">Ingredients</p>
                <select name="ingredients[]" multiple>
                    <option value="all">Select</option>
                    <?php
                $sql = "SELECT * FROM ingredient";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                    echo "<option value='" . $currentrow["ingredient_id"] . "'>" . $currentrow["ingredient"] . "</option>";
                }
                ?>
                </select>
            </div> -->

                <!-- restrictions -->
                <!-- <div>
                <p class="filter-term">Allergies</p>
                <select name="allergies">
                    <option value="all">Select</option>
                    <?php
                $sql = "SELECT * FROM ingredient";
                $results = $mysql->query($sql);
                while ($currentrow = $results->fetch_assoc()) {
                    echo "<option>" . $currentrow["ingredient"] . "</option>";
                }
                ?>
                </select>
            </div> -->

                <div id="submit" >
                    <p class="filter-term">&nbsp</p>
                    <input type="submit"/>
                </div>

            </form>
            <div>
                <p>
                    Or, <a href="recipe.php?recordid=16" style="color:var(--orange);"><strong>surprise me!</strong></a>
                </p>
            </div>
        </div>
    </div>

    </body>
    </html>
