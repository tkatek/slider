@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $questions = is_array($content['questions'] ?? null) ? $content['questions'] : [];
    $storageKey = 'type-correct-format-game-' . md5(request()->path());
    $stackedFullInput = !empty($content['stacked_full_input']);
    $stackedGridCols2 = $stackedFullInput && !empty($content['stacked_grid_cols_2']);
    $hideHints = !empty($content['hide_hints']);
    $isSingleQuestion = count($questions) === 1;

    $gridClasses = 'mx-auto grid w-full max-w-[1120px] grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4';
    $cardClasses = 'verb-card rounded-2xl border border-slate-200/90 bg-white/95 p-3 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-100/70 dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-4';
    $answerClasses = 'flex w-full flex-wrap items-center gap-2 text-sm font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:text-base';
    $hintClasses = 'inline-flex min-h-7 items-center justify-center rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-black text-amber-800 dark:border-amber-400/30 dark:bg-amber-500/15 dark:text-amber-100 sm:min-h-8 sm:px-3 sm:text-sm';
    $inputClasses = 'js-verb-input h-9 w-auto min-w-20 max-w-56 rounded-xl border-2 border-slate-200 bg-white px-2 text-center text-sm font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-10 sm:min-w-24 sm:px-3 sm:text-base';

    if ($stackedFullInput) {
        $gridClasses = 'mx-auto grid w-full max-w-[1160px] grid-cols-1 gap-3 sm:gap-4' . ($stackedGridCols2 ? ' sm:grid-cols-2' : '');
        $answerClasses = 'grid w-full grid-cols-1 gap-2 text-sm font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:gap-3 sm:text-base';
        $hintClasses = 'block w-full rounded-2xl border border-slate-200 bg-slate-50/90 px-3 py-2 text-left text-sm font-black leading-relaxed text-slate-950 dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-50 sm:px-4 sm:py-3 sm:text-base';
        $inputClasses = 'js-verb-input h-11 w-full min-w-0 rounded-xl border-2 border-slate-200 bg-white px-3 text-left text-sm font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-12 sm:text-base';
    }

    if ($isSingleQuestion) {
        $gridClasses = 'mx-auto grid min-h-[clamp(220px,38vh,360px)] w-full max-w-[1080px] grid-cols-1 items-center justify-items-center gap-4';
        $cardClasses = 'verb-card w-full max-w-[980px] rounded-3xl border border-slate-200/90 bg-white/95 p-5 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-100/70 dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-8';
        $answerClasses = 'flex w-full flex-wrap items-center justify-center gap-2 text-center text-lg font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:gap-3 sm:text-2xl';
        $inputClasses = 'js-verb-input h-12 w-full min-w-44 max-w-sm rounded-2xl border-2 border-slate-200 bg-white px-4 text-center text-lg font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-14 sm:min-w-56 sm:text-xl';
    }
@endphp

