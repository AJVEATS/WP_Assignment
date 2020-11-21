<?php
include "databaseConnection.php";
    session_start();
    $connection = mysqli_init();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);

        $sql = "SELECT user_id FROM user_tbl WHERE user_name = '$username' and user_password = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        if($count == 1) {
            //session_register("username");
            $_SESSION['login_user'] = $username;

            header("location: userHome.php");
        } else {
            $error = "Your login username or password is invalid";
            header("location: createAccount.php");
            echo '<script>console.log("user details are incorrect"); </script>';
        }

    }

    if (isset($_POST['userLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_login_query_string = "SELECT user_name, user_password FROM user_tbl WHERE user_name='$username'";

    }
?>
