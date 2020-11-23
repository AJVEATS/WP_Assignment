<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Post form</title>
    <link rel="stylesheet" href="static/css/contentForm.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<?php
include "databaseConnection.php";
include "session.php";
$username = $_SESSION['login_session'];
echo $username;

if(isset($_POST['newPost'])) {
    $postUserId = $login_session;
    $postTitle = $_POST['postTitle'];
    $postDate = date("Y-m-d");
    $postContent = $_POST['postContent'];
    $postCategory = $_POST['category'];

    $new_post_query_string = "INSERT INTO post_tbl(user_id, post_title, post_date, post_content, post_category) VALUES ('$postUserId', '$postTitle', '$postDate', '$postContent', '$postCategory');";
    echo "this is the userID: ".$username;
    //echo $new_post_query_string;
    if(mysqli_query($connection, $new_post_query_string)) {
        echo '<script>console.log("post added");</script>';
        header('Location: view.php');
    } else {
        echo '<script>console.log("post not added");</script>';
    }
}
?>
<div class="navigationBar" id="navigationBar">
    <a href="userHome.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="">All topics</a>
            <a href="">Best practices</a>
            <a href="">Methods</a>
            <a href="">Tools</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a>
    </div>
</div>
<h2>Create a post</h2>
<div class="postForm" id="postForm">
    <form action="contentForm.php" class="newPostForm" method="POST"
    <input type="text" placeholder="Post Title" name="postTitle">
    <input type="text" placeholder="Post title" name="postTitle">
    <select name="category">
        <option value="" disabled selected hidden>Select post category</option>
        <option value="bestPractices">best practices</option>
        <option value="methods">methods</option>
        <option value="tools">tools</option>
    </select><br>
    <textarea placeholder="Enter your post here" name="postContent" rows="10" cols="200"></textarea><br>
    <input type="submit" name="newPost" value="Add post">
    <button type="reset" name="clearForm">Clear form</button>
    </form>
</div>
</body>
</html>
