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

// Get the JSON data sent from the client
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];
    $user_id = get_id_from_email($_SESSION['user_email']);

    $db = getDatabaseConnection('../database/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'INSERT INTO  wishlist (user_id, item_id) VALUES ('.$user_id.','.$id.')';
    error_log($query);
    $stmt = $db->prepare($query);
    
    $stmt->execute();

    echo json_encode(['success' => true]);
} else {
    // Respond with a failure message
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>
