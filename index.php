<?php

// Define the endpoint for the API
$endpoint = "/hello";

// Define the expected token
$expected_token = "kally";

// Get the path info
$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

// Get the token from the headers
$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : '';

// Check if the request is for the defined endpoint and if the token is correct
if ($path_info === $endpoint) {
    // Check if the token matches the expected token
    if ($token === "Bearer " . $expected_token) {
        // Set the response headers
        header("Content-Type: application/json");

        // Define the response array
        $response = array(
            "message" => "Hello, World!"
        );

        // Encode the response array into JSON format
        echo json_encode($response);
    } else {
        // If the token is incorrect, return a 401 Unauthorized response
        http_response_code(401);
        echo json_encode(array("message" => "Unauthorized"));
    }
} else {
    // If the request is for an undefined endpoint, return a 404 response
    http_response_code(404);
    echo json_encode(array("message" => "Endpoint not found"));
}
