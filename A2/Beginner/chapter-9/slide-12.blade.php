<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'practice.5',
    'subtitle' => "Read the sentences &\nmatch with the right picture",
];

$images = [
    ['id' => 'img1', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Sam.webp'), 'alt' => 'Person 1'],
    ['id' => 'img2', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Brain.webp'), 'alt' => 'Person 2'],
    ['id' => 'img3', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Clara.webp'), 'alt' => 'Person 3'],
    ['id' => 'img4', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/David.webp'), 'alt' => 'Person 4'],
    ['id' => 'img5', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Karen.webp'), 'alt' => 'Person 5'],
    ['id' => 'img6', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Maria.webp'), 'alt' => 'Person 6'],
    ['id' => 'img7', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Ricardo.webp'), 'alt' => 'Person 7'],
    ['id' => 'img8', 'src' => materialAsset('slider/A2/Beginner/chapter-9/img/slide14/Ted.webp'), 'alt' => 'Person 8'],
];

$sentences = [
    ['id' => 's1', 'text' => 'is a young man with glasses. He has dark skin.', 'answer' => 'img2'],
    ['id' => 's2', 'text' => 'is a girl. She has long fair hair and brown eyes.', 'answer' => 'img5'],
    ['id' => 's3', 'text' => 'is a bald man. He is a middle-aged man with dirty beard.', 'answer' => 'img7'],
    ['id' => 's4', 'text' => 'is a teenager with short brown hair and brown eyes.', 'answer' => 'img3'],
    ['id' => 's5', 'text' => 'is an old man. He is tall and medium-weight.', 'answer' => 'img4'],
    ['id' => 's6', 'text' => 'is a young woman. She has dark skin and long straight black hair.', 'answer' => 'img6'],
    ['id' => 's7', 'text' => 'is a young man with long beard and moustache.', 'answer' => 'img8'],
    ['id' => 's8', 'text' => 'is a school boy with glasses. He has short fair hair and blue eyes.', 'answer' => 'img1'],
];
?>


@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        :root{
            --pool-safe-space: 230px;
            --layout-bottom-safe-space: 0px;
        }

        body > div.isolate.relative{
            padding-bottom: var(--layout-bottom-safe-space);
        }

        @keyframes rowShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .practice-shell {
            max-width: 1360px;
            padding-inline: clamp(.25rem, 1.1vw, .8rem);
        }

        .stats-wrap {
            margin: 0 auto 1rem;
            width: 100%;
            max-width: 19.5rem;
            overflow: hidden;
            border-radius: 1.5rem;
            border: 1px solid rgba(226,232,240,.75);
            background: rgba(255,255,255,.65);
            box-shadow: 0 8px 24px rgba(2,6,23,.08);
            backdrop-filter: blur(8px);
        }

        .dark .stats-wrap {
            border-color: rgba(51,65,85,.9);
            background: rgba(15,23,42,.7);
            box-shadow: none;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .stat-item {
            padding: .5rem .4rem;
            text-align: center;
        }

        .stat-item + .stat-item {
            border-left: 1px solid rgba(226,232,240,.75);
        }

        .dark .stat-item + .stat-item {
            border-left-color: rgba(51,65,85,.9);
        }

        .stat-label {
            display: block;
            font-size: .68rem;
            font-weight: 900;
            color: #64748b;
            line-height: 1.05;
            margin-bottom: .2rem;
        }

        .dark .stat-label {
            color: #cbd5e1;
        }

        .stat-value {
            font-size: .82rem;
            font-weight: 900;
            color: #0f172a;
            white-space: nowrap;
        }

        .dark .stat-value {
            color: #f8fafc;
        }

        @media (min-width: 640px) {
            .stats-wrap {
                max-width: 48rem;
            }

            .stat-item {
                padding: .68rem .55rem;
            }

            .stat-label {
                font-size: .74rem;
            }

            .stat-value {
                font-size: 1rem;
            }
        }

        .lesson-panel {
            border: 2px solid #0f172a;
            border-radius: 26px;
            background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 10px 10px 0 rgba(15, 23, 42, 0.10);
        }

        .dark .lesson-panel {
            border-color: #e2e8f0;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            box-shadow: none;
        }

        .bank-title,
        .rows-title {
            font-size: 1.02rem;
            font-weight: 900;
            color: #0f172a;
            margin-bottom: .65rem;
        }

        .dark .bank-title,
        .dark .rows-title {
            color: #f8fafc;
        }

        .bank-help {
            margin: 0 0 .65rem;
            font-size: .8rem;
            font-weight: 700;
            color: #64748b;
        }

        .dark .bank-help {
            color: #cbd5e1;
        }

        .image-bank {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: .5rem;
        }

        .drag-item {
            border: 2px solid #0f172a;
            border-radius: 14px;
            background: #ffffff;
            overflow: hidden;
            cursor: grab;
            transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
            user-select: none;
        }

        .drag-item:active {
            cursor: grabbing;
        }

        .drag-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px -20px rgba(15, 23, 42, .7);
        }

        .drag-item.is-dragging {
            opacity: .68;
            transform: scale(.98);
        }

        .drag-item.is-selected {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .22);
        }

        .drag-item.is-used {
            opacity: .5;
        }

        .dark .drag-item {
            border-color: #e2e8f0;
            background: rgba(15, 23, 42, .85);
        }

        .drag-thumb {
            width: 100%;
            aspect-ratio: 1 / 1;
            height: auto;
            object-fit: contain;
            background: #e2e8f0;
            border-bottom: 2px solid #0f172a;
            padding: .12rem;
        }

        .dark .drag-thumb {
            border-bottom-color: #e2e8f0;
            background: #334155;
        }

        .drag-caption {
            padding: .36rem .44rem;
            text-align: center;
            font-size: .75rem;
            font-weight: 900;
            color: #334155;
        }

        .dark .drag-caption {
            color: #cbd5e1;
        }

        .rows-wrap {
            display: grid;
            grid-template-columns: 1fr;
            gap: .56rem;
        }

        .drop-row {
            display: grid;
            grid-template-columns: 104px 1fr;
            gap: .7rem;
            align-items: center;
            border: 2px solid #fb923c;
            border-radius: 14px;
            /*background: linear-gradient(180deg, #fff7ed 0%, #ffedd5 100%);*/
            padding: .52rem;
            transition: border-color .12s ease, box-shadow .12s ease;
        }

        .drop-row.is-over {
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .2);
        }

        .drop-row.is-correct {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, .24);
        }

        .drop-row.is-wrong {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, .24);
        }

        .drop-row.is-shaking {
            animation: rowShake .34s ease-in-out;
        }

        .dark .drop-row {
            border-color: #e2e8f0;
            background: linear-gradient(180deg, rgba(30, 41, 59, .92) 0%, rgba(15, 23, 42, .96) 100%);
        }

        .drop-slot {
            min-height: 82px;
            border: 2px dashed #94a3b8;
            border-radius: 12px;
            background: rgba(255, 255, 255, .85);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: .3rem;
            font-size: .72rem;
            line-height: 1.2;
            font-weight: 800;
            color: #64748b;
            position: relative;
        }

        .drop-slot.has-image {
            border-style: solid;
            border-color: #64748b;
            background: #ffffff;
            color: #0f172a;
        }

        .drop-slot img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background: #f1f5f9;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }

        .drop-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 22px;
            height: 22px;
            border-radius: 999px;
            border: 1px solid #ef4444;
            background: rgba(255, 255, 255, .95);
            color: #dc2626;
            font-size: .8rem;
            font-weight: 900;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .drop-remove:hover {
            background: #fef2f2;
        }

        .dark .drop-slot {
            border-color: #64748b;
            background: rgba(15, 23, 42, .75);
            color: #cbd5e1;
        }

        .dark .drop-slot.has-image {
            border-color: #e2e8f0;
            background: rgba(15, 23, 42, .9);
            color: #f8fafc;
        }

        .dark .drop-slot img {
            border-color: #475569;
            background: #1e293b;
        }

        .row-right {
            min-width: 0;
        }

        .row-text {
            margin: 0;
            font-size: .88rem;
            line-height: 1.35;
            font-weight: 900;
            color: #1f2937;
        }

        .dark .row-text {
            color: #eff6ff;
        }

        .controls {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
            gap: .58rem;
            margin-bottom: .85rem;
        }

        .ctrl-btn {
            border: 2px solid #0f172a;
            border-radius: 12px;
            padding: .5rem .95rem;
            font-size: .8rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .05em;
            background: #f97316;
            color: #ffffff;
            transition: .15s ease;
        }

        .ctrl-btn:hover {
            transform: translateY(-1px);
            background: #ea580c;
        }

        .ctrl-btn.reset {
            background: #fdba74;
            color: #7c2d12;
        }

        .ctrl-btn.reset:hover {
            background: #fb923c;
        }

        .ctrl-btn.reveal {
            background: #ffedd5;
            border-color: #fdba74;
            color: #9a3412;
        }

        .ctrl-btn.reveal:hover {
            background: #fed7aa;
        }

        .dark .ctrl-btn {
            border-color: #e2e8f0;
            background: #f97316;
            color: #ffffff;
        }

        .dark .ctrl-btn.reset {
            background: #fb923c;
            color: #ffffff;
        }

        .dark .ctrl-btn.reveal {
            background: rgba(154, 52, 18, .4);
            border-color: rgba(194, 65, 12, .45);
            color: #fed7aa;
        }

        .dark .ctrl-btn.reveal:hover {
            background: rgba(154, 52, 18, .58);
        }

        .dark .ctrl-btn:hover,
        .dark .ctrl-btn.reset:hover {
            background: #ea580c;
        }

        .status-chip {
            border: 1px dashed #fdba74;
            border-radius: 999px;
            background: #fff7ed;
            color: #9a3412;
            padding: .42rem .75rem;
            min-height: 35px;
            display: inline-flex;
            align-items: center;
            font-size: .8rem;
            font-weight: 800;
        }
        .status-chip:empty {
            display: none;
        }

        .dark .status-chip {
            border-color: #60a5fa;
            background: rgba(30, 58, 138, .35);
            color: #dbeafe;
        }

        @media (max-width: 1024px) {
            .drag-thumb {
                aspect-ratio: 1 / 1;
                height: auto;
            }

            .drop-row {
                grid-template-columns: 112px 1fr;
            }
        }

        @media (min-width: 1200px) {
            .rows-wrap {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 1023px) {
            :root{
                --layout-bottom-safe-space: calc(var(--pool-safe-space) + 24px);
            }

            .practice-grid {
                display: block;
            }

            #rowsPanel {
                margin-bottom: .35rem;
            }

            #bankPanel {
                position: fixed;
                inset-inline: 0;
                bottom: 0;
                z-index: 1500;
                padding: .55rem .7rem max(.7rem, env(safe-area-inset-bottom));
            }

            #bankPanel > .lesson-panel {
                margin-inline: auto;
                width: min(100%, 980px);
                border-radius: 1.3rem 1.3rem 0 0;
                box-shadow: 0 -14px 36px rgba(2,6,23,.2);
            }

            #bankPanel .p-4,
            #bankPanel .sm\:p-5 {
                padding: .7rem !important;
            }

            #bankPanel .image-bank {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                gap: .5rem;
                padding-bottom: .2rem;
                scrollbar-width: thin;
            }

            #bankPanel .drag-item {
                flex: 0 0 102px;
                width: 102px;
                max-width: 102px;
            }

            #bankPanel .drag-thumb {
                width: 100%;
                height: 100px;
                aspect-ratio: 1/1;
            }
        }

        @media (min-width: 1024px) {
            #bankPanel {
                position: static;
                inset: auto;
                padding: 0;
            }

            #bankPanel > .lesson-panel {
                border-radius: 26px;
                box-shadow: 10px 10px 0 rgba(15, 23, 42, 0.10);
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .image-bank {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .drop-row {
                grid-template-columns: 1fr;
            }

            .drop-slot {
                min-height: 96px;
            }

            .controls {
                justify-content: center;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full min-h-[100dvh] px-5 sm:px-10 lg:px-14 py-4 sm:py-6">
        <section class="practice-shell mx-auto">
            <header class="mb-4 sm:mb-5">
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-5 practice-grid">
                <section id="bankPanel" class="lg:col-span-4">
                    <div class="lesson-panel p-4 sm:p-5">
                    <div class="image-bank" id="imageBank">
                        @foreach($images as $index => $image)
                            <article
                                class="drag-item js-drag-item"
                                data-image-id="{{ $image['id'] }}"
                                draggable="true"
                                aria-label="Image {{ $index + 1 }}"
                            >
                                <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="drag-thumb" loading="lazy" decoding="async">
                            </article>
                        @endforeach
                    </div>
                    </div>
                </section>

                <section id="rowsPanel" class="lesson-panel lg:col-span-8 p-4 sm:p-5">
                    <div class="controls">
                        <button id="revealBtn" type="button" class="ctrl-btn reveal">Reveal Answers</button>
                        <button id="resetBtn" type="button" class="ctrl-btn reset">Reset</button>
                    </div>
                    <span id="statusChip" class="status-chip"></span>

                    <h3 class="rows-title">Drop Zones</h3>
                    <div class="rows-wrap" id="rowsWrap">
                        @foreach($sentences as $index => $row)
                            <article class="drop-row js-drop-row" data-row-id="{{ $row['id'] }}" data-answer="{{ $row['answer'] }}">
                                <div class="drop-slot js-drop-slot" data-row-id="{{ $row['id'] }}">Drop image here</div>

                                <div class="row-right">
                                    <p class="row-text">{{ $row['text'] }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
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
            const imageCards = Array.from(document.querySelectorAll('.js-drag-item'));
            const rows = Array.from(document.querySelectorAll('.js-drop-row'));
            const rowSlots = Array.from(document.querySelectorAll('.js-drop-slot'));
            const rowsWrap = document.getElementById('rowsWrap');
            const revealBtn = document.getElementById('revealBtn');
            const resetBtn = document.getElementById('resetBtn');
            const statusChip = document.getElementById('statusChip');
            const progressCount = document.getElementById('progressCount');
            const correctCount = document.getElementById('correctCount');
            const mistakesCount = document.getElementById('mistakesCount');
            const timer = document.getElementById('timer');

            const audio = {
                click: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            const imageSrc = {};
            imageCards.forEach((card) => {
                const imageId = card.getAttribute('data-image-id');
                const img = card.querySelector('img');
                if (imageId && img) imageSrc[imageId] = img.getAttribute('src') || '';
            });

            const assignments = {};
            rows.forEach((row) => {
                const rowId = row.getAttribute('data-row-id');
                if (rowId) assignments[rowId] = null;
            });

            const totalRows = rows.length;
            let dragImageId = null;
            let selectedImageId = null;
            let mistakes = 0;
            let seconds = 0;
            let timerInt = null;
            let gameFinished = false;

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function formatTime(totalSeconds) {
                const mins = Math.floor(totalSeconds / 60);
                const secs = totalSeconds % 60;
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            function getCorrectCount() {
                return Object.values(assignments).filter(Boolean).length;
            }

            function updateStats() {
                const correct = getCorrectCount();
                if (progressCount) progressCount.textContent = `🧩 ${correct}/${totalRows}`;
                if (correctCount) correctCount.textContent = `✅ ${correct}`;
                if (mistakesCount) mistakesCount.textContent = `❌ ${mistakes}`;
                if (timer) timer.textContent = `⏱️ ${formatTime(seconds)}`;
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

            function getRowIdByImage(imageId) {
                return Object.keys(assignments).find((rowId) => assignments[rowId] === imageId) || null;
            }

            function pulseWrong(row) {
                if (!row) return;
                row.classList.add('is-wrong', 'is-shaking');
                setTimeout(() => {
                    row.classList.remove('is-shaking', 'is-wrong');
                }, 430);
            }

            function maybeFinish() {
                if (gameFinished) return;
                if (getCorrectCount() === totalRows) {
                    gameFinished = true;
                    stopTimer();
                    statusChip.textContent = 'Excellent! All answers are correct.';
                    play(audio.success);
                }
            }

            function render() {
                const usedIds = new Set(Object.values(assignments).filter(Boolean));

                imageCards.forEach((card) => {
                    const imageId = card.getAttribute('data-image-id');
                    const isUsed = usedIds.has(imageId);
                    const isSelected = selectedImageId === imageId;
                    card.classList.toggle('is-used', isUsed);
                    card.classList.toggle('is-selected', isSelected);
                    card.draggable = !isUsed;
                });

                rows.forEach((row) => {
                    const rowId = row.getAttribute('data-row-id');
                    const slot = row.querySelector('.js-drop-slot');
                    const imageId = assignments[rowId] || null;

                    if (!slot) return;

                    if (imageId && imageSrc[imageId]) {
                        slot.classList.add('has-image');
                        slot.innerHTML = `
                            <img src="${imageSrc[imageId]}" alt="Selected image" loading="lazy" decoding="async">
                            <button type="button" class="drop-remove js-remove-assignment" data-row-id="${rowId}" aria-label="Remove image">×</button>
                        `;
                    } else {
                        slot.classList.remove('has-image');
                        slot.textContent = 'Drop image here';
                    }
                });
            }

            function setAssignment(rowId, imageId, options = {}) {
                if (!rowId || !imageId) return;
                const row = rows.find((item) => item.getAttribute('data-row-id') === rowId);
                const expected = row?.getAttribute('data-answer') || '';

                if (!options.force && imageId !== expected) {
                    mistakes += 1;
                    updateStats();
                    statusChip.textContent = '';
                    play(audio.wrong);
                    pulseWrong(row);
                    return;
                }

                const previousRow = getRowIdByImage(imageId);
                if (previousRow && previousRow !== rowId) {
                    assignments[previousRow] = null;
                }

                assignments[rowId] = imageId;
                selectedImageId = null;
                if (row) {
                    row.classList.remove('is-wrong', 'is-shaking');
                    row.classList.add('is-correct');
                }
                if (!options.silent) {
                    play(options.force ? audio.click : audio.correct);
                    statusChip.textContent = '';
                }
                render();
                updateStats();
                if (!options.force) maybeFinish();
            }

            imageCards.forEach((card) => {
                card.addEventListener('dragstart', (event) => {
                    const imageId = card.getAttribute('data-image-id');
                    if (card.classList.contains('is-used')) {
                        event.preventDefault();
                        return;
                    }
                    if (!imageId) return;

                    dragImageId = imageId;
                    card.classList.add('is-dragging');
                    if (event.dataTransfer) {
                        event.dataTransfer.setData('text/plain', imageId);
                        event.dataTransfer.effectAllowed = 'move';
                    }
                });

                card.addEventListener('dragend', () => {
                    dragImageId = null;
                    card.classList.remove('is-dragging');
                    rows.forEach((row) => row.classList.remove('is-over'));
                });

                card.addEventListener('click', () => {
                    const imageId = card.getAttribute('data-image-id');
                    if (card.classList.contains('is-used')) return;
                    selectedImageId = selectedImageId === imageId ? null : imageId;
                    play(audio.click);
                    render();
                });
            });

            rowSlots.forEach((slot) => {
                const rowId = slot.getAttribute('data-row-id');
                const row = slot.closest('.js-drop-row');

                slot.addEventListener('dragover', (event) => {
                    event.preventDefault();
                    if (row) row.classList.add('is-over');
                });

                slot.addEventListener('dragleave', () => {
                    if (row) row.classList.remove('is-over');
                });

                slot.addEventListener('drop', (event) => {
                    event.preventDefault();
                    if (row) row.classList.remove('is-over');

                    const transferId = event.dataTransfer?.getData('text/plain') || '';
                    const imageId = transferId || dragImageId;
                    setAssignment(rowId, imageId);
                });

                slot.addEventListener('click', () => {
                    if (selectedImageId) {
                        setAssignment(rowId, selectedImageId);
                    }
                });
            });

            rowsWrap?.addEventListener('click', (event) => {
                const btn = event.target.closest('.js-remove-assignment');
                if (!btn) return;

                const rowId = btn.getAttribute('data-row-id');
                if (!rowId) return;

                assignments[rowId] = null;
                const row = rows.find((item) => item.getAttribute('data-row-id') === rowId);
                row?.classList.remove('is-correct', 'is-wrong', 'is-shaking');
                play(audio.click);
                statusChip.textContent = '';
                render();
                updateStats();
            });

            revealBtn?.addEventListener('click', () => {
                rows.forEach((row) => {
                    const rowId = row.getAttribute('data-row-id');
                    const expected = row.getAttribute('data-answer');
                    if (rowId && expected) {
                        setAssignment(rowId, expected, { force: true, silent: true });
                    }
                });

                gameFinished = true;
                stopTimer();
                statusChip.textContent = 'Answers revealed.';
                play(audio.success);
                updateStats();
                render();
            });

            resetBtn?.addEventListener('click', () => {
                selectedImageId = null;
                dragImageId = null;
                mistakes = 0;
                seconds = 0;
                gameFinished = false;

                Object.keys(assignments).forEach((rowId) => {
                    assignments[rowId] = null;
                });

                rows.forEach((row) => {
                    row.classList.remove('is-correct', 'is-wrong', 'is-shaking', 'is-over');
                });
                statusChip.textContent = '';
                play(audio.click);
                updateStats();
                render();
                startTimer();
            });

            updateStats();
            startTimer();
            render();
        });
    </script>
@endsection