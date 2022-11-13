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

$sql = "INSERT INTO user
        (fname, lname, email, phone, password, security_level)
        VALUES 
        ('" . $_REQUEST["fname"] . "', 
        '" . $_REQUEST["lname"] . "', 
        '" . $_REQUEST["email"] . "', 
        '" . $_REQUEST["phone"] . "', 
        '" . $_REQUEST["password"] . "', 
        '" . $_REQUEST["security-level"] . "')";

$results = $mysql->query($sql);

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
<body class="root small" >

<!-- header -->
<div class="main-container">
    <div class="gap-2rem">
        <h1>Verify your email</h1>
        <p>
            Check your email inbox for an email from "join@thekitchen.com" to complete your registration. Do not refresh the page.
        </p>
    </div>
</div>

</body>
</html>

