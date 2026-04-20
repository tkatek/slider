<?php
$content = [
    'page_title' => 'Writing',
    'title'      => 'Writing',
    'subtitle'   => 'Choose the correct verb',

    'word_box' => [
        'waiting',
        'raining',
        'sleeping',
        'singing',
        'playing',
        'drinking',
    ],

    'questions' => [
        [
            'prompt'  => 'The birds are ________. They sound happy.',
            'correct' => 'singing',
        ],
        [
            'prompt'  => "The dog is ________. Don't disturb him!",
            'correct' => 'sleeping',
        ],
        [
            'prompt'  => 'The cat is ________ milk.',
            'correct' => 'drinking',
        ],
        [
            'prompt'  => 'The children are ________ football.',
            'correct' => 'playing',
        ],
        [
            'prompt'  => 'It is ________. Take an umbrella if you go out!',
            'correct' => 'raining',
        ],
        [
            'prompt'  => 'We are ________ for a bus. It is due in five minutes.',
            'correct' => 'waiting',
        ],
    ],
];

$parsedQuestions = [];
foreach ($content['questions'] as $idx => $q) {
    $inputHtml = '<input type="text" id="input_'.$idx.'" class="typing-blank drop-shadow-sm transition-all" data-answer="'.strtolower($q['correct']).'" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="type here..." onkeypress="handleEnter(event, '.$idx.')" />';

    $html = str_replace('________', $inputHtml, $q['prompt']);

    $parsedQuestions[] = [
        'html' => $html,
        'correct' => strtolower($q['correct'])
    ];
}
?>
@extends('slider.simple-layout')

@section('title', $content['title'])

