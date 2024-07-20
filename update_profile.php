<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Connect to the database
$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get user ID from session
$user_id = $_SESSION["id"];

// Retrieve updated information from POST data
$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$location = $_POST['location'];
$bio = $_POST['bio'];

// Fetch current user information to preserve existing image URLs
$sql = "SELECT profile_image_url, cover_page_url FROM usersitsbinfinity WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$current_images = $result->fetch_assoc();
$stmt->close();

// Initialize variables for profile and cover images
$profile_image_url = $current_images['profile_image_url'];
$cover_page_url = $current_images['cover_page_url'];

// Handle profile image upload
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $profile_image_name = $_FILES['profile_image']['name'];
    $profile_image_ext = strtolower(pathinfo($profile_image_name, PATHINFO_EXTENSION));
    
    // Generate unique filename
    $profile_image_filename = 'profile_images/' . $user_id . '.' . $profile_image_ext;

    // Move file to destination
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $profile_image_filename)) {
        $profile_image_url = $profile_image_filename;
    } else {
        echo "Error uploading profile image.";
        exit;
    }
}

// Handle cover image upload
if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
    $cover_image_name = $_FILES['cover_image']['name'];
    $cover_image_ext = strtolower(pathinfo($cover_image_name, PATHINFO_EXTENSION));
    
    // Generate unique filename
    $cover_image_filename = 'cover_images/' . $user_id . '.' . $cover_image_ext;

    // Move file to destination
    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image_filename)) {
        $cover_page_url = $cover_image_filename;
    } else {
        echo "Error uploading cover image.";
        exit;
    }
}

// Prepare SQL statement for updating user information
$sql = "UPDATE usersitsbinfinity SET 
    username = ?, 
    email = ?, 
    profile_image_url = ?, 
    cover_page_url = ?, 
    age = ?, 
    gender = ?, 
    birthdate = ?, 
    location = ?, 
    bio = ? 
    WHERE id = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("sssssisssi", 
    $username, 
    $email, 
    $profile_image_url, 
    $cover_page_url, 
    $age, 
    $gender, 
    $birthdate, 
    $location, 
    $bio, 
    $user_id
);

// Execute the update
if ($stmt->execute()) {
    echo "Profile updated successfully.";
    header("Location: account.php");
    exit;
} else {
    echo "Error updating profile: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();
