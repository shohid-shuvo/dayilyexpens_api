<?php
$host = "localhost";  
$user = "root";  
$pass = "";  
$dbname = "dailyexpense"; 

// for live site
// $host = "sql202.infinityfree.com";  
// $user = "if0_37328865";  
// $pass = "Infinity001956";  
// $dbname = "if0_37328865_dailyexpense"; 

$conn = new mysqli($host, $user, $pass, $dbname);
// if($conn){
//     echo 'connected';
// }

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}
?>
