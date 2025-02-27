<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include __DIR__ . "/../../config.php"; // Database connection

// Check if 'id' is provided in the query string
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM currency WHERE id = '$id'"; // SQL query to fetch the specific currency by id
} else {
    // If no 'id' is provided, fetch all currencies
    $sql = "SELECT * FROM currency";
}

$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    $currencies = [];
    while ($row = $result->fetch_assoc()) {
        $currencies[] = $row;
    }
    echo json_encode($currencies, JSON_PRETTY_PRINT); // Return all currencies or the specific one
} else {
    echo json_encode(["message" => "No currencies found"]); // If no records are found
}

// Close the connection
$conn->close();
?>
