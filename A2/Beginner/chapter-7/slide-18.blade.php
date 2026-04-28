<?php
if (!function_exists('materialAsset')) {
    function materialAsset($path) {
        return 'https://remtoo.net/' . $path;
    }
}

$content = [
    'title' => 'Quick wrap up!',
    'subtitle' => 'Listen and write the words.',
    'items' => [
        [
            'full' => 'blonde hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/blonde-hair.mpeg'),
            'first_letter' => 'b',
            'first_rest' => 'londe',
            'second_letter' => 'h',
            'second_rest' => 'air',
        ],
        [
            'full' => 'dark hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/dark-hair.mpeg'),
            'first_letter' => 'd',
            'first_rest' => 'ark',
            'second_letter' => 'h',
            'second_rest' => 'air',
        ],
        [
            'full' => 'ginger hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/ginger-hair.mpeg'),
            'first_letter' => 'g',
            'first_rest' => 'inger',
            'second_letter' => 'h',
            'second_rest' => 'air',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['title'])

@section('style')
<style>
    .listen-write-wrap {
        min-height: 100dvh;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1.5rem 1rem;
    }

    .exercise-shell {
        width: 100%;
        max-width: 980px;
        border: 1px solid rgba(165, 180, 252, 0.45);
        background:
            radial-gradient(120% 120% at 0% 0%, rgba(99, 102, 241, 0.2) 0%, transparent 45%),
            radial-gradient(120% 120% at 100% 0%, rgba(56, 189, 248, 0.16) 0%, transparent 40%),
            rgba(238, 242, 255, 0.72);
        border-radius: 1.8rem;
        padding: 1.1rem;
        box-shadow: 0 16px 36px -26px rgba(15, 23, 42, 0.35);
    }

    .dark .exercise-shell {
        border-color: rgba(99, 102, 241, 0.45);
        background:
            radial-gradient(120% 120% at 0% 0%, rgba(99, 102, 241, 0.22) 0%, transparent 45%),
            radial-gradient(120% 120% at 100% 0%, rgba(59, 130, 246, 0.16) 0%, transparent 45%),
            rgba(30, 41, 59, 0.62);
        box-shadow: none;
    }

    .exercise-card {
        width: 100%;
        border-radius: 1.35rem;
        border: 1px solid rgba(226, 232, 240, 0.95);
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 12px 28px -20px rgba(15, 23, 42, 0.3);
        padding: 0.9rem;
    }

    .dark .exercise-card {
        border-color: rgba(100, 116, 139, 0.65);
        background: rgba(15, 23, 42, 0.72);
        box-shadow: none;
    }

    .listen-row {
        border: 1px solid rgba(226, 232, 240, 0.92);
        border-radius: 1rem;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.92) 0%, rgba(248, 250, 252, 0.92) 100%);
        padding: 0.72rem;
    }

    .dark .listen-row {
        border-color: rgba(100, 116, 139, 0.55);
        background: linear-gradient(180deg, rgba(30, 41, 59, 0.78) 0%, rgba(15, 23, 42, 0.82) 100%);
    }

    .row-grid {
        display: grid;
        grid-template-columns: auto auto auto minmax(105px, 190px) auto minmax(105px, 190px);
        gap: 0.55rem;
        align-items: center;
    }


    .row-number {
        width: 2rem;
        text-align: right;
    }

    .audio-btn {
        width: 54px;
        height: 46px;
        border-radius: 0.75rem;
        border: 2px solid rgba(71, 85, 105, 0.75);
        background: #ffffff;
        color: #1f2937;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .dark .audio-btn {
        border-color: rgba(148, 163, 184, 0.75);
        background: rgba(15, 23, 42, 0.85);
        color: #f8fafc;
    }

    .audio-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(30, 41, 59, 0.14);
    }

    .audio-btn.playing {
        border-color: #2563eb;
        color: #1d4ed8;
        background: #eff6ff;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    .dark .audio-btn.playing {
        color: #93c5fd;
        background: rgba(30, 58, 138, 0.35);
    }

    .fixed-letter {
        font-size: 1.7rem;
        font-weight: 800;
        line-height: 1;
        color: #1e293b;
        text-align: center;
        width: 1.5rem;
    }

    .dark .fixed-letter {
        color: #f8fafc;
    }

    .word-input {
        height: 46px;
        border-radius: 0.75rem;
        border: 2px solid rgba(203, 213, 225, 0.95);
        background: #ffffff;
        text-align: center;
        font-size: 1.2rem;
        font-weight: 700;
        color: #0f172a;
        padding: 0.2rem 0.55rem;
    }

    .word-input::placeholder {
        color: rgba(148, 163, 184, 0.9);
    }

    .dark .word-input {
        border-color: rgba(100, 116, 139, 0.85);
        background: rgba(15, 23, 42, 0.8);
        color: #ffffff;
    }

    .dark .word-input::placeholder {
        color: rgba(148, 163, 184, 0.85);
    }

    .word-input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.14);
    }

    .word-input.is-correct {
        border-color: rgba(34, 197, 94, 0.75);
        color: #15803d;
        background: rgba(240, 253, 244, 0.92);
    }

    .dark .word-input.is-correct {
        color: #4ade80;
        background: rgba(20, 83, 45, 0.45);
    }

    .word-input.is-wrong {
        border-color: rgba(239, 68, 68, 0.75);
        color: #b91c1c;
        background: rgba(254, 242, 242, 0.95);
    }

    .dark .word-input.is-wrong {
        color: #fca5a5;
        background: rgba(127, 29, 29, 0.45);
    }

    .control-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .5rem;
        border-radius: .9rem;
        border: 1px solid transparent;
        padding: .78rem 1.35rem;
        font-weight: 900;
        letter-spacing: .01em;
        transition: transform .15s ease, box-shadow .15s ease, background-color .15s ease;
    }

    .control-btn:hover {
        transform: translateY(-1px);
    }

    .control-btn:active {
        transform: scale(.97);
    }

    .control-btn.reveal {
        color: #ffffff;
        background: linear-gradient(135deg, #f97316, #f59e0b);
        box-shadow: 0 12px 24px -16px rgba(234, 88, 12, 0.6);
    }

    .control-btn.reveal:hover {
        background: linear-gradient(135deg, #ea580c, #f59e0b);
    }

    .control-btn.reset {
        border-color: rgba(203, 213, 225, 0.95);
        background: #ffffff;
        color: #334155;
    }

    .control-btn.reset:hover {
        background: #f8fafc;
    }

    .dark .control-btn.reset {
        border-color: rgba(100, 116, 139, 0.85);
        background: rgba(15, 23, 42, 0.78);
        color: #f8fafc;
    }

    .dark .control-btn.reset:hover {
        background: rgba(30, 41, 59, 0.88);
    }

    @media (max-width: 900px) {
        .row-grid {
            grid-template-columns: auto auto auto minmax(80px, 1fr) auto minmax(80px, 1fr);
        }
    }

    @media (max-width: 640px) {
        .listen-write-wrap {
            padding: 1rem 0.55rem;
        }

        .exercise-shell {
            padding: 0.6rem;
            border-radius: 1.1rem;
        }

        .exercise-card {
            padding: 0.6rem;
        }

        .listen-row {
            padding: 0.55rem;
        }

        .row-grid {
            grid-template-columns: 26px 52px 22px minmax(0, 1fr);
            column-gap: 0.45rem;
            row-gap: 0.45rem;
        }

        .row-number {
            grid-column: 1;
            grid-row: 1 / span 2;
            align-self: center;
            width: 26px;
            font-size: 1.4rem;
        }

        .row-grid .audio-btn {
            grid-column: 2;
            grid-row: 1 / span 2;
            align-self: center;
            width: 48px;
            height: 42px;
        }

        .row-grid .fixed-letter {
            font-size: 1.25rem;
            width: 1rem;
        }

        .word-input {
            height: 42px;
            font-size: 1rem;
        }

        .second-part-label {
            grid-column: 3;
            grid-row: 2;
        }

        .second-part-input {
            grid-column: 4;
            grid-row: 2;
        }
    }
</style>
@endsection

@section('content')
<div class="listen-write-wrap">
    <div class="w-full max-w-5xl">
        <header class="w-full flex flex-col items-center justify-center mb-6 sm:mb-8 text-center">
            @include('slider.components.title-subtitle')
        </header>

        <div class="exercise-shell">
            <div class="exercise-card">
                <div class="space-y-4 sm:space-y-5">
                    @foreach($content['items'] as $index => $item)
                        <article class="listen-row">
                            <div class="row-grid">
                                <div class="row-number text-2xl font-black text-slate-800 dark:text-slate-100">{{ $index + 1 }}.</div>

                                <button
                                    type="button"
                                    class="audio-btn play-word"
                                    data-audio="{{ $item['audio'] }}"
                                    data-text="{{ $item['full'] }}"
                                    aria-label="Play item {{ $index + 1 }}"
                                >
                                    <i class="fa-solid fa-volume-high text-xl"></i>
                                </button>

                                <div class="fixed-letter">{{ $item['first_letter'] }}</div>

                                <input
                                    type="text"
                                    autocomplete="off"
                                    spellcheck="false"
                                    class="word-input"
                                    data-role="first"
                                    data-fixed="{{ $item['first_letter'] }}"
                                    data-answer="{{ $item['first_rest'] }}"
                                    aria-label="First word for item {{ $index + 1 }}"
                                >

                                <div class="fixed-letter second-part-label">{{ $item['second_letter'] }}</div>

                                <input
                                    type="text"
                                    autocomplete="off"
                                    spellcheck="false"
                                    class="word-input second-part-input"
                                    data-role="second"
                                    data-fixed="{{ $item['second_letter'] }}"
                                    data-answer="{{ $item['second_rest'] }}"
                                    aria-label="Second word for item {{ $index + 1 }}"
                                >
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-6 flex flex-wrap items-center justify-center gap-3">
                    <button id="revealBtn" type="button" class="control-btn reveal">
                        Reveal Correction
                    </button>

                    <button id="resetBtn" type="button" class="control-btn reset">
                        Reset
                    </button>
                </div>

                <p id="feedback" class="mt-4 text-center text-lg font-black text-slate-600 dark:text-slate-300"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    (function () {
        const playButtons = Array.from(document.querySelectorAll('.play-word'));
        const inputs = Array.from(document.querySelectorAll('.word-input'));
        const revealBtn = document.getElementById('revealBtn');
        const resetBtn = document.getElementById('resetBtn');
        const feedback = document.getElementById('feedback');

        let activeAudio = null;
        let activeButton = null;

        const fx = {
            correct: new Audio('/slider/sounds/correct.wav'),
            wrong: new Audio('/slider/sounds/wrong.wav'),
            reveal: new Audio('/slider/sounds/success.wav')
        };

        function playFx(type) {
            const sound = fx[type];
            if (!sound) return;
            sound.pause();
            sound.currentTime = 0;
            sound.play().catch(() => {});
        }

        function cleanupAudioState() {
            if (activeButton) activeButton.classList.remove('playing');
            activeAudio = null;
            activeButton = null;
        }

        function speakFallback(text) {
            if (!('speechSynthesis' in window)) return;
            window.speechSynthesis.cancel();
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.rate = 0.9;
            utterance.pitch = 1;
            window.speechSynthesis.speak(utterance);
        }

        function normalize(value) {
            return (value || '')
                .toLowerCase()
                .replace(/[^a-z]/g, '')
                .trim();
        }

        function matchesInput(inputEl) {
            const fixed = normalize(inputEl.dataset.fixed || '');
            const expected = normalize(inputEl.dataset.answer || '');
            const typed = normalize(inputEl.value || '');

            return typed === expected || typed === (fixed + expected);
        }

        function markInput(inputEl, isCorrect) {
            inputEl.classList.remove('is-correct', 'is-wrong');
            inputEl.classList.add(isCorrect ? 'is-correct' : 'is-wrong');
        }

        function validateInput(inputEl, options = {}) {
            const { silent = false } = options;
            const typed = normalize(inputEl.value || '');

            if (!typed) {
                inputEl.classList.remove('is-correct', 'is-wrong');
                inputEl.dataset.validationState = '';
                return null;
            }

            const isCorrect = matchesInput(inputEl);
            markInput(inputEl, isCorrect);

            const nextState = isCorrect ? 'correct' : 'wrong';
            const previousState = inputEl.dataset.validationState || '';
            inputEl.dataset.validationState = nextState;

            if (!silent && previousState !== nextState) {
                playFx(isCorrect ? 'correct' : 'wrong');
            }

            return isCorrect;
        }

        playButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const url = button.dataset.audio || '';
                const text = button.dataset.text || '';

                if (activeAudio) {
                    activeAudio.pause();
                    activeAudio.currentTime = 0;
                    cleanupAudioState();
                }

                const audio = new Audio(url);
                activeAudio = audio;
                activeButton = button;
                button.classList.add('playing');

                audio.addEventListener('ended', cleanupAudioState, { once: true });
                audio.addEventListener('error', () => {
                    cleanupAudioState();
                    speakFallback(text);
                }, { once: true });

                audio.play().catch(() => {
                    cleanupAudioState();
                    speakFallback(text);
                });
            });
        });

        revealBtn?.addEventListener('click', () => {
            inputs.forEach((inputEl) => {
                inputEl.value = inputEl.dataset.answer || '';
                markInput(inputEl, true);
                inputEl.dataset.validationState = 'correct';
            });

            playFx('reveal');
            feedback.textContent = 'Corrections are now shown.';
            feedback.className = 'mt-4 text-center text-lg font-black text-indigo-600 dark:text-indigo-300';
        });

        resetBtn?.addEventListener('click', () => {
            inputs.forEach((inputEl) => {
                inputEl.value = '';
                inputEl.classList.remove('is-correct', 'is-wrong');
                inputEl.dataset.validationState = '';
            });
            feedback.textContent = '';
            feedback.className = 'mt-4 text-center text-lg font-black text-slate-600 dark:text-slate-300';

            if (activeAudio) {
                activeAudio.pause();
                activeAudio.currentTime = 0;
            }

            cleanupAudioState();
        });

        inputs.forEach((inputEl) => {
            inputEl.addEventListener('input', () => {
                validateInput(inputEl, { silent: true });
            });

            inputEl.addEventListener('blur', () => {
                validateInput(inputEl, { silent: false });
            });

            inputEl.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    validateInput(inputEl, { silent: false });
                }
            });
        });

        window.stopSlideAudio = function () {
            if (activeAudio) {
                activeAudio.pause();
                activeAudio.currentTime = 0;
            }
            cleanupAudioState();
        };
    })();
</script>
@endsection


