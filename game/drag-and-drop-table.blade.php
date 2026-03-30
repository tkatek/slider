@extends('slider.simple-layout')

@section('style')
    <style>
        :root{
            --pool-safe-space: 300px;
        }

        @keyframes popIn {
            0% { transform: scale(.96); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        #ddShell,
        #ddShell *{
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        body.dragging-active {
            overflow: hidden !important;
            touch-action: none !important;
            overscroll-behavior: none !important;
        }

        .dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .returning {
            transition:
                    top .36s cubic-bezier(.23,1,.32,1),
                    left .36s cubic-bezier(.23,1,.32,1),
                    transform .36s;
            z-index: 9000;
        }

        .shake { animation: shake .35s ease-in-out; }
        .locked-pop { animation: popIn .28s cubic-bezier(.175,.885,.32,1.275); }

        .word-tile {
            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        .ddt-btn-primary{
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

        .ddt-btn-primary:hover{
            transform:scale(1.05);
        }

        .ddt-btn-primary:active{
            transform:scale(.95);
        }

        .ddt-btn-secondary{
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

        .ddt-btn-secondary:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }

        .ddt-btn-secondary:active{
            transform:scale(.98);
        }

        .dark .ddt-btn-secondary{
            color:#fff;
            border-color:rgb(51 65 85);
            background:rgb(30 41 59);
        }

        .dark .ddt-btn-secondary:hover{
            background:rgb(51 65 85);
        }

        .dropzone.active-drop {
            box-shadow: 0 0 0 4px rgba(99,102,241,.16);
            border-color: rgba(99,102,241,.32);
            transform: translateY(-1px);
        }

        .desktop-phrase-headings {
            display: none;
        }

        .table-head-chip{
            border-radius: 1.15rem;
            border: 1px solid rgba(110,231,183,.55);
            background: linear-gradient(135deg, rgba(16,185,129,.92), rgba(6,182,212,.88));
            box-shadow: 0 14px 28px -20px rgba(13,148,136,.45);
            backdrop-filter: blur(14px);
        }

        .dark .table-head-chip{
            border-color: rgba(45,212,191,.22);
            background: linear-gradient(135deg, rgba(13,148,136,.78), rgba(8,145,178,.74));
        }

        .table-place-panel{
            border-radius: 1.1rem;
            border: 1px solid rgba(199,210,254,.7);
            background: linear-gradient(135deg, rgba(79,70,229,.92), rgba(59,130,246,.88));
            box-shadow: 0 14px 28px -22px rgba(79,70,229,.55);
        }

        .dark .table-place-panel{
            border-color: rgba(129,140,248,.22);
            box-shadow: none;
        }

        .table-cell-shell{
            border-radius: 1rem;
            border: 1px solid rgba(226,232,240,.82);
            background: rgba(255,255,255,.42);
            backdrop-filter: blur(10px);
        }

        .dark .table-cell-shell{
            border-color: rgba(71,85,105,.62);
            background: rgba(15,23,42,.18);
        }

        .table-mobile-chip{
            border-radius: 999px;
            background: rgba(226,232,240,.78);
        }

        .dark .table-mobile-chip{
            background: rgba(30,41,59,.82);
        }

        .table-dropzone{
            min-height: 82px;
        }

        .revealed-answer{
            background: #f43f5e !important;
            color: #ffffff !important;
            border-color: rgba(255,255,255,.22) !important;
            box-shadow: 0 0 0 2px rgba(148,163,184,.24);
        }

        @media (min-width: 768px) {
            .desktop-phrase-headings {
                display: grid;
                grid-template-columns: 220px repeat(3, minmax(0, 1fr));
                gap: .75rem;
            }
        }

        @media (min-width: 1024px){
            #ddGameColumn{
                width: var(--dd-game-width, 76%);
                max-width: var(--dd-game-width, 76%);
                flex: none;
            }

            #poolBar{
                width: var(--dd-pool-width, 24%);
                max-width: var(--dd-pool-width, 24%);
                flex: none;
            }
        }

        @media (min-width: 1280px) {
            .desktop-phrase-headings {
                grid-template-columns: 250px repeat(3, minmax(0, 1fr));
            }

            .table-dropzone{
                min-height: 96px;
            }
        }

        @media (max-width: 1023.98px) {
            #ddbWordBankPanel {
                max-height: min(35vh, 310px);
            }

            #poolContent {
                max-height: calc(min(35vh, 310px) - 112px);
                overflow-y: auto;
                overflow-x: hidden;
                align-content: start;
            }
        }

        @media (max-width: 640px) {
            .word-tile {
                min-height: 34px !important;
                font-size: 10px !important;
                line-height: 1 !important;
                padding: .4rem .52rem !important;
                border-radius: .75rem !important;
            }

            .table-dropzone{
                min-height: 70px;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $placedByZone = [];
        $itemsForJs = [];
        $desktopGameWidth = (float) ($content['desktop_game_width'] ?? 76);
        $desktopPoolWidth = (float) ($content['desktop_pool_width'] ?? 24);

        foreach (($content['items'] ?? []) as $index => $item) {
            $key = 'item-' . $index;
            $zoneKey = ($item['place'] ?? '') . '__' . ($item['phrase'] ?? '');

            $item['key'] = $key;

            $itemsForJs[] = [
                'key'    => $key,
                'text'   => $item['text'],
                'place'  => $item['place'],
                'phrase' => $item['phrase'],
                'placed' => (bool)($item['placed'] ?? false),
            ];

            if (!empty($item['placed'])) {
                $placedByZone[$zoneKey][] = $item;
            }
        }
    @endphp

    <main class="w-full" style="--dd-game-width: {{ $desktopGameWidth }}%; --dd-pool-width: {{ $desktopPoolWidth }}%;">
        <div class="header-spacing text-center space-y-6 my-8">
            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $content['title'] }}
                </span>
            </h1>
            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                {{ $content['subtitle'] }}
            </p>
        </div>

        <div class="mx-auto mb-5 w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
            <div class="grid grid-cols-4">
                @foreach(['Tiles' => 'gameProgressCount', 'Correct' => 'correctCount', 'Mistakes' => 'mistakesCount', 'Time' => 'timer'] as $label => $id)
                    <div class="px-3 py-3 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                        <div class="hidden sm:inline-block text-[11px] sm:text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            {{ $label }}
                        </div>
                        <div class="font-black text-base sm:text-lg">
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

        <div id="ddShell" class="mx-auto flex w-full flex-col px-4 py-5 pb-[calc(min(35vh,310px)+16px)] sm:px-6 sm:py-6 sm:pb-[calc(min(35vh,310px)+20px)] lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pb-0">
            <section id="ddGameColumn" class="w-full flex-1 flex flex-col">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    <div class="desktop-phrase-headings mt-1 w-full max-w-[1520px]">
                        <div></div>
                        @foreach(($content['phrases'] ?? []) as $phrase)
                            <div class="table-head-chip px-4 py-2.5 text-center">
                                <div class="font-black text-white text-sm lg:text-[15px] leading-tight tracking-[-0.02em]">
                                    {{ $phrase['title'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full max-w-[1520px] grid gap-3 sm:gap-4" id="categoriesContainer">
                        @foreach(($content['places'] ?? []) as $place)
                            <div class="category-box group relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white/70 backdrop-blur-xl shadow-[0_18px_45px_rgba(2,6,23,0.08)] dark:border-slate-700/60 dark:bg-slate-950/35">
                                <div class="pointer-events-none absolute inset-0 opacity-70 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.14)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                                <div class="relative px-4 py-4 lg:px-5 lg:py-5">
                                    <div class="grid md:grid-cols-[220px_minmax(0,1fr)] xl:grid-cols-[250px_minmax(0,1fr)] gap-3 xl:gap-4 items-start">
                                        <div class="table-place-panel p-3 sm:p-3.5 text-left">
                                            <div class="flex items-center gap-2.5">
                                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-white/20 grid place-items-center text-base sm:text-lg shrink-0">
                                                    {{ $place['emoji'] ?? '🧩' }}
                                                </div>
                                                <div class="font-black leading-tight text-sm lg:text-[15px] text-white tracking-[-0.01em]">
                                                    {{ $place['title'] }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5 lg:gap-3">
                                            @foreach(($content['phrases'] ?? []) as $phrase)
                                                @php
                                                    $zoneKey = $place['key'] . '__' . $phrase['key'];
                                                    $zoneItems = $placedByZone[$zoneKey] ?? [];
                                                @endphp

                                                <div class="table-cell-shell p-2.5 backdrop-blur">
                                                    <div class="sm:hidden mb-1.5 text-center">
                                                        <span class="table-mobile-chip inline-flex items-center justify-center px-2.5 py-1 text-[9px] font-black uppercase tracking-[0.16em] text-slate-700 dark:text-slate-200">
                                                            {{ $phrase['title'] }}
                                                        </span>
                                                    </div>

                                                    <div
                                                            class="dropzone table-dropzone rounded-[1rem] border border-dashed border-slate-200/80 bg-white/40 p-2 sm:p-2.5 flex flex-wrap content-start gap-1.5 dark:border-slate-700/60 dark:bg-slate-900/20"
                                                            data-place="{{ $place['key'] }}"
                                                            data-phrase="{{ $phrase['key'] }}"
                                                    >
                                                        @foreach($zoneItems as $it)
                                                            <div class="word-tile placed-tile locked-pop inline-flex items-center justify-center text-center rounded-xl px-2.5 py-2 sm:px-3 sm:py-2 text-[10px] sm:text-xs font-black text-white shadow-md border border-white/20 bg-gradient-to-br from-indigo-500 to-violet-600">
                                                                {{ $it['text'] }}
                                                            </div>
                                                        @endforeach

                                                        <div class="empty-state {{ !empty($zoneItems) ? 'hidden' : '' }} w-full min-h-[34px] rounded-lg border border-dashed border-slate-200/80 bg-slate-50 text-slate-400 font-extrabold uppercase tracking-[0.18em] text-[9px] grid place-items-center text-center px-2 dark:border-slate-700/60 dark:bg-slate-900/25 dark:text-slate-500">
                                                            Drop here
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="winModal" class="fixed inset-0 z-[2000] hidden items-center justify-center bg-slate-900/40 backdrop-blur-sm p-4">
                        <div class="w-full max-w-lg rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                            <div class="p-6 sm:p-8 text-center">
                                <div class="text-6xl mb-3">🎉</div>
                                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Done!</h2>
                                <p class="mt-2 text-slate-500 dark:text-slate-300 font-semibold text-sm sm:text-base">You completed the table correctly.</p>

                                <div class="mt-5 grid grid-cols-3 gap-2.5 text-left">
                                    <div class="rounded-2xl border border-slate-200/70 dark:border-slate-700/70 bg-slate-50/90 dark:bg-slate-800/50 p-3">
                                        <div class="text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">Correct</div>
                                        <div id="finalCorrect" class="mt-1 text-lg font-black text-slate-900 dark:text-white">0/0</div>
                                    </div>
                                    <div class="rounded-2xl border border-slate-200/70 dark:border-slate-700/70 bg-slate-50/90 dark:bg-slate-800/50 p-3">
                                        <div class="text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">Time</div>
                                        <div id="finalTime" class="mt-1 text-lg font-black text-slate-900 dark:text-white">00:00</div>
                                    </div>
                                    <div class="rounded-2xl border border-slate-200/70 dark:border-slate-700/70 bg-slate-50/90 dark:bg-slate-800/50 p-3">
                                        <div class="text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">Mistakes</div>
                                        <div id="finalMistakes" class="mt-1 text-lg font-black text-slate-900 dark:text-white">0</div>
                                    </div>
                                </div>

                                <div class="mt-5 flex flex-col sm:flex-row gap-2.5">
                                    <button onclick="game.init()" class="ddt-btn-secondary w-full py-2.5 uppercase tracking-widest text-sm">Retry</button>
                                    <button onclick="goNextSlide()" class="ddt-btn-primary w-full py-2.5 uppercase tracking-widest text-sm">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <template id="tileTpl">
                        <div
                                class="word-tile draggable-item select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-base inline-flex min-h-[42px] w-auto max-w-full shrink-0 items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="poolBar" class="fixed inset-x-0 bottom-0 z-[1500] lg:order-first lg:sticky lg:inset-x-auto lg:top-4 lg:bottom-auto lg:self-start">
                <div class="mx-auto w-full px-3 sm:px-6 lg:px-0 pb-0">
                    <div id="ddbWordBankPanel"
                         class="relative overflow-hidden rounded-t-3xl sm:rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                        <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                        <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                            <div class="flex items-center justify-center">
                                <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>

                            <div class="mt-3 flex items-center justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <button
                                            id="poolPrevBtn"
                                            type="button"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                            aria-label="Previous words"
                                    >
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                    <div id="poolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                        0/0
                                    </div>

                                    <button
                                            id="poolNextBtn"
                                            type="button"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden"
                                            aria-label="Next words"
                                    >
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex flex-wrap items-center justify-end gap-2">
                                    <button
                                            type="button"
                                            id="revealAnswersBtn"
                                            class="ddt-btn-primary"
                                    >
                                        Reveal answers
                                    </button>

                                    <button
                                            type="button"
                                            id="retakeTestBtn"
                                            class="ddt-btn-secondary hidden"
                                    >
                                        Retake test
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                            <div class="relative mt-3">
                                <div id="poolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 lg:w-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        const ITEMS = @json($itemsForJs);

        const audio = {
            correct: new Audio('/slider/sounds/correct.wav'),
            wrong: new Audio('/slider/sounds/wrong.wav'),
            success: new Audio('/slider/sounds/success.wav'),
        };

        function play(sound) {
            if (sound) {
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }
        }

        function isEmbedded() {
            try { return window.top !== window.self; } catch(e) { return true; }
        }

        function goNextSlide() {
            if (isEmbedded()) {
                try { if (window.parent?.nextSlide) { window.parent.nextSlide(); return; } } catch (e) {}
                try { window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*"); return; } catch (e) {}
            }
        }

        function updatePoolSafeSpace() {
            const poolBar = document.getElementById('poolBar');
            const shell = document.getElementById('ddShell');
            if (!poolBar || !shell) return;

            if ((window.innerWidth || 0) >= 1024) {
                shell.style.paddingBottom = '';
                return;
            }

            shell.style.paddingBottom = `${Math.ceil(poolBar.getBoundingClientRect().height || 0) + 20}px`;
        }

        class Game {
            constructor() {
                this.poolContent = document.getElementById('poolContent');
                this.poolCount = document.getElementById('poolCount');
                this.poolPrevBtn = document.getElementById('poolPrevBtn');
                this.poolNextBtn = document.getElementById('poolNextBtn');
                this.revealAnswersBtn = document.getElementById('revealAnswersBtn');
                this.retakeTestBtn = document.getElementById('retakeTestBtn');
                this.winModal = document.getElementById('winModal');
                this.tileTpl = document.getElementById('tileTpl');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.pointerId = null;

                this.scrollThreshold = 80;
                this.scrollSpeed = 10;
                this._scrollInterval = null;
                this.timerInt = null;
                this.startTime = null;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.poolStartIndex = 0;

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.dropzones = Array.from(document.querySelectorAll('.dropzone'));
                this.initialDropzonesHTML = this.dropzones.map(zone => zone.innerHTML);

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePointerCancel = this.handlePointerCancel.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);
                this.handlePoolPrev = this.handlePoolPrev.bind(this);
                this.handlePoolNext = this.handlePoolNext.bind(this);

                this.revealAnswersBtn?.addEventListener('click', this.handleRevealAnswers);
                this.retakeTestBtn?.addEventListener('click', this.handleRetakeTest);
                this.poolPrevBtn?.addEventListener('click', this.handlePoolPrev);
                this.poolNextBtn?.addEventListener('click', this.handlePoolNext);
            }

            init() {
                this.winModal.classList.add('hidden');
                this.winModal.classList.remove('flex');

                this.dropzones.forEach((zone, index) => {
                    zone.innerHTML = this.initialDropzonesHTML[index];
                });

                this.poolContent.innerHTML = '';
                this.poolStartIndex = 0;

                const items = ITEMS.filter(item => !item.placed);
                this.shuffle(items).forEach((data, i) => {
                    const node = this.tileTpl.content.firstElementChild.cloneNode(true);
                    node.textContent = data.text;
                    node.dataset.place = data.place;
                    node.dataset.phrase = data.phrase;
                    node.dataset.key = data.key;
                    node.classList.add(...this.tileSkins[i % this.tileSkins.length].split(' '));
                    node.addEventListener('pointerdown', (e) => this.handlePointerDown(e, node));
                    this.poolContent.appendChild(node);
                });

                this.correctCount = document.querySelectorAll('.placed-tile').length;
                this.mistakeCount = 0;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.startTimer();
                this.refreshPoolVisibility();
                this.updateStats();
                this.updatePoolCount();
                this.updateActionButtons();
                this.checkWin();
                updatePoolSafeSpace();
            }

            shuffle(a) {
                const arr = [...a];
                for (let i = arr.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [arr[i], arr[j]] = [arr[j], arr[i]];
                }
                return arr;
            }

            getTotalTiles() {
                return ITEMS.length;
            }

            getVisibleCap() {
                const w = window.innerWidth || 1024;
                if (w >= 1024) return Number.POSITIVE_INFINITY;
                if (w < 640) return 8;
                return 9;
            }

            refreshPoolVisibility() {
                const cap = this.getVisibleCap();
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                const isPaged = Number.isFinite(cap);

                if (!isPaged) {
                    this.poolStartIndex = 0;
                    tiles.forEach(tile => tile.classList.remove('hidden'));
                    this.updatePoolPager(tiles.length, cap, false);
                    return;
                }

                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(this.poolStartIndex, maxStart);

                tiles.forEach((tile, index) => {
                    const visible = index >= this.poolStartIndex && index < this.poolStartIndex + cap;
                    tile.classList.toggle('hidden', !visible);
                });

                this.updatePoolPager(tiles.length, cap, true);
            }

            updatePoolPager(totalTiles, cap, enabled) {
                if (!this.poolPrevBtn || !this.poolNextBtn) return;

                const shouldShow = enabled && totalTiles > cap;
                this.poolPrevBtn.classList.toggle('hidden', !shouldShow);
                this.poolNextBtn.classList.toggle('hidden', !shouldShow);

                if (!shouldShow) return;

                const maxStart = Math.max(0, totalTiles - cap);
                this.poolPrevBtn.disabled = this.poolStartIndex <= 0;
                this.poolNextBtn.disabled = this.poolStartIndex >= maxStart;
            }

            handlePoolPrev() {
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                this.poolStartIndex = Math.max(0, this.poolStartIndex - 1);
                this.refreshPoolVisibility();
            }

            handlePoolNext() {
                const cap = this.getVisibleCap();
                if (!Number.isFinite(cap)) return;
                const tiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                const maxStart = Math.max(0, tiles.length - cap);
                this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + 1);
                this.refreshPoolVisibility();
            }

            formatElapsedTime() {
                if (!this.startTime) return '00:00';
                const elapsed = Math.max(0, Math.floor((Date.now() - this.startTime) / 1000));
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            startTimer() {
                clearInterval(this.timerInt);
                this.startTime = Date.now();
                this.updateTimer();
                this.timerInt = setInterval(() => this.updateTimer(), 1000);
            }

            updateTimer() {
                const timerEl = document.getElementById('timer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            }

            updateStats() {
                const progressEl = document.getElementById('gameProgressCount');
                const correctEl = document.getElementById('correctCount');
                const mistakesEl = document.getElementById('mistakesCount');
                const total = this.getTotalTiles();

                if (progressEl) progressEl.textContent = `${this.correctCount}/${total}`;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            }

            updatePoolCount() {
                if (!this.poolCount) return;
                const total = this.getTotalTiles();
                const remaining = this.poolContent.querySelectorAll('.draggable-item').length;
                this.poolCount.textContent = `${remaining}/${total}`;
            }

            getRemainingTileCount() {
                return this.poolContent.querySelectorAll('.draggable-item').length;
            }

            updateActionButtons() {
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

            handlePointerDown(e, item) {
                if (!item || item.classList.contains('locked') || this.gameCompleted || this.isRevealingAnswers) return;

                this.draggedItem = item;
                this.originalParent = item.parentElement;
                this.pointerId = e.pointerId;

                document.body.classList.add('dragging-active');

                const rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('dragging');
                item.style.width = rect.width + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                try { item.setPointerCapture(e.pointerId); } catch (_) {}

                document.body.appendChild(item);
                this.updatePosition(e.clientX, e.clientY);

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp);
                document.addEventListener('pointercancel', this.handlePointerCancel);
            }

            updatePosition(x, y) {
                if (!this.draggedItem) return;
                this.draggedItem.style.left = (x - this.offsetX) + 'px';
                this.draggedItem.style.top = (y - this.offsetY) + 'px';
            }

            handlePointerMove(e) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && e.pointerId !== this.pointerId) return;

                e.preventDefault();
                this.updatePosition(e.clientX, e.clientY);

                clearInterval(this._scrollInterval);

                const vy = e.clientY;
                const vh = window.innerHeight;
                let scroll = 0;

                if (vy < this.scrollThreshold) scroll = -this.scrollSpeed;
                else if (vy > vh - this.scrollThreshold) scroll = this.scrollSpeed;

                if (scroll !== 0) {
                    this._scrollInterval = setInterval(() => {
                        window.scrollBy(0, scroll);
                        this.checkHover(e.clientX, e.clientY);
                    }, 16);
                }

                this.checkHover(e.clientX, e.clientY);
            }

            checkHover(x, y) {
                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));
                const drop = this.getDropTarget(x, y);
                if (drop?.zone) drop.zone.classList.add('active-drop');
            }

            getDropTarget(x, y) {
                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                const below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;

                return {
                    zone: below.closest('.dropzone')
                };
            }

            handlePointerUp(e) {
                if (!this.draggedItem) return;
                if (this.pointerId !== null && e.pointerId !== this.pointerId) return;

                clearInterval(this._scrollInterval);

                document.body.classList.remove('dragging-active');
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);

                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));

                const drop = this.getDropTarget(e.clientX, e.clientY);
                const droppedOnZone = Boolean(drop?.zone);

                if (
                    droppedOnZone &&
                    drop.zone.dataset.place === this.draggedItem.dataset.place &&
                    drop.zone.dataset.phrase === this.draggedItem.dataset.phrase
                ) {
                    this.lock(drop.zone);
                } else {
                    this.fail({ countAsMistake: droppedOnZone });
                }
            }

            handlePointerCancel() {
                if (!this.draggedItem) return;

                clearInterval(this._scrollInterval);

                document.body.classList.remove('dragging-active');
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);

                document.querySelectorAll('.dropzone').forEach(zone => zone.classList.remove('active-drop'));

                this.fail({ countAsMistake: false });
            }

            lock(zone) {
                play(audio.correct);

                const tile = this.draggedItem;
                const emptyState = zone.querySelector('.empty-state');
                if (emptyState) emptyState.classList.add('hidden');

                tile.classList.remove('dragging', 'cursor-grab');
                tile.classList.add('placed-tile', 'locked-pop');
                tile.style.cssText = '';

                zone.appendChild(tile);

                if (this.placeholder) this.placeholder.remove();

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.pointerId = null;

                this.correctCount++;
                this.updateStats();
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateActionButtons();
                this.checkWin();
                updatePoolSafeSpace();
            }

            fail(options = {}) {
                const shouldCountMistake = options.countAsMistake === true;

                if (shouldCountMistake) {
                    play(audio.wrong);
                    this.mistakeCount++;
                    this.updateStats();
                }

                const item = this.draggedItem;
                if (!item || !this.placeholder || !this.originalParent) return;

                const pr = this.placeholder.getBoundingClientRect();

                item.classList.add('returning', 'shake');
                item.style.left = pr.left + 'px';
                item.style.top = pr.top + 'px';

                setTimeout(() => {
                    if (!item || !this.placeholder || !this.originalParent) return;

                    item.classList.remove('dragging', 'returning', 'shake');
                    item.style.cssText = '';
                    this.originalParent.insertBefore(item, this.placeholder);
                    this.placeholder.remove();

                    this.draggedItem = null;
                    this.placeholder = null;
                    this.originalParent = null;
                    this.pointerId = null;

                    this.refreshPoolVisibility();
                    updatePoolSafeSpace();
                }, 360);
            }

            findDropzone(place, phrase) {
                return this.dropzones.find((zone) => zone.dataset.place === place && zone.dataset.phrase === phrase) || null;
            }

            markTileAsRevealed(tile) {
                if (!tile) return;
                tile.classList.remove(...this.tileSkins.flatMap(skin => skin.split(' ')));
                tile.classList.add('revealed-answer');
            }

            handleRevealAnswers() {
                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                const remainingTiles = Array.from(this.poolContent.querySelectorAll('.draggable-item'));
                if (!remainingTiles.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.updateActionButtons();

                remainingTiles.forEach((tile) => {
                    const zone = this.findDropzone(tile.dataset.place, tile.dataset.phrase);
                    if (!zone) return;

                    const emptyState = zone.querySelector('.empty-state');
                    if (emptyState) emptyState.classList.add('hidden');

                    tile.classList.remove('cursor-grab');
                    tile.classList.add('placed-tile', 'locked-pop');
                    this.markTileAsRevealed(tile);
                    zone.appendChild(tile);
                    this.mistakeCount++;
                });

                this.isRevealingAnswers = false;
                this.refreshPoolVisibility();
                this.updatePoolCount();
                this.updateStats();
                this.updateActionButtons();
                this.checkWin({ showModal: false, delay: 0 });
                updatePoolSafeSpace();
            }

            handleRetakeTest() {
                this.init();
            }

            checkWin(options = {}) {
                const total = this.getTotalTiles();
                const placed = document.querySelectorAll('.placed-tile').length;
                const showModal = options.showModal ?? true;
                const delay = options.delay ?? 420;

                if (placed === total && !this.gameCompleted) {
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
                        if (showModal) {
                            play(audio.success);
                            this.winModal.classList.remove('hidden');
                            this.winModal.classList.add('flex');
                        }
                    }, delay);
                }
            }
        }

        const game = new Game();

        document.addEventListener('DOMContentLoaded', () => {
            game.init();
            updatePoolSafeSpace();
            window.addEventListener('resize', () => {
                game.refreshPoolVisibility();
                updatePoolSafeSpace();
            }, { passive: true });
            setTimeout(updatePoolSafeSpace, 200);
            setTimeout(updatePoolSafeSpace, 500);
        });
    </script>
@endsection
