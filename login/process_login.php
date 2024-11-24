<?php
require_once '../db/connection.php';
require_once '../db/functions.php'; // Include the functions file

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $loginInput = sanitizeInput($_POST['login-input']);
    $loginPassword = sanitizeInput($_POST['login-password']);

    // Check if input is valid (email or phone)
    if (empty($loginInput) || empty($loginPassword)) {
        echo "error: All fields are required.";
        exit;
    }

    // Fetch user from the database using email or phone
    $query = "SELECT * FROM users WHERE email = :loginInput OR phone = :loginInput";
    $user = fetchOne($query, ['loginInput' => $loginInput]);

    if (!$user) {
        echo "error: User not found. Please check your email/phone.";
        exit;
    }

    // Verify password
    if (!verifyPassword($loginPassword, $user['password'])) {
        echo "error: Incorrect password.";
        exit;
    }

    // If login is successful, set session variables
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['full_name'];

    // Return success response
    echo "success";
    exit;
}
?>
