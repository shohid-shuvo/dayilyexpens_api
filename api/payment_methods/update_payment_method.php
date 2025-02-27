<?php
include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

// Check if ID is provided
if (!empty($data["id"])) {
    $id = $data["id"];
    $fields = [];

    // Add fields to update query if provided
    if (isset($data["title"])) {
        $fields[] = "title = '{$data["title"]}'";
    }
    if (isset($data["description"])) {
        $fields[] = "description = '{$data["description"]}'";
    }
    if (isset($data["status"])) {
        $fields[] = "status = '{$data["status"]}'";
    }
    if (isset($data["updated_by"])) {
        $fields[] = "updated_by = '{$data["updated_by"]}'";
    }

    // If any fields are provided for update
    if (!empty($fields)) {
        $fields_str = implode(", ", $fields);
        $sql = "UPDATE payment_methods SET $fields_str WHERE id = '$id'";

        // Execute query and return response
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Payment method updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update payment method: " . $conn->error]);
        }
    } else {
        echo json_encode(["error" => "No fields provided for update"]);
    }
} else {
    echo json_encode(["error" => "ID is required"]);
}

// Close the connection
$conn->close();
?>
