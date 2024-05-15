<?php
include_once('../database/connect.php');

function is_seller(string $email) : bool {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $stmt = $db->prepare('SELECT COUNT(*) AS cnt FROM seller WHERE user_id = :id');
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC)['cnt'];

    if ($result === 0) {
        return false;
    }
    return true;
}

function get_seller_name(int $seller_id) {
    return "Name Placeholder";
}

function get_category(int $category) {
    return "Category Placeholder";
}

function get_photo_path(int $item_id) {
    $base_path = "user_images";
    $files = glob($base_path . '/' . $item_id . '*');
    return $files[0];
}

?>