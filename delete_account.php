<?php
session_start();
require './assets/PHP/Database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $userId = $_SESSION['id']; // Assuming you store the user ID in session

    // Fetch the stored password hash from the database
    $stmt = $link->prepare('SELECT password FROM usersitsbinfinity WHERE id = ?');
    if ($stmt) {
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        // Verify the entered password with the stored hash
        if (password_verify($password, $hashedPassword)) {
            // Delete the user account
            $stmt = $link->prepare('DELETE FROM usersitsbinfinity WHERE id = ?');
            if ($stmt) {
                $stmt->bind_param('i', $userId);
                if ($stmt->execute()) {
                    // Successfully deleted, redirect to a confirmation page or logout
                    session_destroy();
                    header('Location: goodbye.php'); // Redirect to a goodbye page
                    exit();
                } else {
                    echo 'Error deleting account.';
                }
                $stmt->close();
            } else {
                echo 'Failed to prepare delete statement.';
            }
        } else {
            echo 'Incorrect password.';
        }
    } else {
        echo 'Failed to prepare select statement.';
    }
}