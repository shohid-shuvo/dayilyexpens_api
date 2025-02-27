<?php

header('Content-Type: application/json');
$expenses = []; 
include "api/get_expense_list.php";
echo json_encode($expenses, JSON_PRETTY_PRINT);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");




$config_path = realpath("config.php");
if (!$config_path) {
    die("Config file not found!");
}
include($config_path);

// grap API Endpoint 
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case "POST":
        include "api/add_expense.php";
        break;
    case "GET":
        if (isset($_GET["id"])) {
            include "api/get_expense.php";
        } else {
            include "api/get_expense_list.php";
        }
        break;
    case "PUT":
        include "api/update_expense.php";
        break;
    case "DELETE":
        include "api/delete_expense.php";
        break;
    default:
        echo json_encode(["error" => "Invalid Request"]);
        break;
}
?>
