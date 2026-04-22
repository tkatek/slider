<?php
$content = [
    'page_title' => 'Listening task',
    'title' => 'Listening task',
    'subtitle' => 'Superstitions',
    'instruction' => 'Listen. Then check (✓) your answers.',
    'instruction_note' => '',
    'audio' => materialAsset('slider/A2/Intermediate/chapter-3/audios/slide9.mp3'),

    'transcript' => [

        'A coin - a piece of money from your own country. Some people carry a lucky coin. What do you think? Check your answer.',

        "The number four. In some countries, it's considered unlucky. How do you feel about the number four? Check your answer.",

        'A horseshoe - the piece of metal that a horse wears on the bottom of its foot. Some people believe that a horseshoe brings good luck. What does a horseshoe mean to you? Check your answer.',

        "A rabbit's foot. Some people think it's lucky to carry a rabbit's foot with you. What do you think? Check your answer.",

        'Opening an umbrella indoors. In some cultures, opening an umbrella indoors brings bad luck. How do you feel about it? Check your answer.',
    ],

    'options' => [
        'lucky' => "It's lucky.",
        'unlucky' => "It's unlucky.",
        'none' => 'It has no special meaning.',
    ],

    'rows' => [
        ['number' => 1, 'item' => 'A coin', 'correct' => 'lucky'],
        ['number' => 2, 'item' => 'The number four', 'correct' => 'unlucky'],
        ['number' => 3, 'item' => 'A horseshoe', 'correct' => 'lucky'],
        ['number' => 4, 'item' => "A rabbit's foot", 'correct' => 'lucky'],
        ['number' => 5, 'item' => 'Opening an umbrella indoors', 'correct' => 'unlucky'],
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
        .sc-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, .08);
        }

        .dark .sc-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .sc-title-panel {
            border-radius: 20px;
            border: 1px solid rgba(251, 146, 60, .22);
            background: linear-gradient(135deg, rgba(255, 247, 237, .92), rgba(255, 255, 255, .82));
            padding: .9rem 1rem;
        }

        .dark .sc-title-panel {
            border-color: rgba(251, 146, 60, .18);
            background: linear-gradient(135deg, rgba(67, 20, 7, .34), rgba(15, 23, 42, .66));
        }

        .sc-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .sc-table th {
            background: linear-gradient(135deg, #fff7ed, #fed7aa);
            color: #9a3412;
            font-size: .78rem;
            font-weight: 900;
            letter-spacing: .02em;
            padding: .85rem;
            text-align: center;
            border-top: 1px solid rgba(251, 146, 60, .28);
            border-bottom: 1px solid rgba(251, 146, 60, .24);
        }

        .sc-table th:first-child {
            border-top-left-radius: 18px;
            text-align: left;
        }

        .sc-table th:last-child {
            border-top-right-radius: 18px;
        }

        .sc-table th + th {
            border-left: 1px solid rgba(251, 146, 60, .18);
        }

        .sc-table td {
            border-right: 1px solid rgba(226, 232, 240, .9);
            border-bottom: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .72);
            padding: .72rem;
            vertical-align: middle;
            text-align: center;
        }

        .sc-table td:first-child {
            border-left: 1px solid rgba(226, 232, 240, .9);
            background: linear-gradient(180deg, rgba(255, 247, 237, .75), rgba(248, 250, 252, .75));
            text-align: left;
        }

        .dark .sc-table td {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .dark .sc-table td:first-child {
            background: linear-gradient(180deg, rgba(67, 20, 7, .22), rgba(2, 6, 23, .22));
        }

        .sc-row-label {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .45rem .7rem;
            font-size: .9rem;
            font-weight: 900;
            line-height: 1.2;
        }

        .sc-row-label small {
            color: #64748b;
            font-size: .76rem;
            font-weight: 800;
        }

        .dark .sc-row-label {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .dark .sc-row-label small {
            color: #cbd5e1;
        }

        .sc-choice {
            position: relative;
            display: inline-flex;
            min-height: 42px;
            min-width: 48px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            border: 1px solid rgba(203, 213, 225, 1);
            background: rgba(255, 255, 255, .88);
            transition: border-color .16s ease, background-color .16s ease, box-shadow .16s ease, transform .16s ease;
        }

        .sc-choice:hover {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, .52);
            box-shadow: 0 10px 22px rgba(234, 88, 12, .10);
        }

        .sc-choice input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .sc-box {
            display: grid;
            height: 22px;
            width: 22px;
            place-items: center;
            border-radius: 6px;
            border: 2px solid #94a3b8;
            background: #fff;
            color: #fff;
            font-size: .85rem;
            font-weight: 900;
            line-height: 1;
        }

        .sc-choice input:checked + .sc-box {
            border-color: #f97316;
            background: linear-gradient(135deg, #fdba74, #f97316);
        }

        .sc-choice input:checked + .sc-box::after {
            content: '✓';
        }

        .sc-choice.is-correct {
            border-color: #16a34a;
            background: rgba(220, 252, 231, .82);
        }

        .sc-choice.is-wrong {
            border-color: #dc2626;
            background: rgba(254, 226, 226, .92);
        }

        .sc-row.is-correct td {
            background-color: rgba(240, 253, 244, .74);
        }

        .sc-row.is-wrong td {
            background-color: rgba(255, 241, 242, .74);
        }

        .dark .sc-choice {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, .82);
        }

        .dark .sc-box {
            border-color: #64748b;
            background: #020617;
        }

        .dark .sc-choice.is-correct {
            background: rgba(20, 83, 45, .42);
        }

        .dark .sc-choice.is-wrong {
            background: rgba(127, 29, 29, .42);
        }

        .sc-btn {
            border-radius: 14px;
            padding: .65rem 1rem;
            font-size: .82rem;
            font-weight: 900;
            transition: transform .16s ease, box-shadow .16s ease, background-color .16s ease;
        }

        .sc-btn:hover {
            transform: translateY(-1px);
        }

        .sc-btn-primary {
            border: 1px solid rgba(255, 255, 255, .14);
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: #fff;
            box-shadow: 0 10px 22px rgba(234, 88, 12, .16);
        }

        .sc-btn-soft {
            border: 1px solid rgba(226, 232, 240, 1);
            background: #fff;
            color: #334155;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .05);
        }

        .dark .sc-btn-soft {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            color: #e2e8f0;
        }

        .sc-mobile-list {
            display: none;
        }

        .sc-mobile-card {
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .78);
            padding: .85rem;
        }

        .dark .sc-mobile-card {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .sc-mobile-card.is-correct {
            border-color: rgba(34, 197, 94, .45);
            background: rgba(240, 253, 244, .78);
        }

        .sc-mobile-card.is-wrong {
            border-color: rgba(244, 63, 94, .45);
            background: rgba(255, 241, 242, .78);
        }

        .sc-mobile-title {
            display: inline-flex;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .42rem .7rem;
            font-size: .86rem;
            font-weight: 900;
        }

        .sc-mobile-option {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
            gap: .85rem;
            border-radius: 16px;
            border: 1px solid rgba(226, 232, 240, .95);
            background: rgba(255, 255, 255, .72);
            padding: .78rem .85rem;
            font-size: .92rem;
            font-weight: 900;
            color: #0f172a;
        }

        .dark .sc-mobile-option {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(15, 23, 42, .62);
            color: #f8fafc;
        }

        @media (max-width: 640px) {
            .sc-table-wrap {
                display: none;
            }

            .sc-mobile-list {
                display: grid;
                gap: .85rem;
            }

            .sc-card {
                border-radius: 20px;
                padding: .85rem !important;
            }

            .sc-title-panel {
                padding: .8rem;
            }

            .sc-btn {
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

            <div class="sc-card p-4 sm:p-6">
                <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
                    <div class="sc-title-panel min-w-0 flex-1">
                        <h2 class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Listen. What does each superstition mean to you?' }}
                        </h2>
                        <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                            {{ $content['instruction_note'] ?? 'Check the correct box.' }}
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-end gap-2">
                        <button id="checkAnswersBtn" type="button" class="sc-btn sc-btn-primary">Check Answers</button>
                        <button id="revealAnswersBtn" type="button" class="sc-btn sc-btn-soft">Reveal answers</button>
                        <button id="retakeBtn" type="button" class="sc-btn sc-btn-soft">Retake</button>
                    </div>
                </div>

                <div class="sc-table-wrap">
                    <table class="sc-table" aria-label="Superstition choice table">
                        <thead>
                            <tr>
                                <th style="width: 26%;">Number</th>
                                @foreach($content['options'] as $label)
                                    <th>{{ $label }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content['rows'] as $row)
                                <tr class="sc-row" data-choice-row data-correct="{{ $row['correct'] }}">
                                    <td>
                                        <span class="sc-row-label">
                                            {{ $row['number'] }}
                                            <small>{{ $row['item'] }}</small>
                                        </span>
                                    </td>
                                    @foreach($content['options'] as $key => $label)
                                        <td>
                                            <label class="sc-choice">
                                                <input type="radio" name="desktop_choice_{{ $row['number'] }}" value="{{ $key }}">
                                                <span class="sc-box" aria-hidden="true"></span>
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="sc-mobile-list">
                    @foreach($content['rows'] as $row)
                        <article class="sc-mobile-card" data-choice-row data-correct="{{ $row['correct'] }}">
                            <div class="mb-3">
                                <span class="sc-mobile-title">{{ $row['number'] }} - {{ $row['item'] }}</span>
                            </div>

                            <div class="grid grid-cols-1 gap-2">
                                @foreach($content['options'] as $key => $label)
                                    <label class="sc-choice sc-mobile-option">
                                        <span>{{ $label }}</span>
                                        <input type="radio" name="mobile_choice_{{ $row['number'] }}" value="{{ $key }}">
                                        <span class="sc-box" aria-hidden="true"></span>
                                    </label>
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
            const rows = Array.from(document.querySelectorAll('[data-choice-row]'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeBtn');

            function visibleRows() {
                return rows.filter(row => row.offsetParent !== null);
            }

            function clearRow(row) {
                row.classList.remove('is-correct', 'is-wrong');
                row.querySelectorAll('.sc-choice').forEach(choice => {
                    choice.classList.remove('is-correct', 'is-wrong');
                });
            }

            function selectedInput(row) {
                return row.querySelector('input[type="radio"]:checked');
            }

            function markRow(row) {
                clearRow(row);

                const selected = selectedInput(row);
                const correct = row.dataset.correct;

                if (!selected) {
                    row.classList.add('is-wrong');
                    return;
                }

                const isCorrect = selected.value === correct;
                row.classList.add(isCorrect ? 'is-correct' : 'is-wrong');
                selected.closest('.sc-choice')?.classList.add(isCorrect ? 'is-correct' : 'is-wrong');
            }

            rows.forEach(row => {
                row.querySelectorAll('input[type="radio"]').forEach(input => {
                    input.addEventListener('change', () => clearRow(row));
                });
            });

            checkBtn?.addEventListener('click', () => {
                visibleRows().forEach(markRow);
            });

            revealBtn?.addEventListener('click', () => {
                visibleRows().forEach(row => {
                    const correct = row.dataset.correct;
                    const input = row.querySelector(`input[value="${CSS.escape(correct)}"]`);

                    if (input) {
                        input.checked = true; 
                    }

                    markRow(row);
                });
            });

            retakeBtn?.addEventListener('click', () => {
                visibleRows().forEach(row => {
                    row.querySelectorAll('input[type="radio"]').forEach(input => {
                        input.checked = false;
                    });
                    clearRow(row);
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
