<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'marketplace';
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}










