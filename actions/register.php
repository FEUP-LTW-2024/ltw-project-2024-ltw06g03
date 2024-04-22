<?php
include_once('../database/connect.php');
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);    //encrypt password
    $name = $_POST['name'];
    $username = $_POST['username'];

    $location = '';

    try {
        $db = getDatabaseConnection('../database/database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("INSERT INTO users (username, email, password, location, name) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $email, $password, $location, $name]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>