<?php
include 'config.php';
session_start();
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");
// Allow the OPTIONS method
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit;
}

// Retrieve email and password from POST request
$email = $_POST['email'];
$password = $_POST['password'];

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, name, usertype  FROM users WHERE email = ? AND password = ?");


$stmt->bind_param("ss", $email, $password);

// Execute SQL statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User exists
    $row = $result->fetch_assoc();
    
    $_SESSION["user_type"] = $row['usertype'];
    $_SESSION["username"] = $row['name'];
    $_SESSION["user_id"] = $row['id'];
    echo 'exists';

} else {
    // User does not exist
    echo 'not_exists';
    $error = "Invalid username or password";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
