@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Sentence Patterns',
        'title' => 'Sentence Patterns',
        'subtitle' => '',
        'play_label' => 'Play sentence',
        'columns' => [
            [
                [
                    'emoji' => '1️⃣',
                    'text' => '<span class="text-blue-500 font-black">Positive Sentences:</span>',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/1.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => 'There <span class="text-red-500 font-black">are a lot of restaurants</span> in my neighbourhood.',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/2.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => 'There <span class="text-violet-600 font-black">is a lot of traffic</span> downtown.',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/3.mp3'),
                ],
                [
                    'emoji' => '2️⃣',
                    'text' => '<span class="text-blue-500 font-black">Questions:</span>',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/4.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => '<span class="text-red-500 font-black">Are</span> there <span class="text-red-500 font-black">many restaurants</span> near your house?',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/5.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => '<span class="text-violet-600 font-black">Is</span> there <span class="text-violet-600 font-black">much traffic</span> in your city?',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/6.mp3'),
                ],
            ],
            [
                [
                    'emoji' => '3️⃣',
                    'text' => '<span class="text-blue-500 font-black">Negative Sentences:</span>',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/7.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => 'There <span class="text-red-500 font-black">aren\'t many shops</span> here.',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/8.mp3'),
                ],
                [
                    'emoji' => '•',
                    'text' => 'There <span class="text-violet-600 font-black">isn\'t much noise</span> in my area.',
                    'sound' => materialAsset('slider/A1/Advanced/chapter-8/audios/slide12/9.mp3'),
                ],
            ],
        ],
    ];
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        .organic-shape {
            position: absolute;
            z-index: 0;
            filter: blur(60px);
            opacity: 0.12;
        }

        .blob-1 {
            top: 5%;
            left: 5%;
            width: 300px;
            height: 300px;
            background: #4f46e5;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }

        .blob-2 {
            bottom: 5%;
            right: 5%;
            width: 400px;
            height: 400px;
            background: #7c3aed;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }

        .dark .organic-shape { opacity: 0.18; }

        .play-hit { -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible { outline: none; }

        #titleBlock,
        .sentence-card {
            opacity: 1;
            transform: none;
        }

        .audio-btn {
            position: relative;
            overflow: hidden;
        }

        .audio-btn .static-icon {
            display: block;
        }

        .audio-btn .wave-wrap {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 2px;
            height: 16px;
        }

        .audio-btn .wave-bar {
            width: 3px;
            height: 8px;
            background: currentColor;
            border-radius: 999px;
        }

        .audio-btn.speaking .static-icon {
            display: none;
        }

        .audio-btn.speaking .wave-wrap {
            display: inline-flex;
        }

        .audio-btn.speaking .wave-bar:nth-child(1) {
            animation: waveBounce 0.7s ease-in-out infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(2) {
            animation: waveBounce 0.7s ease-in-out 0.12s infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(3) {
            animation: waveBounce 0.7s ease-in-out 0.24s infinite;
        }

        @keyframes waveBounce {
            0%, 100% {
                height: 7px;
                opacity: 0.7;
            }
            50% {
                height: 16px;
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $playLabel = trim((string)($content['play_label'] ?? 'Play audio'));
    @endphp

    <body class="font-display bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-50 min-h-screen relative">
    <div class="organic-shape blob-1"></div>
    <div class="organic-shape blob-2"></div>

    <main class="w-full">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-8 py-7 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="space-y-6">
                    <div id="titleBlock" class="space-y-2 text-center">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>
                    </div>

                    <section id="cards" class="w-full">
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 xl:gap-6 text-left items-start">
                            @foreach($content['columns'] as $column)
                                <div class="space-y-4">
                                    @foreach($column as $item)
                                        <article
                                            class="sentence-card rounded-[26px] border border-slate-200/70 bg-white/65 backdrop-blur-xl shadow-[0_14px_44px_-26px_rgba(15,23,42,0.45)] dark:border-slate-700/35 dark:bg-slate-950/40 p-4 sm:p-5"
                                        >
                                            <div class="flex items-center gap-4">
                                                <div class="h-11 w-11 rounded-2xl flex items-center justify-center text-[0px] border border-indigo-500/25 bg-indigo-500/10 text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                                    <span class="text-xl leading-none">{{ $item['emoji'] ?? '🎉' }}</span>
                                                </div>

                                                <div class="min-w-0 flex-1">
                                                    <div class="text-xl sm:text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 leading-tight break-words">
                                                        {!! $item['text'] !!}
                                                    </div>
                                                </div>

                                                <div class="shrink-0">
                                                    <button
                                                        type="button"
                                                        class="audio-btn speak-btn play-hit inline-flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                        aria-label="{{ $playLabel }}"
                                                        data-sound="{{ $item['sound'] }}"
                                                    >
                                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>
                                                        <span class="wave-wrap" aria-hidden="true">
                                                            <span class="wave-bar"></span>
                                                            <span class="wave-bar"></span>
                                                            <span class="wave-bar"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
    </body>
@endsection

@section('script')
    <script>
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "auto";
                audio.crossOrigin = "anonymous";

                let activeButton = null;

                function setSpeaking(button, isSpeaking) {
                    if (!button) return;
                    button.classList.toggle("speaking", isSpeaking);
                }

                function clearActive() {
                    if (activeButton) {
                        setSpeaking(activeButton, false);
                        activeButton = null;
                    }
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}
                    clearActive();
                }

                function play(src, button) {
                    if (!src) return;

                    const resolved = new URL(src, window.location.href).toString();

                    if (activeButton === button && !audio.paused && audio.src === resolved) {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        if (audio.src !== resolved) audio.src = resolved;
                        audio.currentTime = 0;
                        activeButton = button;
                        setSpeaking(activeButton, true);

                        const p = audio.play();
                        if (p && typeof p.catch === "function") {
                            p.catch(() => stop());
                        }
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", stop);
                audio.addEventListener("pause", () => {
                    if (audio.currentTime === 0 || audio.ended) {
                        clearActive();
                    }
                });
                audio.addEventListener("error", stop);

                window[KEY] = { audio, play, stop };
            }

            window.stopSlideAudio = function () {
                window[KEY].stop();
            };

            if (!window.__BEC_AUDIO_DELEGATE__) {
                window.__BEC_AUDIO_DELEGATE__ = true;

                document.addEventListener("click", (e) => {
                    const btn = e.target.closest(".audio-btn");
                    if (!btn) return;

                    e.preventDefault();
                    const src = btn.dataset.sound || btn.getAttribute("data-sound") || "";
                    window[KEY].play(src, btn);
                });
            }
        })();

        window.resetSlide = function () {};
    </script>
@endsection
