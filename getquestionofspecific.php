<?php
include 'connection.php';

$quiz_id = $_GET['quiz_id'];

$result = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id='$quiz_id'");
$questions = [];
while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

echo json_encode($questions);
?>