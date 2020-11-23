<!DOCTYPE html>
<?php
include "databaseConnection.php";

session_start();

if (!isset($_COOKIE[$_SESSION['user_name']])) {
    header('Location: index.php');
} else {

}
$urlPostId = $_GET['post_id'];

if (isset($_POST['newPost'])) {
    $postUserId = $_SESSION['user_id'];
    $postTitle = $_POST['postTitle'];
    $postDate = date("Y-m-d");
    $postContent = $_POST['postContent'];
    $postCategory = $_POST['category'];

    $create_post_string = "INSERT INTO post_tbl (user_id, post_title, post_date, post_content, post_category) VALUES ('$postUserId', '$postTitle', '$postDate', '$postContent', '$postCategory');";

    if (mysqli_query($connection, $create_post_string)) {
        echo '<script>console.log("post added");</script>';
        header('Location: view.php?mode=get&topic=all');
    } else {
        echo '<script>console.log("post not added");</script>';
        echo $create_post_string;
    }
}

if (isset($_POST['updatePost'])) {
    $editPostId = intval($urlPostId);
    $editPostTitle = $_POST['postTitle'];
    $editPostCategory = $_POST['postCategory'];
    $editPostContent = $_POST['postContent'];
    $postEditDate = date("Y-m-d");

    $update_post_string = "UPDATE post_tbl SET post_title = '$editPostTitle', post_category = '$editPostCategory', post_content = '$editPostContent', post_edit_date = '$postEditDate' WHERE post_id = '$editPostId';";
    echo $update_post_string;
    if (mysqli_query($connection, $update_post_string)) {
        echo '<script>console.log("post updated");</script>';
        header('Location: view.php?mode=get&topic=all');
    } else {
        echo '<script>console.log("post not updated");</script>';
        echo $update_post_string;
    }
}

?>
<html lang="eng">
<head>
    <title>Post form</title>
    <link rel="stylesheet" href="static/css/contentForm.css">
    <link rel="stylesheet" href="static/css/navigationBar.css">
</head>
<body>
<div class="navigationBar" id="navigationBar">
    <a href="userHome.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="view.php?mode=get&topic=all">All topics</a>
            <a href="view.php?mode=get&topic=bestPractices">Best practices</a>
            <a href="view.php?mode=get&topic=methods">Methods</a>
            <a href="view.php?mode=get&topic=tools">Tools</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a>
    </div>
</div>
<?php
if (isset($urlPostId)) {
    $get_post_string = "SELECT * FROM post_tbl WHERE post_id = '$urlPostId'";
    $result = mysqli_query($connection, $get_post_string);

    while ($row = mysqli_fetch_assoc($result)) {
        $postTitle = $row['post_title'];
        $postEditDate = $row['post_edit_date'];
        $postContent = $row['post_content'];
        $postCategory = $row['post_category'];
        $editForm = "
    <h2>Edit post</h2>
    <form action='contentForm.php' class='updatePostForm' method='POST'>
        <input type='text' placeholder='Post title' name='postTitle' value='$postTitle'>
        <select name='category'>
            <option value='' disabled selected hidden>Select post category</option>
            <option value='best practices'>best practices</option>
            <option value='methods'>methods</option>
            <option value='tools'>tools</option>
        </select><br>
        <textarea placeholder='Enter your post here' name='postContent' rows='10' cols='200'>$postContent</textarea><br>
        <input type='submit' name='updatePost' value='Update post'>
        <button type='reset' name='clearForm'>Clear form</button>
    </form>";
        echo $editForm;
    }
} elseif (!isset($urlPostId)) {
    $newPostForm = "<h2>Create a post</h2>
<div class='postForm' id='postForm'>
    <form action='contentForm.php' class='newPostForm' method='POST'>
    <input type='text' placeholder='Post title' name='postTitle'>
    <select name='category'>
        <option value='' disabled selected hidden>Select post category</option>
        <option value='best practices'>best practices</option>
        <option value='methods'>methods</option>
        <option value='tools'>tools</option>
    </select><br>
    <textarea placeholder='Enter your post here' name='postContent' rows='10' cols='200'></textarea><br>
    <input type='submit' name='newPost' value='Create post'>
    <button type='reset' name='clearForm'>Clear form</button>
    </form>
</div>";
    echo $newPostForm;
}
?>
</body>
</html>
