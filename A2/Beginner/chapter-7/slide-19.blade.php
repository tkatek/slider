<?php
$content = [
    'page_title' => 'Writing',
    'title' => 'Writing',
    'subtitle' => 'Write questions to match these statements.',

    'rows' => [
        [
            'label' => 'My father is 52.',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'I’m 167 cm (5 foot 6).',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'My cousin has red hair.',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'No, he wears contact lenses.',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'He’s tall and very good-looking.',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'My sister’s hair is medium length.',
            'placeholder' => 'Write the question here',
        ],
        [
            'label' => 'I have dark brown eyes.',
            'placeholder' => 'Write the question here',
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $pageTitle = trim((string) ($content['page_title'] ?? 'Writing'));
    $subtitle2 = trim((string) ($content['subtitle_2'] ?? ''));
    $rows = array_values(is_array($content['rows'] ?? null) ? $content['rows'] : []);

    $themeGradient = $theme['primary_color'] ?? 'bg-gradient-to-r from-indigo-500 to-blue-500';
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .writing-page {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                    radial-gradient(720px 360px at 8% 0%, rgba(79, 70, 229, .07), transparent 58%),
                    linear-gradient(180deg, rgba(255, 255, 255, .9) 0%, rgba(248, 250, 252, .96) 100%);
        }

        .dark .writing-page {
            background:
                    radial-gradient(720px 360px at 8% 0%, rgba(99, 102, 241, .14), transparent 58%),
                    linear-gradient(180deg, rgba(2, 6, 23, .94) 0%, rgba(15, 23, 42, .98) 100%);
        }

        .writing-shell {
            max-width: 1120px;
            margin: 0 auto;
            padding: 16px 14px 22px;
        }

        .writing-page .header-spacing {
            margin-top: .35rem !important;
            margin-bottom: .8rem !important;
            padding-left: .5rem !important;
            padding-right: .5rem !important;
        }

        .writing-page .header-spacing h1 {
            margin-bottom: .35rem !important;
        }

        .writing-table-card {
            overflow: hidden;
            border-radius: 20px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .8);
            box-shadow: 0 16px 42px -34px rgba(15, 23, 42, .22);
            backdrop-filter: blur(10px);
        }

        .dark .writing-table-card {
            border-color: rgba(71, 85, 105, .72);
            background: rgba(15, 23, 42, .7);
            box-shadow: 0 16px 42px -34px rgba(0, 0, 0, .55);
        }

        .writing-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .writing-table thead {
            background: rgba(248, 250, 252, .92);
        }

        .dark .writing-table thead {
            background: rgba(30, 41, 59, .76);
        }

        .writing-table th {
            padding: 12px 14px;
            border-bottom: 1px solid rgba(226, 232, 240, .9);
            text-align: left;
            font-size: .72rem;
            line-height: 1;
            font-weight: 900;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: #64748b;
        }

        .dark .writing-table th {
            border-bottom-color: rgba(71, 85, 105, .78);
            color: #94a3b8;
        }

        .writing-table td {
            padding: 10px 14px;
            border-bottom: 1px solid rgba(226, 232, 240, .76);
            vertical-align: middle;
        }

        .dark .writing-table td {
            border-bottom-color: rgba(71, 85, 105, .62);
        }

        .writing-table tbody tr:last-child td {
            border-bottom: none;
        }

        .col-number {
            width: 62px;
        }

        .col-question {
            width: 54%;
        }

        .col-answer {
            width: 46%;
        }

        .row-number {
            display: inline-flex;
            height: 30px;
            width: 30px;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            color: #fff;
            font-size: .8rem;
            font-weight: 900;
            box-shadow: 0 8px 18px -12px rgba(15, 23, 42, .45);
        }

        .writing-area-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 48px;
            border-radius: 14px;
            border: 1px solid rgba(226, 232, 240, .9);
            background: rgba(255, 255, 255, .88);
            padding: 8px 12px;
        }

        .dark .writing-area-wrap {
            border-color: rgba(71, 85, 105, .72);
            background: rgba(2, 6, 23, .3);
        }

        .writing-area {
            width: 100%;
            min-height: 32px;
            max-height: 86px;
            resize: vertical;
            border: none;
            outline: none;
            background: transparent;
            color: #0f172a;
            font-size: .98rem;
            line-height: 1.45;
            font-weight: 800;
            letter-spacing: -0.015em;
            padding: 0;
        }

        .writing-area::placeholder {
            color: #94a3b8;
            opacity: 1;
            font-weight: 800;
        }

        .dark .writing-area {
            color: #f8fafc;
        }

        .dark .writing-area::placeholder {
            color: #64748b;
        }

        .question-mark {
            flex-shrink: 0;
            color: #94a3b8;
            font-size: 1.25rem;
            line-height: 1;
            font-weight: 900;
        }

        .dark .question-mark {
            color: #64748b;
        }

        .answer-text {
            font-size: 1rem;
            line-height: 1.35;
            font-weight: 850;
            letter-spacing: -0.02em;
            color: #1e293b;
        }

        .dark .answer-text {
            color: #e2e8f0;
        }

        @media (max-width: 760px) {
            .writing-shell {
                padding: 12px 12px 20px;
            }

            .writing-table-card {
                border-radius: 18px;
                background: transparent;
                border: none;
                box-shadow: none;
                backdrop-filter: none;
            }

            .writing-table,
            .writing-table thead,
            .writing-table tbody,
            .writing-table tr,
            .writing-table th,
            .writing-table td {
                display: block;
                width: 100%;
            }

            .writing-table thead {
                display: none;
            }

            .writing-table tbody {
                display: grid;
                gap: 10px;
            }

            .writing-table tr {
                overflow: hidden;
                border-radius: 18px;
                border: 1px solid rgba(226, 232, 240, .86);
                background: rgba(255, 255, 255, .82);
                box-shadow: 0 12px 30px -26px rgba(15, 23, 42, .25);
            }

            .dark .writing-table tr {
                border-color: rgba(71, 85, 105, .72);
                background: rgba(15, 23, 42, .72);
            }

            .writing-table td {
                border-bottom: none;
                padding: 10px 12px;
            }

            .writing-table td[data-label]::before {
                content: attr(data-label);
                display: block;
                margin-bottom: 6px;
                font-size: .66rem;
                font-weight: 900;
                letter-spacing: .13em;
                text-transform: uppercase;
                color: #94a3b8;
            }

            .writing-table td:first-child {
                padding-bottom: 0;
            }

            .writing-table td:first-child::before {
                content: none;
            }

            .row-number {
                height: 28px;
                width: 28px;
                font-size: .75rem;
            }

            .writing-area-wrap {
                min-height: 48px;
                padding: 8px 10px;
            }

            .writing-area {
                min-height: 34px;
                font-size: .95rem;
            }

            .answer-text {
                font-size: .98rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="writing-page">
        <div class="writing-shell">
            <header class="text-center">
                @include('slider.components.title-subtitle')

                @if($subtitle2 !== '')
                    <p class="mx-auto max-w-3xl text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                        {{ $subtitle2 }}
                    </p>
                @endif
            </header>

            <section class="writing-table-card" aria-label="Write questions to match the answers">
                <table class="writing-table">
                    <thead>
                    <tr>
                        <th class="col-number">No.</th>
                        <th class="col-question">Question</th>
                        <th class="col-answer">Given answer</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($rows as $index => $row)
                        @php
                            $answer = trim((string) ($row['label'] ?? ''));
                            $placeholder = trim((string) ($row['placeholder'] ?? 'Write the question here'));
                        @endphp

                        <tr>
                            <td data-label="No.">
                                <span class="row-number {{ $themeGradient }}">
                                    {{ $index + 1 }}
                                </span>
                            </td>

                            <td data-label="Question">
                                <div class="writing-area-wrap">
                                    <textarea
                                            class="writing-area js-writing-area"
                                            data-index="{{ $index }}"
                                            placeholder="{{ $placeholder }}"
                                    ></textarea>
                                    <span class="question-mark">?</span>
                                </div>
                            </td>

                            <td data-label="Given answer">
                                <p class="answer-text">
                                    {!! $answer !!}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const areas = Array.from(document.querySelectorAll('.js-writing-area'));

            function clearAnswers() {
                areas.forEach((area) => {
                    area.value = '';
                });
            }

            clearAnswers();

            window.resetSlide = clearAnswers;
        })();
    </script>
@endsection