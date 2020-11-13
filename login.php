<?php
    if (isset($_POST['userLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo "<p>Username: ".$username."<br> Password: ".$password."</p>";
    }
?>
