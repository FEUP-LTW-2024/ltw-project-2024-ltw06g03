<?php
include_once('../database/connect.php');

function validateRegister(string $email, string $username, string $password, string $name, bool $isAdmin, bool $isSeller, bool $isBuyer) {
    $errors = array();

    $db = getDatabaseConnection("../database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($res['count'] != 0) {
        $errors[] = "username";
    }

    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($res['count'] != 0) {
        $errors[] = "email";
    }

    return $errors;
}
?>