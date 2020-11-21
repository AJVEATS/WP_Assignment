<!DOCTYPE html>
<html lang="eng">
<head>
    <title>View all posts</title>
    <link rel="stylesheet" href="static/css/view.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="index.php" class="active">Home</a>
    <a href="about.php" class="active">About us</a>
    <a href="createAccount.php" class="active">Create account</a>
    <div class="loginContainer">
        <form action="login.php" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="password" placeholder="Password" name="password">
            <button type="submit" name="userLogin" value="submit">Login</button>
        </form>
    </div>
</div>
<div class="viewContent" id="viewContent">
    <h1>View content</h1>
    <h2>Items title</h2>
    <p>Date created</p>
    <p>Last edited</p>
    <p>Items Content</p>
</div>
</body>
</html>