@section('content')
    <div class="min-h-[100dvh] w-full overflow-x-hidden font-sans">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1360px] items-center justify-center px-3 py-4 sm:px-5 sm:py-8">
            <main class="w-full">
                @include('slider.components.title-subtitle')

                @include('slider.components.game-status')

                <div class="mx-auto mb-3 flex w-full max-w-2xl flex-wrap items-center justify-center gap-2 sm:mb-4 sm:gap-3">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-xl border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-black text-amber-800 shadow-sm shadow-amber-100 transition duration-200 hover:-translate-y-0.5 hover:bg-amber-100 hover:shadow-md dark:border-amber-400/30 dark:bg-amber-500/15 dark:text-amber-100 dark:shadow-none sm:px-4 sm:text-sm"
                        id="btnRevealAnswers"
                    >
                        Reveal answers
                    </button>
                    <button
                        type="button"
                        class="hidden inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-black text-slate-800 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:bg-slate-50 hover:shadow-md dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:shadow-none dark:hover:bg-slate-800 sm:px-4 sm:text-sm"
                        id="btnRetakeTest"
                    >
                        Retake test
                    </button>
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-xl border border-stone-500/40 bg-gradient-to-r from-stone-700 via-stone-600 to-zinc-700 px-3 py-2 text-xs font-black text-white shadow-md shadow-stone-300/40 transition duration-200 hover:-translate-y-0.5 hover:from-stone-800 hover:via-stone-700 hover:to-zinc-800 hover:shadow-lg hover:shadow-stone-300/60 active:scale-95 dark:border-stone-400/30 dark:from-stone-200 dark:via-stone-100 dark:to-zinc-200 dark:text-stone-950 dark:shadow-none sm:px-4 sm:text-sm"
                        id="checkAnswersBtn"
                    >
                        Check Answers
                    </button>
                </div>

                <section class="{{ $gridClasses }}">
                    @foreach($questions as $index => $item)
                        @php
                            $primaryAnswer = (string) ($item['answers'][0] ?? '');
                            $defaultAnswer = (string) ($item['default_answer'] ?? '');
                            $isLocked = !empty($item['locked']);
                            $maxLength = max(1, mb_strlen($primaryAnswer));
                            $inputSize = min(36, max(5, $maxLength));
                            $lockedClasses = $isLocked && $defaultAnswer !== ''
                                ? ' is-correct border-emerald-500 dark:border-emerald-400'
                                : '';
                        @endphp

                        <article class="{{ $cardClasses }}">
                            <div class="{{ $answerClasses }}">
                                @if(!$hideHints && $stackedFullInput && ($item['hint'] ?? '') !== '')
                                    <span class="{{ $hintClasses }}">{{ $item['hint'] }}</span>
                                @endif

                                @if(!$stackedFullInput || ($item['prefix'] ?? '') !== '')
                                    <span class="shrink-0">{{ $item['prefix'] ?? '' }}</span>
                                @endif

                                <input
                                    type="text"
                                    class="{{ $inputClasses }}{{ $lockedClasses }}"
                                    size="{{ $inputSize }}"
                                    maxlength="{{ max(18, $maxLength) }}"
                                    value="{{ $defaultAnswer }}"
                                    data-key="{{ $index }}"
                                    data-default="{{ $defaultAnswer }}"
                                    data-locked="{{ $isLocked ? '1' : '0' }}"
                                    data-answers="{{ json_encode($item['answers'] ?? [], JSON_HEX_APOS) }}"
                                    autocomplete="off"
                                    spellcheck="false"
                                    @if($isLocked) readonly aria-readonly="true" @endif
                                />

                                @if(!$stackedFullInput || ($item['suffix'] ?? '') !== '')
                                    <span class="shrink-0">{{ $item['suffix'] ?? '' }}</span>
                                @endif

                                @if(!$hideHints && !$stackedFullInput)
                                    <span class="{{ $hintClasses }}">({{ $item['hint'] ?? '' }})</span>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-verb-input'));
            const cards = Array.from(document.querySelectorAll('.verb-card'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');
            const progressCountEl = document.getElementById('tilesCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');

            const inputStateClasses = {
                correct: ['border-emerald-500', 'dark:border-emerald-400'],
                wrong: ['border-rose-500', 'dark:border-rose-400'],
            };

            const cardStateClasses = {
                correct: ['border-emerald-300', 'dark:border-emerald-400/60'],
                wrong: ['border-rose-300', 'dark:border-rose-400/60'],
            };

            let savedData = {};
            let wrongTries = 0;
            let startTime = Date.now();
            let timerInt = null;

            try {
                savedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                savedData = {};
            }

            const normalizeValue = (value) => {
                return String(value || '')
                    .toLowerCase()
                    .replace(/[^a-z]/g, '');
            };

            const addClasses = (element, classes) => {
                element?.classList.add(...classes);
            };

            const removeClasses = (element, classes) => {
                element?.classList.remove(...classes);
            };

            const clearInputState = (input) => {
                if (!input) return;
                input.classList.remove('is-correct', 'is-wrong');
                removeClasses(input, inputStateClasses.correct);
                removeClasses(input, inputStateClasses.wrong);
            };

            const clearCardState = (card) => {
                if (!card) return;
                removeClasses(card, cardStateClasses.correct);
                removeClasses(card, cardStateClasses.wrong);
            };

            const setInputState = (input, state) => {
                if (!input) return;
                clearInputState(input);
                input.classList.add(state === 'correct' ? 'is-correct' : 'is-wrong');
                addClasses(input, inputStateClasses[state]);
            };

            const setCardState = (card, state) => {
                if (!card) return;
                clearCardState(card);
                addClasses(card, cardStateClasses[state]);
            };

            const getAcceptedAnswers = (input) => {
                try {
                    const answers = JSON.parse(input.dataset.answers || '[]');
                    return Array.isArray(answers) ? answers : [];
                } catch (e) {
                    return [];
                }
            };

            const isInputCorrect = (input) => {
                const userValue = normalizeValue(input.value);
                if (userValue === '') return false;

                return getAcceptedAnswers(input).some((answer) => normalizeValue(answer) === userValue);
            };

            const getCorrectTotal = () => cards.filter((card) => {
                const input = card.querySelector('.js-verb-input');
                return input ? input.classList.contains('is-correct') : false;
            }).length;

            const formatTime = (seconds) => {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            };

            const updateTimer = () => {
                if (!timerEl) return;
                timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            };

            const startTimer = () => {
                clearInterval(timerInt);
                updateTimer();
                timerInt = setInterval(updateTimer, 1000);
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const totalCards = cards.length;

                if (progressCountEl) progressCountEl.textContent = `${correctTotal}/${totalCards}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const saveAll = () => {
                const payload = {};

                inputs.forEach((input) => {
                    payload[input.dataset.key] = input.value || '';
                });

                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            const clearCardFeedback = (card) => {
                const input = card.querySelector('.js-verb-input');
                const defaultValue = input ? input.dataset.default || '' : '';
                const isLocked = input ? input.dataset.locked === '1' : false;

                clearInputState(input);
                clearCardState(card);

                if (input && isLocked && defaultValue !== '') {
                    setInputState(input, 'correct');
                    setCardState(card, 'correct');
                }
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) btnRevealAnswers.classList.toggle('hidden', revealed);
                if (btnRetakeTest) btnRetakeTest.classList.toggle('hidden', !revealed);
            };

            inputs.forEach((input) => {
                const key = input.dataset.key;
                const defaultValue = input.dataset.default || '';
                const isLocked = input.dataset.locked === '1';
                const card = input.closest('.verb-card');

                if (typeof savedData[key] === 'string') {
                    input.value = savedData[key];
                } else if (defaultValue !== '') {
                    input.value = defaultValue;
                }

                if (isLocked) {
                    input.readOnly = true;
                    setInputState(input, 'correct');
                    setCardState(card, 'correct');
                }

                input.addEventListener('input', () => {
                    if (input.dataset.locked === '1') return;

                    const activeCard = input.closest('.verb-card');
                    if (activeCard) clearCardFeedback(activeCard);

                    saveAll();
                    updateStatusUI();
                });

                input.addEventListener('blur', saveAll);
            });

            checkBtn?.addEventListener('click', () => {
                let hasWrong = false;
                let allCorrect = true;

                cards.forEach((card) => {
                    const input = card.querySelector('.js-verb-input');
                    const correct = input ? isInputCorrect(input) : false;
                    const state = correct ? 'correct' : 'wrong';

                    setInputState(input, state);
                    setCardState(card, state);

                    if (!correct) {
                        hasWrong = true;
                        allCorrect = false;
                    }
                });

                if (hasWrong) wrongTries += 1;
                if (allCorrect && cards.length > 0) clearInterval(timerInt);

                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                cards.forEach((card) => {
                    const input = card.querySelector('.js-verb-input');
                    const acceptedAnswers = input ? getAcceptedAnswers(input) : [];

                    if (input) {
                        input.value = acceptedAnswers[0] || '';
                        setInputState(input, 'correct');
                    }

                    setCardState(card, 'correct');
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                clearInterval(timerInt);
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            updateActionButtons({ revealed: false });
            updateStatusUI();
            startTimer();

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    const defaultValue = input.dataset.default || '';
                    const isLocked = input.dataset.locked === '1';
                    const card = input.closest('.verb-card');

                    input.value = defaultValue;
                    clearInputState(input);
                    clearCardState(card);

                    if (isLocked && defaultValue !== '') {
                        setInputState(input, 'correct');
                        setCardState(card, 'correct');
                    }
                });

                wrongTries = 0;
                startTime = Date.now();
                localStorage.removeItem(storageKey);
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            };

            window.stopSlideAudio = () => {
                clearInterval(timerInt);
            };
        });
    </script>
@endsection
