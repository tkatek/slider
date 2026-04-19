@extends('slider.simple-layout')
@section('title', $content['page_title'] ?? $content['title'] ?? 'Image to Text')

@php
    $rawItems = is_array($content['items'] ?? null) ? $content['items'] : [];
    $items = [];

    foreach (array_values($rawItems) as $index => $item) {
        if (!is_array($item)) {
            continue;
        }

        $text = trim((string) ($item['text'] ?? $item['prompt'] ?? $item['value'] ?? $item['label'] ?? ''));
        $image = trim((string) ($item['image'] ?? ''));
        $caption = trim((string) ($item['caption'] ?? $item['label'] ?? ''));
        $key = trim((string) ($item['key'] ?? ('item-' . $index)));

        if ($text === '' || $image === '') {
            continue;
        }

        $items[] = [
            'key' => $key !== '' ? $key : ('item-' . $index),
            'text' => $text,
            'image' => $image,
            'caption' => $caption,
        ];
    }

    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2'));
    $showAllItems = !empty($content['show_all_items']);
    $choicesPerQuestion = (int) ($content['choices_per_question'] ?? 4);
    if ($showAllItems) {
        $choicesPerQuestion = max(2, count($items));
    }
    $choicesPerQuestion = max(2, min($choicesPerQuestion, max(2, count($items))));
    $questionPrompt = trim((string) ($content['question_prompt'] ?? 'What activity is this?'));
    $successTitle = trim((string) ($content['success_title'] ?? 'Excellent!'));
    $successMessage = trim((string) ($content['success_message'] ?? 'You completed all questions.'));
@endphp

