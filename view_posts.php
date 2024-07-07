<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect user to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Check if delete success message is set
if (isset($_SESSION["delete_success"])) {
    echo "<p>{$_SESSION["delete_success"]}</p>";
    unset($_SESSION["delete_success"]); // Clear the message
}

// Retrieve user ID from session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch posts by user ID
$stmt = $conn->prepare("SELECT * FROM user_message WHERE id = ?");
$stmt->bind_param("i", $user_id);

// Execute SQL statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>View Posts</title>
    <style>
        /* CSS for styling */
        body {
           
           background-image: url(https://www.my-diary.org/images/bg.jpg);
       }
       h2{
        color: white;
       }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            border-radius: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            border-radius: 20px;
        }
        th {
            background-color: #1aa3ff;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">𝒟𝐸𝒜𝑅 𝒟𝐼𝒜𝑅𝒴</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Message.php">Create post</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                contact us
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">linkdIn</a></li>
                <li><a class="dropdown-item" href="#">gmail</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">other ways</a></li>
              </ul>
            </li>
            
          </ul>
          <form class="d-flex" role="login">
            
            </a><button class="btn btn-outline-success" type="submit"><a href="index.html" style="text-decoration: none; color: green;">logout</a></button>
          </form>
        </div>
      </div>
    </nav>
    <h2>View Posts</h2>
    <h2>Welcome <?php echo $username; ?></h2>
    
   <br>
        
    <table>
        <tr>
            <th>Select</th>
            <th>Message ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><input type="radio" name="message_id" value="<?php echo $row['messageID']; ?>"></td>
                <td><?php echo $row['messageID']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['postDate']; ?></td>
                <td><?php echo $row['postMessage']; ?></td>
                <td>
                    <a href="update_message.php?message_id=<?php echo $row['messageID']; ?>">Edit</a>
                    <a href="delete_message.php?message_id=<?php echo $row['messageID']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



