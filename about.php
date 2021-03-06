<!DOCTYPE html>
<?php
session_start(); // Includes the session started in the session.php script
if (!isset($_COOKIE[$_SESSION['user_name']])) { // Check if a users does not have a cookie in their browser
    echo '<script>console.log("user not logged in");</script>'; // Outputs a message saying that the user is not logged in
} else {
    echo '<script>console.log("user logged in");</script>'; // Outputs a message saying that the user is logged in
    header('Location: userHome.php'); // Redirects the user to user home (userHome.php)
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
            <div class="dropdown">
                <button class="dropbtn">Topics
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="viewNoAccount.php?mode=get&topic=all">All topics</a>
                    <a href="viewNoAccount.php?mode=get&topic=softwareEngineering">Software engineering</a>
                    <a href="viewNoAccount.php?mode=get&topic=computing">Computing</a>
                    <a href="viewNoAccount.php?mode=get&topic=networks">Networks</a>
                    <a href="viewNoAccount.php?mode=get&topic=cyberSecurity">Cyber security</a>
                    <a href="viewNoAccount.php?mode=get&topic=bestPractices">Best practices</a>
                    <a href="viewNoAccount.php?mode=get&topic=methods">Methods</a>
                    <a href="viewNoAccount.php?mode=get&topic=tools">Tools</a>
                    <a href="viewNoAccount.php?mode=get&topic=other">Other</a>
                </div>
            </div>
            <div class="loginContainer">
                <form action="login.php" method="POST"> <!-- The login in form for users with POST http method -->
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
