<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$question_title = $data['question_title'];
$type = $data['type'];
$correct = $data['correct'];
$user_id = $data['user_id'];
$quiz_id = $data['quiz_id'];
?>