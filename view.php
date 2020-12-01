<!DOCTYPE html>
<?php
include "databaseConnection.php"; // Includes the databaseConnection.php script to allow this script to access the database
session_start(); // Includes the session started in the session.php script

if (!isset($_COOKIE[$_SESSION['user_name']])) { // Checks if a users does not have a cookie in their browser
    header('Location: index.php'); // Redirects the user to the index page (index.php)
} else {
    //header('Location: viewNoAccount.php?mode=get&topic=all'); // Redirects the user to the view page for users that aren't logged in (viewNoAccount.php)
}

$urlTopic = $_GET['topic']; // Declares the variable with the value it gets from the post topic from the url

if ($urlTopic === "all") { // Checks if the topic from the URL is all
    $get_all_posts_query_string = "SELECT * FROM post_tbl"; // SQL query to get all posts from the database
} else {
    if ($urlTopic === "bestPractices") {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = 'best practices'"; // SQL query to get best practices posts from the database
    } elseif ($urlTopic === "cyberSecurity") {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = 'cyber security'"; // SQL query to get cyber security posts from the database.
    } elseif ($urlTopic === 'softwareEngineering') {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = 'software engineering'"; // SQL query to get software engineering posts from the database.
    } else {
        $get_all_posts_query_string = "SELECT * FROM post_tbl WHERE post_category = '$urlTopic'"; // SQL query to get the posts from the database with the topic from the url
    }
}
$result = mysqli_query($connection, $get_all_posts_query_string); // Stores the result from the sql query as a variable
//echo $urlTopic; // Used for development and testing
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
        <a href="logout.php">Logout</a> <!-- Logout button -->
    </div>
</div>
<div class="searchContainer">
    <form action="view.php" class="userSearch" method="POST"> <!-- Search bar for searching posts -->
        <input type="text" placeholder="search 🔍" name="searchQuery" class="userSearch">
        <input type="submit" name="searchPosts" value="search">
    </form>
</div>
<?php
if (isset($_POST['searchPosts'])) { // Checks if a user has submitted a form with a POST request method from the form 'searchPosts'
    $searchQuery = $_POST['searchQuery']; // Declares the variable $searchQuery with the data that the user entered into the searchPosts form
    $search_query_string = "SELECT * FROM post_tbl WHERE post_title LIKE '%$searchQuery%'"; // The $search_query_string variable is declared with the select SQL query with the users search value

    $searchResult = mysqli_query($connection, $search_query_string); // Stores the result from the database from the SQL query

    $count = mysqli_num_rows($searchResult); // Gets the amount of rows returned from the database

    if ($count == 0) { // Checks if the amount of rows returned from the database is equal to zero
        echo "<h3>There are no posts that match your search</h3>"; // Outputs a message

    } elseif ($count > 0) { // Checks if the amount of rows returned from the database is more than zero
        while ($row = mysqli_fetch_assoc($searchResult)) { // Goes through all of the rows of data returned from the database

            $postId = $row['post_id']; // Declares the variable with the values returned from the database
            $postUserId = $row['user_id']; // ^ same as the line above
            $postTitle = $row['post_title']; // ^ same as the line above
            $postDate = $row['post_date']; // ^ same as the line above
            $postEditDate = $row['post_edit_date']; // ^ same as the line above
            $postContent = $row['post_content']; // ^ same as the line above
            $postCategory = $row['post_category']; // ^ same as the line above

            echo "<ul>"; // Echos a list containing the data that was returned by the database
            echo "<p class='postTitle'>" . $postTitle . "</p>";
            //echo "<li>Creator id: " . $postUserId . "</li>";
            echo "<li>Content: " . $postContent . "</li>";
            echo "<li>Created: " . $postDate . "</li>";
            if (isset($postEditDate)) { // Checks to see if the post has been edited
                echo "<li>Post edited on: " . $postEditDate . "</li>";
            } else {
            }
            echo "<li>Category: " . $postCategory . "</li>";
            if ($postUserId === $_SESSION['user_id']) { // Checks if user currently logged in is the same as the user who created the post
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

$count = mysqli_num_rows($result); // Gets the amount of rows returned from the database

if ($count == 0) {
    echo "<h3>There are no posts for that category</h3>";
} elseif ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) { // Goes through all of the rows of data returned from the database
        $postId = $row['post_id']; // Declares the variable with the values returned from the database
        $postUserId = $row['user_id']; // ^ same as the line above
        $postTitle = $row['post_title']; // ^ same as the line above
        $postDate = $row['post_date']; // ^ same as the line above
        $postEditDate = $row['post_edit_date']; // ^ same as the line above
        $postContent = $row['post_content']; // ^ same as the line above
        $postCategory = $row['post_category']; // ^ same as the line above

        echo "<ul>"; // Echos a list containing the data that was returned by the database
        echo "<p class='postTitle'>" . $postTitle . "</p>";
        //echo "<li>Creator id: " . $postUserId . "</li>";
        echo "<li>Content: " . $postContent . "</li>";
        echo "<li>Created: " . $postDate . "</li>";
        if (isset($postEditDate)) { // Checks to see if the post has been edited
            echo "<li>Post edited on: " . $postEditDate . "</li>";
        } else {
        }
        echo "<li>Category: " . $postCategory . "</li>";
        if ($postUserId === $_SESSION['user_id']) { // Checks if user currently logged in is the same as the user who created the post
            echo "<a href='contentForm.php?mode=get&post_id=$postId'>Click here to edit this post</a>";
        } else {
        }
        echo "</ul>";
    }
}
?>
</body>
</html>
