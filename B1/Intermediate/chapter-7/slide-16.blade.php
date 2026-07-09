<?php

$content = [
    'title'    => 'Practice 6',
    'subtitle' => 'Present Simple',

    'part_a_title' => 'A. Complete the sentences with the correct form of the verb in Present Simple.',
    'part_b_title' => 'B. Write true sentences about people in general.',
    'example'      => 'People usually help their friends.',

    'sentences' => [
        [
            'before'  => 'Firstborn children often',
            'verb'    => 'be',
            'after'   => 'responsible.',
            'answer'  => 'are',
            'answers' => ['are'],
        ],
        [
            'before'  => 'Middle children usually',
            'verb'    => 'get along',
            'after'   => 'well with others.',
            'answer'  => 'get along',
            'answers' => ['get along'],
        ],
        [
            'before'  => 'Youngest children',
            'verb'    => 'learn',
            'after'   => 'from older siblings.',
            'answer'  => 'learn',
            'answers' => ['learn'],
        ],
        [
            'before'  => 'Only children',
            'verb'    => 'receive',
            'after'   => 'a lot of attention.',
            'answer'  => 'receive',
            'answers' => ['receive'],
        ],
        [
            'before'  => 'Twins',
            'verb'    => 'share',
            'after'   => 'a close bond.',
            'answer'  => 'share',
            'answers' => ['share'],
        ],
        [
            'before'  => 'Gap children',
            'verb'    => 'mature',
            'after'   => 'quickly.',
            'answer'  => 'mature',
            'answers' => ['mature'],
        ],
    ],

    'open_writing' => [
        ['number' => 1],
        ['number' => 2],
        ['number' => 3],
    ],
];

?>

@extends('slider.simple-layout')

