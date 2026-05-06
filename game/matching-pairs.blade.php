@extends('slider.simple-layout')

@section('content')
    @php
        $pairs = collect($content['pairs'] ?? [])->values();
        $pairById = $pairs->keyBy('id');
        $playerAudio = !empty($content['audio']) ? $content['audio'] : null;
        $scriptLines = is_array($content['script'] ?? null)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['script']), static fn ($line) => $line !== ''))
            : [];
        $hasScript = $scriptLines !== [];
        $showCheckButton = filter_var($content['show_check_button'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $matchSounds = array_replace([
            'tap' => materialAsset('slider/sounds/tap.wav'),
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong' => materialAsset('slider/sounds/wrong.wav'),
            'success' => materialAsset('slider/sounds/success.wav'),
        ], is_array($content['sounds'] ?? null) ? $content['sounds'] : []);

        $leftItems = $pairs->map(function ($pair, $index) {
            return [
                'id' => $pair['id'] ?? 'pair-' . $index,
                'content' => $pair['left'] ?? [],
            ];
        })->values();

        $rightItems = collect($content['right_order'] ?? [])->map(function ($id) use ($pairById) {
            $pair = $pairById->get($id);

            return $pair
                ? ['id' => $pair['id'], 'content' => $pair['right'] ?? []]
                : null;
        })->filter()->values();

        if ($rightItems->count() !== $pairs->count()) {
            $rightItems = $pairs->map(function ($pair, $index) {
                return [
                    'id' => $pair['id'] ?? 'pair-' . $index,
                    'content' => $pair['right'] ?? [],
                ];
            })->values();
        }

        $activityTitle = $content['activity_title'] ?? $content['directions'] ?? 'Match the items.';
        $leftLabel = $content['left_label'] ?? 'A. Items';
        $rightLabel = $content['right_label'] ?? 'B. Matches';
        $hintText = $content['hint_text'] ?? 'Tap a card on the left, then tap its match on the right.';

        $pictureFrameClass = 'match-picture';
        $imageClass = 'pointer-events-none h-full w-full object-contain';
        $wordClass = 'match-word';

        $renderMatchItem = function ($item) use ($pictureFrameClass, $imageClass, $wordClass) {
            $type = $item['type'] ?? 'word';

            if ($type === 'image') {
                $src = $item['src'] ?? $item['image'] ?? '';
                $alt = $item['alt'] ?? '';

                return '<span class="' . $pictureFrameClass . '"><img src="' . e($src) . '" alt="' . e($alt) . '" class="' . $imageClass . '" draggable="false"></span>';
            }

            return '<span class="' . $wordClass . '">' . ($item['text'] ?? $item['word'] ?? '') . '</span>';
        };

        $matchButtonBaseClass = 'match-action-btn';
        $matchButtonPrimaryClass = $matchButtonBaseClass . ' match-action-primary';
        $matchButtonSoftClass = $matchButtonBaseClass . ' match-action-soft';
        $matchButtonNeutralClass = $matchButtonBaseClass . ' match-action-dark';

        $matchCardBaseClass = 'match-card';
        $matchConnectorBaseClass = 'match-connector';
        $matchConnectorStartClass = $matchConnectorBaseClass . ' match-connector-start';
        $matchConnectorTargetClass = $matchConnectorBaseClass . ' match-connector-target';

        $rowToneClasses = [
            'bg-white dark:bg-slate-900',
            'bg-sky-50/75 dark:bg-sky-950/20',
            'bg-violet-50/70 dark:bg-violet-950/20',
            'bg-emerald-50/70 dark:bg-emerald-950/20',
            'bg-rose-50/65 dark:bg-rose-950/20',
            'bg-cyan-50/70 dark:bg-cyan-950/20',
        ];
    @endphp

    <style>
            #matchingPairsShell {
                --match-accent: #4f46e5;
                --match-accent-2: #06b6d4;
                --match-line: #10b981;
            }

            .matching-panel {
                border-radius: 1.35rem;
                border: 1px solid rgba(203, 213, 225, .9);
                background:
                    radial-gradient(120% 90% at 0% 0%, rgba(14, 165, 233, .11), transparent 46%),
                    radial-gradient(90% 100% at 100% 0%, rgba(124, 58, 237, .10), transparent 44%),
                    radial-gradient(100% 80% at 50% 100%, rgba(16, 185, 129, .08), transparent 48%),
                    rgba(255, 255, 255, .94);
                box-shadow: 0 20px 46px -34px rgba(15, 23, 42, .42);
            }

            .dark .matching-panel {
                border-color: rgba(71, 85, 105, .72);
                background:
                    radial-gradient(120% 90% at 0% 0%, rgba(14, 165, 233, .14), transparent 46%),
                    radial-gradient(90% 100% at 100% 0%, rgba(124, 58, 237, .16), transparent 44%),
                    radial-gradient(100% 80% at 50% 100%, rgba(16, 185, 129, .10), transparent 48%),
                    rgba(15, 23, 42, .86);
            }

            .matching-board {
                display: grid;
                grid-template-columns: minmax(0, .88fr) minmax(0, 1.12fr);
                align-items: stretch;
                column-gap: clamp(2rem, 6vw, 7.5rem);
                row-gap: clamp(.34rem, .8vh, .65rem);
            }

            .match-column-label {
                position: sticky;
                top: 0;
                z-index: 7;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 2rem;
                border-radius: 999px;
                border: 1px solid rgba(203, 213, 225, .9);
                background: linear-gradient(135deg, rgba(255, 255, 255, .92), rgba(248, 250, 252, .86));
                color: #1e293b;
                font-size: .72rem;
                font-weight: 950;
                letter-spacing: .02em;
                box-shadow: 0 10px 22px -18px rgba(15, 23, 42, .45);
                backdrop-filter: blur(10px);
            }

            .dark .match-column-label {
                border-color: rgba(71, 85, 105, .8);
                background: rgba(15, 23, 42, .76);
                color: #e2e8f0;
            }

            .match-card {
                position: relative;
                z-index: 10;
                display: flex;
                width: 100%;
                min-height: clamp(2.45rem, 7.2vh, 4.15rem);
                cursor: pointer;
                user-select: none;
                align-items: center;
                justify-content: center;
                border-radius: 1rem;
                border: 2px solid rgba(203, 213, 225, .88);
                padding: .35rem .52rem;
                text-align: center;
                box-shadow: 0 10px 24px -20px rgba(15, 23, 42, .52);
                transition: transform .16s ease, border-color .16s ease, box-shadow .16s ease, background-color .16s ease;
            }

            .match-card:hover {
                transform: translateY(-1px);
                border-color: rgba(99, 102, 241, .72);
                box-shadow: 0 14px 28px -22px rgba(79, 70, 229, .62);
            }

            .match-card:focus-visible {
                outline: none;
                box-shadow: 0 0 0 4px rgba(99, 102, 241, .20), 0 14px 28px -22px rgba(79, 70, 229, .62);
            }

            .match-card:disabled {
                cursor: default;
                opacity: .98;
                transform: none;
            }

            .dark .match-card {
                border-color: rgba(51, 65, 85, .96);
                box-shadow: 0 14px 28px -22px rgba(2, 6, 23, .82);
            }

            .match-card > span:not(.match-connector) {
                width: 100%;
                min-width: 0;
                padding-inline: clamp(.4rem, 1.8vw, 1.45rem);
            }

            .match-word {
                display: block;
                max-width: 100%;
                color: #0f172a;
                font-size: clamp(.68rem, 1.52vw, .98rem);
                font-weight: 950;
                line-height: 1.14;
                overflow-wrap: anywhere;
                text-wrap: balance;
            }

            .dark .match-word {
                color: #f8fafc;
            }

            .match-picture {
                display: grid;
                aspect-ratio: 5 / 4;
                width: min(100%, 4.4rem);
                place-items: center;
                overflow: hidden;
                border-radius: .9rem;
                border: 1px solid rgba(203, 213, 225, .9);
                background: #fff;
                box-shadow: inset 0 1px 5px rgba(15, 23, 42, .08);
            }

            .match-connector {
                position: absolute;
                top: 50%;
                z-index: 20;
                display: grid;
                width: 2rem;
                height: 2rem;
                translate: 0 -50%;
                touch-action: none;
                place-items: center;
                border-radius: 999px;
                background: transparent;
                transition: transform .16s ease;
            }

            .match-connector::after {
                content: "";
                display: block;
                width: .72rem;
                height: .72rem;
                border-radius: 999px;
                border: 2px solid #fff;
                background: linear-gradient(135deg, #4f46e5, #06b6d4);
                box-shadow: 0 4px 12px rgba(79, 70, 229, .34);
                outline: 2px solid rgba(125, 211, 252, .58);
            }

            .match-connector:hover {
                transform: scale(1.12);
            }

            .match-connector-start {
                right: -1rem;
                cursor: grab;
            }

            .match-connector-start:active {
                cursor: grabbing;
            }

            .match-connector-target {
                left: -1rem;
                cursor: pointer;
            }

            .match-action-btn {
                display: inline-flex;
                min-height: 2rem;
                align-items: center;
                justify-content: center;
                border-radius: .85rem;
                padding: .36rem .72rem;
                font-size: .72rem;
                font-weight: 950;
                line-height: 1;
                transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
            }

            .match-action-btn:hover {
                transform: translateY(-1px);
            }

            .match-action-primary {
                border: 1px solid rgba(255, 255, 255, .45);
                background: linear-gradient(135deg, #4f46e5, #06b6d4, #10b981);
                color: #fff;
                box-shadow: 0 12px 24px -18px rgba(79, 70, 229, .8);
            }

            .match-action-soft {
                border: 1px solid rgba(203, 213, 225, .9);
                background: #fff;
                color: #334155;
            }

            .match-action-dark {
                border: 1px solid rgba(15, 23, 42, .12);
                background: #0f172a;
                color: #fff;
            }

            .dark .match-action-soft {
                border-color: rgba(71, 85, 105, .9);
                background: rgba(15, 23, 42, .78);
                color: #e2e8f0;
            }

            .dark .match-action-dark {
                border-color: rgba(255, 255, 255, .12);
                background: #fff;
                color: #0f172a;
            }

            @media (max-width: 640px) {
                .matching-panel {
                    border-radius: 1rem;
                }

                .matching-board {
                    column-gap: 2rem;
                    row-gap: .32rem;
                }

                .match-column-label {
                    min-height: 1.65rem;
                    font-size: .62rem;
                }

                .match-card {
                    min-height: clamp(2.18rem, 6.6vh, 3rem);
                    border-radius: .82rem;
                    padding: .26rem .36rem;
                }

                .match-word {
                    font-size: clamp(.58rem, 3.05vw, .74rem);
                    line-height: 1.1;
                }

                .match-card > span:not(.match-connector) {
                    padding-inline: .28rem;
                }

                .match-connector {
                    width: 1.75rem;
                    height: 1.75rem;
                }

                .match-connector::after {
                    width: .56rem;
                    height: .56rem;
                }

                .match-connector-start {
                    right: -.9rem;
                }

                .match-connector-target {
                    left: -.9rem;
                }

                .match-action-btn {
                    flex: 1 1 auto;
                    min-height: 1.85rem;
                    border-radius: .72rem;
                    padding-inline: .55rem;
                    font-size: .66rem;
                }
            }
    </style>

    <main id="matchingPairsShell" class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-1.5 py-1 sm:px-5 sm:py-3 lg:px-6">
            @if($playerAudio)
                <div class="mx-auto mb-2 max-w-3xl sm:mb-4">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="matching-panel p-2 sm:p-3 lg:p-4">
                <div class="mb-2 flex flex-col gap-2 sm:mb-3 lg:flex-row lg:items-center lg:justify-between">
                    <div class="min-w-0">
                        <h2 class="text-balance text-sm font-black leading-tight tracking-[-0.03em] text-slate-950 dark:text-white sm:text-lg lg:text-xl">
                            {{ $activityTitle }}
                        </h2>
                        <p class="mt-1 hidden text-xs font-bold leading-tight text-slate-500 dark:text-slate-300 sm:block">
                            {{ $hintText }}
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 max-sm:w-full">
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-1 text-[0.68rem] font-black text-emerald-700 shadow-sm dark:border-emerald-400/20 dark:bg-emerald-950/25 dark:text-emerald-200 sm:px-3 sm:text-xs">
                            <span>Score</span>
                            <span><span id="score">0</span>/<span>{{ $pairs->count() }}</span></span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-rose-100 bg-rose-50 px-2.5 py-1 text-[0.68rem] font-black text-rose-700 shadow-sm dark:border-rose-400/20 dark:bg-rose-950/25 dark:text-rose-200 sm:px-3 sm:text-xs">
                            <span>Mistakes</span>
                            <span id="mistakes">0</span>
                        </div>

                        <div class="flex flex-1 flex-wrap items-center justify-end gap-1.5 sm:gap-2 max-sm:w-full">
                            @if($showCheckButton)
                                <button id="checkMatchAnswers" type="button" class="{{ $matchButtonNeutralClass }}">
                                    Check
                                </button>
                            @endif
                            <button id="revealMatchAnswers" type="button" class="{{ $matchButtonPrimaryClass }}">
                                Reveal
                            </button>
                            <button id="retakeMatchGame" type="button" class="{{ $matchButtonSoftClass }}">
                                Retake
                            </button>
                        </div>
                    </div>
                </div>

                <div id="matchBoard" class="matching-board relative mx-auto w-full touch-none">
                    <svg id="lineLayer" class="pointer-events-none absolute inset-0 z-[5] h-full w-full overflow-visible" aria-hidden="true"></svg>

                    <div class="match-column-label">{{ $leftLabel }}</div>
                    <div class="match-column-label">{{ $rightLabel }}</div>

                    @foreach($leftItems as $index => $item)
                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }} {{ $rowToneClasses[$index % count($rowToneClasses)] }}"
                                data-side="left"
                                data-id="{{ $item['id'] }}"
                                data-row-tone="{{ $index % 4 }}"
                                aria-label="Select {{ strip_tags($item['content']['text'] ?? $item['content']['word'] ?? 'left item') }}"
                        >
                            <span>
                                {!! $renderMatchItem($item['content']) !!}
                            </span>
                            <span class="{{ $matchConnectorStartClass }}" data-connector="start" aria-hidden="true"></span>
                        </button>

                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }} {{ $rowToneClasses[$index % count($rowToneClasses)] }}"
                                data-side="right"
                                data-id="{{ $rightItems[$index]['id'] }}"
                                data-row-tone="{{ $index % 4 }}"
                                aria-label="Choose {{ strip_tags($rightItems[$index]['content']['text'] ?? $rightItems[$index]['content']['word'] ?? 'right item') }}"
                        >
                            <span class="{{ $matchConnectorTargetClass }}" data-connector="target" aria-hidden="true"></span>
                            <span>
                                {!! $renderMatchItem($rightItems[$index]['content']) !!}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
        </section>

        @include('slider.components.game-win-modal', [
            'modalId' => 'gameWinModal',
            'modalTitle' => 'Great job!',
            'modalStats' => [
                ['label' => 'Correct', 'id' => 'finalCorrect'],
                ['label' => 'Total', 'id' => 'finalTotal'],
                ['label' => 'Mistakes', 'id' => 'finalMistakes'],
            ],
            'modalActions' => [
                [
                    'label' => 'Retake',
                    'id' => 'restartBtnModal',
                    'class' => $matchButtonSoftClass . ' w-full',
                ],
                [
                    'label' => 'Continue',
                    'id' => 'continueBtnModal',
                    'class' => $matchButtonPrimaryClass . ' w-full',
                ],
            ],
        ])
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const board = document.getElementById('matchBoard');
            const lineLayer = document.getElementById('lineLayer');
            const checkBtn = document.getElementById('checkMatchAnswers');
            const revealBtn = document.getElementById('revealMatchAnswers');
            const retakeBtn = document.getElementById('retakeMatchGame');
            const cards = Array.from(document.querySelectorAll('.match-card'));
            const totalPairs = Number(@json($pairs->count()));
            const sounds = @json($matchSounds);
            const sfx = {
                tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav'),
            };

            const svgNamespace = 'http://www.w3.org/2000/svg';
            const lineClass = 'stroke-emerald-500 [stroke-linecap:round] [stroke-width:4.5] drop-shadow-sm dark:stroke-emerald-300 max-sm:[stroke-width:3.5]';
            const activeLineClass = 'stroke-indigo-500 opacity-90 [stroke-linecap:round] [stroke-width:4.5] drop-shadow-sm dark:stroke-cyan-300 max-sm:[stroke-width:3.5]';

            const stateClasses = {
                selected: [
                    '-translate-y-0.5',
                    '!border-indigo-500',
                    '!bg-indigo-50',
                    '!bg-none',
                    'ring-4',
                    'ring-indigo-400/25',
                    'shadow-[0_16px_34px_rgba(79,70,229,0.18)]',
                    'dark:!border-indigo-300',
                    'dark:!bg-indigo-950/35',
                    'dark:ring-indigo-300/15',
                ],
                target: [
                    '!border-sky-400',
                    'ring-4',
                    'ring-sky-300/18',
                    'dark:!border-sky-300/80',
                    'dark:ring-sky-300/12',
                ],
                correct: [
                    '!border-emerald-400',
                    '!bg-emerald-50',
                    '!bg-none',
                    'ring-4',
                    'ring-emerald-300/20',
                    'shadow-[0_14px_32px_rgba(16,185,129,0.15)]',
                    'dark:!border-emerald-300',
                    'dark:!bg-emerald-950/35',
                    'dark:ring-emerald-300/12',
                ],
                wrong: [
                    '!border-rose-500',
                    '!bg-rose-50',
                    '!bg-none',
                    'ring-4',
                    'ring-rose-400/25',
                    'animate-pulse',
                    'dark:!border-rose-400',
                    'dark:!bg-rose-950/40',
                ],
                connectorHot: [
                    'scale-125',
                    'after:!bg-slate-950',
                    'after:!ring-sky-300',
                    'dark:after:!bg-white',
                    'dark:after:!ring-sky-200/40',
                ],
            };

            const cardStateClasses = [
                ...stateClasses.selected,
                ...stateClasses.target,
                ...stateClasses.correct,
                ...stateClasses.wrong,
            ];

            let selectedLeft = null;
            let activeLeft = null;
            let activeLine = null;
            let activePointerId = null;
            let completed = new Set();
            let mistakes = 0;
            let lines = [];

            function addClasses(element, classes) {
                if (!element || classes.length === 0) return;
                element.classList.add(...classes);
            }

            function removeClasses(element, classes) {
                if (!element || classes.length === 0) return;
                element.classList.remove(...classes);
            }

            function resetCardState(card) {
                removeClasses(card, cardStateClasses);
            }

            function resetConnectorStates() {
                document
                    .querySelectorAll('[data-connector]')
                    .forEach(connector => removeClasses(connector, stateClasses.connectorHot));
            }

            function setConnectorState(card, selector, enabled = true) {
                const connector = card?.querySelector?.(selector);

                if (!connector) return;

                if (enabled) {
                    addClasses(connector, stateClasses.connectorHot);
                } else {
                    removeClasses(connector, stateClasses.connectorHot);
                }
            }

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function updateStats() {
                const scoreEl = document.getElementById('score');
                const mistakesEl = document.getElementById('mistakes');

                if (scoreEl) scoreEl.textContent = completed.size;
                if (mistakesEl) mistakesEl.textContent = mistakes;
            }

            function getWinModal() {
                return document.getElementById('gameWinModal') || document.querySelector('[data-game-win-modal]');
            }

            function showWinModal() {
                const modal = getWinModal();
                if (!modal) return;

                const finalCorrect = document.getElementById('finalCorrect');
                const finalTotal = document.getElementById('finalTotal');
                const finalMistakes = document.getElementById('finalMistakes');

                if (finalCorrect) finalCorrect.textContent = completed.size;
                if (finalTotal) finalTotal.textContent = totalPairs;
                if (finalMistakes) finalMistakes.textContent = mistakes;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function hideWinModal() {
                const modal = getWinModal();
                if (!modal) return;

                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            function syncLineLayer() {
                const boardRect = board.getBoundingClientRect();

                lineLayer.setAttribute('viewBox', `0 0 ${boardRect.width} ${boardRect.height}`);
                lineLayer.setAttribute('width', boardRect.width);
                lineLayer.setAttribute('height', boardRect.height);
            }

            function boardPoint(x, y) {
                const boardRect = board.getBoundingClientRect();

                return {
                    x: x - boardRect.left,
                    y: y - boardRect.top,
                };
            }

            function connectorPoint(card, selector) {
                const boardRect = board.getBoundingClientRect();
                const connector = card.querySelector(selector);
                const rect = (connector || card).getBoundingClientRect();

                return {
                    x: rect.left + rect.width / 2 - boardRect.left,
                    y: rect.top + rect.height / 2 - boardRect.top,
                };
            }

            function positionLine(line, start, end) {
                line.setAttribute('x1', start.x);
                line.setAttribute('y1', start.y);
                line.setAttribute('x2', end.x);
                line.setAttribute('y2', end.y);
            }

            function drawLine(leftCard, rightCard) {
                syncLineLayer();

                const line = document.createElementNS(svgNamespace, 'line');
                line.setAttribute('class', lineClass);
                line.dataset.id = leftCard.dataset.id;

                positionLine(
                    line,
                    connectorPoint(leftCard, '[data-connector="start"]'),
                    connectorPoint(rightCard, '[data-connector="target"]')
                );

                lineLayer.appendChild(line);
                lines.push(line);
            }

            function removeLines() {
                lines.forEach(line => line.remove());
                lines = [];
            }

            function createActiveLine(leftCard, event) {
                syncLineLayer();

                activeLine = document.createElementNS(svgNamespace, 'line');
                activeLine.setAttribute('class', activeLineClass);
                lineLayer.appendChild(activeLine);

                positionLine(
                    activeLine,
                    connectorPoint(leftCard, '[data-connector="start"]'),
                    boardPoint(event.clientX, event.clientY)
                );
            }

            function clearSelection() {
                cards.forEach(card => {
                    removeClasses(card, stateClasses.selected);
                    removeClasses(card, stateClasses.target);
                });

                resetConnectorStates();
                selectedLeft = null;
            }

            function getRightCardAt(clientX, clientY) {
                const element = document.elementFromPoint(clientX, clientY);
                return element?.closest?.('.match-card[data-side="right"]') || null;
            }

            function finishCorrect(leftCard, rightCard) {
                removeClasses(leftCard, [
                    ...stateClasses.selected,
                    ...stateClasses.target,
                    ...stateClasses.wrong,
                ]);
                removeClasses(rightCard, [
                    ...stateClasses.selected,
                    ...stateClasses.target,
                    ...stateClasses.wrong,
                ]);

                addClasses(leftCard, stateClasses.correct);
                addClasses(rightCard, stateClasses.correct);

                leftCard.disabled = true;
                rightCard.disabled = true;

                completed.add(leftCard.dataset.id);
                drawLine(leftCard, rightCard);
                updateStats();

                if (completed.size === totalPairs) {
                    playSfx('success');
                    setTimeout(showWinModal, 250);
                } else {
                    playSfx('correct');
                }
            }

            function finishWrong(leftCard, rightCard) {
                mistakes++;
                updateStats();
                playSfx('wrong');

                addClasses(leftCard, stateClasses.wrong);
                addClasses(rightCard, stateClasses.wrong);

                setTimeout(() => {
                    removeClasses(leftCard, stateClasses.wrong);
                    removeClasses(rightCard, stateClasses.wrong);
                }, 450);
            }

            function flashUnmatchedCards() {
                const unmatchedCards = cards.filter(card => !card.disabled);

                unmatchedCards.forEach(card => addClasses(card, stateClasses.wrong));

                setTimeout(() => {
                    unmatchedCards.forEach(card => removeClasses(card, stateClasses.wrong));
                }, 520);
            }

            function resetGame() {
                completed.clear();
                mistakes = 0;
                selectedLeft = null;
                activeLeft = null;
                activePointerId = null;
                activeLine?.remove();
                activeLine = null;

                cards.forEach(card => {
                    card.disabled = false;
                    resetCardState(card);
                });

                resetConnectorStates();
                removeLines();
                hideWinModal();
                updateStats();
            }

            function revealAnswers() {
                resetGame();

                document.querySelectorAll('.match-card[data-side="left"]').forEach(leftCard => {
                    const id = leftCard.dataset.id;
                    const rightCard = document.querySelector(`.match-card[data-side="right"][data-id="${CSS.escape(id)}"]`);

                    if (!rightCard) return;

                    addClasses(leftCard, stateClasses.correct);
                    addClasses(rightCard, stateClasses.correct);

                    leftCard.disabled = true;
                    rightCard.disabled = true;
                    completed.add(id);
                    drawLine(leftCard, rightCard);
                });

                updateStats();
                playSfx('success');
            }

            function endConnection(event) {
                if (!activeLeft || !activeLine || event.pointerId !== activePointerId) return;

                const rightCard = getRightCardAt(event.clientX, event.clientY);

                activeLine.remove();
                activeLine = null;

                if (rightCard && !rightCard.disabled && rightCard.dataset.id === activeLeft.dataset.id) {
                    finishCorrect(activeLeft, rightCard);
                } else {
                    finishWrong(activeLeft, rightCard);
                }

                activeLeft.releasePointerCapture?.(activePointerId);
                activeLeft = null;
                activePointerId = null;
                clearSelection();
            }

            document.querySelectorAll('[data-connector="start"]').forEach(connector => {
                connector.addEventListener('click', event => {
                    event.stopPropagation();
                });

                connector.addEventListener('pointerdown', event => {
                    const leftCard = connector.closest('.match-card[data-side="left"]');
                    if (!leftCard || leftCard.disabled) return;

                    event.preventDefault();
                    event.stopPropagation();

                    clearSelection();
                    selectedLeft = leftCard;
                    activeLeft = leftCard;
                    activePointerId = event.pointerId;

                    addClasses(leftCard, stateClasses.selected);
                    setConnectorState(leftCard, '[data-connector="start"]', true);
                    playSfx('tap');

                    cards
                        .filter(item => item.dataset.side === 'right' && !item.disabled)
                        .forEach(item => {
                            addClasses(item, stateClasses.target);
                            setConnectorState(item, '[data-connector="target"]', true);
                        });

                    leftCard.setPointerCapture?.(event.pointerId);
                    createActiveLine(leftCard, event);
                });
            });

            board.addEventListener('pointermove', event => {
                if (!activeLeft || !activeLine || event.pointerId !== activePointerId) return;

                syncLineLayer();

                positionLine(
                    activeLine,
                    connectorPoint(activeLeft, '[data-connector="start"]'),
                    boardPoint(event.clientX, event.clientY)
                );
            });

            board.addEventListener('pointerup', endConnection);
            board.addEventListener('pointercancel', event => {
                if (!activeLine || event.pointerId !== activePointerId) return;

                activeLine.remove();
                activeLine = null;
                activeLeft = null;
                activePointerId = null;
                clearSelection();
            });

            cards.forEach(card => {
                card.addEventListener('click', () => {
                    if (card.disabled) return;

                    if (card.dataset.side === 'left') {
                        clearSelection();
                        selectedLeft = card;
                        addClasses(card, stateClasses.selected);
                        setConnectorState(card, '[data-connector="start"]', true);
                        playSfx('tap');

                        cards
                            .filter(item => item.dataset.side === 'right' && !item.disabled)
                            .forEach(item => {
                                addClasses(item, stateClasses.target);
                                setConnectorState(item, '[data-connector="target"]', true);
                            });
                        return;
                    }

                    if (!selectedLeft || card.dataset.side !== 'right') return;

                    if (card.dataset.id === selectedLeft.dataset.id) {
                        finishCorrect(selectedLeft, card);
                    } else {
                        finishWrong(selectedLeft, card);
                    }

                    clearSelection();
                });
            });

            checkBtn?.addEventListener('click', () => {
                clearSelection();

                if (completed.size === totalPairs) {
                    showWinModal();
                    return;
                }

                flashUnmatchedCards();
            });

            revealBtn?.addEventListener('click', revealAnswers);
            retakeBtn?.addEventListener('click', resetGame);

            document.getElementById('restartBtnModal')?.addEventListener('click', () => {
                retakeBtn?.click();
            });

            document.getElementById('continueBtnModal')?.addEventListener('click', () => {
                hideWinModal();
            });

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.addEventListener('resize', () => {
                syncLineLayer();
                removeLines();

                completed.forEach(id => {
                    const left = document.querySelector(`.match-card[data-side="left"][data-id="${CSS.escape(id)}"]`);
                    const right = document.querySelector(`.match-card[data-side="right"][data-id="${CSS.escape(id)}"]`);

                    if (left && right) drawLine(left, right);
                });
            });

            window.resetSlide = () => {
                stopSlideMedia();
                retakeBtn?.click();
            };

            window.stopSlideAudio = () => {
                stopSlideMedia();
            };

            window.destroySlide = () => {
                stopSlideMedia();
            };

            syncLineLayer();
            updateStats();
        });
    </script>
@endsection
