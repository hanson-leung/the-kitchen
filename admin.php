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
        <div>
            <p>
                 Recipes
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>
        
        <div>
            <p>
                 Cuisines
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>

        <div>
            <p>
                 Ingredients
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>

        <div>
            <p>
                 Tags
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>

        <div>
            <p>
                 Units
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>

        <div>
            <p>
                 Users
            </p>
            <div class="text">
                <a href="#">Edit, add, or delete</a>
            </div>
        </div>
    </div>

    </body>
    </html>
