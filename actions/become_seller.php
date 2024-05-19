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

$db = getDatabaseConnection('../database/database.db');
$id = get_id_from_email($_SESSION['user_email']);

$stmt = $db->prepare('INSERT INTO seller (user_id) VALUES (?)');
$stmt->execute([$id]);

echo 'success';

?>