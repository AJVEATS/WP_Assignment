<?php
    include "databaseConnection.php";

    if (isset($_POST['userLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_login_query_string = "SELECT user_name, user_password FROM user_tbl WHERE user_name='$username'";

    }
    mysqli_close($connection);
?>
