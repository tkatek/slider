@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .nl-page {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        /* Smaller blanks */
        .blank { width: 8rem; }
        @media (max-width: 640px){ .blank { width: 7rem; } }
        @media (min-width: 1024px){ .blank { width: 7.25rem; } }

        .blank.blank-autosize {
            width: auto;
            min-width: 8rem;
        }
        @media (max-width: 640px){ .blank.blank-autosize { min-width: 7rem; } }
        @media (min-width: 1024px){ .blank.blank-autosize { min-width: 7.25rem; } }

        .blank:focus-visible{
            outline: none;
            box-shadow: 0 0 0 4px rgba(99,102,241,.14);
        }

        /* ✅ Audio: show ONLY waves when playing */
        .wave-bar{
            display: none;
            width: 3px;
            height: 11px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        /* playing: waves on, play icon off */
        .play-btn.playing .wave-bar{
            display: block;
            animation: waveGrowth 0.6s infinite ease-in-out;
        }
        .play-btn.playing .play-icon{ display: none; }

        /* not playing: play icon on, waves off */
        .play-btn:not(.playing) .wave-bar{ display: none; }

        @keyframes waveGrowth { 0%,100%{height:6px} 50%{height:14px} }

        .play-btn:focus-visible{
            outline: none;
            box-shadow: 0 0 0 4px rgba(99,102,241,.16);
        }

        .blank::placeholder {
            color: rgba(148, 163, 184, .95);
        }
    </style>
@endsection

@section('content')
    @php
        $questionCount = count(array_filter($content['sentences'] ?? [], function ($sentence) {
            return !empty($sentence['answers']);
        }));
        $speakerDisplay = $content['speaker_display'] ?? 'badge';
        $speakerStyles = $content['speaker_styles'] ?? [];
        $progressLabel = $content['progress_label'] ?? 'Question';
        $progressMode = $content['progress_mode'] ?? 'question';
        $autosizeBlanks = !empty($content['autosize_blanks']);
        $blankCount = 0;
        foreach (($content['sentences'] ?? []) as $sentence) {
            $blankCount += count($sentence['answers'] ?? []);
        }
        $progressTotal = $progressMode === 'blank' ? $blankCount : $questionCount;
        $progressStart = $progressMode === 'blank'
            ? 0
            : ($progressTotal > 0 ? 1 : 0);
    @endphp

    <main class="nl-page flex min-h-[100dvh] w-full flex-col" id="slideMain">
        <div id="slideTitleBlock" class="header-spacing text-center space-y-6 my-8 anim-title">
            <h1 class="tracking-tight text-3xl md:text-4xl lg:text-5xl font-black mb-5">
                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $content['title'] }}
                </span>
            </h1>

            <p class="mx-auto max-w-3xl text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                {{ $content['subtitle'] }}
            </p>
        </div>

        <div id="slideStatusRow" class="mx-auto mb-5 w-full max-w-[1180px] overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
            <div class="grid grid-cols-4">
                <div class="px-3 py-3 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                    @if($progressLabel !== '')
                        <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                            {{ $progressLabel }}
                        </div>
                    @endif
                    <div class="text-base font-black sm:text-lg">
                        <span id="questionCount">{{ $progressStart }}/{{ $progressTotal }}</span>
                    </div>
                </div>

                <div class="px-3 py-3 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                    <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                        Correct
                    </div>
                    <div class="text-base font-black sm:text-lg">
                        ✅ <span id="correctCount">0</span>
                    </div>
                </div>

                <div class="px-3 py-3 sm:px-4 sm:py-4 border-r border-slate-200/70 dark:border-slate-800">
                    <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                        Mistakes
                    </div>
                    <div class="text-base font-black sm:text-lg">
                        ❌ <span id="mistakesCount">0</span>
                    </div>
                </div>

                <div class="px-3 py-3 sm:px-4 sm:py-4">
                    <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                        Time
                    </div>
                    <div class="text-base font-black sm:text-lg">
                        ⏱️ <span id="timerCount">00:00</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto w-full max-w-[1260px] px-3 sm:px-5 lg:px-6 pt-4 pb-6 lg:min-h-0 lg:flex-1">

            <section class="anim-panel rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 p-3 sm:p-4 mb-4">

                <div class="flex items-start gap-4">
                    <button id="playBtn"
                            type="button"
                            class="play-btn inline-flex items-center justify-center h-12 w-12 rounded-full
                               bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20
                               transition-all duration-150 active:scale-95 hover:scale-[1.06]"
                            aria-label="Play audio">

                        {{-- ✅ only play icon + waves (removed pause icon) --}}
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
                            <div class="shrink-0 text-[11px] font-extrabold tabular-nums text-indigo-700 dark:text-indigo-200">
                                <span id="curTime">0:00</span><span class="opacity-60">/</span><span id="durTime">0:00</span>
                            </div>
                        </div>

                        <div class="mt-1.5 flex items-center justify-between gap-2">
                            <button id="toggleScript"
                                    type="button"
                                    class="text-[11px] sm:text-xs font-black
                                       rounded-xl px-3 py-1.5
                                       border border-slate-200/70 bg-white/80
                                       dark:border-slate-700/35 dark:bg-slate-900/20
                                       text-slate-700 dark:text-slate-200
                                       hover:-translate-y-0.5 transition">
                                Show script
                            </button>

                        </div>
                    </div>
                </div>

                <audio id="audio" preload="metadata" src="{{ $content['audio'] }}"></audio>

                <div id="scriptBox"
                     class="hidden mt-3 rounded-2xl border border-slate-200/70 bg-white/75
                        dark:border-slate-700/30 dark:bg-slate-900/20 p-3 sm:p-4">
                    <div class="text-sm font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50 mb-2">
                        Script
                    </div>

                    <div class="space-y-1.5">
                        @foreach($content['script'] as $line)
                            <div class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                {{ $line }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Fill-in section --}}
            <section class="anim-panel rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl
                        dark:border-slate-700/60 dark:bg-slate-900/60
                        p-3 sm:p-4">

                <div class="flex items-center justify-between gap-2 mb-3">
                    <div class="flex items-center gap-2">
                        <span class="text-sm">✍️</span>
                        <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                            Complete the sentences
                        </h2>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <button id="resetBtn"
                                type="button"
                                class="rounded-xl px-3 py-1.5 text-[11px] sm:text-xs font-black
                                   border border-slate-200/70 bg-white/80
                                   dark:border-slate-700/35 dark:bg-slate-900/20
                                   text-slate-700 dark:text-slate-200
                                   hover:-translate-y-0.5 transition">
                            Reset
                        </button>

                        <button id="checkBtn"
                                type="button"
                                class="rounded-xl px-3 py-1.5 text-[11px] sm:text-xs font-black
                                   border border-indigo-500/25 bg-indigo-500/10
                                   dark:border-indigo-500/30 dark:bg-indigo-500/15
                                   text-indigo-700 dark:text-indigo-200
                                   hover:-translate-y-0.5 transition">
                            Check
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3">
                    @foreach($content['sentences'] as $idx => $s)
                        @php
                            $isA = ($s['speaker'] === 'A');
                            $badge = $isA
                                ? 'border-indigo-500/25 bg-indigo-500/10 text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200'
                                : 'border-emerald-500/25 bg-emerald-500/10 text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/15 dark:text-emerald-200';
                            $speakerClass = $speakerStyles[$s['speaker']] ?? ($isA
                                ? 'text-blue-600 dark:text-blue-400'
                                : 'text-pink-600 dark:text-pink-400');
                        @endphp

                        <article class="exercise-card rounded-[26px] border border-slate-200/70 bg-white/70
                                    shadow-[0_14px_44px_-26px_rgba(15,23,42,0.45)]
                                    dark:border-slate-700/35 dark:bg-slate-950/30
                                    p-3 sm:p-4">
                            <div class="flex items-start gap-2 lg:gap-2.5">
                                @if($speakerDisplay !== 'inline')
                                    <div class="h-8 w-8 rounded-2xl flex items-center justify-center font-black text-xs {{ $badge }}">
                                        {{ $s['speaker'] }}
                                    </div>
                                @endif

                                <div class="min-w-0 flex-1 text-base sm:text-lg font-bold leading-[1.45]
                                        text-slate-900 dark:text-slate-100 break-words lg:whitespace-nowrap">
                                    @php
                                        $answers = $s['answers'];
                                        $parts = $s['parts'];
                                    @endphp

                                    @if($speakerDisplay === 'inline')
                                        <strong class="{{ $speakerClass }}">{{ $s['speaker'] }}:</strong>
                                        {{ ' ' }}
                                    @endif

                                    @for($p = 0; $p < count($parts); $p++)
                                        {!! $parts[$p] !!}

                                        @if($p < count($answers))
                                            <input
                                                    class="blank {{ $autosizeBlanks ? 'blank-autosize' : '' }} inline-block align-baseline mx-1 px-2.5 py-1.5 rounded-xl
                                                       border border-slate-200/80 bg-white/90
                                                       dark:border-slate-700/40 dark:bg-slate-900/30
                                                       text-slate-900 dark:text-slate-50
                                                       font-black text-sm sm:text-base"
                                                    type="text"
                                                    spellcheck="false"
                                                    autocomplete="off"
                                                    inputmode="text"
                                                    placeholder="............."
                                                    data-answer="{{ $answers[$p] }}"
                                                    data-autosize="{{ $autosizeBlanks ? 'true' : 'false' }}"
                                                    aria-label="Blank {{ $p + 1 }} for sentence {{ $idx + 1 }}"
                                            />
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <p class="mt-3 text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                    Type what you hear (example:
                    <span class="font-black text-indigo-700 dark:text-indigo-200">
                        August 23rd - August 16th - thirty first - twenty seventh - twenty second
                    </span>).
                </p>
            </section>

        </div>
    </main>
