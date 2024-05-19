<?php
function getDatabaseConnection(string $db) {
    try {
        $connect_str = "sqlite:" . $db;
        return new PDO($connect_str);
    } catch (PDOException $e) {
        die("Error starting database with " . $e->getMessage());
    }
    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];

    $db = getDatabaseConnection('../database/database.db');
    $stmt = $db->prepare('INSERT INTO categories (name) VALUES (:n)');
    $stmt->bindParam(':n', $category);
    $stmt->execute();

    echo 'success';
}
?>