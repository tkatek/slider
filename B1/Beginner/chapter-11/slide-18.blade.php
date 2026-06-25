<?php

$content = [
    'title'    => 'Reading Comprehension',
    'subtitle' => 'Read Becky’s regrets and complete the sentences.',

    'passage' => "I didn’t study much at school, so I didn’t pass my exams. It was difficult to find a job because I didn’t have any qualifications. I got married very young and I made the wrong decision. I had three children so I stayed at home and didn’t work. I got divorced when the children were small so I went to live with my mother. I didn’t meet another partner because I wasn’t able to go out. I never went abroad because I was always broke. I’ve had a hard life.",

    'instruction'      => '',
    'instruction_note' => 'Complete the sentences',

    'grid_class' => 'grid-cols-1',

    'lines' => [
        [
            'speaker' => '1',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had studied',
                    'answers' => ['had studied'],
                ],
                ['text' => ' more at school, she '],
                [
                    'blank' => true,
                    'answer' => 'would have passed',
                    'answers' => ['would have passed'],
                ],
                ['text' => ' her exams.'],
            ],
        ],
        [
            'speaker' => '2',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had had',
                    'answers' => ['had had'],
                ],
                ['text' => ' some qualifications, she '],
                [
                    'blank' => true,
                    'answer' => 'would have found',
                    'answers' => ['would have found'],
                ],
                ['text' => ' a job more easily.'],
            ],
        ],
        [
            'speaker' => '3',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t got married',
                    'answers' => ['hadn’t got married', "hadn't got married"],
                ],
                ['text' => ' so young, she '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have made',
                    'answers' => ['wouldn’t have made', "wouldn't have made"],
                ],
                ['text' => ' the wrong decision.'],
            ],
        ],
        [
            'speaker' => '4',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have stayed',
                    'answers' => ['wouldn’t have stayed', "wouldn't have stayed"],
                ],
                ['text' => ' at home if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t had',
                    'answers' => ['hadn’t had', "hadn't had"],
                ],
                ['text' => ' three children.'],
            ],
        ],
        [
            'speaker' => '5',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'wouldn’t have gone',
                    'answers' => ['wouldn’t have gone', "wouldn't have gone"],
                ],
                ['text' => ' to live with her mother if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t got',
                    'answers' => ['hadn’t got', "hadn't got"],
                ],
                ['text' => ' divorced.'],
            ],
        ],
        [
            'speaker' => '6',
            'parts' => [
                ['text' => 'If she '],
                [
                    'blank' => true,
                    'answer' => 'had been able',
                    'answers' => ['had been able'],
                ],
                ['text' => ' to go out, she '],
                [
                    'blank' => true,
                    'answer' => 'would have met',
                    'answers' => ['would have met'],
                ],
                ['text' => ' another partner.'],
            ],
        ],
        [
            'speaker' => '7',
            'parts' => [
                ['text' => 'She '],
                [
                    'blank' => true,
                    'answer' => 'would have gone',
                    'answers' => ['would have gone'],
                ],
                ['text' => ' abroad if she '],
                [
                    'blank' => true,
                    'answer' => 'hadn’t always been',
                    'answers' => ['hadn’t always been', "hadn't always been", 'hadn’t been', "hadn't been"],
                ],
                ['text' => ' broke.'],
            ],
        ],
    ],
];

