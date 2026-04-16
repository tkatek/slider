@extends("slider.simple-layout")

@php
    $playerAudio = $content['audio'] ?? null;
    $scriptLines = [];
    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $accentRgb = $isOrangeTheme ? '249, 115, 22' : '99, 102, 241';
    $accentTextRgb = $isOrangeTheme ? '194 65 12' : '99 102 241';
    $accentDarkTextRgb = $isOrangeTheme ? '253 186 116' : '165 180 252';
    $tabHoverClass = $isOrangeTheme
        ? 'hover:border-orange-400 hover:text-orange-600 dark:hover:text-orange-300'
        : 'hover:border-indigo-400 hover:text-indigo-600 dark:hover:text-indigo-300';
    $badgeClass = $isOrangeTheme
        ? 'rounded-full bg-orange-100 px-2 py-0.5 text-xs font-black uppercase tracking-[0.12em] text-orange-700 dark:bg-orange-500/20 dark:text-orange-300'
        : 'rounded-full bg-indigo-100 px-2 py-0.5 text-xs font-black uppercase tracking-[0.12em] text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-300';
    $speakerAccentClass = $isOrangeTheme
        ? 'text-orange-700 dark:text-orange-300'
        : 'text-indigo-700 dark:text-indigo-300';
    $examplePanelClass = $isOrangeTheme
        ? 'rounded-xl border border-orange-200/70 bg-orange-50/70 p-3 dark:border-orange-400/20 dark:bg-orange-500/10'
        : 'rounded-xl border border-indigo-200/70 bg-indigo-50/70 p-3 dark:border-indigo-400/20 dark:bg-indigo-500/10';
    $answerChipClass = $isOrangeTheme
        ? 'rounded-full border border-orange-200/70 bg-white/90 px-2.5 py-1 text-sm font-black text-orange-700 dark:border-orange-400/25 dark:bg-slate-900/60 dark:text-orange-300'
        : 'rounded-full border border-indigo-200/70 bg-white/90 px-2.5 py-1 text-sm font-black text-indigo-700 dark:border-indigo-400/25 dark:bg-slate-900/60 dark:text-indigo-300';
    $questionLabelClass = $isOrangeTheme
        ? 'text-xs font-black uppercase tracking-[0.12em] text-orange-700 dark:text-orange-300'
        : 'text-xs font-black uppercase tracking-[0.12em] text-indigo-700 dark:text-indigo-300';
    $instructionClass = $isOrangeTheme
        ? 'mb-3 rounded-xl border border-orange-200/70 bg-orange-50/80 px-3 py-2 text-md font-bold text-orange-700 dark:border-orange-400/25 dark:bg-orange-500/10 dark:text-orange-300'
        : 'mb-3 rounded-xl border border-indigo-200/70 bg-indigo-50/80 px-3 py-2 text-md font-bold text-indigo-700 dark:border-indigo-400/25 dark:bg-indigo-500/10 dark:text-indigo-300';
    $primaryButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));

    foreach (($content['script'] ?? []) as $conversation) {
        foreach (($conversation['dialogue'] ?? []) as $line) {
            $speaker = trim((string) ($line['speaker'] ?? ''));
            $text = trim((string) ($line['text'] ?? ''));

            if ($text === '') {
                continue;
            }

            $scriptLines[] = $speaker !== '' ? ($speaker . ': ' . $text) : $text;
        }
    }

    $hasScript = $scriptLines !== [];
@endphp

