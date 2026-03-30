@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .wave-bar{display:none;width:3px;height:10px;background:currentColor;border-radius:999px;margin:0 1px;}
        .play-hit{-webkit-tap-highlight-color:transparent;}
        .play-hit:focus-visible{outline:none;}
        .audio-listen-btn.playing .wave-bar{display:block;animation:waveGrowth .6s infinite ease-in-out;}
        .audio-listen-btn.playing .static-icon{display:none;}
        @keyframes waveGrowth{0%,100%{height:7px}50%{height:15px}}

        .lta-native-audio {
            display: none;
        }

        .lta-audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(199,210,254,0.55);
        }

        .dark .lta-audio-track {
            background: rgba(99,102,241,0.25);
        }

        .lta-audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .lta-audio-knob {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: white;
            border: 2px solid #4f46e5;
            box-shadow: 0 6px 14px rgba(2,6,23,0.18);
            left: 0%;
        }

        .answer-input:focus,
        .answer-textarea:focus,
        .transcript-btn:focus-visible,
        .reveal-btn:focus-visible,
        .retake-btn:focus-visible{
            outline:none;
            box-shadow:0 0 0 4px rgba(99,102,241,.16); 
        }

        .lesson-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, 1);
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
        }

        .dark .lesson-card {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            box-shadow: none;
        }

        .soft-btn {
            border-radius: 12px;
            border: 1px solid rgba(226,232,240,1);
            background: #ffffff;
            color: rgba(15,23,42,1);
            box-shadow: 0 8px 22px rgba(2,6,23,.05);
            transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
        }

        .dark .soft-btn {
            background: #0f172a;
            color: #e2e8f0;
            border-color: rgba(51,65,85,1);
        }

        .soft-btn:hover { transform: translateY(-1px); }
        .soft-btn:active { transform: translateY(0px) scale(.98); }

        .primary-btn {
            border-radius: 16px;
            color: white;
            border: 1px solid rgba(255,255,255,.18);
            background: linear-gradient(135deg, #673fe7, #4f46e5, #3b82f6);
            box-shadow: 0 16px 40px rgba(79,70,229,.22);
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .primary-btn:hover { transform: translateY(-1px); }
        .primary-btn:active { transform: translateY(0px) scale(.98); }

        .answer-row {
            border-radius: 24px;
            border: 1px solid rgba(226,232,240,1);
            background: #ffffff;
        }

        .dark .answer-row {
            border-color: rgba(51,65,85,1);
            background: #0f172a;
        }

        .answer-index {
            border: 2px solid rgba(224,231,255,1);
            background: rgba(238,242,255,.8);
            color: #4f46e5;
        }

        .dark .answer-index {
            border-color: rgba(255,255,255,.1);
            background: rgba(255,255,255,.05);
            color: #a5b4fc;
        }

        .answer-input.is-revealed-answer {
            border-color: rgba(244,63,94,.45);
            background: rgba(255,241,242,.95);
            color: #9f1239;
        }

        .dark .answer-input.is-revealed-answer {
            border-color: rgba(251,113,133,.35);
            background: rgba(159,18,57,.16);
            color: #fecdd3;
        }
    </style>
@endsection

@section('content')
    @php
        $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
        $rawTranscript = $content['transcript'] ?? [];
        $transcriptLines = is_array($rawTranscript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawTranscript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawTranscript)) ?: []),
                static fn ($line) => $line !== ''
            ));
        $hasTranscript = $transcriptLines !== [];
        $hasRevealAnswers = collect($content['questions'] ?? [])->contains(function ($q) {
            return !empty($q['answer'] ?? $q['sample_answer'] ?? $q['revealed_answer'] ?? null);
        });
    @endphp
    <main class="w-full">
        <div class="page-shell mx-auto w-full max-w-5xl px-4 sm:px-8 py-6 sm:py-8 lg:min-h-[100dvh] lg:flex lg:flex-col lg:justify-center">

            <header class="header-spacing text-center space-y-4 my-4 sm:my-6 anim-title">
                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-3 sm:mb-4">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            {{-- Audio + Transcript --}}
            <section class="anim-panel lesson-card w-full p-4 sm:p-5 mb-4">
                @if(!empty($playerAudio))
                    <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-4 py-3 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-5 sm:py-3.5 flex items-start gap-4">
                        <button
                            id="ltaPlayAudioBtn"
                            type="button"
                            class="play-hit audio-listen-btn inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                            aria-label="Play audio"
                        >
                            <svg class="static-icon h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8 5v14l11-7-11-7z"/>
                            </svg>

                            <span class="wave-bar" style="animation-delay:.1s"></span>
                            <span class="wave-bar" style="animation-delay:.2s"></span>
                            <span class="wave-bar" style="animation-delay:.3s"></span>
                        </button>

                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3">
                                <div class="flex-1 flex flex-col gap-2 min-w-0">
                                    <div class="lta-audio-track mt-1 cursor-pointer" id="ltaProgressTrack" aria-label="Audio progress">
                                        <div class="lta-audio-fill" id="ltaProgressFill"></div>
                                        <div class="lta-audio-knob" id="ltaProgressKnob"></div>
                                    </div>

                                    <div class="flex justify-between text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                        <span id="ltaCurrentTime">0:00</span>
                                        <span id="ltaTotalTime">0:00</span>
                                    </div>
                                </div>

                                @if($hasTranscript)
                                    <button
                                        id="ltaShowTranscriptBtn"
                                        type="button"
                                        class="transcript-btn shrink-0 inline-flex items-center justify-center gap-2 rounded-lg px-3 py-1.5 text-xs font-black text-white border border-white/20 bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 shadow-md shadow-indigo-600/10 transition-transform duration-200 hover:scale-105 active:scale-95"
                                    >
                                        <span>Transcript</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <audio id="ltaPromptAudio" class="lta-native-audio" preload="metadata">
                        <source src="{{ $playerAudio }}" type="audio/mpeg">
                    </audio>
                @endif
            </section>

            {{-- Questions --}}
            <section class="anim-panel lesson-card w-full p-4 sm:p-5">
                <div class="flex items-center justify-between mb-3 gap-2 flex-wrap">
                    <h2 class="font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">
                        Answer the questions
                    </h2>

                    @if($hasRevealAnswers)
                        <div class="flex flex-wrap items-center justify-end gap-2">
                            <button
                                id="revealAnswersBtn"
                                type="button"
                                class="reveal-btn inline-flex items-center justify-center gap-2 rounded-lg px-3 py-1.5 text-xs font-black text-white border border-white/20 bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 shadow-md shadow-indigo-600/10 transition-transform duration-200 hover:scale-105 active:scale-95"
                            >
                                Reveal answers
                            </button>

                            <button
                                id="retakeTestBtn"
                                type="button"
                                class="retake-btn hidden soft-btn inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-black"
                            >
                                Retake test
                            </button>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 gap-3">
                    @foreach($content['questions'] as $i => $q)
                        <article class="answer-row p-4 sm:p-4.5">
                            <div class="flex items-start gap-2.5">
                                <div class="answer-index h-10 w-10 sm:h-11 sm:w-11 shrink-0 rounded-2xl flex items-center justify-center font-extrabold text-[0.95rem]">
                                    {{ $q['number'] }}
                                </div>

                                <div class="min-w-0 flex-1">
                                    <label for="q_{{ $content['uid'] }}_{{ $i }}"
                                           class="block text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100 mb-2">
                                        {{ $q['prompt'] }}
                                    </label>

                                    <input
                                            id="q_{{ $content['uid'] }}_{{ $i }}"
                                            type="text"
                                            data-answer="{{ $q['answer'] ?? $q['sample_answer'] ?? $q['revealed_answer'] ?? '' }}"
                                            class="answer-input w-full rounded-2xl border border-slate-200 bg-white
                                               dark:border-slate-700 dark:bg-slate-950/25
                                               px-3 py-3 text-base font-semibold text-slate-800 dark:text-slate-100
                                               placeholder:text-slate-400 dark:placeholder:text-slate-500"
                                            placeholder="{{ $q['placeholder'] ?? 'Write your answer...' }}"
                                    >
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            @if($hasTranscript)
                <div id="ltaTranscriptModal" class="hidden fixed inset-0 z-[3000]">
                    <div id="ltaTranscriptBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                    <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                        <div class="w-full max-w-3xl max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95 text-left">
                            <div class="flex items-center justify-between border-b border-slate-200/70 px-4 py-3 dark:border-slate-700/70 sm:px-5 sm:py-4">
                                <div class="font-black text-sm text-slate-900 dark:text-slate-50 sm:text-base">
                                    Transcript
                                </div>

                                <button
                                    id="ltaCloseTranscriptBtn"
                                    type="button"
                                    class="rounded-xl px-3 py-1.5 text-[11px] sm:text-xs font-black border border-slate-200/70 bg-white/70 text-slate-700 transition hover:-translate-y-0.5 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200"
                                    aria-label="Close transcript"
                                >
                                    Close
                                </button>
                            </div>

                            <div class="max-h-[70vh] overflow-auto p-3 sm:p-4">
                                <div class="space-y-2">
                                    @foreach($transcriptLines as $i => $line)
                                        @php
                                            $parts = explode(':', $line, 2);
                                            $speaker = count($parts) > 1 ? trim($parts[0]) : null;
                                            $text = count($parts) > 1 ? trim($parts[1]) : $line;
                                        @endphp

                                        <div class="rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20">
                                            <div class="flex items-start gap-2.5">
                                                <div class="flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200">
                                                    {{ $i + 1 }}
                                                </div>

                                                <div class="min-w-0 flex-1">
                                                    @if($speaker)
                                                        <div class="mb-0.5 text-[11px] sm:text-xs font-black uppercase tracking-wide text-indigo-600 dark:text-indigo-300">
                                                            {{ $speaker }}
                                                        </div>
                                                    @endif
                                                    <div class="text-sm sm:text-[15px] font-semibold text-slate-700 dark:text-slate-200">
                                                        {{ $text }}
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

        </div>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const BIND_KEY = "__BEC_BIND_LISTENING_TYPE_ANSWER__";
            if (window[BIND_KEY]) window[BIND_KEY].abort();
            const ac = new AbortController();
            window[BIND_KEY] = ac;

            const playerAudio = document.getElementById("ltaPromptAudio");
            const playAudioBtn = document.getElementById("ltaPlayAudioBtn");
            const progressTrack = document.getElementById("ltaProgressTrack");
            const currentTimeEl = document.getElementById("ltaCurrentTime");
            const totalTimeEl = document.getElementById("ltaTotalTime");
            const progressFill = document.getElementById("ltaProgressFill");
            const progressKnob = document.getElementById("ltaProgressKnob");
            const answerInputs = Array.from(document.querySelectorAll(".answer-input"));
            const revealAnswersBtn = document.getElementById("revealAnswersBtn");
            const retakeTestBtn = document.getElementById("retakeTestBtn");

            const showTranscriptBtn = document.getElementById("ltaShowTranscriptBtn");
            const transcriptModal = document.getElementById("ltaTranscriptModal");
            const transcriptBackdrop = document.getElementById("ltaTranscriptBackdrop");
            const closeTranscriptBtn = document.getElementById("ltaCloseTranscriptBtn");
            let revealedAnswers = false;

            function formatTime(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${mins}:${String(secs).padStart(2, "0")}`;
            }

            function syncPlayerUI() {
                if (!playerAudio) return;

                const duration = isFinite(playerAudio.duration) ? playerAudio.duration : 0;
                const current = isFinite(playerAudio.currentTime) ? playerAudio.currentTime : 0;
                const pct = duration > 0 ? (current / duration) * 100 : 0;

                if (currentTimeEl) currentTimeEl.textContent = formatTime(current);
                if (totalTimeEl) totalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
                if (progressFill) progressFill.style.width = `${pct}%`;
                if (progressKnob) progressKnob.style.left = `${pct}%`;
                if (playAudioBtn) playAudioBtn.classList.toggle("playing", !playerAudio.paused);
            }

            if (playAudioBtn && playerAudio) {
                playAudioBtn.addEventListener("click", () => {
                    if (playerAudio.paused) playerAudio.play().catch(() => {});
                    else playerAudio.pause();
                }, { signal: ac.signal });
            }

            if (progressTrack && playerAudio) {
                progressTrack.addEventListener("click", (event) => {
                    const rect = event.currentTarget.getBoundingClientRect();
                    const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                    const ratio = rect.width > 0 ? x / rect.width : 0;

                    if (isFinite(playerAudio.duration) && playerAudio.duration > 0) {
                        playerAudio.currentTime = ratio * playerAudio.duration;
                        syncPlayerUI();
                    }
                }, { signal: ac.signal });
            }

            if (playerAudio) {
                playerAudio.preload = "metadata";
                playerAudio.addEventListener("loadedmetadata", syncPlayerUI, { signal: ac.signal });
                playerAudio.addEventListener("timeupdate", syncPlayerUI, { signal: ac.signal });
                playerAudio.addEventListener("ended", syncPlayerUI, { signal: ac.signal });
                playerAudio.addEventListener("play", syncPlayerUI, { signal: ac.signal });
                playerAudio.addEventListener("pause", syncPlayerUI, { signal: ac.signal });
            }

            function updateRevealButtons() {
                if (revealAnswersBtn) revealAnswersBtn.classList.toggle("hidden", revealedAnswers);
                if (retakeTestBtn) retakeTestBtn.classList.toggle("hidden", !revealedAnswers);
            }

            function openTranscriptModal() {
                if (!transcriptModal) return;
                transcriptModal.classList.remove("hidden");
                document.documentElement.classList.add("overflow-hidden");
            }

            function closeTranscriptModal() {
                if (!transcriptModal) return;
                transcriptModal.classList.add("hidden");
                document.documentElement.classList.remove("overflow-hidden");
            }

            if (showTranscriptBtn && transcriptModal) {
                showTranscriptBtn.addEventListener("click", openTranscriptModal, { signal: ac.signal });
            }

            if (closeTranscriptBtn) {
                closeTranscriptBtn.addEventListener("click", closeTranscriptModal, { signal: ac.signal });
            }

            if (transcriptBackdrop) {
                transcriptBackdrop.addEventListener("click", closeTranscriptModal, { signal: ac.signal });
            }

            if (revealAnswersBtn) {
                revealAnswersBtn.addEventListener("click", () => {
                    revealedAnswers = true;
                    answerInputs.forEach((input) => {
                        const answer = (input.dataset.answer || "").trim();
                        if (!answer) return;
                        input.value = answer;
                        input.disabled = true;
                        input.classList.add("is-revealed-answer");
                    });
                    updateRevealButtons();
                }, { signal: ac.signal });
            }

            if (retakeTestBtn) {
                retakeTestBtn.addEventListener("click", () => {
                    revealedAnswers = false;
                    answerInputs.forEach((input) => {
                        input.value = "";
                        input.disabled = false;
                        input.classList.remove("is-revealed-answer");
                    });
                    updateRevealButtons();
                }, { signal: ac.signal });
            }

            document.addEventListener("keydown", (event) => {
                if (event.key === "Escape") closeTranscriptModal();
            }, { signal: ac.signal });

            window.stopSlideAudio = function () {
                if (playerAudio) {
                    playerAudio.pause();
                    playerAudio.currentTime = 0;
                    syncPlayerUI();
                }

                closeTranscriptModal();
            };

            window.destroySlide = function () {
                ac.abort();
            };

            syncPlayerUI();
            updateRevealButtons();
        });
    </script>
@endsection
