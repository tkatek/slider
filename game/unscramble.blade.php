@php
    $customTheme = $content['theme_color'] ?? '#673fe7';
    $lessonAudio = $content['audio'] ?? null;
    $rawTranscript = $content['script'] ?? $content['transcript'] ?? [];
    $transcriptLines = is_array($rawTranscript)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawTranscript), static fn ($line) => $line !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R+/', trim((string) $rawTranscript)) ?: []),
            static fn ($line) => $line !== ''
        ));
@endphp
@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        #unscramble-words{
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        #unscramble-words .page-title{
            margin: 0 0 1.25rem;
            font-size: 2.25rem;
            line-height: 1.02;
            font-weight: 900;
            letter-spacing: -0.04em; 
        }

        #unscramble-words .page-title-text{
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #unscramble-words .page-subtitle{
            font-size: 1rem;
            line-height: 1.45;
            font-weight: 700;
            color: #0f172a;
        }

        .dark #unscramble-words .page-subtitle{
            color: #f8fafc;
        }

        @media (min-width: 768px){
            #unscramble-words .page-title{
                font-size: 3rem;
            }
        }

        @media (min-width: 1024px){
            #unscramble-words .page-title{
                font-size: 3.75rem;
            }

            #unscramble-words .page-subtitle{
                font-size: 1.15rem;
            }
        }

        #unscramble-words .board{
            border-radius: 28px;
        }

        #unscramble-words .pill{
            border-radius: 999px;
            border: 1px solid rgba(226,232,240,.75);
            background: rgba(255,255,255,.70);
            box-shadow: 0 10px 26px rgba(2,6,23,.06);
        }

        .dark #unscramble-words .pill{
            background: rgba(2,6,23,.42);
        }

        #unscramble-words .uns-btn-primary{
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

        #unscramble-words .uns-btn-primary:hover{
            transform: scale(1.05);
        }

        #unscramble-words .uns-btn-primary:active{
            transform: scale(.95);
        }

        #unscramble-words .uns-btn-reveal{
            color: rgb(154 52 18);
            border-color: rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
        }

        #unscramble-words .uns-btn-reveal:hover{
            background: rgb(254 215 170);
            box-shadow: 0 10px 24px rgba(234,88,12,.14);
        }

        .dark #unscramble-words .uns-btn-reveal{
            color: rgb(254 215 170);
            border-color: rgba(194, 65, 12, .45);
            background: rgba(154, 52, 18, .35);
        }

        .dark #unscramble-words .uns-btn-reveal:hover{
            background: rgba(154, 52, 18, .5);
        }

        #unscramble-words .uns-btn-secondary{
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

        #unscramble-words .uns-btn-secondary:hover{
            transform: scale(1.05);
            background: rgb(248 250 252);
        }

        #unscramble-words .uns-btn-secondary:active{
            transform: scale(.98);
        }

        .dark #unscramble-words .uns-btn-secondary{
            color: #fff;
            border-color: rgb(51 65 85);
            background: rgb(30 41 59);
        }

        .dark #unscramble-words .uns-btn-secondary:hover{
            background: rgb(51 65 85);
        }

        #unscramble-words .uns-btn-warning{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(120 53 15);
            border: 1px solid rgb(253 186 116);
            background: rgb(254 243 199);
            box-shadow: 0 8px 22px rgba(120,53,15,.10);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        #unscramble-words .uns-btn-warning:hover{
            transform: scale(1.05);
            background: rgb(253 230 138);
        }

        #unscramble-words .uns-btn-warning:active{
            transform: scale(.98);
        }

        .dark #unscramble-words .uns-btn-warning{
            color: rgb(254 243 199);
            border-color: rgba(180, 83, 9, .45);
            background: rgba(120, 53, 15, .35);
        }

        .dark #unscramble-words .uns-btn-warning:hover{
            background: rgba(120, 53, 15, .5);
        }

        #unscramble-words .uns-btn-block{
            width: 100%;
            padding-top: .75rem;
            padding-bottom: .75rem;
        }

        #unscramble-words .progress-track{
            height: 10px;
            border-radius: 999px;
            background: rgba(15,23,42,.08);
            overflow: hidden;
        }

        .dark #unscramble-words .progress-track{ background: rgba(255,255,255,.10); }

        #unscramble-words .progress-bar{
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, {{ $customTheme }}, #4f46e5, #3b82f6);
            box-shadow: 0 10px 22px rgba(79,70,229,.18);
        }

        #unscramble-words .player-shell{
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid rgba(99,102,241,.18);
            background:
                linear-gradient(135deg, rgba(99,102,241,.14), rgba(59,130,246,.08)),
                rgba(248,250,255,.94);
            box-shadow: 0 18px 36px -24px rgba(79,70,229,.22);
        }

        .dark #unscramble-words .player-shell{
            border-color: rgba(129,140,248,.28);
            background:
                linear-gradient(135deg, rgba(99,102,241,.20), rgba(59,130,246,.10)),
                rgba(15,23,42,.92);
        }

        #unscramble-words .player-shell-title{
            font-size: .7rem;
            font-weight: 900;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: #4f46e5;
        }

        .dark #unscramble-words .player-shell-title{
            color: #c7d2fe;
        }

        #unscramble-words .play-hit{
            -webkit-tap-highlight-color: transparent;
        }

        #unscramble-words .play-hit:focus-visible{
            outline: none;
        }

        #unscramble-words .audio-listen-btn{
            transition: transform .16s ease;
        }

        #unscramble-words .audio-listen-btn:hover{
            transform: scale(1.04);
        }

        #unscramble-words .wave-bar{
            display:none;
            width:3px;
            height:10px;
            background:currentColor;
            border-radius:999px;
            margin:0 1px;
        }

        #unscramble-words .audio-listen-btn.playing .wave-bar{
            display:block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        #unscramble-words .audio-listen-btn.playing .static-icon{
            display:none;
        }

        #unscramble-words .audio-track{
            position:relative;
            height:8px;
            width:100%;
            border-radius:999px;
            overflow:hidden;
            background: rgba(165,180,252,.42);
        }

        .dark #unscramble-words .audio-track{
            background: rgba(99,102,241,.24);
        }

        #unscramble-words .audio-fill{
            height:100%;
            width:0%;
            border-radius:999px;
            background: linear-gradient(90deg, {{ $customTheme }} 0%, #8b5cf6 100%);
        }

        #unscramble-words .audio-knob{
            position:absolute;
            top:50%;
            left:0%;
            width:12px;
            height:12px;
            border-radius:9999px;
            background:white;
            border:2px solid {{ $customTheme }};
            box-shadow:0 6px 14px rgba(2,6,23,.18);
            transform:translate(-50%, -50%);
            pointer-events:none;
        }

        #unscramble-words .transcript-line{
            border-radius: 18px;
            border: 1px solid rgba(226,232,240,.7);
            background: rgba(255,255,255,.76);
            padding: .75rem;
            text-align: left;
        }

        .dark #unscramble-words .transcript-line{
            border-color: rgba(51,65,85,.7);
            background: rgba(15,23,42,.72);
        }

        @keyframes waveGrowth {
            0%,100% { height:6px; }
            50% { height:14px; }
        }

        #unscramble-words .tile{
            touch-action:none;
            user-select:none;
            -webkit-user-select:none;
            cursor: grab;
            transform: translateZ(0);
            border-radius: 18px;
            background: rgba(255,255,255,.82);
            border: 1px solid rgba(226,232,240,.75);
            box-shadow: 0 14px 30px rgba(2,6,23,.10);
            transition: transform .16s ease, filter .16s ease, opacity .16s ease;
        }

        .dark #unscramble-words .tile{
            background: rgba(2,6,23,.34);
            border-color: rgba(51,65,85,.55);
        }

        #unscramble-words .tile:active{ cursor: grabbing; transform: translateZ(0) scale(.98); }
        #unscramble-words .tile-used{ opacity:.26; transform: scale(.96); pointer-events:none; filter: grayscale(.15); }

        #unscramble-words .slot{
            position: relative;
            border-radius: 18px;
            border: 1.5px dashed rgba(100,116,139,.35);
            background: rgba(255,255,255,.52);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.35);
            transition: box-shadow .16s ease, border-color .16s ease, transform .16s ease;
        }

        .dark #unscramble-words .slot{
            border-color: rgba(148,163,184,.22);
            background: rgba(2,6,23,.30);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.08);
        }

        #unscramble-words .slot-hot{
            border-color: rgba(103,63,231,.85) !important;
            box-shadow: 0 0 0 6px rgba(103,63,231,.14);
            transform: translateY(-1px);
        }

        #unscramble-words .shake { animation: shake .28s ease-in-out 0s 2; }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            50% { transform: translateX(6px); }
            75% { transform: translateX(-4px); }
            100% { transform: translateX(0); }
        }

        #unscramble-words .pop { animation: pop .22s ease-out; }

        @keyframes pop {
            from { transform: scale(.96); }
            to { transform: scale(1); }
        }

        #unscramble-words .confetti{
            position: absolute;
            inset: 0;
            pointer-events:none;
            overflow:hidden;
            border-radius: var(--radius);
        }

        #unscramble-words .confetti i{
            position:absolute;
            top:-12px;
            width:10px;
            height:14px;
            border-radius:3px;
            opacity:.95;
            animation: fall 900ms linear forwards;
        }

        @keyframes fall{
            to{ transform: translateY(520px) rotate(540deg); opacity: 0; }
        }

        #unscramble-words .sentence-shell{
            width: 100%;
        }

        #unscramble-words .sentence-flow{
            display:flex;
            flex-wrap:wrap;
            align-items:center;
            justify-content:center;
            gap:.5rem .65rem;
            text-align:center;
            line-height:1.65;
        }

        #unscramble-words .sentence-text{
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.45;
            letter-spacing: -0.01em;
            color: #0f172a;
        }

        .dark #unscramble-words .sentence-text{
            color:#f8fafc;
        }

        @media (min-width: 640px){
            #unscramble-words .sentence-text{
                font-size: 1.125rem;
            }
        }

        @media (min-width: 1024px){
            #unscramble-words .sentence-text{
                font-size: 1.15rem;
            }
        }

        #unscramble-words .answer-inline{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            flex-wrap:wrap;
            gap:.5rem;
        }

        #unscramble-words .tile-groups{
            display:flex;
            flex-wrap:wrap;
            align-items:center;
            justify-content:center;
            gap:1rem 1.5rem;
        }

        #unscramble-words .tile-word-group{
            display:inline-flex;
            flex-wrap:wrap;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            padding:.45rem .7rem;
            border-radius:1.25rem;
            border:1px dashed rgba(99,102,241,.28);
            background:rgba(99,102,241,.06);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.24);
        }

        .dark #unscramble-words .tile-word-group{
            border-color: rgba(129,140,248,.24);
            background: rgba(99,102,241,.12);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.06);
        }

        #unscramble-words .slot-break{
            margin-right: .75rem;
        }

        @media (max-width: 640px){
            #unscramble-words .slot-break{
                margin-right: .45rem;
            }
        }
    </style>
