<?php
$content = [
    'title' => 'Practice 4',
    'subtitle' => 'Complete each sentence.',
];

$questions = [
    ['text' => "I {{am}} learning English.", 'options' => ['am', 'is', 'are', 'was']],
    ['text' => "You {{are}} reading.", 'options' => ['am', 'is', 'are', 'was']],
    ['text' => "He {{is}} looking.", 'options' => ['am', 'is', 'are', 'was']],
    ['text' => "She {{is}} listening.", 'options' => ['am', 'is', 'are', 'was']],
    ['text' => "We {{are}} drinking tea.", 'options' => ['am', 'is', 'are', 'was']],
    ['text' => "They {{are}} making dinner.", 'options' => ['am', 'is', 'are', 'was']],

    ['text' => "{{Are}} you listening to me?", 'options' => ['Am', 'Is', 'Are', 'Do']],
    ['text' => "{{Is}} she coming with you?", 'options' => ['Am', 'Is', 'Are', 'Does']],
    ['text' => "{{Am}} I helping?", 'options' => ['Am', 'Is', 'Are', 'Do']],
    ['text' => "{{Are}} they eating with us?", 'options' => ['Am', 'Is', 'Are', 'Do']],

    ['text' => "What {{are}} you doing?<br>I {{am}} looking for my keys.", 'options' => ['are', 'am', 'is', 'do']],
    ['text' => "Where are they {{going}}?<br>They {{are}} going to work.", 'options' => ['go', 'going', 'are', 'is']],
    ['text' => "Where {{are}} you taking me?<br>I {{am}} taking you to the cinema.", 'options' => ['are', 'am', 'is', 'take']],
    ['text' => "What is she {{doing}}?<br>She {{is}} making a cake.", 'options' => ['do', 'doing', 'is', 'are']],
    ['text' => "What are they {{doing}}?<br>They {{are}} drinking coffee.", 'options' => ['doing', 'done', 'are', 'is']],
    ['text' => "What are you {{doing}}?<br>We {{are}} {{watching}} a film.", 'options' => ['doing', 'are', 'watching', 'watch']],
    ['text' => "Where {{are}} {{you}} {{going}}?<br>I am going to the park.", 'options' => ['are', 'is', 'you', 'going', 'go']],
    ['text' => "What {{is}} {{he}} {{doing}}?<br>He is writing an e-mail.", 'options' => ['is', 'are', 'he', 'doing', 'does']],
    ['text' => "What is she doing?<br>She {{is}} {{reading}} a newspaper.", 'options' => ['reading', 'read', 'is', 'are']],
    ['text' => "Where are {{we}} going?<br>We {{are}} {{going}} to school.", 'options' => ['we', 'us', 'are', 'going', 'go']],
];

$parsedQuestions = [];

foreach ($questions as $q) {
    preg_match_all('/\{\{(.*?)\}\}/', $q['text'], $matches);

    $blankIndex = 0;
    $htmlText = preg_replace_callback('/\{\{(.*?)\}\}/', function ($match) use (&$blankIndex) {
        $answer = htmlspecialchars($match[1], ENT_QUOTES, 'UTF-8');
        $blankIndex++;

        return '<span class="blank-drop-zone" data-answer="' . $answer . '" data-blank-index="' . $blankIndex . '" role="button" tabindex="0" aria-label="Drop answer here"></span>';
    }, $q['text']);

    $opts = array_values(array_unique($q['options']));
    shuffle($opts);

    $parsedQuestions[] = [
        'html' => $htmlText,
        'correctionText' => $q['text'], 
        'answers' => $matches[1],
        'answersCount' => count($matches[1]),  
        'options' => $opts,
    ];
}
?>

@extends('slider.simple-layout')

