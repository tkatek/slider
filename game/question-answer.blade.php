@extends('slider.simple-layout')

@php
    $content['theme'] = $content['theme'] ?? '#6366f1';
    $content['grid'] = array_replace_recursive([
        'cols' => [
            'base' => 1,
            'sm' => 1,
            'md' => 2,
            'lg' => 3,
        ],
        'gap' => 'gap-3 sm:gap-4 lg:gap-5',
    ], $content['grid'] ?? []);
    $content['sounds'] = array_replace([
        'click' => materialAsset('slider/sounds/tap.wav'),
        'done' => materialAsset('slider/sounds/correct.wav'),
        'skip' => materialAsset('slider/sounds/click.wav'),
    ], $content['sounds'] ?? []);

    $cols = $content['grid']['cols'];
    $gridCols = "grid-cols-{$cols['base']} sm:grid-cols-{$cols['sm']} md:grid-cols-{$cols['md']} lg:grid-cols-{$cols['lg']}";
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        [data-qa-game] { --p: {{ $content['theme'] }}; }

        @keyframes pop {
            0% { transform: translateY(10px) scale(.98); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        @keyframes cardIn {
            0% { transform: translateY(16px) scale(.96); opacity: 0; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        [data-qa-game] .modal-pop { animation: pop .3s cubic-bezier(.34,1.56,.64,1); }
        [data-qa-game] .card-in { animation: cardIn .45s cubic-bezier(.2,.8,.2,1) both; }

        [data-qa-game] .board-shell {
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(148, 163, 184, 0.14) 0%, transparent 45%),
                radial-gradient(120% 120% at 100% 0%, rgba(203, 213, 225, 0.16) 0%, transparent 42%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.72) 0%, rgba(255, 255, 255, 0.56) 100%);
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 24px 54px rgba(15, 23, 42, 0.10);
            backdrop-filter: blur(18px);
        }

        [data-qa-game] .qa-card {
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(226, 232, 240, 0.92);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(14px);
        }

        [data-qa-game] .qa-card-art {
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(148, 163, 184, 0.34) 0%, transparent 42%),
                radial-gradient(120% 120% at 100% 0%, rgba(203, 213, 225, 0.24) 0%, transparent 40%),
                radial-gradient(120% 140% at 50% 100%, rgba(15, 23, 42, 0.28) 0%, transparent 58%),
                linear-gradient(145deg, rgba(30, 41, 59, 0.96) 0%, rgba(51, 65, 85, 0.94) 42%, rgba(71, 85, 105, 0.9) 100%);
        }

        [data-qa-game] .qa-card:hover {
            transform: translateY(-6px) scale(1.01);
            border-color: rgba(100, 116, 139, 0.38);
            box-shadow: 0 26px 52px rgba(15, 23, 42, 0.14);
        }

        [data-qa-game] .qa-card.is-locked {
            cursor: default;
        }

        [data-qa-game] .qa-card.is-correct {
            background: linear-gradient(145deg, rgba(5, 150, 105, 0.96) 0%, rgba(16, 185, 129, 0.94) 100%);
            border-color: rgba(110, 231, 183, 0.7);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.18), 0 18px 30px rgba(16, 185, 129, 0.12);
        }

        [data-qa-game] .qa-card.is-oops {
            background: linear-gradient(145deg, rgba(190, 24, 93, 0.96) 0%, rgba(239, 68, 68, 0.94) 100%);
            border-color: rgba(252, 165, 165, 0.72);
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.16), 0 18px 30px rgba(239, 68, 68, 0.10);
        }

        [data-qa-game] .qa-card.is-correct .qa-card-art,
        [data-qa-game] .qa-card.is-oops .qa-card-art,
        [data-qa-game] .qa-card.is-correct .qa-card-gloss,
        [data-qa-game] .qa-card.is-oops .qa-card-gloss,
        [data-qa-game] .qa-card.is-correct .qa-card-orb,
        [data-qa-game] .qa-card.is-oops .qa-card-orb {
            opacity: 0;
        }

        [data-qa-game] .qa-card-number {
            font-size: clamp(2.5rem, 5vw, 4.5rem);
            line-height: 1;
            font-weight: 900;
            letter-spacing: -0.05em;
            color: rgba(255, 255, 255, 0.94);
            text-shadow: 0 10px 30px rgba(15, 23, 42, 0.45);
            transition: transform .25s ease, opacity .25s ease;
            user-select: none;
        }

        [data-qa-game] .qa-card:hover .qa-card-number {
            transform: scale(1.06);
        }

        [data-qa-game] .metric-tile {
            background: linear-gradient(180deg, rgba(255,255,255,0.72) 0%, rgba(255,255,255,0.54) 100%);
        }

        .dark [data-qa-game] .board-shell {
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(100, 116, 139, 0.24) 0%, transparent 45%),
                radial-gradient(120% 120% at 100% 0%, rgba(71, 85, 105, 0.22) 0%, transparent 42%),
                linear-gradient(180deg, rgba(15, 23, 42, 0.72) 0%, rgba(15, 23, 42, 0.64) 100%);
            border-color: rgba(51, 65, 85, 0.9);
            box-shadow: 0 24px 54px rgba(2, 6, 23, 0.35);
        }

        .dark [data-qa-game] .qa-card {
            background: rgba(15, 23, 42, 0.74);
            border-color: rgba(51, 65, 85, 0.9);
            box-shadow: 0 18px 35px rgba(2, 6, 23, 0.28);
        }

        .dark [data-qa-game] .qa-card-art {
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(148, 163, 184, 0.22) 0%, transparent 42%),
                radial-gradient(120% 120% at 100% 0%, rgba(100, 116, 139, 0.24) 0%, transparent 40%),
                radial-gradient(120% 140% at 50% 100%, rgba(2, 6, 23, 0.5) 0%, transparent 58%),
                linear-gradient(145deg, rgba(15, 23, 42, 0.98) 0%, rgba(30, 41, 59, 0.96) 42%, rgba(51, 65, 85, 0.9) 100%);
        }

        .dark [data-qa-game] .metric-tile {
            background: linear-gradient(180deg, rgba(15,23,42,0.38) 0%, rgba(15,23,42,0.22) 100%);
        }
    </style>
