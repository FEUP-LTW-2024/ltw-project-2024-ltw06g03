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
    $id = $_POST['id'];

    $db = getDatabaseConnection('../database/database.db');
    $stmt = $db->prepare('DELETE FROM categories WHERE id = :n');
    $stmt->bindParam(':n', $id);
    $stmt->execute();

    echo 'success';
}
?>