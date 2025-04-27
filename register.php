<?php
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

   
    if (!$username || !$password) {
        echo json_encode(["message" => "Missing username or password"]);
        exit;
    }


    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = mysqli_fetch_assoc($result)) {
  
        if (password_verify($password, $row['password'])) {
            
            $isAdmin = $row['is_admin'] == 1 ? 1 : 0;
            echo json_encode([
                "message" => "Login successful",
                "user_id" => $row['user_id'],
                "admin" => $isAdmin
            ]);
        } else {
            echo json_encode(["message" => "Invalid password"]);
        }
    } else {
        echo json_encode(["message" => "User not found"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}?>