<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=product_db",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Verbindingsfout: " . $e->getMessage());
}
