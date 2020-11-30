<!DOCTYPE html>
<?php
include "databaseConnection.php"; // Includes the databaseConnection.php script to allow this script to access the database
session_start(); // Includes the session started in the session.php script

if (!isset($_COOKIE[$_SESSION['user_name']])) { // Checks if a users does not have a cookie in their browser
    header('Location: index.php'); // Redirects the user to the index page (index.php)
}
?>
<html lang="eng">
<head>
    <title><?php echo $_SESSION['user_name'] ?>'s homepage</title>
    <link rel="stylesheet" href="static/css/userHome.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="userHome.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="view.php?mode=get&topic=all">All topics</a>
            <a href="view.php?mode=get&topic=softwareEngineering">Software engineering</a>
            <a href="view.php?mode=get&topic=computing">Computing</a>
            <a href="view.php?mode=get&topic=networks">Networks</a>
            <a href="view.php?mode=get&topic=cyberSecurity">Cyber security</a>
            <a href="view.php?mode=get&topic=bestPractices">Best practices</a>
            <a href="view.php?mode=get&topic=methods">Methods</a>
            <a href="view.php?mode=get&topic=tools">Tools</a>
            <a href="view.php?mode=get&topic=other">Other</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a> <!-- Logout button -->
    </div>
</div>
<div>
    <h1>Welcome Back, <?php echo $_SESSION['user_name']; ?></h1> <!-- Outputs a personalised welcome message-->
    <h2>Select the topic you want to research from the navigation bar</h2>
</div>
</body>
</html>
