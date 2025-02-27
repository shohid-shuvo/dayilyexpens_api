<?php
// Add headers for JSON response and CORS support
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include __DIR__ . "/../../config.php"; // Database connection

// Retrieve the ID from GET request (if available)
$id = isset($_GET['id']) ? $_GET['id'] : null;

// If an ID is provided, fetch the specific cost type by ID
if ($id) {
    // SQL query to fetch the specific cost type by ID
    $sql = "SELECT * FROM types_of_cost WHERE id = '$id' AND status = 'active'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If the cost type exists, return it in JSON format
        $row = $result->fetch_assoc();
        echo json_encode($row, JSON_PRETTY_PRINT);
    } else {
        // If no cost type is found with the provided ID
        echo json_encode(["message" => "Cost type not found."]);
    }
} else {
    // If no ID is provided, fetch all active cost types
    $sql = "SELECT * FROM types_of_cost WHERE status = 'active'"; // Adjust conditions if needed
    $result = $conn->query($sql);

    $types_of_cost = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Add each row to the result array
            $types_of_cost[] = $row;
        }
        // Return the list of cost types in JSON format
        echo json_encode($types_of_cost, JSON_PRETTY_PRINT);
    } else {
        // If no active cost types are found
        echo json_encode(["message" => "No cost types found."]);
    }
}

// Close the database connection
$conn->close();
?>
