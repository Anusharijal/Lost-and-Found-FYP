<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Example: Save to a file or database (demonstration purpose)
    $response = array("status" => "success", "message" => "Data received", "name" => $name, "email" => $email);
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
