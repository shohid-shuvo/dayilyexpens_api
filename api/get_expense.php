<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

include __DIR__ . "/../config.php"; // Database connection

// Check if ID is provided in the query string
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Prepare the SQL statement with a condition to filter based on ID and status
    $sql = "SELECT * FROM costs WHERE id = ? AND status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the id parameter to the prepared statement
} else {
    // If no ID is provided, fetch all active expenses where status = 1
    $sql = "SELECT * FROM costs WHERE status = 1";
    $stmt = $conn->prepare($sql);
}

$stmt->execute(); // Execute the prepared statement
$result = $stmt->get_result(); // Get the result of the query

// Check if records exist
if ($result->num_rows > 0) {
    $expenses = [];
    while ($row = $result->fetch_assoc()) {
        $expenses[] = $row;
    }
    echo json_encode($expenses, JSON_PRETTY_PRINT); // Return all expenses or specific expense
} else {
    echo json_encode(["message" => "No expenses found"]);
}

// Close the connection
$stmt->close();
$conn->close();
?>
