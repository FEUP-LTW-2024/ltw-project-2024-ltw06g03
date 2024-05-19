<?php
include_once("../database/connect.php");

session_start();

function get_id_from_email(string $email) {
    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    return $id;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = get_id_from_email($_SESSION['user_email']);
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $profile_photo = $_FILES['profile_photo'];


    if ($profile_photo && $profile_photo['error'] == UPLOAD_ERR_OK) {
        $upload_dir = '../user_images/';
        $extension = pathinfo($profile_photo['name'], PATHINFO_EXTENSION);
        $upload_file = $upload_dir . $user_id . '.' . $extension;

        if (move_uploaded_file($profile_photo['tmp_name'], $upload_file)) {

        } else {
            echo 'Failed to upload file.';
            exit;
        }
    }

    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($username) {
        $stmt = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE username = :u');
        $stmt->bindParam(':u', $username);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)['cnt'] != 0) {
            echo 'Username already exists.';
            exit;
        }
        $stmt = $db->prepare('UPDATE users SET username = :u WHERE id = :i');
        $stmt->bindParam(':u', $username);
        $stmt->bindParam(':i', $user_id);
        $stmt->execute();
    }

    if ($name) {
        $stmt = $db->prepare('UPDATE users SET name = :n WHERE id = :i');
        $stmt->bindParam(':n', $name);
        $stmt->bindParam(':i', $user_id);
        $stmt->execute();
    }

    if ($password) {
        $options = ['cost' => 12];
        $password = password_hash($password, PASSWORD_DEFAULT, $options);
        $stmt = $db->prepare('UPDATE users SET password = :p WHERE id = :i');
        $stmt->bindParam(':p', $password);
        $stmt->bindParam(':i', $user_id);
        $stmt->execute();
    }

    echo 'success';
} else {
    echo 'Invalid request method.';
}
?>
