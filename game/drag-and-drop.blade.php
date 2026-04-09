<?php
    $type = $content['type'] ?? 'emoji';
    $poolItemType = $content['pool_item_type'] ?? 'text';
    $mobileCompact = (bool) ($content['mobile_compact'] ?? false);
    $mobilePoolSafeSpace = $content['mobile_pool_safe_space'] ?? '360px';
    $mobileLayoutBottomOffset = $content['mobile_layout_bottom_offset'] ?? '24px';
    $desktopGridBreakpoint = $content['desktop_grid_breakpoint'] ?? '1024px';
    $wideGridBreakpoint = $content['wide_grid_breakpoint'] ?? '1400px';
    $desktopGameWidthForLayout = isset($content['desktop_game_width']) ? (float) $content['desktop_game_width'] : 70;
    $desktopPoolWidthForLayout = isset($content['desktop_pool_width']) ? (float) $content['desktop_pool_width'] : 30;
    $stackDesktopLayout = ($desktopGameWidthForLayout + $desktopPoolWidthForLayout) > 100;
?>
@extends('slider.simple-layout')
@section('style') 
    <style>
        @keyframes popIn { 0%{transform:scale(.96);opacity:0} 100%{transform:scale(1);opacity:1} }
        @keyframes shake  { 0%,100%{transform:translateX(0)} 25%{transform:translateX(-6px)} 75%{transform:translateX(6px)} }

        :root{
            --pool-safe-space: 300px;
            --layout-bottom-safe-space: 0px; 
        }

        body > div.isolate.relative{   
            padding-bottom: var(--layout-bottom-safe-space);
        }

        #ddShell,
        #ddShell *{
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        body.dd-drag-active,
        body.dd-drag-active *{
            user-select: none !important;
            -webkit-user-select: none !important;
            cursor: grabbing !important;
        }

        .dragging{
            position: fixed !important;
            pointer-events:none !important;
            z-index:9999 !important;
            cursor:grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }
        .dd-btn-primary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
            background:linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow:0 10px 24px rgba(79,70,229,.10);
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease;
        }
        .dd-btn-primary:hover{
            transform:scale(1.05);
        }
        .dd-btn-primary:active{
            transform:scale(.95);
        }
        .dd-btn-reveal{
            color:rgb(154 52 18);
            border-color:rgb(253 186 116);
            background:rgb(255 237 213);
            box-shadow:0 8px 22px rgba(234,88,12,.10);
        }
        .dd-btn-reveal:hover{
            background:rgb(254 215 170);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }
        .dd-btn-secondary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.375rem .75rem;
            font-size:.75rem;
            font-weight:900;
            color:rgb(15 23 42);
            border:1px solid rgb(226 232 240);
            background:#fff;
            box-shadow:0 8px 22px rgba(2,6,23,.05);
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }
        .dd-btn-secondary:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }
        .dd-btn-secondary:active{
            transform:scale(.98);
        }
        .dark .dd-btn-secondary{
            color:#fff;
            border-color:rgb(51 65 85);
            background:rgb(30 41 59);
        }
        .dark .dd-btn-secondary:hover{
            background:rgb(51 65 85);
        }
        .dark .dd-btn-reveal{
            color:rgb(254 215 170);
            border-color:rgba(194, 65, 12, .45);
            background:rgba(154, 52, 18, .35);
        }
        .dark .dd-btn-reveal:hover{
            background:rgba(154, 52, 18, .5);
        }
        .returning{
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index:9000;
        }
        .shake{ animation: shake .35s ease-in-out; }
        .locked{ animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); pointer-events:none; }

        .thin-scroll::-webkit-scrollbar{ height: 10px; width: 10px; }
        .thin-scroll::-webkit-scrollbar-thumb{
            background: rgba(100,116,139,.28);
            border-radius: 999px;
            border: 3px solid transparent;
            background-clip: content-box;
        }
        .dark .thin-scroll::-webkit-scrollbar-thumb{
            background: rgba(148,163,184,.22);
            border: 3px solid transparent;
            background-clip: content-box;
        }

        .category-content.text-slot-flow{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .category-content.text-slot-flow .slot{
            flex: 0 1 auto;
            width: min(100%, 9rem);
            max-width: 100%;
        }

        @media (min-width: 1024px){
            #ddGameColumn{
                width: var(--dd-game-width, 70%);
                flex: none;
            }

            #poolBar{
                width: var(--dd-pool-width, 30%);
            }
        }

        @if($type === 'image')
            :root{
                --layout-bottom-safe-space: calc(var(--pool-safe-space) + 18px);
            }

            .game-shell{
                padding-bottom: 1rem;
            }

            #poolBar{
                padding-bottom: max(12px, env(safe-area-inset-bottom));
            }

            .images-grid{
                display: grid;
                grid-template-columns: repeat(var(--mobile-cols, 2), minmax(0, 1fr));
                gap: var(--mobile-gap, .35rem);
            }

            #categoriesContainer{
                padding-bottom: 1rem;
            }

            @media (min-width: 640px){
                .images-grid{
                    gap: var(--desktop-gap, .7rem);
                }
            }

            @media (min-width: {{ $desktopGridBreakpoint }}){
                .images-grid{
                    grid-template-columns: repeat(var(--desktop-cols, 4), minmax(0, 1fr));
                    max-width: min(100%, var(--desktop-grid-max-width, 1400px));
                    margin-inline: auto;
                }

                :root{
                    --layout-bottom-safe-space: 0px;
                }

                .game-shell{
                    padding-bottom: 0;
                }

                #categoriesContainer{
                    padding-bottom: 0;
                }
            }

            @media (min-width: {{ $wideGridBreakpoint }}){
                .images-grid{
                    grid-template-columns: repeat(var(--wide-cols, var(--desktop-cols, 4)), minmax(0, 1fr));
                }
            }

            @media (max-width: 640px) {
                :root{
                    --pool-safe-space: {{ $mobilePoolSafeSpace }};
                    --layout-bottom-safe-space: calc(var(--pool-safe-space) + {{ $mobileLayoutBottomOffset }});
                }

                .game-shell{
                    padding-bottom: 1.25rem !important;
                }

                .category-box { border-radius: 1.5rem !important; }
                .category-box .p-5 { padding: 0.75rem !important; }
                .category-box .mb-5 { margin-bottom: 0.5rem !important; }
                #categoriesContainer { gap: 0.5rem !important; margin-top: 0.5rem !important; }

                #poolBar{
                    padding: .65rem !important;
                }

                #poolBar > div{
                    padding: 0 !important;
                    border-radius: 1.25rem !important;
                }

                #poolContent{
                    gap: .45rem !important;
                }

                #poolContent .draggable-item{
                    font-size: 10px !important;
                    padding: .45rem .65rem !important;
                    border-radius: .8rem !important;
                }
            }
        @endif

        @if($type !== 'image' && $mobileCompact)
            @media (max-width: 640px) {
                #ddShell{
                    padding-left: .8rem !important;
                    padding-right: .8rem !important;
                    padding-top: .85rem !important;
                }

                #categoriesContainer{
                    gap: .55rem !important;
                    margin-top: .35rem !important;
                }

                .category-box{
                    border-radius: 1.2rem !important;
                }

                .category-box > .relative{
                    padding: .7rem !important;
                }

                .category-box .h-10.w-10{
                    width: 2rem !important;
                    height: 2rem !important;
                }

                .category-box .text-xl{
                    font-size: 1rem !important;
                }

                .category-box .text-sm.sm\\:text-base{
                    font-size: .8rem !important;
                    line-height: 1.25 !important;
                }

                .category-box .mt-3{
                    margin-top: .5rem !important;
                }

                .category-content{
                    gap: .35rem !important;
                }

                .category-content .slot{
                    min-height: 30px !important;
                    border-radius: .9rem !important;
                }

                #poolBar{
                    padding-left: .65rem !important;
                    padding-right: .65rem !important;
                }

                #poolBar > div > div{
                    border-radius: 1.2rem 1.2rem 0 0 !important;
                }

                #poolContent{
                    gap: .4rem !important;
                }

                #poolContent .draggable-item{
                    font-size: 11px !important;
                    padding: .5rem .7rem !important;
                    border-radius: .8rem !important;
                    min-height: 36px !important;
                }
            }
        @endif

        @media (prefers-reduced-motion: reduce){
            .returning{ transition: none; }
            .shake{ animation: none; }
            .locked{ animation: none; }
        }
    </style>
