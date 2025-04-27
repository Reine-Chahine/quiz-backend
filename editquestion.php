<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$ques_id = $data['ques_id'];
$question_title = $data['question_title'];
$type = $data['type'];
$correct = $data['correct'];
$sql = "UPDATE questions 
        SET question_title='$question_title', type='$type', correct='$correct' 
        WHERE ques_id='$ques_id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Question updated successfully"]);
} else {
    echo json_encode(["message" => "Question update failed"]);
}
?>