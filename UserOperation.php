<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION["username"];
$userid = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="websiteStyle.css">
    <title>Home</title>
</head>
<body>
    <h2>Welcome <?php echo $username; ?></h2>

   
    <p>This is the User Operation page.</p>
    <a href="Homepage.php">Home</a> </br></br>
    <a href="logout.php">Logout</a> </br></br>
    
    

    <!-- Button to trigger retrieval of user list -->
    <button id="retrieveUsersBtn">Retrieve Users</button></br></br>

    <!-- Container to display the user list -->
    <div id="userListContainer"></div>

    <!-- JavaScript to handle the AJAX request and update the user list -->
    <script>
        document.getElementById("retrieveUsersBtn").addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("userListContainer").innerHTML = xhr.responseText;
                        // Attach event listeners to update and delete buttons
                        attachButtonListeners();
                    } else {
                        console.error('Failed to retrieve users:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.open("GET", "retrieve_users.php", true);
            xhr.send();
        });

        // Function to attach event listeners to update and delete buttons
        function attachButtonListeners() {
            var updateButtons = document.querySelectorAll('.updateButton');
            updateButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var userId = this.getAttribute('data-userid');
                     window.location.href = 'update.php?id=' + userId;
                    console.log('Update user with ID:', userId);
                });
            });

            var deleteButtons = document.querySelectorAll('.deleteButton');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-userid');
            
            // Send AJAX request to delete_user.php
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle successful deletion response
                        console.log('User deleted successfully');
                        // Optionally, you can update the user list here
                        // For example, reload the user list after deletion
                        retrieveUsers();
                    } else {
                        console.error('Failed to delete user:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.open("POST", "delete_user.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + userId);
                });
            });
        }

        // Function to retrieve users
function retrieveUsers() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the user list container with the retrieved user list
                document.getElementById("userListContainer").innerHTML = xhr.responseText;
                // Reattach event listeners to update and delete buttons after refreshing user list
                attachButtonListeners();
            } else {
                console.error('Failed to retrieve users:', xhr.status, xhr.statusText);
            }
        }
    };
    xhr.open("GET", "retrieve_users.php", true);
    xhr.send();
}

    </script>
</body>
</html>
