<?php
session_start();
require('./assets/PHP/Database/config.php');


if (isset($_GET['id'])) {
    $image_id = intval($_GET['id']);


    // Log the received image_id
    error_log("Received image_id: $image_id");

    // Retrieve the image file name from the database
    $sql = "SELECT image FROM image_gallery WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $image_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $image = $result->fetch_assoc();
        $image_name = $image['image'];

        // Log the image_name
        error_log("Image to be deleted: $image_name");

        // Delete the image file from the server
        if (file_exists('uploads/' . $image_name)) {
            if (unlink('uploads/' . $image_name)) {
                error_log("Successfully deleted image file: $image_name");
            } else {
                error_log("Failed to delete image file: $image_name");
            }
        } else {
            error_log("Image file does not exist: $image_name");
        }

        // Delete the image record from the database
        $sql = "DELETE FROM image_gallery WHERE id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $image_id);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Image deleted successfully.';
            error_log("Image record with ID $image_id deleted successfully.");
        } else {
            $_SESSION['error'] = 'Error deleting image from database.';
            error_log("Error deleting record with ID $image_id: " . $stmt->error);
        }
    } else {
        $_SESSION['error'] = 'Image not found.';
        error_log("Image with ID $image_id not found.");
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Invalid image ID.';
    header("Location: features.php");
    exit();
  }

header("Location: features.php");
exit();
