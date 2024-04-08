<?php
    function getDatabaseConnection(string $db) {
        try {
            $connect_str = "sqlite:" . $db;
            return new PDO($connect_str);
        } catch (PDOException $e) {
            die("Error starting database with " . $e->getMessage());
        }
        
    }
?>