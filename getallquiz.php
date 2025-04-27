<?php
include 'connection.php';

$result = mysqli_query($conn, "SELECT * FROM Quizzes");

$quizzes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $quizzes[] = $row;
}

echo json_encode($quizzes);
?>