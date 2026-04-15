<style>
    @keyframes audioPlayerWaveGrowth {
        0%, 100% { height: 7px; }
        50% { height: 15px; }
    }

    .audio-player-hit {
        -webkit-tap-highlight-color: transparent;
    }

    .audio-player-hit:focus-visible {
        outline: none;
    }

    .audio-player-wave-bar {
        display: none;
        width: 3px;
        height: 10px;
        background: currentColor;
        border-radius: 999px;
        margin: 0 1px;
    }

    .audio-player-toggle.is-playing .audio-player-wave-bar {
        display: block;
        animation: audioPlayerWaveGrowth .6s infinite ease-in-out;
    }

    .audio-player-toggle.is-playing .audio-player-static-icon {
        display: none;
    }

    .audio-player-native {
        display: none;
    }

    .audio-player-track {
        position: relative;
        height: 10px;
        width: 100%;
        border-radius: 999px;
        overflow: hidden;
    }

    .audio-player-fill {
        height: 100%;
        width: 0%;
        border-radius: 999px;
    }

    .audio-player-knob {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 14px;
        height: 14px;
        border-radius: 9999px;
        left: 0%;
        pointer-events: none;
    }
</style>

@if(!empty($playerAudio))
    <div data-audio-player class="rounded-2xl border border-slate-200 bg-slate-50/90 px-3 py-2 shadow-sm dark:border-slate-700 dark:bg-slate-800/40 sm:px-4 sm:py-3">
        <div class="flex items-center gap-2.5 sm:gap-3">
            <button
                    data-audio-player-toggle
                    type="button"
                    class="audio-player-hit audio-player-toggle inline-flex h-10 w-10 items-center justify-center rounded-full bg-slate-800 text-white shadow-lg transition-all duration-150 hover:scale-[1.06] hover:bg-slate-700 active:scale-95 focus-visible:ring-4 focus-visible:ring-slate-400/30 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-slate-200 sm:h-12 sm:w-12"
                    aria-label="Play audio"
            >
                <svg class="audio-player-static-icon h-4 w-4 sm:h-5 sm:w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8 5v14l11-7-11-7z"/>
                </svg>

                <span class="audio-player-wave-bar" style="animation-delay:.1s"></span>
                <span class="audio-player-wave-bar" style="animation-delay:.2s"></span>
                <span class="audio-player-wave-bar" style="animation-delay:.3s"></span>
            </button>

            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-2 sm:gap-2.5">
                    <div class="flex min-w-0 flex-1 flex-col gap-1 sm:gap-1.5">
                        <div
                                class="audio-player-track cursor-pointer bg-slate-200 dark:bg-slate-700/70"
                                data-audio-player-track
                                aria-label="Audio progress"
                        >
                            <div class="audio-player-fill bg-slate-700 dark:bg-slate-200" data-audio-player-fill></div>
                            <div class="audio-player-knob border-2 border-slate-700 bg-white shadow-md dark:border-slate-200 dark:bg-slate-900" data-audio-player-knob></div>
                        </div>

                        <div class="flex justify-between text-[10px] font-extrabold text-slate-700 dark:text-slate-300 sm:text-[11px]">
                            <span data-audio-player-current>0:00</span>
                            <span data-audio-player-total>0:00</span>
                        </div>
                    </div>

                    @if($hasScript)
                        <button
                                data-audio-player-script-open
                                type="button"
                                class="shrink-0 inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-slate-800 px-2.5 py-1.5 text-[11px] font-black text-white shadow-sm transition-all duration-200 hover:scale-105 hover:bg-slate-700 active:scale-95 dark:border-slate-600 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-slate-200 sm:px-3 sm:text-xs"
                        >
                            <span>Script</span>
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <audio data-audio-player-media class="audio-player-native" preload="metadata">
            <source src="{{ $playerAudio }}" type="audio/mpeg">
        </audio>
    </div>
@endif

