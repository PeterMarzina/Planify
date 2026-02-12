<?php
require_once '../templates/header.php';

$error_message = $_GET['message'] ?? 'Er is een onbekende fout opgetreden.';
?>

<main>
    <div class="error-message">
        <h2>✗ Fout!</h2>
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <a href="index.php">Terug naar producten</a>
        <a href="form.html">Opnieuw proberen</a>
    </div>
</main>

<?php
require_once '../templates/footer.php';
?>