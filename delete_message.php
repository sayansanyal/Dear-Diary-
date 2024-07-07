<?php
include 'config.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Check if a message is selected for deletion
if (isset($_GET["message_id"])) {
    $message_id = $_GET["message_id"];

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM user_message WHERE messageID = ?");
    $stmt->bind_param("i", $message_id);

    if ($stmt->execute()) {
        // Set success message and store it in session
        $_SESSION["delete_success"] = "Post deleted successfully.";
        header("Location: view_posts.php");
    } else {
        echo "Error deleting message.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Message ID not provided.";
}
?>
