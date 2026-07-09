<?php

$content = [
    'title'    => 'Practice 7',
    'subtitle' => 'Modals (May / Can)',

    'part_a_title' => 'A. Choose the correct word to complete the sentences.',
    'part_b_title' => 'B. Rewrite the sentences using may or can.',

    'choices' => [
        [
            'sentence_before' => 'Firstborn children',
            'options' => ['may', 'can'],
            'sentence_after' => 'feel pressure.',
            'answer' => 'may',
        ],
        [
            'sentence_before' => 'Middle children',
            'options' => ['can', 'may'],
            'sentence_after' => 'be good at solving problems.',
            'answer' => 'can',
        ],
        [
            'sentence_before' => 'Youngest children',
            'options' => ['may', 'can'],
            'sentence_after' => 'take risks.',
            'answer' => 'may',
        ],
        [
            'sentence_before' => 'Only children',
            'options' => ['may', 'can'],
            'sentence_after' => 'become independent.',
            'answer' => 'can',
        ],
        [
            'sentence_before' => 'Twins',
            'options' => ['can', 'may'],
            'sentence_after' => 'understand each other very well.',
            'answer' => 'can',
        ],
        [
            'sentence_before' => 'Gap children',
            'options' => ['can', 'may'],
            'sentence_after' => 'mature quickly.',
            'answer' => 'may',
        ],
    ],

    'rewrites' => [
        [
            'prompt' => 'It is possible that they feel unsure.',
            'prefix' => 'They',
            'answer' => 'may feel unsure.',
            'answers' => [
                'may feel unsure.',
                'may feel unsure',
            ],
        ],
        [
            'prompt' => 'They are able to get along with others.',
            'prefix' => 'They',
            'answer' => 'can get along with others.',
            'answers' => [
                'can get along with others.',
                'can get along with others',
            ],
        ],
        [
            'prompt' => 'It is possible that he depends on others.',
            'prefix' => 'He',
            'answer' => 'may depend on others.',
            'answers' => [
                'may depend on others.',
                'may depend on others',
            ],
        ],
        [
            'prompt' => 'They are able to learn from older siblings.',
            'prefix' => 'They',
            'answer' => 'can learn from older siblings.',
            'answers' => [
                'can learn from older siblings.',
                'can learn from older siblings',
            ],
        ],
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
                    @foreach($content['choices'] as $index => $item)
                        <div
                                class="choice-card rounded-2xl border border-slate-200 bg-slate-50 p-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-950/40 sm:p-3"
                                data-answer="{{ $item['answer'] }}"
                        >
                            <div class="flex flex-wrap items-center gap-x-2 gap-y-2 text-xs font-extrabold leading-snug text-slate-900 dark:text-slate-50 sm:text-sm md:text-base">
                                <span class="grid h-7 w-7 shrink-0 place-items-center rounded-lg bg-emerald-100 text-xs font-black text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-200 sm:h-8 sm:w-8">
                                    {{ $index + 1 }}
                                </span>

                                <span>{{ $item['sentence_before'] }}</span>

                                <div class="inline-flex shrink-0 items-center gap-2">
                                    @foreach($item['options'] as $option)
                                        <button
                                                type="button"
                                                class="choice-btn rounded-xl border border-emerald-200 bg-white px-4 py-1.5 text-xs font-black text-emerald-700 shadow-sm transition hover:border-emerald-400 hover:bg-emerald-50 dark:border-emerald-800 dark:bg-slate-900 dark:text-emerald-300 dark:hover:bg-emerald-950/40 sm:text-sm"
                                                data-value="{{ $option }}"
                                        >
                                            {{ $option }}
                                        </button>
                                    @endforeach
                                </div>

                                <span>{{ $item['sentence_after'] }}</span>
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

                <div class="grid gap-2.5 p-3 sm:p-4">
                    @foreach($content['rewrites'] as $index => $item)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-950/40 sm:p-3">
                            <p class="mb-2 flex gap-2 text-xs font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-sm">
                                <span class="text-emerald-700 dark:text-emerald-300">{{ $index + 1 }}.</span>
                                <span>{{ $item['prompt'] }}</span>
                            </p>

                            <div class="flex items-center gap-2">
                                <span class="shrink-0 text-xs font-black text-slate-900 dark:text-slate-50 sm:text-sm">
                                    {{ $item['prefix'] }}
                                </span>

                                <input
                                        type="text"
                                        class="rewrite-input min-h-10 w-full rounded-2xl border-2 border-dashed border-slate-300 bg-white px-3 text-sm font-black text-slate-950 outline-none transition focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-50 dark:focus:ring-emerald-900/40"
                                        data-answer="{{ $item['answer'] }}"
                                        data-answers='@json($item['answers'])'
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
            const choiceCards = Array.from(document.querySelectorAll('.choice-card'));
            const rewriteInputs = Array.from(document.querySelectorAll('.rewrite-input'));
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

            function clearChoiceState(card) {
                card.querySelectorAll('.choice-btn').forEach(btn => {
                    btn.classList.remove(
                        'bg-green-600',
                        'bg-emerald-500',
                        'bg-rose-500',
                        'text-white'
                    );

                    btn.classList.add('text-slate-600', 'dark:text-slate-300');
                });
            }

            function setChoiceSelected(button) {
                const card = button.closest('.choice-card');
                clearChoiceState(card);

                button.classList.remove('text-slate-600', 'dark:text-slate-300');
                button.classList.add('bg-green-600', 'text-white');

                card.dataset.selected = button.dataset.value;
                playSfx('tap');
            }

            function markChoice(card) {
                const selected = card.dataset.selected || '';
                const answer = card.dataset.answer || '';

                card.querySelectorAll('.choice-btn').forEach(btn => {
                    btn.classList.remove('bg-green-600', 'bg-emerald-500', 'bg-rose-500', 'text-white');
                    btn.classList.add('text-slate-600', 'dark:text-slate-300');

                    if (btn.dataset.value === selected) {
                        btn.classList.remove('text-slate-600', 'dark:text-slate-300');
                        btn.classList.add(selected === answer ? 'bg-emerald-500' : 'bg-rose-500', 'text-white');
                    }
                });

                return selected === answer;
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
                const total = choiceCards.length + rewriteInputs.length;

                choiceCards.forEach(card => {
                    if (markChoice(card)) correctCount++;
                });

                rewriteInputs.forEach(input => {
                    const answers = getAnswers(input);
                    const isCorrect = answers.some(answer => normalize(input.value) === normalize(answer));

                    setInputState(input, isCorrect ? 'correct' : 'wrong');

                    if (isCorrect) correctCount++;
                });

                playSfx(correctCount === total ? 'correct' : 'wrong');
            }

            function revealAnswers() {
                choiceCards.forEach(card => {
                    const answer = card.dataset.answer || '';
                    card.dataset.selected = answer;

                    card.querySelectorAll('.choice-btn').forEach(btn => {
                        btn.classList.remove('bg-green-600', 'bg-rose-500', 'bg-emerald-500', 'text-white');
                        btn.classList.add('text-slate-600', 'dark:text-slate-300');

                        if (btn.dataset.value === answer) {
                            btn.classList.remove('text-slate-600', 'dark:text-slate-300');
                            btn.classList.add('bg-emerald-500', 'text-white');
                        }
                    });
                });

                rewriteInputs.forEach(input => {
                    input.value = input.dataset.answer || '';
                    setInputState(input, 'correct');
                });

                isRevealed = true;
                revealBtn.textContent = 'Try again';
                playSfx('success');
            }

            function resetAnswers(playSound = true) {
                choiceCards.forEach(card => {
                    card.dataset.selected = '';
                    clearChoiceState(card);
                });

                rewriteInputs.forEach(input => {
                    input.value = '';
                    setInputState(input, 'neutral');
                });

                isRevealed = false;
                revealBtn.textContent = 'Show answers';

                if (playSound) playSfx('tap');
            }

            document.querySelectorAll('.choice-btn').forEach(button => {
                button.addEventListener('click', () => setChoiceSelected(button));
            });

            rewriteInputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));
                input.addEventListener('input', () => setInputState(input, 'neutral'));
                setInputState(input, 'neutral');
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
