<?php
session_start();

// Get the JSON data sent from the client
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];

    // Check if the item exists in the cart
    if (isset($_SESSION['cart'][$id])) {
        // Decrement the quantity
        $_SESSION['cart'][$id]['quantity'] -= 1;

        // If quantity becomes zero, remove the item from the cart
        if ($_SESSION['cart'][$id]['quantity'] === 0) {
            unset($_SESSION['cart'][$id]);
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
} else {
    // Respond with a failure message
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>
