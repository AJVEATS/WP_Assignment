<!DOCTYPE html>
<html>
    <head>
        <title>Create an account</title>
        <style>
            <?php include 'navigationBar.css'; ?>
            body {
                margin: 0;
                background-color: #ffffff;
                font-family: Arial, Helvetica, sans-serif;
            }
            h1 {
                text-align: center;
                padding-top: 10%;
                font-size: 125px;
                padding-bottom: 0;
            }
        </style>
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
    </body>
</html>
