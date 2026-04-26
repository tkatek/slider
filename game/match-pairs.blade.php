@extends('slider.simple-layout')

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
            background: linear-gradient(90deg, #8b5cf6, #f97316);
            transform-origin: left center;
            pointer-events: none;
        }

        .mp-line.is-drawing {
            background: linear-gradient(90deg, #a78bfa, #fb923c);
            opacity: .86;
        }

        .mp-card {
            min-height: 92px;
            border: 2px solid rgba(226, 232, 240, .9); 
            background: rgba(255, 255, 255, .92);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background-color .18s ease;
            cursor: default;
        }

        .mp-card:hover {
            transform: translateY(-2px);
            border-color: rgba(168, 85, 247, .55);
            box-shadow: 0 16px 36px rgba(15, 23, 42, .10);
        }

        .mp-card.is-selected,
        .mp-card.is-target {
            transform: translateY(-2px);
            border-color: rgb(139 92 246);
            background: rgb(245 243 255);
            box-shadow: 0 18px 42px rgba(124, 58, 237, .16);
        }

        .mp-card.is-correct {
            border-color: rgb(249 115 22);
            background: rgb(255 247 237);
            box-shadow: 0 14px 32px rgba(249, 115, 22, .14);
        }

        .mp-card.is-wrong {
            border-color: rgb(244 63 94);
            background: rgb(255 241 242);
            animation: mpShake .32s ease-in-out;
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
            box-shadow: 0 8px 18px rgba(24, 24, 27, .20);
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
            border-color: rgba(39, 39, 42, .72);
            transform: translateY(-50%) scale(1.06);
            box-shadow: 0 10px 22px rgba(24, 24, 27, .28);
        }

        .mp-card:disabled .mp-connector {
            opacity: .55;
            cursor: default;
        }

        .mp-picture-frame {
            aspect-ratio: 5 / 4;
            width: min(100%, 108px);
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
            font-size: clamp(.82rem, 1.35vw, 1.08rem);
            font-weight: 900;
            line-height: 1.25;
            color: #0f172a;
        }

        .dark .mp-card {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(15, 23, 42, .88);
        }

        .dark .mp-card.is-selected,
        .dark .mp-card.is-target {
            border-color: rgb(196 181 253);
            background: rgba(76, 29, 149, .58);
        }

        .dark .mp-card.is-correct {
            border-color: rgb(251 146 60);
            background: rgba(124, 45, 18, .50);
        }

        .dark .mp-card.is-wrong {
            border-color: rgb(251 113 133);
            background: rgba(136, 19, 55, .42);
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

        @keyframes mpShake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @media (max-width: 640px) {
            .mp-card {
                min-height: 78px;
                padding: .5rem !important;
                border-radius: .9rem !important;
            }

            .mp-picture-frame {
                width: min(100%, 76px);
            }

            .mp-line {
                height: 3px;
            }

            .mp-connector {
                width: 16px;
                height: 28px;
            }

            .mp-connector-start {
                right: -16px;
            }

            .mp-connector-target {
                left: -16px;
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

        <section class="mx-auto w-full max-w-5xl px-4 py-5 sm:px-8">
            @if($playerAudio)
                <div class="mx-auto mb-5 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="relative overflow-hidden rounded-[1.5rem] border border-slate-200/70 bg-white/85 p-4 shadow-[0_18px_45px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/55 sm:p-6">
                <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(168,85,247,0.12)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(249,115,22,0.12)_0%,transparent_55%)]"></div>

                <div class="relative">
                    <h2 class="mb-5 text-left text-base font-black text-slate-900 dark:text-white sm:mb-6 sm:text-2xl">
                        {{ $activityTitle }}
                    </h2>

                    <div id="matchBoard" class="mp-board grid grid-cols-2 items-center gap-x-14 gap-y-2 sm:gap-x-28 sm:gap-y-3 lg:gap-x-40">
                        <div id="lineLayer" class="mp-line-layer"></div>

                        @foreach($leftItems as $index => $item)
                            <button
                                    type="button"
                                    class="match-card mp-card relative z-10 flex w-full items-center justify-center rounded-2xl p-2 text-center"
                                    data-side="left"
                                    data-id="{{ $item['id'] }}"
                            >
                                {!! $renderMatchItem($item['content']) !!}
                                <span class="mp-connector mp-connector-start" data-connector="start" aria-hidden="true"></span>
                            </button>

                            <button
                                    type="button"
                                    class="match-card mp-card relative z-10 flex w-full items-center justify-center rounded-2xl p-3 text-center"
                                    data-side="right"
                                    data-id="{{ $rightItems[$index]['id'] }}"
                            >
                                {!! $renderMatchItem($rightItems[$index]['content']) !!}
                                <span class="mp-connector mp-connector-target" data-connector="target" aria-hidden="true"></span>
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-5 flex items-center justify-center gap-3">
                        <button
                                id="resetMatchGame"
                                type="button"
                                class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-black text-slate-700 shadow-sm transition hover:scale-105 dark:border-slate-700 dark:bg-slate-900 dark:text-white"
                        >
                            Reset
                        </button>
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
        ])
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const board = document.getElementById('matchBoard');
            const lineLayer = document.getElementById('lineLayer');
            const resetBtn = document.getElementById('resetMatchGame');
            const cards = Array.from(document.querySelectorAll('.match-card'));
            const totalPairs = Number(@json($pairs->count()));

            let selectedLeft = null;
            let activeLeft = null;
            let activeLine = null;
            let activePointerId = null;
            let completed = new Set();
            let mistakes = 0;
            let lines = [];

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
                    setTimeout(showWinModal, 250);
                }
            }

            function finishWrong(leftCard, rightCard) {
                mistakes++;
                updateStats();

                leftCard.classList.add('is-wrong');
                rightCard?.classList.add('is-wrong');

                setTimeout(() => {
                    leftCard.classList.remove('is-wrong');
                    rightCard?.classList.remove('is-wrong');
                }, 450);
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

            resetBtn?.addEventListener('click', () => {
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

                lines.forEach(line => line.remove());
                lines = [];

                hideWinModal();
                updateStats();
            });

            document.getElementById('restartBtnModal')?.addEventListener('click', () => {
                resetBtn?.click();
            });

            document.getElementById('continueBtnModal')?.addEventListener('click', () => {
                hideWinModal();
            });

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.addEventListener('resize', () => {
                lines.forEach(line => line.remove());
                lines = [];

                completed.forEach(id => {
                    const left = document.querySelector(`.match-card[data-side="left"][data-id="${CSS.escape(id)}"]`);
                    const right = document.querySelector(`.match-card[data-side="right"][data-id="${CSS.escape(id)}"]`);

                    if (left && right) drawLine(left, right);
                });
            });

            window.resetSlide = () => {
                stopSlideMedia();
                resetBtn?.click();
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