@section('style')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05);
        backdrop-filter: blur(20px);
    }
    .dark .glass-card {
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
    }

    .typing-blank {
        display: inline-block;
        width: 160px;
        border: none;
        border-bottom: 3px solid #64748b;
        background: rgba(241, 245, 249, 0.6);
        border-radius: 12px 12px 0 0;
        padding: 6px 12px;
        margin: 0 6px;
        text-align: center;
        font-weight: 800;
        font-size: 1.5rem;
        color: #4f46e5;
        transition: all 0.3s ease;
        line-height: normal;
        vertical-align: middle;
    }
    .dark .typing-blank {
        background: rgba(30, 41, 59, 0.6);
        border-bottom-color: #475569;
        color: #818cf8;
    }
    .typing-blank::placeholder {
        color: #cbd5e1;
        font-size: 1rem;
        font-weight: 600;
    }
    .dark .typing-blank::placeholder {
        color: #475569;
    }
    .typing-blank:focus {
        outline: none;
        border-bottom-color: #4f46e5;
        background: rgba(99, 102, 241, 0.1);
        transform: scale(1.05) translateY(-2px);
    }

    .typing-blank.is-correct {
        border-bottom-color: #22c55e;
        color: #16a34a;
        background: rgba(34, 197, 94, 0.15);
    }
    .dark .typing-blank.is-correct {
        color: #4ade80;
    }

    .typing-blank.is-wrong {
        border-bottom-color: #ef4444;
        color: #dc2626;
        background: rgba(239, 68, 68, 0.1);
        animation: shake 0.4s ease-in-out;
    }
    .dark .typing-blank.is-wrong {
        color: #f87171;
    }

    .word-badge.crossed-out {
        opacity: 0.4;
        text-decoration: line-through;
        filter: grayscale(1);
        transform: scale(0.95);
        pointer-events: none;
        box-shadow: none !important;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-4px); }
        40% { transform: translateX(4px); }
        60% { transform: translateX(-4px); }
        80% { transform: translateX(4px); }
    }
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(40px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .question-slide-anim {
        animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endsection

@section('content')
<div class="min-h-[100dvh] w-full flex flex-col items-center py-6 sm:py-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-50/40 via-white to-blue-50/30 dark:from-slate-900 dark:via-slate-900 dark:to-indigo-950">
    <div class="w-full max-w-5xl px-4 sm:px-6">

        <!-- Header Section & Score Tracker -->
        <header class="w-full flex flex-col items-center justify-center mb-4 sm:mb-8 lg:mb-10 text-center">
            <h1 class="text-2xl sm:text-5xl md:text-6xl font-black tracking-tight bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent drop-shadow-sm">
                {{ $content['title'] ?? 'Writing' }}
            </h1>
            <h2 class="mt-1 sm:mt-2 text-sm sm:text-xl md:text-2xl font-bold text-black dark:text-white">
                {{ $content['subtitle'] ?? 'Choose the correct verb' }}
            </h2>

            <div class="relative flex flex-wrap items-center justify-around gap-2 sm:gap-6 md:gap-10 mt-3 sm:mt-6 rounded-2xl sm:rounded-[2rem] bg-white px-3 sm:px-8 md:px-12 py-2 sm:py-5 shadow-[0_4px_20px_-8px_rgba(0,0,0,0.1)] border border-slate-200/60 w-full max-w-3xl mx-auto dark:bg-slate-800/90 dark:border-slate-700/50">
                <button onclick="resetQuiz()" class="absolute -top-3 -right-3 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-white dark:bg-slate-800 text-slate-500 hover:text-rose-500 dark:hover:text-rose-400 border border-slate-200 dark:border-slate-600 shadow-lg rounded-full transition-all hover:scale-110 active:scale-95 z-10" title="Reset Practice">
                    <i class="fa-solid fa-rotate-right text-lg"></i>
                </button>
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">📝</span>
                    <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Items</span>
                    <span class="text-xs sm:text-lg font-black text-slate-800 dark:text-slate-200 leading-tight mt-0.5 sm:mt-1">{{ count($parsedQuestions) }}</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">✅</span>
                    <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Correct</span>
                    <span class="text-xs sm:text-lg font-black text-emerald-600 dark:text-emerald-400 leading-tight mt-0.5 sm:mt-1" id="scoreText">0</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">❌</span>
                    <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Mistakes</span>
                    <span class="text-xs sm:text-lg font-black text-rose-600 dark:text-rose-400 leading-tight mt-0.5 sm:mt-1" id="mistakesText">0</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">⏱️</span>
                    <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 leading-none">Time</span>
                    <span class="text-xs sm:text-lg font-black text-indigo-600 dark:text-indigo-400 leading-tight mt-0.5 sm:mt-1" id="timeText">00:00</span>
                </div>
            </div>
        </header>

        <!-- Word Bank Box -->
        <div class="w-full max-w-3xl mx-auto mb-6 transition-all" id="wordBank">
            <div class="p-5 sm:p-6 bg-white/70 dark:bg-slate-800/70 rounded-3xl shadow-sm border border-white/60 dark:border-slate-600/50 backdrop-blur-md text-center">
                <h3 class="text-xs sm:text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-4">Available Verbs</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach($content['word_box'] as $word)
                        <span class="word-badge bg-indigo-50 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-300 font-extrabold px-5 py-2.5 rounded-xl text-[1.1rem] transition-all duration-300 border border-indigo-200/60 dark:border-indigo-800 shadow-sm" data-word="{{ strtolower($word) }}">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Questions Quiz Container -->
        <div class="glass-card rounded-[2rem] p-6 sm:p-10 shadow-xl relative overflow-hidden min-h-[340px] flex flex-col justify-center w-full max-w-4xl mx-auto">
            @foreach($parsedQuestions as $idx => $q)
                <div class="question-container question-slide-anim w-full" id="question_{{ $idx }}" style="{{ $idx === 0 ? '' : 'display:none;' }}">
                    <div class="text-center mb-5">
                        <span class="inline-flex items-center justify-center min-w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/60 text-indigo-600 dark:text-indigo-300 font-bold text-sm border border-indigo-200 dark:border-indigo-800">
                            {{ $idx + 1 }}
                        </span>
                    </div>

                    <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 dark:text-slate-100 leading-[1.8] text-center mx-auto mb-10 w-full px-2">
                        {!! $q['html'] !!}
                    </div>

                    <!-- Verify Button -->
                    <div class="flex justify-center mt-6 gap-4 min-h-[3.5rem] transition-all duration-300" id="controls_{{ $idx }}">
                        <button class="check-btn inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-br from-indigo-600 to-blue-600 hover:from-indigo-500 hover:to-blue-500 text-white rounded-2xl font-black text-[1.15rem] transition-all hover:scale-105 active:scale-95 shadow-[0_10px_20px_-10px_rgba(79,70,229,0.5)]" onclick="checkAnswer({{ $idx }})">
                            Check <i class="fa-solid fa-check text-white"></i>
                        </button>
                    </div>

                    <!-- Continue Button (Hidden until correct) -->
                    <div class="flex justify-center mt-6 gap-4 min-h-[3.5rem] hidden animate-pulse" id="btn_wrap_{{ $idx }}">
                        <button class="continue-btn inline-flex items-center gap-3 px-8 py-3.5 bg-gradient-to-br from-emerald-500 to-green-600 hover:from-emerald-400 hover:to-green-500 text-white rounded-2xl font-black text-[1.15rem] transition-all hover:scale-105 active:scale-95 shadow-[0_10px_20px_-10px_rgba(34,197,94,0.5)]" onclick="goToNext()">
                            Continue <i class="fa-solid fa-arrow-right-long"></i>
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Completion Screen -->
            <div id="completionScreen" class="text-center py-8 question-slide-anim" style="display: none;">
                <div class="text-7xl mb-6 drop-shadow-lg">🎉</div>
                <h2 class="text-4xl sm:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-blue-500 mb-4 pb-2">Fantastic Job!</h2>
                <p class="text-xl sm:text-2xl font-bold text-slate-600 dark:text-slate-300 mb-10">You have completed all writing exercises perfectly.</p>
                <div class="text-2xl sm:text-3xl font-black text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 inline-block px-10 py-5 rounded-3xl border-2 border-emerald-200 dark:border-emerald-800 shadow-xl shadow-emerald-500/10 mb-8">
                    <span class="text-slate-700 dark:text-slate-200 mr-2 text-xl font-bold">Final Score:</span>
                    <span id="finalScoreText">0</span> <span class="mx-1 text-slate-300 dark:text-slate-600">/</span> <span id="totalQuestionsText">{{ count($parsedQuestions) }}</span>
                </div>
                <div>
                    <button onclick="resetQuiz()" class="inline-flex items-center gap-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 px-8 py-3.5 rounded-2xl font-black text-lg transition-all hover:scale-105 active:scale-95 shadow-sm border border-slate-200 dark:border-slate-700">
                        <i class="fa-solid fa-rotate-right"></i> Start Again
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let currentIndex = 0;
    const totalQuestions = {{ count($parsedQuestions) }};
    let score = 0;
    let mistakes = 0;

    const scoreText = document.getElementById('scoreText');
    const mistakesText = document.getElementById('mistakesText');
    const timeText = document.getElementById('timeText');
    let timerInterval;
    let secondsElapsed = 0;

    function startTimer() {
        if(timerInterval) stopTimer();
        timerInterval = setInterval(() => {
            secondsElapsed++;
            const mins = Math.floor(secondsElapsed / 60).toString().padStart(2, '0');
            const secs = (secondsElapsed % 60).toString().padStart(2, '0');
            if (timeText) timeText.textContent = `${mins}:${secs}`;
        }, 1000);
    }
    function stopTimer() {
        clearInterval(timerInterval);
    }

    // Audio effects Setup
    const AudioContext = window.AudioContext || window.webkit.AudioContext;
    const audioCtx = new AudioContext();

    function playSoundStatus(type) {
        if (audioCtx.state === 'suspended') audioCtx.resume();
        const osc = audioCtx.createOscillator();
        const gainNode = audioCtx.createGain();

        osc.connect(gainNode);
        gainNode.connect(audioCtx.destination);

        if (type === 'correct') {
            osc.type = 'sine';
            osc.frequency.setValueAtTime(523.25, audioCtx.currentTime); // C5
            osc.frequency.setValueAtTime(659.25, audioCtx.currentTime + 0.1); // E5
            osc.frequency.setValueAtTime(783.99, audioCtx.currentTime + 0.2); // G5

            gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
            gainNode.gain.linearRampToValueAtTime(0.3, audioCtx.currentTime + 0.05);
            gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.5);

            osc.start();
            osc.stop(audioCtx.currentTime + 0.55);
        } else {
            osc.type = 'sine';
            osc.frequency.setValueAtTime(392, audioCtx.currentTime); // G4
            osc.frequency.exponentialRampToValueAtTime(329.6, audioCtx.currentTime + 0.2); // E4 down

            gainNode.gain.setValueAtTime(0, audioCtx.currentTime);
            gainNode.gain.linearRampToValueAtTime(0.25, audioCtx.currentTime + 0.05);
            gainNode.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.4);

            osc.start();
            osc.stop(audioCtx.currentTime + 0.45);
        }
    }

    window.checkAnswer = function(idx) {
        const inputField = document.getElementById('input_' + idx);
        if (!inputField || inputField.readOnly) return; // Prevent multiple checks

        if (audioCtx.state === 'suspended') audioCtx.resume(); // Ensure audio unlocks

        const correctAns = inputField.dataset.answer.toLowerCase();
        const userAns = inputField.value.trim().toLowerCase();

        if (userAns === correctAns) {
            // Success
            inputField.classList.add('is-correct');
            inputField.classList.remove('is-wrong');
            inputField.readOnly = true;
            inputField.blur();

            playSoundStatus('correct');
            score++;
            if (scoreText) scoreText.textContent = score;

            // Cross out word from the bank smoothly
            const badge = document.querySelector(`.word-badge[data-word="${correctAns}"]`);
            if (badge) badge.classList.add('crossed-out');

            // Toggle controls
            document.getElementById('controls_' + idx).classList.add('hidden');
            const wrap = document.getElementById('btn_wrap_' + idx);
            wrap.classList.remove('hidden');
        } else {
            // Wrong
            inputField.classList.add('is-wrong');
            playSoundStatus('incorrect');

            mistakes++;
            if (mistakesText) mistakesText.textContent = mistakes;

            setTimeout(() => {
                inputField.classList.remove('is-wrong');
                inputField.focus();
            }, 500);
        }
    };

    window.goToNext = function() {
        if (currentIndex < document.querySelectorAll('.question-container').length) {
            document.getElementById('question_' + currentIndex).style.display = 'none';
        }

        currentIndex++;

        if (currentIndex < totalQuestions) {
            document.getElementById('question_' + currentIndex).style.display = 'block';
            setTimeout(() => {
                const nextInput = document.getElementById('input_' + currentIndex);
                if(nextInput) nextInput.focus();
            }, 100);
        } else {
            stopTimer();
            document.getElementById('wordBank').style.opacity = '0';
            document.getElementById('wordBank').style.pointerEvents = 'none';

            document.getElementById('completionScreen').style.display = 'block';
            if (document.getElementById('finalScoreText')) document.getElementById('finalScoreText').textContent = score;
        }
    };

    window.resetQuiz = function() {
        stopTimer();
        currentIndex = 0;
        score = 0;
        mistakes = 0;
        secondsElapsed = 0;

        if (scoreText) scoreText.textContent = '0';
        if (mistakesText) mistakesText.textContent = '0';
        if (timeText) timeText.textContent = '00:00';

        // Reset Word Bank
        document.getElementById('wordBank').style.opacity = '1';
        document.getElementById('wordBank').style.pointerEvents = 'auto';
        document.querySelectorAll('.word-badge').forEach(badge => badge.classList.remove('crossed-out'));

        // Reset Questions
        const questions = document.querySelectorAll('.question-container');
        questions.forEach((q, idx) => {
            q.style.display = idx === 0 ? 'block' : 'none';

            const input = document.getElementById('input_' + idx);
            if (input) {
                input.value = '';
                input.readOnly = false;
                input.classList.remove('is-correct', 'is-wrong');
            }

            document.getElementById('controls_' + idx).classList.remove('hidden');
            document.getElementById('btn_wrap_' + idx).classList.add('hidden');
        });

        document.getElementById('completionScreen').style.display = 'none';
        startTimer();

        // Auto-focus first input
        setTimeout(() => {
            const firstInput = document.getElementById('input_0');
            if (firstInput) firstInput.focus();
        }, 300);
    };

    window.handleEnter = function(e, idx) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            e.preventDefault();
            // If already correct, click continue. Else run checkAnswer
            const continueBtnWrapper = document.getElementById('btn_wrap_' + idx);
            if (!continueBtnWrapper.classList.contains('hidden')) {
                goToNext();
            } else {
                checkAnswer(idx);
            }
        }
    };

    document.addEventListener("DOMContentLoaded", () => {
        startTimer();
        // Give slight delay then focus first input
        setTimeout(() => {
            const firstInput = document.getElementById('input_0');
            if (firstInput) firstInput.focus();
        }, 500);
    });
</script>
@endsection

