<?php
include __DIR__ . "/../../config.php"; // Database connection

// Get the raw POST data (for JSON requests)
$data = json_decode(file_get_contents("php://input"), true);

// Check if required fields are provided
if (isset($data["title"]) && isset($data["description"])) {
    $title = $data["title"];
    $description = $data["description"];
    $status = isset($data["status"]) ? $data["status"] : 'active';
    $created_by = isset($data["created_by"]) ? "'{$data["created_by"]}'" : "'Admin'";
    $updated_by = isset($data["updated_by"]) ? "'{$data["updated_by"]}'" : "NULL";

    // Check if a type with the same title already exists (Optional)
    $titleCheckQuery = "SELECT id FROM types_of_cost WHERE title = '$title'";
    $titleCheckResult = $conn->query($titleCheckQuery);

    if ($titleCheckResult->num_rows > 0) {
        echo json_encode(["error" => "Type of cost with the same title already exists"]);
        exit;
    }

    // SQL to insert a new type of cost
    $sql = "INSERT INTO types_of_cost (title, description, status, created_by, updated_by) 
            VALUES ('$title', '$description', '$status', $created_by, $updated_by)";

    // Execute the query
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Type of cost created successfully"]);
    } else {
        echo json_encode(["error" => "Failed to create type of cost: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "All required fields (title, description) are missing"]);
}

// Close the database connection
$conn->close();
?>
