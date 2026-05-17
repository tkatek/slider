<?php
$content = [
    'title' => 'Quick wrap up!',
    'subtitle' => 'Listen and write the words.',

    'items' => [
        [
            'full' => 'blonde hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/blonde-hair.mpeg'),
            'words' => [
                ['first_letter' => 'b', 'answer' => 'londe'],
                ['first_letter' => 'h', 'answer' => 'air'],
            ],
        ],
        [
            'full' => 'dark hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/dark-hair.mpeg'),
            'words' => [
                ['first_letter' => 'd', 'answer' => 'ark'],
                ['first_letter' => 'h', 'answer' => 'air'],
            ],
        ],
        [
            'full' => 'ginger hair',
            'audio' => materialAsset('slider/A2/Beginner/chapter-7/audios/slide18/ginger-hair.mpeg'),
            'words' => [
                ['first_letter' => 'g', 'answer' => 'inger'],
                ['first_letter' => 'h', 'answer' => 'air'],
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['title'])

@section('content')
    <main class="min-h-[100dvh] w-full flex items-center justify-center px-3 py-5 sm:px-5 sm:py-6 lg:px-8">
        <div class="w-full max-w-5xl">
            <header class="mb-5 text-center sm:mb-6 lg:mb-7">
                @include('slider.components.title-subtitle')
            </header>

            <section class="relative overflow-hidden rounded-[2rem] border border-indigo-200/70 bg-white/65 p-3 shadow-2xl shadow-slate-900/10 backdrop-blur-xl dark:border-indigo-400/20 dark:bg-slate-950/35 dark:shadow-none sm:p-4 lg:p-5">
                <div class="pointer-events-none absolute -left-20 -top-24 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl dark:bg-indigo-400/15"></div>
                <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-sky-400/20 blur-3xl dark:bg-sky-400/10"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-40 w-72 -translate-x-1/2 rounded-full bg-violet-400/10 blur-3xl dark:bg-violet-400/10"></div>

                <div class="relative rounded-[1.5rem] border border-white/80 bg-white/90 p-3 shadow-xl shadow-slate-900/5 dark:border-slate-700/40 dark:bg-slate-950/70 sm:p-4 lg:p-5">
                    <div class="mb-4 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl border border-indigo-100 bg-indigo-50/80 px-4 py-3 dark:border-indigo-400/20 dark:bg-indigo-500/10">
                            <div class="text-2xl">🎧</div>
                            <div class="mt-1 text-sm font-black text-slate-900 dark:text-slate-100">
                                Listen
                            </div>
                        </div>

                        <div class="rounded-2xl border border-sky-100 bg-sky-50/80 px-4 py-3 dark:border-sky-400/20 dark:bg-sky-500/10">
                            <div class="text-2xl">✍️</div>
                            <div class="mt-1 text-sm font-black text-slate-900 dark:text-slate-100">
                                Complete
                            </div>
                        </div>

                        <div class="rounded-2xl border border-violet-100 bg-violet-50/80 px-4 py-3 dark:border-violet-400/20 dark:bg-violet-500/10">
                            <div class="text-2xl">🔤</div>
                            <div class="mt-1 text-sm font-black text-slate-900 dark:text-slate-100">
                                Use The First Letter
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        @foreach($content['items'] as $itemIndex => $item)
                            <article class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-gradient-to-br from-white to-slate-50/90 p-3 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-500/10 dark:border-slate-700/50 dark:from-slate-900/85 dark:to-slate-950/85 dark:hover:border-indigo-400/30 sm:p-4">
                                <div class="absolute inset-y-0 left-0 w-1 bg-gradient-to-b from-indigo-500 to-sky-500"></div>

                                <div class="flex flex-col gap-3 md:grid md:grid-cols-[auto_minmax(0,1fr)] md:items-center md:gap-4">
                                    <button
                                            type="button"
                                            class="play-word grid h-12 w-full place-items-center rounded-2xl border-2 border-slate-200 bg-white text-slate-700 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700 hover:shadow-lg hover:shadow-indigo-500/15 active:scale-95 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100 dark:hover:border-indigo-300/70 dark:hover:bg-indigo-500/10 dark:hover:text-indigo-200 md:w-16"
                                            data-audio="{{ $item['audio'] }}"
                                            data-text="{{ $item['full'] }}"
                                            aria-label="Play audio"
                                    >
                                        <i class="fa-solid fa-volume-high text-xl"></i>
                                    </button>

                                    <div class="grid gap-3 sm:grid-cols-2">
                                        @foreach($item['words'] as $wordIndex => $word)
                                            <label class="grid grid-cols-[3rem_minmax(0,1fr)] items-center gap-2 rounded-2xl border border-slate-200/80 bg-white/85 p-2 shadow-inner shadow-slate-900/[0.03] dark:border-slate-700/50 dark:bg-slate-950/45">
                                            <span class="grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-indigo-100 to-sky-100 text-2xl font-black leading-none text-indigo-700 dark:from-indigo-500/15 dark:to-sky-500/15 dark:text-indigo-200">
                                                {{ $word['first_letter'] }}
                                            </span>

                                                <input
                                                        type="text"
                                                        autocomplete="off"
                                                        spellcheck="false"
                                                        class="word-input h-11 min-w-0 rounded-xl border-2 border-slate-200 bg-white px-3 text-center text-lg font-black tracking-[-0.02em] text-slate-900 shadow-sm transition-all duration-200 placeholder:text-slate-300 focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/15 dark:border-slate-600 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-600 dark:focus:border-indigo-300"
                                                        data-fixed="{{ $word['first_letter'] }}"
                                                        data-answer="{{ $word['answer'] }}"
                                                        aria-label="Missing letters"
                                                >
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-5 flex flex-col-reverse items-stretch justify-center gap-3 sm:flex-row sm:items-center">
                        <button
                                id="resetBtn"
                                type="button"
                                class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-black text-slate-700 shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-slate-50 hover:shadow-lg active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 sm:min-w-36"
                        >
                            <i class="fa-solid fa-rotate-left"></i>
                            Reset
                        </button>

                        <button
                                id="revealBtn"
                                type="button"
                                class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-orange-500 to-amber-500 px-5 py-3 text-sm font-black text-white shadow-lg shadow-orange-500/25 transition-all duration-200 hover:-translate-y-0.5 hover:from-orange-600 hover:to-amber-500 hover:shadow-xl hover:shadow-orange-500/30 active:scale-95 sm:min-w-52"
                        >
                            <i class="fa-solid fa-circle-check"></i>
                            Reveal Correction
                        </button>
                    </div>

                    <p id="feedback" class="mt-4 min-h-7 text-center text-base font-black text-slate-600 dark:text-slate-300 sm:text-lg"></p>
                </div>
            </section>
        </div>
    </main>
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

            const sounds = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                reveal: new Audio('/slider/sounds/success.wav')
            };

            const playingClasses = [
                '!border-indigo-500',
                '!bg-indigo-50',
                '!text-indigo-700',
                '!shadow-lg',
                '!shadow-indigo-500/20',
                '!ring-4',
                '!ring-indigo-500/15',
                'dark:!border-indigo-300',
                'dark:!bg-indigo-500/15',
                'dark:!text-indigo-200'
            ];

            const correctClasses = [
                '!border-emerald-500',
                '!bg-emerald-50',
                '!text-emerald-700',
                '!ring-4',
                '!ring-emerald-500/15',
                'dark:!border-emerald-300',
                'dark:!bg-emerald-500/10',
                'dark:!text-emerald-300'
            ];

            const wrongClasses = [
                '!border-red-500',
                '!bg-red-50',
                '!text-red-700',
                '!ring-4',
                '!ring-red-500/15',
                'dark:!border-red-300',
                'dark:!bg-red-500/10',
                'dark:!text-red-300'
            ];

            function playSound(type) {
                const sound = sounds[type];

                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function stopActiveAudio() {
                if (activeAudio) {
                    activeAudio.pause();
                    activeAudio.currentTime = 0;
                }

                if (activeButton) {
                    activeButton.classList.remove(...playingClasses);
                }

                activeAudio = null;
                activeButton = null;
            }

            function speakFallback(text) {
                if (!('speechSynthesis' in window)) return;

                window.speechSynthesis.cancel();

                const voice = new SpeechSynthesisUtterance(text);
                voice.rate = 0.9;
                voice.pitch = 1;

                window.speechSynthesis.speak(voice);
            }

            function normalize(value) {
                return (value || '')
                    .toLowerCase()
                    .replace(/[^a-z]/g, '')
                    .trim();
            }

            function isCorrectAnswer(input) {
                const firstLetter = normalize(input.dataset.fixed);
                const answer = normalize(input.dataset.answer);
                const typed = normalize(input.value);

                return typed === answer || typed === firstLetter + answer;
            }

            function clearInputState(input) {
                input.classList.remove(...correctClasses, ...wrongClasses);
            }

            function markInput(input, isCorrect) {
                clearInputState(input);
                input.classList.add(...(isCorrect ? correctClasses : wrongClasses));
            }

            function checkInput(input, silent = false) {
                const typed = normalize(input.value);

                if (!typed) {
                    clearInputState(input);
                    input.dataset.state = '';
                    return;
                }

                const correct = isCorrectAnswer(input);
                const newState = correct ? 'correct' : 'wrong';
                const oldState = input.dataset.state || '';

                markInput(input, correct);
                input.dataset.state = newState;

                if (!silent && oldState !== newState) {
                    playSound(correct ? 'correct' : 'wrong');
                }
            }

            function resetActivity() {
                inputs.forEach((input) => {
                    input.value = '';
                    input.dataset.state = '';
                    clearInputState(input);
                });

                feedback.textContent = '';
                feedback.className = 'mt-4 min-h-7 text-center text-base font-black text-slate-600 dark:text-slate-300 sm:text-lg';

                stopActiveAudio();
            }

            playButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const audioUrl = button.dataset.audio || '';
                    const fallbackText = button.dataset.text || '';

                    stopActiveAudio();

                    activeAudio = new Audio(audioUrl);
                    activeButton = button;

                    button.classList.add(...playingClasses);

                    activeAudio.addEventListener('ended', stopActiveAudio, { once: true });

                    activeAudio.addEventListener('error', () => {
                        stopActiveAudio();
                        speakFallback(fallbackText);
                    }, { once: true });

                    activeAudio.play().catch(() => {
                        stopActiveAudio();
                        speakFallback(fallbackText);
                    });
                });
            });

            inputs.forEach((input) => {
                input.addEventListener('input', () => checkInput(input, true));
                input.addEventListener('blur', () => checkInput(input, false));

                input.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        checkInput(input, false);
                    }
                });
            });

            revealBtn?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = input.dataset.answer || '';
                    input.dataset.state = 'correct';
                    markInput(input, true);
                });

                feedback.textContent = 'Corrections are now shown.';
                feedback.className = 'mt-4 min-h-7 text-center text-base font-black text-indigo-600 dark:text-indigo-300 sm:text-lg';

                playSound('reveal');
            });

            resetBtn?.addEventListener('click', resetActivity);

            window.stopSlideAudio = stopActiveAudio;
            window.resetSlide = resetActivity;
        })();
    </script>
@endsection