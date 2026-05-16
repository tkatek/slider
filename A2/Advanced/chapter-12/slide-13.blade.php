@php
    $content = [
        'page_title' => 'Grammar',
        'title'      => 'Grammar',
        'subtitle'   => '',
    ];
@endphp

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-4 py-5 sm:px-6 lg:px-8">
        <section class="w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mt-5 overflow-hidden rounded-[2rem] border border-cyan-100/80 bg-gradient-to-br from-white via-cyan-50 to-sky-50 p-4 shadow-sm dark:border-cyan-400/20 dark:from-slate-950 dark:via-cyan-950/25 dark:to-sky-950/20 sm:p-6">
                <h3 class="mb-4 text-xl font-black text-slate-950 dark:text-white sm:text-2xl">
                    Useful Complaint Verbs
                </h3>

                <div class="overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900/80">
                    <table class="w-full border-collapse text-left">
                        <thead>
                        <tr class="bg-cyan-50 dark:bg-cyan-950/30">
                            <th class="w-1/3 border-b border-r border-slate-200 px-4 py-3 text-sm font-black text-cyan-700 dark:border-slate-700 dark:text-cyan-200">Verb</th>
                            <th class="w-2/3 border-b border-slate-200 px-4 py-3 text-sm font-black text-cyan-700 dark:border-slate-700 dark:text-cyan-200">Example</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border-r border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">leaving</td>
                            <td class="border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">She&rsquo;s always leaving her clothes everywhere.</td>
                        </tr>
                        <tr>
                            <td class="border-r border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">forgetting</td>
                            <td class="border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">He&rsquo;s always forgetting his homework.</td>
                        </tr>
                        <tr>
                            <td class="border-r border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">making</td>
                            <td class="border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">They&rsquo;re always making noise.</td>
                        </tr>
                        <tr>
                            <td class="border-r border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">taking</td>
                            <td class="border-b border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">She&rsquo;s always taking my things.</td>
                        </tr>
                        <tr>
                            <td class="border-r border-slate-200 px-4 py-3 text-sm font-black text-slate-900 dark:border-slate-700 dark:text-slate-100">using</td>
                            <td class="px-4 py-3 text-sm font-black text-slate-900 dark:text-slate-100">He&rsquo;s always using my phone charger.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex flex-wrap items-center justify-between gap-3">
                    <h3 class="text-xl font-black text-slate-950 dark:text-white sm:text-2xl">
                        Complete the Complaints
                    </h3>

                    <div class="flex flex-wrap gap-2">
                        <button id="checkAnswersBtn" type="button" class="rounded-xl bg-cyan-600 px-4 py-2 text-xs font-black text-white shadow transition hover:bg-cyan-700">
                            Check Answers
                        </button>
                        <button id="revealAnswersBtn" type="button" class="rounded-xl border border-orange-200 bg-orange-50 px-4 py-2 text-xs font-black text-orange-700 shadow-sm transition hover:bg-orange-100">
                            Reveal answers
                        </button>
                        <button id="retakeBtn" type="button" class="hidden rounded-xl border border-slate-200 bg-white px-4 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                            Retake
                        </button>
                    </div>
                </div>

                <div class="mt-4 grid gap-3">
                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/80">
                        <p class="flex flex-wrap items-center gap-2 text-base font-black text-slate-900 dark:text-slate-100">
                            <span>1. She&rsquo;s always</span>
                            <input class="answer-input h-11 w-36 rounded-xl border-2 border-slate-200 bg-white px-3 text-center font-black text-slate-950 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-white" data-answer="leaving" autocomplete="off" spellcheck="false">
                            <span>the lights on.</span>
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/80">
                        <p class="flex flex-wrap items-center gap-2 text-base font-black text-slate-900 dark:text-slate-100">
                            <span>2. He&rsquo;s always</span>
                            <input class="answer-input h-11 w-36 rounded-xl border-2 border-slate-200 bg-white px-3 text-center font-black text-slate-950 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-white" data-answer="making" autocomplete="off" spellcheck="false">
                            <span>noise at night.</span>
                        </p>
                    </div>

                    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/80">
                        <p class="flex flex-wrap items-center gap-2 text-base font-black text-slate-900 dark:text-slate-100">
                            <span>3. My roommate is always</span>
                            <input class="answer-input h-11 w-36 rounded-xl border-2 border-slate-200 bg-white px-3 text-center font-black text-slate-950 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-white" data-answer="using" autocomplete="off" spellcheck="false">
                            <span>the bathroom for too long.</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = Array.from(document.querySelectorAll('.answer-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeBtn');

            const sounds = {
                tap: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            function playSound(type) {
                const sound = sounds[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function normalize(value) {
                return String(value || '').trim().toLowerCase();
            }

            function updateStats() {
                const correct = inputs.filter(input => normalize(input.value) === normalize(input.dataset.answer)).length;
                const attempted = inputs.filter(input => normalize(input.value) !== '').length;
                const mistakes = Math.max(0, attempted - correct);

                document.getElementById('tilesCount') && (document.getElementById('tilesCount').textContent = `${correct}/${inputs.length}`);
                document.getElementById('correctCount') && (document.getElementById('correctCount').textContent = String(correct));
                document.getElementById('mistakesCount') && (document.getElementById('mistakesCount').textContent = String(mistakes));
            }

            function markInput(input) {
                const isCorrect = normalize(input.value) === normalize(input.dataset.answer);

                input.classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-800', 'border-red-500', 'bg-red-50', 'text-red-800');

                if (isCorrect) {
                    input.classList.add('border-emerald-500', 'bg-emerald-50', 'text-emerald-800');
                } else {
                    input.classList.add('border-red-500', 'bg-red-50', 'text-red-800');
                }

                return isCorrect;
            }

            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    playSound('tap');
                });

                input.addEventListener('input', () => {
                    input.classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-800', 'border-red-500', 'bg-red-50', 'text-red-800');
                    updateStats();
                });
            });

            checkBtn?.addEventListener('click', () => {
                let correctCount = 0;

                inputs.forEach(input => {
                    if (markInput(input)) {
                        correctCount++;
                    }
                });

                updateStats();
                retakeBtn?.classList.remove('hidden');

                if (correctCount === inputs.length) {
                    playSound('success');
                } else if (correctCount > 0) {
                    playSound('correct');
                } else {
                    playSound('wrong');
                }
            });

            revealBtn?.addEventListener('click', () => {
                inputs.forEach(input => {
                    input.value = input.dataset.answer || '';
                    markInput(input);
                });

                updateStats();
                retakeBtn?.classList.remove('hidden');
                playSound('success');
            });

            retakeBtn?.addEventListener('click', () => {
                inputs.forEach(input => {
                    input.value = '';
                    input.classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-800', 'border-red-500', 'bg-red-50', 'text-red-800');
                });

                updateStats();
                retakeBtn.classList.add('hidden');
                playSound('tap');
            });

            updateStats();

            window.stopSlideAudio = function () {
                Object.values(sounds).forEach(sound => {
                    sound.pause();
                    sound.currentTime = 0;
                });
            };

            window.destroySlide = window.stopSlideAudio;
        });
    </script>
@endsection
