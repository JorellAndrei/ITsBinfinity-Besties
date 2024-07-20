<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "User not logged in.";
    exit;
}

// Connect to the database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    exit;
}

// Get user ID from session
$user_id = $_SESSION["id"];

// Get form data
$username = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$timestamp = date("Y-m-d H:i:s"); // Current timestamp

// Prepare SQL statement to insert contact form data into database
$sql = "INSERT INTO contact_form (user_id, username, email, phone, message, timestamp) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $connection->prepare($sql);

if ($stmt === false) {
    echo "Error preparing statement: " . $connection->error;
    exit;
}

$stmt->bind_param("isssss", $user_id, $username, $email, $phone, $message, $timestamp);

// Execute the statement
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$connection->close();
