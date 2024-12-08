<?php
// Database connection settings
$host = 'localhost';
$dbname = 'lost_and_found_database';
$username = 'root'; // Default username for XAMPP
$password = '';     // Default password for XAMPP (leave empty)

// Create a PDO instance for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = intval($_POST['id']); // ID of the lost item to claim

    // Fetch the item details from lost_items table
    $sql = "SELECT * FROM lost_items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $item_id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        // Insert into claim_items table
        $insert_sql = "
            INSERT INTO claim_items (item_name, location, lost_time, item_picture, description, full_name, email, phone)
            VALUES (:item_name, :location, :lost_time, :item_picture, :description, :full_name, :email, :phone)
        ";
        $insert_stmt = $pdo->prepare($insert_sql);
        $insert_stmt->execute([
            ':item_name' => $item['item_name'],
            ':location' => $item['location'],
            ':lost_time' => $item['lost_time'],
            ':item_picture' => $item['item_picture'],
            ':description' => $item['description'],
            ':full_name' => $item['full_name'],
            ':email' => $item['email'],
            ':phone' => $item['phone']
        ]);

        // Remove the item from lost_items table
        $delete_sql = "DELETE FROM lost_items WHERE id = :id";
        $delete_stmt = $pdo->prepare($delete_sql);
        $delete_stmt->execute([':id' => $item_id]);

        header("Location: ../index.php");
        exit();
    } else {
        echo "Item not found.";
    }
} else {
    echo "Invalid request.";
}
