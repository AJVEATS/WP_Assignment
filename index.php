<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Web programming assignment</title>
        <link rel="stylesheet" href="static/css/index.css">
        <link rel="stylesheet" href="static/css/navigationBar.css">
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
            <button type="button" onclick="location.href='createAccount.php'">Create account</button>
        </div>
    </body>
</html>