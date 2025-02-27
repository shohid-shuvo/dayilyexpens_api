
<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include __DIR__ . "/../config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["type_id"]) && isset($data["payment_method_id"]) && isset($data["amount"]) && isset($data["currency_id"])) {
    $type_id = $data["type_id"];
    $payment_method_id = $data["payment_method_id"];
    $amount = $data["amount"];
    $currency_id = $data["currency_id"];
    $note = isset($data["note"]) ? "'{$data["note"]}'" : "NULL";
    $created_by = isset($data["created_by"]) ? "'{$data["created_by"]}'" : "'Admin'";
    $updated_by = isset($data["updated_by"]) ? "'{$data["updated_by"]}'" : "NULL";

    $typeCheckQuery = "SELECT id FROM types_of_cost WHERE id = '$type_id'";
    $typeCheckResult = $conn->query($typeCheckQuery);

    if ($typeCheckResult->num_rows == 0) {
        echo json_encode(["error" => "Invalid type_id, no matching record found in types_of_cost"]);
        exit;
    }

    $sql = "INSERT INTO costs (type_id, payment_method_id, amount, currency_id, note, created_by, updated_by) 
            VALUES ('$type_id', '$payment_method_id', '$amount', '$currency_id', $note, $created_by, $updated_by)";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Expense added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add expense: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "All required fields are missing"]);
}
?>


