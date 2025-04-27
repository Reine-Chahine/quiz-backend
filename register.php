<?php
include 'connection.php'; 

$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$email = $data['email'];

?>