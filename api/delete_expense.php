<?php  
include __DIR__ . "/../config.php"; 

 if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM costs WHERE id=$id";
    echo json_encode(["message" => $conn->query($sql) ? "User deleted successfully" : "Failed to delete user"]);
} else {
    echo json_encode(["error" => "Missing user ID"]);
}
?>