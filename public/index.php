<?php
require_once '../src/config/db_connection.php';
require_once '../templates/header.php';
require_once "../src/controllers/TaskController.php";

$taskController = new TaskController();

// taak afronden
// if (isset($_GET['done'])) {
//     $taskController->markTaskDone($_GET['done']);
// }

// taak verwijderen
if (isset($_GET['delete'])) {
    $taskController->deleteTask($_GET['delete']);
}

// nieuwe taak toevoegen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskController->createTask(
        $_POST['titel'],
        $_POST['deadline'],
        $_POST['beschrijving'],
        null
    );
}

$tasks = $taskController->getAllTasks();
?>

<main class="mx-auto max-w-6xl px-4 pb-12 pt-8 sm:px-6 lg:px-8">
    <section class="mb-10 grid gap-6 lg:grid-cols-[1.2fr_1fr]">
        <div class="relative overflow-hidden rounded-2xl border border-blue-200 bg-white p-6 shadow-sm">
            <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-blue-100 blur-2xl"></div>
            <h2 class="relative text-2xl font-bold tracking-tight text-slate-900">Mijn Taken</h2>
            <p class="relative mt-2 max-w-prose text-sm text-slate-600">Hou focus op wat belangrijk is. Voeg snel een taak toe en bekijk je planning in een overzichtelijke kaartweergave.</p>
        </div>

        <form method="POST" class="mx-0 max-w-none rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Nieuwe taak</h3>
            <p class="mt-1 text-sm text-slate-500">Alles met een sterretje is verplicht.</p>

            <div class="mt-5 space-y-4">
                <div>
                    <label for="titel" class="mb-1 block text-sm font-medium text-slate-700">Titel *</label>
                    <input id="titel" type="text" name="titel" placeholder="Bijv. Sprint planning" required class="m-0 w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div>
                    <label for="deadline" class="mb-1 block text-sm font-medium text-slate-700">Deadline</label>
                    <input id="deadline" type="datetime-local" name="deadline" class="m-0 w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div>
                    <label for="beschrijving" class="mb-1 block text-sm font-medium text-slate-700">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="4" placeholder="Korte samenvatting van de taak" class="m-0 w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"></textarea>
                </div>
            </div>

            <button type="submit" class="mt-5 inline-flex w-full items-center justify-center rounded-xl bg-brand-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-blue-200">Taak toevoegen</button>
        </form>
    </section>

    <section>
        <div class="mb-4 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-900">Overzicht</h3>
            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600"><?php echo count($tasks); ?> taken</span>
        </div>

        <?php if (empty($tasks)): ?>
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white/80 px-6 py-12 text-center">
                <p class="text-base font-medium text-slate-700">Nog geen taken toegevoegd</p>
                <p class="mt-1 text-sm text-slate-500">Gebruik het formulier hierboven om je eerste taak te maken.</p>
            </div>
        <?php else: ?>
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($tasks as $task): ?>
                    <article class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <h4 class="text-base font-semibold text-slate-900"><?php echo htmlspecialchars($task['titel']); ?></h4>

                        <p class="mt-2 min-h-12 text-sm text-slate-600"><?php echo nl2br(htmlspecialchars($task['beschrijving'] ?: 'Geen beschrijving toegevoegd.')); ?></p>

                        <?php if ($task['deadline']): ?>
                            <p class="mt-3 text-xs font-medium uppercase tracking-wide text-blue-700">Deadline: <?php echo date('d-m-Y H:i', strtotime($task['deadline'])); ?></p>
                        <?php else: ?>
                            <p class="mt-3 text-xs font-medium uppercase tracking-wide text-slate-400">Geen deadline</p>
                        <?php endif; ?>

                        <div class="mt-4">
                            <a href="?delete=<?php echo $task['id']; ?>" class="inline-flex items-center rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 transition hover:bg-rose-100">Verwijderen</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require_once '../templates/footer.php'; ?>