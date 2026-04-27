@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $questions = is_array($content['questions'] ?? null) ? $content['questions'] : [];
    $storageKey = 'type-correct-format-game-' . md5(request()->path());
    $stackedFullInput = !empty($content['stacked_full_input']);
@endphp

@section('style')
    <style>
        .verb-game-shell {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .verb-game-inner {
            min-height: 100dvh;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 12px 10px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .verb-game-main {
            width: 100%;
        }

        .verb-actions {
            width: 100%;
            max-width: 42rem;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .verb-btn-primary {
            appearance: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .45rem .65rem;
            font-size: .72rem;
            font-weight: 900;
            color: #fff;
            border: 1px solid rgba(255,255,255,.2);
            background: linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow: 0 10px 24px rgba(79,70,229,.10);
            transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease, background-color .2s ease;
        }

        .verb-btn-primary:hover {
            transform: scale(1.05);
        }

        .verb-btn-primary:active {
            transform: scale(.95);
        }

        #checkAnswersBtn {
            border-color: rgba(255,255,255,.12);
            background: linear-gradient(135deg, #57534e, #3f3f46, #0f172a);
            box-shadow: 0 12px 28px rgba(2,6,23,.24);
        }

        #checkAnswersBtn:hover {
            box-shadow: 0 14px 30px rgba(2,6,23,.28);
        }

        .verb-btn-reveal {
            color: rgb(154 52 18);
            border-color: rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
        }

        .verb-btn-reveal:hover {
            background: rgb(254 215 170);
            box-shadow: 0 10px 24px rgba(234,88,12,.14);
        }

        .dark .verb-btn-reveal {
            color: rgb(254 215 170);
            border-color: rgba(194,65,12,.45);
            background: rgba(154,52,18,.35);
        }

        .dark .verb-btn-reveal:hover {
            background: rgba(154,52,18,.5);
        }

        .verb-btn-secondary {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .45rem .65rem;
            font-size: .72rem;
            font-weight: 900;
            color: rgb(15 23 42);
            border: 1px solid rgb(226 232 240);
            background: #fff;
            box-shadow: 0 8px 22px rgba(2,6,23,.05);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        .verb-btn-secondary:hover {
            transform: scale(1.05);
            background: rgb(248 250 252);
        }

        .dark .verb-btn-secondary {
            color: rgb(241 245 249);
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.92);
            box-shadow: 0 8px 22px rgba(2,6,23,.18);
        }

        .dark .verb-btn-secondary:hover {
            background: rgba(30,41,59,.96);
        }

        .verb-grid {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 9px;
        }

        .verb-card {
            border-radius: 24px;
            border: 1px solid rgba(217,226,241,.9);
            background: linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(15,23,42,.12);
            padding: 10px;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .verb-card:hover {
            transform: translateY(-2px);
            border-color: rgba(99,102,241,.28);
            box-shadow: 0 18px 40px -28px rgba(37,99,235,.18);
        }

        .dark .verb-card {
            border-color: rgba(71,85,105,.8);
            background: linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(2,6,23,.35);
        }

        .verb-answer {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            font-size: .88rem;
            line-height: 1.4;
            font-weight: 900;
            color: #0f172a;
        }

        .dark .verb-answer {
            color: #f8fafc;
        }

        .verb-prefix,
        .verb-suffix {
            flex: 0 0 auto;
            letter-spacing: .01em;
        }

        .verb-hint {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 1.65rem;
            border-radius: 999px;
            border: 1px solid rgba(251,146,60,.28);
            background: rgba(255,237,213,.82);
            padding: .18rem .5rem;
            color: #9a3412;
            font-size: .7rem;
            font-weight: 900;
        }

        .dark .verb-hint {
            border-color: rgba(251,146,60,.28);
            background: rgba(154,52,18,.26);
            color: #fed7aa;
        }

        .verb-game-main.is-stacked-full-input .verb-grid {
            max-width: 980px;
            grid-template-columns: 1fr;
        }

        .verb-game-main.is-stacked-full-input .verb-card {
            padding: 14px;
        }

        .verb-game-main.is-stacked-full-input .verb-answer {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .verb-game-main.is-stacked-full-input .verb-hint {
            display: block;
            width: 100%;
            min-height: 0;
            border-radius: 16px;
            padding: .65rem .85rem;
            text-align: left;
            font-size: .95rem;
            line-height: 1.45;
            color: #0f172a;
            border-color: rgba(226,232,240,.9);
            background: rgba(248,250,252,.92);
        }

        .dark .verb-game-main.is-stacked-full-input .verb-hint {
            color: #f8fafc;
            border-color: rgba(71,85,105,.75);
            background: rgba(15,23,42,.72);
        }

        .verb-game-main.is-stacked-full-input .verb-input {
            box-sizing: border-box;
            width: 100%;
            max-width: none;
            min-width: 0;
            height: 42px;
            text-align: left;
            padding: 6px 12px;
            font-size: .95rem;
        }

        .verb-input {
            box-sizing: content-box;
            flex: 0 1 auto;
            width: min(var(--answer-text-width, 6ch), 7.5rem);
            min-width: 4.25rem;
            max-width: 7.5rem;
            height: 30px;
            border-radius: 10px;
            border: 1.5px solid #cbd5e1;
            background: rgba(255,255,255,.96);
            color: #0f172a;
            padding: 4px 6px;
            font-size: .78rem;
            line-height: 1;
            font-weight: 900;
            text-align: center;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .verb-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99,102,241,.12);
        }

        .verb-input[readonly] {
            cursor: default;
        }

        .dark .verb-input {
            border-color: #334155;
            background: rgba(15,23,42,.98);
            color: #f8fafc;
        }

        .verb-input.is-correct {
            border-color: #16a34a;
            background: rgba(220,252,231,.9);
            color: #166534;
        }

        .verb-input.is-wrong {
            border-color: #dc2626;
            background: rgba(254,226,226,.95);
            color: #991b1b;
        }

        .dark .verb-input.is-correct {
            background: rgba(20,83,45,.34);
            color: #bbf7d0;
        }

        .dark .verb-input.is-wrong {
            background: rgba(127,29,29,.34);
            color: #fecaca;
        }

        .verb-result {
            min-width: 22px;
            font-size: 1.1rem;
            font-weight: 900;
            line-height: 1;
        }

        .verb-result.is-correct {
            color: #16a34a;
        }

        .verb-result.is-wrong {
            color: #dc2626;
        }

        @media (min-width: 640px) {
            .verb-game-inner {
                padding: 24px 20px 32px;
            }

            .verb-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .verb-actions {
                margin-bottom: 16px;
                gap: 12px;
            }

            .verb-btn-primary,
            .verb-btn-secondary {
                padding: .55rem .85rem;
                font-size: .8rem;
            }

            .verb-card {
                padding: 16px;
            }

            .verb-answer {
                gap: 8px;
                font-size: 1.04rem;
            }

            .verb-hint {
                min-height: 2rem;
                padding: .25rem .7rem;
                font-size: .82rem;
            }

            .verb-input {
                width: min(var(--answer-text-width, 6ch), 9rem);
                min-width: 5.5rem;
                max-width: 9rem;
                height: 34px;
                border-radius: 12px;
                padding: 5px 8px;
                font-size: .9rem;
            }

            .verb-game-main.is-stacked-full-input .verb-card {
                padding: 16px;
            }

            .verb-game-main.is-stacked-full-input .verb-input {
                width: 100%;
                max-width: none;
                min-width: 0;
                height: 46px;
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="verb-game-shell">
        <div class="verb-game-inner">
            <main class="verb-game-main{{ $stackedFullInput ? ' is-stacked-full-input' : '' }}">
                @include('slider.components.title-subtitle')

                @include('slider.components.game-status')

                <div class="verb-actions">
                    <button type="button" class="verb-btn-primary verb-btn-reveal" id="btnRevealAnswers">Reveal answers</button>
                    <button type="button" class="verb-btn-secondary hidden" id="btnRetakeTest">Retake test</button>
                    <button type="button" class="verb-btn-primary" id="checkAnswersBtn">Check Answers</button>
                </div>

                <section class="verb-grid">
                    @foreach($questions as $index => $item)
                        @php
                            $primaryAnswer = (string) ($item['answers'][0] ?? '');
                            $defaultAnswer = (string) ($item['default_answer'] ?? '');
                            $isLocked = !empty($item['locked']);
                            $maxLength = max(1, mb_strlen($primaryAnswer));
                        @endphp

                        <article class="verb-card">
                            <div class="verb-answer">
                                @if($stackedFullInput && ($item['hint'] ?? '') !== '')
                                    <span class="verb-hint">{{ $item['hint'] }}</span>
                                @endif

                                @if(!$stackedFullInput || ($item['prefix'] ?? '') !== '')
                                    <span class="verb-prefix">{{ $item['prefix'] ?? '' }}</span>
                                @endif

                                <input
                                        type="text"
                                        class="verb-input js-verb-input{{ $isLocked && $defaultAnswer !== '' ? ' is-correct' : '' }}"
                                        style="--answer-length: {{ $maxLength }}; --answer-text-width: {{ max(5, $maxLength) }}ch"
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
                                    <span class="verb-suffix">{{ $item['suffix'] ?? '' }}</span>
                                @endif

                                @if(!$stackedFullInput)
                                    <span class="verb-hint">({{ $item['hint'] ?? '' }})</span>
                                @endif

                                <span class="verb-result js-verb-result" aria-live="polite">
                                    @if($isLocked && $defaultAnswer !== '')
                                        ✓
                                    @endif
                                </span>
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

            const isCardCorrect = (card) => {
                const input = card.querySelector('.js-verb-input');
                return input ? isInputCorrect(input) : false;
            };

            const getCorrectTotal = () => cards.filter((card) => isCardCorrect(card)).length;

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
                const result = card.querySelector('.js-verb-result');
                const defaultValue = input ? input.dataset.default || '' : '';
                const isLocked = input ? input.dataset.locked === '1' : false;

                if (input) {
                    input.classList.remove('is-correct', 'is-wrong');

                    if (isLocked && defaultValue !== '') {
                        input.classList.add('is-correct');
                    }
                }

                if (result) {
                    result.textContent = '';
                    result.classList.remove('is-correct', 'is-wrong');

                    if (isLocked && defaultValue !== '') {
                        result.textContent = '\u2713';
                        result.classList.add('is-correct');
                    }
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

                if (typeof savedData[key] === 'string') {
                    input.value = savedData[key];
                } else if (defaultValue !== '') {
                    input.value = defaultValue;
                }

                if (isLocked) {
                    input.readOnly = true;
                    input.classList.add('is-correct');
                }

                input.addEventListener('input', () => {
                    if (input.dataset.locked === '1') return;

                    const card = input.closest('.verb-card');
                    if (card) clearCardFeedback(card);

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
                    const result = card.querySelector('.js-verb-result');
                    const correct = input ? isInputCorrect(input) : false;

                    if (input) {
                        input.classList.remove('is-correct', 'is-wrong');
                        input.classList.add(correct ? 'is-correct' : 'is-wrong');
                    }

                    if (result) {
                        result.classList.remove('is-correct', 'is-wrong');
                        result.textContent = correct ? '\u2713' : '\u2715';
                        result.classList.add(correct ? 'is-correct' : 'is-wrong');
                    }

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
                    const result = card.querySelector('.js-verb-result');
                    const acceptedAnswers = input ? getAcceptedAnswers(input) : [];

                    if (input) {
                        input.value = acceptedAnswers[0] || '';
                        input.classList.remove('is-wrong');
                        input.classList.add('is-correct');
                    }

                    if (result) {
                        result.textContent = '\u2713';
                        result.classList.remove('is-wrong');
                        result.classList.add('is-correct');
                    }
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

                    input.value = defaultValue;
                    input.classList.remove('is-correct', 'is-wrong');

                    if (isLocked && defaultValue !== '') {
                        input.classList.add('is-correct');
                    }
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
            };
        });
    </script>
@endsection