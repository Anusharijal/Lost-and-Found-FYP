<?php
require_once '../db/connection.php';
require_once '../db/functions.php'; // Include the functions file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirm-password']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match!']);
        exit;
    }

    // Check if email already exists
    $emailCheckQuery = "SELECT * FROM users WHERE email = :email";
    if (fetchOne($emailCheckQuery, ['email' => $email])) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists!']);
        exit;
    }

    // Check if phone number already exists
    $phoneCheckQuery = "SELECT * FROM users WHERE phone = :phone";
    if (fetchOne($phoneCheckQuery, ['phone' => $phone])) {
        echo json_encode(['status' => 'error', 'message' => 'Phone number already exists!']);
        exit;
    }

    // Hash the password
    $hashedPassword = hashPassword($password);

    // Insert user into the database
    $query = "INSERT INTO users (full_name, email, phone, password) VALUES (:name, :email, :phone, :password)";
    $params = ['name' => $name, 'email' => $email, 'phone' => $phone, 'password' => $hashedPassword];

    if (executeQuery($query, $params)) {
        echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Registration failed. Please try again.']);
    }
    exit;
}
?>
