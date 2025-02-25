<?php
// include "../config.php";
// include __DIR__ . "/../config.php"; 


// $data = json_decode(file_get_contents("php://input"), true);

// if (!empty($data["type_id"]) && !empty($data["payment_method_id"]) && !empty($data["amount"]) && !empty($data["currency_id"])) {
//     $type_id = $data["type_id"];
//     $payment_method_id = $data["payment_method_id"];
//     $amount = $data["amount"];
//     $currency_id = $data["currency_id"];
//     $note = isset($data["note"]) ? $data["note"] : null;
//     $created_by = isset($data["created_by"]) ? $data["created_by"] : "Admin";

//     $sql = "INSERT INTO costs (type_id, payment_method_id, amount, currency_id, note, created_by) 
//             VALUES ('$type_id', '$payment_method_id', '$amount', '$currency_id', '$note', '$created_by')";

//     if ($conn->query($sql)) {
//         echo json_encode(["message" => "Expense added successfully"]);
//     } else {
//         echo json_encode(["error" => "Failed to add expense"]);
//     }
// } else {
//     echo json_encode(["error" => "All fields are required"]);
// }
?>

<?php
include __DIR__ . "/../config.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data["type_id"]) && !empty($data["payment_method_id"]) && !empty($data["amount"]) && !empty($data["currency_id"])) {
    $type_id = $data["type_id"];
    $payment_method_id = $data["payment_method_id"];
    $amount = $data["amount"];
    $currency_id = $data["currency_id"];
    $note = isset($data["note"]) ? $data["note"] : null;
    $created_by = isset($data["created_by"]) ? $data["created_by"] : "Admin";

    // Check if type_id exists
    $checkType = $conn->query("SELECT id FROM types_of_cost WHERE id = '$type_id'");
    if ($checkType->num_rows == 0) {
        die(json_encode(["error" => "Invalid type_id, no matching record found in types_of_cost"]));
    }

    // Check if payment_method_id exists
    $checkPayment = $conn->query("SELECT id FROM payment_methods WHERE id = '$payment_method_id'");
    if ($checkPayment->num_rows == 0) {
        die(json_encode(["error" => "Invalid payment_method_id, no matching record found in payment_methods"]));
    }

    // Check if currency_id exists
    $checkCurrency = $conn->query("SELECT id FROM currency WHERE id = '$currency_id'");
    if ($checkCurrency->num_rows == 0) {
        die(json_encode(["error" => "Invalid currency_id, no matching record found in currency"]));
    }
    
    $updated_by = isset($data["updated_by"]) ? $data["updated_by"] : "Admin"; // modfy


    // Now Insert Data
    $sql = "INSERT INTO costs (type_id, payment_method_id, amount, currency_id, note, created_by) 
            VALUES ('$type_id', '$payment_method_id', '$amount', '$currency_id', '$note', '$created_by')";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Expense added successfully"]);
    } else {
        echo json_encode(["error" => "Failed to add expense"]);
    }
} else {
    echo json_encode(["error" => "All fields are required"]);
}
?>
