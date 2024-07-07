<?php
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");
// Allow the OPTIONS method
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit;
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$passworduser = $_POST['password'];

// Validate form data (you might want to do more thorough validation)
if (empty($name) || empty($email) || empty($passworduser)) {
    echo 'Error: Please fill in all the fields.';
    exit;
}

// Connect to your database (replace with your database credentials)
$servername = "127.0.0.1:3306";
$username = "websiteUser";
$password="Password4$";
$dbname = "websitedb";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into database (you might want to use prepared statements to prevent SQL injection)
$sql = "INSERT INTO users (name, email, password,usertype) VALUES ('$name', '$email', '$passworduser','user')";

if ($conn->query($sql) === TRUE) {
    echo 'Sign-up successful.';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

// Close connection
$conn->close();
?>
