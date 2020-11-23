<!DOCTYPE html>
<html lang="eng">
<head>
    <title>View posts</title>
    <link rel="stylesheet" href="static/css/view.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<?php
include "databaseConnection.php";
include "session.php";
$username = $_SESSION['login_user'];
?>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="userHome.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="">All topics</a>
            <a href="">Best practices</a>
            <a href="">Methods</a>
            <a href="">Tools</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a>
    </div>
</div>
<div class="viewContent" id="viewContent">
    <h1>View content</h1>
    <h2>Items title</h2>
    <p>Date created</p>
    <p>Last edited</p>
    <p>Items Content</p>
</div>
</body>
</html>
