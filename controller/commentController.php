<?php
include 'database/config.php'; // Include database connection
session_start();

$blogID = $_GET['bid'];
$userID = $_GET['uid'];

$insertComment = $conn->prepare("INSERT INTO blog_comments (content, blogID, userID) VALUES (?, ?, ?)");

// Bind parameters to prevent SQL injection
$insertComment->bind_param("sii", $_POST['content'], $blogID, $userID);

// Execute the query
if ($insertComment->execute()) {
    $_SESSION['status_message'] = "Comment added successfully!";
} else {
    $_SESSION['status_message'] = "Error: " . $conn->error;
}

// Close statement
$insertComment->close();
        
    

    // Redirect back to the blog page
    header("Location: blogInfo?bid=" . $blogID);
    exit();
?>