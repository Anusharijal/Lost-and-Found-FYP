<?php
require_once 'connection.php';

// Fetch data from the database
function fetchAll($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch a single row
function fetchOne($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Insert or update data
function executeQuery($query, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($query);
    return $stmt->execute($params);
}


/**
 * Sanitize user input to prevent XSS and SQL injection.
 *
 * @param string $input
 * @return string
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Hash a password securely using bcrypt.
 *
 * @param string $password
 * @return string
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Verify if the given password matches the hashed password.
 *
 * @param string $password
 * @param string $hashedPassword
 * @return bool
 */
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}