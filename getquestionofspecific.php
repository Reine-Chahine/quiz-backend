<?php
include 'connection.php';

$quiz_id = $_GET['quiz_id'];

$result = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id='$quiz_id'");

?>