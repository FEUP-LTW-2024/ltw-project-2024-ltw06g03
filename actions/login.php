<?php
include_once('../database/connect.php');

session_start();

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $email = $_POST['email'];
    $userPassword = $_POST['password'];

    try {
        $db = getDatabaseConnection('../database/database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $password = $result['password'];
            if (password_verify($userPassword, $password)) {
                $_SESSION['user_email'] = $email;
                $_SESSION['logged_in'] = true;
                header("Location: http://localhost:9000/index.php");
                exit;
            }
        }
        header("Location: http://localhost:9000/login.php");
        //do not forget to print the errors in login
        exit;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>