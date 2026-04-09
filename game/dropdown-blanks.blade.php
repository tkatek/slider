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

        .question-shell {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            background: linear-gradient(180deg, rgba(255,255,255,0.96) 0%, rgba(248,250,252,0.88) 100%);
            box-shadow:
                0 14px 34px rgba(15, 23, 42, 0.06),
                inset 0 1px 0 rgba(255,255,255,0.8);
        }

        .dark .question-shell {
            border-color: rgba(71, 85, 105, 0.75);
            background: linear-gradient(180deg, rgba(15,23,42,0.62) 0%, rgba(2,6,23,0.5) 100%);
            box-shadow:
                0 14px 34px rgba(0,0,0,0.28),
                inset 0 1px 0 rgba(255,255,255,0.03);
        }

        .sentence-flow {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px 14px;
            min-width: 0;
            font-weight: 700;
            line-height: 1.85;
            letter-spacing: -0.01em;
        }

        .sentence-text {
            color: #0f172a;
        }

        .dark .sentence-text {
            color: #f8fafc;
        }

        .is-compact-text .sentence-flow {
            gap: 10px 12px;
            font-weight: 600;
            line-height: 1.72;
            letter-spacing: -0.005em;
        }

        .sentence-select-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .helper-note {
            border-radius: 18px;
            border: 1px solid rgba(226, 232, 240, 0.85);
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(8px);
        }

        .dark .helper-note {
            border-color: rgba(71, 85, 105, 0.7);
            background: rgba(15, 23, 42, 0.45);
        }

        .dropdown-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: #fff;
            border: 1px solid rgba(255,255,255,.2);
            background: linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow: 0 10px 24px rgba(79,70,229,.10);
            transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .dropdown-btn-primary:hover { transform: scale(1.05); }
        .dropdown-btn-primary:active { transform: scale(.95); }

        .dropdown-btn-reveal {
            color: rgb(154 52 18);
            border-color: rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
        }

        .dropdown-btn-reveal:hover {
            background: rgb(254 215 170);
            box-shadow: 0 10px 24px rgba(234,88,12,.14);
        }

        .dropdown-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(15 23 42);
            border: 1px solid rgb(226 232 240);
            background: #fff;
            box-shadow: 0 8px 22px rgba(2,6,23,.05);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .dropdown-btn-secondary:hover {
            transform: scale(1.05);
            background: rgb(248 250 252);
        }

        .dropdown-btn-secondary:active { transform: scale(.98); }

        .dark .dropdown-btn-secondary {
            color: #fff;
            border-color: rgb(51 65 85);
            background: rgb(30 41 59);
        }

        .dark .dropdown-btn-secondary:hover {
            background: rgb(51 65 85);
        }

        .dark .dropdown-btn-reveal {
            color: rgb(254 215 170);
            border-color: rgba(194, 65, 12, .45);
            background: rgba(154, 52, 18, .35);
        }

        .dark .dropdown-btn-reveal:hover {
            background: rgba(154, 52, 18, .5);
        }

        .dropdown-btn-warning {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(120 53 15);
            border: 1px solid rgb(253 186 116);
            background: rgb(254 243 199);
            box-shadow: 0 8px 22px rgba(120,53,15,.10);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .dropdown-btn-warning:hover {
            transform: scale(1.05);
            background: rgb(253 230 138);
        }

        .dropdown-btn-warning:active { transform: scale(.98); }

        .dark .dropdown-btn-warning {
            color: rgb(254 243 199);
            border-color: rgba(180, 83, 9, .45);
            background: rgba(120, 53, 15, .35);
        }

        .dark .dropdown-btn-warning:hover {
            background: rgba(120, 53, 15, .5);
        }

        @media (max-width: 640px) {
            .sentence-flow {
                justify-content: center;
                gap: 10px 12px;
                line-height: 1.7;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $compactLayout = (bool)($content['compact_layout'] ?? false);
        $compactText = (bool)($content['compact_text'] ?? $compactLayout);
    @endphp
    <div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100 {{ $compactText ? 'is-compact-text' : '' }}">
        <main class="w-full max-w-7xl min-h-[100dvh] px-4 sm:px-8 mx-auto {{ $compactLayout ? 'py-4 sm:py-7' : 'py-6 sm:py-10' }} pb-28 flex flex-col">
            <section class="{{ $compactLayout ? 'p-1 sm:p-3' : 'p-2 sm:p-6' }} flex-1 flex flex-col">
                <div class="grid place-items-center text-center {{ $compactLayout ? 'gap-4 sm:gap-6' : 'gap-5 sm:gap-8' }} flex-1 auto-rows-max">

                    <div id="titleBlock" class="header-spacing text-center {{ $compactLayout ? 'space-y-3 my-3 sm:my-5' : 'space-y-4 my-4 sm:my-6' }}">
                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black {{ $compactLayout ? 'mb-2.5 sm:mb-3' : 'mb-3 sm:mb-5' }}">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] ?? 'Exercise' }}
                            </span>
                        </h1>

                        @if(!empty($content['subtitle']))
                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{ $content['subtitle'] }}
                            </p>
                        @endif
                    </div>

                    <div id="statusRow" class="w-full max-w-[19.5rem] sm:max-w-3xl rounded-3xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-lg overflow-hidden">
                        <div class="grid grid-cols-4">
                            @foreach(['Question' => 'qCount', 'Correct' => 'correctCount', 'Mistakes' => 'mistakesCount', 'Time' => 'timer'] as $label => $id)
                                <div class="px-1.5 py-2 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                                    <div class="hidden sm:inline-block text-[11px] sm:text-xs font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                        {{ $label }}
                                    </div>
                                    <div class="font-black text-xs sm:text-lg">
                                        @if($label == 'Correct')
                                            ✅
                                        @elseif($label == 'Mistakes')
                                            ❌
                                        @elseif($label == 'Time')
                                            ⏱️
                                        @endif
                                        <span id="{{ $id }}">
                                            {{ $label == 'Question' ? '1/'.count($content['questions'] ?? []) : ($label == 'Time' ? '00:00' : '0') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <section id="gameCard" class="relative w-full max-w-5xl {{ $compactLayout ? 'p-2.5 sm:p-4 min-h-[360px]' : 'p-3 sm:p-6 min-h-[420px]' }} flex-1">
                        <div id="questionPanel" class="h-full overflow-hidden rounded-2xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-xl">
                            <div class="h-full {{ $compactLayout ? 'p-4 sm:p-5' : 'p-5 sm:p-6' }} text-left">
                                <div class="flex items-center justify-between gap-2 sm:gap-3">
                                    <div class="min-w-0 text-[11px] sm:text-base font-extrabold text-slate-500 dark:text-slate-400">
                                        Complete the sentence:
                                    </div>

                                    <button
                                        id="btnRevealCorrection"
                                        class="dropdown-btn-primary dropdown-btn-reveal shrink-0 whitespace-nowrap px-2.5 py-1.5 text-[11px] sm:px-3 sm:py-2 sm:text-xs"
                                    >
                                        Reveal correction
                                    </button>
                                </div>
                                <div id="qPrompt" class="my-4">
                                    ...
                                </div>
                                <div class="helper-note {{ $compactLayout ? 'mt-4' : 'mt-5' }} flex items-center gap-2 px-3 py-2.5 text-xs sm:text-sm font-medium text-slate-600 dark:text-slate-300">
                                    <span class="text-base">👇</span>
                                    <span>Choose the correct answer in each box.</span>
                                </div>

                                <div class="{{ $compactLayout ? 'mt-4' : 'mt-5' }} grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    <button
                                        id="btnResetInline"
                                        class="dropdown-btn-secondary py-3"
                                    >
                                        Restart 🔁
                                    </button>

                                    <button
                                        id="btnAutoCheck"
                                        class="dropdown-btn-warning py-3"
                                    >
                                        Hint ✨ (<span id="autoCheckBadge">2</span>)
                                    </button>

                                    <button
                                        id="btnPrev"
                                        class="dropdown-btn-secondary py-3"
                                    >
                                        Previous
                                    </button>

                                    <button
                                        id="btnNext"
                                        class="dropdown-btn-primary py-3"
                                    >
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="resultsOverlay" class="hidden fixed inset-0 z-50">
                            <div class="absolute inset-0 bg-slate-900/40 dark:bg-black/60 backdrop-blur-sm"></div>

                            <div class="relative min-h-full w-full flex items-center justify-center p-4 sm:p-6">
                                <div class="w-full max-w-[42rem] lg:max-w-[46rem] max-h-[88dvh] overflow-y-auto rounded-3xl border border-slate-200/70 dark:border-slate-700/70 bg-white/95 dark:bg-slate-900/95 shadow-2xl">
                                    <div class="p-5 sm:p-7 lg:p-8 text-center">
                                        <div class="flex items-center justify-center gap-2 sm:block">
                                            <div class="text-3xl sm:text-6xl">🎉</div>

                                            <h2 class="text-2xl sm:mt-5 sm:text-4xl leading-none font-black dark:text-white">
                                                Done
                                            </h2>
                                        </div>

                                        <div class="mt-5 sm:mt-8 w-full grid grid-cols-3 gap-2 sm:gap-4">
                                            <div class="p-2.5 sm:p-5 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                                <div class="text-[9px] sm:text-xs font-bold uppercase tracking-[0.12em] sm:tracking-[0.14em] text-slate-500 dark:text-slate-400">Score</div>
                                                <div id="finalScore" class="mt-2 text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">0</div>
                                            </div>
                                            <div class="p-2.5 sm:p-5 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                                <div class="text-[9px] sm:text-xs font-bold uppercase tracking-[0.12em] sm:tracking-[0.14em] text-slate-500 dark:text-slate-400">Time</div>
                                                <div id="finalTime" class="mt-2 text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">00:00</div>
                                            </div>
                                            <div class="p-2.5 sm:p-5 bg-white/80 dark:bg-slate-800/80 rounded-2xl shadow border border-slate-200/70 dark:border-slate-700">
                                                <div class="text-[9px] sm:text-xs font-bold uppercase tracking-[0.12em] sm:tracking-[0.14em] text-slate-500 dark:text-slate-400">Mistakes</div>
                                                <div id="finalMistakes" class="mt-2 text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">0</div>
                                            </div>
                                        </div>

                                        <div class="mt-4 sm:mt-6 rounded-2xl border border-slate-200/70 bg-white/80 p-3 sm:p-4 text-left shadow dark:border-slate-700 dark:bg-slate-800/80">
                                            <div class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                                Corrections
                                            </div>
                                            <div id="finalCorrection" class="mt-3 text-[15px] sm:text-base font-bold leading-[1.75] sm:leading-[1.85] text-slate-900 dark:text-white"></div>
                                        </div>

                                        <div class="mt-5 sm:mt-8 grid grid-cols-2 gap-2.5 sm:gap-4">
                                            <button
                                                id="btnReset"
                                                class="dropdown-btn-secondary w-full px-4 py-3 sm:px-8 text-sm"
                                            >
                                                Restart 🔁
                                            </button>

                                            <button
                                                id="btnContinue"
                                                class="dropdown-btn-primary w-full px-4 py-3 sm:px-8 text-sm"
                                            >
                                                Continue ⚡
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div id="toastOne" class="fixed left-1/2 -translate-x-1/2 bottom-24 opacity-0 pointer-events-none z-50">
                        <div class="px-6 py-2 rounded-full bg-white dark:bg-slate-800 shadow-2xl border border-slate-200 dark:border-slate-700 font-black dark:text-white">
                            <span id="toastIcon"></span>
                            <span id="toastText"></span>
                        </div>
                    </div>

                </div>
            </section>
        </main>

    </div>
@endsection

@section('script')
    <script>
        (() => {
            const QUESTIONS = @json($content['questions'] ?? []);
            const GAME_TITLE = @json($content['title'] ?? 'Exercise');
            const TOTAL = QUESTIONS.length;
            const COMPACT_TEXT = @json($compactText);

            const qPrompt = document.getElementById("qPrompt");
            const qCount = document.getElementById("qCount");
            const correctCount = document.getElementById("correctCount");
            const mistakesCount = document.getElementById("mistakesCount");
            const timer = document.getElementById("timer");

            const finalScore = document.getElementById("finalScore");
            const finalMistakes = document.getElementById("finalMistakes");
            const finalTime = document.getElementById("finalTime");
            const finalCorrection = document.getElementById("finalCorrection");

            const questionPanel = document.getElementById("questionPanel");
            const resultsOverlay = document.getElementById("resultsOverlay");
            const toastOne = document.getElementById("toastOne");
            const toastIcon = document.getElementById("toastIcon");
            const toastText = document.getElementById("toastText");

            const btnContinue = document.getElementById("btnContinue");
            const btnReset = document.getElementById("btnReset");
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
            let autoChecksLeft = 2;
            let startTime = Date.now();
            let timerInt = null;
            let toastT = null;

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function startTimer() {
                clearInterval(timerInt);
                timerInt = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    const mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                    const secs = String(elapsed % 60).padStart(2, '0');
                    if (timer) timer.textContent = `${mins}:${secs}`;
                }, 1000);
            }

            function showToast(text, icon = "✨") {
                toastIcon.textContent = icon;
                toastText.textContent = text;

                if (!window.gsap) return;
                if (toastT) toastT.kill();

                gsap.set(toastOne, { opacity: 0, y: 8 });
                toastT = gsap.timeline()
                    .to(toastOne, { opacity: 1, y: 0, duration: 0.3 })
                    .to(toastOne, { opacity: 0, y: -10, duration: 0.3 }, "+=1");
            }

            function updateUI() {
                if (qCount) qCount.textContent = `${Math.min(idx + 1, Math.max(TOTAL, 1))}/${Math.max(TOTAL, 1)}`;
                if (correctCount) correctCount.textContent = String(firstTryCorrect);
                if (mistakesCount) mistakesCount.textContent = String(wrongTries);
                if (autoCheckBadge) autoCheckBadge.textContent = String(autoChecksLeft);
                setNavDisabledState(btnPrev, findPreviousUnansweredIndex(idx) < 0);
                setNavDisabledState(btnNext, findNextUnansweredIndex(idx) < 0);
            }

            function setNavDisabledState(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle("opacity-60", disabled);
                button.classList.toggle("pointer-events-none", disabled);
                button.classList.toggle("cursor-not-allowed", disabled);
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

            function shuffle(arr) {
                const a = [...arr];
                for (let i = a.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [a[i], a[j]] = [a[j], a[i]];
                }
                return a;
            }

            const clsBaseSelect =
                "quiz-select appearance-none min-w-[10rem] sm:min-w-[11.5rem] lg:min-w-[13rem] w-auto max-w-full rounded-2xl px-4 py-3 sm:py-4 pr-11 " +
                "font-black text-sm sm:text-base " +
                "bg-white/95 text-slate-900 border border-slate-200/80 ring-1 ring-slate-200/60 " +
                "shadow-md shadow-slate-900/10 " +
                "focus:outline-none focus:ring-4 focus:ring-indigo-500/25 focus:border-indigo-400/40 " +
                "dark:[color-scheme:dark] dark:bg-slate-900/55 dark:text-slate-50 dark:border-slate-600/50 dark:ring-slate-700/55 " +
                "dark:shadow-black/40 dark:focus:ring-indigo-400/25";

            function clearState(sel) {
                sel.classList.remove(
                    "ring-emerald-300/70", "dark:ring-emerald-300/35", "bg-emerald-100/70", "dark:bg-emerald-400/10", "text-emerald-900", "dark:text-emerald-100",
                    "ring-rose-300/70", "dark:ring-rose-300/35", "bg-rose-100/70", "dark:bg-rose-400/10", "text-rose-900", "dark:text-rose-100"
                );
            }

            function setState(sel, ok) {
                clearState(sel);
                if (ok) {
                    sel.classList.add("ring-emerald-300/70", "dark:ring-emerald-300/35", "bg-emerald-100/70", "dark:bg-emerald-400/10", "text-emerald-900", "dark:text-emerald-100");
                } else {
                    sel.classList.add("ring-rose-300/70", "dark:ring-rose-300/35", "bg-rose-100/70", "dark:bg-rose-400/10", "text-rose-900", "dark:text-rose-100");
                }
            }

            function hideOverlay() {
                resultsOverlay.classList.add("hidden");
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
                autoChecksLeft = 2;
                startTime = Date.now();
                startTimer();
                renderQuestion();
                updateUI();
                showToast("Reset!", "🔁");
            }

            function renderQuestion() {
                if (TOTAL === 0) {
                    qPrompt.innerHTML = `
                        <div class="question-shell p-4 sm:p-5 lg:p-6">
                            <div class="sentence-flow justify-center sm:justify-start ${COMPACT_TEXT ? 'text-base sm:text-lg lg:text-xl' : 'text-lg sm:text-xl lg:text-2xl'}">
                                <span class="sentence-text">No questions found.</span>
                            </div>
                        </div>
                    `;
                    updateUI();
                    return;
                }

                const q = QUESTIONS[idx];
                qPrompt.innerHTML = "";

                const shell = document.createElement("div");
                shell.className = "question-shell p-4 sm:p-5 lg:p-6";

                const flow = document.createElement("div");
                flow.className = COMPACT_TEXT
                    ? "sentence-flow text-base sm:text-lg lg:text-xl justify-center sm:justify-start"
                    : "sentence-flow text-lg sm:text-xl lg:text-2xl justify-center sm:justify-start";

                (q.segments || []).forEach(seg => {
                    if (typeof seg === "string") {
                        const s = document.createElement("span");
                        s.className = "sentence-text";
                        s.textContent = seg;
                        flow.appendChild(s);
                        return;
                    }

                    const wrap = document.createElement("span");
                    wrap.className = "sentence-select-wrap";

                    const sel = document.createElement("select");
                    sel.className = clsBaseSelect;
                    sel.dataset.answer = seg.answer;

                    const placeholder = document.createElement("option");
                    placeholder.value = "";
                    placeholder.disabled = true;
                    placeholder.selected = true;
                    placeholder.textContent = "—";
                    sel.appendChild(placeholder);

                    const wrongOptions = Array.isArray(seg.wrong) ? seg.wrong : [seg.wrong];
                    const opts = shuffle(
                        [...new Set([seg.answer, ...wrongOptions].filter(v => v !== undefined && v !== null && v !== ""))]
                    );

                    opts.forEach(v => {
                        const o = document.createElement("option");
                        o.value = v;
                        o.textContent = v;
                        sel.appendChild(o);
                    });

                    const chevron = document.createElement("span");
                    chevron.className = "pointer-events-none absolute right-3 text-slate-500 dark:text-slate-200/85";
                    chevron.innerHTML = `<svg viewBox="0 0 20 20" class="w-4 h-4" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.08 1.04l-4.24 4.5a.75.75 0 0 1-1.08 0l-4.24-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd"/></svg>`;

                    wrap.appendChild(sel);
                    wrap.appendChild(chevron);
                    flow.appendChild(wrap);
                });

                shell.appendChild(flow);
                qPrompt.appendChild(shell);
                updateUI();

                const selects = Array.from(document.querySelectorAll(".quiz-select"));
                selects.forEach(sel => {
                    sel.addEventListener("change", () => {
                        const allFilled = selects.every(select => !!select.value);
                        if (allFilled) {
                            evaluateQuestion();
                        } else {
                            clearState(sel);
                        }
                    });
                });

            }

            function evaluateQuestion() {
                if (!resultsOverlay.classList.contains("hidden")) return;

                const all = Array.from(document.querySelectorAll(".quiz-select"));
                const filled = all.every(s => !!s.value);

                all.forEach(s => {
                    if (!s.value) clearState(s);
                });
                if (!filled) {
                    showToast("Complete all boxes first", "📝");
                    return;
                }

                const wrongs = all.filter(s => s.value !== s.dataset.answer);

                if (wrongs.length === 0) {
                    all.forEach(s => {
                        setState(s, true);
                        s.disabled = true;
                        s.classList.add("opacity-95");
                    });

                    completedQuestions.add(idx);

                    if (!wrongedQuestions.has(idx)) firstTryCorrect++;
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
                    questionPanel.classList.remove("shake-card");
                }, 650);
            }

            function revealOneCorrectAnswer() {
                if (!resultsOverlay.classList.contains("hidden")) return;

                if (autoChecksLeft <= 0) {
                    showToast("No auto checks left", "⚠️");
                    return;
                }

                const all = Array.from(document.querySelectorAll(".quiz-select"));
                const unresolved = all.filter(s => !s.disabled && s.value !== s.dataset.answer);

                if (unresolved.length === 0) {
                    showToast("Everything is already correct", "✅");
                    return;
                }

                const target = unresolved[0];
                autoChecksLeft--;
                target.value = target.dataset.answer;
                clearState(target);
                setState(target, true);
                updateUI();
                showToast("One answer filled", "✨");

                const allCorrect = all.every(s => s.value === s.dataset.answer);
                if (allCorrect) {
                    setTimeout(() => {
                        evaluateQuestion();
                    }, 150);
                }
            }

            function showOverlay() {
                resultsOverlay.classList.remove("hidden");
                document.documentElement.classList.add("overflow-hidden");
            }

            function buildCorrectionHTML(question, isRevealed) {
                if (!question || !Array.isArray(question.segments)) return "";

                return question.segments.map((seg) => {
                    if (typeof seg === "string") {
                        return `<span>${String(seg)
                            .replace(/&/g, "&amp;")
                            .replace(/</g, "&lt;")
                            .replace(/>/g, "&gt;")}</span>`;
                    }

                    const answerClass = isRevealed
                        ? "bg-rose-100/80 text-rose-900 ring-1 ring-rose-300/70 dark:bg-rose-400/10 dark:text-rose-100 dark:ring-rose-300/30"
                        : "bg-emerald-100/80 text-emerald-900 ring-1 ring-emerald-300/70 dark:bg-emerald-400/10 dark:text-emerald-100 dark:ring-emerald-300/30";

                    return `<span class="inline-flex rounded-xl px-3 py-1 ${answerClass}">${String(seg.answer ?? "")
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")}</span>`;
                }).join(" ");
            }

            function buildAllCorrectionsHTML() {
                return QUESTIONS.map((question, questionIndex) => {
                    const sentence = buildCorrectionHTML(question, revealedQuestions.has(questionIndex));
                    return `
                        <div class="mb-2 last:mb-0 flex items-baseline">
                            <span class="mr-2 text-xs font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                                ${questionIndex + 1}.
                            </span>
                            <span class="inline-flex flex-wrap items-center gap-x-2 gap-y-2 align-middle">${sentence}</span>
                        </div>
                    `;
                }).join("");
            }

            function finish() {
                clearInterval(timerInt);
                finalScore.textContent = `${firstTryCorrect}/${TOTAL}`;
                finalMistakes.textContent = String(wrongTries);
                finalTime.textContent = timer ? timer.textContent : "00:00";
                if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();

                showOverlay();
                play(audio.success);
                showToast(`${GAME_TITLE} complete!`, "🏁");
            }

            function revealCorrection() {
                if (TOTAL === 0) return;

                for (let i = 0; i < TOTAL; i++) {
                    if (!completedQuestions.has(i)) {
                        revealedQuestions.add(i);
                    }
                }

                wrongTries += revealedQuestions.size;
                clearInterval(timerInt);
                finalScore.textContent = `${firstTryCorrect}/${TOTAL}`;
                finalMistakes.textContent = String(wrongTries);
                finalTime.textContent = timer ? timer.textContent : "00:00";
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

            btnContinue?.addEventListener("click", goNext);
            btnReset?.addEventListener("click", restart);
            btnResetInline?.addEventListener("click", restart);
            btnAutoCheck?.addEventListener("click", revealOneCorrectAnswer);
            btnRevealCorrection?.addEventListener("click", revealCorrection);
            btnPrev?.addEventListener("click", () => {
                const target = findPreviousUnansweredIndex(idx);
                if (target < 0) return;
                idx = target;
                renderQuestion();
                updateUI();
            });
            btnNext?.addEventListener("click", () => {
                const target = findNextUnansweredIndex(idx);
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
