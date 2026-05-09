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

        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
        $primaryButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
        $matchPrimary = $isOrangeTheme ? '#f97316' : '#6366f1';
        $matchSecondary = $isOrangeTheme ? '#fb923c' : '#38bdf8';
        $matchPrimaryRgb = $isOrangeTheme ? '249, 115, 22' : '99, 102, 241';
        $matchSecondaryRgb = $isOrangeTheme ? '251, 146, 60' : '56, 189, 248';
        $matchGlowOne = $isOrangeTheme ? 'rgba(254, 215, 170, .38)' : 'rgba(191,219,254,.42)';
        $matchGlowTwo = $isOrangeTheme ? 'rgba(253, 186, 116, .30)' : 'rgba(199,210,254,.34)';
        $matchDarkGlowOne = $isOrangeTheme ? 'rgba(249, 115, 22, .20)' : 'rgba(59,130,246,.20)';
        $matchDarkGlowTwo = $isOrangeTheme ? 'rgba(251, 146, 60, .16)' : 'rgba(129,140,248,.16)';
        $matchAccentGradient = $isOrangeTheme
            ? 'linear-gradient(135deg, #fb923c 0%, #f97316 54%, #ea580c 100%)'
            : 'linear-gradient(135deg, #38bdf8 0%, #6366f1 54%, #8b5cf6 100%)';
        $dotGradients = $isOrangeTheme ? [
            ['gradient' => 'linear-gradient(135deg, #fb923c, #f97316)', 'solid' => '#f97316'],
            ['gradient' => 'linear-gradient(135deg, #fbbf24, #f59e0b)', 'solid' => '#f59e0b'],
            ['gradient' => 'linear-gradient(135deg, #f97316, #dc2626)', 'solid' => '#ea580c'],
            ['gradient' => 'linear-gradient(135deg, #14b8a6, #0f766e)', 'solid' => '#0d9488'],
            ['gradient' => 'linear-gradient(135deg, #a855f7, #7c3aed)', 'solid' => '#8b5cf6'],
            ['gradient' => 'linear-gradient(135deg, #ef4444, #e11d48)', 'solid' => '#ef4444'],
        ] : [
            ['gradient' => 'linear-gradient(135deg, #38bdf8, #2563eb)', 'solid' => '#2563eb'],
            ['gradient' => 'linear-gradient(135deg, #6366f1, #8b5cf6)', 'solid' => '#6366f1'],
            ['gradient' => 'linear-gradient(135deg, #a855f7, #d946ef)', 'solid' => '#a855f7'],
            ['gradient' => 'linear-gradient(135deg, #14b8a6, #22c55e)', 'solid' => '#14b8a6'],
            ['gradient' => 'linear-gradient(135deg, #f59e0b, #f97316)', 'solid' => '#f97316'],
            ['gradient' => 'linear-gradient(135deg, #ec4899, #e11d48)', 'solid' => '#ec4899'],
        ];

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
        $matchButtonPrimaryClass = $matchButtonBaseClass . ' match-action-primary ' . $primaryButtonClass;
        $matchButtonSoftClass = $matchButtonBaseClass . ' match-action-soft';
        $matchButtonNeutralClass = $matchButtonBaseClass . ' match-action-dark';

        $matchCardBaseClass = 'match-card';
        $matchConnectorBaseClass = 'match-connector';
        $matchConnectorStartClass = $matchConnectorBaseClass . ' match-connector-start';
        $matchConnectorTargetClass = $matchConnectorBaseClass . ' match-connector-target';

        $rowToneClasses = [
            'bg-white dark:bg-slate-900',
        ];
    @endphp

    <style>
        #matchingPairsShell {
            --match-primary: {{ $matchPrimary }};
            --match-secondary: {{ $matchSecondary }};
            --match-primary-rgb: {{ $matchPrimaryRgb }};
            --match-secondary-rgb: {{ $matchSecondaryRgb }};
            --match-accent-gradient: {{ $matchAccentGradient }};
            --match-glow-one: {{ $matchGlowOne }};
            --match-glow-two: {{ $matchGlowTwo }};
            --match-dark-glow-one: {{ $matchDarkGlowOne }};
            --match-dark-glow-two: {{ $matchDarkGlowTwo }};
            --match-ink: #0f172a;
            --match-panel: rgba(255, 255, 255, .9);
            --match-card: rgba(255, 255, 255, .86);
        }

        .matching-panel {
            border-radius: 1.35rem;
            border: 1px solid rgba(203, 213, 225, .9);
            background:
                    radial-gradient(900px 420px at 7% 0%, var(--match-glow-one), transparent 58%),
                    radial-gradient(820px 420px at 98% 0%, var(--match-glow-two), transparent 56%),
                    linear-gradient(180deg, rgba(248, 250, 252, .94), rgba(255, 255, 255, .9));
            box-shadow: 0 22px 50px -34px rgba(15, 23, 42, .48);
            backdrop-filter: blur(16px);
        }

        .dark .matching-panel {
            border-color: rgba(71, 85, 105, .72);
            background:
                    radial-gradient(900px 420px at 7% 0%, var(--match-dark-glow-one), transparent 58%),
                    radial-gradient(820px 420px at 98% 0%, var(--match-dark-glow-two), transparent 56%),
                    linear-gradient(180deg, rgba(30, 41, 59, .86), rgba(15, 23, 42, .88)),
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
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .08), rgba(var(--match-secondary-rgb), .07)),
                    linear-gradient(135deg, rgba(255, 255, 255, .94), rgba(248, 250, 252, .88));
            color: #1e293b;
            font-size: .72rem;
            font-weight: 950;
            letter-spacing: .02em;
            box-shadow: 0 10px 22px -18px rgba(15, 23, 42, .45);
            backdrop-filter: blur(10px);
        }

        .dark .match-column-label {
            border-color: rgba(71, 85, 105, .8);
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .18), rgba(var(--match-secondary-rgb), .12)),
                    rgba(15, 23, 42, .76);
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
            background:
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .86)),
                    var(--match-card);
            transition: transform .16s ease, border-color .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .match-card[data-row-tone="0"] {
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .08), rgba(255, 255, 255, .05)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .88));
        }

        .match-card[data-row-tone="1"] {
            background:
                    linear-gradient(135deg, rgba(var(--match-secondary-rgb), .08), rgba(255, 255, 255, .05)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .88));
        }

        .match-card[data-row-tone="2"] {
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .06), rgba(var(--match-secondary-rgb), .06)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .88));
        }

        .match-card[data-row-tone="3"] {
            background:
                    linear-gradient(135deg, rgba(148, 163, 184, .11), rgba(var(--match-secondary-rgb), .05)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .88));
        }

        .match-card:hover {
            transform: translateY(-1px);
            border-color: rgba(var(--match-primary-rgb), .42);
            box-shadow: 0 16px 32px -22px rgba(var(--match-primary-rgb), .35), 0 12px 24px -22px rgba(15, 23, 42, .34);
        }

        .match-card:focus-visible {
            outline: none;
            box-shadow: 0 0 0 4px rgba(var(--match-primary-rgb), .18), 0 14px 28px -22px rgba(15, 23, 42, .42);
        }

        .match-card:disabled {
            cursor: default;
            opacity: .98;
            transform: none;
        }

        .match-card.is-selected {
            transform: translateY(-2px);
            border-color: rgba(var(--match-primary-rgb), .72);
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .15), rgba(var(--match-secondary-rgb), .11)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(248, 250, 252, .9));
            box-shadow: 0 0 0 4px rgba(var(--match-primary-rgb), .14), 0 16px 34px rgba(15, 23, 42, .12);
        }

        .match-card.is-target {
            border-color: rgba(var(--match-secondary-rgb), .5);
            box-shadow: 0 0 0 4px rgba(var(--match-secondary-rgb), .12), 0 12px 24px -20px rgba(15, 23, 42, .35);
        }

        .match-card.is-correct {
            border-color: rgba(16, 185, 129, .68);
            background:
                    linear-gradient(135deg, rgba(16, 185, 129, .18), rgba(20, 184, 166, .12)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(240, 253, 250, .92));
            box-shadow: 0 0 0 4px rgba(16, 185, 129, .15), 0 16px 30px -20px rgba(16, 185, 129, .5);
        }

        .match-card.is-wrong {
            border-color: rgba(244, 63, 94, .78);
            background:
                    linear-gradient(135deg, rgba(244, 63, 94, .15), rgba(251, 113, 133, .1)),
                    linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(255, 241, 242, .92));
            box-shadow: 0 0 0 4px rgba(244, 63, 94, .16), 0 14px 28px -20px rgba(244, 63, 94, .45);
            animation: matchPulse .45s ease;
        }

        .dark .match-card {
            border-color: rgba(51, 65, 85, .96);
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .12), rgba(var(--match-secondary-rgb), .07)),
                    linear-gradient(135deg, rgba(30, 41, 59, .92), rgba(15, 23, 42, .9));
            box-shadow: 0 14px 28px -22px rgba(2, 6, 23, .82);
        }

        .dark .match-card.is-selected {
            border-color: rgba(var(--match-primary-rgb), .88);
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .26), rgba(var(--match-secondary-rgb), .16)),
                    linear-gradient(135deg, rgba(30, 41, 59, .92), rgba(15, 23, 42, .9));
            box-shadow: 0 0 0 4px rgba(var(--match-primary-rgb), .16), 0 16px 34px rgba(2, 6, 23, .34);
        }

        .dark .match-card.is-target {
            border-color: rgba(var(--match-secondary-rgb), .72);
            box-shadow: 0 0 0 4px rgba(var(--match-secondary-rgb), .13), 0 12px 24px -20px rgba(2, 6, 23, .55);
        }

        .dark .match-card.is-correct {
            border-color: rgba(110, 231, 183, .8);
            background:
                    linear-gradient(135deg, rgba(16, 185, 129, .28), rgba(20, 184, 166, .16)),
                    linear-gradient(135deg, rgba(15, 23, 42, .96), rgba(6, 78, 59, .38));
        }

        .dark .match-card.is-wrong {
            border-color: rgba(251, 113, 133, .82);
            background:
                    linear-gradient(135deg, rgba(244, 63, 94, .26), rgba(251, 113, 133, .14)),
                    linear-gradient(135deg, rgba(15, 23, 42, .96), rgba(76, 5, 25, .36));
        }

        @keyframes matchPulse {
            0%, 100% { transform: translateY(0); }
            45% { transform: translateY(-1px) scale(1.01); }
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
            font-size: clamp(.62rem, 1.18vw, .84rem);
            font-weight: 700;
            line-height: 1.22;
            overflow-wrap: anywhere;
            text-wrap: balance;
        }

        .match-word * {
            font-size: inherit;
            font-weight: inherit;
            line-height: inherit;
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
            background: linear-gradient(135deg, var(--match-primary), var(--match-secondary));
            box-shadow: 0 4px 12px rgba(var(--match-primary-rgb), .26);
            outline: 2px solid rgba(var(--match-primary-rgb), .18);
        }

        @foreach($dotGradients as $toneIndex => $dotTone)
                .match-connector[data-dot-tone="{{ $toneIndex }}"]::after {
            background: {{ $dotTone['gradient'] }};
            box-shadow: 0 4px 12px color-mix(in srgb, {{ $dotTone['solid'] }} 34%, transparent);
            outline-color: color-mix(in srgb, {{ $dotTone['solid'] }} 24%, transparent);
        }

        .match-line[data-dot-tone="{{ $toneIndex }}"],
        .match-active-line[data-dot-tone="{{ $toneIndex }}"] {
            stroke: {{ $dotTone['solid'] }};
        }

        .match-connector[data-dot-tone="{{ $toneIndex }}"].is-hot::after {
            background: {{ $dotTone['gradient'] }};
            box-shadow:
                    0 0 0 5px color-mix(in srgb, {{ $dotTone['solid'] }} 18%, transparent),
                    0 8px 18px color-mix(in srgb, {{ $dotTone['solid'] }} 34%, transparent);
        }
        @endforeach

            .match-connector:hover {
            transform: scale(1.12);
        }

        .match-connector.is-hot::after {
            background: linear-gradient(135deg, var(--match-secondary), var(--match-primary));
            box-shadow: 0 0 0 5px rgba(var(--match-primary-rgb), .16), 0 8px 18px rgba(var(--match-primary-rgb), .28);
            outline-color: rgba(var(--match-secondary-rgb), .28);
        }

        .match-line,
        .match-active-line {
            stroke-linecap: round;
            filter: drop-shadow(0 4px 8px rgba(15, 23, 42, .14));
        }

        .match-line {
            stroke: var(--match-primary);
            stroke-width: 4.5;
            opacity: .88;
        }

        .match-active-line {
            stroke: var(--match-secondary);
            stroke-width: 4.5;
            opacity: .92;
        }

        .dark .match-line,
        .dark .match-active-line {
            opacity: .95;
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
            border: 1px solid rgba(15, 23, 42, .12);
            color: #fff;
            box-shadow: 0 13px 26px -17px rgba(var(--match-primary-rgb), .68);
        }

        .match-action-soft {
            border: 1px solid rgba(203, 213, 225, .9);
            background:
                    linear-gradient(135deg, rgba(var(--match-primary-rgb), .07), rgba(var(--match-secondary-rgb), .06)),
                    #fff;
            color: #334155;
        }

        .match-action-dark {
            border: 1px solid rgba(15, 23, 42, .12);
            background: linear-gradient(135deg, #0f172a, #334155);
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
                font-weight: 700;
                line-height: 1.18;
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
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[0.68rem] font-black text-slate-700 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 sm:px-3 sm:text-xs">
                            <span>Score</span>
                            <span><span id="score">0</span>/<span>{{ $pairs->count() }}</span></span>
                        </div>
                        <div class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-white px-2.5 py-1 text-[0.68rem] font-black text-slate-700 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 sm:px-3 sm:text-xs">
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
                                data-dot-tone="{{ $index % count($dotGradients) }}"
                                aria-label="Select {{ strip_tags($item['content']['text'] ?? $item['content']['word'] ?? 'left item') }}"
                        >
                            <span>
                                {!! $renderMatchItem($item['content']) !!}
                            </span>
                            <span class="{{ $matchConnectorStartClass }}" data-connector="start" data-dot-tone="{{ $index % count($dotGradients) }}" aria-hidden="true"></span>
                        </button>

                        <button
                                type="button"
                                class="{{ $matchCardBaseClass }} {{ $rowToneClasses[$index % count($rowToneClasses)] }}"
                                data-side="right"
                                data-id="{{ $rightItems[$index]['id'] }}"
                                data-row-tone="{{ $index % 4 }}"
                                data-dot-tone="{{ $index % count($dotGradients) }}"
                                aria-label="Choose {{ strip_tags($rightItems[$index]['content']['text'] ?? $rightItems[$index]['content']['word'] ?? 'right item') }}"
                        >
                            <span class="{{ $matchConnectorTargetClass }}" data-connector="target" data-dot-tone="{{ $index % count($dotGradients) }}" aria-hidden="true"></span>
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
            const lineClass = 'match-line';
            const activeLineClass = 'match-active-line';

            const stateClasses = {
                selected: [
                    'is-selected',
                ],
                target: [
                    'is-target',
                ],
                correct: [
                    'is-correct',
                ],
                wrong: [
                    'is-wrong',
                ],
                connectorHot: [
                    'is-hot',
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
                line.dataset.dotTone = leftCard.dataset.dotTone || '0';

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
                activeLine.dataset.dotTone = leftCard.dataset.dotTone || '0';
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
