<?php
include 'connection.php'; 

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$email = $data['email'];

$sql = "INSERT INTO Users (username, password, email, create_time, is_admin) 
        VALUES ('$username', '$password', '$email', NOW(), 0)";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "User registered successfully."]);
} else {
    echo json_encode(["message" => "Registration failed."]);
}
?>