<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=brainster_library;", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) {
    echo "Database down";
    die();
}
