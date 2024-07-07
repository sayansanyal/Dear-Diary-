<?php
include 'config.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

$userid = $_SESSION["user_id"];
$username = $_SESSION["username"];
// Retrieve form data

$title = $_POST['postTitle'];
$category = $_POST['postCategory'];
$date = $_POST['postDate'];
$message = $_POST['postMessage'];

// Insert data into the database (replace with your database connection logic)
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_message (id, title, category, postDate, postMessage) VALUES ($userid, '$title', '$category', '$date', '$message'); ";

if ($conn->query($sql) === TRUE) {
    $success_message = "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="websiteStyle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
    <style>
        img{
            width: 350px;
            height: 350px;
            text-align: center;
            display: block;
             margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body style="background-image: url(https://www.my-diary.org/images/bg.jpg);">
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
            <img src="https://2.bp.blogspot.com/-9j-ViEA2Sf4/WDv9vOzCuQI/AAAAAAAD7P8/QbFZorz0fPksBXUs9vGH7Ey7wS5dCd4iQCLcB/s1600/AS001715_22.gif" alt="Encryption process"  > 
            <?php if (isset($success_message)) { ?>
    <div style="color: green;"><?php echo $success_message; ?></div>
    <?php } ?></br>       
        </div>
      </div>
    <h2>Welcome <?php echo $username; ?></h2>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
