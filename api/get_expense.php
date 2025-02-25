<?php
include __DIR__ . "/../config.php"; 
$id = $_GET["id"];

$sql = "SELECT * FROM costs WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["message" => "Expense not found"]);
}
?>
