<?php
    include "databaseConnection.php";
    session_start();

    $user_check = $_SESSION['login_user'];

    $connection = mysqli_init();;
    $ses_sql = mysqli_query($connection, "SELECT user_name FROM user_tbl WHERE user_name = '$user_check' " );

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['user_id'];
    $login_user = $row['user_name'];

    if (!isset($_SESSION['login_user'])) {
        header("location:index.php");
    } else {
        header("location:userHome.php");
    }
?>
