@php
    $content = $content ?? [];

    $title = $content['title'] ?? 'Practice';
    $subtitle = $content['subtitle'] ?? 'Match the pictures with the words.';
    $questions = is_array($content['questions'] ?? null) ? $content['questions'] : [];

    $mixedItems = [];

    foreach ($questions as $question) {
        $id = (string) ($question['id'] ?? uniqid());
        $image = $question['image'] ?? '';
        $word = $question['word'] ?? '';

        $mixedItems[] = [
            'type'  => 'image',
            'id'    => $id,
            'image' => $image,
            'word'  => $word,
        ];

        $mixedItems[] = [
            'type' => 'word',
            'id'   => $id,
            'word' => $word,
        ];
    }

    $mixedItems = collect($mixedItems)->shuffle()->toArray();

    $cardBaseClass = 'group relative aspect-[3/2] w-full select-none overflow-hidden rounded-2xl border border-slate-200/90 bg-gradient-to-br from-white via-slate-50 to-slate-100 shadow-[0_14px_28px_rgba(15,23,42,0.08)] outline-none transition duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-[0_18px_34px_rgba(15,23,42,0.12)] active:scale-[0.98] disabled:cursor-not-allowed data-[matched=true]:pointer-events-none data-[matched=true]:opacity-70 data-[selected=true]:-translate-y-1 data-[selected=true]:scale-[1.03] data-[selected=true]:border-slate-700 data-[selected=true]:ring-4 data-[selected=true]:ring-slate-300/70 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-gradient-to-br data-[state=correct]:from-emerald-50 data-[state=correct]:to-white data-[state=correct]:ring-4 data-[state=correct]:ring-emerald-200/70 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-gradient-to-br data-[state=wrong]:from-red-50 data-[state=wrong]:to-white data-[state=wrong]:ring-4 data-[state=wrong]:ring-red-200/75 dark:border-slate-700/80 dark:from-slate-900 dark:via-slate-900 dark:to-slate-800 dark:shadow-[0_14px_28px_rgba(0,0,0,0.22)] dark:hover:border-slate-500 dark:data-[selected=true]:border-slate-200 dark:data-[selected=true]:ring-slate-600/60 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:from-emerald-950/45 dark:data-[state=correct]:to-slate-900 dark:data-[state=correct]:ring-emerald-500/20 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:from-red-950/45 dark:data-[state=wrong]:to-slate-900 dark:data-[state=wrong]:ring-red-500/20';
@endphp

@extends('slider.simple-layout')

