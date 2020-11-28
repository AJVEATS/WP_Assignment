<!DOCTYPE html>
<?php
session_start();
if (!isset($_COOKIE[$_SESSION['user_name']])) {
    echo '<script>console.log("user not logged in");</script>';
} else {
    echo '<script>console.log("user logged in");</script>';
    header('Location: userHome.php');
}
?>
<html lang="eng">
    <head>
        <title>About us page</title>
        <link rel="stylesheet" href="static/css/about.css">
        <link rel="stylesheet" href="static/css/navigationBar.css">
    </head>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="index.php" class="active">Home</a>
            <a href="createAccount.php" class="active">Create account</a>
            <a href="index.php" class="active">Login</a>
            <div class="loginContainer">
                <form action="login.php" method="POST">
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" name="userLogin" value="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="pageContent" id="pageContent">
            <h1>About us</h1>
        </div>
    </body>
</html>
