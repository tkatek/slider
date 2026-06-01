@extends('slider.simple-layout')

@section('style')
    <style>
        @keyframes shakeCard {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        @keyframes pulseDone {
            0% { transform: scale(1); }
            50% { transform: scale(1.015); }
            100% { transform: scale(1); }
        }

        .shake-card { animation: shakeCard .32s ease-in-out; }
        .solved-board { animation: pulseDone .35s ease-out; }
        .quiz-select { -webkit-tap-highlight-color: transparent; }
        .dark .quiz-select { color-scheme: dark; }
        .quiz-select option { background: #ffffff; color: #0f172a; }
        .dark .quiz-select option { background: #0b1220; color: #f8fafc; }

        .slide-layout {
            --dropdown-accent-bg: rgba(238, 242, 255, .96);
            --dropdown-accent-border: rgba(129, 140, 248, .48);
            --dropdown-accent-text: rgb(67, 56, 202);
            --dropdown-accent-ring: rgba(99, 102, 241, .24);
        }

        .dark .slide-layout {
            --dropdown-accent-bg: rgba(67, 56, 202, .26);
            --dropdown-accent-border: rgba(129, 140, 248, .46);
            --dropdown-accent-text: rgb(224, 231, 255);
            --dropdown-accent-ring: rgba(129, 140, 248, .22);
        }

        .slide-layout.slide-theme-orange {
            --dropdown-accent-bg: rgba(255, 237, 213, .96);
            --dropdown-accent-border: rgba(251, 146, 60, .55);
            --dropdown-accent-text: rgb(194, 65, 12);
            --dropdown-accent-ring: rgba(251, 146, 60, .24);
        }

        .dark .slide-layout.slide-theme-orange {
            --dropdown-accent-bg: rgba(154, 52, 18, .32);
            --dropdown-accent-border: rgba(251, 146, 60, .48);
            --dropdown-accent-text: rgb(255, 237, 213);
            --dropdown-accent-ring: rgba(251, 146, 60, .22);
        }

        .slide-layout.slide-theme-green {
            --dropdown-accent-bg: rgba(220, 252, 231, .96);
            --dropdown-accent-border: rgba(34, 197, 94, .50);
            --dropdown-accent-text: rgb(21, 128, 61);
            --dropdown-accent-ring: rgba(34, 197, 94, .22);
        }

        .dark .slide-layout.slide-theme-green {
            --dropdown-accent-bg: rgba(20, 83, 45, .34);
            --dropdown-accent-border: rgba(74, 222, 128, .46);
            --dropdown-accent-text: rgb(220, 252, 231);
            --dropdown-accent-ring: rgba(74, 222, 128, .22);
        }

        @media (prefers-reduced-motion: reduce) {
            .shake-card,
            .solved-board {
                animation: none !important;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $content = is_array($content ?? null) ? $content : [];
        $compactLayout = (bool) ($content['compact_layout'] ?? false);
        $compactText = (bool) ($content['compact_text'] ?? $compactLayout);
        $questionPromptLabel = trim((string) ($content['question_prompt_label'] ?? $content['prompt_label'] ?? $content['instruction_label'] ?? 'Complete the sentence:'));
        $helperText = trim((string) ($content['helper_text'] ?? 'Choose the correct answer in each box.'));
        $gameWidthClass = trim((string) ($content['game_width_class'] ?? 'max-w-5xl'));
        $questionsForMeta = array_values($content['questions'] ?? []);
        $maxQuestionChars = 0;
        $maxBlankCount = 0;

        foreach ($questionsForMeta as $questionForMeta) {
            $segmentsForMeta = is_array($questionForMeta['segments'] ?? null) ? $questionForMeta['segments'] : [];
            $blankCountForMeta = 0;
            $charsForMeta = 0;

            foreach ($segmentsForMeta as $segmentForMeta) {
                if (is_string($segmentForMeta)) {
                    $charsForMeta += mb_strlen(trim(strip_tags($segmentForMeta)));
                } elseif (is_array($segmentForMeta)) {
                    $blankCountForMeta++;
                    $charsForMeta += mb_strlen(trim((string) ($segmentForMeta['answer'] ?? '')));
                }
            }

            $maxQuestionChars = max($maxQuestionChars, $charsForMeta);
            $maxBlankCount = max($maxBlankCount, $blankCountForMeta);
        }

        $verticalAlignment = trim((string) ($content['vertical_alignment'] ?? 'auto'));
        if (!in_array($verticalAlignment, ['auto', 'top', 'center'], true)) {
            $verticalAlignment = 'auto';
        }

        $isReadingLikeQuestion = $maxQuestionChars >= 150 || $maxBlankCount >= 3;
        $topAlignGame = $verticalAlignment === 'top' || ($verticalAlignment === 'auto' && $isReadingLikeQuestion);
        $mainStackClass = $topAlignGame
            ? 'justify-start py-4 sm:py-5'
            : 'justify-center py-4 sm:py-5';
        $mainFlowClass = $topAlignGame
            ? 'pt-2 sm:pt-3 lg:pt-4'
            : 'pt-0';

        $navigationMode = trim((string) ($content['navigation_mode'] ?? 'unanswered'));
        if (!in_array($navigationMode, ['unanswered', 'sequential'], true)) {
            $navigationMode = 'unanswered';
        }

        $selectSize = trim((string) ($content['select_size'] ?? 'auto'));
        if (!in_array($selectSize, ['compact', 'auto', 'wide'], true)) {
            $selectSize = 'auto';
        }

        $selectWidthClass = match ($selectSize) {
            'compact' => 'min-w-[6.5rem] sm:min-w-[7.25rem] lg:min-w-[8rem]',
            'wide' => 'min-w-[9.5rem] sm:min-w-[11rem] lg:min-w-[12.5rem]',
            default => 'min-w-[7.5rem] sm:min-w-[8.75rem] lg:min-w-[9.75rem]',
        };

        if ($questionPromptLabel === '') {
            $questionPromptLabel = 'Complete the sentence:';
        }

        if ($helperText === '') {
            $helperText = 'Choose the correct answer in each box.';
        }
    @endphp

    <main id="dropdownBlanksGame" class="font-sans flex min-h-[100dvh] w-full flex-col items-center {{ $mainStackClass }} overflow-x-hidden dark:text-slate-100">
        @include('slider.components.title-subtitle')
        @include('slider.components.game-status')

        <div id="dropdownGameFlow" class="mx-auto flex w-full max-w-[1500px] flex-none flex-col items-center {{ $mainFlowClass }} gap-2 px-3 pb-4 sm:gap-2.5 sm:px-5 sm:pb-5 lg:px-7">
            <section id="gameCard" class="mx-auto flex w-full {{ $gameWidthClass }} flex-col">
                <div id="questionPanel" class="relative isolate overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/75 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60">
                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.10)_0%,transparent_52%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.08)_0%,transparent_52%)]"></div>

                    <div class="relative z-[1] p-3 text-left sm:p-4 lg:p-5">
                        <div class="flex items-center justify-between gap-2 sm:gap-3">
                            <div class="flex min-w-0 flex-col gap-1 text-[11px] font-black tracking-[-0.01em] text-slate-500 dark:text-slate-400 sm:flex-row sm:items-center sm:gap-2 sm:text-sm">
                                <span>{{ $questionPromptLabel }}</span>
                                <span id="questionIndicator" class="inline-flex w-fit rounded-full border border-slate-200/70 bg-white/75 px-2 py-0.5 text-[10px] font-black text-slate-500 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/45 dark:text-slate-300">
                                    1 of 1
                                </span>
                            </div>

                            <button
                                    id="btnRevealCorrection"
                                    type="button"
                                    class="inline-flex shrink-0 items-center justify-center gap-2 whitespace-nowrap rounded-lg border border-[color:var(--dropdown-accent-border)] bg-[var(--dropdown-accent-bg)] px-2.5 py-1.5 text-[11px] font-black text-[color:var(--dropdown-accent-text)] shadow-sm transition duration-200 ease-out hover:scale-105 active:scale-95 sm:px-3 sm:text-xs"
                            >
                                Reveal correction
                            </button>
                        </div>

                        <div id="qPrompt" class="my-2.5 sm:my-3">
                            ...
                        </div>

                        <div class="flex items-center justify-start gap-2 rounded-[1rem] border border-slate-200/70 bg-white/70 px-3 py-1.5 text-left text-xs font-bold text-slate-600 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-900/35 dark:text-slate-300 sm:text-sm">
                            <span class="text-base leading-none" aria-hidden="true">↓</span>
                            <span>{{ $helperText }}</span>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-2.5 sm:grid-cols-4 sm:gap-3">
                            <button
                                    id="btnResetInline"
                                    type="button"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/75 px-3 py-2.5 text-xs font-black text-slate-600 shadow-sm transition duration-200 ease-out hover:scale-[1.02] hover:bg-white active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm"
                            >
                                Restart
                            </button>

                            <button
                                    id="btnAutoCheck"
                                    type="button"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-[color:var(--dropdown-accent-border)] bg-[var(--dropdown-accent-bg)] px-3 py-2.5 text-xs font-black text-[color:var(--dropdown-accent-text)] shadow-sm transition duration-200 ease-out hover:scale-[1.02] active:scale-95 disabled:cursor-not-allowed disabled:opacity-55 sm:text-sm"
                            >
                                Hint (<span id="autoCheckBadge">2</span>)
                            </button>

                            <button
                                    id="btnPrev"
                                    type="button"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/75 px-3 py-2.5 text-xs font-black text-slate-600 shadow-sm transition duration-200 ease-out hover:scale-[1.02] hover:bg-white active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm"
                            >
                                <span aria-hidden="true">‹</span>
                                <span>Previous</span>
                            </button>

                            <button
                                    id="btnNext"
                                    type="button"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg px-3 py-2.5 text-xs font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.14)] transition duration-200 ease-out hover:scale-[1.03] active:scale-95 sm:text-sm {{ $theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500' }}"
                            >
                                <span>Next</span>
                                <span aria-hidden="true">›</span>
                            </button>
                        </div>
                    </div>
                </div>

                @include('slider.components.game-win-modal-correction')
            </section>

            <div id="toastOne" class="pointer-events-none fixed bottom-24 left-1/2 z-50 -translate-x-1/2 opacity-0">
                <div class="rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-black text-slate-900 shadow-2xl dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                    <span id="toastIcon"></span>
                    <span id="toastText"></span>
                </div>
            </div>

            <div id="dropdownLiveRegion" class="sr-only" aria-live="polite" aria-atomic="true"></div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const QUESTIONS = @json($content['questions'] ?? []);
            const GAME_TITLE = @json($content['title'] ?? 'Exercise');
            const TOTAL = QUESTIONS.length;
            const COMPACT_TEXT = @json($compactText);
            const NAVIGATION_MODE = @json($navigationMode);
            const SELECT_WIDTH_CLASS = @json($selectWidthClass);
            const VERTICAL_ALIGNMENT = @json($verticalAlignment);

            const gameRoot = document.getElementById("dropdownBlanksGame");
            const gameFlow = document.getElementById("dropdownGameFlow");
            const qPrompt = document.getElementById("qPrompt");
            const progressCount = document.getElementById("tilesCount");
            const correctCount = document.getElementById("correctCount");
            const mistakesCount = document.getElementById("mistakesCount");
            const timer = document.getElementById("gameTimer");

            const finalCorrect = document.getElementById("finalCorrect");
            const finalMistakes = document.getElementById("finalMistakes");
            const finalTime = document.getElementById("finalTime");
            const finalCorrection = document.getElementById("finalCorrection");
            const resultsCorrectionCard = document.getElementById("resultsCorrectionCard");

            const questionPanel = document.getElementById("questionPanel");
            const winModal = document.getElementById("winModal");
            const toastOne = document.getElementById("toastOne");
            const toastIcon = document.getElementById("toastIcon");
            const toastText = document.getElementById("toastText");
            const liveRegion = document.getElementById("dropdownLiveRegion");
            const questionIndicator = document.getElementById("questionIndicator");

            const continueBtnModal = document.getElementById("continueBtnModal");
            const restartBtnModal = document.getElementById("restartBtnModal");
            const btnResetInline = document.getElementById("btnResetInline");
            const btnAutoCheck = document.getElementById("btnAutoCheck");
            const autoCheckBadge = document.getElementById("autoCheckBadge");
            const btnRevealCorrection = document.getElementById("btnRevealCorrection");
            const btnPrev = document.getElementById("btnPrev");
            const btnNext = document.getElementById("btnNext");

            let idx = 0;
            let firstTryCorrect = 0;
            let wrongTries = 0;
            let wrongedQuestions = new Set();
            let completedQuestions = new Set();
            let revealedQuestions = new Set();
            let hintedQuestions = new Set();
            let questionSelections = new Map();
            let autoChecksLeft = 2;
            let hasRevealedCorrection = false;
            let startTime = Date.now();
            let timerInt = null;
            let toastT = null;
            let toastFallbackTimer = null;

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            const clsQuestionShell =
                "rounded-[1.2rem] border border-slate-200/70 bg-white/75 px-3 py-3 text-left shadow-[0_10px_30px_rgba(2,6,23,0.05)] backdrop-blur " +
                "dark:border-slate-700/60 dark:bg-slate-900/25 dark:shadow-[0_12px_28px_rgba(2,6,23,0.28)] sm:px-4 sm:py-3.5 lg:px-5";

            const clsSentenceFlow = COMPACT_TEXT
                ? "flex flex-wrap items-center justify-start gap-x-2 gap-y-2.5 text-left text-sm font-semibold leading-[1.85] tracking-[-0.005em] text-slate-900 dark:text-slate-100 sm:gap-y-2 sm:text-base lg:text-[1.05rem]"
                : "flex flex-wrap items-center justify-start gap-x-2.5 gap-y-3 text-left text-base font-semibold leading-[1.9] tracking-[-0.01em] text-slate-900 dark:text-slate-100 sm:gap-y-2.5 sm:text-lg lg:text-[1.15rem]";

            const clsSentenceText = "text-slate-900 dark:text-slate-100";
            const clsSentenceBreak = "h-0 w-full basis-full";
            const clsSelectWrap = "relative inline-flex items-center align-middle";
            const clsBaseSelect =
                "quiz-select appearance-none " + SELECT_WIDTH_CLASS + " w-auto max-w-full rounded-xl border-2 border-dashed border-slate-300/95 " +
                "min-h-[42px] bg-white/95 px-3.5 py-2 pr-10 text-sm font-black text-slate-900 shadow-sm shadow-slate-900/10 transition duration-200 " +
                "focus:border-[color:var(--dropdown-accent-border)] focus:outline-none focus:ring-4 focus:ring-[color:var(--dropdown-accent-ring)] " +
                "dark:[color-scheme:dark] dark:border-slate-500/80 dark:bg-slate-900/55 dark:text-slate-50 dark:shadow-black/30 " +
                "sm:min-h-[46px] sm:py-2.5 sm:text-base";
            const clsChevron = "pointer-events-none absolute right-3 text-slate-500 dark:text-slate-200/85";

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function formatElapsedTime() {
                const elapsed = Math.floor((Date.now() - startTime) / 1000);
                const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                const secs = String(elapsed % 60).padStart(2, '0');
                return `${mins}:${secs}`;
            }

            function updateTimerDisplay() {
                if (timer) timer.textContent = formatElapsedTime();
            }

            function startTimer() {
                clearInterval(timerInt);
                updateTimerDisplay();
                timerInt = setInterval(updateTimerDisplay, 1000);
            }

            function showToast(text, icon = "✨") {
                if (!toastOne || !toastIcon || !toastText) return;

                toastIcon.textContent = icon;
                toastText.textContent = text;
                if (liveRegion) liveRegion.textContent = `${icon} ${text}`;

                if (toastFallbackTimer) {
                    clearTimeout(toastFallbackTimer);
                    toastFallbackTimer = null;
                }

                if (!window.gsap) {
                    toastOne.style.opacity = "1";
                    toastOne.style.transform = "translateX(-50%) translateY(0)";
                    toastFallbackTimer = setTimeout(() => {
                        toastOne.style.opacity = "0";
                    }, 1250);
                    return;
                }

                if (toastT) toastT.kill();
                gsap.set(toastOne, { opacity: 0, y: 8 });
                toastT = gsap.timeline()
                    .to(toastOne, { opacity: 1, y: 0, duration: 0.3 })
                    .to(toastOne, { opacity: 0, y: -10, duration: 0.3 }, "+=1");
            }

            function getProgressCount() {
                const progressedQuestions = new Set([...completedQuestions, ...revealedQuestions]);
                return Math.min(progressedQuestions.size, TOTAL);
            }

            function setNavDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle("opacity-60", disabled);
                button.classList.toggle("pointer-events-none", disabled);
                button.classList.toggle("cursor-not-allowed", disabled);
            }

            function updateUI() {
                if (progressCount) progressCount.textContent = `${getProgressCount()}/${TOTAL}`;
                if (correctCount) correctCount.textContent = String(firstTryCorrect);
                if (mistakesCount) mistakesCount.textContent = String(wrongTries);
                if (autoCheckBadge) autoCheckBadge.textContent = String(autoChecksLeft);
                if (questionIndicator) questionIndicator.textContent = TOTAL > 0 ? `${idx + 1} of ${TOTAL}` : 'No questions';
                if (btnAutoCheck) btnAutoCheck.disabled = autoChecksLeft <= 0;
                setNavDisabledState(btnPrev, findPreviousTargetIndex(idx) < 0);
                setNavDisabledState(btnNext, findNextTargetIndex(idx) < 0);

                if (btnPrev) {
                    btnPrev.title = NAVIGATION_MODE === 'sequential' ? 'Previous question' : 'Previous unanswered question';
                    btnPrev.setAttribute('aria-label', btnPrev.title);
                }

                if (btnNext) {
                    btnNext.title = NAVIGATION_MODE === 'sequential' ? 'Next question' : 'Next unanswered question';
                    btnNext.setAttribute('aria-label', btnNext.title);
                }
            }

            function getQuestionMetrics(question) {
                const segments = Array.isArray(question?.segments) ? question.segments : [];
                return segments.reduce((meta, segment) => {
                    if (typeof segment === "string") {
                        meta.chars += String(segment).replace(/<[^>]*>/g, "").trim().length;
                    } else if (segment && typeof segment === "object") {
                        meta.blanks += 1;
                        meta.chars += String(segment.answer ?? "").trim().length;
                    }
                    return meta;
                }, { chars: 0, blanks: 0 });
            }

            function updateVerticalAlignmentForQuestion(question) {
                if (!gameRoot || !gameFlow) return;

                const meta = getQuestionMetrics(question);
                const shouldTopAlign = VERTICAL_ALIGNMENT === 'top'
                    || (VERTICAL_ALIGNMENT === 'auto' && (meta.chars >= 150 || meta.blanks >= 3));

                gameRoot.classList.toggle('justify-start', shouldTopAlign);
                gameRoot.classList.toggle('justify-center', !shouldTopAlign);

                gameFlow.classList.remove('pt-0', 'pt-2', 'sm:pt-3', 'lg:pt-4');
                if (shouldTopAlign) {
                    gameFlow.classList.add('pt-2', 'sm:pt-3', 'lg:pt-4');
                } else {
                    gameFlow.classList.add('pt-0');
                }
            }

            function findPreviousUnansweredIndex(fromIndex) {
                for (let i = fromIndex - 1; i >= 0; i--) {
                    if (!completedQuestions.has(i)) return i;
                }

                for (let i = TOTAL - 1; i > fromIndex; i--) {
                    if (!completedQuestions.has(i)) return i;
                }

                return -1;
            }

            function findNextUnansweredIndex(fromIndex) {
                for (let i = fromIndex + 1; i < TOTAL; i++) {
                    if (!completedQuestions.has(i)) return i;
                }

                for (let i = 0; i < fromIndex; i++) {
                    if (!completedQuestions.has(i)) return i;
                }

                return -1;
            }

            function findPreviousTargetIndex(fromIndex) {
                if (NAVIGATION_MODE === 'sequential') {
                    return fromIndex > 0 ? fromIndex - 1 : -1;
                }

                return findPreviousUnansweredIndex(fromIndex);
            }

            function findNextTargetIndex(fromIndex) {
                if (NAVIGATION_MODE === 'sequential') {
                    return fromIndex + 1 < TOTAL ? fromIndex + 1 : -1;
                }

                return findNextUnansweredIndex(fromIndex);
            }

            function saveCurrentSelections() {
                if (!qPrompt || TOTAL === 0) return;
                const selects = Array.from(qPrompt.querySelectorAll('.quiz-select'));
                if (!selects.length) return;
                questionSelections.set(idx, selects.map(select => select.value || ''));
            }

            function shuffle(arr) {
                const a = [...arr];
                for (let i = a.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [a[i], a[j]] = [a[j], a[i]];
                }
                return a;
            }

            function clearState(sel) {
                sel.classList.remove(
                    "border-emerald-400/70", "ring-emerald-300/70", "dark:ring-emerald-300/35", "bg-emerald-100/70", "dark:bg-emerald-400/10", "text-emerald-900", "dark:text-emerald-100",
                    "border-rose-400/70", "ring-rose-300/70", "dark:ring-rose-300/35", "bg-rose-100/70", "dark:bg-rose-400/10", "text-rose-900", "dark:text-rose-100"
                );
            }

            function setState(sel, ok) {
                clearState(sel);
                if (ok) {
                    sel.classList.add("border-emerald-400/70", "ring-emerald-300/70", "dark:ring-emerald-300/35", "bg-emerald-100/70", "dark:bg-emerald-400/10", "text-emerald-900", "dark:text-emerald-100");
                } else {
                    sel.classList.add("border-rose-400/70", "ring-rose-300/70", "dark:ring-rose-300/35", "bg-rose-100/70", "dark:bg-rose-400/10", "text-rose-900", "dark:text-rose-100");
                }
            }

            function hideOverlay() {
                if (winModal) winModal.classList.add("hidden");
                document.documentElement.classList.remove("overflow-hidden");
            }

            function restart() {
                hideOverlay();
                idx = 0;
                firstTryCorrect = 0;
                wrongTries = 0;
                wrongedQuestions = new Set();
                completedQuestions = new Set();
                revealedQuestions = new Set();
                hintedQuestions = new Set();
                questionSelections = new Map();
                autoChecksLeft = 2;
                hasRevealedCorrection = false;
                startTime = Date.now();
                startTimer();
                renderQuestion();
                updateUI();
                showToast("Reset!", "🔁");
            }

            function renderQuestion() {
                if (!qPrompt) return;

                if (TOTAL === 0) {
                    updateVerticalAlignmentForQuestion({ segments: [] });
                    qPrompt.innerHTML = `
                        <div class="${clsQuestionShell}">
                            <div class="${clsSentenceFlow}">
                                <span class="${clsSentenceText}">No questions found.</span>
                            </div>
                        </div>
                    `;
                    updateUI();
                    return;
                }

                const q = QUESTIONS[idx] || {};
                updateVerticalAlignmentForQuestion(q);
                const segments = Array.isArray(q.segments) ? q.segments : ["Question content is missing."];
                const savedSelections = questionSelections.get(idx) || [];
                qPrompt.innerHTML = "";

                const shell = document.createElement("div");
                shell.className = clsQuestionShell;

                const flow = document.createElement("div");
                flow.className = clsSentenceFlow;

                function appendTextSegment(text) {
                    const pieces = String(text).split(/<br\s*\/?>|\r?\n/gi);

                    pieces.forEach((piece, pieceIndex) => {
                        if (pieceIndex > 0) {
                            const lineBreak = document.createElement("span");
                            lineBreak.className = clsSentenceBreak;
                            lineBreak.setAttribute("aria-hidden", "true");
                            flow.appendChild(lineBreak);
                        }

                        if (piece === "") return;

                        const s = document.createElement("span");
                        s.className = clsSentenceText;
                        s.textContent = piece;
                        flow.appendChild(s);
                    });
                }

                let selectIndex = 0;

                segments.forEach((seg) => {
                    if (typeof seg === "string") {
                        appendTextSegment(seg);
                        return;
                    }

                    const wrap = document.createElement("span");
                    wrap.className = clsSelectWrap;

                    const sel = document.createElement("select");
                    sel.className = clsBaseSelect;
                    sel.dataset.answer = String(seg.answer ?? "");
                    sel.setAttribute("aria-label", `Choose answer for blank ${selectIndex + 1} in question ${idx + 1}`);

                    const placeholder = document.createElement("option");
                    placeholder.value = "";
                    placeholder.disabled = true;
                    placeholder.selected = true;
                    placeholder.textContent = "—";
                    sel.appendChild(placeholder);

                    const wrongOptions = Array.isArray(seg.wrong) ? seg.wrong : [seg.wrong];
                    const configuredOptions = Array.isArray(seg.options) ? seg.options : null;
                    const opts = shuffle([...new Set(
                        (configuredOptions ?? [sel.dataset.answer, ...wrongOptions])
                            .filter(v => v !== undefined && v !== null && v !== "")
                    )]);

                    opts.forEach(v => {
                        const o = document.createElement("option");
                        o.value = v;
                        o.textContent = v;
                        sel.appendChild(o);
                    });

                    const savedValue = savedSelections[selectIndex];
                    if (savedValue) {
                        sel.value = savedValue;
                    }

                    if (completedQuestions.has(idx) && sel.dataset.answer) {
                        sel.value = sel.dataset.answer;
                        setState(sel, true);
                        sel.disabled = true;
                        sel.classList.add("opacity-95");
                    }

                    const chevron = document.createElement("span");
                    chevron.className = clsChevron;
                    chevron.innerHTML = `<svg viewBox="0 0 20 20" class="h-4 w-4" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.08 1.04l-4.24 4.5a.75.75 0 0 1-1.08 0l-4.24-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd"/></svg>`;

                    wrap.appendChild(sel);
                    wrap.appendChild(chevron);
                    flow.appendChild(wrap);
                    selectIndex++;
                });

                shell.appendChild(flow);
                qPrompt.appendChild(shell);
                updateUI();

                Array.from(qPrompt.querySelectorAll(".quiz-select")).forEach(sel => {
                    sel.addEventListener("change", () => {
                        const selects = Array.from(qPrompt.querySelectorAll(".quiz-select"));
                        const allFilled = selects.every(select => !!select.value);

                        saveCurrentSelections();

                        if (allFilled) {
                            evaluateQuestion();
                        } else {
                            clearState(sel);
                        }
                    });
                });
            }

            function evaluateQuestion() {
                if (winModal && !winModal.classList.contains("hidden")) return;

                const all = Array.from(qPrompt.querySelectorAll(".quiz-select"));
                const filled = all.every(s => !!s.value);

                all.forEach(s => {
                    if (!s.value) clearState(s);
                });

                if (!filled) {
                    showToast("Complete all boxes first", "📝");
                    return;
                }

                saveCurrentSelections();

                const wrongs = all.filter(s => s.value !== s.dataset.answer);

                if (wrongs.length === 0) {
                    all.forEach(s => {
                        setState(s, true);
                        s.disabled = true;
                        s.classList.add("opacity-95");
                    });

                    completedQuestions.add(idx);
                    questionSelections.set(idx, all.map(s => s.value || ''));

                    if (!wrongedQuestions.has(idx) && !hintedQuestions.has(idx)) firstTryCorrect++;
                    play(audio.correct);
                    showToast("Nice!", "✅");
                    questionPanel.classList.add("solved-board");
                    updateUI();

                    setTimeout(() => {
                        questionPanel.classList.remove("solved-board");
                        const nextUnanswered = findNextUnansweredIndex(idx);
                        if (nextUnanswered >= 0) {
                            idx = nextUnanswered;
                            renderQuestion();
                        } else {
                            finish();
                        }
                    }, 900);

                    return;
                }

                wrongTries++;
                wrongedQuestions.add(idx);
                updateUI();

                wrongs.forEach(s => {
                    setState(s, false);
                    if (window.gsap && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                        gsap.fromTo(s, { x: 0 }, { x: 6, duration: 0.08, yoyo: true, repeat: 3, ease: "power2.inOut" });
                    }
                });

                questionPanel.classList.remove("shake-card");
                void questionPanel.offsetWidth;
                questionPanel.classList.add("shake-card");

                play(audio.wrong);
                showToast("Try again 🙂", "❌");

                setTimeout(() => {
                    wrongs.forEach(s => {
                        s.value = "";
                        clearState(s);
                    });
                    saveCurrentSelections();
                    questionPanel.classList.remove("shake-card");
                }, 850);
            }

            function revealOneCorrectAnswer() {
                if (winModal && !winModal.classList.contains("hidden")) return;

                if (autoChecksLeft <= 0) {
                    showToast("No hints left", "⚠️");
                    return;
                }

                const all = Array.from(qPrompt.querySelectorAll(".quiz-select"));
                const unresolved = all.filter(s => !s.disabled && s.value !== s.dataset.answer);

                if (unresolved.length === 0) {
                    showToast("Everything is already correct", "✅");
                    return;
                }

                const target = unresolved[0];
                hintedQuestions.add(idx);
                autoChecksLeft--;
                target.value = target.dataset.answer;
                clearState(target);
                setState(target, true);
                saveCurrentSelections();
                updateUI();
                showToast("One answer filled", "✨");

                const allCorrect = all.every(s => s.value === s.dataset.answer);
                if (allCorrect) {
                    setTimeout(() => evaluateQuestion(), 150);
                }
            }

            function showOverlay() {
                if (winModal) winModal.classList.remove("hidden");
                if (resultsCorrectionCard) resultsCorrectionCard.classList.remove("hidden");
                document.documentElement.classList.add("overflow-hidden");
            }

            function escapeHtml(value) {
                return String(value ?? "")
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            function escapeHtmlWithLineBreaks(value) {
                return escapeHtml(value)
                    .replace(/&lt;br\s*\/?&gt;/gi, "<br>")
                    .replace(/\r?\n/g, "<br>");
            }

            function buildCorrectionHTML(question, isRevealed) {
                if (!question || !Array.isArray(question.segments)) return "";

                return question.segments.map((seg) => {
                    if (typeof seg === "string") {
                        return `<span>${escapeHtmlWithLineBreaks(seg)}</span>`;
                    }

                    const answerClass = isRevealed
                        ? "bg-rose-100/80 text-rose-900 ring-1 ring-rose-300/70 dark:bg-rose-400/10 dark:text-rose-100 dark:ring-rose-300/30"
                        : "bg-emerald-100/80 text-emerald-900 ring-1 ring-emerald-300/70 dark:bg-emerald-400/10 dark:text-emerald-100 dark:ring-emerald-300/30";

                    return `<span class="inline-flex rounded-xl px-3 py-1 ${answerClass}">${escapeHtml(seg.answer)}</span>`;
                }).join(" ");
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => {
                    const sentence = buildCorrectionHTML(question, revealedQuestions.has(questionIndex));
                    return `
                        <div class="mb-2 flex items-start last:mb-0">
                            <span class="mr-2 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                ${questionIndex + 1}.
                            </span>
                            <span class="block min-w-0 leading-[1.55]">${sentence}</span>
                        </div>
                    `;
                }).join("");
            }

            function finish() {
                clearInterval(timerInt);
                if (finalCorrect) finalCorrect.textContent = `${firstTryCorrect}/${TOTAL}`;
                if (finalMistakes) finalMistakes.textContent = String(wrongTries);
                if (finalTime) finalTime.textContent = timer ? timer.textContent : "00:00";
                if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();

                showOverlay();
                play(audio.success);
                showToast(`${GAME_TITLE} complete!`, "🏁");
            }

            function revealCorrection() {
                if (TOTAL === 0 || hasRevealedCorrection) return;

                let newlyRevealed = 0;
                for (let i = 0; i < TOTAL; i++) {
                    if (!completedQuestions.has(i) && !revealedQuestions.has(i)) {
                        revealedQuestions.add(i);
                        newlyRevealed++;
                    }
                }

                hasRevealedCorrection = true;
                wrongTries += newlyRevealed;
                updateUI();
                clearInterval(timerInt);
                if (finalCorrect) finalCorrect.textContent = `${firstTryCorrect}/${TOTAL}`;
                if (finalMistakes) finalMistakes.textContent = String(wrongTries);
                if (finalTime) finalTime.textContent = timer ? timer.textContent : "00:00";
                if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();

                showOverlay();
                showToast("Corrections revealed", "📘");
            }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function goNext() {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.nextSlide === "function") {
                            window.parent.nextSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
                        return;
                    } catch (e) {}
                }
            }

            window.resetSlide = () => {
                restart();
            };

            window.stopSlideAudio = function () {
                Object.values(audio).forEach(a => {
                    if (a) {
                        a.pause();
                        a.currentTime = 0;
                    }
                });
            };

            continueBtnModal?.addEventListener("click", goNext);
            restartBtnModal?.addEventListener("click", restart);
            btnResetInline?.addEventListener("click", restart);
            btnAutoCheck?.addEventListener("click", revealOneCorrectAnswer);
            btnRevealCorrection?.addEventListener("click", revealCorrection);
            btnPrev?.addEventListener("click", () => {
                saveCurrentSelections();
                const target = findPreviousTargetIndex(idx);
                if (target < 0) return;
                idx = target;
                renderQuestion();
                updateUI();
            });
            btnNext?.addEventListener("click", () => {
                saveCurrentSelections();
                const target = findNextTargetIndex(idx);
                if (target < 0) return;
                idx = target;
                renderQuestion();
                updateUI();
            });

            renderQuestion();
            updateUI();
            startTimer();
            showToast("Ready!", "✨");
        })();
    </script>
@endsection
