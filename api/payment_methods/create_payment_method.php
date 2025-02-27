<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

// Check if required fields are provided
if (isset($data["title"]) && isset($data["description"]) && isset($data["created_by"])) {
    $title = $data["title"];
    $description = isset($data["description"]) ? "'{$data["description"]}'" : "NULL";
    $created_by = $data["created_by"];
    $updated_by = isset($data["updated_by"]) ? "'{$data["updated_by"]}'" : "NULL";

    $sql = "INSERT INTO payment_methods (title, description, created_by, updated_by) 
            VALUES ('$title', $description, '$created_by', $updated_by)";

    // Execute the query and return appropriate response
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Payment method created successfully"]);
    } else {
        echo json_encode(["error" => "Failed to create payment method: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Missing required fields"]);
}

// Close the connection
$conn->close();
?>
