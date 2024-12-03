<?php
// Database connection settings
$host = 'localhost';
$dbname = 'anusha_ko_lost_and_found_database';
$username = 'root'; // Default username for XAMPP
$password = '';     // Default password for XAMPP (leave empty)

// Create a PDO instance for database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $item_name = htmlspecialchars($_POST['item_name']);
    $location = htmlspecialchars($_POST['location']);
    $found_time = $_POST['found_time']; // Already in correct format from the datetime-local input
    $description = htmlspecialchars($_POST['description']);
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);

    // File upload handling (for item picture)
    $item_picture = '';
    if (isset($_FILES['item_picture']) && $_FILES['item_picture']['error'] == 0) {
        $fileTmpPath = $_FILES['item_picture']['tmp_name'];
        $fileName = $_FILES['item_picture']['name'];
        $fileSize = $_FILES['item_picture']['size'];
        $fileType = $_FILES['item_picture']['type'];

        // Define the directory where images will be stored
        $uploadDir = './../uploads/';
        $uploadFilePath = $uploadDir . basename($fileName);

        // Debugging: Check the file path
        echo "Upload file path: " . $uploadFilePath . "<br>";

        // Check if file already exists
        if (file_exists($uploadFilePath)) {
            echo "Error: File already exists.";
        } else {
            // Try moving the uploaded file
            if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
                echo "File successfully uploaded to: " . $uploadFilePath;
                $item_picture = $uploadFilePath;
            } else {
                echo "Error: File upload failed.";
            }
        }
    } else {
        echo "No file uploaded or error in file upload.";
    }


    // Insert the data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO found_items (item_name, location, found_time, item_picture, description, full_name, email, phone) 
        VALUES (:item_name, :location, :found_time, :item_picture, :description, :full_name, :email, :phone)");

        $stmt->bindParam(':item_name', $item_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':found_time', $found_time);
        $stmt->bindParam(':item_picture', $item_picture);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();
        echo "Lost item reported successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
