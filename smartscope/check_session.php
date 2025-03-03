<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$response = [
    'loggedIn' => isset($_SESSION['username']),
    'username' => isset($_SESSION['username']) ? $_SESSION['username'] : null
];

echo json_encode($response);
?> 