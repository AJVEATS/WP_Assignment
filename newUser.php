<?php
    if (isset($_POST['newUser'])) {
        if ($_POST['newPassword'] === $_POST['newPasswordConfirm']) {
            $username = $_POST['newUsername'];
            $password = $_POST['newPassword'];
            $passwordConfirm = $_POST['newPasswordConfirm'];
            echo "<p>Username: " . $username . "<br>Password: " . $password . "<br>Confirm password: " . $passwordConfirm . "</p>";
        } else {
            echo "<p>Passwords do not match please enter your password in again";
        }
    }
