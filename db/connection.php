<?php
// Database connection settings
$host = 'localhost';
$dbname = 'anusha_ko_lost_and_found_database';
$username = 'root'; // Default username for XAMPP
$password = '';     // Default password for XAMPP (leave empty)

// Create a PDO instance for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exception handling
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

