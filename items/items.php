<?php
// Database connection settings
$host = 'localhost';
$dbname = 'lost_and_found_database';
$username = 'root'; // Default username for XAMPP
$password = '';     // Default password for XAMPP (leave empty)

try {
    // Create PDO instance for the connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Retrieve lost items and found items from the database using UNION
$sql = "
    (SELECT id, item_name, location, lost_time AS item_time, item_picture, description, full_name, email, phone, 'Lost' AS type FROM lost_items)
    UNION
    (SELECT id, item_name, location, found_time AS item_time, item_picture, description, full_name, email, phone, 'Found' AS type FROM found_items)
    UNION
    (SELECT id, item_name, location, lost_time AS item_time, item_picture, description, full_name, email, phone, 'Claimed' AS type FROM claim_items)
    ORDER BY item_time DESC
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Items</title>
    <link rel="stylesheet" href="items.css">
</head>

<body>

    <div class="container">
        <h1>Lost and Found Items</h1>
        <table class="lost-items-table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Location</th>
                    <th>Time</th>
                    <th>Item Picture</th>
                    <th>Description</th>
                    <th>Contact Info</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($items) > 0): ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['location']); ?></td>
                            <td><?php echo htmlspecialchars($item['item_time']); ?></td>
                            <td>
                                <?php if ($item['item_picture']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($item['item_picture']); ?>" alt="Item Picture" width="100">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($item['description']); ?></td>
                            <td>
                                <strong>Name:</strong> <?php echo htmlspecialchars($item['full_name']); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($item['email']); ?><br>
                                <strong>Phone:</strong> <?php echo htmlspecialchars($item['phone']); ?>
                            </td>
                            <td>
                                <h1 class="itemtype <?php echo htmlspecialchars($item['type']); ?> "><?php echo htmlspecialchars($item['type']); ?></h1>
                            </td>
                            <td>
                                <?php if ($item['type'] === 'Lost'): ?>
                                    <form action="../claim/claim_form_handler.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                                        <button type="submit" class="button">Claim This</button>
                                    </form>
                                <?php elseif ($item['type'] === 'Claimed'): ?>
                                    <span>Item Claimed</span>
                                <?php else: ?>
                                    <span>Thank You</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No lost or found items reported yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>