<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];
$title = $data['title'];
$description = $data['description'];

$sql = "UPDATE quizzes SET title='$title', description='$description' WHERE quiz_id='$quiz_id'";
if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Quiz updated successfully"]);
} else {
    echo json_encode(["message" => "Quiz update failed"]);
}
?>
