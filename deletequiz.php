<?php
include 'connection.php';


$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];

$sql = "DELETE FROM quizzes WHERE quiz_id='$quiz_id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Quiz deleted successfully"]);
} else {
    echo json_encode(["message" => "Quiz deletion failed"]);
}
?>