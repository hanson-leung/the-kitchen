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
    <meta charset="utf-8" />
    <meta name="description" content="Find your next favorite recipe." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- stylesheets -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
      integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="stylesheets/main.css" />
    <link rel="stylesheet" href="stylesheets/home.css" />
  </head>

  <!-- begin body -->
  <body class="root">
    <div class="header">
      <div>
        <p>Menu</p>
      </div>
      <div>
        <img class="headerlogo" src="#" alt="logo" />
      </div>
      <div>
        <div id="login">
          <button class="loginbutton">Login</button>
        </div>
        <div id="signup">
          <button class="signup">Sign Up</button>
        </div>
      </div>
    </div>
    <!--close header-->

    <div class="main-container">
      <div class="gap-2rem">
        <h1>Decide What to Eat</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. At adipiscing
          enim justo, enim ultrices etiam.
        </p>
      </div>

      <div class="searchbox">
          <form class="filter" action="results.php">
            <!-- search -->
            <div>
              <p>Search</p>
              <input class="searchbar" type="text" name="search"/>
            </div>

            <!-- cuisine type -->
            <div>
              <p>Cuisine</p>
              <select name="cuisine">
                <option value="all">All</option>
                  <?php
                   $sql = "SELECT * FROM cuisine";
                    $results = $mysql->query($sql);
                    while ($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["cuisine"] . "</option>";
                    }
                  ?>
              </select>
            </div>

            <!-- cooking time -->
            <div>
              <p>Cooking Time</p>
              <select name="cooking_time">
                <option value="all">Select</option>
                  <?php
                   $sql = "SELECT * FROM recipe";
                    $results = $mysql->query($sql);
                    while ($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["prep_time"] . "</option>";
                    }
                  ?>
              </select>
            </div>

            <!-- ingredients -->
            <div>
              <p>Ingredients</p>
              <select name="ingredients">
                <option value="all">Select</option>
                  <?php
                   $sql = "SELECT * FROM ingredient";
                    $results = $mysql->query($sql);
                    while ($currentrow = $results->fetch_assoc()) {
                        echo "<option>" . $currentrow["ingredient"] . "</option>";
                    }
                  ?>
              </select>
            </div>

            <!-- restrictions -->
            <div>
              <p>Allergies</p>
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
            </div>

            <div>
              <input type="submit" />
            </div>
             <div>
               <p>
                 Or, find a <a href="#">random recipe</a>
               </p>
            </div>
          </form>
        </div>
      </div>

  </body>
</html>
