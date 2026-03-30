@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
    <style type="text/tailwindcss">
        .section-card {
            @apply rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900;
        }

        .question-card {
            @apply rounded-3xl border border-slate-200 bg-white p-4 sm:p-5 lg:p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900;
        }

        .number-badge {
            @apply grid h-10 w-10 sm:h-11 sm:w-11 shrink-0 place-items-center rounded-2xl bg-indigo-600 text-sm sm:text-base font-black text-white shadow-lg shadow-indigo-600/20;
        }

        .option-btn {
            @apply w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-left text-sm sm:text-base font-extrabold tracking-[-0.01em] text-slate-700 transition duration-200 hover:-translate-y-0.5 hover:border-indigo-300 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 dark:hover:border-indigo-500 dark:hover:bg-slate-700;
            opacity: 1;
            transform: none;
        }

        .option-btn.is-correct {
            @apply border-emerald-400 bg-emerald-50 text-emerald-700 dark:border-emerald-500 dark:bg-emerald-500/10 dark:text-emerald-300;
        }

        .option-btn.is-wrong {
            @apply border-rose-400 bg-rose-50 text-rose-700 dark:border-rose-500 dark:bg-rose-500/10 dark:text-rose-300;
        }

        .option-btn.is-disabled {
            @apply pointer-events-none opacity-100;
        }

        .reading-text {
            @apply text-sm sm:text-[15px] lg:text-base leading-7 font-semibold tracking-[-0.01em] text-slate-700 dark:text-slate-200;
        }

        .question-text {
            @apply text-lg sm:text-xl lg:text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-white leading-tight;
        }

        .section-label {
            @apply text-xs sm:text-sm font-black uppercase tracking-[0.14em] text-slate-500 dark:text-slate-400;
        }

        .reading-title {
            @apply mt-2 text-xl sm:text-2xl lg:text-3xl font-black tracking-[-0.04em] text-slate-900 dark:text-white;
        }

        .progress-track {
            @apply h-3 w-full overflow-hidden rounded-full bg-slate-200 dark:bg-slate-800;
        }

        .progress-bar {
            @apply h-full rounded-full bg-gradient-to-r from-indigo-600 to-blue-500 transition-all duration-300;
        }

        .quiz-status {
            @apply text-sm sm:text-base font-extrabold tracking-[-0.02em] text-slate-700 dark:text-slate-200;
        }

        .feedback-box {
            @apply mt-4 rounded-2xl border px-4 py-3 text-sm sm:text-base font-extrabold;
        }

        .feedback-correct {
            @apply border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300;
        }

        .feedback-wrong {
            @apply border-rose-200 bg-rose-50 text-rose-700 dark:border-rose-700 dark:bg-rose-500/10 dark:text-rose-300;
        }

        .action-btn {
            @apply inline-flex items-center justify-center rounded-2xl px-4 py-3 text-sm sm:text-base font-black tracking-[-0.02em] transition duration-200 focus:outline-none focus:ring-2;
        }

        .action-btn-primary {
            @apply bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-400;
        }

        .action-btn-secondary {
            @apply border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 focus:ring-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 dark:hover:bg-slate-700;
        }

        .modal-backdrop {
            @apply fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/60 p-4;
        }

        .modal-backdrop.show {
            @apply flex;
        }

        .modal-card {
            @apply w-full max-w-md rounded-3xl border border-slate-200 bg-white p-5 sm:p-6 shadow-2xl dark:border-slate-700 dark:bg-slate-900;
        }

        .score-pill {
            @apply inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-sm font-black text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-300;
        }
    </style>
@endsection

