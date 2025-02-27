<?php
include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

// Check if ID is provided
if (!empty($data["id"])) {
    $id = $data["id"];
    $fields = [];

    // Check if the title field is set, then add it to the update query
    if (isset($data["title"])) {
        $fields[] = "title = '{$data["title"]}'";
    }
    
    // Check if the description field is set, then add it to the update query
    if (isset($data["description"])) {
        $fields[] = "description = '{$data["description"]}'";
    }
    
    // Check if the status field is set, then add it to the update query
    if (isset($data["status"])) {
        $fields[] = "status = '{$data["status"]}'";
    }
    
    // Check if the updated_by field is set, then add it to the update query
    if (isset($data["updated_by"])) {
        $fields[] = "updated_by = '{$data["updated_by"]}'";
    }

    // If there are any fields to update
    if (!empty($fields)) {
        $fields_str = implode(", ", $fields);
        $sql = "UPDATE types_of_cost SET $fields_str WHERE id = '$id'";

        // Execute the query and check if it was successful
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Type of cost updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update type of cost: " . $conn->error]);
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
