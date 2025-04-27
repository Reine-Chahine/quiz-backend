<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = $data['password'];
$result = mysqli_query($conn, "SELECT * FROM Users WHERE username='$username'");

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        echo json_encode(["message" => "Login successful", "user_id" => $row['user_id']]);
    } else {
        echo json_encode(["message" => "Invalid password"]);
    }
} else {
    echo json_encode(["message" => "User not found"]);
}
?>
