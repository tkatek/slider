
@extends('slider.simple-layout')

@section('style')
    <style>
        .plane-dd-page {
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(103,63,231,.14), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(59,130,246,.12), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(16,185,129,.08), transparent 60%);
        }

        .dark .plane-dd-page {
            background:
                    radial-gradient(980px 560px at 8% 10%, rgba(96,165,250,.18), transparent 55%),
                    radial-gradient(900px 560px at 92% 14%, rgba(192,132,252,.16), transparent 56%),
                    radial-gradient(880px 640px at 50% 100%, rgba(99,102,241,.12), transparent 60%),
                    linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        @keyframes planeShake {
            0%,100% { transform: translateX(0); } 
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @keyframes planePulseDone {
            0% { transform: scale(1); }
            50% { transform: scale(1.014); }
            100% { transform: scale(1); }
        }

        @keyframes planeRiseFade {
            0% { transform: translateY(0) scale(.8) rotate(0deg); opacity: 0; }
            15% { opacity: 1; }
            100% { transform: translateY(-34px) scale(1.12) rotate(10deg); opacity: 0; }
        }

        .plane-shake-card { animation: planeShake .32s ease-in-out; }
        .plane-solved-board { animation: planePulseDone .35s ease-out; }

        #planeDragDropGame {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            -webkit-user-select: none;
            user-select: none;
        }

        .ddb-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: #fff;
            border: 1px solid rgba(255,255,255,.2);
            background: linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow: 0 10px 24px rgba(79,70,229,.10);
            transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .ddb-btn-primary:hover {
            transform: scale(1.05);
        }

        .ddb-btn-primary:active {
            transform: scale(.95);
        }

        .ddb-btn-reveal {
            color: rgb(154 52 18);
            border-color: rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
        }

        .ddb-btn-reveal:hover {
            background: rgb(254 215 170);
            box-shadow: 0 10px 24px rgba(234,88,12,.14);
        }

        .ddb-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(15 23 42);
            border: 1px solid rgb(226 232 240);
            background: #fff;
            box-shadow: 0 8px 22px rgba(2,6,23,.05);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .ddb-btn-secondary:hover {
            transform: scale(1.05);
            background: rgb(248 250 252);
        }

        .ddb-btn-secondary:active {
            transform: scale(.98);
        }

        .dark .ddb-btn-secondary {
            color: #fff;
            border-color: rgb(51 65 85);
            background: rgb(30 41 59);
        }

        .dark .ddb-btn-secondary:hover {
            background: rgb(51 65 85);
        }

        .dark .ddb-btn-reveal {
            color: rgb(254 215 170);
            border-color: rgba(194, 65, 12, .45);
            background: rgba(154, 52, 18, .35);
        }

        .dark .ddb-btn-reveal:hover {
            background: rgba(154, 52, 18, .5);
        }

        .diagram-surface::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                    radial-gradient(120% 120% at 0% 0%, rgba(59,130,246,.08) 0%, transparent 46%),
                    radial-gradient(120% 120% at 100% 0%, rgba(99,102,241,.08) 0%, transparent 46%),
                    radial-gradient(100% 100% at 50% 100%, rgba(147,51,234,.08) 0%, transparent 55%);
            pointer-events: none;
        }

        .plane-drop-slot {
            position: absolute;
            transform: translate(-50%, -50%);
            width: 76px;
            min-height: 24px;
            padding: 2px 6px;
            border-radius: 999px;
            border: 1px solid rgba(196, 181, 253, .55);
            background: linear-gradient(135deg, rgba(219,234,254,.22), rgba(233,213,255,.20));
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow:
                    0 4px 12px rgba(99,102,241,.10),
                    inset 0 0 0 1px rgba(255,255,255,.14);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background-color .18s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .plane-drop-slot::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,.03));
            pointer-events: none;
        }

        .plane-drop-slot-inner {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 18px;
            text-align: center;
            font-weight: 800;
            font-size: 10px;
            line-height: 1.05;
            color: rgba(76, 29, 149, .22);
            letter-spacing: .01em;
        }

        .plane-drop-slot-empty .plane-drop-slot-inner {
            color: transparent;
        }

        .plane-drop-slot.is-hover {
            transform: translate(-50%, -50%) scale(1.06);
            border-color: rgba(129,140,248,.70);
            background: linear-gradient(135deg, rgba(191,219,254,.34), rgba(221,214,254,.30));
            box-shadow:
                    0 0 0 6px rgba(129,140,248,.10),
                    0 10px 20px rgba(99,102,241,.16),
                    inset 0 0 0 1px rgba(255,255,255,.18);
        }

        .plane-drop-slot.is-solved {
            width: auto;
            max-width: 132px;
            min-height: 28px;
            border-color: rgba(129,140,248,.62);
            background: linear-gradient(135deg, rgba(224,231,255,.95), rgba(243,232,255,.95));
            box-shadow:
                    0 8px 20px rgba(99,102,241,.14),
                    inset 0 0 0 1px rgba(255,255,255,.22);
        }

        .plane-drop-slot.is-solved .plane-drop-slot-inner {
            min-height: 20px;
            color: rgb(76, 29, 149);
            font-size: 10px;
            padding: 0 2px;
        }

        .plane-drop-slot.is-revealed {
            border-color: rgba(244,63,94,.45);
            background: linear-gradient(135deg, rgba(251,207,232,.96), rgba(254,205,211,.96));
            box-shadow:
                    0 8px 20px rgba(244,63,94,.16),
                    inset 0 0 0 1px rgba(255,255,255,.22);
        }

        .plane-drop-slot.is-revealed .plane-drop-slot-inner {
            color: #881337;
        }

        .dark .plane-drop-slot.is-revealed {
            border-color: rgba(244,114,182,.34);
            background: linear-gradient(135deg, rgba(136,19,55,.68), rgba(159,18,57,.62));
        }

        .dark .plane-drop-slot.is-revealed .plane-drop-slot-inner {
            color: #ffe4e6;
        }

        .plane-drop-slot.is-wrong {
            animation: planeShake .28s ease-in-out;
        }

        .plane-dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .plane-returning {
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index: 9000;
        }

        .plane-shake {
            animation: planeShake .35s ease-in-out;
        }

        .plane-emoji-burst {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            font-size: 1rem;
            animation: planeRiseFade .7s ease forwards;
            z-index: 20;
        }

        #planePoolContent {
            align-content: start;
        }

        .plane-word-tile.is-active {
            transform: translateY(-2px) scale(1.03);
            box-shadow:
                    0 16px 34px rgba(79,70,229,.22),
                    0 0 0 3px rgba(255,255,255,.22);
        }

        @media (max-width: 1024px) {
            .plane-drop-slot {
                width: 68px;
                min-height: 22px;
                padding: 2px 5px;
            }
        }

        @media (max-width: 1023.98px) {
            #planeWordBankPanel {
                max-height: min(35vh, 310px);
            }

            #planePoolContent {
                max-height: calc(min(35vh, 310px) - 56px);
                overflow-y: auto;
                overflow-x: hidden;
            }
        }

        @media (min-width: 1024px) {
            #planePoolRail {
                position: relative;
                align-self: stretch;
            }

            #planePoolBar {
                inset-inline: auto;
                bottom: auto;
            }

            #planePoolBar.plane-desktop-fixed {
                position: fixed;
                top: var(--plane-sticky-top, 16px);
                bottom: auto;
                z-index: 1400;
            }

            #planePoolBar.plane-desktop-bottom {
                position: absolute;
                top: auto;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1;
            }
        }

        @media (max-width: 640px) {
            .plane-drop-slot {
                width: 60px;
                min-height: 20px;
                padding: 2px 4px;
            }

            .plane-drop-slot-inner {
                min-height: 16px;
                font-size: 9px;
            }

            .plane-drop-slot.is-solved {
                max-width: 100px;
                min-height: 24px;
            }

            .plane-drop-slot.is-solved .plane-drop-slot-inner {
                font-size: 9px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .plane-returning,
            .plane-shake,
            .plane-solved-board,
            .plane-drop-slot.is-wrong,
            .plane-emoji-burst {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="plane-dd-page flex min-h-[100dvh] w-full flex-col" id="planeDragDropGame">
        <div id="planeTitleBlock" class="header-spacing text-center space-y-6 my-8 px-4 sm:px-6 lg:px-8">
            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $content['title'] ?? '' }}
                </span>
            </h1>

            @if(!empty($content['subtitle']))
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            @endif
        </div>

        <div id="planeStatusRow" class="mx-auto mb-5 w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
            <div class="grid grid-cols-4">
                @foreach(['Tiles' => 'planeTilesCount', 'Correct' => 'planeCorrectCount', 'Mistakes' => 'planeMistakesCount', 'Time' => 'planeTimer'] as $label => $id)
                    <div class="px-3 py-3 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                        <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                            {{ $label }}
                        </div>
                        <div class="text-base font-black sm:text-lg text-slate-900 dark:text-slate-100">
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

        <div id="planeLayoutShell" class="mx-auto flex w-full flex-1 min-h-0 flex-col px-4 pt-4 pb-[calc(min(35vh,310px)+16px)] sm:px-6 sm:pt-5 sm:pb-[calc(min(35vh,310px)+20px)] lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pt-4 lg:pb-0">
            <section id="planeGameColumn" class="w-full flex flex-col lg:w-[70%] lg:flex-none">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 auto-rows-max">
                    <div class="w-full">
                        <div id="planeGameCard" class="relative isolate w-full text-left overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible mb-4">
                            <div class="relative z-[1] px-3 py-4 sm:px-4 sm:py-4 lg:overflow-visible">
                                <div class="diagram-surface relative overflow-hidden rounded-[24px] border border-slate-200/80 bg-white/80 shadow-inner dark:border-slate-700/70 dark:bg-slate-900/35">
                                    <div class="relative aspect-[10/6.8]">
                                        <img id="planeDiagramImage" class="absolute inset-0 h-full w-full object-contain" alt="Plane labelled diagram">

                                        <div id="planeDiagramFallback" class="absolute inset-0 grid place-items-center bg-[linear-gradient(135deg,rgba(59,130,246,0.10),rgba(99,102,241,0.08),rgba(147,51,234,0.10))]">
                                            <div class="rounded-3xl border border-slate-200/80 bg-white/85 px-5 py-4 text-center shadow-sm dark:border-slate-700/70 dark:bg-slate-900/65">
                                                <p class="text-xs sm:text-sm font-black uppercase tracking-[0.16em] text-slate-500 dark:text-slate-300">
                                                    Add your plane image
                                                </p>
                                                <p class="mt-1 text-sm sm:text-base font-semibold text-slate-700 dark:text-slate-200">
                                                    Set <code>$content['image']</code>.
                                                </p>
                                            </div>
                                        </div>

                                        <div id="planeTargetsLayer" class="absolute inset-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="planeWinModal" class="hidden fixed inset-0 z-[3000]">
                        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                        <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                            <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">
                                <div class="p-6 text-center sm:p-8">
                                    <div class="mb-3 text-6xl">✈️</div>

                                    <h2 class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">
                                        Great job!
                                    </h2>

                                    <div class="mt-5 grid w-full grid-cols-1 gap-3 sm:grid-cols-3">
                                        @foreach(['Correct' => 'planeFinalCorrect', 'Time' => 'planeFinalTime', 'Mistakes' => 'planeFinalMistakes'] as $label => $id)
                                            <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow dark:border-slate-700 dark:bg-slate-800/80">
                                                <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                                <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                        <button
                                                type="button"
                                                id="planeRestartBtnModal"
                                                class="ddb-btn-secondary w-full px-8 py-3 text-sm"
                                        >
                                            Restart
                                        </button>

                                        <button
                                                type="button"
                                                id="planeContinueBtnModal"
                                                class="ddb-btn-primary w-full px-8 py-3 text-sm"
                                        >
                                            Continue ⚡
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <template id="planeTileTpl">
                        <div
                                class="plane-word-tile select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-base inline-flex min-h-[42px] w-auto max-w-full shrink-0 items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="planePoolRail" class="w-full lg:order-first lg:self-stretch">
                <div id="planePoolBar" class="fixed inset-x-0 bottom-0 z-[1500] lg:relative lg:inset-auto lg:bottom-auto lg:top-auto lg:left-auto">
                    <div class="mx-auto w-full px-3 sm:px-6 lg:px-0 pb-0">
                        <div id="planeWordBankPanel"
                             class="relative overflow-hidden rounded-t-3xl sm:rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                            <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                            <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <button id="planePrevWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Previous words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div id="planePoolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                            0/0
                                        </div>

                                        <button id="planeNextWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Next words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                                type="button"
                                                id="planeRevealAnswersBtn"
                                                class="ddb-btn-primary ddb-btn-reveal"
                                        >
                                            Reveal answers
                                        </button>

                                        <button
                                                type="button"
                                                id="planeRetakeTestBtn"
                                                class="ddb-btn-secondary hidden"
                                        >
                                            Retake test
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                <div class="relative mt-3">
                                    <div id="planePoolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 lg:w-full"></div>
                                </div>
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
        (function () {
            var DIAGRAM_IMAGE = @json($content['image'] ?? '');
            var RAW_LABELS = @json($content['labels'] ?? []);

            var DESKTOP_GAME_WIDTH = 70;
            var DESKTOP_POOL_WIDTH = 30;
            var MOBILE_BANK_GAP = 20;
            var DESKTOP_STICKY_TOP = 16;

            function normalizeLabels(items) {
                if (!Array.isArray(items)) return [];

                return items.map(function (item, index) {
                    return {
                        id: index,
                        text: String((item && item.text) || '').trim(),
                        x: Math.max(0, Math.min(100, Number((item && item.x) || 50))),
                        y: Math.max(0, Math.min(100, Number((item && item.y) || 50)))
                    };
                }).filter(function (item) {
                    return item.text.length > 0;
                });
            }

            var LABELS = normalizeLabels(RAW_LABELS);

            var sfx = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            sfx.correct.volume = 1;
            sfx.wrong.volume = 1;
            sfx.success.volume = 1;

            function playAudio(audio) {
                if (!audio) return;
                audio.pause();
                audio.currentTime = 0;
                audio.play().catch(function(){});
            }

            function playCorrect() { playAudio(sfx.correct); }
            function playWrong() { playAudio(sfx.wrong); }
            function playWin() { playAudio(sfx.success); }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function goNextSlide() {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.nextSlide === "function") {
                            window.parent.nextSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
                        return;
                    } catch (e) {}
                }
            }

            function PlaneDiagramGame() {
                this.layoutShell = document.getElementById('planeLayoutShell');
                this.gameColumn = document.getElementById('planeGameColumn');
                this.poolRail = document.getElementById('planePoolRail');
                this.poolBar = document.getElementById('planePoolBar');

                this.targetsLayer = document.getElementById('planeTargetsLayer');
                this.diagramImage = document.getElementById('planeDiagramImage');
                this.diagramFallback = document.getElementById('planeDiagramFallback');
                this.gameCard = document.getElementById('planeGameCard');

                this.poolContent = document.getElementById('planePoolContent');
                this.poolCount = document.getElementById('planePoolCount');
                this.prevWordsBtn = document.getElementById('planePrevWordsBtn');
                this.nextWordsBtn = document.getElementById('planeNextWordsBtn');
                this.revealAnswersBtn = document.getElementById('planeRevealAnswersBtn');
                this.retakeTestBtn = document.getElementById('planeRetakeTestBtn');

                this.tileTpl = document.getElementById('planeTileTpl');
                this.winModal = document.getElementById('planeWinModal');

                this.labels = [];
                this.activeLabelId = null;
                this.hoverTargetId = null;
                this.hoverTargetEl = null;

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this._raf = null;
                this._mx = 0;
                this._my = 0;

                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.modalShown = false;

                this.tileDeck = { all: [], active: [], waiting: [], history: [] };
                this.resizeTimer = null;

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.burstEmojis = ['✨', '🎉', '💫', '⭐', '👏'];

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handleResize = this.handleResize.bind(this);
                this.handleScroll = this.handleScroll.bind(this);
                this.showPrevWords = this.showPrevWords.bind(this);
                this.showNextWords = this.showNextWords.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                if (this.prevWordsBtn) this.prevWordsBtn.addEventListener('click', this.showPrevWords);
                if (this.nextWordsBtn) this.nextWordsBtn.addEventListener('click', this.showNextWords);
                if (this.revealAnswersBtn) this.revealAnswersBtn.addEventListener('click', this.handleRevealAnswers);
                if (this.retakeTestBtn) this.retakeTestBtn.addEventListener('click', this.handleRetakeTest);
            }

            PlaneDiagramGame.prototype.init = function () {
                this.labels = LABELS.map(function (item) {
                    return {
                        id: item.id,
                        text: item.text,
                        x: item.x,
                        y: item.y,
                        placed: false,
                        revealed: false
                    };
                });

                this.activeLabelId = null;
                this.hoverTargetId = null;
                this.hoverTargetEl = null;
                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.isRevealingAnswers = false;
                this.modalShown = false;

                clearInterval(this.timerInt);
                this.startTimer();
                this.hideWin();
                this.cleanupDrag();
                this.setupImage();

                this.tileDeck = {
                    all: this.shuffle(this.labels.map(function (label) {
                        return {
                            id: label.id,
                            text: label.text
                        };
                    })),
                    active: [],
                    waiting: [],
                    history: []
                };
                this.tileDeck.waiting = this.tileDeck.all.slice();

                this.loadTiles();
                this.renderTargets();
                this.updateStats();
                this.updateActionButtons();
                this.updateDesktopColumnWidths();
                this.updateMobileBottomSpacing();

                window.removeEventListener('resize', this.handleResize);
                window.addEventListener('resize', this.handleResize, { passive: true });

                window.removeEventListener('scroll', this.handleScroll);
                window.addEventListener('scroll', this.handleScroll, { passive: true });

                var self = this;
                setTimeout(function () {
                    self.updateMobileBottomSpacing();
                    self.updateDesktopStickyPosition();
                }, 120);
            };

            PlaneDiagramGame.prototype.setupImage = function () {
                if (!this.diagramImage || !this.diagramFallback) return;

                if (DIAGRAM_IMAGE) {
                    this.diagramImage.src = DIAGRAM_IMAGE;
                    this.diagramImage.classList.remove('hidden');
                    this.diagramFallback.classList.add('hidden');
                } else {
                    this.diagramImage.removeAttribute('src');
                    this.diagramImage.classList.add('hidden');
                    this.diagramFallback.classList.remove('hidden');
                }
            };

            PlaneDiagramGame.prototype.startTimer = function () {
                var self = this;
                this.startTime = Date.now();
                this.updateTimer();
                this.timerInt = setInterval(function () {
                    self.updateTimer();
                }, 1000);
            };

            PlaneDiagramGame.prototype.formatElapsedTime = function () {
                var elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                var mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                var secs = String(elapsed % 60).padStart(2, '0');
                return mins + ':' + secs;
            };

            PlaneDiagramGame.prototype.updateTimer = function () {
                var timerEl = document.getElementById('planeTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            };

            PlaneDiagramGame.prototype.updateStats = function () {
                var total = this.labels.length;
                var placed = this.solvedCount();

                var tilesEl = document.getElementById('planeTilesCount');
                var correctEl = document.getElementById('planeCorrectCount');
                var mistakesEl = document.getElementById('planeMistakesCount');

                if (tilesEl) tilesEl.textContent = this.correctCount + '/' + total;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
                if (this.poolCount) this.poolCount.textContent = (total - placed) + '/' + total;
            };

            PlaneDiagramGame.prototype.solvedCount = function () {
                return this.labels.filter(function (item) { return item.placed; }).length;
            };

            PlaneDiagramGame.prototype.allSolved = function () {
                return this.labels.length > 0 && this.solvedCount() === this.labels.length;
            };

            PlaneDiagramGame.prototype.getLabel = function (id) {
                id = Number(id);
                return this.labels.find(function (item) {
                    return Number(item.id) === id;
                }) || null;
            };

            PlaneDiagramGame.prototype.getVisibleWordLimit = function () {
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1024) return Number.MAX_SAFE_INTEGER;
                if (w < 640) return 8;
                return 9;
            };

            PlaneDiagramGame.prototype.getDesktopStickyTop = function () {
                return Math.max(0, Number.isFinite(DESKTOP_STICKY_TOP) ? DESKTOP_STICKY_TOP : 16);
            };

            PlaneDiagramGame.prototype.getSlotSize = function () {
                if (window.innerWidth <= 640) return { width: 60, height: 20 };
                if (window.innerWidth <= 1024) return { width: 68, height: 22 };
                return { width: 76, height: 24 };
            };

            PlaneDiagramGame.prototype.updateMobileBottomSpacing = function () {
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
                var panelHeight;

                if (!this.layoutShell || !this.poolBar) return;

                if (viewportWidth >= 1024) {
                    this.layoutShell.style.paddingBottom = '';
                    return;
                }

                panelHeight = Math.ceil(this.poolBar.getBoundingClientRect().height || 0);
                this.layoutShell.style.paddingBottom = (panelHeight + MOBILE_BANK_GAP) + 'px';
            };

            PlaneDiagramGame.prototype.resetDesktopStickyState = function () {
                if (!this.poolBar) return;

                this.poolBar.classList.remove('plane-desktop-fixed', 'plane-desktop-bottom');
                this.poolBar.style.top = '';
                this.poolBar.style.left = '';
                this.poolBar.style.right = '';
                this.poolBar.style.width = '';
                this.poolBar.style.maxWidth = '';
                this.poolBar.style.setProperty('--plane-sticky-top', '');

                if (this.poolRail) {
                    this.poolRail.style.minHeight = '';
                }
            };

            PlaneDiagramGame.prototype.updateDesktopStickyPosition = function () {
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
                var stickyTop = this.getDesktopStickyTop();
                var railRect;
                var barHeight;
                var fixedWidth;
                var fixedLeft;

                if (!this.poolBar || !this.poolRail) return;

                if (viewportWidth < 1024) {
                    this.resetDesktopStickyState();
                    return;
                }

                barHeight = Math.ceil(this.poolBar.offsetHeight || 0);
                this.poolRail.style.minHeight = barHeight + 'px';
                railRect = this.poolRail.getBoundingClientRect();

                this.poolBar.style.setProperty('--plane-sticky-top', stickyTop + 'px');

                if (railRect.top > stickyTop) {
                    this.resetDesktopStickyState();
                    this.poolRail.style.minHeight = barHeight + 'px';
                    return;
                }

                if (railRect.bottom <= stickyTop + barHeight) {
                    this.poolBar.classList.remove('plane-desktop-fixed');
                    this.poolBar.classList.add('plane-desktop-bottom');
                    this.poolBar.style.top = '';
                    this.poolBar.style.left = '0';
                    this.poolBar.style.right = '0';
                    this.poolBar.style.width = '100%';
                    this.poolBar.style.maxWidth = '100%';
                    return;
                }

                fixedWidth = Math.round(railRect.width);
                fixedLeft = Math.round(railRect.left);

                this.poolBar.classList.remove('plane-desktop-bottom');
                this.poolBar.classList.add('plane-desktop-fixed');
                this.poolBar.style.top = stickyTop + 'px';
                this.poolBar.style.left = fixedLeft + 'px';
                this.poolBar.style.right = 'auto';
                this.poolBar.style.width = fixedWidth + 'px';
                this.poolBar.style.maxWidth = fixedWidth + 'px';
            };

            PlaneDiagramGame.prototype.updateDesktopColumnWidths = function () {
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;

                if (!this.gameColumn || !this.poolRail) return;

                if (viewportWidth < 1024) {
                    this.gameColumn.style.width = '';
                    this.gameColumn.style.maxWidth = '';
                    this.gameColumn.style.flexBasis = '';

                    this.poolRail.style.width = '';
                    this.poolRail.style.maxWidth = '';
                    this.poolRail.style.flexBasis = '';

                    this.resetDesktopStickyState();
                    return;
                }

                this.gameColumn.style.width = DESKTOP_GAME_WIDTH + '%';
                this.gameColumn.style.maxWidth = DESKTOP_GAME_WIDTH + '%';
                this.gameColumn.style.flexBasis = DESKTOP_GAME_WIDTH + '%';

                this.poolRail.style.width = DESKTOP_POOL_WIDTH + '%';
                this.poolRail.style.maxWidth = DESKTOP_POOL_WIDTH + '%';
                this.poolRail.style.flexBasis = DESKTOP_POOL_WIDTH + '%';

                this.updateDesktopStickyPosition();
            };

            PlaneDiagramGame.prototype.handleResize = function () {
                var self = this;
                clearTimeout(this.resizeTimer);
                this.resizeTimer = setTimeout(function () {
                    self.syncVisibleTileCount();
                    self.updateDesktopColumnWidths();
                    self.updateMobileBottomSpacing();
                    self.updateDesktopStickyPosition();
                }, 120);
            };

            PlaneDiagramGame.prototype.handleScroll = function () {
                this.updateDesktopStickyPosition();
            };

            PlaneDiagramGame.prototype.shuffle = function (arr) {
                var a = arr.slice();
                var i, j, temp;

                for (i = a.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    temp = a[i];
                    a[i] = a[j];
                    a[j] = temp;
                }

                return a;
            };

            PlaneDiagramGame.prototype.ensureActiveTileCount = function () {
                var deck = this.tileDeck;
                var desired = this.getVisibleWordLimit();

                if (!deck) return;

                while (deck.active.length < desired && deck.waiting.length > 0) {
                    deck.active.push(deck.waiting.shift());
                }

                while (deck.active.length > desired) {
                    deck.waiting.unshift(deck.active.pop());
                }
            };

            PlaneDiagramGame.prototype.updateNavButtons = function () {
                var deck = this.tileDeck;
                if (!deck) return;

                if (this.prevWordsBtn) this.prevWordsBtn.disabled = deck.history.length === 0;
                if (this.nextWordsBtn) this.nextWordsBtn.disabled = deck.waiting.length === 0;
            };

            PlaneDiagramGame.prototype.updateActionButtons = function () {
                var remaining = this.labels.length - this.solvedCount();
                var canReveal = remaining > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                var canRetake = this.hasUsedReveal;

                if (this.revealAnswersBtn) {
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !canRetake);
                }

                this.updateDesktopStickyPosition();
            };

            PlaneDiagramGame.prototype.createTileNode = function (itemData, index) {
                var self = this;
                var node = this.tileTpl.content.firstElementChild.cloneNode(true);

                node.textContent = itemData.text;
                node.dataset.labelId = itemData.id;

                this.tileSkins[index % this.tileSkins.length].split(' ').forEach(function (cls) {
                    node.classList.add(cls);
                });

                if (Number(this.activeLabelId) === Number(itemData.id)) {
                    node.classList.add('is-active');
                }

                node.addEventListener('click', function () {
                    if (self.draggedItem) return;
                    self.onTileTap(itemData.id);
                });

                node.addEventListener('pointerdown', function (e) {
                    self.handlePointerDown(e, node);
                });

                return node;
            };

            PlaneDiagramGame.prototype.renderActiveTiles = function () {
                var self = this;
                var deck = this.tileDeck;

                if (!this.poolContent || !deck) return;

                this.poolContent.innerHTML = '';

                if (!deck.active.length && this.allSolved()) {
                    this.updateNavButtons();
                    this.updateStats();
                    this.updateDesktopStickyPosition();
                    return;
                }

                deck.active.forEach(function (itemData, index) {
                    var node = self.createTileNode(itemData, index);
                    self.poolContent.appendChild(node);
                });

                this.updateNavButtons();
                this.updateStats();
                this.updateDesktopStickyPosition();
            };

            PlaneDiagramGame.prototype.loadTiles = function () {
                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updateDesktopColumnWidths();
            };

            PlaneDiagramGame.prototype.syncVisibleTileCount = function () {
                var deck = this.tileDeck;

                if (!deck) return;
                if (this.draggedItem) return;

                this.ensureActiveTileCount();
                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.removeActiveTileById = function (id) {
                var deck = this.tileDeck;
                id = Number(id);
                if (!deck) return;

                deck.active = deck.active.filter(function (item) {
                    return Number(item.id) !== id;
                });

                deck.history = deck.history.map(function (page) {
                    return page.filter(function (item) {
                        return Number(item.id) !== id;
                    });
                }).filter(function (page) {
                    return page.length > 0;
                });

                deck.waiting = deck.waiting.filter(function (item) {
                    return Number(item.id) !== id;
                });

                deck.all = deck.all.filter(function (item) {
                    return Number(item.id) !== id;
                });
            };

            PlaneDiagramGame.prototype.refillPoolAfterLock = function () {
                this.ensureActiveTileCount();
                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.showNextWords = function () {
                var deck = this.tileDeck;
                var desired = this.getVisibleWordLimit();

                if (!deck || this.draggedItem || deck.waiting.length === 0) return;

                deck.history.push(deck.active.slice());

                while (deck.active.length > 0) {
                    deck.waiting.push(deck.active.shift());
                }

                while (deck.active.length < desired && deck.waiting.length > 0) {
                    deck.active.push(deck.waiting.shift());
                }

                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.showPrevWords = function () {
                var deck = this.tileDeck;
                if (!deck || this.draggedItem || deck.history.length === 0) return;

                while (deck.active.length > 0) {
                    deck.waiting.unshift(deck.active.pop());
                }

                deck.active = deck.history.pop();
                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.renderTargets = function () {
                var self = this;
                if (!this.targetsLayer) return;

                this.targetsLayer.innerHTML = '';

                this.labels.forEach(function (item) {
                    var slot = document.createElement('button');
                    slot.type = 'button';
                    slot.className = 'plane-drop-slot ' + (item.placed ? 'is-solved' : 'plane-drop-slot-empty') + (item.revealed ? ' is-revealed' : '');
                    slot.dataset.targetId = String(item.id);
                    slot.dataset.solved = item.placed ? '1' : '0';
                    slot.style.left = item.x + '%';
                    slot.style.top = item.y + '%';

                    if (Number(self.hoverTargetId) === Number(item.id) && !item.placed) {
                        slot.classList.add('is-hover');
                    }

                    slot.innerHTML = '<span class="plane-drop-slot-inner">' + (item.placed ? self.escapeHtml(item.text) : '&nbsp;') + '</span>';

                    slot.addEventListener('click', function () {
                        self.onTargetClick(item.id, slot);
                    });

                    self.targetsLayer.appendChild(slot);
                });

                if (this.gameCard) {
                    this.gameCard.classList.toggle('plane-solved-board', this.allSolved());
                }
            };

            PlaneDiagramGame.prototype.onTileTap = function (labelId) {
                this.activeLabelId = Number(this.activeLabelId) === Number(labelId) ? null : Number(labelId);
                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.onTargetClick = function (targetId, targetEl) {
                if (this.activeLabelId == null) return;
                this.tryTapPlacement(this.activeLabelId, targetId, targetEl);
            };

            PlaneDiagramGame.prototype.handlePointerDown = function (e, item) {
                var rect;

                if (e.button !== undefined && e.button !== 0) return;
                if (!item || this.gameCompleted || this.isRevealingAnswers) return;

                e.preventDefault();
                if (item.setPointerCapture) item.setPointerCapture(e.pointerId);

                this.draggedItem = item;
                this.originalParent = item.parentElement;
                this.activeLabelId = Number(item.dataset.labelId);

                rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('plane-dragging');
                item.style.width = rect.width + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top = (e.clientY - this.offsetY) + 'px';
                item.style.transform = 'scale(1.05) rotate(-2deg)';

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                document.addEventListener('pointercancel', this.handlePointerUp, { passive: false });
            };

            PlaneDiagramGame.prototype.handlePointerMove = function (e) {
                var self = this;

                if (!this.draggedItem) return;
                e.preventDefault();

                this._mx = e.clientX - this.offsetX;
                this._my = e.clientY - this.offsetY;

                if (!this._raf) {
                    this._raf = requestAnimationFrame(function () {
                        if (!self.draggedItem) {
                            self._raf = null;
                            return;
                        }
                        self.draggedItem.style.left = self._mx + 'px';
                        self.draggedItem.style.top = self._my + 'px';
                        self._raf = null;
                    });
                }

                this.checkHover(e.clientX, e.clientY);
            };

            PlaneDiagramGame.prototype.handlePointerUp = function (e) {
                var target;
                var shouldCountMistake = false;

                if (!this.draggedItem) return;

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerUp);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                target = this.getTargetSlot(e.clientX, e.clientY);

                if (target && target.classList.contains('plane-drop-slot') && target.dataset.solved !== '1') {
                    var labelId = Number(this.draggedItem.dataset.labelId || -1);
                    var targetId = Number(target.dataset.targetId || -1);

                    if (labelId === targetId) {
                        this.handleCorrectDrop(target, labelId);
                    } else {
                        shouldCountMistake = true;
                        this.handleWrongDrop(target, { countAsMistake: shouldCountMistake });
                    }
                } else {
                    this.handleWrongDrop(target, { countAsMistake: shouldCountMistake });
                }
            };

            PlaneDiagramGame.prototype.checkHover = function (x, y) {
                Array.prototype.slice.call(document.querySelectorAll('.plane-drop-slot')).forEach(function (slot) {
                    slot.classList.remove('is-hover');
                });

                var target = this.getTargetSlot(x, y);
                if (target && target.dataset.solved !== '1') {
                    target.classList.add('is-hover');
                    this.hoverTargetId = Number(target.dataset.targetId);
                } else {
                    this.hoverTargetId = null;
                }
            };

            PlaneDiagramGame.prototype.getTargetSlot = function (x, y) {
                var below;
                var exactTarget;
                var threshold;
                var nearestTarget = null;
                var nearestDistance = Infinity;

                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;

                exactTarget = below.closest('.plane-drop-slot');
                if (exactTarget && exactTarget.dataset.solved !== '1') return exactTarget;

                threshold = window.innerWidth >= 1024 ? 42 : (window.innerWidth >= 640 ? 34 : 28);

                Array.prototype.slice.call(document.querySelectorAll('.plane-drop-slot')).forEach(function (slot) {
                    var rect;
                    var dx = 0;
                    var dy = 0;
                    var distance;

                    if (slot.dataset.solved === '1') return;

                    rect = slot.getBoundingClientRect();

                    if (x < rect.left) dx = rect.left - x;
                    else if (x > rect.right) dx = x - rect.right;

                    if (y < rect.top) dy = rect.top - y;
                    else if (y > rect.bottom) dy = y - rect.bottom;

                    distance = Math.sqrt((dx * dx) + (dy * dy));

                    if (distance <= threshold && distance < nearestDistance) {
                        nearestDistance = distance;
                        nearestTarget = slot;
                    }
                });

                return nearestTarget;
            };

            PlaneDiagramGame.prototype.spawnBurst = function (target, emojis) {
                var rect = target.getBoundingClientRect();
                var host = document.body;

                if (!emojis || !emojis.length) return;

                emojis.forEach(function (emoji, i) {
                    var el = document.createElement('div');
                    el.className = 'plane-emoji-burst';
                    el.textContent = emoji;
                    el.style.left = (rect.left + rect.width / 2 + (i - 1) * 10) + 'px';
                    el.style.top = (rect.top + rect.height / 2) + 'px';
                    el.style.position = 'fixed';
                    el.style.animationDelay = (i * 0.04) + 's';
                    host.appendChild(el);

                    setTimeout(function () {
                        el.remove();
                    }, 800);
                });
            };

            PlaneDiagramGame.prototype.completePlacement = function (labelId, targetEl) {
                var label = this.getLabel(labelId);
                if (!label) return;

                label.placed = true;
                label.revealed = false;

                this.correctCount++;
                this.activeLabelId = null;
                this.hoverTargetId = null;

                this.removeActiveTileById(labelId);
                playCorrect();

                if (targetEl) {
                    this.spawnBurst(targetEl, this.burstEmojis.sort(function(){ return Math.random() - 0.5; }).slice(0, 3));
                }

                this.renderTargets();
                this.refillPoolAfterLock();
                this.updateStats();
                this.updateActionButtons();
                this.updateDesktopColumnWidths();

                if (this.allSolved()) {
                    this.checkComplete(true);
                }
            };

            PlaneDiagramGame.prototype.handleCorrectDrop = function (target, labelId) {
                var item = this.draggedItem;

                if (item) {
                    item.classList.remove('plane-dragging', 'plane-shake');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (item.parentNode) {
                        item.parentNode.removeChild(item);
                    }
                }

                if (this.placeholder && this.placeholder.parentNode) {
                    this.placeholder.remove();
                }

                this.placeholder = null;
                this.draggedItem = null;
                this.originalParent = null;

                Array.prototype.slice.call(document.querySelectorAll('.plane-drop-slot')).forEach(function (slot) {
                    slot.classList.remove('is-hover');
                });

                this.completePlacement(labelId, target);
            };

            PlaneDiagramGame.prototype.handleWrongDrop = function (target, options) {
                var self = this;
                var item = this.draggedItem;
                var phRect;
                var settings = options || {};
                var countAsMistake = settings.countAsMistake === true;

                if (!item) return;

                if (countAsMistake) {
                    this.mistakeCount++;
                    playWrong();
                    this.updateStats();
                }

                if (target && countAsMistake) {
                    target.classList.remove('is-wrong');
                    void target.offsetWidth;
                    target.classList.add('is-wrong');
                    item.classList.add('plane-shake');
                    setTimeout(function () {
                        target.classList.remove('is-wrong');
                        item.classList.remove('plane-shake');
                    }, 320);
                }

                item.classList.add('plane-returning');
                item.style.transform = 'scale(1)';

                if (this.placeholder) {
                    phRect = this.placeholder.getBoundingClientRect();
                    item.style.left = phRect.left + 'px';
                    item.style.top = phRect.top + 'px';
                }

                setTimeout(function () {
                    item.classList.remove('plane-dragging', 'plane-returning', 'plane-shake');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (self.originalParent && self.placeholder) {
                        self.originalParent.insertBefore(item, self.placeholder);
                        self.placeholder.remove();
                    }

                    self.placeholder = null;
                    self.draggedItem = null;
                    self.originalParent = null;
                    self.hoverTargetId = null;
                    self.renderActiveTiles();

                    Array.prototype.slice.call(document.querySelectorAll('.plane-drop-slot')).forEach(function (slot) {
                        slot.classList.remove('is-hover');
                    });
                }, 440);
            };

            PlaneDiagramGame.prototype.tryTapPlacement = function (labelId, targetId, targetEl) {
                if (this.isRevealingAnswers || this.gameCompleted) return;

                if (Number(labelId) === Number(targetId)) {
                    this.completePlacement(labelId, targetEl);
                    return;
                }

                this.mistakeCount++;
                playWrong();
                this.updateStats();

                if (this.gameCard) {
                    this.gameCard.classList.remove('plane-shake-card');
                    void this.gameCard.offsetWidth;
                    this.gameCard.classList.add('plane-shake-card');
                }

                if (targetEl) {
                    targetEl.classList.remove('is-wrong');
                    void targetEl.offsetWidth;
                    targetEl.classList.add('is-wrong');
                    setTimeout(function () {
                        targetEl.classList.remove('is-wrong');
                    }, 280);
                }

                this.renderActiveTiles();
            };

            PlaneDiagramGame.prototype.handleRevealAnswers = function () {
                var self = this;
                var remaining;

                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                remaining = this.labels.filter(function (item) {
                    return !item.placed;
                });

                if (!remaining.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;

                remaining.forEach(function (item) {
                    item.placed = true;
                    item.revealed = true;
                    self.mistakeCount++;
                    self.removeActiveTileById(item.id);
                });

                this.tileDeck.active = [];
                this.tileDeck.waiting = [];
                this.tileDeck.history = [];

                this.activeLabelId = null;
                this.hoverTargetId = null;
                this.isRevealingAnswers = false;

                this.renderTargets();
                this.poolContent.innerHTML = '';
                this.updateStats();
                this.updateNavButtons();
                this.checkComplete(false);
            };

            PlaneDiagramGame.prototype.handleRetakeTest = function () {
                this.init();
            };

            PlaneDiagramGame.prototype.checkComplete = function (showModal) {
                var total = this.labels.length;
                var self = this;

                if (!this.allSolved()) return;

                setTimeout(function () {
                    clearInterval(self.timerInt);
                    self.gameCompleted = true;
                    self.poolContent.innerHTML = '';
                    if (self.poolCount) self.poolCount.textContent = '0/' + total;
                    self.updateNavButtons();
                    self.updateActionButtons();
                    self.updateDesktopStickyPosition();

                    if (!showModal) return;

                    var finalCorrect = document.getElementById('planeFinalCorrect');
                    var finalTime = document.getElementById('planeFinalTime');
                    var finalMistakes = document.getElementById('planeFinalMistakes');

                    if (finalCorrect) finalCorrect.textContent = self.correctCount + '/' + total;
                    if (finalTime) finalTime.textContent = self.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = self.mistakeCount;

                    self.showWin();
                }, 220);
            };

            PlaneDiagramGame.prototype.showWin = function () {
                if (this.modalShown) return;
                this.modalShown = true;
                playWin();

                if (this.winModal) {
                    this.winModal.classList.remove('hidden');
                }
            };

            PlaneDiagramGame.prototype.hideWin = function () {
                if (this.winModal) {
                    this.winModal.classList.add('hidden');
                }
            };

            PlaneDiagramGame.prototype.cleanupDrag = function () {
                if (this.draggedItem && this.draggedItem.parentNode === document.body) {
                    this.draggedItem.remove();
                }

                if (this.placeholder && this.placeholder.parentNode) {
                    this.placeholder.remove();
                }

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerUp);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.hoverTargetId = null;
                this.hoverTargetEl = null;
            };

            PlaneDiagramGame.prototype.escapeHtml = function (text) {
                var div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            };

            window.planeLabelGame = new PlaneDiagramGame();

            function bootPlaneGame() {
                var continueModalBtn = document.getElementById('planeContinueBtnModal');
                var restartModalBtn = document.getElementById('planeRestartBtnModal');

                if (continueModalBtn) {
                    continueModalBtn.addEventListener('click', goNextSlide);
                }

                if (restartModalBtn) {
                    restartModalBtn.addEventListener('click', function () {
                        window.planeLabelGame.reset ? window.planeLabelGame.reset() : window.planeLabelGame.init();
                    });
                }

                window.planeLabelGame.reset = function () {
                    this.init();
                };

                window.planeLabelGame.init();

                window.resetSlide = function () {
                    window.planeLabelGame.reset();
                };
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', bootPlaneGame);
            } else {
                bootPlaneGame();
            }
        })();
    </script>
@endsection
