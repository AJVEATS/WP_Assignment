<!DOCTYPE html>
<html lang="eng">
<?php

include "login.php"; // Include the php script called login.php which allows users to log into their account if they have one

session_start(); // Includes the session started in the session.php script

if (!isset($_COOKIE[$_SESSION['user_name']])) { // Checks if the user has a log in cookie
    //echo '<script>console.log("user not logged in");</script>';
} else {
    echo '<script>console.log("user logged in");</script>';
    header('Location: userHome.php'); // If a user is logged in they are redirected to the user home page
}
?>
<head>
    <title>Web programming assignment</title>
    <link rel="stylesheet" href="static/css/index.css"> <!-- Imports the css style sheet index.css -->
    <link rel="stylesheet" href="static/css/navigationBar.css"> <!-- Imports the css style sheet createAccount.css -->
</head>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="about.php" class="active">About</a>
    <a href="createAccount.php" class="active">Create Account</a>
    <div class="loginContainer">
        <form action="" method="POST"> <!-- The login in form for users with POST http method -->
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <button type="submit" name="userLogin" value="submit">Login</button>
        </form>
    </div>
</div>
<div class="pageContent" id="pageContent"><h1>Web Programming Assignment</h1>
    <h2>If you do not have an account <a href="createAccount.php" class="active">click here</a></h2>
</div>
</body>
</html>