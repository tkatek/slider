<?php
if (!function_exists('materialAsset')) {
    function materialAsset($path) {
        return 'https://remtoo.net/' . $path;
    }
}

$content = [
    'title' => 'Writing',
    'subtitle' => 'Read the dialogue & complete the sentences with the correct word : (am/is/are)',
    'audio' => materialAsset('slider/A1/Advanced/chapter-10/audios/slide10/practice-3.mp3'),
    'dialogue' => [
        ['speaker' => 'Daniel', 'text' => "Hey, I'm really sorry I'm late. I came as fast as I could."],
        ['speaker' => 'Hana', 'text' => "It's OK. Nobody has really come yet."],
        ['speaker' => 'Daniel', 'text' => "Why? Where are they?"],
        ['speaker' => 'Hana', 'text' => "Well, John is shopping. He is getting some food."],
        ['speaker' => 'Daniel', 'text' => "OK, what about Emma? Where is she?"],
        ['speaker' => 'Hana', 'text' => "Emma has an exam, so she is studying and she is going to come later."],
        ['speaker' => 'Daniel', 'text' => "OK, how about Alex? I don't see him around."],
        ['speaker' => 'Hana', 'text' => "Oh, Alex is over there. He is preparing for the BBQ."],
        ['speaker' => 'Daniel', 'text' => "Oh, yeah, that's right. And how about Marcus and Emily?"],
        ['speaker' => 'Hana', 'text' => "They are over there. They are playing."],
        ['speaker' => 'Daniel', 'text' => "Oh, so how many people are left? Who else is coming?"],
        ['speaker' => 'Hana', 'text' => "Uh, I don't know. No one has really contacted me yet."],
        ['speaker' => 'Daniel', 'text' => "Oh, well, let's hope we can get around ten people maybe."],
        ['speaker' => 'Hana', 'text' => "Yes, I hope so."],
        ['speaker' => 'Daniel', 'text' => "Cool!"]
    ]
];

$rawQuestions = [
    ['text' => 'I ___ looking at some pictures.', 'answer' => 'am'],
    ['text' => 'I ___ playing tennis.', 'answer' => 'am'],
    ['text' => 'My dad and I ___ not playing tennis, we ___ boxing.', 'answer' => ['are', 'are']],
    ['text' => 'My sister ___ playing golf.', 'answer' => 'is'],
    ['text' => 'You ___ playing football.', 'answer' => 'are'],
    ['text' => 'I ___ not playing football, I ___ playing cricket.', 'answer' => ['am', 'am']],
    ['text' => 'My brothers ___ swimming.', 'answer' => 'are'],
    ['text' => 'My dad and I ___ having a race.', 'answer' => 'are'],
    ['text' => 'I ___ winning and he ___ losing.', 'answer' => ['am', 'is']],
    ['text' => 'Sammy ___ not playing real sports, he ___ playing games on a computer.', 'answer' => ['is', 'is']],
];

$parsedQuestions = [];
foreach ($rawQuestions as $idx => $q) {
    if (is_array($q['answer'])) {
        $answers = array_values($q['answer']);
    } else {
        $answers = [$q['answer']];
    }

    $blankCounter = 0;

    // Replace each ___ with our typing blank HTML component sequentially
    $html = preg_replace_callback('/___/', function($matches) use (&$blankCounter, $idx, $answers) {
        $ans = strtolower($answers[$blankCounter] ?? '');
        $inputId = "input_{$idx}_{$blankCounter}";
        $inputHtml = '<input type="text" id="'.$inputId.'" class="typing-blank drop-shadow-sm transition-all" data-answer="'.$ans.'" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="..." onkeypress="handleEnter(event, '.$idx.')" />';
        $blankCounter++;
        return $inputHtml;
    }, $q['text']);

    $parsedQuestions[] = [
        'html' => $html,
        'blanksCount' => $blankCounter
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
        width: 100px;
        border: none;
        border-bottom: 3px solid #64748b;
        background: rgba(241, 245, 249, 0.6);
        border-radius: 12px 12px 0 0;
        padding: 4px 10px;
        margin: 0 8px;
        text-align: center;
        font-weight: 800;
        font-size: 1.5rem;
        color: #4f46e5;
        transition: all 0.3s ease;
        line-height: normal;
        vertical-align: bottom;
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

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.02);
        border-radius: 10px;
    }
    .dark .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255,255,255,0.02);
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(99, 102, 241, 0.2);
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(99, 102, 241, 0.4);
    }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(99, 102, 241, 0.3);
    }
</style>
@endsection

