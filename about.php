<!DOCTYPE html>
<html>
    <head>
        <title>About us page</title>
        <link rel="stylesheet" href="static/css/about.css">
        <link rel="stylesheet" href="static/css/navigationBar.css">
    </head>
    <?php

    ?>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="index.php" class="active">Home</a>
            <a href="about.php" class="active">About us</a>
            <div class="loginContainer">
                <form action="login.php">
                    <input type="text" placeholder="Username" name="username">
                    <input type="text" placeholder="Password" name="password">
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="pageContent" id="pageContent">
            <h1>About us</h1>
        </div>
    </body>
</html>
