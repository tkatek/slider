@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $questions = is_array($content['questions'] ?? null) ? $content['questions'] : [];
    $storageVersion = trim((string) ($content['storage_version'] ?? ''));
    $storageKey = 'type-correct-format-game-' . md5(request()->path())
        . ($storageVersion !== '' ? '-' . md5($storageVersion) : '');
    $stackedFullInput = !empty($content['stacked_full_input']);
    $autoGrowInputs = (bool) ($content['auto_grow_inputs'] ?? true);
    $inlineAnswers = !empty($content['inline_answers']);
    $stackedGridCols2 = $stackedFullInput && !empty($content['stacked_grid_cols_2']);
    $hideHints = !empty($content['hide_hints']);
    $isSingleQuestion = count($questions) === 1;
    $playerAudio = trim((string) ($content['audio'] ?? ''));
    $scriptLines = is_array($content['script'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['script']), static fn ($line) => $line !== ''))
        : [];
    $hasScript = $scriptLines !== [];
    $readingTitle = trim((string) ($content['reading_title'] ?? $content['passage_title'] ?? ''));
    $readingLabel = trim((string) ($content['reading_label'] ?? $content['passage_label'] ?? 'Reading'));
    $rawReadingPassage = $content['passage'] ?? $content['reading'] ?? [];
    $readingPassage = is_array($rawReadingPassage)
        ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawReadingPassage), static fn ($paragraph) => $paragraph !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/', trim((string) $rawReadingPassage)) ?: []),
            static fn ($paragraph) => $paragraph !== ''
        ));
    $hasReadingPassage = $readingPassage !== [];

    $gridClasses = 'mx-auto grid w-full max-w-[1200px] grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4';
    $cardClasses = 'verb-card rounded-2xl border border-slate-200/90 bg-white/95 p-3 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-100/70 dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-4';
    $answerClasses = 'flex w-full flex-wrap items-center gap-2 text-sm font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:text-base';
    $hintClasses = 'inline-flex min-h-7 items-center justify-center rounded-full border border-amber-200 bg-amber-50 px-2.5 py-1 text-xs font-black text-amber-800 dark:border-amber-400/30 dark:bg-amber-500/15 dark:text-amber-100 sm:min-h-8 sm:px-3 sm:text-sm';
    $inputClasses = 'js-verb-input h-9 w-auto min-w-20 max-w-56 rounded-xl border-2 border-slate-200 bg-white px-2 text-center text-sm font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-10 sm:min-w-24 sm:px-3 sm:text-base';

    if ($stackedFullInput) {
        $gridClasses = 'mx-auto grid w-full max-w-[1240px] grid-cols-1 gap-3 sm:gap-4' . ($stackedGridCols2 ? ' sm:grid-cols-2' : '');
        $answerClasses = 'grid w-full grid-cols-1 gap-2 text-sm font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:gap-3 sm:text-base';
        $hintClasses = 'block w-full rounded-2xl border border-slate-200 bg-slate-50/90 px-3 py-2 text-left text-sm font-black leading-relaxed text-slate-950 dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-50 sm:px-4 sm:py-3 sm:text-base';
        $inputClasses = 'js-verb-input h-11 w-full min-w-0 rounded-xl border-2 border-slate-200 bg-white px-3 text-left text-sm font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-12 sm:text-base';
    }

    if ($isSingleQuestion) {
        $gridClasses = 'mx-auto grid min-h-[clamp(220px,38vh,360px)] w-full max-w-[1160px] grid-cols-1 items-center justify-items-center gap-4';
        $cardClasses = 'verb-card w-full max-w-[1060px] rounded-3xl border border-slate-200/90 bg-white/95 p-5 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-100/70 dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-8';
        $answerClasses = 'flex w-full flex-wrap items-center justify-center gap-2 text-center text-lg font-black leading-relaxed text-slate-950 dark:text-slate-50 sm:gap-3 sm:text-2xl';
        $inputClasses = 'js-verb-input h-12 w-full min-w-44 max-w-sm rounded-2xl border-2 border-slate-200 bg-white px-4 text-center text-lg font-black text-slate-950 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-14 sm:min-w-56 sm:text-xl';
    }

    if ($autoGrowInputs) {
        $inputClasses = 'js-verb-input min-h-9 w-20 min-w-20 max-w-full shrink-0 resize-none overflow-hidden whitespace-pre-wrap [overflow-wrap:anywhere] rounded-xl border-2 border-slate-200 bg-white px-2 py-1.5 text-left text-sm font-black leading-relaxed text-slate-950 outline-none transition-colors duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:min-h-10 sm:px-3 sm:text-base';
    }

    if ($inlineAnswers) {
        $answerClasses = 'block w-full text-base font-bold leading-[2.4] text-slate-900 dark:text-slate-100 sm:text-lg';
        $inputClasses .= ' inline-block align-middle';
    }
@endphp

