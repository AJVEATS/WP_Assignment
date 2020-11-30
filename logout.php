<?php
session_start();  // Includes the session started in the session.php script
if (session_destroy()) { // Stops the session that was created when the user logged in
    setcookie($_SESSION['user_name'], $_SESSION['user_id'], time() - 3600); // Changes the expiry of the cookies so it is now expired
    header("Location: index.php"); // Redirects the user to the index page (index.php)
}
?>
