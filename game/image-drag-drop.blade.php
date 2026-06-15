@extends('slider.simple-layout')

@section('style')
    <style>
        @keyframes imageDdPopIn {
            0% { transform: translate(-50%, -50%) scale(.92); opacity: .55; }
            100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }

        @keyframes imageDdShake {
            0%, 100% { transform: translate(-50%, -50%) translateX(0); }
            25% { transform: translate(-50%, -50%) translateX(-6px); }
            75% { transform: translate(-50%, -50%) translateX(6px); }
        }

        @keyframes imageDdTileShake {
            0%, 100% { transform: scale(1.05) rotate(-2deg) translateX(0); }
            25% { transform: scale(1.05) rotate(-2deg) translateX(-7px); }
            75% { transform: scale(1.05) rotate(-2deg) translateX(7px); }
        }

        @keyframes imageDdNudge {
            0%, 100% { transform: translateX(0) scale(1); }
            35% { transform: translateX(2px) scale(1.06); }
            70% { transform: translateX(-1px) scale(1.02); }
        }

        #imageDdShell,
        #imageDdShell * {
            -webkit-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
        }

        body.image-dd-drag-active,
        body.image-dd-drag-active * {
            cursor: grabbing !important;
            -webkit-user-select: none !important;
            user-select: none !important;
        }

        .image-dd-slot {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: clamp(54px, 7.4vw, 82px);
            min-height: clamp(18px, 2.4vw, 28px);
            padding: 2px 7px;
            border-radius: 999px;
            border: 3px solid rgba(255,255,255,.94);
            background: rgba(255,255,255,.02);
            box-shadow: 0 0 0 2px rgba(15,23,42,.40), 0 8px 18px rgba(15,23,42,.10);
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease, background .18s ease, width .18s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .image-dd-slot:focus-visible {
            outline: none;
            box-shadow: 0 0 0 2px rgba(15,23,42,.45), 0 0 0 6px rgba(99,102,241,.24), 0 8px 18px rgba(15,23,42,.12);
        }

        .image-dd-slot-inner {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 16px;
            text-align: center;
            font-size: clamp(8px, 1vw, 11px);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -.01em;
            color: transparent;
            pointer-events: none;
        }

        .image-dd-slot.is-hover {
            transform: translate(-50%, -50%) scale(1.08);
            border-color: #ffffff;
            background: rgba(255,255,255,.22);
            box-shadow: 0 0 0 3px rgba(15,23,42,.48), 0 14px 26px rgba(15,23,42,.18);
        }

        .image-dd-slot.is-solved {
            width: auto;
            max-width: min(142px, 28vw);
            min-height: clamp(23px, 3vw, 32px);
            border-color: rgba(99,102,241,.92);
            background: rgba(255,255,255,.94);
            box-shadow: 0 0 0 2px rgba(99,102,241,.16), 0 12px 24px rgba(79,70,229,.20);
            animation: imageDdPopIn .26s cubic-bezier(.175,.885,.32,1.275);
        }

        .image-dd-slot.is-solved .image-dd-slot-inner {
            min-width: 42px;
            color: rgb(49,46,129);
            text-shadow: 0 1px 0 rgba(255,255,255,.65);
        }

        .image-dd-slot.is-revealed {
            border-color: rgba(244,63,94,.68);
            background: rgba(255,241,242,.95);
            box-shadow: 0 0 0 2px rgba(244,63,94,.13), 0 12px 24px rgba(244,63,94,.18);
        }

        .image-dd-slot.is-revealed .image-dd-slot-inner {
            color: rgb(136,19,55);
        }

        .image-dd-slot.is-wrong {
            animation: imageDdShake .32s ease-in-out;
            border-color: rgba(248,113,113,.95);
            background: rgba(254,226,226,.36);
        }

        .dark .image-dd-slot.is-solved {
            border-color: rgba(129,140,248,.9);
            background: rgba(15,23,42,.88);
            box-shadow: 0 0 0 2px rgba(129,140,248,.16), 0 12px 24px rgba(2,6,23,.28);
        }

        .dark .image-dd-slot.is-solved .image-dd-slot-inner {
            color: rgb(224,231,255);
            text-shadow: none;
        }

        .dark .image-dd-slot.is-revealed {
            border-color: rgba(251,113,133,.72);
            background: rgba(127,29,29,.82);
        }

        .dark .image-dd-slot.is-revealed .image-dd-slot-inner {
            color: rgb(255,228,230);
        }

        .image-dd-tile {
            touch-action: none;
        }

        .image-dd-tile.is-selected {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 14px 30px rgba(79,70,229,.25), 0 0 0 4px rgba(255,255,255,.32);
        }

        .image-dd-tile-dragging {
            position: fixed !important;
            z-index: 9999 !important;
            pointer-events: none !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .image-dd-tile-returning {
            z-index: 9000;
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s ease;
        }

        .image-dd-tile-shake {
            animation: imageDdTileShake .34s ease-in-out;
        }

        .image-dd-placeholder {
            border: 1px dashed rgba(203,213,225,.85);
            background: rgba(226,232,240,.34);
            border-radius: .75rem;
        }

        .dark .image-dd-placeholder {
            border-color: rgba(71,85,105,.85);
            background: rgba(30,41,59,.34);
        }

        .image-dd-pool-nav-hint {
            color: rgb(79,70,229);
            border-color: rgba(99,102,241,.35);
            background: rgba(238,242,255,.96);
            box-shadow: 0 0 0 4px rgba(99,102,241,.10), 0 8px 18px rgba(79,70,229,.16);
            animation: imageDdNudge 1.4s ease-in-out 3;
        }

        .dark .image-dd-pool-nav-hint {
            color: rgb(224,231,255);
            border-color: rgba(129,140,248,.45);
            background: rgba(67,56,202,.34);
            box-shadow: 0 0 0 4px rgba(129,140,248,.12), 0 10px 20px rgba(2,6,23,.28);
        }


        #imageDdImage {
            max-height: var(--image-dd-max-height-mobile);
        }

        @media (min-width: 640px) {
            #imageDdImage {
                max-height: var(--image-dd-max-height-desktop);
            }

            #imageDdPoolContent {
                max-height: calc(100dvh - 285px);
                overflow-x: hidden;
                overflow-y: auto;
            }
        }

        @media (max-width: 640px) {
            .image-dd-slot.is-solved {
                max-width: 104px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .image-dd-slot,
            .image-dd-tile-returning,
            .image-dd-tile-shake,
            .image-dd-slot.is-wrong,
            .image-dd-slot.is-solved {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $imageMaxHeightMobile = $content['image_max_height_mobile'] ?? ($content['image_max_height'] ?? 'calc(100dvh - 300px)');
        $imageMaxHeightDesktop = $content['image_max_height_desktop'] ?? 'calc(100dvh - 190px)';
        $poolVisibleCap = $content['pool_visible_cap'] ?? null;
    @endphp

    <main id="imageDdShell" class="flex min-h-[100dvh] w-full flex-col">
        <div id="imageDdPage" class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col px-3 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
            <div class="shrink-0">
                @include('slider.components.title-subtitle')
                @include('slider.components.game-status')
            </div>

            <div id="imageDdGameBody" class="flex min-h-0 w-full flex-1 flex-col pt-3 sm:flex-row sm:items-start sm:justify-center sm:gap-4 sm:pt-4 lg:gap-5">
                <aside id="imageDdPoolRail" class="order-2 w-full sm:order-1 sm:w-[29%] sm:min-w-[210px] sm:max-w-[330px] sm:shrink-0 sm:self-stretch lg:w-[27%]">
                    <div id="imageDdPoolBar" class="fixed inset-x-0 bottom-0 z-[1500] px-2 pb-2 sm:sticky sm:bottom-auto sm:inset-x-auto sm:top-3 sm:z-[80] sm:px-0 sm:pb-0">
                        <div class="mx-auto w-full max-w-5xl sm:max-w-none">
                            <div class="relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/92 shadow-[0_-10px_28px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/82 sm:shadow-sm">
                                <div class="relative px-2.5 py-2 sm:px-3 sm:py-3 lg:px-4">
                                    <div class="flex items-center justify-center sm:hidden">
                                        <div class="h-1 w-10 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                    </div>

                                    <div class="mt-2 flex items-center justify-between gap-2 sm:mt-0">
                                        <div class="flex items-center gap-1.5 sm:gap-2">
                                            <button
                                                    type="button"
                                                    id="imageDdPrevBtn"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-slate-200/70 bg-white/90 text-base font-black text-slate-600 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700/60 dark:bg-slate-900/85 dark:text-slate-200"
                                                    aria-label="Show previous words"
                                            >‹</button>

                                            <div id="imageDdPoolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/75 px-2.5 py-1 text-[10px] font-black text-slate-600 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:text-xs">
                                                0/0
                                            </div>

                                            <button
                                                    type="button"
                                                    id="imageDdNextBtn"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-slate-200/70 bg-white/90 text-base font-black text-slate-600 shadow-sm transition disabled:cursor-not-allowed disabled:opacity-35 dark:border-slate-700/60 dark:bg-slate-900/85 dark:text-slate-200"
                                                    aria-label="Show more words"
                                            >›</button>
                                        </div>

                                        <div class="flex flex-wrap items-center justify-end gap-2">
                                            <button
                                                    type="button"
                                                    id="imageDdRevealBtn"
                                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-orange-300/80 bg-orange-50/90 px-3 py-1.5 text-[11px] font-black text-orange-700 shadow-sm transition-colors duration-200 hover:bg-orange-100 active:scale-95 dark:border-orange-700/50 dark:bg-orange-900/35 dark:text-orange-200 dark:hover:bg-orange-900/50 sm:text-xs"
                                            >Reveal answers</button>

                                            <button
                                                    type="button"
                                                    id="imageDdRetakeBtn"
                                                    class="hidden inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/80 px-3 py-1.5 text-[11px] font-black text-slate-700 shadow-sm transition-colors duration-200 hover:bg-slate-50 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-xs"
                                            >Retake test</button>
                                        </div>
                                    </div>

                                    <div class="my-1.5 h-px w-full bg-slate-200/50 dark:bg-slate-700/45"></div>

                                    <div id="imageDdPoolContent" class="mx-auto flex w-full max-w-full flex-wrap items-start justify-center gap-1.5 overflow-hidden sm:mx-0 sm:justify-start sm:gap-2 sm:overflow-x-hidden sm:overflow-y-auto sm:pr-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <section id="imageDdBoardColumn" class="order-1 flex min-h-0 w-full flex-1 items-start justify-center sm:order-2 sm:min-w-0">
                    <div id="imageDdCard" class="relative w-full max-w-[1180px] overflow-hidden rounded-[1.35rem] border border-slate-200/70 bg-white/80 p-2 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/35 sm:rounded-[1.55rem] sm:p-3">
                        <div id="imageDdImageFrame" class="flex w-full items-center justify-center overflow-hidden rounded-[1.05rem] bg-slate-100 dark:bg-slate-900 sm:rounded-[1.25rem]">
                            <div id="imageDdImageWrap" class="relative inline-block max-w-full">
                                @if(!empty($content['image']))
                                    <img
                                            id="imageDdImage"
                                            src="{{ $content['image'] }}"
                                            alt="Labeling game image"
                                            draggable="false"
                                            class="block h-auto w-auto max-w-full select-none object-contain"
                                            style="--image-dd-max-height-mobile: {{ $imageMaxHeightMobile }}; --image-dd-max-height-desktop: {{ $imageMaxHeightDesktop }};"
                                    >
                                @else
                                    <div id="imageDdFallback" class="grid min-h-[320px] w-full min-w-[min(720px,calc(100vw-3rem))] place-items-center bg-gradient-to-br from-indigo-500/10 via-sky-500/10 to-violet-500/10">
                                        <div class="rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-4 text-center shadow-sm dark:border-slate-700/70 dark:bg-slate-900/65">
                                            <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-300 sm:text-sm">Add your image</p>
                                            <p class="mt-1 text-sm font-semibold text-slate-700 dark:text-slate-200 sm:text-base">Set <code>$content['image']</code>.</p>
                                        </div>
                                    </div>
                                @endif

                                <div id="imageDdDropLayer" class="absolute inset-0"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('slider.components.game-win-modal')

            <template id="imageDdTileTpl">
                <button
                        type="button"
                        class="image-dd-tile relative inline-flex min-h-[34px] max-w-full cursor-grab select-none items-center justify-center rounded-xl border border-white/20 px-3 py-2 pl-5 text-center text-[11px] font-black leading-tight text-white shadow-[0_8px_18px_rgba(2,6,23,0.12)] transition-transform duration-150 before:absolute before:left-2 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-y-1/2 before:rounded-full before:bg-white/55 hover:-translate-y-0.5 active:translate-y-0 sm:min-h-[38px] sm:px-3.5 sm:py-2 sm:pl-5 sm:text-sm"
                        draggable="false"
                ></button>
            </template>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const IMAGE_DD_RAW_LABELS = @json($content['labels'] ?? []);
            const IMAGE_DD_VISIBLE_CAP = Number(@json($poolVisibleCap ?? 0));

            const CONFIG = {
                dragStartDistance: 7,
                returnDuration: 420,
                wrongDuration: 330,
                completeDelay: 240,
                autoScrollThreshold: 78,
                autoScrollSpeed: 13,
                dropThreshold: {
                    mobile: 34,
                    tablet: 40,
                    desktop: 46,
                },
                audio: {
                    correct: '/slider/sounds/correct.wav',
                    wrong: '/slider/sounds/wrong.wav',
                    success: '/slider/sounds/success.wav',
                },
            };

            const TILE_SKINS = [
                'bg-indigo-600 dark:bg-indigo-700',
                'bg-pink-600 dark:bg-pink-700',
                'bg-emerald-600 dark:bg-emerald-700',
                'bg-orange-600 dark:bg-orange-700',
                'bg-violet-600 dark:bg-violet-700',
                'bg-sky-600 dark:bg-sky-700',
                'bg-cyan-600 dark:bg-cyan-700',
                'bg-blue-600 dark:bg-blue-700',
            ];

            const SOUND = {
                correct: new Audio(CONFIG.audio.correct),
                wrong: new Audio(CONFIG.audio.wrong),
                success: new Audio(CONFIG.audio.success),
            };
            Object.values(SOUND).forEach((audio) => { audio.volume = 1; });

            const $ = (id) => document.getElementById(id);
            const clamp = (value, min, max) => Math.max(min, Math.min(max, Number(value)));
            const isFiniteNumber = (value) => Number.isFinite(Number(value));

            const playSound = (audio) => {
                if (!audio) return;
                audio.pause();
                audio.currentTime = 0;
                audio.play().catch(() => {});
            };

            const shuffle = (items) => {
                const copy = [...items];
                for (let i = copy.length - 1; i > 0; i -= 1) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [copy[i], copy[j]] = [copy[j], copy[i]];
                }
                return copy;
            };

            const formatTime = (seconds) => {
                const mins = String(Math.floor(seconds / 60)).padStart(2, '0');
                const secs = String(seconds % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            };

            const isEmbedded = () => {
                try { return window.top !== window.self; }
                catch (error) { return true; }
            };

            const goNextSlide = () => {
                if (!isEmbedded()) return;

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try { window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*'); }
                catch (error) {}
            };

            const normalizeLabels = (items) => {
                if (!Array.isArray(items)) return [];

                return items
                    .map((item, index) => ({
                        id: index,
                        text: String(item?.text ?? '').trim(),
                        x: clamp(isFiniteNumber(item?.x) ? item.x : 50, 0, 100),
                        y: clamp(isFiniteNumber(item?.y) ? item.y : 50, 0, 100),
                        placed: false,
                        revealed: false,
                    }))
                    .filter((item) => item.text.length > 0);
            };

            class ImageDragDropGame {
                constructor() {
                    this.cacheDom();
                    this.bindMethods();
                    this.bindEvents();
                    this.resetState();
                }

                cacheDom() {
                    this.page = $('imageDdPage');
                    this.boardColumn = $('imageDdBoardColumn');
                    this.imageCard = $('imageDdCard');
                    this.imageWrap = $('imageDdImageWrap');
                    this.image = $('imageDdImage');
                    this.dropLayer = $('imageDdDropLayer');
                    this.poolBar = $('imageDdPoolBar');
                    this.poolContent = $('imageDdPoolContent');
                    this.poolCount = $('imageDdPoolCount');
                    this.prevBtn = $('imageDdPrevBtn');
                    this.nextBtn = $('imageDdNextBtn');
                    this.revealBtn = $('imageDdRevealBtn');
                    this.retakeBtn = $('imageDdRetakeBtn');
                    this.tileTpl = $('imageDdTileTpl');
                    this.winModal = $('winModal');
                    this.restartBtnModal = $('restartBtnModal');
                    this.continueBtnModal = $('continueBtnModal');
                    this.tilesCount = $('tilesCount');
                    this.correctCountEl = $('correctCount');
                    this.mistakesCountEl = $('mistakesCount');
                    this.gameTimer = $('gameTimer');
                    this.finalCorrect = $('finalCorrect');
                    this.finalTime = $('finalTime');
                    this.finalMistakes = $('finalMistakes');
                }

                bindMethods() {
                    this.handleResize = this.handleResize.bind(this);
                    this.handlePointerMove = this.handlePointerMove.bind(this);
                    this.handlePointerUp = this.handlePointerUp.bind(this);
                    this.handlePointerCancel = this.handlePointerCancel.bind(this);
                    this.handlePoolPrev = this.handlePoolPrev.bind(this);
                    this.handlePoolNext = this.handlePoolNext.bind(this);
                    this.handleReveal = this.handleReveal.bind(this);
                    this.handleRetake = this.handleRetake.bind(this);
                    this.handleWindowBlur = this.handleWindowBlur.bind(this);
                }

                bindEvents() {
                    this.prevBtn?.addEventListener('click', this.handlePoolPrev);
                    this.nextBtn?.addEventListener('click', this.handlePoolNext);
                    this.revealBtn?.addEventListener('click', this.handleReveal);
                    this.retakeBtn?.addEventListener('click', this.handleRetake);
                    this.restartBtnModal?.addEventListener('click', () => this.reset());
                    this.continueBtnModal?.addEventListener('click', goNextSlide);
                    window.addEventListener('resize', this.handleResize, { passive: true });
                    window.addEventListener('orientationchange', this.handleResize, { passive: true });
                    window.addEventListener('blur', this.handleWindowBlur, { passive: true });
                    this.image?.addEventListener('load', () => this.refreshLayout(), { passive: true });
                }

                resetState() {
                    this.labels = [];
                    this.poolOrder = [];
                    this.poolStartIndex = 0;
                    this.correctCount = 0;
                    this.mistakeCount = 0;
                    this.selectedId = null;
                    this.hoverTargetId = null;
                    this.draggedItem = null;
                    this.pendingDrag = null;
                    this.placeholder = null;
                    this.originalParent = null;
                    this.offsetX = 0;
                    this.offsetY = 0;
                    this.pointerClientX = 0;
                    this.pointerClientY = 0;
                    this.rafId = null;
                    this.autoScrollTimer = null;
                    this.timerId = null;
                    this.startTime = Date.now();
                    this.gameCompleted = false;
                    this.hasUsedReveal = false;
                    this.isRevealing = false;
                    this.modalShown = false;
                }

                init() {
                    this.stopTimer();
                    this.cleanupDrag();
                    this.hideWin();
                    this.resetState();

                    this.labels = normalizeLabels(IMAGE_DD_RAW_LABELS);
                    this.poolOrder = shuffle(this.labels.map((label) => label.id));

                    this.startTimer();
                    this.renderTargets();
                    this.renderPool();
                    this.refreshLayout();
                    this.updateAll();
                }

                reset() {
                    this.init();
                }

                startTimer() {
                    this.startTime = Date.now();
                    this.updateTimer();
                    this.timerId = window.setInterval(() => this.updateTimer(), 1000);
                }

                stopTimer() {
                    if (!this.timerId) return;
                    window.clearInterval(this.timerId);
                    this.timerId = null;
                }

                updateTimer() {
                    if (!this.gameTimer) return;
                    const elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                    this.gameTimer.textContent = formatTime(elapsed);
                }

                getTotalCount() {
                    return this.labels.length;
                }

                getSolvedCount() {
                    return this.labels.filter((label) => label.placed).length;
                }

                getRemainingLabels() {
                    return this.poolOrder
                        .map((id) => this.getLabel(id))
                        .filter((label) => label && !label.placed);
                }

                getLabel(id) {
                    return this.labels.find((label) => Number(label.id) === Number(id)) || null;
                }

                isComplete() {
                    return this.getTotalCount() > 0 && this.getSolvedCount() === this.getTotalCount();
                }

                renderTargets() {
                    if (!this.dropLayer) return;
                    this.dropLayer.innerHTML = '';

                    this.labels.forEach((label) => {
                        const slot = document.createElement('button');
                        const inner = document.createElement('span');

                        slot.type = 'button';
                        slot.className = 'image-dd-slot';
                        slot.dataset.targetId = String(label.id);
                        slot.dataset.solved = label.placed ? '1' : '0';
                        slot.style.left = `${label.x}%`;
                        slot.style.top = `${label.y}%`;
                        slot.setAttribute('aria-label', label.placed ? label.text : `Drop ${label.text} here`);

                        if (label.placed) slot.classList.add('is-solved');
                        if (label.revealed) slot.classList.add('is-revealed');
                        if (Number(this.hoverTargetId) === Number(label.id) && !label.placed) slot.classList.add('is-hover');

                        inner.className = 'image-dd-slot-inner';
                        inner.textContent = label.placed ? label.text : '';
                        slot.appendChild(inner);
                        slot.addEventListener('click', () => this.handleSlotClick(label.id, slot));
                        this.dropLayer.appendChild(slot);
                    });
                }

                renderPool() {
                    if (!this.poolContent || !this.tileTpl) return;
                    this.poolContent.innerHTML = '';

                    this.getRemainingLabels().forEach((label, index) => {
                        const tile = this.tileTpl.content.firstElementChild.cloneNode(true);
                        tile.textContent = label.text;
                        tile.dataset.labelId = String(label.id);
                        tile.dataset.baseClass = tile.className;
                        tile.classList.add(...TILE_SKINS[index % TILE_SKINS.length].split(' '));

                        if (Number(this.selectedId) === Number(label.id)) {
                            tile.classList.add('is-selected');
                        }

                        tile.addEventListener('click', (event) => {
                            if (this.draggedItem || this.pendingDrag?.started) return;
                            event.preventDefault();
                            this.toggleTileSelection(label.id);
                        });
                        tile.addEventListener('pointerdown', (event) => this.handlePointerDown(event, tile));
                        this.poolContent.appendChild(tile);
                    });

                    this.refreshPoolVisibility();
                }

                updateAll() {
                    this.updateStats();
                    this.updateButtons();
                    this.updatePoolCount();
                    this.refreshPoolVisibility();
                }

                updateStats() {
                    const total = this.getTotalCount();
                    if (this.tilesCount) this.tilesCount.textContent = `${this.correctCount}/${total}`;
                    if (this.correctCountEl) this.correctCountEl.textContent = String(this.correctCount);
                    if (this.mistakesCountEl) this.mistakesCountEl.textContent = String(this.mistakeCount);
                }

                updateButtons() {
                    const remaining = this.getRemainingLabels().length;
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealing && !this.gameCompleted;

                    if (this.revealBtn) {
                        this.revealBtn.classList.toggle('hidden', !canReveal);
                        this.revealBtn.disabled = !canReveal;
                    }

                    if (this.retakeBtn) {
                        this.retakeBtn.classList.toggle('hidden', !this.hasUsedReveal);
                    }
                }

                updatePoolCount() {
                    if (!this.poolCount) return;
                    const remaining = this.getRemainingLabels().length;
                    this.poolCount.textContent = `${remaining}/${this.getTotalCount()}`;
                }

                getManualVisibleCap() {
                    return Number.isFinite(IMAGE_DD_VISIBLE_CAP) && IMAGE_DD_VISIBLE_CAP > 0 ? IMAGE_DD_VISIBLE_CAP : 0;
                }

                getFallbackVisibleCap() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 1024;
                    if (width >= 640) return Number.MAX_SAFE_INTEGER;
                    if (width < 420) return 6;
                    return 8;
                }

                measureVisibleCap(tiles) {
                    const total = tiles.length;
                    if (total <= 1) return total;

                    const manual = this.getManualVisibleCap();
                    if (manual > 0) return Math.max(1, Math.min(total, manual));

                    return Math.max(1, Math.min(total, this.getFallbackVisibleCap()));
                }

                refreshPoolVisibility() {
                    if (!this.poolContent) return;
                    const tiles = Array.from(this.poolContent.querySelectorAll('.image-dd-tile'));
                    const cap = this.measureVisibleCap(tiles);

                    if (!tiles.length) {
                        this.poolStartIndex = 0;
                        this.updatePoolPager(0, cap, false);
                        this.refreshLayout();
                        return;
                    }

                    const shouldPage = tiles.length > cap;
                    if (!shouldPage) {
                        this.poolStartIndex = 0;
                        tiles.forEach((tile) => tile.classList.remove('hidden'));
                        this.updatePoolPager(tiles.length, cap, false);
                        this.refreshLayout();
                        return;
                    }

                    const maxStart = Math.max(0, tiles.length - cap);
                    this.poolStartIndex = Math.min(this.poolStartIndex, maxStart);

                    tiles.forEach((tile, index) => {
                        tile.classList.toggle('hidden', !(index >= this.poolStartIndex && index < this.poolStartIndex + cap));
                    });

                    this.updatePoolPager(tiles.length, cap, true);
                    this.refreshLayout();
                }

                updatePoolPager(total, cap, shouldShow) {
                    if (!this.prevBtn || !this.nextBtn) return;
                    const visible = shouldShow && total > cap;
                    this.prevBtn.classList.toggle('hidden', !visible);
                    this.nextBtn.classList.toggle('hidden', !visible);

                    if (!visible) {
                        this.prevBtn.classList.remove('image-dd-pool-nav-hint');
                        this.nextBtn.classList.remove('image-dd-pool-nav-hint');
                        return;
                    }

                    const maxStart = Math.max(0, total - cap);
                    const hasPrev = this.poolStartIndex > 0;
                    const hasNext = this.poolStartIndex < maxStart;
                    this.prevBtn.disabled = !hasPrev;
                    this.nextBtn.disabled = !hasNext;
                    this.prevBtn.classList.toggle('image-dd-pool-nav-hint', hasPrev);
                    this.nextBtn.classList.toggle('image-dd-pool-nav-hint', hasNext);
                }

                handlePoolPrev() {
                    if (this.draggedItem || this.pendingDrag?.started) return;
                    const tiles = Array.from(this.poolContent?.querySelectorAll('.image-dd-tile') || []);
                    const cap = this.measureVisibleCap(tiles);
                    this.poolStartIndex = Math.max(0, this.poolStartIndex - cap);
                    this.refreshPoolVisibility();
                }

                handlePoolNext() {
                    if (this.draggedItem || this.pendingDrag?.started) return;
                    const tiles = Array.from(this.poolContent?.querySelectorAll('.image-dd-tile') || []);
                    const cap = this.measureVisibleCap(tiles);
                    const maxStart = Math.max(0, tiles.length - cap);
                    this.poolStartIndex = Math.min(maxStart, this.poolStartIndex + cap);
                    this.refreshPoolVisibility();
                }

                refreshLayout() {
                    this.updateBottomSafeSpace();
                    window.requestAnimationFrame(() => this.updateBottomSafeSpace());
                }

                updateBottomSafeSpace() {
                    if (!this.page || !this.poolBar) return;
                    const width = window.innerWidth || document.documentElement.clientWidth || 1024;

                    if (width >= 640) {
                        this.page.style.paddingBottom = '';
                        document.documentElement.style.setProperty('--pool-safe-space', '0px');
                        return;
                    }

                    const safe = Math.ceil(this.poolBar.getBoundingClientRect().height || this.poolBar.offsetHeight || 0) + 16;
                    this.page.style.paddingBottom = `${safe}px`;
                    document.documentElement.style.setProperty('--pool-safe-space', `${safe}px`);
                }

                handleResize() {
                    window.clearTimeout(this.resizeTimer);
                    this.resizeTimer = window.setTimeout(() => {
                        if (!this.draggedItem && !this.pendingDrag) {
                            this.renderPool();
                            this.renderTargets();
                        }
                        this.refreshLayout();
                    }, 120);
                }

                toggleTileSelection(labelId) {
                    if (this.gameCompleted || this.isRevealing) return;
                    this.selectedId = Number(this.selectedId) === Number(labelId) ? null : Number(labelId);
                    this.renderPool();
                }

                handleSlotClick(targetId, targetEl) {
                    if (this.selectedId == null || this.gameCompleted || this.isRevealing) return;

                    if (Number(this.selectedId) === Number(targetId)) {
                        this.completePlacement(this.selectedId, targetEl, { revealed: false });
                        return;
                    }

                    this.mistakeCount += 1;
                    playSound(SOUND.wrong);
                    this.flashWrong(targetEl);
                    this.updateStats();
                    this.renderPool();
                }

                handlePointerDown(event, item) {
                    if (event.button !== undefined && event.button !== 0) return;
                    if (!item || this.gameCompleted || this.isRevealing) return;

                    this.pendingDrag = {
                        item,
                        pointerId: event.pointerId,
                        startX: event.clientX,
                        startY: event.clientY,
                        started: false,
                    };

                    item.setPointerCapture?.(event.pointerId);
                    document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                    document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                    document.addEventListener('pointercancel', this.handlePointerCancel, { passive: false });
                }

                renderPoolSelectionOnly() {
                    this.poolContent?.querySelectorAll('.image-dd-tile').forEach((tile) => {
                        tile.classList.toggle('is-selected', Number(tile.dataset.labelId) === Number(this.selectedId));
                    });
                }

                beginDrag(event) {
                    if (!this.pendingDrag || this.draggedItem) return;

                    const item = this.pendingDrag.item;
                    const rect = item.getBoundingClientRect();

                    this.pendingDrag.started = true;
                    this.selectedId = Number(item.dataset.labelId);
                    this.renderPoolSelectionOnly();
                    this.draggedItem = item;
                    this.originalParent = item.parentElement;
                    this.offsetX = event.clientX - rect.left;
                    this.offsetY = event.clientY - rect.top;

                    this.placeholder = document.createElement('div');
                    this.placeholder.className = 'image-dd-placeholder';
                    this.placeholder.style.width = `${rect.width}px`;
                    this.placeholder.style.height = `${rect.height}px`;
                    this.originalParent?.insertBefore(this.placeholder, item);

                    document.body.classList.add('image-dd-drag-active');
                    item.classList.add('image-dd-tile-dragging');
                    item.style.width = `${rect.width}px`;
                    item.style.height = `${rect.height}px`;
                    item.style.left = `${rect.left}px`;
                    item.style.top = `${rect.top}px`;
                    item.style.transform = 'scale(1.05) rotate(-2deg)';
                    document.body.appendChild(item);

                    this.pointerClientX = event.clientX;
                    this.pointerClientY = event.clientY;
                    this.moveDraggedItem(event.clientX, event.clientY);
                    this.startAutoScroll();
                }

                handlePointerMove(event) {
                    if (!this.pendingDrag && !this.draggedItem) return;

                    if (this.pendingDrag && !this.pendingDrag.started) {
                        const dx = Math.abs(event.clientX - this.pendingDrag.startX);
                        const dy = Math.abs(event.clientY - this.pendingDrag.startY);

                        if (dx + dy < CONFIG.dragStartDistance) return;
                        event.preventDefault();
                        this.beginDrag(event);
                    }

                    if (!this.draggedItem) return;
                    event.preventDefault();
                    this.pointerClientX = event.clientX;
                    this.pointerClientY = event.clientY;
                    this.moveDraggedItem(event.clientX, event.clientY);
                    this.checkHover(event.clientX, event.clientY);
                }

                moveDraggedItem(clientX, clientY) {
                    const left = clientX - this.offsetX;
                    const top = clientY - this.offsetY;

                    if (!this.rafId) {
                        this.rafId = window.requestAnimationFrame(() => {
                            if (!this.draggedItem) {
                                this.rafId = null;
                                return;
                            }
                            this.draggedItem.style.left = `${left}px`;
                            this.draggedItem.style.top = `${top}px`;
                            this.rafId = null;
                        });
                    }
                }

                handlePointerUp(event) {
                    if (this.pendingDrag && !this.pendingDrag.started) {
                        this.pendingDrag = null;
                        this.removeDragListeners();
                        return;
                    }

                    if (!this.draggedItem) {
                        this.pendingDrag = null;
                        this.removeDragListeners();
                        return;
                    }

                    const target = this.getTargetSlot(event.clientX, event.clientY);
                    const labelId = Number(this.draggedItem.dataset.labelId || -1);
                    const targetId = target ? Number(target.dataset.targetId || -1) : -1;

                    this.stopAutoScroll();
                    this.removeDragListeners();

                    if (target && target.dataset.solved !== '1') {
                        if (labelId === targetId) {
                            this.finishCorrectDrag(target, labelId);
                            return;
                        }

                        this.handleWrongDrag(target, { countAsMistake: true });
                        return;
                    }

                    this.handleWrongDrag(null, { countAsMistake: false });
                }

                handlePointerCancel() {
                    if (!this.pendingDrag && !this.draggedItem) return;
                    this.stopAutoScroll();
                    this.removeDragListeners();

                    if (this.draggedItem) {
                        this.returnDraggedTile({ countAsMistake: false });
                        return;
                    }

                    this.pendingDrag = null;
                    this.clearHover();
                }

                handleWindowBlur() {
                    this.handlePointerCancel();
                }

                removeDragListeners() {
                    document.removeEventListener('pointermove', this.handlePointerMove);
                    document.removeEventListener('pointerup', this.handlePointerUp);
                    document.removeEventListener('pointercancel', this.handlePointerCancel);

                    if (this.rafId) {
                        window.cancelAnimationFrame(this.rafId);
                        this.rafId = null;
                    }
                }

                cleanupDrag() {
                    this.stopAutoScroll();
                    this.removeDragListeners();
                    document.body.classList.remove('image-dd-drag-active');

                    if (this.draggedItem && this.draggedItem.parentNode === document.body) {
                        this.draggedItem.remove();
                    }

                    this.placeholder?.remove();
                    this.placeholder = null;
                    this.draggedItem = null;
                    this.pendingDrag = null;
                    this.originalParent = null;
                    this.clearHover();
                }

                startAutoScroll() {
                    this.stopAutoScroll();
                    this.autoScrollTimer = window.setInterval(() => this.handleAutoScroll(), 16);
                }

                stopAutoScroll() {
                    if (!this.autoScrollTimer) return;
                    window.clearInterval(this.autoScrollTimer);
                    this.autoScrollTimer = null;
                }

                getScrollContainer() {
                    const candidates = [
                        document.querySelector('.slide-layout'),
                        document.querySelector('[data-slide-scroll]'),
                        document.scrollingElement || document.documentElement,
                    ].filter(Boolean);

                    for (const el of candidates) {
                        if (el === document.documentElement || el === document.body || el === document.scrollingElement) {
                            continue;
                        }

                        const style = window.getComputedStyle(el);
                        const canScroll = /(auto|scroll)/.test(style.overflowY) && el.scrollHeight > el.clientHeight + 2;
                        if (canScroll) return el;
                    }

                    return document.scrollingElement || document.documentElement;
                }

                getScrollViewport(scroller) {
                    if (scroller === document.scrollingElement || scroller === document.documentElement || scroller === document.body) {
                        return { top: 0, bottom: window.innerHeight || document.documentElement.clientHeight || 0 };
                    }

                    const rect = scroller.getBoundingClientRect();
                    return { top: rect.top, bottom: rect.bottom };
                }

                handleAutoScroll() {
                    if (!this.draggedItem) return;

                    const scroller = this.getScrollContainer();
                    const viewport = this.getScrollViewport(scroller);
                    const y = this.pointerClientY;
                    let direction = 0;

                    if (y < viewport.top + CONFIG.autoScrollThreshold) direction = -1;
                    else if (y > viewport.bottom - CONFIG.autoScrollThreshold) direction = 1;

                    if (!direction) return;

                    const distanceToEdge = direction < 0
                        ? Math.max(0, y - viewport.top)
                        : Math.max(0, viewport.bottom - y);
                    const strength = 1 + ((CONFIG.autoScrollThreshold - Math.min(CONFIG.autoScrollThreshold, distanceToEdge)) / CONFIG.autoScrollThreshold);
                    const amount = direction * CONFIG.autoScrollSpeed * strength;

                    if (scroller === document.scrollingElement || scroller === document.documentElement || scroller === document.body) {
                        window.scrollBy(0, amount);
                    } else {
                        scroller.scrollTop += amount;
                    }

                    this.checkHover(this.pointerClientX, this.pointerClientY);
                }

                getDropThreshold() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 1024;
                    if (width < 640) return CONFIG.dropThreshold.mobile;
                    if (width < 1024) return CONFIG.dropThreshold.tablet;
                    return CONFIG.dropThreshold.desktop;
                }

                getSlots() {
                    return Array.from(this.dropLayer?.querySelectorAll('.image-dd-slot') || []);
                }

                getTargetSlot(x, y) {
                    const item = this.draggedItem;
                    if (item) item.hidden = true;
                    const below = document.elementFromPoint(x, y);
                    if (item) item.hidden = false;

                    const exact = below?.closest?.('.image-dd-slot');
                    if (exact && exact.dataset.solved !== '1') return exact;

                    const threshold = this.getDropThreshold();
                    let nearest = null;
                    let nearestDistance = Number.POSITIVE_INFINITY;

                    this.getSlots().forEach((slot) => {
                        if (slot.dataset.solved === '1') return;
                        const rect = slot.getBoundingClientRect();
                        let dx = 0;
                        let dy = 0;

                        if (x < rect.left) dx = rect.left - x;
                        else if (x > rect.right) dx = x - rect.right;

                        if (y < rect.top) dy = rect.top - y;
                        else if (y > rect.bottom) dy = y - rect.bottom;

                        const distance = Math.sqrt((dx * dx) + (dy * dy));
                        if (distance <= threshold && distance < nearestDistance) {
                            nearestDistance = distance;
                            nearest = slot;
                        }
                    });

                    return nearest;
                }

                checkHover(x, y) {
                    const target = this.getTargetSlot(x, y);
                    this.getSlots().forEach((slot) => slot.classList.toggle('is-hover', slot === target));
                    this.hoverTargetId = target ? Number(target.dataset.targetId) : null;
                }

                clearHover() {
                    this.hoverTargetId = null;
                    this.getSlots().forEach((slot) => slot.classList.remove('is-hover', 'is-wrong'));
                }

                finishCorrectDrag(target, labelId) {
                    const item = this.draggedItem;
                    if (item) {
                        item.classList.remove('image-dd-tile-dragging', 'image-dd-tile-shake');
                        item.remove();
                    }

                    this.placeholder?.remove();
                    this.placeholder = null;
                    this.draggedItem = null;
                    this.pendingDrag = null;
                    this.originalParent = null;
                    document.body.classList.remove('image-dd-drag-active');
                    this.clearHover();
                    this.completePlacement(labelId, target, { revealed: false });
                }

                handleWrongDrag(target, options = {}) {
                    const countAsMistake = options.countAsMistake === true;

                    if (countAsMistake) {
                        this.mistakeCount += 1;
                        playSound(SOUND.wrong);
                        this.updateStats();
                    }

                    if (target && countAsMistake) {
                        this.flashWrong(target);
                    }

                    this.returnDraggedTile({ countAsMistake });
                }

                returnDraggedTile() {
                    const item = this.draggedItem;
                    const placeholder = this.placeholder;
                    const originalParent = this.originalParent;

                    if (!item) {
                        this.cleanupDrag();
                        return;
                    }

                    item.classList.add('image-dd-tile-returning');
                    item.classList.remove('image-dd-tile-shake');
                    item.style.transform = 'scale(1)';

                    if (placeholder) {
                        const rect = placeholder.getBoundingClientRect();
                        item.style.left = `${rect.left}px`;
                        item.style.top = `${rect.top}px`;
                    } else {
                        item.classList.add('image-dd-tile-shake');
                    }

                    window.setTimeout(() => {
                        item.classList.remove('image-dd-tile-dragging', 'image-dd-tile-returning', 'image-dd-tile-shake');
                        item.style.position = '';
                        item.style.left = '';
                        item.style.top = '';
                        item.style.width = '';
                        item.style.height = '';
                        item.style.zIndex = '';
                        item.style.transform = '';

                        if (originalParent && placeholder?.parentNode) {
                            originalParent.insertBefore(item, placeholder);
                            placeholder.remove();
                        } else if (originalParent) {
                            originalParent.appendChild(item);
                        } else {
                            this.poolContent?.appendChild(item);
                        }

                        this.placeholder = null;
                        this.draggedItem = null;
                        this.pendingDrag = null;
                        this.originalParent = null;
                        document.body.classList.remove('image-dd-drag-active');
                        this.clearHover();
                        this.renderPoolSelectionOnly();
                        this.refreshPoolVisibility();
                        this.updateAll();
                    }, CONFIG.returnDuration);
                }

                flashWrong(target) {
                    if (!target) return;
                    target.classList.remove('is-wrong');
                    void target.offsetWidth;
                    target.classList.add('is-wrong');
                    window.setTimeout(() => target.classList.remove('is-wrong'), CONFIG.wrongDuration);
                }

                completePlacement(labelId, target, options = {}) {
                    const label = this.getLabel(labelId);
                    if (!label || label.placed) return;

                    label.placed = true;
                    label.revealed = options.revealed === true;
                    if (!label.revealed) {
                        this.correctCount += 1;
                        playSound(SOUND.correct);
                    }

                    this.selectedId = null;
                    this.hoverTargetId = null;

                    this.renderTargets();
                    this.renderPool();
                    this.updateAll();

                    if (target) this.flashSolvedTarget(label.id);
                    this.checkComplete(!label.revealed);
                }

                flashSolvedTarget(labelId) {
                    const slot = this.dropLayer?.querySelector(`.image-dd-slot[data-target-id="${labelId}"]`);
                    if (!slot) return;
                    slot.classList.remove('is-hover');
                }

                handleReveal() {
                    if (this.draggedItem || this.pendingDrag || this.isRevealing || this.gameCompleted || this.hasUsedReveal) return;

                    const remaining = this.labels.filter((label) => !label.placed);
                    if (!remaining.length) return;

                    this.isRevealing = true;
                    this.hasUsedReveal = true;

                    remaining.forEach((label) => {
                        label.placed = true;
                        label.revealed = true;
                        this.mistakeCount += 1;
                    });

                    this.selectedId = null;
                    this.hoverTargetId = null;
                    this.isRevealing = false;

                    this.renderTargets();
                    this.renderPool();
                    this.updateAll();
                    this.checkComplete(false);
                }

                handleRetake() {
                    this.reset();
                }

                checkComplete(showModal = true) {
                    if (!this.isComplete() || this.gameCompleted) return;

                    this.gameCompleted = true;
                    window.setTimeout(() => {
                        this.stopTimer();
                        this.renderPool();
                        this.updateAll();

                        if (!showModal) return;

                        if (this.finalCorrect) this.finalCorrect.textContent = `${this.correctCount}/${this.getTotalCount()}`;
                        if (this.finalTime) this.finalTime.textContent = formatTime(Math.floor((Date.now() - this.startTime) / 1000));
                        if (this.finalMistakes) this.finalMistakes.textContent = String(this.mistakeCount);
                        this.showWin();
                    }, CONFIG.completeDelay);
                }

                showWin() {
                    if (this.modalShown) return;
                    this.modalShown = true;
                    playSound(SOUND.success);
                    this.winModal?.classList.remove('hidden');
                }

                hideWin() {
                    this.winModal?.classList.add('hidden');
                }
            }

            const startGame = () => {
                const game = new ImageDragDropGame();
                window.imageDragDropGame = game;
                window.resetSlide = () => game.reset();
                window.stopSlideAudio = () => {
                    Object.values(SOUND).forEach((audio) => {
                        audio.pause();
                        audio.currentTime = 0;
                    });
                };
                game.init();
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', startGame);
            } else {
                startGame();
            }
        })();
    </script>
@endsection