@section("content")
    <main id="readingQuizGame" class="min-h-[100dvh] w-full px-3 sm:px-5 lg:px-6 py-3 sm:py-5">
        <div class="mx-auto w-full max-w-6xl">
            <div class="p-3 sm:p-5 lg:p-6">
                <header id="titleBlock" class="text-center mb-5 sm:mb-8">
                    <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['title'] }}
                        </span>
                    </h1>

                    @if(!empty($content['subtitle']))
                        <p class="mt-2 text-sm sm:text-base lg:text-lg font-extrabold tracking-[-0.02em] text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    @endif
                </header>

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-4">
                    <section id="passageCard" class="section-card xl:col-span-6 p-4 sm:p-5 lg:p-6">
                        <div class="section-label">Passage</div>
                        <h2 class="reading-title">{{ $content['reading_title'] }}</h2>

                        <div class="mt-4 space-y-3">
                            @foreach($content['passage'] as $paragraph)
                                <p class="reading-text">{{ $paragraph }}</p>
                            @endforeach
                        </div>
                    </section>

                    <section id="quizWrap" class="xl:col-span-6">
                        <div class="question-card">
                            <div class="flex items-center justify-between gap-3 mb-4">
                                <div>
                                    <div class="section-label">Quiz</div>
                                    <p id="quizStatus" class="quiz-status mt-1">
                                        Question 1 of {{ count($content['questions']) }}
                                    </p>
                                </div>

                                <div id="questionBadge" class="number-badge">1</div>
                            </div>

                            <div class="progress-track mb-5">
                                <div id="progressBar" class="progress-bar" style="width: 0%"></div>
                            </div>

                            <div id="questionArea">
                                <h3 id="questionText" class="question-text"></h3>

                                <div id="optionsWrap" class="mt-5 grid grid-cols-1 gap-3"></div>

                                <div id="feedbackBox" class="hidden feedback-box"></div>

                                <div class="mt-5 flex items-center justify-end gap-3">
                                    <button id="restartBtn" type="button" class="action-btn action-btn-secondary">
                                        Restart
                                    </button>

                                    <button id="nextBtn" type="button" class="action-btn action-btn-primary hidden">
                                        Next Question
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div id="finishModal" class="modal-backdrop" aria-hidden="true">
            <div class="modal-card">
                <div class="section-label">Completed</div>

                <h3 class="mt-2 text-2xl sm:text-3xl font-black tracking-[-0.04em] text-slate-900 dark:text-white">
                    Great job!
                </h3>

                <p class="mt-3 text-sm sm:text-base font-semibold text-slate-600 dark:text-slate-300">
                    You finished all the questions.
                </p>

                <div class="mt-4">
                    <span id="finalScore" class="score-pill">Score: 0 / {{ count($content['questions']) }}</span>
                </div>

                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <button id="continueBtn" type="button" class="action-btn action-btn-primary flex-1">
                        Continue
                    </button>

                    <button id="modalRestartBtn" type="button" class="action-btn action-btn-secondary flex-1">
                        Restart
                    </button>
                </div>
            </div>
        </div>

        <script type="application/json" id="quiz-data">@json($content['questions'])</script>
    </main>
@endsection

