<?php
// Laad Composer autoloader
require_once __DIR__ . '/../../vendor/autoload.php';

// Laad .env bestand met Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

// Monolog: Logging instellen
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('planify');
$log->pushHandler(new StreamHandler(__DIR__ . '/../../logs/app.log', Logger::WARNING));

// Database configuratie
$dbHost = $_ENV['DB_HOST'] ?? 'localhost';
$dbName = $_ENV['DB_NAME'] ?? 'product_db';
$dbUser = $_ENV['DB_USER'] ?? 'root';
$dbPass = $_ENV['DB_PASS'] ?? '';

try {
    $pdo = new PDO(
        "mysql:host={$dbHost};dbname={$dbName}",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    $log->alert("verbinding gelukt: ");
} catch (PDOException $e) {
    $log->error("Verbindingsfout: " . $e->getMessage());
    die("Verbindingsfout: " . $e->getMessage());
}
