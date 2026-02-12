<?php require_once '../templates/header.php'; ?>

<body>
    <h1>Nieuw Product Toevoegen</h1>

    <form action="../src/process_product.php" method="POST">
        <label for="name">Productnaam:</label>
        <input type="text" id="name" name="name">

        <label for="description">Beschrijving:</label>
        <textarea id="description" name="description"></textarea>

        <label for="price">Prijs:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <button type="submit">Product Toevoegen</button>
    </form>
</body>

</html>