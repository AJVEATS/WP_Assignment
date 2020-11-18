<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$username = "s5204859";
$password = "THACyfAxEmXamaFjaUmhidbhmAr73roC";
$host = "db.bucomputing.uk";
$port = 6612;
$database = $username;

$connection = mysqli_init();
if (!$connection) {
    echo "<p>Initialising MySQLi failed</p>";
} else {
    mysqli_ssl_set($connection, NULL, NULL, NULL, '/public_html/sys_tests', NULL);
    mysqli_real_connect($connection, $host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
    if (mysqli_connect_errno()) {
        echo "<p>Failed to connect to MySQL. " .
            "Error (" . mysqli_connect_errno() . "): " . mysqli_connect_error() . "</p>";
    } else {
        echo '<script>console.log("Connected to server"); </script>';
        //echo "<p>Connected to server: " . mysqli_get_host_info($connection) . "</p>";
        //mysqli_close($connection);
        //echo "<p>Disconnected from server: " . $host . "</p>";
    }
}
?>
</body>
</html>

