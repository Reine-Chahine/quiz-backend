<?php
include 'connection.php';

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $quiz_id = $_POST['quiz_id'] ?? null;
    $title = $_POST['title'] ?? null;
    $description = $_POST['description'] ?? null;

    
    if (!$quiz_id || !$title || !$description) {
        echo json_encode(["message" => "Missing required fields (quiz_id, title, or description)."]);
        exit;
    }

   
    $sql = "UPDATE quizzes SET title='$title', description='$description' WHERE quiz_id='$quiz_id'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Quiz updated successfully"]);
    } else {
        echo json_encode(["message" => "Quiz update failed"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>

