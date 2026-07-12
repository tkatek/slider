@extends('slider.simple-layout')

@php
    $content = [

        'title'      => 'Conversation Corner: Talking about problems',
         'title_class' => 'text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl',
        'subtitle'   => 'Task 1: Listen to the conversation. Write the missing words',

        'audio' => materialAsset('slider/B1/Advanced/chapter-4/audios/slide15.mp3'),

        'task_2_title' => 'Task 2',
        'task_2_instruction' => 'Practice the conversation with a partner. Be sure to stress the correct syllable.',

        'lines' => [
            [
                'speaker' => 'A',
                'parts' => [
                    'There are ',
                    ['answer' => 'so many problems'],
                    ' in the world today.',
                ],
            ],
            [
                'speaker' => 'B',
                'parts' => [
                    'I know. There’s water pollution, air pollution, global warming, unemployment.',
                ],
            ],
            [
                'speaker' => 'A',
                'parts' => [
                    'Yeah, and there’s the destruction of the rain ',
                    ['answer' => 'forests'],
                    ', ',
                    ['answer' => 'traffic problems'],
                    ', housing shortages... It can get depressing if you think about it too much.',
                ],
            ],
            [
                'speaker' => 'B',
                'parts' => [
                    'No kidding. What do you think the biggest issues are?',
                ],
            ],
            [
                'speaker' => 'A',
                'parts' => [
                    'I really think air pollution is the most important issue. If we don’t ',
                    ['answer' => 'reduce pollution'],
                    ' and improve air quality, we’ll all have health problems.',
                ],
            ],
            [
                'speaker' => 'B',
                'parts' => [
                    'I agree that air pollution is a ',
                    ['answer' => 'big problem'],
                    '. The air in the city has become so dirty.',
                ],
            ],
        ],

        'transcript' => [
            'A: There are so many problems in the world today.',
            'B: I know. There’s water pollution, air pollution, global warming, unemployment.',
            'A: Yeah, and there’s the destruction of the rain forests, traffic problems, housing shortages... It can get depressing if you think about it too much.',
            'B: No kidding. What do you think the biggest issues are?',
            'A: I really think air pollution is the most important issue. If we don’t reduce pollution and improve air quality, we’ll all have health problems.',
            'B: I agree that air pollution is a big problem. The air in the city has become so dirty.',
        ],
    ];
@endphp

