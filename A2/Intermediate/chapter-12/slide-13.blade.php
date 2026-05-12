<?php
$content = [
    'page_title' => 'Speaking Time',
    'title' => 'Speaking time',
    'subtitle' => 'Body language',
    'instruction' => 'Choose a card, read the question, then select the correct answer.',
    'box_label' => 'Question',

    'grid' => [
        'cols' => [
            'base' => 1,
            'sm' => 2,
            'md' => 2,
            'lg' => 4,
        ],
        'gap' => 'gap-3 sm:gap-4',
        'card_height' => 'h-32 sm:h-36 lg:h-40',
    ],

    'items' => [
        [
            'label' => '😊🤝 Smile',
            'question' => 'What does it mean when we smile?',
            'options' => [
                'We are angry',
                'We are happy or friendly',
                'We are shy',
                'We are nervous',
            ],
            'correct' => 1,
            'feedback' => 'Correct! A smile usually shows that we are happy or friendly.',
        ],
        [
            'label' => '🙅‍♂️😐 Crossing Arms',
            'question' => 'What can crossing our arms show?',
            'options' => [
                'We are tired',
                'We are happy',
                'We are angry, shy, or not comfortable',
                'We are confident',
            ],
            'correct' => 2,
            'feedback' => 'Correct! Crossing arms can show anger, shyness, or discomfort.',
        ],
        [
            'label' => '👀🤝 Eye Contact',
            'question' => 'Why is eye contact important?',
            'options' => [
                'Because it shows sadness',
                'Because it shows nervousness',
                'Because it shows confidence and respect',
                'Because it shows anger',
            ],
            'correct' => 2,
            'feedback' => 'Correct! Eye contact can show confidence and respect.',
        ],
        [
            'label' => '🙅‍♀️🤔 True or False',
            'question' => 'Crossing arms can mean shyness.',
            'options' => [
                'True',
                'False',
            ],
            'correct' => 0,
            'feedback' => 'Correct! Crossing arms can sometimes mean shyness.',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = array_replace_recursive([
        'page_title' => 'Choose the Correct Answer',
        'title' => 'Choose the Correct Answer',
        'subtitle' => '',
        'instruction' => 'Choose a card, read the question, then select the correct answer.',
        'box_label' => 'Question',
        'retake_label' => 'Retake',
        'close_label' => 'Close',
        'next_label' => 'Next',
        'try_again_label' => 'Try again',
        'correct_label' => 'Correct!',
        'wrong_label' => 'Not correct',
        'complete_title' => 'Great job!',
        'complete_subtitle' => 'You answered all questions correctly.',

        'grid' => [
            'cols' => [
                'base' => 1,
                'sm' => 2,
                'md' => 3,
                'lg' => 5,
            ],
            'gap' => 'gap-3 sm:gap-4',
            'card_height' => 'h-32 sm:h-36 lg:h-40',
        ],

        'sounds' => [
            'open' => materialAsset('slider/sounds/tap.wav'),
            'correct' => materialAsset('slider/sounds/correct.wav'),
            'wrong' => materialAsset('slider/sounds/wrong.wav'),
            'reset' => materialAsset('slider/sounds/click.wav'),
        ],

        'items' => [],
    ], $content ?? []);

    $cols = $content['grid']['cols'];

    $gridCols = "grid-cols-{$cols['base']} sm:grid-cols-{$cols['sm']} md:grid-cols-{$cols['md']} lg:grid-cols-{$cols['lg']}";

    $items = collect($content['items'] ?? [])
        ->map(function ($item) {
            if (!is_array($item)) {
                return null;
            }

            $options = collect($item['options'] ?? [])
                ->map(fn ($option) => (string) $option)
                ->filter(fn ($option) => trim($option) !== '')
                ->values()
                ->all();

            $image = (string) ($item['image'] ?? '');

            if (
                $image !== ''
                && !str_starts_with($image, 'http')
                && !str_starts_with($image, '/')
                && !str_starts_with($image, 'data:')
            ) {
                $image = materialAsset($image);
            }

            return [
                'label' => (string) ($item['label'] ?? ''),
                'question' => (string) ($item['question'] ?? $item['prompt'] ?? ''),
                'image' => $image,
                'options' => $options,
                'correct' => (int) ($item['correct'] ?? $item['answer'] ?? $item['correct_answer'] ?? 0),
                'feedback' => (string) ($item['feedback'] ?? ''),
            ];
        })
        ->filter(fn ($item) =>
            $item
            && count($item['options']) >= 2
            && isset($item['options'][$item['correct']])
            && (trim($item['question']) !== '' || trim($item['image']) !== '')
        )
        ->take(5)
        ->values();

    $cardGradients = [
        'from-indigo-500 to-blue-500',
        'from-emerald-500 to-teal-500',
        'from-orange-500 to-amber-500',
        'from-pink-500 to-rose-500',
        'from-violet-500 to-purple-500',
    ];

    $cardSoftGradients = [
        'from-indigo-50 to-blue-50 dark:from-indigo-950/40 dark:to-blue-950/30',
        'from-emerald-50 to-teal-50 dark:from-emerald-950/40 dark:to-teal-950/30',
        'from-orange-50 to-amber-50 dark:from-orange-950/40 dark:to-amber-950/30',
        'from-pink-50 to-rose-50 dark:from-pink-950/40 dark:to-rose-950/30',
        'from-violet-50 to-purple-50 dark:from-violet-950/40 dark:to-purple-950/30',
    ];
@endphp

@section('title', $content['page_title'])

@section('content')
    <main data-choice-game class="min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[92rem] items-center px-4 py-5 sm:px-8 lg:px-10">
            <section class="w-full">
                <div class="grid place-items-center gap-4 text-center">
                    @include('slider.components.title-subtitle')

                    <section class="w-full">
                        <div class="rounded-[2rem] border border-white/70 bg-white/55 p-4 shadow-2xl shadow-slate-900/10 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/50 sm:p-5 lg:p-6">
                            <div class="mb-4 flex flex-wrap items-center justify-between gap-3 text-left">
                                <div class="rounded-2xl border border-white/70 bg-white/80 px-4 py-3 shadow-sm dark:border-white/10 dark:bg-slate-900/70">
                                    <p class="text-sm font-black text-slate-950 dark:text-white sm:text-lg">
                                        {{ $content['instruction'] }}
                                    </p>

                                    <p class="mt-1 text-xs font-black text-slate-500 dark:text-slate-400">
                                        Score:
                                        <span data-score-count>0</span>/<span>{{ $items->count() }}</span>
                                    </p>
                                </div>

                                <button
                                        type="button"
                                        class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-black text-slate-900 shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-50 active:translate-y-0 dark:border-white/10 dark:bg-slate-900 dark:text-white dark:hover:bg-slate-800"
                                        data-reset-choice
                                >
                                    {{ $content['retake_label'] }}
                                </button>
                            </div>

                            <div class="grid {{ $gridCols }} {{ $content['grid']['gap'] }}">
                                @foreach($items as $index => $item)
                                    <button
                                            type="button"
                                            class="group relative overflow-hidden rounded-[1.35rem] border border-white/80 bg-gradient-to-br {{ $cardSoftGradients[$index % count($cardSoftGradients)] }} {{ $content['grid']['card_height'] }} p-4 text-left shadow-xl shadow-slate-900/10 transition hover:-translate-y-1 hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-indigo-500/20 dark:border-white/10"
                                            data-choice-card
                                            data-index="{{ $index }}"
                                    >
                                        <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-white/50 blur-2xl dark:bg-white/10"></div>

                                        <div class="relative flex h-full flex-col justify-between">
                                            <div>
                                                <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br {{ $cardGradients[$index % count($cardGradients)] }} text-lg font-black text-white shadow-lg">
                                                    {{ $index + 1 }}
                                                </div>

                                                <p class="max-h-20 overflow-hidden text-base font-black leading-tight text-slate-950 dark:text-white sm:text-lg">
                                                    {{ $item['label'] ?: $content['box_label'] }}
                                                </p>
                                            </div>

                                            <div class="flex items-center justify-between gap-2">
                                                <span class="text-xs font-black uppercase tracking-[.16em] text-slate-500 dark:text-slate-400">
                                                    Choose
                                                </span>

                                                <span class="hidden rounded-full bg-emerald-500 px-2 py-1 text-[.65rem] font-black uppercase tracking-wide text-white" data-card-done>
                                                    Done
                                                </span>
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>

        <div class="fixed inset-0 z-[3000] hidden" data-question-modal>
            <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm dark:bg-black/75" data-close-question></div>

            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                <div class="grid w-full max-w-5xl gap-4 rounded-[2rem] border border-white/80 bg-white p-4 shadow-2xl dark:border-white/10 dark:bg-slate-900 sm:p-5 lg:grid-cols-[0.92fr_1.08fr]">
                    <div class="rounded-[1.5rem] bg-slate-50 p-4 text-left dark:bg-slate-950/70 sm:p-5">
                        <div class="mb-3 inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-black uppercase tracking-[.14em] text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-200">
                            <span data-modal-number>Question 1</span>
                        </div>

                        <div data-modal-image-wrap class="mb-4 hidden overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                            <img
                                    data-modal-image
                                    src=""
                                    alt=""
                                    class="h-56 w-full object-cover sm:h-64 lg:h-72"
                            >
                        </div>

                        <h2 data-modal-question class="text-2xl font-black leading-tight tracking-tight text-slate-950 dark:text-white sm:text-3xl">
                            Question text
                        </h2>

                        <p data-modal-feedback class="mt-3 hidden rounded-2xl px-4 py-3 text-sm font-black"></p>
                    </div>

                    <div class="flex flex-col justify-between gap-4 rounded-[1.5rem] border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-900 sm:p-5">
                        <div>
                            <p class="mb-3 text-left text-sm font-black text-slate-500 dark:text-slate-400">
                                Select the correct answer:
                            </p>

                            <div data-options-wrap class="grid gap-3"></div>
                        </div>

                        <div class="flex flex-wrap justify-end gap-2">
                            <button
                                    type="button"
                                    class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-black text-slate-900 shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-50 active:translate-y-0 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:hover:bg-slate-800"
                                    data-close-question
                            >
                                {{ $content['close_label'] }}
                            </button>

                            <button
                                    type="button"
                                    class="hidden inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 px-4 py-2.5 text-sm font-black text-white shadow-lg shadow-indigo-600/25 transition hover:-translate-y-0.5 active:translate-y-0"
                                    data-next-question
                            >
                                {{ $content['next_label'] }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed inset-0 z-[3100] hidden" data-complete-modal>
            <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm dark:bg-black/75"></div>

            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                <div class="w-full max-w-xl rounded-[2rem] border border-white/80 bg-white p-7 text-center shadow-2xl dark:border-white/10 dark:bg-slate-900">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-3xl bg-gradient-to-br from-emerald-500 to-teal-500 text-3xl font-black text-white shadow-xl">
                        ✓
                    </div>

                    <h2 class="text-3xl font-black text-slate-950 dark:text-white">
                        {{ $content['complete_title'] }}
                    </h2>

                    <p class="mt-2 text-sm font-bold text-slate-500 dark:text-slate-400">
                        {{ $content['complete_subtitle'] }}
                    </p>

                    <div class="mt-6 flex flex-wrap justify-center gap-2">
                        <button
                                type="button"
                                class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-black text-slate-900 shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-50 active:translate-y-0 dark:border-white/10 dark:bg-slate-950 dark:text-white dark:hover:bg-slate-800"
                                data-close-complete
                        >
                            {{ $content['close_label'] }}
                        </button>

                        <button
                                type="button"
                                class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-600 to-blue-600 px-4 py-2.5 text-sm font-black text-white shadow-lg shadow-indigo-600/25 transition hover:-translate-y-0.5 active:translate-y-0"
                                data-reset-choice
                        >
                            {{ $content['retake_label'] }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const root = document.querySelector('[data-choice-game]');
            if (!root) return;

            const ITEMS = @json($items);
            const SOUNDS = @json($content['sounds']);

            const labels = {
                correct: @json($content['correct_label']),
                wrong: @json($content['wrong_label']),
                tryAgain: @json($content['try_again_label']),
            };

            const state = {
                currentIndex: null,
                answered: new Set(),
                completedShown: false,
            };

            const audio = new Audio();

            const cards = Array.from(root.querySelectorAll('[data-choice-card]'));
            const scoreCount = root.querySelector('[data-score-count]');
            const questionModal = root.querySelector('[data-question-modal]');
            const completeModal = root.querySelector('[data-complete-modal]');
            const modalNumber = root.querySelector('[data-modal-number]');
            const modalQuestion = root.querySelector('[data-modal-question]');
            const modalFeedback = root.querySelector('[data-modal-feedback]');
            const modalImageWrap = root.querySelector('[data-modal-image-wrap]');
            const modalImage = root.querySelector('[data-modal-image]');
            const optionsWrap = root.querySelector('[data-options-wrap]');
            const nextButton = root.querySelector('[data-next-question]');

            const optionBaseClasses = [
                'rounded-2xl',
                'border-2',
                'border-slate-200',
                'bg-white',
                'px-4',
                'py-3',
                'text-left',
                'text-sm',
                'font-black',
                'leading-snug',
                'text-slate-800',
                'shadow-sm',
                'transition',
                'hover:-translate-y-0.5',
                'hover:border-indigo-300',
                'hover:shadow-md',
                'focus:outline-none',
                'focus:ring-4',
                'focus:ring-indigo-500/20',
                'dark:border-slate-700',
                'dark:bg-slate-950',
                'dark:text-slate-100',
                'dark:hover:border-indigo-400',
                'sm:text-base',
            ];

            const correctOptionClasses = [
                'border-emerald-400',
                'bg-emerald-100',
                'text-emerald-800',
                'dark:border-emerald-400',
                'dark:bg-emerald-500/20',
                'dark:text-emerald-100',
            ];

            const wrongOptionClasses = [
                'border-rose-400',
                'bg-rose-100',
                'text-rose-800',
                'dark:border-rose-400',
                'dark:bg-rose-500/20',
                'dark:text-rose-100',
            ];

            const cardCorrectClasses = [
                'ring-4',
                'ring-emerald-400/40',
                'border-emerald-400',
            ];

            function playSound(key) {
                if (!SOUNDS?.[key]) return;

                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.src = SOUNDS[key];
                    audio.play().catch(() => {});
                } catch (error) {}
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (error) {}
            }

            function updateScore() {
                if (scoreCount) {
                    scoreCount.textContent = String(state.answered.size);
                }
            }

            function openQuestion(index) {
                const item = ITEMS[index];
                if (!item) return;

                state.currentIndex = index;

                if (modalNumber) {
                    modalNumber.textContent = `Question ${index + 1}`;
                }

                if (modalQuestion) {
                    modalQuestion.textContent = item.question || '';
                }

                resetFeedback();

                if (item.image) {
                    modalImageWrap?.classList.remove('hidden');

                    if (modalImage) {
                        modalImage.src = item.image;
                        modalImage.alt = item.question || `Question ${index + 1}`;
                    }
                } else {
                    modalImageWrap?.classList.add('hidden');

                    if (modalImage) {
                        modalImage.src = '';
                    }
                }

                renderOptions(item, index);

                nextButton?.classList.add('hidden');
                questionModal?.classList.remove('hidden');
                playSound('open');
            }

            function resetFeedback() {
                if (!modalFeedback) return;

                modalFeedback.className = 'mt-3 hidden rounded-2xl px-4 py-3 text-sm font-black';
                modalFeedback.textContent = '';
            }

            function showFeedback(type, text) {
                if (!modalFeedback) return;

                modalFeedback.className = 'mt-3 rounded-2xl px-4 py-3 text-sm font-black';

                if (type === 'correct') {
                    modalFeedback.classList.add(
                        'bg-emerald-100',
                        'text-emerald-700',
                        'dark:bg-emerald-500/15',
                        'dark:text-emerald-200'
                    );
                } else {
                    modalFeedback.classList.add(
                        'bg-rose-100',
                        'text-rose-700',
                        'dark:bg-rose-500/15',
                        'dark:text-rose-200'
                    );
                }

                modalFeedback.textContent = text;
            }

            function renderOptions(item, index) {
                if (!optionsWrap) return;

                optionsWrap.innerHTML = '';

                item.options.forEach((option, optionIndex) => {
                    const button = document.createElement('button');

                    button.type = 'button';
                    button.textContent = option;
                    button.dataset.optionIndex = String(optionIndex);
                    button.classList.add(...optionBaseClasses);

                    if (state.answered.has(index)) {
                        button.disabled = true;
                        button.classList.add('cursor-not-allowed');

                        if (optionIndex === item.correct) {
                            button.classList.add(...correctOptionClasses);
                        }
                    } else {
                        button.addEventListener('click', () => {
                            chooseOption(button, item, index, optionIndex);
                        });
                    }

                    optionsWrap.appendChild(button);
                });
            }

            function chooseOption(button, item, index, optionIndex) {
                const isCorrect = optionIndex === item.correct;

                if (!isCorrect) {
                    button.classList.add(...wrongOptionClasses);
                    button.disabled = true;
                    button.classList.add('cursor-not-allowed');

                    showFeedback('wrong', `${labels.wrong}. ${labels.tryAgain}.`);
                    playSound('wrong');

                    return;
                }

                button.classList.add(...correctOptionClasses);

                state.answered.add(index);

                cards[index]?.classList.add(...cardCorrectClasses);
                cards[index]?.querySelector('[data-card-done]')?.classList.remove('hidden');

                Array.from(optionsWrap.querySelectorAll('button')).forEach((optionButton) => {
                    optionButton.disabled = true;
                    optionButton.classList.add('cursor-not-allowed');

                    if (Number(optionButton.dataset.optionIndex) === item.correct) {
                        optionButton.classList.add(...correctOptionClasses);
                    }
                });

                showFeedback('correct', item.feedback || labels.correct);

                nextButton?.classList.remove('hidden');

                updateScore();
                playSound('correct');
                maybeComplete();
            }

            function closeQuestion() {
                questionModal?.classList.add('hidden');
                state.currentIndex = null;
            }

            function maybeComplete() {
                if (state.completedShown || state.answered.size !== ITEMS.length) return;

                state.completedShown = true;

                setTimeout(() => {
                    closeQuestion();
                    completeModal?.classList.remove('hidden');
                }, 450);
            }

            function goNextQuestion() {
                if (!ITEMS.length) return;

                let nextIndex = null;

                for (let i = 1; i <= ITEMS.length; i++) {
                    const candidate = (state.currentIndex + i) % ITEMS.length;

                    if (!state.answered.has(candidate)) {
                        nextIndex = candidate;
                        break;
                    }
                }

                if (nextIndex === null) {
                    closeQuestion();
                    return;
                }

                openQuestion(nextIndex);
            }

            function closeComplete() {
                completeModal?.classList.add('hidden');
            }

            function resetGame() {
                state.currentIndex = null;
                state.answered.clear();
                state.completedShown = false;

                cards.forEach((card) => {
                    card.classList.remove(...cardCorrectClasses);
                    card.querySelector('[data-card-done]')?.classList.add('hidden');
                });

                updateScore();
                closeQuestion();
                closeComplete();
                stopAudio();
            }

            cards.forEach((card) => {
                card.addEventListener('click', () => {
                    openQuestion(Number(card.dataset.index));
                });
            });

            root.querySelectorAll('[data-close-question]').forEach((button) => {
                button.addEventListener('click', closeQuestion);
            });

            root.querySelectorAll('[data-reset-choice]').forEach((button) => {
                button.addEventListener('click', resetGame);
            });

            root.querySelector('[data-close-complete]')?.addEventListener('click', closeComplete);
            nextButton?.addEventListener('click', goNextQuestion);

            window.stopSlideAudio = stopAudio;
            window.destroySlide = stopAudio;
            window.resetSlide = resetGame;

            updateScore();
        });
    </script>
@endsection