<?php

$content = [
    'page_title' => 'Practice 6',
    'title' => 'Practice 6',
    'subtitle' => 'Drag and drop the sentences into their correct order',
    'writing_title' => 'Write 3 questions you ask at the ticket booth. You can use the examples below',
    'writing_subtitle' => 'Example:',
    'writing_examples' => [
        'What time does the bus leave?',
        'How much is the ticket?',
    ],
    'writing_input_count' => 3,
    'sentences' => [
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> {{1}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> {{2}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> {{3}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> {{4}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> {{5}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.24)]\">6</span> {{6}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(132,204,22,.24)]\">7</span> {{7}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(239,68,68,.24)]\">8</span> {{8}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(6,182,212,.24)]\">9</span> {{9}}",
        "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">10</span> {{10}}",
    ],
    'answers' => [
        'Can I help you?',
        "I'd like a bus ticket to Summerwell, please.",
        'Sure. Only one ticket?',
        'Yes, one ticket for me. How much is it?',
        "That's four pounds, please.",
        'Here you are.',
        "And here's your ticket.",
        'Thanks. What time does the bus leave?',
        'It leaves in ten minutes. Hurry up!',
        'Oh, thank you! Goodbye!',
    ],
];

?>

@php
    $content = is_array($content ?? null) ? $content : [];

    $sentences = array_values($content['sentences'] ?? []);
    $answers = array_values($content['answers'] ?? []);
    $writingTitle = trim((string) ($content['writing_title'] ?? ''));
    $writingSubtitle = trim((string) ($content['writing_subtitle'] ?? ''));
    $writingExamples = array_values($content['writing_examples'] ?? []);
    $writingInputCount = max(0, (int) ($content['writing_input_count'] ?? 0));
    $hasWritingPanel = $writingTitle !== '' || $writingSubtitle !== '' || !empty($writingExamples) || $writingInputCount > 0;
    $tileSkins = [
        'from-sky-500 to-blue-600',
        'from-violet-500 to-fuchsia-600',
        'from-emerald-500 to-teal-600',
        'from-amber-500 to-orange-600',
        'from-rose-500 to-pink-600',
        'from-indigo-500 to-violet-600',
        'from-cyan-500 to-sky-600',
        'from-lime-500 to-green-500',
        'from-red-500 to-orange-500',
        'from-purple-500 to-indigo-600',
    ];

    $sentenceItems = [];
    $answersForJs = [];

    foreach ($sentences as $sentence) {
        $parts = preg_split('/\{\{(\d+)\}\}/', (string) $sentence, -1, PREG_SPLIT_DELIM_CAPTURE);
        $tokens = [];

        foreach ($parts as $partIndex => $part) {
            if ($partIndex % 2 === 0) {
                if ($part !== '') {
                    $tokens[] = ['type' => 'html', 'value' => $part];
                }

                continue;
            }

            $answerIndex = (int) $part;

            $tokens[] = [
                'type' => 'blank',
                'index' => $answerIndex,
                'answer' => $answers[$answerIndex - 1] ?? '',
            ];
        }

        $sentenceItems[] = $tokens;
    }

    foreach ($answers as $answerIndex => $answer) {
        $answersForJs[] = [
            'index' => $answerIndex + 1,
            'text' => $answer,
            'skin' => $tileSkins[$answerIndex % count($tileSkins)],
        ];
    }
@endphp

@extends('slider.simple-layout')

@section('content')
    <main id="simpleDdbSlide" class="min-h-[100dvh] w-full px-4 py-4 sm:px-6 lg:px-8">
        <div class="mx-auto flex w-full max-w-6xl flex-col justify-start gap-4">

            <div class="text-center">
                @include('slider.components.title-subtitle')
            </div>

            <section id="ddbPoolRail" class="w-full max-w-full flex-none self-stretch">
                <div id="ddbPoolBar" class="relative w-full max-w-full p-0">
                    <div class="relative max-h-[40dvh] overflow-hidden rounded-[1.7rem] border border-slate-200/70 bg-white/95 shadow-[0_18px_45px_rgba(2,6,23,0.10)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/90">
                        <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                        <div class="relative px-3 pb-3 pt-3 sm:px-4 sm:py-4 xl:px-6">
                            <div class="flex items-center justify-center">
                                <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>

                            <div class="mt-3 flex items-center justify-between gap-1.5 sm:gap-2">
                                <div class="flex shrink-0 items-center gap-1 sm:gap-2">
                                    <button id="ddbPrevWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8" aria-label="Previous words">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/></svg>
                                    </button>

                                    <div id="ddbProgress" class="inline-flex items-center gap-1 rounded-full border border-slate-200/70 bg-white/80 px-2 py-1 text-[10px] font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:gap-1.5 sm:px-3 sm:py-1.5 sm:text-xs">
                                        0/{{ count($answers) }}
                                    </div>

                                    <button id="ddbNextWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8" aria-label="Next words">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4"><path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 1 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>

                                <div class="hidden min-w-0 flex-1 sm:block"></div>

                                <div class="flex shrink-0 items-center justify-end gap-1 sm:gap-2">
                                    <button id="ddbCheckBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-white/20 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 px-2 py-1.5 text-[11px] font-black leading-none text-white shadow-[0_10px_24px_rgba(79,70,229,.10)] transition hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-40 sm:px-3 sm:py-2 sm:text-xs">
                                        <span class="sm:hidden">Check</span>
                                        <span class="hidden sm:inline">Check answers</span>
                                    </button>

                                    <button id="ddbRevealBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-orange-200 bg-orange-100 px-2 py-1.5 text-[11px] font-black leading-none text-orange-900 shadow-[0_8px_22px_rgba(234,88,12,.10)] transition hover:scale-[1.02] dark:border-orange-900/40 dark:bg-orange-950/40 dark:text-orange-200 sm:px-3 sm:py-2 sm:text-xs">
                                        <span class="sm:hidden">Reveal</span>
                                        <span class="hidden sm:inline">Reveal answers</span>
                                    </button>

                                    <button id="ddbResetBtn" type="button" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-2 py-1.5 text-[11px] font-black leading-none text-slate-900 shadow-[0_8px_22px_rgba(2,6,23,.05)] transition hover:scale-[1.02] dark:border-slate-700 dark:bg-slate-800 dark:text-white sm:px-3 sm:py-2 sm:text-xs">
                                        Reset
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                            <div id="ddbPool" class="mt-3 flex max-h-[24dvh] w-full max-w-full flex-wrap items-stretch justify-center gap-2 overflow-hidden sm:max-h-[22dvh] sm:gap-2.5 lg:max-h-[20dvh]"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid gap-4 {{ $hasWritingPanel ? 'lg:grid-cols-[1.15fr_0.85fr]' : 'lg:grid-cols-1' }} lg:items-start">
                <article class="rounded-[1.5rem] border border-slate-200/70 bg-white/85 p-3 shadow-[0_18px_45px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/75 sm:p-4">
                    <div class="space-y-2.5">
                        @foreach($sentenceItems as $tokens)
                            <div class="flex w-full flex-wrap items-center gap-2 rounded-2xl border border-slate-200/70 bg-white/75 p-2 text-base font-bold leading-[1.55] text-slate-900 dark:border-slate-700/60 dark:bg-slate-950/35 dark:text-slate-100 sm:gap-3 sm:p-3 sm:text-lg">
                                @foreach($tokens as $token)
                                    @if($token['type'] === 'html')
                                        <span class="inline min-w-0 break-words">
                                            {!! $token['value'] !!}
                                        </span>
                                    @else
                                        <button
                                                type="button"
                                                class="ddb-blank-slot inline-flex min-h-[46px] min-w-[160px] flex-1 items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50 px-3 py-2 text-center text-sm font-black text-slate-400 transition hover:border-indigo-400 hover:bg-indigo-50 dark:border-slate-600 dark:bg-slate-900/50 dark:text-slate-500 dark:hover:border-indigo-400 dark:hover:bg-indigo-500/10 sm:min-w-[220px]"
                                                data-blank-index="{{ $token['index'] }}"
                                                data-answer="{{ $token['answer'] }}"
                                        >
                                            Drop here
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </article>

                @if($hasWritingPanel)
                    <aside class="rounded-[1.5rem] border border-slate-200/70 bg-white/85 p-4 shadow-[0_18px_45px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/75 lg:sticky lg:top-[11.5rem]">
                        @if($writingTitle !== '')
                            <h2 class="text-base font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                                {{ $writingTitle }}
                            </h2>
                        @endif

                        @if($writingSubtitle !== '' || !empty($writingExamples))
                            <div class="mt-3 rounded-2xl border border-slate-200/80 bg-slate-50/80 p-3 text-sm font-bold leading-6 text-slate-700 dark:border-slate-700/70 dark:bg-slate-950/45 dark:text-slate-200">
                                @if($writingSubtitle !== '')
                                    <p class="font-black text-slate-900 dark:text-white">
                                        {{ $writingSubtitle }}
                                    </p>
                                @endif

                                @foreach($writingExamples as $example)
                                    <p>{{ $example }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if($writingInputCount > 0)
                            <div class="mt-4 space-y-3">
                                @for($inputIndex = 1; $inputIndex <= $writingInputCount; $inputIndex++)
                                    <input
                                            type="text"
                                            class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-800 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:border-slate-700 dark:bg-slate-950/70 dark:text-white dark:focus:border-indigo-400 dark:focus:ring-indigo-400/20"
                                            placeholder="Question {{ $inputIndex }}"
                                    >
                                @endfor
                            </div>
                        @endif

                        <button id="ddbContinueBtn" type="button" class="mt-4 hidden w-full rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-emerald-500/15 transition hover:scale-[1.01]">
                            Continue
                        </button>
                    </aside>
                @endif
            </section>

            @unless($hasWritingPanel)
                <button id="ddbContinueBtn" type="button" class="hidden self-end rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-emerald-500/15 transition hover:scale-[1.01]">
                    Continue
                </button>
            @endunless
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const answers = @json($answersForJs);
            const poolRail = document.getElementById('ddbPoolRail');
            const poolBar = document.getElementById('ddbPoolBar');
            const pool = document.getElementById('ddbPool');
            const blanks = Array.from(document.querySelectorAll('.ddb-blank-slot'));
            const progress = document.getElementById('ddbProgress');
            const checkBtn = document.getElementById('ddbCheckBtn');
            const revealBtn = document.getElementById('ddbRevealBtn');
            const resetBtn = document.getElementById('ddbResetBtn');
            const prevBtn = document.getElementById('ddbPrevWordsBtn');
            const nextBtn = document.getElementById('ddbNextWordsBtn');
            const continueBtn = document.getElementById('ddbContinueBtn');

            const sounds = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            function playSound(name) {
                const sound = sounds[name];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.volume = 1;
                sound.play().catch(function () {});
            }

            function getPoolStickyTop() {
                const width = window.innerWidth || document.documentElement.clientWidth || 0;

                if (width >= 1024) return 16;
                if (width >= 640) return 12;
                return 8;
            }

            function releasePoolSticky() {
                if (!poolRail || !poolBar) return;

                poolRail.style.removeProperty('min-height');
                poolBar.style.removeProperty('position');
                poolBar.style.removeProperty('z-index');
                poolBar.style.removeProperty('top');
                poolBar.style.removeProperty('left');
                poolBar.style.removeProperty('width');
            }

            function updatePoolSticky() {
                if (!poolRail || !poolBar) return;

                const top = getPoolStickyTop();

                /*
                 * Important UX behavior:
                 * The word bank must first appear under the title/subtitle in normal flow.
                 * It only becomes fixed after the user scrolls past its original position.
                 */
                const wasFixed = poolBar.style.position === 'fixed';

                if (wasFixed) {
                    const railRectWhileFixed = poolRail.getBoundingClientRect();

                    if (railRectWhileFixed.top > top) {
                        releasePoolSticky();
                        return;
                    }

                    poolBar.style.top = top + 'px';
                    poolBar.style.left = Math.round(railRectWhileFixed.left) + 'px';
                    poolBar.style.width = Math.round(railRectWhileFixed.width) + 'px';
                    return;
                }

                const railRect = poolRail.getBoundingClientRect();
                const barHeight = Math.ceil(poolBar.offsetHeight || 0);

                if (railRect.top > top) {
                    releasePoolSticky();
                    return;
                }

                poolRail.style.minHeight = barHeight + 'px';
                poolBar.style.position = 'fixed';
                poolBar.style.zIndex = '1500';
                poolBar.style.top = top + 'px';
                poolBar.style.left = Math.round(railRect.left) + 'px';
                poolBar.style.width = Math.round(railRect.width) + 'px';
            }

            let poolStickyFrame = null;

            function schedulePoolStickyUpdate() {
                if (poolStickyFrame) {
                    cancelAnimationFrame(poolStickyFrame);
                }

                poolStickyFrame = requestAnimationFrame(function () {
                    poolStickyFrame = null;
                    updatePoolSticky();
                });
            }

            let selectedIndex = null;
            let placed = {};
            let deck = shuffle(answers);
            let page = 0;

            function shuffle(items) {
                return items
                    .map(item => ({ item, sort: Math.random() }))
                    .sort((a, b) => a.sort - b.sort)
                    .map(({ item }) => item);
            }

            function findAnswer(index) {
                return answers.find(answer => Number(answer.index) === Number(index));
            }

            function visibleLimit() {
                const width = window.innerWidth || document.documentElement.clientWidth || 0;

                if (width < 640) return 3;
                if (width < 1024) return 4;
                return 5;
            }

            function availableAnswers() {
                return deck.filter(answer => !Object.values(placed).includes(answer.index));
            }

            function pageCount() {
                return Math.max(1, Math.ceil(availableAnswers().length / visibleLimit()));
            }

            function clampPage() {
                page = Math.max(0, Math.min(page, pageCount() - 1));
            }

            function placedCount() {
                return Object.keys(placed).length;
            }

            function setMessage() {
                // Visual feedback is shown on the blanks and buttons.
            }

            function chipClass(answer, isSelected = false, isPlaced = false) {
                const skin = answer.skin || 'from-indigo-500 to-blue-600';

                if (isPlaced) {
                    return [
                        'ddb-chip inline-flex w-full cursor-grab select-none items-center justify-center rounded-2xl border border-white/20 bg-gradient-to-br px-3 py-2 text-center text-xs font-black leading-snug text-white shadow-[0_10px_22px_rgba(2,6,23,0.16)] transition hover:scale-[1.01] sm:text-sm',
                        skin
                    ].join(' ');
                }

                return [
                    'ddb-chip inline-flex min-h-[38px] max-w-full cursor-pointer select-none items-center justify-center rounded-2xl border border-white/20 bg-gradient-to-br px-3 py-2 text-center text-xs font-black leading-snug text-white shadow-[0_10px_22px_rgba(2,6,23,0.18)] transition hover:-translate-y-0.5 sm:min-h-[40px] sm:text-sm',
                    skin,
                    isSelected ? 'ring-4 ring-indigo-300/70 scale-[1.02]' : ''
                ].join(' ');
            }

            function clearFeedback() {
                blanks.forEach(blank => {
                    blank.dataset.state = '';
                    blank.classList.remove(
                        'border-emerald-400',
                        'bg-emerald-50',
                        'text-emerald-700',
                        'dark:bg-emerald-950/25',
                        'border-rose-400',
                        'bg-rose-50',
                        'text-rose-700',
                        'dark:bg-rose-950/25'
                    );
                    blank.classList.add('border-slate-300', 'dark:border-slate-600');
                });

                continueBtn?.classList.add('hidden');

                if (placedCount() === answers.length) {
                    setMessage('All sentences are placed. Check your answers.');
                } else {
                    setMessage('');
                }
            }

            function updateProgress() {
                clampPage();

                progress.textContent = placedCount() + '/' + answers.length;
                checkBtn.disabled = placedCount() !== answers.length;

                if (prevBtn) prevBtn.disabled = page <= 0;
                if (nextBtn) nextBtn.disabled = page >= pageCount() - 1 || availableAnswers().length === 0;
            }

            function createChip(answer, isPlaced = false) {
                const button = document.createElement('button');

                button.type = 'button';
                button.draggable = true;
                button.textContent = answer.text;
                button.dataset.answerIndex = answer.index;
                button.className = chipClass(answer, selectedIndex === answer.index, isPlaced);

                button.addEventListener('click', function (event) {
                    event.stopPropagation();

                    if (isPlaced) {
                        removeAnswer(answer.index);
                        selectedIndex = answer.index;
                    } else {
                        selectedIndex = selectedIndex === answer.index ? null : answer.index;
                    }

                    clearFeedback();
                    render();
                });

                button.addEventListener('dragstart', function (event) {
                    event.dataTransfer.setData('text/plain', answer.index);
                    event.dataTransfer.effectAllowed = 'move';
                });

                return button;
            }

            function renderPool() {
                const limit = visibleLimit();
                const available = availableAnswers();

                clampPage();
                pool.innerHTML = '';

                available.slice(page * limit, page * limit + limit).forEach(answer => {
                    pool.appendChild(createChip(answer));
                });

                if (!pool.children.length) {
                    pool.innerHTML = '<p class="text-sm font-black text-slate-400 dark:text-slate-500">All sentences are placed.</p>';
                }
            }

            function renderBlanks() {
                blanks.forEach(blank => {
                    const blankIndex = Number(blank.dataset.blankIndex);
                    const answerIndex = placed[blankIndex];
                    const answer = findAnswer(answerIndex);

                    blank.innerHTML = '';

                    if (answer) {
                        blank.appendChild(createChip(answer, true));
                        return;
                    }

                    blank.textContent = 'Drop here';
                });
            }

            function render() {
                renderPool();
                renderBlanks();
                updateProgress();
                schedulePoolStickyUpdate();
            }

            function removeAnswer(answerIndex) {
                Object.keys(placed).forEach(blankIndex => {
                    if (Number(placed[blankIndex]) === Number(answerIndex)) {
                        delete placed[blankIndex];
                    }
                });
            }

            function placeAnswer(answerIndex, blankIndex) {
                answerIndex = Number(answerIndex);
                blankIndex = Number(blankIndex);

                if (!findAnswer(answerIndex)) return;

                removeAnswer(answerIndex);
                placed[blankIndex] = answerIndex;
                selectedIndex = null;

                playSound('correct');
                clampPage();
                clearFeedback();
                render();
            }

            function checkAnswers() {
                if (placedCount() !== answers.length) {
                    setMessage('Place all sentences first.', 'warning');
                    return;
                }

                let correct = 0;

                blanks.forEach(blank => {
                    const blankIndex = Number(blank.dataset.blankIndex);
                    const isCorrect = Number(placed[blankIndex]) === blankIndex;

                    blank.classList.remove('border-slate-300', 'dark:border-slate-600');

                    if (isCorrect) {
                        correct++;
                        blank.classList.add('border-emerald-400', 'bg-emerald-50', 'text-emerald-700', 'dark:bg-emerald-950/25');
                    } else {
                        blank.classList.add('border-rose-400', 'bg-rose-50', 'text-rose-700', 'dark:bg-rose-950/25');
                    }
                });

                if (correct === answers.length) {
                    playSound('success');
                    setMessage('Great job! All answers are correct.', 'success');
                    continueBtn?.classList.remove('hidden');
                    return;
                }

                playSound('wrong');
                setMessage(correct + '/' + answers.length + ' correct. Fix the red answers and try again.', 'error');
            }

            function revealAnswers() {
                placed = {};

                answers.forEach(answer => {
                    placed[answer.index] = answer.index;
                });

                selectedIndex = null;
                render();

                blanks.forEach(blank => {
                    blank.classList.remove('border-slate-300', 'dark:border-slate-600');
                    blank.classList.add('border-emerald-400', 'bg-emerald-50', 'text-emerald-700', 'dark:bg-emerald-950/25');
                });

                playSound('success');
                setMessage('Answers revealed.', 'warning');
                continueBtn?.classList.remove('hidden');
            }

            function resetSlide() {
                selectedIndex = null;
                placed = {};
                deck = shuffle(answers);
                page = 0;
                clearFeedback();
                render();
            }

            function goNext() {
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                    return;
                } catch (error) {}

                window.location.href = '#next';
            }

            blanks.forEach(blank => {
                blank.addEventListener('click', function () {
                    if (!selectedIndex) return;
                    placeAnswer(selectedIndex, blank.dataset.blankIndex);
                });

                blank.addEventListener('dragover', function (event) {
                    event.preventDefault();
                    blank.classList.add('ring-2', 'ring-indigo-400/40');
                });

                blank.addEventListener('dragleave', function () {
                    blank.classList.remove('ring-2', 'ring-indigo-400/40');
                });

                blank.addEventListener('drop', function (event) {
                    event.preventDefault();
                    blank.classList.remove('ring-2', 'ring-indigo-400/40');
                    placeAnswer(event.dataTransfer.getData('text/plain'), blank.dataset.blankIndex);
                });
            });

            pool.addEventListener('dragover', function (event) {
                event.preventDefault();
            });

            pool.addEventListener('drop', function (event) {
                event.preventDefault();

                const answerIndex = Number(event.dataTransfer.getData('text/plain'));
                removeAnswer(answerIndex);
                selectedIndex = null;
                clearFeedback();
                render();
            });

            prevBtn?.addEventListener('click', function () {
                page--;
                render();
            });

            nextBtn?.addEventListener('click', function () {
                page++;
                render();
            });

            window.addEventListener('resize', function () {
                clampPage();
                render();
                schedulePoolStickyUpdate();
            });

            window.addEventListener('load', schedulePoolStickyUpdate, { passive: true });
            window.addEventListener('scroll', updatePoolSticky, { passive: true });
            document.addEventListener('scroll', updatePoolSticky, { passive: true, capture: true });

            checkBtn?.addEventListener('click', checkAnswers);
            revealBtn?.addEventListener('click', revealAnswers);
            resetBtn?.addEventListener('click', resetSlide);
            continueBtn?.addEventListener('click', goNext);

            window.resetSlide = resetSlide;
            window.stopSlideAudio = function () {
                Object.keys(sounds).forEach(function (key) {
                    sounds[key].pause();
                    sounds[key].currentTime = 0;
                });
            };

            render();
            schedulePoolStickyUpdate();
        })();
    </script>
@endsection