@if($hasScript)
    <div data-audio-player-modal class="hidden fixed inset-0 z-[3000]">
        <div data-audio-player-backdrop class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

        <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
            <div class="relative w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/95 text-left shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">

                <div class="sticky top-0 z-10 flex items-center justify-between border-b border-slate-200/70 bg-white/95 px-4 py-3 dark:border-slate-700/70 dark:bg-slate-900/95 sm:px-5 sm:py-4">
                    <div class="text-sm font-black text-slate-900 dark:text-slate-50 sm:text-base">
                        Script
                    </div>

                    <button
                            data-audio-player-script-close
                            type="button"
                            class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-300 bg-slate-100 text-slate-700 shadow-sm transition-all duration-200 hover:scale-105 hover:bg-slate-200 hover:text-slate-900 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700 dark:hover:text-slate-50"
                            aria-label="Close script"
                    >
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.8" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18"/>
                        </svg>
                    </button>
                </div>

                <div class="max-h-[70vh] overflow-y-auto p-3 sm:p-4">
                    <div class="space-y-2">
                        @foreach($scriptLines as $i => $line)
                            <div class="rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20">
                                <div class="flex items-start gap-2.5">
                                    <div class="flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200">
                                        {{ $i + 1 }}
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm">
                                            {{ $line }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif

<script>
    (function () {
        var root = document.querySelector('[data-audio-player]');
        var modal = document.querySelector('[data-audio-player-modal]');
        var playerAudio = root ? root.querySelector('[data-audio-player-media]') : null;
        var playButton = root ? root.querySelector('[data-audio-player-toggle]') : null;
        var progressTrack = root ? root.querySelector('[data-audio-player-track]') : null;
        var progressFill = root ? root.querySelector('[data-audio-player-fill]') : null;
        var progressKnob = root ? root.querySelector('[data-audio-player-knob]') : null;
        var currentTimeEl = root ? root.querySelector('[data-audio-player-current]') : null;
        var totalTimeEl = root ? root.querySelector('[data-audio-player-total]') : null;
        var showScriptBtn = root ? root.querySelector('[data-audio-player-script-open]') : null;
        var scriptBackdrop = modal ? modal.querySelector('[data-audio-player-backdrop]') : null;
        var closeScriptBtn = modal ? modal.querySelector('[data-audio-player-script-close]') : null;

        function formatTime(seconds) {
            var minutes;
            var remainingSeconds;

            if (!isFinite(seconds) || seconds < 0) seconds = 0;

            minutes = Math.floor(seconds / 60);
            remainingSeconds = Math.floor(seconds % 60);

            return minutes + ':' + String(remainingSeconds).padStart(2, '0');
        }

        function syncPlayerUI() {
            var duration;
            var current;
            var pct;

            if (!playerAudio) return;

            duration = isFinite(playerAudio.duration) ? playerAudio.duration : 0;
            current = isFinite(playerAudio.currentTime) ? playerAudio.currentTime : 0;
            pct = duration > 0 ? (current / duration) * 100 : 0;

            if (currentTimeEl) currentTimeEl.textContent = formatTime(current);
            if (totalTimeEl) totalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
            if (progressFill) progressFill.style.width = pct + '%';
            if (progressKnob) progressKnob.style.left = pct + '%';
            if (playButton) playButton.classList.toggle('is-playing', !playerAudio.paused);
        }

        function stopAudioPlayer() {
            if (!playerAudio) return;

            playerAudio.pause();
            playerAudio.currentTime = 0;
            syncPlayerUI();
        }

        window.syncAudioPlayerUI = syncPlayerUI;
        window.stopAudioPlayer = stopAudioPlayer;

        if (modal && modal.parentNode !== document.body) {
            document.body.appendChild(modal);
        }

        if (playButton && playerAudio) {
            playButton.addEventListener('click', function () {
                if (playerAudio.paused) playerAudio.play().catch(function(){});
                else playerAudio.pause();
            });
        }

        if (progressTrack && playerAudio) {
            progressTrack.addEventListener('click', function (event) {
                var rect = event.currentTarget.getBoundingClientRect();
                var x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                var ratio = rect.width > 0 ? x / rect.width : 0;

                if (isFinite(playerAudio.duration) && playerAudio.duration > 0) {
                    playerAudio.currentTime = ratio * playerAudio.duration;
                    syncPlayerUI();
                }
            });
        }

        if (playerAudio) {
            playerAudio.preload = 'metadata';
            playerAudio.addEventListener('loadedmetadata', syncPlayerUI);
            playerAudio.addEventListener('timeupdate', syncPlayerUI);
            playerAudio.addEventListener('ended', syncPlayerUI);
            playerAudio.addEventListener('play', syncPlayerUI);
            playerAudio.addEventListener('pause', syncPlayerUI);
        }

        if (showScriptBtn) {
            showScriptBtn.addEventListener('click', function () {
                if (modal) modal.classList.remove('hidden');
            });
        }

        if (closeScriptBtn) {
            closeScriptBtn.addEventListener('click', function () {
                if (modal) modal.classList.add('hidden');
            });
        }

        if (scriptBackdrop) {
            scriptBackdrop.addEventListener('click', function () {
                if (modal) modal.classList.add('hidden');
            });
        }

        syncPlayerUI();
    })();
</script>