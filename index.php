<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Web programming assignment</title>
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<?php

include "session.php";
include "login.php";

$userCheck = $_SESSION['login_user'];
echo '<script>console.log("<?php $userCheck ?>"); </script>';
$userLoggedOutTemplate = '<div class="navigationBar" id="navigationBar"><a href="index.php" class="active">Home</a><a href="about.php" class="active">About</a><div class="loginContainer"><form action="" method="POST"><input type="text" placeholder="Username" name="username"><input type="password" placeholder="Password" name="password"><button type="submit" name="userLogin" value="submit">Login</button></form></div></div><div class="pageContent" id="pageContent"><h1>Web Programming Assignment</h1><h2>If you do nt have an account <a href="createAccount.php">click here</a></h2></div>';
$userLoggedInTemplate = '<div class="navigationBar" id="navigationBar"><a href="userHome.php" class="active">Profile</a><a href="about.php" class="active">About</a><div class="userLogout"><a class="active" href="logout.php">Logout</a></div></div><div class="pageContent" id="pageContent"><h1>Web Programming Assignment</h1><a href="userHome.php" class="active">Click here to go to your home page</a></div>';


if (isset($_SESSION['login_user'])) {
    echo $userLoggedInTemplate;
} else {
    echo $userLoggedOutTemplate;
}
?>
</body>
</html>