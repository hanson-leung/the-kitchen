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
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/index_logic.php';
?>

<html>
<!-- begin header -->
<?php
?>
    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/home.css"/>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
           echo $alert;
        ?>

    <div class="main-container">
        <div class="gap-2rem">
            <h1>What's Cookin', '?</h1>
            <p>
                Find your next favorite recipe, tailored specifically for you.
            </p>
        </div>

        <div class="searchbox grid-rows grid-gap-2rem">
            <form class="filter" action="results.php">
                <div>
                    <input name="page" type="hidden" value="1"/>
                </div>

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
                    Or, <a href="dish.php?recipe=16" style="color:var(--orange);"><strong>surprise me!</strong></a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
