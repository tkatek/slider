@extends('slider.simple-layout')

@php
    $inputIdPrefix = trim((string) ($content['input_id_prefix'] ?? 'listening_type_answer'));
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
            border: 1px solid rgba(255,255,255,.14);
            background: linear-gradient(135deg, #71717a, #3f3f46, #18181b);
            box-shadow: 0 14px 30px rgba(24,24,27,.20);
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

        .answer-input.is-correct {
            border-color: #16a34a;
            background: rgba(220,252,231,.9);
            color: #166534;
        }

        .answer-input.is-wrong {
            border-color: #dc2626;
            background: rgba(254,226,226,.95);
            color: #991b1b;
        }

        .dark .answer-input.is-revealed-answer {
            border-color: rgba(251,113,133,.35);
            background: rgba(159,18,57,.16);
            color: #fecdd3;
        }

        .dark .answer-input.is-correct {
            background: rgba(20,83,45,.34);
            color: #bbf7d0;
        }

        .dark .answer-input.is-wrong {
            background: rgba(127,29,29,.34);
            color: #fecaca;
        }

        .answer-result {
            min-width: 1.5rem;
            font-size: 1.35rem;
            font-weight: 900;
            line-height: 1;
            text-align: center;
        }

        .answer-result.is-correct {
            color: #16a34a;
        }

        .answer-result.is-wrong {
            color: #dc2626;
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
                        {{ $content['section_title'] ?? 'Answer the questions' }}
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
                                    id="checkAnswersBtn"
                                    type="button"
                                    class="primary-btn inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-black"
                            >
                                Check Answers
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

                                    <label for="{{ $inputIdPrefix }}_{{ $i }}"
                                           class="min-w-0 flex-1 pt-px text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.4] text-slate-900 dark:text-slate-100">
                                        {{ $q['prompt'] }}
                                    </label>
                                </div>

                                <div class="min-w-0">
                                    @if($questionType === 'missing_words' && $sentenceTemplate !== '' && !empty($questionBlanks))
                                        <div class="flex items-center gap-2">
                                            <div class="fill-answer-line min-w-0 flex-1">
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
                                                                id="{{ $inputIdPrefix }}_{{ $i }}_{{ $blankIndex }}"
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
                                            <span class="answer-result" aria-live="polite"></span>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-2">
                                            <input
                                                id="{{ $inputIdPrefix }}_{{ $i }}"
                                                type="text"
                                                data-answer="{{ $q['answer'] ?? $q['sample_answer'] ?? $q['revealed_answer'] ?? '' }}"
                                                value="{{ $q['default_value'] ?? '' }}"
                                                class="answer-input min-w-0 flex-1 rounded-2xl border border-slate-200 bg-white
                                                   dark:border-slate-700 dark:bg-slate-950/25
                                                       px-3 py-3 text-base font-semibold text-slate-800 dark:text-slate-100
                                                       placeholder:text-slate-400 dark:placeholder:text-slate-500"
                                                    placeholder="{{ $q['placeholder'] ?? 'Write your answer...' }}"
                                            >
                                            <span class="answer-result" aria-live="polite"></span>
                                        </div>
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
            const checkAnswersBtn = document.getElementById("checkAnswersBtn");
            const retakeTestBtn = document.getElementById("retakeTestBtn");
            const scriptModal = document.querySelector("[data-audio-player-modal]");
            let revealedAnswers = false;

            function normalizeAnswer(value) {
                return String(value || "")
                    .trim()
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[“”]/g, '"')
                    .replace(/[.,!?;:]+$/g, "")
                    .replace(/\s+/g, " ");
            }

            function acceptedAnswers(input) {
                return String(input.dataset.answer || "")
                    .split("|")
                    .map(normalizeAnswer)
                    .filter(Boolean);
            }

            function isInputCorrect(input) {
                const userAnswer = normalizeAnswer(input.value);
                const answers = acceptedAnswers(input);

                return userAnswer !== "" && answers.includes(userAnswer);
            }

            function inputGroup(input) {
                return input.closest(".flex.items-center.gap-2");
            }

            function resultForInput(input) {
                return inputGroup(input)?.querySelector(".answer-result") || null;
            }

            function clearInputFeedback(input) {
                input.classList.remove("is-correct", "is-wrong", "is-revealed-answer");

                const result = resultForInput(input);
                if (!result) return;

                result.textContent = "";
                result.classList.remove("is-correct", "is-wrong");
            }

            function markInput(input, correct) {
                input.classList.remove("is-correct", "is-wrong", "is-revealed-answer");
                input.classList.add(correct ? "is-correct" : "is-wrong");

                const result = resultForInput(input);
                if (!result) return;

                result.textContent = correct ? "\u2713" : "\u2715";
                result.classList.remove("is-correct", "is-wrong");
                result.classList.add(correct ? "is-correct" : "is-wrong");
            }

            function updateRevealButtons() {
                if (revealAnswersBtn) revealAnswersBtn.classList.toggle("hidden", revealedAnswers);
                if (retakeTestBtn) retakeTestBtn.classList.toggle("hidden", !revealedAnswers);
            }

            answerInputs.forEach((input) => {
                input.addEventListener("input", () => {
                    clearInputFeedback(input);
                }, { signal: ac.signal });
            });

            checkAnswersBtn?.addEventListener("click", () => {
                answerInputs.forEach((input) => {
                    if (!input.dataset.answer) return;
                    markInput(input, isInputCorrect(input));
                });
            }, { signal: ac.signal });

            if (revealAnswersBtn) {
                revealAnswersBtn.addEventListener("click", () => {
                    revealedAnswers = true;
                    answerInputs.forEach((input) => {
                        const answer = (input.dataset.answer || "").trim();
                        if (!answer) return;
                        input.value = answer.split("|")[0].trim();
                        input.disabled = true;
                        input.classList.remove("is-wrong");
                        input.classList.add("is-revealed-answer", "is-correct");

                        const result = resultForInput(input);
                        if (result) {
                            result.textContent = "\u2713";
                            result.classList.remove("is-wrong");
                            result.classList.add("is-correct");
                        }
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
                        clearInputFeedback(input);
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
