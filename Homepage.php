<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION["username"];
$userid =$_SESSION["user_id"];
$usertype =$_SESSION["user_type"];
?>
    <?php
    // Check if the user type is "admin"
    if ($usertype === "admin") {
        echo 
        '<div><p> To manage users please navigate to  <a href="UserOperation.php">User Operation Page</a> </p></div>';
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="websiteStyle.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dear Diary</title>
    <style>
        body{
            background-image: url(https://www.my-diary.org/images/bg.jpg);
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
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
            <img src="https://monkkee.com/assets/encryption_process_en-70f4eb6007cdffe5da23e056378ce2ebe589f4563a06c3e2f9a38eaaf93dfc3b.svg" alt="Encryption process" width="1000"> 
        </div>
      </div>
    
    <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
              <h3 class="mb-0" style="color: aliceblue;">Create Post</h3>
              <!-- <div class="mb-1 text-body-secondary">Nov 12</div> -->
              <p class="card-text mb-auto" style="color: aliceblue;">Feeling inspired? Write it down! The "Create Post" section is your digital pen on a blank page. Pour your heart out, jot down daily experiences, or capture fleeting thoughts. Don't be afraid to get creative! Add photos or videos to make your entries truly pop. With every post, you weave a tapestry of your life, capturing moments big and small. So unleash your inner storyteller and create something special.</p>
              <a href="Message.php" class="icon-link gap-1 icon-link-hover stretched-link">
                Create your story
                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
            </div>
          </div>
        </div>

    <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
              <h3 class="mb-0" style="color: aliceblue;">View Post</h3>
              <!-- <div class="mb-1 text-body-secondary">Nov 11</div> -->
              <p class="mb-auto" style="color: aliceblue;">Feeling nostalgic? Take a trip down memory lane with "View Post." This is your personal archive, a treasure trove of moments you've documented. Browse through past entries, revisit that epic vacation, or relive a funny anecdote. You can even search by date or use filters to find specific entries. Each post acts as a time capsule, transporting you back to a moment in your life. So dive into your diary and rediscover the magic of your journey.</p>
              <a href="view_posts.php" class="icon-link gap-1 icon-link-hover stretched-link">
                View your story
                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
            </div>
          </div>
        </div>
      </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>


