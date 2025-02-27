<?php
include __DIR__ . "/../config.php"; 

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["id"])) {
    $id = $data["id"];
    $fields = [];

    if (isset($data["type_id"])) {
        $fields[] = "type_id = '{$data["type_id"]}'";
    }
    if (isset($data["payment_method_id"])) {
        $fields[] = "payment_method_id = '{$data["payment_method_id"]}'";
    }
    if (isset($data["amount"])) {
        $fields[] = "amount = '{$data["amount"]}'";
    }
    if (isset($data["currency_id"])) {
        $fields[] = "currency_id = '{$data["currency_id"]}'";
    }
    if (isset($data["note"])) {
        $fields[] = "note = '{$data["note"]}'";
    }
    if (isset($data["status"])) {
        $fields[] = "status = '{$data["status"]}'";
    }
    if (isset($data["updated_by"])) {
        $fields[] = "updated_by = '{$data["updated_by"]}'";
    }
    if (!empty($fields)) {
        $fields_str = implode(", ", $fields);
        $sql = "UPDATE costs SET $fields_str WHERE id = '$id'";

        if ($conn->query($sql)) {
            echo json_encode(["message" => "Expense updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update expense: " . $conn->error]);
        }
    } else {
        echo json_encode(["error" => "No fields provided for update"]);
    }
} else {
    echo json_encode(["error" => "ID is required"]);
}
?>
