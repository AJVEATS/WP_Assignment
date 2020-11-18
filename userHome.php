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
        $userCheck = $_SESSION['login_user'];
        //echo "<p> $userCheck <p>"
    ?>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="userHome.php" class="active">Home</a>
            <a href="about.php" class="active">About us</a>
            <div class="userLogout">
                <a href="logout.php">Logout<button>
            </div>
        </div>
        <h1>Welcome Back, <?php echo $userCheck; ?></h1>
    </body>
</html>
