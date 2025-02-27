<?php
include __DIR__ . "/../../config.php"; // Database connection

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["id"])) {
    $id = $data["id"];
    $sql = "UPDATE payment_methods SET status = 0 WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Expense deleted successfully (Soft Delete)"]);
    } else {
        echo json_encode(["error" => "Failed to delete expense: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "ID is required"]);
}
?>
