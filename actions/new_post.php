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
    $description = $_POST['description'];

    try {
        $item_id = create_post($category, $brand, $model, $condition, $price, $description);

        if ($_FILES['image']['size'] > 500000) {
            header("Location: https://localhost:9000/new_post.php?tooLarge");
            exit;
        }
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                header("Location: https://localhost:9000/new_post.php?wrongType");
                exit;
        }

        $target_file = $target_dir . $item_id . "." . $imageFileType;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            header("Location: http://localhost:9000/new_post.php?sucess");
            exit;
        } else {
            header("Location: http://localhost:9000/new_post.php?fail");
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>