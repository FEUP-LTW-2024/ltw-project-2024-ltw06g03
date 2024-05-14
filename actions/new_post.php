<?php
include_once('create_post.php');

session_start();
$target_dir = "../user_images/";

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $condition = $_POST['condition'];
    $price = $_POST['price'];

    try {
        $item_id = create_post($category, $brand, $model, $condition, $price);

        if ($_FILES['image']['size'] > 100000000) {
            header("Location: https://localhost:9000/new_post.php?tooLarge");
            exit;
        }

        $target_file = $target_dir . $item_id;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            header("Location: https://localhost:9000/new_post.php?sucess");
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>