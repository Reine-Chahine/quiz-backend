<?php
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ques_id = mysqli_real_escape_string($conn, $_POST['ques_id'] ?? '');

    if (!$ques_id) {
        echo json_encode(["message" => "Missing question ID"]);
        exit;
    }

    $sql = "DELETE FROM questions WHERE ques_id='$ques_id'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Question deleted successfully"]);
    } else {
        echo json_encode(["message" => "Question deletion failed"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