@section('title', $title)

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center px-3 py-5 sm:px-8 sm:py-8">
        <div class="mx-auto w-full max-w-[1500px]">
            @include('slider.components.title-subtitle', [
                'title' => $title,
                'subtitle' => $subtitle,
            ])

            @include('slider.components.game-status')

            <section
                    id="matchShell"
                    class="mx-auto mt-4 w-full max-w-[1400px] select-none overflow-hidden rounded-[1.5rem] border border-slate-200/90 bg-gradient-to-br from-white/90 via-slate-50/90 to-slate-100/90 p-3 shadow-[0_22px_60px_rgba(15,23,42,0.09)] backdrop-blur dark:border-slate-700/80 dark:from-slate-950/80 dark:via-slate-900/80 dark:to-slate-800/80 dark:shadow-[0_22px_60px_rgba(0,0,0,0.24)] sm:mt-5 sm:p-5 lg:p-6"
            >
                <div class="mb-4 flex flex-col items-stretch justify-between gap-3 sm:flex-row sm:items-center">
                    <div class="inline-flex items-center justify-center gap-2 rounded-full border border-slate-200/90 bg-white/75 px-3 py-2 text-center text-[0.72rem] font-black text-slate-600 shadow-sm dark:border-slate-700/80 dark:bg-slate-900/70 dark:text-slate-200 sm:w-auto sm:px-4">
                        <span aria-hidden="true">🖼️</span>
                        <span>Choose a picture, then choose the matching word.</span>
                    </div>

                    <button
                            id="resetBtn"
                            type="button"
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-gradient-to-br from-white to-slate-100 px-4 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-md active:scale-[0.98] dark:border-slate-700 dark:from-slate-900 dark:to-slate-800 dark:text-slate-100 dark:hover:border-slate-500"
                    >
                        <span aria-hidden="true">↻</span>
                        <span>Reset</span>
                    </button>
                </div>

                <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-300 to-transparent dark:via-slate-700"></div>

                <div class="mt-4 grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 lg:grid-cols-4 xl:grid-cols-6 xl:gap-4">
                    @foreach($mixedItems as $item)
                        @if($item['type'] === 'image')
                            <button
                                    type="button"
                                    data-image-card
                                    data-card-id="{{ $item['id'] }}"
                                    class="{{ $cardBaseClass }} cursor-pointer"
                                    aria-label="Picture card"
                            >
                                <img
                                        src="{{ $item['image'] }}"
                                        alt="{{ $item['word'] }}"
                                        class="pointer-events-none h-full w-full object-cover transition duration-300 group-hover:scale-[1.04]"
                                        draggable="false"
                                >
                            </button>
                        @else
                            <button
                                    type="button"
                                    data-word-card
                                    data-card-id="{{ $item['id'] }}"
                                    class="{{ $cardBaseClass }} flex cursor-pointer items-center justify-center px-2 py-3"
                            >
                                <span class="relative z-10 text-center text-sm font-black leading-tight tracking-[-0.02em] text-slate-900 transition data-[state=correct]:text-emerald-800 data-[state=wrong]:text-red-800 dark:text-slate-100 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:text-red-100 sm:text-base lg:text-lg">
                                    {{ $item['word'] }}
                                </span>
                            </button>
                        @endif
                    @endforeach
                </div>

                <p id="statusText" class="mt-4 min-h-[1.35rem] text-center text-sm font-black text-slate-600 dark:text-slate-300"></p>
            </section>

            @include('slider.components.game-win-modal')
        </div>
    </main>
@endsection

