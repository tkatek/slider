<?php
$content = [
    'page_title' => 'Practice 1',
    'title' => 'Practice 1',
    'subtitle' => 'Read & match the picture with the correct phrase:',
];

$phrases = [
    ['id' => 'p1', 'text' => 'long blond hair and hazel eyes'],
    ['id' => 'p2', 'text' => 'short black hair and brown eyes'],
    ['id' => 'p3', 'text' => 'long black hair and brown eyes'],
    ['id' => 'p4', 'text' => 'long red hair and blue eyes'],
    ['id' => 'p5', 'text' => 'long brown hair and brown eyes'],
    ['id' => 'p6', 'text' => 'black hair and black eyes'],
    ['id' => 'p7', 'text' => 'long blonde hair and blue eyes'],
];

$images = [
    ['id' => 'img1',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/1.webp'),  'answer' => 'p2'],
    ['id' => 'img2',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/2.webp'),  'answer' => null],
    ['id' => 'img3',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/3.webp'),  'answer' => 'p1'],
    ['id' => 'img4',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/4.webp'),  'answer' => 'p4'],
    ['id' => 'img5',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/5.webp'),  'answer' => 'p5'],
    ['id' => 'img6',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/6.webp'),  'answer' => 'p3'],
    ['id' => 'img7',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/7.webp'),  'answer' => null],
    ['id' => 'img8',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/8.webp'),  'answer' => 'p6'],
    ['id' => 'img9',  'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/9.webp'),  'answer' => null],
    ['id' => 'img10', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide3/10.webp'), 'answer' => 'p7'],
];
?>


@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        @keyframes cardShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        :root {
            --match-pool-safe-space: 340px;
            --match-layout-bottom-safe-space: 0px;
        }

        body > div.isolate.relative {
            padding-bottom: var(--match-layout-bottom-safe-space);
        }

        .match-root {
            max-width: 1780px;
        }

        .hero-title {
            text-align: center;
            font-size: clamp(2.2rem, 4.8vw, 4rem);
            line-height: 1;
            letter-spacing: -0.03em;
            font-weight: 900;
            color: #4f46e5;
            margin: 0;
        }

        .hero-subtitle {
            text-align: center;
            margin-top: .6rem;
            font-size: clamp(.95rem, 1.35vw, 1.35rem);
            line-height: 1.42;
            font-weight: 900;
            color: #0f172a;
        }

        .dark .hero-title {
            color: #818cf8;
        }

        .dark .hero-subtitle {
            color: #e2e8f0;
        }

        .stats-wrap {
            margin: 1rem auto 1.05rem;
            width: 100%;
            max-width: 780px;
            overflow: hidden;
            border-radius: 1.35rem;
            border: 1px solid rgba(226,232,240,.9);
            background: rgba(255,255,255,.78);
            box-shadow: 0 12px 30px -24px rgba(2,6,23,.35);
            backdrop-filter: blur(8px);
        }

        .dark .stats-wrap {
            border-color: rgba(51,65,85,.95);
            background: rgba(15,23,42,.75);
            box-shadow: none;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .stat-item {
            padding: .62rem .45rem;
            text-align: center;
        }

        .stat-item + .stat-item {
            border-left: 1px solid rgba(226,232,240,.8);
        }

        .dark .stat-item + .stat-item {
            border-left-color: rgba(51,65,85,.85);
        }

        .stat-label {
            display: block;
            font-size: .73rem;
            font-weight: 900;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: .18rem;
        }

        .dark .stat-label {
            color: #cbd5e1;
        }

        .stat-value {
            font-size: 1.05rem;
            font-weight: 900;
            color: #0f172a;
            white-space: nowrap;
        }

        .dark .stat-value {
            color: #f8fafc;
        }

        .game-layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: .85rem;
        }

        .glass-card {
            border: 1px solid rgba(226,232,240,.88);
            border-radius: 1.7rem;
            background: linear-gradient(180deg, rgba(255,255,255,.92) 0%, rgba(248,250,252,.9) 100%);
            box-shadow: 0 14px 36px -28px rgba(2,6,23,.35);
        }

        .dark .glass-card {
            border-color: rgba(51,65,85,.92);
            background: linear-gradient(180deg, rgba(30,41,59,.95) 0%, rgba(15,23,42,.96) 100%);
            box-shadow: none;
        }

        .pool-card {
            padding: .8rem;
        }

        .pool-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .5rem;
            margin-bottom: .6rem;
        }

        .pool-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 52px;
            height: 34px;
            border-radius: 999px;
            border: 1px solid rgba(148,163,184,.35);
            background: rgba(255,255,255,.75);
            font-size: .9rem;
            font-weight: 900;
            color: #334155;
        }

        .dark .pool-count {
            border-color: rgba(148,163,184,.3);
            background: rgba(15,23,42,.75);
            color: #e2e8f0;
        }

        .pool-actions {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .pool-btn {
            border-radius: .7rem;
            border: 1px solid #fdba74;
            background: #ffedd5;
            color: #9a3412;
            font-size: .78rem;
            font-weight: 900;
            padding: .45rem .68rem;
            transition: .15s ease;
        }

        .pool-btn:hover {
            background: #fed7aa;
        }

        .pool-btn.reset {
            border-color: #cbd5e1;
            background: #ffffff;
            color: #334155;
        }

        .pool-btn.reset:hover {
            background: #f8fafc;
        }

        .dark .pool-btn {
            border-color: rgba(194,65,12,.45);
            background: rgba(154,52,18,.4);
            color: #fed7aa;
        }

        .dark .pool-btn:hover {
            background: rgba(154,52,18,.6);
        }

        .dark .pool-btn.reset {
            border-color: rgba(148,163,184,.45);
            background: rgba(15,23,42,.75);
            color: #cbd5e1;
        }

        .dark .pool-btn.reset:hover {
            background: rgba(30,41,59,.9);
        }

        .phrase-bank {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: .5rem;
        }

        .phrase-chip {
            border: 0;
            border-radius: 14px;
            padding: .64rem .62rem;
            text-align: center;
            font-size: .82rem;
            font-weight: 900;
            line-height: 1.2;
            color: #ffffff;
            background: var(--chip-bg, linear-gradient(135deg, #6366f1, #4f46e5));
            box-shadow: 0 8px 20px -16px rgba(2,6,23,.55);
            cursor: grab;
            user-select: none;
            transition: transform .14s ease, opacity .14s ease, box-shadow .14s ease;
        }

        .phrase-chip:active {
            cursor: grabbing;
        }

        .phrase-chip:hover {
            transform: translateY(-1px);
        }

        .phrase-chip.is-selected {
            box-shadow: 0 0 0 3px rgba(249,115,22,.28), 0 8px 20px -16px rgba(2,6,23,.55);
            transform: translateY(-1px);
        }

        .phrase-chip.is-used {
            opacity: .35;
            pointer-events: none;
            transform: none;
        }

        .phrase-chip.is-dragging {
            opacity: .72;
        }

        .phrase-chip:nth-child(1) { --chip-bg: linear-gradient(135deg, #6366f1, #4f46e5); }
        .phrase-chip:nth-child(2) { --chip-bg: linear-gradient(135deg, #10b981, #059669); }
        .phrase-chip:nth-child(3) { --chip-bg: linear-gradient(135deg, #0ea5e9, #0284c7); }
        .phrase-chip:nth-child(4) { --chip-bg: linear-gradient(135deg, #f59e0b, #d97706); }
        .phrase-chip:nth-child(5) { --chip-bg: linear-gradient(135deg, #8b5cf6, #6366f1); }
        .phrase-chip:nth-child(6) { --chip-bg: linear-gradient(135deg, #14b8a6, #10b981); }
        .phrase-chip:nth-child(7) { --chip-bg: linear-gradient(135deg, #06b6d4, #0ea5e9); }

        .images-card {
            padding: .62rem;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: .6rem;
        }

        .image-card {
            position: relative;
            border-radius: 1.1rem;
            overflow: hidden;
            border: 2px solid #c7d2fe;
            background: #ffffff;
            transition: border-color .14s ease, box-shadow .14s ease, transform .14s ease;
        }

        .image-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px -22px rgba(2,6,23,.8);
        }

        .image-card.is-over {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249,115,22,.22);
        }

        .image-card.is-correct {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34,197,94,.2);
        }

        .image-card.is-wrong {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239,68,68,.2);
            animation: cardShake .34s ease-in-out;
        }

        .dark .image-card {
            border-color: rgba(129,140,248,.45);
            background: rgba(15,23,42,.85);
        }

        .card-media {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #dbeafe;
        }

        .card-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .drop-zone {
            min-height: 46px;
            border-top: 2px dashed rgba(255,255,255,.45);
            background: rgba(15,23,42,.7);
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: .45rem .45rem;
            font-size: .72rem;
            font-weight: 900;
            line-height: 1.2;
            position: relative;
        }

        .drop-zone.has-value {
            border-top-style: solid;
            background: rgba(30,58,138,.82);
            color: #eff6ff;
        }

        .drop-remove {
            position: absolute;
            top: 4px;
            right: 5px;
            width: 20px;
            height: 20px;
            border-radius: 999px;
            border: 1px solid rgba(248,113,113,.95);
            background: rgba(15,23,42,.78);
            color: #fecaca;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .74rem;
            font-weight: 900;
            cursor: pointer;
        }

        .drop-remove:hover {
            background: rgba(127,29,29,.7);
            color: #fee2e2;
        }

        .status-chip {
            margin-top: .6rem;
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            border: 1px dashed #fdba74;
            background: #fff7ed;
            color: #9a3412;
            min-height: 34px;
            padding: .4rem .78rem;
            font-size: .78rem;
            font-weight: 900;
        }

        .status-chip:empty {
            display: none;
        }

        .dark .status-chip {
            border-color: #6366f1;
            background: rgba(30,41,59,.7);
            color: #dbeafe;
        }

        @media (min-width: 768px) {
            .phrase-bank {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .image-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .game-layout {
                grid-template-columns: 340px minmax(0, 1fr);
                gap: 1rem;
                align-items: start;
            }

            .pool-card {
                position: sticky;
                top: 1rem;
            }

            .phrase-bank {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .image-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        @media (min-width: 1360px) {
            .image-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }
        }

        @media (max-width: 1023px) {
            .match-main {
                padding-bottom: calc(var(--match-pool-safe-space) + 20px);
            }

            .game-layout {
                display: flex;
                flex-direction: column;
                gap: .72rem;
            }

            .images-card {
                order: 1;
            }

            .pool-card {
                order: 2;
                position: fixed;
                left: .6rem;
                right: .6rem;
                bottom: max(.55rem, env(safe-area-inset-bottom));
                z-index: 1200;
                margin: 0 auto;
                max-width: 1040px;
                border-radius: 1.35rem;
                box-shadow: 0 -16px 34px -24px rgba(2,6,23,.58), 0 14px 28px -22px rgba(2,6,23,.45);
            }

            .dark .pool-card {
                box-shadow: 0 -12px 30px -24px rgba(2,6,23,.72);
            }

            .pool-card::before {
                content: "";
                display: block;
                width: 56px;
                height: 6px;
                border-radius: 999px;
                margin: .1rem auto .55rem;
                background: rgba(15,23,42,.14);
            }

            .dark .pool-card::before {
                background: rgba(226,232,240,.2);
            }

            .pool-top {
                margin-bottom: .5rem;
            }

            .phrase-bank {
                max-height: 182px;
                overflow-y: auto;
                padding-right: .1rem;
            }
        }

        @media (max-width: 767px) {
            .match-root {
                max-width: 100%;
            }

            .hero-subtitle {
                margin-top: .45rem;
                font-size: .9rem;
            }

            .stats-wrap {
                margin-top: .8rem;
                border-radius: 1rem;
            }

            .stat-item {
                padding: .45rem .3rem;
            }

            .stat-label {
                font-size: .62rem;
            }

            .stat-value {
                font-size: .79rem;
            }

            .pool-card,
            .images-card {
                padding: .58rem;
            }

            .pool-card {
                left: .45rem;
                right: .45rem;
            }

            .phrase-bank {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: .42rem;
                max-height: 160px;
            }

            .phrase-chip {
                font-size: .74rem;
                padding: .58rem .45rem;
            }

            .image-grid {
                gap: .5rem;
            }

            .drop-zone {
                min-height: 42px;
                font-size: .67rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="match-main w-full min-h-[100dvh] px-3 sm:px-6 py-4 sm:py-6">
        <section class="match-root mx-auto">
            <header class="my-3 sm:my-5">
                @include('slider.components.title-subtitle')
            </header>

            <div class="stats-wrap">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-label">Progress</span>
                        <div id="progressCount" class="stat-value">🧩 0/0</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Correct</span>
                        <div id="correctCount" class="stat-value">✅ 0</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Mistakes</span>
                        <div id="mistakesCount" class="stat-value">❌ 0</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Time</span>
                        <div id="timer" class="stat-value">⏱️ 00:00</div>
                    </div>
                </div>
            </div>

            <div class="game-layout">
                <section class="glass-card pool-card">
                    <div class="pool-top">
                        <span id="poolCount" class="pool-count">0/0</span>
                        <div class="pool-actions">
                            <button id="revealBtn" type="button" class="pool-btn">Reveal answers</button>
                            <button id="resetBtn" type="button" class="pool-btn reset">Reset</button>
                        </div>
                    </div>

                    <div id="phraseBank" class="phrase-bank">
                        @foreach($phrases as $phrase)
                            <button
                                type="button"
                                class="phrase-chip js-phrase"
                                data-id="{{ $phrase['id'] }}"
                                draggable="true"
                            >
                                {{ $phrase['text'] }}
                            </button>
                        @endforeach
                    </div>
                </section>

                <section class="glass-card images-card">
                    <div id="imageGrid" class="image-grid">
                        @foreach($images as $index => $image)
                            <article
                                class="image-card js-image"
                                data-id="{{ $image['id'] }}"
                                data-answer="{{ $image['answer'] ?? '' }}"
                            >
                                <div class="card-media">
                                    <img src="{{ $image['src'] }}" alt="Picture {{ $index + 1 }}" loading="lazy" decoding="async">
                                </div>
                                <div class="drop-zone js-drop-zone" data-for="{{ $image['id'] }}">Drop phrase here</div>
                            </article>
                        @endforeach
                    </div>

                    <span id="statusChip" class="status-chip"></span>
                </section>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const phraseButtons = Array.from(document.querySelectorAll('.js-phrase'));
            const imageCards = Array.from(document.querySelectorAll('.js-image'));
            const imageGrid = document.getElementById('imageGrid');
            const revealBtn = document.getElementById('revealBtn');
            const resetBtn = document.getElementById('resetBtn');
            const statusChip = document.getElementById('statusChip');
            const poolCount = document.getElementById('poolCount');
            const progressCount = document.getElementById('progressCount');
            const correctCount = document.getElementById('correctCount');
            const mistakesCount = document.getElementById('mistakesCount');
            const timer = document.getElementById('timer');

            const audio = {
                select: new Audio('/slider/sounds/click.wav'),
                drop: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            function updatePoolSafeSpace() {
                const poolCard = document.querySelector('.pool-card');
                if (!poolCard) return;

                if ((window.innerWidth || 0) >= 1024) {
                    document.documentElement.style.setProperty('--match-pool-safe-space', '0px');
                    document.documentElement.style.setProperty('--match-layout-bottom-safe-space', '0px');
                    return;
                }

                const height = Math.ceil(poolCard.getBoundingClientRect().height);
                const offset = (window.innerWidth || 0) <= 640 ? 22 : 18;
                document.documentElement.style.setProperty('--match-pool-safe-space', `${height}px`);
                document.documentElement.style.setProperty('--match-layout-bottom-safe-space', `${height + offset}px`);
            }

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            const phraseText = {};
            phraseButtons.forEach((button) => {
                phraseText[button.dataset.id] = button.textContent.trim();
            });

            const assignments = {};
            imageCards.forEach((card) => {
                assignments[card.dataset.id] = null;
            });

            const requiredCount = imageCards.filter((card) => Boolean(card.dataset.answer)).length;
            const totalPhrases = phraseButtons.length;

            let selectedPhraseId = null;
            let draggingPhraseId = null;
            let mistakes = 0;
            let seconds = 0;
            let timerInt = null;
            let completed = false;

            function formatTime(totalSeconds) {
                const mins = Math.floor(totalSeconds / 60);
                const secs = totalSeconds % 60;
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            function startTimer() {
                if (timerInt) clearInterval(timerInt);
                timerInt = setInterval(() => {
                    seconds += 1;
                    updateStats();
                }, 1000);
            }

            function stopTimer() {
                if (timerInt) {
                    clearInterval(timerInt);
                    timerInt = null;
                }
            }

            function usedPhrases() {
                return new Set(Object.values(assignments).filter(Boolean));
            }

            function getCorrectCount() {
                return imageCards.reduce((count, card) => {
                    const expected = card.dataset.answer || '';
                    const actual = assignments[card.dataset.id] || '';
                    return expected && actual === expected ? count + 1 : count;
                }, 0);
            }

            function updateStats() {
                const correct = getCorrectCount();
                if (progressCount) progressCount.textContent = `🧩 ${correct}/${requiredCount}`;
                if (correctCount) correctCount.textContent = `✅ ${correct}`;
                if (mistakesCount) mistakesCount.textContent = `❌ ${mistakes}`;
                if (timer) timer.textContent = `⏱️ ${formatTime(seconds)}`;
                if (poolCount) {
                    const remaining = totalPhrases - usedPhrases().size;
                    poolCount.textContent = `${remaining}/${totalPhrases}`;
                }
            }

            function updatePhraseButtons() {
                const used = usedPhrases();

                phraseButtons.forEach((button) => {
                    const phraseId = button.dataset.id;
                    const isUsed = used.has(phraseId);
                    const isSelected = selectedPhraseId === phraseId;

                    button.classList.toggle('is-used', isUsed);
                    button.classList.toggle('is-selected', isSelected);
                    button.classList.toggle('is-dragging', draggingPhraseId === phraseId);
                    button.draggable = !isUsed;
                });
            }

            function renderSlots() {
                imageCards.forEach((card) => {
                    const imageId = card.dataset.id;
                    const slot = card.querySelector('.js-drop-zone');
                    const phraseId = assignments[imageId] || null;

                    if (!slot) return;

                    if (phraseId && phraseText[phraseId]) {
                        slot.classList.add('has-value');
                        slot.innerHTML = `<span>${phraseText[phraseId]}</span><button type="button" class="drop-remove js-drop-remove" data-image-id="${imageId}">×</button>`;
                    } else {
                        slot.classList.remove('has-value');
                        slot.textContent = 'Drop phrase here';
                    }
                });
            }

            function clearTransientClasses() {
                imageCards.forEach((card) => {
                    card.classList.remove('is-over', 'is-wrong');
                });
            }

            function markWrong(card) {
                if (!card) return;
                card.classList.add('is-wrong');
                setTimeout(() => card.classList.remove('is-wrong'), 380);
            }

            function maybeComplete() {
                if (completed) return;
                const correct = getCorrectCount();
                if (correct === requiredCount) {
                    completed = true;
                    stopTimer();
                    statusChip.textContent = 'Excellent! All matches are correct.';
                    play(audio.success);
                }
            }

            function assignPhraseToImage(imageId, phraseId, options = {}) {
                if (!imageId || !phraseId) return;

                const card = imageCards.find((item) => item.dataset.id === imageId);
                const expected = card?.dataset.answer || '';

                if (!options.force && (!expected || phraseId !== expected)) {
                    mistakes += 1;
                    updateStats();
                    play(audio.wrong);
                    markWrong(card);
                    statusChip.textContent = '';
                    return;
                }

                Object.keys(assignments).forEach((id) => {
                    if (assignments[id] === phraseId) assignments[id] = null;
                });

                assignments[imageId] = phraseId;
                selectedPhraseId = null;
                draggingPhraseId = null;
                card?.classList.add('is-correct');

                if (!options.silent) {
                    play(options.force ? audio.drop : audio.correct);
                    statusChip.textContent = '';
                }

                renderSlots();
                updatePhraseButtons();
                updateStats();
                if (!options.force) maybeComplete();
            }

            phraseButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    if (button.classList.contains('is-used')) return;
                    const phraseId = button.dataset.id;
                    selectedPhraseId = selectedPhraseId === phraseId ? null : phraseId;
                    play(audio.select);
                    clearTransientClasses();
                    updatePhraseButtons();
                });

                button.addEventListener('dragstart', (event) => {
                    if (button.classList.contains('is-used')) {
                        event.preventDefault();
                        return;
                    }
                    draggingPhraseId = button.dataset.id;
                    if (event.dataTransfer) {
                        event.dataTransfer.setData('text/plain', draggingPhraseId);
                        event.dataTransfer.effectAllowed = 'move';
                    }
                    updatePhraseButtons();
                });

                button.addEventListener('dragend', () => {
                    draggingPhraseId = null;
                    imageCards.forEach((card) => card.classList.remove('is-over'));
                    updatePhraseButtons();
                });
            });

            imageCards.forEach((card) => {
                const imageId = card.dataset.id;

                card.addEventListener('dragover', (event) => {
                    event.preventDefault();
                    card.classList.add('is-over');
                });

                card.addEventListener('dragleave', () => {
                    card.classList.remove('is-over');
                });

                card.addEventListener('drop', (event) => {
                    event.preventDefault();
                    card.classList.remove('is-over');
                    clearTransientClasses();

                    const transferId = event.dataTransfer?.getData('text/plain') || '';
                    const phraseId = transferId || draggingPhraseId;
                    assignPhraseToImage(imageId, phraseId);
                });

                card.addEventListener('click', () => {
                    clearTransientClasses();
                    if (selectedPhraseId) {
                        assignPhraseToImage(imageId, selectedPhraseId);
                        return;
                    }

                    const current = assignments[imageId];
                    if (current) {
                        assignments[imageId] = null;
                        play(audio.drop);
                        renderSlots();
                        updatePhraseButtons();
                        updateStats();
                    }
                });
            });

            imageGrid?.addEventListener('click', (event) => {
                const removeBtn = event.target.closest('.js-drop-remove');
                if (!removeBtn) return;

                event.stopPropagation();
                const imageId = removeBtn.getAttribute('data-image-id');
                if (!imageId) return;

                assignments[imageId] = null;
                play(audio.drop);
                renderSlots();
                updatePhraseButtons();
                updateStats();
            });

            revealBtn?.addEventListener('click', () => {
                imageCards.forEach((card) => {
                    const imageId = card.dataset.id;
                    const answer = card.dataset.answer || '';
                    if (answer) {
                        assignPhraseToImage(imageId, answer, { force: true, silent: true });
                    }
                });

                completed = true;
                stopTimer();
                statusChip.textContent = 'Answers revealed.';
                play(audio.success);
                updateStats();
            });

            resetBtn?.addEventListener('click', () => {
                Object.keys(assignments).forEach((id) => {
                    assignments[id] = null;
                });

                selectedPhraseId = null;
                draggingPhraseId = null;
                mistakes = 0;
                seconds = 0;
                completed = false;
                statusChip.textContent = '';

                imageCards.forEach((card) => {
                    card.classList.remove('is-correct', 'is-over', 'is-wrong');
                });

                play(audio.select);
                renderSlots();
                updatePhraseButtons();
                updateStats();
                startTimer();
            });

            renderSlots();
            updatePhraseButtons();
            updateStats();
            startTimer();
            updatePoolSafeSpace();
            window.addEventListener('resize', updatePoolSafeSpace, { passive: true });
        });
    </script>
@endsection
