<?php
include __DIR__ . "/../config.php"; 

$data = json_decode(file_get_contents("php://input"), true);


if (!empty($data["id"]) && !empty($data["amount"]) && !empty($data["note"])) {
    $id = $data["id"];
    $amount = $data["amount"];
    $note = $data["note"];
    $updated_by = isset($data["updated_by"]) ? $data["updated_by"] : "Admin"; 

    $sql = "UPDATE costs SET amount = '$amount', note = '$note', updated_by = '$updated_by' WHERE id = '$id'";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Expense updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update expense: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Invalid input data"]);
}
?>
