<!DOCTYPE html>
<?php
include "databaseConnection.php"; // Includes the databaseConnection.php script to allow this script to access the database

session_start(); // Includes the session started in the session.php script

if (!isset($_COOKIE[$_SESSION['user_name']])) { // Checks if a users does not have a cookie in their browser
    echo '<script>console.log("user not logged in");</script>'; // Outputs a message saying that the user is not logged in
} else {
    echo '<script>console.log("user logged in");</script>'; // Outputs a message saying that the user is logged in
    header('Location: userHome.php'); // Redirects the user to user home (userHome.php)
}
?>
<html lang="eng">
<head>
    <title>Create an account</title>
    <link rel="stylesheet" href="static/css/createAccount.css"> <!-- Imports the css style sheet createAccount.css -->
    <link rel="stylesheet" href="static/css/navigationBar.css"> <!-- Imports the css style sheet navigationBar.css-->
</head>
<body>
<?php
if (isset($_POST['newUserButton'])) { // Checks if a user has submitted a form with a POST request method from the form 'newUserButton'
    if ($_POST['newPassword'] === $_POST['newPasswordConfirm']) { // Checks if the password and confirm password are identical
        $username = $_POST['newUsername']; // Sets the variable $username with the data that the user had entered into the create account form, newUsername field
        $userEmail = $_POST['newEmail']; // Sets the variable $userEmail with the data that the user had entered into the create account form, newEmail field
        $password = hash('sha512', $_POST['newPassword']); // Sets the variable $username with the data that the user had entered into the create account form, username field. And Hashes the password to sha512
        $passwordConfirm = $_POST['newPasswordConfirm']; // Sets the variable $passwordConfirm with the data that the user had entered into the create account form, newPasswordConfirm field

        $create_account_string = "INSERT INTO user_tbl(user_name, user_email, user_password) VALUES ('$username', '$userEmail', '$password');"; // Declaring a variable $create_account_string with the sql query with the data that the user has entered into the create account form

        if (mysqli_query($connection, $create_account_string)) { // Checks if the users detail have been added to the database
            echo '<script>console.log("user added to the table");</script>'; // Outputs a message to the user's browser console
            echo '<script>alert("user added to the table");</script>'; // Alerts the user that they have been added to the database
            header('Location: userHome.php'); // Redirects the user to the user home page (userHome.php)
        }
    } else { // If the user's details aren't added to the database
        echo '<script type="text/javascript">alert("Passwords do not match please enter your password in again")</script>'; // Outputs an error message
    }
}
?>
<div class="navigationBar" id="navigationBar">
    <a href="index.php" class="active">Home</a>
    <a href="about.php" class="active">About us</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="viewNoAccount.php?mode=get&topic=all">All topics</a>
            <a href="viewNoAccount.php?mode=get&topic=softwareEngineering">Software engineering</a>
            <a href="viewNoAccount.php?mode=get&topic=computing">Computing</a>
            <a href="viewNoAccount.php?mode=get&topic=networks">Networks</a>
            <a href="viewNoAccount.php?mode=get&topic=cyberSecurity">Cyber security</a>
            <a href="viewNoAccount.php?mode=get&topic=bestPractices">Best practices</a>
            <a href="viewNoAccount.php?mode=get&topic=methods">Methods</a>
            <a href="viewNoAccount.php?mode=get&topic=tools">Tools</a>
            <a href="viewNoAccount.php?mode=get&topic=other">Other</a>
        </div>
    </div>
</div>
<h1>Create account</h1>
<div>
    <form action="createAccount.php" method="POST" class="newUserForm"> <!-- The create account form for users with POST http method -->
        <input type="text" placeholder="username" name="newUsername" class="newUserForm"><br>
        <input type="email" placeholder="email" name="newEmail" class="newUserForm"><br>
        <input type="password" placeholder="password" name="newPassword" class="newUserForm"<br>
        <input type="password" placeholder="confirm password" name="newPasswordConfirm" class="newUserForm"><br>
        <button type="submit" name="newUserButton" value="submit">Create account</button>
    </form>
</div>
</body>
</html>