@endsection

@section("content")
    <main id="unscramble-words" class="font-sans relative isolate min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto dark:text-slate-100 transition-colors duration-300">
        <div class="w-full max-w-7xl min-h-[100dvh] px-4 sm:px-8 mx-auto pb-16 sm:pb-20 flex flex-col">
            <section class="px-2 pb-2 sm:px-5 sm:pb-5 flex-1 flex flex-col">
                <div class="grid place-items-center text-center gap-5 sm:gap-6 flex-1 auto-rows-max">

                    @include('slider.components.title-subtitle')

                    @include('slider.components.game-status')

                    <section class="w-full flex-1 min-h-[420px]">
                        <div class="w-full board h-full p-4 sm:p-5 relative overflow-hidden rounded-2xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-xl">
                            <div id="unscramble-words_confetti" class="confetti"></div>

                            <div class="mb-4 flex flex-wrap items-center justify-between gap-3 text-left">
                                <div class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                    Put the letters in order:
                                </div>

                                <button
                                        id="unscramble-words_reveal"
                                        class="uns-btn-primary uns-btn-reveal"
                                >
                                    Reveal answer
                                </button>
                            </div>

                            @if($lessonAudio || !empty($transcriptLines))
                                <div id="unscramble-words_media_row" class="mb-3">
                                    <div class="player-shell px-3 py-2.5 sm:px-4 sm:py-3">
                                        <div class="mb-2 flex items-center justify-between gap-3">
                                            <div class="player-shell-title">Listen First</div>
                                        </div>

                                        <div class="flex items-center gap-3 sm:gap-4">
                                            @if($lessonAudio)
                                                <button
                                                    id="unscramble-words_play_audio"
                                                    type="button"
                                                    class="play-hit audio-listen-btn inline-flex h-9 w-9 sm:h-10 sm:w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 active:scale-95"
                                                    aria-label="Play audio"
                                                >
                                                    <svg class="static-icon h-3.5 w-3.5 sm:h-4 sm:w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M8 5v14l11-7-11-7z"/>
                                                    </svg>
                                                    <span class="wave-bar" style="animation-delay:.1s"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s"></span>
                                                </button>

                                                <div class="min-w-0 flex-1">
                                                    <div class="flex items-center gap-2.5 sm:gap-3">
                                                        <div class="min-w-0 flex-1 flex flex-col gap-1.5 sm:gap-2">
                                                            <div class="audio-track cursor-pointer" id="unscramble-words_audio_progress_track" aria-label="Audio progress">
                                                                <div class="audio-fill" id="unscramble-words_audio_progress_fill"></div>
                                                                <div class="audio-knob" id="unscramble-words_audio_progress_knob"></div>
                                                            </div>
                                                            <div class="flex justify-between text-[10px] sm:text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                                                <span id="unscramble-words_audio_current_time">0:00</span>
                                                                <span id="unscramble-words_audio_total_time">0:00</span>
                                                            </div>
                                                        </div>
                                                        @if(!empty($transcriptLines))
                                                            <button
                                                                id="unscramble-words_show_transcript"
                                                                type="button"
                                                                class="uns-btn-primary shrink-0 px-2.5 py-1.5 text-[11px] sm:px-3 sm:text-xs"
                                                            >
                                                                <span>Show Transcript</span>
                                                                <span>📄</span>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif(!empty($transcriptLines))
                                                <div class="ml-auto">
                                                    <button
                                                        id="unscramble-words_show_transcript"
                                                        type="button"
                                                        class="uns-btn-primary shrink-0 px-2.5 py-1.5 text-[11px] sm:px-3 sm:text-xs"
                                                    >
                                                        <span>Show Transcript</span>
                                                        <span>📄</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>

                                        @if($lessonAudio)
                                            <audio id="unscramble-words_audio" preload="auto" class="hidden" src="{{ $lessonAudio }}"></audio>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div id="unscramble-words_game" class="grid gap-4 sm:gap-5 overflow-x-hidden">
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-0 items-stretch overflow-hidden rounded-2xl">

                                    <div id="unscramble-words_articleCol" class="hidden sm:col-span-3 border-b sm:border-b-0 sm:border-r border-slate-200/70 dark:border-slate-800 p-4 sm:p-5 flex flex-col items-center justify-center gap-3">
                                        <div id="unscramble-words_tilesA" class="flex items-center justify-center gap-2 flex-wrap min-h-[3rem]"></div>

                                        <div id="unscramble-words_boxA"
                                             class="mx-auto w-[90px] h-[90px] sm:w-[112px] sm:h-[112px] rounded-[22px]
                                                    bg-white/70 dark:bg-slate-950/30
                                                    ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                                    shadow-xl shadow-slate-900/10 dark:shadow-black/40
                                                    flex items-center justify-center hidden">
                                            <div id="unscramble-words_slotsA" class="flex items-center justify-center"></div>
                                        </div>
                                    </div>

                                    <div id="unscramble-words_mainCol" class="sm:col-span-12 min-w-0 w-full p-5 sm:p-6 text-left">
                                        <div id="unscramble-words_tilesM" class="w-full flex items-center justify-center gap-2 sm:gap-3 flex-wrap min-h-[4rem]"></div>

                                        <div id="unscramble-words_boxM"
                                             class="mt-3 sm:mt-4 w-full rounded-[26px]
                                                    bg-white/70 dark:bg-slate-950/30
                                                    ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                                    shadow-xl shadow-slate-900/10 dark:shadow-black/40
                                                    px-3 py-4 sm:px-6 sm:py-6">
                                            <div class="sentence-shell">
                                                <div class="sentence-flow">
                                                    <span id="unscramble-words_before" class="sentence-text"></span>
                                                    <span id="unscramble-words_slotsM" class="answer-inline"></span>
                                                    <span id="unscramble-words_after" class="sentence-text"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3 flex flex-wrap items-center justify-center gap-1.5 sm:gap-2 text-[11px] sm:text-sm font-semibold leading-[1.35] text-slate-900 dark:text-slate-100">
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 sm:px-3 sm:py-1.5 pill">
                                                👆 Tap
                                            </span>
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 sm:px-3 sm:py-1.5 pill">
                                                🤏 Drag
                                            </span>
                                            <span class="inline-flex items-center gap-1 rounded-full px-2.5 py-1 sm:px-3 sm:py-1.5 pill">
                                                ✖ Tap box to remove
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                                <button id="unscramble-words_reset"
                                        class="uns-btn-secondary uns-btn-block">
                                    Reset 🔁
                                </button>

                                <button id="unscramble-words_hint"
                                        class="uns-btn-warning uns-btn-block">
                                    Shuffle ✨
                                </button>

                                <button id="unscramble-words_prev"
                                        class="uns-btn-secondary uns-btn-block">
                                    Previous
                                </button>

                                <button id="unscramble-words_next"
                                        class="uns-btn-primary uns-btn-block">
                                    Next
                                </button>
                            </div>
                        </div>
                    </section>

                    <div id="unscramble-results-overlay" class="hidden fixed inset-0 z-50">
                        <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>

                        <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                            <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                                <div class="p-6 sm:p-8 text-left">
                                    <div class="text-6xl mb-3">🎉</div>

                                    <h2 class="tracking-tight text-3xl sm:text-4xl font-black dark:text-white">
                                        Done!
                                    </h2>

                                    <div class="mt-5 w-full grid grid-cols-1 sm:grid-cols-3 gap-3">
                                        <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                            <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Score</div>
                                            <div id="unscramble-final-score" class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">0</div>
                                        </div>
                                        <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                            <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Time</div>
                                            <div id="unscramble-final-time" class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">00:00</div>
                                        </div>
                                        <div class="p-3 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                            <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Mistakes</div>
                                            <div id="unscramble-final-mistakes" class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">0</div>
                                        </div>
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <button
                                                id="unscramble-restart-popup"
                                                class="uns-btn-secondary uns-btn-block">
                                            Restart 🔁
                                        </button>

                                        <button
                                                id="unscramble-continue-popup"
                                                class="uns-btn-primary uns-btn-block">
                                            Continue ⚡
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($transcriptLines))
                        <div id="unscramble-transcript-overlay" class="hidden fixed inset-0 z-50">
                            <div id="unscramble-transcript-backdrop" class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>

                            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                                <div class="w-full max-w-3xl max-h-[85dvh] overflow-hidden rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                                    <div class="flex items-center justify-between gap-3 border-b border-slate-200/60 dark:border-slate-700/40 p-4 sm:p-5">
                                        <div class="min-w-0">
                                            <div class="text-sm sm:text-base font-black text-slate-900 dark:text-slate-50">Transcript</div>
                                        </div>

                                        <button
                                            id="unscramble-close-transcript"
                                            type="button"
                                            class="uns-btn-secondary"
                                            aria-label="Close transcript"
                                        >
                                            Close
                                        </button>
                                    </div>

                                    <div class="max-h-[70vh] overflow-auto p-4 sm:p-5 text-left">
                                        <div id="unscramble-transcript-list" class="space-y-2 text-left"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </section>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const RAW_QUESTIONS = @json($content['questions'] ?? []);
            const RAW_SENTENCES = @json($content['sentences'] ?? []);
            const RAW_SCRAMBLE = @json($content['scramble'] ?? []);
            const LESSON_AUDIO_SRC = @json($lessonAudio);
            const TRANSCRIPT_LINES = @json($transcriptLines);

            const root = document.getElementById("unscramble-words");
            if (!root) return;

            const titleBlock = document.getElementById("unscramble-words_title");
            const roundLabel = document.getElementById("tilesCount");
            const resetBtn = document.getElementById("unscramble-words_reset");
            const hintBtn = document.getElementById("unscramble-words_hint");
            if (hintBtn) hintBtn.innerHTML = 'Hint 💡 (<span id="unscramble-words_hint_count">2</span>)';
            const hintCount = document.getElementById("unscramble-words_hint_count");
            const revealBtn = document.getElementById("unscramble-words_reveal");
            const prevBtn = document.getElementById("unscramble-words_prev");
            const nextBtn = document.getElementById("unscramble-words_next");

            const correctCount = document.getElementById("correctCount");
            const mistakesCount = document.getElementById("mistakesCount");
            const timerEl = document.getElementById("gameTimer");
            const confetti = document.getElementById("unscramble-words_confetti");
            const beforeEl = document.getElementById("unscramble-words_before");
            const afterEl = document.getElementById("unscramble-words_after");
            const tilesMEl = document.getElementById("unscramble-words_tilesM");
            const slotsMEl = document.getElementById("unscramble-words_slotsM");
            const boxM = document.getElementById("unscramble-words_boxM");
            const lessonAudioEl = document.getElementById("unscramble-words_audio");
            const playLessonAudioBtn = document.getElementById("unscramble-words_play_audio");
            const lessonAudioTrack = document.getElementById("unscramble-words_audio_progress_track");
            const lessonAudioFill = document.getElementById("unscramble-words_audio_progress_fill");
            const lessonAudioKnob = document.getElementById("unscramble-words_audio_progress_knob");
            const lessonAudioCurrentTimeEl = document.getElementById("unscramble-words_audio_current_time");
            const lessonAudioTotalTimeEl = document.getElementById("unscramble-words_audio_total_time");
            const showTranscriptBtn = document.getElementById("unscramble-words_show_transcript");
            const transcriptOverlay = document.getElementById("unscramble-transcript-overlay");
            const transcriptBackdrop = document.getElementById("unscramble-transcript-backdrop");
            const closeTranscriptBtn = document.getElementById("unscramble-close-transcript");
            const transcriptList = document.getElementById("unscramble-transcript-list");

            const resultsOverlay = document.getElementById("unscramble-results-overlay");
            const finalScoreEl = document.getElementById("unscramble-final-score");
            const finalTimeEl = document.getElementById("unscramble-final-time");
            const finalMistakesEl = document.getElementById("unscramble-final-mistakes");
            const restartPopupBtn = document.getElementById("unscramble-restart-popup");
            const continuePopupBtn = document.getElementById("unscramble-continue-popup");

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
                tap: new Audio('/slider/sounds/click.wav')
            };

            audio.correct.volume = 0.55;
            audio.wrong.volume = 0.55;
            audio.success.volume = 0.65;
            audio.tap.volume = 0.25;

            function play(sound){
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(()=>{});
            }

            function formatTime(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${mins}:${String(secs).padStart(2, '0')}`;
            }

            function syncLessonAudioUI() {
                if (!lessonAudioEl) return;

                const duration = isFinite(lessonAudioEl.duration) ? lessonAudioEl.duration : 0;
                const current = isFinite(lessonAudioEl.currentTime) ? lessonAudioEl.currentTime : 0;
                const pct = duration > 0 ? (current / duration) * 100 : 0;

                if (lessonAudioCurrentTimeEl) lessonAudioCurrentTimeEl.textContent = formatTime(current);
                if (lessonAudioTotalTimeEl) lessonAudioTotalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
                if (lessonAudioFill) lessonAudioFill.style.width = `${pct}%`;
                if (lessonAudioKnob) lessonAudioKnob.style.left = `${pct}%`;
                if (playLessonAudioBtn) playLessonAudioBtn.classList.toggle('playing', !lessonAudioEl.paused);
            }

            function stopLessonAudio() {
                if (!lessonAudioEl) return;
                lessonAudioEl.pause();
                lessonAudioEl.currentTime = 0;
                syncLessonAudioUI();
            }

            function bindLessonAudioUI() {
                if (!lessonAudioEl) return;

                if (LESSON_AUDIO_SRC && lessonAudioEl.getAttribute('src') !== LESSON_AUDIO_SRC) {
                    lessonAudioEl.src = LESSON_AUDIO_SRC;
                }

                lessonAudioEl.preload = 'metadata';

                if (playLessonAudioBtn) {
                    playLessonAudioBtn.addEventListener('click', () => {
                        if (lessonAudioEl.paused) lessonAudioEl.play().catch(() => {});
                        else lessonAudioEl.pause();
                    });
                }

                if (lessonAudioTrack) {
                    lessonAudioTrack.addEventListener('click', (event) => {
                        const rect = event.currentTarget.getBoundingClientRect();
                        const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                        const ratio = rect.width > 0 ? x / rect.width : 0;

                        if (isFinite(lessonAudioEl.duration) && lessonAudioEl.duration > 0) {
                            lessonAudioEl.currentTime = ratio * lessonAudioEl.duration;
                            syncLessonAudioUI();
                        }
                    });
                }

                ['loadedmetadata', 'timeupdate', 'ended', 'play', 'pause'].forEach((eventName) => {
                    lessonAudioEl.addEventListener(eventName, syncLessonAudioUI);
                });
            }

            function renderTranscript() {
                if (!transcriptList) return 0;
                transcriptList.innerHTML = '';

                TRANSCRIPT_LINES.forEach((line, index) => {
                    const item = document.createElement('div');
                    item.className = 'transcript-line';

                    const row = document.createElement('div');
                    row.className = 'flex items-start gap-3';

                    const badge = document.createElement('div');
                    badge.className = 'h-7 w-7 rounded-2xl flex items-center justify-center font-black text-xs border border-slate-200/70 bg-white/70 text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200';
                    badge.textContent = String(index + 1);

                    const text = document.createElement('div');
                    text.className = 'min-w-0 flex-1 text-sm font-semibold text-slate-700 dark:text-slate-200';
                    text.textContent = line;

                    row.appendChild(badge);
                    row.appendChild(text);
                    item.appendChild(row);
                    transcriptList.appendChild(item);
                });

                return TRANSCRIPT_LINES.length;
            }

            function sfx(type){
                if (type === "ok") play(audio.correct);
                if (type === "no") play(audio.wrong);
                if (type === "done") play(audio.success);
                if (type === "tap") play(audio.tap);
            }

            function normalizeScrambleItem(item) {
                if (Array.isArray(item)) {
                    return item
                        .map((value) => String(value ?? '').trim())
                        .filter(Boolean);
                }

                if (typeof item === 'string' || typeof item === 'number') {
                    return String(item ?? '').trim();
                }

                const value =
                    item?.word
                    ?? item?.label
                    ?? item?.text
                    ?? item?.value
                    ?? '';

                if (Array.isArray(value)) {
                    return value
                        .map((entry) => String(entry ?? '').trim())
                        .filter(Boolean);
                }

                return String(value).trim();
            }

            function buildQuestions(rawQuestions, rawSentences, rawScramble) {
                if (Array.isArray(rawQuestions) && rawQuestions.length) {
                    return rawQuestions;
                }

                const sentences = Array.isArray(rawSentences) ? rawSentences : [];
                const scramble = Array.isArray(rawScramble)
                    ? rawScramble.map(normalizeScrambleItem)
                    : [];
                return sentences
                    .map((sentence) => {
                        const text = String(sentence ?? '');
                        const placeholderRegex = new RegExp('\\{\\{\\s*(\\d+)\\s*\\}\\}', 'g');
                        const matches = [];
                        let match;

                        while ((match = placeholderRegex.exec(text)) !== null) {
                            matches.push(match);
                        }

                        if (!matches.length) return null;

                        const firstMatch = matches[0];
                        const lastMatch = matches[matches.length - 1];
                        const before = text.slice(0, firstMatch.index).replace(/\s+$/g, '');
                        const after = text
                            .slice((lastMatch.index ?? 0) + lastMatch[0].length)
                            .replace(/^\s+/g, '');

                        const answerItems = matches
                            .map((match) => {
                                const answerIndex = Number(match[1]) - 1;
                                return scramble[answerIndex] ?? '';
                            })
                            .filter((value) => Array.isArray(value) ? value.length > 0 : String(value ?? '').trim() !== '');

                        if (!answerItems.length) return null;

                        const answer = answerItems.length === 1
                            ? answerItems[0]
                            : answerItems.flatMap((value) => Array.isArray(value) ? value : [value]);

                        return {
                            before,
                            after,
                            answer,
                        };
                    })
                    .filter(Boolean);
            }

            const QUESTION_SOURCE = Array.isArray(buildQuestions(RAW_QUESTIONS, RAW_SENTENCES, RAW_SCRAMBLE))
                ? buildQuestions(RAW_QUESTIONS, RAW_SENTENCES, RAW_SCRAMBLE)
                : [];

            function normalizeQuestion(item) {
                const rawAnswer = item?.answer ?? '';
                let answerParts = [];

                if (Array.isArray(rawAnswer)) {
                    answerParts = rawAnswer
                        .map(part => String(part ?? '').trim())
                        .filter(Boolean);
                } else {
                    const answer = String(rawAnswer ?? '').trim();
                    answerParts = answer ? answer.split(/\s+/).filter(Boolean) : [];
                }

                const useWordTiles = Array.isArray(rawAnswer)
                    ? rawAnswer.some(part => /\s/.test(String(part ?? '').trim()))
                    : /\s/.test(String(rawAnswer ?? '').trim());
                const answerTokens = useWordTiles
                    ? answerParts.join(' ').split(/\s+/).filter(Boolean)
                    : answerParts.join('').split('');
                const wordBreaks = [];
                let letterCount = 0;

                answerParts.forEach((part, index) => {
                    letterCount += part.length;
                    if (index < answerParts.length - 1) {
                        wordBreaks.push(letterCount - 1);
                    }
                });

                return {
                    before: String(item?.before ?? '').trim(),
                    after: String(item?.after ?? '').trim(),
                    answerParts,
                    answer: answerParts.join(' '),
                    answerTokens,
                    answerNormalized: useWordTiles
                        ? answerTokens.join(' ').toLowerCase()
                        : answerTokens.join('').toLowerCase(),
                    useWordTiles,
                    wordBreaks,
                };
            }

            function shuffle(arr){
                for (let i = arr.length - 1; i > 0; i--){
                    const j = Math.floor(Math.random() * (i + 1));
                    [arr[i], arr[j]] = [arr[j], arr[i]];
                }
                return arr;
            }

            function makeId(){
                return Math.random().toString(16).slice(2) + Date.now().toString(16);
            }

            function buildRound(item){
                const q = normalizeQuestion(item);
                let globalIndex = 0;
                let letters = [];

                if (q.useWordTiles) {
                    letters = q.answerTokens.map((word) => ({
                        id: makeId(),
                        text: word,
                        used: false,
                        originalIndex: globalIndex++,
                        groupIndex: 0,
                        rot: (Math.random() * 10 - 5).toFixed(1)
                    }));

                    if (letters.length > 1) {
                        let attempts = 0;
                        while (attempts < 12 && letters.every((tile, i) => tile.text === q.answerTokens[i])) {
                            shuffle(letters);
                            attempts += 1;
                        }

                        if (letters.every((tile, i) => tile.text === q.answerTokens[i])) {
                            letters.push(letters.shift());
                        }
                    }

                    return {
                        ...q,
                        letters,
                        slots: q.answerTokens.map(() => ({ tileId: null, text: "" })),
                        solved: false,
                    };
                }

                q.answerParts.forEach((part, groupIndex) => {
                    const originalTokens = part.split('');
                    const groupLetters = originalTokens.map((ch) => ({
                        id: makeId(),
                        text: ch,
                        used: false,
                        originalIndex: globalIndex++,
                        groupIndex,
                        rot: (Math.random() * 10 - 5).toFixed(1)
                    }));

                    if (groupLetters.length > 1) {
                        let attempts = 0;
                        while (attempts < 12 && groupLetters.every((tile, i) => tile.text === originalTokens[i])) {
                            shuffle(groupLetters);
                            attempts += 1;
                        }
                    }

                    letters = letters.concat(groupLetters);
                });

                return {
                    ...q,
                    letters,
                    slots: q.answerTokens.map(() => ({ tileId: null, text: "" })),
                    solved: false,
                };
            }

            const state = {
                idx: 0,
                locked: false,
                correct: 0,
                mistakes: 0,
                hintsLeft: 2,
                rounds: QUESTION_SOURCE.map(buildRound),
            };

            let timerInt = null;
            let startTime = Date.now();

            let drag = {
                active: false,
                pointerId: null,
                tileId: null,
                ghost: null,
                over: null,
                startX: 0,
                startY: 0,
                moved: false,
            };
            let suppressClickUntil = 0;

            function currentRound(){
                return state.rounds[state.idx] || null;
            }

            function clearHot(){
                root.querySelectorAll(".slot-hot").forEach(el => el.classList.remove("slot-hot"));
            }

            function ghostMove(x, y){
                if (!drag.ghost) return;
                drag.ghost.style.left = x + "px";
                drag.ghost.style.top  = y + "px";
            }

            function startGhost(btn, x, y){
                const g = btn.cloneNode(true);
                g.style.position = "fixed";
                g.style.zIndex = "9999";
                g.style.pointerEvents = "none";
                g.style.transform = "translate(-50%,-50%) scale(1.05)";
                g.style.opacity = "0.92";
                g.classList.add("shadow-2xl");
                document.body.appendChild(g);
                drag.ghost = g;
                ghostMove(x, y);
            }

            function stopGhost(){
                if (drag.ghost){
                    drag.ghost.remove();
                    drag.ghost = null;
                }
                clearHot();
                drag.over = null;
            }

            function slotUnderPointer(x, y){
                const el = document.elementFromPoint(x, y);
                return el?.closest?.(".slot") || null;
            }

            function stopDragging() {
                drag.active = false;
                drag.pointerId = null;
                drag.tileId = null;
                drag.moved = false;
                stopGhost();
                document.removeEventListener("pointermove", handleGlobalPointerMove);
                document.removeEventListener("pointerup", handleGlobalPointerUp);
                document.removeEventListener("pointercancel", handleGlobalPointerUp);
            }

            function maybeStartDragging(clientX, clientY, tileId, button) {
                if (drag.active) return;
                const dx = clientX - drag.startX;
                const dy = clientY - drag.startY;

                if (Math.hypot(dx, dy) < 8) return;

                drag.active = true;
                drag.moved = true;
                drag.tileId = tileId;
                startGhost(button, clientX, clientY);
            }

            function handleGlobalPointerMove(event) {
                if (drag.pointerId !== event.pointerId) return;

                const button = root.querySelector(`[data-tile-id="${drag.tileId}"]`);
                if (!button) return;

                maybeStartDragging(event.clientX, event.clientY, drag.tileId, button);
                if (!drag.active) return;

                event.preventDefault();
                ghostMove(event.clientX, event.clientY);

                const slot = slotUnderPointer(event.clientX, event.clientY);
                clearHot();

                if (slot && !slot.dataset.filled) {
                    slot.classList.add("slot-hot");
                    drag.over = slot;
                } else {
                    drag.over = null;
                }
            }

            function handleGlobalPointerUp(event) {
                if (drag.pointerId !== event.pointerId) return;

                const tileId = drag.tileId;
                const slot = drag.over;
                const wasDragging = drag.active;

                stopDragging();
                if (wasDragging) suppressClickUntil = Date.now() + 120;

                if (!wasDragging || !slot || !tileId) return;

                const idx = Number(slot.dataset.slotIndex);
                placeTile(tileId, { preferredSlot: idx });
            }

            function renderTiles(el, tiles){
                el.innerHTML = "";
                el.classList.add("tile-groups");

                let currentGroup = null;
                let currentGroupEl = null;

                tiles.forEach(t => {
                    if (currentGroup !== t.groupIndex) {
                        currentGroup = t.groupIndex;
                        currentGroupEl = document.createElement("div");
                        currentGroupEl.className = "tile-word-group";
                        el.appendChild(currentGroupEl);
                    }

                    const btn = document.createElement("button");
                    btn.type = "button";
                    btn.className =
                        "tile inline-flex items-center justify-center " +
                        "min-h-[44px] min-w-[56px] px-3 py-2 sm:min-h-[56px] sm:min-w-[76px] sm:px-4 " +
                        "active:scale-95 text-sm sm:text-xl font-black text-slate-900 dark:text-slate-50";

                    btn.textContent = t.text;
                    btn.dataset.tileId = t.id;
                    btn.style.transform = `rotate(${t.rot}deg)`;

                    if (t.used) btn.classList.add("tile-used");

                    btn.addEventListener("click", () => {
                        if (state.locked || t.used) return;
                        if (Date.now() < suppressClickUntil) return;
                        sfx("tap");
                        placeTile(t.id);
                    });

                    btn.addEventListener("pointerdown", (e) => {
                        if (state.locked || t.used) return;
                        drag.pointerId = e.pointerId;
                        drag.tileId = t.id;
                        drag.startX = e.clientX;
                        drag.startY = e.clientY;
                        drag.moved = false;
                        drag.over = null;
                        document.addEventListener("pointermove", handleGlobalPointerMove, { passive: false });
                        document.addEventListener("pointerup", handleGlobalPointerUp);
                        document.addEventListener("pointercancel", handleGlobalPointerUp);
                        btn.setPointerCapture?.(e.pointerId);
                    });

                    currentGroupEl?.appendChild(btn);
                });
            }

            function renderSlots(el, round){
                el.innerHTML = "";

                let currentGroupEl = null;

                round.slots.forEach((s, idx) => {
                    if (idx === 0 || round.wordBreaks.includes(idx - 1)) {
                        currentGroupEl = document.createElement("div");
                        currentGroupEl.className = "tile-word-group";
                        el.appendChild(currentGroupEl);
                    }

                    const b = document.createElement("button");
                    b.type = "button";
                    b.className =
                        "slot inline-flex items-center justify-center " +
                        "min-h-[44px] min-w-[44px] px-3 py-2 sm:min-h-[56px] sm:min-w-[56px] sm:px-4 " +
                        "shadow-sm active:scale-95 transition-transform relative";

                    b.dataset.slotIndex = String(idx);
                    if (s.text) b.dataset.filled = "1";
                    if (round.wordBreaks.includes(idx)) b.classList.add("slot-break");

                    const txt = document.createElement("span");
                    txt.className = "text-sm sm:text-xl font-black text-slate-900 dark:text-slate-50";
                    txt.textContent = s.text || "";
                    b.appendChild(txt);

                    b.addEventListener("click", () => {
                        if (state.locked || round.solved) return;
                        clearSlot(idx);
                    });

                    currentGroupEl?.appendChild(b);
                });
            }

            function findTile(id){
                const round = currentRound();
                return round ? round.letters.find(t => t.id === id) || null : null;
            }

            function nextEmptySlot(){
                const round = currentRound();
                return round ? round.slots.findIndex(s => !s.tileId) : -1;
            }

            function bounceBox(){
                if (!boxM) return;
                boxM.classList.remove("pop");
                void boxM.offsetWidth;
                boxM.classList.add("pop");
            }

            function placeTile(tileId, opts = {}){
                const round = currentRound();
                const tile = findTile(tileId);
                if (!round || !tile || tile.used || round.solved) return;

                let slotIndex = typeof opts.preferredSlot === "number" ? opts.preferredSlot : -1;
                if (!(slotIndex >= 0 && round.slots[slotIndex] && !round.slots[slotIndex].tileId)){
                    slotIndex = nextEmptySlot();
                }
                if (slotIndex < 0) return;

                round.slots[slotIndex].tileId = tile.id;
                round.slots[slotIndex].text = tile.text;
                tile.used = true;

                syncUI();
                bounceBox();

                if (allFilled()) {
                    setTimeout(() => {
                        checkCurrent();
                    }, 120);
                }
            }

            function clearSlot(idx){
                const round = currentRound();
                if (!round) return;

                const s = round.slots[idx];
                if (!s || !s.tileId) return;

                const tile = findTile(s.tileId);
                if (tile) tile.used = false;

                s.tileId = null;
                s.text = "";
                syncUI();
            }

            function resetRound(){
                const round = currentRound();
                if (!round) return;

                round.letters.forEach(t => t.used = false);
                round.slots.forEach(s => {
                    s.tileId = null;
                    s.text = "";
                });
                syncUI();
            }

            function allFilled(){
                const round = currentRound();
                return round ? round.slots.every(s => !!s.tileId) : false;
            }

            function currentAnswerString(){
                const round = currentRound();
                if (!round) return '';
                return round.useWordTiles
                    ? round.slots.map(s => s.text).join(' ')
                    : round.slots.map(s => s.text).join('');
            }

            function flashShake(){
                boxM.classList.remove("shake");
                void boxM.offsetWidth;
                boxM.classList.add("shake");
            }

            function doConfetti(){
                if (!confetti) return;
                confetti.innerHTML = "";
                const colors = ["#673fe7","#4f46e5","#3b82f6","#a78bfa","#22c55e","#f59e0b"];

                for (let i = 0; i < 28; i++){
                    const p = document.createElement("i");
                    p.style.left = (Math.random() * 100) + "%";
                    p.style.background = colors[Math.floor(Math.random() * colors.length)];
                    p.style.animationDelay = (Math.random() * 120) + "ms";
                    confetti.appendChild(p);
                }

                setTimeout(() => { confetti.innerHTML = ""; }, 1200);
            }

            function setButtonDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle("opacity-60", disabled);
                button.classList.toggle("pointer-events-none", disabled);
                button.classList.toggle("cursor-not-allowed", disabled);
            }

            function updateTopUI(){
                const total = state.rounds.length;
                const round = currentRound();

                if (roundLabel) roundLabel.textContent = total ? `${state.idx + 1}/${total}` : "0/0";
                if (correctCount) correctCount.textContent = String(state.correct);
                if (mistakesCount) mistakesCount.textContent = String(state.mistakes);
                if (hintCount) hintCount.textContent = String(state.hintsLeft);

                setButtonDisabledState(prevBtn, state.idx <= 0);
                setButtonDisabledState(nextBtn, state.idx >= total - 1);
                setButtonDisabledState(hintBtn, !round || round.solved || state.hintsLeft <= 0);
                setButtonDisabledState(revealBtn, !round || round.solved);
            }

            function syncUI(){
                const round = currentRound();
                if (!round) {
                    beforeEl.textContent = "";
                    afterEl.textContent = "";
                    tilesMEl.innerHTML = "";
                    slotsMEl.innerHTML = "";
                    updateTopUI();
                    return;
                }

                beforeEl.textContent = round.before;
                afterEl.textContent = round.after;
                renderTiles(tilesMEl, round.letters);
                renderSlots(slotsMEl, round);
                updateTopUI();
            }

            function shuffleCurrent(){
                const round = currentRound();
                if (!round || round.solved) return;

                const unused = round.letters.filter(t => !t.used);
                shuffle(unused);

                let ptr = 0;
                round.letters = round.letters.map(tile => {
                    if (tile.used) return tile;
                    const next = unused[ptr];
                    ptr += 1;
                    return next;
                });

                syncUI();
            }

            function useHint(){
                const round = currentRound();
                if (!round || round.solved || state.hintsLeft <= 0) return;

                const firstMissing = round.slots.findIndex(slot => !slot.tileId);
                if (firstMissing < 0) return;

                const needed = round.answerTokens[firstMissing];
                const tile = round.letters.find(item => !item.used && item.text === needed);
                if (!tile) return;

                state.hintsLeft -= 1;
                placeTile(tile.id, { preferredSlot: firstMissing });
                updateTopUI();
            }

            function revealCurrent(){
                const round = currentRound();
                if (!round || round.solved) return;

                round.letters.forEach(tile => {
                    tile.used = false;
                });
                round.slots.forEach(slot => {
                    slot.tileId = null;
                    slot.text = "";
                });

                round.answerTokens.forEach((token, index) => {
                    const tile = round.letters.find(item => !item.used && item.text === token);
                    if (!tile) return;

                    tile.used = true;
                    round.slots[index].tileId = tile.id;
                    round.slots[index].text = tile.text;
                });

                round.solved = true;
                round.revealed = true;
                state.mistakes += 1;
                if (mistakesCount) mistakesCount.textContent = String(state.mistakes);
                syncUI();

                if (state.rounds.every(item => item.solved)) {
                    setTimeout(() => {
                        finishGame();
                    }, 650);
                }
            }

            function checkCurrent(){
                const round = currentRound();
                if (!round || round.solved) return;

                if (!allFilled()) {
                    sfx("no");
                    flashShake();
                    return;
                }

                if (currentAnswerString().toLowerCase() === round.answerNormalized) {
                    round.solved = true;
                    state.correct += 1;
                    sfx("ok");
                    doConfetti();
                    syncUI();

                    setTimeout(() => {
                        if (state.rounds.every(item => item.solved)) {
                            finishGame();
                            return;
                        }

                        const nextUnsolved = state.rounds.findIndex((item, index) => index > state.idx && !item.solved);
                        if (nextUnsolved >= 0) {
                            state.idx = nextUnsolved;
                            loadRound(state.idx);
                            return;
                        }

                        const fallbackUnsolved = state.rounds.findIndex(item => !item.solved);
                        if (fallbackUnsolved >= 0) {
                            state.idx = fallbackUnsolved;
                            loadRound(state.idx);
                        }
                    }, 650);
                } else {
                    state.mistakes += 1;
                    if (mistakesCount) mistakesCount.textContent = String(state.mistakes);
                    sfx("no");
                    flashShake();
                }
            }

            function startTimer() {
                if (timerInt) clearInterval(timerInt);
                startTime = Date.now();
                timerInt = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                    const secs = String(elapsed % 60).padStart(2, '0');
                    if (timerEl) timerEl.textContent = `${mins}:${secs}`;
                }, 1000);
            }

            function loadRound(i){
                resultsOverlay?.classList.add("hidden");
                state.idx = i;
                syncUI();

                if (window.gsap && !window.matchMedia("(prefers-reduced-motion: reduce)").matches){
                    const items = [tilesMEl, boxM].filter(Boolean);
                    gsap.killTweensOf(items);
                    gsap.set(items, { clearProps: "all" });
                    gsap.from(items, { opacity: 0, y: 10, duration: 0.5, stagger: 0.06, ease: "power3.out" });
                }
            }

            function finishGame(){
                state.locked = true;
                if (timerInt) clearInterval(timerInt);
                sfx("done");
                resultsOverlay?.classList.remove("hidden");

                if (roundLabel) roundLabel.textContent = `Done • ${state.rounds.length}/${state.rounds.length}`;
                if (finalScoreEl) finalScoreEl.textContent = `${state.correct}/${state.rounds.length}`;
                if (finalTimeEl) finalTimeEl.textContent = timerEl?.textContent || "00:00";
                if (finalMistakesEl) finalMistakesEl.textContent = String(state.mistakes);
                doConfetti();
            }

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

            resetBtn?.addEventListener("click", () => {
                if (state.locked) return;
                resetRound();
            });

            hintBtn?.addEventListener("click", () => {
                if (state.locked) return;
                useHint();
            });

            revealBtn?.addEventListener("click", () => {
                if (state.locked) return;
                revealCurrent();
            });

            prevBtn?.addEventListener("click", (e) => {
                e.preventDefault();
                if (state.locked || state.idx <= 0) return;
                loadRound(state.idx - 1);
            });

            nextBtn?.addEventListener("click", (e) => {  
                e.preventDefault();
                if (state.locked || state.idx >= state.rounds.length - 1) return;
                loadRound(state.idx + 1);
            });

            continuePopupBtn?.addEventListener("click", (e) => {
                e.preventDefault();
                goNextSlide();
            });

            restartPopupBtn?.addEventListener("click", (e) => {
                e.preventDefault();
                window.resetSlide();
            });

            showTranscriptBtn?.addEventListener("click", () => {
                if (renderTranscript() > 0) {
                    transcriptOverlay?.classList.remove("hidden");
                }
            });

            closeTranscriptBtn?.addEventListener("click", () => {
                transcriptOverlay?.classList.add("hidden");
            });

            transcriptBackdrop?.addEventListener("click", () => {
                transcriptOverlay?.classList.add("hidden");
            });

            bindLessonAudioUI();

            function playIn(){
                if (!window.gsap || !titleBlock) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
                gsap.killTweensOf(titleBlock);
                gsap.set(titleBlock, { clearProps: "all" });
                gsap.from(titleBlock, { opacity: 0, y: 16, duration: 0.85, ease: "power3.out" });
            }

            window.resetSlide = () => {
                if (timerInt) clearInterval(timerInt);
                stopDragging();
                state.idx = 0;
                state.locked = false;
                state.correct = 0;
                state.mistakes = 0;
                state.hintsLeft = 2;
                state.rounds = QUESTION_SOURCE.map(buildRound);

                if (correctCount) correctCount.textContent = "0";
                if (mistakesCount) mistakesCount.textContent = "0";
                if (timerEl) timerEl.textContent = "00:00";

                transcriptOverlay?.classList.add("hidden");
                stopLessonAudio();
                startTimer();
                loadRound(0);
            };

            window.stopSlideAudio = function(){
                stopDragging();
                stopLessonAudio();
                Object.values(audio).forEach(a => {
                    if (a){
                        a.pause();
                        a.currentTime = 0;
                    }
                });
            };

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    stopLessonAudio();
                    Object.values(audio).forEach(a => {
                        if (a) {
                            a.pause();
                            a.currentTime = 0;
                        }
                    });
                }
            });

            if (!state.rounds.length) {
                syncUI();
            } else {
                playIn();
                startTimer();
                loadRound(0);
            }
        });
    </script>
@endsection
