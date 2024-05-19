<?php
include_once('../database/connect.php');
include_once('actions/item.php');

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
    return isset($files[0]) ? $files[0] : NULL;
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

function addMessage($chat_id, $sender_id, $receiver_id, $message) {
    $db = getDatabaseConnection('database/database.db');
    $query = "INSERT INTO messages (chat_id, sender_id, receiver_id, message) VALUES (:chat_id, :sender_id, :receiver_id, :message)";
    $stmt = $db->prepare($query);
    $stmt->execute([':chat_id' => $chat_id, ':sender_id' => $sender_id, ':receiver_id' => $receiver_id, ':message' => $message]);
}
function getUsernameFromId($userId)
{
    $db = getDatabaseConnection('database/database.db');
    $query = "SELECT username FROM users WHERE id = :userId";
    $stmt = $db->prepare($query);
    $stmt->execute([':userId' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user['username'] : null;
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

function get_buyer_id(int $user_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT id FROM buyer WHERE user_id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
}

function get_my_selling_orders(int $seller_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT * FROM shipping_forms WHERE seller_id = :id');
    $stmt->bindParam(':id', $seller_id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_my_buying_orders(int $buyer_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT * FROM shipping_forms WHERE buyer_id = :id');
    $stmt->bindParam(':id', $buyer_id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_user_id_from_buyer(int $buyer_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT user_id FROM buyer WHERE id = :id');
    $stmt->bindParam(':id', $buyer_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
}

function get_user_id_from_seller(int $buyer_id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT user_id FROM seller WHERE id = :id');
    $stmt->bindParam(':id', $buyer_id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['user_id'];
}

function is_admin(string $email) : bool {
    $db = getDatabaseConnection('database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    $stmt = $db->prepare('SELECT COUNT(*) AS cnt FROM admin WHERE user_id = :id');
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC)['cnt'];

    if ($result === 0) {
        return false;
    }
    return true;
}

function get_products_admin(string $expr) {
    $query = 'SELECT * FROM items WHERE title LIKE "%' . $expr . '%"'; 
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function get_users_admin(string $expr) {
    $query = 'SELECT * FROM users WHERE username LIKE "%' . $expr . '%"'; 
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function get_categories(string $expr) {
    $query = 'SELECT * FROM categories WHERE name LIKE "%' . $expr . '%"'; 
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function get_wishlist_items(int $id) {
    $db = getDatabaseConnection('database/database.db');
    $stmt = $db->prepare('SELECT * FROM wishlist WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $wishlist = $stmt->fetchAll();
    $items = [];

    foreach ($wishlist as $li) {
        $items[] = get_item_info($li['item_id']);
    }

    return $items;
}

?>