<?php
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);
$ques_id = $data['ques_id'];

$sql = "DELETE FROM questions WHERE ques_id='$ques_id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["message" => "Question deleted successfully"]);
} else {
    echo json_encode(["message" => "Question deletion failed"]);
}
?>