<?php
    include "databaseConnection.php";
    session_start();

    $user_check = $_SESSION['user_id'];

    $connection = mysqli_init();

    $get_user_query = "SELECT user_id, user_name FROM user_tbl WHERE user_name = '$user_check'";

    mysqli_query($connection, $get_user_query);

    $user = mysqli_fetch_array($get_user_query,MYSQLI_ASSOC);

    if (!isset($_SESSION['user_id'])) {
        header("location:index.php");
    }
?>
