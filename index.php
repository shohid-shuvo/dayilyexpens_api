<?php

// header('Content-Type: application/json');
// $expenses = []; 
// include "api/get_expense_list.php";
// echo json_encode($expenses, JSON_PRETTY_PRINT);
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type, Authorization");




// $config_path = realpath("config.php");
// if (!$config_path) {
//     die("Config file not found!");
// }
// include($config_path);

// // grap API Endpoint 
// $request_method = $_SERVER["REQUEST_METHOD"];

// switch ($request_method) {
//     case "POST":
//         include "api/add_expense.php";
//         break;
//     case "GET":
//         if (isset($_GET["id"])) {
//             include "api/get_expense.php";
//         } else {
//             include "api/get_expense_list.php";
//         }
//         break;
//     case "PUT":
//         include "api/update_expense.php";
//         break;
//     case "DELETE":
//         include "api/delete_expense.php";
//         break;
//     default:
//         echo json_encode(["error" => "Invalid Request"]);
//         break;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        pre {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .endpoint {
            background-color: #4EB2E0;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .endpoint h3 {
            padding: 20px 10px; 
            background-color: #DBD225; 
            border-radius: 5px;
        }

        .code-block {
            font-family: monospace;
        }
    </style>
</head>
<body>
    <h1>API Documentation</h1>
    <small>by shohidul</small>
    
    <h2>Base URL</h2>
    <p>All the endpoints below can be accessed via the following base URL:</p>
    <pre>http://expenseapi.infy.uk/</pre>

    <h2>Available Endpoints</h2>

    <!-- Add Expense Endpoint -->
    <div class="endpoint">
        <h3>1. Add Expense</h3>
        <p><strong>Method:</strong> POST</p>
        <p><strong>Endpoint:</strong> /api/add_expense.php</p>
        <p><strong>Description:</strong> Adds a new expense record to the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "type_id": "1",
    "payment_method_id": "1",
    "amount": "500",
    "currency_id": "1",
    "note": "Lunch at a restaurant",
    "created_by": "Admin",
    "updated_by": "Admin"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Expense added successfully"
}
        </pre>
    </div>

    <!-- Get Expenses List Endpoint -->
    <div class="endpoint">
        <h3>2. Get Expense List</h3>
        <p><strong>Method:</strong> GET</p>
        <p><strong>Endpoint:</strong> /api/get_expense_list.php</p>
        <p><strong>Description:</strong> Retrieves a list of all expenses in the system.</p>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
[
    {
        "id": "1",
        "type_id": "1",
        "payment_method_id": "1",
        "amount": "500.00",
        "currency_id": "1",
        "note": "Lunch at a restaurant",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "created_by": "Admin",
        "updated_at": "2025-02-25 12:50:31",
        "updated_by": "Admin"
    },
    {
        "id": "2",
        "type_id": "2",
        "payment_method_id": "2",
        "amount": "1500.00",
        "currency_id": "1",
        "note": "Train fare",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "created_by": "Admin",
        "updated_at": "2025-02-25 12:50:31",
        "updated_by": "Admin"
    }
]
        </pre>
    </div>


    <!-- Soft Delete Expense Endpoint -->
    <div class="endpoint">
        <h3>4. Soft Delete Expense</h3>
        <p><strong>Method:</strong> DELETE</p>
        <p><strong>Endpoint:</strong> /api/delete_expense.php</p>
        <p><strong>Description:</strong> Soft deletes an expense by changing its status to "inactive".</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Expense deleted successfully"
}
        </pre>
    </div>
     <!-- Add Type of Cost Endpoint -->
     <div class="endpoint">
        <h3>1. Add Type of Cost</h3>
        <p><strong>Method:</strong> POST</p>
        <p><strong>Endpoint:</strong> /api/types_of_cost/create_type.php</p>
        <p><strong>Description:</strong> Adds a new type of cost record to the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "title": "Transportation",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Type of cost added successfully"
}
        </pre>
    </div>

    <!-- Get Types of Cost List Endpoint -->
    <div class="endpoint">
        <h3>2. Get Types of Cost List</h3>
        <p><strong>Method:</strong> GET</p>
        <p><strong>Endpoint:</strong> /api/types_of_cost/get_types.php</p>
        <p><strong>Description:</strong> Retrieves a list of all types of costs in the system.</p>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
