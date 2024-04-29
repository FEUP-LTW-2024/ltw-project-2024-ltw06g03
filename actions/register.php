<?php
include_once('../database/connect.php');
include_once('./auth.php');
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);    //encrypt password
    $name = $_POST['name'];
    $username = $_POST['username'];
    $buyer = $_POST['buyer'];
    $seller = $_POST['seller'];

    $location = '';

    try {
        if (register_user($email, $username, $password, $name, false, $buyer ? true : false, $seller ? true : false)) {
            header("Location: http://localhost:9000/index.php");
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>