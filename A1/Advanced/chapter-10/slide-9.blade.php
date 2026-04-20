<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'How to form present continuous?',
    'video_title'=> 'Let’s watch this video first',
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

                            <div class="w-full lg:col-span-5 flex flex-col h-full justify-center rounded-[1.5rem] sm:rounded-[2rem] border border-slate-200/70 bg-white/70 p-3 text-left shadow-[0_20px_50px_-28px_rgba(15,23,42,0.32)] backdrop-blur-xl dark:border-slate-700/35 dark:bg-slate-950/45 sm:p-5 lg:p-6">
                                <div class="flex flex-col gap-1 sm:gap-2 shrink-0 mb-3 sm:mb-4">
                                    <div>
                                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-2 sm:px-3 py-0.5 sm:py-1 text-[0.65rem] sm:text-[0.75rem] font-bold uppercase tracking-wider text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-200">
                                            Grammar Rules
                                        </span>
                                        <h2 class="mt-1 sm:mt-2 text-xl font-black tracking-tight text-slate-900 dark:text-white sm:text-2xl xl:text-3xl">
                                            Present Continuous
                                        </h2>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-3 sm:gap-4">
                                    <!-- Questions & Affirmative -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                        <div class="rounded-2xl border border-sky-200/80 bg-sky-50/50 p-3 sm:p-4 dark:border-sky-800/50 dark:bg-sky-900/20">
                                            <h3 class="mb-2 text-base font-black text-sky-900 dark:text-sky-200 uppercase tracking-wide">Questions</h3>
                                            <ul class="space-y-1.5 sm:space-y-2 text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100 leading-tight">
                                                <li>What <span class="text-sky-700 dark:text-sky-300 font-black tracking-wide">is he doing</span>?</li>
                                                <li>What <span class="text-sky-700 dark:text-sky-300 font-black tracking-wide">is she doing</span>?</li>
                                                <li>What <span class="text-sky-700 dark:text-sky-300 font-black tracking-wide">are they doing</span>?</li>
                                            </ul>
                                        </div>

                                        <div class="rounded-2xl border border-emerald-200/80 bg-emerald-50/50 p-3 sm:p-4 dark:border-emerald-800/50 dark:bg-emerald-900/20">
                                            <h3 class="mb-2 text-base font-black text-emerald-900 dark:text-emerald-200 uppercase tracking-wide">Affirmative</h3>
                                            <ul class="space-y-1.5 sm:space-y-2 text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100 leading-tight">
                                                <li>He <span class="text-emerald-700 dark:text-emerald-300 font-black tracking-wide">is working</span>.</li>
                                                <li>She <span class="text-emerald-700 dark:text-emerald-300 font-black tracking-wide">is shopping</span>.</li>
                                                <li>They <span class="text-emerald-700 dark:text-emerald-300 font-black tracking-wide">are talking</span>.</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Negative -->
                                    <div class="rounded-xl sm:rounded-2xl border border-rose-200/80 bg-rose-50/50 p-3 sm:p-4 dark:border-rose-800/50 dark:bg-rose-900/20">
                                        <h3 class="mb-2 text-base font-black text-rose-900 dark:text-rose-200 uppercase tracking-wide">Negative</h3>
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100 leading-tight">
                                            <div>He <span class="text-rose-700 dark:text-rose-300 font-black tracking-wide">is not coming</span>.</div>
                                            <div>She <span class="text-rose-700 dark:text-rose-300 font-black tracking-wide">is not sleeping</span>.</div>
                                            <div>They <span class="text-rose-700 dark:text-rose-300 font-black tracking-wide">are not working</span>.</div>
                                        </div>
                                    </div>

                                    <!-- Yes/No Questions & Short Responses -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                        <div class="rounded-2xl border border-amber-200/80 bg-amber-50/50 p-3 sm:p-4 dark:border-amber-800/50 dark:bg-amber-900/20">
                                            <h3 class="mb-2 text-base font-black text-amber-900 dark:text-amber-200 uppercase tracking-wide">Yes / No Questions</h3>
                                            <ul class="space-y-1.5 sm:space-y-2 text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100 leading-tight">
                                                <li><span class="text-amber-700 dark:text-amber-300 font-black tracking-wide">Are you</span> working?</li>
                                                <li><span class="text-amber-700 dark:text-amber-300 font-black tracking-wide">Is she</span> coming?</li>
                                                <li><span class="text-amber-700 dark:text-amber-300 font-black tracking-wide">Are they</span> helping you?</li>
                                            </ul>
                                        </div>

                                        <div class="rounded-2xl border border-indigo-200/80 bg-indigo-50/50 p-3 sm:p-4 dark:border-indigo-800/50 dark:bg-indigo-900/20">
                                            <h3 class="mb-2 text-base font-black text-indigo-900 dark:text-indigo-200 uppercase tracking-wide">Short Response</h3>
                                            <div class="grid grid-cols-2 gap-x-2 gap-y-2 text-sm sm:text-base font-bold text-slate-800 dark:text-slate-100 leading-tight">
                                                <div>Yes, I am.</div>
                                                <div>No, I am not.</div>
                                                <div>Yes, he is.</div>
                                                <div>No, he is not.</div>
                                                <div>Yes, they are.</div>
                                                <div>No, they are not.</div>
                                            </div>
                                        </div>
                                    </div>
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
            let resetVideoState = () => {};

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
            };
        });
    </script>
@endsection
