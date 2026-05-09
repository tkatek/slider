@php
    $audioPlayerUid = $audioPlayerUid ?? ('audio_player_' . substr(md5(($playerAudio ?? '') . uniqid('', true)), 0, 10));
    $audioPlayerFloating = $audioPlayerFloating ?? true;
@endphp

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

    .audio-player-floating {
        position: fixed;
        right: 1rem;
        bottom: calc(1rem + env(safe-area-inset-bottom, 0px));
        z-index: 2600;
        display: flex;
        align-items: center;
        gap: .45rem;
        padding: .45rem;
        border-radius: 999px;
        border: 1px solid rgba(226, 232, 240, .9);
        background: rgba(255, 255, 255, .92);
        box-shadow: 0 18px 40px rgba(15, 23, 42, .18);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        opacity: 0;
        pointer-events: none;
        transform: translateY(8px) scale(.96);
        transition: opacity .18s ease, transform .18s ease;
    }

    .dark .audio-player-floating {
        border-color: rgba(71, 85, 105, .85);
        background: rgba(15, 23, 42, .9);
        box-shadow: 0 18px 44px rgba(2, 6, 23, .42);
    }

    .audio-player-floating.is-visible {
        opacity: 1;
        pointer-events: auto; 
        transform: translateY(0) scale(1);
    }

    .audio-player-floating-feedback {
        position: absolute;
        right: .5rem;
        bottom: calc(100% + .55rem);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 3.1rem;
        padding: .28rem .55rem;
        border-radius: 999px;
        border: 1px solid rgba(226, 232, 240, .94);
        background: rgba(255, 255, 255, .96);
        color: rgb(39 39 42);
        font-size: .72rem;
        line-height: 1;
        font-weight: 900;
        letter-spacing: .01em;
        box-shadow: 0 14px 28px rgba(15, 23, 42, .14);
        opacity: 0;
        transform: translateY(4px) scale(.96);
        transition: opacity .16s ease, transform .16s ease;
        pointer-events: none;
        white-space: nowrap;
    }

    .audio-player-floating-feedback.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .audio-player-float-btn {
        -webkit-tap-highlight-color: transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.45rem;
        height: 2.45rem;
        border-radius: 999px;
        border: 1px solid rgba(226, 232, 240, .96);
        background: rgba(255, 255, 255, .96);
        color: rgb(39 39 42);
        box-shadow: 0 10px 22px rgba(15, 23, 42, .08);
        transition: transform .15s ease, background-color .15s ease, color .15s ease, border-color .15s ease;
    }

    .audio-player-float-btn:hover {
        transform: scale(1.05);
    }

    .audio-player-float-btn:active {
        transform: scale(.95);
    }

    .audio-player-float-btn:focus-visible {
        outline: none;
        box-shadow: 0 0 0 4px rgba(148, 163, 184, .22);
    }

    .audio-player-float-btn.is-primary {
        background: linear-gradient(135deg, #27272a, #18181b);
        color: #fff;
        border-color: rgba(255,255,255,.12);
        box-shadow: 0 12px 28px rgba(24, 24, 27, .24);
    }

    .dark .audio-player-float-btn {
        border-color: rgba(71, 85, 105, .9);
        background: rgba(30, 41, 59, .98);
        color: rgb(241 245 249);
        box-shadow: 0 10px 24px rgba(2, 6, 23, .24);
    }

    .dark .audio-player-float-btn.is-primary {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        color: rgb(15 23 42);
        border-color: rgba(255,255,255,.28);
        box-shadow: 0 12px 28px rgba(2, 6, 23, .32);
    }

    .dark .audio-player-floating-feedback {
        border-color: rgba(71, 85, 105, .85);
        background: rgba(15, 23, 42, .96);
        color: rgb(241 245 249);
        box-shadow: 0 16px 30px rgba(2, 6, 23, .32);
    }

    .audio-player-float-btn svg {
        width: 1rem;
        height: 1rem;
        flex: 0 0 auto;
    }

    .audio-player-floating-wave-bars {
        display: none;
        align-items: center;
        justify-content: center;
        gap: 2px;
    }

    .audio-player-floating-wave-bar {
        width: 3px;
        height: 10px;
        background: currentColor;
        border-radius: 999px;
    }

    .audio-player-float-btn.is-playing .audio-player-floating-wave-bars {
        display: inline-flex;
    }

    .audio-player-float-btn.is-playing .audio-player-floating-play-icon {
        display: none;
    }

    .audio-player-float-btn.is-playing .audio-player-floating-wave-bar:nth-child(1) {
        animation: audioPlayerWaveGrowth .6s infinite ease-in-out;
        animation-delay: .1s;
    }

    .audio-player-float-btn.is-playing .audio-player-floating-wave-bar:nth-child(2) {
        animation: audioPlayerWaveGrowth .6s infinite ease-in-out;
        animation-delay: .2s;
    }

    .audio-player-float-btn.is-playing .audio-player-floating-wave-bar:nth-child(3) {
        animation: audioPlayerWaveGrowth .6s infinite ease-in-out;
        animation-delay: .3s;
    }

    @media (max-width: 640px) {
        .audio-player-floating {
            right: .75rem;
            bottom: calc(.75rem + env(safe-area-inset-bottom, 0px));
            gap: .35rem;
            padding: .38rem;
        }

        .audio-player-float-btn {
            width: 2.2rem;
            height: 2.2rem;
        }
    }
</style>

@if(!empty($playerAudio))
    <div data-audio-player="{{ $audioPlayerUid }}" class="rounded-2xl border border-slate-200 bg-slate-50/90 px-3 py-2 shadow-sm dark:border-slate-700 dark:bg-slate-800/40 sm:px-4 sm:py-3">
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

    @if($audioPlayerFloating)
        <div data-audio-player-floating="{{ $audioPlayerUid }}" class="audio-player-floating" aria-label="Mini audio player">
            <div data-audio-player-feedback class="audio-player-floating-feedback" aria-hidden="true"></div>

            <button
                    type="button"
                    class="audio-player-float-btn"
                    data-audio-player-backward
                    aria-label="Go back 10 seconds"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 8.25L6.75 12l3.75 3.75"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L13.5 12l3.75 3.75"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.75 7.25v9.5"></path>
                </svg>
            </button>

            <button
                    type="button"
                    class="audio-player-float-btn is-primary"
                    data-audio-player-floating-toggle
                    aria-label="Play audio"
            >
                <svg data-audio-player-floating-play-icon viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M8 5v14l11-7-11-7z"/>
                </svg>
                <span class="audio-player-floating-wave-bars" aria-hidden="true">
                    <span class="audio-player-floating-wave-bar"></span>
                    <span class="audio-player-floating-wave-bar"></span>
                    <span class="audio-player-floating-wave-bar"></span>
                </span>
            </button>

            <button
                    type="button"
                    class="audio-player-float-btn"
                    data-audio-player-forward
                    aria-label="Go forward 10 seconds"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 8.25L17.25 12l-3.75 3.75"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 8.25L10.5 12l-3.75 3.75"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.25 7.25v9.5"></path>
                </svg>
            </button>
        </div>
    @endif
@endif

@if($hasScript)
    <div data-audio-player-modal="{{ $audioPlayerUid }}" class="hidden fixed inset-0 z-[3000]">
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
        window.audioPlayerInstances = window.audioPlayerInstances || [];

        function formatTime(seconds) {
            var minutes;
            var remainingSeconds;

            if (!isFinite(seconds) || seconds < 0) seconds = 0;

            minutes = Math.floor(seconds / 60);
            remainingSeconds = Math.floor(seconds % 60);

            return minutes + ':' + String(remainingSeconds).padStart(2, '0');
        }

        function stopOtherPlayers(activeAudio) {
            window.audioPlayerInstances.forEach(function (instance) {
                if (!instance || !instance.audio || instance.audio === activeAudio) return;

                try {
                    instance.audio.pause();
                    instance.sync();
                } catch (error) {}
            });
        }

        function initAudioPlayer(root) {
            var uid;
            var modal;
            var playerAudio;
            var playButton;
            var progressTrack;
            var progressFill;
            var progressKnob;
            var currentTimeEl;
            var totalTimeEl;
            var showScriptBtn;
            var floating;
            var floatingToggle;
            var floatingPlayIcon;
            var feedbackEl;
            var backwardBtn;
            var forwardBtn;
            var scriptBackdrop;
            var closeScriptBtn;
            var frameId = null;
            var feedbackTimer = null;
            var externalFloatingVisible = false;

            if (!root || root.dataset.audioPlayerReady === '1') return;

            root.dataset.audioPlayerReady = '1';
            uid = root.getAttribute('data-audio-player') || '';
            modal = uid ? document.querySelector('[data-audio-player-modal="' + uid + '"]') : null;
            playerAudio = root.querySelector('[data-audio-player-media]');
            playButton = root.querySelector('[data-audio-player-toggle]');
            progressTrack = root.querySelector('[data-audio-player-track]');
            progressFill = root.querySelector('[data-audio-player-fill]');
            progressKnob = root.querySelector('[data-audio-player-knob]');
            currentTimeEl = root.querySelector('[data-audio-player-current]');
            totalTimeEl = root.querySelector('[data-audio-player-total]');
            showScriptBtn = root.querySelector('[data-audio-player-script-open]');
            floating = uid ? document.querySelector('[data-audio-player-floating="' + uid + '"]') : null;
            floatingToggle = floating ? floating.querySelector('[data-audio-player-floating-toggle]') : null;
            floatingPlayIcon = floating ? floating.querySelector('[data-audio-player-floating-play-icon]') : null;
            feedbackEl = floating ? floating.querySelector('[data-audio-player-feedback]') : null;
            backwardBtn = floating ? floating.querySelector('[data-audio-player-backward]') : null;
            forwardBtn = floating ? floating.querySelector('[data-audio-player-forward]') : null;
            scriptBackdrop = modal ? modal.querySelector('[data-audio-player-backdrop]') : null;
            closeScriptBtn = modal ? modal.querySelector('[data-audio-player-script-close]') : null;

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
                if (floatingToggle) floatingToggle.classList.toggle('is-playing', !playerAudio.paused);
                if (floatingPlayIcon) floatingPlayIcon.classList.toggle('hidden', !playerAudio.paused);
                if (floatingToggle) {
                    floatingToggle.setAttribute('aria-label', playerAudio.paused ? 'Play audio' : 'Pause audio');
                }
            }

            function stopAudioPlayer() {
                if (!playerAudio) return;

                playerAudio.pause();
                playerAudio.currentTime = 0;
                syncPlayerUI();
            }

            function seekBy(delta) {
                var duration;
                var nextTime;

                if (!playerAudio) return;

                duration = isFinite(playerAudio.duration) ? playerAudio.duration : 0;
                nextTime = Math.max(0, playerAudio.currentTime + delta);

                if (duration > 0) nextTime = Math.min(duration, nextTime);

                playerAudio.currentTime = nextTime;
                syncPlayerUI();
            }

            function showSeekFeedback(delta) {
                if (!feedbackEl) return;

                window.clearTimeout(feedbackTimer);
                feedbackEl.textContent = (delta > 0 ? '+' : '-') + Math.abs(delta) + 's';
                feedbackEl.classList.add('is-visible');

                feedbackTimer = window.setTimeout(function () {
                    feedbackEl.classList.remove('is-visible');
                }, 900);
            }

            function setFloatingVisibility(isVisible) {
                if (!floating) return;
                floating.classList.toggle('is-visible', !!isVisible);
            }

            function computeFloatingVisibility() {
                var rect;
                var viewportHeight;
                var scrolledY;
                var originalNotVisible;

                if (!floating || !root) return;

                rect = root.getBoundingClientRect();
                viewportHeight = window.innerHeight || document.documentElement.clientHeight || 0;
                scrolledY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop || 0;
                originalNotVisible = rect.bottom <= 0 || rect.top >= viewportHeight;

                setFloatingVisibility(externalFloatingVisible || scrolledY > (viewportHeight * 0.5) || originalNotVisible);
            }

            function queueFloatingVisibilityCheck() {
                if (frameId) return;
                frameId = window.requestAnimationFrame(function () {
                    frameId = null;
                    computeFloatingVisibility();
                });
            }

            if (modal && modal.parentNode !== document.body) {
                document.body.appendChild(modal);
            }

            if (floating && floating.parentNode !== document.body) {
                document.body.appendChild(floating);
            }

            if (playButton && playerAudio) {
                playButton.addEventListener('click', function () {
                    if (playerAudio.paused) {
                        stopOtherPlayers(playerAudio);
                        playerAudio.play().catch(function(){});
                    } else {
                        playerAudio.pause();
                    }
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

            if (floatingToggle && playerAudio) {
                floatingToggle.addEventListener('click', function () {
                    if (playerAudio.paused) {
                        stopOtherPlayers(playerAudio);
                        playerAudio.play().catch(function(){});
                    } else {
                        playerAudio.pause();
                    }
                });
            }

            if (backwardBtn && playerAudio) {
                backwardBtn.addEventListener('click', function () {
                    seekBy(-10);
                    showSeekFeedback(-10);
                });
            }

            if (forwardBtn && playerAudio) {
                forwardBtn.addEventListener('click', function () {
                    seekBy(10);
                    showSeekFeedback(10);
                });
            }

            if (playerAudio) {
                playerAudio.preload = 'metadata';
                playerAudio.addEventListener('loadedmetadata', syncPlayerUI);
                playerAudio.addEventListener('timeupdate', syncPlayerUI);
                playerAudio.addEventListener('ended', syncPlayerUI);
                playerAudio.addEventListener('play', function () {
                    stopOtherPlayers(playerAudio);
                    syncPlayerUI();
                });
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

            if (root && floating) {
                document.body.classList.add('audio-player-has-floating');
                window.addEventListener('scroll', queueFloatingVisibilityCheck, { passive: true });
                window.addEventListener('resize', queueFloatingVisibilityCheck);
                queueFloatingVisibilityCheck();
            }

            window.audioPlayerInstances.push({
                root: root,
                audio: playerAudio,
                sync: syncPlayerUI,
                stop: stopAudioPlayer,
                setFloatingVisible: function (isVisible) {
                    externalFloatingVisible = !!isVisible;
                    computeFloatingVisibility();
                }
            });

            syncPlayerUI();
            computeFloatingVisibility();
        }

        document.querySelectorAll('[data-audio-player]').forEach(initAudioPlayer);

        window.syncAudioPlayerUI = function () {
            window.audioPlayerInstances.forEach(function (instance) {
                if (instance && typeof instance.sync === 'function') instance.sync();
            });
        };

        window.stopAudioPlayer = function () {
            window.audioPlayerInstances.forEach(function (instance) {
                if (instance && typeof instance.stop === 'function') instance.stop();
            });
        };

        window.setAudioPlayerFloatingVisible = function (isVisible) {
            window.audioPlayerInstances.forEach(function (instance) {
                if (instance && typeof instance.setFloatingVisible === 'function') {
                    instance.setFloatingVisible(isVisible);
                }
            });
        };
    })();
</script>
