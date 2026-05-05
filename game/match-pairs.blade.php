@extends('slider.simple-layout')

@php
    $matchPrimaryBtnClass = ($theme['name'] ?? null) === 'orange'
        ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-orange-500/20'
        : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-indigo-500/20';
@endphp

@section('style')
    <style>
        .mp-board {
            position: relative;
            max-width: 980px;
            margin-inline: auto;
            touch-action: none;
        }

        .mp-line-layer {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 5;
        }

        .mp-line {
            position: absolute;
            height: 4px;
            border-radius: 999px;
            background: linear-gradient(90deg, #475569, #18181b);
            box-shadow: 0 8px 18px rgba(15, 23, 42, .10);
            transform-origin: left center;
            pointer-events: none;
        }

        .mp-line.is-drawing {
            background: linear-gradient(90deg, #64748b, #27272a);
            opacity: .86;
        }

        .mp-card {
            min-height: 66px;
            border: 2px solid rgba(226, 232, 240, .86);
            background:
                linear-gradient(180deg, rgba(255, 255, 255, .98), rgba(248, 250, 252, .92));
            box-shadow: 0 8px 22px rgba(15, 23, 42, .05);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background-color .18s ease;
            cursor: default;
        }

        .mp-card:hover {
            transform: translateY(-2px);
            border-color: rgba(100, 116, 139, .50);
            box-shadow: 0 12px 28px rgba(15, 23, 42, .08);
        }

        .mp-card.is-selected,
        .mp-card.is-target {
            transform: translateY(-2px);
            border-color: rgb(100 116 139);
            background:
                radial-gradient(90% 90% at 0% 0%, rgba(100, 116, 139, .12) 0%, transparent 56%),
                rgb(248 250 252);
            box-shadow: 0 14px 32px rgba(15, 23, 42, .10);
        }

        .mp-card.is-correct {
            border-color: rgb(63 63 70);
            background:
                radial-gradient(90% 90% at 100% 0%, rgba(63, 63, 70, .10) 0%, transparent 58%),
                rgb(244 244 245);
            box-shadow: 0 12px 28px rgba(39, 39, 42, .10);
        }

        .mp-card.is-wrong {
            border-color: rgb(244 63 94);
            background: rgb(255 241 242);
            animation: mpShake .32s ease-in-out;
        }

        .mp-card[data-row-tone="0"] {
            background: linear-gradient(180deg, rgba(255, 247, 237, .94), rgba(255, 255, 255, .9));
        }

        .mp-card[data-row-tone="1"] {
            background: linear-gradient(180deg, rgba(240, 249, 255, .94), rgba(255, 255, 255, .9));
        }

        .mp-card[data-row-tone="2"] {
            background: linear-gradient(180deg, rgba(245, 243, 255, .94), rgba(255, 255, 255, .9));
        }

        .mp-card[data-row-tone="3"] {
            background: linear-gradient(180deg, rgba(240, 253, 244, .94), rgba(255, 255, 255, .9));
        }

        .mp-connector {
            position: absolute;
            top: 50%;
            z-index: 20;
            display: grid;
            width: 18px;
            height: 34px;
            place-items: center;
            border: 2px solid rgba(63, 63, 70, .42);
            background: linear-gradient(135deg, #71717a, #3f3f46, #18181b);
            box-shadow: 0 8px 18px rgba(24, 24, 27, .18);
            transform: translateY(-50%);
            transition: transform .18s ease, box-shadow .18s ease, opacity .18s ease, border-color .18s ease;
            touch-action: none;
        }

        .mp-connector::after {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 999px;
            background: #ffffff;
            box-shadow: none;
        }

        .mp-connector-start {
            right: -18px;
            border-radius: 0 999px 999px 0;
            border-left: 0;
            cursor: grab;
        }

        .mp-connector-start:active {
            cursor: grabbing;
        }

        .mp-connector-target {
            left: -18px;
            border-radius: 999px 0 0 999px;
            border-right: 0;
        }

        .mp-card.is-selected .mp-connector-start,
        .mp-card.is-target .mp-connector-target,
        .mp-connector:hover {
            border-color: rgba(39, 39, 42, .68);
            transform: translateY(-50%) scale(1.06);
            box-shadow: 0 10px 22px rgba(24, 24, 27, .24);
        }

        .mp-card:disabled .mp-connector {
            opacity: .55;
            cursor: default;
        }

        .mp-picture-frame {
            aspect-ratio: 5 / 4;
            width: min(100%, 82px);
            display: grid;
            place-items: center;
            overflow: hidden;
            border-radius: .75rem;
            background: #fff;
        }

        .mp-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
        }

        .mp-word {
            font-size: clamp(.68rem, .9vw, .82rem);
            font-weight: 800;
            line-height: 1.18;
            color: #0f172a;
        }

        .mp-btn {
            border-radius: 12px;
            padding: .52rem .82rem;
            font-size: .76rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .mp-btn:hover {
            transform: translateY(-1px);
        }

        .mp-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            color: #fff;
            box-shadow: 0 10px 22px var(--mp-btn-shadow, rgba(24, 24, 27, .14));
        }

        .mp-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .mp-btn-neutral {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #71717a, #3f3f46, #18181b);
            color: #fff;
            box-shadow: 0 10px 22px rgba(24, 24, 27, .14);
        }

        .dark .mp-card {
            border-color: rgba(51, 65, 85, .85);
            background:
                linear-gradient(180deg, rgba(30, 41, 59, .92), rgba(15, 23, 42, .90));
            box-shadow: 0 12px 30px rgba(2, 6, 23, .24);
        }

        .dark .mp-card.is-selected,
        .dark .mp-card.is-target {
            border-color: rgb(148 163 184);
            background: rgba(51, 65, 85, .68);
        }

        .dark .mp-card.is-correct {
            border-color: rgb(161 161 170);
            background: rgba(39, 39, 42, .68);
        }

        .dark .mp-card.is-wrong {
            border-color: rgb(251 113 133);
            background: rgba(136, 19, 55, .42);
        }

        .dark .mp-card[data-row-tone="0"] {
            background: linear-gradient(180deg, rgba(67, 20, 7, .28), rgba(15, 23, 42, .86));
        }

        .dark .mp-card[data-row-tone="1"] {
            background: linear-gradient(180deg, rgba(12, 74, 110, .24), rgba(15, 23, 42, .86));
        }

        .dark .mp-card[data-row-tone="2"] {
            background: linear-gradient(180deg, rgba(76, 29, 149, .24), rgba(15, 23, 42, .86));
        }

        .dark .mp-card[data-row-tone="3"] {
            background: linear-gradient(180deg, rgba(20, 83, 45, .24), rgba(15, 23, 42, .86));
        }

        .dark .mp-connector {
            border-color: rgba(161, 161, 170, .38);
            background: linear-gradient(135deg, #71717a, #3f3f46, #18181b);
        }

        .dark .mp-connector::after {
            background: #e2e8f0;
        }

        .dark .mp-picture-frame {
            background: rgba(255, 255, 255, .95);
        }

        .dark .mp-word {
            color: #f8fafc;
        }

        .dark .mp-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        @keyframes mpShake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @media (max-width: 640px) {
            .mp-card {
                min-height: 64px;
                padding: .38rem !important;
                border-radius: .9rem !important;
            }

            .mp-picture-frame {
                width: min(100%, 64px);
            }

            .mp-line {
                height: 3px;
            }

            .mp-connector {
                width: 17px;
                height: 30px;
            }

            .mp-connector-start {
                right: -16px;
            }

            .mp-connector-target {
                left: -16px;
            }

            .mp-btn {
                flex: 1 1 100%;
                padding: .62rem .75rem;
            }
        }
    </style>
@endsection

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

        $renderMatchItem = function ($item) {
            $type = $item['type'] ?? 'word';

            if ($type === 'image') {
                $src = $item['src'] ?? $item['image'] ?? '';
                $alt = $item['alt'] ?? '';

                return '<span class="mp-picture-frame"><img src="' . e($src) . '" alt="' . e($alt) . '" class="mp-image" draggable="false"></span>';
            }

            return '<span class="mp-word">' . ($item['text'] ?? $item['word'] ?? '') . '</span>';
        };
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-3 py-3 sm:px-6 sm:py-4">
            @if($playerAudio)
                <div class="mx-auto mb-5 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="relative overflow-hidden rounded-[1.1rem] border border-slate-200/70 bg-white/88 p-3 shadow-[0_14px_30px_rgba(2,6,23,0.07)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/65 sm:p-4">
                <div class="pointer-events-none absolute inset-0 opacity-75 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(100,116,139,0.10)_0%,transparent_54%),radial-gradient(120%_120%_at_100%_0%,rgba(63,63,70,0.08)_0%,transparent_54%)]"></div>

                <div class="relative">
                    <div class="mb-3 flex flex-wrap items-center justify-between gap-2 sm:mb-3.5">
                        <div class="min-w-0 flex-1 rounded-xl border border-slate-200/80 bg-slate-50/75 px-3 py-2 dark:border-slate-700/70 dark:bg-slate-900/55">
                            <h2 class="text-left text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                                {{ $activityTitle }}
                            </h2>
                        </div>

                        <div class="flex flex-wrap items-center justify-end gap-2">
                            @if($showCheckButton)
                                <button id="checkMatchAnswers" type="button" class="mp-btn mp-btn-neutral">
                                    Check Answers
                                </button>
                            @endif
                            <button id="revealMatchAnswers" type="button" class="mp-btn mp-btn-primary {{ $matchPrimaryBtnClass }}">
                                Reveal answers
                            </button>
                            <button id="retakeMatchGame" type="button" class="mp-btn mp-btn-soft">
                                Retake
                            </button>
                        </div>
                    </div>

                    <div id="matchBoard" class="mp-board grid grid-cols-2 items-center gap-x-8 gap-y-1.5 sm:gap-x-16 sm:gap-y-2 lg:gap-x-24 xl:gap-x-32">
                        <div id="lineLayer" class="mp-line-layer"></div>

                        @foreach($leftItems as $index => $item)
                            <button
                                    type="button"
                                    class="match-card mp-card relative z-10 flex w-full items-center justify-center rounded-xl p-1.5 text-center"
                                    data-side="left"
                                    data-id="{{ $item['id'] }}"
                                    data-row-tone="{{ $index % 4 }}"
                            >
                                {!! $renderMatchItem($item['content']) !!}
                                <span class="mp-connector mp-connector-start" data-connector="start" aria-hidden="true"></span>
                            </button>

                            <button
                                    type="button"
                                    class="match-card mp-card relative z-10 flex w-full items-center justify-center rounded-xl p-1.5 text-center"
                                    data-side="right"
                                    data-id="{{ $rightItems[$index]['id'] }}"
                                    data-row-tone="{{ $index % 4 }}"
                            >
                                {!! $renderMatchItem($rightItems[$index]['content']) !!}
                                <span class="mp-connector mp-connector-target" data-connector="target" aria-hidden="true"></span>
                            </button>
                        @endforeach
                    </div>
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
                    'class' => 'mp-btn mp-btn-soft w-full',
                ],
                [
                    'label' => 'Continue',
                    'id' => 'continueBtnModal',
                    'class' => 'mp-btn mp-btn-primary w-full ' . $matchPrimaryBtnClass,
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

            let selectedLeft = null;
            let activeLeft = null;
            let activeLine = null;
            let activePointerId = null;
            let completed = new Set();
            let mistakes = 0;
            let lines = [];

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
                const dx = end.x - start.x;
                const dy = end.y - start.y;
                const length = Math.sqrt(dx * dx + dy * dy);
                const angle = Math.atan2(dy, dx) * 180 / Math.PI;

                line.style.width = `${length}px`;
                line.style.left = `${start.x}px`;
                line.style.top = `${start.y}px`;
                line.style.transform = `rotate(${angle}deg)`;
            }

            function drawLine(leftCard, rightCard) {
                const line = document.createElement('div');
                line.className = 'mp-line';
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
                activeLine = document.createElement('div');
                activeLine.className = 'mp-line is-drawing';
                lineLayer.appendChild(activeLine);

                positionLine(
                    activeLine,
                    connectorPoint(leftCard, '[data-connector="start"]'),
                    boardPoint(event.clientX, event.clientY)
                );
            }

            function clearSelection() {
                cards.forEach(card => card.classList.remove('is-selected', 'is-target'));
                selectedLeft = null;
            }

            function getRightCardAt(clientX, clientY) {
                const element = document.elementFromPoint(clientX, clientY);
                return element?.closest?.('.match-card[data-side="right"]') || null;
            }

            function finishCorrect(leftCard, rightCard) {
                leftCard.classList.add('is-correct');
                rightCard.classList.add('is-correct');
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

                leftCard.classList.add('is-wrong');
                rightCard?.classList.add('is-wrong');

                setTimeout(() => {
                    leftCard.classList.remove('is-wrong');
                    rightCard?.classList.remove('is-wrong');
                }, 450);
            }

            function flashUnmatchedCards() {
                const unmatchedCards = cards.filter(card => !card.disabled);

                unmatchedCards.forEach(card => card.classList.add('is-wrong'));

                setTimeout(() => {
                    unmatchedCards.forEach(card => card.classList.remove('is-wrong'));
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
                    card.classList.remove('is-selected', 'is-target', 'is-correct', 'is-wrong');
                });

                removeLines();
                hideWinModal();
                updateStats();
            }

            function revealAnswers() {
                resetGame();

                cards.forEach(card => {
                    card.classList.remove('is-selected', 'is-target', 'is-wrong');
                });

                document.querySelectorAll('.match-card[data-side="left"]').forEach(leftCard => {
                    const id = leftCard.dataset.id;
                    const rightCard = document.querySelector(`.match-card[data-side="right"][data-id="${CSS.escape(id)}"]`);

                    if (!rightCard) return;

                    leftCard.classList.add('is-correct');
                    rightCard.classList.add('is-correct');
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

                    leftCard.classList.add('is-selected');
                    playSfx('tap');
                    cards
                        .filter(item => item.dataset.side === 'right' && !item.disabled)
                        .forEach(item => item.classList.add('is-target'));

                    leftCard.setPointerCapture?.(event.pointerId);
                    createActiveLine(leftCard, event);
                });
            });

            document.querySelectorAll('[data-connector="target"]').forEach(connector => {
                connector.addEventListener('click', event => {
                    event.stopPropagation();
                });
            });

            board.addEventListener('pointermove', event => {
                if (!activeLeft || !activeLine || event.pointerId !== activePointerId) return;

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
                        card.classList.add('is-selected');
                        playSfx('tap');

                        cards
                            .filter(item => item.dataset.side === 'right' && !item.disabled)
                            .forEach(item => item.classList.add('is-target'));
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

            updateStats();
        });
    </script>
@endsection
