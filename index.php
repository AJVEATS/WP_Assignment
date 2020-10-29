<!DOCTYPE html>
<html>
    <head>
        <title>Web programming assignment</title>
        <link rel="stylesheet" type="text/css" href="css/navigationBar.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
            body {
                margin: 0;
                background-color: #ffffff;
                font-family: Arial, Helvetica, sans-serif;
            }
            .pageContent {
                font-family: 'Bebas Neue', cursive;
                text-align: center;
                color: #333333;
                text-shadow: 1px 1px 1px #ffffff;
            }
            .pageContent button {
                float: center;
                padding: 6px 10px;
                margin-top: 8px;
                margin-right: 16px;
                background-color: #333333;
                color: #ffffff;
                font-size: 17px;
                border: none;
                cursor: pointer;
                border-radius: 10px;
            }
            .pageContent button:hover {
                background-color: #ffffff;
                border-color: #333333;
            }
            h1 {
                text-align: center;
                padding-top: 10%;
                font-size: 125px;
                padding-bottom: 0%;
            }
            h2 {
                font-size: 40px;
            }
            <?php include 'navigationBar.css'; ?>
        </style>
    </head>
    <body background="">
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
            <h1>Web Programming Assigment</h1>
            <h2>To create an account click below</h2>
            <button type="button">Create account</button>
        </div>
    </body>
</html>

<?php
?>