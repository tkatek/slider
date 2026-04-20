<?php
$videoSrc = materialAsset('');
$videoThumbnail = materialAsset('');
$videoSubtitles = [

];

$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'title_class' => 'text-3xl sm:text-5xl md:text-6xl',
    'video_title' => 'How to form present continuous?',
    'video' => $videoSrc,
    'thumbnail' => $videoThumbnail,
    'subtitles' => $videoSubtitles,
    'showCC' => true,
    'grammar_title' => 'Present Continuous',
    'grammar_label' => 'Grammar Rules',
    'grammar_cards' => [
        [
            'title' => 'Questions',
            'tone' => 'sky',
            'items' => [
                'What <span>is he doing</span>?',
                'What <span>is she doing</span>?',
                'What <span>are they doing</span>?',
            ],
        ],
        [
            'title' => 'Affirmative',
            'tone' => 'emerald',
            'items' => [
                'He <span>is working</span>.',
                'She <span>is shopping</span>.',
                'They <span>are talking</span>.',
            ],
        ],
        [
            'title' => 'Negative',
            'tone' => 'rose',
            'wide' => true,
            'items' => [
                'He <span>is not coming</span>.',
                'She <span>is not sleeping</span>.',
                'They <span>are not working</span>.',
            ],
        ],
        [
            'title' => 'Yes / No Questions',
            'tone' => 'amber',
            'items' => [
                '<span>Are you</span> working?',
                '<span>Is she</span> coming?',
                '<span>Are they</span> helping you?',
            ],
        ],
        [
            'title' => 'Short Response',
            'tone' => 'indigo',
            'items' => [
                'Yes, I am.',
                'No, I am not.',
                'Yes, he is.',
                'No, he is not.',
                'Yes, they are.',
                'No, they are not.',
            ],
        ],
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

        .grammar-card[data-tone="sky"] {
            --grammar-border: rgba(125, 211, 252, 0.8);
            --grammar-bg: rgba(240, 249, 255, 0.72);
            --grammar-heading: #0c4a6e;
            --grammar-highlight: #0369a1;
        }

        .grammar-card[data-tone="emerald"] {
            --grammar-border: rgba(110, 231, 183, 0.8);
            --grammar-bg: rgba(236, 253, 245, 0.72);
            --grammar-heading: #064e3b;
            --grammar-highlight: #047857;
        }

        .grammar-card[data-tone="rose"] {
            --grammar-border: rgba(254, 205, 211, 0.9);
            --grammar-bg: rgba(255, 241, 242, 0.76);
            --grammar-heading: #881337;
            --grammar-highlight: #be123c;
        }

        .grammar-card[data-tone="amber"] {
            --grammar-border: rgba(252, 211, 77, 0.78);
            --grammar-bg: rgba(255, 251, 235, 0.76);
            --grammar-heading: #78350f;
            --grammar-highlight: #b45309;
        }

        .grammar-card[data-tone="indigo"] {
            --grammar-border: rgba(199, 210, 254, 0.86);
            --grammar-bg: rgba(238, 242, 255, 0.76);
            --grammar-heading: #312e81;
            --grammar-highlight: #4f46e5;
        }

        .dark .grammar-card {
            --grammar-bg: rgba(15, 23, 42, 0.42);
            --grammar-heading: #e2e8f0;
        }

        .grammar-card {
            border-color: var(--grammar-border);
            background: var(--grammar-bg);
        }

        .grammar-card h3 {
            color: var(--grammar-heading);
        }

        .grammar-card span {
            color: var(--grammar-highlight);
            font-weight: 900;
        }

        .dark .grammar-card span {
            color: #93c5fd;
        }
    </style>
@endsection

@section('content')
    @php
        $src = (string) ($content['video'] ?? '');
        $thumbnail = (string) ($content['thumbnail'] ?? '');
        $isHlsStream = str_contains(strtolower($src), '.m3u8');
        $videoMimeType = $isHlsStream ? 'application/x-mpegURL' : 'video/mp4';
        $subtitles = array_values($content['subtitles'] ?? []);
        $showCC = array_key_exists('showCC', $content) ? (bool) $content['showCC'] : false;
    @endphp

    <main class="min-h-[100dvh] w-full">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl flex-col px-4 py-5 sm:px-8 sm:py-7 lg:py-8">
            @include('slider.components.title-subtitle')

            <section class="grid w-full flex-1 items-center gap-5 lg:grid-cols-[minmax(260px,360px)_minmax(0,1fr)] lg:gap-8">
                <div class="w-full justify-self-center lg:justify-self-start">
                    <div class="w-full max-w-[330px] overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/60 shadow-xl backdrop-blur-xl dark:border-slate-700/30 dark:bg-slate-950/35" data-short-card>
                        @if(!empty($content['video_title']))
                            <div class="border-b border-slate-300/60 bg-white/55 px-5 py-4 text-left dark:border-slate-700/60 dark:bg-slate-900/45">
                                <p class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                    {{ $content['video_title'] }}
                                </p>
                            </div>
                        @endif

                        <div class="shorts-player-shell short-video-paused relative aspect-[9/16] overflow-hidden bg-black" data-short-wrapper>
                            <video
                                id="short-video-0"
                                class="video-js absolute inset-0 z-0 h-full w-full select-none"
                                playsinline
                                webkit-playsinline="true"
                                preload="metadata"
                                poster="{{ $thumbnail }}"
                                data-short-player
                                data-show-cc='@json($showCC)'
                                data-subtitles='@json($subtitles)'
                            >
                                <source src="{{ $src }}" type="{{ $videoMimeType }}">
                            </video>

                            @if($thumbnail !== '')
                                <img
                                    src="{{ $thumbnail }}"
                                    alt=""
                                    class="pointer-events-none absolute inset-0 z-10 h-full w-full object-cover opacity-100 scale-100 transition-all duration-200"
                                    data-short-thumb
                                />
                            @endif

                            <div data-short-overlay class="pointer-events-none absolute inset-0 z-20 flex flex-col items-center justify-center bg-black/40 opacity-0 backdrop-blur-[2px] transition-opacity duration-300">
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
                                <button data-short-playpause class="text-slate-600 transition-colors hover:text-indigo-600 dark:text-slate-400 dark:hover:text-indigo-400" aria-label="Play / Pause">
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

                <div class="w-full rounded-[1.5rem] border border-slate-200/70 bg-white/75 p-4 text-left shadow-[0_20px_50px_-28px_rgba(15,23,42,0.32)] backdrop-blur-xl dark:border-slate-700/35 dark:bg-slate-950/45 sm:p-5 lg:p-6">
                    <div class="mb-4">
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-[0.72rem] font-bold uppercase tracking-wider text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-200">
                            {{ $content['grammar_label'] }}
                        </span>
                        <h2 class="mt-2 text-2xl font-black tracking-tight text-slate-900 dark:text-white sm:text-3xl">
                            {{ $content['grammar_title'] }}
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4">
                        @foreach($content['grammar_cards'] as $card)
                            <article class="grammar-card {{ !empty($card['wide']) ? 'sm:col-span-2' : '' }} rounded-2xl border p-3 sm:p-4" data-tone="{{ $card['tone'] ?? 'sky' }}">
                                <h3 class="mb-2 text-base font-black uppercase tracking-wide">
                                    {{ $card['title'] }}
                                </h3>
                                <div class="{{ count($card['items'] ?? []) > 3 ? 'grid grid-cols-1 gap-2 sm:grid-cols-2' : 'space-y-2' }} text-sm font-bold leading-tight text-slate-800 dark:text-slate-100 sm:text-base">
                                    @foreach(($card['items'] ?? []) as $item)
                                        <p>{!! $item !!}</p>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
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

                refs.playPauseBtn?.addEventListener("click", (event) => {
                    event.stopPropagation();
                    togglePlay();
                });

                refs.overlay?.addEventListener("click", (event) => {
                    event.stopPropagation();
                    togglePlay();
                });

                refs.timelineContainer?.addEventListener("click", (event) => {
                    const duration = getDuration();
                    if (!duration) return;

                    const rect = refs.timelineContainer.getBoundingClientRect();
                    const pos = Math.max(0, Math.min((event.clientX - rect.left) / rect.width, 1));
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

                player.el()?.addEventListener("click", (event) => {
                    if (event.target.closest("[data-short-overlay-btn], [data-short-playpause]")) return;
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
