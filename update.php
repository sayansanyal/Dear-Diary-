<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
$username = $_SESSION["username"];



// Connect to your MySQL database
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST["submit"])) {
        // Get form data
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Update user data in the database
        $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$user_id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Get user details from database based on selected user ID
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found";
    }
}

// Close MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="websiteStyle.css">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <h2>Welcome <?php echo $username; ?></h2>
    <p>This is the update user page.</p>
    <a href="logout.php">Logout</a> </br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        if (isset($row)) {
        ?>
        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br>
        <button type="submit" name="submit">Update</button>
        <?php
        }
        ?>
    </form>
</body>
</html>
