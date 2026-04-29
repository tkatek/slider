<?php
$content = [
    'title' => 'Quick Wrap up!',
    'subtitle' => 'Complete the sentence',
    'questions' => [
        "It's not healthy to eat too many",
        "People should eat less"
    ]
];
?>
@extends('slider.simple-layout')

@section('title', $content['title'])

@section('style')
<style>
@keyframes slideInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.4); }
    50% { box-shadow: 0 0 0 8px rgba(249, 115, 22, 0); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
    20%, 40%, 60%, 80% { transform: translateX(4px); }
}

.question-slide-anim {
    animation: slideInUp 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.animate-shake {
    animation: shake 0.5s ease-in-out;
}

.input-focus-glow:focus {
    animation: pulse-glow 1.5s infinite;
}
</style>
@endsection

@section('content')
<div class="min-h-[100dvh] w-full flex flex-col items-center justify-center py-8 sm:py-12 px-4">
    <div class="w-full max-w-4xl">

        <header class="w-full flex flex-col items-center justify-center mb-6 sm:mb-10 text-center">
            @include('slider.components.title-subtitle')
        </header>

        <div>
            
            <div class="question-container question-slide-anim w-full" id="question_wrapper">

                <div class="space-y-6 sm:space-y-8 mb-8 sm:mb-12">
                    @foreach($content['questions'] as $index => $question)
                    <div class="question-card bg-gradient-to-br from-orange-50/80 to-amber-50/60 dark:from-orange-900/20 dark:to-amber-900/10 p-5 sm:p-7 lg:p-8 rounded-2xl border border-orange-200/60 dark:border-orange-700/40 shadow-md hover:shadow-lg transition-all">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gradient-to-br from-orange-600 to-amber-500 text-white font-black text-base sm:text-lg shadow-md">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-lg sm:text-xl lg:text-2xl font-black text-slate-800 dark:text-white leading-tight">
                                {{ $question }}
                            </span>
                        </div>
                        <input 
                            type="text" 
                            id="answer_input_{{ $index + 1 }}" 
                            class="answer-input input-focus-glow w-full px-4 py-3 sm:py-4 text-base sm:text-lg lg:text-xl font-bold text-slate-900 dark:text-white bg-white dark:bg-slate-800 border-2 border-slate-300 dark:border-slate-600 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 transition-all placeholder:text-slate-400 dark:placeholder:text-slate-500 placeholder:font-normal" 
                            autocomplete="off" 
                            spellcheck="false" 
                            placeholder="Type your answer here..."
                        >
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-gradient-to-br from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white px-8 py-4 rounded-2xl font-black text-base sm:text-lg shadow-lg shadow-orange-500/30 transition-all hover:scale-105 active:scale-95 disabled:opacity-50 disabled:pointer-events-none" 
                        onclick="checkAnswer()" 
                        id="check_btn"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Check Answers
                    </button>
                    <button 
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 px-8 py-4 rounded-2xl font-black text-base sm:text-lg shadow-md transition-all hover:scale-105 active:scale-95" 
                        onclick="resetQuiz()"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset
                    </button>
                </div>

                <div id="feedback_msg" class="text-center mt-6 text-lg sm:text-xl font-bold opacity-0 transition-all"></div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
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

        window.checkAnswer = function() {
            const inputs = document.querySelectorAll('.answer-input');
            const feedbackElement = document.getElementById('feedback_msg');
            const btn = document.getElementById('check_btn');

            let allFilled = true;
            let allValid = true;

            inputs.forEach(input => {
                const val = input.value.trim();
                if (val === '') allFilled = false;
                if (val.length < 2) allValid = false;
            });

            if (!allFilled) {
                feedbackElement.textContent = 'Please fill all blanks.';
                feedbackElement.className = 'text-center mt-4 text-lg font-bold opacity-100 text-orange-500 transition-opacity';
                setTimeout(() => { if(feedbackElement.textContent === 'Please fill all blanks.') feedbackElement.style.opacity = '0'; }, 2000);
                return;
            }

            // Accept any reasonable length answer for wrap up context
            if (allValid) {
                inputs.forEach(input => {
                    const card = input.closest('.question-card');
                    input.classList.remove('border-slate-300', 'dark:border-slate-600', 'border-rose-500', 'text-rose-500');
                    input.classList.add('border-orange-500', 'ring-4', 'ring-orange-500/20');
                    card.classList.add('ring-2', 'ring-orange-500/40');
                });

                feedbackElement.textContent = 'Answers saved.';
                feedbackElement.className = 'text-center mt-4 text-xl font-bold opacity-100 text-orange-500 transition-opacity';

                btn.disabled = true;
            } else {
                playSoundStatus('incorrect');

                inputs.forEach(input => {
                    const card = input.closest('.question-card');
                    input.classList.remove('border-slate-300', 'dark:border-slate-600', 'border-emerald-500', 'text-emerald-500', 'ring-4', 'ring-emerald-500/20');
                    input.classList.add('border-rose-500', 'text-rose-500', 'ring-4', 'ring-rose-500/20');
                    card.classList.add('animate-shake', 'ring-2', 'ring-rose-500/50');
                    setTimeout(() => card.classList.remove('animate-shake'), 500);
                });

                feedbackElement.textContent = 'Typing too short, try again!';
                feedbackElement.className = 'text-center mt-4 text-xl font-bold opacity-100 text-rose-500 transition-opacity';

                setTimeout(() => {
                    feedbackElement.style.opacity = '0';
                }, 2000);
            }
        };

        window.resetQuiz = function() {
            const inputs = document.querySelectorAll('.answer-input');
            const feedbackElement = document.getElementById('feedback_msg');
            const btn = document.getElementById('check_btn');

            inputs.forEach(input => {
                const card = input.closest('.question-card');
                input.value = '';
                input.classList.remove('border-orange-500', 'text-emerald-500', 'border-emerald-500', 'border-rose-500', 'text-rose-500', 'ring-4', 'ring-orange-500/20', 'ring-emerald-500/20', 'ring-rose-500/20');
                input.classList.add('border-slate-300', 'dark:border-slate-600');
                card.classList.remove('ring-2', 'ring-orange-500/40', 'ring-emerald-500/50', 'ring-rose-500/50');
            });

            feedbackElement.style.opacity = '0';
            btn.disabled = false;
            document.getElementById('question_wrapper').style.display = 'block';
        };

        document.querySelectorAll('input.answer-input').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    checkAnswer();
                }
            });
        });
    </script>
@endsection
