@php
    $content = $content ?? [];
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? 'Short Videos')

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

        .short-toggle-btn {
            position: relative;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 800;
            border: 1.5px solid currentColor;
            color: #0f766e;
            line-height: 1;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .dark .short-toggle-btn {
            color: #5eead4;
        }

        .short-toggle-btn:hover:not(.is-active):not(.is-disabled) {
            color: #0f766e;
            border-color: #0f766e;
        }

        .dark .short-toggle-btn:hover:not(.is-active):not(.is-disabled) {
            color: #5eead4;
            border-color: #5eead4;
        }

        .short-toggle-btn.is-active {
            background: #4f46e5;
            border-color: #4f46e5;
            color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.16);
        }

        .short-toggle-btn.is-disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .short-transcript-item {
            transition: all 0.2s ease;
        }

        .short-transcript-item.active {
            background: rgba(79, 70, 229, 0.08);
            border-color: rgba(79, 70, 229, 0.35);
        }

        .dark .short-transcript-item.active {
            background: rgba(99, 102, 241, 0.14);
            border-color: rgba(129, 140, 248, 0.35);
        }

        .short-transcript-item:hover {
            transform: translateY(-1px);
        }

        .short-transcript-time {
            font-variant-numeric: tabular-nums;
        }

        .short-transcript-modal {
            animation: shortTranscriptIn 0.22s ease-out;
        }

        @keyframes shortTranscriptIn {
            from {
                opacity: 0;
                transform: translateY(8px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full min-h-[100dvh]">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-8 py-4 sm:py-6 min-h-[100dvh] flex items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    <div class="header-spacing text-center space-y-4 my-5 sm:my-6">
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

                    @php $videoCount = count($content['shorts'] ?? []); @endphp

                    <div id="shortsGrid" class="w-full grid gap-4 sm:gap-5 justify-items-center items-center
                        {{
                            $videoCount === 1 ? 'grid-cols-1' :
                            ($videoCount === 2 ? 'grid-cols-1 md:grid-cols-2' :
                            'grid-cols-1 md:grid-cols-2 xl:grid-cols-3')
                        }}">

                        @foreach(($content['shorts'] ?? []) as $i => $s)
                            @php
                                $src = (string)($s['src'] ?? '');
                                $normalizedSrc = strtolower($src);
                                $isHlsStream = str_contains($normalizedSrc, '.m3u8');
                                $videoMimeType = $isHlsStream ? 'application/x-mpegURL' : 'video/mp4';
                                $subtitles = array_values($s['subtitles'] ?? []);
                                $transcript = array_values($s['transcript'] ?? $subtitles);
                                $showCC = array_key_exists('showCC', $s) ? (bool)$s['showCC'] : false;
                                $showTranscript = array_key_exists('showTranscript', $s) ? (bool)$s['showTranscript'] : false;
                            @endphp

                            <div class="group w-full {{
                                $videoCount === 1
                                    ? 'max-w-[328px] sm:max-w-[340px] xl:max-w-[358px]'
                                    : 'max-w-[328px] sm:max-w-[340px] xl:max-w-[358px]'
                            }}">
                                <div class="rounded-[2rem] border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl overflow-hidden dark:border-slate-700/30 dark:bg-slate-950/35" data-short-card>
                                    <div class="relative aspect-[9/16] overflow-hidden shorts-player-shell short-video-paused" data-short-wrapper>
                                        <video
                                                id="short-video-{{ $i }}"
                                                class="video-js absolute inset-0 z-0 w-full h-full select-none"
                                                playsinline
                                                webkit-playsinline="true"
                                                preload="metadata"
                                                poster="{{ $s['thumbnail'] ?? '' }}"
                                                data-short-player
                                                data-index="{{ $i }}"
                                                data-show-cc='@json($showCC)'
                                                data-subtitles='@json($subtitles)'
                                                data-transcript='@json($transcript)'
                                                data-show-transcript='@json($showTranscript)'
                                        >
                                            <source src="{{ $src }}" type="{{ $videoMimeType }}">
                                        </video>

                                        @if(!empty($s['thumbnail']))
                                            <img
                                                    src="{{ $s['thumbnail'] }}"
                                                    alt=""
                                                    class="absolute inset-0 z-10 w-full h-full object-cover transition-all duration-200 opacity-100 scale-100 pointer-events-none"
                                                    data-short-thumb
                                            />
                                        @endif

                                        <div data-short-overlay class="absolute inset-0 z-20 flex flex-col items-center justify-center bg-black/40 backdrop-blur-[2px] opacity-0 pointer-events-none transition-opacity duration-300">
                                            <button
                                                    type="button"
                                                    class="w-16 h-16 sm:w-20 sm:h-20 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full flex items-center justify-center text-white short-play-btn-anim shadow-2xl"
                                                    aria-label="Play / Pause"
                                                    data-short-overlay-btn
                                            >
                                                <svg data-main-play-icon class="w-8 h-8 sm:w-10 sm:h-10 ml-1" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                            </button>
                                            <p class="mt-4 text-white font-medium text-sm drop-shadow-md tracking-wide opacity-90">Tap to Play</p>
                                        </div>

                                        <div
                                                class="absolute left-1/2 bottom-3 z-30 w-[90%] -translate-x-1/2 text-center pointer-events-none transition-all duration-300"
                                                data-subtitle-container
                                        >
                                            <div
                                                    class="short-subtitle-text rounded-xl px-3 py-2 text-[0.88rem] leading-[1.35] sm:px-3.5 sm:py-2.5 sm:text-[0.93rem]"
                                                    data-subtitle-text
                                            ></div>
                                        </div>
                                    </div>

                                    <div class="border-t border-white/10 bg-white/95 px-3 py-3 backdrop-blur-2xl transition-all duration-300 dark:bg-slate-900/90 dark:border-white/5">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <button data-short-playpause class="text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                                <svg data-short-play-icon class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M8 5v14l11-7z"/>
                                                </svg>
                                                <svg data-short-pause-icon class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                                </svg>
                                            </button>

                                            <div class="order-1 relative flex-grow h-1.5 bg-slate-200 dark:bg-slate-800 rounded-full cursor-pointer sm:order-none" data-timeline-container>
                                                <div data-timeline-progress class="absolute h-full bg-indigo-500 rounded-full transition-all duration-100 shadow-[0_0_8px_rgba(79,70,229,0.4)]" style="width: 0%"></div>
                                            </div>

                                            <span data-time-display class="order-2 text-[11px] font-bold text-slate-500 dark:text-slate-400 tabular-nums ml-auto sm:ml-0">0:00 / 0:00</span>

                                            <div class="order-3 flex w-full items-center justify-end gap-2 sm:ml-auto sm:w-auto">
                                                <button
                                                        type="button"
                                                        class="short-toggle-btn text-slate-400 transition-colors"
                                                        aria-label="Toggle captions"
                                                        data-cc-btn
                                                >
                                                    CC
                                                </button>

                                                <button
                                                        type="button"
                                                        class="short-toggle-btn transition-colors"
                                                        aria-label="Toggle transcript"
                                                        data-transcript-btn
                                                >
                                                    Transcript
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div data-transcript-panel class="{{ $showTranscript ? '' : 'hidden' }} fixed inset-0 z-[120] p-4 sm:p-6">
                                        <div data-transcript-backdrop class="absolute inset-0 bg-slate-950/55 dark:bg-black/75 backdrop-blur-sm"></div>

                                        <div class="relative flex min-h-full items-center justify-center">
                                            <div class="short-transcript-modal w-full max-w-xl overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white/95 shadow-2xl dark:border-slate-700/80 dark:bg-slate-900/95">
                                                <div class="flex items-center justify-between gap-3 px-5 py-4 border-b border-slate-200 dark:border-slate-800">
                                                    <div>
                                                        <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Transcript</h3>
                                                        <p class="text-[11px] text-slate-500 dark:text-slate-400">Full script • tap a line to jump</p>
                                                    </div>

                                                    <button
                                                            type="button"
                                                            class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition-colors hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700"
                                                            aria-label="Close transcript"
                                                            data-transcript-close
                                                    >
                                                        ✕
                                                    </button>
                                                </div>

                                                <div class="overflow-y-auto max-h-[min(70vh,560px)] p-3">
                                                    <div data-transcript-list class="space-y-1"></div>
                                                    <div data-transcript-empty class="hidden px-3 py-6 text-sm text-slate-500 dark:text-slate-400 text-center">
                                                        No transcript available.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            const playerElements = Array.from(document.querySelectorAll("[data-short-player]"));
            if (!playerElements.length || typeof videojs === "undefined") return;

            let soundEnabled = true;
            const players = [];

            function parseJson(value, fallback = []) {
                try {
                    const parsed = JSON.parse(value ?? "[]");
                    return Array.isArray(parsed) ? parsed : fallback;
                } catch (e) {
                    return fallback;
                }
            }

            function formatTime(seconds) {
                const safeSeconds = Number.isFinite(seconds) ? Math.max(0, seconds) : 0;
                const mins = Math.floor(safeSeconds / 60);
                const secs = Math.floor(safeSeconds % 60);
                return `${mins}:${secs.toString().padStart(2, "0")}`;
            }

            function createRefs(card) {
                return {
                    card,
                    wrapper: card?.querySelector("[data-short-wrapper]"),
                    thumb: card?.querySelector("[data-short-thumb]"),
                    overlay: card?.querySelector("[data-short-overlay]"),
                    overlayBtn: card?.querySelector("[data-short-overlay-btn]"),
                    mainPlayIcon: card?.querySelector("[data-main-play-icon]"),
                    playPauseBtn: card?.querySelector("[data-short-playpause]"),
                    playIcon: card?.querySelector("[data-short-play-icon]"),
                    pauseIcon: card?.querySelector("[data-short-pause-icon]"),
                    timelineContainer: card?.querySelector("[data-timeline-container]"),
                    timelineProgress: card?.querySelector("[data-timeline-progress]"),
                    timeDisplay: card?.querySelector("[data-time-display]"),
                    subtitleNode: card?.querySelector("[data-subtitle-text]"),
                    ccBtn: card?.querySelector("[data-cc-btn]"),
                    transcriptBtn: card?.querySelector("[data-transcript-btn]"),
                    transcriptPanel: card?.querySelector("[data-transcript-panel]"),
                    transcriptBackdrop: card?.querySelector("[data-transcript-backdrop]"),
                    transcriptClose: card?.querySelector("[data-transcript-close]"),
                    transcriptList: card?.querySelector("[data-transcript-list]"),
                    transcriptEmpty: card?.querySelector("[data-transcript-empty]"),
                };
            }

            function getDuration(player) {
                const duration = Number(player.duration?.() ?? 0);
                return Number.isFinite(duration) ? duration : 0;
            }

            function getCurrentTime(player) {
                const currentTime = Number(player.currentTime?.() ?? 0);
                return Number.isFinite(currentTime) ? currentTime : 0;
            }

            function setTimeDisplay(entry) {
                const { player, refs } = entry;
                if (!refs.timeDisplay) return;

                refs.timeDisplay.textContent = `${formatTime(getCurrentTime(player))} / ${formatTime(getDuration(player))}`;
            }

            function setTimelineProgress(entry) {
                const { player, refs } = entry;
                if (!refs.timelineProgress) return;

                const duration = getDuration(player);
                const percent = duration ? (getCurrentTime(player) / duration) * 100 : 0;
                refs.timelineProgress.style.width = `${percent}%`;
            }

            function syncPlayUI(entry) {
                const { player, meta, refs } = entry;
                const isPaused = player.paused();

                refs.playIcon?.classList.toggle("hidden", !isPaused);
                refs.pauseIcon?.classList.toggle("hidden", isPaused);
                refs.wrapper?.classList.toggle("short-video-paused", isPaused);

                if (refs.mainPlayIcon) {
                    refs.mainPlayIcon.innerHTML = isPaused
                        ? '<path d="M8 5v14l11-7z"/>'
                        : '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
                }

                const showThumb = !meta.hasStarted && getCurrentTime(player) <= 0.05;
                if (refs.thumb) {
                    refs.thumb.classList.toggle("opacity-100", showThumb);
                    refs.thumb.classList.toggle("scale-100", showThumb);
                    refs.thumb.classList.toggle("opacity-0", !showThumb);
                    refs.thumb.classList.toggle("scale-[1.03]", !showThumb);
                }
            }

            function clearSubtitles(entry) {
                const { meta, refs } = entry;
                if (!refs.subtitleNode) return;

                refs.subtitleNode.textContent = "";
                refs.subtitleNode.classList.remove("visible");
                meta.currentSubtitleText = null;
            }

            function setCCUI(entry) {
                const { meta, refs } = entry;
                if (!refs.ccBtn) return;

                const hasSubtitles = Array.isArray(meta.subtitles) && meta.subtitles.length > 0;

                refs.ccBtn.classList.toggle("is-active", hasSubtitles && !!meta.isCCOn);
                refs.ccBtn.classList.toggle("is-disabled", !hasSubtitles);
                refs.ccBtn.setAttribute("aria-pressed", hasSubtitles && !!meta.isCCOn ? "true" : "false");
            }

            function normalizeTranscriptEntries(meta) {
                const raw = (Array.isArray(meta.transcriptRaw) && meta.transcriptRaw.length)
                    ? meta.transcriptRaw
                    : (Array.isArray(meta.subtitles) ? meta.subtitles : []);

                return raw
                    .map((item, idx) => ({
                        idx,
                        start: Number(item?.start ?? 0),
                        end: Number(item?.end ?? (Number(item?.start ?? 0) + 3)),
                        text: String(item?.text ?? "").trim(),
                        speaker: item?.speaker ? String(item.speaker) : null,
                    }))
                    .filter((item) => item.text.length > 0 && !Number.isNaN(item.start))
                    .sort((a, b) => a.start - b.start);
            }

            function setTranscriptToggleUI(entry) {
                const { meta, refs } = entry;
                if (!refs.transcriptBtn) return;

                const hasTranscript = meta.transcriptEntries.length > 0;
                refs.transcriptBtn.textContent = "Transcript";
                refs.transcriptBtn.classList.toggle("is-active", hasTranscript && meta.isTranscriptVisible);
                refs.transcriptBtn.classList.toggle("is-disabled", !hasTranscript);
                refs.transcriptBtn.setAttribute("aria-pressed", hasTranscript && meta.isTranscriptVisible ? "true" : "false");
            }

            function updateTranscriptActive(entry, force = false) {
                const { player, meta, refs } = entry;
                if (!refs.transcriptList || !meta.transcriptEntries.length) return;

                const currentTime = getCurrentTime(player);
                const newIndex = meta.transcriptEntries.findIndex((line) => currentTime >= line.start && currentTime <= line.end);

                if (!force && newIndex === meta.currentTranscriptIndex) return;

                const prev = refs.transcriptList.querySelector(`[data-index="${meta.currentTranscriptIndex}"]`);
                if (prev) {
                    prev.classList.remove("active", "ring-1", "ring-indigo-200", "dark:ring-indigo-700/40");
                }

                meta.currentTranscriptIndex = newIndex;

                const current = refs.transcriptList.querySelector(`[data-index="${newIndex}"]`);
                if (current) {
                    current.classList.add("active", "ring-1", "ring-indigo-200", "dark:ring-indigo-700/40");
                    current.scrollIntoView({ block: "nearest", behavior: "smooth" });
                }
            }

            function toggleTranscriptPanel(entry, forceValue = null) {
                const { meta, refs } = entry;
                const hasTranscript = meta.transcriptEntries.length > 0;

                meta.isTranscriptVisible = hasTranscript
                    ? (typeof forceValue === "boolean" ? forceValue : !meta.isTranscriptVisible)
                    : false;

                refs.transcriptPanel?.classList.toggle("hidden", !meta.isTranscriptVisible);
                setTranscriptToggleUI(entry);
            }

            function renderTranscript(entry) {
                const { player, meta, refs } = entry;
                if (!refs.transcriptList) return;

                meta.transcriptEntries = normalizeTranscriptEntries(meta);
                meta.currentTranscriptIndex = -1;
                refs.transcriptList.innerHTML = "";

                if (!meta.transcriptEntries.length) {
                    refs.transcriptEmpty?.classList.remove("hidden");
                    refs.transcriptPanel?.classList.add("hidden");
                    meta.isTranscriptVisible = false;
                    setTranscriptToggleUI(entry);
                    return;
                }

                refs.transcriptEmpty?.classList.add("hidden");

                meta.transcriptEntries.forEach((line, index) => {
                    const button = document.createElement("button");
                    button.type = "button";
                    button.className = "short-transcript-item w-full text-left rounded-lg border border-transparent px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800/70";
                    button.dataset.index = String(index);

                    const lineLabel = line.speaker ? `${line.speaker}: ${line.text}` : line.text;
                    button.setAttribute("aria-label", `Jump to ${formatTime(line.start)}: ${lineLabel}`);

                    const safeSpeaker = line.speaker
                        ? `<strong class="font-semibold text-slate-900 dark:text-slate-100">${line.speaker}:</strong> `
                        : "";
 
                    button.innerHTML = `
                        <div class="flex items-start gap-3">
                            <span class="short-transcript-time shrink-0 mt-0.5 text-[11px] font-bold text-indigo-600 dark:text-indigo-400">${formatTime(line.start)}</span>
                            <span class="text-sm leading-5 text-slate-700 dark:text-slate-200">${safeSpeaker}${line.text}</span>
                        </div>
                    `;

                    button.addEventListener("click", () => {
                        player.currentTime(Math.max(0, line.start - 0.05));
                        if (player.paused()) {
                            pauseAll(player);
                            player.play().catch(() => {});
                        }
                    });

                    refs.transcriptList.appendChild(button);
                });

                setTranscriptToggleUI(entry);
                toggleTranscriptPanel(entry, meta.isTranscriptVisible);
                updateTranscriptActive(entry, true);
            }

            function updateSubtitles(entry) {
                const { player, meta, refs } = entry;
                if (!refs.subtitleNode) return;

                if (!meta.isCCOn || !Array.isArray(meta.subtitles) || !meta.subtitles.length) {
                    clearSubtitles(entry);
                    return;
                }

                const currentTime = getCurrentTime(player);
                const activeSubtitle = meta.subtitles.find((item) => {
                    const start = Number(item?.start ?? 0);
                    const end = Number(item?.end ?? 0);
                    return currentTime >= start && currentTime <= end;
                });

                if (!activeSubtitle || !activeSubtitle.text) {
                    clearSubtitles(entry);
                    return;
                }

                if (meta.currentSubtitleText !== activeSubtitle.text) {
                    refs.subtitleNode.textContent = activeSubtitle.text;
                    meta.currentSubtitleText = activeSubtitle.text;
                }

                refs.subtitleNode.classList.add("visible");
            }

            function refreshPlayerUI(entry) {
                setTimeDisplay(entry);
                setTimelineProgress(entry);
                syncPlayUI(entry);
                setCCUI(entry);
                setTranscriptToggleUI(entry);
                updateSubtitles(entry);
                updateTranscriptActive(entry);
            }

            function safeReset(entry) {
                const { player, meta } = entry;
                const duration = getDuration(player);

                if (duration > 0) {
                    try {
                        player.currentTime(0);
                    } catch (e) {}
                }

                meta.hasStarted = false;
                meta.currentTranscriptIndex = -1;
                clearSubtitles(entry);
                refreshPlayerUI(entry);
            }

            function pauseAll(exceptPlayer = null) {
                players.forEach((entry) => {
                    if (entry.player === exceptPlayer) return;

                    if (!entry.player.paused()) {
                        entry.player.pause();
                    }

                    safeReset(entry);
                });
            }

            async function togglePlay(entry) {
                const { player, meta } = entry;
                if (player.paused()) {
                    pauseAll(player);
                    try {
                        await player.play();
                        meta.hasStarted = true;
                        refreshPlayerUI(entry);
                    } catch (err) {
                        console.warn("Play interrupted", err);
                    }
                } else {
                    player.pause();
                    refreshPlayerUI(entry);
                }
            }

            playerElements.forEach((el) => {
                const canUseNativeHls = !!el.canPlayType("application/vnd.apple.mpegurl");
                const card = el.closest("[data-short-card]");
                if (!card) return;
                const refs = createRefs(card);

                const meta = {
                    subtitles: parseJson(el.dataset.subtitles, []),
                    transcriptRaw: parseJson(el.dataset.transcript, []),
                    transcriptEntries: [],
                    isCCOn: (el.dataset.showCc || "false") === "true",
                    isTranscriptVisible: (el.dataset.showTranscript || "false") === "true",
                    currentSubtitleText: null,
                    currentTranscriptIndex: -1,
                    hasStarted: false,
                };

                const player = videojs(el, {
                    controls: false,
                    autoplay: false,
                    preload: "metadata",
                    bigPlayButton: false,
                    controlBar: false,
                    responsive: false,
                    fluid: false,
                    inactivityTimeout: 0,
                    muted: !soundEnabled,
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

                const entry = { player, meta, refs };
                players.push(entry);

                player.ready(() => {
                    player.volume(1);
                    player.muted(!soundEnabled);
                    renderTranscript(entry);
                    refreshPlayerUI(entry);
                });

                refs.playPauseBtn?.addEventListener("click", (e) => {
                    e.stopPropagation();
                    togglePlay(entry);
                });

                refs.overlay?.addEventListener("click", (e) => {
                    e.stopPropagation();
                    togglePlay(entry);
                });

                refs.timelineContainer?.addEventListener("click", (e) => {
                    const duration = getDuration(player);
                    if (!duration) return;

                    const rect = refs.timelineContainer.getBoundingClientRect();
                    const pos = Math.max(0, Math.min((e.clientX - rect.left) / rect.width, 1));
                    player.currentTime(pos * duration);
                    refreshPlayerUI(entry);
                });

                refs.ccBtn?.addEventListener("click", (e) => {
                    e.stopPropagation();

                    if (!Array.isArray(meta.subtitles) || !meta.subtitles.length) return;

                    meta.isCCOn = !meta.isCCOn;
                    setCCUI(entry);
                    updateSubtitles(entry);
                });

                refs.transcriptBtn?.addEventListener("click", (e) => {
                    e.stopPropagation();

                    if (!meta.transcriptEntries.length) return;

                    toggleTranscriptPanel(entry);
                });

                refs.transcriptBackdrop?.addEventListener("click", () => {
                    toggleTranscriptPanel(entry, false);
                });

                refs.transcriptClose?.addEventListener("click", () => {
                    toggleTranscriptPanel(entry, false);
                });

                player.on("loadedmetadata", () => {
                    setTimeDisplay(entry);
                    setTimelineProgress(entry);
                    renderTranscript(entry);
                });

                player.on("timeupdate", () => {
                    setTimeDisplay(entry);
                    setTimelineProgress(entry);
                    updateSubtitles(entry);
                    updateTranscriptActive(entry);
                });

                player.on("play", () => {
                    meta.hasStarted = true;
                    refreshPlayerUI(entry);
                });

                player.on("pause", () => {
                    refreshPlayerUI(entry);
                });

                player.on("ended", () => {
                    safeReset(entry);
                });

                player.el()?.addEventListener("click", (e) => {
                    if (e.target.closest("[data-short-overlay-btn], [data-short-playpause], [data-cc-btn], [data-transcript-btn]")) return;
                    togglePlay(entry);
                });
            });

            window.stopSlideAudio = function () {
                pauseAll();
            };

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    pauseAll();
                }
            });

            window.addEventListener("beforeunload", () => {
                players.forEach(({ player }) => {
                    if (player && !player.isDisposed()) {
                        player.dispose();
                    }
                });
            }, { once: true });
        });
    </script>
@endsection
