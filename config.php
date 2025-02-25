<?php
$host = "localhost";  
$user = "root";  
$pass = "";  
$dbname = "dailyexpense"; 

$conn = new mysqli($host, $user, $pass, $dbname);
// if($conn){
//     echo 'connected';
// }

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}
?>
