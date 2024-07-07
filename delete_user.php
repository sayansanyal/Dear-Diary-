<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION["username"];


// Check if the user ID is provided via POST request
if(isset($_POST['id'])) {
    // Extract the user ID from the POST request
    $userId = $_POST['id'];

    // Connect to your database (replace these variables with your actual database credentials)
   $servername = "127.0.0.1:3306"; // Assuming your database is hosted locally
$username_db = "websiteUser"; // Replace with your database username
$password_db = "Password4$"; // Replace with your database password
$dbname = "websitedb"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a DELETE query to delete the user with the given ID
    $sql = "DELETE FROM users WHERE id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId); // "i" indicates integer type

    // Execute the statement
    if ($stmt->execute()) {
        // If deletion is successful, return a success message
        echo "User with ID $userId deleted successfully";
    } else {
        // If deletion fails, return an error message
        echo "Error deleting user: " . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If user ID is not provided, return an error message
    echo "User ID not provided";
}
?>
