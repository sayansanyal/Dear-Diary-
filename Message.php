<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect user to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
$userid =$_SESSION["user_id"];
// Retrieve message ID from the URL


// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to fetch message by message ID
$stmt = $conn->prepare("SELECT * FROM user_message WHERE messageID = ?");
$stmt->bind_param("i", $message_id);

// Execute SQL statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the message from the result
$message = $result->fetch_assoc();

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
    <title>Dear Diary</title>
    
    <style>
        /* CSS for styling */
        body {
           
            background-image: url(https://www.my-diary.org/images/bg.jpg);
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
        
            color: #007bff;
            text-decoration: none;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        form {
            max-width: 400px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .updateButton, .deleteButton {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            display: inline-block;
        }

        .updateButton:hover, .deleteButton:hover {
            background-color: #0056b3;
        }

        .logout-link {
            position: absolute;
            top: 20px;
            right: 20px;
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
              <a class="nav-link" href="view_posts.php">View post</a>
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
    <main class="container">
      <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        
          <div class="col-lg-6 px-0">
          <h2>Welcome <?php echo $username; ?></h2>
    
    <div id="createPostForm">
        <h3>Start Message</h3>
        <form method="post" action="insert_post.php">
            <input type="hidden" name="message_id" value="<?php echo $message['messageID']; ?>">
            <label for="postTitle">Title:</label><br>
            <input type="text" id="postTitle" name="postTitle" ><br><br>
            
            <label for="postCategory">Category:</label><br>
            <select id="postCategory" name="postCategory">
                <option value="personal">Personal</option>
                <option value="public" >Public</option>
            </select><br><br>
            
            <label for="postDate">Date:</label><br>
            <input type="date" id="postDate" name="postDate" required><br><br>
            
            <label for="postMessage">Message:</label><br>
            <textarea id="postMessage" name="postMessage" rows="4" cols="50" required></textarea><br><br>
            <p id="charCount">Characters remaining: 1000</p>
            
            <button class="btn btn-outline-success" type="submit">Submit</button>
        </form>
    </div>
        </div>
      </div>


    <script>
    // JavaScript to update character count
        var postMessage = document.getElementById("postMessage");
        var charCount = document.getElementById("charCount");

        postMessage.addEventListener("input", function() {
            var remainingChars = 1000 - this.value.length;
            charCount.textContent = "Characters remaining: " + remainingChars;
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

