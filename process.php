<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

// Connect to your MySQL database
$servername = "127.0.0.1:3306";
$username_db = "websiteUser";
$password_db="Password4$";
$dbname = "websitedb";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an operation is selected
    if (isset($_POST["operation"])) {
        $operation = $_POST["operation"];
        
        // If update operation is selected
        if ($operation == "update") {
            // Check if a user is selected
            if (isset($_POST["user_id"])) {
                $user_id = $_POST["user_id"];
                // Perform update operation
                // For example, you can redirect to an update page with the selected user ID
                header("Location: update.php?id=".$user_id);
                exit();
            } else {
                echo "Please select a user to update.";
            }
        }
        
        // If delete operation is selected
        elseif ($operation == "delete") {
            // Check if a user is selected
            if (isset($_POST["user_id"])) {
                $user_id = $_POST["user_id"];
                // Perform delete operation
                $sql = "DELETE FROM users WHERE id = $user_id";
                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                echo "Please select a user to delete.";
            }
        }
    }
}

// Close MySQL connection
$conn->close();
?>
