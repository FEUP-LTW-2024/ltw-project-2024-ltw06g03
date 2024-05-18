<?php
session_start();

// Get the JSON data sent from the client
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];

    // Check if the item exists in the cart
    if (isset($_SESSION['cart'][$id])) {
        // Increment the quantity of the item by 1
        $_SESSION['cart'][$id]['quantity'] += 1;

        // Respond with success message
        echo json_encode(['success' => true]);
    } else {
        // Respond with failure message if the item is not found in the cart
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
} else {
    // Respond with a failure message if no data is received
    echo json_encode(['success' => false, 'message' => 'No data received']);
}
?>
