<?php
require_once '../templates/header.php';
?>

<main class="container mx-auto p-4">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">✓ Product succesvol toegevoegd!</strong>
        <span class="block sm:inline"> Je product is nu zichtbaar in de productlijst.</span>
    </div>
    <div class="mt-6 space-x-4">
        <a href="index.php" class="text-blue-700 hover:underline">Terug naar producten</a>
        <a href="form.php" class="text-blue-700 hover:underline">Nog een product toevoegen</a>
    </div>
</main>

<?php
require_once '../templates/footer.php';
?>