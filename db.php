<?php
// Database configuration
$host = 'localhost'; // or your host
$user = 'root';
$password = '';
$dbname = 'test';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
