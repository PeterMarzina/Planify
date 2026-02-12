<?php
require_once 'config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = $_POST['price'] ?? '';
    
    // Validatie
    if (empty($name)) {
        header("Location: ../public/error.php?message=Productnaam is verplicht");
        exit();
    }
    
    if (!is_numeric($price) || $price <= 0) {
        header("Location: ../public/error.php?message=Prijs moet een positief getal zijn");
        exit();
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, (float)$price]);
        
        header("Location: ../public/success.php");
        exit();
    } catch (PDOException $e) {
        header("Location: ../public/error.php?message=Database fout: " . urlencode($e->getMessage()));
        exit();
} } ?>