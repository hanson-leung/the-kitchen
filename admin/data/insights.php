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
include $_SERVER['DOCUMENT_ROOT'] . '/logic/insights_logic.php';
?>

<html>
<!-- begin header -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- additional stylesheets -->
<link rel="stylesheet" href="<?php echo $link ?>/stylesheets/insights.css"/>

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
        
        <!-- top card container -->
        <h2>General insights</h2>
        <div class=" grid-columns grid-gap-2rem">
                <p>There are <?php echo $total_recipes ?> total recipes</p>
            
                <p><strong><?php echo $top_contributor ?></strong> is the top contributor with <?php echo $top_contributor_submissions ?> submissions</p>
            
            <a href="<?php echo $link ?>/uploads/analytics/12-2-2022.pdf" target="_blank" class="link3">
                <p>Download </a>  Google Analytics Report</p>
            
        </div>

        <!-- bottom card container -->
        <div class="bottomcontainer">
            <div class="grid-rows grid-gap-2rem">
                <h2>See the most popular search terms</h2>
                <?php
                while ($currentrow = mysqli_fetch_array($search_results)) {
                            $search_term = $currentrow["dv_search"];
                            $num_searches = $currentrow["search_num"];

                            echo '<div class = "smallcontainer">';
                            echo '<p>' . $search_term . '</p>';
                            echo '<div class="grid-columns grid-gap-2rem" style="width:fit-content">';
                            echo '<div class="dv_bar" style="width:' . $num_searches . 'px"></div>';
                                echo '<p>' . $num_searches . ' searches</p>';
                            echo '</div>';
                            echo '</div>';
                    }
            ?>
            </div>
            <br>
            <br>
            <br>
            <div class="grid-rows grid-gap-2rem">
                <h2>See the most popular recipes</h2>
                <?php
                while ($currentrow = mysqli_fetch_array($recipe_results)) {
                            $recipe_term = $currentrow["dv_recipe"];
                            $num_searches = $currentrow["recipe_num"];

                            echo '<div class = "smallcontainer">';
                            echo '<p>' . $recipe_term . '</p>';
                            echo '<div class="grid-columns grid-gap-2rem" style="width:fit-content">';
                            echo '<div class="dv_bar" style="width:' . $num_searches . 'px"></div>';
                                echo '<p>' . $num_searches . ' clicks</p>';
                            echo '</div>';
                            echo '</div>';
                    }
            ?>
            </div>
        </div>

    </div>
    </div>

</body>
</html>
