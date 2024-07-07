<?php
include 'config.php';

// Retrieve email from POST request
$email = $_POST['email'];

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute SQL statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Email exists
    echo 'email_exists';
} else {
    // Email does not exist
    echo 'email_not_exists';
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
