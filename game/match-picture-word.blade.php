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
@endphp

@extends('slider.simple-layout')

@section('title', $title)

@section('style')
    <style>
        @keyframes matchShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-7px); }
            75% { transform: translateX(7px); }
        }

        @keyframes matchPopIn {
            0% { transform: scale(.94); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        #matchShell,
        #matchShell * {
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        .match-page-bg {
            min-height: 100dvh;
            background:
                    radial-gradient(110% 110% at 0% 0%, rgba(99, 102, 241, .13), transparent 48%),
                    radial-gradient(110% 110% at 100% 0%, rgba(59, 130, 246, .11), transparent 48%),
                    radial-gradient(90% 90% at 50% 100%, rgba(249, 115, 22, .10), transparent 52%),
                    #f8fafc;
        }

        .dark .match-page-bg {
            background:
                    radial-gradient(110% 110% at 0% 0%, rgba(99, 102, 241, .18), transparent 48%),
                    radial-gradient(110% 110% at 100% 0%, rgba(59, 130, 246, .16), transparent 48%),
                    radial-gradient(90% 90% at 50% 100%, rgba(249, 115, 22, .12), transparent 52%),
                    #020617;
        }

        .match-shell {
            position: relative;
            overflow: hidden;
            border-radius: 1.75rem;
            border: 1px solid rgba(226, 232, 240, .86);
            background: rgba(255, 255, 255, .78);
            box-shadow: 0 22px 60px rgba(15, 23, 42, .09);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .dark .match-shell {
            border-color: rgba(71, 85, 105, .68);
            background: rgba(2, 6, 23, .46);
            box-shadow: 0 22px 60px rgba(0, 0, 0, .24);
        }

        .match-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .82;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99, 102, 241, .16), transparent 52%),
                    radial-gradient(120% 120% at 100% 0%, rgba(59, 130, 246, .12), transparent 52%),
                    linear-gradient(180deg, rgba(255, 255, 255, .42), transparent 48%);
        }

        .dark .match-shell::before {
            opacity: .65;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(99, 102, 241, .18), transparent 52%),
                    radial-gradient(120% 120% at 100% 0%, rgba(59, 130, 246, .14), transparent 52%);
        }

        .match-helper-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            border-radius: 999px;
            border: 1px solid rgba(226, 232, 240, .88);
            background: rgba(255, 255, 255, .78);
            padding: .45rem .8rem;
            font-size: .72rem;
            font-weight: 900;
            color: rgb(71, 85, 105);
            box-shadow: 0 10px 24px rgba(15, 23, 42, .06);
        }

        .dark .match-helper-pill {
            border-color: rgba(71, 85, 105, .72);
            background: rgba(15, 23, 42, .62);
            color: rgb(226, 232, 240);
        }

        .match-card {
            position: relative;
            width: 100%;
            aspect-ratio: 3 / 2;
            min-height: 0;
            border-radius: 1.1rem;
            border: 1px solid rgba(226, 232, 240, .92);
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 14px 28px rgba(15, 23, 42, .08);
            transition:
                    transform .18s ease,
                    box-shadow .18s ease,
                    border-color .18s ease,
                    background-color .18s ease,
                    opacity .18s ease;
        }

        .dark .match-card {
            border-color: rgba(71, 85, 105, .74);
            background: rgba(15, 23, 42, .72);
            box-shadow: 0 14px 28px rgba(0, 0, 0, .22);
        }

        .match-card:hover {
            transform: translateY(-3px);
            border-color: rgba(249, 115, 22, .72);
            box-shadow: 0 18px 34px rgba(15, 23, 42, .12);
        }

        .match-card:active {
            transform: scale(.98);
        }

        .image-card {
            overflow: hidden;
        }

        .image-card img {
            transition: transform .28s ease;
        }

        .image-card:hover img {
            transform: scale(1.04);
        }

        .word-card {
            overflow: hidden;
        }

        .word-card::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: .78;
            pointer-events: none;
            background:
                    radial-gradient(90% 90% at 0% 0%, rgba(99, 102, 241, .14), transparent 52%),
                    radial-gradient(90% 90% at 100% 0%, rgba(59, 130, 246, .10), transparent 52%);
        }

        .word-card span {
            position: relative;
            z-index: 1;
        }

        .match-card.is-active {
            border-color: rgb(249 115 22) !important;
            box-shadow:
                    0 0 0 4px rgba(255, 237, 213, .95),
                    0 18px 38px rgba(234, 88, 12, .18) !important;
            transform: translateY(-4px) scale(1.035) !important;
        }

        .dark .match-card.is-active {
            box-shadow:
                    0 0 0 4px rgba(249, 115, 22, .18),
                    0 18px 38px rgba(0, 0, 0, .30) !important;
        }

        .match-card.is-correct {
            border-color: rgba(34, 197, 94, .88) !important;
            box-shadow:
                    0 0 0 4px rgba(187, 247, 208, .72),
                    0 18px 38px rgba(22, 163, 74, .16) !important;
            animation: matchPopIn .26s cubic-bezier(.175, .885, .32, 1.275);
        }

        .dark .match-card.is-correct {
            box-shadow:
                    0 0 0 4px rgba(34, 197, 94, .18),
                    0 18px 38px rgba(0, 0, 0, .28) !important;
        }

        .match-card.is-wrong {
            border-color: rgb(244 63 94) !important;
            box-shadow:
                    0 0 0 4px rgba(254, 205, 211, .78),
                    0 18px 38px rgba(244, 63, 94, .15) !important;
        }

        .dark .match-card.is-wrong {
            box-shadow:
                    0 0 0 4px rgba(244, 63, 94, .18),
                    0 18px 38px rgba(0, 0, 0, .28) !important;
        }

        .match-card.is-matched {
            opacity: .72;
        }

        .match-card.is-matched.is-correct {
            pointer-events: none;
        }

        .animate-shake {
            animation: matchShake .36s ease-in-out;
        }

        .match-reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .75rem;
            padding: .55rem 1rem;
            font-size: .78rem;
            font-weight: 900;
            color: rgb(15, 23, 42);
            border: 1px solid rgb(226 232 240);
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }

        .match-reset-btn:hover {
            transform: scale(1.04);
            background: rgb(248 250 252);
        }

        .match-reset-btn:active {
            transform: scale(.98);
        }

        .dark .match-reset-btn {
            color: #fff;
            border-color: rgb(51 65 85);
            background: rgb(30 41 59);
        }

        .dark .match-reset-btn:hover {
            background: rgb(51 65 85);
        }

        .status-text {
            min-height: 1.35rem;
            font-size: .86rem;
            font-weight: 900;
            text-align: center;
            color: rgb(71, 85, 105);
        }

        .dark .status-text {
            color: rgb(203, 213, 225);
        }

        @media (max-width: 640px) {
            .match-page-bg {
                padding: .75rem !important;
            }

            .match-shell {
                border-radius: 1.25rem;
            }

            .match-card {
                aspect-ratio: 3 / 2;
                border-radius: .9rem;
            }

            .match-helper-pill {
                width: 100%;
                font-size: .68rem;
            }
        }

        @media (min-width: 1024px) and (max-height: 820px) {
            .match-page-bg {
                padding-top: 1.1rem !important;
                padding-bottom: 1.1rem !important;
            }

            .match-shell {
                border-radius: 1.5rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .match-card,
            .image-card img,
            .match-reset-btn {
                transition: none;
            }

            .animate-shake {
                animation: none;
            }
        }
    </style>
@endsection

@section('content')
    <main class="match-page-bg flex min-h-[100dvh] w-full flex-col justify-center px-3 py-5 sm:px-8 sm:py-8">
        <div class="mx-auto w-full max-w-[1500px]">
            @include('slider.components.title-subtitle', [
                'title' => $title,
                'subtitle' => $subtitle,
            ])

            @include('slider.components.game-status')

            <section id="matchShell" class="match-shell mx-auto mt-4 w-full max-w-[1400px] p-3 sm:mt-5 sm:p-5 lg:p-6">
                <div class="relative z-10">
                    <div class="mb-4 flex flex-col items-center justify-between gap-3 sm:flex-row">
                        <div class="match-helper-pill">
                            <span>🖼️</span>
                            <span>Choose a picture, then choose the matching word.</span>
                        </div>

                        <button id="resetBtn" type="button" class="match-reset-btn">
                            <span>↻</span>
                            <span>Reset</span>
                        </button>
                    </div>

                    <div class="h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                    <div class="cards-grid mt-4 grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-3 lg:grid-cols-4 xl:grid-cols-6 xl:gap-4">
                        @foreach($mixedItems as $item)
                            @if($item['type'] === 'image')
                                <button
                                        type="button"
                                        data-image-card
                                        data-card-id="{{ $item['id'] }}"
                                        class="match-card image-card cursor-pointer"
                                        aria-label="Picture card"
                                >
                                    <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['word'] }}"
                                            class="h-full w-full object-cover pointer-events-none"
                                            draggable="false"
                                    >
                                </button>
                            @else
                                <button
                                        type="button"
                                        data-word-card
                                        data-card-id="{{ $item['id'] }}"
                                        class="match-card word-card flex cursor-pointer items-center justify-center px-2 py-3"
                                >
                                    <span class="text-center text-sm font-black leading-tight tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                        {{ $item['word'] }}
                                    </span>
                                </button>
                            @endif
                        @endforeach
                    </div>

                    <p id="statusText" class="status-text mt-4"></p>
                </div>
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
                    if (window.parent && typeof window.parent.nextSlide === "function") {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
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
            statusText.className = 'status-text mt-4';

            if (state === 'success') {
                statusText.classList.add('text-emerald-600', 'dark:text-emerald-400');
            }

            if (state === 'error') {
                statusText.classList.add('text-rose-600', 'dark:text-rose-400');
            }

            if (state === 'info') {
                statusText.classList.add('text-indigo-600', 'dark:text-indigo-300');
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
                card.classList.remove('is-wrong', 'animate-shake');
            });

            wordCards.forEach((card) => {
                card.classList.remove('is-wrong', 'animate-shake');
            });
        }

        function render() {
            imageCards.forEach((card) => {
                const cardId = card.dataset.cardId;
                const isCorrectlyMatched = isImageCorrectlyMatched(cardId);
                const isSelected = game.selectedImage === cardId;

                card.classList.toggle('is-active', isSelected && !isCorrectlyMatched);
                card.classList.toggle('is-matched', isCorrectlyMatched);
                card.classList.toggle('is-correct', isCorrectlyMatched);
                card.disabled = isCorrectlyMatched;
            });

            wordCards.forEach((card) => {
                const cardId = card.dataset.cardId;
                const isCorrectlyMatched = isWordCorrectlyMatched(cardId);
                const isSelected = game.selectedWord === cardId;

                card.classList.toggle('is-active', isSelected && !isCorrectlyMatched);
                card.classList.toggle('is-matched', isCorrectlyMatched);
                card.classList.toggle('is-correct', isCorrectlyMatched);
                card.disabled = isCorrectlyMatched;
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

        function handleCorrectMatch(imageId, wordId, imageCard, wordCard) {
            playSfx('correct');

            game.matches[imageId] = wordId;

            imageCard?.classList.add('is-correct');
            wordCard?.classList.add('is-correct');

            game.selectedImage = null;
            game.selectedWord = null;

            setStatus(`Correct! ${Object.keys(game.matches).length}/${totalPairs}`, 'success');

            render();
            completeIfFinished();
        }

        function handleWrongMatch(imageCard, wordCard) {
            playSfx('wrong');

            game.mistakes++;

            imageCard?.classList.add('is-wrong', 'animate-shake');
            wordCard?.classList.add('is-wrong', 'animate-shake');

            setStatus('Incorrect match. Try again.', 'error');

            game.selectedImage = null;
            game.selectedWord = null;

            updateStats();

            setTimeout(() => {
                imageCard?.classList.remove('is-wrong', 'animate-shake');
                wordCard?.classList.remove('is-wrong', 'animate-shake');
                render();
            }, 460);
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
                    const wordCard = Array.from(wordCards).find((word) => word.dataset.cardId === game.selectedWord);
                    const isCorrect = game.selectedWord === cardId;

                    if (isCorrect) {
                        handleCorrectMatch(cardId, game.selectedWord, card, wordCard);
                    } else {
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
                    const imageCard = Array.from(imageCards).find((image) => image.dataset.cardId === game.selectedImage);
                    const isCorrect = cardId === game.selectedImage;

                    if (isCorrect) {
                        handleCorrectMatch(game.selectedImage, cardId, imageCard, card);
                    } else {
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
                card.classList.remove('is-active', 'is-matched', 'is-correct', 'is-wrong', 'animate-shake');
                card.disabled = false;
            });

            wordCards.forEach((card) => {
                card.classList.remove('is-active', 'is-matched', 'is-correct', 'is-wrong', 'animate-shake');
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