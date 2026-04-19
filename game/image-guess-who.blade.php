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

    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-2'));
    $showAllItems = !empty($content['show_all_items']);
    $choicesPerQuestion = (int) ($content['choices_per_question'] ?? 4);
    if ($showAllItems) {
        $choicesPerQuestion = max(2, count($items));
    }
    $choicesPerQuestion = max(2, min($choicesPerQuestion, max(2, count($items))));
    $questionPrompt = trim((string) ($content['question_prompt'] ?? 'What activity is this?'));
    $successTitle = trim((string) ($content['success_title'] ?? 'Excellent!'));
    $modalActions = [
        [
            'label' => 'Restart',
            'id' => 'restartBtnModal',
            'class' => 'inline-flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-white px-8 py-3 text-sm font-black text-slate-900 shadow-[0_8px_22px_rgba(2,6,23,0.05)] transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700',
        ],
        [
            'label' => 'Continue',
            'id' => 'continueBtnModal',
            'class' => 'inline-flex w-full items-center justify-center rounded-2xl border border-white/20 bg-gradient-to-r from-indigo-600 via-sky-600 to-cyan-500 px-8 py-3 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,0.15)] transition hover:brightness-105',
        ],
    ];
@endphp

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        (function () {
            var ITEMS = @json($items);
            var CHOICES_PER_QUESTION = @json($choicesPerQuestion);
            var QUESTION_PROMPT = @json($questionPrompt);
            var SUCCESS_TITLE = @json($successTitle);
            var ANSWER_CARD_CLASS = [
                'group',
                'relative',
                'w-full',
                'min-h-20',
                'sm:min-h-[92px]',
                'overflow-hidden',
                'rounded-3xl',
                'border-2',
                'border-slate-200/90',
                'bg-white/95',
                'shadow-[0_10px_24px_rgba(15,23,42,0.06)]',
                'transition',
                'duration-200',
                'ease-out',
                'hover:-translate-y-0.5',
                'hover:shadow-[0_14px_28px_rgba(15,23,42,0.09)]',
                'dark:border-slate-700/80',
                'dark:bg-slate-900/90',
                'dark:shadow-[0_12px_24px_rgba(0,0,0,0.22)]',
                'motion-reduce:transition-none',
                'motion-reduce:hover:transform-none'
            ].join(' ');
            var FEEDBACK_MARK_CLASS = [
                'pointer-events-none',
                'absolute',
                'inset-0',
                'flex',
                'items-center',
                'justify-center',
                'text-5xl',
                'font-black',
                'opacity-0',
                'transition-opacity',
                'duration-200',
                'motion-reduce:transition-none'
            ].join(' ');

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

            var state = {
                busy: false,
                correctCount: 0,
                mistakeCount: 0,
                startTime: Date.now(),
                remainingItems: []
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
                } catch (error) {}
            }

            function onReady(callback) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', callback, { once: true });
                    return;
                }

                callback();
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
                var index;
                var swapIndex;
                var temp;

                for (index = copy.length - 1; index > 0; index--) {
                    swapIndex = Math.floor(Math.random() * (index + 1));
                    temp = copy[index];
                    copy[index] = copy[swapIndex];
                    copy[swapIndex] = temp;
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
                    correctKey: item.key || '',
                    options: shuffle(options)
                };
            }

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
                button.className = ANSWER_CARD_CLASS;
                button.setAttribute('data-key', option.key || '');

                button.innerHTML = [
                    '<span class="flex min-h-20 items-center justify-center px-3 py-3 text-center text-[0.88rem] font-black leading-[1.35] tracking-[-0.01em] text-slate-900 sm:min-h-[92px] sm:px-4 sm:text-[0.95rem] dark:text-slate-50">',
                    escapeHtml(option.text),
                    '</span>',
                    '<span data-feedback="correct" class="', FEEDBACK_MARK_CLASS, ' bg-emerald-500/15 text-emerald-500">&#9989;</span>',
                    '<span data-feedback="wrong" class="', FEEDBACK_MARK_CLASS, ' bg-rose-500/15 text-rose-500">&#10060;</span>'
                ].join('');

                button.addEventListener('click', function () {
                    handleChoice(button, option, question);
                });

                return button;
            }

            function renderQuestion() {
                var grid = document.getElementById('cardGrid');
                var questionText = document.getElementById('questionText');
                var questionImage = document.getElementById('questionImage');
                var questionCaption = document.getElementById('questionCaption');
                var question;

                if (!grid) return;

                question = buildQuestion(state.remainingItems);

                if (!question) {
                    if (ITEMS.length) {
                        endGame();
                        return;
                    }

                    if (questionText) questionText.textContent = 'No items available.';
                    if (questionImage) questionImage.removeAttribute('src');
                    if (questionCaption) {
                        questionCaption.textContent = '';
                        questionCaption.classList.add('hidden');
                    }
                    grid.innerHTML = '';
                    return;
                }

                setQuestion(question);
                grid.innerHTML = '';

                question.options.forEach(function (option) {
                    grid.appendChild(createAnswerCard(option, question));
                });
            }

            function handleChoice(element, option, question) {
                var correctMark = element.querySelector('[data-feedback="correct"]');
                var wrongMark = element.querySelector('[data-feedback="wrong"]');

                if (state.busy) return;

                if ((option.key || '') === (question.correctKey || '')) {
                    state.busy = true;
                    state.correctCount += 1;
                    playSfx('correct');
                    element.classList.add('border-emerald-500', 'bg-emerald-500/10', 'dark:bg-emerald-500/15');
                    if (correctMark) correctMark.classList.add('opacity-100');

                    setTimeout(function () {
                        state.remainingItems = state.remainingItems.filter(function (item) {
                            return (item.key || '') !== (question.correctKey || '');
                        });
                        state.busy = false;
                        renderQuestion();
                    }, 800);

                    return;
                }

                state.busy = true;
                state.mistakeCount += 1;
                playSfx('wrong');
                element.classList.add('border-rose-500', 'bg-rose-500/10', 'dark:bg-rose-500/15');
                if (wrongMark) wrongMark.classList.add('opacity-100');

                setTimeout(function () {
                    element.classList.remove('border-rose-500', 'bg-rose-500/10', 'dark:bg-rose-500/15');
                    if (wrongMark) wrongMark.classList.remove('opacity-100');
                    state.busy = false;
                }, 550);
            }

            function endGame() {
                var winModal = document.getElementById('winModal');
                var modalTitle = document.querySelector('.js-win-title');
                var finalCorrect = document.getElementById('finalCorrect');
                var finalTime = document.getElementById('finalTime');
                var finalMistakes = document.getElementById('finalMistakes');
                var elapsedSeconds = Math.max(0, Math.floor((Date.now() - state.startTime) / 1000));

                playSfx('success');

                if (modalTitle) modalTitle.textContent = SUCCESS_TITLE || 'Done!';
                if (finalCorrect) finalCorrect.textContent = state.correctCount + '/' + ITEMS.length;
                if (finalTime) finalTime.textContent = formatTime(elapsedSeconds);
                if (finalMistakes) finalMistakes.textContent = String(state.mistakeCount);
                if (winModal) winModal.classList.remove('hidden');

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
                if (winModal) winModal.classList.add('hidden');
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

            window.stopSlideAudio = function () {
                Object.keys(audio).forEach(function (key) {
                    try {
                        audio[key].pause();
                        audio[key].currentTime = 0;
                    } catch (error) {}
                });
            };

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
    <div class="min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto px-0 py-4 sm:py-6">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-5xl px-4 sm:px-8">
            <div class="mb-4 text-center">
                <h2 id="questionText" class="text-xl font-black leading-tight text-slate-700 dark:text-slate-100 sm:text-2xl md:text-3xl">
                    {{ $questionPrompt }}
                </h2>
            </div> 

            <img
                id="questionImage"
                src=""
                alt=""
                class="mx-auto aspect-square w-full max-w-[15rem] rounded-[1.5rem] object-cover sm:max-w-[17rem]"
            >

            <p id="questionCaption" class="mt-3 hidden text-center text-sm font-bold text-slate-500 dark:text-slate-300"></p>
        </section>

        <main class="mx-auto w-full max-w-5xl px-4 py-5 sm:px-8 sm:py-6">
            <div id="cardGrid" class="grid w-full {{ $gridClass }} gap-4 md:gap-5"></div> 
        </main>

        @include('slider.components.game-win-modal', [
            'modalTitle' => $successTitle,
            'modalTitleClass' => 'js-win-title text-3xl font-black text-slate-900 dark:text-white sm:text-4xl',
            'modalActions' => $modalActions,
        ])
    </div>
@endsection
