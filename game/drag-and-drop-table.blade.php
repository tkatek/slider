@extends('slider.simple-layout')

@section('style')
    <style>
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
            max-width: min(1500px, calc(100vw - 1.5rem));
        }

        #poolBar[data-pool-placement="top"].is-stuck > div > div {
            box-shadow: 0 14px 34px rgba(2, 6, 23, .12);
        }
    </style>
@endsection

@section('content')
    @php
        $content = is_array($content ?? null) ? $content : [];

        $poolItemType = trim((string) ($content['pool_item_type'] ?? 'text'));
        $isImagePoolType = $poolItemType === 'image';

        $normLookupKey = static function ($value) {
            $value = trim((string) $value);
            $value = preg_replace('/\s+/u', ' ', $value);
            return mb_strtolower($value);
        };

        $placedByZone = [];
        $itemsForJs = [];

        $playerAudio = !empty($content['audio'])
            ? $content['audio']
            : (!empty($content['audio_src']) ? $content['audio_src'] : null);

        $rawScript = $content['script'] ?? ($content['audio_transcript'] ?? []);
        $scriptLines = is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));

        $hasScript = $scriptLines !== [];

        $rawRows = $content['rows'] ?? $content['places'] ?? [];
        $rawColumns = $content['columns'] ?? $content['phrases'] ?? [];

        $rows = [];
        $rowLookup = [];

        foreach (array_values($rawRows) as $index => $row) {
            $row = is_array($row) ? $row : ['label' => (string) $row];
            $label = trim((string) ($row['title'] ?? $row['label'] ?? $row['name'] ?? $row['short'] ?? ('Row ' . ($index + 1))));
            $key = trim((string) ($row['key'] ?? ''));

            if ($key === '') {
                $key = \Illuminate\Support\Str::slug($label, '_');
            }

            if ($key === '') {
                $key = 'row_' . ($index + 1);
            }

            $row['key'] = $key;
            $row['label'] = $label;
            $row['short_label'] = trim((string) ($row['short'] ?? $row['short_label'] ?? $label));
            $row['emoji'] = $row['emoji'] ?? null;
            $rows[] = $row;

            foreach ([$key, $label, $row['short_label'], \Illuminate\Support\Str::slug($label, '_')] as $lookupValue) {
                if ((string) $lookupValue !== '') {
                    $rowLookup[$normLookupKey($lookupValue)] = $key;
                }
            }
        }

        $columns = [];
        $columnLookup = [];

        foreach (array_values($rawColumns) as $index => $column) {
            $column = is_array($column) ? $column : ['label' => (string) $column];
            $label = trim((string) ($column['title'] ?? $column['label'] ?? $column['name'] ?? $column['short'] ?? ('Column ' . ($index + 1))));
            $key = trim((string) ($column['key'] ?? ''));

            if ($key === '') {
                $key = \Illuminate\Support\Str::slug($label, '_');
            }

            if ($key === '') {
                $key = 'column_' . ($index + 1);
            }

            $column['key'] = $key;
            $column['label'] = $label;
            $column['short_label'] = trim((string) ($column['short'] ?? $column['short_label'] ?? $label));
            $column['emoji'] = $column['emoji'] ?? null;
            $columns[] = $column;

            foreach ([$key, $label, $column['short_label'], \Illuminate\Support\Str::slug($label, '_')] as $lookupValue) {
                if ((string) $lookupValue !== '') {
                    $columnLookup[$normLookupKey($lookupValue)] = $key;
                }
            }
        }

        foreach (($content['items'] ?? []) as $index => $item) {
            $item = is_array($item) ? $item : ['text' => (string) $item];
            $key = (string) ($item['key'] ?? ('item-' . $index));

            $rawItemRow = (string) ($item['row'] ?? $item['place'] ?? '');
            $rawItemColumn = (string) ($item['column'] ?? $item['phrase'] ?? '');

            $itemRow = $rowLookup[$normLookupKey($rawItemRow)] ?? $rawItemRow;
            $itemColumn = $columnLookup[$normLookupKey($rawItemColumn)] ?? $rawItemColumn;
            $zoneKey = $itemRow . '__' . $itemColumn;

            $item['key'] = $key;
            $item['place'] = $itemRow;
            $item['phrase'] = $itemColumn;
            $item['image'] = (string) ($item['image'] ?? $item['src'] ?? $item['url'] ?? '');
            $item['alt'] = (string) ($item['alt'] ?? $item['label'] ?? $item['text'] ?? '');

            $itemsForJs[] = [
                'key'    => $key,
                'text'   => (string) ($item['text'] ?? ''),
                'place'  => $itemRow,
                'phrase' => $itemColumn,
                'placed' => (bool) ($item['placed'] ?? false),
                'image'  => (string) ($item['image'] ?? $item['src'] ?? $item['url'] ?? ''),
                'alt'    => (string) ($item['alt'] ?? $item['label'] ?? $item['text'] ?? ''),
            ];

            if (!empty($item['placed'])) {
                $placedByZone[$zoneKey][] = $item;
            }
        }
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col">
        <div id="ddShell" class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col px-3 py-3 sm:px-6 sm:py-4 lg:px-8 lg:py-5">
            <div class="shrink-0">
                @include('slider.components.title-subtitle')
                @include('slider.components.game-status')
            </div>

            @if(!empty($playerAudio))
                <section class="shrink-0 pb-3 pt-2 sm:pb-4 sm:pt-3">
                    <div class="mx-auto w-full max-w-6xl">
                        @include('slider.components.audio-player')
                    </div>
                </section>
            @endif

            <div id="poolBar" data-pool-placement="top" data-sticky-bank="1" class="sticky top-2 z-[1500] w-full shrink-0 pb-3 sm:top-3 sm:pb-4">
                <div class="mx-auto w-full max-w-[1500px]">
                    <div class="relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white/94 shadow-[0_14px_34px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/88">
                        <div class="relative px-2.5 pb-2 pt-1.5 sm:px-4 sm:pb-2.5 sm:pt-2">
                            <div class="mb-1.5 flex items-center justify-center">
                                <div class="h-1 w-12 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>
                            <div class="flex items-center justify-between gap-2">
                                <div class="flex min-w-0 items-center gap-1.5 sm:gap-2">
                                    <button
                                            type="button"
                                            id="poolPrevBtn"
                                            class="pool-nav-btn inline-flex h-7 w-7 items-center justify-center rounded-full border border-slate-200/70 bg-white/90 text-base font-black text-slate-600 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700/60 dark:bg-slate-900/85 dark:text-slate-200"
                                            aria-label="Show previous words"
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
                                            aria-label="Show more words"
                                    >
                                        ›
                                    </button>

                                    <div class="ml-1 hidden min-w-0 text-[10px] font-black uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500 sm:block">
                                        Word Bank
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    <button
                                            type="button"
                                            id="revealAnswersBtn"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/80 px-3 py-1.5 text-[11px] font-black text-slate-700 shadow-sm transition-colors duration-200 hover:bg-slate-50 active:scale-95 disabled:cursor-not-allowed disabled:opacity-40 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-xs"
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

            <section id="ddGameColumn" class="flex min-h-0 w-full flex-1 flex-col items-center">
                <div class="w-full max-w-[1500px] rounded-3xl border border-slate-200/70 bg-white/75 p-2 shadow-[0_16px_45px_rgba(2,6,23,0.07)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/35 sm:p-3 lg:p-4">
                    <div id="tableScrollArea" class="w-full">
                        <div
                                class="hidden gap-2 md:grid lg:gap-2.5"
                                style="grid-template-columns: minmax(8.5rem, .85fr) repeat({{ max(1, count($columns)) }}, minmax(0, 1fr));"
                        >
                            <div class="rounded-2xl border border-slate-200/80 bg-white/90 px-3 py-2.5 shadow-sm dark:border-slate-700/70 dark:bg-slate-900/70">
                                <div class="text-[10px] font-black uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">
                                    {{ $content['row_heading'] ?? $content['table_corner_title'] ?? 'Categories' }}
                                </div>
                            </div>

                            @foreach($columns as $column)
                                <div class="rounded-2xl border border-slate-200/80 bg-white/90 px-3 py-2.5 text-center shadow-sm dark:border-slate-700/70 dark:bg-slate-900/70">
                                    <div class="flex items-center justify-center gap-1.5 text-xs font-black leading-tight tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-sm">
                                        @if(!empty($column['emoji']))
                                            <span>{{ $column['emoji'] }}</span>
                                        @endif
                                        <span>{{ $column['label'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="categoriesContainer" class="mt-2 grid gap-2 md:gap-2.5">
                            @foreach($rows as $row)
                                <div
                                        class="table-row rounded-2xl border border-slate-200/80 bg-white/80 p-2 shadow-sm dark:border-slate-700/60 dark:bg-slate-950/35 md:grid md:border-0 md:bg-transparent md:p-0 md:shadow-none md:dark:bg-transparent lg:gap-2.5"
                                        style="grid-template-columns: minmax(8.5rem, .85fr) repeat({{ max(1, count($columns)) }}, minmax(0, 1fr));"
                                        data-row-key="{{ $row['key'] }}"
                                        data-row-label="{{ $row['label'] }}"
                                >
                                    <div class="rounded-2xl border border-slate-200/80 bg-white/90 px-3 py-2.5 shadow-sm dark:border-slate-700/70 dark:bg-slate-900/70 md:min-h-[58px] md:px-3 md:py-2.5">
                                        <div class="flex items-center gap-2">
                                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-xl bg-slate-100 text-base text-slate-700 dark:bg-slate-800 dark:text-slate-100 sm:h-9 sm:w-9 sm:text-lg">
                                                {{ $row['emoji'] ?? '•' }}
                                            </span>

                                            <div class="min-w-0 text-xs font-black leading-tight text-slate-900 dark:text-slate-50 sm:text-sm">
                                                {{ $row['label'] }}
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($columns as $column)
                                        @php
                                            $zoneKey = $row['key'] . '__' . $column['key'];
                                            $zoneItems = $placedByZone[$zoneKey] ?? [];
                                        @endphp

                                        <div class="mt-2 md:mt-0">
                                            <div class="mb-1.5 md:hidden">
                                                <span class="inline-flex items-center justify-center gap-1 rounded-full border border-slate-200/80 bg-slate-50 px-2.5 py-1 text-[9px] font-black uppercase tracking-[0.14em] text-slate-600 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-200">
                                                    @if(!empty($column['emoji']))
                                                        <span>{{ $column['emoji'] }}</span>
                                                    @endif
                                                    <span>{{ $column['short_label'] }}</span>
                                                </span>
                                            </div>

                                            <div
                                                    class="dropzone min-h-[58px] rounded-2xl border border-dashed border-slate-300/80 bg-white/85 p-2 shadow-inner transition-all duration-150 dark:border-slate-300/50 dark:bg-slate-100/85 sm:min-h-[64px] sm:p-2.5"
                                                    data-place="{{ $row['key'] }}"
                                                    data-phrase="{{ $column['key'] }}"
                                            >
                                                <div class="tile-area flex flex-wrap content-start gap-1.5">
                                                    @foreach($zoneItems as $it)
                                                        @if($isImagePoolType && !empty($it['image']))
                                                            <div class="draggable-item word-tile placed-tile locked relative aspect-square w-[52px] overflow-hidden rounded-xl border border-white/60 bg-white/95 shadow-[0_8px_18px_rgba(2,6,23,0.12)] dark:border-slate-700/60 dark:bg-slate-900/85 sm:w-[58px]">
                                                                <img src="{{ $it['image'] }}" alt="{{ $it['alt'] ?? $it['text'] ?? '' }}" class="h-full w-full object-cover pointer-events-none" draggable="false">
                                                            </div>
                                                        @else
                                                            <div class="word-tile placed-tile locked inline-flex max-w-full items-center justify-center rounded-xl border border-white/20 bg-emerald-600 px-2 py-1.5 text-center text-[10px] font-black leading-tight text-white shadow-[0_8px_18px_rgba(2,6,23,0.12)] sm:text-xs">
                                                                {{ $it['text'] }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                                <div class="empty-state {{ !empty($zoneItems) ? 'hidden' : '' }} mt-1 grid min-h-[30px] place-items-center rounded-xl border border-dashed border-slate-200/80 bg-white/70 px-2 text-center text-[10px] font-black leading-tight text-slate-700/80 dark:border-slate-300/50 dark:bg-white/55 dark:text-slate-900/80">
                                                    Drop here
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @include('slider.components.game-win-modal')
            </section>

            <template id="tileTpl">
                @if($isImagePoolType)
                    <div
                            class="draggable-item word-tile relative aspect-square w-[58px] cursor-grab select-none overflow-hidden rounded-xl border border-white/60 bg-white/95 shadow-[0_8px_18px_rgba(2,6,23,0.12)] touch-none dark:border-slate-700/60 dark:bg-slate-900/85 sm:w-[68px] md:w-[74px]"
                            style="touch-action:none;"
                            draggable="false"
                            role="img"
                            aria-label=""
                    >
                        <img class="h-full w-full object-cover pointer-events-none" src="" alt="" draggable="false">
                    </div>
                @else
                    <div
                            class="draggable-item word-tile relative flex min-h-[34px] max-w-full cursor-grab select-none items-center justify-center rounded-xl border border-white/20 px-3 py-2 pl-5 text-center text-[11px] font-black leading-tight text-white shadow-[0_8px_18px_rgba(2,6,23,0.12)] touch-none sm:min-h-[38px] sm:px-3.5 sm:py-2 sm:pl-5 sm:text-sm before:absolute before:left-2 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-y-1/2 before:rounded-full before:bg-white/55"
                            style="touch-action:none;"
                            draggable="false"
                    ></div>
                @endif
            </template>

            <div class="hidden">
                <div class="bg-slate-700 bg-indigo-600 bg-sky-600 bg-emerald-600 bg-violet-600 bg-cyan-600 dark:bg-slate-600 dark:bg-indigo-700 dark:bg-sky-700 dark:bg-emerald-700 dark:bg-violet-700 dark:bg-cyan-700"></div>
                <div class="ring-4 ring-indigo-500/30 ring-2 ring-indigo-500/40 bg-indigo-50/60 bg-indigo-50 dark:bg-indigo-500/10 ring-emerald-400/50 ring-red-400/70 border-slate-400 border-red-400 border-red-300 bg-red-50 text-red-700 dark:bg-red-500/15 dark:border-red-400/40 dark:text-red-100 text-indigo-600 border-indigo-200 shadow-[0_0_0_3px_rgba(100,116,139,.12)]"></div>
                <div class="fixed pointer-events-none z-[9999] cursor-grabbing transition-none will-change-transform"></div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        const ITEMS = @json($itemsForJs);
        const POOL_ITEM_TYPE = @json($poolItemType);

        const audio = {
            correct: new Audio('/slider/sounds/correct.wav'),
            wrong: new Audio('/slider/sounds/wrong.wav'),
            success: new Audio('/slider/sounds/success.wav'),
        };

        function play(sound) {
            if (!sound) return;
            sound.pause();
            sound.currentTime = 0;
            sound.play().catch(() => {});
        }

        function isEmbedded() {
            try { return window.top !== window.self; } catch(e) { return true; }
        }

        function goNextSlide() {
            if (isEmbedded()) {
                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (e) {}
            }
        }

        function updatePoolSafeSpace() {
            const shell = document.getElementById('ddShell');
            if (shell) {
                shell.style.paddingBottom = '';
            }

            document.documentElement.style.setProperty('--dd-table-bank-safe-space', '0px');
            requestAnimationFrame(updateTopPoolSticky);
        }

        let topPoolStickyMarker = null;
        let topPoolStickyInitialized = false;

        function getScrollParentsForTopPool() {
            const parents = [window];
            const layout = document.querySelector('.slide-layout');
            const viewport = document.getElementById('slideViewport');

            if (layout) parents.push(layout);
            if (viewport) parents.push(viewport);

            return parents;
        }

        function getTopPoolOffset() {
            const raw = getComputedStyle(document.documentElement).getPropertyValue('--dd-top-pool-offset') || '0';
            const value = parseFloat(raw);
            return Number.isFinite(value) ? value : 0;
        }

        function updateTopPoolSticky() {
            const poolBar = document.getElementById('poolBar');
            const gameColumn = document.getElementById('ddGameColumn');

            if (!poolBar || !gameColumn || !topPoolStickyMarker) return;

            const offset = getTopPoolOffset();
            const shouldStick = topPoolStickyMarker.getBoundingClientRect().top <= offset;

            poolBar.classList.toggle('is-stuck', shouldStick);
            gameColumn.style.paddingTop = shouldStick ? `${poolBar.offsetHeight + 12}px` : '';
        }

        function setupTopPoolSticky() {
            if (topPoolStickyInitialized) return;

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

        window.stopSlideAudio = function () {
            Object.values(audio).forEach((sound) => {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
            });

            if (typeof window.stopAudioPlayer === 'function') {
                window.stopAudioPlayer();
            }
        };

        class DragDropTableGame {
            constructor() {
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
                this.tableScrollArea = document.getElementById('tableScrollArea');
                this.isImagePoolType = POOL_ITEM_TYPE === 'image';

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.pointerId = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.poolStartIndex = 0;
                this.lastVisibleCap = 0;
                this.scrollTimer = null;
                this.playableTileTotal = ITEMS.filter((item) => !item.placed).length;

                this.tileSkins = [
                    'bg-slate-700 dark:bg-slate-600',
                    'bg-indigo-600 dark:bg-indigo-700',
                    'bg-sky-600 dark:bg-sky-700',
                    'bg-emerald-600 dark:bg-emerald-700',
                    'bg-violet-600 dark:bg-violet-700',
                    'bg-cyan-600 dark:bg-cyan-700',
                ];

                this.dropzones = Array.from(document.querySelectorAll('.dropzone'));
                this.initialDropzonesHTML = this.dropzones.map((zone) => zone.innerHTML);

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePointerCancel = this.handlePointerCancel.bind(this);
                this.handlePoolPrev = this.handlePoolPrev.bind(this);
                this.handlePoolNext = this.handlePoolNext.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                this.poolPrevBtn?.addEventListener('click', this.handlePoolPrev);
                this.poolNextBtn?.addEventListener('click', this.handlePoolNext);
                this.revealAnswersBtn?.addEventListener('click', this.handleRevealAnswers);
                this.retakeTestBtn?.addEventListener('click', this.handleRetakeTest);
                this.restartBtnModal?.addEventListener('click', () => this.init());
                this.continueBtnModal?.addEventListener('click', goNextSlide);
            }

            init() {
                this.winModal?.classList.add('hidden');
                this.poolStartIndex = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;

                clearInterval(this.timerInt);
                this.startTimer();

                this.dropzones.forEach((zone, index) => {
                    zone.innerHTML = this.initialDropzonesHTML[index];
                    this.clearDropStates();
                });

                this.poolContent.innerHTML = '';

                this.shuffle(ITEMS.filter((item) => !item.placed)).forEach((itemData, index) => {
                    const node = this.tileTpl.content.firstElementChild.cloneNode(true);
                    const skin = this.tileSkins[index % this.tileSkins.length];

                    node.dataset.place = itemData.place;
                    node.dataset.phrase = itemData.phrase;
                    node.dataset.key = itemData.key;
                    node.dataset.alt = itemData.alt || itemData.text || '';

                    if (this.isImagePoolType && itemData.image) {
                        const img = node.querySelector('img');
                        if (img) {
                            img.src = itemData.image;
                            img.alt = itemData.alt || itemData.text || '';
                        }
                        node.title = itemData.alt || itemData.text || '';
                        node.setAttribute('aria-label', itemData.alt || itemData.text || '');
                        node.dataset.baseClass = node.className;
                    } else {
                        node.textContent = itemData.text;
                        node.dataset.baseClass = node.className + ' ' + skin;
                        node.className = node.dataset.baseClass;
                    }

                    node.addEventListener('pointerdown', (event) => this.handlePointerDown(event, node));
                    this.poolContent.appendChild(node);
                });

                this.refreshPoolVisibility();
                updatePoolSafeSpace();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin({ showModal: false });
            }

            shuffle(array) {
                const items = array.slice();
                for (let i = items.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [items[i], items[j]] = [items[j], items[i]];
                }
                return items;
            }

            startTimer() {
                this.timerInt = setInterval(() => this.updateTimer(), 1000);
                this.updateTimer();
            }

            formatElapsedTime() {
                const elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            updateTimer() {
                const timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            }

            getTotalTiles() {
                return this.playableTileTotal;
            }

            getCorrectPlacedCount() {
                return Array.from(document.querySelectorAll('.dropzone .draggable-item')).filter((tile) => {
                    if (tile.classList.contains('revealed-answer')) return false;
                    const zone = tile.closest('.dropzone');
                    return zone && zone.dataset.place === tile.dataset.place && zone.dataset.phrase === tile.dataset.phrase;
                }).length;
            }

            updateStats() {
                this.correctCount = this.getCorrectPlacedCount();
                const total = this.getTotalTiles();
                const progressEl = document.getElementById('tilesCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');

                if (progressEl) progressEl.textContent = `${this.correctCount}/${total}`;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            }

            getRemainingTiles() {
                return Array.from(this.poolContent.querySelectorAll('.draggable-item:not(.locked)'));
            }

            updatePoolCount() {
                if (!this.poolCount) return;
                const total = this.getTotalTiles();
                const remaining = this.getRemainingTiles().length;
                this.poolCount.textContent = `${remaining}/${total}`;
            }

            getFallbackVisibleCap() {
                const w = window.innerWidth || 1024;
                if (w < 640) return 6;
                if (w < 1024) return 8;
                if (w < 1440) return 12;
                return 14;
            }

            getPoolMaxHeight() {
                const w = window.innerWidth || 1024;
                const vh = window.innerHeight || 768;
                if (w < 640) return Math.max(104, Math.min(155, Math.round(vh * 0.22)));
                if (w < 1024) return Math.max(112, Math.min(165, Math.round(vh * 0.20)));
                if (w < 1440) return Math.max(112, Math.min(162, Math.round(vh * 0.18)));
                return Math.max(112, Math.min(160, Math.round(vh * 0.17)));
            }

            measureVisibleCap(tiles) {
                const total = tiles.length;
                if (total <= 1) return total;

                const poolBar = document.getElementById('poolBar');
                const maxHeight = this.getPoolMaxHeight();
                const fallbackCap = Math.max(1, Math.min(total, this.getFallbackVisibleCap()));

                if (!poolBar || !this.poolContent) return fallbackCap;

                const showRange = (start, count) => {
                    tiles.forEach((tile, index) => {
                        const visible = index >= start && index < start + count;
                        tile.classList.toggle('hidden', !visible);
                    });
                };

                showRange(0, total);
                if ((poolBar.offsetHeight || 0) <= maxHeight) return total;

                let best = 1;
                for (let count = 1; count <= total; count++) {
                    showRange(0, count);
                    if ((poolBar.offsetHeight || 0) <= maxHeight) best = count;
                    else break;
                }

                return Math.max(1, Math.min(total, Math.max(best, Math.min(fallbackCap, total))));
            }

            refreshPoolVisibility() {
                const tiles = this.getRemainingTiles();
                const cap = this.measureVisibleCap(tiles);
                this.lastVisibleCap = cap;

                if (!tiles.length) {
                    this.poolStartIndex = 0;
                    this.updatePoolPager(0, cap, false);
                    updatePoolSafeSpace();
                    return;
                }

                const shouldPage = Number.isFinite(cap) && tiles.length > cap;
                if (!shouldPage) {
                    this.poolStartIndex = 0;
                    tiles.forEach((tile) => tile.classList.remove('hidden'));
                    this.updatePoolPager(tiles.length, cap, false);
                    updatePoolSafeSpace();
                    return;
                }

                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(this.poolStartIndex, maxStart);

                tiles.forEach((tile, index) => {
                    const visible = index >= this.poolStartIndex && index < this.poolStartIndex + cap;
                    tile.classList.toggle('hidden', !visible);
                });

                this.updatePoolPager(tiles.length, cap, true);
                updatePoolSafeSpace();
            }

            updatePoolPager(totalTiles, cap, enabled) {
                if (!this.poolPrevBtn || !this.poolNextBtn) return;

                const shouldShow = enabled && totalTiles > cap;
                this.poolPrevBtn.classList.toggle('hidden', !shouldShow);
                this.poolNextBtn.classList.toggle('hidden', !shouldShow);

                if (!shouldShow) {
                    this.poolPrevBtn.classList.remove('text-indigo-600', 'border-indigo-200', 'bg-indigo-50', 'shadow-indigo-500/10');
                    this.poolNextBtn.classList.remove('text-indigo-600', 'border-indigo-200', 'bg-indigo-50', 'shadow-indigo-500/10');
                    return;
                }

                const maxStart = Math.max(0, totalTiles - cap);
                const hasPrev = this.poolStartIndex > 0;
                const hasNext = this.poolStartIndex < maxStart;

                this.poolPrevBtn.disabled = !hasPrev;
                this.poolNextBtn.disabled = !hasNext;
                this.poolPrevBtn.classList.toggle('text-indigo-600', hasPrev);
                this.poolPrevBtn.classList.toggle('border-indigo-200', hasPrev);
                this.poolPrevBtn.classList.toggle('bg-indigo-50', hasPrev);
                this.poolNextBtn.classList.toggle('text-indigo-600', hasNext);
                this.poolNextBtn.classList.toggle('border-indigo-200', hasNext);
                this.poolNextBtn.classList.toggle('bg-indigo-50', hasNext);
            }

            handlePoolPrev() {
                const cap = this.lastVisibleCap || this.getFallbackVisibleCap();
                this.poolStartIndex = Math.max(0, this.poolStartIndex - Math.max(1, cap));
                this.refreshPoolVisibility();
            }

            handlePoolNext() {
                const tiles = this.getRemainingTiles();
                const cap = this.lastVisibleCap || this.getFallbackVisibleCap();
                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + Math.max(1, cap));
                this.refreshPoolVisibility();
            }

            updateActionButtons() {
                const remaining = this.getRemainingTiles().length;

                if (this.revealAnswersBtn) {
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !this.hasUsedReveal);
                }
            }

            clearDropStates() {
                document.querySelectorAll('.dropzone').forEach((zone) => {
                    zone.classList.remove('border-slate-400', 'shadow-[0_0_0_3px_rgba(100,116,139,.12)]', 'border-red-400', 'bg-red-50', 'dark:bg-red-500/15');
                    zone.querySelector('.empty-state')?.classList.remove('text-red-700', 'dark:text-red-100');
                });
            }

            setActiveDrop(zone) {
                if (!zone) return;
                zone.classList.add('border-slate-400', 'shadow-[0_0_0_3px_rgba(100,116,139,.12)]');
            }

            setWrongDrop(zone) {
                if (!zone) return;
                zone.classList.add('border-red-400', 'bg-red-50', 'dark:bg-red-500/15');
                zone.querySelector('.empty-state')?.classList.add('text-red-700', 'dark:text-red-100');
                setTimeout(() => this.clearDropStates(), 420);
            }

            handlePointerDown(event, item) {
                if (!item || item.classList.contains('locked') || this.gameCompleted || this.isRevealingAnswers) return;

                event.preventDefault();

                this.draggedItem = item;
                this.originalParent = item.parentElement;
                this.pointerId = event.pointerId;

                document.body.classList.add('dd-drag-active');
                document.body.style.userSelect = 'none';

                const rect = item.getBoundingClientRect();
                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('fixed', 'pointer-events-none', 'z-[9999]', 'cursor-grabbing', 'transition-none', 'will-change-transform');
                item.style.position = 'fixed';
                item.style.pointerEvents = 'none';
                item.style.zIndex = '9999';
                item.style.width = rect.width + 'px';
                item.style.left = rect.left + 'px';
                item.style.top = rect.top + 'px';
                item.style.margin = '0';
                item.style.transform = 'translateZ(0) scale(1.03)';
                item.style.boxShadow = '0 18px 38px rgba(15,23,42,.24)';

                this.offsetX = event.clientX - rect.left;
                this.offsetY = event.clientY - rect.top;

                document.body.appendChild(item);
                this.updatePosition(event.clientX, event.clientY);

                try { item.setPointerCapture(event.pointerId); } catch (_) {}

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp);
                document.addEventListener('pointercancel', this.handlePointerCancel);
            }

            updatePosition(x, y) {
                if (!this.draggedItem) return;
                this.draggedItem.style.left = (x - this.offsetX) + 'px';
                this.draggedItem.style.top = (y - this.offsetY) + 'px';
            }

            handlePointerMove(event) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && event.pointerId !== this.pointerId) return;

                event.preventDefault();
                this.updatePosition(event.clientX, event.clientY);
                this.autoScroll(event.clientX, event.clientY);
                this.checkHover(event.clientX, event.clientY);
            }

            autoScroll(x, y) {
                clearInterval(this.scrollTimer);

                const poolBar = document.getElementById('poolBar');
                const poolHeight = poolBar ? Math.ceil(poolBar.getBoundingClientRect().height || 0) : 0;
                const thresholdTop = Math.max(72, poolHeight + 24);
                const thresholdBottom = 76;
                const speed = 10;
                let dy = 0;

                if (y < thresholdTop) dy = -speed;
                if (y > window.innerHeight - thresholdBottom) dy = speed;

                if (!dy) return;

                this.scrollTimer = setInterval(() => {
                    const layout = document.querySelector('.slide-layout');
                    const scrollingElement = document.scrollingElement || document.documentElement;

                    window.scrollBy(0, dy);
                    if (scrollingElement) scrollingElement.scrollTop += dy;
                    if (layout && layout.scrollHeight > layout.clientHeight) layout.scrollTop += dy;

                    this.checkHover(x, y);
                }, 16);
            }

            checkHover(x, y) {
                this.clearDropStates();
                const target = this.getDropTarget(x, y);
                if (target?.zone) this.setActiveDrop(target.zone);
            }

            getDropTarget(x, y) {
                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                const below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                return { zone: below?.closest?.('.dropzone') || null };
            }

            cleanupDrag() {
                clearInterval(this.scrollTimer);
                document.body.classList.remove('dd-drag-active');
                document.body.style.userSelect = '';
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);
                this.clearDropStates();
            }

            handlePointerUp(event) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && event.pointerId !== this.pointerId) return;

                this.cleanupDrag();

                const target = this.getDropTarget(event.clientX, event.clientY);
                const droppedOnZone = Boolean(target?.zone);

                if (
                    droppedOnZone &&
                    target.zone.dataset.place === this.draggedItem.dataset.place &&
                    target.zone.dataset.phrase === this.draggedItem.dataset.phrase
                ) {
                    this.lockTileIntoZone(this.draggedItem, target.zone, { revealed: false, countAsMistake: false });
                    this.resetDragState();
                    return;
                }

                if (droppedOnZone) this.setWrongDrop(target.zone);
                this.fail({ countAsMistake: droppedOnZone });
            }

            handlePointerCancel() {
                if (!this.draggedItem) return;
                this.cleanupDrag();
                this.fail({ countAsMistake: false });
            }

            resetTileRuntimeStyles(tile) {
                if (!tile) return;
                tile.classList.remove('fixed', 'pointer-events-none', 'z-[9999]', 'cursor-grabbing', 'transition-none', 'will-change-transform', 'shake', 'wrong-feedback', 'hidden');
                tile.style.position = '';
                tile.style.left = '';
                tile.style.top = '';
                tile.style.width = '';
                tile.style.height = '';
                tile.style.zIndex = '';
                tile.style.transform = '';
                tile.style.pointerEvents = '';
                tile.style.margin = '';
                tile.style.boxShadow = '';
            }

            normalizeTileForZone(tile, revealed = false) {
                this.resetTileRuntimeStyles(tile);

                if (this.isImagePoolType) {
                    tile.className = revealed
                        ? 'draggable-item word-tile revealed-answer locked relative aspect-square w-[52px] overflow-hidden rounded-xl border border-emerald-300/70 bg-emerald-50 shadow-[0_0_0_2px_rgba(34,197,94,.16),0_10px_22px_rgba(15,23,42,.08)] dark:border-emerald-400/50 dark:bg-emerald-500/15 sm:w-[58px]'
                        : 'draggable-item word-tile locked relative aspect-square w-[52px] overflow-hidden rounded-xl border border-white/60 bg-white/95 shadow-[0_8px_18px_rgba(2,6,23,0.12)] dark:border-slate-700/60 dark:bg-slate-900/85 sm:w-[58px]';
                    return;
                }

                if (revealed) {
                    tile.className = 'draggable-item word-tile revealed-answer locked inline-flex max-w-full items-center justify-center rounded-xl border border-emerald-300/70 bg-emerald-50 px-2 py-1.5 text-center text-[10px] font-black leading-tight text-emerald-700 shadow-[0_0_0_2px_rgba(34,197,94,.16),0_10px_22px_rgba(15,23,42,.08)] dark:border-emerald-400/50 dark:bg-emerald-500/15 dark:text-emerald-100 sm:text-xs';
                    return;
                }

                tile.className = 'draggable-item word-tile locked inline-flex max-w-full items-center justify-center rounded-xl border border-white/20 bg-emerald-600 px-2 py-1.5 text-center text-[10px] font-black leading-tight text-white shadow-[0_8px_18px_rgba(2,6,23,0.12)] sm:text-xs';
            }

            lockTileIntoZone(tile, zone, options = {}) {
                const { revealed = false, countAsMistake = false } = options;
                const tileArea = zone.querySelector('.tile-area') || zone;
                const emptyState = zone.querySelector('.empty-state');

                if (emptyState) emptyState.classList.add('hidden');
                this.normalizeTileForZone(tile, revealed);
                tileArea.appendChild(tile);

                if (this.placeholder?.parentNode) this.placeholder.remove();

                if (countAsMistake) this.mistakeCount++;
                if (!revealed) play(audio.correct);

                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();

                if (!this.isRevealingAnswers) {
                    this.checkWin();
                }
            }

            fail(options = {}) {
                const shouldCountMistake = options.countAsMistake === true;
                const item = this.draggedItem;

                if (shouldCountMistake) {
                    this.mistakeCount++;
                    this.updateStats();
                    play(audio.wrong);
                }

                if (!item || !this.placeholder || !this.originalParent) {
                    this.resetDragState();
                    return;
                }

                this.resetTileRuntimeStyles(item);
                item.style.outline = '3px solid rgba(248,113,113,.86)';
                item.style.outlineOffset = '2px';
                this.originalParent.insertBefore(item, this.placeholder);
                this.placeholder.remove();

                setTimeout(() => {
                    item.style.outline = '';
                    item.style.outlineOffset = '';
                }, 420);

                this.resetDragState();
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateActionButtons();
            }

            resetDragState() {
                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.pointerId = null;
            }

            findDropzone(place, phrase) {
                return this.dropzones.find((zone) => zone.dataset.place === place && zone.dataset.phrase === phrase) || null;
            }

            handleRevealAnswers() {
                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                const remainingTiles = this.getRemainingTiles();
                if (!remainingTiles.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.updateActionButtons();

                remainingTiles.forEach((tile) => {
                    const zone = this.findDropzone(tile.dataset.place, tile.dataset.phrase);
                    if (!zone) return;

                    this.lockTileIntoZone(tile, zone, { revealed: true, countAsMistake: true });
                });

                this.isRevealingAnswers = false;
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin({ showModal: false, delay: 0 });
            }

            handleRetakeTest() {
                this.init();
            }

            checkWin(options = {}) {
                const total = this.getTotalTiles();
                const remaining = this.getRemainingTiles().length;
                const showModal = options.showModal ?? true;
                const delay = options.delay ?? 420;

                if (total > 0 && remaining === 0 && !this.gameCompleted) {
                    this.gameCompleted = true;
                    clearInterval(this.timerInt);

                    const finalCorrect = document.getElementById('finalCorrect');
                    const finalTime = document.getElementById('finalTime');
                    const finalMistakes = document.getElementById('finalMistakes');

                    if (finalCorrect) finalCorrect.textContent = `${this.correctCount}/${total}`;
                    if (finalTime) finalTime.textContent = this.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = this.mistakeCount;

                    this.updateActionButtons();

                    setTimeout(() => {
                        if (showModal && this.winModal) {
                            play(audio.success);
                            this.winModal.classList.remove('hidden');
                        }
                    }, delay);
                }
            }
        }

        const dragDropTableGame = new DragDropTableGame();

        document.addEventListener('DOMContentLoaded', () => {
            updatePoolSafeSpace();
            dragDropTableGame.init();
            setupTopPoolSticky();
            updateTopPoolSticky();

            window.addEventListener('resize', () => {
                updatePoolSafeSpace();
                dragDropTableGame.refreshPoolVisibility();
                updateTopPoolSticky();
            }, { passive: true });

            setTimeout(() => { updatePoolSafeSpace(); updateTopPoolSticky(); }, 120);
            setTimeout(() => { updatePoolSafeSpace(); updateTopPoolSticky(); }, 420);
        });
    </script>
@endsection
