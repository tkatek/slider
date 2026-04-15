@extends('slider.simple-layout')
@section('title', $content['page_title'] ?? $content['title'] ?? 'Guess Game')

@php
    $type = trim((string) ($content['type'] ?? 'grid'));

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

    $rawQuestions = is_array($content['questions'] ?? null) ? $content['questions'] : [];
    $questions = [];

    foreach (array_values($rawQuestions) as $questionIndex => $question) {
        if (!is_array($question)) {
            continue;
        }

        $prompt = trim((string) ($question['prompt'] ?? ''));
        $questionImage = trim((string) ($question['image'] ?? ''));
        $correctRaw = trim((string) ($question['correct'] ?? ''));
        $rawOptions = is_array($question['options'] ?? null) ? $question['options'] : [];
        $options = [];

        foreach (array_values($rawOptions) as $optionIndex => $option) {
            if (!is_array($option)) {
                continue;
            }

            $text = trim((string) ($option['text'] ?? $option['label'] ?? $option['value'] ?? ''));
            $image = trim((string) ($option['image'] ?? ''));
            $caption = trim((string) ($option['caption'] ?? $option['label'] ?? ''));
            $key = trim((string) ($option['key'] ?? ('option-' . $questionIndex . '-' . $optionIndex)));

            if ($text === '' || $image === '') {
                continue;
            }

            $options[] = [
                'key' => $key !== '' ? $key : ('option-' . $questionIndex . '-' . $optionIndex),
                'text' => $text,
                'image' => $image,
                'caption' => $caption,
            ];
        }

        if ($prompt === '' || $correctRaw === '' || count($options) < 1) {
            continue;
        }

        $resolvedCorrectKey = '';
        $resolvedCorrectText = '';
        foreach ($options as $option) {
            if ($correctRaw === $option['key'] || mb_strtolower($correctRaw) === mb_strtolower($option['text'])) {
                $resolvedCorrectKey = $option['key'];
                $resolvedCorrectText = $option['text'];
                break;
            }
        }

        if ($resolvedCorrectKey === '') {
            continue;
        }

        $questions[] = [
            'prompt' => $prompt,
            'image' => $questionImage,
            'correct_key' => $resolvedCorrectKey,
            'correct_text' => $resolvedCorrectText,
            'options' => $options,
        ];
    }

    $resolvedType = in_array($type, ['grid', 'image'], true)
        ? $type
        : ($questions !== [] ? 'image' : 'grid');

    $gridClass = trim((string) ($content['grid_class'] ?? ($resolvedType === 'image' ? 'grid-cols-2 md:grid-cols-4' : 'grid-cols-2 md:grid-cols-5')));
    $successTitle = trim((string) ($content['success_title'] ?? 'Excellent!'));
    $successMessage = trim((string) ($content['success_message'] ?? ($resolvedType === 'image' ? 'You completed all questions.' : 'You completed the game.')));
@endphp

