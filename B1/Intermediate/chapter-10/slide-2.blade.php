<?php
$questionData = require base_path('resources/views/slider/questions.php');
$appData = [
    'topics' => $questionData['topics'] ?? [],
    'firstTimeQuestions' => $questionData['first_time_questions'] ?? [],
    'turnSeconds' => 10,
];
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Passing Questions Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html,
        body {
            min-height: 100%;
            overscroll-behavior: none;
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
        }

        @keyframes questionChooserIn {
            0% {
                opacity: 0;
                transform: scale(.94);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes chooserCardShuffle {
            0%, 100% {
                transform: translate(var(--card-x), var(--card-y)) rotate(var(--card-r));
            }
            45% {
                transform: translate(var(--card-x-mid), var(--card-y-mid)) rotate(var(--card-r-mid));
            }
        }

        @keyframes chooserCenterPulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.08);
            }
        }

        @keyframes chooserProgress {
            0% {
                transform: scaleX(.16);
            }
            100% {
                transform: scaleX(1);
            }
        }

        @keyframes questionReveal {
            0% {
                opacity: 0;
                transform: translateY(18px) scale(.96);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        [data-question-card].is-revealing [data-question-text],
        [data-question-card].is-revealing [data-topic-title] {
            animation: questionReveal .48s cubic-bezier(.2,.8,.2,1) both;
        }

        [data-transition-overlay] {
            perspective: 1100px;
            --question-transition-duration: 5s;
        }

        [data-transition-overlay].is-visible [data-ornate-card] {
            animation: questionChooserIn .38s ease-out both;
        }

        [data-transition-overlay].is-visible [data-shuffle-card] {
            animation: chooserCardShuffle var(--question-transition-duration) cubic-bezier(.45,0,.2,1) both;
        }

        [data-transition-overlay].is-visible [data-shuffle-center] {
            animation: chooserCenterPulse var(--question-transition-duration) ease-in-out both;
        }

        [data-transition-overlay].is-visible [data-shuffle-progress] {
            animation: chooserProgress var(--question-transition-duration) cubic-bezier(.22,.61,.22,1) both;
            transform-origin: left center;
        }
    </style>
</head>
<body class="min-h-dvh bg-[#f6f3ff] text-[#121a31]">
<main class="mx-auto flex min-h-dvh w-full max-w-[980px] flex-col items-center justify-center gap-5 px-4 py-6">
    <section class="flex w-full max-w-[650px] items-center justify-between gap-3 rounded-[22px] border-2 border-[#ded7fb] bg-white/95 px-4 py-3 shadow-[0_16px_34px_rgba(52,38,143,0.12)] min-[681px]:max-w-[min(100%,900px)]">
        <div class="min-w-0">
            <p class="m-0 text-[0.72rem] font-black uppercase leading-none text-[#6b7280]">Question timer</p>
            <strong class="mt-1 block text-[1.35rem] font-black leading-none text-[#11182f]" data-time-left>00:10</strong>
        </div>
        <svg class="h-16 w-16 -rotate-90 drop-shadow-[0_8px_15px_rgba(63,55,222,0.14)]" viewBox="0 0 120 120" aria-hidden="true">
            <defs>
                <linearGradient id="timerGradient" x1="0%" x2="100%" y1="0%" y2="100%">
                    <stop offset="0%" stop-color="#866af7"></stop>
                    <stop offset="100%" stop-color="#1239ef"></stop>
                </linearGradient>
            </defs>
            <circle class="fill-none stroke-[#ded4fb] stroke-[8]" cx="60" cy="60" r="52"></circle>
            <circle class="fill-none stroke-[url(#timerGradient)] stroke-[8] [stroke-linecap:round] transition-[stroke-dashoffset] duration-300 ease-linear" data-timer-ring cx="60" cy="60" r="52"></circle>
        </svg>
    </section>

    <section class="relative flex min-h-[clamp(440px,60dvh,600px)] w-full max-w-[650px] flex-col items-center justify-center gap-[clamp(30px,4.8vh,50px)] overflow-hidden rounded-[26px] border-[3px] border-[#ded7fb] bg-white/90 px-2 pb-[clamp(42px,7.5vw,68px)] pt-[clamp(36px,6.5vw,56px)] text-center shadow-[0_24px_55px_rgba(52,38,143,0.14),inset_0_0_0_1px_rgba(255,255,255,0.9)] min-[681px]:min-h-[clamp(590px,60dvh,720px)] min-[681px]:gap-[clamp(38px,5vh,62px)] min-[681px]:rounded-[32px] min-[681px]:border-4 min-[681px]:!w-full min-[681px]:!max-w-[min(100%,900px)]" data-question-card>
        <p class="m-0 w-full text-[clamp(1.3rem,5vw,2.05rem)] font-extrabold leading-tight text-[#252d40] min-[681px]:text-[clamp(1.7rem,3.4vw,2.45rem)]">
            Topic : <span class="text-[#5f45f2]" data-topic-title></span>
        </p>
        <p class="m-0 text-balance text-[clamp(2.35rem,8.6vw,4.5rem)] font-black leading-[1.14] text-[#121a31] min-[681px]:text-[clamp(3.4rem,6.4vw,5.35rem)]" data-question-text></p>
        <div class="relative h-[54px] w-[min(82%,500px)] min-[681px]:h-[68px] min-[681px]:w-[min(82%,640px)]" aria-hidden="true">
            <span class="absolute left-0 top-1/2 h-1.5 w-[calc(50%-42px)] bg-gradient-to-r from-transparent to-[#8c7df8] min-[681px]:h-2 min-[681px]:w-[calc(50%-54px)]"></span>
            <span class="absolute right-0 top-1/2 h-1.5 w-[calc(50%-42px)] bg-gradient-to-l from-transparent to-[#8c7df8] min-[681px]:h-2 min-[681px]:w-[calc(50%-54px)]"></span>
            <span class="absolute left-1/2 top-1/2 h-[38px] w-[18px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gradient-to-b from-[#7462f6] to-[#2d36e7] min-[681px]:h-12 min-[681px]:w-[22px]"></span>
            <span class="absolute left-1/2 top-1/2 h-[38px] w-[18px] -translate-x-10 -translate-y-[43%] -rotate-[32deg] rounded-full bg-gradient-to-b from-[#7462f6] to-[#2d36e7] min-[681px]:h-12 min-[681px]:w-[22px] min-[681px]:-translate-x-14"></span>
            <span class="absolute left-1/2 top-1/2 h-[38px] w-[18px] translate-x-6 -translate-y-[43%] rotate-[32deg] rounded-full bg-gradient-to-b from-[#7462f6] to-[#2d36e7] min-[681px]:h-12 min-[681px]:w-[22px] min-[681px]:translate-x-8"></span>
        </div>
        <div class="pointer-events-none absolute -inset-[3px] z-20 grid place-items-stretch bg-[radial-gradient(circle_at_center,rgba(244,241,255,.96),rgba(222,215,251,.92)_48%,rgba(95,69,242,.2))] opacity-0 transition-opacity duration-300 min-[681px]:-inset-1" aria-hidden="true" data-transition-overlay>
            <div class="relative grid h-full w-full place-items-center overflow-hidden rounded-[26px] border-[3px] border-[#ded7fb] bg-white px-[clamp(20px,6vw,58px)] py-[clamp(26px,6vw,58px)] shadow-[0_32px_72px_rgba(52,38,143,.16)] min-[681px]:rounded-[32px] min-[681px]:border-[4px] min-[681px]:!flex min-[681px]:!flex-col min-[681px]:!items-center min-[681px]:!justify-center min-[681px]:!px-[clamp(34px,5vw,72px)] min-[681px]:!pb-[46px] min-[681px]:!pt-[42px]" data-ornate-card>
                <p class="absolute left-[clamp(20px,5vw,46px)] right-[clamp(20px,5vw,46px)] top-[clamp(24px,6vw,46px)] m-0 text-[clamp(1.35rem,4.8vw,2.35rem)] font-black leading-tight text-[#121a31] min-[681px]:!top-[38px] min-[681px]:!text-[clamp(1.9rem,3.6vw,2.65rem)]">
                    Topic : <span class="text-[#5f45f2]" data-transition-topic></span>
                </p>
                <div class="relative mt-[clamp(66px,15vw,96px)] h-[clamp(235px,58vw,355px)] w-full max-w-[680px] min-[681px]:!mt-[clamp(78px,8vw,106px)] min-[681px]:!h-[clamp(330px,41vw,470px)] min-[681px]:!max-w-[860px] min-[681px]:!flex-[0_1_auto]">
                    <svg class="absolute inset-x-[12%] top-0 h-full w-[76%] text-[#b7a8fb] opacity-80" viewBox="0 0 420 220" fill="none" aria-hidden="true" data-shuffle-arrows>
                        <path d="M125 45c48-43 110-44 156-12" stroke="currentColor" stroke-width="8" stroke-linecap="round"></path>
                        <path d="M276 10l35 28-42 6" fill="currentColor"></path>
                        <path d="M300 178c-49 42-112 44-159 10" stroke="currentColor" stroke-width="8" stroke-linecap="round"></path>
                        <path d="M146 211l-35-29 43-5" fill="currentColor"></path>
                    </svg>
                    <div class="absolute left-1/2 top-1/2 grid h-[clamp(154px,36vw,220px)] w-[clamp(114px,27vw,164px)] place-items-center rounded-[22px] border border-[#e7e0ff] bg-white/88 shadow-[0_16px_34px_rgba(95,69,242,.14)] [--card-r:-23deg] [--card-r-mid:-34deg] [--card-x:-138%] [--card-x-mid:-158%] [--card-y:-38%] [--card-y-mid:-45%]" data-shuffle-card></div>
                    <div class="absolute left-1/2 top-1/2 grid h-[clamp(172px,40vw,244px)] w-[clamp(128px,30vw,184px)] place-items-center rounded-[24px] border border-[#e7e0ff] bg-white/94 shadow-[0_18px_38px_rgba(95,69,242,.16)] [--card-r:-11deg] [--card-r-mid:-22deg] [--card-x:-78%] [--card-x-mid:-92%] [--card-y:-55%] [--card-y-mid:-66%]" data-shuffle-card></div>
                    <div class="absolute left-1/2 top-1/2 grid h-[clamp(172px,40vw,244px)] w-[clamp(128px,30vw,184px)] place-items-center rounded-[24px] border border-[#e7e0ff] bg-white/94 shadow-[0_18px_38px_rgba(95,69,242,.16)] [--card-r:11deg] [--card-r-mid:22deg] [--card-x:-6%] [--card-x-mid:8%] [--card-y:-55%] [--card-y-mid:-66%]" data-shuffle-card></div>
                    <div class="absolute left-1/2 top-1/2 grid h-[clamp(154px,36vw,220px)] w-[clamp(114px,27vw,164px)] place-items-center rounded-[22px] border border-[#e7e0ff] bg-white/88 shadow-[0_16px_34px_rgba(95,69,242,.14)] [--card-r:23deg] [--card-r-mid:34deg] [--card-x:62%] [--card-x-mid:82%] [--card-y:-38%] [--card-y-mid:-45%]" data-shuffle-card></div>
                    <div class="absolute left-1/2 top-1/2 z-[2] grid h-[clamp(150px,34vw,214px)] w-[clamp(150px,34vw,214px)] -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border-[12px] border-white bg-[linear-gradient(145deg,#8066ff,#2937e8)] text-[clamp(5.7rem,14.8vw,8.4rem)] font-black leading-none text-white shadow-[0_20px_40px_rgba(75,60,230,.32)]" data-shuffle-center data-transition-countdown>5</div>
                </div>
                <p class="m-0 mt-[clamp(10px,2.6vw,18px)] flex items-center justify-center gap-3 text-[clamp(1.45rem,5vw,2.4rem)] font-semibold leading-tight text-[#121a31]">
                    <span>Choosing your next question...</span>
                </p>
                <div class="mt-[clamp(14px,3.2vw,22px)] h-2.5 w-[min(82%,500px)] overflow-hidden rounded-full bg-[#e7e0ff]">
                    <div class="h-full w-full rounded-full bg-[#5f45f2]" data-shuffle-progress></div>
                </div>
            </div>
        </div>
    </section>

    <div class="flex w-full max-w-[650px] flex-col gap-3 min-[520px]:flex-row min-[681px]:max-w-[min(100%,900px)]">
        <button class="flex min-h-14 flex-1 items-center justify-center gap-3 rounded-full border-0 bg-gradient-to-r from-[#125cff] via-[#5a48f2] to-[#7d57f5] px-6 py-4 text-[1.1rem] font-black leading-none text-white shadow-[0_18px_38px_rgba(82,68,238,0.26)] transition active:scale-[.99] disabled:cursor-wait disabled:opacity-70" type="button" data-next-question-control>
            <span>Next Question</span>
            <svg class="h-6 w-6 stroke-[3]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14"></path>
                <path d="m13 6 6 6-6 6"></path>
            </svg>
        </button>
        <button class="flex min-h-14 flex-1 items-center justify-center gap-3 rounded-full border-2 border-[#d8cdfa] bg-white px-6 py-4 text-[1.1rem] font-black leading-none text-[#5f45f2] shadow-[0_16px_32px_rgba(52,38,143,0.1)] transition active:scale-[.99] disabled:cursor-wait disabled:opacity-70" type="button" data-next-topic-control>
            <span>Next Topic</span>
            <svg class="h-6 w-6 stroke-[3]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m17 6 4 4-4 4"></path>
                <path d="M3 10h18"></path>
                <path d="m17 14 4 4-4 4"></path>
                <path d="M3 18h18"></path>
            </svg>
        </button>
    </div>
</main>

<script>
    const appData = @json($appData);
    const questionTransitionMs = 5000;
    const radius = 52;
    const circumference = 2 * Math.PI * radius;

    const els = {
        topic: document.querySelector('[data-topic-title]'),
        time: document.querySelector('[data-time-left]'),
        ring: document.querySelector('[data-timer-ring]'),
        question: document.querySelector('[data-question-text]'),
        questionCard: document.querySelector('[data-question-card]'),
        transitionOverlay: document.querySelector('[data-transition-overlay]'),
        transitionTopic: document.querySelector('[data-transition-topic]'),
        transitionCountdown: document.querySelector('[data-transition-countdown]'),
        nextQuestionControl: document.querySelector('[data-next-question-control]'),
        nextTopicControl: document.querySelector('[data-next-topic-control]'),
    };

    function flattenTopics(topics = []) {
        return topics.flatMap((topic, topicIndex) => {
            return (topic.questions || []).map((question, questionIndex) => {
                const questionData = typeof question === 'object' && question !== null
                    ? question
                    : { title: question };

                return {
                    topicIndex,
                    questionIndex,
                    topicTitle: topic.title,
                    title: questionData.title || '',
                };
            });
        });
    }

    const defaultFlatQuestions = flattenTopics(appData.topics);
    let flatQuestions = [...defaultFlatQuestions];
    let currentQuestionIndex = 0;
    let secondsLeft = appData.turnSeconds;
    let intervalId = null;
    let transitionTimeoutId = null;
    let transitionCountdownIntervalId = null;
    let isTransitioningQuestion = false;

    els.ring.style.strokeDasharray = `${circumference}`;

    function formatTime(totalSeconds) {
        const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
        const seconds = String(totalSeconds % 60).padStart(2, '0');

        return `${minutes}:${seconds}`;
    }

    function currentQuestion() {
        if (!flatQuestions.length) {
            return {
                topicTitle: 'Practice',
                title: 'Add questions to resources/views/slider/questions.php',
            };
        }

        return flatQuestions[currentQuestionIndex % flatQuestions.length];
    }

    function render() {
        const question = currentQuestion();
        const progress = secondsLeft / appData.turnSeconds;

        els.topic.textContent = question.topicTitle;
        els.question.textContent = question.title;
        els.time.textContent = formatTime(secondsLeft);
        els.ring.style.strokeDashoffset = `${circumference * (1 - progress)}`;
        els.nextQuestionControl.disabled = isTransitioningQuestion;
        els.nextTopicControl.disabled = isTransitioningQuestion;
    }

    function startTransitionCountdown() {
        stopTransitionCountdown();
        const totalSeconds = Math.ceil(questionTransitionMs / 1000);
        let secondsRemaining = totalSeconds;
        els.transitionCountdown.textContent = secondsRemaining;
        transitionCountdownIntervalId = window.setInterval(() => {
            secondsRemaining = Math.max(secondsRemaining - 1, 1);
            els.transitionCountdown.textContent = secondsRemaining;
        }, 1000);
    }

    function stopTransitionCountdown() {
        window.clearInterval(transitionCountdownIntervalId);
        transitionCountdownIntervalId = null;
    }

    function setQuestionTransitionVisible(isVisible, topicTitle = currentQuestion().topicTitle) {
        if (isVisible) {
            els.transitionTopic.textContent = topicTitle;
            startTransitionCountdown();
            els.transitionOverlay.classList.remove('is-visible', 'opacity-0');
            els.transitionOverlay.classList.add('opacity-100');
            void els.transitionOverlay.offsetWidth;
            els.transitionOverlay.classList.add('is-visible');
            return;
        }

        els.transitionOverlay.classList.remove('is-visible', 'opacity-100');
        els.transitionOverlay.classList.add('opacity-0');
        stopTransitionCountdown();
    }

    function revealQuestionCard() {
        els.questionCard.classList.remove('is-revealing');
        void els.questionCard.offsetWidth;
        els.questionCard.classList.add('is-revealing');
        window.setTimeout(() => {
            els.questionCard.classList.remove('is-revealing');
        }, 520);
    }

    function advanceQuestionWithTransition() {
        if (isTransitioningQuestion || !flatQuestions.length) {
            return;
        }

        const nextQuestionIndex = (currentQuestionIndex + 1) % flatQuestions.length;
        const nextQuestion = flatQuestions[nextQuestionIndex];

        isTransitioningQuestion = true;
        render();
        setQuestionTransitionVisible(true, nextQuestion.topicTitle);
        transitionTimeoutId = window.setTimeout(() => {
            currentQuestionIndex = nextQuestionIndex;
            secondsLeft = appData.turnSeconds;
            render();
            revealQuestionCard();
            setQuestionTransitionVisible(false);
            isTransitioningQuestion = false;
            render();
        }, questionTransitionMs);
    }

    function firstQuestionIndexForNextTopic() {
        if (!flatQuestions.length) {
            return 0;
        }

        const currentTopicIndex = currentQuestion().topicIndex;
        const nextTopicQuestion = flatQuestions.find((question) => question.topicIndex > currentTopicIndex);

        if (nextTopicQuestion) {
            return flatQuestions.indexOf(nextTopicQuestion);
        }

        const firstTopicQuestion = flatQuestions.find((question) => question.topicIndex >= 0);

        return firstTopicQuestion ? flatQuestions.indexOf(firstTopicQuestion) : 0;
    }

    function advanceToNextTopicImmediately() {
        if (isTransitioningQuestion || !flatQuestions.length) {
            return;
        }

        currentQuestionIndex = firstQuestionIndexForNextTopic();
        secondsLeft = appData.turnSeconds;
        render();
        revealQuestionCard();
    }

    function startTimer() {
        window.clearInterval(intervalId);
        window.clearTimeout(transitionTimeoutId);
        stopTransitionCountdown();
        intervalId = window.setInterval(() => {
            if (isTransitioningQuestion) {
                return;
            }

            secondsLeft -= 1;

            if (secondsLeft <= 0) {
                secondsLeft = 0;
                render();
                advanceQuestionWithTransition();
                return;
            }

            render();
        }, 1000);
    }

    els.nextQuestionControl.addEventListener('click', advanceQuestionWithTransition);
    els.nextTopicControl.addEventListener('click', advanceToNextTopicImmediately);
    window.addEventListener('resize', render);

    render();
    revealQuestionCard();
    startTimer();
</script>
</body>
</html>
