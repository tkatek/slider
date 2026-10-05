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
        $instruction = trim((string) ($content['instruction'] ?? ''));
        $leftLabel = $content['left_label'] ?? 'Items';
        $rightLabel = $content['right_label'] ?? 'Matches';
        $passageTitle = trim((string) ($content['passage_title'] ?? 'Reading passage'));
        $passage = is_array($content['passage'] ?? null)
            ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $content['passage']), static fn ($paragraph) => $paragraph !== ''))
            : [];
        $passageWidth = strtolower(trim((string) ($content['passage_width'] ?? 'xl:grid-cols-[minmax(19rem,0.85fr)_minmax(0,1.65fr)]')));

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

        // Keep the board wide enough for sentence matching without making the activity oversized.
        $idealBoardWidthRem = match (true) {
            $pairCount <= 3 && $maxTextLength <= 16 => '54rem',
            $pairCount <= 5 && $maxTextLength <= 28 => '62rem',
            $maxTextLength <= 34 => '68rem',
            $maxTextLength <= 56 => '76rem',
            default => '82rem',
        };

        // Add a modest width increase on large displays while preserving compact proportions.
        $xlBoardWidthRem = match (true) {
            $pairCount <= 3 && $maxTextLength <= 16 => '62rem',
            $pairCount <= 5 && $maxTextLength <= 28 => '70rem',
            $maxTextLength <= 34 => '76rem',
            $maxTextLength <= 56 => '84rem',
            default => '90rem',
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

        $boardRowGap = $isVeryDense ? '.32rem' : ($isDense ? '.4rem' : '.52rem');

        $cardSizeClass = $isVeryDense
            ? 'min-h-[36px] px-2 py-1.5 sm:min-h-[40px] sm:px-2.5 sm:py-1.5 xl:min-h-[44px] xl:px-3'
            : ($isDense
                ? 'min-h-[40px] px-2.5 py-1.5 sm:min-h-[44px] sm:px-3 sm:py-2 xl:min-h-[48px] xl:px-3.5'
                : 'min-h-[44px] px-2.5 py-2 sm:min-h-[48px] sm:px-3.5 sm:py-2.5 xl:min-h-[52px] xl:px-4');

        $wordSizeClass = $isVeryDense
            ? 'text-[0.68rem] sm:text-[0.75rem] md:text-[0.82rem] xl:text-[0.9rem]'
            : ($isDense
                ? 'text-[0.7rem] sm:text-[0.78rem] md:text-[0.86rem] xl:text-[0.95rem]'
                : 'text-[0.74rem] sm:text-[0.84rem] md:text-[0.92rem] xl:text-base');

        $pictureFrameClass = 'grid aspect-[5/4] w-full max-w-[3.75rem] place-items-center overflow-hidden rounded-lg border border-slate-200 bg-white p-0.5 shadow-sm sm:max-w-[4.25rem] xl:max-w-[4.75rem] dark:border-slate-700 dark:bg-slate-950';
        $imageClass = 'pointer-events-none h-full w-full object-contain';
        $wordClass = 'match-word block w-full min-w-0 break-words text-left font-bold leading-[1.35] text-slate-800 dark:text-slate-100 ' . $wordSizeClass;

        $showImageLabels = (bool) ($content['show_image_labels'] ?? false);

        $renderMatchItem = function ($item) use ($pictureFrameClass, $imageClass, $wordClass, $showImageLabels) {
            $type = $item['type'] ?? 'word';

            if ($type === 'image') {
                $src = $item['src'] ?? $item['image'] ?? '';
                $alt = $item['alt'] ?? '';

                $picture = '<span class="shrink-0 ' . $pictureFrameClass . '"><img src="' . e($src) . '" alt="' . e($alt) . '" class="' . $imageClass . '" draggable="false"></span>';
                $label = trim((string) ($item['text'] ?? $item['word'] ?? ''));

                if ($showImageLabels && $label !== '') {
                    return '<span class="flex min-w-0 items-center gap-3">' . $picture . '<span class="' . $wordClass . '">' . e($label) . '</span></span>';
                }

                return $picture;
            }

            if (!empty($item['html'])) {
                return '<span class="' . $wordClass . '">' . $item['html'] . '</span>';
            }

            $text = $item['text'] ?? $item['word'] ?? '';

            return '<span class="' . $wordClass . '">' . nl2br(e($text)) . '</span>';
        };

        $themeName = $theme['name'] ?? 'default';
        $themePrimaryButtonColor = trim((string) ($theme['button_primary_color'] ?? ''));

        $matchThemeColors = match ($themeName) {
            'orange' => [
                'accent' => '#f97316',
                'accentDark' => '#fb923c',
                'accentSoft' => '#fff7ed',
                'accentSoftDark' => 'rgba(124, 45, 18, .42)',
                'accentRing' => '#fed7aa',
                'accentRingDark' => 'rgba(251, 146, 60, .24)',
                'active' => '#ea580c',
                'activeDark' => '#fdba74',
            ],
            'green' => [
                'accent' => '#059669',
                'accentDark' => '#34d399',
                'accentSoft' => '#ecfdf5',
                'accentSoftDark' => 'rgba(6, 78, 59, .42)',
                'accentRing' => '#a7f3d0',
                'accentRingDark' => 'rgba(52, 211, 153, .24)',
                'active' => '#047857',
                'activeDark' => '#6ee7b7',
            ],
            'purple' => [
                'accent' => '#7c3aed',
                'accentDark' => '#a78bfa',
                'accentSoft' => '#f5f3ff',
                'accentSoftDark' => 'rgba(76, 29, 149, .42)',
                'accentRing' => '#ddd6fe',
                'accentRingDark' => 'rgba(167, 139, 250, .24)',
                'active' => '#6d28d9',
                'activeDark' => '#c4b5fd',
            ],
            'blue' => [
                'accent' => '#2563eb',
                'accentDark' => '#60a5fa',
                'accentSoft' => '#eff6ff',
                'accentSoftDark' => 'rgba(30, 58, 138, .42)',
                'accentRing' => '#bfdbfe',
                'accentRingDark' => 'rgba(96, 165, 250, .24)',
                'active' => '#1d4ed8',
                'activeDark' => '#93c5fd',
            ],
            default => [
                'accent' => '#4f46e5',
                'accentDark' => '#818cf8',
                'accentSoft' => '#eef2ff',
                'accentSoftDark' => 'rgba(49, 46, 129, .42)',
                'accentRing' => '#c7d2fe',
                'accentRingDark' => 'rgba(129, 140, 248, .24)',
                'active' => '#2563eb',
                'activeDark' => '#93c5fd',
            ],
        };

        $matchThemeStyle = collect([
            '--match-accent: ' . $matchThemeColors['accent'],
            '--match-accent-dark: ' . $matchThemeColors['accentDark'],
            '--match-accent-soft: ' . $matchThemeColors['accentSoft'],
            '--match-accent-soft-dark: ' . $matchThemeColors['accentSoftDark'],
            '--match-accent-ring: ' . $matchThemeColors['accentRing'],
            '--match-accent-ring-dark: ' . $matchThemeColors['accentRingDark'],
            '--match-active: ' . $matchThemeColors['active'],
            '--match-active-dark: ' . $matchThemeColors['activeDark'],
        ])->implode('; ') . ';';

        if ($themePrimaryButtonColor === '') {
            $themePrimaryButtonColor = match ($themeName) {
                'orange' => 'bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 focus-visible:ring-orange-200',
                'green' => 'bg-gradient-to-br from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 focus-visible:ring-emerald-200',
                'purple' => 'bg-gradient-to-br from-violet-500 to-violet-600 hover:from-violet-600 hover:to-violet-700 focus-visible:ring-violet-200',
                'blue' => 'bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus-visible:ring-blue-200',
                default => 'bg-gradient-to-br from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 focus-visible:ring-indigo-200',
            };
        }

        $matchButtonClass = 'inline-flex h-8 items-center justify-center whitespace-nowrap rounded-lg border bg-white px-3 text-[0.68rem] font-extrabold shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md focus-visible:outline-none focus-visible:ring-4 disabled:cursor-not-allowed disabled:opacity-60 dark:bg-slate-900 sm:h-9 sm:px-3.5 sm:text-xs ' . match ($themeName) {
            'orange' => 'border-orange-200 text-orange-700 hover:bg-orange-50 focus-visible:ring-orange-100 dark:border-orange-800/70 dark:text-orange-200 dark:hover:bg-orange-950/30 dark:focus-visible:ring-orange-500/20',
            'green' => 'border-emerald-200 text-emerald-700 hover:bg-emerald-50 focus-visible:ring-emerald-100 dark:border-emerald-800/70 dark:text-emerald-200 dark:hover:bg-emerald-950/30 dark:focus-visible:ring-emerald-500/20',
            'purple' => 'border-violet-200 text-violet-700 hover:bg-violet-50 focus-visible:ring-violet-100 dark:border-violet-800/70 dark:text-violet-200 dark:hover:bg-violet-950/30 dark:focus-visible:ring-violet-500/20',
            'blue' => 'border-blue-200 text-blue-700 hover:bg-blue-50 focus-visible:ring-blue-100 dark:border-blue-800/70 dark:text-blue-200 dark:hover:bg-blue-950/30 dark:focus-visible:ring-blue-500/20',
            default => 'border-indigo-200 text-indigo-700 hover:bg-indigo-50 focus-visible:ring-indigo-100 dark:border-indigo-800/70 dark:text-indigo-200 dark:hover:bg-indigo-950/30 dark:focus-visible:ring-indigo-500/20',
        };
        $modalSecondaryButtonClass = 'inline-flex min-h-11 items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-extrabold text-slate-700 shadow-sm transition hover:bg-slate-50 hover:text-slate-950 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:min-h-12 sm:px-6 sm:text-base';
        $modalPrimaryButtonClass = 'inline-flex min-h-11 items-center justify-center rounded-xl px-5 py-2.5 text-sm font-extrabold text-white shadow-lg transition hover:brightness-105 focus-visible:outline-none focus-visible:ring-4 sm:min-h-12 sm:px-6 sm:text-base ' . $themePrimaryButtonColor;

        $matchCardBaseClass = 'match-card relative z-10 flex h-full w-full cursor-pointer select-none items-center justify-start rounded-xl border border-slate-200 bg-[#fbfefc] text-left shadow-[0_2px_7px_rgba(15,23,42,0.06)] transition duration-200 hover:-translate-y-0.5 hover:border-[var(--match-accent-ring)] hover:bg-[var(--match-accent-soft)] hover:shadow-[0_8px_18px_rgba(15,23,42,0.09)] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[var(--match-accent-ring)] disabled:cursor-default dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:border-[var(--match-accent-ring-dark)] dark:hover:bg-[var(--match-accent-soft-dark)] dark:focus-visible:ring-[var(--match-accent-ring-dark)] ' . $cardSizeClass;
        $matchConnectorStartClass = 'match-connector match-connector-start absolute right-[-12px] top-1/2 z-20 grid h-8 w-8 -translate-y-1/2 cursor-grab touch-none place-items-center rounded-full active:cursor-grabbing sm:right-[-14px] sm:h-9 sm:w-9';
        $matchConnectorTargetClass = 'match-connector match-connector-target absolute left-[-12px] top-1/2 z-20 grid h-8 w-8 -translate-y-1/2 cursor-pointer touch-none place-items-center rounded-full sm:left-[-14px] sm:h-9 sm:w-9';
        $themeColumnLabelColors = match ($themeName) {
            'orange' => 'border-orange-200 bg-orange-50/90 text-orange-700 dark:border-orange-800/70 dark:bg-orange-950/30 dark:text-orange-200',
            'green' => 'border-emerald-200 bg-emerald-50/90 text-emerald-700 dark:border-emerald-800/70 dark:bg-emerald-950/30 dark:text-emerald-200',
            'purple' => 'border-violet-200 bg-violet-50/90 text-violet-700 dark:border-violet-800/70 dark:bg-violet-950/30 dark:text-violet-200',
            'blue' => 'border-blue-200 bg-blue-50/90 text-blue-700 dark:border-blue-800/70 dark:bg-blue-950/30 dark:text-blue-200',
            default => 'border-indigo-200 bg-indigo-50/90 text-indigo-700 dark:border-indigo-800/70 dark:bg-indigo-950/30 dark:text-indigo-200',
        };

        $matchColumnLabelClass = 'flex min-h-7 items-center justify-center rounded-lg border px-2 py-1.5 text-center text-[0.58rem] font-black uppercase tracking-[0.16em] shadow-sm sm:min-h-8 sm:text-[0.66rem] ' . $themeColumnLabelColors;
    @endphp

    <style>
        .match-panel {
            width: min(100%, var(--ideal-board-width));
        }

        .match-reading-card {
            scrollbar-color: var(--match-accent-ring) transparent;
            scrollbar-width: thin;
        }

        .match-board-grid {
            --match-center-gap: clamp(3rem, 5vw, 6rem);
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
                --match-center-gap: clamp(1.6rem, 8vw, 2.25rem);
                grid-template-columns: minmax(0, var(--left-mobile-fr)) var(--match-center-gap) minmax(0, var(--right-mobile-fr));
            }
        }

        @media (min-width: 641px) and (max-width: 900px) {
            .match-board-grid {
                --match-center-gap: clamp(2.25rem, 5vw, 3.5rem);
                grid-template-columns: minmax(0, var(--left-mobile-fr)) var(--match-center-gap) minmax(0, var(--right-mobile-fr));
            }
        }

        @media (min-width: 1280px) {
            .match-panel {
                width: min(100%, var(--xl-board-width));
            }

            .match-board-grid {
                --match-center-gap: clamp(4rem, 5vw, 6.5rem);
            }
        }

        .match-card.is-selected {
            border-color: var(--match-accent);
            background: var(--match-accent-soft);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .10), 0 6px 15px rgba(5, 150, 105, .10);
        }

        .match-card.is-target {
            border-color: var(--match-accent-ring);
            background: #fbfefc;
            box-shadow: 0 3px 10px rgba(15, 23, 42, .045);
        }

        .match-card.is-correct {
            border-color: rgb(16 185 129);
            background: rgb(236 253 245);
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, .12);
        }

        .match-card.is-wrong {
            border-color: rgb(244 63 94);
            background: rgb(255 241 242);
            animation: matchShake .32s ease;
        }

        .match-card.is-correct [data-card-status] {
            display: grid;
        }

        .dark .match-card.is-selected {
            border-color: var(--match-accent-dark);
            background: var(--match-accent-soft-dark);
            box-shadow: 0 0 0 3px rgba(52, 211, 153, .08), 0 6px 15px rgba(2, 6, 23, .32);
        }

        .dark .match-card.is-target {
            border-color: var(--match-accent-ring-dark);
            background: #0f172a;
            box-shadow: 0 3px 10px rgba(2, 6, 23, .22);
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
            width: .76rem;
            height: .76rem;
            border-radius: 999px;
            border: 2px solid #fff;
            background: #94a3b8;
            box-shadow: 0 4px 12px rgba(15, 23, 42, .22);
            outline: 2px solid rgba(148, 163, 184, .22);
            transition: transform .16s ease, background-color .16s ease, outline-color .16s ease;
        }

        @media (min-width: 640px) {
            .match-connector::after {
                width: .88rem;
                height: .88rem;
            }
        }

        .match-card:hover .match-connector::after,
        .match-connector.is-hot::after {
            transform: scale(1.12);
            background: var(--match-accent);
            outline-color: var(--match-accent-ring);
        }

        .match-card.is-correct .match-connector::after {
            background: #10b981;
            outline-color: rgba(16, 185, 129, .28);
        }

        .match-line,
        .match-active-line {
            fill: none;
            stroke-linecap: round;
            filter: drop-shadow(0 4px 8px rgba(15, 23, 42, .16));
        }

        .match-line {
            stroke: var(--match-accent);
            stroke-width: 3.25;
            opacity: .92;
        }

        .match-active-line {
            stroke: var(--match-active);
            stroke-width: 3.25;
            stroke-dasharray: 8 6;
            opacity: .96;
        }

        .dark .match-card:hover .match-connector::after,
        .dark .match-connector.is-hot::after {
            background: var(--match-accent-dark);
            outline-color: var(--match-accent-ring-dark);
        }

        .dark .match-line {
            stroke: var(--match-accent-dark);
        }

        .dark .match-active-line {
            stroke: var(--match-active-dark);
        }

        @keyframes matchShake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        @media (prefers-reduced-motion: reduce) {
            .match-card,
            .match-connector::after {
                transition: none !important;
            }

            .match-card.is-wrong {
                animation: none;
            }
        }
    </style>

    <main id="matchingPairsShell" class="flex min-h-[100dvh] w-full flex-col justify-start overflow-x-hidden px-3 pb-3 pt-7 sm:justify-center sm:px-5 sm:py-4 lg:px-6 lg:py-5" style="{{ $matchThemeStyle }}">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[90rem] pb-2">
            @if($playerAudio)
                <div class="mx-auto mb-3 w-full max-w-4xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="{{ $passage !== [] ? 'grid items-start gap-3 ' . $passageWidth : '' }}">
                @if($passage !== [])
                    <article class="match-reading-card relative  min-h-[18rem] overflow-y-auto rounded-[1.2rem] border border-slate-200/60 bg-white/70 px-4 py-4 text-left shadow-[0_8px_24px_rgba(15,23,42,0.06)] backdrop-blur dark:border-slate-700/55 dark:bg-slate-950/35 sm:px-5 sm:py-5">
                        <div class="pointer-events-none absolute inset-y-4 left-0 w-1 rounded-full bg-gradient-to-b from-[var(--match-accent)] via-[var(--match-active)] to-[var(--match-accent)] dark:from-[var(--match-accent-dark)] dark:via-[var(--match-active-dark)] dark:to-[var(--match-accent-dark)]"></div>
                        <div class="relative z-[1] pl-1.5">
                            <p class="inline-flex rounded-full border border-[var(--match-accent-ring)] bg-[var(--match-accent-soft)] px-3 py-1 text-[0.65rem] font-black uppercase tracking-[0.16em] text-[var(--match-accent)] dark:border-[var(--match-accent-ring-dark)] dark:bg-[var(--match-accent-soft-dark)] dark:text-[var(--match-accent-dark)] sm:text-xs">
                                Reading passage
                            </p>
                            <h2 class="mt-3 text-lg font-black leading-tight tracking-[-0.02em] text-slate-950 dark:text-white sm:text-xl">
                                {{ $passageTitle }}
                            </h2>
                            <div class="mt-3 grid gap-2.5">
                        @foreach($passage as $paragraph)
                                    <p class="m-0 text-sm font-semibold leading-[1.6] tracking-[-0.01em] text-slate-600 dark:text-slate-300 sm:text-[15px] lg:text-base">
                                        {{ $paragraph }}
                                    </p>
                        @endforeach
                            </div>
                        </div>
                    </article>
                @endif

                <div
                        class="match-panel {{ $passage === [] ? 'mx-auto' : '' }} rounded-2xl border border-slate-200 bg-white p-3 shadow-[0_8px_24px_rgba(15,23,42,0.07)] dark:border-slate-800 dark:bg-slate-950/70 dark:shadow-none sm:p-3.5 lg:p-4"
                        style="{{ $passage !== [] ? 'width: 100%;' : '' }} --ideal-board-width: {{ $idealBoardWidthRem }}; --xl-board-width: {{ $xlBoardWidthRem }}; --left-col-fr: {{ $leftColumnFr }}; --right-col-fr: {{ $rightColumnFr }}; --left-mobile-fr: {{ $mobileLeftFr }}; --right-mobile-fr: {{ $mobileRightFr }};"
                >
                    <div>
                        <div class="flex flex-col items-stretch gap-2.5 sm:flex-row sm:items-start sm:justify-between sm:gap-3">
                            <div class="min-w-0 flex-1">
                                <h2 class="text-sm font-black leading-tight text-slate-950 dark:text-white sm:text-base lg:text-lg">
                                    {{ $activityTitle }}
                                </h2>
                                @if($instruction !== '')
                                    <p class="mt-1 text-[0.68rem] font-bold leading-snug text-slate-500 dark:text-slate-400 sm:text-xs">
                                        {{ $instruction }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex w-full shrink-0 items-center justify-between gap-2 sm:w-auto sm:justify-end">
                                <div class="inline-flex h-8 items-center gap-1.5 rounded-lg border border-rose-200 bg-rose-50 px-2.5 text-[0.66rem] font-extrabold text-rose-800 shadow-sm dark:border-rose-900/70 dark:bg-rose-950/35 dark:text-rose-200 sm:h-9 sm:px-3 sm:text-xs">
                                    <span>Mistakes</span>
                                    <span id="mistakes" class="grid min-w-5 place-items-center rounded-md bg-white px-1.5 py-0.5 text-rose-700 ring-1 ring-rose-200 dark:bg-rose-900/50 dark:text-rose-100 dark:ring-rose-800">0</span>
                                </div>

                                <button id="revealMatchAnswers" type="button" class="{{ $matchButtonClass }}" aria-label="Reveal all correct matches" {{ $pairCount === 0 ? 'disabled' : '' }}>
                                    Reveal answers
                                </button>
                            </div>
                        </div>
                    </div>

                <div
                        id="matchBoard"
                        class="match-board-grid relative mx-auto mt-3 grid touch-pan-y items-stretch sm:mt-3.5"
                >
                    <svg id="lineLayer" class="pointer-events-none absolute inset-0 z-[5] h-full w-full overflow-visible" aria-hidden="true"></svg>

                    <div data-col="left" class="{{ $matchColumnLabelClass }}">{{ $leftLabel }}</div>
                    <div data-col="right" class="{{ $matchColumnLabelClass }}">{{ $rightLabel }}</div>

                    @forelse($leftItems as $index => $item)
                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }}"
                                data-side="left"
                                data-id="{{ $item['id'] }}"
                                aria-label="Select {{ strip_tags($item['content']['text'] ?? $item['content']['word'] ?? 'left item') }}"
                                aria-pressed="false"
                        >
                            <span class="min-w-0 flex-1 pr-1.5 sm:pr-2">
                                {!! $renderMatchItem($item['content']) !!}
                            </span>
                            <span data-card-status class="pointer-events-none mr-1 hidden h-5 w-5 shrink-0 place-items-center rounded-full bg-emerald-500 text-xs font-black text-white shadow-sm sm:mr-0 sm:h-6 sm:w-6" aria-hidden="true">✓</span>
                            <span class="{{ $matchConnectorStartClass }}" data-connector="start" aria-hidden="true"></span>
                        </button>

                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }}"
                                data-side="right"
                                data-id="{{ $rightItems[$index]['id'] }}"
                                aria-label="Choose {{ strip_tags($rightItems[$index]['content']['text'] ?? $rightItems[$index]['content']['word'] ?? 'right item') }}"
                                aria-pressed="false"
                        >
                            <span class="{{ $matchConnectorTargetClass }}" data-connector="target" aria-hidden="true"></span>
                            <span class="min-w-0 flex-1 pl-1.5 sm:pl-2">
                                {!! $renderMatchItem($rightItems[$index]['content']) !!}
                            </span>
                            <span data-card-status class="pointer-events-none hidden h-5 w-5 shrink-0 place-items-center rounded-full bg-emerald-500 text-xs font-black text-white shadow-sm sm:h-6 sm:w-6" aria-hidden="true">✓</span>
                        </button>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-300 px-5 py-10 text-center text-sm font-semibold text-slate-500 dark:border-slate-700 dark:text-slate-400" style="grid-column: 1 / 4;">
                            No matching pairs are available for this activity.
                        </div>
                    @endforelse
                </div>

                    <p id="matchFeedback" class="sr-only" role="status" aria-live="polite" aria-atomic="true"></p>
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

            if (!board || !lineLayer) return;

            const sfx = {
                tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav'),
            };

            Object.values(sfx).forEach(sound => {
                sound.preload = 'auto';
            });

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

            function announce(message) {
                const feedback = document.getElementById('matchFeedback');
                if (!feedback) return;

                feedback.textContent = '';
                window.requestAnimationFrame(() => {
                    feedback.textContent = message;
                });
            }

            function cardLabel(card) {
                return (card?.getAttribute('aria-label') || card?.textContent || '')
                    .replace(/^Select\s+|^Choose\s+/i, '')
                    .replace(/✓/g, '')
                    .trim();
            }

            function updateStats() {
                const mistakesEl = document.getElementById('mistakes');

                if (mistakesEl) mistakesEl.textContent = mistakes;
            }

            function setRevealButtonToRetake(enabled) {
                revealIsRetake = enabled;
                if (!revealBtn) return;

                revealBtn.textContent = enabled ? 'Retake' : 'Reveal answers';
                revealBtn.setAttribute(
                    'aria-label',
                    enabled ? 'Restart the matching activity' : 'Reveal all correct matches'
                );
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

            function positionLine(path, start, end) {
                const horizontalDistance = Math.abs(end.x - start.x);
                const curve = Math.max(28, horizontalDistance * 0.42);
                const firstControlX = start.x + curve;
                const secondControlX = end.x - curve;

                path.setAttribute(
                    'd',
                    `M ${start.x} ${start.y} C ${firstControlX} ${start.y}, ${secondControlX} ${end.y}, ${end.x} ${end.y}`
                );
            }

            function drawLine(leftCard, rightCard) {
                syncLineLayer();

                const path = document.createElementNS(svgNamespace, 'path');
                path.setAttribute('class', 'match-line');
                path.dataset.id = leftCard.dataset.id;

                positionLine(
                    path,
                    connectorPoint(leftCard, '[data-connector="start"]'),
                    connectorPoint(rightCard, '[data-connector="target"]')
                );

                lineLayer.appendChild(path);
                lines.push(path);
            }

            function removeLines() {
                lines.forEach(line => line.remove());
                lines = [];
            }

            function redrawLines() {
                syncLineLayer();
                removeLines();

                completed.forEach(id => {
                    const escapedId = CSS.escape(id);
                    const left = document.querySelector(`.match-card[data-side="left"][data-id="${escapedId}"]`);
                    const right = document.querySelector(`.match-card[data-side="right"][data-id="${escapedId}"]`);
                    if (left && right) drawLine(left, right);
                });
            }

            function createActiveLine(leftCard, event) {
                syncLineLayer();

                activeLine = document.createElementNS(svgNamespace, 'path');
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
                    card.setAttribute('aria-pressed', 'false');
                });

                resetConnectorStates();
                selectedLeft = null;
            }

            function selectLeftCard(leftCard, play = true, shouldAnnounce = true) {
                if (!leftCard || leftCard.disabled) return;

                clearSelection();
                selectedLeft = leftCard;

                addClasses(leftCard, stateClasses.selected);
                leftCard.setAttribute('aria-pressed', 'true');
                setConnectorState(leftCard, '[data-connector="start"]', true);

                cards
                    .filter(card => card.dataset.side === 'right' && !card.disabled)
                    .forEach(card => {
                        addClasses(card, stateClasses.target);
                        setConnectorState(card, '[data-connector="target"]', true);
                    });

                if (shouldAnnounce) {
                    announce(`Selected ${cardLabel(leftCard)}. Choose its match on the right.`);
                }

                if (play) playSfx('tap');
            }

            function getRightCardAt(clientX, clientY) {
                const element = document.elementFromPoint(clientX, clientY);
                return element?.closest?.('.match-card[data-side="right"]') || null;
            }

            function focusNextUnmatchedLeft() {
                const nextCard = cards.find(card => card.dataset.side === 'left' && !card.disabled);
                nextCard?.focus({ preventScroll: true });
            }

            function finishCorrect(leftCard, rightCard) {
                removeClasses(leftCard, [...stateClasses.selected, ...stateClasses.target, ...stateClasses.wrong]);
                removeClasses(rightCard, [...stateClasses.selected, ...stateClasses.target, ...stateClasses.wrong]);

                addClasses(leftCard, stateClasses.correct);
                addClasses(rightCard, stateClasses.correct);

                leftCard.setAttribute('aria-pressed', 'false');
                rightCard.setAttribute('aria-pressed', 'false');
                leftCard.disabled = true;
                rightCard.disabled = true;

                completed.add(leftCard.dataset.id);
                drawLine(leftCard, rightCard);
                updateStats();
                announce(`Correct. ${completed.size} of ${totalPairs} pairs matched.`);

                if (completed.size === totalPairs) {
                    setRevealButtonToRetake(true);
                    playSfx('success');
                    setTimeout(showWinModal, 300);
                } else {
                    playSfx('correct');
                    setTimeout(focusNextUnmatchedLeft, 150);
                }
            }

            function finishWrong(leftCard, rightCard) {
                if (!rightCard || rightCard.disabled) return;

                mistakes++;
                updateStats();
                playSfx('wrong');
                announce('Not a match. Try a different item on the right.');

                addClasses(leftCard, stateClasses.wrong);
                addClasses(rightCard, stateClasses.wrong);

                setTimeout(() => {
                    removeClasses(leftCard, stateClasses.wrong);
                    removeClasses(rightCard, stateClasses.wrong);
                }, 450);
            }

            function resetGame(shouldFocus = true) {
                completed.clear();
                mistakes = 0;
                selectedLeft = null;
                activeLeft = null;
                activePointerId = null;
                activeLine?.remove();
                activeLine = null;

                cards.forEach(card => {
                    card.disabled = false;
                    card.setAttribute('aria-pressed', 'false');
                    removeClasses(card, cardStateClasses);
                });

                resetConnectorStates();
                removeLines();
                hideWinModal();
                updateStats();
                setRevealButtonToRetake(false);
                announce('Activity reset. Select an item on the left to begin.');

                if (shouldFocus) {
                    window.requestAnimationFrame(focusNextUnmatchedLeft);
                }
            }

            function revealAnswers() {
                resetGame(false);

                document.querySelectorAll('.match-card[data-side="left"]').forEach(leftCard => {
                    const id = leftCard.dataset.id;
                    const escapedId = CSS.escape(id);
                    const rightCard = document.querySelector(`.match-card[data-side="right"][data-id="${escapedId}"]`);
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
                announce('All correct matches are now shown. Select Retake to play again.');
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
                        selectLeftCard(leftCard, false, false);
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
                announce('Selection cleared.');
            });

            cards.forEach(card => {
                card.addEventListener('click', () => {
                    if (card.disabled) return;

                    if (card.dataset.side === 'left') {
                        if (selectedLeft === card) {
                            clearSelection();
                            announce('Selection cleared.');
                            return;
                        }

                        selectLeftCard(card);
                        return;
                    }

                    if (!selectedLeft || card.dataset.side !== 'right') {
                    announce('Select a statement on the left first.');
                        return;
                    }

                    if (card.dataset.id === selectedLeft.dataset.id) {
                        finishCorrect(selectedLeft, card);
                        clearSelection();
                    } else {
                        const leftCard = selectedLeft;
                        finishWrong(leftCard, card);
                        selectLeftCard(leftCard, false, false);
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

            document.addEventListener('keydown', event => {
                if (event.key !== 'Escape' || !selectedLeft) return;

                clearSelection();
                announce('Selection cleared.');
            });

            document.getElementById('restartBtnModal')?.addEventListener('click', () => resetGame());
            document.getElementById('continueBtnModal')?.addEventListener('click', hideWinModal);

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            const resizeObserver = 'ResizeObserver' in window
                ? new ResizeObserver(() => redrawLines())
                : null;

            resizeObserver?.observe(board);
            window.addEventListener('resize', redrawLines);
            window.addEventListener('load', redrawLines);
            document.fonts?.ready?.then(redrawLines);

            window.resetSlide = () => {
                stopSlideMedia();
                resetGame(false);
            };

            window.stopSlideAudio = stopSlideMedia;
            window.destroySlide = () => {
                resizeObserver?.disconnect();
                stopSlideMedia();
            };

            syncLineLayer(); 
            updateStats();
        });
    </script>
@endsection
