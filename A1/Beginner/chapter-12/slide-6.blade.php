<?php
$content = [
    'uid' => 'bills_talk_' . substr(md5(uniqid('', true)), 0, 10),

    'title' => 'Reading Comprehension',
    'subtitle' => 'MY CABLE TV BILL',
    'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide6.webp'),
    'image_alt' => 'Bills and payment documents',

    'questions' => [
        'What service is this bill for?',
        'What month of the year is the billing period?',
        'When is this bill due?',
        'What is the account number?',
    ],
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .nice-scroll::-webkit-scrollbar { width: 8px; height: 8px; }
        .nice-scroll::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.45);
            border-radius: 999px;
        }
        .nice-scroll::-webkit-scrollbar-track { background: transparent; }
    </style>
@endsection

@section("content")
    @php
        $saveKey = 'slide_open_answers_' . ($content['uid'] ?? 'default');
    @endphp

    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-6 sm:gap-8">
                        <div class="header-spacing text-center space-y-6 my-8">
                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            </h1>

                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{ $content['subtitle'] }}
                            </p>
                        </div>

                        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[0.9fr_1.1fr] gap-5 sm:gap-6 lg:gap-8 items-start">
                            <figure class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-[0_16px_55px_-35px_rgba(2,6,23,.35)] dark:border-slate-700 dark:bg-slate-900">
                                <img
                                    src="{{ $content['image'] }}"
                                    alt="{{ $content['image_alt'] }}"
                                    class="w-full h-full object-contain"
                                >
                            </figure>

                            <article class="w-full">
                                <div class="nice-scroll grid grid-cols-1 gap-4 sm:gap-5">
                                    @foreach($content['questions'] as $index => $question)
                                        <div class="relative z-10 flex items-start gap-4 sm:gap-5 rounded-3xl border border-slate-200 bg-white px-5 py-5 text-left shadow-[0_16px_55px_-35px_rgba(2,6,23,.18)] dark:border-slate-700 dark:bg-slate-900">
                                            <div class="flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 border-indigo-100 bg-indigo-50/80 text-[0.95rem] font-extrabold text-indigo-600 dark:border-white/10 dark:bg-white/5 dark:text-indigo-300">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                                    {{ $question }}
                                                </p>

                                                <textarea
                                                    data-answer-input
                                                    data-index="{{ $index }}"
                                                    rows="3"
                                                    placeholder="Type your answer..."
                                                    class="mt-3 w-full resize-none rounded-2xl border border-slate-300/70 bg-white px-4 py-3 text-sm sm:text-base text-slate-800 placeholder:text-slate-400 outline-none focus:border-indigo-400 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950/40 dark:text-slate-100 dark:placeholder:text-slate-500"
                                                ></textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const saveKey = @json($saveKey);
            const inputs = Array.from(document.querySelectorAll('[data-answer-input]'));
            const saveStatus = document.getElementById('saveStatus');

            let saveTimer = null;
            let statusTimer = null;

            function setSaveStatus(text, type = 'ready') {
                if (!saveStatus) return;

                const base = "inline-flex items-center gap-1.5 rounded-full px-2 py-1 text-[11px] font-bold border";
                let cls = "";
                let dot = "bg-slate-400";

                if (type === 'saving') {
                    cls = " border-amber-200 bg-amber-50 text-amber-700 dark:border-amber-500/20 dark:bg-amber-500/10 dark:text-amber-300";
                    dot = "bg-amber-500";
                } else if (type === 'saved') {
                    cls = " border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300";
                    dot = "bg-emerald-500";
                } else {
                    cls = " border-slate-200 bg-white text-slate-600 dark:border-slate-700 dark:bg-slate-800/70 dark:text-slate-300";
                    dot = "bg-slate-400";
                }

                saveStatus.className = base + cls;
                saveStatus.innerHTML = `<span class="inline-block h-1.5 w-1.5 rounded-full ${dot}"></span>${text}`;
            }

            function collectAnswers() {
                const answers = {};
                inputs.forEach((el) => {
                    answers[el.dataset.index] = el.value ?? '';
                });
                return {
                    answers,
                    updated_at: new Date().toISOString()
                };
            }

            function saveAnswers() {
                try {
                    localStorage.setItem(saveKey, JSON.stringify(collectAnswers()));
                    setSaveStatus('Saved', 'saved');

                    clearTimeout(statusTimer);
                    statusTimer = setTimeout(() => setSaveStatus('Ready', 'ready'), 1000);
                } catch (e) {
                    setSaveStatus('Save failed', 'ready');
                }
            }

            function scheduleSave() {
                setSaveStatus('Saving...', 'saving');
                clearTimeout(saveTimer);
                saveTimer = setTimeout(saveAnswers, 250);
            }

            function loadAnswers() {
                try {
                    const raw = localStorage.getItem(saveKey);
                    if (!raw) return;

                    const parsed = JSON.parse(raw);
                    const savedAnswers = parsed?.answers ?? {};

                    inputs.forEach((el) => {
                        const key = el.dataset.index;
                        if (typeof savedAnswers[key] === 'string') {
                            el.value = savedAnswers[key];
                        }
                    });

                    setSaveStatus('Loaded', 'saved');
                    clearTimeout(statusTimer);
                    statusTimer = setTimeout(() => setSaveStatus('Ready', 'ready'), 900);
                } catch (e) {
                }
            }

            inputs.forEach((el) => {
                el.addEventListener('input', scheduleSave);
                el.addEventListener('change', saveAnswers);
                el.addEventListener('blur', saveAnswers);
            });

            window.addEventListener('beforeunload', saveAnswers);

            window.getSlideAnswers = function () {
                try {
                    return collectAnswers();
                } catch (e) {
                    return { answers: {}, updated_at: null };
                }
            };

            loadAnswers();

            window.resetSlide = function () {};
        });
    </script>
@endsection
