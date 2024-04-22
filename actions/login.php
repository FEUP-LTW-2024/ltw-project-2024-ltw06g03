<?php
include_once('../database/connect.php');

const FIELDS = [
    'email' => 'email',
    'password' => 'string'
];

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $email = $_POST['email'];
    $userPassword = $_POST['password'];
    $userPassword = sha1($userPassword);

    try {
        $db = getDatabaseConnection('../database/database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $password = $result['password'];
            if ($password === $userPassword) {
                echo 'Logged In';
            }
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>