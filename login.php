
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="example.css">


    <title>Login Page | Dear Diary</title>
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="https://accounts.google.com/InteractiveLogin/signinchooser?ifkv=ARZ0qKLzBh0KZafTAmmWBCjbc6vHosqQ6bo5UuZprT1pkU5i-UryN4EIu5tJeQYjWKopsPaSLdgJXw&theme=mn&ddm=0&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/login/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/login" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/feed/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input id="txtSignUpName" type="text" placeholder="Name">
                <input id="txtSignUpEmail" type="email" placeholder="Email">
                <input id="txtSignUpPassword" type="password" placeholder="Password" id="pass">
                <button id="btnSignUpSubmit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="https://accounts.google.com/InteractiveLogin/signinchooser?ifkv=ARZ0qKLzBh0KZafTAmmWBCjbc6vHosqQ6bo5UuZprT1pkU5i-UryN4EIu5tJeQYjWKopsPaSLdgJXw&theme=mn&ddm=0&flowName=GlifWebSignIn&flowEntry=ServiceLogin" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/login/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/login" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/feed/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input id="txtSignInEmail" type="email" placeholder="Email">
                <input id="txtSignInPassword" type="password" placeholder="Password" id="pass">
                <a href="#">Forget Your Password?</a>
                <button id="btnSignInPassword">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="example.js"></script>

</body>

</html>