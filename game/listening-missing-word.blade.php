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
    $speakerClasses = [
        'A' => 'lp-speaker-blue',
        'B' => 'lp-speaker-emerald',
    ];
    $fallbackSpeakerClasses = [
        'lp-speaker-violet',
        'lp-speaker-rose',
        'lp-speaker-sky',
        'lp-speaker-amber',
    ];
@endphp

@section('style')
    <style>
        .lt-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .94);
            box-shadow: 0 20px 50px rgba(15, 23, 42, .08);
        }

        .dark .lt-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .lt-title-panel {
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .95);
            background: linear-gradient(135deg, rgba(248, 250, 252, .96), rgba(255, 255, 255, .86));
            padding: .9rem 1rem;
        }

        .dark .lt-title-panel {
            border-color: rgba(51, 65, 85, .75);
            background: linear-gradient(135deg, rgba(30, 41, 59, .72), rgba(15, 23, 42, .66));
        }

        .lt-btn {
            border-radius: 14px;
            padding: .65rem 1rem;
            font-size: .82rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .lt-btn:hover {
            transform: translateY(-1px);
        }

        .lt-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #475569, #111827);
            color: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .16);
        }

        .lt-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .dark .lt-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        .lp-dialogue {
            display: grid;
            gap: .75rem;
        }

        .lp-line {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: .7rem;
            align-items: start;
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .88);
            background: rgba(248, 250, 252, .78);
            padding: .85rem;
            box-shadow: 0 10px 26px rgba(15, 23, 42, .04);
        }

        .dark .lp-line {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .lp-speaker {
            display: inline-flex;
            min-width: 2.35rem;
            height: 2.35rem;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            color: #fff;
            font-size: .95rem;
            font-weight: 1000;
            box-shadow: 0 10px 20px rgba(15, 23, 42, .12);
        }

        .lp-speaker-blue {
            background: linear-gradient(135deg, #6366f1, #2563eb);
        }

        .lp-speaker-emerald {
            background: linear-gradient(135deg, #10b981, #0d9488);
        }

        .lp-speaker-violet {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .lp-speaker-rose {
            background: linear-gradient(135deg, #fb7185, #e11d48);
        }

        .lp-speaker-sky {
            background: linear-gradient(135deg, #38bdf8, #0284c7);
        }

        .lp-speaker-amber {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .lp-text {
            color: #0f172a;
            font-size: .98rem;
            font-weight: 800;
            line-height: 2.15;
        }

        .dark .lp-text {
            color: #f8fafc;
        }

        .lp-input {
            display: inline-block;
            width: auto;
            min-width: 5.8rem;
            max-width: 100%;
            height: 2.1rem;
            margin: 0 .16rem;
            border-radius: 12px;
            border: 1px solid rgba(203, 213, 225, 1);
            background: #fff;
            padding: .35rem .55rem;
            color: #0f172a;
            font-size: .88rem;
            font-weight: 900;
            line-height: 1;
            text-align: left;
            outline: none;
            transition: border-color .16s ease, box-shadow .16s ease, background-color .16s ease;
            vertical-align: middle;
        }

        .lp-input:focus {
            border-color: rgba(99, 102, 241, .76);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .16);
        }

        .lp-input.is-correct {
            border-color: #16a34a;
            background: rgba(220, 252, 231, .9);
            color: #166534;
        }

        .lp-input.is-wrong {
            border-color: #dc2626;
            background: rgba(254, 226, 226, .95);
            color: #991b1b;
        }

        .dark .lp-input {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, .82);
            color: #f8fafc;
        }

        .dark .lp-input.is-correct {
            background: rgba(20, 83, 45, .42);
            color: #bbf7d0;
        }

        .dark .lp-input.is-wrong {
            background: rgba(127, 29, 29, .42);
            color: #fecaca;
        }

        .lp-transcript {
            margin-top: 1rem;
            border-radius: 20px;
            border: 1px dashed rgba(148, 163, 184, .48);
            background: rgba(248, 250, 252, .76);
            padding: .9rem;
        }

        .dark .lp-transcript {
            border-color: rgba(100, 116, 139, .34);
            background: rgba(15, 23, 42, .34);
        }

        .lp-transcript-title {
            margin-bottom: .45rem;
            color: #475569;
            font-size: .78rem;
            font-weight: 1000;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .dark .lp-transcript-title {
            color: #cbd5e1;
        }

        .lp-transcript p {
            margin: .3rem 0;
            color: #334155;
            font-size: .88rem;
            font-weight: 750;
            line-height: 1.55;
        }

        .dark .lp-transcript p {
            color: #cbd5e1;
        }

        @media (max-width: 640px) {
            .lt-card {
                border-radius: 20px;
                padding: .85rem !important;
            }

            .lt-title-panel {
                padding: .8rem;
            }

            .lt-btn {
                flex: 1 1 0;
                min-width: 0;
                padding: .62rem .45rem;
                font-size: .74rem;
                border-radius: 12px;
                white-space: nowrap;
            }

            .lp-line {
                grid-template-columns: auto 1fr;
                gap: .65rem;
                padding: .8rem;
            }

            .lp-speaker {
                min-width: 2.15rem;
                height: 2.15rem;
                border-radius: 14px;
            }

            .lp-text {
                font-size: .92rem;
                line-height: 2.05;
            }

            .lp-input {
                min-width: 5.2rem;
                max-width: 100%;
                height: 2rem;
                font-size: .82rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-4 py-5 sm:px-8">
            @if($playerAudio)
                <div class="mx-auto mb-5 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="lt-card {{ $cardClass }} p-4 sm:p-6">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="lt-title-panel min-w-0 flex-1">
                        <h2 class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Listen and complete the activity.' }}
                        </h2>

                        @if(($content['instruction_note'] ?? '') !== '')
                            <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                {{ $content['instruction_note'] }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap items-center justify-end gap-2">
                        <button id="checkAnswersBtn" type="button" class="lt-btn lt-btn-primary">
                            <span class="sm:hidden">Check</span>
                            <span class="hidden sm:inline">Check Answers</span>
                        </button>
                        <button id="revealAnswersBtn" type="button" class="lt-btn lt-btn-soft">
                            <span class="sm:hidden">Reveal</span>
                            <span class="hidden sm:inline">Reveal answers</span>
                        </button>
                        <button id="retakeBtn" type="button" class="lt-btn lt-btn-soft">Retake</button>
                    </div>
                </div>

                <div class="lp-dialogue {{ $gridClass }}">
                    @php $blankIndex = 0; @endphp

                    @foreach($lines as $line)
                        @php
                            $speaker = (string) ($line['speaker'] ?? '');
                            $speakerKey = strtoupper(trim($speaker));
                            $speakerClass = $speakerClasses[$speakerKey]
                                ?? $fallbackSpeakerClasses[$loop->index % count($fallbackSpeakerClasses)];
                        @endphp

                        <article class="lp-line">
                            <div class="lp-speaker {{ $speakerClass }}">
                                {{ $speaker }}
                            </div>

                            <div class="lp-text">
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
                                            $inputSize = max(8, min(28, $longestInputText + 2));
                                        @endphp

                                        <input
                                                type="text"
                                                class="lp-input answer-input"
                                                size="{{ $inputSize }}"
                                                placeholder="{{ $placeholder }}"
                                                data-answer="{{ $answers }}"
                                                data-key="{{ $blankIndex }}"
                                                autocomplete="off"
                                                spellcheck="false"
                                        >

                                        @php $blankIndex++; @endphp
                                    @else
                                        <span>{{ $part['text'] ?? '' }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>

                @if(!empty($content['show_transcript']) && $hasScript)
                    <div class="lp-transcript">
                        <div class="lp-transcript-title">Transcript</div>

                        @foreach($scriptLines as $scriptLine)
                            <p>{{ $scriptLine }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = Array.from(document.querySelectorAll('.answer-input'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeBtn');
            const sounds = @json($sounds);
            const sfx = {
                tap: new Audio(sounds.tap || '/slider/sounds/tap.wav'),
                correct: new Audio(sounds.correct || '/slider/sounds/correct.wav'),
                wrong: new Audio(sounds.wrong || '/slider/sounds/wrong.wav'),
                success: new Audio(sounds.success || '/slider/sounds/success.wav'),
            };

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

            function clearInputState(input) {
                input.classList.remove('is-correct', 'is-wrong');
            }

            function isInputCorrect(input) {
                const value = normalize(input.value);
                return value !== '' && answersFor(input).includes(value);
            }

            inputs.forEach(input => {
                input.addEventListener('focus', () => playSfx('tap'));
                input.addEventListener('input', () => clearInputState(input));
            });

            checkBtn?.addEventListener('click', () => {
                let correctCount = 0;
                const currentInputs = visibleInputs();

                currentInputs.forEach(input => {
                    const isCorrect = isInputCorrect(input);

                    input.classList.remove('is-correct', 'is-wrong');
                    input.classList.add(isCorrect ? 'is-correct' : 'is-wrong');

                    if (isCorrect) correctCount++;
                });

                playSfx(correctCount === currentInputs.length && currentInputs.length > 0 ? 'correct' : 'wrong');
            });

            revealBtn?.addEventListener('click', () => {
                visibleInputs().forEach(input => {
                    const answer = String(input.dataset.answer || '').split('|')[0].trim();

                    if (!answer) return;

                    input.value = answer;
                    input.classList.remove('is-wrong');
                    input.classList.add('is-correct');
                });

                playSfx('success');
            });

            retakeBtn?.addEventListener('click', () => {
                visibleInputs().forEach(input => {
                    input.value = '';
                    input.classList.remove('is-correct', 'is-wrong');
                });
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
                retakeBtn?.click();
            };
        });
    </script>
@endsection
