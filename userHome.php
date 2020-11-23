<!DOCTYPE html>
<html>
<head>
    <title>User homepage</title>
    <link rel="stylesheet" href="static/css/userHome.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<?php
include "databaseConnection.php";
include "session.php";
$username = $_SESSION['user_id'];
?>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="userHome.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="view.php">All topics</a>
            <a href="view.php?mode=get&topic=bestPractices">Best practices</a>
            <a href="view.php?mode=get&topic=methods">Methods</a>
            <a href="view.php?mode=get&topic=tools">Tools</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a>
    </div>
</div>
<div>
    <h1>Welcome Back, <?php echo $username; ?></h1>
    <h2>Select the topic you want to research from the navigation bar</h2>
</div>
</body>
</html>
