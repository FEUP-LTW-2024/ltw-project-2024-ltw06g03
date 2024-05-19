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
    $item_id = $_POST['id'];

    $db = getDatabaseConnection('../database/database.db');
    $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
    $stmt->bindParam(':id', $item_id);
    $stmt->execute();

    echo 'success';
}
?>