@section('style')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        .quiz-shell {
            width: 100%;
            min-height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 1rem 0 1.5rem;
        }

        .question-card {
            border: 1px solid rgba(226, 232, 240, 0.85);
            background: rgba(255, 255, 255, 0.64);
            backdrop-filter: blur(10px);
        }

        .dark .question-card {
            border-color: rgba(71, 85, 105, 0.55);
            background: rgba(15, 23, 42, 0.68);
        }

        .answer-card {
            position: relative;
            width: 100%;
            min-height: 108px;
            border-radius: 1.5rem;
            border: 2px solid rgba(226, 232, 240, 0.96);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .answer-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.09);
        }

        .dark .answer-card {
            border-color: rgba(71, 85, 105, 0.72);
            background: rgba(15, 23, 42, 0.9);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.22);
        }

        .answer-card.is-correct {
            border-color: #10b981;
            background: rgba(16, 185, 129, 0.08);
        }

        .dark .answer-card.is-correct {
            background: rgba(16, 185, 129, 0.12);
        }

        .answer-card.is-wrong {
            border-color: #ef4444;
            background: rgba(239, 68, 68, 0.06);
        }

        .dark .answer-card.is-wrong {
            background: rgba(239, 68, 68, 0.10);
        }

        .answer-label {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 108px;
            padding: 1rem 1rem;
            text-align: center;
            font-size: 1rem;
            line-height: 1.45;
            font-weight: 900;
            letter-spacing: -0.01em;
            color: #0f172a;
        }

        .dark .answer-label {
            color: #f8fafc;
        }

        .feedback-mark {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.2rem;
            font-weight: 900;
            opacity: 0;
            pointer-events: none;
            transition: opacity .18s ease;
        }

        .feedback-mark.show {
            opacity: 1;
        }

        .feedback-mark.correct {
            color: #10b981;
            background: rgba(16, 185, 129, 0.12);
        }

        .feedback-mark.wrong {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.10);
        }

        @media (max-width: 639px) {
            .answer-card,
            .answer-label {
                min-height: 96px;
            }

            .answer-label {
                font-size: .95rem;
                padding: .9rem .85rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .answer-card,
            .feedback-mark {
                transition: none !important;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        (function () {
            var ITEMS = @json($items);
            var CHOICES_PER_QUESTION = @json($choicesPerQuestion);
            var QUESTION_PROMPT = @json($questionPrompt);
            var SUCCESS_TITLE = @json($successTitle);
            var SUCCESS_MESSAGE = @json($successMessage);

            var SFX = {
                src: {
                    correct: '/slider/sounds/correct.wav',
                    wrong: '/slider/sounds/wrong.wav',
                    success: '/slider/sounds/success.wav'
                },
                volume: {
                    correct: 1,
                    wrong: 1,
                    success: 1
                }
            };

            var audio = {
                correct: new Audio(SFX.src.correct),
                wrong: new Audio(SFX.src.wrong),
                success: new Audio(SFX.src.success)
            };

            Object.keys(audio).forEach(function (key) {
                audio[key].preload = 'auto';
                audio[key].volume = SFX.volume[key] || 1;
            });

            function playSfx(name) {
                var instance = audio[name];
                if (!instance) return;

                try {
                    instance.pause();
                    instance.currentTime = 0;
                    instance.volume = SFX.volume[name] || 1;
                    instance.play().catch(function () {});
                } catch (e) {}
            }

            window.stopSlideAudio = function () {
                Object.keys(audio).forEach(function (key) {
                    try {
                        audio[key].pause();
                        audio[key].currentTime = 0;
                    } catch (e) {}
                });
            };

            function onReady(fn) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', fn, { once: true });
                } else {
                    fn();
                }
            }

            function normalizeText(value) {
                return String(value || '').replace(/\s+/g, ' ').trim();
            }

            function escapeHtml(value) {
                return String(value || '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function shuffle(items) {
                var copy = items.slice();
                var i, j, temp;

                for (i = copy.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    temp = copy[i];
                    copy[i] = copy[j];
                    copy[j] = temp;
                }

                return copy;
            }

            function formatTime(totalSeconds) {
                var minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
                var seconds = String(totalSeconds % 60).padStart(2, '0');
                return minutes + ':' + seconds;
            }

            function isEmbedded() {
                try {
                    return window.top !== window.self;
                } catch (error) {
                    return true;
                }
            }

            function goNextSlide() {
                if (!isEmbedded()) return;

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (error) {}
            }

            function buildItemPool() {
                return shuffle(ITEMS).map(function (item) {
                    return {
                        key: item.key || '',
                        text: normalizeText(item.text),
                        image: item.image || '',
                        caption: normalizeText(item.caption)
                    };
                });
            }

            function buildQuestion(remainingItems) {
                var item;
                var optionCount;
                var distractors;
                var options;

                if (!remainingItems.length) {
                    return null;
                }

                item = remainingItems[0];
                optionCount = Math.max(1, Math.min(CHOICES_PER_QUESTION, remainingItems.length));

                distractors = shuffle(
                    remainingItems.filter(function (candidate) {
                        return candidate.key !== item.key;
                    })
                ).slice(0, Math.max(0, optionCount - 1));

                options = distractors.map(function (candidate) {
                    return {
                        key: candidate.key || '',
                        text: normalizeText(candidate.text)
                    };
                });

                options.push({
                    key: item.key || '',
                    text: normalizeText(item.text)
                });

                return {
                    image: item.image || '',
                    caption: normalizeText(item.caption),
                    prompt: QUESTION_PROMPT,
                    correct_key: item.key || '',
                    options: shuffle(options)
                };
            }

            var state = {
                busy: false,
                correctCount: 0,
                mistakeCount: 0,
                startTime: Date.now(),
                remainingItems: []
            };

            function setQuestion(question) {
                var questionText = document.getElementById('questionText');
                var questionImage = document.getElementById('questionImage');
                var questionCaption = document.getElementById('questionCaption');

                if (questionText) {
                    questionText.textContent = normalizeText(question.prompt);
                }

                if (questionImage) {
                    questionImage.src = question.image || '';
                    questionImage.alt = question.caption || 'Question image';
                }

                if (questionCaption) {
                    questionCaption.textContent = question.caption || '';
                    questionCaption.classList.toggle('hidden', !question.caption);
                }
            }

            function createAnswerCard(option, question) {
                var button = document.createElement('button');
                button.type = 'button';
                button.className = 'answer-card';
                button.setAttribute('data-key', option.key || '');

                button.innerHTML =
                    '<span class="answer-label">' + escapeHtml(option.text) + '</span>' +
                    '<span class="feedback-mark correct">✅</span>' +
                    '<span class="feedback-mark wrong">❌</span>';

                button.addEventListener('click', function () {
                    handleChoice(button, option, question);
                });

                return button;
            }

            function renderQuestion() {
                var grid = document.getElementById('cardGrid');
                var question;

                if (!grid) return;

                question = buildQuestion(state.remainingItems);

                if (!question) {
                    endGame();
                    return;
                }

                setQuestion(question);
                grid.innerHTML = '';

                question.options.forEach(function (option) {
                    grid.appendChild(createAnswerCard(option, question));
                });
            }

            function handleChoice(element, option, question) {
                var correctMark = element.querySelector('.feedback-mark.correct');
                var wrongMark = element.querySelector('.feedback-mark.wrong');

                if (state.busy) return;

                if ((option.key || '') === (question.correct_key || '')) {
                    state.busy = true;
                    state.correctCount += 1;
                    playSfx('correct');
                    element.classList.add('is-correct');
                    if (correctMark) correctMark.classList.add('show');

                    setTimeout(function () {
                        state.remainingItems = state.remainingItems.filter(function (item) {
                            return (item.key || '') !== (question.correct_key || '');
                        });
                        state.busy = false;
                        renderQuestion();
                    }, 800);

                    return;
                }

                state.busy = true;
                state.mistakeCount += 1;
                playSfx('wrong');
                element.classList.add('is-wrong');
                if (wrongMark) wrongMark.classList.add('show');

                setTimeout(function () {
                    element.classList.remove('is-wrong');
                    if (wrongMark) wrongMark.classList.remove('show');
                    state.busy = false;
                }, 550);
            }

            function endGame() {
                var winModal = document.getElementById('winModal');
                var modalTitle = winModal ? winModal.querySelector('h2') : null;
                var finalCorrect = document.getElementById('finalCorrect');
                var finalTime = document.getElementById('finalTime');
                var finalMistakes = document.getElementById('finalMistakes');
                var elapsedSeconds = Math.max(0, Math.floor((Date.now() - state.startTime) / 1000));

                playSfx('success');

                if (modalTitle) modalTitle.textContent = SUCCESS_TITLE || 'Done!';
                if (finalCorrect) finalCorrect.textContent = state.correctCount + '/' + ITEMS.length;
                if (finalTime) finalTime.textContent = formatTime(elapsedSeconds);
                if (finalMistakes) finalMistakes.textContent = String(state.mistakeCount);

                if (winModal) {
                    winModal.classList.remove('hidden');
                }

                if (typeof confetti === 'function') {
                    confetti({
                        particleCount: 150,
                        spread: 70,
                        origin: { y: 0.6 }
                    });
                }
            }

            function hideWin() {
                var winModal = document.getElementById('winModal');

                if (winModal) {
                    winModal.classList.add('hidden');
                }
            }

            function startGame() {
                hideWin();

                state.busy = false;
                state.correctCount = 0;
                state.mistakeCount = 0;
                state.startTime = Date.now();
                state.remainingItems = buildItemPool();

                renderQuestion();
            }

            onReady(function () {
                var restartBtnModal = document.getElementById('restartBtnModal');
                var continueBtnModal = document.getElementById('continueBtnModal');

                if (restartBtnModal) restartBtnModal.addEventListener('click', startGame);
                if (continueBtnModal) continueBtnModal.addEventListener('click', goNextSlide);

                startGame();
            });

            window.startGame = startGame;
        })();
    </script>
@endsection

@section('content')
    <div class="quiz-shell">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-5xl px-4 sm:px-8">
            <div class="question-card rounded-[2rem] px-4 py-5 sm:px-6 sm:py-6 md:px-8">
                <div class="mb-4 text-center">
                    <h2 id="questionText" class="text-xl font-black leading-tight text-slate-700 dark:text-slate-100 sm:text-2xl md:text-3xl">
                        {{ $questionPrompt }}
                    </h2>
                </div>

                <div class="mx-auto flex max-w-xl justify-center">
                    <img
                            id="questionImage"
                            src=""
                            alt=""
                            class="w-full rounded-[1.5rem] border border-slate-200/80 object-cover shadow-lg dark:border-slate-700"
                    >
                </div>

                <p id="questionCaption" class="hidden mt-3 text-center text-sm font-bold text-slate-500 dark:text-slate-300"></p>
            </div>
        </section>

        <main class="mx-auto w-full max-w-5xl px-4 py-5 sm:px-8 sm:py-6">
            <div id="cardGrid" class="grid w-full {{ $gridClass }} gap-4 md:gap-5"></div>
        </main>

        <div id="victoryOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-white/95 opacity-0 pointer-events-none backdrop-blur-xl dark:bg-slate-900/95">
            <div class="max-w-lg px-6 py-8 text-center">
                <div class="mb-6 text-7xl sm:text-8xl">🎉</div> 
                <h2 id="victoryTitle" class="mb-4 text-3xl font-black text-slate-800 dark:text-slate-100 sm:text-5xl">
                    {{ $successTitle }}
                </h2>
                <p id="victoryMessage" class="mb-8 text-base font-bold text-slate-500 dark:text-slate-300 sm:text-xl">
                    {{ $successMessage }}
                </p>
                <button onclick="startGame()" class="rounded-2xl bg-blue-500 px-8 py-4 text-lg font-bold text-white shadow-lg sm:px-12 sm:text-xl">
                    Play Again
                </button>
            </div>
        </div>
        @include('slider.components.game-win-modal', ['modalTitle' => $successTitle])
    </div>
@endsection
