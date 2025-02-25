<?php
header("Content-Type: application/json");
// include "config.php";
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
