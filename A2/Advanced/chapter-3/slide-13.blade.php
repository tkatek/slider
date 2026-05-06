<?php
$content = [
    'page_title' => 'Reading Comprehension',
    'title' => 'Reading Comprehension',
    'subtitle' => '',
    'section_title' => 'Gadgets a housewife can use',
    'word_bank_instruction' => 'Look at the pictures , read the words, and complete the sentences:',

    'word_cards' => [
        [
            'title' => 'computer',
            'label' => 'Computer',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/computer.webp'),
            'alt'   => 'Computer',
        ],
        [
            'title' => 'sewing machine',
            'label' => 'Sewing machine',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/sewing-machine.webp'),
            'alt'   => 'Sewing machine',
        ],
        [
            'title' => 'washing machine',
            'label' => 'Washing machine',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/washing-machine.webp'),
            'alt'   => 'Washing machine',
        ],
        [
            'title' => 'vacuum cleaner',
            'label' => 'Vacuum cleaner',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/vacuum-cleaner.webp'),
            'alt'   => 'Vacuum cleaner',
        ],
        [
            'title' => 'blender',
            'label' => 'Blender',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/blender.webp'),
            'alt'   => 'Blender',
        ],
        [
            'title' => 'printer',
            'label' => 'Printer',
            'image' => materialAsset('slider/A2/Advanced/chapter-3/img/slide13/printer.webp'),
            'alt'   => 'Printer',
        ],
    ],

    'questions' => [
        [
            'prefix' => 'We use',
            'suffix' => 'to clean our carpets.',
            'answers' => ['vacuum cleaner', 'a vacuum cleaner'],
        ],
        [
            'prefix' => 'We use',
            'suffix' => 'to stitch clothes.',
            'answers' => ['sewing machine', 'a sewing machine'],
        ],
        [
            'prefix' => 'We use',
            'suffix' => 'to mix food.',
            'answers' => ['blender', 'a blender'],
        ],
        [
            'prefix' => 'We use',
            'suffix' => 'to wash clothes.',
            'answers' => ['washing machine', 'a washing machine'],
        ],
        [
            'prefix' => 'We use',
            'suffix' => 'to write e-mails.',
            'answers' => ['computer', 'a computer'],
        ],
        [
            'prefix' => 'We use',
            'suffix' => 'to print documents.',
            'answers' => ['printer', 'a printer'],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $wordCards = is_array($content['word_cards'] ?? null) ? $content['word_cards'] : [];
    $questions = is_array($content['questions'] ?? null) ? $content['questions'] : [];

    $storageKey = 'picture-word-complete-game-' . md5(request()->path());
@endphp

@section('content')
    <div class="min-h-[100dvh] w-full overflow-x-hidden font-['Plus_Jakarta_Sans']">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1320px] items-center justify-center px-3 py-3 sm:px-5 sm:py-5 lg:px-6 lg:py-4">
            <main class="w-full">
                @include('slider.components.title-subtitle')

                <section class="mx-auto mt-3 w-full max-w-[1260px] rounded-3xl border border-slate-200 bg-white/90 p-3 shadow-sm dark:border-slate-800 dark:bg-slate-950/80 sm:p-4">
                    <div class="mb-3 flex flex-col gap-3 sm:mb-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h2 class="text-base font-black tracking-[-0.03em] text-slate-950 dark:text-white sm:text-lg">
                                {{ $content['section_title'] ?? 'Word Bank' }}
                            </h2>
                            <p class="mt-1 text-xs font-bold leading-relaxed text-slate-500 dark:text-slate-400 sm:text-sm">
                                {{ $content['word_bank_instruction'] ?? 'Choose a word from the pictures and complete each sentence.' }}
                            </p>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">
                            <button
                                    type="button"
                                    id="btnRevealAnswers"
                                    class="inline-flex h-9 items-center justify-center rounded-xl border border-slate-300 bg-white px-3 text-xs font-black text-slate-700 transition hover:bg-slate-100 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                            >
                                Show answers
                            </button>

                            <button
                                    type="button"
                                    id="btnRetakeTest"
                                    class="hidden inline-flex h-9 items-center justify-center rounded-xl border border-slate-300 bg-white px-3 text-xs font-black text-slate-700 transition hover:bg-slate-100 active:scale-95 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800"
                            >
                                Retake
                            </button>

                            <button
                                    type="button"
                                    id="checkAnswersBtn"
                                    class="inline-flex h-9 items-center justify-center rounded-xl border border-slate-900 bg-slate-900 px-3 text-xs font-black text-white transition hover:bg-slate-700 active:scale-95 dark:border-slate-100 dark:bg-slate-100 dark:text-slate-950 dark:hover:bg-white"
                            >
                                Check Answers
                            </button>
                        </div>
                    </div>

                    <section class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-6">
                        @foreach($wordCards as $index => $item)
                            @php
                                $title = (string) ($item['title'] ?? '');
                                $label = (string) ($item['label'] ?? $title);
                                $image = (string) ($item['image'] ?? '');
                                $alt = (string) ($item['alt'] ?? $label);
                            @endphp

                            <button
                                    type="button"
                                    class="js-word-card group overflow-hidden rounded-2xl border border-slate-200 bg-white p-1.5 text-left transition hover:border-slate-400 hover:bg-slate-50 active:scale-[0.98] dark:border-slate-800 dark:bg-slate-900 dark:hover:border-slate-500 dark:hover:bg-slate-800"
                                    data-word="{{ $title }}"
                            >
                                <div class="overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800" style="aspect-ratio: 5 / 4;">
                                    @if($image !== '')
                                        <img
                                                src="{{ $image }}"
                                                alt="{{ $alt }}"
                                                class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]"
                                                draggable="false"
                                        />
                                    @else
                                        <div class="grid h-full w-full place-items-center text-2xl text-slate-400">
                                            -
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-1.5 flex min-h-9 items-center justify-center rounded-xl bg-slate-50 px-2 py-1 text-center dark:bg-slate-800/80">
                                    <span class="text-[11px] font-black leading-tight tracking-[-0.02em] text-slate-900 dark:text-white sm:text-xs">
                                        {{ $label }}
                                    </span>
                                </div>
                            </button>
                        @endforeach
                    </section>
                </section>

                <section class="mx-auto mt-3 grid w-full max-w-[1260px] grid-cols-1 gap-2.5 sm:grid-cols-2 sm:gap-3 lg:grid-cols-3">
                    @foreach($questions as $index => $item)
                        @php
                            $primaryAnswer = (string) ($item['answers'][0] ?? '');
                            $defaultAnswer = (string) ($item['default_answer'] ?? '');
                            $maxLength = max(1, mb_strlen($primaryAnswer));
                            $inputWidth = max(8, $maxLength + 4);
                        @endphp

                        <article class="js-question-card rounded-3xl border border-slate-200 bg-white/90 p-3 shadow-sm transition hover:border-slate-300 dark:border-slate-800 dark:bg-slate-950/80 dark:hover:border-slate-600 sm:p-4">
                            <div class="mb-2 flex items-center justify-end gap-2">
                                <span class="js-result min-w-6 text-right text-lg font-black leading-none" aria-live="polite"></span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2 text-[0.95rem] font-black leading-[1.45] tracking-[-0.02em] text-slate-900 dark:text-white sm:text-base">
                                <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-50 text-[11px] font-black text-slate-500 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                    {{ $index + 1 }}
                                </span>
                                <span>{{ $item['prefix'] ?? '' }}</span>

                                <input
                                        type="text"
                                        class="js-answer-input h-10 rounded-xl border border-slate-300 bg-white px-3 text-center text-sm font-black text-slate-950 outline-none transition placeholder:text-slate-300 focus:border-slate-900 focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:placeholder:text-slate-600 dark:focus:border-slate-300 dark:focus:ring-slate-700/60 sm:h-11 sm:text-base"
                                        style="width: {{ $inputWidth }}ch;"
                                        maxlength="{{ max(28, $maxLength + 6) }}"
                                        value="{{ $defaultAnswer }}"
                                        placeholder="........."
                                        data-key="{{ $index }}"
                                        data-default="{{ $defaultAnswer }}"
                                        data-answers="{{ json_encode($item['answers'] ?? [], JSON_HEX_APOS) }}"
                                        autocomplete="off"
                                        spellcheck="false"
                                />

                                <span>{{ $item['suffix'] ?? '' }}</span>
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);

            const inputs = Array.from(document.querySelectorAll('.js-answer-input'));
            const wordCards = Array.from(document.querySelectorAll('.js-word-card'));

            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');

            const progressCountEl = document.getElementById('tilesCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');

            let savedData = {};
            let wrongTries = 0;
            let startTime = Date.now();
            let timerInt = null;
            let activeInput = inputs[0] || null;

            try {
                savedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                savedData = {};
            }

            const normalizeValue = (value) => {
                return String(value || '')
                    .toLowerCase()
                    .replace(/&/g, 'and')
                    .replace(/[^a-z0-9]/g, '');
            };

            const getAcceptedAnswers = (input) => {
                try {
                    const answers = JSON.parse(input.dataset.answers || '[]');
                    return Array.isArray(answers) ? answers : [];
                } catch (e) {
                    return [];
                }
            };

            const isInputCorrect = (input) => {
                const userValue = normalizeValue(input.value);
                if (userValue === '') return false;

                return getAcceptedAnswers(input).some((answer) => {
                    return normalizeValue(answer) === userValue;
                });
            };

            const clearInputFeedback = (input) => {
                if (!input) return;

                const card = input.closest('.js-question-card');
                const result = card?.querySelector('.js-result');

                input.classList.remove(
                    'border-emerald-500',
                    'bg-emerald-50',
                    'text-emerald-800',
                    'dark:border-emerald-400',
                    'dark:bg-emerald-500/15',
                    'dark:text-emerald-100',
                    'border-rose-500',
                    'bg-rose-50',
                    'text-rose-800',
                    'dark:border-rose-400',
                    'dark:bg-rose-500/15',
                    'dark:text-rose-100'
                );

                input.classList.add(
                    'border-slate-300',
                    'bg-white',
                    'text-slate-950',
                    'dark:border-slate-700',
                    'dark:bg-slate-900',
                    'dark:text-white'
                );

                if (result) {
                    result.textContent = '';
                    result.classList.remove('text-emerald-600', 'text-rose-600', 'dark:text-emerald-300', 'dark:text-rose-300');
                }
            };

            const markInput = (input, correct) => {
                const card = input.closest('.js-question-card');
                const result = card?.querySelector('.js-result');

                input.classList.remove(
                    'border-slate-300',
                    'bg-white',
                    'text-slate-950',
                    'dark:border-slate-700',
                    'dark:bg-slate-900',
                    'dark:text-white',
                    'border-emerald-500',
                    'bg-emerald-50',
                    'text-emerald-800',
                    'dark:border-emerald-400',
                    'dark:bg-emerald-500/15',
                    'dark:text-emerald-100',
                    'border-rose-500',
                    'bg-rose-50',
                    'text-rose-800',
                    'dark:border-rose-400',
                    'dark:bg-rose-500/15',
                    'dark:text-rose-100'
                );

                if (correct) {
                    input.classList.add(
                        'border-emerald-500',
                        'bg-emerald-50',
                        'text-emerald-800',
                        'dark:border-emerald-400',
                        'dark:bg-emerald-500/15',
                        'dark:text-emerald-100'
                    );
                } else {
                    input.classList.add(
                        'border-rose-500',
                        'bg-rose-50',
                        'text-rose-800',
                        'dark:border-rose-400',
                        'dark:bg-rose-500/15',
                        'dark:text-rose-100'
                    );
                }

                if (result) {
                    result.textContent = correct ? '✓' : '×';
                    result.classList.remove('text-emerald-600', 'text-rose-600', 'dark:text-emerald-300', 'dark:text-rose-300');
                    result.classList.add(
                        correct ? 'text-emerald-600' : 'text-rose-600',
                        correct ? 'dark:text-emerald-300' : 'dark:text-rose-300'
                    );
                }
            };

            const getCorrectTotal = () => {
                return inputs.filter((input) => {
                    const card = input.closest('.js-question-card');
                    const result = card?.querySelector('.js-result');
                    return result?.textContent === '✓';
                }).length;
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const totalCards = inputs.length;

                if (progressCountEl) progressCountEl.textContent = `${correctTotal}/${totalCards}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const saveAll = () => {
                const payload = {};

                inputs.forEach((input) => {
                    payload[input.dataset.key] = input.value || '';
                });

                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            const formatTime = (seconds) => {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;

                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);

                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            };

            const updateTimer = () => {
                if (!timerEl) return;
                timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            };

            const startTimer = () => {
                clearInterval(timerInt);
                updateTimer();
                timerInt = setInterval(updateTimer, 1000);
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) btnRevealAnswers.classList.toggle('hidden', revealed);
                if (btnRetakeTest) btnRetakeTest.classList.toggle('hidden', !revealed);
            };

            const focusNextEmptyInput = () => {
                const emptyInput = inputs.find((input) => normalizeValue(input.value) === '');
                activeInput = emptyInput || inputs[0] || null;

                if (activeInput) {
                    activeInput.focus();
                }
            };

            inputs.forEach((input) => {
                const key = input.dataset.key;
                const defaultValue = input.dataset.default || '';

                if (typeof savedData[key] === 'string') {
                    input.value = savedData[key];
                } else if (defaultValue !== '') {
                    input.value = defaultValue;
                }

                input.addEventListener('focus', () => {
                    activeInput = input;
                });

                input.addEventListener('input', () => {
                    activeInput = input;
                    clearInputFeedback(input);
                    saveAll();
                    updateStatusUI();
                    updateActionButtons({ revealed: false });
                });

                input.addEventListener('blur', saveAll);
            });

            wordCards.forEach((card) => {
                card.addEventListener('click', () => {
                    const word = card.dataset.word || '';
                    const target = activeInput || inputs.find((input) => normalizeValue(input.value) === '') || inputs[0];

                    if (!target) return;

                    target.value = word;
                    activeInput = target;
                    clearInputFeedback(target);
                    saveAll();
                    updateStatusUI();

                    target.focus();
                });
            });

            checkBtn?.addEventListener('click', () => {
                let hasWrong = false;
                let allCorrect = true;

                inputs.forEach((input) => {
                    const correct = isInputCorrect(input);
                    markInput(input, correct);

                    if (!correct) {
                        hasWrong = true;
                        allCorrect = false;
                    }
                });

                if (hasWrong) wrongTries += 1;
                if (allCorrect && inputs.length > 0) clearInterval(timerInt);

                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    const acceptedAnswers = getAcceptedAnswers(input);
                    input.value = acceptedAnswers[0] || '';
                    markInput(input, true);
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                clearInterval(timerInt);
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            window.resetSlide = () => {
                inputs.forEach((input) => {
                    input.value = input.dataset.default || '';
                    clearInputFeedback(input);
                });

                wrongTries = 0;
                startTime = Date.now();
                activeInput = inputs[0] || null;

                localStorage.removeItem(storageKey);

                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();

                if (activeInput) activeInput.focus();
            };

            window.stopSlideAudio = () => {
                clearInterval(timerInt);
            };

            updateActionButtons({ revealed: false });
            updateStatusUI();
            startTimer();
            focusNextEmptyInput();
        });
    </script>
@endsection
