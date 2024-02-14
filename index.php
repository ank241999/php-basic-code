<?php

// Include the database connection file
require 'db.php'; // Adjust the path as necessary

// Define the endpoints for the API
$helloEndpoint = "/hello";
$usersEndpoint = "/users"; // New endpoint

// Define the expected token
$expected_token = "kally";

// Get the path info
$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Get the token from the headers
$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : '';

// Check if the request is for the defined endpoint and if the token is correct
if ($path_info === $helloEndpoint) {
    if ($token === "Bearer " . $expected_token) {
        header("Content-Type: application/json");
        echo json_encode(array("message" => "Hello, World!"));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Unauthorized"));
    }
} elseif ($path_info === $usersEndpoint) { // Check for the users endpoint
    if ($token === "Bearer " . $expected_token) {
        header("Content-Type: application/json");
        
        // Query to fetch all users from the database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        
        $users = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        } else {
            echo json_encode(array("message" => "No users found"));
        }
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Unauthorized"));
    }
} else {
    // If the request is for an undefined endpoint, return a 404 response
    http_response_code(404);
    echo json_encode(array("message" => "Endpoint not found"));
}

// Close the database connection
$conn->close();