@section('style')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        .question-mask {
            height: 80px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100%;
        }

        .card-shake { border-color: #ef4444; }
        .correct-glow {
            border-color: #10b981;
            filter: brightness(1.08);
            opacity: 0.75;
        }

        .wrong-x {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            font-size: 4rem;
            font-weight: 900;
            opacity: 0;
            pointer-events: none;
            z-index: 10;
        }

        .show-x { opacity: 1; }

        .correct-check {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(16, 185, 129, 0.12);
            color: #10b981;
            font-size: 4rem;
            font-weight: 900;
            opacity: 0;
            pointer-events: none;
            z-index: 10;
        }

        .show-check { opacity: 1; }
    </style>
@endsection

@section('script')
    <script>
        (function () {
            const GAME_TYPE = @json($resolvedType);
            const ITEMS = @json($items);
            const QUESTIONS = @json($questions);
            const SUCCESS_TITLE = @json($successTitle);
            const SUCCESS_MESSAGE = @json($successMessage);

            const SFX = {
                src: {
                    correct: '/slider/sounds/correct.wav',
                    wrong: '/slider/sounds/wrong.wav',
                    success: '/slider/sounds/success.wav',
                },
                volume: {
                    correct: 1,
                    wrong: 1,
                    success: 1,
                }
            };

            const audio = {
                correct: new Audio(SFX.src.correct),
                wrong: new Audio(SFX.src.wrong),
                success: new Audio(SFX.src.success),
            };

            Object.entries(audio).forEach(([key, instance]) => {
                instance.preload = 'auto';
                instance.volume = SFX.volume[key] ?? 1;
            });

            function playSfx(name) {
                const instance = audio[name];
                if (!instance) return;
                try {
                    instance.pause();
                    instance.currentTime = 0;
                    instance.volume = SFX.volume[name] ?? 1;
                    instance.play().catch(() => {});
                } catch (e) {}
            }

            window.stopSlideAudio = function () {
                Object.values(audio).forEach((instance) => {
                    try {
                        instance.pause();
                        instance.currentTime = 0;
                    } catch (e) {}
                });
            };

            const state = {
                busy: false,
                currentIndex: 0,
                deck: [],
                questions: [],
            };

            function onReady(fn) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', fn, { once: true });
                } else {
                    fn();
                }
            }

            function normalizeText(value) {
                return String(value || '').trim();
            }

            function shuffle(items) {
                const copy = items.slice();
                for (let i = copy.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    const temp = copy[i];
                    copy[i] = copy[j];
                    copy[j] = temp;
                }
                return copy;
            }

            function getCardPrompt(item) {
                return normalizeText(item?.text);
            }

            function getCardCaption(item) {
                return normalizeText(item?.caption);
            }

            function setQuestionText(text) {
                const element = document.getElementById('questionText');
                if (!element) return;
                element.textContent = normalizeText(text);
                element.style.opacity = '1';
                element.style.transform = 'none';
            }

            function setQuestionImage(src, alt) {
                const wrap = document.getElementById('questionImageWrap');
                const img = document.getElementById('questionImage');
                if (!wrap || !img) return;

                if (src) {
                    img.src = src;
                    img.alt = alt || 'Question image';
                    wrap.classList.remove('hidden');
                } else {
                    img.removeAttribute('src');
                    img.alt = '';
                    wrap.classList.add('hidden');
                }
            }

            function createCard(item, onClick) {
                const card = document.createElement('div');
                card.className = [
                    'prof-card',
                    'group',
                    'relative',
                    'aspect-square',
                    'cursor-pointer',
                    'overflow-hidden',
                    'rounded-2xl',
                    'border-2',
                    'border-slate-200',
                    'bg-white',
                    'shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)]',
                    'transition-all',
                    'dark:border-slate-700',
                    'dark:bg-slate-800'
                ].join(' ');

                const caption = getCardCaption(item);
                const captionHtml = caption !== ''
                    ? `<div class="pointer-events-none absolute inset-x-2 bottom-2 z-[5] rounded-xl bg-white/90 px-3 py-2 text-center text-sm font-black text-slate-900 shadow-md dark:bg-slate-900/85 dark:text-slate-50">${caption}</div>`
                    : '';

                card.innerHTML = `
                    <img class="absolute inset-0 h-full w-full object-cover dark:brightness-90 dark:contrast-110" src="${item.image}" alt="${getCardPrompt(item)}">
                    ${captionHtml}
                    <div class="correct-check">✅</div>
                    <div class="wrong-x">❌</div>
                `;

                card.addEventListener('click', function () {
                    onClick(card, item);
                });

                return card;
            }

            function renderGridCards() {
                const grid = document.getElementById('cardGrid');
                if (!grid) return;

                grid.innerHTML = '';
                ITEMS.forEach((item) => {
                    const card = createCard(item, function (element, selectedItem) {
                        handleGridChoice(selectedItem, element);
                    });
                    card.dataset.key = item.key || '';
                    grid.appendChild(card);
                });
            }

            function showNextGridPrompt() {
                if (state.currentIndex >= state.deck.length) {
                    endGame();
                    return;
                }

                const currentItem = state.deck[state.currentIndex];
                setQuestionImage('', '');
                setQuestionText(getCardPrompt(currentItem));
            }

            function handleGridChoice(selectedItem, element) {
                if (state.busy) return;
                const currentItem = state.deck[state.currentIndex];
                const selectedKey = selectedItem.key || '';
                const expectedKey = currentItem.key || '';

                if (selectedKey === expectedKey) {
                    state.busy = true;
                    playSfx('correct');
                    element.classList.add('correct-glow');
                    const check = element.querySelector('.correct-check');
                    if (check) check.classList.add('show-check');

                    setTimeout(function () {
                        element.remove();
                        state.currentIndex += 1;
                        state.busy = false;
                        showNextGridPrompt();
                    }, 800);
                    return;
                }

                state.busy = true;
                playSfx('wrong');
                element.classList.add('card-shake');
                const wrong = element.querySelector('.wrong-x');
                if (wrong) wrong.classList.add('show-x');

                if (state.currentIndex < state.deck.length - 1) {
                    const nextRandomIndex = Math.floor(Math.random() * (state.deck.length - 1 - state.currentIndex)) + state.currentIndex + 1;
                    const temp = state.deck[state.currentIndex];
                    state.deck[state.currentIndex] = state.deck[nextRandomIndex];
                    state.deck[nextRandomIndex] = temp;
                }

                setTimeout(function () {
                    showNextGridPrompt();
                    setTimeout(function () {
                        element.classList.remove('card-shake');
                        if (wrong) wrong.classList.remove('show-x');
                        state.busy = false;
                    }, 400);
                }, 100);
            }

            function renderImageQuestion() {
                const grid = document.getElementById('cardGrid');
                if (!grid) return;

                if (state.currentIndex >= state.questions.length) {
                    endGame();
                    return;
                }

                const question = state.questions[state.currentIndex];
                setQuestionText(question.prompt || '');
                setQuestionImage(question.image || '', question.prompt || 'Question image');
                grid.innerHTML = '';

                question.options.forEach((option) => {
                    const card = createCard(option, function (element, selectedOption) {
                        handleImageChoice(question, selectedOption, element);
                    });
                    card.dataset.key = option.key || '';
                    grid.appendChild(card);
                });
            }

            function handleImageChoice(question, selectedOption, element) {
                if (state.busy) return;

                const selectedKey = selectedOption.key || '';
                const expectedKey = question.correct_key || '';

                if (selectedKey === expectedKey) {
                    state.busy = true;
                    playSfx('correct');
                    element.classList.add('correct-glow');
                    const check = element.querySelector('.correct-check');
                    if (check) check.classList.add('show-check');

                    setTimeout(function () {
                        state.currentIndex += 1;
                        state.busy = false;
                        renderImageQuestion();
                    }, 800);
                    return;
                }

                state.busy = true;
                playSfx('wrong');
                element.classList.add('card-shake');
                const wrong = element.querySelector('.wrong-x');
                if (wrong) wrong.classList.add('show-x');

                setTimeout(function () {
                    element.classList.remove('card-shake');
                    if (wrong) wrong.classList.remove('show-x');
                    state.busy = false;
                }, 500);
            }

            function endGame() {
                playSfx('success');
                const overlay = document.getElementById('victoryOverlay');
                const title = document.getElementById('victoryTitle');
                const message = document.getElementById('victoryMessage');

                if (title) title.textContent = SUCCESS_TITLE;
                if (message) message.textContent = SUCCESS_MESSAGE;

                if (overlay) {
                    overlay.style.opacity = '1';
                    overlay.style.pointerEvents = 'auto';
                }

                if (typeof confetti === 'function') {
                    confetti({ particleCount: 150, spread: 70, origin: { y: 0.6 } });
                }
            }

            function startGame() {
                const overlay = document.getElementById('victoryOverlay');
                const grid = document.getElementById('cardGrid');
                if (overlay) {
                    overlay.style.opacity = '0';
                    overlay.style.pointerEvents = 'none';
                }

                state.busy = false;
                state.currentIndex = 0;
                setQuestionImage('', '');

                if (GAME_TYPE === 'image') {
                    if (!QUESTIONS.length) {
                        setQuestionText('No questions available.');
                        if (grid) grid.innerHTML = '';
                        return;
                    }

                    state.questions = shuffle(QUESTIONS).map(function (question) {
                        return {
                            prompt: normalizeText(question.prompt),
                            image: question.image || '',
                            correct_key: question.correct_key || '',
                            correct_text: normalizeText(question.correct_text),
                            options: shuffle((question.options || []).map(function (option) {
                                return {
                                    key: option.key || '',
                                    text: normalizeText(option.text),
                                    image: option.image || '',
                                    caption: normalizeText(option.caption),
                                };
                            })),
                        };
                    });
                    renderImageQuestion();
                    return;
                }

                if (!ITEMS.length) {
                    setQuestionText('No items available.');
                    if (grid) grid.innerHTML = '';
                    return;
                }

                state.deck = shuffle(ITEMS).map(function (item) {
                    return {
                        key: item.key || '',
                        text: normalizeText(item.text),
                        image: item.image || '',
                        caption: normalizeText(item.caption),
                    };
                });
                renderGridCards();
                showNextGridPrompt();
            }

            onReady(startGame);
            window.startGame = startGame;
        })();
    </script>
