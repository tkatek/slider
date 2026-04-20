<?php
$content = [
    'title' => 'Practice 3',
    'subtitle' => 'Choose the correct answer:',
];
$questions = [
    // Basic Sentences
    ['section' => 'Basic Sentences', 'text' => "I {{am}} learning English.", 'options' => ['am', 'is', 'are', 'was']],
    ['section' => 'Basic Sentences', 'text' => "You {{are}} reading.", 'options' => ['am', 'is', 'are', 'was']],
    ['section' => 'Basic Sentences', 'text' => "He {{is}} looking.", 'options' => ['am', 'is', 'are', 'was']],
    ['section' => 'Basic Sentences', 'text' => "She {{is}} listening.", 'options' => ['am', 'is', 'are', 'was']],
    ['section' => 'Basic Sentences', 'text' => "We {{are}} drinking tea.", 'options' => ['am', 'is', 'are', 'was']],
    ['section' => 'Basic Sentences', 'text' => "They {{are}} making dinner.", 'options' => ['am', 'is', 'are', 'was']],

    // Yes / No Questions
    ['section' => 'Yes / No Questions', 'text' => "{{Are}} you listening to me?", 'options' => ['Am', 'Is', 'Are', 'Do']],
    ['section' => 'Yes / No Questions', 'text' => "{{Is}} she coming with you?", 'options' => ['Am', 'Is', 'Are', 'Does']],
    ['section' => 'Yes / No Questions', 'text' => "{{Am}} I helping?", 'options' => ['Am', 'Is', 'Are', 'Do']],
    ['section' => 'Yes / No Questions', 'text' => "{{Are}} they eating with us?", 'options' => ['Am', 'Is', 'Are', 'Do']],

    // Wh- Questions + Answers
    [
        'section' => 'Wh- Questions + Answers',
        'text' => "What {{are}} you doing?<br>I {{am}} looking for my keys.",
        'options' => ['are', 'am', 'is', 'do']
    ],
    ['section' => 'Wh- Questions + Answers', 'text' => "Where are they {{going}}?<br>They {{are}} going to work.", 'options' => ['go', 'going', 'are', 'is']],
    ['section' => 'Wh- Questions + Answers', 'text' => "Where {{are}} you taking me?<br>I {{am}} taking you to the cinema.", 'options' => ['are', 'am', 'is', 'take']],
    ['section' => 'Wh- Questions + Answers', 'text' => "What is she {{doing}}?<br>She {{is}} making a cake.", 'options' => ['do', 'doing', 'is', 'are']],
    ['section' => 'Wh- Questions + Answers', 'text' => "What are they {{doing}}?<br>They {{are}} drinking coffee.", 'options' => ['doing', 'done', 'are', 'is']],
    ['section' => 'Wh- Questions + Answers', 'text' => "What are you {{doing}}?<br>We {{are}} {{watching}} a film.", 'options' => ['doing', 'are', 'watching', 'watch']],
    ['section' => 'Wh- Questions + Answers', 'text' => "Where {{are}} {{you}} {{going}}?<br>I am going to the park.", 'options' => ['are', 'is', 'you', 'going', 'go']],
    ['section' => 'Wh- Questions + Answers', 'text' => "What {{is}} {{he}} {{doing}}?<br>He is writing an e-mail.", 'options' => ['is', 'are', 'he', 'doing', 'does']],
    ['section' => 'Wh- Questions + Answers', 'text' => "What is she doing?<br>She {{is}} {{reading}} a newspaper.", 'options' => ['reading', 'read', 'is', 'are']],
    ['section' => 'Wh- Questions + Answers', 'text' => "Where are {{we}} going?<br>We {{are}} {{going}} to school.", 'options' => ['we', 'us', 'are', 'going', 'go']],
];

