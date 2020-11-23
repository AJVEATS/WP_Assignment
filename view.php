<!DOCTYPE html>
<?php
include "databaseConnection.php";
session_start();

if (!isset($_COOKIE[$_SESSION['user_name']])) {
    header('Location: index.php');
} else {

}
$get_all_posts_query_string = "SELECT * FROM post_tbl";

$result = mysqli_query($connection, $get_all_posts_query_string);
?>
<html lang="eng">
<head>
    <title>View posts</title>
    <link rel="stylesheet" href="static/css/view.css">
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
<div class="viewContent" id="viewContent">
    <h1>View content</h1>
    <h2>Items title</h2>
    <p>Date created</p>
    <p>Last edited</p>
    <p>Items Content</p>
</div>

<a href="contentForm.php">Create new post</a>

<?php
if (mysqli_query($connection, $get_all_posts_query_string)) {
    echo '<script>console.log("Posts received");</script>';
} else {
    echo '<script>console.log("Posts not received");</script>';
}

while ($row = mysqli_fetch_assoc($result)) {
    $postId = $row['post_id'];
    $postUserId = $row['user_id'];
    $postTitle = $row['post_title'];
    $postDate = $row['post_date'];
    $postEditDate = $row['post_edit_date'];
    $postContent = $row['post_content'];
    $postCategory = $row['post_category'];

    echo "<ul>";
    echo "<li>Post id: " . $postId . "</li>";
    echo "<li>Creator id: " . $postUserId . "</li>";
    echo "<li>Title: " . $postTitle . "</li>";
    echo "<li>Created: " . $postDate . "</li>";
    if (!isset($postEditDate)){
        echo "<li>Post not edited</li>";
    } elseif (isset($postEditDate)) {
        echo "<li>Post edited on: " . $postEditDate . "</li>";
    }
    echo "<li>Content: " . $postContent . "</li>";
    echo "<li>Category: " . $postCategory . "</li>";
    echo "</ul>";
}
?>
</body>
</html>
