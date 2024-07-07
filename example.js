const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnSignInPassword').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission

        var emailInput = document.getElementById('txtSignInEmail').value.trim();
        var passwordInput = document.getElementById('txtSignInPassword').value.trim();

        // Regular expression to check email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //This pattern checks if the email is in the correct format

        // Check if email is empty or doesn't match the format
        if (emailInput === '' || !emailRegex.test(emailInput)) {
            alert('Please enter a valid email address.');
            return;
        }

        // Check if password is empty
        if (passwordInput === '') {
            alert('Please enter your password.');
            return;
        }

        // Validation successful, proceed with login
        // AJAX call to PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'SignIn.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Successful response from PHP script
                    if (xhr.responseText === 'exists') {
                        // User exists, redirect to homepage
                        window.location.href = 'Homepage.php';
                    } else {
                        // User does not exist, display error message
                        alert('User does not exist.');
                    }
                } else {
                    // Error occurred
                    alert('Error: ' + xhr.status);
                }
            }
        };
        // Send email and password to PHP script
        xhr.send('email=' + encodeURIComponent(emailInput) + '&password=' + encodeURIComponent(passwordInput));
    });
});


//Validation for SignUp Flow
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnSignUpSubmit').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission

        var nameInput = document.getElementById('txtSignUpName').value.trim();
        var emailInput = document.getElementById('txtSignUpEmail').value.trim();
        var passwordInput = document.getElementById('txtSignUpPassword').value.trim();

        // Regular expression to check email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Check if name is empty
        if (nameInput === '') {
            alert('Please enter your name.');
            return;
        }

        // Check if email is empty or doesn't match the format
        if (emailInput === '' || !emailRegex.test(emailInput)) {
            alert('Please enter a valid email address.');
            return;
        }

        // Check if password is empty
        if (passwordInput === '') {
            alert('Please enter your password.');
            return;
        }

        // AJAX request to check if email ID exists
        var xhrCheckEmail = new XMLHttpRequest();
        xhrCheckEmail.open('POST', 'checkEmail.php', true);
        xhrCheckEmail.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhrCheckEmail.onreadystatechange = function () {
            if (xhrCheckEmail.readyState === XMLHttpRequest.DONE) {
                if (xhrCheckEmail.status === 200) {
                    if (xhrCheckEmail.responseText === 'email_exists') {
                        // Email ID already exists, display message
                        alert('Email ID already exists. Please choose another one.');
                    } else {
                        // Email ID does not exist, proceed with sign-up
                        // AJAX call to PHP script for sign-up
                        var xhrSignUp = new XMLHttpRequest();
                        xhrSignUp.open('POST', 'SignUp.php', true);
                        xhrSignUp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhrSignUp.onreadystatechange = function () {
                            if (xhrSignUp.readyState === XMLHttpRequest.DONE) {
                                if (xhrSignUp.status === 200) {
                                    // Successful response from PHP script
                                    alert(xhrSignUp.responseText);
                                } else {
                                    // Error occurred
                                    alert('Error: ' + xhrSignUp.status);
                                }
                            }
                        };
                        // Send form data to PHP script for sign-up
                        xhrSignUp.send('name=' + encodeURIComponent(nameInput) + '&email=' + encodeURIComponent(emailInput) + '&password=' + encodeURIComponent(passwordInput));
                    }
                } else {
                    // Error occurred
                    alert('Error: ' + xhrCheckEmail.status);
                }
            }
        };
        // Send email data to PHP script for email check
        xhrCheckEmail.send('email=' + encodeURIComponent(emailInput));
    });
});