// parse the sentences to create HTML and data arrays
$parsedQuestions = [];
foreach ($questions as $q) {
    preg_match_all('/\{\{(.*?)\}\}/', $q['text'], $matches);
    $answersCount = count($matches[1]);

    // create the sentence with blanks
    $htmlText = preg_replace('/\{\{(.*?)\}\}/', '<div class="blank-drop-zone transition-all" data-answer="$1"></div>', $q['text']);

    // shuffle options safely
    $opts = $q['options'];
    shuffle($opts);

    $parsedQuestions[] = [
        'section' => $q['section'],
        'html' => $htmlText,
        'answersCount' => $answersCount,
        'options' => $opts
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

    .blank-drop-zone {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 80px;
        min-height: 44px;
        height: auto;
        padding: 0 16px;
        margin: 4px 6px;
        vertical-align: middle;
        background: rgba(226, 232, 240, 0.5);
        border: 2px dashed rgba(148, 163, 184, 0.8);
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.25rem;
        color: transparent;
        transition: all 0.2s ease;
        line-height: normal;
    }
    .dark .blank-drop-zone {
        background: rgba(15, 23, 42, 0.5);
        border-color: rgba(71, 85, 105, 0.8);
    }

    .blank-drop-zone.drag-over {
        background: rgba(99, 102, 241, 0.15);
        border-color: rgba(99, 102, 241, 0.9);
        transform: scale(1.05);
    }

    .blank-drop-zone.is-correct {
        background: rgba(34, 197, 94, 0.15);
        border: 2px solid rgba(34, 197, 94, 0.9);
        color: #16a34a;
        box-shadow: 0 4px 15px -3px rgba(34, 197, 94, 0.3);
        transform: scale(1.05);
    }
    .dark .blank-drop-zone.is-correct {
        color: #4ade80;
    }

    .blank-drop-zone.is-wrong {
        background: rgba(239, 68, 68, 0.1);
        border: 2px solid rgba(239, 68, 68, 0.8);
        color: #dc2626;
        animation: shake 0.4s ease-in-out;
    }
    .dark .blank-drop-zone.is-wrong {
        color: #f87171;
    }

    .word-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 24px;
        background: white;
        border: 2px solid rgba(99, 102, 241, 0.4);
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.1rem;
        color: #4f46e5;
        cursor: grab;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.2s ease;
        user-select: none;
        touch-action: none;
    }
    .dark .word-chip {
        background: rgba(30, 41, 59, 1);
        border-color: rgba(99, 102, 241, 0.6);
        color: #818cf8;
    }
    .word-chip:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px -2px rgba(99, 102, 241, 0.25);
    }
    .word-chip:active, .word-chip.is-dragging {
        cursor: grabbing;
        transform: scale(1.05);
        box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);
        opacity: 0.9;
        z-index: 50;
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

    .btn-disabled {
        opacity: 0.5;
        pointer-events: none;
        filter: grayscale(1);
    }
</style>
@endsection

