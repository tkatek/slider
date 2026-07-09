@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Challenge Question',
        'title'      => 'Challenge Question!',
        'subtitle'   => 'What is the main message of the text?',

        'options' => [
            [
                'letter'       => 'a',
                'text'         => 'People should avoid strangers.',
                'correct'      => false,
                'letter_class' => 'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-200',
            ],
            [
                'letter'       => 'b',
                'text'         => 'Empathy can make a positive difference in the world.',
                'correct'      => true,
                'letter_class' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-200',
            ],
            [
                'letter'       => 'c',
                'text'         => 'Words never hurt people.',
                'correct'      => false,
                'letter_class' => 'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-200',
            ],
            [
                'letter'       => 'd',
                'text'         => 'Only friends deserve empathy.',
                'correct'      => false,
                'letter_class' => 'bg-violet-100 text-violet-700 dark:bg-violet-500/15 dark:text-violet-200',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[900px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div id="challengeQuestion" class="mx-auto mt-6 w-full">
                <div class="grid gap-3 sm:gap-4">
                    @foreach($content['options'] as $option)
                        <button
                                type="button"
                                class="answer-option flex w-full items-center gap-4 rounded-2xl border border-slate-200 bg-white px-4 py-4 text-left text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:bg-emerald-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:border-emerald-400/40 dark:hover:bg-emerald-500/10 sm:px-5 sm:py-5"
                                data-correct="{{ $option['correct'] ? 'true' : 'false' }}"
                                data-letter-classes="{{ $option['letter_class'] }}"
                        >
                            <span class="answer-letter flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-base font-black uppercase shadow-sm sm:h-12 sm:w-12 sm:text-lg {{ $option['letter_class'] }}">
                                {{ $option['letter'] }}
                            </span>

                            <span class="min-w-0 text-base font-black leading-snug sm:text-xl">
                                {{ $option['text'] }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const game = document.getElementById('challengeQuestion');
            if (!game) return;

            const options = Array.from(game.querySelectorAll('.answer-option'));

            const baseButtonClasses = [
                'border-slate-200', 'bg-white', 'text-slate-800',
                'dark:border-slate-700', 'dark:bg-slate-900', 'dark:text-slate-100',
                'hover:-translate-y-0.5', 'hover:border-emerald-300', 'hover:bg-emerald-50',
                'dark:hover:border-emerald-400/40', 'dark:hover:bg-emerald-500/10'
            ];

            const allLetterColorClasses = [
                'bg-amber-100', 'text-amber-700', 'dark:bg-amber-500/15', 'dark:text-amber-200',
                'bg-emerald-100', 'text-emerald-700', 'dark:bg-emerald-500/15', 'dark:text-emerald-200',
                'bg-sky-100', 'text-sky-700', 'dark:bg-sky-500/15', 'dark:text-sky-200',
                'bg-violet-100', 'text-violet-700', 'dark:bg-violet-500/15', 'dark:text-violet-200',
                'bg-emerald-600', 'bg-rose-600', 'text-white'
            ];

            const correctButtonClasses = [
                'border-emerald-300', 'bg-emerald-50', 'text-emerald-950',
                'dark:border-emerald-400/40', 'dark:bg-emerald-500/10', 'dark:text-emerald-100'
            ];

            const wrongButtonClasses = [
                'border-rose-300', 'bg-rose-50', 'text-rose-950',
                'dark:border-rose-400/40', 'dark:bg-rose-500/10', 'dark:text-rose-100'
            ];

            function getLetterClasses(option) {
                return (option.dataset.letterClasses || '').split(' ').filter(Boolean);
            }

            function resetOption(option) {
                const letter = option.querySelector('.answer-letter');

                option.classList.remove(...correctButtonClasses, ...wrongButtonClasses);
                option.classList.add(...baseButtonClasses);

                letter.classList.remove(...allLetterColorClasses);
                letter.classList.add(...getLetterClasses(option));

                option.disabled = false;
            }

            function setCorrect(option) {
                const letter = option.querySelector('.answer-letter');

                option.classList.remove(...baseButtonClasses, ...wrongButtonClasses);
                option.classList.add(...correctButtonClasses);

                letter.classList.remove(...allLetterColorClasses);
                letter.classList.add('bg-emerald-600', 'text-white');
            }

            function setWrong(option) {
                const letter = option.querySelector('.answer-letter');

                option.classList.remove(...baseButtonClasses, ...correctButtonClasses);
                option.classList.add(...wrongButtonClasses);

                letter.classList.remove(...allLetterColorClasses);
                letter.classList.add('bg-rose-600', 'text-white');
            }

            function resetGame() {
                options.forEach(resetOption);
            }

            options.forEach((option) => {
                option.addEventListener('click', () => {
                    const isCorrect = option.dataset.correct === 'true';

                    if (isCorrect) {
                        setCorrect(option);

                        options.forEach((btn) => {
                            btn.disabled = true;
                            btn.classList.remove(
                                'hover:-translate-y-0.5',
                                'hover:border-emerald-300',
                                'hover:bg-emerald-50',
                                'dark:hover:border-emerald-400/40',
                                'dark:hover:bg-emerald-500/10'
                            );
                        });

                        return;
                    }

                    setWrong(option);

                    setTimeout(() => {
                        resetOption(option);
                    }, 700);
                });
            });

            window.resetSlide = resetGame;
        })();
    </script>
@endsection