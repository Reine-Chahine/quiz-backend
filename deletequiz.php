<?php
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quiz_id = mysqli_real_escape_string($conn, $_POST['quiz_id'] ?? '');

    if (!$quiz_id) {
        echo json_encode(["message" => "Missing quiz ID"]);
        exit;
    }

    $sql = "DELETE FROM quizzes WHERE quiz_id='$quiz_id'";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Quiz deleted successfully"]);
    } else {
        echo json_encode(["message" => "Quiz deletion failed"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