@section('content')
<div class="min-h-[100dvh] w-full flex flex-col items-center py-6 sm:py-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-indigo-50/40 via-white to-blue-50/30 dark:from-slate-900 dark:via-slate-900 dark:to-indigo-950">
    <div class="w-full max-w-6xl xl:max-w-7xl px-4 sm:px-6">

        <!-- Title & Subtitle -->
        <header class="w-full flex flex-col items-center justify-center mb-6 sm:mb-10 text-center">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-black tracking-tight bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent drop-shadow-sm pb-2 leading-tight w-full px-2">
                {{ $content['title'] ?? 'Practice' }}
            </h1>
            <h2 class="mt-2 sm:mt-4 text-sm sm:text-xl md:text-2xl font-bold text-slate-800 dark:text-slate-100 px-2 leading-snug">
                {{ $content['subtitle'] }}
            </h2>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 xl:gap-10 w-full mx-auto lg:items-start">
            @if(!empty($content['dialogue']))
            <div class="lg:col-span-6 glass-card rounded-[2rem] p-6 sm:p-10 flex flex-col shadow-xl relative w-full mx-auto">
                <h3 class="text-xl sm:text-2xl font-black text-indigo-600 dark:text-indigo-400 mb-6 flex items-center justify-center gap-2 text-center pb-4 border-b border-indigo-100 dark:border-indigo-800/60">
                    <i class="fa-solid fa-book-open"></i> Read the Dialogue
                </h3>

                <div class="flex-grow space-y-3 sm:space-y-4 relative z-20">
                    @foreach($content['dialogue'] as $idx => $line)
                        <div class="flex flex-col sm:flex-row sm:items-start gap-1 sm:gap-3 opacity-0 translate-y-4 animate-fade-in-up" style="animation-delay: {{ $idx * 100 }}ms; animation-fill-mode: forwards;">
                            <span class="font-black text-sm sm:text-base whitespace-nowrap {{ $line['speaker'] === 'Daniel' ? 'text-indigo-600 dark:text-indigo-400' : 'text-emerald-600 dark:text-emerald-400' }}">
                                {{ $line['speaker'] }}:
                            </span>
                            <span class="text-slate-700 dark:text-slate-200 text-sm sm:text-base font-medium leading-normal sm:leading-relaxed">
                                {{ $line['text'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Questions Quiz Container -->
            <div class="lg:col-span-6 glass-card rounded-[2rem] p-6 sm:p-10 shadow-xl relative overflow-hidden flex flex-col justify-start min-h-[400px] w-full mx-auto">
                @foreach($parsedQuestions as $idx => $q)
                    <div class="question-container question-slide-anim w-full" id="question_{{ $idx }}" style="{{ $idx === 0 ? '' : 'display:none;' }}">
                        <!-- Progress Indicator -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-4 mb-8">
                            <span class="inline-flex whitespace-nowrap items-center justify-center px-4 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/60 text-indigo-600 dark:text-indigo-300 font-bold text-sm border border-indigo-200 dark:border-indigo-800 shadow-sm">
                                Question {{ $idx + 1 }} / {{ count($parsedQuestions) }}
                            </span>
                            <div class="w-full h-2.5 bg-slate-100 dark:bg-slate-700/50 rounded-full overflow-hidden shadow-inner border border-slate-200 dark:border-slate-600">
                                <div class="h-full bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full transition-all duration-500 relative" style="width: {{ (($idx + 1) / count($parsedQuestions)) * 100 }}%">
                                    <div class="absolute inset-0 bg-white/20"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 dark:text-slate-100 leading-[2] sm:leading-[1.8] text-center mx-auto mb-10 w-full px-2">
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
        const wrap = document.getElementById('question_' + idx);
        const inputs = wrap.querySelectorAll('.typing-blank');

        let allCorrect = true;
        let anyWrong = false;

        if (audioCtx.state === 'suspended') audioCtx.resume();

        // Validate each input field iteratively
        inputs.forEach(input => {
            if (input.readOnly) return;

            const correctAns = input.dataset.answer.toLowerCase();
            const userAns = input.value.trim().toLowerCase();

            if (userAns === '') {
                allCorrect = false;
                anyWrong = true;
                input.classList.add('is-wrong');
            } else if (userAns === correctAns) {
                input.classList.add('is-correct');
                input.classList.remove('is-wrong');
                input.readOnly = true;
            } else {
                allCorrect = false;
                anyWrong = true;
                input.classList.add('is-wrong');
            }
        });

        if (allCorrect) {
            playSoundStatus('correct');
            score++;
            if (scoreText) scoreText.textContent = score;

            // Toggle controls to show Continue button
            document.getElementById('controls_' + idx).classList.add('hidden');
            document.getElementById('btn_wrap_' + idx).classList.remove('hidden');
            inputs.forEach(i => i.blur());
        } else if (anyWrong) {
            playSoundStatus('incorrect');
            mistakes++;
            if (mistakesText) mistakesText.textContent = mistakes;

            setTimeout(() => {
                inputs.forEach(input => {
                    if (!input.readOnly) input.classList.remove('is-wrong');
                });

                // Refocus the first wrong input automatically
                for (let i of inputs) {
                    if(!i.readOnly) { i.focus(); break; }
                }
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
                const nextInput = document.getElementById('input_' + currentIndex + '_0');
                if(nextInput) nextInput.focus();
            }, 100);
        } else {
            stopTimer();
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


        const questions = document.querySelectorAll('.question-container');
        questions.forEach((q, idx) => {
            q.style.display = idx === 0 ? 'block' : 'none';

            q.querySelectorAll('.typing-blank').forEach(input => {
                input.value = '';
                input.readOnly = false;
                input.classList.remove('is-correct', 'is-wrong');
            });

            document.getElementById('controls_' + idx).classList.remove('hidden');
            document.getElementById('btn_wrap_' + idx).classList.add('hidden');
        });

        document.getElementById('completionScreen').style.display = 'none';
        startTimer();

        setTimeout(() => {
            const firstInput = document.getElementById('input_0_0');
            if (firstInput) firstInput.focus();
        }, 300);
    };

    window.handleEnter = function(e, idx) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            e.preventDefault();
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
        setTimeout(() => {
            const firstInput = document.getElementById('input_0_0');
            if (firstInput) firstInput.focus();
        }, 500);
    });
</script>
@endsection

