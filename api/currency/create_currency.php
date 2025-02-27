<?php
include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

// Check if required fields are provided
if (!empty($data["symbol"]) && !empty($data["short_name"]) && !empty($data["name"])) {
    $symbol = $data["symbol"];
    $short_name = $data["short_name"];
    $name = $data["name"];
    $status = isset($data["status"]) ? "'{$data["status"]}'" : "'active'";
    $created_by = isset($data["created_by"]) ? "'{$data["created_by"]}'" : "'Admin'";
    $updated_by = isset($data["updated_by"]) ? "'{$data["updated_by"]}'" : "NULL";

    $sql = "INSERT INTO currency (symbol, short_name, name, status, created_by, updated_by) 
            VALUES ('$symbol', '$short_name', '$name', $status, $created_by, $updated_by)";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Currency created successfully"]);
    } else {
        echo json_encode(["error" => "Failed to create currency: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "All required fields are missing"]);
}
?>
