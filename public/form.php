<?php require_once '../templates/header.php'; ?>

<main class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Nieuw Product Toevoegen</h1>

    <form action="../src/process_product.php" method="POST" class="bg-white rounded shadow p-6 space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Productnaam:</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Prijs:</label>
            <input type="number" id="price" name="price" step="0.01" required class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-800 transition">Product Toevoegen</button>
    </form>
</main>

<?php require_once '../templates/footer.php'; ?>