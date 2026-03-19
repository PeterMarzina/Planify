<?php

require_once '../src/controllers/TaskController.php';
require_once '../templates/header.php';


$taskController = new TaskController();


$tasks = $taskController->getTaskHistory();



?>

<main class="mx-auto max-w-6xl px-4 pb-12 pt-8 sm:px-6 lg:px-8">
    <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <a href="index.php" class="mb-4 inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Terug naar hoofdpagina</a>

        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Taken Geschiedenis</h2>
        <p class="mt-2 text-sm text-slate-600">Simpel overzicht van alle aangemaakte taken.</p>

        <div class="mt-4 rounded-lg bg-slate-50 px-4 py-3 text-sm text-slate-700">
            Totaal taken: <strong><?php echo count($tasks); ?></strong>
        </div>

        <?php if (empty($tasks)): ?>
            <!-- Als er geen taken zijn, tonen we een duidelijke melding. -->
            <p class="mt-6 rounded-lg border border-dashed border-slate-300 px-4 py-6 text-sm text-slate-600">
                Nog geen taken gevonden.
            </p>
        <?php else: ?>
            <!-- Simpele lijst met taken; later kun je dit uitbreiden naar een tabel. -->
            <div class="mt-6 space-y-3">
                <?php foreach ($tasks as $task): ?>
                    <article class="rounded-xl border border-slate-200 bg-white p-4">
                        <h3 class="text-base font-semibold text-slate-900"><?php echo htmlspecialchars($task['titel']); ?></h3>

                        <p class="mt-1 text-sm text-slate-600"><?php echo htmlspecialchars($task['beschrijving'] ?: 'Geen beschrijving'); ?></p>

                        <p class="mt-2 text-xs text-slate-500">
                            Deadline:
                            <?php if (!empty($task['deadline'])): ?>
                                <?php echo date('d-m-Y H:i', strtotime($task['deadline'])); ?>
                            <?php else: ?>
                                Geen deadline
                            <?php endif; ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>
</main>

<?php require_once '../templates/footer.php'; ?>