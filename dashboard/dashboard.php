<?php
session_start();
require_once '../db/connection.php';
require_once '../db/functions.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/index.php?error=not_logged_in");
    exit;
}

// Fetch all items from the database
$query = "SELECT 
            items.item_id, 
            items.name, 
            items.description, 
            categories.name AS category_name, 
            items.date_found, 
            items.location, 
            items.status,
            items.created_at
          FROM items
          JOIN categories ON items.category_id = categories.category_id
          ORDER BY items.created_at DESC";
$items = fetchAll($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="dashboard.js"></script>
</head>
<body>
<div class="dashboard-container">
        <h1>Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Date Found</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                        <td><?php echo htmlspecialchars($item['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($item['date_found']); ?></td>
                        <td><?php echo htmlspecialchars($item['location']); ?></td>
                        <td><?php echo htmlspecialchars($item['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