[
    {
        "id": "1",
        "title": "Transportation",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    },
    {
        "id": "2",
        "title": "Food",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    }
]
        </pre>
    </div>

    <!-- Update Type of Cost Endpoint -->
    <div class="endpoint">
        <h3>3. Update Type of Cost</h3>
        <p><strong>Method:</strong> PUT</p>
        <p><strong>Endpoint:</strong> /api/types_of_cost/update_type.php</p>
        <p><strong>Description:</strong> Updates an existing type of cost record in the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1",
    "title": "Transportation",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Type of cost updated successfully"
}
        </pre>
    </div>

    <!-- Delete Type of Cost Endpoint -->
    <div class="endpoint">
        <h3>4. Delete Type of Cost</h3>
        <p><strong>Method:</strong> DELETE</p>
        <p><strong>Endpoint:</strong> /api/types_of_cost/delete_type.php</p>
        <p><strong>Description:</strong> Soft deletes a type of cost by changing its status to "inactive".</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Type of cost deleted successfully"
}
        </pre>
    </div>

    <!-- Add Payment Method Endpoint -->
    <div class="endpoint">
        <h3>5. Add Payment Method</h3>
        <p><strong>Method:</strong> POST</p>
        <p><strong>Endpoint:</strong> /api/payment_methods/create_payment_method.php</p>
        <p><strong>Description:</strong> Adds a new payment method record to the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "title": "Credit Card",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Payment method added successfully"
}
        </pre>
    </div>

    <!-- Get Payment Methods List Endpoint -->
    <div class="endpoint">
        <h3>6. Get Payment Methods List</h3>
        <p><strong>Method:</strong> GET</p>
        <p><strong>Endpoint:</strong> /api/payment_methods/get_payment_methods.php</p>
        <p><strong>Description:</strong> Retrieves a list of all payment methods in the system.</p>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
[
    {
        "id": "1",
        "title": "Credit Card",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    },
    {
        "id": "2",
        "title": "Cash",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    }
]
        </pre>
    </div>

    <!-- Update Payment Method Endpoint -->
    <div class="endpoint">
        <h3>7. Update Payment Method</h3>
        <p><strong>Method:</strong> PUT</p>
        <p><strong>Endpoint:</strong> /api/payment_methods/update_payment_method.php</p>
        <p><strong>Description:</strong> Updates an existing payment method record in the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1",
    "title": "Debit Card",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Payment method updated successfully"
}
        </pre>
    </div>

    <!-- Delete Payment Method Endpoint -->
    <div class="endpoint">
        <h3>8. Delete Payment Method</h3>
        <p><strong>Method:</strong> DELETE</p>
        <p><strong>Endpoint:</strong> /api/payment_methods/delete_payment_method.php</p>
        <p><strong>Description:</strong> Soft deletes a payment method by changing its status to "inactive".</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Payment method deleted successfully"
}
        </pre>
    </div>

    <!-- Add Currency Endpoint -->
    <div class="endpoint">
        <h3>9. Add Currency</h3>
        <p><strong>Method:</strong> POST</p>
        <p><strong>Endpoint:</strong> /api/currency/create_currency.php</p>
        <p><strong>Description:</strong> Adds a new currency record to the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "symbol": "USD",
    "currency_name": "US Dollar",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Currency added successfully"
}
        </pre>
    </div>

    <!-- Get Currencies List Endpoint -->
    <div class="endpoint">
        <h3>10. Get Currencies List</h3>
        <p><strong>Method:</strong> GET</p>
        <p><strong>Endpoint:</strong> /api/currency/get_currencies.php</p>
        <p><strong>Description:</strong> Retrieves a list of all currencies in the system.</p>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
[
    {
        "id": "1",
        "symbol": "USD",
        "currency_name": "US Dollar",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    },
    {
        "id": "2",
        "symbol": "EUR",
        "currency_name": "Euro",
        "status": "active",
        "created_at": "2025-02-25 12:50:31",
        "updated_at": "2025-02-25 12:50:31"
    }
]
        </pre>
    </div>

    <!-- Update Currency Endpoint -->
    <div class="endpoint">
        <h3>11. Update Currency</h3>
        <p><strong>Method:</strong> PUT</p>
        <p><strong>Endpoint:</strong> /api/currency/update_currency.php</p>
        <p><strong>Description:</strong> Updates an existing currency record in the database.</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1",
    "symbol": "USD",
    "currency_name": "United States Dollar",
    "status": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Currency updated successfully"
}
        </pre>
    </div>

    <!-- Delete Currency Endpoint -->
    <div class="endpoint">
        <h3>12. Delete Currency</h3>
        <p><strong>Method:</strong> DELETE</p>
        <p><strong>Endpoint:</strong> /api/currency/delete_currency.php</p>
        <p><strong>Description:</strong> Soft deletes a currency by changing its status to "inactive".</p>
        <p><strong>Request Body:</strong></p>
        <pre class="code-block">
{
    "id": "1"
}
        </pre>
        <p><strong>Response:</strong></p>
        <pre class="code-block">
{
    "message": "Currency deleted successfully"
}
        </pre>
    </div>

</body>
</html>