@endsection

@section('script')
    <script>
        /* =========================================================
           Global shared audio engine (same key used in other slides)
           - One Audio instance reused across slides
           - Survives DOM swaps / slider navigation
        ========================================================== */
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "metadata";
                audio.crossOrigin = "anonymous";

                let currentBtn = null;

                function setSpeaking(btn, on) {
                    if (!btn) return;
                    btn.classList.toggle("speaking", !!on); // used by other slides
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}
                    setSpeaking(currentBtn, false);
                    currentBtn = null;
                }

                // used by phrase slides (optional)
                function play(src, btn) {
                    if (!src) return;
                    const resolved = new URL(src, window.location.href).toString();

                    if (currentBtn === btn && !audio.paused) {
                        stop();
                        return;
                    }

                    stop();
                    currentBtn = btn || null;
                    setSpeaking(currentBtn, true);

                    try {
                        if (audio.src !== resolved) audio.src = resolved;
                        audio.currentTime = 0;

                        const p = audio.play();
                        if (p && typeof p.catch === "function") p.catch(() => stop());
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", () => {
                    setSpeaking(currentBtn, false);
                    currentBtn = null;
                });

                audio.addEventListener("error", () => {
                    setSpeaking(currentBtn, false);
                    currentBtn = null;
                });

                window[KEY] = { audio, stop, play };
            }
        })();

        // Run even if DOMContentLoaded already passed (SPA / slide swaps)
        function onReady(fn) {
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const ENGINE = window.__BEC_GLOBAL_SLIDER_AUDIO__;
            const audio = ENGINE.audio;

            // Avoid duplicated bindings if this slide is visited multiple times
            const BIND_KEY = "__BEC_BIND_VACATION_DATES_FILL__";
            const TIMER_KEY = "__BEC_TIMER_VACATION_DATES_FILL__";
            if (window[BIND_KEY]) window[BIND_KEY].abort();
            if (window[TIMER_KEY]) clearInterval(window[TIMER_KEY]);
            const ac = new AbortController();
            window[BIND_KEY] = ac;

            // Elements
            const audioEl = document.getElementById("audio"); // only used as src holder (DOM audio can be removed by slider)
            const playBtn = document.getElementById("playBtn");
            const seek = document.getElementById("seek");
            const curTime = document.getElementById("curTime");
            const durTime = document.getElementById("durTime");
            const toggleScript = document.getElementById("toggleScript");
            const scriptBox = document.getElementById("scriptBox");
            const questionCountEl = document.getElementById("questionCount");
            const correctCountEl = document.getElementById("correctCount");
            const mistakesCountEl = document.getElementById("mistakesCount");
            const timerCountEl = document.getElementById("timerCount");
            const questionCards = Array.from(document.querySelectorAll(".exercise-card")).filter(card => card.querySelector(".blank"));
            const progressMode = @json($progressMode);
            const totalQuestions = questionCards.length;
            const startTime = Date.now();

            let timerInterval = null;

            const fmt = (s) => {
                s = Math.max(0, Math.floor(s || 0));
                const m = Math.floor(s / 60);
                const r = s % 60;
                return `${m}:${String(r).padStart(2, "0")}`;
            };

            function updateTimer() {
                if (!timerCountEl || !timerCountEl.isConnected) return;
                timerCountEl.textContent = fmt((Date.now() - startTime) / 1000);
            }

            function setProgress(correctQuestions, mistakeQuestions, filledCount = null) {
                const safeTotal = progressMode === "blank" ? blanks.length : totalQuestions || 0;
                const currentQuestion = progressMode === "blank"
                    ? Math.min(Number(filledCount || 0), safeTotal)
                    : (safeTotal === 0 ? 0 : Math.min(correctQuestions + 1, safeTotal));

                if (questionCountEl) questionCountEl.textContent = `${currentQuestion}/${safeTotal}`;
                if (correctCountEl) correctCountEl.textContent = String(correctQuestions);
                if (mistakesCountEl) mistakesCountEl.textContent = String(mistakeQuestions);
            }

            // Resolve desired src (audio.src is always absolute)
            const desiredSrc = new URL(
                (audioEl && audioEl.getAttribute("src")) || "",
                window.location.href
            ).toString();

            function isMounted() {
                return !!(playBtn && playBtn.isConnected);
            }

            function isThisTrackActive() {
                // audio.src is "" if never set
                return !!audio.src && audio.src === desiredSrc;
            }

            function setPlayingUI(on) {
                if (!isMounted()) return;
                playBtn.classList.toggle("playing", !!on);
            }

            function syncUI() {
                if (!isMounted()) return;

                if (!isThisTrackActive()) {
                    // This slide isn't controlling the currently playing global audio
                    setPlayingUI(false);
                    curTime.textContent = "0:00";
                    // keep durTime as whatever metadata preload found
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

            // Preload metadata for duration display WITHOUT touching global playback
            // (so entering this slide doesn't interrupt audio playing from other slides)
            if (desiredSrc) {
                const meta = new Audio();
                meta.preload = "metadata";
                meta.src = desiredSrc;
                meta.addEventListener("loadedmetadata", () => {
                    if (!durTime || !durTime.isConnected) return;
                    durTime.textContent = fmt(meta.duration);
                }, { signal: ac.signal });
            }

            // Play/pause button controls global audio
            if (playBtn) {
                playBtn.addEventListener("click", () => {
                    if (!desiredSrc) return;

                    // If another track is active, switch to this one on user intent
                    if (!isThisTrackActive()) {
                        audio.src = desiredSrc;
                        audio.currentTime = 0;
                    }

                    if (audio.paused) {
                        audio.play().catch(() => {});
                    } else {
                        audio.pause();
                    }
                }, { signal: ac.signal });
            }

            // Bind global audio events -> update THIS slide UI only when relevant
            audio.addEventListener("play", () => {
                if (!isMounted()) return;
                if (isThisTrackActive()) setPlayingUI(true);
            }, { signal: ac.signal });

            audio.addEventListener("pause", () => {
                if (!isMounted()) return;
                if (isThisTrackActive()) setPlayingUI(false);
            }, { signal: ac.signal });

            audio.addEventListener("ended", () => {
                if (!isMounted()) return;
                if (isThisTrackActive()) setPlayingUI(false);
            }, { signal: ac.signal });

            audio.addEventListener("loadedmetadata", () => {
                if (!isMounted()) return;
                if (isThisTrackActive()) durTime.textContent = fmt(audio.duration);
            }, { signal: ac.signal });

            audio.addEventListener("timeupdate", () => {
                if (!isMounted()) return;
                if (isThisTrackActive()) syncUI();
            }, { signal: ac.signal });

            if (seek) {
                seek.addEventListener("input", () => {
                    if (!isThisTrackActive() || !audio.duration) return;
                    audio.currentTime = (Number(seek.value) / 100) * audio.duration;
                }, { signal: ac.signal });
            }

            // Script toggle (unchanged)
            if (toggleScript && scriptBox) {
                toggleScript.addEventListener("click", () => {
                    const open = scriptBox.classList.toggle("hidden") === false;
                    toggleScript.textContent = open ? "Hide script" : "Show script";
                }, { signal: ac.signal });
            }

            // Check / reset (unchanged)
            const checkBtn = document.getElementById("checkBtn");
            const resetBtn = document.getElementById("resetBtn");
            const blanks = Array.from(document.querySelectorAll(".blank"));

            const normalize = (t) => (t || "")
                .toLowerCase()
                .replace(/[.?!,]/g, "")
                .replace(/\s+/g, " ")
                .trim();

            function resizeBlank(inp) {
                if (!inp || inp.dataset.autosize !== "true") return;

                inp.style.width = "auto";

                const answerLength = (inp.dataset.answer || "").trim().length;
                const valueLength = (inp.value || "").trim().length;
                const minChars = Math.max(12, answerLength);
                const nextChars = Math.max(minChars, valueLength + 1);

                inp.style.width = `${nextChars}ch`;
            }

            function clearMarks(){
                blanks.forEach(inp => {
                    inp.classList.remove("ring-2","ring-emerald-500","ring-red-500","border-emerald-400","border-red-400");
                });
            }

            function evaluateQuestions() {
                if (progressMode === "blank") {
                    let filledBlanks = 0;
                    let correctBlanks = 0;
                    let mistakeBlanks = 0;

                    blanks.forEach(inp => {
                        const user = normalize(inp.value);
                        const ans = normalize(inp.dataset.answer);
                        if (!!user) filledBlanks++;
                        if (!!user && user === ans) correctBlanks++;
                        else if (!!user) mistakeBlanks++;
                    });

                    setProgress(correctBlanks, mistakeBlanks, filledBlanks);
                    return;
                }

                let correctQuestions = 0;
                let mistakeQuestions = 0;

                questionCards.forEach(card => {
                    const cardBlanks = Array.from(card.querySelectorAll(".blank"));
                    if (!cardBlanks.length) return;

                    const allCorrect = cardBlanks.every(inp => {
                        const user = normalize(inp.value);
                        const ans = normalize(inp.dataset.answer);
                        return !!user && user === ans;
                    });

                    if (allCorrect) correctQuestions++;
                    else mistakeQuestions++;
                });

                setProgress(correctQuestions, mistakeQuestions);
            }

            if (checkBtn) {
                checkBtn.addEventListener("click", () => {
                    blanks.forEach(inp => {
                        const user = normalize(inp.value);
                        const ans  = normalize(inp.dataset.answer);
                        const ok = user && user === ans;

                        inp.classList.add("ring-2");
                        inp.classList.remove("border-slate-200/80","dark:border-slate-700/40");

                        if (ok) {
                            inp.classList.add("ring-emerald-500","border-emerald-400");
                            inp.classList.remove("ring-red-500","border-red-400");
                        } else {
                            inp.classList.add("ring-red-500","border-red-400");
                            inp.classList.remove("ring-emerald-500","border-emerald-400");
                        }
                    });

                    evaluateQuestions();
                }, { signal: ac.signal });
            }

            if (resetBtn) {
                resetBtn.addEventListener("click", () => {
                    blanks.forEach(inp => {
                        inp.value = "";
                        resizeBlank(inp);
                    });
                    clearMarks();
                    setProgress(0, 0);
                }, { signal: ac.signal });
            }

            blanks.forEach(inp => {
                resizeBlank(inp);

                if (inp.dataset.autosize === "true") {
                    inp.addEventListener("input", () => {
                        resizeBlank(inp);
                    }, { signal: ac.signal });
                }
            });

            // GSAP entrance (unchanged)
            if (window.gsap && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                const title = document.querySelector(".anim-title");
                const statusRow = document.getElementById("slideStatusRow");
                const panels = Array.from(document.querySelectorAll(".anim-panel"));
                const cards = Array.from(document.querySelectorAll(".exercise-card"));

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(title,  { opacity: 0, y: 8,  duration: 0.45 }, 0.05)
                    .from(statusRow, { opacity: 0, y: 8, duration: 0.4 }, 0.12)
                    .from(panels, { opacity: 0, y: 6,  duration: 0.35, stagger: 0.10 }, 0.18)
                    .from(cards,  { opacity: 0, y: 5,  duration: 0.28, stagger: 0.05 }, 0.28);
            }

            // Make this available for the slider to call on slide change (if you want to stop audio)
            window.stopSlideAudio = function () {
                ENGINE.stop();
                setPlayingUI(false);
                if (seek && seek.isConnected) seek.value = 0;
                if (curTime && curTime.isConnected) curTime.textContent = "0:00";
            };

            // Optional cleanup hook (if your slider has a leave/unmount callback)
            window.destroySlide = function () {
                if (timerInterval) clearInterval(timerInterval);
                window[TIMER_KEY] = null;
                ac.abort();
            };

            // Initial UI sync (in case audio already active and this slide is reopened)
            setProgress(0, 0);
            updateTimer();
            timerInterval = setInterval(updateTimer, 1000);
            window[TIMER_KEY] = timerInterval;
            syncUI();
        });
    </script>
@endsection
