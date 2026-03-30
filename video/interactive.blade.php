@php
    $content = $content ?? [];
    $isQuizMode = (bool)($content['isQuiz'] ?? false);

    $videoSrc = (string)($content['video'] ?? '');
    $normalizedVideoSrc = strtolower($videoSrc);
    $isHlsStream = str_contains($normalizedVideoSrc, '.m3u8');
    $videoMimeType = $isHlsStream ? 'application/x-mpegURL' : 'video/mp4';

    $content['showTranscript'] = array_key_exists('showTranscript', $content)
        ? (bool)$content['showTranscript']
        : false;

    $content['showCC'] = array_key_exists('showCC', $content)
        ? (bool)$content['showCC']
        : false;
@endphp

@extends("slider.simple-layout")

@section("style")
    <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet">

    <style>
        :root {
            --sub-bg: rgba(15, 23, 42, 0.85);
        }

        .dark {
            --sub-bg: rgba(30, 41, 59, 0.8);
        }

        /* Video.js */
        #videoWrapper .video-js {
            width: 100% !important;
            height: 100% !important;
            max-width: 100%;
            max-height: 100%;
            background: #000;
            font-family: inherit;
        }

        #videoWrapper .video-js .vjs-tech,
        #videoWrapper .video-js .vjs-poster {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        #videoWrapper .video-js .vjs-poster {
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        #videoWrapper .video-js .vjs-control-bar,
        #videoWrapper .video-js .vjs-big-play-button,
        #videoWrapper .video-js .vjs-loading-spinner,
        #videoWrapper .video-js .vjs-text-track-display {
            display: none !important;
        }

        /* Marker Dots */
        .marker-dot {
            width: 10px;
            height: 10px;
            background: #6366f1;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 20;
        }

        .dark .marker-dot {
            border-color: #1e293b;
        }

        .marker-dot.active {
            background: #10b981;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .marker-dot:hover {
            transform: translate(-50%, -50%) scale(1.3);
            z-index: 30;
            cursor: pointer;
        }

        /* Thumbnail / Overlay Styles */
        .video-paused #playOverlay {
            opacity: 1;
            pointer-events: auto;
        }

        .play-btn-anim {
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .video-paused #playOverlay:hover .play-btn-anim {
            transform: scale(1.1);
        }

        /* Modal Animation */
        .modal-animate-in {
            animation: modalIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Toggle Switch Styling */
        .mode-switch-checkbox:checked {
            left: 1.5rem;
            border-color: #4f46e5;
        }

        .mode-switch-checkbox:checked + .mode-switch-label {
            background-color: #4f46e5;
        }

        .mode-switch-checkbox:checked + .mode-switch-label:before {
            transform: translateX(100%);
        }

        /* Subtitle Styles */
        .subtitle-text {
            display: inline-block;
            background: var(--sub-bg);
            color: white;
            font-weight: 600;
            letter-spacing: -0.01em;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(12px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .subtitle-text.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .cc-btn,
        .transcript-btn {
            position: relative;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 800;
            border: 1.5px solid currentColor;
            transition: all 0.2s;
            line-height: 1;
            white-space: nowrap;
        }

        .cc-btn.active {
            background: #4f46e5;
            border-color: #4f46e5;
            color: white !important;
        }

        .cc-btn:hover:not(.active) {
            color: #4f46e5;
        }

        .cc-btn.active:hover {
            background: #4338ca;
            border-color: #4338ca;
            opacity: 0.95;
        }

        .transcript-btn {
            color: #0f766e;
        }

        .dark .transcript-btn {
            color: #5eead4;
        }

        .transcript-btn:hover:not(.transcript-toggle-highlight) {
            color: #0f766e;
            border-color: #0f766e;
        }

        .dark .transcript-btn:hover:not(.transcript-toggle-highlight) {
            color: #5eead4;
            border-color: #5eead4;
        }

        .transcript-toggle-highlight {
            background: #0f766e !important;
            border-color: #0f766e !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.15);
        }

        .transcript-toggle-highlight:hover {
            background: #115e59 !important;
            border-color: #115e59 !important;
            color: #ffffff !important;
        }

        /* Transcript Panel */
        .transcript-item {
            transition: all 0.2s ease;
        }

        .transcript-item.active {
            background: rgba(79, 70, 229, 0.08);
            border-color: rgba(79, 70, 229, 0.35);
        }

        .dark .transcript-item.active {
            background: rgba(99, 102, 241, 0.14);
            border-color: rgba(129, 140, 248, 0.35);
        }

        .transcript-item:hover {
            transform: translateY(-1px);
        }

        .transcript-time {
            font-variant-numeric: tabular-nums;
        }

        /* Hide transcript panel */
        #playerLayout.transcript-hidden #transcriptPanel {
            display: none;
        }
    </style>
@endsection

@section("content")
    <div class="relative min-h-[100dvh] w-full">
        <div id="videoContainer" class="video-container fixed inset-0 z-[100] flex h-full w-full max-w-none flex-col bg-black group">
            <div id="playerLayout" class="flex h-full w-full flex-col lg:flex-row">
                <!-- LEFT: Video + Controls -->
                <div class="flex min-h-0 flex-1 flex-col bg-black">
                    <div id="videoWrapper" class="relative flex flex-1 w-full items-center justify-center overflow-hidden bg-black video-paused min-h-0">
                        <video
                                playsinline
                                webkit-playsinline
                                preload="auto"
                                id="lessonVideo"
                                class="video-js vjs-default-skin max-h-full w-full max-w-full cursor-pointer bg-black"
                                poster="{{ $content['thumbnail'] ?? '' }}"
                        >
                            <source src="{{ $videoSrc }}" type="{{ $videoMimeType }}">
                        </video>

                        <!-- Thumbnail / Play Overlay -->
                        <div id="playOverlay" class="absolute inset-0 flex flex-col items-center justify-center bg-black/40 backdrop-blur-[2px] opacity-0 pointer-events-none transition-opacity duration-300">
                            <button class="w-20 h-20 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full flex items-center justify-center text-white play-btn-anim shadow-2xl">
                                <svg id="mainPlayIcon" class="w-10 h-10 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </button>
                            <p class="mt-4 text-white font-medium text-sm drop-shadow-md tracking-wide opacity-90">Click to Play Video</p>
                        </div>

                        <!-- CC Subtitles Overlay -->
                        <div id="subtitleContainer" class="absolute left-1/2 z-50 w-[90%] -translate-x-1/2 text-center pointer-events-none bottom-3 md:bottom-[60px] md:w-[80%] transition-all duration-300">
                            <div id="subtitleTextNode" class="subtitle-text rounded-lg px-3.5 py-1.5 text-[0.9rem] leading-[1.3] md:rounded-xl md:px-5 md:py-2.5 md:text-[1.15rem] md:leading-[1.4]"></div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="video-controls-bar border-t border-white/10 bg-white/95 px-4 py-4 backdrop-blur-2xl transition-all duration-300 dark:bg-slate-900/90 dark:border-white/5 sm:px-6">
                        <div class="video-controls-wrapper flex flex-wrap items-center gap-4">
                            <button id="playPauseBtn" class="text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                <svg id="playIcon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                <svg id="pauseIcon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                </svg>
                            </button>

                            <div class="order-1 relative flex-grow h-1.5 bg-slate-200 dark:bg-slate-800 rounded-full cursor-pointer group/timeline sm:order-none sm:w-auto" id="timelineContainer">
                                <div id="timelineProgress" class="absolute h-full bg-indigo-500 rounded-full transition-all duration-100 shadow-[0_0_8px_rgba(79,70,229,0.4)]" style="width: 0%"></div>
                                <div id="marker-container" class="absolute inset-0 pointer-events-none"></div>
                            </div>

                            <span id="timeDisplay" class="order-2 sm:order-none text-[11px] font-bold text-slate-500 dark:text-slate-400 tabular-nums ml-auto">0:00 / 0:00</span>

                            <!-- Desktop transcript layout toggle -->
                            <button
                                    id="transcriptLayoutToggleBtn"
                                    type="button"
                                    class="transcript-btn hidden md:inline-flex order-3 sm:order-none items-center justify-center"
                            >
                                Show Transcript
                            </button>

                            <!-- Mobile + Desktop controls -->
                            <div class="controls-right-group order-4 flex w-full flex-wrap items-center justify-between gap-2 md:order-3 md:ml-auto md:w-auto md:flex-nowrap md:justify-start">
                                <div class="flex items-center gap-2">
                                    <span class="text-[10px] font-bold uppercase tracking-wider transition-colors duration-300" id="watchLabel">Watch</span>

                                    <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                                        <input
                                                type="checkbox"
                                                name="toggle"
                                                id="modeSwitch"
                                                class="mode-switch-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer transition-all duration-300 left-0 top-0 border-slate-300"
                                                {{ !empty($content['isQuiz']) ? 'checked' : '' }}
                                        />
                                        <label for="modeSwitch" class="mode-switch-label block overflow-hidden h-5 rounded-full bg-slate-300 cursor-pointer transition-colors duration-300"></label>
                                    </div>

                                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 transition-colors duration-300" id="quizLabel">Quiz</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <button
                                            id="ccToggle"
                                            onclick="toggleCC()"
                                            class="cc-btn text-slate-400 transition-colors {{ !empty($content['showCC']) ? 'active' : '' }}"
                                    >
                                        CC
                                    </button>

                                    <button
                                            id="mobileTranscriptLayoutToggleBtn"
                                            type="button"
                                            class="transcript-btn inline-flex md:hidden items-center justify-center"
                                    >
                                        Show Transcript
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT / BOTTOM: Transcript Panel -->
                <aside id="transcriptPanel" class="w-full lg:w-[360px] xl:w-[420px] flex flex-col bg-white/95 dark:bg-slate-900/90 backdrop-blur-2xl border-t lg:border-t-0 lg:border-l border-slate-200/70 dark:border-slate-800 min-h-0">
                    <div class="flex items-center justify-between gap-3 px-4 py-3 border-b border-slate-200 dark:border-slate-800">
                        <div>
                            <h3 class="text-sm font-bold text-slate-800 dark:text-slate-100">Transcript</h3>
                            <p class="text-[11px] text-slate-500 dark:text-slate-400">Full script • click a line to jump</p>
                        </div>
                    </div>

                    <div id="transcriptBody" class="min-h-0 overflow-y-auto max-h-[34vh] lg:max-h-none lg:flex-1 p-2">
                        <div id="transcriptList" class="space-y-1"></div>
                        <div id="transcriptEmpty" class="hidden px-3 py-6 text-sm text-slate-500 dark:text-slate-400 text-center">
                            No transcript available.
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- QUESTION MODAL -->
    <div id="questionModal" class="fixed inset-0 bg-slate-900/60 dark:bg-slate-950/80 backdrop-blur-sm hidden flex items-center justify-center z-[110] p-4 transition-opacity duration-300 opacity-0 pointer-events-none">
        <div id="modalContent" class="bg-white dark:bg-slate-900 w-full max-w-xl max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800">
            <div class="px-5 py-4 sm:px-8 sm:py-6 border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 flex items-center justify-between">
                <div>
                    <h2 id="questionTitle" class="text-lg sm:text-xl font-bold text-slate-900 dark:text-slate-100"></h2>
                </div>
            </div>

            <div class="p-5 sm:p-8 space-y-6 sm:space-y-8">
                <div id="optionsContainer" class="grid gap-2 sm:gap-3"></div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 pt-6 mt-2 border-t border-slate-100 dark:border-slate-800">
                    <div class="flex gap-2 justify-center sm:justify-start">
                        <button onclick="rewatchSegment()" class="flex-1 sm:flex-none px-4 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors border border-slate-200 dark:border-slate-700">Rewatch</button>
                        <button onclick="skipQuestion()" class="flex-1 sm:flex-none px-4 py-2.5 text-sm font-semibold text-slate-400 dark:text-slate-500 hover:text-slate-600 dark:hover:text-slate-300 transition-colors">Skip</button>
                    </div>
                    <button id="submitBtn" onclick="submitChoice()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 sm:py-2.5 rounded-lg font-bold shadow-sm transition-all flex items-center justify-center gap-2">
                        Submit Answer
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- FEEDBACK MODAL -->
    <div id="feedbackModal" class="fixed inset-0 bg-slate-900/60 dark:bg-slate-950/80 backdrop-blur-sm hidden flex items-center justify-center z-[120] p-4 transition-opacity duration-300 opacity-0 pointer-events-none text-center">
        <div id="feedbackContent" class="w-full max-w-sm bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-slate-800">
            <div id="feedbackIcon" class="w-16 h-16 sm:w-20 sm:h-20 mx-auto rounded-full flex items-center justify-center mb-4 sm:mb-6 shadow-sm">
                <div id="feedbackEmojiSlot"></div>
            </div>
            <div class="space-y-2 mb-6 sm:mb-8">
                <h2 id="feedbackTitle" class="text-xl sm:text-2xl font-black text-slate-900 dark:text-slate-100"></h2>
                <p id="feedbackMessage" class="text-sm sm:text-base text-slate-500 dark:text-slate-400 font-medium"></p>
            </div>
            <button onclick="resumeSession()" class="w-full bg-slate-900 dark:bg-indigo-600 text-white py-3.5 sm:py-4 rounded-xl font-bold hover:bg-slate-800 dark:hover:bg-indigo-700 transition-all text-sm sm:text-base">
                Continue Lesson
            </button>
        </div>
    </div>

    <!-- Audio Effects -->
    <audio id="sfx-click" src="/slider/sounds/click.wav" preload="auto"></audio>
    <audio id="sfx-success" src="/slider/sounds/success.wav" preload="auto"></audio>
    <audio id="sfx-error" src="/slider/sounds/error.wav" preload="auto"></audio>
@endsection

@section("script")
    <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>

    <script>
        const config = {
            questions: @json($content['questions'] ?? []),
            sfx: {
                click: document.getElementById('sfx-click'),
                success: document.getElementById('sfx-success'),
                error: document.getElementById('sfx-error')
            },
            subtitles: @json($content['subtitles'] ?? []),
            transcript: @json($content['transcript'] ?? [])
        };

        const state = {
            asked: [],
            score: 0,
            currentQ: null,
            isStarted: true,
            isQuizMode: @json($content['isQuiz'] ?? false),
            isCCOn: @json($content['showCC']),
            currentSubtitleText: null,
            transcriptEntries: [],
            currentTranscriptIndex: -1,
            isTranscriptVisible: @json($content['showTranscript'])
        };

        const video = document.getElementById('lessonVideo');
        const playPauseBtn = document.getElementById('playPauseBtn');
        const playIcon = document.getElementById('playIcon');
        const pauseIcon = document.getElementById('pauseIcon');
        const mainPlayIcon = document.getElementById('mainPlayIcon');
        const timeDisplay = document.getElementById('timeDisplay');
        const timelineProgress = document.getElementById('timelineProgress');
        const timelineContainer = document.getElementById('timelineContainer');
        const markerContainer = document.getElementById('marker-container');
        const videoWrapper = document.getElementById('videoWrapper');

        const modeSwitch = document.getElementById('modeSwitch');
        const watchLabel = document.getElementById('watchLabel');
        const quizLabel = document.getElementById('quizLabel');

        const playerLayout = document.getElementById('playerLayout');
        const transcriptList = document.getElementById('transcriptList');
        const transcriptEmpty = document.getElementById('transcriptEmpty');

        const transcriptLayoutToggleBtn = document.getElementById('transcriptLayoutToggleBtn');
        const mobileTranscriptLayoutToggleBtn = document.getElementById('mobileTranscriptLayoutToggleBtn');
        const ccToggleBtn = document.getElementById('ccToggle');

        const canUseNativeHls = !!video.canPlayType('application/vnd.apple.mpegurl');
        const vjsPlayer = window.videojs(video, {
            controls: false,
            autoplay: false,
            preload: 'auto',
            bigPlayButton: false,
            controlBar: false,
            responsive: false,
            fluid: false,
            inactivityTimeout: 0,
            html5: {
                vhs: {
                    overrideNative: !canUseNativeHls
                },
                nativeAudioTracks: canUseNativeHls,
                nativeVideoTracks: canUseNativeHls
            }
        });

        window.__lessonVideoJs = vjsPlayer;

        function getCurrentTime() {
            return Number(vjsPlayer?.currentTime?.() ?? video.currentTime ?? 0) || 0;
        }

        function setCurrentTime(value) {
            const safeValue = Number(value) || 0;
            if (vjsPlayer && typeof vjsPlayer.currentTime === 'function') {
                vjsPlayer.currentTime(safeValue);
            } else if (video) {
                video.currentTime = safeValue;
            }
        }

        function getDuration() {
            return Number(vjsPlayer?.duration?.() ?? video.duration ?? 0) || 0;
        }

        function isPaused() {
            if (vjsPlayer && typeof vjsPlayer.paused === 'function') {
                return vjsPlayer.paused();
            }
            return !!video?.paused;
        }

        function playVideo() {
            if (vjsPlayer && typeof vjsPlayer.play === 'function') {
                return vjsPlayer.play();
            }
            return video?.play();
        }

        function pauseVideo() {
            if (vjsPlayer && typeof vjsPlayer.pause === 'function') {
                return vjsPlayer.pause();
            }
            return video?.pause();
        }

        function applyQuizModeUI() {
            if (!modeSwitch || !watchLabel || !quizLabel) return;

            modeSwitch.checked = !!state.isQuizMode;
            syncMarkersVisibility();

            if (state.isQuizMode) {
                watchLabel.classList.remove('text-slate-800');
                watchLabel.classList.add('text-slate-400');
                quizLabel.classList.remove('text-slate-400');
                quizLabel.classList.add('text-slate-800');
            } else {
                watchLabel.classList.remove('text-slate-400');
                watchLabel.classList.add('text-slate-800');
                quizLabel.classList.remove('text-slate-800');
                quizLabel.classList.add('text-slate-400');
            }
        }

        function playSound(name) {
            if (config.sfx[name]) {
                config.sfx[name].currentTime = 0;
                config.sfx[name].play().catch(() => {});
            }
        }

        function formatTime(seconds) {
            const min = Math.floor(seconds / 60);
            const sec = Math.floor(seconds % 60);
            return `${min}:${sec.toString().padStart(2, '0')}`;
        }

        function syncPlayUI() {
            const paused = isPaused();

            if (playIcon) playIcon.classList.toggle('hidden', !paused);
            if (pauseIcon) pauseIcon.classList.toggle('hidden', paused);

            if (paused) {
                videoWrapper.classList.add('video-paused');
                if (mainPlayIcon) mainPlayIcon.innerHTML = '<path d="M8 5v14l11-7z"/>';
            } else {
                videoWrapper.classList.remove('video-paused');
                if (mainPlayIcon) mainPlayIcon.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
            }
        }

        vjsPlayer.on('play', syncPlayUI);
        vjsPlayer.on('pause', syncPlayUI);
        vjsPlayer.on('ended', syncPlayUI);

        function togglePlay() {
            if (isPaused()) playVideo();
            else pauseVideo();
        }

        if (playPauseBtn) {
            playPauseBtn.addEventListener('click', togglePlay);
        }

        vjsPlayer.ready(() => {
            const playerEl = vjsPlayer.el();
            if (playerEl) {
                playerEl.addEventListener('click', togglePlay);
            }
            syncPlayUI();
        });

        const playOverlay = document.getElementById('playOverlay');
        if (playOverlay) {
            playOverlay.addEventListener('click', togglePlay);
        }

        function normalizeTranscriptEntries() {
            const raw = (Array.isArray(config.transcript) && config.transcript.length)
                ? config.transcript
                : (Array.isArray(config.subtitles) ? config.subtitles : []);

            return raw
                .map((item, idx) => ({
                    idx,
                    start: Number(item.start ?? 0),
                    end: Number(item.end ?? (Number(item.start ?? 0) + 3)),
                    text: String(item.text ?? '').trim(),
                    speaker: item.speaker ? String(item.speaker) : null
                }))
                .filter(item => item.text.length > 0 && !Number.isNaN(item.start))
                .sort((a, b) => a.start - b.start);
        }

        function renderTranscript() {
            if (!transcriptList) return;

            state.transcriptEntries = normalizeTranscriptEntries();
            transcriptList.innerHTML = '';

            if (!state.transcriptEntries.length) {
                if (transcriptEmpty) transcriptEmpty.classList.remove('hidden');
                return;
            }

            if (transcriptEmpty) transcriptEmpty.classList.add('hidden');

            state.transcriptEntries.forEach((line, index) => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'transcript-item w-full text-left rounded-lg border border-transparent px-3 py-2 hover:bg-slate-50 dark:hover:bg-slate-800/70';
                btn.dataset.index = index;

                const lineLabel = line.speaker ? `${line.speaker}: ${line.text}` : line.text;
                btn.setAttribute('aria-label', `Jump to ${formatTime(line.start)}: ${lineLabel}`);

                const safeSpeaker = line.speaker
                    ? `<strong class="font-semibold text-slate-900 dark:text-slate-100">${line.speaker}:</strong> `
                    : '';

                btn.innerHTML = `
                    <div class="flex items-start gap-3">
                        <span class="transcript-time shrink-0 mt-0.5 text-[11px] font-bold text-indigo-600 dark:text-indigo-400">${formatTime(line.start)}</span>
                        <span class="text-sm leading-5 text-slate-700 dark:text-slate-200">${safeSpeaker}${line.text}</span>
                    </div>
                `;

                btn.addEventListener('click', () => {
                    playSound('click');
                    setCurrentTime(Math.max(0, line.start - 0.05));
                    if (isPaused()) playVideo();
                });

                transcriptList.appendChild(btn);
            });

            updateTranscriptActive(true);
        }

        function updateTranscriptActive(force = false) {
            if (!transcriptList || !state.transcriptEntries.length) return;

            const t = getCurrentTime();
            const newIndex = state.transcriptEntries.findIndex(line => t >= line.start && t <= line.end);

            if (!force && newIndex === state.currentTranscriptIndex) return;

            const prev = transcriptList.querySelector(`[data-index="${state.currentTranscriptIndex}"]`);
            if (prev) {
                prev.classList.remove('active', 'ring-1', 'ring-indigo-200', 'dark:ring-indigo-700/40');
            }

            state.currentTranscriptIndex = newIndex;

            const current = transcriptList.querySelector(`[data-index="${newIndex}"]`);
            if (current) {
                current.classList.add('active', 'ring-1', 'ring-indigo-200', 'dark:ring-indigo-700/40');
                current.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
            }
        }

        function syncTranscriptToggleButtons() {
            const isHidden = !state.isTranscriptVisible;
            const label = isHidden ? 'Show Transcript' : 'Hide Transcript';

            [transcriptLayoutToggleBtn, mobileTranscriptLayoutToggleBtn].forEach(btn => {
                if (!btn) return;
                btn.textContent = label;
                btn.classList.toggle('transcript-toggle-highlight', isHidden);
            });
        }

        function toggleTranscriptPanel(forceValue = null) {
            state.isTranscriptVisible = (typeof forceValue === 'boolean')
                ? forceValue
                : !state.isTranscriptVisible;

            if (playerLayout) {
                playerLayout.classList.toggle('transcript-hidden', !state.isTranscriptVisible);
            }

            syncTranscriptToggleButtons();
        }

        [transcriptLayoutToggleBtn, mobileTranscriptLayoutToggleBtn].forEach((btn) => {
            if (!btn) return;
            btn.addEventListener('click', () => {
                playSound('click');
                toggleTranscriptPanel();
            });
        });

        function updateSubtitles() {
            const subtitleTextNode = document.getElementById('subtitleTextNode');
            if (!subtitleTextNode) return;

            if (!state.isCCOn) {
                subtitleTextNode.classList.remove('visible');
                subtitleTextNode.textContent = '';
                state.currentSubtitleText = null;
                return;
            }

            const currentTime = getCurrentTime();
            const sub = (config.subtitles || []).find(s => currentTime >= Number(s.start ?? 0) && currentTime <= Number(s.end ?? 0));

            if (sub) {
                if (state.currentSubtitleText !== sub.text) {
                    state.currentSubtitleText = sub.text;
                    subtitleTextNode.textContent = sub.text;
                }
                subtitleTextNode.classList.add('visible');
            } else {
                state.currentSubtitleText = null;
                subtitleTextNode.classList.remove('visible');
                subtitleTextNode.textContent = '';
            }
        }

        function toggleCC() {
            state.isCCOn = !state.isCCOn;
            if (ccToggleBtn) ccToggleBtn.classList.toggle('active', state.isCCOn);
            updateSubtitles();
            playSound('click');
        }

        if (timelineContainer) {
            timelineContainer.addEventListener('click', (e) => {
                const duration = getDuration();
                if (!duration) return;

                const rect = timelineContainer.getBoundingClientRect();
                const pos = (e.clientX - rect.left) / rect.width;
                setCurrentTime(pos * duration);
            });
        }

        function renderMarkers() {
            const duration = getDuration();
            if (!markerContainer || !duration) return;

            markerContainer.innerHTML = '';

            config.questions.forEach(q => {
                const timeInSeconds = Number(q.time ?? 0) / 1000;
                const percent = (timeInSeconds / duration) * 100;

                const dot = document.createElement('div');
                dot.className = "marker-dot cursor-pointer pointer-events-auto";
                dot.id = `marker-${q.time}`;
                dot.style.left = `${percent}%`;
                dot.title = "Question at " + formatTime(timeInSeconds);
                dot.onclick = (e) => {
                    e.stopPropagation();
                    setCurrentTime(Math.max(0, timeInSeconds - 1));
                    playVideo();
                };

                markerContainer.appendChild(dot);
            });

            syncMarkersVisibility();
        }

        function syncMarkersVisibility() {
            if (markerContainer) {
                markerContainer.classList.toggle('hidden', !state.isQuizMode);
            }

            document.querySelectorAll('.marker-dot').forEach(el => {
                el.classList.toggle('hidden', !state.isQuizMode);
            });
        }

        function updateMarkersStatus() {
            const currentTime = getCurrentTime();
            config.questions.forEach(q => {
                const dot = document.getElementById(`marker-${q.time}`);
                if (dot) dot.classList.toggle('active', currentTime >= (Number(q.time ?? 0) / 1000));
            });
        }

        function initializeStaticUI() {
            renderTranscript();
            toggleTranscriptPanel(state.isTranscriptVisible);

            if (ccToggleBtn) {
                ccToggleBtn.classList.toggle('active', state.isCCOn);
            }

            applyQuizModeUI();
            updateSubtitles();
            syncPlayUI();
        }

        function initializeDurationDependentUI() {
            const duration = getDuration();
            timeDisplay.textContent = `0:00 / ${formatTime(duration)}`;
            renderMarkers();
            updateMarkersStatus();
        }

        vjsPlayer.on('timeupdate', () => {
            const duration = getDuration();
            const currentTime = getCurrentTime();
            const percent = duration ? (currentTime / duration) * 100 : 0;

            if (timelineProgress) {
                timelineProgress.style.width = `${percent}%`;
            }

            if (timeDisplay) {
                timeDisplay.textContent = `${formatTime(currentTime)} / ${formatTime(duration)}`;
            }

            const currentTimeMs = currentTime * 1000;

            if (state.isQuizMode) {
                const q = config.questions.find(item => currentTimeMs >= Number(item.time ?? 0) && !state.asked.includes(item.time));

                if (q) {
                    state.asked.push(q.time);
                    pauseVideo();
                    showQuestion(q);
                }
            }

            updateMarkersStatus();
            updateStats();
            updateSubtitles();
            updateTranscriptActive();
        });

        vjsPlayer.on('loadedmetadata', () => {
            initializeDurationDependentUI();
        });

        initializeStaticUI();

        if (video.readyState >= 1 || getDuration() > 0) {
            initializeDurationDependentUI();
        }

        if (modeSwitch) {
            modeSwitch.addEventListener('change', (e) => {
                state.isQuizMode = e.target.checked;
                resetQuiz();
                applyQuizModeUI();
            });
        }

        function showQuestion(q) {
            state.currentQ = q;
            const modal = document.getElementById('questionModal');
            const questionTitle = document.getElementById('questionTitle');
            if (questionTitle) questionTitle.textContent = q.question ?? '';
            const container = document.getElementById('optionsContainer');

            container.innerHTML = '';

            if (q.type === 'input') {
                container.innerHTML = `
                    <input
                        id="textInput"
                        type="text"
                        placeholder="Type your answer..."
                        class="w-full border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 sm:px-5 sm:py-4 text-slate-800 dark:text-white bg-white dark:bg-slate-800 outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50/50 transition-all font-medium text-sm sm:text-base"
                    >
                `;
            } else if (q.type === 'true_false') {
                ['True', 'False'].forEach(opt => {
                    const btn = document.createElement('button');
                    btn.className = "w-full text-left p-3 sm:p-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:border-indigo-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all font-medium text-sm sm:text-base text-slate-700 dark:text-slate-200 flex items-center justify-between group";
                    btn.onclick = () => selectOption(btn, opt);
                    btn.innerHTML = `<span>${opt}</span><div class="w-5 h-5 rounded-full border-2 border-slate-200 dark:border-slate-600 group-hover:border-indigo-500 flex items-center justify-center shrink-0 ml-3"><div class="w-2.5 h-2.5 bg-indigo-500 rounded-full scale-0 transition-transform"></div></div>`;
                    container.appendChild(btn);
                });
            } else {
                (q.options || []).forEach((opt, idx) => {
                    const btn = document.createElement('button');
                    btn.className = "w-full text-left p-3 sm:p-4 rounded-xl border border-slate-200 dark:border-slate-700 hover:border-indigo-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all font-medium text-sm sm:text-base text-slate-700 dark:text-slate-200 flex items-center justify-between group";
                    btn.onclick = () => selectOption(btn, idx);
                    btn.innerHTML = `<span>${opt}</span><div class="w-5 h-5 rounded-full border-2 border-slate-200 dark:border-slate-600 group-hover:border-indigo-500 flex items-center justify-center shrink-0 ml-3"><div class="w-2.5 h-2.5 bg-indigo-500 rounded-full scale-0 transition-transform"></div></div>`;
                    container.appendChild(btn);
                });
            }

            modal.classList.remove('hidden');

            setTimeout(() => {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                document.getElementById('modalContent').classList.add('modal-animate-in');
            }, 10);
        }

        let selectedAns = null;

        function selectOption(el, val) {
            playSound('click');

            document.querySelectorAll('#optionsContainer button').forEach(b => {
                b.classList.remove('border-indigo-500', 'bg-indigo-50/50', 'ring-2', 'ring-indigo-500/10');
                if (b.querySelector('div > div')) {
                    b.querySelector('div > div').classList.remove('scale-100');
                }
            });

            el.classList.add('border-indigo-500', 'bg-indigo-50/50', 'ring-2', 'ring-indigo-500/10');
            if (el.querySelector('div > div')) {
                el.querySelector('div > div').classList.add('scale-100');
            }

            selectedAns = val;
        }

        function submitChoice() {
            let userAns = selectedAns;
            let isCorrect = false;
            const q = state.currentQ || {};

            if (q.type === 'input') {
                const inputEl = document.getElementById('textInput');
                userAns = inputEl ? inputEl.value.trim() : '';

                if (!userAns) return;

                const acceptedAnswers = Array.isArray(q.accepted_answers)
                    ? q.accepted_answers
                    : [q.accepted_answers];

                const normalizedAccepted = acceptedAnswers
                    .filter(answer => answer !== undefined && answer !== null && String(answer).trim() !== '')
                    .map(answer => String(answer).trim().toLowerCase());

                isCorrect = normalizedAccepted.includes(String(userAns).trim().toLowerCase());
            } else if (q.type === 'true_false') {
                if (userAns === null) return;
                isCorrect = String(userAns).toLowerCase() === String(q.correct_answer).toLowerCase();
            } else {
                if (userAns === null) return;
                isCorrect = parseInt(userAns, 10) === parseInt(q.correct_answer, 10);
            }

            if (isCorrect) {
                state.score += (q.points || 10);
            }

            showFeedback(isCorrect);
            selectedAns = null;
            updateStats();
        }

        function showFeedback(correct) {
            const fModal = document.getElementById('feedbackModal');
            const q = state.currentQ || {};

            document.getElementById('questionModal').classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => document.getElementById('questionModal').classList.add('hidden'), 300);

            const title = document.getElementById('feedbackTitle');
            const msg = document.getElementById('feedbackMessage');
            const iconSlot = document.getElementById('feedbackEmojiSlot');
            const iconWrap = document.getElementById('feedbackIcon');

            if (correct) {
                playSound('success');
                title.textContent = 'Correct!';
                msg.textContent = 'Great job on this assessment.';
                iconWrap.className = "w-16 h-16 sm:w-20 sm:h-20 mx-auto rounded-full flex items-center justify-center mb-4 sm:mb-6 bg-emerald-100 text-emerald-600";
                iconSlot.innerHTML = '<svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>';
            } else {
                playSound('error');
                title.textContent = 'Keep Going!';

                let displayCorrect = '';

                if (q.type === 'input') {
                    displayCorrect = Array.isArray(q.accepted_answers)
                        ? (q.accepted_answers[0] ?? '')
                        : (q.accepted_answers ?? '');
                } else if (q.type === 'true_false') {
                    const normalized = String(q.correct_answer).toLowerCase();
                    displayCorrect = (normalized === 'true' || normalized === '1') ? 'True' : 'False';
                } else {
                    displayCorrect = (q.options || [])[q.correct_answer] ?? '';
                }

                msg.textContent = `The answer was: ${displayCorrect}.`;
                iconWrap.className = "w-16 h-16 sm:w-20 sm:h-20 mx-auto rounded-full flex items-center justify-center mb-4 sm:mb-6 bg-amber-100 text-amber-600";
                iconSlot.innerHTML = '<svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
            }

            fModal.classList.remove('hidden');

            setTimeout(() => {
                fModal.classList.remove('opacity-0', 'pointer-events-none');
                document.getElementById('feedbackContent').classList.add('modal-animate-in');
            }, 50);
        }

        function resumeSession() {
            playSound('click');
            const fModal = document.getElementById('feedbackModal');
            fModal.classList.add('opacity-0', 'pointer-events-none');

            setTimeout(() => {
                fModal.classList.add('hidden');
                playVideo();
            }, 300);
        }

        function rewatchSegment() {
            playSound('click');

            const currentIndex = config.questions.findIndex(q => q.time === state.currentQ?.time);
            const prevQTimeMs = currentIndex > 0 ? config.questions[currentIndex - 1].time : 0;

            setCurrentTime(prevQTimeMs / 1000);
            state.asked = state.asked.filter(t => t !== state.currentQ?.time);
            hideModals();
            playVideo();
        }

        function skipQuestion() {
            playSound('click');
            hideModals();
            playVideo();
        }

        function resetQuiz() {
            state.asked = [];
            state.score = 0;
            state.currentQ = null;
            selectedAns = null;

            hideModals();

            document.querySelectorAll('.marker-dot').forEach(dot => {
                dot.classList.remove('active');
            });

            updateStats();

            if (state.isQuizMode) {
                setCurrentTime(0);
            }
        }

        function hideModals() {
            document.querySelectorAll('#questionModal, #feedbackModal').forEach(m => {
                m.classList.add('opacity-0', 'pointer-events-none');

                const content = m.querySelector('#modalContent, #feedbackContent');
                if (content) {
                    content.classList.remove('modal-animate-in');
                }

                setTimeout(() => m.classList.add('hidden'), 300);
            });
        }

        function updateStats() {
            const scoreEl = document.getElementById('scoreCount');
            const progressEl = document.getElementById('progressCount');
            const barEl = document.getElementById('progressBar');

            if (scoreEl) {
                scoreEl.textContent = state.score.toString().padStart(2, '0');
            }

            if (progressEl) {
                progressEl.textContent = `${state.asked.length}/${config.questions.length}`;
            }

            if (barEl) {
                const total = config.questions.length || 1;
                barEl.style.width = ((state.asked.length / total) * 100) + '%';
            }
        }

        window.setTheme = function(mode) {
            if (mode === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        };

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                pauseVideo();
            }
        });

        window.stopSlideAudio = function() {
            if (window.__lessonVideoJs) {
                window.__lessonVideoJs.pause();
            } else if (video) {
                video.pause();
            }

            if (config.sfx) {
                Object.values(config.sfx).forEach(sfx => {
                    if (sfx) {
                        sfx.pause();
                        sfx.currentTime = 0;
                    }
                });
            }

            if (window.speechSynthesis && window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
            }
        };
    </script>
@endsection
