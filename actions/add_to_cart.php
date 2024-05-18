<?php
session_start();

// Get the JSON data sent from the client
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];
    
    error_log('Val: ' . $id);

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the item is already in the cart
    if (!isset($_SESSION['cart'][$id])) {
        // Add new item with quantity 1
        $_SESSION['cart'][$id] = ['id' => $id, 'quantity' => 1];
    } else {
        // Increment the quantity
        $_SESSION['cart'][$id]['quantity'] += 1;
    }

    echo json_encode(['success' => true]);
} else {
    // Respond with a failure message
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>
