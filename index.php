<!DOCTYPE html>
<html lang="eng">
<?php
include "login.php";
session_start();
if (!isset($_COOKIE[$_SESSION['user_name']])) {
    //echo '<script>console.log("user not logged in");</script>';
} else {
    echo '<script>console.log("user logged in");</script>';
    header('Location: userHome.php');
}
?>
<head>
    <title>Web programming assignment</title>
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="about.php" class="active">About</a>
    <a href="createAccount.php" class="active">Create Account</a>
    <div class="loginContainer">
        <form action="" method="POST">
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