@section("style")
    <style>
        .slide-font { font-family: 'Manrope', 'Plus Jakarta Sans', sans-serif; }
        .display-font { font-family: 'Sora', 'Manrope', sans-serif; }

        #slide10-root {
            min-height: 100dvh;
            overflow-x: hidden;
        }

        .activity-panel { display: none; }
        .activity-panel[data-active="true"] { display: block; }

        .tab-btn[data-active="true"] {
            color: rgb({{ $accentTextRgb }});
            border-color: rgba({{ $accentRgb }}, 0.45);
            background: rgba({{ $accentRgb }}, 0.12);
        }

        .dark .tab-btn[data-active="true"] {
            color: rgb({{ $accentDarkTextRgb }});
            border-color: rgba({{ $accentRgb }}, 0.45);
            background: rgba({{ $accentRgb }}, 0.2);
        }

        .quiz-option[data-state="selected"] {
            border-color: rgba({{ $accentRgb }}, 0.5);
            background: rgba({{ $accentRgb }}, 0.1);
        }

        .quiz-option[data-state="correct"] {
            border-color: rgba(34, 197, 94, 0.7);
            background: rgba(34, 197, 94, 0.15);
            color: rgb(22 163 74);
        }

        .dark .quiz-option[data-state="correct"] {
            color: rgb(74 222 128);
        }

        .quiz-option[data-state="wrong"] {
            border-color: rgba(239, 68, 68, 0.65);
            background: rgba(239, 68, 68, 0.13);
            color: rgb(220 38 38);
        }

        .dark .quiz-option[data-state="wrong"] {
            color: rgb(252 165 165);
        }

        .quiz-feedback[data-state="correct"] {
            color: rgb(21 128 61);
        }

        .dark .quiz-feedback[data-state="correct"] {
            color: rgb(74 222 128);
        }

        .quiz-feedback[data-state="wrong"] {
            color: rgb(220 38 38);
        }

        .dark .quiz-feedback[data-state="wrong"] {
            color: rgb(252 165 165);
        }

        .drag-token { cursor: grab; user-select: none; }
        .drag-token:active { cursor: grabbing; }

        .drag-token.is-selected {
            border-color: rgba({{ $accentRgb }}, 0.55);
            background: rgba({{ $accentRgb }}, 0.12);
            color: rgb({{ $accentTextRgb }});
        }

        .dark .drag-token.is-selected {
            border-color: rgba({{ $accentRgb }}, 0.5);
            background: rgba({{ $accentRgb }}, 0.2);
            color: rgb({{ $accentDarkTextRgb }});
        }

        .drag-token.is-hidden { display: none; }

        .blank-drop {
            min-height: 1rem;
            min-width: 1rem;
            border: 1px dashed rgba(148, 163, 184, 0.7);
            border-radius: 0.65rem;
            background: rgba(255, 255, 255, 0.85);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            vertical-align: middle;
            padding: 0.3rem;
            transition: all 0.2s ease;
        }

        .dark .blank-drop {
            border-color: rgba(148, 163, 184, 0.5);
            background: rgba(15, 23, 42, 0.5);
        }

        .blank-drop[data-over="true"] {
            border-color: rgba({{ $accentRgb }}, 0.75);
            background: rgba({{ $accentRgb }}, 0.12);
            color: rgb({{ $accentTextRgb }});
        }

        .dark .blank-drop[data-over="true"] {
            color: rgb({{ $accentDarkTextRgb }});
        }

        .blank-drop[data-filled="true"] {
            border-style: solid;
            border-color: rgba({{ $accentRgb }}, 0.6);
            color: rgb({{ $accentTextRgb }});
        }

        .dark .blank-drop[data-filled="true"] {
            color: rgb({{ $accentDarkTextRgb }});
        }

        .blank-drop[data-state="correct"] {
            border-style: solid;
            border-color: rgba(34, 197, 94, 0.8);
            background: rgba(34, 197, 94, 0.12);
            color: rgb(21 128 61);
        }

        .dark .blank-drop[data-state="correct"] {
            color: rgb(74 222 128);
        }

        .blank-drop[data-state="wrong"] {
            border-style: solid;
            border-color: rgba(239, 68, 68, 0.8);
            background: rgba(239, 68, 68, 0.12);
            color: rgb(220 38 38);
            text-decoration-line: underline;
            text-decoration-style: wavy;
            text-decoration-color: rgba(239, 68, 68, 0.9);
            text-underline-offset: 0.22em;
        }

        .dark .blank-drop[data-state="wrong"] {
            color: rgb(252 165 165);
        }

        .blank-stack {
            position: relative;
            display: inline;
            margin: 0 0.25rem;
        }

        .puzzle-card[data-checked="true"] .blank-drop {
            min-height: auto;
            min-width: 0;
            border: 0;
            border-radius: 0;
            background: transparent;
            padding: 0;
            display: inline;
            text-align: inherit;
            vertical-align: baseline;
        }

        .puzzle-card[data-checked="true"] .blank-drop[data-state="correct"] {
            color: rgb(21 128 61);
        }

        .dark .puzzle-card[data-checked="true"] .blank-drop[data-state="correct"] {
            color: rgb(74 222 128);
        }

        .puzzle-card[data-checked="true"] .blank-drop[data-state="wrong"] {
            background: transparent;
            color: rgb(220 38 38);
        }

        .dark .puzzle-card[data-checked="true"] .blank-drop[data-state="wrong"] {
            color: rgb(252 165 165);
        }

        .blank-correct-answer {
            display: none;
            position: absolute;
            left: 0;
            top: calc(100% + 0.18rem);
            font-size: 0.8rem;
            font-weight: 800;
            color: rgb(21 128 61);
            white-space: nowrap;
            line-height: 1.1;
        }

        .blank-correct-answer[data-visible="true"] {
            display: block;
        }

        .dark .blank-correct-answer {
            color: rgb(74 222 128);
        }
    </style>
