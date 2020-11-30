<!DOCTYPE html>
<?php
include "databaseConnection.php";
session_start();

if (!isset($_COOKIE[$_SESSION['user_name']])) {
    header('Location: index.php');
} else {

}
$urlTopic = $_GET['topic'];
if ($urlTopic === "all") {
    $get_all_posts_query_string = "SELECT * FROM post_tbl";
} else {
    if ($urlTopic === "bestPractices") {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = 'best practices'";
    } elseif ($urlTopic === "cyberSecurity") {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = 'cyber security'";
    }else {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = '$urlTopic'";
    }
}

//$get_all_posts_query_string = "SELECT * FROM post_tbl WHERE";

$result = mysqli_query($connection, $get_all_posts_query_string);

//echo $urlTopic;

if (isset($_POST['searchPosts'])) {

}
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
    <a href="contentForm.php">New Post</a>
    <div class="dropdown">
        <button class="dropbtn">Topics
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="view.php?mode=get&topic=all">All topics</a>
            <a href="view.php?mode=get&topic=softwareEngineering">Software engineering</a>
            <a href="view.php?mode=get&topic=computing">Computing</a>
            <a href="view.php?mode=get&topic=networks">Networks</a>
            <a href="view.php?mode=get&topic=cyberSecurity">Cyber security</a>
            <a href="view.php?mode=get&topic=bestPractices">Best practices</a>
            <a href="view.php?mode=get&topic=methods">Methods</a>
            <a href="view.php?mode=get&topic=tools">Tools</a>
            <a href="view.php?mode=get&topic=other">Other</a>
        </div>
    </div>
    <div class="userLogout">
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="searchContainer">
    <form action="view.php" class="userSearch" method="POST">
        <input type="text" placeholder="search 🔍" name="searchQuery" class="userSearch">
        <input type="submit" name="searchPosts" value="search">
    </form>
</div>

<?php

if (isset($_POST['searchPosts'])) {
    $searchQuery = $_POST['searchQuery'];
    $search_query_string = "SELECT * FROM post_tbl WHERE post_title LIKE '%$searchQuery%'";

    $searchResult = mysqli_query($connection, $search_query_string);


    $count = mysqli_num_rows($searchResult); // Gets the amount of rows returned from the database

    if ($count == 0) {
        echo "<h3>There are not posts that match your search</h3>";
    } elseif ($count > 0) {
        while ($row = mysqli_fetch_assoc($searchResult)) {
            $postId = $row['post_id'];
            $postUserId = $row['user_id'];
            $postTitle = $row['post_title'];
            $postDate = $row['post_date'];
            $postEditDate = $row['post_edit_date'];
            $postContent = $row['post_content'];
            $postCategory = $row['post_category'];

            echo "<ul>";
            echo "<p class='postTitle'>" . $postTitle . "</p>";
            //echo "<li>Creator id: " . $postUserId . "</li>";
            echo "<li>Content: " . $postContent . "</li>";
            echo "<li>Created: " . $postDate . "</li>";
            if (isset($postEditDate)) {
                echo "<li>Post edited on: " . $postEditDate . "</li>";
            } else {

            }
            echo "<li>Category: " . $postCategory . "</li>";
            if ($postUserId === $_SESSION['user_id']) {
                echo "<a href='contentForm.php?mode=get&post_id=$postId'>Click here to edit this post</a>";
            } else {

            }
            echo "</ul>";
        }
    }
}


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
    echo "<p class='postTitle'>" . $postTitle . "</p>";
    //echo "<li>Creator id: " . $postUserId . "</li>";
    echo "<li>Content: " . $postContent . "</li>";
    echo "<li>Created: " . $postDate . "</li>";
    if (isset($postEditDate)) {
        echo "<li>Post edited on: " . $postEditDate . "</li>";
    } else {

    }
    echo "<li>Category: " . $postCategory . "</li>";
    if ($postUserId === $_SESSION['user_id']) {
        echo "<a href='contentForm.php?mode=get&post_id=$postId'>Click here to edit this post</a>";
    } else {

    }
    echo "</ul>";
}
?>
</body>
</html>
