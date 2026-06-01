@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $questions = is_array($content['questions'] ?? null) ? array_values($content['questions']) : [];
    $totalQuestions = count($questions);

    $nextLabel = trim((string) ($content['next_label'] ?? 'Next'));
    $submitLabel = trim((string) ($content['submit_label'] ?? 'Submit'));
    $skipLabel = trim((string) ($content['skip_label'] ?? 'Skip'));
    $resetLabel = trim((string) ($content['reset_label'] ?? 'Reset'));
    $progressLabel = trim((string) ($content['progress_label'] ?? 'Survey'));

    $completeTitle = trim((string) ($content['complete_title'] ?? 'Thanks for participating'));
    $completeMessage = trim((string) ($content['complete_message'] ?? 'Your responses are ready.'));
    $resultsLabel = trim((string) ($content['results_label'] ?? 'View the results'));
    $againLabel = trim((string) ($content['again_label'] ?? 'Participate again'));

    $minLabel = trim((string) ($content['min_label'] ?? 'Strongly disagree'));
    $maxLabel = trim((string) ($content['max_label'] ?? 'Strongly agree'));
    $buttonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 dark:from-emerald-400 dark:via-teal-400 dark:to-cyan-400 dark:text-slate-950'));

    $normalizeType = static function ($type) {
        $type = strtolower(trim((string) $type));

        return match ($type) {
            'single_choice', 'radio' => 'choice',
            'ranking', 'drag_rank', 'drag-ranking' => 'rank',
            'scale-group', 'scale_items', 'scale-items', 'scale_list' => 'scale_list',
            default => $type ?: 'scale',
        };
    };
@endphp

