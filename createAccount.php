<!DOCTYPE html>
<html>
    <head>
        <title>Create an account</title>
        <link rel="stylesheet" href="static/css/createAccount.css">
        <link rel="stylesheet" href="static/css/navigationBar.css">
    </head>
    <?php

    ?>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="index.php" class="active">Home</a>
            <a href="about.php" class="active">About us</a>
            <div class="loginContainer">
                <form action="login.php">
                    <input type="text" placeholder="Username" name="username">
                    <input type="text" placeholder="Password" name="password">
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
        <h1>Create account</h1>
        <div class="newUser" id="newUser">
            <form action="newUser.php" method="POST">
                <input type="text" name="newUsername" placeholder="username"><br>
                <input type="password" name="newPassword" placeholder="password"><br>
                <input type="password" name="newPasswordConfirm" placeholder="confirm password"><br>
                <button type="submit" name="newUser" value="submit">Create account</button>
            </form>
        </div>
    </body>
</html>
