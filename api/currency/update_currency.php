<?php
include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

// Check if ID is provided
if (!empty($data["id"])) {
    $id = $data["id"];
    $fields = [];

    if (isset($data["symbol"])) {
        $fields[] = "symbol = '{$data["symbol"]}'";
    }
    if (isset($data["short_name"])) {
        $fields[] = "short_name = '{$data["short_name"]}'";
    }
    if (isset($data["name"])) {
        $fields[] = "name = '{$data["name"]}'";
    }
    if (isset($data["status"])) {
        $fields[] = "status = '{$data["status"]}'";
    }
    if (isset($data["updated_by"])) {
        $fields[] = "updated_by = '{$data["updated_by"]}'";
    }

    // If there are fields to update
    if (!empty($fields)) {
        $fields_str = implode(", ", $fields);
        $sql = "UPDATE currency SET $fields_str WHERE id = '$id'";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "Currency updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update currency: " . $conn->error]);
        }
    } else {
        echo json_encode(["error" => "No fields provided for update"]);
    }
} else {
    echo json_encode(["error" => "ID is required"]);
}

$conn->close();
?>
