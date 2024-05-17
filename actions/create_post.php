<?php
include_once('../database/connect.php');

session_start();

function create_post(string $category, string $brand, string $model, string $condition, int $price, string $description, string $title) : int {
    try {
        $db = getDatabaseConnection('../database/database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
        $email = $_SESSION['user_email'];
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
        $stmt = $db->prepare('SELECT id FROM seller WHERE user_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $seller_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $db->prepare('SELECT id FROM categories WHERE name = :category');
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $category_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $db->prepare('INSERT INTO items (seller_id, category_id, brand, model, condition, price, description, title) VALUES (?,?,?,?,?,?,?,?)');
        $stmt->execute([$seller_id, $category_id, $brand, $model, $condition, $price, $description, $title]);
        $item_id = $db->lastInsertId();

        return $item_id;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>