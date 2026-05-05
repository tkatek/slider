<?php
$content = [
    'page_title' => 'Practice 5',
    'title' => 'Practice 5',
    'subtitle' => '',
    'activity_title' => 'Match each unusual job (1–4) with the correct definition (A–D).',

    'pairs' => [
        [
            'id' => 'professional-sleeper',
            'left' => [
                'type' => 'word',
                'text' => '1. Professional Sleeper',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. A person who is hired to sleep in different beds and test how comfortable they are.',
            ],
        ],
        [
            'id' => 'pet-food-taster',
            'left' => [
                'type' => 'word',
                'text' => '2. Pet Food Taster',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. A person who is paid to eat and test pet food to make sure it tastes good and is safe for animals.',
            ],
        ],
        [
            'id' => 'water-slide-tester',
            'left' => [
                'type' => 'word',
                'text' => '3. Water Slide Tester',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. A person who travels to water parks and rides slides to check their safety, speed, and fun level.',
            ],
        ],
        [
            'id' => 'professional-mourner',
            'left' => [
                'type' => 'word',
                'text' => '4. Professional Mourner',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. A person who is paid to cry and show sadness at funerals to help the family mourn.',
            ],
        ],
    ],

    'right_order' => [
        'pet-food-taster',
        'professional-sleeper',
        'professional-mourner',
        'water-slide-tester',
    ],
];
?>

@extends('slider.simple-layout')