@section('content')
<div class="min-h-[100dvh] w-full flex flex-col items-center py-6 sm:py-10">
    <div class="w-full max-w-5xl px-4 sm:px-6">

        <!-- Header Section -->
        <header class="w-full flex flex-col items-center justify-center mb-4 sm:mb-8 lg:mb-10 text-center">
            <h1 class="text-2xl sm:text-5xl md:text-6xl font-black tracking-tight bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent drop-shadow-sm">
                {{ $content['title'] ?? 'Practice' }}
            </h1>
            <h2 class="mt-1 sm:mt-2 text-sm sm:text-xl md:text-2xl font-bold text-black dark:text-white">
                {{ $content['subtitle'] ?? 'Choose the correct answer:' }}
            </h2>

            <div class="relative flex flex-wrap items-center justify-around gap-2 sm:gap-6 md:gap-10 mt-3 sm:mt-6 rounded-2xl sm:rounded-[2rem] bg-white px-3 sm:px-8 md:px-12 py-2 sm:py-5 shadow-[0_4px_20px_-8px_rgba(0,0,0,0.1)] border border-slate-200/60 w-full max-w-3xl mx-auto dark:bg-slate-800/90 dark:border-slate-700/50">
                <button onclick="resetQuiz()" class="absolute -top-3 -right-3 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center bg-white dark:bg-slate-800 text-slate-500 hover:text-rose-500 dark:hover:text-rose-400 border border-slate-200 dark:border-slate-600 shadow-lg rounded-full transition-all hover:scale-110 active:scale-95 z-10" title="Reset Practice">
                    <i class="fa-solid fa-rotate-right text-lg"></i>
                </button>
                <div class="flex flex-col items-center justify-center">
                    <span class="text-lg sm:text-2xl drop-shadow-sm mb-0 sm:mb-1">🧩</span>
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

        <!-- Quiz Container -->
        <div class="glass-card rounded-[2rem] p-6 sm:p-10 shadow-xl relative overflow-hidden min-h-[400px] flex flex-col justify-center w-full max-w-4xl mx-auto">

            @foreach($parsedQuestions as $index => $q)
            <div class="question-container question-slide-anim w-full" id="question_{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}" data-blanks-count="{{ $q['answersCount'] }}">

                <div class="text-center mb-6">
                    <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-black uppercase tracking-wider text-[0.75rem] rounded-xl shadow-sm border border-indigo-200/50 dark:border-indigo-800/30">
                        {{ $q['section'] }}
                    </span>
                </div>

                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 dark:text-slate-100 leading-[1.6] text-center mx-auto mb-10 quiz-question-text">
                    {!! $q['html'] !!}
                </div>

                <div class="p-5 sm:p-6 bg-slate-50/80 dark:bg-slate-900/50 rounded-[1.5rem] border border-slate-200/60 dark:border-slate-700/60">
                    <p class="text-xs sm:text-sm font-bold text-slate-500 dark:text-slate-400 text-center mb-4 uppercase tracking-widest">Available Words</p>
                    <div class="flex flex-wrap justify-center gap-3 sm:gap-4 options-container px-2">
                        @foreach($q['options'] as $opt)
                            <div class="word-chip" draggable="true" data-word="{{ $opt }}">
                                {{ $opt }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Next Button inside the question -->
                <div class="next-btn-container text-center mt-8 transition-all duration-300 opacity-0 pointer-events-none transform translate-y-4 scale-95" id="btn_wrap_{{ $index }}">
                    <button class="nextBtn inline-flex items-center gap-3 bg-gradient-to-br from-indigo-600 to-blue-600 hover:from-indigo-500 hover:to-blue-500 text-white px-8 py-3.5 rounded-2xl font-black text-lg shadow-[0_10px_20px_-10px_rgba(79,70,229,0.5)] transition-all hover:scale-105 active:scale-95" onclick="goToNext()">
                        Continue <i class="fa-solid fa-arrow-right-long mt-0.5"></i>
                    </button>
                </div>
            </div>
            @endforeach

            <!-- Completion Screen -->
            <div id="completionScreen" class="text-center py-10 question-slide-anim" style="display: none;">
                <div class="text-7xl mb-6 drop-shadow-lg">🎉</div>
                <h2 class="text-4xl sm:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-blue-500 mb-4 pb-2">Excellent Work!</h2>
                <p class="text-xl sm:text-2xl font-bold text-slate-600 dark:text-slate-300 mb-10">You have completed all the practice questions.</p>
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
    let currentFilledBlanks = 0;

    const scoreText = document.getElementById('scoreText');
    const mistakesText = document.getElementById('mistakesText');
    const timeText = document.getElementById('timeText');
    let timerInterval;
    let secondsElapsed = 0;

    function startTimer() {
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

    window.resetQuiz = function() {
        stopTimer();
        currentIndex = 0;
        score = 0;
        mistakes = 0;
        currentFilledBlanks = 0;
        secondsElapsed = 0;

        if (scoreText) scoreText.textContent = '0';
        if (mistakesText) mistakesText.textContent = '0';
        if (timeText) timeText.textContent = '00:00';

        questions.forEach((q, idx) => {
            q.style.display = idx === 0 ? 'block' : 'none';

            q.querySelectorAll('.blank-drop-zone').forEach(zone => {
                zone.textContent = '';
                zone.classList.remove('is-correct', 'is-wrong');
            });

            q.querySelectorAll('.word-chip').forEach(chip => {
                chip.classList.remove('btn-disabled');
            });

            const wrap = document.getElementById('btn_wrap_' + idx);
            if (wrap) {
                wrap.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4', 'scale-95');
                wrap.classList.remove('opacity-100', 'scale-100');
            }
        });

        document.getElementById('completionScreen').style.display = 'none';
        startTimer();
    };

    const questions = document.querySelectorAll('.question-container');
    let draggedElement = null;

    // Advanced Audio setup
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

    function setupDragDrop() {
        document.querySelectorAll('.word-chip').forEach(chip => {
            chip.addEventListener('dragstart', (e) => {
                draggedElement = chip;
                chip.classList.add('is-dragging');
                e.dataTransfer.setData('text/plain', chip.dataset.word);
                e.dataTransfer.effectAllowed = 'move';
            });

            chip.addEventListener('dragend', () => {
                chip.classList.remove('is-dragging');
                draggedElement = null;
                document.querySelectorAll('.blank-drop-zone').forEach(z => z.classList.remove('drag-over'));
            });

            // Fallback for Touch / Click Support
            chip.addEventListener('click', () => {
                if(chip.classList.contains('btn-disabled')) return;

                const activeQuestion = questions[currentIndex];
                const emptyBlank = Array.from(activeQuestion.querySelectorAll('.blank-drop-zone')).find(b => !b.classList.contains('is-correct'));

                if(emptyBlank) {
                    processValidation(emptyBlank, chip.dataset.word, chip);
                }
            });
        });

        document.querySelectorAll('.blank-drop-zone').forEach(zone => {
            zone.addEventListener('dragover', (e) => {
                if(zone.classList.contains('is-correct')) return;
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
                zone.classList.add('drag-over');
            });

            zone.addEventListener('dragleave', () => {
                zone.classList.remove('drag-over');
            });

            zone.addEventListener('drop', (e) => {
                e.preventDefault();
                zone.classList.remove('drag-over');
                if(zone.classList.contains('is-correct')) return;

                const wordData = e.dataTransfer.getData('text/plain');

                // if we dragged from native system or outside, draggedElement could be null. We fallback to locating chip matching wordData.
                let targetChip = draggedElement;
                if(!targetChip) {
                    const activeQuestion = questions[currentIndex];
                    targetChip = Array.from(activeQuestion.querySelectorAll('.word-chip')).find(c => c.dataset.word === wordData && !c.classList.contains('btn-disabled'));
                }

                if(wordData && targetChip) {
                   processValidation(zone, wordData, targetChip);
                }
            });
        });
    }

    function processValidation(zone, word, chipElement) {
        if(zone.classList.contains('is-correct')) return;

        const correctWord = zone.dataset.answer;

        if (word.toLowerCase() === correctWord.toLowerCase()) {
            zone.textContent = word;
            zone.classList.add('is-correct');
            zone.classList.remove('is-wrong');
            chipElement.classList.add('btn-disabled'); // disable visual rather than hide to avoid layout shifts
            playSoundStatus('correct');

            currentFilledBlanks++;

            const activeQuestion = questions[currentIndex];
            const maxBlanks = parseInt(activeQuestion.dataset.blanksCount);

            if (currentFilledBlanks >= maxBlanks) {
                score++;
                if(scoreText) scoreText.textContent = score;
                // show button wrap
                const wrap = document.getElementById('btn_wrap_' + currentIndex);
                if(wrap) {
                    wrap.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4', 'scale-95');
                    wrap.classList.add('opacity-100', 'scale-100');
                }
            }
        } else {
            playSoundStatus('incorrect');
            zone.classList.remove('is-correct');
            zone.classList.add('is-wrong');
            zone.textContent = word;

            mistakes++;
            if(mistakesText) mistakesText.textContent = mistakes;

            setTimeout(() => {
                zone.textContent = '';
                zone.classList.remove('is-wrong');
            }, 500);
        }
    }

    window.goToNext = function() {
        if (currentIndex < questions.length) {
            questions[currentIndex].style.display = 'none';
        }

        currentIndex++;
        currentFilledBlanks = 0;

        if (currentIndex < totalQuestions) {
            questions[currentIndex].style.display = 'block';
        } else {
            stopTimer();
            document.getElementById('completionScreen').style.display = 'block';
            if (document.getElementById('finalScoreText')) document.getElementById('finalScoreText').textContent = score;
        }
    };

    document.addEventListener("DOMContentLoaded", () => {
        setupDragDrop();
        startTimer();
    });
</script>
@endsection