@section('title', $content['title'])

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

    body.dd-drag-active,
    body.dd-drag-active * {
        cursor: grabbing !important;
        user-select: none;
        -webkit-user-select: none;
        -webkit-touch-callout: none;
    }

    .header-spacing {
        margin-top: .25rem !important;
        margin-bottom: .25rem !important;
        gap: .45rem !important;
    }

    .header-spacing h1 {
        margin-bottom: .25rem !important;
    }

    #gameStatus {
        margin-bottom: .5rem !important;
    }

    .question-shell {
        width: 100%;
        max-width: 50rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 18px;
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
        justify-content: center;
        gap: 8px 10px;
        min-width: 0;
        font-weight: 700;
        line-height: 1.55;
        letter-spacing: -0.01em;
    }

    .sentence-text {
        color: #0f172a;
    }

    .dark .sentence-text {
        color: #f8fafc;
    }

    .helper-note {
        border-radius: 14px;
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

    .dropdown-btn-neutral {
        color: #fff;
        border-color: rgba(255,255,255,.12);
        background: linear-gradient(135deg, #57534e, #3f3f46, #0f172a);
        box-shadow: 0 12px 28px rgba(2,6,23,.24);
    }

    .dropdown-btn-neutral:hover {
        background: linear-gradient(135deg, #44403c, #27272a, #020617);
        box-shadow: 0 14px 30px rgba(2,6,23,.28);
    }

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

    .dark .dropdown-btn-neutral {
        color: rgb(248 250 252);
        border-color: rgba(255,255,255,.12);
        background: linear-gradient(135deg, #57534e, #3f3f46, #0f172a);
        box-shadow: 0 12px 26px rgba(0,0,0,.35);
    }

    .dark .dropdown-btn-neutral:hover {
        background: linear-gradient(135deg, #44403c, #27272a, #020617);
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

    .blank-drop-zone {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 8rem;
        min-height: 2.75rem;
        margin: 0 .35rem;
        border-radius: .85rem;
        border: 1px dashed rgba(148, 163, 184, .92);
        background: rgba(255, 255, 255, .95);
        box-shadow: 0 8px 22px rgba(2,6,23,.05);
        vertical-align: middle;
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease, background .2s ease;
    }

    .blank-drop-zone::after {
        content: "";
        width: 2rem;
        height: .25rem;
        border-radius: 999px;
        background: rgba(148, 163, 184, .45);
    }

    .blank-drop-zone.is-hovered,
    .blank-drop-zone.is-selected {
        border-color: rgba(99, 102, 241, .55);
        background: rgba(238, 242, 255, .86);
        box-shadow: 0 10px 24px rgba(79,70,229,.10);
        transform: scale(1.02);
    }

    .blank-drop-zone.is-correct {
        border-style: solid;
        border-color: rgba(110, 231, 183, .7);
        background: rgba(209, 250, 229, .7);
        box-shadow: 0 10px 24px rgba(16,185,129,.12);
    }

    .blank-drop-zone.is-correct::after {
        display: none;
    }

    .blank-drop-zone.is-wrong {
        border-style: solid;
        border-color: rgba(253, 164, 175, .8);
        background: rgba(255, 228, 230, .75);
    }

    .dark .blank-drop-zone {
        border-color: rgba(71, 85, 105, .82);
        background: rgba(15, 23, 42, .55);
        box-shadow: 0 10px 24px rgba(0,0,0,.18);
    }

    .dark .blank-drop-zone::after {
        background: rgba(148, 163, 184, .48);
    }

    .dark .blank-drop-zone.is-hovered,
    .dark .blank-drop-zone.is-selected {
        border-color: rgba(129, 140, 248, .58);
        background: rgba(79, 70, 229, .16);
    }

    .dark .blank-drop-zone.is-correct {
        border-color: rgba(110, 231, 183, .45);
        background: rgba(16, 185, 129, .12);
    }

    .dark .blank-drop-zone.is-wrong {
        border-color: rgba(251, 113, 133, .48);
        background: rgba(244, 63, 94, .13);
    }

    .locked-answer {
        display: inline-flex;
        min-width: 6.75rem;
        align-items: center;
        justify-content: center;
        border-radius: .7rem;
        background: rgba(209, 250, 229, .95);
        padding: .56rem .85rem;
        color: rgb(6, 95, 70);
        font-size: .95rem;
        font-weight: 900;
        line-height: 1;
        box-shadow: inset 0 0 0 1px rgba(110, 231, 183, .7);
    }

    .dark .locked-answer {
        background: rgba(16, 185, 129, .14);
        color: rgb(209, 250, 229);
        box-shadow: inset 0 0 0 1px rgba(110, 231, 183, .35);
    }

    .word-pool {
        max-width: 42rem;
        margin-left: auto;
        margin-right: auto;
        border-radius: 14px;
        border: 1px solid rgba(226, 232, 240, 0.85);
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(8px);
    }

    .dark .word-pool {
        border-color: rgba(71, 85, 105, 0.7);
        background: rgba(15, 23, 42, 0.45);
    }

    .word-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 4.85rem;
        border-radius: .8rem;
        border: 1px solid rgba(226, 232, 240, .92);
        background: rgba(255,255,255,.95);
        padding: .58rem .82rem;
        color: rgb(15 23 42);
        font-size: .95rem;
        font-weight: 900;
        box-shadow: 0 8px 22px rgba(2,6,23,.05);
        cursor: grab;
        touch-action: none;
        transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, border-color .2s ease;
        user-select: none;
        -webkit-user-select: none;
    }

    .word-chip:hover,
    .word-chip.is-selected {
        transform: scale(1.05);
        background: rgb(248 250 252);
        border-color: rgba(148, 163, 184, .8);
    }

    .word-chip.is-used {
        opacity: .35;
        pointer-events: none;
        filter: grayscale(.25);
        transform: none;
    }

    .word-chip.is-ghost {
        opacity: .25;
    }

    .word-chip.is-wrong {
        border-color: rgba(253, 164, 175, .8);
        background: rgba(255, 228, 230, .75);
        color: rgb(159, 18, 57);
    }

    .dragging-chip {
        position: fixed;
        z-index: 9999;
        pointer-events: none;
        cursor: grabbing;
        transform: scale(1.04);
        box-shadow: 0 18px 38px rgba(2,6,23,.16);
    }

    .dark .word-chip {
        color: #fff;
        border-color: rgb(51 65 85);
        background: rgb(30 41 59);
        box-shadow: 0 10px 24px rgba(0,0,0,.22);
    }

    .dark .word-chip:hover,
    .dark .word-chip.is-selected {
        background: rgb(51 65 85);
        border-color: rgba(148, 163, 184, .55);
    }

    .dark .word-chip.is-wrong {
        border-color: rgba(251, 113, 133, .48);
        background: rgba(244, 63, 94, .13);
        color: rgb(254, 205, 211);
    }

    .question-item {
        display: none;
    }

    .question-item.is-active {
        display: block;
    }

    .correction-answer {
        display: inline-flex;
        border-radius: .75rem;
        background: rgba(209, 250, 229, .85);
        color: rgb(6, 95, 70);
        padding: .18rem .55rem;
        box-shadow: inset 0 0 0 1px rgba(110, 231, 183, .7);
    }

    .correction-answer.is-revealed {
        background: rgba(255, 228, 230, .8);
        color: rgb(136, 19, 55);
        box-shadow: inset 0 0 0 1px rgba(253, 164, 175, .8);
    }

    .dark .correction-answer {
        background: rgba(16, 185, 129, .12);
        color: rgb(209, 250, 229);
        box-shadow: inset 0 0 0 1px rgba(110, 231, 183, .35);
    }

    .dark .correction-answer.is-revealed {
        background: rgba(244, 63, 94, .13);
        color: rgb(254, 205, 211);
        box-shadow: inset 0 0 0 1px rgba(251, 113, 133, .35);
    }

    @media (max-width: 640px) {
        .sentence-flow {
            justify-content: center;
            gap: 7px 8px;
            line-height: 1.5;
        }

        .blank-drop-zone {
            min-width: 6.4rem;
            min-height: 2.55rem;
            margin: 0 .25rem;
        }

        .locked-answer {
            min-width: 5.5rem;
        }

        .word-chip {
            min-width: 4.2rem;
            padding: .5rem .7rem;
            font-size: .88rem;
        }
    }
</style>
@endsection

@section('content')
<div class="font-sans relative isolate min-h-[100dvh] overflow-x-hidden overflow-y-auto dark:text-slate-100">
    <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-3 sm:px-6 sm:py-5">
        <section class="flex w-full justify-center p-1 sm:p-3">
            <div class="flex w-full flex-col items-center justify-center gap-3 text-center sm:gap-4">
                @include('slider.components.title-subtitle')
                @include('slider.components.game-status')

                <section id="gameCard" class="relative w-full max-w-5xl p-2 sm:p-3">
                    <div id="questionPanel" class="h-full overflow-hidden rounded-2xl border border-slate-200/70 dark:border-slate-800 bg-white/60 dark:bg-slate-900/60 backdrop-blur-xl shadow-xl">
                        <div class="h-full p-3 sm:p-4 text-center">
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

                            <div id="qPrompt" class="my-2 sm:my-3">
                                @foreach($parsedQuestions as $index => $q)
                                    <div
                                        class="question-item {{ $index === 0 ? 'is-active' : '' }}"
                                        data-question-index="{{ $index }}"
                                        data-blanks-count="{{ $q['answersCount'] }}"
                                        data-correction-text="{{ e($q['correctionText']) }}"
                                    >
                                        <div class="question-shell p-3 sm:p-4">
                                            <div class="sentence-flow text-base sm:text-lg lg:text-xl justify-center">
                                                <span class="sentence-text">{!! $q['html'] !!}</span>
                                            </div>
                                        </div>

                                        <div class="word-pool mt-3 px-2.5 py-2.5 sm:px-3">
                                            <div class="flex flex-wrap justify-center gap-2">
                                                @foreach($q['options'] as $opt)
                                                    <button
                                                        type="button"
                                                        class="word-chip"
                                                        data-word="{{ $opt }}"
                                                        aria-label="Answer {{ $opt }}"
                                                    >
                                                        {{ $opt }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="helper-note mt-3 flex items-center gap-2 px-2.5 py-2 text-xs sm:text-sm font-medium text-slate-600 dark:text-slate-300">
                                <span class="text-base">👇</span>
                                <span>Drag the correct answer into each blank.</span>
                            </div>

                            <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <button
                                    id="btnResetInline"
                                    class="dropdown-btn-secondary py-2.5"
                                >
                                    Restart 🔁
                                </button>

                                <button
                                    id="btnAutoCheck"
                                    class="dropdown-btn-warning py-2.5"
                                >
                                    Hint ✨ (<span id="autoCheckBadge">2</span>)
                                </button>

                                <button
                                    id="btnPrev"
                                    class="dropdown-btn-secondary py-2.5"
                                >
                                    Previous
                                </button>

                                <button
                                    id="btnNext"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg px-3 py-2.5 text-xs font-black text-white transition duration-200 ease-out hover:scale-105 active:scale-95 sm:px-4 sm:text-sm {{ $theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500' }}"
                                >
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>

                    @include('slider.components.game-win-modal-correction')
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
        const GAME_TITLE = @json($content['title']);
        const TOTAL = {{ count($parsedQuestions) }};

        const questionPanel = document.getElementById("questionPanel");
        const questions = Array.from(document.querySelectorAll(".question-item"));
        const progressCount = document.getElementById("tilesCount");
        const correctCount = document.getElementById("correctCount");
        const mistakesCount = document.getElementById("mistakesCount");
        const timer = document.getElementById("gameTimer");
        const finalCorrect = document.getElementById("finalCorrect");
        const finalMistakes = document.getElementById("finalMistakes");
        const finalTime = document.getElementById("finalTime");
        const finalCorrection = document.getElementById("finalCorrection");
        const resultsCorrectionCard = document.getElementById("resultsCorrectionCard");
        const winModal = document.getElementById("winModal");
        const toastOne = document.getElementById("toastOne");
        const toastIcon = document.getElementById("toastIcon");
        const toastText = document.getElementById("toastText");

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
        let autoChecksLeft = 2;
        let startTime = Date.now();
        let timerInt = null;
        let toastT = null;
        let selectedChip = null;

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
            if (!toastIcon || !toastText || !toastOne) return;

            toastIcon.textContent = icon;
            toastText.textContent = text;

            if (window.gsap) {
                if (toastT) toastT.kill();

                gsap.set(toastOne, { opacity: 0, y: 8 });
                toastT = gsap.timeline()
                    .to(toastOne, { opacity: 1, y: 0, duration: 0.3 })
                    .to(toastOne, { opacity: 0, y: -10, duration: 0.3 }, "+=1");
                return;
            }

            toastOne.classList.remove("opacity-0");
            clearTimeout(toastT);
            toastT = setTimeout(() => toastOne.classList.add("opacity-0"), 1200);
        }

        function getProgressCount() {
            const progressedQuestions = new Set([...completedQuestions, ...revealedQuestions]);
            return Math.min(progressedQuestions.size, TOTAL);
        }

        function updateUI() {
            if (progressCount) progressCount.textContent = `${getProgressCount()}/${TOTAL}`;
            if (correctCount) correctCount.textContent = String(firstTryCorrect);
            if (mistakesCount) mistakesCount.textContent = String(wrongTries);
            if (autoCheckBadge) autoCheckBadge.textContent = String(autoChecksLeft);
            setNavDisabledState(btnPrev, findPreviousUnansweredIndex(idx) < 0);
            setNavDisabledState(btnNext, findNextUnansweredIndex(idx) < 0);
            setNavDisabledState(btnAutoCheck, autoChecksLeft <= 0 || completedQuestions.has(idx) || revealedQuestions.has(idx));
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
                if (!completedQuestions.has(i) && !revealedQuestions.has(i)) return i;
            }

            for (let i = TOTAL - 1; i > fromIndex; i--) {
                if (!completedQuestions.has(i) && !revealedQuestions.has(i)) return i;
            }

            return -1;
        }

        function findNextUnansweredIndex(fromIndex) {
            for (let i = fromIndex + 1; i < TOTAL; i++) {
                if (!completedQuestions.has(i) && !revealedQuestions.has(i)) return i;
            }

            for (let i = 0; i < fromIndex; i++) {
                if (!completedQuestions.has(i) && !revealedQuestions.has(i)) return i;
            }

            return -1;
        }

        function activeQuestion() {
            return questions[idx] || null;
        }

        function showQuestion(targetIndex) {
            if (targetIndex < 0 || targetIndex >= TOTAL) return;

            questions.forEach((question, questionIndex) => {
                question.classList.toggle("is-active", questionIndex === targetIndex);
            });

            idx = targetIndex;
            selectedChip = null;
            clearZoneHighlights();
            document.querySelectorAll(".word-chip.is-selected").forEach(chip => chip.classList.remove("is-selected"));
            updateUI();
        }

        function clearStateForRestart() {
            questions.forEach((question) => {
                question.querySelectorAll(".blank-drop-zone").forEach((zone) => {
                    zone.innerHTML = "";
                    zone.classList.remove("is-correct", "is-wrong", "is-hovered", "is-selected");
                });

                question.querySelectorAll(".word-chip").forEach((chip) => {
                    chip.disabled = false;
                    chip.classList.remove("is-used", "is-selected", "is-wrong", "is-ghost");
                });
            });
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
            autoChecksLeft = 2;
            selectedChip = null;
            startTime = Date.now();
            clearStateForRestart();
            showQuestion(0);
            startTimer();
            updateUI();
            showToast("Reset!", "🔁");
        }

        function isQuestionComplete(questionIndex) {
            const question = questions[questionIndex];
            if (!question) return false;

            const totalBlanks = Number(question.dataset.blanksCount || 0);
            return totalBlanks > 0 && question.querySelectorAll(".blank-drop-zone.is-correct").length >= totalBlanks;
        }

        function markQuestionCompleteIfReady() {
            if (!isQuestionComplete(idx)) return;

            completedQuestions.add(idx);
            if (!wrongedQuestions.has(idx) && !revealedQuestions.has(idx)) firstTryCorrect++;

            play(audio.correct);
            showToast("Nice!", "✅");
            questionPanel.classList.add("solved-board");
            updateUI();

            setTimeout(() => {
                questionPanel.classList.remove("solved-board");
                const nextUnanswered = findNextUnansweredIndex(idx);
                if (nextUnanswered >= 0) {
                    showQuestion(nextUnanswered);
                } else {
                    finish();
                }
            }, 900);
        }

        function getDropTarget(x, y) {
            const clone = document.querySelector(".dragging-chip");
            if (clone) clone.hidden = true;

            const element = document.elementFromPoint(x, y);
            if (clone) clone.hidden = false;

            const zone = element?.closest?.(".blank-drop-zone");
            if (!zone || zone.classList.contains("is-correct")) return null;
            if (!activeQuestion() || zone.closest(".question-item") !== activeQuestion()) return null;

            return zone;
        }

        function clearZoneHighlights(className = null) {
            if (className) {
                document.querySelectorAll(`.blank-drop-zone.${className}`).forEach(zone => zone.classList.remove(className));
                return;
            }

            document.querySelectorAll(".blank-drop-zone.is-hovered, .blank-drop-zone.is-selected").forEach(zone => {
                zone.classList.remove("is-hovered", "is-selected");
            });
        }

        function highlightDropTarget(x, y) {
            clearZoneHighlights("is-hovered");
            getDropTarget(x, y)?.classList.add("is-hovered");
        }

        function selectChip(chip) {
            if (!activeQuestion() || chip.closest(".question-item") !== activeQuestion()) return;

            selectedChip?.classList.remove("is-selected");
            clearZoneHighlights();

            selectedChip = chip;
            chip.classList.add("is-selected");

            activeQuestion().querySelectorAll(".blank-drop-zone:not(.is-correct)").forEach(zone => {
                zone.classList.add("is-selected");
            });
        }

        function lockAnswer(zone, chip, word) {
            const answer = document.createElement("span");
            answer.className = "locked-answer";
            answer.textContent = word;

            zone.innerHTML = "";
            zone.appendChild(answer);
            zone.classList.add("is-correct");
            zone.classList.remove("is-wrong");

            chip.classList.add("is-used");
            chip.disabled = true;

            markQuestionCompleteIfReady();
            updateUI();
        }

        function handleWrongDrop(zone, chip) {
            wrongTries++;
            wrongedQuestions.add(idx);
            updateUI();

            zone.classList.add("is-wrong");
            chip.classList.add("is-wrong");
            questionPanel.classList.remove("shake-card");
            void questionPanel.offsetWidth;
            questionPanel.classList.add("shake-card");

            play(audio.wrong);
            showToast("Try again 🙂", "❌");

            setTimeout(() => {
                zone.classList.remove("is-wrong");
                chip.classList.remove("is-wrong");
                questionPanel.classList.remove("shake-card");
            }, 650);
        }

        function validateDrop(zone, chip) {
            if (!zone || !chip || zone.classList.contains("is-correct")) return;
            if (!activeQuestion() || zone.closest(".question-item") !== activeQuestion() || chip.closest(".question-item") !== activeQuestion()) return;

            const chosen = chip.dataset.word || "";
            const answer = zone.dataset.answer || "";

            selectedChip?.classList.remove("is-selected");
            selectedChip = null;
            clearZoneHighlights();

            if (chosen.toLowerCase() === answer.toLowerCase()) {
                lockAnswer(zone, chip, chosen);
                return;
            }

            handleWrongDrop(zone, chip);
        }

        function handlePointerDown(event, chip) {
            if (chip.disabled || chip.classList.contains("is-used")) return;

            event.preventDefault();

            const startX = event.clientX;
            const startY = event.clientY;
            const rect = chip.getBoundingClientRect();
            let didDrag = false;
            let clone = null;

            const moveClone = (moveEvent) => {
                if (!clone) return;

                clone.style.left = `${moveEvent.clientX - rect.width / 2}px`;
                clone.style.top = `${moveEvent.clientY - rect.height / 2}px`;
                highlightDropTarget(moveEvent.clientX, moveEvent.clientY);
            };

            const onMove = (moveEvent) => {
                moveEvent.preventDefault();

                const distance = Math.hypot(moveEvent.clientX - startX, moveEvent.clientY - startY);
                if (!didDrag && distance > 4) {
                    didDrag = true;
                    document.body.classList.add("dd-drag-active");
                    chip.classList.add("is-ghost");

                    clone = chip.cloneNode(true);
                    clone.classList.add("dragging-chip");
                    clone.classList.remove("is-selected", "is-wrong");
                    clone.style.width = `${rect.width}px`;
                    clone.style.height = `${rect.height}px`;
                    document.body.appendChild(clone);
                }

                moveClone(moveEvent);
            };

            const onUp = (upEvent) => {
                document.removeEventListener("pointermove", onMove);
                document.removeEventListener("pointerup", onUp);
                document.body.classList.remove("dd-drag-active");
                chip.classList.remove("is-ghost");

                const zone = didDrag ? getDropTarget(upEvent.clientX, upEvent.clientY) : null;
                clone?.remove();
                clearZoneHighlights();

                if (zone) {
                    validateDrop(zone, chip);
                    return;
                }

                if (!didDrag) {
                    selectChip(chip);
                }
            };

            document.addEventListener("pointermove", onMove, { passive: false });
            document.addEventListener("pointerup", onUp, { passive: false });
        }

        function revealOneCorrectAnswer() {
            if (autoChecksLeft <= 0 || completedQuestions.has(idx) || revealedQuestions.has(idx)) {
                showToast("No auto checks left", "⚠️");
                return;
            }

            const question = activeQuestion();
            if (!question) return;

            const zone = question.querySelector(".blank-drop-zone:not(.is-correct)");
            if (!zone) {
                showToast("Everything is already correct", "✅");
                return;
            }

            const answer = zone.dataset.answer || "";
            const chip = Array.from(question.querySelectorAll(".word-chip:not(.is-used)")).find(item => {
                return (item.dataset.word || "").toLowerCase() === answer.toLowerCase();
            });

            if (!chip) return;

            autoChecksLeft--;
            wrongTries++;
            wrongedQuestions.add(idx);
            lockAnswer(zone, chip, chip.dataset.word || answer);
            showToast("One answer filled", "✨");
        }

        function showOverlay() {
            if (winModal) winModal.classList.remove("hidden");
            if (resultsCorrectionCard) resultsCorrectionCard.classList.remove("hidden");
            document.documentElement.classList.add("overflow-hidden");
        }

        function escapeHTML(value) {
            return String(value ?? "")
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function renderCorrectionText(text, isRevealed) {
            const answerClass = isRevealed
                ? "correction-answer is-revealed"
                : "correction-answer";

            return String(text ?? "")
                .split(/(<br\s*\/?>|\{\{.*?\}\})/i)
                .map((part) => {
                    if (/^<br\s*\/?>$/i.test(part)) {
                        return "<br>";
                    }

                    const answerMatch = part.match(/^\{\{(.*?)\}\}$/);
                    if (answerMatch) {
                        return `<span class="${answerClass}">${escapeHTML(answerMatch[1])}</span>`;
                    }

                    return escapeHTML(part);
                })
                .join("");
        }

        function buildCorrectionHTML(question, isRevealed) {
            return renderCorrectionText(question?.dataset.correctionText || "", isRevealed);
        }

        function buildAllCorrectionsHTML() {
            return questions.map((question, questionIndex) => {
                const sentence = buildCorrectionHTML(question, revealedQuestions.has(questionIndex));
                return `
                    <div>
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
            if (finalCorrect) finalCorrect.textContent = `${firstTryCorrect}/${TOTAL}`;
            if (finalMistakes) finalMistakes.textContent = String(wrongTries);
            if (finalTime) finalTime.textContent = timer ? timer.textContent : "00:00";
            if (finalCorrection) finalCorrection.innerHTML = buildAllCorrectionsHTML();

            showOverlay();
            play(audio.success);
            showToast(`${GAME_TITLE} complete!`, "🏁");
        }

        function revealCorrection() {
            if (TOTAL === 0) return;

            let newlyRevealed = 0;
            for (let i = 0; i < TOTAL; i++) {
                if (!completedQuestions.has(i)) {
                    if (!revealedQuestions.has(i)) newlyRevealed++;
                    revealedQuestions.add(i);
                }
            }

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

        questions.forEach((question) => {
            question.querySelectorAll(".word-chip").forEach((chip) => {
                chip.addEventListener("pointerdown", (event) => handlePointerDown(event, chip));
            });

            question.querySelectorAll(".blank-drop-zone").forEach((zone) => {
                zone.addEventListener("click", () => {
                    if (selectedChip) validateDrop(zone, selectedChip);
                });
                zone.addEventListener("keydown", (event) => {
                    if ((event.key === "Enter" || event.key === " ") && selectedChip) {
                        event.preventDefault();
                        validateDrop(zone, selectedChip);
                    }
                });
            });
        });

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
            const target = findPreviousUnansweredIndex(idx);
            if (target < 0) return;
            showQuestion(target);
        });
        btnNext?.addEventListener("click", () => {
            const target = findNextUnansweredIndex(idx);
            if (target < 0) return;
            showQuestion(target);
        });

        showQuestion(0);
        updateUI();
        startTimer();
        showToast("Ready!", "✨");
    })();
</script>
@endsection
