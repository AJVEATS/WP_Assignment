<!DOCTYPE html>
<html>
    <head>
        <title>User homepage</title>
        <style>
            <?php include 'navigationBar.css';?>
            .navigationBar .userLogout {
                float: right;
            }
            .navigationBar .userLogout button {
                float: right;
                padding: 6px 10px;
                margin-top: 8px;
                margin-right: 16px;
                background-color: #333333;
                color: #ffffff;
                font-size: 17px;
                border: none;
                cursor: pointer;
            } 
            .navigationBar .userLogout button:hover {
                background-color: #ffffff;
                color: #333333;
            }
            body {
                margin: 0;
                background-color: #ffffff;
                font-family: Arial, Helvetica, sans-serif;
            }
            h1 {
                text-align: center;
                padding-top: 10%;
                font-size: 100px;
                padding-bottom: 0;
            }
        </style>
    </head>
    <?php
        $usernameTemp = "Alexander";
    ?>
    <body>
        <div class="navigationBar" id="navigationBar">
            <a href="userHome.php" class="active">Home</a>
            <a href="about.php" class="active">About us</a>
            <div class="userLogout">
                <button type="submit">Logout<button>
            </div>
        </div>
        <h1>Welcome Back, <?php echo "$usernameTemp"; ?></h1>
    </body>
</html>
