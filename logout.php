<?php
session_start();

if (session_destroy()) {
    setcookie($_SESSION['user_name'], $_SESSION['user_id'], time() - 3600);
    header("Location: index.php");
}

