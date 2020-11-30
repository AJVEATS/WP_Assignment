<?php
$username = "s5204859"; // Username credential to connect to the database
$password = "THACyfAxEmXamaFjaUmhidbhmAr73roC"; // Password credential to connect to the database
$host = "db.bucomputing.uk"; // Host credential to connect to the database
$port = 6612; // Port credential to connect to the database
$database = $username;
$connection = mysqli_init(); // Initialises MySQLi and returns an object

if (!$connection) { // Checks if the there is no connection
    echo "<p>Initialising MySQLi failed</p>"; // Outputs error message
} else { // If there is a connection
    mysqli_ssl_set($connection, NULL, NULL, NULL, '/public_html/sys_tests', NULL);
    mysqli_real_connect($connection, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT); // Connects to the database with the variables declared above
    if (mysqli_connect_errno()) { // Checks if there is an error
        echo "<p>Failed to connect to MySQL. " . "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error() . "</p>"; // Outputs error message
    } else {
        //echo '<script>console.log("Connected to server"); </script>'; // Used for development and testing
    }
}
?>