@section('script')
    <script>
        const imageCards = document.querySelectorAll('[data-image-card]');
        const wordCards = document.querySelectorAll('[data-word-card]');
        const resetBtn = document.getElementById('resetBtn');
        const statusText = document.getElementById('statusText');
        const winModal = document.getElementById('winModal');
        const restartBtnModal = document.getElementById('restartBtnModal');
        const continueBtnModal = document.getElementById('continueBtnModal');
        const totalPairs = imageCards.length;

        const game = {
            selectedImage: null,
            selectedWord: null,
            matches: {},
            mistakes: 0,
            startTime: Date.now(),
            timerInt: null,
            completed: false
        };

        const sfx = {
            click: new Audio('/slider/sounds/click.wav'),
            correct: new Audio('/slider/sounds/correct.wav'),
            wrong: new Audio('/slider/sounds/wrong.wav'),
            success: new Audio('/slider/sounds/success.wav')
        };

        const playSfx = (key) => {
            const sound = sfx[key];

            if (!sound) return;

            sound.pause();
            sound.currentTime = 0;
            sound.play().catch(() => {});
        };

        function isEmbedded() {
            try {
                return window.top !== window.self;
            } catch (e) {
                return true;
            }
        }

        function goNextSlide() {
            if (isEmbedded()) {
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (e) {}
            }
        }

        function formatElapsedTime() {
            const elapsed = Math.floor((Date.now() - game.startTime) / 1000);
            const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
            const secs = String(elapsed % 60).padStart(2, '0');

            return `${mins}:${secs}`;
        }

        function startTimer() {
            clearInterval(game.timerInt);

            game.timerInt = setInterval(() => {
                const timerEl = document.getElementById('gameTimer');

                if (timerEl) {
                    timerEl.textContent = formatElapsedTime();
                }
            }, 1000);

            const timerEl = document.getElementById('gameTimer');

            if (timerEl) {
                timerEl.textContent = '00:00';
            }
        }

        function updateStats() {
            const matched = Object.keys(game.matches).length;

            const progressEl = document.getElementById('tilesCount');
            const correctEl = document.getElementById('correctCount');
            const mistakesEl = document.getElementById('mistakesCount');

            if (progressEl) progressEl.textContent = `${matched}/${totalPairs}`;
            if (correctEl) correctEl.textContent = matched;
            if (mistakesEl) mistakesEl.textContent = game.mistakes;
        }

        function setStatus(message = '', state = 'default') {
            statusText.textContent = message;
            statusText.className = 'mt-4 min-h-[1.35rem] text-center text-sm font-black text-slate-600 dark:text-slate-300';

            if (state === 'success') {
                statusText.classList.add('text-emerald-600', 'dark:text-emerald-400');
            }

            if (state === 'error') {
                statusText.classList.add('text-red-600', 'dark:text-red-400');
            }

            if (state === 'info') {
                statusText.classList.add('text-slate-800', 'dark:text-slate-100');
            }
        }

        function getMatchedImageForWord(wordId) {
            return Object.keys(game.matches).find((imageId) => game.matches[imageId] === wordId);
        }

        function isImageCorrectlyMatched(imageId) {
            return game.matches[imageId] === imageId;
        }

        function isWordCorrectlyMatched(wordId) {
            return getMatchedImageForWord(wordId) === wordId;
        }

        function clearTransientState() {
            imageCards.forEach((card) => {
                if (card.dataset.state === 'wrong') {
                    delete card.dataset.state;
                }
            });

            wordCards.forEach((card) => {
                if (card.dataset.state === 'wrong') {
                    delete card.dataset.state;
                }
            });
        }

        function updateCardState(card, isSelected, isMatched) {
            if (isSelected && !isMatched) {
                card.dataset.selected = 'true';
            } else {
                delete card.dataset.selected;
            }

            if (isMatched) {
                card.dataset.matched = 'true';
                card.dataset.state = 'correct';
                card.disabled = true;
                return;
            }

            delete card.dataset.matched;
            card.disabled = false;

            if (card.dataset.state !== 'wrong') {
                delete card.dataset.state;
            }
        }

        function render() {
            imageCards.forEach((card) => {
                const cardId = card.dataset.cardId;
                const isCorrectlyMatched = isImageCorrectlyMatched(cardId);
                const isSelected = game.selectedImage === cardId;

                updateCardState(card, isSelected, isCorrectlyMatched);
            });

            wordCards.forEach((card) => {
                const cardId = card.dataset.cardId;
                const isCorrectlyMatched = isWordCorrectlyMatched(cardId);
                const isSelected = game.selectedWord === cardId;

                updateCardState(card, isSelected, isCorrectlyMatched);
            });

            updateStats();
        }

        function showWinModal() {
            const finalCorrect = document.getElementById('finalCorrect');
            const finalTime = document.getElementById('finalTime');
            const finalMistakes = document.getElementById('finalMistakes');

            if (finalCorrect) finalCorrect.textContent = `${Object.keys(game.matches).length}/${totalPairs}`;
            if (finalTime) finalTime.textContent = formatElapsedTime();
            if (finalMistakes) finalMistakes.textContent = game.mistakes;

            if (winModal) {
                winModal.classList.remove('hidden');
            }
        }

        function completeIfFinished() {
            const matched = Object.keys(game.matches).length;

            if (matched !== totalPairs || game.completed) return;

            game.completed = true;
            clearInterval(game.timerInt);

            setTimeout(() => {
                playSfx('success');
                setStatus(`Perfect! ${matched}/${totalPairs} correct.`, 'success');
                showWinModal();
            }, 420);
        }

        function handleCorrectMatch(imageId, wordId) {
            playSfx('correct');

            game.matches[imageId] = wordId;
            game.selectedImage = null;
            game.selectedWord = null;

            setStatus(`Correct! ${Object.keys(game.matches).length}/${totalPairs}`, 'success');

            render();
            completeIfFinished();
        }

        function handleWrongMatch(imageCard, wordCard) {
            playSfx('wrong');

            game.mistakes++;

            imageCard.dataset.state = 'wrong';
            wordCard.dataset.state = 'wrong';

            game.selectedImage = null;
            game.selectedWord = null;

            setStatus('Incorrect match. Try again.', 'error');
            updateStats();

            setTimeout(() => {
                if (imageCard.dataset.state === 'wrong') delete imageCard.dataset.state;
                if (wordCard.dataset.state === 'wrong') delete wordCard.dataset.state;
                render();
            }, 520);
        }

        imageCards.forEach((card) => {
            card.addEventListener('click', () => {
                const cardId = card.dataset.cardId;

                if (isImageCorrectlyMatched(cardId) || game.completed) return;

                clearTransientState();
                playSfx('click');

                if (game.selectedImage === cardId) {
                    game.selectedImage = null;
                    setStatus('', 'default');
                    render();
                    return;
                }

                game.selectedImage = cardId;
                setStatus('Now choose the matching word.', 'info');

                if (game.selectedWord) {
                    const isCorrect = game.selectedWord === cardId;
                    const wordCard = Array.from(wordCards).find((word) => word.dataset.cardId === game.selectedWord);

                    if (isCorrect) {
                        handleCorrectMatch(cardId, game.selectedWord);
                    } else if (wordCard) {
                        handleWrongMatch(card, wordCard);
                    }

                    return;
                }

                render();
            });
        });

        wordCards.forEach((card) => {
            card.addEventListener('click', () => {
                const cardId = card.dataset.cardId;

                if (isWordCorrectlyMatched(cardId) || game.completed) return;

                clearTransientState();
                playSfx('click');

                if (game.selectedWord === cardId) {
                    game.selectedWord = null;
                    setStatus('', 'default');
                    render();
                    return;
                }

                game.selectedWord = cardId;
                setStatus('Now choose the matching picture.', 'info');

                if (game.selectedImage) {
                    const isCorrect = cardId === game.selectedImage;
                    const imageCard = Array.from(imageCards).find((image) => image.dataset.cardId === game.selectedImage);

                    if (isCorrect) {
                        handleCorrectMatch(game.selectedImage, cardId);
                    } else if (imageCard) {
                        handleWrongMatch(imageCard, card);
                    }

                    return;
                }

                render();
            });
        });

        function initGame() {
            game.matches = {};
            game.selectedImage = null;
            game.selectedWord = null;
            game.mistakes = 0;
            game.completed = false;
            game.startTime = Date.now();

            imageCards.forEach((card) => {
                delete card.dataset.selected;
                delete card.dataset.matched;
                delete card.dataset.state;
                card.disabled = false;
            });

            wordCards.forEach((card) => {
                delete card.dataset.selected;
                delete card.dataset.matched;
                delete card.dataset.state;
                card.disabled = false;
            });

            if (winModal) {
                winModal.classList.add('hidden');
            }

            setStatus('', 'default');

            startTimer();
            render();
        }

        resetBtn?.addEventListener('click', () => {
            playSfx('click');
            initGame();
        });

        restartBtnModal?.addEventListener('click', () => {
            playSfx('click');
            initGame();
        });

        continueBtnModal?.addEventListener('click', goNextSlide);

        window.stopSlideAudio = function () {
            Object.values(sfx).forEach((sound) => {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
            });
        };

        window.destroySlide = function () {
            window.stopSlideAudio?.();
            clearInterval(game.timerInt);
        };

        window.resetSlide = function () {
            window.stopSlideAudio?.();
            initGame();
        };

        document.addEventListener('visibilitychange', () => {
            if (document.hidden && typeof window.stopSlideAudio === 'function') {
                window.stopSlideAudio();
            }
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initGame);
        } else {
            initGame();
        }
    </script>
@endsection
