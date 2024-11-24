<?php
session_start();
require_once '../db/connection.php';
require_once '../db/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    $category_id = sanitizeInput($_POST['category']);
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in

    $query = "INSERT INTO items (title, description, category_id, user_id) VALUES (:title, :description, :category_id, :user_id)";
    $params = [
        'title' => $title,
        'description' => $description,
        'category_id' => $category_id,
        'user_id' => $user_id
    ];

    if (executeQuery($query, $params)) {
        header("Location: index.php?success=item_added");
    } else {
        header("Location: add_item.php?error=failed_to_add");
    }
    exit;
}
?>
