<?php
include_once('database/connect.php');

function get_item_info(int $id) : array {
    $db = getDatabaseConnection("database/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT * FROM items WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    return $res;
}

?>