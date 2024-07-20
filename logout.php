<?php
// Include database configuration file
include './assets/PHP/Database/config.php';

// Start session
session_start();

// Update user status to "logged out" in the database
if (isset($_SESSION["id"])) {
    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "UPDATE usersitsbinfinity SET status = 'logged out' WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $_SESSION["id"]);
    $stmt->execute();
    $stmt->close();
    $connection->close();
}

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: ./login.php");
exit;
