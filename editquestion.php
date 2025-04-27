<?php
include 'connection.php';

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $ques_id = $_POST['ques_id'] ?? null;
    $question_title = $_POST['question_title'] ?? null;
    $type = $_POST['type'] ?? null;
    $correct = $_POST['correct'] ?? null;


    if (!$ques_id || !$question_title || !$type || !$correct) {
        echo json_encode(["message" => "Missing required fields."]);
        exit;
    }

  
    $sql = "UPDATE questions 
            SET question_title='$question_title', type='$type', correct='$correct' 
            WHERE ques_id='$ques_id'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Question updated successfully"]);
    } else {
        echo json_encode(["message" => "Question update failed"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