@endsection

@section('content')
    <main data-qa-game class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300">
        <div class="mx-auto flex w-full max-w-[96rem] min-h-[100dvh] items-center px-4 sm:px-8 lg:px-10 py-4 sm:py-6">
            <section class="w-full p-2 sm:p-4 lg:p-5 flex flex-col justify-center">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 auto-rows-max">
                    @include('slider.components.title-subtitle')

                        @include('slider.components.game-status')

                    <section class="relative w-full max-w-[92rem] p-1 sm:p-3 lg:p-4 flex-1">
                        <div class="board-shell w-full rounded-[2rem] p-4 sm:p-6">
                            <div class="mb-4 sm:mb-5 flex justify-center">
                                <div class="inline-flex items-center gap-2 rounded-full border border-slate-200/70 bg-white/80 px-4 py-2 text-sm sm:text-base font-black tracking-[0.08em] text-slate-900 shadow-md dark:border-slate-600/40 dark:bg-slate-900/70 dark:text-slate-100">
                                    <span aria-hidden="true">🔢</span>
                                    <span>Pick a Number</span>
                                </div>
                            </div>
                            <div id="quizGrid" class="grid {{ $gridCols }} {{ $content['grid']['gap'] }}">
                                @foreach($content['items'] as $idx => $item)
                                    <button
                                            type="button"
                                            data-idx="{{ $idx }}"
                                            class="qa-card card-in group relative h-28 sm:h-32 lg:h-36 rounded-[2rem] transition-all duration-300 flex items-center justify-center overflow-hidden"
                                            style="animation-delay: {{ $idx * 0.04 }}s;"
                                    >
                                        <div class="qa-card-art absolute inset-0"></div>
                                        <div class="qa-card-gloss absolute inset-0 bg-[linear-gradient(180deg,rgba(255,255,255,0.08)_0%,rgba(255,255,255,0.02)_32%,rgba(15,23,42,0.52)_100%)]"></div>
                                        <div class="qa-card-orb absolute -right-8 top-4 h-20 w-20 rounded-full border border-white/15 bg-white/10 blur-[1px]"></div>
                                        <div class="qa-card-orb absolute -left-8 bottom-3 h-16 w-16 rounded-full border border-white/10 bg-white/10 blur-[1px]"></div>

                                        <div class="relative z-10 flex h-full w-full items-center justify-center p-4">
                                            <div class="qa-card-number opacity-95">{{ $idx + 1 }}</div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>

        <div id="modal" class="hidden fixed inset-0 z-50">
            <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm" id="modalBg"></div>

            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                <div class="modal-pop w-full max-w-5xl max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                    <div class="p-6 sm:p-8">
                        <div class="flex items-center justify-between gap-4">
                            <div class="text-[11px] font-black uppercase tracking-[0.25em] text-slate-500 dark:text-slate-400">
                                Question
                            </div>

                            <button id="modalClose" class="rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" type="button">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="mt-4 grid grid-cols-1 lg:grid-cols-[1.2fr_0.9fr] gap-6 items-start">
                            <div class="rounded-[2rem] border border-slate-200/70 bg-white/70 p-4 shadow-inner dark:border-slate-700/30 dark:bg-slate-900/25">
                                <img id="mImage" src="" alt="" class="mx-auto w-full max-h-[56vh] object-contain rounded-2xl">
                            </div>

                            <div class="flex flex-col gap-5 text-left">
                                <h2 id="mQuestion" class="text-2xl sm:text-3xl font-black leading-tight text-slate-900 dark:text-white"></h2>



                                <button id="checkBtn"
                                        type="button"
                                        class="w-full rounded-2xl bg-slate-700 px-6 py-4 text-base sm:text-lg font-black text-white shadow-lg transition-colors hover:bg-slate-600 dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white">
                                    Reveal Answer
                                </button>

                                <div id="mAnswerContainer" class="hidden">
                                    <div class="rounded-2xl border border-slate-200/70 bg-slate-100/80 p-5 dark:border-slate-600/40 dark:bg-slate-800/50">
                                        <div class="text-xs font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Answer</div>
                                        <p id="mAnswerText" class="mt-3 text-lg sm:text-xl font-black leading-relaxed text-slate-900 dark:text-slate-100"></p>
                                    </div>

                                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <button id="oopsBtn"
                                                type="button"
                                                class="w-full rounded-2xl border border-rose-200/80 bg-rose-50/85 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-rose-700 transition-colors hover:bg-rose-100 dark:border-rose-500/30 dark:bg-rose-500/10 dark:text-rose-300 dark:hover:bg-rose-500/15">
                                            Oops
                                        </button>

                                        <button id="correctBtn"
                                                type="button"
                                                class="w-full rounded-2xl border border-emerald-200/80 bg-emerald-50/85 px-6 py-4 text-sm font-black uppercase tracking-[0.12em] text-emerald-700 transition-colors hover:bg-emerald-100 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300 dark:hover:bg-emerald-500/15">
                                            Correct
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="resultsOverlay" class="hidden fixed inset-0 z-50">
            <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>

            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                    <div class="p-6 sm:p-8 text-center">
                        <div class="text-6xl mb-3">🎉</div>

                        <h2 class="text-2xl sm:text-3xl font-black dark:text-white">
                            Done!
                        </h2>

                        <div class="mt-5 w-full grid grid-cols-1 sm:grid-cols-3 gap-3">
                            @foreach(['Score' => 'finalScore', 'Time' => 'finalTime', 'Mistakes' => 'finalMistakes'] as $label => $id)
                                <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                    <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <button
                                    id="btnRestartPopup"
                                    class="w-full px-8 py-3 rounded-2xl font-black shadow-lg transition-colors bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white hover:bg-slate-50 dark:hover:bg-slate-700"
                                    type="button"
                            >
                                Restart 🔁
                            </button>

                            <button
                                    id="btnContinue"
                                    class="w-full rounded-2xl bg-slate-700 px-8 py-3 font-black text-white shadow-lg transition-colors hover:bg-slate-600 dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-white"
                                    type="button"
                            >
                                Continue ⚡
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.querySelector('[data-qa-game]');
            if (!root) return;

            const ITEMS = @json($content['items']);
            const SOUNDS = @json($content['sounds'] ?? []);

            const state = {
                done: Array(ITEMS.length).fill(null),
                current: null,
                finished: false,
                startTime: Date.now(),
                timerInt: null,
            };

            const sfx = new Audio();

            const elements = {
                modal: root.querySelector('#modal'),
                modalBg: root.querySelector('#modalBg'),
                modalClose: root.querySelector('#modalClose'),
                mQuestion: root.querySelector('#mQuestion'),
                mImage: root.querySelector('#mImage'),
                mAnswerContainer: root.querySelector('#mAnswerContainer'),
                mAnswerText: root.querySelector('#mAnswerText'),
                checkBtn: root.querySelector('#checkBtn'),
                doneCount: root.querySelector('#tilesCount'),
                correctCount: root.querySelector('#correctCount'),
                mistakesCount: root.querySelector('#mistakesCount'),
                timer: root.querySelector('#gameTimer'),
                resultsOverlay: root.querySelector('#resultsOverlay'),
                finalScore: root.querySelector('#finalScore'),
                finalTime: root.querySelector('#finalTime'),
                finalMistakes: root.querySelector('#finalMistakes'),
                btnRestartPopup: root.querySelector('#btnRestartPopup'),
                btnContinue: root.querySelector('#btnContinue'),
                cards: Array.from(root.querySelectorAll('.qa-card')),
            };

            function stopAllAudio() {
                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                } catch (error) {}
            }

            window.stopSlideAudio = stopAllAudio;

            function playSound(key) {
                if (!SOUNDS?.[key]) return;

                try {
                    sfx.pause();
                    sfx.currentTime = 0;
                    sfx.src = SOUNDS[key];
                    sfx.play().catch(() => {});
                } catch (error) {}
            }

            function formatElapsed() {
                const elapsed = Math.floor((Date.now() - state.startTime) / 1000);
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            function startTimer() {
                clearInterval(state.timerInt);
                elements.timer.textContent = '00:00';

                state.timerInt = setInterval(() => {
                    elements.timer.textContent = formatElapsed();
                }, 1000);
            }

            function updateStatus() {
                const doneCount = state.done.filter((value) => value !== null).length;
                const correctCount = state.done.filter((value) => value === 'correct').length;
                const mistakesCount = state.done.filter((value) => value === 'oops').length;

                elements.doneCount.textContent = `${doneCount}/${ITEMS.length}`;
                elements.correctCount.textContent = correctCount;
                elements.mistakesCount.textContent = mistakesCount;
            }

            function hideQuestionModal() {
                elements.modal.classList.add('hidden');
                state.current = null;
            }

            function hideResultsOverlay() {
                elements.resultsOverlay.classList.add('hidden');
            }

            function showResultsOverlay() {
                clearInterval(state.timerInt);

                const correctCount = state.done.filter((value) => value === 'correct').length;
                const mistakesCount = state.done.filter((value) => value === 'oops').length;

                elements.finalScore.textContent = `${correctCount}/${ITEMS.length}`;
                elements.finalTime.textContent = formatElapsed();
                elements.finalMistakes.textContent = mistakesCount;
                elements.resultsOverlay.classList.remove('hidden');

                playSound('done');
            }

            function isComplete() {
                return state.done.every((value) => value !== null);
            }

            function openQuestion(idx) {
                if (state.done[idx] !== null) return;

                state.current = idx;
                const item = ITEMS[idx];

                elements.mQuestion.textContent = item.question;
                elements.mImage.src = item.image;
                elements.mImage.alt = item.question || 'Question image';
                elements.mAnswerText.textContent = item.answer || '...';

                elements.checkBtn.classList.remove('hidden');
                elements.mAnswerContainer.classList.add('hidden');
                elements.modal.classList.remove('hidden');

                playSound('click');
            }

            function grade(status) {
                const idx = state.current;
                if (idx === null || state.done[idx] !== null) return;

                state.done[idx] = status;

                const card = root.querySelector(`.qa-card[data-idx="${idx}"]`);

                card.classList.add('is-locked');
                card.classList.remove('is-correct', 'is-oops');

                if (status === 'correct') {
                    card.classList.add('is-correct');
                    playSound('done');
                } else {
                    card.classList.add('is-oops');
                    playSound('skip');
                }

                hideQuestionModal();
                updateStatus();

                if (isComplete()) {
                    state.finished = true;
                    setTimeout(showResultsOverlay, 280);
                }
            }

            function resetGame() {
                state.done = Array(ITEMS.length).fill(null);
                state.current = null;
                state.finished = false;
                state.startTime = Date.now();

                hideQuestionModal();
                hideResultsOverlay();
                stopAllAudio();

                elements.cards.forEach((card, idx) => {
                    card.classList.remove('is-locked', 'is-correct', 'is-oops', 'card-in');

                    void card.offsetWidth;
                    card.classList.add('card-in');
                    card.style.animationDelay = `${idx * 0.04}s`;
                });

                updateStatus();
                startTimer();
            }

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (error) {
                    return true;
                }
            }

            function goNextSlide() {
                resetGame();

                if (isEmbedded()) {
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
                }

            }

            window.resetSlide = resetGame;

            elements.cards.forEach((card) => {
                card.addEventListener('click', () => openQuestion(parseInt(card.dataset.idx, 10)));
            });

            elements.checkBtn.addEventListener('click', () => {
                elements.checkBtn.classList.add('hidden');
                elements.mAnswerContainer.classList.remove('hidden');
                playSound('click');
            });

            root.querySelector('#oopsBtn').addEventListener('click', () => grade('oops'));
            root.querySelector('#correctBtn').addEventListener('click', () => grade('correct'));

            elements.modalClose.addEventListener('click', hideQuestionModal);
            elements.modalBg.addEventListener('click', hideQuestionModal);

            elements.btnRestartPopup.addEventListener('click', resetGame);
            elements.btnContinue.addEventListener('click', goNextSlide);

            updateStatus();
            startTimer();
        });
    </script>
@endsection
