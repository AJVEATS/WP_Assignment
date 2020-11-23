<?php
    include "databaseConnection.php";
    session_start();

    $user_check = $_SESSION['user_id'];

    $connection = mysqli_init();;
    $ses_sql = mysqli_query($connection, "SELECT user_id, user_name FROM user_tbl WHERE user_name = '$user_check' " );

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $user_name = $row['user_id'];
    $user_id = $row['user_name'];


    if (!isset($_SESSION['user_id'])) {
        header("location:index.php");
    } //else {
        //header("location:userHome.php");
    //}

    $expiry = time() + 3600 * 24;
    setcookie($user_name, $user_id, $expiry);

?>