@endsection

@section('content')
    @php
        $normalizedCategories = [];
        $categoriesSource = isset($content['categories']) && is_array($content['categories'])
            ? $content['categories']
            : [];
        $desktopGameWidth = isset($content['desktop_game_width']) ? (float) $content['desktop_game_width'] : 70;
        $desktopPoolWidth = isset($content['desktop_pool_width']) ? (float) $content['desktop_pool_width'] : 30;
        $itemsPerLineDesktop = isset($content['items_per_line']) ? (int) $content['items_per_line'] : 0;
        $itemsPerLineMobile = isset($content['items_per_line_mobile']) ? (int) $content['items_per_line_mobile'] : 0;
        $itemsPerLineWide = isset($content['items_per_line_wide']) ? (int) $content['items_per_line_wide'] : 0;
        $mobileGap = $content['image_grid_gap_mobile'] ?? '.35rem';
        $desktopGap = $content['image_grid_gap'] ?? '.7rem';
        $categoryMaxWidthOverride = $content['category_max_width'] ?? null;
        $desktopGridMaxWidthOverride = $content['desktop_grid_max_width'] ?? null;
        $categoryContentGridClass = $content['category_content_grid_class'] ?? null;
        $gridColMap = [
            1 => 'grid-cols-1',
            2 => 'grid-cols-2',
            3 => 'grid-cols-3',
            4 => 'grid-cols-4',
            5 => 'grid-cols-5',
            6 => 'grid-cols-6',
        ];

        foreach ($categoriesSource as $cat => $categoryData) {
            if ($type === 'image') {
                $normalizedCategories[$cat] = [
                    'image' => $categoryData['image'] ?? null,
                    'items' => is_array($categoryData['items'] ?? null) ? $categoryData['items'] : [],
                ];
                continue;
            }

            $defaultEmoji = $cat === 'In the morning'
                ? '🌅'
                : ($cat === 'In the afternoon'
                    ? '☀️'
                    : ($cat === 'In the evening' ? '🌙' : '🧩'));

            $emoji = $defaultEmoji;
            $items = [];

            if (is_array($categoryData) && array_key_exists('items', $categoryData)) {
                $items = is_array($categoryData['items']) ? $categoryData['items'] : [];
                if (!empty($categoryData['emoji'])) {
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

        if ($itemsPerLineDesktop > 0) {
            $desktopCols = max(1, min(6, $itemsPerLineDesktop));
            $wideCols = $itemsPerLineWide > 0 ? max(1, min(6, $itemsPerLineWide)) : $desktopCols;
            $mobileCols = $itemsPerLineMobile > 0 ? max(1, min(6, $itemsPerLineMobile)) : min($desktopCols, 2);
            $mobileGridClass = $gridColMap[$mobileCols] ?? 'grid-cols-1';
            $desktopGridClass = 'lg:' . ($gridColMap[$desktopCols] ?? 'grid-cols-4');
            $wideGridClass = $itemsPerLineWide > 0 ? ' 2xl:' . ($gridColMap[$wideCols] ?? 'grid-cols-4') : '';
            $categoryGridClass = $mobileGridClass . ' ' . $desktopGridClass . $wideGridClass;
            $categoryMaxWidth = $wideCols <= 1
                ? 'max-w-2xl'
                : ($wideCols === 2
                    ? 'max-w-6xl'
                    : ($wideCols === 3 ? 'max-w-7xl' : 'max-w-[1400px]'));
        } elseif ($categoryCount <= 1) {
            $categoryGridClass = 'grid-cols-1';
            $categoryMaxWidth = 'max-w-2xl';
        } elseif ($categoryCount === 2) {
            $categoryGridClass = 'grid-cols-1 sm:grid-cols-2';
            $categoryMaxWidth = 'max-w-6xl';
        } elseif ($categoryCount === 3) {
            $categoryGridClass = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
            $categoryMaxWidth = 'max-w-7xl';
        } else {
            $categoryGridClass = 'grid-cols-1 sm:grid-cols-2 xl:grid-cols-4';
            $categoryMaxWidth = 'max-w-[1400px]';
        }

        $desktopColsForImageCap = $itemsPerLineWide > 0
            ? max(1, min(6, $itemsPerLineWide))
            : ($itemsPerLineDesktop > 0
                ? max(1, min(6, $itemsPerLineDesktop))
                : ($categoryCount <= 1 ? 1 : ($categoryCount === 2 ? 2 : ($categoryCount === 3 ? 3 : 4))));
        $desktopGridMaxWidth = $desktopColsForImageCap >= 4
            ? '1400px'
            : ('calc((((1400px - (3 * var(--desktop-gap))) / 4) * ' . $desktopColsForImageCap . ') + ((' . max(0, $desktopColsForImageCap - 1) . ') * var(--desktop-gap)))');
        if (!empty($categoryMaxWidthOverride)) {
            $categoryMaxWidth = $categoryMaxWidthOverride;
        }
        if (!empty($desktopGridMaxWidthOverride)) {
            $desktopGridMaxWidth = $desktopGridMaxWidthOverride;
        }
        $isImagePoolType = $poolItemType === 'image';
    @endphp

    @if($type === 'image')
        <main class="w-full" style="--dd-game-width: {{ $desktopGameWidth }}%; --dd-pool-width: {{ $desktopPoolWidth }}%;">
            <div class="header-spacing text-center space-y-4 my-4 sm:my-5">
                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-3 sm:mb-4">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ ($content['title'] ?? 'Practice') }}
                    </span>
                </h1>
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ ($content['subtitle'] ?? 'Good luck!') }}
                </p>
            </div>

            <div class="mx-auto mb-4 sm:mb-5 w-full max-w-[19.5rem] sm:max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
                <div class="grid grid-cols-4">
                    @foreach(['Tiles' => 'gameProgressCount', 'Correct' => 'correctCount', 'Mistakes' => 'mistakesCount', 'Time' => 'timer'] as $label => $id)
                        <div class="px-1.5 py-2 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                            <div class="hidden sm:inline-block text-[11px] sm:text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                {{ $label }}
                            </div>
                            <div class="font-black text-xs sm:text-lg">
                                @if($label === 'Tiles')
                                    🧩
                                @elseif($label === 'Correct')
                                    ✅
                                @elseif($label === 'Mistakes')
                                    ❌
                                @else
                                    ⏱️
                                @endif
                                <span id="{{ $id }}">{{ $label === 'Time' ? '00:00' : ($label === 'Tiles' ? '0/0' : '0') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="ddShell" class="game-shell mx-auto flex w-full flex-col px-3 py-5 sm:px-8 sm:py-9 {{ $stackDesktopLayout ? 'lg:items-center lg:gap-5 lg:pb-6' : 'lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:pb-6' }}">
                <section id="ddGameColumn" class="w-full flex-1 flex flex-col lg:flex-none">
                    <div class="grid place-items-center text-center gap-4 sm:gap-6">
                        <div
                                class="w-full {{ $categoryMaxWidth }} images-grid mt-2"
                                id="categoriesContainer"
                                style="--mobile-cols: {{ max(1, min(6, $itemsPerLineMobile > 0 ? $itemsPerLineMobile : 2)) }}; --desktop-cols: {{ max(1, min(6, $itemsPerLineDesktop > 0 ? $itemsPerLineDesktop : 4)) }}; --wide-cols: {{ max(1, min(6, $itemsPerLineWide > 0 ? $itemsPerLineWide : ($itemsPerLineDesktop > 0 ? $itemsPerLineDesktop : 4))) }}; --mobile-gap: {{ $mobileGap }}; --desktop-gap: {{ $desktopGap }}; --desktop-grid-max-width: {{ $desktopGridMaxWidth }};"
                        >
                            @foreach($normalizedCategories as $cat => $config)
                                <div class="category-box group relative overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white/80 backdrop-blur-xl shadow-lg dark:border-slate-700/60 dark:bg-slate-950/40"
                                     data-category="{{ $cat }}"
                                     data-slot-total="{{ count($config['items']) }}">
                                    <div class="relative w-full aspect-square overflow-hidden bg-slate-100 dark:bg-slate-800">
                                        @if($config['image'])
                                            <img src="{{ $config['image'] }}" class="absolute inset-0 w-full h-full object-cover pointer-events-none" alt="{{ $cat }}">
                                        @endif

                                        <div class="absolute inset-x-0 bottom-0 p-1.5 sm:p-2 category-content w-full" data-dropzone="1">
                                            @if(count($config['items']) > 0)
                                                <div class="slot {{ $isImagePoolType ? 'mx-auto aspect-square w-[84px] sm:w-[92px] lg:w-[90px]' : 'w-full min-h-[38px] sm:min-h-[46px]' }} rounded-xl sm:rounded-2xl border-2 border-dashed border-white/45 bg-slate-950/15 backdrop-blur dark:border-slate-200/20 dark:bg-slate-900/18"
                                                     data-slot="1"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="winModal" class="hidden fixed inset-0 z-[3000]">
                            <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>
                            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                                <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                                    <div class="p-6 sm:p-8 text-center">
                                        <div class="text-6xl mb-3">🎉</div>
                                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Done!</h2>
                                        <div class="mt-5 w-full grid grid-cols-1 sm:grid-cols-3 gap-3">
                                            @foreach(['Correct' => 'finalCorrect', 'Time' => 'finalTime', 'Mistakes' => 'finalMistakes'] as $label => $id)
                                                <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                                    <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <button
                                                    onclick="game.reviewCorrection()"
                                                    class="dd-btn-secondary w-full px-8 py-3 text-sm"
                                            >
                                                Review correction
                                            </button>
                                            <button
                                                    onclick="goNextSlide()"
                                                    class="dd-btn-primary w-full px-8 py-3 text-sm"
                                            >
                                                Continue ⚡
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden">
                            <div class="ring-4 ring-indigo-500/30"></div>
                            <div class="ring-2 ring-indigo-500/40 bg-indigo-50/60 dark:bg-indigo-500/10"></div>
                            <div class="ring-2 ring-emerald-400/50"></div>
                            <div class="border-rose-300 bg-rose-50 text-rose-700 dark:bg-rose-900/25 dark:border-rose-900/40 dark:text-rose-200"></div>
                        </div>

                        <template id="tileTpl">
                            @if($poolItemType === 'image')
                                <div class="draggable-item select-none touch-none cursor-grab rounded-xl overflow-hidden w-[84px] sm:w-[92px] lg:w-[90px] aspect-square border border-white/40 bg-white/80 shadow-[0_12px_22px_rgba(2,6,23,0.16)] transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                     style="touch-action:none;" role="img" aria-label="">
                                    <img class="h-full w-full object-cover pointer-events-none" src="" alt="" draggable="false">
                                </div>
                            @else
                                <div class="draggable-item select-none touch-none cursor-grab rounded-xl sm:rounded-2xl px-3 py-2 sm:px-4 sm:py-3 text-[11px] sm:text-sm font-black text-white flex items-center justify-center text-center shadow-md border border-white/20"
                                     style="touch-action:none;"></div>
                            @endif
                        </template>
                    </div>
                </section>

                <div id="poolBar" class="fixed inset-x-0 bottom-0 z-[1500] p-3 sm:p-4 {{ $stackDesktopLayout ? 'lg:order-first lg:static lg:inset-x-auto lg:top-auto lg:bottom-auto lg:self-auto lg:p-0' : 'lg:order-first lg:sticky lg:inset-x-auto lg:top-4 lg:bottom-auto lg:w-[var(--dd-pool-width)] lg:self-start lg:p-0' }}">
                    <div class="mx-auto w-full max-w-4xl {{ $stackDesktopLayout ? '' : 'lg:max-w-none' }}">
                        <div class="relative overflow-hidden rounded-t-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 sm:rounded-3xl lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                            <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                            <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                        <button
                                type="button"
                                id="poolPrevBtn"
                                class="pool-nav-btn inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                aria-label="Show previous sentences"
                        >
                            ‹
                        </button>

                                        <div id="poolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                            0/0
                                        </div>

                        <button
                                type="button"
                                id="poolNextBtn"
                                class="pool-nav-btn inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                aria-label="Show more sentences"
                        >
                            ›
                        </button>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                                type="button"
                                                id="revealAnswersBtn"
                                                class="dd-btn-primary dd-btn-reveal"
                                        >
                                            Reveal answers
                                        </button>

                                        <button
                                                type="button"
                                                id="retakeTestBtn"
                                                class="dd-btn-secondary hidden"
                                        >
                                            Retake test
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                <div class="relative mt-3">
                                    <div id="poolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start gap-2 sm:gap-2.5 {{ $stackDesktopLayout ? 'justify-center lg:w-fit' : 'justify-start lg:w-full' }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @else
        <main class="w-full" style="--dd-game-width: {{ $desktopGameWidth }}%; --dd-pool-width: {{ $desktopPoolWidth }}%;">
            <div class="header-spacing text-center space-y-4 my-4 sm:my-5">
                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-3 sm:mb-4">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title']  }}
                    </span>
                </h1>
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle']  }}
                </p>
            </div>

            <div class="mx-auto mb-4 sm:mb-5 w-full max-w-[19.5rem] sm:max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
                <div class="grid grid-cols-4">
                    @foreach(['Tiles' => 'gameProgressCount', 'Correct' => 'correctCount', 'Mistakes' => 'mistakesCount', 'Time' => 'timer'] as $label => $id)
                        <div class="px-1.5 py-2 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                            <div class="hidden sm:inline-block text-[11px] sm:text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                {{ $label }}
                            </div>
                            <div class="font-black text-xs sm:text-lg">
                                @if($label === 'Tiles')
                                    🧩
                                @elseif($label === 'Correct')
                                    ✅
                                @elseif($label === 'Mistakes')
                                    ❌
                                @else
                                    ⏱️
                                @endif
                                <span id="{{ $id }}">{{ $label === 'Time' ? '00:00' : ($label === 'Tiles' ? '0/0' : '0') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="ddShell" class="mx-auto flex w-full flex-col px-4 py-5 pb-[170px] sm:px-6 sm:py-6 sm:pb-[190px] {{ $stackDesktopLayout ? 'lg:items-center lg:gap-5 lg:px-8 lg:pb-6' : 'lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pb-6' }}">
                <section id="ddGameColumn" class="w-full flex-1 flex flex-col lg:flex-none">
                    <div class="grid place-items-center text-center gap-4 sm:gap-5">
                        <div class="mt-1 w-full {{ $categoryMaxWidth }} grid {{ $categoryGridClass }} gap-3 sm:gap-4" id="categoriesContainer">
                            @foreach($normalizedCategories as $cat => $categoryConfig)
                                @php
                                    $emoji = $categoryConfig['emoji'] ?? '🧩';
                                    $slotCount = is_array($categoryConfig['items'] ?? null) ? count($categoryConfig['items']) : 0;
                                    $isSingleSlot = $slotCount === 1;
                                @endphp

                                <div
                                        class="category-box group relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white/70 backdrop-blur-xl
                                           shadow-[0_18px_45px_rgba(2,6,23,0.08)] dark:border-slate-700/60 dark:bg-slate-950/35"
                                        data-category="{{ $cat }}"
                                        data-slot-total="{{ $slotCount }}"
                                >
                                    <div class="pointer-events-none absolute inset-0 opacity-70 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.14)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                                    <div class="relative px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <div class="grid h-10 w-10 place-items-center text-indigo-700 dark:text-indigo-200">
                                                <span class="text-xl leading-none">{{ $emoji }}</span>
                                            </div>
                                            <div class="text-sm sm:text-base font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                                {{ $cat }}
                                            </div>
                                        </div>

                                        <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                        <div class="category-content mt-3 {{ $isImagePoolType ? ('grid ' . ($categoryContentGridClass ?? ($isSingleSlot ? 'grid-cols-1' : 'grid-cols-2 sm:grid-cols-3'))) : 'text-slot-flow gap-2' }}" data-dropzone="1">
                                            @if($slotCount > 0)
                                                <div
                                                        class="slot grid place-items-center rounded-2xl border border-dashed border-slate-200/80 bg-white/40
                                                           {{ $isImagePoolType ? 'mx-auto aspect-square w-[84px] sm:w-[92px] lg:w-[90px]' : 'min-h-[34px] sm:min-h-[40px]' }}
                                                           dark:border-slate-700/60 dark:bg-slate-900/20"
                                                        data-slot="1"
                                                ></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="winModal" class="hidden fixed inset-0 z-[3000]">
                            <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>
                            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                                <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                                    <div class="p-6 sm:p-8 text-center">
                                        <div class="text-6xl mb-3">🎉</div>
                                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Done!</h2>
                                        <div class="mt-5 w-full grid grid-cols-1 sm:grid-cols-3 gap-3">
                                            @foreach(['Correct' => 'finalCorrect', 'Time' => 'finalTime', 'Mistakes' => 'finalMistakes'] as $label => $id)
                                                <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                                    <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <button
                                                    type="button"
                                                    class="dd-btn-secondary w-full px-8 py-3 text-sm"
                                                    onclick="game.reviewCorrection()"
                                            >
                                                Review correction
                                            </button>
                                            <button
                                                    type="button"
                                                    class="dd-btn-primary w-full px-8 py-3 text-sm"
                                                    onclick="goNextSlide()"
                                            >
                                                Continue ⚡
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden">
                            <div class="ring-4 ring-indigo-500/30"></div>
                            <div class="ring-2 ring-indigo-500/40 bg-indigo-50/60 dark:bg-indigo-500/10"></div>
                            <div class="ring-2 ring-emerald-400/50"></div>
                            <div class="border-rose-300 bg-rose-50 text-rose-700 dark:bg-rose-900/25 dark:border-rose-900/40 dark:text-rose-200"></div>

                            <div class="bg-gradient-to-br from-sky-500 to-blue-600"></div>
                            <div class="bg-gradient-to-br from-rose-500 to-fuchsia-600"></div>
                            <div class="bg-gradient-to-br from-emerald-500 to-teal-600"></div>
                            <div class="bg-gradient-to-br from-amber-500 to-orange-600"></div>
                            <div class="bg-gradient-to-br from-indigo-500 to-violet-600"></div>
                            <div class="bg-gradient-to-br from-cyan-500 to-sky-600"></div>
                        </div>

                        <template id="tileTpl">
                            @if($poolItemType === 'image')
                                <div
                                        class="draggable-item select-none touch-none cursor-grab rounded-xl overflow-hidden w-[84px] sm:w-[92px] lg:w-[90px] aspect-square border border-white/40 bg-white/80 shadow-[0_12px_22px_rgba(2,6,23,0.16)] transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                        style="touch-action:none;"
                                        role="img"
                                        aria-label=""
                                >
                                    <img class="h-full w-full object-cover pointer-events-none" src="" alt="" draggable="false">
                                </div>
                            @else
                                <div
                                        class="draggable-item select-none touch-none cursor-grab rounded-lg sm:rounded-xl px-2.5 py-1.5 sm:px-3 sm:py-2 min-h-[34px] sm:min-h-[40px] text-[12px] sm:text-base font-black text-white
                                           flex items-center justify-center text-center leading-tight
                                           shadow-[0_10px_22px_rgba(2,6,23,0.16)] border border-white/20
                                           transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                        style="touch-action:none;"
                                ></div>
                            @endif
                        </template>
                    </div>
                </section>
                <div id="poolBar" class="fixed inset-x-0 bottom-0 z-[1500] {{ $stackDesktopLayout ? 'lg:order-first lg:static lg:inset-x-auto lg:top-auto lg:bottom-auto lg:self-auto' : 'lg:order-first lg:sticky lg:inset-x-auto lg:top-4 lg:bottom-auto lg:w-[var(--dd-pool-width)] lg:self-start' }}">
                    <div class="mx-auto w-full {{ $stackDesktopLayout ? $categoryMaxWidth . ' px-3 pb-3 sm:px-6 sm:pb-4 lg:px-0 lg:pb-0' : 'px-3 pb-3 sm:px-6 sm:pb-4 lg:px-0 lg:pb-0' }}">
                        <div class="relative overflow-hidden rounded-t-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 sm:rounded-3xl lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                            <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                            <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <button
                                                type="button"
                                                id="poolPrevBtn"
                                                class="pool-nav-btn inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                                aria-label="Show previous sentences"
                                        >
                                            ‹
                                        </button>

                                        <div id="poolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                            0/0
                                        </div>

                                        <button
                                                type="button"
                                                id="poolNextBtn"
                                                class="pool-nav-btn inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                                aria-label="Show more sentences"
                                        >
                                            ›
                                        </button>
                                    </div>
                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                                type="button"
                                                id="revealAnswersBtn"
                                                class="dd-btn-primary dd-btn-reveal"
                                        >
                                            Reveal answers
                                        </button>

                                        <button
                                                type="button"
                                                id="retakeTestBtn"
                                                class="dd-btn-secondary hidden"
                                        >
                                            Retake test
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                <div class="relative mt-3">
                                    <div id="poolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start gap-2 sm:gap-2.5 {{ $stackDesktopLayout ? 'justify-center lg:w-fit' : 'justify-start lg:w-full' }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
@endsection

@section('script')
    <script>
        const GAME_TYPE = @json($type);
        const POOL_ITEM_TYPE = @json($poolItemType);
        const categoriesData = @json($normalizedCategories);
        const STICKY_POOL_VISIBLE_CAP = Number(@json($content['sticky_pool_visible_cap'] ?? 0));

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
            if (!poolBar) return;

            if ((window.innerWidth || 0) >= 1024) {
                if (shell) shell.style.paddingBottom = '';
                document.documentElement.style.setProperty('--pool-safe-space', '0px');
                document.documentElement.style.setProperty('--layout-bottom-safe-space', '0px');
                return;
            }

            if (GAME_TYPE !== 'image') {
                if (shell) {
                    shell.style.paddingBottom = `${poolBar.offsetHeight + 20}px`;
                }
                return;
            }

            const extra = window.innerWidth <= 640 ? 28 : 56;
            const safe = poolBar.offsetHeight + extra;
            document.documentElement.style.setProperty('--pool-safe-space', `${safe}px`);
            document.documentElement.style.setProperty('--layout-bottom-safe-space', `${safe + (window.innerWidth <= 640 ? 24 : 18)}px`);
        }

        window.stopSlideAudio = function(){
            Object.values(audio).forEach(a => {
                if (a){
                    a.pause();
                    a.currentTime = 0;
                }
            });
        };

        class Game {
            constructor(){
                this.poolContent = document.getElementById('poolContent');
                this.poolCount = document.getElementById('poolCount');
                this.poolPrevBtn = document.getElementById('poolPrevBtn');
                this.poolNextBtn = document.getElementById('poolNextBtn');
                this.revealAnswersBtn = document.getElementById('revealAnswersBtn');
                this.retakeTestBtn = document.getElementById('retakeTestBtn');
                this.winModal = document.getElementById('winModal');
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
                this.isReviewingCorrection = false;

                this._raf = null;
                this._mx = 0;
                this._my = 0;
                this.poolStartIndex = 0;

                this.scrollThreshold = this.isImageType ? 70 : 80;
                this.scrollSpeed = this.isImageType ? 10 : 6;
                this._scrollTimer = null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePoolPrev = this.handlePoolPrev.bind(this);
                this.handlePoolNext = this.handlePoolNext.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600',
                ];

                this.imageTileSkins = ['bg-indigo-500', 'bg-emerald-500', 'bg-sky-500', 'bg-amber-500'];

                this.poolPrevBtn?.addEventListener('click', this.handlePoolPrev);
                this.poolNextBtn?.addEventListener('click', this.handlePoolNext);
                this.revealAnswersBtn?.addEventListener('click', this.handleRevealAnswers);
                this.retakeTestBtn?.addEventListener('click', this.handleRetakeTest);
            }

            clearDragInteractionState(){
                document.body.classList.remove('dd-drag-active');
            }

            getVisibleCap(){
                if (this.isImageType) return Number.POSITIVE_INFINITY;

                const stickyCap = Number.isFinite(STICKY_POOL_VISIBLE_CAP) && STICKY_POOL_VISIBLE_CAP > 0
                    ? STICKY_POOL_VISIBLE_CAP
                    : 0;
                const w = window.innerWidth || 1024;

                if (stickyCap > 0 && w < 1024) {
                    return stickyCap;
                }

                if (this.isImagePoolType) {
                    if (w < 640) return 6;
                    if (w < 1024) return 10;
                    return 12;
                }

                if (w < 640) return 6;
                if (w < 1024) return 8;
                return 12;
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
                this.isReviewingCorrection = false;

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
                                items.push({
                                    image: item.image,
                                    alt: item.alt || `${key} ${itemIndex + 1}`,
                                    category: key,
                                    id: Math.random().toString(36).slice(2, 11)
                                });
                                return;
                            }
                        }

                        items.push({
                            text: item,
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
                        if (img) {
                            img.src = itemData.image;
                            img.alt = itemData.alt || '';
                        }
                        node.setAttribute('aria-label', itemData.alt || '');
                        node.title = itemData.alt || '';
                    } else {
                        const skins = this.isImageType ? this.imageTileSkins : this.tileSkins;
                        node.textContent = itemData.text;
                        node.classList.add(...skins[i % skins.length].split(' '));
                    }

                    node.addEventListener('pointerdown', (e) => this.handlePointerDown(e, node));
                    this.poolContent.appendChild(node);
                });

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                updatePoolSafeSpace();
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
                const timerEl = document.getElementById('timer');
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
                        ? 'slot mx-auto aspect-square w-[84px] sm:w-[92px] lg:w-[90px] rounded-xl sm:rounded-2xl border-2 border-dashed border-white/45 bg-slate-950/15 backdrop-blur dark:border-slate-200/20 dark:bg-slate-900/18'
                        : 'slot w-full min-h-[38px] sm:min-h-[46px] rounded-xl sm:rounded-2xl border-2 border-dashed border-white/45 bg-slate-950/15 backdrop-blur dark:border-slate-200/20 dark:bg-slate-900/18';
                    slot.dataset.slot = '1';
                    return slot;
                }

                slot.className = this.isImagePoolType
                    ? 'slot grid place-items-center rounded-2xl border border-dashed border-slate-200/80 bg-white/40 mx-auto aspect-square w-[84px] sm:w-[92px] lg:w-[90px] dark:border-slate-700/60 dark:bg-slate-900/20'
                    : 'slot grid place-items-center rounded-2xl border border-dashed border-slate-200/80 bg-white/40 min-h-[34px] sm:min-h-[40px] dark:border-slate-700/60 dark:bg-slate-900/20';
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
                    dropzone.appendChild(this.createSlotElement());
                }

                this.syncCategorySlotLayout(targetBox);
            }

            revealNextSlot(targetBox){
                if (!targetBox) return;

                const totalSlots = Number(targetBox.dataset.slotTotal || 0);
                const currentSlots = targetBox.querySelectorAll('.slot').length;
                const filledSlots = Array.from(targetBox.querySelectorAll('.slot')).filter((slot) => slot.children.length > 0).length;
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
                    if (slot.children.length === 0) {
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

            updateStats(){
                const progressEl = document.getElementById('gameProgressCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');
                const total = this.getTotalTiles();

                if (progressEl) progressEl.textContent = `${this.correctCount}/${total}`;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            }

            refreshPoolVisibility(){
                const cap = this.getVisibleCap();
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                const isStickyBottomPool = (window.innerWidth || 1024) < 1024 && Number.isFinite(cap);

                if (!isStickyBottomPool) {
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
                const locked = document.querySelectorAll('.draggable-item.locked').length;
                const remaining = total - locked;
                this.poolCount.textContent = `${remaining}/${total}`;
            }

            getRemainingTileCount(){
                return this.getTotalTiles() - document.querySelectorAll('.draggable-item.locked').length;
            }

            updateActionButtons(){
                const remaining = this.getRemainingTileCount();

                if (this.revealAnswersBtn) {
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted && !this.isReviewingCorrection;
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !(this.hasUsedReveal || this.isReviewingCorrection));
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

                if (!shouldShow) return;

                const maxStart = Math.max(0, totalTiles - cap);
                this.poolPrevBtn.disabled = this.poolStartIndex <= 0;
                this.poolNextBtn.disabled = this.poolStartIndex >= maxStart;
            }

            handlePoolPrev(){
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                this.poolStartIndex = Math.max(0, this.poolStartIndex - 1);
                this.refreshPoolVisibility();
            }

            handlePoolNext(){
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + 1);
                this.refreshPoolVisibility();
            }

            normalizeTileForSlot(tile){
                tile.classList.remove('cursor-grab','hover:-translate-y-0.5');

                if (this.isImagePoolType) {
                    tile.classList.add('locked', 'w-full', 'h-full');
                    tile.style.cursor = 'default';
                    return;
                }

                tile.classList.add(
                    'locked','ring-2','ring-emerald-400/50',
                    'max-w-full','flex','items-center','justify-center','text-center',
                    'px-2','py-1.5','leading-tight','rounded-xl'
                );
                tile.style.cursor = 'default';
                tile.style.width = 'auto';
                tile.style.maxWidth = '100%';
                tile.style.height = 'auto';
                tile.style.flex = '0 1 auto';
                tile.style.display = 'inline-flex';
            }

            markTileAsRevealed(tile, slot){
                if (!tile) return;

                tile.classList.remove('ring-emerald-400/50');
                tile.classList.add('revealed-answer');

                if (this.isImagePoolType) {
                    tile.classList.add(
                        'ring-2',
                        'ring-slate-400/40',
                        'border-slate-300/70',
                        'bg-rose-500',
                        'dark:border-slate-600/40',
                        'dark:bg-rose-500'
                    );
                    if (slot) {
                        slot.classList.add(
                            'border-slate-300/70',
                            'bg-rose-500',
                            'dark:border-slate-600/40',
                            'dark:bg-rose-500'
                        );
                    }
                    return;
                }

                tile.classList.remove(...this.tileSkins.flatMap((skin) => skin.split(' ')));
                tile.classList.add(
                    'bg-rose-500',
                    'text-white',
                    'border-slate-300/70',
                    'dark:bg-rose-500',
                    'dark:text-white',
                    'dark:border-slate-600/40',
                    'ring-2',
                    'ring-slate-400/40'
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
                const { revealed = false, countAsMistake = false, countAsCorrect = true } = options;

                item.classList.remove('dragging', 'returning', 'shake');
                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = this.isImagePoolType ? 'none' : '';

                slot.innerHTML = '';
                slot.appendChild(item);
                this.sizeTextSlotToContent(slot);
                this.normalizeTileForSlot(item);
                if (revealed) {
                    this.markTileAsRevealed(item, slot);
                }
                this.syncCategorySlotLayout(targetBox);

                if (countAsCorrect) {
                    this.correctCount++;
                }
                if (countAsMistake) {
                    this.mistakeCount++;
                }
                this.revealNextSlot(targetBox);
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
                        countAsMistake: true,
                        countAsCorrect: false
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

            reviewCorrection(){
                this.isReviewingCorrection = true;
                if (this.winModal) {
                    this.winModal.classList.add('hidden');
                }
                this.updateActionButtons();
            }

            handlePointerDown(e, item){
                if (item.classList.contains('locked') || this.gameCompleted || this.isRevealingAnswers) return;

                e.preventDefault();
                item.setPointerCapture?.(e.pointerId);
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

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top  = (e.clientY - this.offsetY) + 'px';

                if (!this.isImagePoolType) {
                    item.style.transform = 'scale(1.04)';
                }

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
            }

            handlePointerMove(e){
                if (!this.draggedItem) return;
                e.preventDefault();

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

            handleAutoScroll(e) {
                if (this._scrollTimer) {
                    clearInterval(this._scrollTimer);
                    this._scrollTimer = null;
                }

                const y = e.clientY;
                const vh = window.innerHeight;
                let dir = 0;

                if (y < this.scrollThreshold && y > 0) {
                    dir = -1;
                } else if (y > vh - this.scrollThreshold && y < vh) {
                    dir = 1;
                }

                if (dir !== 0) {
                    this._scrollTimer = setInterval(() => {
                        window.scrollBy(0, dir * this.scrollSpeed);
                        this.checkHover(e.clientX, e.clientY);
                    }, 16);
                }
            }

            handlePointerUp(e){
                if (!this.draggedItem) return;

                this.clearDragInteractionState();

                if (this._scrollTimer) {
                    clearInterval(this._scrollTimer);
                    this._scrollTimer = null;
                }

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);

                if (this._raf) { cancelAnimationFrame(this._raf); this._raf = null; }

                const drop = this.getDropTarget(e.clientX, e.clientY);
                const itemCategory = this.draggedItem.dataset.category;

                const targetBox = drop?.box || null;
                const targetCat = targetBox ? targetBox.dataset.category : null;

                if (targetBox && targetCat === itemCategory) {
                    this.handleCorrectDrop(targetBox, drop?.slot || null);
                } else if (!targetBox) {
                    this.handleReturnDrop();
                } else {
                    this.handleWrongDrop(targetBox);
                }

                this.draggedItem = null;
            }

            checkHover(x, y){
                document.querySelectorAll('.category-box').forEach(box => {
                    if (this.isImageType) {
                        box.classList.remove('ring-4', 'ring-indigo-500/30');
                    } else {
                        box.classList.remove('ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10');
                    }
                });

                const drop = this.getDropTarget(x, y);
                if (drop?.box) {
                    if (this.isImageType) {
                        drop.box.classList.add('ring-4', 'ring-indigo-500/30');
                    } else {
                        drop.box.classList.add('ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10');
                    }
                }
            }

            getDropTarget(x, y){
                this.draggedItem.hidden = true;
                const below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;
                if (!below) return null;

                const slot = below.closest('.slot');
                const box = below.closest('.category-box');
                return { box, slot };
            }

            getFirstEmptySlot(targetBox){
                const slots = Array.from(targetBox.querySelectorAll('.slot'));
                return slots.find(s => s.children.length === 0) || null;
            }

            handleCorrectDrop(targetBox, targetSlot){
                const item = this.draggedItem;

                const slot = this.getFirstEmptySlot(targetBox);

                if (!slot) { this.handleWrongDrop(targetBox); return; }

                playCorrect();

                this.lockTileIntoSlot(item, targetBox, slot);

                if (this.placeholder && this.placeholder.parentNode) {
                    this.placeholder.remove();
                }

                if (this.isImageType) {
                    targetBox.classList.remove('ring-4', 'ring-indigo-500/30');
                } else {
                    targetBox.classList.remove('ring-2', 'ring-indigo-500/40', 'bg-indigo-50/60', 'dark:bg-indigo-500/10');
                }

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin();
                updatePoolSafeSpace();
            }

            handleWrongDrop(targetBox){
                const item = this.draggedItem;

                playWrong();
                this.mistakeCount++;
                this.updateStats();

                if (!this.isImagePoolType && targetBox) {
                    item.classList.add('shake');
                    item.classList.add('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');
                    setTimeout(() => {
                        item.classList.remove('shake');
                        item.classList.remove('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');
                    }, 380);
                }

                if (this.isImagePoolType) {
                    item.classList.add('returning', 'shake');
                } else {
                    item.classList.add('returning');
                    item.style.transform = 'scale(1)';
                }

                const phRect = this.placeholder.getBoundingClientRect();
                item.style.left = phRect.left + 'px';
                item.style.top  = phRect.top + 'px';

                setTimeout(() => {
                    item.classList.remove('dragging','returning','shake');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    this.originalParent.insertBefore(item, this.placeholder);
                    this.placeholder.remove();
                    this.placeholder = null;

                    this.refreshPoolVisibility();
                    updatePoolSafeSpace();
                }, 440);
            }

            handleReturnDrop(){
                const item = this.draggedItem;

                if (this.isImagePoolType) {
                    item.classList.add('returning');
                } else {
                    item.classList.add('returning');
                    item.style.transform = 'scale(1)';
                }

                const phRect = this.placeholder.getBoundingClientRect();
                item.style.left = phRect.left + 'px';
                item.style.top  = phRect.top + 'px';

                setTimeout(() => {
                    item.classList.remove('dragging','returning','shake');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    this.originalParent.insertBefore(item, this.placeholder);
                    this.placeholder.remove();
                    this.placeholder = null;

                    this.refreshPoolVisibility();
                    updatePoolSafeSpace();
                }, 440);
            }

            checkWin(options = {}){
                const total = this.getTotalTiles();
                const locked = document.querySelectorAll('.draggable-item.locked').length;
                const showModal = options.showModal ?? true;
                const delay = options.delay ?? (this.isImageType ? 500 : 220);

                if (total === locked && !this.gameCompleted) {
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
            updatePoolSafeSpace();

            window.addEventListener('resize', () => {
                game.syncAllCategorySlotLayouts();
                game.refreshPoolVisibility();
                updatePoolSafeSpace();
            }, { passive: true });
            setTimeout(updatePoolSafeSpace, 200);
            setTimeout(updatePoolSafeSpace, 500);
            window.resetSlide = () => {};
        });

        window.addEventListener('pointerup', () => game.clearDragInteractionState(), { passive: true });
        window.addEventListener('pointercancel', () => game.clearDragInteractionState(), { passive: true });
        window.addEventListener('blur', () => game.clearDragInteractionState(), { passive: true });
    </script>
@endsection
