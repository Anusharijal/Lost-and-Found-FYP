<?php
require_once '../db/connection.php';
require_once '../db/functions.php';

$query = "SELECT 
            items.item_id, 
            items.title, 
            items.description, 
            categories.name AS category_name, 
            items.date_added 
          FROM items
          JOIN categories ON items.category_id = categories.category_id
          ORDER BY items.date_added DESC";
$items = fetchAll($query);

echo json_encode(['status' => 'success', 'items' => $items]);
?>
