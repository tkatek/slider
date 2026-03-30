@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .wave-bar{display:none;width:3px;height:11px;background:currentColor;border-radius:2px;margin:0 1px;}
        .play-btn.playing .wave-bar{display:block;animation:waveGrowth 0.6s infinite ease-in-out;}
        .play-btn.playing .play-icon{display:none;}
        .play-btn:not(.playing) .wave-bar{display:none;}
        @keyframes waveGrowth{0%,100%{height:6px}50%{height:14px}}

        .play-btn:focus-visible{
            outline:none;
            box-shadow:0 0 0 4px rgba(99,102,241,.16);
        }

        .modal-scroll::-webkit-scrollbar{height:10px;width:10px}
        .modal-scroll::-webkit-scrollbar-thumb{background:rgba(148,163,184,.55);border-radius:999px}
        .dark .modal-scroll::-webkit-scrollbar-thumb{background:rgba(51,65,85,.7)}
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-3 sm:px-4 py-3 lg:py-4 lg:min-h-[100dvh] lg:flex lg:flex-col lg:justify-center">

            <header class="text-center mb-3 sm:mb-4 anim-title">
                <h1 class="font-black leading-[1.02] tracking-[-0.06em] text-3xl sm:text-5xl lg:text-5xl">
                    <span class="bg-gradient-to-br from-indigo-600 to-sky-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="mt-1 sm:mt-2 font-extrabold tracking-[-0.02em] text-sm sm:text-base lg:text-lg text-slate-700 dark:text-slate-200">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            {{-- Audio --}}
            <section class="anim-panel rounded-[18px] border border-slate-200/60 bg-white/55 backdrop-blur
                            dark:border-slate-700/30 dark:bg-slate-950/30
                            p-2.5 sm:p-3 mb-2">

                <div class="flex items-start gap-2.5">
                    <button id="playBtn"
                            type="button"
                            class="play-btn inline-flex items-center justify-center h-10 w-10 rounded-2xl
                                   border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                   dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200
                                   transition active:scale-95"
                            aria-label="Play audio">
                        <svg class="play-icon w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8 5v14l11-7-11-7z"/>
                        </svg>
                        <span class="wave-bar" style="animation-delay:.10s"></span>
                        <span class="wave-bar" style="animation-delay:.20s"></span>
                        <span class="wave-bar" style="animation-delay:.30s"></span>
                    </button>

                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2">
                            <input id="seek" type="range" min="0" max="100" value="0"
                                   class="w-full accent-indigo-600"
                                   aria-label="Audio progress" />
                            <div class="shrink-0 text-[11px] font-black tabular-nums text-slate-600 dark:text-slate-300">
                                <span id="curTime">0:00</span><span class="opacity-60">/</span><span id="durTime">0:00</span>
                            </div>
                        </div>

                        <div class="mt-1.5 flex items-center justify-between gap-2">
                            <button id="openScript"
                                    type="button"
                                    class="text-[11px] sm:text-xs font-black
                                           rounded-xl px-3 py-1.5
                                           border border-amber-300/60
                                           bg-gradient-to-br from-amber-200 to-orange-200
                                           text-amber-950
                                           shadow-sm
                                           hover:-translate-y-0.5 transition
                                           dark:border-amber-400/30 dark:from-amber-300/20 dark:to-orange-300/20 dark:text-amber-100">
                                Show Script
                            </button>
                        </div>
                    </div>
                </div>

                <audio id="audio" preload="metadata" src="{{ $content['audio'] }}"></audio>
            </section>

            {{-- Questions Card --}}
            <section class="anim-panel rounded-[18px] border border-slate-200/60 bg-white/55 backdrop-blur
                            dark:border-slate-700/30 dark:bg-slate-950/30
                            p-2.5 sm:p-3">

                @if(!empty($content['questions_card']['title']))
                    <h2 class="font-black text-sm sm:text-base lg:text-lg text-slate-900 dark:text-slate-50 mb-2">
                        {{ $content['questions_card']['title'] }}
                    </h2>
                @endif

                @if(!empty($content['questions_card']['intro']))
                    <p class="text-[12px] sm:text-sm font-semibold leading-relaxed text-slate-700 dark:text-slate-200 mb-3">
                        {{ $content['questions_card']['intro'] }}
                    </p>
                @endif

                @if(!empty($content['questions_card']['items']) && is_array($content['questions_card']['items']))
                    <div class="space-y-2">
                        @foreach($content['questions_card']['items'] as $item)
                            <div class="rounded-2xl border border-slate-200/70 bg-white/70
                                        dark:border-slate-700/35 dark:bg-slate-900/20
                                        px-3 py-2.5">
                                <div class="font-black text-[13px] sm:text-sm text-slate-900 dark:text-slate-50 leading-relaxed">
                                    {{ $item }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

        </div>

        {{-- Script Modal --}}
        <div id="scriptModal" class="hidden fixed inset-0 z-[999]">
            <div id="scriptBackdrop" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

            <div class="relative h-full w-full flex items-center justify-center p-3 sm:p-6">
                <div role="dialog"
                     aria-modal="true"
                     aria-labelledby="scriptTitle"
                     class="w-full max-w-3xl rounded-[22px]
                            border border-slate-200/70 bg-white/90 shadow-2xl
                            dark:border-slate-700/40 dark:bg-slate-950/70">
                    <div class="flex items-center justify-between p-3 sm:p-4 border-b border-slate-200/60 dark:border-slate-700/40">
                        <div class="min-w-0">
                            <div id="scriptTitle" class="font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">
                                Script
                            </div>
                            <div class="text-[11px] sm:text-xs font-semibold text-slate-600 dark:text-slate-300">
                                Press Esc to close
                            </div>
                        </div>

                        <button id="closeScript"
                                type="button"
                                class="rounded-xl px-3 py-1.5 text-[11px] sm:text-xs font-black
                                       border border-slate-200/70 bg-white/70
                                       dark:border-slate-700/35 dark:bg-slate-900/20
                                       text-slate-700 dark:text-slate-200
                                       hover:-translate-y-0.5 transition">
                            Close
                        </button>
                    </div>

                    <div class="modal-scroll max-h-[70vh] overflow-auto p-3 sm:p-4">
                        <div class="space-y-2">
                            @foreach($content['script'] as $line)
                                <div class="rounded-2xl border border-slate-200/60 bg-white/70
                                            dark:border-slate-700/30 dark:bg-slate-900/20 p-3">
                                    <div class="font-black text-[12px] sm:text-sm text-indigo-700 dark:text-indigo-300 mb-1">
                                        {{ $line['speaker'] }}
                                    </div>
                                    <div class="text-xs sm:text-sm font-semibold text-slate-700 dark:text-slate-200 leading-relaxed">
                                        {{ $line['text'] }}
                                    </div>
                                </div>
                            @endforeach
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
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";
            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "metadata";
                audio.crossOrigin = "anonymous";

                let currentBtn = null;

                function setSpeaking(btn, on) {
                    if (!btn) return;
                    btn.classList.toggle("speaking", !!on);
                }

                function stop() {
                    try { audio.pause(); audio.currentTime = 0; } catch (e) {}
                    setSpeaking(currentBtn, false);
                    currentBtn = null;
                }

                window[KEY] = { audio, stop };
            }
        })();

        function onReady(fn) {
            if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", fn, { once: true });
            else fn();
        }

        onReady(() => {
            const ENGINE = window.__BEC_GLOBAL_SLIDER_AUDIO__;
            const audio = ENGINE.audio;

            const BIND_KEY = "__BEC_BIND_SICKNESS_MCQ__";
            if (window[BIND_KEY]) window[BIND_KEY].abort();
            const ac = new AbortController();
            window[BIND_KEY] = ac;

            const audioEl = document.getElementById("audio");
            const playBtn = document.getElementById("playBtn");
            const seek = document.getElementById("seek");
            const curTime = document.getElementById("curTime");
            const durTime = document.getElementById("durTime");

            const openScript = document.getElementById("openScript");
            const scriptModal = document.getElementById("scriptModal");
            const scriptBackdrop = document.getElementById("scriptBackdrop");
            const closeScript = document.getElementById("closeScript");

            const fmt = (s) => {
                s = Math.max(0, Math.floor(s || 0));
                const m = Math.floor(s / 60);
                const r = s % 60;
                return `${m}:${String(r).padStart(2, "0")}`;
            };

            const desiredSrc = new URL((audioEl && audioEl.getAttribute("src")) || "", window.location.href).toString();

            function isMounted() { return !!(playBtn && playBtn.isConnected); }
            function isThisTrackActive() { return !!audio.src && audio.src === desiredSrc; }
            function setPlayingUI(on) { if (isMounted()) playBtn.classList.toggle("playing", !!on); }

            function syncUI() {
                if (!isMounted()) return;
                if (!isThisTrackActive()) {
                    setPlayingUI(false);
                    curTime.textContent = "0:00";
                    seek.value = 0;
                    return;
                }
                setPlayingUI(!audio.paused);
                curTime.textContent = fmt(audio.currentTime);
                if (audio.duration) {
                    durTime.textContent = fmt(audio.duration);
                    seek.value = Math.round((audio.currentTime / audio.duration) * 100);
                } else {
                    seek.value = 0;
                }
            }

            if (desiredSrc) {
                const meta = new Audio();
                meta.preload = "metadata";
                meta.src = desiredSrc;
                meta.addEventListener("loadedmetadata", () => {
                    if (durTime && durTime.isConnected) durTime.textContent = fmt(meta.duration);
                }, { signal: ac.signal });
            }

            if (playBtn) {
                playBtn.addEventListener("click", () => {
                    if (!desiredSrc) return;
                    if (!isThisTrackActive()) {
                        audio.src = desiredSrc;
                        audio.currentTime = 0;
                    }
                    if (audio.paused) audio.play().catch(() => {});
                    else audio.pause();
                }, { signal: ac.signal });
            }

            audio.addEventListener("play",  () => { if (isMounted() && isThisTrackActive()) setPlayingUI(true); },  { signal: ac.signal });
            audio.addEventListener("pause", () => { if (isMounted() && isThisTrackActive()) setPlayingUI(false); }, { signal: ac.signal });
            audio.addEventListener("ended", () => { if (isMounted() && isThisTrackActive()) setPlayingUI(false); }, { signal: ac.signal });
            audio.addEventListener("loadedmetadata", () => { if (isMounted() && isThisTrackActive()) durTime.textContent = fmt(audio.duration); }, { signal: ac.signal });
            audio.addEventListener("timeupdate", () => { if (isMounted() && isThisTrackActive()) syncUI(); }, { signal: ac.signal });

            if (seek) {
                seek.addEventListener("input", () => {
                    if (!isThisTrackActive() || !audio.duration) return;
                    audio.currentTime = (Number(seek.value) / 100) * audio.duration;
                }, { signal: ac.signal });
            }

            let lastFocus = null;

            function openModal() {
                if (!scriptModal) return;
                lastFocus = document.activeElement;
                scriptModal.classList.remove("hidden");
                document.documentElement.classList.add("overflow-hidden");
                document.body.classList.add("overflow-hidden");
                if (closeScript) closeScript.focus();
            }

            function closeModal() {
                if (!scriptModal) return;
                scriptModal.classList.add("hidden");
                document.documentElement.classList.remove("overflow-hidden");
                document.body.classList.remove("overflow-hidden");
                if (lastFocus && typeof lastFocus.focus === "function") lastFocus.focus();
            }

            if (openScript) openScript.addEventListener("click", openModal, { signal: ac.signal });
            if (closeScript) closeScript.addEventListener("click", closeModal, { signal: ac.signal });
            if (scriptBackdrop) scriptBackdrop.addEventListener("click", closeModal, { signal: ac.signal });

            window.addEventListener("keydown", (e) => {
                if (!scriptModal || scriptModal.classList.contains("hidden")) return;
                if (e.key === "Escape") closeModal();
            }, { signal: ac.signal });

            window.stopSlideAudio = function () {
                ENGINE.stop();
                setPlayingUI(false);
                if (seek && seek.isConnected) seek.value = 0;
                if (curTime && curTime.isConnected) curTime.textContent = "0:00";
            };

            window.destroySlide = function () {
                ac.abort();
            };

            syncUI();
        });
    </script>
@endsection