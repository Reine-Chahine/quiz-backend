<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$title = $data['title'];
$description = $data['description'];
$user_id = $data['user_id'];

$sql = "INSERT INTO quizzes (title, description, create_time, user_id) 
        VALUES ('$title', '$description', NOW(), '$user_id')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Quiz created successfully"]);
} else {
    echo json_encode(["message" => "Quiz creation failed"]);
}
?>