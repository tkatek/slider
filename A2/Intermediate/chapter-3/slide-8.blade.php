<?php
$content = [
    'page_title' => 'Listening task',
    'title' => 'Listening task',
    'subtitle' => 'Around the world',
    'instruction' => 'Listen. People are talking about superstitions. What countries have these superstitions? What do they mean?',
    'instruction_note' => 'Complete the missing information.',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide8.mp3'),

    'transcript' => [
        '1. 🐈 A Black Cat',
        'Woman: In different countries, people have different beliefs. A black cat can be lucky or unlucky.',
        'Man: In the U.S., if a black cat walks in front of you, it is bad luck.',
        'Woman: In Scotland, people think a black cat brings money.',
        '2. 🐍 A Snake',
        'Woman: In Thailand, if you dream about a snake, it means you will meet your future husband or wife.',
        'Man: In Japan, seeing a white snake brings good luck.',
        'Woman: I have never seen one!',
        '3. 🌕 A Full Moon',
        'Woman: In Spain, people think that going out on a full moon night is dangerous. You may see ghosts.',
        'Man: In Turkey, people believe that if you are born on a full moon, you will have a good future.',
        "Woman: That's a nice idea.",
    ],

    'rows' => [
        [
            'superstition' => '1  a black cat',
            'answers' => [
                [
                    'country' => 'the U.S.',
                    'country_answer' => 'the U.S.|the US|the USA|U.S.|US|USA',
                    'meaning' => 'have bad luck',
                    'meaning_answer' => 'have bad luck|bad luck', 
                    'done' => true,
                ],
                [
                    'country_answer' => 'Scotland',
                    'meaning_answer' => 'bring money|brings money',
                ],
            ],
        ],
        [
            'superstition' => '2  a snake',
            'answers' => [
                [
                    'country_answer' => 'Thailand',
                    'meaning_answer' => 'meet your future husband or wife|you will meet your future husband or wife',
                ],
                [
                    'country_answer' => 'Japan',
                    'meaning_answer' => 'bring good luck|brings good luck|good luck',
                ],
            ],
        ],
        [
            'superstition' => '3  a full moon',
            'answers' => [
                [
                    'country_answer' => 'Spain',
                    'meaning_answer' => 'dangerous|see ghosts|you may see ghosts',
                ],
                [
                    'country_answer' => 'Turkey',
                    'meaning_answer' => 'have a good future|you will have a good future', 
                ],
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;
    $scriptLines = is_array($content['transcript'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['transcript']), static fn ($line) => $line !== ''))
        : [];
    $hasScript = $scriptLines !== [];
@endphp

@section('style')
    <style>
        .st-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, .08);
        }

        .dark .st-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .st-title-panel {
            border-radius: 20px;
            border: 1px solid rgba(251, 146, 60, .22);
            background: linear-gradient(135deg, rgba(255, 247, 237, .92), rgba(255, 255, 255, .82));
            padding: .9rem 1rem;
        }

        .dark .st-title-panel {
            border-color: rgba(251, 146, 60, .18);
            background: linear-gradient(135deg, rgba(67, 20, 7, .34), rgba(15, 23, 42, .66));
        }

        .st-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .st-table th {
            background: linear-gradient(135deg, #fff7ed, #fed7aa);
            color: #9a3412;
            font-size: .78rem;
            font-weight: 900;
            letter-spacing: .02em;
            padding: .85rem;
            text-align: left;
            border-top: 1px solid rgba(251, 146, 60, .28);
            border-bottom: 1px solid rgba(251, 146, 60, .24);
        }

        .st-table th + th {
            border-left: 1px solid rgba(251, 146, 60, .18);
        }

        .st-table th:first-child {
            border-top-left-radius: 18px;
        }

        .st-table th:last-child {
            border-top-right-radius: 18px;
        }

        .st-table td {
            border-right: 1px solid rgba(226, 232, 240, .9);
            border-bottom: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .72);
            padding: .7rem;
            vertical-align: middle;
        }

        .st-table td:first-child {
            border-left: 1px solid rgba(226, 232, 240, .9);
            font-weight: 900;
            color: #0f172a;
        }

        .st-superstition-cell {
            background: linear-gradient(180deg, rgba(255, 247, 237, .75), rgba(248, 250, 252, .75)) !important;
        }

        .st-superstition-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .45rem .7rem;
            font-size: .9rem;
            line-height: 1.2;
        }

        .dark .st-table td {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .dark .st-table td:first-child {
            color: #f8fafc;
        }

        .dark .st-superstition-cell {
            background: linear-gradient(180deg, rgba(67, 20, 7, .22), rgba(2, 6, 23, .22)) !important;
        }

        .dark .st-superstition-label {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .st-input {
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(203, 213, 225, 1);
            background: #fff;
            padding: .75rem .8rem;
            font-size: .95rem;
            font-weight: 800;
            color: #0f172a;
            transition: border-color .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .st-input:focus {
            outline: none;
            border-color: rgba(249, 115, 22, .72);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, .16);
        }

        .st-input:disabled {
            border-color: rgba(34, 197, 94, .45);
            background: rgba(220, 252, 231, .78);
            color: #166534;
            opacity: 1;
        }

        .st-input.is-correct {
            border-color: #16a34a;
            background: rgba(220, 252, 231, .9);
            color: #166534;
        }

        .st-input.is-wrong {
            border-color: #dc2626;
            background: rgba(254, 226, 226, .95);
            color: #991b1b;
        }

        .dark .st-input {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, .82);
            color: #f8fafc;
        }

        .dark .st-input:disabled,
        .dark .st-input.is-correct {
            background: rgba(20, 83, 45, .42);
            color: #bbf7d0;
        }

        .dark .st-input.is-wrong {
            background: rgba(127, 29, 29, .42);
            color: #fecaca;
        }

        .st-btn {
            border-radius: 14px;
            padding: .65rem 1rem;
            font-size: .82rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .st-btn:hover {
            transform: translateY(-1px);
        }

        .st-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: #fff;
            box-shadow: 0 10px 22px rgba(234, 88, 12, .16);
        }

        .st-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .dark .st-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        .st-mobile-list {
            display: none;
        }

        .st-mobile-card {
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .78);
            padding: .85rem;
        }

        .dark .st-mobile-card {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .st-mobile-title {
            display: inline-flex;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .42rem .7rem;
            font-size: .86rem;
            font-weight: 900;
        }

        .dark .st-mobile-title {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .st-field-label {
            display: block;
            margin-bottom: .35rem;
            font-size: .72rem;
            font-weight: 900;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .dark .st-field-label {
            color: #94a3b8;
        }

        @media (max-width: 640px) {
            .st-table-wrap {
                display: none;
            }

            .st-mobile-list {
                display: grid;
                gap: .85rem;
            }

            .st-card {
                border-radius: 20px;
                padding: .85rem !important;
            }

            .st-title-panel {
                padding: .8rem;
            }

            .st-btn {
                flex: 1 1 100%;
                padding: .72rem .85rem;
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

            <div class="st-card p-4 sm:p-6">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="st-title-panel min-w-0 flex-1">
                        <h2 class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Listen. People are talking about superstitions. What countries have these superstitions? What do they mean?' }}
                        </h2>
                        <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                            {{ $content['instruction_note'] ?? 'Complete the missing information.' }}
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-end gap-2">
                        <button id="checkAnswersBtn" type="button" class="st-btn st-btn-primary">Check Answers</button>
                        <button id="revealAnswersBtn" type="button" class="st-btn st-btn-soft">Reveal answers</button>
                        <button id="retakeBtn" type="button" class="st-btn st-btn-soft">Retake</button>
                    </div>
                </div>

                <div class="st-table-wrap">
                    <table class="st-table" aria-label="Superstition table">
                        <thead>
                            <tr>
                                <th style="width: 26%;">Superstition</th>
                                <th style="width: 27%;">Country</th>
                                <th>Meaning</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content['rows'] as $row)
                                @foreach($row['answers'] as $index => $answer)
                                    @php
                                        $done = !empty($answer['done']);
                                        $countryValue = $done ? ($answer['country'] ?? '') : '';
                                        $meaningValue = $done ? ($answer['meaning'] ?? '') : '';
                                    @endphp
                                    <tr>
                                        @if($index === 0)
                                            <td rowspan="{{ count($row['answers']) }}" class="st-superstition-cell">
                                                <span class="st-superstition-label">{{ $row['superstition'] }}</span>
                                            </td>
                                        @endif
                                        <td>
                                            <input
                                                    type="text"
                                                    class="st-input answer-input"
                                                    data-answer="{{ $answer['country_answer'] ?? '' }}"
                                                    value="{{ $countryValue }}"
                                                    placeholder="Country"
                                                    @if($done) disabled @endif
                                            >
                                        </td>
                                        <td>
                                            <input
                                                    type="text"
                                                    class="st-input answer-input"
                                                    data-answer="{{ $answer['meaning_answer'] ?? '' }}"
                                                    value="{{ $meaningValue }}"
                                                    placeholder="Meaning"
                                                    @if($done) disabled @endif
                                            >
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="st-mobile-list">
                    @foreach($content['rows'] as $row)
                        <article class="st-mobile-card">
                            <div class="mb-3">
                                <span class="st-mobile-title">{{ $row['superstition'] }}</span>
                            </div>

                            <div class="grid grid-cols-1 gap-3">
                                @foreach($row['answers'] as $answer)
                                    @php
                                        $done = !empty($answer['done']);
                                        $countryValue = $done ? ($answer['country'] ?? '') : '';
                                        $meaningValue = $done ? ($answer['meaning'] ?? '') : '';
                                    @endphp
                                    <div class="grid grid-cols-1 gap-2 rounded-2xl border border-slate-200/80 bg-white/70 p-3 dark:border-slate-700/70 dark:bg-slate-950/25">
                                        <label>
                                            <span class="st-field-label">Country</span>
                                            <input
                                                    type="text"
                                                    class="st-input answer-input"
                                                    data-answer="{{ $answer['country_answer'] ?? '' }}"
                                                    value="{{ $countryValue }}"
                                                    placeholder="Country"
                                                    @if($done) disabled @endif
                                            >
                                        </label>

                                        <label>
                                            <span class="st-field-label">Meaning</span>
                                            <input
                                                    type="text"
                                                    class="st-input answer-input"
                                                    data-answer="{{ $answer['meaning_answer'] ?? '' }}"
                                                    value="{{ $meaningValue }}"
                                                    placeholder="Meaning"
                                                    @if($done) disabled @endif
                                            >
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
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

            function clearState(input) {
                if (input.disabled) return;
                input.classList.remove('is-correct', 'is-wrong');
            }

            function isCorrect(input) {
                const value = normalize(input.value);
                return value !== '' && answersFor(input).includes(value);
            }

            inputs.forEach(input => {
                input.addEventListener('input', () => clearState(input));
            });

            checkBtn?.addEventListener('click', () => {
                visibleInputs().forEach(input => {
                    if (input.disabled) return;
                    input.classList.remove('is-correct', 'is-wrong');
                    input.classList.add(isCorrect(input) ? 'is-correct' : 'is-wrong');
                });
            });

            revealBtn?.addEventListener('click', () => {
                visibleInputs().forEach(input => {
                    const answer = String(input.dataset.answer || '').split('|')[0].trim();
                    if (!answer || input.disabled) return;
                    input.value = answer;
                    input.classList.remove('is-wrong');
                    input.classList.add('is-correct');
                });
            });

            retakeBtn?.addEventListener('click', () => {
                visibleInputs().forEach(input => {
                    if (input.disabled) return;
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
