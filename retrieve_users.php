<?php
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

// Query to select all users from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Display users in a tabular format
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Select</th><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Operation</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><input type='radio' name='user_id' value='".$row["id"]."'></td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td><button class='updateButton' data-userid='" . $row["id"] . "'>Update</button>";
        echo "<button class='deleteButton' data-userid='" . $row["id"] . "'>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}

// Close MySQL connection
$conn->close();
?>
