<?php
include_once('../database/connect.php');

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

function get_buyer_id(int $id) {
    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT id FROM buyer WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $buyer_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    return $id;
}

function get_seller_id_(int $id) {
    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT id FROM seller WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $buyer_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    return $id;
}

function get_item_info(int $id) : array {
    $db = getDatabaseConnection("../database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT * FROM items WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $details = $data;

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo 'Cart is empty.';
        exit;
    }

    foreach ($_SESSION['cart'] as $item) {
        $item_id = $item['id'];
        $buyer_user_id = get_id_from_email($_SESSION['user_email']);
        $buyer_id = get_buyer_id($buyer_user_id);
        $item_info = get_item_info($item_id);
        $item_seller_user_id = $item_info['seller_id'];
        $seller_id = get_seller_id_($item_seller_user_id);
        $quantity = $item['quantity'];

        $db = getDatabaseConnection('../database/database.db');

        $stmt = $db->prepare('INSERT INTO shipping_forms (item_id, seller_id, buyer_id, shipping_details, quantity) VALUES (?,?,?,?,?)');
        $stmt->execute([$item_id, $seller_id, $buyer_id, $details, $quantity]);
    }

    unset($_SESSION['cart']);

    echo 'success';
}


?>