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
        <a href="index.php">Back</a>
        <h1>Join Us</h1>
        <p>
            The Kitchen
        </p>
    </div>

    <div class="searchbox grid-rows grid-gap-2rem">
        <form class="signup grid-rows grid-gap-2rem" action="signup-complete.php">
            <!-- search -->
            <div id="fname">
<!--                <p class="filter-term"><strong>First Name</strong></p>-->
                <input class="" type="text" name="fname" placeholder="First Name" required/>
            </div>
            <div id="lname">
<!--                <p class="filter-term"><strong>Last Name</strong></p>-->
                <input class="" type="text" name="lname" placeholder="Last Name" required/>
            </div>
            <div id="email">
<!--                <p class="filter-term"><strong>Email</strong></p>-->
                <input class="" type="email" name="email" placeholder="Email" required/>
            </div>
            <div id="phone">
<!--                <p class="filter-term"><strong>Phone</strong></p>-->
                <input class="" type="tel" name="phone" placeholder="Phone" required/>
            </div>
            <div id="password">
<!--                <p class="filter-term"><strong>Password</strong></p>-->
                <input class="" type="text" name="password" placeholder="Password" required/>
            </div>
            <div id="security-level">
                <!--                <p class="filter-term"><strong>Password</strong></p>-->
                <input class="" type="hidden" name="security-level" value="1" required/>
            </div>
            <div id="submit" >
                <input type="submit"/>
            </div>

        </form>
    </div>
</div>

</body>
</html>
