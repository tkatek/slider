<?php
$content = [
    'page_title' => 'Grammar: Degrees of comparison',
    'title'      => 'Grammar',
    'subtitle'   => 'Degrees of comparison',
    'video_title'=> 'Let’s watch this video first',
    'question'=>[
        'title'=>'Where’s the adjective in each of these two examples?',
        'instruction' => 'Type the correct answer.',
        'options'=>[
            [
                'sentence'=>'Regular fuel is ________ than Premium one..',
                'correct'=>'cheaper',
            ],[
                'sentence'=>'Diesel is the ________ fuel',
                'correct'=>'cheapest',
            ],
        ],
    ],
    'shorts'     => [
        [
            'src'       => materialAsset('slider/A1/Beginner/chapter-4/video/encrypted/short1.m3u8'),
            'thumbnail' => materialAsset('slider/A1/Beginner/chapter-4/video/thambnail-short1.webp'),
            'showCC'    => false,
            'subtitles' => [
                ['start' => 0,  'end' => 1,  'text' => 'I'],
                ['start' => 1,  'end' => 2,  'text' => 'You'],
                ['start' => 2,  'end' => 2.5,  'text' => 'He'],
                ['start' => 2.5,  'end' => 3,  'text' => 'She'],
                ['start' => 3,  'end' => 4, 'text' => 'It'],
                ['start' => 4,  'end' => 5.5, 'text' => 'We'],
                ['start' => 5.5,  'end' => 6.5, 'text' => 'You'],
                ['start' => 6.5,  'end' => 7, 'text' => 'They'],
            ],
        ]
    ],
];
?>
@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet">

    <style>
        :root {
            --short-sub-bg: rgba(15, 23, 42, 0.85);
        }

        .dark {
            --short-sub-bg: rgba(30, 41, 59, 0.82);
        }

        .shorts-player-shell .video-js {
            width: 100%;
            height: 100%;
            background: transparent;
            font-family: inherit;
        }

        .shorts-player-shell .video-js .vjs-tech,
        .shorts-player-shell .video-js video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .shorts-player-shell .video-js .vjs-poster {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .shorts-player-shell .video-js .vjs-control-bar,
        .shorts-player-shell .video-js .vjs-big-play-button,
        .shorts-player-shell .video-js .vjs-loading-spinner,
        .shorts-player-shell .video-js .vjs-text-track-display {
            display: none !important;
        }

        .short-subtitle-text {
            display: inline-block;
            background: var(--short-sub-bg);
            color: #fff;
            font-weight: 700;
            letter-spacing: -0.01em;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.10);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.45);
            opacity: 0;
            transform: translateY(12px) scale(0.95);
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .short-subtitle-text.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .short-video-paused [data-short-overlay] {
            opacity: 1;
            pointer-events: auto;
        }

        .short-play-btn-anim {
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .short-video-paused [data-short-overlay]:hover .short-play-btn-anim {
            transform: scale(1.08);
        }

        .quiz-option {
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background-color 0.18s ease, color 0.18s ease;
        }

        .quiz-option:hover {
            transform: translateY(-1px);
        }

        .quiz-option.is-wrong {
            background: rgba(254, 226, 226, 0.95);
            border-color: rgba(239, 68, 68, 0.45);
            color: #b91c1c;
        }

        .dark .quiz-option.is-wrong {
            background: rgba(127, 29, 29, 0.32);
            border-color: rgba(248, 113, 113, 0.45);
            color: #fca5a5;
        }

        .quiz-option.is-correct {
            background: rgba(220, 252, 231, 0.98);
            border-color: rgba(34, 197, 94, 0.42);
            color: #166534;
            box-shadow: 0 10px 25px -18px rgba(34, 197, 94, 0.9);
        }

        .dark .quiz-option.is-correct {
            background: rgba(20, 83, 45, 0.36);
            border-color: rgba(74, 222, 128, 0.42);
            color: #86efac;
        }

        .quiz-option.is-dimmed {
            opacity: 0.58;
        }

        .check-answer-btn {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #000000;
            opacity: 0.4;
            box-shadow: none;
            transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .dark .check-answer-btn {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #ffffff;
        }

        .check-answer-btn.is-ready {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #ffffff;
            opacity: 1;
            box-shadow: 0 12px 25px -10px rgba(79, 70, 229, 0.7);
            cursor: pointer;
        }

        .check-answer-btn.is-ready:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 16px 30px -10px rgba(79, 70, 229, 0.9);
        }

        .check-answer-btn.is-ready:active {
            transform: translateY(1px) scale(0.98);
        }

        .answer-input {
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background-color 0.18s ease, color 0.18s ease;
        }

        .answer-input:focus {
            transform: translateY(-1px);
        }

        .answer-input.is-wrong {
            border-color: rgba(239, 68, 68, 0.45);
            background: rgba(254, 242, 242, 0.98);
            color: #b91c1c;
        }

        .dark .answer-input.is-wrong {
            border-color: rgba(248, 113, 113, 0.45);
            background: rgba(127, 29, 29, 0.28);
            color: #fecaca;
        }

        .answer-input.is-correct {
            border-color: rgba(34, 197, 94, 0.42);
            background: rgba(220, 252, 231, 0.98);
            color: #166534;
            box-shadow: 0 10px 25px -18px rgba(34, 197, 94, 0.9);
        }

        .dark .answer-input.is-correct {
            border-color: rgba(74, 222, 128, 0.42);
            background: rgba(20, 83, 45, 0.36);
            color: #bbf7d0;
        }

        @keyframes input-shake {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-4px); }
            40% { transform: translateX(4px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        .animate-shake {
            animation: input-shake 0.35s ease-in-out;
        }
    </style>
@endsection

@section('content')
    @php
        $short = $content['shorts'][0] ?? [];
        $src = (string)($short['src'] ?? '');
        $isHlsStream = str_contains(strtolower($src), '.m3u8');
        $videoMimeType = $isHlsStream ? 'application/x-mpegURL' : 'video/mp4';
        $subtitles = array_values($short['subtitles'] ?? []);
        $showCC = array_key_exists('showCC', $short) ? (bool)$short['showCC'] : false;
        $questionSet = is_array($content['question'] ?? null) ? $content['question'] : [];
        $questionItems = array_values($questionSet['options'] ?? []);
    @endphp

      <main class="w-full min-h-[100dvh]">
          <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl flex-col justify-start px-4 py-6 sm:px-8 sm:py-8 lg:py-10">
            <header class="w-full flex flex-col items-center justify-center mb-6 sm:mb-8 lg:mb-10 text-center">
                <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight text-indigo-600 drop-shadow-sm">
                    {{ $content['title'] ?? 'Grammar' }}
                </h1>
                <h2 class="mt-1 sm:mt-2 text-base sm:text-xl md:text-2xl font-bold text-black dark:text-white">
                    {{ $content['subtitle'] ?? 'Degrees of comparison' }}
                </h2>

                <div class="flex flex-wrap items-center justify-around gap-2 sm:gap-6 md:gap-10 mt-4 sm:mt-6 rounded-[1.5rem] sm:rounded-[2rem] bg-white px-3 sm:px-8 md:px-12 py-3 sm:py-5 shadow-[0_4px_20px_-8px_rgba(0,0,0,0.1)] border border-slate-200/60 w-full max-w-3xl mx-auto dark:bg-slate-800/90 dark:border-slate-700/50">
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-xl sm:text-2xl drop-shadow-sm mb-0.5 sm:mb-1">🧩</span>
                        <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Tiles</span>
                        <span class="text-sm sm:text-lg font-black text-slate-800 dark:text-slate-200 leading-tight mt-0.5 sm:mt-1" data-stat-tiles>0/{{ count($questionItems) }}</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-xl sm:text-2xl drop-shadow-sm mb-0.5 sm:mb-1">✅</span>
                        <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Correct</span>
                        <span class="text-sm sm:text-lg font-black text-emerald-600 dark:text-emerald-400 leading-tight mt-0.5 sm:mt-1" data-stat-correct>0</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-xl sm:text-2xl drop-shadow-sm mb-0.5 sm:mb-1">❌</span>
                        <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Mistakes</span>
                        <span class="text-sm sm:text-lg font-black text-rose-600 dark:text-rose-400 leading-tight mt-0.5 sm:mt-1" data-stat-mistakes>0</span>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <span class="text-xl sm:text-2xl drop-shadow-sm mb-0.5 sm:mb-1">⏱️</span>
                        <span class="text-[9px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Time</span>
                        <span class="text-sm sm:text-lg font-black text-indigo-600 dark:text-indigo-400 leading-tight mt-0.5 sm:mt-1" data-stat-time>00:00</span>
                    </div>
                </div>
            </header>

            <section class="w-full">
                <div class="grid place-items-center gap-4 text-center sm:gap-5">
                    <div class="grid w-full items-start gap-5 lg:gap-8 lg:grid-cols-12">
                        <div class="w-full lg:col-span-7">
                            <div class="overflow-hidden flex flex-col rounded-[2rem] border border-slate-200/70 bg-white/60 shadow-xl backdrop-blur-xl dark:border-slate-700/30 dark:bg-slate-950/35" data-short-card>
                                @if(!empty($content['video_title']))
                                    <div class="w-full px-5 py-4 text-left border-b border-slate-300/60 dark:border-slate-700/60 bg-white/40 dark:bg-slate-900/40">
                                        <p class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">
                                            {{ $content['video_title'] }}
                                        </p>
                                    </div>
                                @endif
                                <div class="shorts-player-shell short-video-paused relative aspect-video overflow-hidden bg-black" data-short-wrapper>
                                    <video
                                        id="short-video-0"
                                        class="video-js absolute inset-0 z-0 h-full w-full select-none"
                                        playsinline
                                        webkit-playsinline="true"
                                        preload="metadata"
                                        poster="{{ $short['thumbnail'] ?? '' }}"
                                        data-short-player
                                        data-show-cc='@json($showCC)'
                                        data-subtitles='@json($subtitles)'
                                    >
                                        <source src="{{ $src }}" type="{{ $videoMimeType }}">
                                    </video>

                                    @if(!empty($short['thumbnail']))
                                        <img
                                            src="{{ $short['thumbnail'] }}"
                                            alt=""
                                            class="absolute inset-0 z-10 h-full w-full object-cover transition-all duration-200 opacity-100 scale-100 pointer-events-none"
                                            data-short-thumb
                                        />
                                    @endif

                                    <div data-short-overlay class="absolute inset-0 z-20 flex flex-col items-center justify-center bg-black/40 opacity-0 pointer-events-none transition-opacity duration-300 backdrop-blur-[2px]">
                                        <button
                                            type="button"
                                            class="short-play-btn-anim flex h-16 w-16 items-center justify-center rounded-full border border-white/30 bg-white/20 text-white shadow-2xl backdrop-blur-sm sm:h-20 sm:w-20"
                                            aria-label="Play / Pause"
                                            data-short-overlay-btn
                                        >
                                            <svg data-main-play-icon class="ml-1 h-8 w-8 sm:h-10 sm:w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </button>
                                        <p class="mt-4 text-sm font-medium tracking-wide text-white opacity-90 drop-shadow-md">Tap to Play</p>
                                    </div>

                                    <div class="pointer-events-none absolute bottom-3 left-1/2 z-30 w-[90%] -translate-x-1/2 text-center transition-all duration-300" data-subtitle-container>
                                        <div
                                            class="short-subtitle-text rounded-xl px-3 py-2 text-[0.88rem] leading-[1.35] sm:px-3.5 sm:py-2.5 sm:text-[0.93rem]"
                                            data-subtitle-text
                                        ></div>
                                    </div>
                                </div>

                                <div class="border-t border-white/10 bg-white/95 px-3 py-3 backdrop-blur-2xl transition-all duration-300 dark:border-white/5 dark:bg-slate-900/90">
                                    <div class="flex items-center gap-3">
                                        <button data-short-playpause class="text-slate-600 transition-colors hover:text-indigo-600 dark:text-slate-400 dark:hover:text-indigo-400">
                                            <svg data-short-play-icon class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                            <svg data-short-pause-icon class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                            </svg>
                                        </button>

                                        <div class="relative h-1.5 flex-grow cursor-pointer rounded-full bg-slate-200 dark:bg-slate-800" data-timeline-container>
                                            <div data-timeline-progress class="absolute h-full rounded-full bg-indigo-500 shadow-[0_0_8px_rgba(79,70,229,0.4)] transition-all duration-100" style="width: 0%"></div>
                                        </div>

                                        <span data-time-display class="ml-auto text-[11px] font-bold tabular-nums text-slate-500 dark:text-slate-400">0:00 / 0:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:col-span-5 flex flex-col max-h-[85vh] overflow-y-auto overflow-x-hidden rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200/70 bg-white/70 p-3 text-left shadow-[0_20px_50px_-28px_rgba(15,23,42,0.32)] backdrop-blur-xl dark:border-slate-700/35 dark:bg-slate-950/45 sm:p-5 lg:p-6 custom-scrollbar">
                            <div class="flex flex-col gap-2 sm:gap-3 shrink-0">
                                <div>
                                    <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 sm:px-3 py-0.5 sm:py-1 text-[0.65rem] sm:text-[0.75rem] font-bold uppercase tracking-wider text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-200">
                                        Check Understanding
                                    </span>
                                    <h2 class="mt-2 sm:mt-3 text-lg font-bold tracking-tight text-slate-900 dark:text-white sm:text-xl xl:text-2xl">
                                        {{ $questionSet['title'] ?? 'Tap the correct answer.' }}
                                    </h2>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-2 sm:gap-3 w-full">
                                    <p class="text-sm font-medium tracking-wide text-slate-600 dark:text-slate-300 sm:text-base">
                                        {{ $questionSet['instruction'] ?? 'Type the correct answer.' }}
                                    </p>
                                    <button
                                        type="button"
                                        data-reset-quiz
                                        class="inline-flex items-center gap-1 sm:gap-1.5 rounded-lg sm:rounded-xl bg-slate-200/70 px-3 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-bold shadow-sm text-slate-700 transition-colors hover:bg-slate-300 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700"
                                        title="Reset Answers"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                        Reset
                                    </button>
                                </div>
                            </div>

                            <div class="mt-3 sm:mt-5 grid gap-3 sm:gap-4 w-full">
                                @foreach($questionItems as $index => $item)
                                    <article class="rounded-[1.2rem] sm:rounded-[1.6rem] border border-slate-200/80 bg-white/90 p-3 shadow-[0_12px_30px_-24px_rgba(15,23,42,0.4)] dark:border-slate-700/50 dark:bg-slate-900/80 sm:p-5" data-quiz-card>
                                        <div class="flex flex-col sm:flex-row items-start gap-3 sm:gap-4 w-full">
                                            <div class="hidden sm:flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-blue-500 text-sm font-bold tracking-[0.01em] text-white shadow-lg shadow-indigo-500/20">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                                            </div>

                                            <div class="min-w-0 flex-1 w-full">
                                                <p class="text-sm sm:text-lg font-bold leading-relaxed text-slate-900 dark:text-white">
                                                    {{ $item['sentence'] ?? '' }}
                                                </p>

                                                <div class="mt-3 sm:mt-4 flex flex-col gap-2 sm:gap-3 sm:flex-row w-full items-stretch sm:items-center">
                                                    <input
                                                        type="text"
                                                        class="answer-input min-w-0 flex-1 w-full rounded-xl sm:rounded-2xl border-2 border-slate-200 bg-slate-50 px-3 py-2.5 sm:px-4 sm:py-3.5 text-sm sm:text-base font-bold text-slate-800 shadow-inner outline-none ring-0 placeholder:font-medium placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:shadow-[0_10px_30px_-24px_rgba(79,70,229,0.9)] dark:border-slate-600 dark:bg-slate-800 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-indigo-400"
                                                        placeholder="Type the adjective"
                                                        autocomplete="off"
                                                        spellcheck="false"
                                                        data-answer-input
                                                        data-correct="{{ $item['correct'] ?? '' }}"
                                                    />

                                                    <button
                                                        type="button"
                                                        class="check-answer-btn quiz-option shrink-0 inline-flex items-center justify-center rounded-xl sm:rounded-2xl px-4 py-2.5 sm:px-6 sm:py-3.5 text-sm sm:text-base font-bold tracking-wide text-white sm:w-auto"
                                                        data-check-answer
                                                        disabled
                                                    >
                                                        Check
                                                    </button>
                                                </div>

                                                <p class="mt-2 sm:mt-3 text-xs sm:text-base font-medium tracking-wide text-slate-500 dark:text-slate-400" data-feedback>
                                                    Type the adjective, then press Check.
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const playerElement = document.querySelector("[data-short-player]");
            const quizCards = Array.from(document.querySelectorAll("[data-quiz-card]"));
            const resetQuizBtn = document.querySelector("[data-reset-quiz]");
            let resetVideoState = () => {};

            // Stats Variables
            const statTiles = document.querySelector("[data-stat-tiles]");
            const statCorrect = document.querySelector("[data-stat-correct]");
            const statMistakes = document.querySelector("[data-stat-mistakes]");
            const statTime = document.querySelector("[data-stat-time]");

            let totalTiles = quizCards.length;
            let solvedTiles = 0;
            let correctCount = 0;
            let mistakeCount = 0;
            let timeSeconds = 0;
            let timerInterval = null;

            function formatTimer(sec) {
                const m = Math.floor(sec / 60).toString().padStart(2, "0");
                const s = (sec % 60).toString().padStart(2, "0");
                return `${m}:${s}`;
            }

            function startTimer() {
                if (timerInterval) clearInterval(timerInterval);
                timerInterval = setInterval(() => {
                    timeSeconds++;
                    if (statTime) statTime.textContent = formatTimer(timeSeconds);
                }, 1000);
            }

            function stopTimer() {
                if (timerInterval) clearInterval(timerInterval);
            }

            function updateStatsUI() {
                if (statTiles) statTiles.textContent = `${solvedTiles}/${totalTiles}`;
                if (statCorrect) statCorrect.textContent = correctCount;
                if (statMistakes) statMistakes.textContent = mistakeCount;
                if (solvedTiles >= totalTiles) {
                    stopTimer();
                }
            }

            // Pro Web Audio Sound Generator (No external assets needed!)
            const AudioContext = window.AudioContext || window.webkit.AudioContext;
            const audioCtx = new AudioContext();

            function playProSound(type) {
                if (audioCtx.state === 'suspended') audioCtx.resume();
                const osc = audioCtx.createOscillator();
                const gainNode = audioCtx.createGain();

                osc.connect(gainNode);
                gainNode.connect(audioCtx.destination);

                if (type === 'correct') {
                    // Cheerful Arpeggio (C5 -> E5 -> G5)
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(523.25, audioCtx.currentTime); // C5
                    osc.frequency.setValueAtTime(659.25, audioCtx.currentTime + 0.1); // E5
                    osc.frequency.setValueAtTime(783.99, audioCtx.currentTime + 0.2); // G5

                    gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
                    gainNode.gain.linearRampToValueAtTime(0.3, audioCtx.currentTime + 0.05);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.5);

                    osc.start();
                    osc.stop(audioCtx.currentTime + 0.55);
                } else {
                    // Soft, descending gentle "oh-no" tone (friendlier than boop)
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(392, audioCtx.currentTime); // G4
                    osc.frequency.exponentialRampToValueAtTime(329.6, audioCtx.currentTime + 0.2); // E4 down

                    gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
                    gainNode.gain.linearRampToValueAtTime(0.25, audioCtx.currentTime + 0.05);
                    gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.4);

                    osc.start();
                    osc.stop(audioCtx.currentTime + 0.45);
                }
            }

            function resetQuizState() {
                solvedTiles = 0;
                correctCount = 0;
                mistakeCount = 0;
                timeSeconds = 0;
                if (statTime) statTime.textContent = "00:00";
                updateStatsUI();
                startTimer();

                quizCards.forEach((card) => {
                    card.dataset.solved = "false";

                    const feedback = card.querySelector("[data-feedback]");
                    const input = card.querySelector("[data-answer-input]");
                    const checkButton = card.querySelector("[data-check-answer]");

                    if (feedback) {
                        feedback.textContent = "Type the adjective, then press Check.";
                        feedback.className = "mt-4 text-base font-medium tracking-wide text-slate-500 dark:text-slate-400";
                    }

                    if (input) {
                        input.disabled = false;
                        input.value = "";
                        input.classList.remove("is-wrong", "is-correct");
                    }

                    if (checkButton) {
                        checkButton.disabled = true;
                        checkButton.classList.remove("is-ready");
                        checkButton.classList.add("is-dimmed");
                    }
                });
            }

            if (resetQuizBtn) {
                resetQuizBtn.addEventListener("click", resetQuizState);
            }

            quizCards.forEach((card) => {
                const feedback = card.querySelector("[data-feedback]");
                const input = card.querySelector("[data-answer-input]");
                const checkButton = card.querySelector("[data-check-answer]");

                function normalizeWord(value) {
                    return String(value || "")
                        .toLowerCase()
                        .replace(/^[^a-z]+|[^a-z]+$/g, "");
                }

                function checkAnswer() {
                    if (!input || card.dataset.solved === "true") return;

                    input.classList.remove("is-wrong");

                    const isCorrect = normalizeWord(input.value) === normalizeWord(input.dataset.correct);

                    if (isCorrect) {
                        playProSound('correct');
                        card.dataset.solved = "true";
                        input.classList.add("is-correct");
                        input.disabled = true;

                        solvedTiles++;
                        correctCount++;
                        updateStatsUI();

                        if (checkButton) {
                            checkButton.disabled = true;
                            checkButton.classList.remove("is-ready");
                            checkButton.classList.add("is-dimmed");
                        }

                        if (feedback) {
                            feedback.textContent = "Correct! Great job finding the adjective.";
                            feedback.className = "mt-4 text-base font-bold text-emerald-600 dark:text-emerald-400";
                        }
                        return;
                    }

                    playProSound('incorrect');
                    input.classList.add("is-wrong", "animate-shake");
                    setTimeout(() => input.classList.remove("animate-shake"), 350);

                    mistakeCount++;
                    updateStatsUI();

                    if (feedback) {
                        feedback.textContent = "Almost! Try checking the adjective again.";
                        feedback.className = "mt-4 text-base font-bold text-rose-600 dark:text-rose-400";
                    }
                }

                checkButton?.addEventListener("click", checkAnswer);
                input?.addEventListener("keydown", (event) => {
                    if (event.key !== "Enter") return;
                    event.preventDefault();
                    checkAnswer();
                });
                input?.addEventListener("input", () => {
                    input.classList.remove("is-wrong");
                    if (!checkButton) return;

                    const hasValue = input.value.trim() !== "";
                    checkButton.disabled = !hasValue || card.dataset.solved === "true";
                    checkButton.classList.toggle("is-ready", hasValue && card.dataset.solved !== "true");
                    checkButton.classList.toggle("is-dimmed", !hasValue);
                });
            });

            if (playerElement && typeof videojs !== "undefined") {
                const canUseNativeHls = !!playerElement.canPlayType("application/vnd.apple.mpegurl");
                const card = playerElement.closest("[data-short-card]");
                const refs = {
                    wrapper: card?.querySelector("[data-short-wrapper]"),
                    thumb: card?.querySelector("[data-short-thumb]"),
                    overlay: card?.querySelector("[data-short-overlay]"),
                    playPauseBtn: card?.querySelector("[data-short-playpause]"),
                    playIcon: card?.querySelector("[data-short-play-icon]"),
                    pauseIcon: card?.querySelector("[data-short-pause-icon]"),
                    mainPlayIcon: card?.querySelector("[data-main-play-icon]"),
                    timelineContainer: card?.querySelector("[data-timeline-container]"),
                    timelineProgress: card?.querySelector("[data-timeline-progress]"),
                    timeDisplay: card?.querySelector("[data-time-display]"),
                    subtitleNode: card?.querySelector("[data-subtitle-text]"),
                };

                const meta = {
                    subtitles: (() => {
                        try {
                            const parsed = JSON.parse(playerElement.dataset.subtitles || "[]");
                            return Array.isArray(parsed) ? parsed : [];
                        } catch (e) {
                            return [];
                        }
                    })(),
                    isCCOn: (playerElement.dataset.showCc || "false") === "true",
                    currentSubtitleText: null,
                    hasStarted: false,
                };

                const player = videojs(playerElement, {
                    controls: false,
                    autoplay: false,
                    preload: "metadata",
                    bigPlayButton: false,
                    controlBar: false,
                    responsive: false,
                    fluid: false,
                    inactivityTimeout: 0,
                    muted: false,
                    playsinline: true,
                    html5: {
                        vhs: {
                            overrideNative: !canUseNativeHls
                        },
                        nativeAudioTracks: canUseNativeHls,
                        nativeVideoTracks: canUseNativeHls
                    },
                    userActions: {
                        doubleClick: false,
                        hotkeys: false
                    }
                });

                function formatTime(seconds) {
                    const safeSeconds = Number.isFinite(seconds) ? Math.max(0, seconds) : 0;
                    const mins = Math.floor(safeSeconds / 60);
                    const secs = Math.floor(safeSeconds % 60);
                    return `${mins}:${secs.toString().padStart(2, "0")}`;
                }

                function getDuration() {
                    const duration = Number(player.duration?.() ?? 0);
                    return Number.isFinite(duration) ? duration : 0;
                }

                function getCurrentTime() {
                    const currentTime = Number(player.currentTime?.() ?? 0);
                    return Number.isFinite(currentTime) ? currentTime : 0;
                }

                function clearSubtitles() {
                    if (!refs.subtitleNode) return;
                    refs.subtitleNode.textContent = "";
                    refs.subtitleNode.classList.remove("visible");
                    meta.currentSubtitleText = null;
                }

                function setTimeDisplay() {
                    if (!refs.timeDisplay) return;
                    refs.timeDisplay.textContent = `${formatTime(getCurrentTime())} / ${formatTime(getDuration())}`;
                }

                function setTimelineProgress() {
                    if (!refs.timelineProgress) return;
                    const duration = getDuration();
                    const percent = duration ? (getCurrentTime() / duration) * 100 : 0;
                    refs.timelineProgress.style.width = `${percent}%`;
                }

                function syncPlayUI() {
                    const isPaused = player.paused();

                    refs.playIcon?.classList.toggle("hidden", !isPaused);
                    refs.pauseIcon?.classList.toggle("hidden", isPaused);
                    refs.wrapper?.classList.toggle("short-video-paused", isPaused);

                    if (refs.mainPlayIcon) {
                        refs.mainPlayIcon.innerHTML = isPaused
                            ? '<path d="M8 5v14l11-7z"/>'
                            : '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
                    }

                    const showThumb = !meta.hasStarted && getCurrentTime() <= 0.05;
                    if (refs.thumb) {
                        refs.thumb.classList.toggle("opacity-100", showThumb);
                        refs.thumb.classList.toggle("scale-100", showThumb);
                        refs.thumb.classList.toggle("opacity-0", !showThumb);
                        refs.thumb.classList.toggle("scale-[1.03]", !showThumb);
                    }
                }

                function updateSubtitles() {
                    if (!refs.subtitleNode || !meta.isCCOn || !meta.subtitles.length) {
                        clearSubtitles();
                        return;
                    }

                    const currentTime = getCurrentTime();
                    const activeSubtitle = meta.subtitles.find((item) => {
                        const start = Number(item?.start ?? 0);
                        const end = Number(item?.end ?? 0);
                        return currentTime >= start && currentTime <= end;
                    });

                    if (!activeSubtitle || !activeSubtitle.text) {
                        clearSubtitles();
                        return;
                    }

                    if (meta.currentSubtitleText !== activeSubtitle.text) {
                        refs.subtitleNode.textContent = activeSubtitle.text;
                        meta.currentSubtitleText = activeSubtitle.text;
                    }

                    refs.subtitleNode.classList.add("visible");
                }

                function refreshPlayerUI() {
                    setTimeDisplay();
                    setTimelineProgress();
                    syncPlayUI();
                    updateSubtitles();
                }

                function resetPlayer() {
                    try {
                        player.pause();
                        player.currentTime(0);
                    } catch (e) {}

                    meta.hasStarted = false;
                    clearSubtitles();
                    refreshPlayerUI();
                }

                async function togglePlay() {
                    if (player.paused()) {
                        try {
                            await player.play();
                            meta.hasStarted = true;
                            refreshPlayerUI();
                        } catch (err) {
                            console.warn("Play interrupted", err);
                        }
                    } else {
                        player.pause();
                        refreshPlayerUI();
                    }
                }

                player.ready(() => {
                    player.volume(1);
                    player.muted(false);
                    refreshPlayerUI();
                });

                refs.playPauseBtn?.addEventListener("click", (e) => {
                    e.stopPropagation();
                    togglePlay();
                });

                refs.overlay?.addEventListener("click", (e) => {
                    e.stopPropagation();
                    togglePlay();
                });

                refs.timelineContainer?.addEventListener("click", (e) => {
                    const duration = getDuration();
                    if (!duration) return;

                    const rect = refs.timelineContainer.getBoundingClientRect();
                    const pos = Math.max(0, Math.min((e.clientX - rect.left) / rect.width, 1));
                    player.currentTime(pos * duration);
                    refreshPlayerUI();
                });

                player.on("loadedmetadata", refreshPlayerUI);
                player.on("timeupdate", refreshPlayerUI);
                player.on("play", () => {
                    meta.hasStarted = true;
                    refreshPlayerUI();
                });
                player.on("pause", refreshPlayerUI);
                player.on("ended", resetPlayer);

                player.el()?.addEventListener("click", (e) => {
                    if (e.target.closest("[data-short-overlay-btn], [data-short-playpause]")) return;
                    togglePlay();
                });

                document.addEventListener("visibilitychange", () => {
                    if (document.hidden) {
                        resetPlayer();
                    }
                });

                window.addEventListener("beforeunload", () => {
                    if (player && !player.isDisposed()) {
                        player.dispose();
                    }
                }, { once: true });

                resetVideoState = resetPlayer;
            }

            window.stopSlideAudio = function () {
                resetVideoState();
            };

            window.resetSlide = function () {
                resetVideoState();
                resetQuizState();
            };

            resetQuizState();
        });
    </script>
@endsection
