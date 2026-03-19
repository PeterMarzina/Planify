<?php
require_once '../src/config/db_connection.php';
require_once '../templates/header.php';

$stmt = $pdo->prepare("SELECT * FROM products ORDER BY name");
$stmt->execute();
$products = $stmt->fetchAll();
?>

<main class="container mx-auto p-4">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($products as $product): ?>
            <div class="bg-white rounded shadow p-4 hover:shadow-lg transition">
                <h3 class="text-lg font-semibold mb-2"><?php echo $product['name']; ?></h3>
                <p class="text-gray-700 mb-2"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="text-blue-700 font-bold">€<?php echo number_format($product['price'], 2); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-8 text-center">
        <a href="form.php" class="inline-block bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-800 transition">Een product toevoegen</a>
    </div>
</main>

<?php require_once '../templates/footer.php'; ?>