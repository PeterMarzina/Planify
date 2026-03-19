<?php
require_once '../templates/header.php';

$error_message = $_GET['message'] ?? 'Er is een onbekende fout opgetreden.';
?>

<main class="container mx-auto p-4">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">✗ Fout!</strong>
        <span class="block sm:inline"> <?php echo htmlspecialchars($error_message); ?></span>
    </div>
    <div class="mt-6 space-x-4">
        <a href="index.php" class="text-blue-700 hover:underline">Terug naar producten</a>
        <a href="form.php" class="text-blue-700 hover:underline">Opnieuw proberen</a>
    </div>
</main>

<?php
require_once '../templates/footer.php';
?>