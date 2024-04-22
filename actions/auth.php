<?php
include_once('../database/connect.php');

function register_user(string $email, string $username, string $password, string $name, bool $isAdmin, bool $isSeller, bool $isBuyer) : bool {
    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare("INSER INTO users (username, email, password, location, name) VALUES (?,?,?,?,?)");
    $stmt->execute([$username, $email, $password, '', $name]);
    $id = $db->lastInsertId();

    if ($isAdmin) {
        if ($isBuyer or $isSeller) {
            echo "Error: Cannot be admin and seller.";
            return false;
        }
        $stmt = $db->prepare("INSERT INTO admin (user_id) VALUES (?)");
        $stmt->execute([$id]);
    } else if ($isBuyer) {
        $stmt = $db->prepare("INSERT INTO buyer (user_id) VALUES (?)");
        $stmt->execute([$id]);
    } else if ($isSeller) {
        $stmt = $db->prepare("INSERT INTO seller (user_id) VALUES (?)");
        $stmt->execute([$id]);
    }
}
?>