@endsection

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto flex flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="relative mx-auto w-full max-w-5xl px-4 sm:px-8 text-center">
            <div class="rounded-[2rem] border border-slate-200/80 bg-white/60 px-4 py-5 backdrop-blur dark:border-slate-700 dark:bg-slate-800/60 sm:px-6 sm:py-6 md:px-8">
                <div id="questionImageWrap" class="hidden mb-4 flex justify-center">
                    <img id="questionImage" src="" alt="" class="max-h-48 w-full max-w-md rounded-2xl object-cover object-center">
                </div>
                <div class="question-mask">
                    <h2 id="questionText" class="text-center text-2xl font-extrabold leading-tight text-slate-700 dark:text-slate-100 md:text-4xl lg:text-4xl"></h2>
                </div>
            </div>
        </section>

        <main class="mx-auto flex w-full max-w-7xl items-center justify-center px-4 py-5 sm:px-8 sm:py-6 md:px-8">
            <div id="cardGrid" class="mx-auto grid w-full {{ $gridClass }} justify-center gap-6"></div>
        </main>

        <div id="victoryOverlay" class="fixed inset-0 z-50 flex items-center justify-center bg-white/95 opacity-0 pointer-events-none backdrop-blur-xl dark:bg-slate-900/95">
            <div class="max-w-lg p-8 text-center">
                <div class="mb-8 text-8xl">🎉</div>
                <h2 id="victoryTitle" class="mb-6 text-4xl font-black text-slate-800 dark:text-slate-100 sm:text-5xl">{{ $successTitle }}</h2>
                <p id="victoryMessage" class="mb-10 text-lg text-slate-500 dark:text-slate-300 sm:text-xl">{{ $successMessage }}</p>
                <button onclick="startGame()" class="rounded-2xl bg-blue-500 px-12 py-5 text-xl font-bold text-white shadow-lg">
                    Play Again
                </button>
            </div>
        </div>
    </div>
@endsection
