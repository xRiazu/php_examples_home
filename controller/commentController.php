<?php
include 'database/config.php'; // Include database connection

$blogId = $_GET['bid'];
$userId = $_GET['uid'];

$insertComment = $conn->prepare("INSERT INTO blog_comment (content, blog_id, user_id) VALUES (?, ?, ?)");

// Bind parameters to prevent SQL injection
$insertComment->bind_param("sii", $_POST['content'], $blogId, $userId);

// Execute the query
if ($insertComment->execute()) {
    $_SESSION['status_message'] = "Comment added successfully!";
} else {
    $_SESSION['status_message'] = "Error: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = trim($_POST['comment']);
    $blogID = $_POST['blogID'];
    $userID = $_SESSION['id']; // User ID from session

    if (!empty($comment)) {
        $stmt = $conn->prepare("INSERT INTO blog_comments (content, userID, blogID) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $comment, $userID, $blogID);
        
        if ($stmt->execute()) {
            // Redirect back to the blog page
            header("Location: blog_details.php?bid=" . $blogID);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Comment cannot be empty!";
    }
}
?>
