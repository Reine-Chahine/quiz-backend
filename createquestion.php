<?php
include 'connection.php';

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $question_title = $_POST['question_title'] ?? null;
    $type = $_POST['type'] ?? null;
    $correct = $_POST['correct'] ?? null;
    $user_id = $_POST['user_id'] ?? null;
    $quiz_id = $_POST['quiz_id'] ?? null;

   
    if (!$question_title || !$type || !$correct || !$user_id || !$quiz_id) {
        echo json_encode(["message" => "Missing required fields."]);
        exit;
    }

   
    $sql = "INSERT INTO questions (question_title, type, correct, user_id, quiz_id) 
            VALUES ('$question_title', '$type', '$correct', '$user_id', '$quiz_id')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Question created successfully"]);
    } else {
        echo json_encode(["message" => "Question creation failed"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
