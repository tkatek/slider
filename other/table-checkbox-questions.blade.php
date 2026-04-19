@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? ''));
    $title = trim((string)($content['title'] ?? ''));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $topBadge = trim((string)($content['top_badge'] ?? ''));
    $cardGridClass = trim((string)($content['cards_grid'] ?? 'grid-cols-1'));
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
@endphp

@section('title', $pageTitle)

@section('style')
    @parent
    <style>
        .lo-page {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .slide-viewport {
            height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .slide-shell {
            min-height: 100dvh;
            display: flex;
            align-items: center;
            transition: padding 0.2s ease, align-items 0.2s ease;
        }

        .slide-shell.is-scrollable {
            align-items: flex-start;
        }

        .exercise-card {
            position: relative;
            overflow: hidden;
            border-radius: 22px;
            border: 1px solid rgba(226,232,240,.9);
            background: rgba(255,255,255,.88);
            box-shadow: 0 12px 28px -24px rgba(15,23,42,.12);
            backdrop-filter: blur(8px);
        }

        .dark .exercise-card {
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.76);
            box-shadow: 0 12px 28px -24px rgba(2,6,23,.34);
        }

        .exercise-card::before,
        .exercise-card::after {
            display: none;
        }

        .section-chip {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            border-radius: 999px;
            padding: .34rem .78rem;
            background: linear-gradient(135deg, #57534e, #3f3f46, #0f172a);
            box-shadow: 0 12px 28px rgba(2,6,23,.24);
        }

        .question-table-wrap {
            overflow-x: auto;
            border-radius: 18px;
            border: 1px solid rgba(203,213,225,.9);
            background: rgba(255,255,255,.98);
        }

        .dark .question-table-wrap {
            border-color: rgba(71,85,105,.88);
            background: rgba(15,23,42,.92);
        }

        .question-table {
            min-width: 720px;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .question-table th,
        .question-table td {
            padding: .72rem .8rem;
            border-right: 1px solid rgba(203,213,225,.9);
            border-bottom: 1px solid rgba(203,213,225,.9);
        }

        .dark .question-table th,
        .dark .question-table td {
            border-right-color: rgba(71,85,105,.88);
            border-bottom-color: rgba(71,85,105,.88);
        }

        .question-table th:last-child,
        .question-table td:last-child {
            border-right: none;
        }

        .question-table tbody tr:last-child td {
            border-bottom: none;
        }

        .question-table thead th {
            background: #f8fafc;
            color: #0f172a;
            font-size: .74rem;
            font-weight: 900;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .dark .question-table thead th {
            background: #1e293b;
            color: #f8fafc;
        }

        .question-table thead th:first-child {
            background: #eef2ff;
        }

        .dark .question-table thead th:first-child {
            background: #172554;
        }

        .question-table tbody td {
            background: #fff;
            color: #334155;
            font-size: .92rem;
            font-weight: 700;
        }

        .dark .question-table tbody td {
            background: rgba(15,23,42,.92);
            color: #e2e8f0;
        }

        .question-table tbody td:first-child {
            font-weight: 900;
            color: #0f172a;
            background: #f8fafc;
        }

        .dark .question-table tbody td:first-child {
            color: #f8fafc;
            background: #172033;
        }

        .question-choice {
            appearance: none;
            -webkit-appearance: none;
            width: 1rem;
            height: 1rem;
            border-radius: .24rem;
            border: 1.5px solid #cbd5e1;
            background: #fff;
            display: inline-grid;
            place-items: center;
            cursor: pointer;
            transition: all 0.18s ease;
            flex-shrink: 0;
            box-shadow: none;
        }

        .question-choice:hover {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,.10);
        }

        .question-choice:checked {
            border-color: #4f46e5;
            background: #eef2ff;
        }

        .question-choice:checked::after {
            content: "\2713";
            color: #4338ca;
            font-size: .72rem;
            font-weight: 900;
            line-height: 1;
        }

        .answer-item,
        .mobile-option {
            transition: border-color 0.18s ease, background-color 0.18s ease, box-shadow 0.18s ease;
            border-radius: 16px;
            border: 1px solid rgba(226,232,240,.92);
            background: rgba(255,255,255,.94);
            box-shadow: none;
        }

        .dark .answer-item,
        .dark .mobile-option {
            border-color: rgba(71,85,105,.84);
            background: rgba(15,23,42,.84);
        }

        .answer-item:hover,
        .mobile-option:hover {
            border-color: rgba(99,102,241,.45);
            box-shadow: 0 0 0 3px rgba(99,102,241,.08);
        }

        .other-input {
            min-width: 120px;
            border: none;
            border-bottom: 2px solid #cbd5e1;
            background: transparent;
            outline: none;
            transition: border-color 0.18s ease;
        }

        .other-input:focus {
            border-bottom-color: #4f46e5;
        }

        .other-input:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }
    </style>
@endsection

@section('content')
    <div class="lo-page relative h-[100dvh] w-full overflow-hidden bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid place-items-center text-center gap-6 sm:gap-8">
                        @include('slider.components.title-subtitle')

                        <div class="w-full max-w-5xl text-left">
                            <div class="grid {{ $cardGridClass }} gap-3 sm:gap-4 lg:gap-4">
                                @foreach($cards as $card)
                                    @php
                                        $type = trim((string)($card['type'] ?? ''));
                                        $label = trim((string)($card['label'] ?? ''));
                                        $cardTitle = trim((string)($card['title'] ?? ''));
                                    @endphp

                                    <article class="exercise-card p-4 sm:p-5">
                                        <div class="relative z-10">
                                            <div class="flex items-start gap-3">
                                                @if($label !== '')
                                                    <div class="section-chip">
                                                        <span class="text-sm font-black leading-[1.45] text-white sm:text-base">
                                                            {{ $label }}
                                                        </span>
                                                    </div>
                                                @endif

                                                @if($cardTitle !== '')
                                                    <p class="text-base font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50 sm:text-lg">
                                                        {{ $cardTitle }}
                                                    </p>
                                                @endif
                                            </div>

                                            @if($type === 'table_question')
                                                @php
                                                    $headers = is_array($card['headers'] ?? null) ? $card['headers'] : [];
                                                    $rows = is_array($card['rows'] ?? null) ? $card['rows'] : [];
                                                    $inputName = trim((string)($card['input_name'] ?? 'table_answers'));
                                                    $firstColumnLabel = trim((string)($card['first_column_label'] ?? 'items'));
                                                @endphp

                                                <div class="question-table-wrap mt-4 hidden md:block">
                                                    <table class="question-table text-sm sm:text-base">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left text-sm font-black tracking-[-0.02em] sm:text-base">
                                                                {{ $firstColumnLabel }}
                                                            </th>
                                                            @foreach($headers as $header)
                                                                <th class="text-center text-sm font-black capitalize sm:text-base">
                                                                    {{ $header }}
                                                                </th>
                                                            @endforeach
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($rows as $row)
                                                            @php
                                                                $rowKey = trim((string)($row['key'] ?? 'row_' . $loop->iteration));
                                                                $rowLabel = trim((string)($row['label'] ?? ''));
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    {{ $rowLabel }}
                                                                </td>

                                                                @foreach($headers as $header)
                                                                    <td class="text-center">
                                                                        <input
                                                                                class="question-choice"
                                                                                type="checkbox"
                                                                                name="{{ $inputName }}[{{ $rowKey }}]"
                                                                                value="{{ $header }}"
                                                                                data-sync-choice="true"
                                                                                aria-label="{{ $rowLabel }} - {{ $header }}"
                                                                        >
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="mt-4 space-y-3 md:hidden">
                                                    @foreach($rows as $row)
                                                        @php
                                                            $rowKey = trim((string)($row['key'] ?? 'row_' . $loop->iteration));
                                                            $rowLabel = trim((string)($row['label'] ?? ''));
                                                        @endphp

                                                        <div class="rounded-[20px] border border-slate-200/80 bg-white/80 p-3 shadow-sm dark:border-slate-700 dark:bg-slate-900/50">
                                                            <p class="text-base font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50 sm:text-lg">
                                                                {{ $rowLabel }}
                                                            </p>

                                                            <div class="mt-3 grid grid-cols-2 gap-2">
                                                                @foreach($headers as $header)
                                                                    <label class="mobile-option flex items-center gap-2 px-3 py-2.5 text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                                        <input
                                                                                class="question-choice"
                                                                                type="checkbox"
                                                                                name="{{ $inputName }}[{{ $rowKey }}]"
                                                                                value="{{ $header }}"
                                                                                data-sync-choice="true"
                                                                                aria-label="{{ $rowLabel }} - {{ $header }}"
                                                                        >
                                                                        <span class="capitalize">{{ $header }}</span>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif($type === 'inline_options')
                                                @php
                                                    $prompt = trim((string)($card['prompt'] ?? ''));
                                                    $options = is_array($card['options'] ?? null) ? $card['options'] : [];
                                                    $inputName = trim((string)($card['input_name'] ?? 'choices'));
                                                @endphp

                                                <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">
                                                    @if($prompt !== '')
                                                        <p class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                                            {{ $prompt }}
                                                        </p>
                                                    @endif

                                                    @foreach($options as $option)
                                                        @php
                                                            $optionKey = trim((string)($option['key'] ?? \Illuminate\Support\Str::slug((string)($option['label'] ?? $option), '_')));
                                                            $optionLabel = trim((string)($option['label'] ?? $option));
                                                            $isOther = $optionKey === 'other';
                                                            $otherInputId = trim((string)($card['other_input_id'] ?? ($inputName . 'OtherInput')));
                                                            $otherInputName = trim((string)($card['other_input_name'] ?? ($inputName . '_other')));
                                                        @endphp

                                                        <label class="answer-item inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-bold text-slate-700 shadow-sm dark:text-slate-200 sm:text-base">
                                                            <input
                                                                    id="{{ $inputName }}_{{ $optionKey }}"
                                                                    class="question-choice"
                                                                    type="checkbox"
                                                                    name="{{ $inputName }}[]"
                                                                    value="{{ $optionKey }}"
                                                                    {{ $isOther ? 'data-other-toggle=' . $otherInputId : '' }}
                                                            >
                                                            <span>{{ $optionLabel }}</span>

                                                            @if($isOther)
                                                                <input
                                                                        id="{{ $otherInputId }}"
                                                                        type="text"
                                                                        name="{{ $otherInputName }}"
                                                                        class="other-input px-1 py-0.5 text-sm font-bold sm:text-base"
                                                                        placeholder="type here"
                                                                        disabled
                                                                >
                                                            @endif
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @elseif($type === 'split_option_groups')
                                                @php
                                                    $groups = is_array($card['groups'] ?? null) ? $card['groups'] : [];
                                                @endphp

                                                <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                                                    @foreach($groups as $group)
                                                        @php
                                                            $groupTitle = trim((string)($group['title'] ?? ''));
                                                            $groupOptions = is_array($group['options'] ?? null) ? $group['options'] : [];
                                                            $inputName = trim((string)($group['input_name'] ?? 'group_choices'));
                                                            $otherInputId = trim((string)($group['other_input_id'] ?? ($inputName . 'OtherInput')));
                                                            $otherInputName = trim((string)($group['other_input_name'] ?? ($inputName . '_other')));
                                                        @endphp

                                                        <div class="rounded-[22px] border border-slate-200/80 bg-white/80 p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/55 sm:p-5">
                                                            <h2 class="text-base font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50 sm:text-lg">
                                                                {{ $groupTitle }}
                                                            </h2>

                                                            <div class="mt-4 space-y-2.5">
                                                                @foreach($groupOptions as $option)
                                                                    @php
                                                                        $optionKey = trim((string)($option['key'] ?? \Illuminate\Support\Str::slug((string)($option['label'] ?? $option), '_')));
                                                                        $optionLabel = trim((string)($option['label'] ?? $option));
                                                                        $isOther = $optionKey === 'other';
                                                                    @endphp

                                                                    <label class="answer-item flex items-start gap-3 px-3 py-3 text-sm font-bold leading-[1.45] text-slate-700 shadow-sm dark:text-slate-200 sm:text-base">
                                                                        <input
                                                                                class="question-choice"
                                                                                type="checkbox"
                                                                                name="{{ $inputName }}[]"
                                                                                value="{{ $optionLabel }}"
                                                                                {{ $isOther ? 'data-other-toggle=' . $otherInputId : '' }}
                                                                        >

                                                                        <div class="min-w-0 flex-1">
                                                                            <span>{{ $optionLabel }}</span>

                                                                            @if($isOther)
                                                                                <input
                                                                                        id="{{ $otherInputId }}"
                                                                                        type="text"
                                                                                        name="{{ $otherInputName }}"
                                                                                        class="other-input ml-1 px-1 py-0.5 text-sm font-bold sm:text-base"
                                                                                        placeholder="type here"
                                                                                        disabled
                                                                                >
                                                                            @endif
                                                                        </div>
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif($type === 'checkbox_grid')
                                                @php
                                                    $options = is_array($card['options'] ?? null) ? $card['options'] : [];
                                                    $inputName = trim((string)($card['input_name'] ?? 'grid_choices'));
                                                    $gridClass = trim((string)($card['grid_class'] ?? 'grid-cols-2 sm:grid-cols-4'));
                                                @endphp

                                                <div class="mt-4 grid {{ $gridClass }} gap-2 sm:gap-3">
                                                    @foreach($options as $option)
                                                        @php
                                                            $optionKey = trim((string)($option['key'] ?? \Illuminate\Support\Str::slug((string)($option['label'] ?? $option), '_')));
                                                            $optionLabel = trim((string)($option['label'] ?? $option));
                                                        @endphp

                                                        <label class="answer-item flex items-center gap-3 px-3 py-3 text-sm font-bold leading-[1.45] text-slate-700 shadow-sm dark:text-slate-200 sm:text-base">
                                                            <input
                                                                    class="question-choice"
                                                                    type="checkbox"
                                                                    name="{{ $inputName }}[]"
                                                                    value="{{ $optionLabel }}"
                                                            >
                                                            <span>{{ $optionLabel }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const viewport = document.getElementById("slideViewport");
            const shell = document.getElementById("slideShell");
            const toggles = document.querySelectorAll("[data-other-toggle]");
            const syncedChoices = document.querySelectorAll("[data-sync-choice]");

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove("is-scrollable");

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle("is-scrollable", needsScroll);
                });
            }

            function syncChoiceGroup(name, value) {
                syncedChoices.forEach((input) => {
                    if (input.name === name) {
                        input.checked = input.value === value;
                    }
                });
            }

            function clearChoiceGroup(name) {
                syncedChoices.forEach((input) => {
                    if (input.name === name) {
                        input.checked = false;
                    }
                });
            }

            let resizeRaf = null;

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(() => {
                    syncLayoutMode();
                });
            }

            toggles.forEach((toggle) => {
                const targetId = toggle.getAttribute("data-other-toggle");
                const target = document.getElementById(targetId);

                if (!target) return;

                const syncOtherInput = () => {
                    target.disabled = !toggle.checked;
                    if (!toggle.checked) {
                        target.value = "";
                    }
                };

                toggle.addEventListener("change", syncOtherInput);
                syncOtherInput();
            });

            syncedChoices.forEach((input) => {
                input.addEventListener("change", () => {
                    if (input.checked) {
                        syncChoiceGroup(input.name, input.value);
                    } else {
                        clearChoiceGroup(input.name);
                    }
                });
            });

            window.addEventListener("resize", handleResize);
            window.addEventListener("load", syncLayoutMode);

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.resetSlide = () => {
                syncLayoutMode();
            };

            syncLayoutMode();
        });
    </script>
@endsection
