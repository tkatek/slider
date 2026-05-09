@extends('slider.simple-layout')

@php
    $mode = $content['mode'] ?? (!empty($content['options']) ? 'choice_table' : 'type_table');
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $scriptLines = is_array($content['transcript'] ?? null)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $content['transcript']), static fn ($line) => $line !== ''))
        : [];

    $hasScript = $scriptLines !== [];

    $choiceRows = is_array($content['rows'] ?? null) ? $content['rows'] : [];
    $optionsList = is_array($content['options_list'] ?? null) ? $content['options_list'] : [];
    $choiceUsesRowOptions = false;
    $maxChoiceColumns = 0;

    foreach ($choiceRows as $choiceRow) {
        if (is_array($choiceRow['options'] ?? null) && ($choiceRow['options'] ?? []) !== []) {
            $choiceUsesRowOptions = true;
        }

        $maxChoiceColumns = max($maxChoiceColumns, count($choiceRow['options'] ?? []));
    }

    if (!$choiceUsesRowOptions) {
        $maxChoiceColumns = count($content['options'] ?? []); 
    }

    $tableHeaders = is_array($content['table_headers'] ?? null) ? $content['table_headers'] : []; 
    $hasMeaningColumn = !empty($tableHeaders[2]);

    foreach (($content['rows'] ?? []) as $typeRow) {
        foreach (($typeRow['answers'] ?? []) as $typeAnswer) {
            if (array_key_exists('meaning_answer', $typeAnswer) || array_key_exists('meaning', $typeAnswer)) { 
                $hasMeaningColumn = true;
                break 2;
            }
        }
    }

    $typeColumns = [
        [
            'key' => 'country',
            'header' => $tableHeaders[1] ?? 'Country',
            'placeholder' => $content['country_placeholder'] ?? ($tableHeaders[1] ?? 'Country'),
            'answer_key' => 'country_answer',
            'value_key' => 'country',
        ],
    ];

    if ($hasMeaningColumn) {
        $typeColumns[] = [
            'key' => 'meaning',
            'header' => $tableHeaders[2] ?? 'Meaning',
            'placeholder' => $content['meaning_placeholder'] ?? ($tableHeaders[2] ?? 'Meaning'),
            'answer_key' => 'meaning_answer',
            'value_key' => 'meaning',
        ];
    }

    $typeInputColumnCount = count($typeColumns);
    $firstTypeColumnWidth = $typeInputColumnCount === 1 ? 'w-[58%]' : 'w-[34%]';
    $inputTypeColumnWidth = $typeInputColumnCount === 1 ? 'w-[42%]' : 'w-[33%]';

    $theme = $theme ?? [];
    $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500'));
    $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500'));

    $choiceColumnThemes = [
        [
            'head' => 'bg-sky-50 text-sky-800 dark:bg-sky-950/45 dark:text-sky-100',
            'cell' => 'bg-sky-50/20 dark:bg-sky-950/10',
        ],
        [
            'head' => 'bg-violet-50 text-violet-800 dark:bg-violet-950/45 dark:text-violet-100',
            'cell' => 'bg-violet-50/20 dark:bg-violet-950/10',
        ],
        [
            'head' => 'bg-amber-50 text-amber-800 dark:bg-amber-950/45 dark:text-amber-100',
            'cell' => 'bg-amber-50/20 dark:bg-amber-950/10',
        ],
        [
            'head' => 'bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-100',
            'cell' => 'bg-slate-50/45 dark:bg-slate-950/20',
        ],
    ];

    $tableHeadClass = 'border-b border-slate-200 bg-slate-100 px-4 py-3 text-left text-xs font-black uppercase tracking-[0.06em] text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-200';
    $tableHeadCenterClass = 'border-b border-slate-200 px-4 py-3 text-center text-xs font-black uppercase tracking-[0.06em] dark:border-slate-700';
    $tableCellClass = 'border-b border-slate-200 bg-white px-4 py-3 align-middle dark:border-slate-700 dark:bg-slate-900/80';
    $tableCellSoftClass = 'border-b border-slate-200 bg-slate-50/80 px-4 py-3 align-middle dark:border-slate-700 dark:bg-slate-950/45';
    $pillClass = 'inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-sm font-black leading-tight text-slate-800 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100';
    $choiceControlClass = 'h-5 w-5 cursor-pointer rounded border-slate-300 accent-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400/35 dark:border-slate-600 dark:accent-indigo-300 dark:focus:ring-indigo-300/25';
    $inputClass = 'answer-input w-full rounded-2xl border border-slate-300 bg-white px-3 py-3 text-sm font-extrabold text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-slate-500 focus:outline-none focus:ring-4 focus:ring-slate-300/45 disabled:border-emerald-400 disabled:bg-emerald-50 disabled:text-emerald-700 disabled:opacity-100 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 data-[state=wrong]:text-red-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-slate-400 dark:focus:ring-slate-600/45 dark:disabled:border-emerald-500/70 dark:disabled:bg-emerald-950/45 dark:disabled:text-emerald-100 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/45 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/45 dark:data-[state=wrong]:text-red-100';
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-4 py-5 sm:px-8">
            @if($playerAudio)
                <div class="mx-auto mb-5 max-w-3xl">
                    @include('slider.components.audio-player')
                </div>
            @endif

            <div class="relative overflow-hidden rounded-[1.75rem] border border-slate-200/90 bg-white/95 p-4 shadow-[0_22px_58px_rgba(15,23,42,0.09)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-6">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-1.5 {{ $primaryGradient }}"></div>

                <div class="mb-4 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                    <div class="relative min-w-0 flex-1 overflow-hidden rounded-[1.25rem] border border-slate-200 bg-slate-50/80 px-4 py-3 dark:border-slate-700 dark:bg-slate-950/35">
                        <div class="pointer-events-none absolute bottom-0 left-0 top-0 w-1.5 {{ $primaryGradient }}"></div>

                        <h2 class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-lg">
                            {{ $content['instruction'] ?? 'Listen and complete the activity.' }}
                        </h2>

                        @if(($content['instruction_note'] ?? '') !== '')
                            <p class="mt-1 text-xs font-bold text-slate-500 dark:text-slate-400 sm:text-sm">
                                {{ $content['instruction_note'] }}
                            </p>
                        @endif
                    </div>

                    <div class="grid w-full grid-cols-3 gap-1.5 sm:gap-2 lg:w-auto lg:flex lg:flex-wrap lg:items-center lg:justify-end">
                        <button
                                id="checkAnswersBtn"
                                type="button"
                                class="min-w-0 rounded-xl border border-white/20 px-2 py-2 text-[10px] font-black leading-tight text-white shadow-md transition hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-slate-300/60 dark:focus:ring-slate-600 sm:rounded-2xl sm:px-4 sm:py-2.5 sm:text-xs {{ $buttonGradient }}"
                        >
                            Check Answers
                        </button>

                        <button
                                id="revealAnswersBtn"
                                type="button"
                                class="min-w-0 rounded-xl border border-slate-200 bg-white px-2 py-2 text-[10px] font-black leading-tight text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700 sm:rounded-2xl sm:px-4 sm:py-2.5 sm:text-xs"
                        >
                            Reveal answers
                        </button>

                        <button
                                id="retakeBtn"
                                type="button"
                                class="min-w-0 rounded-xl border border-slate-200 bg-white px-2 py-2 text-[10px] font-black leading-tight text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800 dark:focus:ring-slate-700 sm:rounded-2xl sm:px-4 sm:py-2.5 sm:text-xs"
                        >
                            Retake
                        </button>
                    </div>
                </div>

                @if($optionsList !== [])
                    <div class="mb-4 rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900">
                        @if(($content['options_list_title'] ?? '') !== '')
                            <p class="mb-2 text-xs font-black uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400">
                                {{ $content['options_list_title'] }}
                            </p>
                        @endif

                        <div class="grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($optionsList as $letter => $option)
                                @php
                                    $isAssocOption = !is_int($letter);
                                @endphp

                                <div class="rounded-xl border border-slate-100 bg-slate-50 px-3 py-2 text-sm font-black text-slate-800 dark:border-slate-800 dark:bg-slate-950/35 dark:text-slate-100">
                                    @if($isAssocOption)
                                        <span class="mr-1 text-slate-500 dark:text-slate-400">{{ $letter }}.</span>
                                    @endif
                                    <span>{{ $option }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($mode === 'choice_table')
                    <div class="hidden overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 sm:block">
                        <table class="w-full table-fixed border-separate border-spacing-0" aria-label="{{ $content['table_aria_label'] ?? 'Listening choice table' }}">
                            <thead>
                            <tr>
                                <th class="w-[26%] {{ $tableHeadClass }}">
                                    {{ $content['row_heading'] ?? 'Number' }}
                                </th>

                                @if($choiceUsesRowOptions)
                                    <th colspan="{{ max(1, $maxChoiceColumns) }}" class="{{ $tableHeadCenterClass }}">
                                        {{ $content['option_heading'] ?? 'Options' }}
                                    </th>
                                @else
                                    @foreach(($content['options'] ?? []) as $optionIndex => $label)
                                        @php
                                            $columnTheme = $choiceColumnThemes[$loop->index % count($choiceColumnThemes)];
                                        @endphp

                                        <th class="{{ $tableHeadCenterClass }} {{ $columnTheme['head'] }} border-l">
                                            {{ $label }}
                                        </th>
                                    @endforeach
                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(($content['rows'] ?? []) as $row)
                                @php
                                    $rowCorrect = $row['correct'] ?? '';
                                    $isMultiChoiceRow = is_array($rowCorrect);
                                    $choiceInputType = $isMultiChoiceRow ? 'checkbox' : 'radio';
                                    $rowKey = $row['key'] ?? $row['number'] ?? $loop->index;
                                    $rowLabel = $row['label'] ?? $row['number'] ?? '';
                                    $rowLabelIsNumber = preg_match('/^\d+$/', trim((string) $rowLabel)) === 1;
                                    $choiceControlRoundedClass = $choiceInputType === 'radio' ? 'rounded-full' : 'rounded-md';
                                @endphp

                                <tr
                                        data-choice-row
                                        data-correct='@json($rowCorrect)'
                                        data-multi="{{ $isMultiChoiceRow ? '1' : '0' }}"
                                        class="data-[state=correct]:[&>td]:bg-emerald-50 data-[state=wrong]:[&>td]:bg-red-50/80 dark:data-[state=correct]:[&>td]:bg-emerald-950/30 dark:data-[state=wrong]:[&>td]:bg-red-950/30"
                                >
                                    <td class="{{ $tableCellSoftClass }} border-r">
                                            <span class="{{ $pillClass }}">
                                                @if($rowLabelIsNumber)
                                                    <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full px-2 text-xs font-black text-white shadow-sm {{ $buttonGradient }}">
                                                        {{ $rowLabel }}
                                                    </span>
                                                @else
                                                    <span>{{ $rowLabel }}</span>
                                                @endif

                                                @if(!empty($row['item']))
                                                    <small class="text-xs font-extrabold text-slate-500 dark:text-slate-300">
                                                        {{ $row['item'] }}
                                                    </small>
                                                @endif
                                            </span>
                                    </td>

                                    @if($choiceUsesRowOptions)
                                        @php
                                            $rowOptions = array_values($row['options'] ?? []);
                                        @endphp

                                        @for($optionIndex = 0; $optionIndex < max(1, $maxChoiceColumns); $optionIndex++)
                                            <td class="{{ $tableCellClass }} border-r text-center last:border-r-0">
                                                @if(array_key_exists($optionIndex, $rowOptions))
                                                    @php
                                                        $optionLabel = $rowOptions[$optionIndex];
                                                        $optionValue = is_string($optionLabel) ? $optionLabel : (string) $optionIndex;
                                                    @endphp

                                                    <label
                                                            data-choice
                                                            class="inline-flex w-full cursor-pointer items-center justify-center gap-3 rounded-2xl border border-transparent px-3 py-2 text-sm font-bold text-slate-700 transition hover:border-slate-200 hover:bg-slate-50 data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 data-[state=wrong]:text-red-800 dark:text-slate-200 dark:hover:border-slate-700 dark:hover:bg-slate-800 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/45 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/45 dark:data-[state=wrong]:text-red-100"
                                                    >
                                                        <input
                                                                type="{{ $choiceInputType }}"
                                                                name="desktop_choice_{{ $rowKey }}{{ $isMultiChoiceRow ? '[]' : '' }}"
                                                                value="{{ $optionValue }}"
                                                                class="{{ $choiceControlClass }} {{ $choiceControlRoundedClass }}"
                                                        >
                                                        <span class="leading-tight">{{ $optionLabel }}</span>
                                                    </label>
                                                @endif
                                            </td>
                                        @endfor
                                    @else
                                        @foreach(($content['options'] ?? []) as $key => $label)
                                            @php
                                                $columnTheme = $choiceColumnThemes[$loop->index % count($choiceColumnThemes)];
                                            @endphp

                                            <td class="{{ $tableCellClass }} {{ $columnTheme['cell'] }} border-r text-center last:border-r-0">
                                                <label
                                                        data-choice
                                                        class="inline-flex h-11 w-11 cursor-pointer items-center justify-center rounded-2xl border border-slate-300 bg-white shadow-sm transition hover:-translate-y-0.5 hover:border-slate-400 hover:bg-slate-50 has-[:checked]:border-slate-700 has-[:checked]:bg-slate-900 has-[:checked]:text-white data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 dark:border-slate-700 dark:bg-slate-900 dark:hover:bg-slate-800 dark:has-[:checked]:border-slate-200 dark:has-[:checked]:bg-slate-100 dark:has-[:checked]:text-slate-950 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/45 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/45"
                                                >
                                                    <input
                                                            type="{{ $choiceInputType }}"
                                                            name="desktop_choice_{{ $rowKey }}{{ $isMultiChoiceRow ? '[]' : '' }}"
                                                            value="{{ is_int($key) ? $label : $key }}"
                                                            class="{{ $choiceControlClass }} {{ $choiceControlRoundedClass }}"
                                                            aria-label="{{ $label }}"
                                                    >
                                                </label>
                                            </td>
                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="grid gap-3 sm:hidden">
                        @foreach(($content['rows'] ?? []) as $row)
                            @php
                                $rowCorrect = $row['correct'] ?? '';
                                $isMultiChoiceRow = is_array($rowCorrect);
                                $choiceInputType = $isMultiChoiceRow ? 'checkbox' : 'radio';
                                $rowKey = $row['key'] ?? $row['number'] ?? $loop->index;
                                $rowLabel = $row['label'] ?? $row['number'] ?? '';
                                $rowLabelIsNumber = preg_match('/^\d+$/', trim((string) $rowLabel)) === 1;
                                $choiceControlRoundedClass = $choiceInputType === 'radio' ? 'rounded-full' : 'rounded-md';
                            @endphp

                            <article
                                    data-choice-row
                                    data-correct='@json($rowCorrect)'
                                    data-multi="{{ $isMultiChoiceRow ? '1' : '0' }}"
                                    class="rounded-[1.25rem] border border-slate-200 bg-white p-3 shadow-sm data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 dark:border-slate-700 dark:bg-slate-900 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/35 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/35"
                            >
                                <div class="mb-3">
                                    <span class="{{ $pillClass }}">
                                        @if($rowLabelIsNumber)
                                            <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full px-2 text-xs font-black text-white shadow-sm {{ $buttonGradient }}">
                                                {{ $rowLabel }}
                                            </span>
                                        @else
                                            <span>{{ $rowLabel }}</span>
                                        @endif

                                        @if(!empty($row['item']))
                                            <small class="text-xs font-extrabold text-slate-500 dark:text-slate-300">{{ $row['item'] }}</small>
                                        @endif
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 gap-2">
                                    @foreach(($choiceUsesRowOptions ? ($row['options'] ?? []) : ($content['options'] ?? [])) as $key => $label)
                                        <label
                                                data-choice
                                                class="flex w-full cursor-pointer items-center justify-between gap-3 rounded-2xl border border-slate-200 bg-slate-50/80 px-3 py-3 text-sm font-black text-slate-900 transition hover:border-slate-300 hover:bg-white has-[:checked]:border-slate-700 has-[:checked]:bg-slate-900 has-[:checked]:text-white data-[state=correct]:border-emerald-500 data-[state=correct]:bg-emerald-50 data-[state=correct]:text-emerald-800 data-[state=wrong]:border-red-500 data-[state=wrong]:bg-red-50 data-[state=wrong]:text-red-800 dark:border-slate-700 dark:bg-slate-950/35 dark:text-slate-50 dark:hover:bg-slate-800 dark:has-[:checked]:border-slate-200 dark:has-[:checked]:bg-slate-100 dark:has-[:checked]:text-slate-950 dark:data-[state=correct]:border-emerald-500 dark:data-[state=correct]:bg-emerald-950/45 dark:data-[state=correct]:text-emerald-100 dark:data-[state=wrong]:border-red-500 dark:data-[state=wrong]:bg-red-950/45 dark:data-[state=wrong]:text-red-100"
                                        >
                                            <span>{{ $label }}</span>

                                            <input
                                                    type="{{ $choiceInputType }}"
                                                    name="mobile_choice_{{ $rowKey }}{{ $isMultiChoiceRow ? '[]' : '' }}"
                                                    value="{{ is_int($key) ? $label : $key }}"
                                                    class="{{ $choiceControlClass }} {{ $choiceControlRoundedClass }} shrink-0"
                                            >
                                        </label>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="hidden overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 sm:block">
                        <table class="w-full table-fixed border-separate border-spacing-0" aria-label="{{ $content['table_aria_label'] ?? 'Listening answer table' }}">
                            <thead>
                            <tr>
                                <th class="{{ $firstTypeColumnWidth }} {{ $tableHeadClass }}">
                                    {{ $tableHeaders[0] ?? 'Superstition' }}
                                </th>

                                @foreach($typeColumns as $column)
                                    <th class="{{ $inputTypeColumnWidth }} {{ $tableHeadClass }} border-l">
                                        {{ $column['header'] }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            @foreach(($content['rows'] ?? []) as $row)
                                @foreach(($row['answers'] ?? []) as $index => $answer)
                                    <tr>
                                        @if($index === 0)
                                            <td rowspan="{{ max(1, count($row['answers'] ?? [])) }}" class="{{ $tableCellSoftClass }} border-r">
                                                    <span class="{{ $pillClass }}">
                                                        {{ $row['superstition'] ?? '' }}
                                                    </span>
                                            </td>
                                        @endif

                                        @foreach($typeColumns as $column)
                                            @php
                                                $done = !empty($answer['done']);
                                                $inputValue = $done ? ($answer[$column['value_key']] ?? '') : '';
                                                $answerValue = $answer[$column['answer_key']] ?? '';
                                            @endphp

                                            <td class="{{ $tableCellClass }} border-r last:border-r-0">
                                                <input
                                                        type="text"
                                                        class="{{ $inputClass }}"
                                                        data-answer="{{ $answerValue }}"
                                                        value="{{ $inputValue }}"
                                                        placeholder="{{ $column['placeholder'] }}"
                                                        @if($done) disabled @endif
                                                >
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="grid gap-3 sm:hidden">
                        @foreach(($content['rows'] ?? []) as $row)
                            <article class="rounded-[1.25rem] border border-slate-200 bg-white p-3 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                                <div class="mb-3">
                                    <span class="{{ $pillClass }}">
                                        {{ $row['superstition'] ?? '' }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 gap-3">
                                    @foreach(($row['answers'] ?? []) as $answer)
                                        <div class="grid grid-cols-1 gap-3 rounded-2xl border border-slate-200 bg-slate-50/80 p-3 dark:border-slate-700 dark:bg-slate-950/35">
                                            @foreach($typeColumns as $column)
                                                @php
                                                    $done = !empty($answer['done']);
                                                    $inputValue = $done ? ($answer[$column['value_key']] ?? '') : '';
                                                    $answerValue = $answer[$column['answer_key']] ?? '';
                                                @endphp

                                                <label>
                                                    <span class="mb-1.5 block text-[0.7rem] font-black uppercase tracking-[0.08em] text-slate-500 dark:text-slate-400">
                                                        {{ $column['header'] }}
                                                    </span>

                                                    <input
                                                            type="text"
                                                            class="{{ $inputClass }}"
                                                            data-answer="{{ $answerValue }}"
                                                            value="{{ $inputValue }}"
                                                            placeholder="{{ $column['placeholder'] }}"
                                                            @if($done) disabled @endif
                                                    >
                                                </label>
                                            @endforeach
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

                delete input.dataset.state;
                input.removeAttribute('aria-invalid');
            }

            function isInputCorrect(input) {
                const value = normalize(input.value);

                return value !== '' && answersFor(input).includes(value);
            }

            function clearChoiceRow(row) {
                delete row.dataset.state;

                row.querySelectorAll('[data-choice]').forEach(choice => {
                    delete choice.dataset.state;
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
                    row.dataset.state = 'wrong';
                    return;
                }

                const isCorrect = sameSet(selectedSet, correctSet);
                row.dataset.state = isCorrect ? 'correct' : 'wrong';

                selected.forEach(input => {
                    const choice = input.closest('[data-choice]');

                    if (choice) {
                        choice.dataset.state = isCorrect ? 'correct' : 'wrong';
                    }
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

                    const isCorrect = isInputCorrect(input);
                    input.dataset.state = isCorrect ? 'correct' : 'wrong';
                    input.setAttribute('aria-invalid', isCorrect ? 'false' : 'true');
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
                    input.dataset.state = 'correct';
                    input.setAttribute('aria-invalid', 'false');
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
                    delete input.dataset.state;
                    input.removeAttribute('aria-invalid');
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