@section('content')
    <div class="min-h-[100dvh] w-full overflow-x-hidden font-sans">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1440px] items-center justify-center px-3 py-4 sm:px-5 sm:py-8">
            <main class="w-full">
                @include('slider.components.title-subtitle')

                @if($playerAudio !== '')
                    <div class="mx-auto mb-4 w-full max-w-4xl px-2">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                @if(!empty($content['focus_note']))
                    <div class="mx-auto mb-4 mt-2 w-full max-w-4xl px-2">
                        <div class="rounded-2xl border border-orange-200/80 bg-gradient-to-r from-white via-orange-50/70 to-amber-50/70 px-3 py-2.5 text-center shadow-sm shadow-orange-100/70 backdrop-blur dark:border-orange-400/30 dark:from-slate-900/80 dark:via-orange-950/20 dark:to-slate-900/80 dark:shadow-none sm:px-5 sm:py-3">
                            <p class="text-sm font-black leading-relaxed tracking-[-0.01em] text-slate-800 dark:text-slate-100 sm:text-base lg:text-lg">
                                {{ $content['focus_note'] }}
                            </p>
                        </div>
                    </div>
                @endif

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

                <div class="mx-auto grid w-full max-w-[1380px] gap-4 {{ $hasReadingPassage ? 'lg:grid-cols-2 lg:items-start' : '' }}">
                    @if($hasReadingPassage)
                        <article id="typeCorrectReadingPassage" class="h-fit w-full rounded-[1.6rem] border border-indigo-200/80 bg-white/95 p-4 text-left shadow-[0_18px_48px_rgba(15,23,42,.1)] dark:border-indigo-500/30 dark:bg-slate-900/95 sm:p-5">
                            <div class="flex gap-4">
                                <span class="w-1.5 shrink-0 self-stretch rounded-full bg-gradient-to-b from-sky-400 via-indigo-500 to-violet-500" aria-hidden="true"></span>
                                <div class="min-w-0 flex-1">
                                    @if($readingLabel !== '')
                                        <div class="text-[.68rem] font-black uppercase tracking-[.18em] text-indigo-600 dark:text-indigo-300">{{ $readingLabel }}</div>
                                    @endif
                                    @if($readingTitle !== '')
                                        <h2 class="mt-1.5 text-2xl font-black leading-tight tracking-[-.035em] text-slate-950 dark:text-white sm:text-3xl">{{ $readingTitle }}</h2>
                                    @endif
                                    <div class="mt-4 grid gap-3">
                                        @foreach($readingPassage as $paragraph)
                                            <p class="m-0 text-sm font-semibold leading-[1.58] text-slate-700 dark:text-slate-200 sm:text-[.95rem]">{{ $paragraph }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif

                    <section class="{{ $gridClasses }} h-fit {{ $hasReadingPassage ? 'lg:mx-0 lg:max-w-none' : '' }}">
                        @foreach($questions as $index => $item)
                            @php
                                $primaryAnswer = (string) ($item['answers'][0] ?? '');
                                $defaultAnswer = (string) ($item['default_answer'] ?? '');
                                $hasPrompt = trim((string) ($item['prompt'] ?? '')) !== '';
                                $isLocked = !empty($item['locked']);
                                $maxLength = max(1, mb_strlen($primaryAnswer), mb_strlen($defaultAnswer));
                                $inputSize = min(36, max(5, $maxLength));
                                $lockedClasses = $isLocked && $defaultAnswer !== ''
                                    ? ' is-correct border-emerald-500 dark:border-emerald-400'
                                    : '';
                            @endphp

                            <article class="{{ $cardClasses }}">
                                @if($hasPrompt)
                                    <label for="type-correct-answer-{{ $index }}" class="mb-3 block text-base font-bold leading-relaxed text-slate-900 dark:text-slate-100 sm:text-lg">
                                        {{ $index + 1 }}. {{ $item['prompt'] }}
                                        @if(!$hideHints && ($item['hint'] ?? '') !== '')
                                            <span class="{{ $hintClasses }} align-middle">({{ $item['hint'] }})</span>
                                        @endif
                                    </label>
                                @endif

                                <div class="{{ $answerClasses }}">
                                    @if(!$hideHints && !$hasPrompt && $stackedFullInput && ($item['hint'] ?? '') !== '')
                                        <span class="{{ $hintClasses }}">{{ $item['hint'] }}</span>
                                    @endif

                                    @if(!$stackedFullInput || ($item['prefix'] ?? '') !== '')
                                        <span class="{{ $inlineAnswers ? '' : 'shrink-0' }}">@if($inlineAnswers && !$hasPrompt){{ $index + 1 }}. @endif{{ $item['prefix'] ?? '' }}</span>
                                    @endif

                                    @if($autoGrowInputs)
                                        <textarea
                                            id="type-correct-answer-{{ $index }}"
                                            class="{{ $inputClasses }}{{ $lockedClasses }}"
                                            rows="1"
                                            maxlength="{{ max(18, $maxLength) }}"
                                            data-key="{{ $index }}"
                                            data-default="{{ $defaultAnswer }}"
                                            data-locked="{{ $isLocked ? '1' : '0' }}"
                                            data-answers="{{ json_encode($item['answers'] ?? [], JSON_HEX_APOS) }}"
                                            @if($inlineAnswers) aria-label="{{ $index + 1 }}. {{ $item['prefix'] ?? '' }} blank {{ $item['suffix'] ?? '' }}" @endif
                                            autocomplete="off"
                                            spellcheck="false"
                                            @if($isLocked) readonly aria-readonly="true" @endif
                                        >{{ $defaultAnswer }}</textarea>
                                    @else
                                        <input
                                            id="type-correct-answer-{{ $index }}"
                                            type="text"
                                            class="{{ $inputClasses }}{{ $lockedClasses }}"
                                            size="{{ $inputSize }}"
                                            maxlength="{{ max(18, $maxLength) }}"
                                            value="{{ $defaultAnswer }}"
                                            data-key="{{ $index }}"
                                            data-default="{{ $defaultAnswer }}"
                                            data-locked="{{ $isLocked ? '1' : '0' }}"
                                            data-answers="{{ json_encode($item['answers'] ?? [], JSON_HEX_APOS) }}"
                                            @if($inlineAnswers) aria-label="{{ $index + 1 }}. {{ $item['prefix'] ?? '' }} blank {{ $item['suffix'] ?? '' }}" @endif
                                            autocomplete="off"
                                            spellcheck="false"
                                            @if($isLocked) readonly aria-readonly="true" @endif
                                        />
                                    @endif

                                    @if(!$stackedFullInput || ($item['suffix'] ?? '') !== '')
                                        <span class="{{ $inlineAnswers ? '' : 'shrink-0' }}" data-answer-suffix>{{ $item['suffix'] ?? '' }}</span>
                                    @endif

                                    @if(!$hideHints && !$hasPrompt && !$stackedFullInput)
                                        <span class="{{ $hintClasses }}">({{ $item['hint'] ?? '' }})</span>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </section>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-verb-input'));
            const autoGrowInputs = @json($autoGrowInputs);
            const inlineAnswers = @json($inlineAnswers);
            const textMeasure = autoGrowInputs ? document.createElement('canvas').getContext('2d') : null;

            const resizeAnswer = (input) => {
                if (!autoGrowInputs || !textMeasure) return;

                const style = getComputedStyle(input);
                const pixels = (value) => Number.parseFloat(value) || 0;
                textMeasure.font = `${style.fontStyle} ${style.fontWeight} ${style.fontSize} ${style.fontFamily}`;
                // Reserve room for the expected answer before the user starts typing.
                const sizingLines = [input.value, ...getAcceptedAnswers(input)]
                    .flatMap((value) => String(value ?? '').split('\n'));
                const textWidth = Math.max(0, ...sizingLines.map((line) => {
                    return textMeasure.measureText(line).width
                        + Math.max(0, line.length - 1) * pixels(style.letterSpacing);
                }));
                const horizontalSpace = pixels(style.paddingLeft) + pixels(style.paddingRight)
                    + pixels(style.borderLeftWidth) + pixels(style.borderRightWidth);
                const suffix = input.parentElement.querySelector('[data-answer-suffix]');
                const suffixSpace = !inlineAnswers && suffix?.textContent.trim()
                    ? suffix.getBoundingClientRect().width + pixels(getComputedStyle(input.parentElement).columnGap)
                    : 0;
                const availableWidth = input.parentElement.clientWidth - suffixSpace;

                // Grow across the card first, then wrap and grow vertically.
                input.style.width = `${Math.min(availableWidth,
                    Math.max(pixels(style.minWidth), Math.ceil(textWidth + horizontalSpace + 2)))}px`;
                input.style.height = 'auto';
                input.style.height = `${Math.ceil(input.scrollHeight
                    + pixels(style.borderTopWidth) + pixels(style.borderBottomWidth))}px`;
                input.scrollTop = 0;
                input.scrollLeft = 0;
            };

            if (autoGrowInputs) {
                const resizeAnswers = () => inputs.forEach(resizeAnswer);
                window.addEventListener('resize', resizeAnswers);
                document.fonts?.ready.then(resizeAnswers);
            }
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

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            const play = (sound) => {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            };

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

                resizeAnswer(input);

                if (isLocked) {
                    input.readOnly = true;
                    setInputState(input, 'correct');
                    setCardState(card, 'correct');
                }

                input.addEventListener('input', () => {
                    resizeAnswer(input);
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

                play(hasWrong ? audio.wrong : audio.success);
                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                cards.forEach((card) => {
                    const input = card.querySelector('.js-verb-input');
                    const acceptedAnswers = input ? getAcceptedAnswers(input) : [];

                    if (input) {
                        input.value = acceptedAnswers[0] || '';
                        resizeAnswer(input);
                        setInputState(input, 'correct');
                    }

                    setCardState(card, 'correct');
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                clearInterval(timerInt);
                play(audio.correct);
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
                    resizeAnswer(input);
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
                document.querySelectorAll('[data-audio-player-media]').forEach((player) => player.pause());
                window.syncAudioPlayerUI?.();
                Object.values(audio).forEach((sound) => {
                    sound.pause();
                    sound.currentTime = 0;
                });
            };

            window.addEventListener('pagehide', window.stopSlideAudio);
            window.addEventListener('beforeunload', window.stopSlideAudio);
        });
    </script>
@endsection
