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

function is_buyer(string $email) : bool {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $stmt = $db->prepare('SELECT COUNT(*) AS cnt FROM buyer WHERE user_id = :id');
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC)['cnt'];

    if ($result === 0) {
        return false;
    }
    return true;
}

function get_seller_name(int $seller_id) {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT name FROM users WHERE id = :id');
    $stmt->bindParam(':id', $seller_id);
    $stmt->execute();

    $name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];

    return $name;
}

function get_category(int $category) {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT name FROM categories WHERE id = :id');
    $stmt->bindParam(':id', $category);
    $stmt->execute();

    $name = $stmt->fetch(PDO::FETCH_ASSOC)['name'];

    return $name;
}

function get_photo_path(int $item_id) {
    $base_path = "user_images";
    $files = glob($base_path . '/' . 'item_' . $item_id . '*');
    return $files[0];
}

function get_seller_username(string $id) {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT username FROM users WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $name = $stmt->fetch(PDO::FETCH_ASSOC)['username'];

    return $name;
}

function get_id_from_email(string $email) {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    return $id;
}

function pfp_exists(string $email) {
    $id = get_id_from_email($email);
    $pattern = 'user_images/' . $id . '.*';
    $files = glob($pattern, GLOB_NOSORT);

    if (!empty($files)) {
        return $files[0];
    }
    return NULL;
}
function pfp_exists_with_id(int $id) {
    $pattern = 'user_images/' . $id . '.*';
    $files = glob($pattern, GLOB_NOSORT);

    if (!empty($files)) {
        return $files[0];
    }
    return NULL;
}

function get_selling_items(int $seller_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT * FROM items WHERE seller_id = :id');
    $stmt->bindParam(':id', $seller_id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_seller_id(int $user_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT id FROM seller WHERE user_id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
}

?>