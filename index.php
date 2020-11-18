<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Web programming assignment</title>
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<?php
    include "login.php";
?>
<div class="navigationBar" id="navigationBar">
    <a href="login.php" class="active">Home</a>
    <a href="about.php" class="active">About us</a>
    <div class="loginContainer">
        <form action="" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="text" placeholder="Password" name="password">
            <button type="submit" name="userLogin" value="submit">Login</button>
        </form>
    </div>
</div>
<div class="pageContent" id="pageContent">
    <h1>Web Programming Assignment</h1>
    <h2>If you don't have an account <a href="createAccount.php">click here</a></h2>
    <!--<button type="button" onclick="location.href='createAccount.php'">Create account</button>-->
</div>
</body>
</html>