<?php
session_start();
include 'database/config.php'; // Include database connection

if (!isset($_SESSION['id'])) {
    // Redirect if not logged in
    header("Location: login.php");
    exit();
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
