<!DOCTYPE html>
<html>
    <head>
        <title>Web programming assignment</title>
        <style>
            <?php include 'navigationBar.css';?>
            body {
                margin: 0;
                background-color: #ffffff;
                font-family: Arial, Helvetica, sans-serif;
                color: #333333;
            }
            .pageContent {
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
                color: #333333;
                text-shadow: 1px 1px 1px #ffffff;
            }
            .pageContent button {
                padding: 6px 10px;
                margin-top: 8px;
                margin-right: 16px;
                background-color: #333333;
                color: #ffffff;
                font-size: 30px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                justify-content: center;
            }
            .pageContent button:hover {
                background-color: #ffffff;
                border-style: solid;
                border-color: #333333;
                color: #333333;
            }
            h1 {
                text-align: center;
                padding-top: 10%;
                font-size: 100px;
                padding-bottom: 0;
            }
            h2 {
                font-size: 40px;
            }
        </style>
    </head>
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
            <h1>Web Programming Assignment</h1>
            <button type="button">Create account</button>
        </div>
    </body>
</html>