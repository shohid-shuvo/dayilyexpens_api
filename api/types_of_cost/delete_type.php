<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["id"])) {
    $id = $data["id"];
    $sql = "UPDATE types_of_cost SET status = 0 WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Expense deleted successfully (Soft Delete)"]);
    } else {
        echo json_encode(["error" => "Failed to delete expense: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "ID is required"]);
}
?>