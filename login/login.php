<?php
session_start();
require_once '../db/connection.php'; // Connect to the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Log in to Khoj Sathi</title>
</head>
<body>
    <div class="form-container">
        <!-- Registration Form -->
        <form action="process_register.php" method="POST" class="form-content" id="signup">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <button type="submit" class="signup-btn">Sign Up</button>
            <p class="message">
                Already have an account? <a href="#" id="switch-to-login">Log in</a>
            </p>
        </form>

        <!-- Login Form -->
        <form action="process_login.php" method="POST" class="form-content" id="login" style="display: none;">
            <label for="login-email">Email or Phone:</label>
            <input type="text" id="login-input" name="login-input" required>
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="login-password" required>
            <button type="submit" class="login-btn">Log In</button>
            <p class="message">
                Don't have an account? <a href="#" id="switch-to-signup">Sign Up</a>
            </p>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="login.js"></script>
</html>
