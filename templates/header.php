<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planify</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sora: ['Sora', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af'
                        }
                    }
                }
            }
        };
    </script>
</head>

<body class="font-sora min-h-screen bg-gradient-to-br from-slate-50 via-cyan-50 to-blue-100 text-slate-900">
    <header class="border-b border-slate-200/70 bg-white/70 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8">
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Planify</h1>
                <p class="text-sm text-slate-600">Beheer je taken op een rustige, duidelijke manier</p>
            </div>
            <a href="history.php" class="rounded-full border border-blue-200 bg-blue-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-blue-700 transition hover:bg-blue-100">Taken geschiedenis</a>
        </div>
    </header>