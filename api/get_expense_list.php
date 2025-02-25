<?php
// include "../config.php";
include __DIR__ . "/../config.php"; 


$sql = "SELECT * FROM costs";
$result = $conn->query($sql);
$expenses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $expenses[] = $row;
    }
    echo json_encode($expenses);
} else {
    echo json_encode(["message" => "No expenses found"]);
}
?>