@php
    $theme = $theme ?? [];
    $buttonGradient = trim((string)($theme['button_primary_color'] ?? 'bg-gradient-to-tr from-emerald-500 via-teal-500 to-cyan-600'));
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $scriptLines = is_array($content['transcript'] ?? null)
        ? array_values(array_filter(
            array_map(static fn ($line) => trim((string) $line), $content['transcript']),
            static fn ($line) => $line !== ''
        ))
        : [];

    $hasScript = $scriptLines !== [];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden bg-gradient-to-br from-emerald-50 via-white to-sky-50 px-4 py-4 text-slate-950 dark:from-slate-950 dark:via-slate-900 dark:to-emerald-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            @if($playerAudio)
                <div class="mx-auto mt-4 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <section class="mx-auto mt-4 w-full">
                <div class="overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white/90 shadow-[0_20px_55px_rgba(15,118,110,0.12)] backdrop-blur-xl dark:border-emerald-500/25 dark:bg-slate-900/85">

                    <div class="p-4 sm:p-5 lg:p-6">
                        <div class="grid gap-3">
                            @foreach($content['lines'] as $line)
                                <article class="rounded-2xl border border-slate-200/80 bg-white px-4 py-3 shadow-sm dark:border-slate-700/70 dark:bg-slate-950/35 sm:px-5 sm:py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-sm font-black text-white shadow-md {{ ($line['speaker'] ?? '') === 'A' ? 'bg-emerald-600' : 'bg-orange-500' }}">
                                            {{ $line['speaker'] ?? '' }}
                                        </div>

                                        <div class="min-w-0 flex-1 text-base font-extrabold leading-relaxed text-slate-900 dark:text-slate-50 sm:text-lg">
                                            @foreach($line['parts'] as $part)
                                                @if(is_array($part))
                                                    <input
                                                            type="text"
                                                            class="answer-input mx-1 inline-block h-9 min-w-[9rem] rounded-xl border border-slate-300 bg-slate-50 px-3 text-center text-sm font-black text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-50 dark:focus:ring-emerald-900/40 sm:h-10 sm:min-w-[10rem] sm:text-base"
                                                            data-answer="{{ $part['answer'] ?? '' }}"
                                                            placeholder="..."
                                                            autocomplete="off"
                                                    >
                                                @else
                                                    <span>{!! $part !!}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-4 rounded-2xl border border-orange-200 bg-orange-50/70 px-4 py-3 dark:border-orange-500/25 dark:bg-orange-950/25 sm:px-5">
                            <p class="text-sm font-black uppercase tracking-[0.14em] text-orange-700 dark:text-orange-300">
                                {{ $content['task_2_title'] }}
                            </p>

                            <p class="mt-1 text-base font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-lg">
                                {{ $content['task_2_instruction'] }}
                            </p>
                        </div>

                        <div class="mt-4 grid grid-cols-2 gap-3">
                            <button
                                    type="button"
                                    id="checkAnswersBtn"
                                    class="min-h-11 rounded-full px-4 py-2 text-xs font-black text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-slate-300/60 dark:focus:ring-slate-600 sm:text-sm {{ $buttonGradient }}"
                            >
                                Check answers
                            </button>

                            <button
                                    type="button"
                                    id="revealAnswersBtn"
                                    class="min-h-11 rounded-full border border-slate-200 bg-white px-4 py-2 text-xs font-black text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-800 dark:focus:ring-slate-700 sm:text-sm"
                            >
                                Show answers
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            const inputs = Array.from(document.querySelectorAll('.answer-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');

            let isRevealed = false;

            const sfx = {
                tap: new Audio('/slider/sounds/tap.wav'),
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
            };

            function normalize(value) {
                return String(value || '')
                    .trim()
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[“”]/g, '"')
                    .replace(/[.,!?;:]+$/g, '')
                    .replace(/\s+/g, ' ');
            }

            function playSfx(type) {
                const sound = sfx[type];

                if (!sound) return;

                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            const neutralInputClasses = [
                'border-slate-300',
                'bg-slate-50',
                'text-slate-950',
                'dark:border-slate-700',
                'dark:bg-slate-950/60',
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

            const allStateClasses = [
                ...neutralInputClasses,
                ...correctInputClasses,
                ...wrongInputClasses,
            ];

            function setInputState(input, state = 'neutral') {
                input.classList.remove(...allStateClasses);

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

            function resizeInput(input) {
                const value = input.value || input.placeholder || '';
                const minCh = window.innerWidth >= 640 ? 11 : 9;
                const maxCh = window.innerWidth >= 1280 ? 24 : 20;
                const widthCh = Math.min(Math.max(value.length + 2, minCh), maxCh);

                input.style.width = `${widthCh}ch`;
            }

            function checkAnswers() {
                let correctCount = 0;

                inputs.forEach((input) => {
                    const isCorrect = normalize(input.value) === normalize(input.dataset.answer || '');

                    setInputState(input, isCorrect ? 'correct' : 'wrong');

                    if (isCorrect) correctCount++;
                });

                playSfx(correctCount === inputs.length && inputs.length > 0 ? 'success' : 'wrong');
            }

            function revealAnswers() {
                inputs.forEach((input) => {
                    input.value = input.dataset.answer || '';
                    resizeInput(input);
                    setInputState(input, 'correct');
                });

                isRevealed = true;
                revealBtn.textContent = 'Try again';
                playSfx('success');
            }

            function resetAnswers(playSound = true) {
                inputs.forEach((input) => {
                    input.value = '';
                    resizeInput(input);
                    setInputState(input, 'neutral');
                });

                isRevealed = false;
                revealBtn.textContent = 'Show answers';

                if (playSound) playSfx('tap');
            }

            inputs.forEach((input) => {
                input.addEventListener('focus', () => playSfx('tap'));

                input.addEventListener('input', () => {
                    resizeInput(input);
                    setInputState(input, 'neutral');
                });

                resizeInput(input);
                setInputState(input, 'neutral');
            });

            window.addEventListener('resize', () => {
                inputs.forEach(resizeInput);
            });

            checkBtn?.addEventListener('click', checkAnswers);

            revealBtn?.addEventListener('click', () => {
                if (isRevealed) {
                    resetAnswers(true);
                    return;
                }

                revealAnswers();
            });

            function stopSlideMedia() {
                window.stopAudioPlayer?.();
            }

            window.stopSlideAudio = () => {
                stopSlideMedia();
            };

            window.destroySlide = () => {
                stopSlideMedia();
            };

            window.resetSlide = () => {
                stopSlideMedia();
                resetAnswers(false);
            };
        })();
    </script>
@endsection