@extends('slider.simple-layout')

@section('style')
    <style>
        /* 2. Theme tokens */
        /* 3. Base component styles */
        #gameRoot {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            -webkit-user-select: none;
            user-select: none;
        }

        .game-page {
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                radial-gradient(980px 560px at 8% 10%, #673FE724 0%, #673FE700 55%),
                radial-gradient(900px 560px at 92% 14%, #3B82F61F 0%, #3B82F600 56%),
                radial-gradient(880px 640px at 50% 100%, #10B98114 0%, #10B98100 60%);
        }

        .dark .game-page {
            background:
                radial-gradient(980px 560px at 8% 10%, #60A5FA2E 0%, #60A5FA00 55%),
                radial-gradient(900px 560px at 92% 14%, #C084FC29 0%, #C084FC00 56%),
                radial-gradient(880px 640px at 50% 100%, #6366F11F 0%, #6366F100 60%),
                linear-gradient(180deg, #020617 0%, #0F172A 100%);
        }

        .game-fallback {
            background: linear-gradient(135deg, #3B82F61A, #6366F114, #9333EA1A);
        }

        .word-bank-overlay {
            background:
                radial-gradient(120% 120% at 0% 0%, #6366F129 0%, #6366F100 55%),
                radial-gradient(120% 120% at 100% 0%, #3B82F61F 0%, #3B82F600 55%);
        }

        .game-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border-radius: 0.5rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 900;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease, opacity 0.2s ease;
        }

        .game-icon-btn {
            display: inline-flex;
            height: 2rem;
            width: 2rem;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            transition: transform 0.2s ease, background 0.2s ease, opacity 0.2s ease;
        }

        .tile-placeholder {
            border: 1px dashed #CBD5E1CC;
            background: #E2E8F059;
            border-radius: 0.75rem;
        }

        .dark .tile-placeholder {
            border-color: #334155B3;
            background: #1E293B4D;
        }

        .image-drop-slot {
            position: absolute;
            transform: translate(-50%, -50%);
            width: 76px;
            min-height: 24px;
            padding: 2px 6px;
            border-radius: 999px;
            border: 3px solid #FFFFFFF2;
            background: #FFFFFF00;
            box-shadow: 0 0 0 2px #0F172A59;
            transition: transform 0.18s ease, border-color 0.18s ease, box-shadow 0.18s ease, background 0.18s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .image-drop-slot-inner {
            position: relative;
            z-index: 1;
            display: flex;
            min-height: 18px;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 10px;
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: 0.01em;
            color: #4C1D9538;
        }

        .word-tile {
            border: 1px solid #FFFFFF33;
            color: #FFFFFF;
            box-shadow: 0 10px 20px #02061729;
            touch-action: none;
        }

        .word-tile--1 { background: linear-gradient(135deg, #3B82F6, #2563EB); }
        .word-tile--2 { background: linear-gradient(135deg, #F43F5E, #9333EA); }
        .word-tile--3 { background: linear-gradient(135deg, #10B981, #06B6D4); }
        .word-tile--4 { background: linear-gradient(135deg, #F59E0B, #EA580C); }
        .word-tile--5 { background: linear-gradient(135deg, #6366F1, #9333EA); }
        .word-tile--6 { background: linear-gradient(135deg, #06B6D4, #0EA5E9); }

        #wordList {
            align-content: start;
        }

        /* 4. State styles */
        .game-btn:hover,
        .game-icon-btn:hover {
            transform: scale(1.05);
        }

        .game-btn:active,
        .game-icon-btn:active {
            transform: scale(0.98);
        }

        .game-icon-btn:disabled {
            cursor: not-allowed;
            opacity: 0.4;
        }

        .image-drop-slot-empty .image-drop-slot-inner {
            color: #00000000;
        }

        .image-drop-slot.is-hover {
            transform: translate(-50%, -50%) scale(1.06);
            border-color: #FFFFFF;
            box-shadow: 0 0 0 3px #0F172A73;
        }

        .image-drop-slot.is-solved {
            width: auto;
            max-width: 132px;
            min-height: 28px;
            border-color: #4F46E5E6;
            background: linear-gradient(135deg, #E0E7FFF2, #F3E8FFF2);
            box-shadow: 0 8px 20px #6366F124, inset 0 0 0 1px #FFFFFF38;
        }
        .image-drop-slot.is-solved .image-drop-slot-inner {
            min-height: 20px;
            padding: 0 2px;
            color: #4C1D95;
        }

        .image-drop-slot.is-revealed {
            border-color: #F43F5E73;
            background: linear-gradient(135deg, #FBCFE8F5, #FECDD3F5);
            box-shadow: 0 8px 20px #F43F5E29, inset 0 0 0 1px #FFFFFF38;
        }

        .image-drop-slot.is-revealed .image-drop-slot-inner {
            color: #881337;
        }

        .dark .image-drop-slot.is-revealed {
            border-color: #F472B657;
            background: linear-gradient(135deg, #881337AD, #9F12399E);
        }

        .image-drop-slot.is-wrong {
            animation: gameShake 0.28s ease-in-out;
        }

        .tile-dragging {
            position: fixed !important;
            z-index: 9999 !important;
            pointer-events: none !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .tile-returning {
            z-index: 9000;
            transition: top 0.42s cubic-bezier(0.23, 1, 0.32, 1), left 0.42s cubic-bezier(0.23, 1, 0.32, 1), transform 0.42s ease;
        }

        .tile-shake {
            animation: gameShake 0.35s ease-in-out;
        }

        .game-shake-card {
            animation: gameShake 0.32s ease-in-out;
        }

        .word-tile.is-active {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 16px 34px #4F46E538, 0 0 0 3px #FFFFFF38;
        }

        .game-done-board {
            animation: gameDonePulse 0.35s ease-out;
        }

        #wordBankBar.is-fixed {
            position: fixed;
            top: var(--sticky-top, 16px);
            right: auto;
            bottom: auto;
            z-index: 1400;
        }

        #wordBankBar.is-bottom {
            position: absolute;
            top: auto;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
        }

        /* 5. Responsive styles */
        @media (max-width: 1024px) {
            .image-drop-slot {
                width: 68px;
                min-height: 22px;
                padding: 2px 5px;
            }
        }

        @media (max-width: 1023.98px) {
            #wordBankPanel {
                max-height: min(35vh, 310px);
            }

            #wordList {
                max-height: calc(min(35vh, 310px) - 56px);
                overflow-x: hidden;
                overflow-y: auto;
            }
        }

        @media (min-width: 1024px) {
            #wordBankRail {
                position: relative;
                align-self: stretch;
            }

            #wordBankBar {
                inset-inline: auto;
                bottom: auto;
            }

            .word-bank-panel {
                box-shadow: 0 18px 45px #0206171A;
            }
        }

        @media (max-width: 640px) {
            .image-drop-slot {
                width: 60px;
                min-height: 20px;
                padding: 2px 4px;
            }

            .image-drop-slot-inner {
                min-height: 16px;
                font-size: 9px;
            }

            .image-drop-slot.is-solved {
                max-width: 100px;
                min-height: 24px;
            }

            .image-drop-slot.is-solved .image-drop-slot-inner {
                font-size: 9px;
            }
        }

        /* 6. Motion/accessibility */
        @keyframes gameShake {
            0%,
            100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @keyframes gameDonePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.014); }
            100% { transform: scale(1); }
        }

        @keyframes gameBurstUp {
            0% {
                transform: translateY(0) scale(0.8) rotate(0deg);
                opacity: 0;
            }
            15% { opacity: 1; }
            100% {
                transform: translateY(-34px) scale(1.12) rotate(10deg);
                opacity: 0;
            }
        }

        .win-burst {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 20;
            pointer-events: none;
            font-size: 1rem;
            animation: gameBurstUp 0.7s ease forwards;
            transform: translate(-50%, -50%);
        }

        @media (prefers-reduced-motion: reduce) {
            .tile-returning,
            .tile-shake,
            .game-done-board,
            .image-drop-slot.is-wrong,
            .win-burst {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="game-page flex min-h-[100dvh] w-full flex-col" id="gameRoot">
        {{-- 7. Header --}}
        @include('slider.components.game-title')
 
        {{-- 8. Status --}}
        @include('slider.components.game-status')

        <div id="gameLayout" class="mx-auto flex min-h-0 w-full flex-1 flex-col px-4 pb-[calc(min(35vh,310px)+16px)] pt-2 sm:px-6 sm:pb-[calc(min(35vh,310px)+20px)] sm:pt-3 lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pb-0 lg:pt-2">
            {{-- 9. Game area --}}
            <section id="gameArea" class="flex w-full flex-col lg:w-[70%] lg:flex-none">
                <div class="grid auto-rows-max place-items-center gap-3 text-center sm:gap-4">
                    <div class="w-full">
                        <div id="imageCard" class="relative isolate mb-4 w-full overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 text-left shadow-[0_18px_55px_#02061714] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible">
                            <div class="relative z-[1] aspect-[10/6.8] lg:overflow-visible">
                                <img id="gameImage" class="absolute inset-0 h-full w-full object-contain" alt="Labeling game image">

                                <div id="imageFallback" class="game-fallback absolute inset-0 grid place-items-center">
                                    <div class="rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-4 text-center shadow-sm dark:border-slate-700/70 dark:bg-slate-900/65">
                                        <p class="text-xs font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-300 sm:text-sm">
                                            Add your image
                                        </p>
                                        <p class="mt-1 text-sm font-semibold text-slate-700 dark:text-slate-200 sm:text-base">
                                            Set <code>$content['image']</code>.
                                        </p>
                                    </div>
                                </div>

                                <div id="dropLayer" class="absolute inset-0"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 10. Word bank --}}
            <aside id="wordBankRail" class="w-full lg:order-first lg:self-stretch">
                <div id="wordBankBar" class="fixed inset-x-0 bottom-0 z-[1500] lg:relative lg:inset-auto">
                    <div class="mx-auto w-full px-3 pb-0 sm:px-6 lg:px-0">
                        <div id="wordBankPanel" class="word-bank-panel relative overflow-hidden rounded-t-3xl border border-slate-200/70 bg-white/90 shadow-[0_-18px_55px_#02061729] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/75 sm:rounded-3xl lg:rounded-3xl">
                            <div class="word-bank-overlay pointer-events-none absolute inset-0 opacity-80"></div>

                            <div class="relative px-3 pb-4 pt-3 sm:px-4 sm:py-4 lg:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <button id="prevWordsBtn" type="button" class="game-icon-btn bg-white/90 text-slate-700 shadow-[0_10px_24px_#0F172A1F] hover:bg-slate-50 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_#02061759] dark:hover:bg-slate-800 lg:hidden" aria-label="Previous words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div id="wordCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] font-black text-slate-700 shadow-[0_4px_12px_#0206170D] dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:text-xs">
                                            0/0
                                        </div>

                                        <button id="nextWordsBtn" type="button" class="game-icon-btn bg-white/90 text-slate-700 shadow-[0_10px_24px_#0F172A1F] hover:bg-slate-50 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_#02061759] dark:hover:bg-slate-800 lg:hidden" aria-label="Next words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button type="button" id="revealButton" class="game-btn border border-orange-300 bg-orange-50 text-orange-700 shadow-[0_8px_22px_#EA580C1A] hover:bg-orange-100 dark:border-orange-700/50 dark:bg-orange-900/35 dark:text-orange-200 dark:hover:bg-orange-900/50">
                                            Reveal answers
                                        </button>

                                        <button type="button" id="retakeButton" class="game-btn hidden border border-slate-200 bg-white text-slate-900 shadow-[0_8px_22px_#0206170D] hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700">
                                            Retake test
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                <div class="relative mt-3">
                                    <div id="wordList" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 lg:w-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        {{-- 11. Win modal --}}
        @include('slider.components.game-win-modal')

        <template id="wordTemplate">
            <div class="word-tile inline-flex min-h-[42px] w-auto max-w-full shrink-0 cursor-grab select-none touch-none items-center justify-center rounded-xl px-2 py-2 text-base font-black leading-snug shadow-sm transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0 sm:px-2.5 sm:py-2.5"></div>
        </template>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            // 12. Constants
            const IMAGE_SRC = @json($content['image'] ?? '');
            const RAW_LABELS = @json($content['labels'] ?? []);
            const CONFIG = {
                layout: {
                    desktopGameWidth: 70,
                    desktopWordBankWidth: 30,
                    mobileBankGap: 20,
                    stickyTop: 16,
                },
                breakpoints: {
                    sm: 640,
                    lg: 1024,
                },
                drag: {
                    thresholdMobile: 28,
                    thresholdTablet: 34,
                    thresholdDesktop: 42,
                },
                timing: {
                    resizeDebounce: 120,
                    wrongShake: 320,
                    wrongTapShake: 280,
                    returnTile: 440,
                    completeDelay: 220,
                    burstLifetime: 800,
                    burstStagger: 40,
                },
                audio: {
                    correct: '/slider/sounds/correct.wav',
                    wrong: '/slider/sounds/wrong.wav',
                    success: '/slider/sounds/success.wav',
                },
            };
            const { layout, breakpoints, drag, timing } = CONFIG;
            const TILE_SKINS = ['word-tile--1', 'word-tile--2', 'word-tile--3', 'word-tile--4', 'word-tile--5', 'word-tile--6'];
            const BURST_CHARS = ['*', '+', 'o'];
            const SOUND = {
                correct: new Audio(CONFIG.audio.correct),
                wrong: new Audio(CONFIG.audio.wrong),
                success: new Audio(CONFIG.audio.success),
            };

            Object.values(SOUND).forEach((audio) => {
                audio.volume = 1;
            });

            // 13. Helpers
            const $ = (id) => document.getElementById(id);
            const clamp = (value, min, max) => Math.max(min, Math.min(max, Number(value)));

            const shuffle = (items) => {
                const copy = [...items];

                for (let index = copy.length - 1; index > 0; index -= 1) {
                    const swapIndex = Math.floor(Math.random() * (index + 1));
                    [copy[index], copy[swapIndex]] = [copy[swapIndex], copy[index]];
                }

                return copy;
            };

            const formatTime = (seconds) => {
                const minutes = String(Math.floor(seconds / 60)).padStart(2, '0');
                const remainingSeconds = String(seconds % 60).padStart(2, '0');
                return `${minutes}:${remainingSeconds}`;
            };

            const playAudio = (audio) => {
                if (!audio) return;
                audio.pause();
                audio.currentTime = 0;
                audio.play().catch(() => {});
            };
            const isEmbedded = () => {
                try {
                    return window.top !== window.self;
                } catch (error) {
                    return true;
                }
            };

            const goNextSlide = () => {
                if (!isEmbedded()) return;

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (error) {}

                try {
                    window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                } catch (error) {}
            };

            const normalizeLabels = (items) => {
                if (!Array.isArray(items)) return [];

                return items
                    .map((item, index) => ({
                        id: index,
                        text: String(item?.text ?? '').trim(),
                        x: clamp(item?.x ?? 50, 0, 100),
                        y: clamp(item?.y ?? 50, 0, 100),
                    }))
                    .filter((item) => item.text.length > 0);
            };

            const LABELS = normalizeLabels(RAW_LABELS);

            // 14. Game class
            class ImageGame {
                constructor() {
                    this.cacheDom();
                    this.bindMethods();
                    this.bindEvents();
                    this.resetState();
                }

                // setup
                cacheDom() {
                    this.gameLayout = $('gameLayout');
                    this.gameArea = $('gameArea');
                    this.wordBankRail = $('wordBankRail');
                    this.wordBankBar = $('wordBankBar');
                    this.dropLayer = $('dropLayer');
                    this.gameImage = $('gameImage');
                    this.imageFallback = $('imageFallback');
                    this.imageCard = $('imageCard');
                    this.wordList = $('wordList');
                    this.wordCount = $('wordCount');
                    this.prevWordsBtn = $('prevWordsBtn');
                    this.nextWordsBtn = $('nextWordsBtn');
                    this.revealButton = $('revealButton');
                    this.retakeButton = $('retakeButton');
                    this.restartBtnModal = $('restartBtnModal');
                    this.continueBtnModal = $('continueBtnModal');
                    this.wordTemplate = $('wordTemplate');
                    this.winModal = $('winModal');
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
                    this.handleScroll = this.handleScroll.bind(this);
                    this.handlePointerMove = this.handlePointerMove.bind(this);
                    this.handlePointerUp = this.handlePointerUp.bind(this);
                    this.showPrevWords = this.showPrevWords.bind(this);
                    this.showNextWords = this.showNextWords.bind(this);
                    this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                    this.handleRetakeTest = this.handleRetakeTest.bind(this);
                }

                bindEvents() {
                    this.prevWordsBtn?.addEventListener('click', this.showPrevWords);
                    this.nextWordsBtn?.addEventListener('click', this.showNextWords);
                    this.revealButton?.addEventListener('click', this.handleRevealAnswers);
                    this.retakeButton?.addEventListener('click', this.handleRetakeTest);
                    this.restartBtnModal?.addEventListener('click', () => this.reset());
                    this.continueBtnModal?.addEventListener('click', goNextSlide);
                    window.addEventListener('resize', this.handleResize, { passive: true });
                    window.addEventListener('scroll', this.handleScroll, { passive: true });
                }

                init() {
                    this.stopTimer();
                    this.cleanupDrag();
                    this.hideWin();
                    this.resetState();

                    this.labels = LABELS.map((item) => ({
                        id: item.id,
                        text: item.text,
                        x: item.x,
                        y: item.y,
                        placed: false,
                        revealed: false,
                    }));

                    this.wordDeck = this.buildWordDeck();
                    this.setupImage();
                    this.startTimer();
                    this.render();
                    this.refreshUI();

                    window.clearTimeout(this.resizeTimer);
                    this.resizeTimer = window.setTimeout(() => this.refreshUI(), timing.resizeDebounce);
                }

                reset() {
                    this.init();
                }

                resetState() {
                    this.labels = [];
                    this.wordDeck = { all: [], active: [], waiting: [], history: [] };
                    this.activeLabelId = null;
                    this.hoverTargetId = null;
                    this.draggedItem = null;
                    this.placeholder = null;
                    this.originalParent = null;
                    this.offsetX = 0;
                    this.offsetY = 0;
                    this.rafId = null;
                    this.pointerX = 0;
                    this.pointerY = 0;
                    this.correctCount = 0;
                    this.mistakeCount = 0;
                    this.startTime = Date.now();
                    this.timerId = null;
                    this.resizeTimer = null;
                    this.gameCompleted = false;
                    this.hasUsedReveal = false;
                    this.isRevealingAnswers = false;
                    this.modalShown = false;
                }

                setupImage() {
                    if (!this.gameImage || !this.imageFallback) return;

                    if (IMAGE_SRC) {
                        this.gameImage.src = IMAGE_SRC;
                        this.gameImage.classList.remove('hidden');
                        this.imageFallback.classList.add('hidden');
                        return;
                    }

                    this.gameImage.removeAttribute('src');
                    this.gameImage.classList.add('hidden');
                    this.imageFallback.classList.remove('hidden');
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

                buildWordDeck() {
                    const all = shuffle(this.labels.map(({ id, text }) => ({ id, text })));
                    return { all, active: [], waiting: [...all], history: [] };
                }

                // state
                getLabel(id) {
                    return this.labels.find((item) => Number(item.id) === Number(id)) || null;
                }

                solvedCount() {
                    return this.labels.filter((item) => item.placed).length;
                }

                allSolved() {
                    return this.labels.length > 0 && this.solvedCount() === this.labels.length;
                }

                getVisibleWordLimit() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 0;
                    if (width >= breakpoints.lg) return Number.MAX_SAFE_INTEGER;
                    if (width < breakpoints.sm) return 8;
                    return 9;
                }

                getDropThreshold() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 0;
                    if (width >= breakpoints.lg) return drag.thresholdDesktop;
                    if (width >= breakpoints.sm) return drag.thresholdTablet;
                    return drag.thresholdMobile;
                }

                getDropSlots() {
                    return Array.from(document.querySelectorAll('.image-drop-slot'));
                }

                clearHoverStates() {
                    this.getDropSlots().forEach((slot) => slot.classList.remove('is-hover'));
                }

                ensureActiveWordCount() {
                    const desired = this.getVisibleWordLimit();

                    while (this.wordDeck.active.length < desired && this.wordDeck.waiting.length > 0) {
                        this.wordDeck.active.push(this.wordDeck.waiting.shift());
                    }

                    while (this.wordDeck.active.length > desired) {
                        this.wordDeck.waiting.unshift(this.wordDeck.active.pop());
                    }
                }

                removeActiveWordById(id) {
                    const targetId = Number(id);
                    this.wordDeck.active = this.wordDeck.active.filter((item) => Number(item.id) !== targetId);
                    this.wordDeck.waiting = this.wordDeck.waiting.filter((item) => Number(item.id) !== targetId);
                    this.wordDeck.all = this.wordDeck.all.filter((item) => Number(item.id) !== targetId);
                    this.wordDeck.history = this.wordDeck.history
                        .map((page) => page.filter((item) => Number(item.id) !== targetId))
                        .filter((page) => page.length > 0);
                }

                // rendering
                render() {
                    this.ensureActiveWordCount();
                    this.renderTargets();
                    this.renderWords();
                }

                renderTargets() {
                    if (!this.dropLayer) return;

                    this.dropLayer.innerHTML = '';

                    this.labels.forEach((item) => {
                        const slot = document.createElement('button');
                        const slotText = document.createElement('span');

                        slot.type = 'button';
                        slot.className = 'image-drop-slot';
                        slot.dataset.targetId = String(item.id);
                        slot.dataset.solved = item.placed ? '1' : '0';
                        slot.style.left = `${item.x}%`;
                        slot.style.top = `${item.y}%`;
                        slot.classList.add(item.placed ? 'is-solved' : 'image-drop-slot-empty');

                        if (item.revealed) slot.classList.add('is-revealed');
                        if (Number(this.hoverTargetId) === Number(item.id) && !item.placed) slot.classList.add('is-hover');

                        slotText.className = 'image-drop-slot-inner';
                        slotText.textContent = item.placed ? item.text : '';
                        slot.appendChild(slotText);
                        slot.addEventListener('click', () => this.handleTargetClick(item.id, slot));
                        this.dropLayer.appendChild(slot);
                    });

                    this.imageCard?.classList.toggle('game-done-board', this.allSolved());
                }

                renderWords() {
                    if (!this.wordList || !this.wordTemplate) return;

                    this.wordList.innerHTML = '';
                    if (!this.wordDeck.active.length && this.allSolved()) return;

                    this.wordDeck.active.forEach((item, index) => {
                        this.wordList.appendChild(this.createWordTile(item, index));
                    });
                }

                createWordTile(item, index) {
                    const node = this.wordTemplate.content.firstElementChild.cloneNode(true);
                    node.textContent = item.text;
                    node.dataset.labelId = item.id;
                    node.classList.add(TILE_SKINS[index % TILE_SKINS.length]);

                    if (Number(this.activeLabelId) === Number(item.id)) {
                        node.classList.add('is-active');
                    }

                    node.addEventListener('click', () => {
                        if (this.draggedItem) return;
                        this.handleTileTap(item.id);
                    });

                    node.addEventListener('pointerdown', (event) => this.handlePointerDown(event, node));
                    return node;
                }

                updateTimer() {
                    if (!this.gameTimer) return;
                    const elapsedSeconds = Math.floor((Date.now() - this.startTime) / 1000);
                    this.gameTimer.textContent = formatTime(elapsedSeconds);
                }

                updateStats() {
                    const total = this.labels.length;
                    const remaining = total - this.solvedCount();
                    if (this.tilesCount) this.tilesCount.textContent = `${this.correctCount}/${total}`;
                    if (this.correctCountEl) this.correctCountEl.textContent = String(this.correctCount);
                    if (this.mistakesCountEl) this.mistakesCountEl.textContent = String(this.mistakeCount);
                    if (this.wordCount) this.wordCount.textContent = `${remaining}/${total}`;
                }

                updateButtons() {
                    const remaining = this.labels.length - this.solvedCount();
                    const canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                    const canRetake = this.hasUsedReveal;

                    if (this.revealButton) {
                        this.revealButton.classList.toggle('hidden', !canReveal);
                        this.revealButton.disabled = !canReveal;
                    }

                    if (this.retakeButton) {
                        this.retakeButton.classList.toggle('hidden', !canRetake);
                    }
                }

                updateWordPager() {
                    if (this.prevWordsBtn) this.prevWordsBtn.disabled = this.wordDeck.history.length === 0;
                    if (this.nextWordsBtn) this.nextWordsBtn.disabled = this.wordDeck.waiting.length === 0;
                }

                refreshUI() {
                    this.updateStats();
                    this.updateButtons();
                    this.updateWordPager();
                    this.updateDesktopColumnWidths();
                    this.updateMobileBottomSpacing();
                    this.updateDesktopStickyPosition();
                }

                // layout
                resetDesktopStickyState() {
                    if (!this.wordBankBar) return;

                    this.wordBankBar.classList.remove('is-fixed', 'is-bottom');
                    this.wordBankBar.style.top = '';
                    this.wordBankBar.style.left = '';
                    this.wordBankBar.style.right = '';
                    this.wordBankBar.style.width = '';
                    this.wordBankBar.style.maxWidth = '';
                    this.wordBankBar.style.setProperty('--sticky-top', '');

                    if (this.wordBankRail) {
                        this.wordBankRail.style.minHeight = '';
                    }
                }

                updateDesktopColumnWidths() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 0;
                    if (!this.gameArea || !this.wordBankRail) return;

                    if (width < breakpoints.lg) {
                        this.gameArea.style.width = '';
                        this.gameArea.style.maxWidth = '';
                        this.gameArea.style.flexBasis = '';
                        this.wordBankRail.style.width = '';
                        this.wordBankRail.style.maxWidth = '';
                        this.wordBankRail.style.flexBasis = '';
                        this.resetDesktopStickyState();
                        return;
                    }

                    this.gameArea.style.width = `${layout.desktopGameWidth}%`;
                    this.gameArea.style.maxWidth = `${layout.desktopGameWidth}%`;
                    this.gameArea.style.flexBasis = `${layout.desktopGameWidth}%`;
                    this.wordBankRail.style.width = `${layout.desktopWordBankWidth}%`;
                    this.wordBankRail.style.maxWidth = `${layout.desktopWordBankWidth}%`;
                    this.wordBankRail.style.flexBasis = `${layout.desktopWordBankWidth}%`;
                }

                updateDesktopStickyPosition() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 0;
                    if (!this.wordBankBar || !this.wordBankRail) return;

                    if (width < breakpoints.lg) {
                        this.resetDesktopStickyState();
                        return;
                    }

                    const stickyTop = layout.stickyTop;
                    const barHeight = Math.ceil(this.wordBankBar.offsetHeight || 0);
                    const railRect = this.wordBankRail.getBoundingClientRect();

                    this.wordBankRail.style.minHeight = `${barHeight}px`;
                    this.wordBankBar.style.setProperty('--sticky-top', `${stickyTop}px`);

                    if (railRect.top > stickyTop) {
                        this.resetDesktopStickyState();
                        this.wordBankRail.style.minHeight = `${barHeight}px`;
                        return;
                    }

                    if (railRect.bottom <= stickyTop + barHeight) {
                        this.wordBankBar.classList.remove('is-fixed');
                        this.wordBankBar.classList.add('is-bottom');
                        this.wordBankBar.style.top = '';
                        this.wordBankBar.style.left = '0';
                        this.wordBankBar.style.right = '0';
                        this.wordBankBar.style.width = '100%';
                        this.wordBankBar.style.maxWidth = '100%';
                        return;
                    }

                    this.wordBankBar.classList.remove('is-bottom');
                    this.wordBankBar.classList.add('is-fixed');
                    this.wordBankBar.style.top = `${stickyTop}px`;
                    this.wordBankBar.style.left = `${Math.round(railRect.left)}px`;
                    this.wordBankBar.style.right = 'auto';
                    this.wordBankBar.style.width = `${Math.round(railRect.width)}px`;
                    this.wordBankBar.style.maxWidth = `${Math.round(railRect.width)}px`;
                }

                updateMobileBottomSpacing() {
                    const width = window.innerWidth || document.documentElement.clientWidth || 0;
                    if (!this.gameLayout || !this.wordBankBar) return;

                    if (width >= breakpoints.lg) {
                        this.gameLayout.style.paddingBottom = '';
                        return;
                    }

                    const barHeight = Math.ceil(this.wordBankBar.getBoundingClientRect().height || 0);
                    this.gameLayout.style.paddingBottom = `${barHeight + layout.mobileBankGap}px`;
                }

                handleResize() {
                    window.clearTimeout(this.resizeTimer);
                    this.resizeTimer = window.setTimeout(() => {
                        if (!this.draggedItem) {
                            this.ensureActiveWordCount();
                            this.renderWords();
                        }
                        this.refreshUI();
                    }, timing.resizeDebounce);
                }

                handleScroll() {
                    this.updateDesktopStickyPosition();
                }

                // interaction
                handleTileTap(labelId) {
                    this.activeLabelId = Number(this.activeLabelId) === Number(labelId) ? null : Number(labelId);
                    this.renderWords();
                }

                handleTargetClick(targetId, targetEl) {
                    if (this.activeLabelId == null) return;
                    this.tryTapPlacement(this.activeLabelId, targetId, targetEl);
                }

                handlePointerDown(event, item) {
                    if (event.button !== undefined && event.button !== 0) return;
                    if (!item || this.gameCompleted || this.isRevealingAnswers) return;

                    event.preventDefault();
                    if (item.setPointerCapture) item.setPointerCapture(event.pointerId);

                    const rect = item.getBoundingClientRect();
                    this.draggedItem = item;
                    this.originalParent = item.parentElement;
                    this.activeLabelId = Number(item.dataset.labelId);

                    this.placeholder = document.createElement('div');
                    this.placeholder.className = 'tile-placeholder';
                    this.placeholder.style.width = `${rect.width}px`;
                    this.placeholder.style.height = `${rect.height}px`;
                    this.originalParent.insertBefore(this.placeholder, item);

                    item.classList.add('tile-dragging');
                    item.style.width = `${rect.width}px`;
                    this.offsetX = event.clientX - rect.left;
                    this.offsetY = event.clientY - rect.top;

                    document.body.appendChild(item);
                    item.style.left = `${event.clientX - this.offsetX}px`;
                    item.style.top = `${event.clientY - this.offsetY}px`;
                    item.style.transform = 'scale(1.05) rotate(-2deg)';

                    document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                    document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                    document.addEventListener('pointercancel', this.handlePointerUp, { passive: false });
                }

                handlePointerMove(event) {
                    if (!this.draggedItem) return;
                    event.preventDefault();

                    this.pointerX = event.clientX - this.offsetX;
                    this.pointerY = event.clientY - this.offsetY;

                    if (!this.rafId) {
                        this.rafId = window.requestAnimationFrame(() => {
                            if (!this.draggedItem) {
                                this.rafId = null;
                                return;
                            }

                            this.draggedItem.style.left = `${this.pointerX}px`;
                            this.draggedItem.style.top = `${this.pointerY}px`;
                            this.rafId = null;
                        });
                    }

                    this.checkHover(event.clientX, event.clientY);
                }

                handlePointerUp(event) {
                    if (!this.draggedItem) return;

                    this.removeDragListeners();
                    const target = this.getTargetSlot(event.clientX, event.clientY);

                    if (target && target.classList.contains('image-drop-slot') && target.dataset.solved !== '1') {
                        const labelId = Number(this.draggedItem.dataset.labelId || -1);
                        const targetId = Number(target.dataset.targetId || -1);

                        if (labelId === targetId) {
                            this.handleCorrectDrop(target, labelId);
                            return;
                        }

                        this.handleWrongDrop(target, { countAsMistake: true });
                        return;
                    }

                    this.handleWrongDrop(target, { countAsMistake: false });
                }

                removeDragListeners() {
                    document.removeEventListener('pointermove', this.handlePointerMove);
                    document.removeEventListener('pointerup', this.handlePointerUp);
                    document.removeEventListener('pointercancel', this.handlePointerUp);

                    if (this.rafId) {
                        window.cancelAnimationFrame(this.rafId);
                        this.rafId = null;
                    }
                }

                getTargetSlot(x, y) {
                    if (!this.draggedItem) return null;

                    this.draggedItem.hidden = true;
                    const below = document.elementFromPoint(x, y);
                    this.draggedItem.hidden = false;
                    if (!below) return null;

                    const exactTarget = below.closest('.image-drop-slot');
                    if (exactTarget && exactTarget.dataset.solved !== '1') return exactTarget;

                    const threshold = this.getDropThreshold();
                    let nearestTarget = null;
                    let nearestDistance = Number.POSITIVE_INFINITY;

                    this.getDropSlots().forEach((slot) => {
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
                            nearestTarget = slot;
                        }
                    });

                    return nearestTarget;
                }

                checkHover(x, y) {
                    this.clearHoverStates();
                    const target = this.getTargetSlot(x, y);

                    if (target && target.dataset.solved !== '1') {
                        target.classList.add('is-hover');
                        this.hoverTargetId = Number(target.dataset.targetId);
                        return;
                    }

                    this.hoverTargetId = null;
                }

                handleCorrectDrop(target, labelId) {
                    if (this.draggedItem) {
                        this.draggedItem.classList.remove('tile-dragging', 'tile-shake');
                        this.draggedItem.style.position = '';
                        this.draggedItem.style.left = '';
                        this.draggedItem.style.top = '';
                        this.draggedItem.style.width = '';
                        this.draggedItem.style.zIndex = '';
                        this.draggedItem.style.transform = '';

                        if (this.draggedItem.parentNode) {
                            this.draggedItem.parentNode.removeChild(this.draggedItem);
                        }
                    }

                    this.placeholder?.remove();
                    this.placeholder = null;
                    this.draggedItem = null;
                    this.originalParent = null;
                    this.hoverTargetId = null;
                    this.clearHoverStates();
                    this.completePlacement(labelId, target);
                }

                handleWrongDrop(target, options = {}) {
                    if (!this.draggedItem) return;

                    const countAsMistake = options.countAsMistake === true;
                    const item = this.draggedItem;

                    if (countAsMistake) {
                        this.mistakeCount += 1;
                        playAudio(SOUND.wrong);
                        this.updateStats();
                    }

                    if (target && countAsMistake) {
                        target.classList.remove('is-wrong');
                        void target.offsetWidth;
                        target.classList.add('is-wrong');
                        item.classList.add('tile-shake');
                        window.setTimeout(() => {
                            target.classList.remove('is-wrong');
                            item.classList.remove('tile-shake');
                        }, timing.wrongShake);
                    }

                    item.classList.add('tile-returning');
                    item.style.transform = 'scale(1)';

                    if (this.placeholder) {
                        const placeholderRect = this.placeholder.getBoundingClientRect();
                        item.style.left = `${placeholderRect.left}px`;
                        item.style.top = `${placeholderRect.top}px`;
                    }

                    window.setTimeout(() => {
                        item.classList.remove('tile-dragging', 'tile-returning', 'tile-shake');
                        item.style.position = '';
                        item.style.left = '';
                        item.style.top = '';
                        item.style.width = '';
                        item.style.zIndex = '';
                        item.style.transform = '';

                        if (this.originalParent && this.placeholder) {
                            this.originalParent.insertBefore(item, this.placeholder);
                            this.placeholder.remove();
                        }

                        this.placeholder = null;
                        this.draggedItem = null;
                        this.originalParent = null;
                        this.hoverTargetId = null;
                        this.clearHoverStates();
                        this.renderWords();
                        this.refreshUI();
                    }, timing.returnTile);
                }

                tryTapPlacement(labelId, targetId, targetEl) {
                    if (this.isRevealingAnswers || this.gameCompleted) return;

                    if (Number(labelId) === Number(targetId)) {
                        this.completePlacement(labelId, targetEl);
                        return;
                    }

                    this.mistakeCount += 1;
                    playAudio(SOUND.wrong);
                    this.updateStats();

                    if (this.imageCard) {
                        this.imageCard.classList.remove('game-shake-card');
                        void this.imageCard.offsetWidth;
                        this.imageCard.classList.add('game-shake-card');
                    }

                    if (targetEl) {
                        targetEl.classList.remove('is-wrong');
                        void targetEl.offsetWidth;
                        targetEl.classList.add('is-wrong');
                        window.setTimeout(() => targetEl.classList.remove('is-wrong'), timing.wrongTapShake);
                    }

                    this.renderWords();
                }

                completePlacement(labelId, target) {
                    const label = this.getLabel(labelId);
                    if (!label) return;

                    label.placed = true;
                    label.revealed = false;
                    this.correctCount += 1;
                    this.activeLabelId = null;
                    this.hoverTargetId = null;

                    this.removeActiveWordById(labelId);
                    playAudio(SOUND.correct);

                    if (target) {
                        this.spawnBurst(target);
                    }

                    this.render();
                    this.refreshUI();

                    if (this.allSolved()) {
                        this.checkComplete(true);
                    }
                }

                spawnBurst(target) {
                    const rect = target.getBoundingClientRect();

                    BURST_CHARS.forEach((char, index) => {
                        const burst = document.createElement('div');
                        burst.className = 'win-burst';
                        burst.textContent = char;
                        burst.style.left = `${rect.left + (rect.width / 2) + ((index - 1) * 10)}px`;
                        burst.style.top = `${rect.top + (rect.height / 2)}px`;
                        burst.style.position = 'fixed';
                        burst.style.animationDelay = `${index * (timing.burstStagger / 1000)}s`;
                        document.body.appendChild(burst);
                        window.setTimeout(() => burst.remove(), timing.burstLifetime);
                    });
                }

                showNextWords() {
                    if (this.draggedItem || this.wordDeck.waiting.length === 0) return;

                    this.wordDeck.history.push([...this.wordDeck.active]);

                    while (this.wordDeck.active.length > 0) {
                        this.wordDeck.waiting.push(this.wordDeck.active.shift());
                    }

                    this.ensureActiveWordCount();
                    this.renderWords();
                    this.refreshUI();
                }

                showPrevWords() {
                    if (this.draggedItem || this.wordDeck.history.length === 0) return;

                    while (this.wordDeck.active.length > 0) {
                        this.wordDeck.waiting.unshift(this.wordDeck.active.pop());
                    }

                    this.wordDeck.active = this.wordDeck.history.pop();
                    this.renderWords();
                    this.refreshUI();
                }

                handleRevealAnswers() {
                    if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                    const remaining = this.labels.filter((item) => !item.placed);
                    if (!remaining.length) return;

                    this.isRevealingAnswers = true;
                    this.hasUsedReveal = true;

                    remaining.forEach((item) => {
                        item.placed = true;
                        item.revealed = true;
                        this.mistakeCount += 1;
                        this.removeActiveWordById(item.id);
                    });

                    this.wordDeck.active = [];
                    this.wordDeck.waiting = [];
                    this.wordDeck.history = [];
                    this.activeLabelId = null;
                    this.hoverTargetId = null;
                    this.isRevealingAnswers = false;

                    this.renderTargets();
                    if (this.wordList) {
                        this.wordList.innerHTML = '';
                    }

                    this.refreshUI();
                    this.checkComplete(false);
                }

                handleRetakeTest() {
                    this.reset();
                }

                cleanupDrag() {
                    if (this.draggedItem && this.draggedItem.parentNode === document.body) {
                        this.draggedItem.remove();
                    }

                    this.placeholder?.remove();
                    this.removeDragListeners();
                    this.draggedItem = null;
                    this.placeholder = null;
                    this.originalParent = null;
                    this.hoverTargetId = null;
                    this.clearHoverStates();
                }

                // completion
                checkComplete(showModal) {
                    if (!this.allSolved()) return;

                    window.setTimeout(() => {
                        this.stopTimer();
                        this.gameCompleted = true;

                        if (this.wordList) {
                            this.wordList.innerHTML = '';
                        }

                        this.refreshUI();

                        if (!showModal) return;

                        if (this.finalCorrect) this.finalCorrect.textContent = `${this.correctCount}/${this.labels.length}`;
                        if (this.finalTime) this.finalTime.textContent = formatTime(Math.floor((Date.now() - this.startTime) / 1000));
                        if (this.finalMistakes) this.finalMistakes.textContent = String(this.mistakeCount);

                        this.showWin();
                    }, timing.completeDelay);
                }

                showWin() {
                    if (this.modalShown) return;
                    this.modalShown = true;
                    playAudio(SOUND.success);
                    this.winModal?.classList.remove('hidden');
                }

                hideWin() {
                    this.winModal?.classList.add('hidden');
                }
            }

            // 15. Boot/init
            function startImageGame() {
                const game = new ImageGame();
                window.imageGame = game;
                window.resetSlide = () => game.reset();
                game.init();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', startImageGame);
            } else {
                startImageGame();
            }
        })();
    </script>
@endsection
