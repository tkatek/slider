<?php
$content = [
    'page_title' => 'Reading: Ordering',
    'title'      => 'Practice',
    'subtitle'   => 'Put the sentences in order:',
    'correct_order' => [
        'Pull up to the pump and park safely.',
        'Turn off the engine before starting the refuelling process.',
        'Select the correct fuel type for your vehicle.',
        'Insert the nozzle into the tank and begin fuelling.',
        'Stop fuelling when the tank is full.',
        'Pay for the fuel and collect the receipt.'
    ]
];

// Initial scrambled order ensuring it's not the correct order
$scrambled = $content['correct_order'];
$attempts = 0;
while ($scrambled === $content['correct_order'] && $attempts < 10) {
    shuffle($scrambled);
    $attempts++;
}
?>
@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .sortable-ghost {
            opacity: 0.4;
            background: rgba(226, 232, 240, 0.8) !important;
            border-color: rgba(148, 163, 184, 0.4) !important;
        }
        .dark .sortable-ghost {
            background: rgba(30, 41, 59, 0.8) !important;
            border-color: rgba(71, 85, 105, 0.4) !important;
        }

        .sortable-drag {
            opacity: 1 !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
            transform: scale(1.02);
            cursor: grabbing !important;
        }

        .sentence-item {
            cursor: grab;
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.2s ease, border-color 0.2s ease, background-color 0.2s ease;
        }
        .sentence-item:active {
            cursor: grabbing;
        }

        .sentence-item.is-wrong {
            background: rgba(254, 226, 226, 0.95);
            border-color: rgba(239, 68, 68, 0.45);
            color: #b91c1c;
        }
        .dark .sentence-item.is-wrong {
            background: rgba(127, 29, 29, 0.32);
            border-color: rgba(248, 113, 113, 0.45);
            color: #fecaca;
        }

        .sentence-item.is-correct {
            background: rgba(220, 252, 231, 0.98);
            border-color: rgba(34, 197, 94, 0.42);
            color: #166534;
            box-shadow: 0 10px 25px -18px rgba(34, 197, 94, 0.9);
            pointer-events: none; /* Lock correct ones if we wanted to, but we'll lock all at the end */
        }
        .dark .sentence-item.is-correct {
            background: rgba(20, 83, 45, 0.36);
            border-color: rgba(74, 222, 128, 0.42);
            color: #bbf7d0;
        }

        .check-answer-btn {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #ffffff;
            box-shadow: 0 12px 25px -10px rgba(79, 70, 229, 0.7);
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .check-answer-btn:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 16px 30px -10px rgba(79, 70, 229, 0.9);
        }
        .check-answer-btn:active {
            transform: translateY(1px) scale(0.98);
        }
        .check-answer-btn:disabled {
            background: #cbd5e1;
            color: #94a3b8;
            box-shadow: none;
            transform: none;
            cursor: not-allowed;
            pointer-events: none;
        }
        .dark .check-answer-btn:disabled {
            background: #334155;
            color: #64748b;
        }

        @keyframes input-shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-6px); }
            40% { transform: translateX(6px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }
        .animate-shake {
            animation: input-shake 0.4s ease-in-out;
        }

        .target-list-css {
            counter-reset: target-counter;
        }
        .target-list-css .sentence-item {
            counter-increment: target-counter;
        }
        .target-list-css .sentence-item .drag-icon {
            display: none;
        }
        .target-list-css .sentence-item::before {
            content: counter(target-counter);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 1rem;
        }
    </style>
@endsection

@section('content')
    <main class="w-full min-h-[100dvh]">
            <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl flex-col justify-start px-4 py-6 sm:px-8 sm:py-8 lg:py-10">

            <!-- Header section matching previous styling strictly -->
            <header class="w-full flex flex-col items-center justify-center mb-4 sm:mb-8 lg:mb-10 text-center">
                <h1 class="text-2xl sm:text-5xl md:text-6xl font-black tracking-tight text-indigo-600 drop-shadow-sm">
                    {{ $content['title'] ?? 'Practice' }}
                </h1>
                <h2 class="mt-1 sm:mt-2 text-sm sm:text-xl md:text-2xl font-bold text-black dark:text-white">
                    {{ $content['subtitle'] ?? 'Put the sentences in order' }}
                </h2>

                <div class="flex flex-wrap items-center justify-around gap-2 sm:gap-6 md:gap-10 mt-3 sm:mt-6 rounded-2xl sm:rounded-[2rem] bg-white px-3 sm:px-8 md:px-12 py-2 sm:py-5 shadow-[0_4px_20px_-8px_rgba(0,0,0,0.1)] border border-slate-200/60 w-full max-w-3xl mx-auto dark:bg-slate-800/90 dark:border-slate-700/50">
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">🧩</span>
                        <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Items</span>
                        <span class="text-xs sm:text-lg font-black text-slate-800 dark:text-slate-200 leading-tight mt-0.5 sm:mt-1" data-stat-items>{{ count($content['correct_order']) }}</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">❌</span>
                        <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Mistakes</span>
                        <span class="text-xs sm:text-lg font-black text-rose-600 dark:text-rose-400 leading-tight mt-0.5 sm:mt-1" data-stat-mistakes>0</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">⏱️</span>
                        <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Time</span>
                        <span class="text-xs sm:text-lg font-black text-indigo-600 dark:text-indigo-400 leading-tight mt-0.5 sm:mt-1" data-stat-time>00:00</span>
                    </div>
                </div>
            </header>

            <section class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col gap-3 sm:gap-6 bg-white/70 dark:bg-slate-950/45 p-3 sm:p-6 lg:p-8 rounded-[1.2rem] sm:rounded-[2rem] shadow-[0_20px_50px_-28px_rgba(15,23,42,0.32)] border border-slate-200/70 dark:border-slate-700/35 backdrop-blur-xl custom-scrollbar scale-100 origin-top transform">

                    <div class="flex flex-col gap-1 sm:gap-2 shrink-0 text-center sm:text-left mb-1 sm:mb-2">
                        <div>
                            <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 sm:px-3 py-0.5 sm:py-1 text-[0.65rem] sm:text-[0.75rem] font-bold uppercase tracking-wider text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-200">
                                Drag & Drop
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 items-start">
                        <!-- Source List -->
                        <div class="flex flex-col gap-2 sm:gap-3 order-2 lg:order-1">
                            <h3 class="font-bold text-sm sm:text-base text-slate-700 dark:text-slate-300 text-center lg:text-left">Available Sentences</h3>
                            <div id="source-list" class="flex flex-col gap-2 sm:gap-3 min-h-[120px] p-2 sm:p-4 bg-slate-50 dark:bg-slate-900/50 rounded-xl sm:rounded-2xl border-2 border-dashed border-slate-300 dark:border-slate-700 h-full">
                                @foreach($scrambled as $index => $sentence)
                                    <div class="sentence-item flex items-center gap-2 sm:gap-3 w-full rounded-xl sm:rounded-[1.4rem] border-2 border-slate-200 bg-white p-2 sm:p-4 shadow-sm dark:border-slate-600 dark:bg-slate-800 text-slate-800 dark:text-white" data-original="{{ $sentence }}">
                                        <div class="drag-icon shrink-0 flex items-center justify-center w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-400 dark:text-slate-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 font-semibold sm:font-bold text-xs sm:text-base leading-snug">
                                            {{ $sentence }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Target List -->
                        <div class="flex flex-col gap-2 sm:gap-3 order-1 lg:order-2">
                            <h3 class="font-bold text-sm sm:text-base text-slate-700 dark:text-slate-300 text-center lg:text-left">Your Order</h3>
                            <div id="target-list" class="target-list-css flex flex-col gap-2 sm:gap-3 min-h-[120px] p-2 sm:p-4 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl sm:rounded-2xl border-2 border-dashed border-indigo-300 dark:border-indigo-700/50 h-full transition-colors">
                                <!-- Items dropped here -->
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 mt-2 sm:mt-4 w-full">
                        <button
                            type="button"
                            data-reset-quiz
                            class="inline-flex items-center gap-1.5 rounded-xl sm:rounded-2xl bg-slate-200/80 px-5 py-3 sm:px-6 sm:py-3.5 text-sm sm:text-base font-bold shadow-sm text-slate-700 transition-colors hover:bg-slate-300 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset
                        </button>

                        <button
                            type="button"
                            class="check-answer-btn inline-flex flex-1 max-w-[200px] items-center justify-center rounded-xl sm:rounded-2xl px-6 py-3 sm:px-8 sm:py-3.5 text-sm sm:text-base font-bold tracking-wide"
                            data-check-answer
                        >
                            Check Order
                        </button>
                    </div>

                    <div id="feedback-message" class="hidden text-center mt-2 text-sm sm:text-base font-bold"></div>


                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <!-- Include SortableJS for smooth drag and drop on all devices -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const correctOrder = @json($content['correct_order']);
            const sourceListEl = document.getElementById('source-list');
            const targetListEl = document.getElementById('target-list');
            const initialSourceHTML = sourceListEl.innerHTML;
            const initialTargetHTML = targetListEl.innerHTML;

            const checkBtn = document.querySelector('[data-check-answer]');
            const resetBtn = document.querySelector('[data-reset-quiz]');
            const feedback = document.getElementById('feedback-message');

            const statMistakes = document.querySelector('[data-stat-mistakes]');
            const statTime = document.querySelector('[data-stat-time]');

            let mistakes = 0;
            let timeSeconds = 0;
            let timerInterval = null;
            let gameSolved = false;

            // Pro Web Audio Sound Generator (No external assets needed!)
            const AudioContext = window.AudioContext || window.webkit.AudioContext;
            const audioCtx = new AudioContext();

            function playProSound(type) {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gainNode = audioCtx.createGain();

                osc.connect(gainNode);
                gainNode.connect(audioCtx.destination);

                if (type === 'correct') {
                    // Cheerful Arpeggio (C5 -> E5 -> G5)
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(523.25, audioCtx.currentTime);
                    osc.frequency.setValueAtTime(659.25, audioCtx.currentTime + 0.1);
                    osc.frequency.setValueAtTime(783.99, audioCtx.currentTime + 0.2);

                    gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
                    gainNode.gain.linearRampToValueAtTime(0.3, audioCtx.currentTime + 0.05);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.5);

                    osc.start();
                    osc.stop(audioCtx.currentTime + 0.55);
                } else if (type === 'incorrect') {
                    // Soft, descending gentle "oh-no" tone
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(392, audioCtx.currentTime); // G4
                    osc.frequency.exponentialRampToValueAtTime(329.6, audioCtx.currentTime + 0.2); // E4 down

                    gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
                    gainNode.gain.linearRampToValueAtTime(0.25, audioCtx.currentTime + 0.05);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.4);

                    osc.start();
                    osc.stop(audioCtx.currentTime + 0.45);
                } else if (type === 'drop') {
                    // Small soft click for drop
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(600, audioCtx.currentTime);
                    osc.frequency.exponentialRampToValueAtTime(200, audioCtx.currentTime + 0.05);

                    gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
                    gainNode.gain.linearRampToValueAtTime(0.1, audioCtx.currentTime + 0.01);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.05);

                    osc.start();
                    osc.stop(audioCtx.currentTime + 0.06);
                }
            }

            function formatTimer(sec) {
                const m = Math.floor(sec / 60).toString().padStart(2, "0");
                const s = (sec % 60).toString().padStart(2, "0");
                return `${m}:${s}`;
            }

            function startTimer() {
                if (timerInterval) clearInterval(timerInterval);
                timerInterval = setInterval(() => {
                    timeSeconds++;
                    if (statTime) statTime.textContent = formatTimer(timeSeconds);
                }, 1000);
            }

            function stopTimer() {
                if (timerInterval) clearInterval(timerInterval);
            }

            // Initialize Sortable for Source List
            let sortableSource = new Sortable(sourceListEl, {
                group: 'shared', // set both lists to same group
                animation: 250,
                easing: "cubic-bezier(0.34, 1.56, 0.64, 1)",
                ghostClass: 'sortable-ghost',
                dragClass: 'sortable-drag',
                onEnd: function (evt) {
                    playProSound('drop');
                    clearErrors();
                },
            });

            // Initialize Sortable for Target List
            let sortableTarget = new Sortable(targetListEl, {
                group: 'shared', // set both lists to same group
                animation: 250,
                easing: "cubic-bezier(0.34, 1.56, 0.64, 1)",
                ghostClass: 'sortable-ghost',
                dragClass: 'sortable-drag',
                onEnd: function (evt) {
                    playProSound('drop');
                    clearErrors();
                },
            });

            function clearErrors() {
                const items = Array.from(targetListEl.children).concat(Array.from(sourceListEl.children));
                items.forEach(el => {
                    el.classList.remove('is-wrong');
                    el.classList.remove('animate-shake');
                });
                if (feedback) feedback.classList.add('hidden');
            }

            function checkAnswer() {
                if (gameSolved) return;

                const currentItems = Array.from(targetListEl.children);

                if (currentItems.length < correctOrder.length) {
                    playProSound('incorrect');
                    feedback.textContent = "Please place all sentences in the order list first!";
                    feedback.className = "text-center mt-4 text-sm sm:text-base font-bold text-amber-600 dark:text-amber-400";
                    feedback.classList.remove('hidden');
                    return;
                }

                let allCorrect = true;

                // Reset states
                currentItems.forEach(el => {
                    el.classList.remove('is-wrong', 'is-correct', 'animate-shake');
                    // force reflow for animation
                    void el.offsetWidth;
                });

                currentItems.forEach((el, index) => {
                    const originalText = el.dataset.original;
                    if (originalText === correctOrder[index]) {
                        el.classList.add('is-correct');
                    } else {
                        allCorrect = false;
                        el.classList.add('is-wrong');
                        el.classList.add('animate-shake');
                    }
                });

                if (allCorrect) {
                    gameSolved = true;
                    stopTimer();
                    playProSound('correct');
                    checkBtn.disabled = true;
                    sortableSource.option("disabled", true);
                    sortableTarget.option("disabled", true);

                    feedback.textContent = "Perfect! The steps are in the correct order.";
                    feedback.className = "text-center mt-4 text-sm sm:text-base font-bold text-emerald-600 dark:text-emerald-400";
                    feedback.classList.remove('hidden');
                } else {
                    mistakes++;
                    if (statMistakes) statMistakes.textContent = mistakes;
                    playProSound('incorrect');

                    feedback.textContent = "Some steps are not in the right place. Keep trying!";
                    feedback.className = "text-center mt-4 text-sm sm:text-base font-bold text-rose-600 dark:text-rose-400";
                    feedback.classList.remove('hidden');

                    // After short delay, let them try again (remove redness so they aren't stuck red)
                    setTimeout(() => {
                        if (!gameSolved) {
                            currentItems.forEach(el => el.classList.remove('is-wrong'));
                        }
                    }, 1500);
                }
            }

            function resetGame() {
                // Restore original HTML
                sourceListEl.innerHTML = initialSourceHTML;
                targetListEl.innerHTML = initialTargetHTML;

                mistakes = 0;
                timeSeconds = 0;
                gameSolved = false;

                if (statMistakes) statMistakes.textContent = mistakes;
                if (statTime) statTime.textContent = formatTimer(timeSeconds);

                if (feedback) feedback.classList.add('hidden');

                checkBtn.disabled = false;
                sortableSource.option("disabled", false);
                sortableTarget.option("disabled", false);

                startTimer();
            }

            checkBtn.addEventListener('click', checkAnswer);
            resetBtn.addEventListener('click', resetGame);

            // Hook for external navigation resets
            window.resetSlide = resetGame;

            startTimer();
        });
    </script>
@endsection
