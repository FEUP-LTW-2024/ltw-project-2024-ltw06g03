<?php
    function getDatabaseConnection(string $db) {
        $connect_str = "sqlite:" . $db;
        return new PDO($connect_str);
    }
?>