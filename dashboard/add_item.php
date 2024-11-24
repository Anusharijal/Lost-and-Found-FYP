<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="add-item-container">
        <h1>Add New Item</h1>
        <form action="process_add_item.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <?php
                $categories = fetchAll("SELECT * FROM categories");
                foreach ($categories as $category) {
                    echo "<option value='{$category['category_id']}'>" . htmlspecialchars($category['name']) . "</option>";
                }
                ?>
            </select>
            
            <button type="submit">Add Item</button>
        </form>
    </div>
</body>
</html>
