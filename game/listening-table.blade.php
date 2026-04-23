@extends('slider.simple-layout')

@php
    $mode = $content['mode'] ?? (!empty($content['options']) ? 'choice_table' : 'type_table');
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;
    $scriptLines = is_array($content['transcript'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['transcript']), static fn ($line) => $line !== ''))
        : [];
    $hasScript = $scriptLines !== [];
@endphp

@section('style')
    <style>
        .lt-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 45px rgba(2, 6, 23, .08);
        }

        .dark .lt-card {
            border-color: rgba(51, 65, 85, .75);
            background: rgba(15, 23, 42, .86);
        }

        .lt-title-panel {
            border-radius: 20px;
            border: 1px solid rgba(251, 146, 60, .22);
            background: linear-gradient(135deg, rgba(255, 247, 237, .92), rgba(255, 255, 255, .82));
            padding: .9rem 1rem;
        }

        .dark .lt-title-panel {
            border-color: rgba(251, 146, 60, .18);
            background: linear-gradient(135deg, rgba(67, 20, 7, .34), rgba(15, 23, 42, .66));
        }

        .lt-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .lt-table th {
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

        .lt-table th + th {
            border-left: 1px solid rgba(251, 146, 60, .18);
        }

        .lt-table th:first-child {
            border-top-left-radius: 18px;
        }

        .lt-table th:last-child {
            border-top-right-radius: 18px;
        }

        .lt-table td {
            border-right: 1px solid rgba(226, 232, 240, .9);
            border-bottom: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .72);
            padding: .7rem;
            vertical-align: middle;
        }

        .lt-table td:first-child {
            border-left: 1px solid rgba(226, 232, 240, .9);
            font-weight: 900;
            color: #0f172a;
        }

        .lt-choice-table th,
        .lt-choice-table td {
            text-align: center;
        }

        .lt-choice-table th:first-child,
        .lt-choice-table td:first-child {
            text-align: left;
        }

        .lt-label-cell {
            background: linear-gradient(180deg, rgba(255, 247, 237, .75), rgba(248, 250, 252, .75)) !important;
        }

        .lt-label-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .45rem .7rem;
            font-size: .9rem;
            font-weight: 900;
            line-height: 1.2;
        }

        .lt-label-pill small {
            color: #64748b;
            font-size: .76rem;
            font-weight: 800;
        }

        .dark .lt-table td {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .dark .lt-table td:first-child {
            color: #f8fafc;
        }

        .dark .lt-label-cell {
            background: linear-gradient(180deg, rgba(67, 20, 7, .22), rgba(2, 6, 23, .22)) !important;
        }

        .dark .lt-label-pill {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .dark .lt-label-pill small {
            color: #cbd5e1;
        }

        .lt-input {
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

        .lt-input:focus {
            outline: none;
            border-color: rgba(249, 115, 22, .72);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, .16);
        }

        .lt-input:disabled {
            border-color: rgba(34, 197, 94, .45);
            background: rgba(220, 252, 231, .78);
            color: #166534;
            opacity: 1;
        }

        .lt-input.is-correct {
            border-color: #16a34a;
            background: rgba(220, 252, 231, .9);
            color: #166534;
        }

        .lt-input.is-wrong {
            border-color: #dc2626;
            background: rgba(254, 226, 226, .95);
            color: #991b1b;
        }

        .dark .lt-input {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, .82);
            color: #f8fafc;
        }

        .dark .lt-input:disabled,
        .dark .lt-input.is-correct {
            background: rgba(20, 83, 45, .42);
            color: #bbf7d0;
        }

        .dark .lt-input.is-wrong {
            background: rgba(127, 29, 29, .42);
            color: #fecaca;
        }

        .lt-choice {
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

        .lt-choice:hover {
            transform: translateY(-1px);
            border-color: rgba(249, 115, 22, .52);
            box-shadow: 0 10px 22px rgba(234, 88, 12, .10);
        }

        .lt-choice input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .lt-box {
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

        .lt-choice input:checked + .lt-box {
            border-color: #f97316;
            background: linear-gradient(135deg, #fdba74, #f97316);
        }

        .lt-choice input:checked + .lt-box::after {
            content: '\2713';
        }

        .lt-choice.is-correct {
            border-color: #16a34a;
            background: rgba(220, 252, 231, .82);
        }

        .lt-choice.is-wrong {
            border-color: rgba(120, 113, 108, .72);
            background: rgba(245, 245, 244, .92);
        }

        .lt-choice-row.is-correct td {
            background-color: rgba(240, 253, 244, .74);
        }

        .lt-choice-row.is-wrong td {
            background-color: rgba(245, 245, 244, .74);
        }

        .dark .lt-choice {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, .82);
        }

        .dark .lt-box {
            border-color: #64748b;
            background: #020617;
        }

        .dark .lt-choice.is-correct {
            background: rgba(20, 83, 45, .42);
        }

        .dark .lt-choice.is-wrong {
            border-color: rgba(168, 162, 158, .54);
            background: rgba(68, 64, 60, .38);
        }

        .dark .lt-choice-row.is-wrong td {
            background-color: rgba(68, 64, 60, .24);
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
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: #fff;
            box-shadow: 0 10px 22px rgba(234, 88, 12, .16);
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

        .lt-mobile-list {
            display: none;
        }

        .lt-mobile-card {
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(248, 250, 252, .78);
            padding: .85rem;
        }

        .dark .lt-mobile-card {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(2, 6, 23, .28);
        }

        .lt-mobile-card.is-correct {
            border-color: rgba(34, 197, 94, .45);
            background: rgba(240, 253, 244, .78);
        }

        .lt-mobile-card.is-wrong {
            border-color: rgba(120, 113, 108, .42);
            background: rgba(245, 245, 244, .78);
        }

        .dark .lt-mobile-card.is-wrong {
            border-color: rgba(168, 162, 158, .42);
            background: rgba(68, 64, 60, .28);
        }

        .lt-mobile-title {
            display: inline-flex;
            border-radius: 999px;
            background: rgba(251, 146, 60, .12);
            color: #9a3412;
            padding: .42rem .7rem;
            font-size: .86rem;
            font-weight: 900;
        }

        .dark .lt-mobile-title {
            background: rgba(251, 146, 60, .14);
            color: #fed7aa;
        }

        .lt-field-label {
            display: block;
            margin-bottom: .35rem;
            font-size: .72rem;
            font-weight: 900;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .dark .lt-field-label {
            color: #94a3b8;
        }

        .lt-mobile-option {
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

        .dark .lt-mobile-option {
            border-color: rgba(51, 65, 85, .85);
            background: rgba(15, 23, 42, .62);
            color: #f8fafc;
        }

        @media (max-width: 640px) {
            .lt-table-wrap {
                display: none;
            }

            .lt-mobile-list {
                display: grid;
                gap: .85rem;
            }

            .lt-card {
                border-radius: 20px;
                padding: .85rem !important;
            }

            .lt-title-panel {
                padding: .8rem;
            }

            .lt-btn {
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

            <div class="lt-card p-4 sm:p-6">
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
                        <button id="checkAnswersBtn" type="button" class="lt-btn lt-btn-primary">Check Answers</button>
                        <button id="revealAnswersBtn" type="button" class="lt-btn lt-btn-soft">Reveal answers</button>
                        <button id="retakeBtn" type="button" class="lt-btn lt-btn-soft">Retake</button>
                    </div>
                </div>

                @if($mode === 'choice_table')
                    <div class="lt-table-wrap">
                        <table class="lt-table lt-choice-table" aria-label="{{ $content['table_aria_label'] ?? 'Listening choice table' }}">
                            <thead>
                                <tr>
                                    <th style="width: 26%;">{{ $content['row_heading'] ?? 'Number' }}</th>
                                    @foreach(($content['options'] ?? []) as $label)
                                        <th>{{ $label }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(($content['rows'] ?? []) as $row)
                                    @php
                                        $rowCorrect = $row['correct'] ?? '';
                                        $isMultiChoiceRow = is_array($rowCorrect);
                                        $choiceInputType = $isMultiChoiceRow ? 'checkbox' : 'radio';
                                    @endphp
                                    <tr class="lt-choice-row" data-choice-row data-correct='@json($rowCorrect)' data-multi="{{ $isMultiChoiceRow ? '1' : '0' }}">
                                        <td>
                                            <span class="lt-label-pill">
                                                {{ $row['number'] ?? '' }}
                                                @if(!empty($row['item']))
                                                    <small>{{ $row['item'] }}</small>
                                                @endif
                                            </span>
                                        </td>
                                        @foreach(($content['options'] ?? []) as $key => $label)
                                            <td>
                                                <label class="lt-choice">
                                                    <input type="{{ $choiceInputType }}" name="desktop_choice_{{ $row['number'] ?? $loop->parent->index }}{{ $isMultiChoiceRow ? '[]' : '' }}" value="{{ is_int($key) ? $label : $key }}">
                                                    <span class="lt-box" aria-hidden="true"></span>
                                                </label>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="lt-mobile-list">
                        @foreach(($content['rows'] ?? []) as $row)
                            @php
                                $rowCorrect = $row['correct'] ?? '';
                                $isMultiChoiceRow = is_array($rowCorrect);
                                $choiceInputType = $isMultiChoiceRow ? 'checkbox' : 'radio';
                            @endphp
                            <article class="lt-mobile-card" data-choice-row data-correct='@json($rowCorrect)' data-multi="{{ $isMultiChoiceRow ? '1' : '0' }}">
                                <div class="mb-3">
                                    <span class="lt-mobile-title">
                                        {{ $row['number'] ?? '' }}@if(!empty($row['item'])) - {{ $row['item'] }} @endif
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 gap-2">
                                    @foreach(($content['options'] ?? []) as $key => $label)
                                        <label class="lt-choice lt-mobile-option">
                                            <span>{{ $label }}</span>
                                            <input type="{{ $choiceInputType }}" name="mobile_choice_{{ $row['number'] ?? $loop->parent->index }}{{ $isMultiChoiceRow ? '[]' : '' }}" value="{{ is_int($key) ? $label : $key }}">
                                            <span class="lt-box" aria-hidden="true"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="lt-table-wrap">
                        <table class="lt-table" aria-label="{{ $content['table_aria_label'] ?? 'Listening answer table' }}">
                            <thead>
                                <tr>
                                    <th style="width: 26%;">{{ $content['table_headers'][0] ?? 'Superstition' }}</th>
                                    <th style="width: 27%;">{{ $content['table_headers'][1] ?? 'Country' }}</th>
                                    <th>{{ $content['table_headers'][2] ?? 'Meaning' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(($content['rows'] ?? []) as $row)
                                    @foreach(($row['answers'] ?? []) as $index => $answer)
                                        @php
                                            $done = !empty($answer['done']);
                                            $countryValue = $done ? ($answer['country'] ?? '') : '';
                                            $meaningValue = $done ? ($answer['meaning'] ?? '') : '';
                                        @endphp
                                        <tr>
                                            @if($index === 0)
                                                <td rowspan="{{ count($row['answers'] ?? []) }}" class="lt-label-cell">
                                                    <span class="lt-label-pill">{{ $row['superstition'] ?? '' }}</span>
                                                </td>
                                            @endif
                                            <td>
                                                <input
                                                        type="text"
                                                        class="lt-input answer-input"
                                                        data-answer="{{ $answer['country_answer'] ?? '' }}"
                                                        value="{{ $countryValue }}"
                                                        placeholder="{{ $content['country_placeholder'] ?? 'Country' }}"
                                                        @if($done) disabled @endif
                                                >
                                            </td>
                                            <td>
                                                <input
                                                        type="text"
                                                        class="lt-input answer-input"
                                                        data-answer="{{ $answer['meaning_answer'] ?? '' }}"
                                                        value="{{ $meaningValue }}"
                                                        placeholder="{{ $content['meaning_placeholder'] ?? 'Meaning' }}"
                                                        @if($done) disabled @endif
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="lt-mobile-list">
                        @foreach(($content['rows'] ?? []) as $row)
                            <article class="lt-mobile-card">
                                <div class="mb-3">
                                    <span class="lt-mobile-title">{{ $row['superstition'] ?? '' }}</span>
                                </div>

                                <div class="grid grid-cols-1 gap-3">
                                    @foreach(($row['answers'] ?? []) as $answer)
                                        @php
                                            $done = !empty($answer['done']);
                                            $countryValue = $done ? ($answer['country'] ?? '') : '';
                                            $meaningValue = $done ? ($answer['meaning'] ?? '') : '';
                                        @endphp
                                        <div class="grid grid-cols-1 gap-2 rounded-2xl border border-slate-200/80 bg-white/70 p-3 dark:border-slate-700/70 dark:bg-slate-950/25">
                                            <label>
                                                <span class="lt-field-label">{{ $content['table_headers'][1] ?? 'Country' }}</span>
                                                <input
                                                        type="text"
                                                        class="lt-input answer-input"
                                                        data-answer="{{ $answer['country_answer'] ?? '' }}"
                                                        value="{{ $countryValue }}"
                                                        placeholder="{{ $content['country_placeholder'] ?? 'Country' }}"
                                                        @if($done) disabled @endif
                                                >
                                            </label>

                                            <label>
                                                <span class="lt-field-label">{{ $content['table_headers'][2] ?? 'Meaning' }}</span>
                                                <input
                                                        type="text"
                                                        class="lt-input answer-input"
                                                        data-answer="{{ $answer['meaning_answer'] ?? '' }}"
                                                        value="{{ $meaningValue }}"
                                                        placeholder="{{ $content['meaning_placeholder'] ?? 'Meaning' }}"
                                                        @if($done) disabled @endif
                                                >
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </article>
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
            const MODE = @json($mode);
            const inputs = Array.from(document.querySelectorAll('.answer-input'));
            const rows = Array.from(document.querySelectorAll('[data-choice-row]'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const revealBtn = document.getElementById('revealAnswersBtn');
            const retakeBtn = document.getElementById('retakeBtn');

            function visibleInputs() {
                return inputs.filter(input => input.offsetParent !== null);
            }

            function visibleRows() {
                return rows.filter(row => row.offsetParent !== null);
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
                if (input.disabled) return;
                input.classList.remove('is-correct', 'is-wrong');
            }

            function isInputCorrect(input) {
                const value = normalize(input.value);
                return value !== '' && answersFor(input).includes(value);
            }

            function clearChoiceRow(row) {
                row.classList.remove('is-correct', 'is-wrong');
                row.querySelectorAll('.lt-choice').forEach(choice => {
                    choice.classList.remove('is-correct', 'is-wrong');
                });
            }

            function correctValues(row) {
                try {
                    const parsed = JSON.parse(row.dataset.correct || '""');
                    return Array.isArray(parsed) ? parsed.map(normalize) : [normalize(parsed)];
                } catch (error) {
                    return [normalize(row.dataset.correct || '')];
                }
            }

            function selectedInputs(row) {
                return Array.from(row.querySelectorAll('input:checked'));
            }

            function selectedValues(row) {
                return selectedInputs(row).map(input => normalize(input.value));
            }

            function sameSet(a, b) {
                if (a.length !== b.length) return false;
                const sortedA = [...a].sort();
                const sortedB = [...b].sort();

                return sortedA.every((value, index) => value === sortedB[index]);
            }

            function markChoiceRow(row) {
                clearChoiceRow(row);

                const selected = selectedInputs(row);
                const selectedSet = selectedValues(row);
                const correctSet = correctValues(row);

                if (selected.length === 0) {
                    row.classList.add('is-wrong');
                    return;
                }

                const isCorrect = sameSet(selectedSet, correctSet);
                row.classList.add(isCorrect ? 'is-correct' : 'is-wrong');
                selected.forEach(input => {
                    input.closest('.lt-choice')?.classList.add(isCorrect ? 'is-correct' : 'is-wrong');
                });
            }

            inputs.forEach(input => {
                input.addEventListener('input', () => clearInputState(input));
            });

            rows.forEach(row => {
                row.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                    input.addEventListener('change', () => clearChoiceRow(row));
                });
            });

            checkBtn?.addEventListener('click', () => {
                if (MODE === 'choice_table') {
                    visibleRows().forEach(markChoiceRow);
                    return;
                }

                visibleInputs().forEach(input => {
                    if (input.disabled) return;
                    input.classList.remove('is-correct', 'is-wrong');
                    input.classList.add(isInputCorrect(input) ? 'is-correct' : 'is-wrong');
                });
            });

            revealBtn?.addEventListener('click', () => {
                if (MODE === 'choice_table') {
                    visibleRows().forEach(row => {
                        const correctSet = correctValues(row);

                        row.querySelectorAll('input').forEach(input => {
                            input.checked = correctSet.includes(normalize(input.value));
                        });

                        markChoiceRow(row);
                    });
                    return;
                }

                visibleInputs().forEach(input => {
                    const answer = String(input.dataset.answer || '').split('|')[0].trim();
                    if (!answer || input.disabled) return;
                    input.value = answer;
                    input.classList.remove('is-wrong');
                    input.classList.add('is-correct');
                });
            });

            retakeBtn?.addEventListener('click', () => {
                if (MODE === 'choice_table') {
                    visibleRows().forEach(row => {
                        row.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                            input.checked = false;
                        });
                        clearChoiceRow(row);
                    });
                    return;
                }

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
