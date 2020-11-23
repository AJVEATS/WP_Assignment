<!DOCTYPE html>
<html>
<head>
    <title>Create an account</title>
    <link rel="stylesheet" href="static/css/createAccount.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<?php
include "databaseConnection.php";
if (isset($_POST['newUserButton'])) {
    if ($_POST['newPassword'] === $_POST['newPasswordConfirm']) {
        $username = $_POST['newUsername'];
        $userEmail = $_POST['newEmail'];
        $password = $_POST['newPassword'];
        $passwordConfirm = $_POST['newPasswordConfirm'];
        //echo "<p>Username: " . $username . "<br>Password: " . $password . "<br>Confirm password: " . $passwordConfirm . "</p>";
        $create_account_string = "INSERT INTO user_tbl(user_name, user_email, user_password) VALUES ('$username', '$userEmail', '$password');";
        if (mysqli_query($connection, $create_account_string)) {
            echo '<script>console.log("user added to the table");</script>';
            header('Location: userHome.php');
        }
    } else {
        echo '<script type="text/javascript">
                                alert("Passwords do not match please enter your password in again")
                              </script>';
    }
}
?>
<div class="navigationBar" id="navigationBar">
    <a href="index.php" class="active">Home</a>
    <a href="about.php" class="active">About us</a>
    <a href="index.php" class="active">Login</a>
    <!--<div class="loginContainer">
        <form action="login.php" method="POST">
            <input type="text" placeholder="Username" name="username" class="loginContainer">
            <input type="password" placeholder="Password" name="password" class="loginContainer">
            <button type="submit" name="userLogin" value="submit">Login</button>
        </form>
    </div> -->
</div>
<h1>Create account</h1>
<div>
    <form action="createAccount.php" method="POST" class="newUserForm">
        <input type="text" placeholder="username" name="newUsername" class="newUserForm"><br>
        <input type="email" placeholder="email" name="newEmail" class="newUserForm"><br>
        <input type="password" placeholder="password" name="newPassword" class="newUserForm"<br>
        <input type="password" placeholder="confirm password" name="newPasswordConfirm" class="newUserForm"><br>
        <button type="submit" name="newUserButton" value="submit">Create account</button>
    </form>
</div>
</body>
</html>