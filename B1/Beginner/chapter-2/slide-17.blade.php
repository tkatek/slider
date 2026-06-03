<!doctype html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Green Theme Preview</title>
    <script>
        tailwind = {
            config: {
                darkMode: "class",
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-950 dark:bg-slate-950 dark:text-slate-50">
<main class="mx-auto flex min-h-screen max-w-5xl flex-col items-center justify-center gap-8 px-5 py-10">
    <section class="w-full rounded-3xl border border-slate-200 bg-white p-8 shadow-xl dark:border-slate-800 dark:bg-slate-900">
        <p class="mb-3 text-sm font-black uppercase tracking-[0.18em] text-emerald-600 dark:text-emerald-300">
            Boston English Center
        </p>

        <h1 class="bg-gradient-to-br from-emerald-700 via-emerald-600 to-green-500 bg-clip-text text-5xl font-black tracking-tight text-transparent dark:from-emerald-200 dark:via-emerald-300 dark:to-green-300">
            New Vocabulary
        </h1>

        <p class="mt-4 max-w-2xl text-lg font-bold leading-relaxed text-slate-600 dark:text-slate-300">
            Practice useful English phrases with a calm green theme designed for learning slides.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
            <button class="rounded-xl bg-gradient-to-br from-emerald-700 via-emerald-600 to-green-500 px-6 py-3 font-black text-white shadow-lg shadow-emerald-900/15 transition hover:scale-105 dark:from-emerald-300 dark:via-emerald-400 dark:to-green-400 dark:text-emerald-950">
                Next Slide
            </button>

            <button class="rounded-xl border border-emerald-200 bg-emerald-50 px-6 py-3 font-black text-emerald-800 transition hover:border-emerald-300 hover:bg-emerald-100 hover:text-emerald-900 dark:border-emerald-400/25 dark:bg-emerald-950/35 dark:text-emerald-100 dark:hover:border-emerald-300/35 dark:hover:bg-emerald-900/55 dark:hover:text-white">
                Play Audio
            </button>
        </div>
    </section>

    <section class="grid w-full gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5 dark:border-emerald-400/20 dark:bg-emerald-950/30">
            <p class="font-black text-emerald-700 dark:text-emerald-200">Title gradient</p>
            <p class="mt-2 text-sm font-bold text-slate-600 dark:text-slate-300">Friendly, clear, and readable.</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 dark:border-slate-800 dark:bg-slate-900">
            <p class="font-black text-slate-900 dark:text-slate-50">Neutral card</p>
            <p class="mt-2 text-sm font-bold text-slate-600 dark:text-slate-300">Keeps the UI calm.</p>
        </div>

        <div class="rounded-2xl border border-green-100 bg-green-50 p-5 dark:border-green-400/20 dark:bg-green-950/30">
            <p class="font-black text-green-700 dark:text-green-200">Button color</p>
            <p class="mt-2 text-sm font-bold text-slate-600 dark:text-slate-300">Strong enough for action.</p>
        </div>
    </section>

    <button
            id="themeToggle"
            type="button"
            class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800"
    >
        Switch to Dark Mode
    </button>
</main>

<script>
    const root = document.documentElement;
    const toggle = document.getElementById("themeToggle");

    root.classList.remove("dark");

    function updateToggleText() {
        toggle.textContent = root.classList.contains("dark")
            ? "Switch to Light Mode"
            : "Switch to Dark Mode";
    }

    toggle.addEventListener("click", () => {
        root.classList.toggle("dark");
        updateToggleText();
    });

    updateToggleText();
</script>
</body>
</html>