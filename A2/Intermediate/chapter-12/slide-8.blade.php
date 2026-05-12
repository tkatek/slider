<?php
$content = [
    'page_title' => 'Practice 2',
    'title' => 'Practice 2',
    'subtitle' => 'Match the gestures with their meanings',

    /*
    |--------------------------------------------------------------------------
    | Drag item type
    |--------------------------------------------------------------------------
    | Use one of these:
    | - text              = drag words / phrases
    | - image             = drag images only
    | - image-with-label  = drag image cards with text under each image
    */
    'drag_item_type' => 'image-with-label',

    // Old compatibility keys. Older slides can still use these.
    'pool_item_type' => 'image',
    'show_pool_item_labels' => true,

    /*
    |--------------------------------------------------------------------------
    | Responsive controls
    |--------------------------------------------------------------------------
    | This version follows the previous sticky UX:
    | - mobile/tablet: fixed bottom tray with next/previous controls
    | - laptop/desktop: sticky side tray
    */
    'pool_grid_class' => 'grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 2xl:grid-cols-10',
    'category_grid_class' => 'grid-cols-1 md:grid-cols-2',
    'slot_grid_class' => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',

    'mobile_pool_visible_cap' => 4,
    'tablet_pool_visible_cap' => 6,

    'categories' => [
        'Positive body language' => [
            'emoji' => '✅',
            'items' => [
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/smiling.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/making-eye-contact.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/shaking-hands-firmly.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/sitting-up-straight.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/paying-attention.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/nodding-your-head.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/leaning-forward.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/open-palms.webp'),
            ],
        ],

        'Negative body language' => [
            'emoji' => '⚠️',
            'items' => [
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/staring.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/crossing-arms.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/yawning.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/slouching.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/looking-down.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/rubbing-your-nose.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/frowning.webp'),
                materialAsset('slider/A2/Intermediate/chapter-12/img/slide7/head-in-hands.webp'),
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $categoriesSource = is_array($content['categories'] ?? null) ? $content['categories'] : [];

    $legacyPoolType = $content['pool_item_type'] ?? 'text';
    $showPoolItemLabels = filter_var($content['show_pool_item_labels'] ?? true, FILTER_VALIDATE_BOOLEAN);

    $dragItemType = $content['drag_item_type'] ?? null;
    if (!$dragItemType) {
        $dragItemType = $legacyPoolType === 'image'
            ? ($showPoolItemLabels ? 'image-with-label' : 'image')
            : 'text';
    }

    $isImageItem = in_array($dragItemType, ['image', 'image-with-label'], true);
    $showImageLabel = $dragItemType === 'image-with-label';

    $labelFromPath = function ($path) {
        $path = (string) $path;
        $filename = pathinfo(parse_url($path, PHP_URL_PATH) ?? $path, PATHINFO_FILENAME);
        $filename = str_replace(['_', '-'], ' ', $filename);
        $filename = preg_replace('/\s+/', ' ', $filename);

        return trim($filename);
    };

    $normalizedCategories = [];
    $poolItems = [];

    foreach ($categoriesSource as $categoryName => $categoryData) {
        $emoji = '';
        $items = [];

        if (is_array($categoryData) && array_key_exists('items', $categoryData)) {
            $emoji = (string) ($categoryData['emoji'] ?? '');
            $items = is_array($categoryData['items']) ? $categoryData['items'] : [];
        } elseif (is_array($categoryData)) {
            $items = $categoryData;
        }

        $normalizedCategories[$categoryName] = [
            'emoji' => $emoji,
            'slot_count' => count($items),
        ];

        foreach ($items as $itemIndex => $item) {
            $id = 'item_' . md5($categoryName . '_' . $itemIndex . '_' . json_encode($item));

            if ($isImageItem) {
                if (is_array($item)) {
                    $image = $item['image'] ?? $item['src'] ?? '';
                    $label = $item['label'] ?? $item['text'] ?? $item['title'] ?? $item['alt'] ?? $labelFromPath($image);
                    $alt = $item['alt'] ?? $label;
                } else {
                    $image = (string) $item;
                    $label = $labelFromPath($image);
                    $alt = $label;
                }

                $poolItems[] = [
                    'id' => $id,
                    'category' => $categoryName,
                    'image' => $image,
                    'label' => $label,
                    'alt' => $alt,
                ];

                continue;
            }

            $poolItems[] = [
                'id' => $id,
                'category' => $categoryName,
                'text' => is_array($item) ? ($item['text'] ?? $item['label'] ?? '') : (string) $item,
            ];
        }
    }

    $poolItems = collect($poolItems)->shuffle()->values()->all();
    $totalItems = count($poolItems);

    $categoryGridClass = $content['category_grid_class'] ?? (count($normalizedCategories) <= 2
        ? 'grid-cols-1 md:grid-cols-2'
        : 'grid-cols-1 md:grid-cols-2 xl:grid-cols-3');

    $poolGridClass = $content['pool_grid_class'] ?? ($isImageItem
        ? 'grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-8 2xl:grid-cols-10'
        : 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 2xl:grid-cols-10');

    $slotGridClass = $content['slot_grid_class'] ?? ($isImageItem
        ? 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4'
        : 'grid-cols-1 sm:grid-cols-2');

    $tileClass = $isImageItem
        ? 'dd-item w-full touch-none select-none overflow-hidden rounded-xl border border-slate-200/80 bg-white shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-lg hover:shadow-orange-100/70 active:cursor-grabbing dark:border-slate-700/70 dark:bg-slate-900 dark:shadow-slate-950/30 dark:hover:border-orange-400/40 sm:rounded-2xl'
        : 'dd-item touch-none select-none rounded-xl border border-white/20 bg-gradient-to-br from-orange-500 to-amber-500 px-3 py-2 text-center text-xs font-black leading-tight text-white shadow-md shadow-orange-200/60 transition duration-200 hover:-translate-y-0.5 active:cursor-grabbing dark:shadow-none sm:text-sm';

    $slotClass = $isImageItem
        ? 'dd-slot grid min-h-[96px] place-items-center rounded-2xl border-2 border-dashed border-slate-200/90 bg-white/45 p-1 transition duration-200 dark:border-slate-700/70 dark:bg-slate-900/30 sm:min-h-[120px] lg:min-h-[132px]'
        : 'dd-slot grid min-h-[42px] place-items-center rounded-2xl border-2 border-dashed border-slate-200/90 bg-white/45 p-1.5 transition duration-200 dark:border-slate-700/70 dark:bg-slate-900/30';

    $mobilePoolCap = (int) ($content['mobile_pool_visible_cap'] ?? 4);
    $tabletPoolCap = (int) ($content['tablet_pool_visible_cap'] ?? 6);
@endphp

@section('content')
    <main id="ddShell" class="min-h-[100dvh] w-full overflow-x-hidden px-2 py-3 text-slate-950 dark:text-slate-50 sm:px-4 lg:px-6">
        <section class="mx-auto flex min-h-[calc(100dvh-1.5rem)] w-full max-w-[1480px] flex-col justify-center">
            @include('slider.components.title-subtitle')
            @include('slider.components.game-status')

            <div id="ddLayout" class="mx-auto mt-3 flex w-full flex-col gap-3 pb-[var(--pool-safe-space,240px)]">
                <section id="ddGameColumn" class="order-1 w-full flex-1 xl:sticky xl:top-4 xl:self-start">
                    <div id="categoriesContainer" class="grid {{ $categoryGridClass }} gap-3 sm:gap-4">
                        @foreach($normalizedCategories as $categoryName => $category)
                            <article
                                    class="category-box rounded-[1.45rem] border border-slate-200/80 bg-gradient-to-br from-white via-slate-50/80 to-stone-50/80 p-3 shadow-xl shadow-slate-200/70 backdrop-blur-xl transition duration-200 dark:border-slate-700/70 dark:from-slate-950/70 dark:via-slate-900/65 dark:to-stone-950/30 dark:shadow-slate-950/30 sm:p-4"
                                    data-category="{{ $categoryName }}"
                            >
                                <header class="flex items-center justify-center gap-2 rounded-2xl border border-slate-200/80 bg-white/85 px-3 py-2.5 shadow-sm backdrop-blur dark:border-slate-700/70 dark:bg-slate-900/70">
                                    @if(!empty($category['emoji']))
                                        <span class="grid h-8 w-8 place-items-center rounded-xl bg-orange-50 text-base dark:bg-orange-500/15 sm:h-9 sm:w-9 sm:text-lg">
                                            {{ $category['emoji'] }}
                                        </span>
                                    @endif

                                    <h2 class="text-center text-base font-black leading-tight tracking-[-0.03em] text-slate-900 dark:text-white sm:text-lg lg:text-xl">
                                        {{ $categoryName }}
                                    </h2>
                                </header>

                                <div class="mt-3 grid {{ $slotGridClass }} gap-2 sm:gap-2.5" data-dropzone>
                                    @for($i = 0; $i < $category['slot_count']; $i++)
                                        <div class="{{ $slotClass }}" data-slot></div>
                                    @endfor
                                </div>
                            </article>
                        @endforeach
                    </div>

                    @include('slider.components.game-win-modal')

                    <div class="hidden">
                        <div class="fixed z-[9999] pointer-events-none scale-[1.03] opacity-95 shadow-2xl ring-4 ring-orange-400/20"></div>
                        <div class="ring-4 ring-orange-400/25 border-orange-300 bg-orange-50/60 dark:bg-orange-500/10"></div>
                        <div class="ring-4 ring-emerald-400/30 border-emerald-300 bg-emerald-50 dark:bg-emerald-500/10"></div>
                        <div class="ring-4 ring-rose-400/30 border-rose-300 bg-rose-50 dark:bg-rose-500/10"></div>
                        <div class="bg-rose-500 text-white border-rose-300 dark:bg-rose-500 dark:text-white"></div>
                    </div>
                </section>

                <div id="poolBar" class="fixed inset-x-0 bottom-0 z-[1500] order-2 p-2 sm:p-3">
                    <aside class="mx-auto flex max-h-[40dvh] w-full max-w-[1180px] flex-col overflow-hidden rounded-t-3xl border border-slate-200/80 bg-white/92 shadow-[0_-18px_55px_rgba(2,6,23,0.16)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-950/85 dark:shadow-slate-950/40 sm:rounded-3xl">
                        <div class="pointer-events-none absolute inset-0 opacity-70"></div>

                        <div class="relative flex min-h-0 flex-1 flex-col px-2.5 pb-2.5 pt-2 sm:px-3 sm:py-3">
                            <div class="flex items-center justify-center">
                                <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>

                            <div class="mt-2 flex flex-wrap items-center justify-between gap-2">
                                <div class="min-w-0">
                                    <p class="text-[0.65rem] font-black uppercase tracking-[0.14em] text-slate-500 dark:text-slate-400 sm:text-xs">
                                        Drag items
                                    </p>
                                    <p class="mt-0.5 hidden text-xs font-black leading-tight text-slate-900 dark:text-white sm:block">
                                        Choose the correct category
                                    </p>
                                </div>

                                <div class="flex shrink-0 flex-wrap items-center justify-end gap-1.5">
                                    <button
                                            type="button"
                                            id="poolPrevBtn"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 bg-white text-lg font-black text-slate-700 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                                            aria-label="Show previous items"
                                    >
                                        ‹
                                    </button>

                                    <div id="poolCount" class="rounded-full border border-orange-200 bg-orange-50 px-2.5 py-1 text-[0.68rem] font-black text-orange-700 dark:border-orange-400/30 dark:bg-orange-500/15 dark:text-orange-200 sm:text-xs">
                                        {{ $totalItems }}/{{ $totalItems }}
                                    </div>

                                    <button
                                            type="button"
                                            id="poolNextBtn"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 bg-white text-lg font-black text-slate-700 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                                            aria-label="Show next items"
                                    >
                                        ›
                                    </button>

                                    <button
                                            type="button"
                                            id="revealAnswersBtn"
                                            class="inline-flex items-center justify-center rounded-xl border border-orange-200 bg-orange-50 px-2.5 py-2 text-[0.68rem] font-black text-orange-700 shadow-sm shadow-orange-100 transition duration-200 hover:-translate-y-0.5 hover:bg-orange-100 dark:border-orange-400/30 dark:bg-orange-500/15 dark:text-orange-200 dark:shadow-none sm:px-3 sm:text-xs"
                                    >
                                        Reveal answers
                                    </button>

                                    <button
                                            type="button"
                                            id="retakeTestBtn"
                                            class="hidden inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-2.5 py-2 text-[0.68rem] font-black text-slate-800 shadow-sm shadow-slate-200/70 transition duration-200 hover:-translate-y-0.5 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:shadow-none sm:px-3 sm:text-xs"
                                    >
                                        Retake test
                                    </button>
                                </div>
                            </div>

                            <div class="mt-2 h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-700"></div>

                            <div id="poolContent" class="mt-2 grid min-h-0 flex-1 {{ $poolGridClass }} gap-1.5 overflow-y-auto pr-0.5 sm:gap-2"></div>


                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

    <template id="tileTemplate">
        @if($isImageItem)
            <div
                    class="{{ $tileClass }} cursor-grab"
                    data-id=""
                    data-category=""
                    data-locked="0"
                    role="button"
                    tabindex="0"
                    aria-label=""
            >
                <div class="aspect-[5/3] w-full overflow-hidden rounded-t-xl bg-slate-100 dark:bg-slate-800 sm:rounded-t-2xl">
                    <img
                            src=""
                            alt=""
                            class="pointer-events-none h-full w-full object-cover"
                            draggable="false"
                    >
                </div>

                @if($showImageLabel)
                    <div class="flex min-h-[24px] items-center justify-center px-1.5 py-1.5 sm:min-h-[30px]">
                        <p class="item-label text-center text-[0.58rem] font-black leading-tight tracking-[-0.01em] text-slate-800 dark:text-slate-100 sm:text-[0.64rem] md:text-[0.68rem]"></p>
                    </div>
                @endif
            </div>
        @else
            <div
                    class="{{ $tileClass }} cursor-grab"
                    data-id=""
                    data-category=""
                    data-locked="0"
                    role="button"
                    tabindex="0"
            ></div>
        @endif
    </template>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const poolContent = document.getElementById('poolContent');
            const poolCount = document.getElementById('poolCount');
            const poolBar = document.getElementById('poolBar');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeTestBtn');
            const poolPrevBtn = document.getElementById('poolPrevBtn');
            const poolNextBtn = document.getElementById('poolNextBtn');
            const restartBtnModal = document.getElementById('restartBtnModal');
            const continueBtnModal = document.getElementById('continueBtnModal');
            const winModal = document.getElementById('winModal');
            const tileTemplate = document.getElementById('tileTemplate');

            const categoriesData = @json($poolItems);
            const totalItems = Number(@json($totalItems));
            const isImageItem = Boolean(@json($isImageItem));
            const showImageLabel = Boolean(@json($showImageLabel));
            const baseTileClass = @json($tileClass . ' cursor-grab');
            const mobileCap = Math.max(1, Number(@json($mobilePoolCap)));
            const tabletCap = Math.max(1, Number(@json($tabletPoolCap)));

            const sounds = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            let draggedItem = null;
            let placeholder = null;
            let offsetX = 0;
            let offsetY = 0;
            let correctCount = 0;
            let mistakeCount = 0;
            let startTime = Date.now();
            let timer = null;
            let poolStartIndex = 0;

            function play(audio) {
                if (!audio) return;
                audio.pause();
                audio.currentTime = 0;
                audio.play().catch(() => {});
            }

            function shuffle(items) {
                const copy = items.slice();

                for (let i = copy.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [copy[i], copy[j]] = [copy[j], copy[i]];
                }

                return copy;
            }

            function formatTime(seconds) {
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);

                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            function updateTimer() {
                const timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            }

            function startTimer() {
                clearInterval(timer);
                startTime = Date.now();
                updateTimer();
                timer = setInterval(updateTimer, 1000);
            }

            function getLockedCount() {
                return document.querySelectorAll('.dd-item[data-locked="1"]').length;
            }

            function updatePoolSafeSpace() {
                if (!poolBar) return;

                document.documentElement.style.setProperty('--pool-safe-space', `${poolBar.offsetHeight + 18}px`);
            }

            function getVisibleCap() {
                const width = window.innerWidth || 1024;

                if (width >= 1536) return 10;
                if (width >= 1024) return 8;
                if (width >= 640) return tabletCap;

                return mobileCap;
            }

            function updatePoolPager() {
                const cap = getVisibleCap();
                const availableItems = Array.from(poolContent.querySelectorAll('.dd-item[data-locked="0"]'));
                const shouldPage = Number.isFinite(cap) && availableItems.length > cap;
                const maxStart = Math.max(0, availableItems.length - cap);

                poolStartIndex = Math.min(poolStartIndex, maxStart);

                availableItems.forEach((item, index) => {
                    const visible = !shouldPage || (index >= poolStartIndex && index < poolStartIndex + cap);
                    item.classList.toggle('hidden', !visible);
                });

                poolPrevBtn?.classList.toggle('hidden', !shouldPage);
                poolNextBtn?.classList.toggle('hidden', !shouldPage);

                if (poolPrevBtn) poolPrevBtn.disabled = poolStartIndex <= 0;
                if (poolNextBtn) poolNextBtn.disabled = poolStartIndex >= maxStart;

                updatePoolSafeSpace();
            }

            function updateStats() {
                const tilesCount = document.getElementById('tilesCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');
                const locked = getLockedCount();
                const remaining = Math.max(0, totalItems - locked);

                if (tilesCount) tilesCount.textContent = `${correctCount}/${totalItems}`;
                if (correctEl) correctEl.textContent = String(correctCount);
                if (mistakesEl) mistakesEl.textContent = String(mistakeCount);
                if (poolCount) poolCount.textContent = `${remaining}/${totalItems}`;

                revealBtn?.classList.toggle('hidden', remaining <= 0);
                retakeBtn?.classList.toggle('hidden', locked === 0);

                updatePoolPager();
            }

            function showWinModal() {
                if (!winModal) return;
                winModal.classList.remove('hidden');
                winModal.classList.add('flex');
            }

            function hideWinModal() {
                if (!winModal) return;
                winModal.classList.add('hidden');
                winModal.classList.remove('flex');
            }

            function firstEmptySlot(categoryBox) {
                return Array.from(categoryBox.querySelectorAll('[data-slot]'))
                    .find(slot => slot.children.length === 0) || null;
            }

            function findCategoryBox(categoryName) {
                return Array.from(document.querySelectorAll('.category-box'))
                    .find(box => box.dataset.category === categoryName) || null;
            }

            function setHoverBox(activeBox) {
                document.querySelectorAll('.category-box').forEach(box => {
                    box.classList.remove('ring-4', 'ring-orange-400/25', 'border-orange-300', 'bg-orange-50/60', 'dark:bg-orange-500/10');
                });

                if (!activeBox) return;

                activeBox.classList.add('ring-4', 'ring-orange-400/25', 'border-orange-300', 'bg-orange-50/60', 'dark:bg-orange-500/10');
            }

            function getDropBox(clientX, clientY) {
                const element = document.elementFromPoint(clientX, clientY);

                return element?.closest?.('.category-box') || null;
            }

            function prepareLockedItem(item, revealed = false) {
                item.dataset.locked = '1';
                item.classList.remove('fixed', 'z-[9999]', 'pointer-events-none', 'scale-[1.03]', 'opacity-95', 'shadow-2xl', 'ring-4', 'ring-orange-400/20', 'cursor-grab', 'active:cursor-grabbing', 'hover:-translate-y-0.5', 'hidden');
                item.classList.add('cursor-default');

                if (revealed) {
                    item.classList.add('bg-rose-500', 'text-white', 'border-rose-300', 'dark:bg-rose-500', 'dark:text-white');
                    return;
                }

                item.classList.add('ring-4', 'ring-emerald-400/30', 'border-emerald-300', 'bg-emerald-50', 'dark:bg-emerald-500/10');
            }

            function clearDragStyles(item) {
                if (!item) return;

                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.height = '';
                item.style.position = '';
                item.style.transform = '';

                item.classList.remove('fixed', 'z-[9999]', 'pointer-events-none', 'scale-[1.03]', 'opacity-95', 'shadow-2xl', 'ring-4', 'ring-orange-400/20');
            }

            function lockIntoCategory(item, categoryBox, options = {}) {
                const slot = firstEmptySlot(categoryBox);
                if (!slot) return false;

                const revealed = Boolean(options.revealed);

                clearDragStyles(item);
                prepareLockedItem(item, revealed);

                slot.innerHTML = '';
                slot.appendChild(item);

                if (revealed) {
                    mistakeCount++;
                } else {
                    correctCount++;
                    play(sounds.correct);
                }

                updateStats();

                if (correctCount >= totalItems) {
                    clearInterval(timer);
                    play(sounds.success);
                    setTimeout(showWinModal, 250);
                }

                return true;
            }

            function returnToPool() {
                if (!draggedItem || !placeholder) return;

                clearDragStyles(draggedItem);
                placeholder.replaceWith(draggedItem);
            }

            function autoScroll(clientY) {
                const threshold = 84;
                const speed = 14;

                if (clientY < threshold) {
                    window.scrollBy({ top: -speed, left: 0, behavior: 'auto' });
                    return;
                }

                if (clientY > window.innerHeight - threshold) {
                    window.scrollBy({ top: speed, left: 0, behavior: 'auto' });
                }
            }

            function startDrag(event, item) {
                if (item.dataset.locked === '1') return;

                event.preventDefault();

                const rect = item.getBoundingClientRect();

                draggedItem = item;
                offsetX = event.clientX - rect.left;
                offsetY = event.clientY - rect.top;

                placeholder = document.createElement('div');
                placeholder.className = 'rounded-xl border-2 border-dashed border-orange-200 bg-orange-50/50 dark:border-orange-400/30 dark:bg-orange-500/10 sm:rounded-2xl';
                placeholder.style.width = `${rect.width}px`;
                placeholder.style.height = `${rect.height}px`;

                item.parentElement.insertBefore(placeholder, item);
                document.body.appendChild(item);

                item.classList.remove('hidden');
                item.classList.add('fixed', 'z-[9999]', 'pointer-events-none', 'scale-[1.03]', 'opacity-95', 'shadow-2xl', 'ring-4', 'ring-orange-400/20');
                item.style.left = `${rect.left}px`;
                item.style.top = `${rect.top}px`;
                item.style.width = `${rect.width}px`;
                item.style.height = `${rect.height}px`;
                item.style.position = 'fixed';

                document.body.classList.add('select-none');

                document.addEventListener('pointermove', moveDrag, { passive: false });
                document.addEventListener('pointerup', endDrag, { passive: false });
            }

            function moveDrag(event) {
                if (!draggedItem) return;

                event.preventDefault();

                draggedItem.style.left = `${event.clientX - offsetX}px`;
                draggedItem.style.top = `${event.clientY - offsetY}px`;

                setHoverBox(getDropBox(event.clientX, event.clientY));
                autoScroll(event.clientY);
            }

            function endDrag(event) {
                if (!draggedItem) return;

                const dropBox = getDropBox(event.clientX, event.clientY);
                const isCorrect = dropBox && dropBox.dataset.category === draggedItem.dataset.category;

                document.removeEventListener('pointermove', moveDrag);
                document.removeEventListener('pointerup', endDrag);
                document.body.classList.remove('select-none');
                setHoverBox(null);

                if (isCorrect) {
                    placeholder?.remove();
                    lockIntoCategory(draggedItem, dropBox);
                } else {
                    mistakeCount++;
                    play(sounds.wrong);
                    returnToPool();
                    updateStats();
                }

                draggedItem = null;
                placeholder = null;
            }

            function createTile(item) {
                const node = tileTemplate.content.firstElementChild.cloneNode(true);

                node.dataset.id = item.id;
                node.dataset.category = item.category;
                node.dataset.locked = '0';
                node.setAttribute('aria-label', isImageItem ? (item.label || '') : (item.text || ''));

                if (isImageItem) {
                    const image = node.querySelector('img');
                    const label = node.querySelector('.item-label');

                    if (image) {
                        image.src = item.image || '';
                        image.alt = item.alt || item.label || '';
                    }

                    if (showImageLabel && label) {
                        label.textContent = item.label || '';
                    }
                } else {
                    node.textContent = item.text || '';
                }

                node.addEventListener('pointerdown', event => startDrag(event, node));

                node.addEventListener('keydown', event => {
                    if (event.key !== 'Enter' && event.key !== ' ') return;
                    event.preventDefault();

                    const categoryBox = findCategoryBox(node.dataset.category);
                    if (!categoryBox || node.dataset.locked === '1') return;

                    lockIntoCategory(node, categoryBox);
                });

                return node;
            }

            function buildPool() {
                poolContent.innerHTML = '';

                shuffle(categoriesData).forEach(item => {
                    poolContent.appendChild(createTile(item));
                });

                poolStartIndex = 0;
                updateStats();
                updatePoolSafeSpace();
            }

            function revealAnswers() {
                document.querySelectorAll('.dd-item[data-locked="0"]').forEach(item => {
                    const categoryBox = findCategoryBox(item.dataset.category);
                    if (!categoryBox) return;

                    lockIntoCategory(item, categoryBox, { revealed: true });
                });

                play(sounds.success);
                updateStats();
            }

            function retakeTest() {
                document.querySelectorAll('[data-slot]').forEach(slot => {
                    slot.innerHTML = '';
                });

                correctCount = 0;
                mistakeCount = 0;
                poolStartIndex = 0;
                hideWinModal();
                buildPool();
                startTimer();
            }

            poolPrevBtn?.addEventListener('click', () => {
                poolStartIndex = Math.max(0, poolStartIndex - Math.max(1, Math.floor(getVisibleCap() / 2)));
                updatePoolPager();
            });

            poolNextBtn?.addEventListener('click', () => {
                const cap = getVisibleCap();
                const availableItems = Array.from(poolContent.querySelectorAll('.dd-item[data-locked="0"]'));
                const maxStart = Math.max(0, availableItems.length - cap);

                poolStartIndex = Math.min(maxStart, poolStartIndex + Math.max(1, Math.floor(cap / 2)));
                updatePoolPager();
            });

            revealBtn?.addEventListener('click', revealAnswers);
            retakeBtn?.addEventListener('click', retakeTest);
            restartBtnModal?.addEventListener('click', retakeTest);

            continueBtnModal?.addEventListener('click', () => {
                hideWinModal();

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (error) {}
            });

            window.addEventListener('resize', () => {
                updatePoolPager();
                updatePoolSafeSpace();
            });

            window.resetSlide = retakeTest;

            window.stopSlideAudio = function () {
                Object.values(sounds).forEach(sound => {
                    sound.pause();
                    sound.currentTime = 0;
                });
            };

            window.destroySlide = function () {
                window.stopSlideAudio();
                clearInterval(timer);
            };

            buildPool();
            startTimer();
        });
    </script>
@endsection
