<?php
require_once '../src/config/db_connection.php';
require_once '../templates/header.php';

$stmt = $pdo->prepare("SELECT * FROM products ORDER BY name");
$stmt->execute();
$products = $stmt->fetchAll();
?>

<main>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>€<?php echo number_format($product['price'], 2); ?></p>
            </div>
        <?php endforeach; ?>
        <a href="form.php">Een product toevoegen</a>
    </div>
</main>

<?php require_once '../templates/footer.php'; ?>