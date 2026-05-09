@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $gridClass = (string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4');
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    $squareImages = !empty($content['square_images']);
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? ''));
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $normalizeScriptLines = static function ($rawScript) {
        return is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
    };

    $scriptLines = $normalizeScriptLines($content['script'] ?? []);
    $hasScript = $scriptLines !== [];

    $storageKey = 'missing-word-game-' . md5(request()->path());
    $checkButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
    $imageAspectClass = $squareImages ? 'aspect-square h-auto min-h-0' : 'h-[128px] min-h-[118px] sm:h-[136px] sm:min-h-[128px] lg:h-[145px] lg:min-h-[132px]';

    if (!$squareImages && $imageAspectRatio !== '') {
        $imageAspectClass = match (preg_replace('/\s+/', '', $imageAspectRatio)) {
            '3/2' => 'aspect-[3/2] h-auto min-h-0',
            '4/3' => 'aspect-[4/3] h-auto min-h-0',
            '16/9' => 'aspect-video h-auto min-h-0',
            '1/1' => 'aspect-square h-auto min-h-0',
            default => $imageAspectClass,
        };
    }
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="min-h-[100dvh] w-full overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(99,102,241,0.10),transparent_32rem),radial-gradient(circle_at_top_right,rgba(59,130,246,0.08),transparent_30rem),linear-gradient(180deg,rgba(255,255,255,0.70),rgba(248,250,252,0.92))] font-sans dark:bg-[radial-gradient(circle_at_top_left,rgba(99,102,241,0.16),transparent_32rem),radial-gradient(circle_at_top_right,rgba(59,130,246,0.14),transparent_30rem),linear-gradient(180deg,rgba(2,6,23,0.88),rgba(15,23,42,0.96))]">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1480px] items-center justify-center px-3 pb-5 pt-4 sm:px-4 sm:pb-6 sm:pt-5">
            <main class="w-full">
                @include('slider.components.title-subtitle')


                @include('slider.components.game-status')

                @if(!empty($playerAudio))
                    <div class="mx-auto mt-4 mb-6 max-w-4xl px-1 sm:px-0">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                <div class="mx-auto mb-3 flex w-full max-w-[1400px] flex-wrap items-center justify-center gap-2.5">
                    <div class="flex flex-wrap items-center justify-center gap-2.5">
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-orange-300 bg-orange-50 px-3 py-1.5 text-[0.76rem] font-black text-orange-800 shadow-[0_8px_22px_-18px_rgba(234,88,12,0.42)] transition duration-200 hover:scale-105 hover:bg-orange-100 active:scale-95 dark:border-orange-700/60 dark:bg-orange-950/40 dark:text-orange-200 dark:hover:bg-orange-900/50" id="btnRevealAnswers">Reveal answers</button>
                        <button type="button" class="hidden inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-[0.76rem] font-black text-slate-900 shadow-[0_8px_22px_-18px_rgba(2,6,23,0.35)] transition duration-200 hover:scale-105 hover:bg-slate-50 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800" id="btnRetakeTest">Retake test</button>
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/20 px-3 py-1.5 text-[0.76rem] font-black text-white shadow-[0_10px_24px_-18px_rgba(79,70,229,0.45)] transition duration-200 hover:scale-105 hover:shadow-[0_12px_28px_-18px_rgba(59,130,246,0.55)] active:scale-95 {{ $checkButtonClass }}" id="checkAnswersBtn">Check Answers</button>
                    </div>
                </div>

                <section
                        class="word-grid mx-auto grid w-full max-w-[1400px] gap-3 sm:gap-3.5 lg:gap-4 {{ $gridClass }}"
                >
                    @foreach($items as $index => $item)
                        @php
                            $parts = $item['parts'] ?? null;

                            if (!is_array($parts)) {
                                $parts = [];

                                if (($item['prefix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['prefix']];
                                }

                                $parts[] = ['answer' => (string) ($item['answer'] ?? '')];

                                if (($item['suffix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['suffix']];
                                }
                            }

                            $normalizedParts = [];
                            $pendingHint = null;

                            foreach ($parts as $part) {
                                if (!is_array($part)) {
                                    continue;
                                }

                                if (array_key_exists('hint', $part) && !array_key_exists('answer', $part) && !array_key_exists('text', $part)) {
                                    $lastPartIndex = count($normalizedParts) - 1;

                                    if ($lastPartIndex >= 0 && array_key_exists('answer', $normalizedParts[$lastPartIndex])) {
                                        $normalizedParts[$lastPartIndex]['placeholder'] = $normalizedParts[$lastPartIndex]['placeholder'] ?? $part['hint'];
                                    } else {
                                        $pendingHint = $part['hint'];
                                    }

                                    continue;
                                }

                                if (array_key_exists('answer', $part) && $pendingHint !== null) {
                                    $part['placeholder'] = $part['placeholder'] ?? $part['hint'] ?? $pendingHint;
                                    $pendingHint = null;
                                }

                                $normalizedParts[] = $part;
                            }

                            $parts = $normalizedParts;
                        @endphp

                        <article class="word-card flex min-h-full flex-col rounded-2xl border border-slate-200/90 bg-gradient-to-b from-white/95 to-slate-50/95 p-2.5 shadow-[0_12px_28px_-24px_rgba(15,23,42,0.22)] transition duration-200 hover:-translate-y-0.5 hover:border-indigo-300/60 hover:shadow-[0_18px_40px_-28px_rgba(37,99,235,0.35)] dark:border-slate-700/80 dark:from-slate-900/95 dark:to-slate-950/90 sm:p-3">
                            @if(!empty($item['image']))
                                <div class="relative flex items-center justify-center overflow-hidden rounded-2xl border border-indigo-200/70 bg-indigo-50/70 dark:border-indigo-400/20 dark:bg-slate-800/70 {{ $imageAspectClass }}">
                                    <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['name'] ?? ('Item ' . ($item['number'] ?? ($index + 1))) }}"
                                            loading="lazy"
                                            class="h-full w-full object-contain"
                                    />

                                    @if(!empty($item['sound']))
                                        <div class="absolute right-3 top-3 z-10">
                                            <button
                                                    type="button"
                                                    class="speak-btn cursor-pointer bg-transparent p-0 focus-visible:outline-none"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $item['sound'] }}"
                                            >
                                                <span class="js-speak-shell inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/60 bg-slate-950/25 text-white shadow-[0_14px_28px_-18px_rgba(15,23,42,0.7)] backdrop-blur-md transition duration-150 hover:scale-105 hover:bg-slate-950/35">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="mt-2.5 flex w-full min-w-0 flex-wrap items-center gap-1.5 text-[0.9rem] font-bold leading-[1.34] text-slate-900 [overflow-wrap:anywhere] dark:text-slate-50 sm:text-[0.96rem]">
                                @php $inputCounter = 0; @endphp

                                @foreach($parts as $part)
                                    @if(array_key_exists('text', $part))
                                        <span class="min-w-0 max-w-full flex-none whitespace-pre-wrap tracking-[0.01em] [overflow-wrap:anywhere]">{{ $part['text'] }}</span>
                                    @endif

                                    @if(array_key_exists('answer', $part))
                                        @php
                                            $fieldId = 'missing-word-' . $index . '-' . $inputCounter;
                                            $answerValue = (string) $part['answer'];
                                            $maxLength = max(1, mb_strlen((string) $part['answer']));
                                            $inputSize = min(56, max(6, $maxLength + 4));
                                            $placeholder = (string) ($part['placeholder'] ?? $part['hint'] ?? $item['placeholder'] ?? $item['hint'] ?? '');
                                        @endphp

                                        <input
                                                id="{{ $fieldId }}"
                                                type="text"
                                                class="js-word-input h-[30px] min-w-[4ch] max-w-full rounded-xl border border-slate-300 bg-white/95 px-1.5 py-1 text-center text-[0.74rem] font-bold leading-none text-slate-900 outline-none transition duration-150 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-indigo-400 sm:h-8 sm:text-[0.8rem]"
                                                size="{{ $inputSize }}"
                                                maxlength="{{ $maxLength }}"
                                                placeholder="{{ $placeholder }}"
                                                data-key="{{ $index }}-{{ $inputCounter }}"
                                                data-group="{{ $index }}"
                                                data-answer="{{ $answerValue }}"
                                                autocomplete="off"
                                                autocapitalize="none"
                                                spellcheck="false"
                                        />

                                        @php $inputCounter++; @endphp
                                    @endif
                                @endforeach

                                <span class="js-word-result min-w-[22px] text-lg font-black leading-none" aria-live="polite"></span>
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
            const inputs = Array.from(document.querySelectorAll('.js-word-input'));
            const cards = Array.from(document.querySelectorAll('.word-card'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');
            const progressCountEl = document.getElementById('tilesCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };
            const vocabAudio = new Audio();
            vocabAudio.preload = 'auto';
            vocabAudio.crossOrigin = 'anonymous';
            let currentAudioBtn = null;
            let currentAudioCard = null;
            let currentAudioSrc = '';

            Object.values(audio).forEach((sound) => {
                sound.preload = 'auto';
                sound.volume = 1;
            });

            const play = (sound) => {
                if (!sound) return;
                try {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.play().catch(() => {});
                } catch (e) {}
            };

            const inputBaseClasses = [
                'border-slate-300', 'bg-white/95', 'text-slate-900',
                'dark:border-slate-700', 'dark:bg-slate-950', 'dark:text-slate-50'
            ];
            const inputCorrectClasses = [
                'border-emerald-500', 'bg-emerald-50', 'text-emerald-800',
                'dark:border-emerald-400', 'dark:bg-emerald-950/40', 'dark:text-emerald-200'
            ];
            const inputWrongClasses = [
                'border-rose-500', 'bg-rose-50', 'text-rose-800', 
                'dark:border-rose-400', 'dark:bg-rose-950/40', 'dark:text-rose-200'
            ];
            const resultStateClasses = ['text-emerald-600', 'text-rose-600', 'dark:text-emerald-300', 'dark:text-rose-300'];

            const setInputState = (input, state = 'base') => {
                input.classList.remove(...inputBaseClasses, ...inputCorrectClasses, ...inputWrongClasses);
                input.classList.add(...(state === 'correct' ? inputCorrectClasses : state === 'wrong' ? inputWrongClasses : inputBaseClasses));
            };

            const setResultState = (result, state = 'base') => {
                if (!result) return;
                result.classList.remove(...resultStateClasses);

                if (state === 'correct') {
                    result.classList.add('text-emerald-600', 'dark:text-emerald-300');
                } else if (state === 'wrong') {
                    result.classList.add('text-rose-600', 'dark:text-rose-300');
                }
            };

            const setAudioBtnState = (btn, isPlaying) => {
                const shell = btn?.querySelector('.js-speak-shell');
                if (!shell) return;
                shell.classList.toggle('scale-105', isPlaying);
                shell.classList.toggle('bg-indigo-600/70', isPlaying);
                shell.classList.toggle('shadow-indigo-900/30', isPlaying);
            };

            const setAudioCardState = (card, isPlaying) => {
                if (!card) return;
                card.classList.toggle('ring-2', isPlaying);
                card.classList.toggle('ring-indigo-500/30', isPlaying);
                card.classList.toggle('dark:ring-indigo-400/20', isPlaying);
            };

            const resetCurrentAudio = () => {
                if (currentAudioBtn) setAudioBtnState(currentAudioBtn, false);
                if (currentAudioCard) setAudioCardState(currentAudioCard, false);
                currentAudioBtn = null;
                currentAudioCard = null;
                currentAudioSrc = '';
            };

            const stopVocabAudio = () => {
                try {
                    vocabAudio.pause();
                    vocabAudio.currentTime = 0;
                    vocabAudio.removeAttribute('src');
                    vocabAudio.load();
                } catch (e) {}

                resetCurrentAudio();
            };

            const playOrToggleVocabAudio = (btn) => {
                const src = btn.getAttribute('data-audio') || '';
                const card = btn.closest('.word-card');
                if (!src) return;

                if (currentAudioSrc === src && !vocabAudio.paused) {
                    stopVocabAudio();
                    return;
                }

                stopVocabAudio();
                window.stopAudioPlayer?.();

                currentAudioBtn = btn;
                currentAudioCard = card;
                currentAudioSrc = src;

                setAudioBtnState(currentAudioBtn, true);
                setAudioCardState(currentAudioCard, true);

                try {
                    vocabAudio.src = src;
                    vocabAudio.currentTime = 0;
                    const playPromise = vocabAudio.play();
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(() => stopVocabAudio());
                    }
                } catch (e) {
                    stopVocabAudio();
                }
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

            const saveAll = () => {
                const payload = {};
                inputs.forEach((input) => {
                    payload[input.dataset.key] = input.value || '';
                });
                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            const normalizeValue = (value) => {
                return String(value || '')
                    .replace(/[\u2018\u2019]/g, "'")
                    .replace(/[\u201c\u201d]/g, '"')
                    .replace(/\s+/g, ' ')
                    .trim()
                    .toUpperCase();
            };

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

            const clearCardFeedback = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                const result = card.querySelector('.js-word-result');

                cardInputs.forEach((input) => {
                    setInputState(input);
                });

                if (result) {
                    result.textContent = '';
                    setResultState(result);
                }
            };

            const isCardCorrect = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                if (!cardInputs.length) return false;

                return cardInputs.every((input) => {
                    const userValue = normalizeValue(input.value);
                    const correctValue = normalizeValue(input.dataset.answer);
                    return userValue !== '' && userValue === correctValue;
                });
            };

            const getCorrectTotal = () => {
                return cards.filter((card) => isCardCorrect(card)).length;
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const totalCards = cards.length;

                if (progressCountEl) progressCountEl.textContent = `${correctTotal}/${totalCards}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) {
                    btnRevealAnswers.classList.toggle('hidden', revealed);
                }
                if (btnRetakeTest) {
                    btnRetakeTest.classList.toggle('hidden', !revealed);
                }
            };

            inputs.forEach((input) => {
                const key = input.dataset.key;
                const answer = input.dataset.answer || '';

                if (typeof savedData[key] === 'string') {
                    input.value = savedData[key].slice(0, answer.length);
                }

                input.addEventListener('input', () => {
                    input.value = input.value.slice(0, answer.length);

                    const card = input.closest('.word-card');
                    if (card) clearCardFeedback(card);

                    saveAll();
                    updateStatusUI();
                });

                input.addEventListener('blur', () => {
                    input.value = input.value.slice(0, answer.length);
                    saveAll();
                });
            });

            document.querySelectorAll('.speak-btn').forEach((btn) => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggleVocabAudio(btn);
                });
            });

            vocabAudio.addEventListener('ended', stopVocabAudio);
            vocabAudio.addEventListener('error', stopVocabAudio);

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopVocabAudio();
            });

            window.addEventListener('beforeunload', stopVocabAudio);
            window.addEventListener('pagehide', stopVocabAudio);

            checkBtn?.addEventListener('click', () => {
                let hasWrong = false;
                let hasCorrect = false;
                let allCorrect = true;

                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');
                    let cardCorrect = true;

                    cardInputs.forEach((input) => {
                        const userValue = normalizeValue(input.value);
                        const correctValue = normalizeValue(input.dataset.answer);

                        if (userValue !== '' && userValue === correctValue) {
                            setInputState(input, 'correct');
                        } else {
                            setInputState(input, 'wrong');
                            cardCorrect = false;
                        }
                    });

                    if (result) {
                        setResultState(result);

                        if (cardCorrect) {
                            result.textContent = '\u2713';
                            setResultState(result, 'correct');
                            hasCorrect = true;
                        } else {
                            result.textContent = '\u00d7';
                            setResultState(result, 'wrong');
                            hasWrong = true;
                            allCorrect = false;
                        }
                    }
                });

                if (hasWrong) {
                    wrongTries += 1;
                    play(audio.wrong);
                } else if (hasCorrect) {
                    play(audio.correct);
                }

                if (allCorrect && cards.length > 0) {
                    play(audio.success);
                    clearInterval(timerInt);
                }

                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');

                    cardInputs.forEach((input) => {
                        const correctValue = input.dataset.answer || '';
                        input.value = correctValue;
                        setInputState(input, 'correct');
                    });

                    if (result) {
                        result.textContent = '\u2713';
                        setResultState(result, 'correct');
                    }
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                play(audio.success);
                clearInterval(timerInt);
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            updateActionButtons({ revealed: false });
            updateStatusUI();
            startTimer();

            window.resetSlide = () => {
                stopVocabAudio();
                window.stopAudioPlayer?.();

                inputs.forEach((input) => {
                    input.value = '';
                });

                cards.forEach((card) => clearCardFeedback(card));

                wrongTries = 0;
                startTime = Date.now();
                localStorage.removeItem(storageKey);
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            };

            window.stopSlideAudio = () => {
                clearInterval(timerInt);
                stopVocabAudio();
                window.stopAudioPlayer?.();
                Object.values(audio).forEach((sound) => {
                    try {
                        sound.pause();
                        sound.currentTime = 0;
                    } catch (e) {}
                });
            };
        });
    </script>
@endsection
