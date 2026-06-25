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

    $cardClass = trim((string) ($content['card_class'] ?? ''));
    $gridClass = trim((string) ($content['grid_class'] ?? 'grid-cols-1'));
    $gridClass = $gridClass !== '' ? $gridClass : 'grid-cols-1';

    $themeName = strtolower((string) ($theme['name'] ?? 'default'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));
    $instructionIconClass = 'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300';
    $softButtonClass = 'border-indigo-200 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 focus:ring-indigo-300/35 dark:border-indigo-400/20 dark:bg-indigo-950/35 dark:text-indigo-200 dark:hover:bg-indigo-900/45';

    if ($themeName === 'orange') {
        $instructionIconClass = 'bg-orange-100 text-orange-700 dark:bg-orange-500/15 dark:text-orange-300';
        $softButtonClass = 'border-orange-200 bg-orange-50 text-orange-700 hover:bg-orange-100 focus:ring-orange-300/35 dark:border-orange-400/20 dark:bg-orange-950/35 dark:text-orange-200 dark:hover:bg-orange-900/45';
    } elseif ($themeName === 'green') {
        $instructionIconClass = 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300';
        $softButtonClass = 'border-emerald-200 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 focus:ring-emerald-300/35 dark:border-emerald-400/20 dark:bg-emerald-950/35 dark:text-emerald-200 dark:hover:bg-emerald-900/45';
    }

    $componentId = str_replace('.', '_', uniqid('lmw_', true));

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
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-4 lg:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[72rem] px-3 py-3 sm:px-4 lg:px-5 2xl:max-w-[76rem]">
            @if($playerAudio)
                <div class="mx-auto mb-4 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div
                    id="{{ $componentId }}"
                    class="{{ $cardClass }} mx-auto w-full overflow-hidden rounded-[1.35rem] border border-white/70 bg-white/90 p-3 shadow-2xl shadow-slate-900/5 ring-1 ring-slate-200/70 backdrop-blur-xl dark:border-slate-700/80 dark:bg-slate-950/70 dark:ring-slate-800 sm:rounded-[1.75rem] sm:p-4 lg:p-5"
            >
                <div class="mb-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between lg:mb-4">
                    <div class="min-w-0 flex-1 rounded-2xl border border-slate-200/80 bg-gradient-to-br from-white to-slate-50/80 p-3 shadow-sm dark:border-slate-700/80 dark:from-slate-900/90 dark:to-slate-950/70 sm:p-3.5 lg:p-4">
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl text-sm font-black sm:h-9 sm:w-9 {{ $instructionIconClass }}">
                                ✓
                            </span>

                            <div class="min-w-0">
                                <h2 class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base lg:text-lg">
                                    {{ $content['instruction'] ?? 'Listen and complete the activity.' }}
                                </h2>

                                @if(($content['instruction_note'] ?? '') !== '')
                                    <p class="mt-1 text-xs font-bold leading-snug text-slate-500 dark:text-slate-400 sm:text-sm">
                                        {{ $content['instruction_note'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid w-full shrink-0 grid-cols-2 gap-2 sm:w-auto sm:flex sm:items-center sm:justify-end sm:self-center">
                        <button
                                id="{{ $componentId }}_checkAnswersBtn"
                                data-action="check-answers"
                                type="button"
                                class="inline-flex h-10 items-center justify-center rounded-xl px-3 text-xs font-black text-white shadow-lg shadow-slate-900/15 transition duration-150 hover:-translate-y-0.5 hover:brightness-105 focus:outline-none focus:ring-4 focus:ring-slate-900/15 active:translate-y-0 sm:h-11 sm:px-5 {{ $buttonGradient }}"
                        >
                            <span class="sm:hidden">Check</span>
                            <span class="hidden sm:inline">Check Answers</span>
                        </button>

                        <button
                                id="{{ $componentId }}_revealAnswersBtn"
                                data-action="reveal-answers"
                                type="button"
                                class="inline-flex h-10 items-center justify-center rounded-xl border px-3 text-xs font-black shadow-sm transition duration-150 hover:-translate-y-0.5 focus:outline-none focus:ring-4 active:translate-y-0 sm:h-11 sm:px-5 {{ $softButtonClass }}"
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

                            <article class="group grid min-h-[4.2rem] grid-cols-[auto,minmax(0,1fr)] items-center gap-2.5 rounded-2xl border border-slate-200/90 bg-white/85 p-3 shadow-sm ring-1 ring-white/60 transition duration-150 hover:-translate-y-0.5 hover:shadow-md dark:border-slate-700/80 dark:bg-slate-950/35 dark:ring-white/5 sm:min-h-[4.35rem] sm:p-3.5 lg:p-4">
                                <div class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br {{ $speakerClass }} text-sm font-black text-white shadow-lg sm:h-9 sm:w-9 sm:text-base">
                                    {{ $speakerLabel }}
                                </div>

                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-baseline gap-x-1.5 gap-y-1.5 text-[0.84rem] font-extrabold leading-6 text-slate-950 dark:text-slate-50 sm:text-[0.9rem] md:text-[0.92rem] lg:text-[0.95rem]">
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
                                                    $inputSize = max(8, min(30, $longestInputText + 2));
                                                @endphp

                                                <textarea
                                                        class="lp-input answer-input mx-1 inline-block min-h-9 w-[8rem] max-w-full shrink-0 resize-none overflow-hidden rounded-xl border border-slate-300 bg-white px-2.5 py-2 text-xs font-black leading-5 text-slate-950 outline-none transition duration-150 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-50 dark:placeholder:text-slate-500 sm:w-[9rem] sm:text-sm md:w-[10rem] lg:w-[11rem]"
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
                                            @elseif(array_key_exists('html', $part))
                                                @php $html = trim((string) ($part['html'] ?? '')); @endphp

                                                @if($html !== '')
                                                    <span class="min-w-0 break-words">{!! $html !!}</span>
                                                @endif
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
