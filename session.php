<?php
    include "databaseConnection.php"; // Includes the databaseConnection.php script to allow this script to access the database
    session_start(); // Starts a session

    $user_check = $_SESSION['user_id']; // Declares a variable to the value of the session variable 'user_id'
    $get_user_query = "SELECT user_id, user_name FROM user_tbl WHERE user_name = '$user_check'"; // Creates a SQL query to check that it is a valid user that is logged in, using the variable $user_check
    mysqli_query($connection, $get_user_query); // Executes the created SQL query ($get_user_query) on the database
    $user = mysqli_fetch_array($get_user_query,MYSQLI_ASSOC); // Declares a variable with the data returned from the database using the sql query ($get_user_query)

    if (!isset($_SESSION['user_id'])) { // Checks if the session variable 'user_id' is not set
        header("location:index.php"); // Redirects the user to the index page (index.php)
    }
?>