@section('content')
    @php
        $pairs = collect($content['pairs'] ?? [])->values();
        $pairById = $pairs->keyBy('id');
        $playerAudio = !empty($content['audio']) ? $content['audio'] : null;
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

        $pictureFrameClass = 'grid aspect-[5/4] w-[min(100%,70px)] place-items-center overflow-hidden rounded-xl border border-orange-100 bg-white shadow-inner dark:border-orange-400/20 dark:bg-white/95 max-sm:w-[min(100%,52px)]';
        $imageClass = 'pointer-events-none h-full w-full object-contain';
        $wordClass = 'block max-w-full text-balance text-[0.66rem] font-black leading-[1.15] tracking-[-0.01em] text-slate-900 dark:text-slate-50 min-[380px]:text-[0.72rem] sm:text-[0.84rem] lg:text-[0.94rem]';

        $renderMatchItem = function ($item) use ($pictureFrameClass, $imageClass, $wordClass) {
            $type = $item['type'] ?? 'word';

            if ($type === 'image') {
                $src = $item['src'] ?? $item['image'] ?? '';
                $alt = $item['alt'] ?? '';

                return '<span class="' . $pictureFrameClass . '"><img src="' . e($src) . '" alt="' . e($alt) . '" class="' . $imageClass . '" draggable="false"></span>';
            }

            return '<span class="' . $wordClass . '">' . ($item['text'] ?? $item['word'] ?? '') . '</span>';
        };

        $matchButtonBaseClass = 'inline-flex min-h-9 items-center justify-center rounded-xl px-3 py-1.5 text-[0.7rem] font-black tracking-[-0.01em] transition duration-200 ease-out hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-4 sm:min-h-10 sm:rounded-2xl sm:px-4 sm:py-2 sm:text-xs max-sm:flex-1 max-[370px]:basis-full';
        $matchButtonPrimaryClass = $matchButtonBaseClass . ' border border-white/30 bg-gradient-to-br from-orange-500 via-amber-500 to-yellow-400 text-white shadow-lg shadow-orange-500/25 hover:shadow-orange-500/35 focus:ring-orange-400/25';
        $matchButtonSoftClass = $matchButtonBaseClass . ' border border-orange-100 bg-white text-slate-700 shadow-sm hover:border-orange-200 hover:bg-orange-50 focus:ring-orange-300/20 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-orange-400/35 dark:hover:bg-slate-800';
        $matchButtonNeutralClass = $matchButtonBaseClass . ' border border-slate-200 bg-slate-950 text-white shadow-lg hover:bg-slate-800 focus:ring-slate-400/20 dark:border-slate-600 dark:bg-white dark:text-slate-950 dark:hover:bg-orange-50';

        $matchCardBaseClass = 'match-card relative z-10 flex min-h-[50px] w-full cursor-pointer select-none items-center justify-center rounded-xl border-2 border-orange-100/90 px-1.5 py-1 text-center shadow-[0_8px_20px_rgba(15,23,42,0.055)] transition duration-200 ease-out hover:-translate-y-0.5 hover:border-orange-300 hover:shadow-[0_14px_30px_rgba(251,146,60,0.14)] focus:outline-none focus:ring-4 focus:ring-orange-300/20 disabled:cursor-default disabled:opacity-95 disabled:hover:translate-y-0 disabled:[&_[data-connector]]:cursor-default disabled:[&_[data-connector]]:opacity-55 dark:border-slate-700/90 dark:shadow-[0_14px_30px_rgba(2,6,23,0.24)] dark:hover:border-orange-400/50 min-[380px]:min-h-[54px] sm:min-h-[66px] sm:rounded-2xl sm:px-3 sm:py-2';
        $matchConnectorBaseClass = "absolute top-1/2 z-20 grid size-7 -translate-y-1/2 touch-none place-items-center rounded-full bg-transparent transition duration-200 ease-out after:block after:size-3 after:rounded-full after:border-2 after:border-white after:bg-orange-500 after:shadow-[0_4px_12px_rgba(249,115,22,0.45)] after:ring-2 after:ring-orange-200/80 after:content-[''] hover:scale-110 focus:outline-none dark:after:bg-orange-400 dark:after:ring-orange-300/30 max-sm:size-8 max-sm:after:size-2.5";
        $matchConnectorStartClass = $matchConnectorBaseClass . ' -right-3.5 cursor-grab active:cursor-grabbing max-sm:-right-4';
        $matchConnectorTargetClass = $matchConnectorBaseClass . ' -left-3.5 cursor-pointer max-sm:-left-4';

        $rowToneClasses = [
            'bg-gradient-to-b from-orange-50/95 via-white to-white dark:from-orange-950/35 dark:via-slate-900 dark:to-slate-950',
            'bg-gradient-to-b from-amber-50/95 via-white to-white dark:from-amber-950/30 dark:via-slate-900 dark:to-slate-950',
            'bg-gradient-to-b from-yellow-50/90 via-white to-white dark:from-yellow-950/20 dark:via-slate-900 dark:to-slate-950',
            'bg-gradient-to-b from-white via-white to-orange-50/60 dark:from-slate-900 dark:via-slate-900 dark:to-orange-950/20',
        ];
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-1.5 py-1.5 sm:px-5 sm:py-4 lg:px-6">
            @if($playerAudio)
                <div class="mx-auto mb-3 max-w-3xl sm:mb-5">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="rounded-[1.1rem] border border-orange-100/90 bg-white/95 p-2 shadow-[0_18px_44px_rgba(15,23,42,0.075)] backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/92 sm:rounded-[1.6rem] sm:p-4 lg:p-5">
                <div class="mb-2.5 flex flex-col gap-2 sm:mb-4 lg:flex-row lg:items-center lg:justify-between">
                    <h2 class="text-balance text-sm font-black leading-tight tracking-[-0.03em] text-slate-950 dark:text-white sm:text-xl lg:text-2xl">
                        {{ $activityTitle }}
                    </h2>

                    <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 max-sm:w-full">
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-1.5 text-[0.68rem] font-black text-emerald-700 shadow-sm dark:border-emerald-400/20 dark:bg-emerald-950/25 dark:text-emerald-200 sm:px-3 sm:text-xs">
                            <span>Score</span>
                            <span><span id="score">0</span>/<span>{{ $pairs->count() }}</span></span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-rose-100 bg-rose-50 px-2.5 py-1.5 text-[0.68rem] font-black text-rose-700 shadow-sm dark:border-rose-400/20 dark:bg-rose-950/25 dark:text-rose-200 sm:px-3 sm:text-xs">
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

                <div id="matchBoard" class="relative mx-auto grid w-full touch-none grid-cols-2 items-center gap-x-7 gap-y-1.5 min-[380px]:gap-x-8 sm:gap-x-14 sm:gap-y-2.5 md:gap-x-20 lg:gap-x-24 xl:gap-x-32">
                    <svg id="lineLayer" class="pointer-events-none absolute inset-0 z-[5] h-full w-full overflow-visible" aria-hidden="true"></svg>

                    @foreach($leftItems as $index => $item)
                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }} {{ $rowToneClasses[$index % count($rowToneClasses)] }}"
                                data-side="left"
                                data-id="{{ $item['id'] }}"
                                data-row-tone="{{ $index % 4 }}"
                                aria-label="Select {{ strip_tags($item['content']['text'] ?? $item['content']['word'] ?? 'left item') }}"
                        >
                            <span class="px-2 sm:px-6">
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
                            <span class="px-2 sm:px-6">
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
            const activeLineClass = 'stroke-orange-500 opacity-90 [stroke-linecap:round] [stroke-width:4.5] drop-shadow-sm dark:stroke-orange-300 max-sm:[stroke-width:3.5]';

            const stateClasses = {
                selected: [
                    '-translate-y-0.5',
                    '!border-orange-500',
                    '!bg-orange-50',
                    '!bg-none',
                    'ring-4',
                    'ring-orange-400/25',
                    'shadow-[0_16px_34px_rgba(249,115,22,0.18)]',
                    'dark:!border-orange-300',
                    'dark:!bg-orange-950/35',
                    'dark:ring-orange-300/15',
                ],
                target: [
                    '!border-amber-400',
                    'ring-4',
                    'ring-amber-300/18',
                    'dark:!border-amber-300/80',
                    'dark:ring-amber-300/12',
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
                    'after:!ring-orange-300',
                    'dark:after:!bg-white',
                    'dark:after:!ring-orange-200/40',
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
