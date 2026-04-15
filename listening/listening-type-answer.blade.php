@extends('slider.simple-layout')

@php
    $contentUid = trim((string) ($content['uid'] ?? ('listen_' . substr(md5(uniqid('', true)), 0, 10))));
    $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
    $rawTranscript = $content['transcript'] ?? [];
    $scriptLines = is_array($rawTranscript)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawTranscript), static fn ($line) => $line !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawTranscript)) ?: []),
            static fn ($line) => $line !== ''
        ));
    $hasScript = $scriptLines !== [];
    $hasRevealAnswers = collect($content['questions'] ?? [])->contains(function ($q) {
        if (!empty($q['answer'] ?? $q['sample_answer'] ?? $q['revealed_answer'] ?? null)) {
            return true;
        }

        foreach (($q['blanks'] ?? []) as $blank) {
            if (!empty($blank['answer'] ?? $blank['sample_answer'] ?? $blank['revealed_answer'] ?? null)) {
                return true;
            }
        }

        return false;
    });
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        .answer-input:focus,
        .answer-textarea:focus,
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

        .reveal-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(154 52 18);
            border: 1px solid rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .reveal-btn:hover { transform: scale(1.05); background: rgb(254 215 170); box-shadow: 0 10px 24px rgba(234,88,12,.14); }
        .reveal-btn:active { transform: scale(.98); }

        .dark .reveal-btn {
            color: rgb(254 215 170);
            border-color: rgba(194, 65, 12, .45);
            background: rgba(154, 52, 18, .35);
        }

        .dark .reveal-btn:hover {
            background: rgba(154, 52, 18, .5);
        }

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

        .fill-answer-line {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: .18rem .28rem;
            border-radius: 20px;
            border: 1px solid rgba(226,232,240,1);
            background: rgba(248,250,252,.8);
            padding: .9rem 1rem;
        }

        .dark .fill-answer-line {
            border-color: rgba(51,65,85,1);
            background: rgba(2,6,23,.28);
        }

        .fill-answer-text {
            font-size: 1rem;
            line-height: 1.55;
            font-weight: 700;
            color: #334155;
        }

        .dark .fill-answer-text {
            color: #cbd5e1;
        }

        .answer-input.answer-input-inline {
            width: min(100%, var(--blank-width, 11ch));
            min-width: 7rem;
            padding-inline: .85rem;
            text-align: center;
        }

        @media (min-width: 640px) {
            .fill-answer-text {
                font-size: 1.05rem;
            }

            .answer-input.answer-input-inline {
                min-width: 8rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="page-shell mx-auto w-full max-w-5xl px-4 sm:px-8 py-6 sm:py-8 lg:min-h-[100dvh] lg:flex lg:flex-col lg:justify-center">

            @include('slider.components.title-subtitle')

            @if(!empty($playerAudio))
                <section class="anim-panel lesson-card w-full p-4 sm:p-5 mb-4">
                    @include('slider.components.audio-player')
                </section>
            @endif

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
                                    class="reveal-btn"
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
                        @php
                            $questionType = trim((string) ($q['type'] ?? (!empty($q['sentence']) ? 'missing_words' : 'text')));
                            $sentenceTemplate = (string) ($q['sentence'] ?? '');
                            $sentenceParts = $questionType === 'missing_words'
                                ? preg_split('/(\{\{\d+\}\})/', $sentenceTemplate, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY)
                                : [];
                            $questionBlanks = is_array($q['blanks'] ?? null) ? array_values($q['blanks']) : [];
                        @endphp
                        <article class="answer-row p-3.5 sm:p-4">
                            <div class="flex flex-col gap-2">
                                <div class="flex items-start gap-2">
                                    <div class="answer-index h-8 w-8 sm:h-9 sm:w-9 shrink-0 rounded-xl flex items-center justify-center font-extrabold text-[0.82rem] sm:text-[0.9rem]">
                                        {{ $q['number'] ?? ($i + 1) }}
                                    </div>

                                    <label for="q_{{ $contentUid }}_{{ $i }}"
                                           class="min-w-0 flex-1 pt-px text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.4] text-slate-900 dark:text-slate-100">
                                        {{ $q['prompt'] }}
                                    </label>
                                </div>

                                <div class="min-w-0">
                                    @if($questionType === 'missing_words' && $sentenceTemplate !== '' && !empty($questionBlanks))
                                        <div class="fill-answer-line">
                                            @foreach($sentenceParts as $partIndex => $part)
                                                @if(preg_match('/^\{\{(\d+)\}\}$/', $part, $matches))
                                                    @php
                                                        $blankIndex = (int) $matches[1] - 1;
                                                        $blank = $questionBlanks[$blankIndex] ?? [];
                                                        $blankAnswer = trim((string) ($blank['answer'] ?? $blank['sample_answer'] ?? $blank['revealed_answer'] ?? ''));
                                                        $blankPlaceholder = trim((string) ($blank['placeholder'] ?? 'Missing word'));
                                                        $blankWidth = max(
                                                            9,
                                                            min(
                                                                20,
                                                                strlen($blankAnswer !== '' ? $blankAnswer : $blankPlaceholder) + 2
                                                            )
                                                        );
                                                    @endphp
                                                    <input
                                                            id="q_{{ $contentUid }}_{{ $i }}_{{ $blankIndex }}"
                                                            type="text"
                                                            data-answer="{{ $blankAnswer }}"
                                                            class="answer-input answer-input-inline rounded-2xl border border-slate-200 bg-white
                                                               dark:border-slate-700 dark:bg-slate-950/25
                                                               px-3 py-3 text-base font-semibold text-slate-800 dark:text-slate-100
                                                               placeholder:text-slate-400 dark:placeholder:text-slate-500"
                                                            placeholder="{{ $blankPlaceholder }}"
                                                            style="--blank-width: {{ $blankWidth }}ch;"
                                                            aria-label="{{ $blank['label'] ?? ('Missing word ' . ($blankIndex + 1)) }}"
                                                    >
                                                @else
                                                    @php
                                                        $displayPart = trim(preg_replace('/\s+/', ' ', $part));
                                                    @endphp
                                                    @if($displayPart !== '')
                                                        <span class="fill-answer-text">{{ $displayPart }}</span>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @else
                                        <input
                                                id="q_{{ $contentUid }}_{{ $i }}"
                                                type="text"
                                                data-answer="{{ $q['answer'] ?? $q['sample_answer'] ?? $q['revealed_answer'] ?? '' }}"
                                                class="answer-input w-full rounded-2xl border border-slate-200 bg-white
                                                   dark:border-slate-700 dark:bg-slate-950/25
                                                   px-3 py-3 text-base font-semibold text-slate-800 dark:text-slate-100
                                                   placeholder:text-slate-400 dark:placeholder:text-slate-500"
                                                placeholder="{{ $q['placeholder'] ?? 'Write your answer...' }}"
                                        >
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

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

            const answerInputs = Array.from(document.querySelectorAll(".answer-input"));
            const revealAnswersBtn = document.getElementById("revealAnswersBtn");
            const retakeTestBtn = document.getElementById("retakeTestBtn");
            const scriptModal = document.querySelector("[data-audio-player-modal]");
            let revealedAnswers = false;

            function updateRevealButtons() {
                if (revealAnswersBtn) revealAnswersBtn.classList.toggle("hidden", revealedAnswers);
                if (retakeTestBtn) retakeTestBtn.classList.toggle("hidden", !revealedAnswers);
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
                if (event.key === "Escape" && scriptModal) {
                    scriptModal.classList.add("hidden");
                }
            }, { signal: ac.signal });

            window.stopSlideAudio = function () {
                if (typeof window.stopAudioPlayer === "function") {
                    window.stopAudioPlayer();
                }

                if (scriptModal) {
                    scriptModal.classList.add("hidden");
                }
            };

            window.destroySlide = function () {
                ac.abort();
            };

            updateRevealButtons();
        });
    </script>
@endsection