@endsection

@section("content")
    <div id="slide10-root" class="slide-font overflow-x-hidden">
        <main class="relative z-10 mx-auto flex w-full max-w-[1320px] items-start box-border px-4 py-4 sm:px-8 sm:py-6">
            <section class="flex w-full flex-col rounded-[2rem] border border-slate-300/60 bg-white/85 p-4 shadow-xl shadow-slate-900/8 backdrop-blur-xl dark:border-slate-200/20 dark:bg-white/10 dark:shadow-none sm:p-6">
                <div class="mb-4 grid gap-4 lg:gap-6 lg:grid-cols-[max-content_minmax(0,1fr)] lg:items-start">
                    <div data-anim="header">
                        @include('slider.components.title-subtitle')
                    </div>

                    <div data-anim="audio">
                        @include('slider.components.audio-player')
                    </div>
                </div>

                <div data-anim="tabs" class="mt-4">
                    <div role="tablist" aria-label="Lesson activities" class="flex flex-wrap gap-2">
                        @foreach($content['tabs'] as $tab)
                            <button
                                    type="button"
                                    class="tab-btn rounded-xl border border-slate-300/70 bg-white/80 px-3 py-2 text-sm font-extrabold tracking-wide text-slate-700 transition-all dark:border-slate-200/20 dark:bg-slate-900/45 dark:text-slate-200 sm:text-md {{ $tabHoverClass }}"
                                    data-tab-target="{{ $tab['id'] }}"
                                    data-active="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                {{ $tab['label'] }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div data-anim="panel" class="mt-4 pr-1">
                    <div id="panel-empty" class="activity-panel" data-active="true"></div>

                    <div id="panel-script" class="activity-panel" data-active="false">
                        <div class="grid gap-2 lg:grid-cols-2">
                            @foreach($content['script'] as $conversation)
                                <article class="rounded-2xl border border-slate-300/60 bg-slate-50/95 p-3 dark:border-slate-200/20 dark:bg-slate-900/55">
                                    <div class="mb-2 flex items-center justify-between gap-2">
                                        <h2 class="text-md font-extrabold text-slate-900 dark:text-slate-100 sm:text-base">{{ $conversation['topic'] }}</h2>
                                        <span class="{{ $badgeClass }}">
                                            {{ count($conversation['dialogue']) }} lines
                                        </span>
                                    </div>
                                    <div class="overflow-hidden rounded-xl border border-slate-300/60 bg-white/90 dark:border-slate-200/20 dark:bg-slate-950/35">
                                        @foreach($conversation['dialogue'] as $line)
                                            @php $isWoman = strtolower($line['speaker']) === 'woman'; @endphp
                                            <p class="px-2.5 py-1.5 text-md font-semibold leading-5 text-slate-800 dark:text-slate-100 sm:text-md {{ !$loop->last ? 'border-b border-slate-200/70 dark:border-slate-700/60' : '' }}">
                                                <span class="mr-1 text-md font-black uppercase tracking-[0.1em] {{ $isWoman ? $speakerAccentClass : 'text-slate-600 dark:text-slate-300' }}">{{ $line['speaker'] }}:</span>
                                                {{ $line['text'] }}
                                            </p>
                                        @endforeach
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <div id="panel-grammar" class="activity-panel" data-active="false">
                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                            @foreach($content['grammar'] as $point)
                                <article class="rounded-2xl border border-slate-300/60 bg-slate-50/95 p-4 dark:border-slate-200/20 dark:bg-slate-900/55">
                                    <h2 class="text-base font-extrabold text-slate-900 dark:text-slate-100">{{ $point['title'] }}</h2>
                                    <p class="mt-2 text-md font-semibold leading-6 text-slate-700 dark:text-slate-200">{{ $point['explanation'] }}</p>
                                    <div class="mt-3 space-y-2">
                                        @foreach($point['examples'] as $example)
                                            @if(is_array($example))
                                                <div class="{{ $examplePanelClass }}">
                                                    <p class="text-md font-extrabold text-slate-900 dark:text-slate-100">{{ $example['question'] }}</p>
                                                    <div class="mt-2 flex flex-wrap gap-2">
                                                        @foreach($example['answers'] as $answer)
                                                            <span class="{{ $answerChipClass }}">{{ $answer }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <p class="rounded-xl border border-slate-300/60 bg-white/90 px-3 py-2 text-md font-semibold text-slate-700 dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-200">{{ $example }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                    @if(!empty($point['note']))
                                        <p class="mt-3 rounded-xl border border-amber-200/70 bg-amber-50/80 px-3 py-2 text-sm font-bold text-amber-700 dark:border-amber-300/30 dark:bg-amber-500/10 dark:text-amber-300">
                                            Note: {{ $point['note'] }}
                                        </p>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <div id="panel-quiz" class="activity-panel" data-active="false">
                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2">
                            @foreach($content['quiz'] as $idx => $question)
                                <article class="quiz-card rounded-xl border border-slate-300/60 bg-slate-50/95 p-3 dark:border-slate-200/20 dark:bg-slate-900/55" data-correct="{{ $question['correct_answer'] }}">
                                    <h2 class="{{ $questionLabelClass }}">Question {{ $idx + 1 }}</h2>
                                    <p class="mt-1.5 text-md font-extrabold leading-6 text-slate-900 dark:text-slate-100 sm:text-base">{{ $question['question'] }}</p>
                                    <div class="mt-2 grid grid-cols-2 gap-1.5">
                                        @foreach($question['options'] as $optIndex => $option)
                                            <button type="button" class="quiz-option rounded-lg border border-slate-300/70 bg-white/90 px-2.5 py-1.5 text-left text-md font-semibold leading-5 text-slate-700 transition-all dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-200" data-option-index="{{ $optIndex }}" data-state="idle">
                                                {{ $option }}
                                            </button>
                                        @endforeach
                                    </div>
                                    <p class="quiz-feedback mt-1 text-[10px] font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400"></p>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-3 flex flex-wrap items-center gap-2">
                            <button type="button" id="quiz-check-btn" class="rounded-xl px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.12em] text-white transition-transform hover:scale-[1.03] {{ $primaryButtonClass }}">
                                Check Quiz
                            </button>
                            <p id="quiz-score" class="text-xs font-extrabold text-slate-700 dark:text-slate-200">Score: 0/{{ count($content['quiz']) }}</p>
                        </div>
                    </div>

                    <div id="panel-puzzle" class="activity-panel" data-active="false">
                        <p class="{{ $instructionClass }}">
                            {{ $content['puzzle']['instruction'] }}
                        </p>

                        <div class="grid grid-cols-1 gap-3 lg:grid-cols-2">
                            @foreach($content['puzzle']['activities'] as $activityIndex => $activity)
                                <article class="puzzle-card rounded-2xl border border-slate-300/60 bg-slate-50/95 p-4 dark:border-slate-200/20 dark:bg-slate-900/55" data-checked="false">
                                    <h2 class="text-base font-extrabold text-slate-900 dark:text-slate-100">{{ $activity['title'] }}</h2>
                                    @php
                                        $wordBank = $activity['word_bank'];
                                        shuffle($wordBank);
                                    @endphp
                                    <div class="word-bank mt-2 flex flex-wrap gap-2">
                                        @foreach($wordBank as $word)
                                            <button
                                                    type="button"
                                                    draggable="true"
                                                    data-token-id="a{{ $activityIndex }}-{{ $loop->index }}"
                                                    data-word="{{ strtolower(trim($word)) }}"
                                                    data-display="{{ $word }}"
                                                    class="drag-token rounded-full border border-slate-300/70 bg-white/85 px-2.5 py-1 text-sm font-black text-slate-700 transition-all dark:border-slate-200/20 dark:bg-slate-950/35 dark:text-slate-200"
                                            >
                                                {{ $word }}
                                            </button>
                                        @endforeach
                                    </div>

                                    <div class="mt-3 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                        @foreach($activity['gaps'] as $gapIndex => $gap)
                                            @php
                                                preg_match('/(\{\{\d+\}\}|___)/', $gap['sentence'], $placeholderMatch);
                                                $placeholder = $placeholderMatch[0] ?? '___';
                                                $parts = preg_split('/(\{\{\d+\}\}|___)/', $gap['sentence'], 2);
                                            @endphp
                                            <div class="puzzle-drop-zone rounded-xl border border-slate-300/60 bg-white/85 p-3 dark:border-slate-200/20 dark:bg-slate-950/35">
                                                <p class="text-md font-semibold leading-7 text-slate-700 dark:text-slate-200">
                                                    {{ $parts[0] ?? '' }}
                                                    <span class="blank-stack">
                                                        <span
                                                                class="blank-drop text-[11px] font-black uppercase tracking-[0.1em] text-slate-400 dark:text-slate-500"
                                                                data-answer="{{ strtolower(trim($gap['correct'])) }}"
                                                                data-answer-display="{{ $gap['correct'] }}"
                                                                data-token-id=""
                                                                data-value=""
                                                                data-over="false"
                                                                data-filled="false"
                                                                data-state="idle"
                                                                data-placeholder="___"
                                                        >
                                                            ___
                                                        </span>
                                                        <span class="blank-correct-answer" data-visible="false"></span>
                                                    </span>
                                                    {{ $parts[1] ?? '' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-3 flex flex-wrap items-center gap-2">
                                        <button type="button" class="check-puzzle-btn rounded-xl px-3 py-1.5 text-[10px] font-black uppercase tracking-[0.12em] text-white transition-transform hover:scale-[1.03] {{ $primaryButtonClass }}">
                                            Check Activity
                                        </button>
                                        <p class="puzzle-feedback text-xs font-extrabold text-slate-700 dark:text-slate-200"></p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabButtons = Array.from(document.querySelectorAll(".tab-btn"));
            const panels = Array.from(document.querySelectorAll(".activity-panel"));

            function setActiveTab(targetId) {
                tabButtons.forEach((btn) => {
                    const isActive = btn.dataset.tabTarget === targetId;
                    btn.dataset.active = isActive ? "true" : "false";
                    btn.setAttribute("aria-selected", isActive ? "true" : "false");
                });

                panels.forEach((panel) => {
                    panel.dataset.active = panel.id === `panel-${targetId}` ? "true" : "false";
                });
            }

            tabButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    setActiveTab(btn.dataset.tabTarget);
                });
            });

            const quizCards = Array.from(document.querySelectorAll(".quiz-card"));
            const quizCheckBtn = document.getElementById("quiz-check-btn");
            const quizScore = document.getElementById("quiz-score");
            let isQuizChecked = false;

            function setQuizButtonLabel() {
                if (!quizCheckBtn) return;
                quizCheckBtn.textContent = isQuizChecked ? "Restart Quiz" : "Check Quiz";
            }

            quizCards.forEach((card) => {
                const options = Array.from(card.querySelectorAll(".quiz-option"));
                options.forEach((option) => {
                    option.addEventListener("click", () => {
                        if (isQuizChecked) return;
                        options.forEach((opt) => {
                            opt.dataset.state = "idle";
                        });
                        option.dataset.state = "selected";
                    });
                });
            });

            if (quizCheckBtn && quizScore) {
                setQuizButtonLabel();

                function restartQuiz() {
                    quizCards.forEach((card) => {
                        const feedback = card.querySelector(".quiz-feedback");
                        card.querySelectorAll(".quiz-option").forEach((option) => {
                            option.dataset.state = "idle";
                        });
                        if (feedback) {
                            feedback.textContent = "";
                            feedback.dataset.state = "idle";
                        }
                    });
                    quizScore.textContent = `Score: 0/${quizCards.length}`;
                    isQuizChecked = false;
                    setQuizButtonLabel();
                }

                function checkQuiz() {
                    let score = 0;
                    quizCards.forEach((card) => {
                        const correct = card.dataset.correct;
                        const selected = card.querySelector('.quiz-option[data-state="selected"]');
                        const feedback = card.querySelector(".quiz-feedback");

                        card.querySelectorAll(".quiz-option").forEach((option) => {
                            const idx = option.dataset.optionIndex;
                            if (idx === correct) {
                                option.dataset.state = "correct";
                            } else if (selected && option === selected) {
                                option.dataset.state = "wrong";
                            } else {
                                option.dataset.state = "idle";
                            }
                        });

                        if (selected && selected.dataset.optionIndex === correct) {
                            score += 1;
                            if (feedback) {
                                feedback.textContent = "Correct";
                                feedback.dataset.state = "correct";
                            }
                        } else if (feedback) {
                            feedback.textContent = "Try again";
                            feedback.dataset.state = "wrong";
                        }
                    });

                    quizScore.textContent = `Score: ${score}/${quizCards.length}`;
                    isQuizChecked = true;
                    setQuizButtonLabel();
                }

                quizCheckBtn.addEventListener("click", () => {
                    if (isQuizChecked) {
                        restartQuiz();
                        return;
                    }
                    checkQuiz();
                });
            }

            const puzzleCards = Array.from(document.querySelectorAll(".puzzle-card"));
            puzzleCards.forEach((card) => {
                const checkBtn = card.querySelector(".check-puzzle-btn");
                const bank = card.querySelector(".word-bank");
                const tokens = Array.from(card.querySelectorAll(".drag-token"));
                const drops = Array.from(card.querySelectorAll(".blank-drop"));
                const dropZones = Array.from(card.querySelectorAll(".puzzle-drop-zone"));
                const feedback = card.querySelector(".puzzle-feedback");
                let selectedToken = null;
                let draggingToken = null;
                let isChecked = false;

                if (!checkBtn) return;

                const normalizeValue = (value) => {
                    return (value || "")
                        .toLowerCase()
                        .replace(/[’]/g, "'")
                        .replace(/\s+/g, " ")
                        .trim();
                };

                function clearSelection() {
                    tokens.forEach((token) => token.classList.remove("is-selected"));
                    selectedToken = null;
                }

                function shuffleBankTokens() {
                    if (!bank) return;
                    const visibleTokens = tokens.filter((token) => !token.classList.contains("is-hidden"));
                    for (let index = visibleTokens.length - 1; index > 0; index -= 1) {
                        const swapIndex = Math.floor(Math.random() * (index + 1));
                        [visibleTokens[index], visibleTokens[swapIndex]] = [visibleTokens[swapIndex], visibleTokens[index]];
                    }
                    visibleTokens.forEach((token) => bank.appendChild(token));
                }

                function setActionButtonLabel() {
                    checkBtn.textContent = isChecked ? "Restart Activity" : "Check Activity";
                }

                function setCorrectionHint(drop, message = "") {
                    const hint = drop?.parentElement?.querySelector(".blank-correct-answer");
                    if (!hint || !hint.classList.contains("blank-correct-answer")) return;
                    hint.textContent = message;
                    hint.dataset.visible = message ? "true" : "false";
                }

                function resetDropVisual(drop) {
                    drop.dataset.over = "false";
                    setCorrectionHint(drop);
                    if (drop.dataset.filled !== "true") {
                        drop.textContent = drop.dataset.placeholder || "___";
                        drop.dataset.state = "idle";
                        drop.dataset.value = "";
                        drop.dataset.tokenId = "";
                    }
                }

                function clearDrop(drop) {
                    drop.dataset.filled = "false";
                    resetDropVisual(drop);
                }

                function returnTokenToBank(token) {
                    if (!token || !bank) return;
                    token.classList.remove("is-hidden", "is-selected");
                    bank.appendChild(token);
                }

                function placeToken(drop, token) {
                    if (!drop || !token || isChecked) return;
                    const existingTokenId = drop.dataset.tokenId;
                    if (existingTokenId) {
                        const existingToken = card.querySelector(`.drag-token[data-token-id="${existingTokenId}"]`);
                        returnTokenToBank(existingToken);
                    }

                    drop.dataset.filled = "true";
                    drop.dataset.state = "idle";
                    setCorrectionHint(drop);
                    drop.dataset.tokenId = token.dataset.tokenId || "";
                    drop.dataset.value = normalizeValue(token.dataset.word || token.textContent);
                    drop.textContent = token.dataset.display || token.textContent || "";
                    token.classList.add("is-hidden");
                    token.classList.remove("is-selected");
                    selectedToken = null;
                }

                tokens.forEach((token) => {
                    token.addEventListener("click", () => {
                        if (isChecked) return;
                        const isHidden = token.classList.contains("is-hidden");
                        if (isHidden) return;
                        if (selectedToken === token) {
                            clearSelection();
                            return;
                        }
                        clearSelection();
                        selectedToken = token;
                        token.classList.add("is-selected");
                    });

                    token.addEventListener("dragstart", (e) => {
                        if (isChecked) {
                            e.preventDefault();
                            return;
                        }
                        draggingToken = token;
                        token.classList.remove("is-selected");
                        selectedToken = null;
                        if (e.dataTransfer) {
                            e.dataTransfer.effectAllowed = "move";
                            e.dataTransfer.setData("text/plain", token.dataset.tokenId || "");
                        }
                    });

                    token.addEventListener("dragend", () => {
                        draggingToken = null;
                        drops.forEach((drop) => {
                            drop.dataset.over = "false";
                        });
                    });
                });

                if (bank) {
                    bank.addEventListener("dragover", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                    });
                    bank.addEventListener("drop", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                        if (!draggingToken) return;
                        const placedDrop = drops.find((drop) => drop.dataset.tokenId === (draggingToken.dataset.tokenId || ""));
                        if (placedDrop) clearDrop(placedDrop);
                        returnTokenToBank(draggingToken);
                    });
                }

                drops.forEach((drop) => {
                    drop.addEventListener("dragover", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                        drop.dataset.over = "true";
                    });

                    drop.addEventListener("dragleave", () => {
                        drop.dataset.over = "false";
                    });

                    drop.addEventListener("drop", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                        drop.dataset.over = "false";
                        if (!draggingToken) return;

                        const previousDrop = drops.find((item) => item.dataset.tokenId === (draggingToken.dataset.tokenId || ""));
                        if (previousDrop && previousDrop !== drop) {
                            clearDrop(previousDrop);
                        }

                        placeToken(drop, draggingToken);
                    });

                    drop.addEventListener("click", () => {
                        if (isChecked) return;
                        if (selectedToken) {
                            const previousDrop = drops.find((item) => item.dataset.tokenId === (selectedToken.dataset.tokenId || ""));
                            if (previousDrop && previousDrop !== drop) {
                                clearDrop(previousDrop);
                            }
                            placeToken(drop, selectedToken);
                            return;
                        }

                        const tokenId = drop.dataset.tokenId;
                        if (!tokenId) return;
                        const token = card.querySelector(`.drag-token[data-token-id="${tokenId}"]`);
                        returnTokenToBank(token);
                        clearDrop(drop);
                    });
                });

                dropZones.forEach((zone) => {
                    const zoneDrop = zone.querySelector(".blank-drop");
                    if (!zoneDrop) return;

                    zone.addEventListener("dragover", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                        zoneDrop.dataset.over = "true";
                    });

                    zone.addEventListener("dragleave", (e) => {
                        if (zone.contains(e.relatedTarget)) return;
                        zoneDrop.dataset.over = "false";
                    });

                    zone.addEventListener("drop", (e) => {
                        if (isChecked) return;
                        e.preventDefault();
                        zoneDrop.dataset.over = "false";
                        if (!draggingToken) return;

                        const previousDrop = drops.find((item) => item.dataset.tokenId === (draggingToken.dataset.tokenId || ""));
                        if (previousDrop && previousDrop !== zoneDrop) {
                            clearDrop(previousDrop);
                        }

                        placeToken(zoneDrop, draggingToken);
                    });
                });

                function restartActivity() {
                    clearSelection();
                    draggingToken = null;
                    drops.forEach((drop) => {
                        const tokenId = drop.dataset.tokenId;
                        if (tokenId) {
                            const token = card.querySelector(`.drag-token[data-token-id="${tokenId}"]`);
                            returnTokenToBank(token);
                        }
                        clearDrop(drop);
                    });
                    shuffleBankTokens();
                    if (feedback) feedback.textContent = "";
                    isChecked = false;
                    card.dataset.checked = "false";
                    setActionButtonLabel();
                }

                function checkActivity() {
                    const inputs = Array.from(card.querySelectorAll(".blank-drop"));
                    let correctCount = 0;

                    inputs.forEach((input) => {
                        const expected = normalizeValue(input.dataset.answer || "");
                        const actual = normalizeValue(input.dataset.value || "");
                        const isCorrect = expected === actual;
                        input.dataset.state = isCorrect ? "correct" : "wrong";
                        setCorrectionHint(input, isCorrect ? "" : (input.dataset.answerDisplay || input.dataset.answer || ""));
                        if (isCorrect) correctCount += 1;
                    });

                    if (feedback) {
                        feedback.textContent = `Result: ${correctCount}/${inputs.length} correct`;
                    }
                    isChecked = true;
                    card.dataset.checked = "true";
                    setActionButtonLabel();
                }

                setActionButtonLabel();

                checkBtn.addEventListener("click", () => {
                    if (isChecked) {
                        restartActivity();
                        return;
                    }
                    checkActivity();
                });
            });

            function playIntro() {
                const header = document.querySelector('[data-anim="header"]');
                const audioBox = document.querySelector('[data-anim="audio"]');
                const tabs = document.querySelector('[data-anim="tabs"]');
                const panel = document.querySelector('[data-anim="panel"]');

                if (!window.gsap) {
                    [header, audioBox, tabs, panel].forEach((el) => {
                        if (!el) return;
                        el.style.opacity = "1";
                        el.style.transform = "none";
                    });
                    return;
                }

                gsap.killTweensOf([header, audioBox, tabs, panel]);
                gsap.set([header, audioBox, tabs, panel], { clearProps: "all" });

                const tl = gsap.timeline({ defaults: { ease: "power2.out" } });
                tl.from(header, { opacity: 0, y: 16, duration: 0.45 });
                tl.from(audioBox, { opacity: 0, y: 10, duration: 0.35 }, "-=0.2");
                tl.from(tabs, { opacity: 0, y: 8, duration: 0.32 }, "-=0.15");
                tl.from(panel, { opacity: 0, y: 8, duration: 0.32 }, "-=0.15");
            }

            window.resetSlide = () => {
                setActiveTab("empty");
                playIntro();
            };

            window.stopSlideAudio = () => {
                if (typeof window.stopAudioPlayer === "function") {
                    window.stopAudioPlayer();
                }
            };

            setActiveTab("empty");
            playIntro();
        });
    </script>
@endsection
