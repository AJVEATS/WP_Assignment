<!DOCTYPE html>
<html>
    <head>
        <title>User homepage</title>
        <link rel="stylesheet" href="static/css/userHome.css">
        <link rel="stylesheet" href="static/css/navigationBar.css">
    </head>
    <?php
        $usernameTemp = "";
    ?>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="userHome.php" class="active">Home</a>
            <a href="about.php" class="active">About us</a>
            <div class="userLogout">
                <button type="submit">Logout<button>
            </div>
        </div>
        <h1>Welcome Back, <?php echo "$usernameTemp"; ?></h1>
    </body>
</html>