@section('content')
    @php
        $theme = $theme ?? [];
        $buttonGradient = trim((string)($theme['button_primary_color'] ?? 'bg-gradient-to-tr from-emerald-600 via-green-500 to-teal-500'));
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center px-3 py-4 sm:px-4 md:px-6 lg:px-8">
        @include('slider.components.title-subtitle', [
            'title' => $content['title'],
            'subtitle' => $content['subtitle'],
        ])

        <section class="mx-auto mt-4 grid w-full max-w-7xl gap-4 md:grid-cols-[minmax(0,1.15fr)_minmax(280px,0.85fr)] xl:grid-cols-[1.2fr_0.8fr]">

            {{-- PART A --}}
            <article class="overflow-hidden rounded-2xl border border-emerald-200 bg-white/90 shadow-[0_22px_60px_-42px_rgba(5,150,105,0.45)] dark:border-emerald-900/60 dark:bg-slate-900/80">
                <div class="bg-gradient-to-r from-emerald-700 via-green-600 to-teal-600 px-4 py-2 text-center">
                    <h2 class="text-[11px] font-black uppercase tracking-wide text-white sm:text-xs md:text-sm">
                        {{ $content['part_a_title'] }}
                    </h2>
                </div>

                <div class="grid gap-2.5 p-3 sm:p-4">
                    @foreach($content['sentences'] as $index => $item)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-950/40 sm:p-3">
                            <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-xs font-extrabold leading-snug text-slate-900 dark:text-slate-50 sm:text-sm md:text-base">
                                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-lg bg-emerald-100 text-xs font-black text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-200 sm:h-8 sm:w-8">
                                    {{ $index + 1 }}
                                </span>

                                <span>{{ $item['before'] }}</span>

                                <input
                                        type="text"
                                        class="answer-input min-h-9 w-[120px] rounded-xl border-2 border-dashed border-slate-300 bg-white px-3 text-center text-sm font-black text-slate-950 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-50 dark:focus:ring-emerald-900/40 sm:w-[150px]"
                                        data-answer="{{ $item['answer'] }}"
                                        data-answers='@json($item['answers'])'
                                        autocomplete="off"
                                >

                                <span>({{ $item['verb'] }}) {{ $item['after'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>

            {{-- PART B --}}
            <article class="overflow-hidden rounded-2xl border border-emerald-200 bg-white/90 shadow-[0_22px_60px_-42px_rgba(5,150,105,0.45)] dark:border-emerald-900/60 dark:bg-slate-900/80">
                <div class="bg-gradient-to-r from-emerald-700 via-green-600 to-teal-600 px-4 py-2 text-center">
                    <h2 class="text-[11px] font-black uppercase tracking-wide text-white sm:text-xs md:text-sm">
                        {{ $content['part_b_title'] }}
                    </h2>
                </div>

                <div class="grid gap-3 p-3 sm:p-4">
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-3 py-2 dark:border-emerald-900/50 dark:bg-emerald-950/25">
                        <p class="text-xs font-black leading-snug text-emerald-900 dark:text-emerald-200 sm:text-sm">
                            Example: {{ $content['example'] }}
                        </p>
                    </div>

                    @foreach($content['open_writing'] as $item)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-950/40 sm:p-3">
                            <div class="flex items-center gap-2">
                                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-lg bg-emerald-100 text-xs font-black text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-200 sm:h-8 sm:w-8">
                                    {{ $item['number'] }}
                                </span>

                                <input
                                        type="text"
                                        class="open-input min-h-10 w-full rounded-2xl border-2 border-dashed border-slate-300 bg-white px-3 text-sm font-black text-slate-950 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-50 dark:focus:ring-emerald-900/40"
                                        autocomplete="off"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>
        </section>

        <section class="mx-auto mt-4 grid w-full max-w-7xl grid-cols-2 gap-3">
            <button
                    type="button"
                    id="checkAnswersBtn"
                    class="min-h-11 rounded-full px-5 py-2.5 text-sm font-black text-white shadow-lg transition hover:-translate-y-0.5 {{ $buttonGradient }}"
            >
                Check answers
            </button>

            <button
                    type="button"
                    id="revealAnswersBtn"
                    class="min-h-11 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
            >
                Show answers
            </button>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const answerInputs = Array.from(document.querySelectorAll('.answer-input'));
            const openInputs = Array.from(document.querySelectorAll('.open-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');

            let isRevealed = false;

            const sfx = {
                tap: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            function playSfx(type) {
                const sound = sfx[type];
                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function normalize(value) {
                return String(value || '').trim().toLowerCase().replace(/\s+/g, ' ');
            }

            function getAnswers(input) {
                try {
                    return JSON.parse(input.dataset.answers || '[]');
                } catch (e) {
                    return [input.dataset.answer || ''];
                }
            }

            const neutralInputClasses = [
                'border-slate-300',
                'bg-white',
                'text-slate-950',
                'dark:border-slate-700',
                'dark:bg-slate-950/70',
                'dark:text-slate-50',
            ];

            const correctInputClasses = [
                'border-emerald-500',
                'bg-emerald-50',
                'text-emerald-800',
                'dark:border-emerald-400',
                'dark:bg-emerald-950/45',
                'dark:text-emerald-100',
            ];

            const wrongInputClasses = [
                'border-rose-500',
                'bg-rose-50',
                'text-rose-800',
                'dark:border-rose-400',
                'dark:bg-rose-950/45',
                'dark:text-rose-100',
            ];

            const allInputStateClasses = [
                ...neutralInputClasses,
                ...correctInputClasses,
                ...wrongInputClasses,
            ];

            function setInputState(input, state = 'neutral') {
                input.classList.remove(...allInputStateClasses);

                if (state === 'correct') {
                    input.classList.add(...correctInputClasses);
                    return;
                }

                if (state === 'wrong') {
                    input.classList.add(...wrongInputClasses);
                    return;
                }

                input.classList.add(...neutralInputClasses);
            }

            function checkAnswers() {
                let correctCount = 0;

                answerInputs.forEach(input => {
                    const answers = getAnswers(input);
                    const isCorrect = answers.some(answer => normalize(input.value) === normalize(answer));

                    setInputState(input, isCorrect ? 'correct' : 'wrong');

                    if (isCorrect) correctCount++;
                });

                playSfx(correctCount === answerInputs.length && answerInputs.length > 0 ? 'correct' : 'wrong');
            }

            function revealAnswers() {
                answerInputs.forEach(input => {
                    input.value = input.dataset.answer || '';
                    setInputState(input, 'correct');
                });

                isRevealed = true;
                revealBtn.textContent = 'Try again';
                playSfx('success');
            }

            function resetAnswers(playSound = true) {
                answerInputs.forEach(input => {
                    input.value = '';
                    setInputState(input, 'neutral');
                });

                openInputs.forEach(input => {
                    input.value = '';
                    input.classList.remove(...allInputStateClasses);
                    input.classList.add(...neutralInputClasses);
                });

                isRevealed = false;
                revealBtn.textContent = 'Show answers';

                if (playSound) playSfx('tap');
            }

            answerInputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));
                input.addEventListener('input', () => setInputState(input, 'neutral'));
                setInputState(input, 'neutral');
            });

            openInputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));
            });

            checkBtn?.addEventListener('click', checkAnswers);

            revealBtn?.addEventListener('click', () => {
                if (isRevealed) {
                    resetAnswers(true);
                } else {
                    revealAnswers();
                }
            });

            window.resetSlide = () => resetAnswers(false);
        })();
    </script>
@endsection