@section("script")
    <script>
        (() => {
            const root = document.getElementById("readingQuizGame");
            if (!root) return;

            const quizDataEl = document.getElementById("quiz-data");
            const title = document.getElementById("titleBlock");
            const passage = document.getElementById("passageCard");
            const quizWrap = document.getElementById("quizWrap");
            const quizStatus = document.getElementById("quizStatus");
            const questionBadge = document.getElementById("questionBadge");
            const questionText = document.getElementById("questionText");
            const optionsWrap = document.getElementById("optionsWrap");
            const feedbackBox = document.getElementById("feedbackBox");
            const nextBtn = document.getElementById("nextBtn");
            const restartBtn = document.getElementById("restartBtn");
            const progressBar = document.getElementById("progressBar");
            const finishModal = document.getElementById("finishModal");
            const finalScore = document.getElementById("finalScore");
            const continueBtn = document.getElementById("continueBtn");
            const modalRestartBtn = document.getElementById("modalRestartBtn");

            if (!quizDataEl || !questionText || !optionsWrap) return;

            let quizData = [];
            try {
                quizData = JSON.parse(quizDataEl.textContent.trim());
            } catch (error) {
                console.error("Quiz JSON parse error:", error);
                quizData = [];
            }

            let currentIndex = 0;
            let score = 0;
            let answeredCount = 0;
            let locked = false;

            const total = Array.isArray(quizData) ? quizData.length : 0;
            const labels = ["A", "B", "C", "D", "E", "F"];

            function animateQuestionIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const targets = [questionText, optionsWrap].filter(Boolean);
                if (!targets.length) return;

                gsap.killTweensOf(targets);
                gsap.set(targets, { clearProps: "opacity,transform" });

                gsap.fromTo(
                    questionText,
                    { opacity: 0, y: 10 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.35,
                        ease: "power2.out",
                        overwrite: "auto",
                        clearProps: "opacity,transform"
                    }
                );

                gsap.fromTo(
                    optionsWrap,
                    { opacity: 0, y: 10 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.4,
                        ease: "power2.out",
                        overwrite: "auto",
                        clearProps: "opacity,transform"
                    }
                );
            }

            function updateProgress() {
                const progress = total > 0 ? (answeredCount / total) * 100 : 0;
                if (progressBar) {
                    progressBar.style.width = `${Math.min(progress, 100)}%`;
                }
            }

            function renderQuestion() {
                if (!total || !quizData[currentIndex]) {
                    questionText.textContent = "No questions found.";
                    optionsWrap.innerHTML = "";
                    if (quizStatus) quizStatus.textContent = "Question 0 of 0";
                    if (questionBadge) questionBadge.textContent = "0";
                    if (nextBtn) nextBtn.classList.add("hidden");
                    updateProgress();
                    return;
                }

                const current = quizData[currentIndex];
                locked = false;

                if (quizStatus) {
                    quizStatus.textContent = `Question ${currentIndex + 1} of ${total}`;
                }

                if (questionBadge) {
                    questionBadge.textContent = current.number ?? (currentIndex + 1);
                }

                questionText.textContent = current.question || "";
                optionsWrap.innerHTML = "";

                if (feedbackBox) {
                    feedbackBox.textContent = "";
                    feedbackBox.className = "hidden feedback-box";
                }

                if (nextBtn) {
                    nextBtn.classList.add("hidden");
                }

                const options = Array.isArray(current.options) ? current.options : [];

                options.forEach((option, index) => {
                    const button = document.createElement("button");
                    button.type = "button";
                    button.className = "option-btn";
                    button.innerHTML = `<span class="font-black mr-2">${labels[index] || ""})</span>${option}`;
                    button.addEventListener("click", () => handleAnswer(index, button));
                    optionsWrap.appendChild(button);
                });

                Array.from(optionsWrap.children).forEach((btn) => {
                    btn.style.opacity = "1";
                    btn.style.transform = "none";
                });

                updateProgress();
                animateQuestionIn();
            }

            function handleAnswer(selectedIndex, selectedButton) {
                if (locked) return;

                const current = quizData[currentIndex];
                if (!current) return;

                const correctIndex = Number(current.correct);
                if (Number.isNaN(correctIndex)) return;

                locked = true;
                answeredCount = currentIndex + 1;
                updateProgress();

                const buttons = Array.from(optionsWrap.querySelectorAll(".option-btn"));

                buttons.forEach((btn, idx) => {
                    btn.classList.add("is-disabled");

                    if (idx === correctIndex) {
                        btn.classList.add("is-correct");
                    }
                });

                if (selectedIndex === correctIndex) {
                    score++;

                    if (feedbackBox) {
                        feedbackBox.textContent = "Correct! Well done.";
                        feedbackBox.className = "feedback-box feedback-correct";
                        feedbackBox.classList.remove("hidden");
                    }
                } else {
                    selectedButton.classList.add("is-wrong");

                    if (feedbackBox) {
                        const correctLabel = labels[correctIndex] || "";
                        const correctAnswerText = current.options?.[correctIndex] || "";
                        feedbackBox.textContent = `Not quite. The correct answer is ${correctLabel}) ${correctAnswerText}.`;
                        feedbackBox.className = "feedback-box feedback-wrong";
                        feedbackBox.classList.remove("hidden");
                    }
                }

                if (currentIndex < total - 1) {
                    if (nextBtn) nextBtn.classList.remove("hidden");
                } else {
                    setTimeout(showFinishModal, 500);
                }
            }

            function nextQuestion() {
                if (currentIndex < total - 1) {
                    currentIndex++;
                    renderQuestion();
                }
            }

            function hideFinishModal() {
                if (!finishModal) return;
                finishModal.classList.remove("show");
                finishModal.setAttribute("aria-hidden", "true");
            }

            function showFinishModal() {
                if (finalScore) {
                    finalScore.textContent = `Score: ${score} / ${total}`;
                }

                if (!finishModal) return;

                finishModal.classList.add("show");
                finishModal.setAttribute("aria-hidden", "false");

                if (window.gsap && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                    const card = finishModal.querySelector(".modal-card");

                    if (card) {
                        gsap.killTweensOf(card);
                        gsap.fromTo(
                            card,
                            { opacity: 0, y: 20, scale: 0.96 },
                            { opacity: 1, y: 0, scale: 1, duration: 0.35, ease: "power2.out" }
                        );
                    }
                }
            }

            function restartQuiz() {
                currentIndex = 0;
                score = 0;
                answeredCount = 0;
                locked = false;
                hideFinishModal();
                updateProgress();
                renderQuestion();
            }

            if (nextBtn) {
                nextBtn.addEventListener("click", nextQuestion);
            }

            if (restartBtn) {
                restartBtn.addEventListener("click", restartQuiz);
            }

            if (modalRestartBtn) {
                modalRestartBtn.addEventListener("click", restartQuiz);
            }

            if (continueBtn) {
                continueBtn.addEventListener("click", hideFinishModal);
            }

            if (finishModal) {
                finishModal.addEventListener("click", (e) => {
                    if (e.target === finishModal) {
                        hideFinishModal();
                    }
                });
            }

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [title, passage, quizWrap].filter(Boolean);

                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power2.out" } })
                    .from(title, { opacity: 0, y: 10, duration: 0.45 }, 0)
                    .from(passage, { opacity: 0, y: 10, duration: 0.4 }, 0.08)
                    .from(quizWrap, { opacity: 0, y: 10, duration: 0.4 }, 0.14);
            }

            window.resetSlide = function () {
                playIn();
                restartQuiz();
            };

            updateProgress();
            playIn();
            renderQuestion();
        })();
    </script>
@endsection