@section('style')
    <style>
        #surveyGame {
            --survey-track: rgba(148, 163, 184, .34);
            --survey-accent: #059669;
            --survey-accent-two: #0891b2;
            --survey-accent-three: #4f46e5;
            --survey-soft: rgba(209, 250, 229, .76);
            --survey-soft-two: rgba(207, 250, 254, .68);
            --survey-card: rgba(255, 255, 255, .82);
            --survey-line: rgba(226, 232, 240, .82);
        }

        .dark #surveyGame {
            --survey-track: rgba(100, 116, 139, .70);
            --survey-accent: #34d399;
            --survey-accent-two: #22d3ee;
            --survey-accent-three: #818cf8;
            --survey-soft: rgba(6, 78, 59, .34);
            --survey-soft-two: rgba(21, 94, 117, .28);
            --survey-card: rgba(15, 23, 42, .72);
            --survey-line: rgba(51, 65, 85, .82);
        }

        #surveyGame .survey-shell {
            position: relative;
            isolation: isolate;
            background:
                    radial-gradient(circle at 10% 0%, var(--survey-soft), transparent 36%),
                    radial-gradient(circle at 96% 14%, rgba(199, 210, 254, .46), transparent 32%),
                    radial-gradient(circle at 82% 96%, var(--survey-soft-two), transparent 36%),
                    var(--survey-card);
            box-shadow:
                    0 28px 80px -46px rgba(15, 23, 42, .58),
                    inset 0 1px 0 rgba(255, 255, 255, .74);
        }

        .dark #surveyGame .survey-shell {
            background:
                    radial-gradient(circle at 10% 0%, var(--survey-soft), transparent 36%),
                    radial-gradient(circle at 96% 14%, rgba(67, 56, 202, .22), transparent 32%),
                    radial-gradient(circle at 82% 96%, var(--survey-soft-two), transparent 36%),
                    var(--survey-card);
            box-shadow:
                    0 30px 90px -50px rgba(0, 0, 0, .90),
                    inset 0 1px 0 rgba(255, 255, 255, .08);
        }

        #surveyGame .survey-shell::before,
        #surveyGame .survey-shell::after {
            content: "";
            position: absolute;
            z-index: -1;
            pointer-events: none;
            border-radius: 999px;
            filter: blur(8px);
            opacity: .70;
        }

        #surveyGame .survey-shell::before {
            width: 11rem;
            height: 11rem;
            left: -3.5rem;
            top: -4rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, .20), rgba(34, 211, 238, .16));
        }

        #surveyGame .survey-shell::after {
            width: 14rem;
            height: 14rem;
            right: -5rem;
            bottom: -6rem;
            background: linear-gradient(135deg, rgba(79, 70, 229, .16), rgba(20, 184, 166, .16));
        }

        #surveyGame #surveySlides,
        #surveyGame #surveyComplete {
            position: relative;
            z-index: 1;
        }

        #surveyGame #surveySlides > header {
            background: rgba(248, 250, 252, .78);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .80);
        }

        .dark #surveyGame #surveySlides > header {
            background: rgba(15, 23, 42, .66);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .06);
        }

        #surveyGame #surveyProgressBar {
            background: linear-gradient(90deg, var(--survey-accent), var(--survey-accent-two), var(--survey-accent-three));
            box-shadow: 0 8px 18px -10px rgba(5, 150, 105, .72);
        }

        #surveyGame .survey-slide > div,
        #surveyGame #surveyComplete > div {
            background:
                    linear-gradient(180deg, rgba(255, 255, 255, .82), rgba(255, 255, 255, .64));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .84);
        }

        .dark #surveyGame .survey-slide > div,
        .dark #surveyGame #surveyComplete > div {
            background: linear-gradient(180deg, rgba(15, 23, 42, .62), rgba(15, 23, 42, .42));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .06);
        }

        #surveyGame .survey-choice {
            position: relative;
            overflow: hidden;
        }

        #surveyGame .survey-choice::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            background: linear-gradient(180deg, var(--survey-accent), var(--survey-accent-two));
            opacity: 0;
            transition: opacity .2s ease;
        }

        #surveyGame .survey-choice:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px -28px rgba(15, 23, 42, .38);
        }

        #surveyGame .survey-choice:has(.survey-choice-input:checked) {
            border-color: rgba(5, 150, 105, .58);
            background: linear-gradient(135deg, rgba(236, 253, 245, .96), rgba(207, 250, 254, .78));
            box-shadow: 0 18px 42px -28px rgba(5, 150, 105, .68);
            transform: translateY(-1px);
        }

        #surveyGame .survey-choice:has(.survey-choice-input:checked)::before {
            opacity: 1;
        }

        .dark #surveyGame .survey-choice:has(.survey-choice-input:checked) {
            border-color: rgba(52, 211, 153, .52);
            background: linear-gradient(135deg, rgba(6, 78, 59, .50), rgba(21, 94, 117, .40));
        }

        #surveyGame .survey-choice-mark {
            box-shadow: inset 0 0 0 5px rgba(255, 255, 255, .90);
        }

        #surveyGame .survey-rank-zone .survey-rank-item {
            border-color: rgba(5, 150, 105, .58);
            background: linear-gradient(135deg, rgba(236, 253, 245, .96), rgba(240, 253, 250, .88));
            box-shadow: 0 16px 34px -28px rgba(5, 150, 105, .58);
        }

        .dark #surveyGame .survey-rank-zone .survey-rank-item {
            border-color: rgba(52, 211, 153, .48);
            background: linear-gradient(135deg, rgba(6, 78, 59, .44), rgba(15, 118, 110, .32));
        }

        #surveyGame .survey-rank-item:hover,
        #surveyGame .survey-scale-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 40px -32px rgba(15, 23, 42, .44);
        }

        #surveyGame .survey-scale-item:focus-within {
            border-color: rgba(5, 150, 105, .58);
            box-shadow: 0 18px 38px -30px rgba(5, 150, 105, .72);
        }

        #surveyGame .survey-value {
            background: linear-gradient(135deg, rgba(15, 23, 42, .08), rgba(5, 150, 105, .10));
        }

        .dark #surveyGame .survey-value {
            background: linear-gradient(135deg, rgba(255, 255, 255, .08), rgba(52, 211, 153, .12));
        }

        .survey-range {
            --value: 0%;
            -webkit-appearance: none;
            appearance: none;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(to right, var(--survey-accent) 0%, var(--survey-accent-two) var(--value), var(--survey-track) var(--value), var(--survey-track) 100%);
            outline: none;
        }

        .survey-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 22px;
            height: 22px;
            border: 4px solid #fff;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--survey-accent), var(--survey-accent-two));
            box-shadow: 0 10px 22px rgba(5, 150, 105, .30);
            cursor: pointer;
        }

        .survey-range::-moz-range-thumb {
            width: 22px;
            height: 22px;
            border: 4px solid #fff;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--survey-accent), var(--survey-accent-two));
            box-shadow: 0 10px 22px rgba(5, 150, 105, .30);
            cursor: pointer;
        }

        .survey-range::-moz-range-track {
            height: 5px;
            background: transparent;
        }

        @media (max-width: 640px) {
            #surveyGame .survey-shell::before,
            #surveyGame .survey-shell::after {
                opacity: .40;
            }
        }
    </style>
