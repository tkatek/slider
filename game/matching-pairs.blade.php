@extends('slider.simple-layout')

@section('content')
    @php
        $pairs = collect($content['pairs'] ?? [])->values();
        $pairById = $pairs->keyBy('id');

        // Keeps older listening slides compatible with the existing audio player.
        $playerAudio = !empty($content['audio']) ? $content['audio'] : null;
        $scriptLines = is_array($content['script'] ?? null)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['script']), static fn ($line) => $line !== ''))
            : [];
        $hasScript = $scriptLines !== [];

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

        if (filter_var($content['shuffle_right'] ?? false, FILTER_VALIDATE_BOOLEAN) && $rightItems->count() > 1) {
            $originalRightOrder = $rightItems->pluck('id')->values()->all();
            $rightItems = $rightItems->shuffle()->values();

            if ($rightItems->pluck('id')->values()->all() === $originalRightOrder) {
                $rightItems = $rightItems->slice(1)->concat($rightItems->slice(0, 1))->values();
            }
        }

        $activityTitle = $content['activity_title'] ?? $content['directions'] ?? 'Match the items.';
        $leftLabel = $content['left_label'] ?? 'Items';
        $rightLabel = $content['right_label'] ?? 'Matches';

        $itemTextLength = static function ($item) {
            $raw = $item['content']['text'] ?? $item['content']['word'] ?? $item['content']['html'] ?? '';
            $text = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $raw)));

            return function_exists('mb_strlen') ? mb_strlen($text) : strlen($text);
        };

        $leftMaxLength = (int) ($leftItems->map($itemTextLength)->max() ?? 0);
        $rightMaxLength = (int) ($rightItems->map($itemTextLength)->max() ?? 0);
        $maxTextLength = max($leftMaxLength, $rightMaxLength);
        $pairCount = $pairs->count();
        $isDense = $pairCount >= 8;
        $isVeryDense = $pairCount >= 10;

        // Adaptive width: short games no longer look tiny, long-sentence games still get enough room.
        $idealBoardWidthRem = match (true) {
            $pairCount <= 3 && $maxTextLength <= 16 => '46rem',
            $pairCount <= 5 && $maxTextLength <= 28 => '52rem',
            $maxTextLength <= 34 => '58rem',
            $maxTextLength <= 56 => '66rem',
            default => '72rem',
        };

        // XL screens have much more room, so expand the game without affecting md/sm/mobile layouts.
        $xlBoardWidthRem = match (true) {
            $pairCount <= 3 && $maxTextLength <= 16 => '58rem',
            $pairCount <= 5 && $maxTextLength <= 28 => '64rem',
            $maxTextLength <= 34 => '72rem',
            $maxTextLength <= 56 => '80rem',
            default => '86rem',
        };

        $leftColumnFr = '1fr';
        $rightColumnFr = '1fr';
        $lengthDifference = $leftMaxLength - $rightMaxLength;

        if ($lengthDifference >= 34) {
            $leftColumnFr = '1.55fr';
            $rightColumnFr = '.9fr';
        } elseif ($lengthDifference >= 16) {
            $leftColumnFr = '1.3fr';
            $rightColumnFr = '1fr';
        } elseif ($lengthDifference <= -34) {
            $leftColumnFr = '.9fr';
            $rightColumnFr = '1.55fr';
        } elseif ($lengthDifference <= -16) {
            $leftColumnFr = '1fr';
            $rightColumnFr = '1.3fr';
        }

        $mobileLeftFr = $leftColumnFr;
        $mobileRightFr = $rightColumnFr;

        // Keep mobile readable but prevent one side from becoming too narrow.
        if ($lengthDifference >= 22) {
            $mobileLeftFr = '1.28fr';
            $mobileRightFr = '.9fr';
        } elseif ($lengthDifference <= -22) {
            $mobileLeftFr = '.9fr';
            $mobileRightFr = '1.28fr';
        }

        $boardRowGap = $isVeryDense ? '.32rem' : ($isDense ? '.42rem' : '.55rem');

        $cardSizeClass = $isVeryDense
            ? 'min-h-[34px] px-2 py-1 sm:min-h-[38px] sm:px-2.5 sm:py-1.5 xl:min-h-[40px] xl:px-3 xl:py-1.5'
            : ($isDense
                ? 'min-h-[38px] px-2.5 py-1.5 sm:min-h-[42px] sm:px-3 sm:py-1.5 xl:min-h-[46px] xl:px-4 xl:py-2'
                : 'min-h-[44px] px-2.5 py-2 sm:min-h-[48px] sm:px-3.5 sm:py-2 xl:min-h-[52px] xl:px-4 xl:py-2.5');

        $wordSizeClass = $isVeryDense
            ? 'text-[0.62rem] sm:text-[0.72rem] md:text-[0.78rem] xl:text-[0.84rem]'
            : ($isDense
                ? 'text-[0.66rem] sm:text-[0.76rem] md:text-[0.82rem] xl:text-[0.92rem]'
                : 'text-[0.72rem] sm:text-[0.82rem] md:text-[0.9rem] xl:text-[0.98rem]');

        $pictureFrameClass = 'grid aspect-[5/4] w-full max-w-[4rem] place-items-center overflow-hidden rounded-lg border border-slate-200 bg-white shadow-inner';
        $imageClass = 'pointer-events-none h-full w-full object-contain';
        $wordClass = 'match-word block w-full min-w-0 break-words text-left font-bold leading-snug text-slate-800 dark:text-slate-100 ' . $wordSizeClass;

        $renderMatchItem = function ($item) use ($pictureFrameClass, $imageClass, $wordClass) {
            $type = $item['type'] ?? 'word';

            if ($type === 'image') {
                $src = $item['src'] ?? $item['image'] ?? '';
                $alt = $item['alt'] ?? '';

                return '<span class="' . $pictureFrameClass . '"><img src="' . e($src) . '" alt="' . e($alt) . '" class="' . $imageClass . '" draggable="false"></span>';
            }

            if (!empty($item['html'])) {
                return '<span class="' . $wordClass . '">' . $item['html'] . '</span>';
            }

            $text = $item['text'] ?? $item['word'] ?? '';

            return '<span class="' . $wordClass . '">' . nl2br(e($text)) . '</span>';
        };

        $themeName = $theme['name'] ?? 'default';
        $themePrimaryButtonColor = trim((string) ($theme['button_primary_color'] ?? ''));

        if ($themePrimaryButtonColor === '') {
            $themePrimaryButtonColor = match ($themeName) {
                'orange' => 'bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus-visible:ring-orange-200',
                'green' => 'bg-gradient-to-br from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 focus-visible:ring-emerald-200',
                'purple' => 'bg-gradient-to-br from-violet-500 to-violet-600 hover:from-violet-600 hover:to-violet-700 focus-visible:ring-violet-200',
                'blue' => 'bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus-visible:ring-blue-200',
                default => 'bg-gradient-to-br from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 focus-visible:ring-indigo-200',
            };
        }

        $matchButtonClass = 'inline-flex h-6 items-center justify-center rounded-full border border-slate-200 bg-white px-2.5 text-[0.62rem] font-black text-slate-700 shadow-sm transition hover:bg-slate-50 hover:text-slate-950 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:h-7 sm:px-3 sm:text-[0.7rem] md:h-8 md:px-3.5 md:text-xs xl:px-4';
        $modalSecondaryButtonClass = 'inline-flex min-h-10 items-center justify-center rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-black text-slate-700 shadow-sm transition hover:bg-slate-50 hover:text-slate-950 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:min-h-11 sm:px-6 sm:text-base';
        $modalPrimaryButtonClass = 'inline-flex min-h-10 items-center justify-center rounded-full px-5 py-2.5 text-sm font-black text-white shadow-lg transition hover:brightness-105 focus-visible:outline-none focus-visible:ring-4 sm:min-h-11 sm:px-6 sm:text-base ' . $themePrimaryButtonColor;

        $matchCardBaseClass = 'match-card relative z-10 flex h-full w-full cursor-pointer select-none items-center justify-start rounded-xl border border-slate-200 bg-white/95 text-left shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-emerald-300 hover:shadow-md focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 ' . $cardSizeClass;
        $matchConnectorStartClass = 'match-connector match-connector-start absolute right-[-10px] top-1/2 z-20 grid h-7 w-7 -translate-y-1/2 cursor-grab touch-none place-items-center rounded-full active:cursor-grabbing sm:right-[-14px] sm:h-8 sm:w-8';
        $matchConnectorTargetClass = 'match-connector match-connector-target absolute left-[-10px] top-1/2 z-20 grid h-7 w-7 -translate-y-1/2 cursor-pointer touch-none place-items-center rounded-full sm:left-[-14px] sm:h-8 sm:w-8';
        $themeColumnLabelColors = match ($themeName) {
            'orange' => 'border-orange-200 bg-orange-50/90 text-orange-700 dark:border-orange-800/70 dark:bg-orange-950/30 dark:text-orange-200',
            'green' => 'border-emerald-200 bg-emerald-50/90 text-emerald-700 dark:border-emerald-800/70 dark:bg-emerald-950/30 dark:text-emerald-200',
            'purple' => 'border-violet-200 bg-violet-50/90 text-violet-700 dark:border-violet-800/70 dark:bg-violet-950/30 dark:text-violet-200',
            'blue' => 'border-blue-200 bg-blue-50/90 text-blue-700 dark:border-blue-800/70 dark:bg-blue-950/30 dark:text-blue-200',
            default => 'border-indigo-200 bg-indigo-50/90 text-indigo-700 dark:border-indigo-800/70 dark:bg-indigo-950/30 dark:text-indigo-200',
        };

        $matchColumnLabelClass = 'flex min-h-[1.7rem] items-center justify-center rounded-lg border px-2 py-1 text-center text-[0.58rem] font-black uppercase tracking-[0.18em] shadow-sm sm:min-h-[1.9rem] sm:text-[0.65rem] ' . $themeColumnLabelColors;
    @endphp

    <style>
        .match-panel {
            width: min(100%, var(--ideal-board-width));
        }

        .match-board-grid {
            --match-center-gap: clamp(2.75rem, 5vw, 5.75rem);
            width: 100%;
            grid-template-columns: minmax(0, var(--left-col-fr)) var(--match-center-gap) minmax(0, var(--right-col-fr));
            column-gap: 0;
            row-gap: {{ $boardRowGap }};
        }

        .match-board-grid > [data-col="left"],
        .match-board-grid > [data-side="left"] {
            grid-column: 1;
        }

        .match-board-grid > [data-col="right"],
        .match-board-grid > [data-side="right"] {
            grid-column: 3;
        }

        @media (max-width: 640px) {
            .match-board-grid {
                --match-center-gap: clamp(1.55rem, 6vw, 2.1rem);
                grid-template-columns: minmax(0, var(--left-mobile-fr)) var(--match-center-gap) minmax(0, var(--right-mobile-fr));
            }
        }

        @media (min-width: 641px) and (max-width: 900px) {
            .match-board-grid {
                --match-center-gap: clamp(2.15rem, 4.6vw, 3.5rem);
                grid-template-columns: minmax(0, var(--left-mobile-fr)) var(--match-center-gap) minmax(0, var(--right-mobile-fr));
            }
        }

        @media (min-width: 1280px) {
            .match-panel {
                width: min(100%, var(--xl-board-width));
            }

            .match-board-grid {
                --match-center-gap: clamp(4rem, 5vw, 7rem);
            }
        }

        .match-card.is-selected {
            border-color: rgb(52 211 153);
            background: rgb(236 253 245);
            box-shadow: 0 0 0 3px rgb(209 250 229), 0 12px 24px -20px rgba(15, 23, 42, .35);
        }

        .match-card.is-target {
            border-color: rgb(103 232 249);
            background: rgba(236, 254, 255, .72);
        }

        .match-card.is-correct {
            border-color: rgb(16 185 129);
            background: rgb(236 253 245);
        }

        .match-card.is-wrong {
            border-color: rgb(244 63 94);
            background: rgb(255 241 242);
            animation: matchShake .32s ease;
        }

        .dark .match-card.is-selected {
            border-color: rgb(52 211 153);
            background: rgba(6, 78, 59, .42);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .18), 0 12px 24px -20px rgba(0, 0, 0, .65);
        }

        .dark .match-card.is-target {
            border-color: rgb(34 211 238);
            background: rgba(8, 47, 73, .42);
        }

        .dark .match-card.is-correct {
            border-color: rgb(52 211 153);
            background: rgba(6, 78, 59, .50);
            box-shadow: inset 0 0 0 1px rgba(167, 243, 208, .14);
        }

        .dark .match-card.is-wrong {
            border-color: rgb(248 113 113);
            background: rgba(127, 29, 29, .42);
        }

        .dark .match-card.is-selected .match-word,
        .dark .match-card.is-target .match-word,
        .dark .match-card.is-correct .match-word,
        .dark .match-card.is-wrong .match-word {
            color: rgb(248 250 252);
        }

        .match-card:disabled {
            cursor: default;
            opacity: 1;
            transform: none;
        }

        .match-connector::after {
            content: "";
            display: block;
            width: .58rem;
            height: .58rem;
            border-radius: 999px;
            border: 2px solid #fff;
            background: #94a3b8;
            box-shadow: 0 5px 14px rgba(15, 23, 42, .18);
            outline: 2px solid rgba(148, 163, 184, .25);
            transition: transform .16s ease, background-color .16s ease, outline-color .16s ease;
        }

        @media (min-width: 640px) {
            .match-connector::after {
                width: .68rem;
                height: .68rem;
            }
        }

        .match-card:hover .match-connector::after,
        .match-connector.is-hot::after {
            transform: scale(1.08);
            background: #10b981;
            outline-color: rgba(16, 185, 129, .22);
        }

        .match-card.is-correct .match-connector::after {
            background: #10b981;
            outline-color: rgba(16, 185, 129, .24);
        }

        .match-line,
        .match-active-line {
            stroke-linecap: round;
            filter: drop-shadow(0 4px 8px rgba(15, 23, 42, .14));
        }

        .match-line {
            stroke: #10b981;
            stroke-width: 3.25;
            opacity: .9;
        }

        .match-active-line {
            stroke: #06b6d4;
            stroke-width: 3.25;
            opacity: .95;
        }

        @keyframes matchShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }
    </style>

    <main id="matchingPairsShell" class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-2 py-1.5 sm:px-4 sm:py-2">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl xl:max-w-[90rem]">
            @if($playerAudio)
                <div class="mx-auto mb-2 w-full max-w-3xl sm:mb-2.5">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div
                    class="match-panel mx-auto rounded-2xl border border-slate-200/80 bg-white/90 p-2.5 shadow-sm shadow-slate-200/60 dark:border-slate-800 dark:bg-slate-950/40 dark:shadow-none sm:p-3"
                    style="--ideal-board-width: {{ $idealBoardWidthRem }}; --xl-board-width: {{ $xlBoardWidthRem }}; --left-col-fr: {{ $leftColumnFr }}; --right-col-fr: {{ $rightColumnFr }}; --left-mobile-fr: {{ $mobileLeftFr }}; --right-mobile-fr: {{ $mobileRightFr }};"
            >
                <div class="mb-2 flex items-start justify-between gap-2 sm:mb-2.5">
                    <h2 class="min-w-0 flex-1 text-[0.7rem] font-black leading-tight text-slate-950 dark:text-white sm:text-xs md:text-sm lg:text-base">
                        {{ $activityTitle }}
                    </h2>

                    <div class="flex shrink-0 items-center gap-1.5 sm:gap-2">
                        <div class="inline-flex h-6 items-center gap-1 rounded-full border border-rose-200 bg-rose-50/80 px-2 text-[0.6rem] font-black text-rose-700 shadow-sm dark:border-rose-900/60 dark:bg-rose-950/30 dark:text-rose-200 sm:h-7 sm:px-2.5 sm:text-[0.68rem] md:text-xs xl:px-3">
                            <span>Mistakes</span>
                            <span id="mistakes" class="rounded-full bg-white/80 px-1.5 py-0.5 text-[0.58rem] leading-none text-rose-700 ring-1 ring-rose-200 dark:bg-rose-900/40 dark:text-rose-100 dark:ring-rose-800/70 sm:text-[0.65rem]">0</span>
                        </div>

                        <button id="revealMatchAnswers" type="button" class="{{ $matchButtonClass }}">
                            Reveal
                        </button>
                    </div>
                </div>

                <div
                        id="matchBoard"
                        class="match-board-grid relative mx-auto grid touch-pan-y items-stretch"
                >
                    <svg id="lineLayer" class="pointer-events-none absolute inset-0 z-[5] h-full w-full overflow-visible" aria-hidden="true"></svg>

                    <div data-col="left" class="{{ $matchColumnLabelClass }}">{{ $leftLabel }}</div>
                    <div data-col="right" class="{{ $matchColumnLabelClass }}">{{ $rightLabel }}</div>

                    @foreach($leftItems as $index => $item)
                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }}"
                                data-side="left"
                                data-id="{{ $item['id'] }}"
                                aria-label="Select {{ strip_tags($item['content']['text'] ?? $item['content']['word'] ?? 'left item') }}"
                        >
                            <span class="min-w-0 flex-1 pr-1 sm:pr-1.5">
                                {!! $renderMatchItem($item['content']) !!}
                            </span>
                            <span class="{{ $matchConnectorStartClass }}" data-connector="start" aria-hidden="true"></span>
                        </button>

                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }}"
                                data-side="right"
                                data-id="{{ $rightItems[$index]['id'] }}"
                                aria-label="Choose {{ strip_tags($rightItems[$index]['content']['text'] ?? $rightItems[$index]['content']['word'] ?? 'right item') }}"
                        >
                            <span class="{{ $matchConnectorTargetClass }}" data-connector="target" aria-hidden="true"></span>
                            <span class="min-w-0 flex-1 pl-1 sm:pl-1.5">
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
                    'class' => $modalSecondaryButtonClass . ' w-full',
                ],
                [
                    'label' => 'Continue',
                    'id' => 'continueBtnModal',
                    'class' => $modalPrimaryButtonClass . ' w-full',
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
            const revealBtn = document.getElementById('revealMatchAnswers');
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
            const stateClasses = {
                selected: ['is-selected'],
                target: ['is-target'],
                correct: ['is-correct'],
                wrong: ['is-wrong'],
                connectorHot: ['is-hot'],
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
            let revealIsRetake = false;

            function addClasses(element, classes) {
                if (!element || classes.length === 0) return;
                element.classList.add(...classes);
            }

            function removeClasses(element, classes) {
                if (!element || classes.length === 0) return;
                element.classList.remove(...classes);
            }

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function updateStats() {
                const mistakesEl = document.getElementById('mistakes');
                if (mistakesEl) mistakesEl.textContent = mistakes;
            }

            function setRevealButtonToRetake(enabled) {
                revealIsRetake = enabled;
                if (revealBtn) revealBtn.textContent = enabled ? 'Retake' : 'Reveal';
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
                line.setAttribute('class', 'match-line');
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

            function redrawLines() {
                syncLineLayer();
                removeLines();

                completed.forEach(id => {
                    const left = document.querySelector(`.match-card[data-side="left"][data-id="${CSS.escape(id)}"]`);
                    const right = document.querySelector(`.match-card[data-side="right"][data-id="${CSS.escape(id)}"]`);
                    if (left && right) drawLine(left, right);
                });
            }

            function createActiveLine(leftCard, event) {
                syncLineLayer();

                activeLine = document.createElementNS(svgNamespace, 'line');
                activeLine.setAttribute('class', 'match-active-line');
                lineLayer.appendChild(activeLine);

                positionLine(
                    activeLine,
                    connectorPoint(leftCard, '[data-connector="start"]'),
                    boardPoint(event.clientX, event.clientY)
                );
            }

            function resetConnectorStates() {
                document
                    .querySelectorAll('[data-connector]')
                    .forEach(connector => removeClasses(connector, stateClasses.connectorHot));
            }

            function setConnectorState(card, selector, enabled = true) {
                const connector = card?.querySelector?.(selector);
                if (!connector) return;

                if (enabled) addClasses(connector, stateClasses.connectorHot);
                else removeClasses(connector, stateClasses.connectorHot);
            }

            function clearSelection() {
                cards.forEach(card => {
                    removeClasses(card, stateClasses.selected);
                    removeClasses(card, stateClasses.target);
                });

                resetConnectorStates();
                selectedLeft = null;
            }

            function selectLeftCard(leftCard, play = true) {
                if (!leftCard || leftCard.disabled) return;

                clearSelection();
                selectedLeft = leftCard;

                addClasses(leftCard, stateClasses.selected);
                setConnectorState(leftCard, '[data-connector="start"]', true);

                cards
                    .filter(card => card.dataset.side === 'right' && !card.disabled)
                    .forEach(card => {
                        addClasses(card, stateClasses.target);
                        setConnectorState(card, '[data-connector="target"]', true);
                    });

                if (play) playSfx('tap');
            }

            function getRightCardAt(clientX, clientY) {
                const element = document.elementFromPoint(clientX, clientY);
                return element?.closest?.('.match-card[data-side="right"]') || null;
            }

            function finishCorrect(leftCard, rightCard) {
                removeClasses(leftCard, [...stateClasses.selected, ...stateClasses.target, ...stateClasses.wrong]);
                removeClasses(rightCard, [...stateClasses.selected, ...stateClasses.target, ...stateClasses.wrong]);

                addClasses(leftCard, stateClasses.correct);
                addClasses(rightCard, stateClasses.correct);

                leftCard.disabled = true;
                rightCard.disabled = true;

                completed.add(leftCard.dataset.id);
                drawLine(leftCard, rightCard);
                updateStats();

                if (completed.size === totalPairs) {
                    setRevealButtonToRetake(true);
                    playSfx('success');
                    setTimeout(showWinModal, 250);
                } else {
                    playSfx('correct');
                }
            }

            function finishWrong(leftCard, rightCard) {
                if (!rightCard || rightCard.disabled) return;

                mistakes++;
                updateStats();
                playSfx('wrong');

                addClasses(leftCard, stateClasses.wrong);
                addClasses(rightCard, stateClasses.wrong);

                setTimeout(() => {
                    removeClasses(leftCard, stateClasses.wrong);
                    removeClasses(rightCard, stateClasses.wrong);
                }, 430);
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
                    removeClasses(card, cardStateClasses);
                });

                resetConnectorStates();
                removeLines();
                hideWinModal();
                updateStats();
                setRevealButtonToRetake(false);
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
                setRevealButtonToRetake(true);
                playSfx('success');
            }

            function endConnection(event) {
                if (!activeLeft || !activeLine || event.pointerId !== activePointerId) return;

                const leftCard = activeLeft;
                const rightCard = getRightCardAt(event.clientX, event.clientY);
                const pointerId = activePointerId;

                activeLine.remove();
                activeLine = null;

                if (rightCard && !rightCard.disabled) {
                    if (rightCard.dataset.id === leftCard.dataset.id) {
                        finishCorrect(leftCard, rightCard);
                        clearSelection();
                    } else {
                        finishWrong(leftCard, rightCard);
                        selectLeftCard(leftCard, false);
                    }
                } else {
                    selectLeftCard(leftCard, false);
                }

                try {
                    leftCard.releasePointerCapture?.(pointerId);
                } catch (error) {}

                activeLeft = null;
                activePointerId = null;
            }

            document.querySelectorAll('[data-connector="start"]').forEach(connector => {
                connector.addEventListener('click', event => event.stopPropagation());

                connector.addEventListener('pointerdown', event => {
                    const leftCard = connector.closest('.match-card[data-side="left"]');
                    if (!leftCard || leftCard.disabled) return;

                    event.preventDefault();
                    event.stopPropagation();

                    selectLeftCard(leftCard, false);
                    activeLeft = leftCard;
                    activePointerId = event.pointerId;

                    playSfx('tap');
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
                        selectLeftCard(card);
                        return;
                    }

                    if (!selectedLeft || card.dataset.side !== 'right') return;

                    if (card.dataset.id === selectedLeft.dataset.id) {
                        finishCorrect(selectedLeft, card);
                        clearSelection();
                    } else {
                        const leftCard = selectedLeft;
                        finishWrong(leftCard, card);
                        selectLeftCard(leftCard, false);
                    }
                });
            });

            revealBtn?.addEventListener('click', () => {
                if (revealIsRetake) {
                    resetGame();
                    return;
                }

                revealAnswers();
            });

            document.getElementById('restartBtnModal')?.addEventListener('click', resetGame);
            document.getElementById('continueBtnModal')?.addEventListener('click', hideWinModal);

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.addEventListener('resize', redrawLines);
            window.addEventListener('load', redrawLines);
            document.fonts?.ready?.then(redrawLines);

            window.resetSlide = () => {
                stopSlideMedia();
                resetGame();
            };

            window.stopSlideAudio = stopSlideMedia;
            window.destroySlide = stopSlideMedia;

            syncLineLayer();
            updateStats();
        });
    </script>
@endsection