?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $scriptLines = is_array($content['transcript'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['transcript']), static fn ($line) => $line !== ''))
        : [];

    $hasScript = $scriptLines !== [];
    $lines = is_array($content['lines'] ?? null) ? $content['lines'] : [];
    $sounds = is_array($content['sounds'] ?? null) ? $content['sounds'] : [];
    $readingPassage = trim((string) ($content['passage'] ?? ''));

    $cardClass = trim((string) ($content['card_class'] ?? ''));
    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-1'));
    $gridClass = $gridClass !== '' ? $gridClass : 'grid-cols-1';

    $themeName = strtolower((string) ($theme['name'] ?? 'default'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
    $instructionIconClass = 'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300';
    $softButtonClass = 'border-indigo-200 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 focus:ring-indigo-300/35 dark:border-indigo-400/20 dark:bg-indigo-950/35 dark:text-indigo-200 dark:hover:bg-indigo-900/45';
    $readingAccentClass = 'bg-gradient-to-b from-indigo-500 to-blue-500';

    if ($themeName === 'orange') {
        $instructionIconClass = 'bg-orange-100 text-orange-700 dark:bg-orange-500/15 dark:text-orange-300';
        $softButtonClass = 'border-orange-200 bg-orange-50 text-orange-700 hover:bg-orange-100 focus:ring-orange-300/35 dark:border-orange-400/20 dark:bg-orange-950/35 dark:text-orange-200 dark:hover:bg-orange-900/45';
        $readingAccentClass = 'bg-gradient-to-b from-orange-400 to-orange-600';
    } elseif ($themeName === 'green') {
        $instructionIconClass = 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300';
        $softButtonClass = 'border-emerald-200 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 focus:ring-emerald-300/35 dark:border-emerald-400/20 dark:bg-emerald-950/35 dark:text-emerald-200 dark:hover:bg-emerald-900/45';
        $readingAccentClass = 'bg-gradient-to-b from-emerald-400 to-teal-600';
    }

    $componentId = str_replace('.', '_', uniqid('lmw_', true));

    $instructionTitle = trim((string) ($content['instruction'] ?? ''));
    $instructionNote = trim((string) ($content['instruction_note'] ?? ''));

    if ($instructionTitle === '' && $instructionNote !== '') {
        $instructionTitle = $instructionNote;
        $instructionNote = '';
    }

    if ($instructionTitle === '') {
        $instructionTitle = 'Complete the activity.';
    }

    $speakerClasses = [
        'A' => 'from-indigo-500 to-blue-600 shadow-indigo-500/20',
        'B' => 'from-emerald-500 to-teal-600 shadow-emerald-500/20',
        '1' => 'from-violet-500 to-indigo-600 shadow-violet-500/20',
        '2' => 'from-sky-500 to-blue-600 shadow-sky-500/20',
        '3' => 'from-fuchsia-500 to-rose-600 shadow-fuchsia-500/20',
        '4' => 'from-amber-500 to-orange-600 shadow-amber-500/20',
        '5' => 'from-emerald-500 to-teal-600 shadow-emerald-500/20',
        '6' => 'from-cyan-500 to-sky-600 shadow-cyan-500/20',
    ];

    $fallbackSpeakerClasses = [
        'from-violet-500 to-indigo-600 shadow-violet-500/20',
        'from-rose-500 to-pink-600 shadow-rose-500/20',
        'from-sky-500 to-blue-600 shadow-sky-500/20',
        'from-amber-500 to-orange-600 shadow-amber-500/20',
        'from-emerald-500 to-teal-600 shadow-emerald-500/20',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-2 sm:py-3 lg:py-4">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[68rem] px-3 py-2 sm:px-4 sm:py-3 lg:px-5 lg:py-4">
            @if($readingPassage !== '')
                <article class="relative mx-auto mb-3 w-full overflow-hidden rounded-[1.15rem] border border-slate-200/80 bg-white/95 shadow-md shadow-slate-900/5 ring-1 ring-white/70 backdrop-blur-xl dark:border-slate-700/80 dark:bg-slate-950/70 dark:ring-slate-800 sm:mb-4 sm:rounded-[1.35rem]">
                    <span class="pointer-events-none absolute inset-y-0 left-0 w-1 {{ $readingAccentClass }}"></span>

                    <div class="p-3.5 pl-4 text-left sm:p-4 sm:pl-5 lg:px-5 lg:py-4">
                        <p class="max-w-none text-left text-[0.93rem] font-semibold leading-7 text-slate-700 dark:text-slate-200 sm:text-[0.98rem] sm:leading-8 lg:text-[1rem]">
                            {{ $readingPassage }}
                        </p>
                    </div>
                </article>
            @endif

            @if($playerAudio)
                <div class="mx-auto mb-3 max-w-3xl sm:mb-4">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div
                    id="{{ $componentId }}"
                    class="{{ $cardClass }} mx-auto w-full overflow-hidden rounded-[1.2rem] border border-white/70 bg-white/92 p-2.5 shadow-xl shadow-slate-900/5 ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/80 dark:bg-slate-950/75 dark:ring-slate-800 sm:rounded-[1.45rem] sm:p-3.5 lg:p-4"
            >
                <div class="mb-3 flex flex-col gap-2.5 sm:flex-row sm:items-center sm:justify-between">
                    <div class="min-w-0 flex-1 rounded-[1rem] border border-slate-200/80 bg-gradient-to-br from-white to-slate-50/80 p-3 shadow-sm dark:border-slate-700/80 dark:from-slate-900/90 dark:to-slate-950/70 sm:p-3.5">
                        <div class="flex items-center gap-2.5">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl text-sm font-black {{ $instructionIconClass }}">
                                ✓
                            </span>

                            <div class="min-w-0">
                                <h2 class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-[0.97rem] lg:text-base">
                                    {{ $instructionTitle }}
                                </h2>

                                @if($instructionNote !== '')
                                    <p class="mt-0.5 text-xs font-semibold leading-snug text-slate-500 dark:text-slate-400 sm:text-sm">
                                        {{ $instructionNote }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid w-full shrink-0 grid-cols-2 gap-2 sm:w-auto sm:min-w-[17rem] sm:flex sm:items-center sm:justify-end">
                        <button
                                id="{{ $componentId }}_checkAnswersBtn"
                                data-action="check-answers"
                                type="button"
                                class="inline-flex h-10 items-center justify-center rounded-xl px-3 text-xs font-black text-white shadow-lg shadow-slate-900/10 transition duration-150 hover:-translate-y-0.5 hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-slate-900/15 active:translate-y-0 sm:h-10.5 sm:px-4 {{ $buttonGradient }}"
                        >
                            <span class="sm:hidden">Check</span>
                            <span class="hidden sm:inline">Check Answers</span>
                        </button>

                        <button
                                id="{{ $componentId }}_revealAnswersBtn"
                                data-action="reveal-answers"
                                type="button"
                                class="inline-flex h-10 items-center justify-center rounded-xl border px-3 text-xs font-black shadow-sm transition duration-150 hover:-translate-y-0.5 focus:outline-none focus:ring-4 active:translate-y-0 sm:h-10.5 sm:px-4 {{ $softButtonClass }}"
                        >
                            <span data-reveal-mobile-label class="sm:hidden">Reveal</span>
                            <span data-reveal-label class="hidden sm:inline">Reveal answers</span>
                        </button>
                    </div>
                </div>

                @if(count($lines))
                    <div class="grid {{ $gridClass }} gap-2.5 sm:gap-3">
                        @php $blankIndex = 0; @endphp

                        @foreach($lines as $line)
                            @php
                                $speaker = trim((string) ($line['speaker'] ?? ''));
                                $speakerLabel = $speaker !== '' ? $speaker : (string) $loop->iteration;
                                $speakerKey = strtoupper($speakerLabel);

                                $speakerClass = $speakerClasses[$speakerKey]
                                    ?? $fallbackSpeakerClasses[$loop->index % count($fallbackSpeakerClasses)];
                            @endphp

                            <article class="group grid grid-cols-[2rem,minmax(0,1fr)] items-start gap-2.5 rounded-[1rem] border border-slate-200/90 bg-white/90 p-2.5 shadow-sm ring-1 ring-white/60 transition duration-150 dark:border-slate-700/80 dark:bg-slate-950/35 dark:ring-white/5 sm:grid-cols-[2.2rem,minmax(0,1fr)] sm:gap-3 sm:rounded-[1.1rem] sm:p-3">
                                <div class="mt-0.5 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br {{ $speakerClass }} text-sm font-black text-white shadow-md sm:h-9 sm:w-9 sm:text-[0.95rem]">
                                    {{ $speakerLabel }}
                                </div>

                                <div class="min-w-0 pt-0.5">
                                    <div class="flex flex-wrap items-center gap-x-1.5 gap-y-2 text-[0.95rem] font-bold leading-7 text-slate-950 dark:text-slate-50 sm:text-[0.98rem] lg:text-[1rem]">
                                        @foreach(($line['parts'] ?? []) as $part)
                                            @if(!empty($part['blank']))
                                                @php
                                                    $answer = (string) ($part['answer'] ?? '');
                                                    $answers = is_array($part['answers'] ?? null)
                                                        ? implode('|', $part['answers'])
                                                        : $answer;

                                                    $answerOptions = is_array($part['answers'] ?? null)
                                                        ? array_map(static fn ($option) => (string) $option, $part['answers'])
                                                        : [$answer];

                                                    $placeholder = (string) ($part['placeholder'] ?? '');
                                                    $longestInputText = max(array_map('strlen', array_merge($answerOptions, [$placeholder])));
                                                    $inputSize = max(7, min(26, $longestInputText + 1));
                                                @endphp

                                                <textarea
                                                        class="lp-input answer-input inline-block min-h-10 w-[7.25rem] max-w-full shrink-0 resize-none overflow-hidden rounded-[0.9rem] border border-slate-300 bg-white px-2.5 py-2 text-[0.84rem] font-semibold leading-5 text-slate-950 outline-none transition duration-150 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-50 dark:placeholder:text-slate-500 sm:w-[7.75rem] sm:text-[0.88rem] md:w-[8.5rem] lg:w-[9rem]"
                                                        rows="1"
                                                        cols="{{ $inputSize }}"
                                                        placeholder="{{ $placeholder }}"
                                                        data-answer="{{ $answers }}"
                                                        data-key="{{ $blankIndex }}"
                                                        aria-label="Answer {{ $blankIndex + 1 }}"
                                                        autocomplete="off"
                                                        spellcheck="false"
                                                ></textarea>

                                                @php $blankIndex++; @endphp
                                            @else
                                                @php $text = trim((string) ($part['text'] ?? '')); @endphp

                                                @if($text !== '')
                                                    <span class="min-w-0 break-words">{{ $text }}</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50/70 p-5 text-center text-sm font-black text-slate-500 dark:border-slate-700 dark:bg-slate-900/50 dark:text-slate-400">
                        No activity lines added yet.
                    </div>
                @endif

                @if(!empty($content['show_transcript']) && $hasScript)
                    <div class="mt-4 rounded-2xl border border-dashed border-slate-300/80 bg-slate-50/80 p-4 dark:border-slate-700/80 dark:bg-slate-900/45">
                        <div class="mb-2 text-xs font-black uppercase tracking-[0.12em] text-slate-500 dark:text-slate-400">
                            Transcript
                        </div>

                        <div class="space-y-2">
                            @foreach($scriptLines as $scriptLine)
                                <p class="text-sm font-bold leading-6 text-slate-700 dark:text-slate-200">
                                    {{ $scriptLine }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const initMissingWordActivity = () => {
                const root = document.getElementById(@json($componentId));

                if (!root || root.dataset.ready === '1') return;

                root.dataset.ready = '1';

                const inputs = Array.from(root.querySelectorAll('.answer-input'));
                const checkBtn = root.querySelector('[data-action="check-answers"]');
                const revealBtn = root.querySelector('[data-action="reveal-answers"]');
                const revealBtnMobileLabel = root.querySelector('[data-reveal-mobile-label]');
                const revealBtnLabel = root.querySelector('[data-reveal-label]');

                let answersRevealed = false;

                const sounds = @json($sounds);

                const sfx = {
                    tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                    correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                    wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                    success: new Audio(sounds.success || '/slider/sounds/success.wav'),
                };

                const neutralInputClasses = [
                    'border-slate-300',
                    'bg-white',
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

                function playSfx(type) {
                    const sound = sfx[type];

                    if (!sound) return;

                    sound.pause();
                    sound.currentTime = 0;
                    sound.play().catch(() => {});
                }

                function visibleInputs() {
                    return inputs.filter(input => input.offsetParent !== null);
                }

                function resizeInput(input) {
                    if (!input || input.tagName !== 'TEXTAREA') return;

                    input.style.height = 'auto';
                    input.style.height = `${input.scrollHeight}px`;
                }

                function resizeAllInputs() {
                    inputs.forEach(resizeInput);
                }

                function normalize(value) {
                    return String(value || '')
                        .trim()
                        .toLowerCase()
                        .replace(/[’‘]/g, "'")
                        .replace(/[“”]/g, '"')
                        .replace(/[.,!?;:]+$/g, '')
                        .replace(/\s+/g, ' ');
                }

                function answersFor(input) {
                    return String(input.dataset.answer || '')
                        .split('|')
                        .map(normalize)
                        .filter(Boolean);
                }

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

                function isInputCorrect(input) {
                    const value = normalize(input.value);
                    return value !== '' && answersFor(input).includes(value);
                }

                function setRevealButtonMode(isRevealed) {
                    answersRevealed = isRevealed;

                    if (revealBtnMobileLabel) {
                        revealBtnMobileLabel.textContent = isRevealed ? 'Retake' : 'Reveal';
                    }

                    if (revealBtnLabel) {
                        revealBtnLabel.textContent = isRevealed ? 'Retake' : 'Reveal answers';
                    }
                }

                function retakeActivity() {
                    visibleInputs().forEach(input => {
                        input.value = '';
                        setInputState(input, 'neutral');
                        resizeInput(input);
                    });

                    setRevealButtonMode(false);
                }

                inputs.forEach(input => {
                    input.addEventListener('focus', () => playSfx('tap'));
                    input.addEventListener('input', () => {
                        setInputState(input, 'neutral');
                        resizeInput(input);
                    });

                    setInputState(input, 'neutral');
                    resizeInput(input);
                });

                window.addEventListener('resize', resizeAllInputs);

                checkBtn?.addEventListener('click', () => {
                    const currentInputs = visibleInputs();
                    let correctCount = 0;

                    currentInputs.forEach(input => {
                        const isCorrect = isInputCorrect(input);

                        setInputState(input, isCorrect ? 'correct' : 'wrong');

                        if (isCorrect) correctCount++;
                    });

                    playSfx(correctCount === currentInputs.length && currentInputs.length > 0 ? 'correct' : 'wrong');
                });

                revealBtn?.addEventListener('click', () => {
                    if (answersRevealed) {
                        retakeActivity();
                        return;
                    }

                    visibleInputs().forEach(input => {
                        const answer = String(input.dataset.answer || '').split('|')[0].trim();

                        if (!answer) return;

                        input.value = answer;
                        setInputState(input, 'correct');
                        resizeInput(input);
                    });

                    setRevealButtonMode(true);
                    playSfx('success');
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
                    retakeActivity();
                };
            };

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initMissingWordActivity, { once: true });
            } else {
                initMissingWordActivity();
            }
        })();
    </script>
@endsection
