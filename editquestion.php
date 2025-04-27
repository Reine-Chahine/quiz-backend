<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$ques_id = $data['ques_id'];
$question_title = $data['question_title'];
$type = $data['type'];
$correct = $data['correct'];

?>