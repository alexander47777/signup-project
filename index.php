<?php
require_once("includes/config_session.inc.php");
require_once("includes/signup_view.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        .form {
            display: none;
        }
        .form.active {
            display: block;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .toggle-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 id="form-title">Login</h2>

    <!-- Login Form -->
    <form id="login-form" class="form active" method="POST" action="login.php">
        <p class="form-error"></p>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <p class="form-error"></p>
        <button type="submit">Login</button>
        <button class="toggle-btn" type="button" onclick="toggleForm('signup')">Don't have an account? Signup</button>
    </form>

    <!-- Signup Form -->
    
    <form id="signup-form" class="form" method="POST" action="/login_system/includes/signup.inc.php">
        <p class="form-error"></p>
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Signup</button>
        <button class="toggle-btn" type="button" onclick="toggleForm('login')">Already have an account? Login</button>
    </form>
</div>

<script>
    function toggleForm(form) {
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        const formTitle = document.getElementById('form-title');

        if (form === 'signup') {
            loginForm.classList.remove('active');
            signupForm.classList.add('active');
            formTitle.textContent = 'Signup';
        } else {
            signupForm.classList.remove('active');
            loginForm.classList.add('active');
            formTitle.textContent = 'Login';
        }
    }
</script>

<?php
check_signup_errors();
?>
</body>
</html>
