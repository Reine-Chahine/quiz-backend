<?php


$servername = "localhost";  
$username = "root";            
$password = "";               
$database = "quiz_db";         

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]));
}


 echo json_encode(["status" => "success", "message" => "Connected successfully"]);
?>