<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include __DIR__ . "/../../config.php"; // Database connection

// Check if ID is provided in the query string
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Prepare the SQL statement with a condition to filter based on status
    $sql = "SELECT * FROM currency WHERE id = ? AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the id parameter to the prepared statement
} else {
    // If no ID is provided, fetch all currencies where status = 1
    $sql = "SELECT * FROM currency WHERE status = 1";
    $stmt = $conn->prepare($sql);
}

$stmt->execute(); // Execute the prepared statement
$result = $stmt->get_result(); // Get the result of the query

// Check if records exist
if ($result->num_rows > 0) {
    $currencies = [];
    while ($row = $result->fetch_assoc()) {
        $currencies[] = $row;
    }
    echo json_encode($currencies, JSON_PRETTY_PRINT); // Return all currencies or specific currency
} else {
    echo json_encode(["message" => "No currencies found"]);
}

// Close the connection
$stmt->close();
$conn->close();
?>
