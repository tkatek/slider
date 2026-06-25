<?php
$content = [
    'title' => 'Practice 5',
    'subtitle' => 'Listen to the word & sort it out in the right category',

    'categories' => [
        'Extended Family' => [
            'emoji' => '👨‍👩‍👧‍👦',
            'items' => [
                ['text' => 'Cousin', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Cousin.mp3')],
                ['text' => 'Grandfather', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandfather.mp3')],
                ['text' => 'Grandmother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandmother.mp3')],
                ['text' => 'Aunt', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Aunt.mp3')],
                ['text' => 'Uncle', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Uncle.mp3')],
                ['text' => 'Nephew', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Nephew.mp3')],
                ['text' => 'Niece', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Niece.mp3')],
                ['text' => 'Stepfather', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepfather.mp3')],
                ['text' => 'Stepmother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepmother.mp3')],
                ['text' => 'Stepsister', 'sound' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide4/stepsister.mp3')],
            ],
        ],
        'Immediate Family' => [
            'emoji' => '🏠',
            'items' => [
                ['text' => 'Father', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Father.mp3')],
                ['text' => 'Mother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Mother.mp3')],
                ['text' => 'Brother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Brother.mp3')],
                ['text' => 'Sister', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Sister.mp3')],
                ['text' => 'Son', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Son.mp3')],
                ['text' => 'Daughter', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Daughter.mp3')],
                ['text' => 'Parent', 'sound' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide4/parent.mp3')],
                ['text' => 'Child', 'sound' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide4/child.mp3')],
                ['text' => 'Husband', 'sound' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide4/husband.mp3')],
                ['text' => 'Wife', 'sound' => materialAsset('slider/B1/Intermediate/chapter-7/audios/slide4/wife.mp3')],
            ],
        ],
    ],
];
?>

<?php
$type = $content['type'] ?? 'emoji';
$poolItemType = $content['pool_item_type'] ?? 'text';
?>
@extends('slider.simple-layout')
@section('style')
    <style>
        @keyframes popIn { 0% { transform: scale(.96); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
        @keyframes shake { 0%,100% { transform: translateX(0); } 25% { transform: translateX(-6px); } 75% { transform: translateX(6px); } }
        @keyframes waveGrowth { 0%,100% { height: 6px; } 50% { height: 16px; } }
        @keyframes ddNavNudge {
            0%, 100% { transform: translateX(0) scale(1); }
            35% { transform: translateX(2px) scale(1.06); }
            70% { transform: translateX(-1px) scale(1.02); }
        }

        :root {
            --pool-safe-space: 0px;
            --layout-bottom-safe-space: 0px;
        }

        #ddShell,
        #ddShell * {
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        body.dd-drag-active,
        body.dd-drag-active * {
            user-select: none !important;
            -webkit-user-select: none !important;
            cursor: grabbing !important;
        }

        .dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
            touch-action: none !important;
        }

        .returning {
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index: 9000;
        }

        .shake { animation: shake .35s ease-in-out; }
        .locked { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); pointer-events: none; }
        .draggable-item.wrong-feedback {
            outline: 3px solid rgba(248,113,113,.86);
            outline-offset: 2px;
        }

        .draggable-item[data-audio]::before {
            display: none !important;
        }

        .dark .draggable-item.wrong-feedback {
            outline-color: rgba(252,165,165,.82);
        }

        .pool-nav-btn.pool-nav-hint {
            color: rgb(79,70,229);
            border-color: rgba(99,102,241,.35);
            background: rgba(238,242,255,.96);
            box-shadow:
                    0 0 0 4px rgba(99,102,241,.10),
                    0 8px 18px rgba(79,70,229,.16);
            animation: ddNavNudge 1.4s ease-in-out 3;
        }

        .dark .pool-nav-btn.pool-nav-hint {
            color: rgb(224,231,255);
            border-color: rgba(129,140,248,.45);
            background: rgba(67,56,202,.34);
            box-shadow:
                    0 0 0 4px rgba(129,140,248,.12),
                    0 10px 20px rgba(2,6,23,.28);
        }

        #poolBar[data-pool-placement="top"] {
            position: sticky;
            top: 0;
            z-index: 1600;
            align-self: stretch;
            isolation: isolate;
        }

        #poolBar[data-pool-placement="top"].is-stuck {
            position: fixed !important;
            top: var(--dd-top-pool-offset, 0px) !important;
            left: 0;
            right: 0;
            z-index: 2200;
            padding-left: .75rem;
            padding-right: .75rem;
        }

        #poolBar[data-pool-placement="top"].is-stuck > div {
            max-width: min(72rem, calc(100vw - 1.5rem));
        }

        #poolBar[data-pool-placement="top"].is-stuck > div > div {
            box-shadow: 0 12px 30px rgba(15,23,42,.12);
        }

        .slide-layout {
            --dd-revealed-bg: rgba(99,102,241,.10);
            --dd-revealed-border: rgba(99,102,241,.34);
            --dd-revealed-ring: rgba(99,102,241,.18);
            --dd-revealed-text: rgb(67,56,202);
        }

        .dark .slide-layout {
            --dd-revealed-bg: rgba(99,102,241,.18);
            --dd-revealed-border: rgba(129,140,248,.42);
            --dd-revealed-ring: rgba(129,140,248,.20);
            --dd-revealed-text: rgb(224,231,255);
        }

        .slide-layout.slide-theme-orange {
            --dd-revealed-bg: rgba(251,146,60,.13);
            --dd-revealed-border: rgba(251,146,60,.38);
            --dd-revealed-ring: rgba(251,146,60,.20);
            --dd-revealed-text: rgb(194,65,12);
        }

        .dark .slide-layout.slide-theme-orange {
            --dd-revealed-bg: rgba(251,146,60,.18);
            --dd-revealed-border: rgba(251,146,60,.45);
            --dd-revealed-ring: rgba(251,146,60,.20);
            --dd-revealed-text: rgb(255,237,213);
        }

        .slide-layout.slide-theme-green {
            --dd-revealed-bg: rgba(34,197,94,.12);
            --dd-revealed-border: rgba(34,197,94,.36);
            --dd-revealed-ring: rgba(34,197,94,.18);
            --dd-revealed-text: rgb(21,128,61);
        }

        .dark .slide-layout.slide-theme-green {
            --dd-revealed-bg: rgba(34,197,94,.18);
            --dd-revealed-border: rgba(74,222,128,.42);
            --dd-revealed-ring: rgba(74,222,128,.20);
            --dd-revealed-text: rgb(220,252,231);
        }

        .draggable-item.revealed-answer {
            background: var(--dd-revealed-bg) !important;
            border-color: var(--dd-revealed-border) !important;
            color: var(--dd-revealed-text) !important;
            box-shadow: 0 0 0 2px var(--dd-revealed-ring), 0 10px 22px rgba(15,23,42,.08) !important;
        }

        .draggable-item.revealed-answer::before {
            background: currentColor !important;
            opacity: .45;
        }

        .slot.revealed-slot {
            background: var(--dd-revealed-bg) !important;
            border-color: var(--dd-revealed-border) !important;
            box-shadow: inset 0 0 0 1px var(--dd-revealed-ring), 0 10px 22px rgba(15,23,42,.06) !important;
        }

        .category-content.absolute .draggable-item.revealed-answer {
            background: rgba(79,70,229,.94) !important;
            border-color: rgba(255,255,255,.72) !important;
            color: #ffffff !important;
            box-shadow:
                    0 0 0 2px rgba(129,140,248,.36),
                    0 12px 24px rgba(15,23,42,.24) !important;
            text-shadow: 0 1px 2px rgba(15,23,42,.34);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .slide-layout.slide-theme-orange .category-content.absolute .draggable-item.revealed-answer {
            background: rgba(234,88,12,.94) !important;
            box-shadow:
                    0 0 0 2px rgba(251,146,60,.38),
                    0 12px 24px rgba(15,23,42,.24) !important;
        }

        .slide-layout.slide-theme-green .category-content.absolute .draggable-item.revealed-answer {
            background: rgba(22,163,74,.94) !important;
            box-shadow:
                    0 0 0 2px rgba(74,222,128,.34),
                    0 12px 24px rgba(15,23,42,.24) !important;
        }

        .image-pool-label {
            position: absolute;
            top: auto !important;
            inset-inline: 0;
            bottom: 0 !important;
            display: none;
            align-items: center;
            justify-content: flex-start;
            min-height: 2.25rem;
            padding: 1.85rem .5rem .42rem;
            color: #111827;
            background: linear-gradient(to top, rgba(255,255,255,.96), rgba(255,255,255,.78) 58%, rgba(255,255,255,0));
            font-size: .68rem;
            font-weight: 900;
            line-height: 1.1;
            text-align: left;
            text-shadow: 0 1px 0 rgba(255,255,255,.65);
            pointer-events: none;
        }

        .dark .image-pool-label {
            color: #f8fafc;
            background: linear-gradient(to top, rgba(2,6,23,.94), rgba(15,23,42,.72) 58%, rgba(15,23,42,0));
            text-shadow: 0 1px 2px rgba(0,0,0,.45);
        }

        .draggable-item.has-image-overlay-text .image-pool-label {
            display: flex;
        }

        @media (min-width: 640px) {
            .image-pool-label {
                min-height: 2.55rem;
                font-size: .76rem;
                padding: 2.1rem .62rem .5rem;
            }
        }

        .speak-btn.speaking .wave-bar { display: block; animation: waveGrowth .6s infinite ease-in-out; }
        .speak-btn.speaking .static-icon { display: none; }
        .wave-bar { display: none; width: 3px; height: 12px; background: currentColor; border-radius: 2px; margin: 0 1px; }
        .category-box.audio-active { border-color: rgba(99,102,241,.34); box-shadow: 0 0 0 1px rgba(99,102,241,.12), 0 18px 40px -28px rgba(79,70,229,.35); }

        .slot:empty::before {
            content: 'Drop here';
            display: inline-flex;
            align-items: center;
            justify-content: center;
            max-width: calc(100% - .5rem);
            color: rgba(15,23,42,.82);
            font-size: 11px;
            font-weight: 900;
            line-height: 1.15;
            letter-spacing: .025em;
            text-transform: none;
            white-space: nowrap;
            text-shadow: none;
        }

        .slot:empty:not(.aspect-square) {
            min-width: 5.75rem;
            padding-inline: .8rem;
            box-sizing: border-box;
        }

        .dark .slot:empty::before {
            color: rgba(15,23,42,.82);
            text-shadow: none;
        }

        .category-content.absolute .slot:empty::before,
        .dark .category-content.absolute .slot:empty::before {
            color: rgba(15,23,42,.82);
            text-shadow: none;
        }

        .category-box.drop-active {
            border-color: rgba(100,116,139,.48);
            box-shadow: 0 0 0 1px rgba(100,116,139,.14), 0 14px 30px -24px rgba(15,23,42,.30);
        }

        .category-box.drop-wrong {
            border-color: rgba(239,68,68,.55);
            box-shadow: 0 0 0 1px rgba(239,68,68,.18), 0 14px 30px -24px rgba(127,29,29,.34);
        }

        .slot.slot-active {
            border-color: rgba(100,116,139,.70) !important;
            background: rgba(248,250,252,.96) !important;
            box-shadow: inset 0 0 0 1px rgba(100,116,139,.12), 0 0 0 3px rgba(100,116,139,.08);
        }

        .slot.slot-active:empty::before {
            color: rgba(30,41,59,.90);
        }

        .dark .slot.slot-active {
            border-color: rgba(203,213,225,.54) !important;
            background: rgba(226,232,240,.86) !important;
            box-shadow: inset 0 0 0 1px rgba(148,163,184,.16), 0 0 0 3px rgba(148,163,184,.08);
        }

        .dark .slot.slot-active:empty::before {
            color: rgba(15,23,42,.90);
        }

        .slot.slot-wrong {
            border-color: rgba(239,68,68,.78) !important;
            background: rgba(254,242,242,.96) !important;
            box-shadow: inset 0 0 0 1px rgba(239,68,68,.18), 0 0 0 3px rgba(239,68,68,.10);
        }

        .slot.slot-wrong:empty::before {
            color: rgba(127,29,29,.92);
        }

        .dark .slot.slot-wrong {
            border-color: rgba(252,165,165,.62) !important;
            background: rgba(127,29,29,.42) !important;
            box-shadow: inset 0 0 0 1px rgba(252,165,165,.16), 0 0 0 3px rgba(252,165,165,.08);
        }

        .dark .slot.slot-wrong:empty::before {
            color: rgba(254,226,226,.95);
        }


        @media (prefers-reduced-motion: reduce) {
            .returning { transition: none; }
            .shake { animation: none; }
            .locked { animation: none; }
        }

        .dd-categories-grid {
            grid-template-columns: repeat(var(--dd-cols-mobile, 2), minmax(0, 1fr));
        }

        @media (min-width: 640px) {
            .dd-categories-grid {
                grid-template-columns: repeat(var(--dd-cols-sm, 4), minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .dd-categories-grid {
                grid-template-columns: repeat(var(--dd-cols-lg, 4), minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .dd-categories-grid {
                grid-template-columns: repeat(var(--dd-cols-xl, 6), minmax(0, 1fr));
            }
        }
    </style>
@endsection

@section('content')
    @php
        $normalizedCategories = [];
        $categoriesSource = isset($content['categories']) && is_array($content['categories'])
            ? $content['categories']
            : [];
        $categoryMaxWidthOverride = $content['category_max_width'] ?? null;
        $categoryContentGridClass = $content['category_content_grid_class'] ?? null;
        $initialVisibleSlots = max(1, (int) ($content['initial_visible_slots'] ?? 1));

        foreach ($categoriesSource as $cat => $categoryData) {
            if ($type === 'image') {
                $normalizedCategories[$cat] = [
                    'image' => $categoryData['image'] ?? null,
                    'sound' => $categoryData['sound'] ?? null,
                    'items' => is_array($categoryData['items'] ?? null) ? $categoryData['items'] : [],
                ];
                continue;
            }

            $emoji = null;
            $items = [];

            if (is_array($categoryData) && array_key_exists('items', $categoryData)) {
                $items = is_array($categoryData['items']) ? $categoryData['items'] : [];
                if (array_key_exists('emoji', $categoryData)) {
                    $emoji = $categoryData['emoji'];
                }
            } else {
                $items = is_array($categoryData) ? $categoryData : [];
            }

            $normalizedCategories[$cat] = [
                'emoji' => $emoji,
                'items' => $items,
            ];
        }

        $categoryCount = count($normalizedCategories);
        $effectiveCategoryCount = max(1, $categoryCount);

        $mobileCols = min($effectiveCategoryCount, 2);
        $smallCols = min($effectiveCategoryCount, 4);
        $largeCols = $effectiveCategoryCount <= 5 ? min($effectiveCategoryCount, 5) : 4;

        if ($effectiveCategoryCount <= 6) {
            $wideCols = $effectiveCategoryCount;
        } elseif ($effectiveCategoryCount <= 8) {
            $wideCols = 4;
        } elseif ($effectiveCategoryCount <= 10) {
            $wideCols = 5;
        } else {
            $wideCols = 6;
        }

        $categoryGridStyle = sprintf(
            '--dd-cols-mobile:%d; --dd-cols-sm:%d; --dd-cols-lg:%d; --dd-cols-xl:%d;',
            $mobileCols,
            $smallCols,
            $largeCols,
            $wideCols
        );

        if ($wideCols <= 1) {
            $categoryMaxWidth = 'max-w-2xl';
        } elseif ($wideCols === 2) {
            $categoryMaxWidth = 'max-w-6xl';
        } elseif ($wideCols === 3) {
            $categoryMaxWidth = 'max-w-7xl';
        } elseif ($wideCols === 4) {
            $categoryMaxWidth = 'max-w-[1200px]';
        } else {
            $categoryMaxWidth = 'max-w-[1400px]';
        }

        if (!empty($categoryMaxWidthOverride)) {
            $categoryMaxWidth = $categoryMaxWidthOverride;
        }
        $isImagePoolType = $poolItemType === 'image';
        $poolPlacement = $content['pool_placement'] ?? ($isImagePoolType ? 'bottom' : 'top');
        $poolPlacement = in_array($poolPlacement, ['top', 'bottom'], true)
            ? $poolPlacement
            : ($isImagePoolType ? 'bottom' : 'top');
        $isTopPool = $poolPlacement === 'top';
    @endphp


    <main class="flex min-h-[100dvh] w-full flex-col">
        <div id="ddShell" class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col px-3 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
            <div class="shrink-0">
                @include('slider.components.title-subtitle')
                @include('slider.components.game-status')
            </div>

            <section id="ddGameColumn" class="{{ $isTopPool ? 'order-3' : 'order-2' }} flex min-h-0 w-full flex-1 flex-col items-center">
                @if($type === 'image')
                    <div
                            class="dd-categories-grid mt-3 grid w-full {{ $categoryMaxWidth }} gap-2 sm:gap-3 lg:gap-3"
                            style="{{ $categoryGridStyle }}"
                            id="categoriesContainer"
                    >
                        @foreach($normalizedCategories as $cat => $config)
                            <div
                                    class="category-box relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/80 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/35"
                                    data-category="{{ $cat }}"
                                    data-slot-total="{{ count($config['items']) }}"
                            >
                                <div class="relative aspect-square w-full overflow-hidden bg-slate-100 dark:bg-slate-800">
                                    @if($config['image'])
                                        <img src="{{ $config['image'] }}" class="absolute inset-0 h-full w-full object-cover pointer-events-none" alt="{{ $cat }}" draggable="false">
                                    @endif

                                    @if(!empty($config['sound']))
                                        <div class="absolute right-2 top-2 z-10 sm:right-3 sm:top-3">
                                            <button
                                                    type="button"
                                                    class="speak-btn inline-flex items-center justify-center rounded-full border border-white/60 bg-slate-950/25 p-0 text-white shadow-lg shadow-slate-950/20 backdrop-blur-md transition hover:scale-[1.04] hover:bg-slate-950/35 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-white/30"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $config['sound'] }}"
                                            >
                                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-full sm:h-11 sm:w-11">
                                                    <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>
                                                    <span class="wave-bar" style="animation-delay:.1s"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s"></span>
                                                </span>
                                            </button>
                                        </div>
                                    @endif

                                    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-slate-950/20 via-slate-950/5 to-transparent dark:from-slate-950/28"></div>

                                    <div class="category-content absolute inset-x-0 bottom-0 flex w-full items-center justify-center p-1.5 sm:p-2" data-dropzone="1">
                                        @if(count($config['items']) > 0)
                                            @for($slotIndex = 0; $slotIndex < min(count($config['items']), $initialVisibleSlots); $slotIndex++)
                                                <div class="slot {{ $isImagePoolType ? 'mx-auto aspect-square w-[100px] sm:w-[112px] lg:w-[118px]' : 'w-full min-h-[36px] sm:min-h-[42px]' }} rounded-xl border border-dashed border-slate-300/80 bg-white/85 shadow-inner dark:border-slate-300/50 dark:bg-slate-100/85" data-slot="1"></div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                            class="dd-categories-grid mt-3 grid w-full {{ $categoryMaxWidth }} gap-3 sm:gap-4"
                            style="{{ $categoryGridStyle }}"
                            id="categoriesContainer"
                    >
                        @foreach($normalizedCategories as $cat => $categoryConfig)
                            @php
                                $emoji = $categoryConfig['emoji'] ?? null;
                                $slotCount = is_array($categoryConfig['items'] ?? null) ? count($categoryConfig['items']) : 0;
                                $isSingleSlot = $slotCount === 1;
                            @endphp

                            <div
                                    class="category-box relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/80 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/35"
                                    data-category="{{ $cat }}"
                                    data-slot-total="{{ $slotCount }}"
                            >
                                <div class="relative flex min-h-[160px] flex-col px-3 py-3 sm:min-h-[180px] sm:px-4 sm:py-4 lg:min-h-[190px]">
                                    <div class="flex items-center justify-center gap-2">
                                        @if($emoji !== null && $emoji !== '')
                                            <div class="grid h-9 w-9 place-items-center rounded-xl bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-100 sm:h-10 sm:w-10">
                                                <span class="text-lg leading-none sm:text-xl">{{ $emoji }}</span>
                                            </div>
                                        @endif
                                        <div class="text-sm font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-base">
                                            {{ $cat }}
                                        </div>
                                    </div>

                                    <div class="mt-3 h-px w-full bg-slate-200/65 dark:bg-slate-700/55"></div>

                                    <div class="category-content mt-3 flex flex-1 items-center justify-center gap-2 {{ $isImagePoolType ? ('grid ' . ($categoryContentGridClass ?? ($isSingleSlot ? 'grid-cols-1' : 'grid-cols-2 sm:grid-cols-3'))) : 'flex-wrap' }}" data-dropzone="1">
                                        @if($slotCount > 0)
                                            @for($slotIndex = 0; $slotIndex < min($slotCount, $initialVisibleSlots); $slotIndex++)
                                                <div
                                                        class="slot grid place-items-center rounded-xl border border-dashed border-slate-300/80 bg-white/85 shadow-inner dark:border-slate-300/50 dark:bg-slate-100/85
                                                           {{ $isImagePoolType ? 'mx-auto aspect-square w-[100px] sm:w-[112px] lg:w-[118px]' : 'min-h-[34px] sm:min-h-[40px]' }}"
                                                        data-slot="1"
                                                ></div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @include('slider.components.game-win-modal')


                <template id="tileTpl">
                    @if($poolItemType === 'image')
                        <div
                                class="draggable-item relative select-none touch-none cursor-grab overflow-hidden rounded-xl aspect-square w-[82px] sm:w-[96px] md:w-[106px] lg:w-[112px] xl:w-[116px] border border-white/60 bg-white/90 shadow-[0_8px_18px_rgba(2,6,23,0.12)]"
                                style="touch-action:none;"
                                role="img"
                                aria-label=""
                        >
                            <img class="h-full w-full object-cover pointer-events-none" src="" alt="" draggable="false">
                            <span class="image-pool-label"></span>
                        </div>
                    @else
                        <div
                                class="draggable-item relative select-none touch-none cursor-grab rounded-xl px-3 py-2 pl-5 sm:px-3.5 sm:py-2 sm:pl-5 min-h-[34px] sm:min-h-[38px] text-[11px] sm:text-sm font-black text-white
                                   flex items-center justify-center text-center leading-tight
                                   shadow-[0_8px_18px_rgba(2,6,23,0.12)] border border-white/20
                                   before:absolute before:left-2 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-y-1/2 before:rounded-full before:bg-white/55"
                                style="touch-action:none;"
                        ></div>
                    @endif
                </template>
            </section>

            <div id="poolBar" data-pool-placement="{{ $poolPlacement }}" class="{{ $isTopPool ? 'order-2 sticky top-0 z-[900] px-0 py-2 sm:py-3' : 'order-3 fixed inset-x-0 bottom-0 z-[1500] px-2 pb-2 sm:px-4 sm:pb-3' }}">
                <div class="mx-auto w-full {{ $isTopPool ? 'max-w-6xl' : 'max-w-5xl' }}">
                    <div class="relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/92 {{ $isTopPool ? 'shadow-[0_8px_24px_rgba(2,6,23,0.06)]' : 'shadow-[0_-10px_28px_rgba(2,6,23,0.08)]' }} backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/82">
                        <div class="relative px-2.5 py-2 sm:px-4 sm:py-2.5">
                            @if(!$isTopPool)
                                <div class="flex items-center justify-center sm:hidden">
                                    <div class="h-1 w-10 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>
                            @endif

                            <div class="{{ $isTopPool ? '' : 'mt-2 sm:mt-0' }} flex items-center justify-between gap-2">
                                <div class="flex items-center gap-1.5 sm:gap-2">
                                    <button
                                            type="button"
                                            id="poolPrevBtn"
                                            class="pool-nav-btn inline-flex h-7 w-7 items-center justify-center rounded-full border border-slate-200/70 bg-white/90 text-base font-black text-slate-600 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700/60 dark:bg-slate-900/85 dark:text-slate-200"
                                            aria-label="Show previous sentences"
                                    >
                                        ‹
                                    </button>

                                    <div id="poolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/75 px-2.5 py-1 text-[10px] font-black text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:text-xs">
                                        0/0
                                    </div>

                                    <button
                                            type="button"
                                            id="poolNextBtn"
                                            class="pool-nav-btn inline-flex h-7 w-7 items-center justify-center rounded-full border border-slate-200/70 bg-white/90 text-base font-black text-slate-600 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700/60 dark:bg-slate-900/85 dark:text-slate-200"
                                            aria-label="Show more sentences"
                                    >
                                        ›
                                    </button>
                                </div>

                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    <button
                                            type="button"
                                            id="revealAnswersBtn"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/80 px-3 py-1.5 text-[11px] font-black text-slate-700 shadow-sm transition-colors duration-200 hover:bg-slate-50 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-xs"
                                    >
                                        Reveal answers
                                    </button>

                                    <button
                                            type="button"
                                            id="retakeTestBtn"
                                            class="hidden inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/80 px-3 py-1.5 text-[11px] font-black text-slate-700 shadow-sm transition-colors duration-200 hover:bg-slate-50 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-xs"
                                    >
                                        Retake test
                                    </button>
                                </div>
                            </div>

                            <div class="my-1.5 h-px w-full bg-slate-200/50 dark:bg-slate-700/45"></div>

                            <div id="poolContent" class="mx-auto flex w-full max-w-full flex-wrap items-start justify-center gap-1.5 overflow-hidden sm:gap-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        const GAME_TYPE = @json($type);
        const POOL_ITEM_TYPE = @json($poolItemType);
        const categoriesData = @json($normalizedCategories);
        const STICKY_POOL_VISIBLE_CAP = Number(@json($content['sticky_pool_visible_cap'] ?? 0));
        const INITIAL_VISIBLE_SLOTS = Math.max(1, Number(@json($initialVisibleSlots)));
        const POOL_PLACEMENT = @json($poolPlacement);
        const IMAGE_TEXT_STYLE = @json($content['image_text_style'] ?? '');

        const SFX = {
            enabled: true,
            sources: {
                correct: '/slider/sounds/correct.wav',
                wrong:   '/slider/sounds/wrong.wav',
                success: '/slider/sounds/success.wav',
            },
            volume: {
                correct: 1,
                wrong:   1,
                success: 1,
            }
        };

        const audio = {
            correct: new Audio(SFX.sources.correct),
            wrong: new Audio(SFX.sources.wrong),
            success: new Audio(SFX.sources.success),
        };
        const categoryAudio = new Audio();
        categoryAudio.preload = "auto";
        categoryAudio.crossOrigin = "anonymous";
        const itemAudio = new Audio();
        itemAudio.preload = "auto";
        let currentCategoryAudioBtn = null;
        let currentCategoryAudioCard = null;
        let currentCategoryAudioSrc = "";
        let currentItemAudioBtn = null;
        let currentItemAudioSrc = "";

        function clamp01(v){
            v = Number(v);
            if (!Number.isFinite(v)) return 0.5;
            return Math.max(0, Math.min(1, v));
        }
        function applyVolumes(){
            audio.correct.volume = clamp01(SFX.volume.correct);
            audio.wrong.volume   = clamp01(SFX.volume.wrong);
            audio.success.volume = clamp01(SFX.volume.success);
        }
        applyVolumes();

        function play(sound){
            if (!SFX.enabled || !sound) return;
            sound.pause();
            sound.currentTime = 0;
            sound.play().catch(()=>{});
        }

        function playCorrect(){ play(audio.correct); }
        function playWrong(){ play(audio.wrong); }
        function playWin(){ play(audio.success); }

        function setCategoryAudioState(button, card, isPlaying){
            if (button) button.classList.toggle("speaking", isPlaying);
            if (card) card.classList.toggle("audio-active", isPlaying);
        }

        function resetCategoryAudioState(){
            setCategoryAudioState(currentCategoryAudioBtn, currentCategoryAudioCard, false);
            currentCategoryAudioBtn = null;
            currentCategoryAudioCard = null;
            currentCategoryAudioSrc = "";
        }

        function stopCategoryAudio(){
            try {
                categoryAudio.pause();
                categoryAudio.currentTime = 0;
                categoryAudio.removeAttribute("src");
                categoryAudio.load();
            } catch (e) {}

            resetCategoryAudioState();
        }

        function stopItemAudio(){
            try {
                itemAudio.pause();
                itemAudio.currentTime = 0;
                itemAudio.removeAttribute("src");
                itemAudio.load();
            } catch (e) {}

            if (currentItemAudioBtn) {
                currentItemAudioBtn.classList.remove('bg-white/45', 'scale-105');
            }

            currentItemAudioBtn = null;
            currentItemAudioSrc = "";
        }

        function playOrToggleItemAudio(button){
            const src = button?.closest?.('.draggable-item')?.dataset?.audio || "";
            if (!src) return;

            if (currentItemAudioSrc === src && !itemAudio.paused) {
                stopItemAudio();
                return;
            }

            stopCategoryAudio();
            stopItemAudio();

            currentItemAudioBtn = button;
            currentItemAudioSrc = src;
            button.classList.add('bg-white/45', 'scale-105');

            itemAudio.src = src;
            itemAudio.currentTime = 0;
            itemAudio.play().catch(stopItemAudio);
        }

        function playOrToggleCategoryAudio(button){
            const src = button.getAttribute("data-audio") || "";
            const card = button.closest(".category-box");
            if (!src) return;

            if (currentCategoryAudioSrc === src && !categoryAudio.paused) {
                stopCategoryAudio();
                return;
            }

            stopCategoryAudio();

            currentCategoryAudioBtn = button;
            currentCategoryAudioCard = card;
            currentCategoryAudioSrc = src;
            setCategoryAudioState(currentCategoryAudioBtn, currentCategoryAudioCard, true);

            try {
                categoryAudio.src = src;
                categoryAudio.currentTime = 0;
                const playPromise = categoryAudio.play();
                if (playPromise && typeof playPromise.catch === "function") {
                    playPromise.catch(() => stopCategoryAudio());
                }
            } catch (e) {
                stopCategoryAudio();
            }
        }

        function isEmbedded(){ try { return window.top !== window.self; } catch(e){ return true; } }
        function goNextSlide(){
            if (isEmbedded()) {
                try { if (window.parent && typeof window.parent.nextSlide === "function") { window.parent.nextSlide(); return; } } catch (e) {}
                try { window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*"); return; } catch (e) {}
            }
        }

        function updatePoolSafeSpace() {
            const poolBar = document.getElementById('poolBar');
            const shell = document.getElementById('ddShell');
            if (!poolBar || !shell) return;

            if (POOL_PLACEMENT === 'top') {
                shell.style.paddingBottom = '';
                document.documentElement.style.setProperty('--pool-safe-space', '0px');
                document.documentElement.style.setProperty('--layout-bottom-safe-space', '0px');
                requestAnimationFrame(updateTopPoolSticky);
                return;
            }

            const w = window.innerWidth || 1024;
            const extra = w < 640 ? 18 : (w < 1024 ? 22 : 24);
            const safe = poolBar.offsetHeight + extra;

            shell.style.paddingBottom = `${safe}px`;
            document.documentElement.style.setProperty('--pool-safe-space', `${safe}px`);
            document.documentElement.style.setProperty('--layout-bottom-safe-space', '0px');
        }

        function updateGameVerticalBalance() {
            const gameColumn = document.getElementById('ddGameColumn');
            if (!gameColumn) return;

            gameColumn.classList.remove('justify-center');
            requestAnimationFrame(() => {
                const layout = document.querySelector('.slide-layout');
                const pageHeight = layout
                    ? layout.scrollHeight
                    : Math.max(document.documentElement.scrollHeight || 0, document.body.scrollHeight || 0);
                const viewportHeight = layout
                    ? layout.clientHeight
                    : (window.innerHeight || document.documentElement.clientHeight || 0);
                const fitsWithoutScroll = pageHeight <= viewportHeight + 4;
                gameColumn.classList.toggle('justify-center', fitsWithoutScroll);
            });
        }

        let topPoolStickyMarker = null;
        let topPoolStickyInitialized = false;

        function getScrollParentsForTopPool() {
            const parents = [window];
            const layout = document.querySelector('.slide-layout');
            if (layout) parents.push(layout);
            return parents;
        }

        function getTopPoolOffset() {
            const raw = getComputedStyle(document.documentElement).getPropertyValue('--dd-top-pool-offset') || '0';
            const value = parseFloat(raw);
            return Number.isFinite(value) ? value : 0;
        }

        function updateTopPoolSticky() {
            if (POOL_PLACEMENT !== 'top') return;

            const poolBar = document.getElementById('poolBar');
            const gameColumn = document.getElementById('ddGameColumn');
            if (!poolBar || !gameColumn || !topPoolStickyMarker) return;

            const offset = getTopPoolOffset();
            const shouldStick = topPoolStickyMarker.getBoundingClientRect().top <= offset;

            poolBar.classList.toggle('is-stuck', shouldStick);
            gameColumn.style.paddingTop = shouldStick ? `${poolBar.offsetHeight + 12}px` : '';
        }

        function setupTopPoolSticky() {
            if (POOL_PLACEMENT !== 'top' || topPoolStickyInitialized) return;

            const poolBar = document.getElementById('poolBar');
            if (!poolBar) return;

            topPoolStickyInitialized = true;
            topPoolStickyMarker = document.createElement('div');
            topPoolStickyMarker.setAttribute('aria-hidden', 'true');
            topPoolStickyMarker.className = 'h-0 w-full';
            poolBar.parentNode.insertBefore(topPoolStickyMarker, poolBar);

            getScrollParentsForTopPool().forEach((target) => {
                target.addEventListener('scroll', updateTopPoolSticky, { passive: true });
            });

            requestAnimationFrame(updateTopPoolSticky);
        }

        window.stopSlideAudio = function(){
            stopCategoryAudio();
            stopItemAudio();

            Object.values(audio).forEach(a => {
                if (a){
                    a.pause();
                    a.currentTime = 0;
                }
            });
        };

        categoryAudio.addEventListener("ended", stopCategoryAudio);
        categoryAudio.addEventListener("error", stopCategoryAudio);
        itemAudio.addEventListener("ended", stopItemAudio);
        itemAudio.addEventListener("error", stopItemAudio);

        document.addEventListener("click", (event) => {
            const button = event.target.closest(".speak-btn");
            if (!button) return;

            event.preventDefault();
            event.stopPropagation();
            playOrToggleCategoryAudio(button);
        });

        document.addEventListener("pointerdown", (event) => {
            const button = event.target.closest(".word-audio-btn");
            if (!button) return;

            event.preventDefault();
            event.stopPropagation();
        }, true);

        document.addEventListener("click", (event) => {
            const button = event.target.closest(".word-audio-btn");
            if (!button) return;

            event.preventDefault();
            event.stopPropagation();
            playOrToggleItemAudio(button);
        }, true);

        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                stopCategoryAudio();
                stopItemAudio();
            }
        });

        window.addEventListener("beforeunload", () => {
            stopCategoryAudio();
            stopItemAudio();
        });
        window.addEventListener("pagehide", () => {
            stopCategoryAudio();
            stopItemAudio();
        });

        class Game {
            constructor(){
                this.poolContent = document.getElementById('poolContent');
                this.poolCount = document.getElementById('poolCount');
                this.poolPrevBtn = document.getElementById('poolPrevBtn');
                this.poolNextBtn = document.getElementById('poolNextBtn');
                this.revealAnswersBtn = document.getElementById('revealAnswersBtn');
                this.retakeTestBtn = document.getElementById('retakeTestBtn');
                this.winModal = document.getElementById('winModal');
                this.restartBtnModal = document.getElementById('restartBtnModal');
                this.continueBtnModal = document.getElementById('continueBtnModal');
                this.tileTpl = document.getElementById('tileTpl');
                this.isImageType = GAME_TYPE === 'image';
                this.isImagePoolType = POOL_ITEM_TYPE === 'image';

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this._raf = null;
                this._mx = 0;
                this._my = 0;
                this.poolStartIndex = 0;
                this.lastVisibleCap = 0;

                this.pendingDrag = null;
                this.dragStartThreshold = 6;
                this.lastClientX = 0;
                this.lastClientY = 0;
                this.activeScrollContainer = null;
                this.scrollThreshold = this.isImageType ? 72 : 82;
                this.scrollSpeed = this.isImageType ? 12 : 8;
                this._scrollTimer = null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePointerCancel = this.handlePointerCancel.bind(this);
                this.handlePoolPrev = this.handlePoolPrev.bind(this);
                this.handlePoolNext = this.handlePoolNext.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                this.tileSkins = [
                    'bg-slate-700 dark:bg-slate-600',
                    'bg-indigo-600 dark:bg-indigo-700',
                    'bg-sky-600 dark:bg-sky-700',
                    'bg-emerald-600 dark:bg-emerald-700',
                    'bg-violet-600 dark:bg-violet-700',
                    'bg-cyan-600 dark:bg-cyan-700',
                ];

                this.imageTileSkins = ['bg-slate-700', 'bg-indigo-600', 'bg-sky-600', 'bg-emerald-600'];

                this.poolPrevBtn?.addEventListener('click', this.handlePoolPrev);
                this.poolNextBtn?.addEventListener('click', this.handlePoolNext);
                this.revealAnswersBtn?.addEventListener('click', this.handleRevealAnswers);
                this.retakeTestBtn?.addEventListener('click', this.handleRetakeTest);
                this.restartBtnModal?.addEventListener('click', () => this.init());
                this.continueBtnModal?.addEventListener('click', goNextSlide);
            }

            clearDragInteractionState(){
                document.body.classList.remove('dd-drag-active');
                document.querySelectorAll('.category-box').forEach((box) => {
                    box.classList.remove(
                        'drop-active',
                        'drop-wrong',
                        'ring-4',
                        'ring-indigo-500/30',
                        'ring-2',
                        'ring-indigo-500/40',
                        'bg-indigo-50/60',
                        'dark:bg-indigo-500/10'
                    );
                });
                document.querySelectorAll('.slot').forEach((slot) => {
                    slot.classList.remove('slot-active', 'slot-wrong');
                });
            }

            stopAutoScroll(){
                if (this._scrollTimer) {
                    clearInterval(this._scrollTimer);
                    this._scrollTimer = null;
                }
                this.activeScrollContainer = null;
            }

            stopDragTracking(){
                this.stopAutoScroll();

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                this.pendingDrag = null;
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);
            }

            resetActiveDrag(){
                const item = this.draggedItem;
                const placeholder = this.placeholder;
                const originalBox = this.originalParent?.closest?.('.category-box') || null;

                this.stopDragTracking();
                this.clearDragInteractionState();

                if (item) {
                    item.classList.remove('dragging', 'returning', 'shake', 'wrong-feedback');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.height = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (placeholder?.parentNode) {
                        placeholder.parentNode.insertBefore(item, placeholder);
                    } else if (this.originalParent) {
                        this.originalParent.appendChild(item);
                    } else {
                        this.returnTileToPool(item);
                    }
                }

                if (placeholder?.parentNode) {
                    placeholder.remove();
                }

                if (originalBox) {
                    this.syncCategorySlotLayout(originalBox);
                }

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                updatePoolSafeSpace();
                updateGameVerticalBalance();
            }

            handlePointerCancel(){
                if (!this.draggedItem) {
                    this.stopDragTracking();
                    this.clearDragInteractionState();
                    return;
                }

                this.resetActiveDrag();
            }

            getManualVisibleCap(){
                return Number.isFinite(STICKY_POOL_VISIBLE_CAP) && STICKY_POOL_VISIBLE_CAP > 0
                    ? STICKY_POOL_VISIBLE_CAP
                    : 0;
            }

            getFallbackVisibleCap(){
                const w = window.innerWidth || 1024;

                if (this.isImagePoolType) {
                    if (w < 640) return 6;
                    if (w < 1024) return 8;
                    if (w < 1440) return 10;
                    return 12;
                }

                if (this.isImageType) {
                    if (w < 640) return 6;
                    if (w < 1024) return 10;
                    if (w < 1440) return 14;
                    return 16;
                }

                if (w < 640) return 6;
                if (w < 1024) return 8;
                if (w < 1440) return 12;
                return 14;
            }

            getPoolMaxHeight(){
                const w = window.innerWidth || 1024;
                const vh = window.innerHeight || 768;

                if (this.isImagePoolType) {
                    if (w < 640) return Math.max(170, Math.min(300, Math.round(vh * 0.38)));
                    if (w < 1024) return Math.max(180, Math.min(300, Math.round(vh * 0.34)));
                    if (w < 1440) return Math.max(165, Math.min(275, Math.round(vh * 0.30)));
                    return Math.max(165, Math.min(275, Math.round(vh * 0.28)));
                }

                if (w < 640) return Math.max(120, Math.min(210, Math.round(vh * 0.30)));
                if (w < 1024) return Math.max(120, Math.min(190, Math.round(vh * 0.24)));
                if (w < 1440) return Math.max(120, Math.min(185, Math.round(vh * 0.22)));
                return Math.max(120, Math.min(175, Math.round(vh * 0.20)));
            }

            measureVisibleCap(tiles){
                const total = tiles.length;
                if (total <= 1) return total;

                const manualCap = this.getManualVisibleCap();
                if (manualCap > 0) {
                    return Math.max(1, Math.min(total, manualCap));
                }

                const poolBar = document.getElementById('poolBar');
                if (!poolBar || !this.poolContent) {
                    return Math.max(1, Math.min(total, this.getFallbackVisibleCap()));
                }

                if (this.isImagePoolType) {
                    const sample = tiles.find((tile) => !tile.classList.contains('hidden')) || tiles[0];
                    const sampleRect = sample?.getBoundingClientRect?.();
                    const contentRect = this.poolContent.getBoundingClientRect();
                    const style = window.getComputedStyle(this.poolContent);
                    const gap = parseFloat(style.columnGap || style.gap || '8') || 8;
                    const tileWidth = Math.max(76, Math.round(sampleRect?.width || (window.innerWidth < 640 ? 82 : window.innerWidth < 1024 ? 106 : 116)));
                    const availableWidth = Math.max(1, Math.floor(contentRect.width || this.poolContent.clientWidth || poolBar.clientWidth || window.innerWidth));
                    const perRow = Math.max(1, Math.floor((availableWidth + gap) / (tileWidth + gap)));
                    const rows = 2;
                    const geometricCap = Math.max(1, perRow * rows);
                    const fallbackCap = this.getFallbackVisibleCap();
                    return Math.max(1, Math.min(total, geometricCap, fallbackCap));
                }

                const maxHeight = this.getPoolMaxHeight();
                const fallbackCap = Math.max(1, Math.min(total, this.getFallbackVisibleCap()));

                const showRange = (start, count) => {
                    tiles.forEach((tile, index) => {
                        const visible = index >= start && index < start + count;
                        tile.classList.toggle('hidden', !visible);
                    });
                };

                showRange(0, total);
                if ((poolBar.offsetHeight || 0) <= maxHeight) {
                    return total;
                }

                let best = 1;
                for (let count = 1; count <= total; count++) {
                    showRange(0, count);
                    if ((poolBar.offsetHeight || 0) <= maxHeight) {
                        best = count;
                    } else {
                        break;
                    }
                }

                return Math.max(1, Math.min(total, Math.max(best, Math.min(fallbackCap, total))));
            }

            getVisibleCap(tiles = null){
                const poolTiles = Array.isArray(tiles)
                    ? tiles
                    : Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));

                return this.measureVisibleCap(poolTiles);
            }

            init(){
                this.winModal.classList.add('hidden');
                this.poolStartIndex = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                clearInterval(this.timerInt);
                this.startTimer();
                this.updateStats();

                document.querySelectorAll('.category-box').forEach((box) => {
                    this.resetCategorySlots(box);
                });
                this.poolContent.innerHTML = '';

                const keys = Object.keys(categoriesData);
                let items = [];
                keys.forEach(key => {
                    const category = categoriesData[key] || {};
                    const categoryItems = Array.isArray(category.items) ? category.items : [];
                    categoryItems.forEach((item, itemIndex) => {
                        if (this.isImagePoolType) {
                            if (typeof item === 'string') {
                                items.push({
                                    image: item,
                                    alt: `${key} ${itemIndex + 1}`,
                                    category: key,
                                    id: Math.random().toString(36).slice(2, 11)
                                });
                                return;
                            }

                            if (item && typeof item === 'object' && item.image) {
                                const itemText = item.text || item.label || item.title || '';
                                items.push({
                                    image: item.image,
                                    text: itemText,
                                    emoji: item.emoji || '',
                                    alt: item.alt || itemText || `${key} ${itemIndex + 1}`,
                                    category: key,
                                    id: Math.random().toString(36).slice(2, 11)
                                });
                                return;
                            }
                        }

                        items.push({
                            text: item && typeof item === 'object' ? (item.text || item.label || item.title || '') : item,
                            sound: item && typeof item === 'object' ? (item.sound || item.audio || '') : '',
                            category: key,
                            id: Math.random().toString(36).slice(2, 11)
                        });
                    });
                });

                items = this.shuffle(items);

                items.forEach((itemData, i) => {
                    const node = this.tileTpl.content.firstElementChild.cloneNode(true);
                    node.dataset.category = itemData.category;
                    node.dataset.id = itemData.id;

                    if (this.isImagePoolType) {
                        const img = node.querySelector('img');
                        const label = node.querySelector('.image-pool-label');
                        if (img) {
                            img.src = itemData.image;
                            img.alt = itemData.alt || '';
                            img.addEventListener('load', () => {
                                this.refreshPoolVisibility();
                                updatePoolSafeSpace();
                            }, { once: true });
                        }
                        if (label && IMAGE_TEXT_STYLE === 'overlay' && itemData.text) {
                            label.textContent = itemData.emoji ? `${itemData.text} ${itemData.emoji}` : itemData.text;
                            node.classList.add('has-image-overlay-text');
                        }
                        node.setAttribute('aria-label', itemData.alt || '');
                        node.title = itemData.alt || '';
                    } else {
                        const skins = this.isImageType ? this.imageTileSkins : this.tileSkins;
                        if (itemData.sound) {
                            node.classList.remove('pl-5', 'sm:pl-5', 'justify-center', 'text-center');
                            node.classList.add('gap-2', 'pl-2', 'pr-3', 'justify-start', 'text-left');
                            node.dataset.audio = itemData.sound;
                            node.innerHTML = `
                                <span
                                        class="word-audio-btn relative z-10 inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-white/25 text-white transition hover:bg-white/35"
                                        aria-label="Play ${itemData.text}"
                                >
                                    <svg class="h-4 w-4 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5 6 9H3v6h3l5 4V5Z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9.5a3 3 0 0 1 0 5"></path>
                                    </svg>
                                </span>
                                <span class="relative z-10 min-w-0 flex-1">${itemData.text}</span>
                            `;
                        } else {
                            node.textContent = itemData.text;
                        }
                        node.classList.add(...skins[i % skins.length].split(' '));
                    }

                    node.dataset.baseClass = node.className;
                    node.dataset.revealed = '0';
                    node.addEventListener('pointerdown', (e) => this.handlePointerDown(e, node));
                    this.poolContent.appendChild(node);
                });

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                updatePoolSafeSpace();
                requestAnimationFrame(() => {
                    this.refreshPoolVisibility();
                    updatePoolSafeSpace();
                    updateGameVerticalBalance();
                });
                updateGameVerticalBalance();
            }

            startTimer(){
                this.timerInt = setInterval(() => {
                    this.updateTimer();
                }, 1000);

                this.updateTimer();
            }

            formatElapsedTime(){
                const elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            updateTimer(){
                const timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            }

            getTotalTiles(){
                return Object.values(categoriesData).reduce((sum, category) => {
                    const categoryItems = Array.isArray(category?.items) ? category.items : [];
                    return sum + categoryItems.length;
                }, 0);
            }

            createSlotElement(){
                const slot = document.createElement('div');

                if (this.isImageType) {
                    slot.className = this.isImagePoolType
                        ? 'slot mx-auto aspect-square w-[100px] sm:w-[112px] lg:w-[118px] rounded-xl sm:rounded-2xl border-2 border-dashed border-slate-300/80 bg-white/85 shadow-inner dark:border-slate-300/50 dark:bg-slate-100/85'
                        : 'slot w-full min-h-[38px] sm:min-h-[46px] rounded-xl sm:rounded-2xl border-2 border-dashed border-slate-300/80 bg-white/85 shadow-inner dark:border-slate-300/50 dark:bg-slate-100/85';
                    slot.dataset.slot = '1';
                    return slot;
                }

                slot.className = this.isImagePoolType
                    ? 'slot grid place-items-center rounded-2xl border border-dashed border-slate-300/80 bg-white/85 shadow-inner mx-auto aspect-square w-[100px] sm:w-[112px] lg:w-[118px] dark:border-slate-300/50 dark:bg-slate-100/85'
                    : 'slot grid place-items-center rounded-2xl border border-dashed border-slate-300/80 bg-white/85 shadow-inner min-h-[34px] sm:min-h-[40px] dark:border-slate-300/50 dark:bg-slate-100/85';
                slot.dataset.slot = '1';
                this.resetTextSlotState(slot);
                return slot;
            }

            resetCategorySlots(targetBox){
                if (!targetBox) return;

                const dropzone = targetBox.querySelector('[data-dropzone]');
                const totalSlots = Number(targetBox.dataset.slotTotal || 0);
                if (!dropzone) return;

                dropzone.innerHTML = '';
                if (totalSlots > 0) {
                    const visibleSlots = Math.min(totalSlots, INITIAL_VISIBLE_SLOTS);

                    for (let i = 0; i < visibleSlots; i++) {
                        dropzone.appendChild(this.createSlotElement());
                    }
                }

                this.syncCategorySlotLayout(targetBox);
            }

            isSlotFilled(slot){
                return !!slot?.querySelector?.('.draggable-item');
            }

            revealNextSlot(targetBox){
                if (!targetBox) return;

                const totalSlots = Number(targetBox.dataset.slotTotal || 0);
                const currentSlots = targetBox.querySelectorAll('.slot').length;
                const filledSlots = Array.from(targetBox.querySelectorAll('.slot')).filter((slot) => this.isSlotFilled(slot)).length;
                const desiredSlots = Math.min(totalSlots, filledSlots + (filledSlots < totalSlots ? 1 : 0));

                if (desiredSlots <= currentSlots) return;

                const dropzone = targetBox.querySelector('[data-dropzone]');
                if (!dropzone) return;

                while (dropzone.querySelectorAll('.slot').length < desiredSlots) {
                    dropzone.appendChild(this.createSlotElement());
                }

                this.syncCategorySlotLayout(targetBox);
            }

            syncCategorySlotLayout(targetBox){
                if (!targetBox || this.isImagePoolType) return;

                const dropzone = targetBox.querySelector('[data-dropzone]');
                if (!dropzone) return;

                const slots = Array.from(dropzone.querySelectorAll('.slot'));
                const isSingleVisibleSlot = slots.length === 1;

                slots.forEach((slot) => {
                    if (!this.isSlotFilled(slot)) {
                        if (isSingleVisibleSlot) {
                            slot.style.width = '100%';
                            slot.style.maxWidth = '100%';
                            slot.style.display = 'grid';
                            slot.style.flex = '0 0 100%';
                            return;
                        }

                        this.resetTextSlotState(slot);
                        return;
                    }

                    if (isSingleVisibleSlot) {
                        slot.style.width = '100%';
                        slot.style.maxWidth = '100%';
                        slot.style.display = 'grid';
                        slot.style.flex = '0 0 100%';
                        return;
                    }

                    this.sizeTextSlotToContent(slot);
                });
            }

            syncAllCategorySlotLayouts(){
                if (this.isImagePoolType) return;

                document.querySelectorAll('.category-box').forEach((box) => {
                    this.syncCategorySlotLayout(box);
                });
            }

            getPlacedTiles(){
                return Array.from(document.querySelectorAll('.slot .draggable-item'));
            }

            getCorrectPlacedCount(){
                return this.getPlacedTiles().filter((tile) => {
                    if (tile.classList.contains('revealed-answer')) return false;
                    const box = tile.closest('.category-box');
                    return box && box.dataset.category === tile.dataset.category;
                }).length;
            }

            getPlacedCount(){
                return this.getPlacedTiles().length;
            }

            syncScoreFromBoard(){
                this.correctCount = this.getCorrectPlacedCount();
            }

            updateStats(){
                this.syncScoreFromBoard();
                const progressEl = document.getElementById('tilesCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');
                const total = this.getTotalTiles();

                if (progressEl) progressEl.textContent = `${this.correctCount}/${total}`;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            }

            refreshPoolVisibility(){
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                const cap = this.getVisibleCap(tiles);
                this.lastVisibleCap = cap;

                if (!tiles.length) {
                    this.poolStartIndex = 0;
                    this.updatePoolPager(0, cap, false);
                    return;
                }

                const shouldPage = Number.isFinite(cap) && tiles.length > cap;

                if (!shouldPage) {
                    this.poolStartIndex = 0;
                    tiles.forEach((t) => t.classList.remove('hidden'));
                    this.updatePoolPager(tiles.length, cap, false);
                    return;
                }

                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(this.poolStartIndex, maxStart);

                tiles.forEach((t, i) => {
                    const isVisible = i >= this.poolStartIndex && i < this.poolStartIndex + cap;
                    t.classList.toggle('hidden', !isVisible);
                });

                this.updatePoolPager(tiles.length, cap, true);
            }

            updatePoolCount(){
                if (!this.poolCount) return;

                const total = this.getTotalTiles();
                const remaining = this.poolContent.querySelectorAll('.draggable-item:not(.locked)').length;
                this.poolCount.textContent = `${remaining}/${total}`;
            }

            getRemainingTileCount(){
                return this.poolContent.querySelectorAll('.draggable-item:not(.locked)').length;
            }

            updateActionButtons(){
                const remaining = this.getRemainingTileCount();

                if (this.revealAnswersBtn) {
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !this.hasUsedReveal);
                }
            }

            shuffle(arr){
                const a = arr.slice();
                for (let i = a.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [a[i], a[j]] = [a[j], a[i]];
                }
                return a;
            }

            updatePoolPager(totalTiles, cap, isMobilePool){
                if (!this.poolPrevBtn || !this.poolNextBtn) return;

                const shouldShow = isMobilePool && totalTiles > cap;
                this.poolPrevBtn.classList.toggle('hidden', !shouldShow);
                this.poolNextBtn.classList.toggle('hidden', !shouldShow);

                if (!shouldShow) {
                    this.poolPrevBtn.classList.remove('pool-nav-hint');
                    this.poolNextBtn.classList.remove('pool-nav-hint');
                    return;
                }

                const maxStart = Math.max(0, totalTiles - cap);
                const hasPrevItems = this.poolStartIndex > 0;
                const hasNextItems = this.poolStartIndex < maxStart;

                this.poolPrevBtn.disabled = !hasPrevItems;
                this.poolNextBtn.disabled = !hasNextItems;
                this.poolPrevBtn.classList.toggle('pool-nav-hint', hasPrevItems);
                this.poolNextBtn.classList.toggle('pool-nav-hint', hasNextItems);
            }

            handlePoolPrev(){
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                const cap = this.lastVisibleCap || this.getVisibleCap(tiles);
                if (!Number.isFinite(cap) || cap <= 0) return;

                const step = Math.max(1, cap);
                this.poolStartIndex = Math.max(0, this.poolStartIndex - step);
                this.refreshPoolVisibility();
            }

            handlePoolNext(){
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                const cap = this.lastVisibleCap || this.getVisibleCap(tiles);
                if (!Number.isFinite(cap) || cap <= 0) return;

                const step = Math.max(1, cap);
                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + step);
                this.refreshPoolVisibility();
            }

            resetTileRuntimeStyles(tile){
                if (!tile) return;
                tile.classList.remove('dragging', 'returning', 'shake', 'wrong-feedback', 'hidden', 'placed-item', 'locked', 'revealed-answer');
                tile.style.position = '';
                tile.style.left = '';
                tile.style.top = '';
                tile.style.width = '';
                tile.style.height = '';
                tile.style.zIndex = '';
                tile.style.transform = '';
                tile.style.cursor = '';
                tile.style.maxWidth = '';
                tile.style.flex = '';
                tile.style.display = '';
            }

            restoreTileBaseClass(tile){
                if (!tile) return;
                if (tile.dataset.baseClass) {
                    tile.className = tile.dataset.baseClass;
                }
                tile.dataset.revealed = '0';
                this.resetTileRuntimeStyles(tile);
            }

            prepareTileForPool(tile){
                this.restoreTileBaseClass(tile);
                tile.setAttribute('draggable', 'false');
                if (this.isImagePoolType) {
                    tile.style.cursor = 'grab';
                }
            }

            returnTileToPool(tile, options = {}){
                if (!tile || !this.poolContent) return;
                const { prepend = false } = options;
                this.prepareTileForPool(tile);
                if (prepend && this.poolContent.firstChild) {
                    this.poolContent.insertBefore(tile, this.poolContent.firstChild);
                } else {
                    this.poolContent.appendChild(tile);
                }
            }

            normalizeTileForSlot(tile){
                this.restoreTileBaseClass(tile);
                tile.classList.add('placed-item');

                if (this.isImagePoolType) {
                    tile.classList.add('w-full', 'h-full');
                    tile.style.cursor = 'grab';
                    return;
                }

                tile.classList.add(
                    'ring-2','ring-emerald-400/50',
                    'max-w-full','flex','items-center','justify-center','text-center',
                    'px-2','py-1.5','leading-tight','rounded-xl'
                );
                tile.style.cursor = 'grab';
                tile.style.width = 'auto';
                tile.style.maxWidth = '100%';
                tile.style.height = 'auto';
                tile.style.flex = '0 1 auto';
                tile.style.display = 'inline-flex';
            }

            markTileAsRevealed(tile, slot){
                if (!tile) return;

                tile.classList.remove('ring-emerald-400/50');
                tile.classList.add('revealed-answer', 'locked');
                tile.dataset.revealed = '1';

                if (slot) {
                    slot.classList.add('revealed-slot');
                }

                if (this.isImagePoolType) {
                    return;
                }

                tile.classList.remove(...this.tileSkins.flatMap((skin) => skin.split(' ')));
                tile.classList.add(
                    'max-w-full',
                    'flex',
                    'items-center',
                    'justify-center',
                    'text-center',
                    'px-2',
                    'py-1.5',
                    'leading-tight',
                    'rounded-xl'
                );
            }

            resetTextSlotState(slot){
                if (this.isImagePoolType || !slot) return;

                slot.style.width = '';
                slot.style.maxWidth = '';
                slot.style.display = '';
                slot.style.flex = '';
            }

            sizeTextSlotToContent(slot){
                if (this.isImagePoolType || !slot) return;

                slot.style.width = 'fit-content';
                slot.style.maxWidth = '100%';
                slot.style.display = 'grid';
                slot.style.flex = '0 1 auto';
            }

            lockTileIntoSlot(item, targetBox, slot, options = {}){
                if (!item || !targetBox || !slot) return false;
                const { revealed = false, countAsMistake = false } = options;

                const existing = Array.from(slot.children).find((child) => {
                    return child.classList && child.classList.contains('draggable-item') && child !== item;
                });
                if (existing) {
                    return false;
                }

                item.classList.remove('dragging', 'returning', 'shake', 'wrong-feedback', 'hidden');
                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.height = '';
                item.style.zIndex = '';
                item.style.transform = '';

                slot.innerHTML = '';
                slot.appendChild(item);
                this.sizeTextSlotToContent(slot);
                this.normalizeTileForSlot(item);
                if (revealed) {
                    this.markTileAsRevealed(item, slot);
                }
                this.syncCategorySlotLayout(targetBox);

                if (countAsMistake) {
                    this.mistakeCount++;
                }
                this.revealNextSlot(targetBox);
                this.updateStats();
                return true;
            }

            findCategoryBox(category){
                return Array.from(document.querySelectorAll('.category-box')).find((box) => box.dataset.category === category) || null;
            }

            handleRevealAnswers(){
                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                const remainingTiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                if (!remainingTiles.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.updateActionButtons();

                remainingTiles.forEach((item) => {
                    const targetBox = this.findCategoryBox(item.dataset.category || '');
                    if (!targetBox) return;

                    const slot = this.getFirstEmptySlot(targetBox);
                    if (!slot) return;

                    this.lockTileIntoSlot(item, targetBox, slot, {
                        revealed: true,
                        countAsMistake: true
                    });
                });

                this.isRevealingAnswers = false;
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin({ showModal: false, delay: 0 });
                updatePoolSafeSpace();
            }

            handleRetakeTest(){
                this.init();
            }

            handlePointerDown(e, item){
                if (item.classList.contains('locked') || this.gameCompleted || this.isRevealingAnswers) return;
                if (this.draggedItem || this.pendingDrag) return;
                if (e.button !== undefined && e.button !== 0) return;

                this.pendingDrag = {
                    item,
                    pointerId: e.pointerId,
                    startX: e.clientX,
                    startY: e.clientY,
                };

                item.setPointerCapture?.(e.pointerId);
                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                document.addEventListener('pointercancel', this.handlePointerCancel, { passive: false });
            }

            beginDrag(e, item){
                if (!item || !item.isConnected) return false;

                e.preventDefault();
                document.body.classList.add('dd-drag-active');

                this.draggedItem = item;
                this.originalParent = item.parentElement;

                const rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = this.isImagePoolType
                    ? 'rounded-xl bg-slate-100/50'
                    : 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('dragging');
                item.style.width = rect.width + 'px';
                item.style.height = rect.height + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top  = (e.clientY - this.offsetY) + 'px';

                return true;
            }

            handlePointerMove(e){
                if (this.pendingDrag && !this.draggedItem) {
                    if (e.pointerId !== this.pendingDrag.pointerId) return;

                    const dx = e.clientX - this.pendingDrag.startX;
                    const dy = e.clientY - this.pendingDrag.startY;
                    const distance = Math.hypot(dx, dy);

                    if (distance < this.dragStartThreshold) return;

                    const item = this.pendingDrag.item;
                    this.pendingDrag = null;
                    if (!this.beginDrag(e, item)) {
                        this.stopDragTracking();
                        return;
                    }
                }

                if (!this.draggedItem) return;
                e.preventDefault();

                this.lastClientX = e.clientX;
                this.lastClientY = e.clientY;
                this._mx = e.clientX - this.offsetX;
                this._my = e.clientY - this.offsetY;

                if (!this._raf) {
                    this._raf = requestAnimationFrame(() => {
                        if (!this.draggedItem) { this._raf = null; return; }
                        this.draggedItem.style.left = this._mx + 'px';
                        this.draggedItem.style.top  = this._my + 'px';
                        this._raf = null;
                    });
                }

                this.checkHover(e.clientX, e.clientY);
                this.handleAutoScroll(e);
            }

            isDocumentScroller(scroller){
                return !scroller || scroller === window || scroller === document || scroller === document.body || scroller === document.documentElement || scroller === document.scrollingElement;
            }

            getDocumentScroller(){
                return document.scrollingElement || document.documentElement || document.body;
            }

            canScrollElement(el){
                if (!el) return false;

                if (this.isDocumentScroller(el)) {
                    const doc = this.getDocumentScroller();
                    return (doc.scrollHeight || 0) > (window.innerHeight || document.documentElement.clientHeight || 0) + 2;
                }

                const style = window.getComputedStyle(el);
                const overflowY = style.overflowY || '';
                const canProgrammaticallyScroll = /(auto|scroll|overlay|hidden)/.test(overflowY);
                return canProgrammaticallyScroll && (el.scrollHeight || 0) > (el.clientHeight || 0) + 2;
            }

            getAutoScrollContainer(){
                const candidates = [
                    document.querySelector('.slide-layout'),
                    document.getElementById('ddShell')?.closest?.('.slide-layout'),
                    this.getDocumentScroller(),
                ].filter(Boolean);

                return candidates.find((el, index, arr) => arr.indexOf(el) === index && this.canScrollElement(el)) || this.getDocumentScroller();
            }

            getScrollerRect(scroller){
                const vh = window.innerHeight || document.documentElement.clientHeight || 0;

                if (this.isDocumentScroller(scroller)) {
                    return { top: 0, bottom: vh, height: vh };
                }

                const rect = scroller.getBoundingClientRect();
                let top = Math.max(0, rect.top);
                let bottom = Math.min(vh, rect.bottom);

                if (POOL_PLACEMENT === 'bottom') {
                    const poolBar = document.getElementById('poolBar');
                    const poolRect = poolBar?.getBoundingClientRect?.();
                    if (poolRect && poolRect.top > top) {
                        bottom = Math.min(bottom, poolRect.top);
                    }
                }

                if (bottom <= top) {
                    top = 0;
                    bottom = vh;
                }

                return { top, bottom, height: bottom - top };
            }

            getScrollPosition(scroller){
                if (this.isDocumentScroller(scroller)) {
                    const doc = this.getDocumentScroller();
                    return window.pageYOffset || doc.scrollTop || document.body.scrollTop || 0;
                }

                return scroller.scrollTop || 0;
            }

            getMaxScroll(scroller){
                if (this.isDocumentScroller(scroller)) {
                    const doc = this.getDocumentScroller();
                    const viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
                    return Math.max(0, (doc.scrollHeight || 0) - viewportHeight);
                }

                return Math.max(0, (scroller.scrollHeight || 0) - (scroller.clientHeight || 0));
            }

            canScrollDirection(scroller, direction){
                const current = this.getScrollPosition(scroller);
                const max = this.getMaxScroll(scroller);
                return direction < 0 ? current > 1 : current < max - 1;
            }

            scrollContainerBy(scroller, amount){
                if (!amount) return false;

                const before = this.getScrollPosition(scroller);

                if (this.isDocumentScroller(scroller)) {
                    window.scrollBy(0, amount);
                } else {
                    scroller.scrollTop += amount;
                }

                const after = this.getScrollPosition(scroller);
                return Math.abs(after - before) > 0.5;
            }

            getAutoScrollDirection(scroller, y){
                const rect = this.getScrollerRect(scroller);
                const threshold = Math.min(this.scrollThreshold, Math.max(42, rect.height * 0.25));

                if (y >= rect.top - 4 && y <= rect.top + threshold && this.canScrollDirection(scroller, -1)) {
                    return -1;
                }

                if (y <= rect.bottom + 4 && y >= rect.bottom - threshold && this.canScrollDirection(scroller, 1)) {
                    return 1;
                }

                return 0;
            }

            handleAutoScroll(e) {
                this.lastClientX = e.clientX;
                this.lastClientY = e.clientY;

                const scroller = this.getAutoScrollContainer();
                const direction = this.getAutoScrollDirection(scroller, this.lastClientY);

                if (!direction) {
                    this.stopAutoScroll();
                    return;
                }

                this.activeScrollContainer = scroller;

                if (this._scrollTimer) return;

                this._scrollTimer = setInterval(() => {
                    if (!this.draggedItem) {
                        this.stopAutoScroll();
                        return;
                    }

                    const activeScroller = this.getAutoScrollContainer();
                    const activeDirection = this.getAutoScrollDirection(activeScroller, this.lastClientY);

                    if (!activeDirection) {
                        this.stopAutoScroll();
                        return;
                    }

                    const moved = this.scrollContainerBy(activeScroller, activeDirection * this.scrollSpeed);
                    if (!moved) {
                        this.stopAutoScroll();
                        return;
                    }

                    updateTopPoolSticky();
                    this.checkHover(this.lastClientX, this.lastClientY);
                }, 16);
            }

            handlePointerUp(e){
                if (this.pendingDrag && !this.draggedItem) {
                    if (e.pointerId !== this.pendingDrag.pointerId) return;
                    try { this.pendingDrag.item?.releasePointerCapture?.(e.pointerId); } catch (error) {}
                    this.stopDragTracking();
                    this.clearDragInteractionState();
                    return;
                }

                if (!this.draggedItem) {
                    this.stopDragTracking();
                    this.clearDragInteractionState();
                    return;
                }

                try { this.draggedItem.releasePointerCapture?.(e.pointerId); } catch (error) {}
                this.stopDragTracking();
                this.clearDragInteractionState();

                const drop = this.getDropTarget(e.clientX, e.clientY);
                const itemCategory = this.draggedItem.dataset.category;

                const targetBox = drop?.box || null;
                const targetCat = targetBox ? targetBox.dataset.category : null;

                if (drop?.pool) {
                    this.handlePoolDrop();
                } else if (targetBox && targetCat === itemCategory) {
                    this.handleCorrectDrop(targetBox, drop?.slot || null);
                } else if (!targetBox) {
                    this.handleReturnDrop();
                } else {
                    this.handleWrongDrop(targetBox);
                }

                this.draggedItem = null;
                this.originalParent = null;
            }

            checkHover(x, y){
                document.querySelectorAll('.category-box').forEach(box => {
                    box.classList.remove('drop-active', 'drop-wrong', 'ring-4', 'ring-indigo-500/30', 'ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10');
                });
                document.querySelectorAll('.slot').forEach(slot => {
                    slot.classList.remove('slot-active', 'slot-wrong');
                });

                const drop = this.getDropTarget(x, y);
                if (drop?.box) {
                    drop.box.classList.add('drop-active');

                    if (drop?.slot) {
                        drop.slot.classList.add('slot-active');
                    }
                }
            }

            getDropTarget(x, y){
                if (!this.draggedItem) return null;

                let below = null;
                const wasHidden = this.draggedItem.hidden;

                try {
                    this.draggedItem.hidden = true;
                    below = document.elementFromPoint(x, y);
                } finally {
                    this.draggedItem.hidden = wasHidden;
                }

                if (!below) return null;

                const pool = below.closest('#poolBar, #poolContent');
                const slot = below.closest('.slot');
                const box = below.closest('.category-box');
                return { box, slot, pool };
            }

            getFirstEmptySlot(targetBox){
                const slots = Array.from(targetBox.querySelectorAll('.slot'));
                return slots.find(s => !this.isSlotFilled(s)) || null;
            }

            getDropSlotForCategory(targetBox, targetSlot){
                if (!targetBox) return null;

                if (targetSlot && !this.isSlotFilled(targetSlot)) {
                    return targetSlot;
                }

                let slot = this.getFirstEmptySlot(targetBox);
                if (slot) return slot;

                this.revealNextSlot(targetBox);
                return this.getFirstEmptySlot(targetBox);
            }

            handleCorrectDrop(targetBox, targetSlot){
                const item = this.draggedItem;

                const slot = this.getDropSlotForCategory(targetBox, targetSlot);

                if (!slot) { this.handleWrongDrop(targetBox); return; }

                const originalBox = this.originalParent?.closest?.('.category-box') || null;
                const didLock = this.lockTileIntoSlot(item, targetBox, slot);
                if (!didLock) {
                    this.handleReturnDrop();
                    return;
                }

                playCorrect();

                if (this.placeholder) {
                    if (this.placeholder.parentNode) {
                        this.placeholder.remove();
                    }
                    this.placeholder = null;
                }
                if (originalBox && originalBox !== targetBox) {
                    this.syncCategorySlotLayout(originalBox);
                }

                targetBox.classList.remove('drop-active', 'drop-wrong', 'ring-4', 'ring-indigo-500/30', 'ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10');
                targetBox.querySelectorAll('.slot').forEach((slot) => slot.classList.remove('slot-active', 'slot-wrong'));

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin();
                updatePoolSafeSpace();
                updateGameVerticalBalance();
            }

            handlePoolDrop(){
                const item = this.draggedItem;
                if (!item) return;

                const originalBox = this.originalParent?.closest?.('.category-box') || null;

                if (this.placeholder) {
                    if (this.placeholder.parentNode) {
                        this.placeholder.remove();
                    }
                    this.placeholder = null;
                }

                this.returnTileToPool(item, { prepend: false });
                if (originalBox) {
                    this.syncCategorySlotLayout(originalBox);
                }
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                updatePoolSafeSpace();
                updateGameVerticalBalance();
            }

            handleWrongDrop(targetBox){
                const item = this.draggedItem;
                const placeholder = this.placeholder;
                const originalParent = this.originalParent;

                playWrong();
                this.mistakeCount++;
                this.updateStats();

                if (targetBox) {
                    targetBox.classList.add('drop-wrong');
                    setTimeout(() => {
                        targetBox.classList.remove('drop-wrong');
                    }, 380);
                }

                item.classList.add('shake', 'wrong-feedback');
                setTimeout(() => {
                    item.classList.remove('wrong-feedback');
                }, 380);

                if (this.isImagePoolType) {
                    item.classList.add('returning');
                } else {
                    item.classList.add('returning');
                    item.style.transform = 'scale(1)';
                }

                if (!placeholder) {
                    this.resetActiveDrag();
                    return;
                }

                const phRect = placeholder.getBoundingClientRect();
                item.style.left = phRect.left + 'px';
                item.style.top  = phRect.top + 'px';

                setTimeout(() => {
                    item.classList.remove('dragging','returning','shake','wrong-feedback');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (placeholder?.parentNode) {
                        placeholder.parentNode.insertBefore(item, placeholder);
                        placeholder.remove();
                    } else if (originalParent) {
                        originalParent.appendChild(item);
                    } else {
                        this.returnTileToPool(item);
                    }

                    if (this.placeholder === placeholder) {
                        this.placeholder = null;
                    }

                    this.refreshPoolVisibility();
                    this.updatePoolCount();
                    this.updateStats();
                    this.updateActionButtons();
                    updatePoolSafeSpace();
                    updateGameVerticalBalance();
                }, 440);
            }

            handleReturnDrop(){
                const item = this.draggedItem;
                const placeholder = this.placeholder;
                const originalParent = this.originalParent;

                if (this.isImagePoolType) {
                    item.classList.add('returning');
                } else {
                    item.classList.add('returning');
                    item.style.transform = 'scale(1)';
                }

                if (!placeholder) {
                    this.resetActiveDrag();
                    return;
                }

                const phRect = placeholder.getBoundingClientRect();
                item.style.left = phRect.left + 'px';
                item.style.top  = phRect.top + 'px';

                setTimeout(() => {
                    item.classList.remove('dragging','returning','shake','wrong-feedback');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (placeholder?.parentNode) {
                        placeholder.parentNode.insertBefore(item, placeholder);
                        placeholder.remove();
                    } else if (originalParent) {
                        originalParent.appendChild(item);
                    } else {
                        this.returnTileToPool(item);
                    }

                    if (this.placeholder === placeholder) {
                        this.placeholder = null;
                    }

                    this.refreshPoolVisibility();
                    this.updatePoolCount();
                    this.updateStats();
                    this.updateActionButtons();
                    updatePoolSafeSpace();
                    updateGameVerticalBalance();
                }, 440);
            }

            checkWin(options = {}){
                const total = this.getTotalTiles();
                const placed = this.getPlacedCount();
                const showModal = options.showModal ?? true;
                const delay = options.delay ?? (this.isImageType ? 500 : 220);

                if (total === placed && !this.gameCompleted) {
                    this.gameCompleted = true;
                    setTimeout(() => {
                        clearInterval(this.timerInt);
                        playWin();
                        const finalCorrect = document.getElementById('finalCorrect');
                        const finalTime = document.getElementById('finalTime');
                        const finalMistakes = document.getElementById('finalMistakes');
                        if (finalCorrect) finalCorrect.textContent = `${this.correctCount}/${total}`;
                        if (finalTime) finalTime.textContent = this.formatElapsedTime();
                        if (finalMistakes) finalMistakes.textContent = this.mistakeCount;
                        if (showModal) {
                            this.winModal.classList.remove('hidden');
                        }
                        this.updateActionButtons();
                    }, delay);
                }
            }
        }

        const game = new Game();

        document.addEventListener('DOMContentLoaded', () => {
            game.init();
            game.syncAllCategorySlotLayouts();
            setupTopPoolSticky();
            updatePoolSafeSpace();
            updateGameVerticalBalance();
            updateTopPoolSticky();

            window.addEventListener('resize', () => {
                game.syncAllCategorySlotLayouts();
                game.refreshPoolVisibility();
                updatePoolSafeSpace();
                updateGameVerticalBalance();
                updateTopPoolSticky();
            }, { passive: true });
            setTimeout(() => { updatePoolSafeSpace(); updateGameVerticalBalance(); updateTopPoolSticky(); }, 200);
            setTimeout(() => { updatePoolSafeSpace(); updateGameVerticalBalance(); updateTopPoolSticky(); }, 500);
            window.resetSlide = () => {
                stopCategoryAudio();
                window.stopSlideAudio?.();
                game.resetActiveDrag();
                game.init();
                game.syncAllCategorySlotLayouts();
                updatePoolSafeSpace();
                updateGameVerticalBalance();
                updateTopPoolSticky();
            };
        });

        window.addEventListener('pointerup', () => game.clearDragInteractionState(), { passive: true });
        window.addEventListener('pointercancel', () => game.handlePointerCancel(), { passive: true });
        window.addEventListener('blur', () => game.handlePointerCancel(), { passive: true });
    </script>
@endsection
 
