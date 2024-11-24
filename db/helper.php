<?php
// Sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Generate a secure password hash
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Verify a password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}
