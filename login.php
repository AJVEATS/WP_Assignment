<?php
    include "databaseConnection.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        $sql = "SELECT user_id, user_name FROM user_tbl WHERE user_name = '$username' and user_password = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        if($count == 1) {

            $_SESSION['user_name'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            $expiry = time() + 3600 * 24;

            setcookie($_SESSION['user_name'], $_SESSION['user_id'], $expiry);

            header("location: userHome.php");
        } else {
            $error = "Your login username or password is invalid";
            echo '<script>alert("user details are incorrect"); </script>';
        }
    }
?>
