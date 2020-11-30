<!DOCTYPE html>
<?php
include "databaseConnection.php"; // Includes the databaseConnection.php script to allow this script to access the database

session_start(); // Includes the session started in the session.php script

if (!isset($_COOKIE[$_SESSION['user_name']])) { // Checks if a users does not have a cookie in their browser
    header('Location: index.php'); // Redirects the user to the index page (index.php)
} else {
}

$urlPostId = $_GET['post_id']; //Declares the variable with the value it gets from the post's id from the url
$_SESSION['postID'] = $_GET['post_id']; // Declares a session variable called postID with he value 'post_id'

if (isset($_POST['newPost'])) { // Checks if a user has submitted a form with a POST request method from the form 'newPost'
    $postUserId = $_SESSION['user_id']; // Declares the variable with the values entered in form by the user
    $postTitle = $_POST['postTitle']; // ^ same as above
    $postContent = $_POST['postContent']; // ^ same as above
    $postCategory = $_POST['category']; // ^ same as above
    $postDate = date("Y-m-d"); // // ^ same as above but it formats the date to the format used in the database.

    $create_post_string = "INSERT INTO post_tbl (user_id, post_title, post_date, post_content, post_category) VALUES ('$postUserId', '$postTitle', '$postDate', '$postContent', '$postCategory');";
    // The variable is declared as string SQL statement to add the post to the database using the variables declared above

    if (mysqli_query($connection, $create_post_string)) {
        echo '<script>console.log("post added");</script>';
        header('Location: view.php?mode=get&topic=all');
    } else {
        echo '<script>console.log("post not added");</script>';
        echo $create_post_string;
    }
}

if (isset($_POST['updatePost'])) { // Checks if a user has submitted a form with a POST request method from the form 'updatePost'
    //echo $_POST['updatePostId'];
    $editPostId = $_POST['postId']; // Declares the variable with the values entered in form by the user
    $editPostTitle = $_POST['postTitle']; // ^ same as above
    $editPostContent = $_POST['postContent']; // ^ same as above
    $postEditDate = date("Y-m-d"); // ^ same as above but it formats the date to the format used in the database.
    $update_post_string = "UPDATE post_tbl SET post_title = '$editPostTitle', post_content = '$editPostContent', post_edit_date = '$postEditDate' WHERE post_id = '$editPostId';";
    // The variable is declared as string SQL statement to update the post in the database using the variables declared above
    //echo $update_post_string; // Used for development and testing
    //echo $editPostId; // Used for development and testing
    //echo $urlPostId; // Used for development and testing
    if (mysqli_query($connection, $update_post_string)) { // Checks if the page can connect to the database
        echo '<script>console.log("post updated");</script>'; // Outputs status of the update
        header('Location: view.php?mode=get&topic=all'); // Redirects the user to the view page (view.php) to see all posts
    } else {
        echo '<script>console.log("post not updated");</script>'; // Outputs status of the update
        //echo $update_post_string; // Used for development and testing
    }
}

if (isset($_POST['deletePost'])) { // Checks if a user has submitted a form with a POST request method from the form 'deletePost'
    $deletePostId = $_POST['postId']; // Declares the variable with the values entered in form by the user
    $delete_post_string = "DELETE FROM post_tbl WHERE post_id = '$deletePostId';";  // The variable is declared as string SQL statement to delete the post from the database using the variables declared above
    echo $delete_post_string;
    if (mysqli_query($connection, $delete_post_string)) { // Checks if the page can connect to the database
        echo '<script>console.log("post deleted");</script>'; // Outputs status of the delete
        header('Location: view.php?mode=get&topic=all'); // Redirects the user to the view page (view.php) to see all posts
    } else {
        echo '<script>console.log("post not deleted");</script>'; // Outputs status of the delete
        //echo $delete_post_string; // Used for development and testing
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
<?php
if (isset($urlPostId)) { // Checks if there is a post id in the url
    $get_post_string = "SELECT * FROM post_tbl WHERE post_id = '$urlPostId'"; // The variable is declared as string SQL statement to get the posts from the database using the variables declared above
    $result = mysqli_query($connection, $get_post_string); // Stores the results returned from the database

    while ($row = mysqli_fetch_assoc($result)) { // Goes through all of the rows of data returned from the database
        $postTitle = $row['post_title']; // Declares the variable with the values returned from the database
        $postEditDate = $row['post_edit_date']; // ^ same as above
        $postContent = $row['post_content']; // ^ same as above
        $editForm = "
    <h2>Edit post - $postTitle</h2>
    <div class='postForm' id='postForm'>
    <form action='contentForm.php' class='updatePostForm' method='POST'>
        <input type='hidden' id='postId' name='postId' value='$urlPostId'>
        <input type='text' placeholder='Post title' name='postTitle' value='$postTitle'>
        <textarea placeholder='Enter your post here' name='postContent' rows='10' cols='200'>$postContent</textarea><br>
        <input type='submit' name='updatePost' value='Update post'>
        <button type='reset' name='clearForm' class='clearForm'>Clear form</button>
        <input type='submit' name='deletePost' value='Delete post'>
    </form>
    </div>"; // HTML form for editing a post stored as a PHP variable
        echo $editForm; // Outputs the form
    }
} elseif (!isset($urlPostId)) { // Checks if the $urlPostId is not set
    $newPostForm = "<h2>Create a post</h2>
<div class='postForm' id='postForm'>
    <form action='contentForm.php' class='newPostForm' method='POST'>
    <input type='text' placeholder='Post title' name='postTitle'>
    <select name='category'>
        <option value='' disabled selected hidden>Select post category</option>
        <option value='best practices'>best practices</option>
        <option value='software engineering'>software engineering</option>
        <option value='computing'>computing</option>
        <option value='networks'>networks</option>
        <option value='cyber security'>cyber security</option>
        <option value='methods'>methods</option>
        <option value='tools'>tools</option>
        <option value='other'>other</option>
    </select><br>
    <textarea placeholder='Enter your post here' name='postContent' rows='10' cols='200'></textarea><br>
    <button type='reset' name='clearForm' class='clearForm'>Clear form</button>
    <input type='submit' name='newPost' value='Create post'>
    </form>
</div>"; // HTML form for creating a post stored as a PHP variable
    echo $newPostForm; // Outputs the form
}
?>
</body>
</html>
