<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$quiz_id = $data['quiz_id'];
$title = $data['title'];
$description = $data['description'];

$sql = "UPDATE quizzes SET title='$title', description='$description' WHERE quiz_id='$quiz_id'";


?>