@endsection

@section('content')
    <main id="surveyGame" class="flex min-h-[100dvh] w-full items-center justify-center px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-8">
        <div class="mx-auto w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <section class="survey-shell mx-auto mt-3 w-full max-w-4xl overflow-hidden rounded-[2rem] border border-white/70 p-3 shadow-2xl backdrop-blur-2xl dark:border-slate-700/70 sm:mt-4 sm:p-4 lg:p-5">
                <div id="surveySlides" class="relative">
                    <header class="mb-3 flex items-center justify-between gap-3 rounded-2xl border border-white/70 px-3 py-2.5 dark:border-slate-700/70 sm:mb-4 sm:px-4">
                        <div class="inline-flex items-center gap-2 rounded-full bg-slate-950 px-3.5 py-1.5 text-[0.65rem] font-black uppercase tracking-[0.14em] text-white shadow-lg shadow-slate-900/10 dark:bg-white dark:text-slate-950">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300 dark:bg-emerald-500"></span>
                            {{ $progressLabel }}
                        </div>

                        <div class="flex items-center gap-2 text-xs font-black text-slate-500 dark:text-slate-300">
                            <span id="surveyProgressText">1 / {{ max($totalQuestions, 1) }}</span>
                            <div class="h-2 w-24 overflow-hidden rounded-full bg-slate-200/90 ring-1 ring-white/70 dark:bg-slate-700/80 dark:ring-slate-600/50 sm:w-32">
                                <div id="surveyProgressBar" class="h-full rounded-full bg-slate-950 transition-all duration-300 dark:bg-white" style="width: {{ $totalQuestions > 0 ? (100 / $totalQuestions) : 100 }}%"></div>
                            </div>
                        </div>
                    </header>

                    @foreach($questions as $questionIndex => $question)
                        @php
                            $type = $normalizeType($question['type'] ?? 'scale');
                            $prompt = trim((string) ($question['question'] ?? $question['text'] ?? ''));
                            $hint = trim((string) ($question['hint'] ?? $question['instruction'] ?? ''));
                            $required = array_key_exists('required', $question) ? (bool) $question['required'] : true;
                            $canSkip = array_key_exists('skip', $question) ? (bool) $question['skip'] : $type === 'scale';
                            $isLast = $questionIndex === $totalQuestions - 1;
                            $name = 'survey_q_' . $questionIndex;
                        @endphp

                        <article
                                class="survey-slide {{ $questionIndex === 0 ? '' : 'hidden' }}"
                                data-index="{{ $questionIndex }}"
                                data-type="{{ $type }}"
                                data-question="{{ e($prompt) }}"
                                data-required="{{ $required ? 'true' : 'false' }}"
                        >
                            <div class="grid min-h-[min(390px,calc(100dvh-15rem))] content-start gap-4 rounded-[1.65rem] border border-white/70 p-4 dark:border-slate-700/60 sm:p-5 lg:p-6">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="flex min-w-0 gap-3">
                                        <div class="hidden h-10 w-10 shrink-0 place-items-center rounded-2xl bg-slate-950 text-sm font-black text-white shadow-lg shadow-slate-900/10 dark:bg-white dark:text-slate-950 sm:grid">
                                            {{ $questionIndex + 1 }}
                                        </div>
                                        <div class="min-w-0">
                                            @if($prompt !== '')
                                                <h2 class="max-w-3xl text-2xl font-black leading-[1.06] tracking-[-0.04em] text-slate-950 dark:text-white sm:text-3xl lg:text-[2rem]">
                                                    {{ $prompt }}
                                                </h2>
                                            @endif

                                            @if($hint !== '')
                                                <p class="mt-2 max-w-2xl text-sm font-bold leading-relaxed text-slate-500 dark:text-slate-300 sm:text-base">
                                                    {{ $hint }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    @if($canSkip)
                                        <button
                                                type="button"
                                                class="survey-skip inline-flex shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white/85 px-3.5 py-2 text-xs font-black text-slate-600 shadow-sm transition hover:-translate-y-0.5 hover:bg-white dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-200 dark:hover:bg-slate-800"
                                        >
                                            {{ $skipLabel }}
                                        </button>
                                    @endif
                                </div>

                                @if($type === 'choice')
                                    @php
                                        $options = is_array($question['options'] ?? null) ? array_values($question['options']) : [];
                                    @endphp

                                    <div class="grid gap-2.5 sm:gap-3">
                                        @foreach($options as $optionIndex => $option)
                                            @php
                                                $optionText = is_array($option) ? trim((string) ($option['text'] ?? $option['label'] ?? '')) : trim((string) $option);
                                                $optionValue = is_array($option) ? trim((string) ($option['value'] ?? $optionText)) : $optionText;
                                                $optionId = $name . '_' . $optionIndex;
                                            @endphp

                                            <label
                                                    for="{{ $optionId }}"
                                                    class="survey-choice flex min-h-[58px] cursor-pointer items-center justify-between gap-4 rounded-2xl border border-slate-200/80 bg-white/78 px-4 py-3.5 text-sm font-black leading-snug text-slate-800 shadow-sm transition dark:border-slate-700/70 dark:bg-slate-950/45 dark:text-slate-100 sm:text-base"
                                            >
                                                <span>{{ $optionText }}</span>
                                                <input id="{{ $optionId }}" class="survey-choice-input peer sr-only" type="radio" name="{{ $name }}" value="{{ $optionValue }}">
                                                <span class="survey-choice-mark h-6 w-6 shrink-0 rounded-full border-2 border-slate-300 bg-white transition peer-checked:border-emerald-600 peer-checked:bg-emerald-500 peer-checked:ring-4 peer-checked:ring-emerald-500/15 dark:border-slate-600 dark:bg-slate-900 dark:peer-checked:border-emerald-300 dark:peer-checked:bg-emerald-300 dark:peer-checked:ring-emerald-300/15"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                @elseif($type === 'rank')
                                    @php
                                        $options = is_array($question['options'] ?? null) ? array_values($question['options']) : [];
                                    @endphp

                                    <div class="grid gap-4 lg:grid-cols-2">
                                        <div class="rounded-2xl border border-dashed border-emerald-300/80 bg-emerald-50/45 p-3 shadow-inner dark:border-emerald-400/30 dark:bg-emerald-950/20">
                                            <p class="mb-2 text-xs font-black uppercase tracking-[0.1em] text-slate-500 dark:text-slate-300">
                                                {{ $question['ranking_label'] ?? 'Your ranking' }}
                                            </p>

                                            <div class="survey-rank-zone min-h-[150px] space-y-2.5" data-zone="ranked">
                                                <div class="survey-rank-placeholder grid min-h-[92px] place-items-center rounded-2xl border border-dashed border-slate-300 bg-white/72 px-4 text-center text-sm font-black text-slate-500 dark:border-slate-600 dark:bg-slate-900/40 dark:text-slate-300">
                                                    {{ $question['placeholder'] ?? 'Click or drop options' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="mb-2 flex items-center justify-between gap-3">
                                                <p class="text-xs font-black uppercase tracking-[0.1em] text-slate-500 dark:text-slate-300">
                                                    {{ $question['unranked_label'] ?? 'Unranked options' }}
                                                </p>

                                                <button
                                                        type="button"
                                                        class="survey-rank-reset inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/85 px-3 py-1.5 text-xs font-black text-slate-500 shadow-sm transition hover:-translate-y-0.5 hover:text-slate-900 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-300 dark:hover:text-white"
                                                >
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                    <span>{{ $resetLabel }}</span>
                                                </button>
                                            </div>

                                            <div class="survey-rank-options grid gap-2.5" data-zone="unranked">
                                                @foreach($options as $optionIndex => $option)
                                                    @php
                                                        $optionText = is_array($option) ? trim((string) ($option['text'] ?? $option['label'] ?? '')) : trim((string) $option);
                                                        $optionValue = is_array($option) ? trim((string) ($option['value'] ?? $optionText)) : $optionText;
                                                    @endphp

                                                    <button
                                                            type="button"
                                                            draggable="true"
                                                            class="survey-rank-item group flex min-h-[56px] w-full cursor-grab items-center justify-between gap-3 rounded-2xl border border-slate-200/80 bg-white/78 px-4 py-3 text-left text-sm font-black leading-snug text-slate-800 shadow-sm transition active:cursor-grabbing dark:border-slate-700/70 dark:bg-slate-950/45 dark:text-slate-100 sm:text-base"
                                                            data-value="{{ e($optionValue) }}"
                                                    >
                                                        <span>{{ $optionText }}</span>
                                                        <span class="grid h-8 w-8 shrink-0 place-items-center rounded-xl bg-slate-100 text-slate-400 transition group-hover:bg-emerald-100 group-hover:text-emerald-700 dark:bg-slate-800 dark:text-slate-400 dark:group-hover:bg-emerald-400/15 dark:group-hover:text-emerald-200">
                                                            <i class="fa-solid fa-grip-lines"></i>
                                                        </span>
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @elseif($type === 'scale_list')
                                    @php
                                        $items = is_array($question['items'] ?? null) ? array_values($question['items']) : [];
                                    @endphp

                                    <div class="grid gap-3 md:grid-cols-2">
                                        @foreach($items as $itemIndex => $item)
                                            @php
                                                $itemText = is_array($item) ? trim((string) ($item['text'] ?? $item['question'] ?? '')) : trim((string) $item);
                                                $min = (int) ($item['min'] ?? $question['min'] ?? $content['min'] ?? 0);
                                                $max = (int) ($item['max'] ?? $question['max'] ?? $content['max'] ?? 10);
                                                $step = (int) ($item['step'] ?? $question['step'] ?? $content['step'] ?? 1);
                                                $value = (int) ($item['value'] ?? $item['default'] ?? $question['value'] ?? $question['default'] ?? $min);
                                                $leftLabel = trim((string) ($item['min_label'] ?? $question['min_label'] ?? $minLabel));
                                                $rightLabel = trim((string) ($item['max_label'] ?? $question['max_label'] ?? $maxLabel));
                                            @endphp

                                            <div class="survey-scale-item rounded-2xl border border-slate-200/80 bg-white/78 p-4 shadow-sm transition dark:border-slate-700/70 dark:bg-slate-950/45" data-scale-text="{{ e($itemText) }}" data-skipped="false">
                                                <div class="mb-3 flex items-start justify-between gap-3">
                                                    <h3 class="text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-base">
                                                        {{ $itemText }}
                                                    </h3>
                                                    <button
                                                            type="button"
                                                            class="survey-scale-skip shrink-0 rounded-full bg-slate-100 px-3 py-1.5 text-xs font-black text-slate-700 transition hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-200 dark:hover:bg-slate-700"
                                                    >
                                                        {{ $skipLabel }}
                                                    </button>
                                                </div>

                                                <div class="survey-value mb-3 inline-flex min-w-10 justify-center rounded-full px-3 py-1 text-sm font-black text-slate-700 dark:text-slate-200">{{ $value }}</div>

                                                <div class="grid grid-cols-[auto_1fr_auto] items-center gap-3">
                                                    <span class="text-xs font-black text-slate-600 dark:text-slate-300">{{ $min }}</span>
                                                    <input class="survey-range w-full accent-slate-950 dark:accent-white" type="range" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $value }}">
                                                    <span class="text-xs font-black text-slate-600 dark:text-slate-300">{{ $max }}</span>
                                                </div>

                                                <div class="mt-2 flex items-center justify-between gap-3 text-[0.68rem] font-bold text-slate-500 dark:text-slate-400">
                                                    <span>{{ $leftLabel }}</span>
                                                    <span class="text-right">{{ $rightLabel }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    @php
                                        $min = (int) ($question['min'] ?? $content['min'] ?? 0);
                                        $max = (int) ($question['max'] ?? $content['max'] ?? 10);
                                        $step = (int) ($question['step'] ?? $content['step'] ?? 1);
                                        $value = (int) ($question['value'] ?? $question['default'] ?? $min);
                                        $leftLabel = trim((string) ($question['min_label'] ?? $minLabel));
                                        $rightLabel = trim((string) ($question['max_label'] ?? $maxLabel));
                                    @endphp

                                    <div class="rounded-2xl border border-slate-200/80 bg-white/78 p-5 shadow-sm dark:border-slate-700/70 dark:bg-slate-950/45 sm:p-6">
                                        <div class="survey-value mb-4 inline-flex min-w-12 justify-center rounded-full px-4 py-1.5 text-base font-black text-slate-700 dark:text-slate-200">{{ $value }}</div>

                                        <div class="grid grid-cols-[auto_1fr_auto] items-center gap-4">
                                            <span class="text-sm font-black text-slate-700 dark:text-slate-200">{{ $min }}</span>
                                            <input class="survey-range w-full accent-slate-950 dark:accent-white" type="range" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $value }}">
                                            <span class="text-sm font-black text-slate-700 dark:text-slate-200">{{ $max }}</span>
                                        </div>

                                        <div class="mt-3 flex items-center justify-between gap-4 text-xs font-bold text-slate-500 dark:text-slate-400">
                                            <span>{{ $leftLabel }}</span>
                                            <span class="text-right">{{ $rightLabel }}</span>
                                        </div>
                                    </div>
                                @endif

                                <p class="survey-error hidden rounded-2xl border border-rose-200 bg-rose-50 px-4 py-2 text-center text-sm font-black text-rose-600 dark:border-rose-400/25 dark:bg-rose-950/30 dark:text-rose-200">
                                    {{ $question['error'] ?? 'Please answer this question first.' }}
                                </p>

                                <footer class="flex flex-col-reverse items-stretch justify-between gap-2.5 sm:flex-row sm:items-center">
                                    <button
                                            type="button"
                                            class="survey-back inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/85 px-5 py-2.5 text-sm font-black text-slate-600 shadow-sm transition hover:-translate-y-0.5 hover:bg-white disabled:pointer-events-none disabled:opacity-35 dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-200 dark:hover:bg-slate-800"
                                            @if($questionIndex === 0) disabled @endif
                                    >
                                        Previous
                                    </button>

                                    <button
                                            type="button"
                                            class="survey-next inline-flex items-center justify-center rounded-xl {{ $buttonClass }} px-7 py-2.5 text-sm font-black text-white shadow-lg shadow-emerald-900/15 transition hover:-translate-y-0.5 active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-emerald-400/25"
                                    >
                                        {{ $isLast ? $submitLabel : $nextLabel }}
                                    </button>
                                </footer>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div id="surveyComplete" class="hidden">
                    <div class="grid min-h-[min(360px,calc(100dvh-15rem))] place-items-center rounded-[1.65rem] border border-white/70 p-5 text-center dark:border-slate-700/60 sm:p-6">
                        <div class="mx-auto max-w-2xl">
                            <div class="mx-auto grid h-16 w-16 place-items-center rounded-3xl bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-500 text-2xl text-white shadow-xl shadow-emerald-900/20 dark:from-emerald-300 dark:via-teal-300 dark:to-cyan-300 dark:text-slate-950">
                                <i class="fa-solid fa-check"></i>
                            </div>

                            <h2 class="mt-5 text-3xl font-black leading-tight tracking-[-0.045em] text-slate-950 dark:text-white sm:text-4xl">
                                {{ $completeTitle }}
                            </h2>

                            <p class="mx-auto mt-2 max-w-md text-sm font-bold leading-relaxed text-slate-600 dark:text-slate-300 sm:text-base">
                                {{ $completeMessage }}
                            </p>

                            <div class="mt-5 flex flex-col items-center justify-center gap-2.5 sm:flex-row">
                                <button id="surveyResultsBtn" type="button" class="inline-flex w-full items-center justify-center rounded-xl {{ $buttonClass }} px-5 py-3 text-sm font-black text-white shadow-lg shadow-emerald-900/15 transition hover:-translate-y-0.5 sm:w-auto">
                                    {{ $resultsLabel }}
                                </button>

                                <button id="surveyAgainBtn" type="button" class="inline-flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white/85 px-5 py-3 text-sm font-black text-slate-800 shadow-sm transition hover:-translate-y-0.5 hover:bg-white dark:border-slate-700 dark:bg-slate-950/60 dark:text-slate-100 dark:hover:bg-slate-800 sm:w-auto">
                                    {{ $againLabel }}
                                </button>
                            </div>

                            <div id="surveyResults" class="mt-5 hidden rounded-2xl border border-slate-200 bg-white/86 p-4 text-left shadow-sm dark:border-slate-700 dark:bg-slate-950/60">
                                <h3 class="text-base font-black text-slate-950 dark:text-white">Results</h3>
                                <div id="surveyResultsList" class="mt-3 grid gap-3 text-sm font-bold text-slate-600 dark:text-slate-300"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const root = document.getElementById('surveyGame');
            if (!root) return;

            const slidesWrap = document.getElementById('surveySlides');
            const slides = Array.from(root.querySelectorAll('.survey-slide'));
            const complete = document.getElementById('surveyComplete');
            const progressText = document.getElementById('surveyProgressText');
            const progressBar = document.getElementById('surveyProgressBar');
            const results = document.getElementById('surveyResults');
            const resultsList = document.getElementById('surveyResultsList');
            const answers = new Map();
            let currentIndex = 0;
            let draggedItem = null;

            function updateRange(range) {
                const min = Number(range.min || 0);
                const max = Number(range.max || 10);
                const value = Number(range.value || min);
                const percent = max === min ? 0 : ((value - min) / (max - min)) * 100;
                const holder = range.closest('.survey-scale-item') || range.closest('.survey-slide');

                range.style.setProperty('--value', `${percent}%`);
                holder?.querySelector('.survey-value')?.replaceChildren(document.createTextNode(String(value)));
            }

            function updateProgress() {
                const total = Math.max(slides.length, 1);
                const current = Math.min(currentIndex + 1, total);
                if (progressText) progressText.textContent = `${current} / ${total}`;
                if (progressBar) progressBar.style.width = `${(current / total) * 100}%`;
            }

            function showSlide(index) {
                currentIndex = Math.max(0, Math.min(index, slides.length - 1));
                slides.forEach((slide, slideIndex) => {
                    slide.classList.toggle('hidden', slideIndex !== currentIndex);
                });
                updateProgress();
                root.scrollIntoView({ block: 'start', behavior: 'smooth' });
            }

            function finishSurvey() {
                slidesWrap?.classList.add('hidden');
                complete?.classList.remove('hidden');
                complete?.scrollIntoView({ block: 'center', behavior: 'smooth' });
            }

            function saveAnswer(slide, skipped = false) {
                const index = slide.dataset.index;
                const type = slide.dataset.type;
                const question = slide.dataset.question || '';
                const required = slide.dataset.required === 'true';
                const error = slide.querySelector('.survey-error');

                error?.classList.add('hidden');

                if (skipped) {
                    answers.set(index, { type, question, value: '', skipped: true });
                    return true;
                }

                if (type === 'choice') {
                    const checked = slide.querySelector('input[type="radio"]:checked');
                    if (!checked && required) {
                        error?.classList.remove('hidden');
                        return false;
                    }

                    answers.set(index, { type, question, value: checked?.value || '', skipped: false });
                    return true;
                }

                if (type === 'rank') {
                    const ranked = Array.from(slide.querySelectorAll('.survey-rank-zone .survey-rank-item')).map((item) => item.dataset.value || item.textContent.trim());
                    const total = slide.querySelectorAll('.survey-rank-item').length;

                    if (required && ranked.length !== total) {
                        error?.classList.remove('hidden');
                        return false;
                    }

                    answers.set(index, { type, question, value: ranked, skipped: false });
                    return true;
                }

                if (type === 'scale_list') {
                    const values = Array.from(slide.querySelectorAll('.survey-scale-item')).map((item) => {
                        const range = item.querySelector('.survey-range');
                        if (range) updateRange(range);

                        return {
                            text: item.dataset.scaleText || '',
                            value: item.dataset.skipped === 'true' ? 'Skipped' : (range?.value || ''),
                        };
                    });

                    answers.set(index, { type, question, value: values, skipped: false });
                    return true;
                }

                const range = slide.querySelector('.survey-range');
                if (range) {
                    updateRange(range);
                    answers.set(index, { type: 'scale', question, value: range.value, skipped: false });
                }

                return true;
            }

            function goNext(slide, skipped = false) {
                if (!saveAnswer(slide, skipped)) return;

                if (currentIndex >= slides.length - 1) {
                    finishSurvey();
                    return;
                }

                showSlide(currentIndex + 1);
            }

            function moveRankItem(item, zone) {
                if (!item || !zone) return;
                zone.appendChild(item);
                syncRankPlaceholder(zone.closest('.survey-slide'));
            }

            function syncRankPlaceholder(slide) {
                const zone = slide?.querySelector('.survey-rank-zone');
                const placeholder = slide?.querySelector('.survey-rank-placeholder');
                if (!zone || !placeholder) return;

                placeholder.classList.toggle('hidden', !!zone.querySelector('.survey-rank-item'));
            }

            function resetRank(slide) {
                const options = slide.querySelector('.survey-rank-options');
                Array.from(slide.querySelectorAll('.survey-rank-zone .survey-rank-item')).forEach((item) => options?.appendChild(item));
                syncRankPlaceholder(slide);
                slide.querySelector('.survey-error')?.classList.add('hidden');
            }

            function renderResults() {
                if (!results || !resultsList) return;

                const rows = slides.map((slide) => {
                    const answer = answers.get(slide.dataset.index);
                    const question = slide.dataset.question || 'Question';

                    if (!answer) return { question, value: 'No answer' };
                    if (answer.skipped) return { question, value: 'Skipped' };
                    if (Array.isArray(answer.value) && answer.type === 'rank') return { question, value: answer.value.map((item, index) => `${index + 1}. ${escapeHtml(item)}`).join('<br>') };
                    if (Array.isArray(answer.value) && answer.type === 'scale_list') return { question, value: answer.value.map((item) => `${escapeHtml(item.text)}: ${escapeHtml(item.value)}`).join('<br>') };
                    return { question, value: escapeHtml(answer.value) };
                });

                resultsList.innerHTML = rows.map((row) => `
                    <div class="rounded-2xl border border-slate-200/80 bg-white/72 p-3 shadow-sm dark:border-slate-700/70 dark:bg-white/5">
                        <div class="font-black text-slate-950 dark:text-white">${escapeHtml(row.question)}</div>
                        <div class="mt-1 leading-relaxed">${row.value}</div>
                    </div>
                `).join('');

                results.classList.remove('hidden');
            }

            function resetSurvey() {
                answers.clear();
                results?.classList.add('hidden');
                complete?.classList.add('hidden');
                slidesWrap?.classList.remove('hidden');

                slides.forEach((slide) => {
                    slide.querySelectorAll('.survey-scale-item').forEach((item) => {
                        item.dataset.skipped = 'false';
                        item.classList.remove('opacity-55');
                        item.querySelectorAll('input, button').forEach((control) => {
                            control.disabled = false;
                        });
                    });

                    slide.querySelectorAll('.survey-range').forEach((range) => {
                        range.value = range.defaultValue || range.min || 0;
                        updateRange(range);
                    });

                    slide.querySelectorAll('input[type="radio"]').forEach((radio) => {
                        radio.checked = false;
                    });

                    resetRank(slide);
                    slide.querySelector('.survey-error')?.classList.add('hidden');
                });

                showSlide(0);
            }

            function escapeHtml(value) {
                return String(value)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            slides.forEach((slide, index) => {
                slide.querySelectorAll('.survey-range').forEach((range) => {
                    updateRange(range);
                    range.addEventListener('input', () => updateRange(range));
                });

                slide.querySelector('.survey-next')?.addEventListener('click', () => goNext(slide));
                slide.querySelector('.survey-skip')?.addEventListener('click', () => goNext(slide, true));
                slide.querySelector('.survey-back')?.addEventListener('click', () => showSlide(index - 1));
                slide.querySelector('.survey-rank-reset')?.addEventListener('click', () => resetRank(slide));

                slide.querySelectorAll('.survey-scale-skip').forEach((button) => {
                    button.addEventListener('click', () => {
                        const item = button.closest('.survey-scale-item');
                        if (!item) return;

                        item.dataset.skipped = 'true';
                        item.classList.add('opacity-55');
                        item.querySelectorAll('input').forEach((input) => {
                            input.disabled = true;
                        });
                        button.disabled = true;
                    });
                });

                slide.querySelectorAll('.survey-rank-item').forEach((item) => {
                    item.addEventListener('click', () => {
                        const rankedZone = slide.querySelector('.survey-rank-zone');
                        const unrankedZone = slide.querySelector('.survey-rank-options');
                        moveRankItem(item, item.parentElement === rankedZone ? unrankedZone : rankedZone);
                    });

                    item.addEventListener('dragstart', () => {
                        draggedItem = item;
                        item.classList.add('opacity-60');
                    });

                    item.addEventListener('dragend', () => {
                        item.classList.remove('opacity-60');
                        draggedItem = null;
                    });
                });

                slide.querySelectorAll('[data-zone]').forEach((zone) => {
                    zone.addEventListener('dragover', (event) => event.preventDefault());
                    zone.addEventListener('drop', (event) => {
                        event.preventDefault();
                        moveRankItem(draggedItem, zone);
                    });
                });
            });

            document.getElementById('surveyResultsBtn')?.addEventListener('click', renderResults);
            document.getElementById('surveyAgainBtn')?.addEventListener('click', resetSurvey);

            window.resetSlide = resetSurvey;
            updateProgress();
        })();
    </script>
@endsection
