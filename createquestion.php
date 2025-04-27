<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$question_title = $data['question_title'];
$type = $data['type'];
$correct = $data['correct'];
$user_id = $data['user_id'];
$quiz_id = $data['quiz_id'];
$sql = "INSERT INTO questions (question_title, type, correct, user_id, quiz_id) 
        VALUES ('$question_title', '$type', '$correct', '$user_id', '$quiz_id')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Question created successfully"]);
} else {
    echo json_encode(["message" => "Question creation failed"]);
}
?>