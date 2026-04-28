<?php
$pageTitle = 'A2 Unit 3: Appearances';
$data = [
    'title' => 'To sum up:',
    'subtitle' => 'Question forms and answer models for describing appearance.',
];

$rows = [
    [
        'type' => 'Be (is/are)',
        'structure' => 'Is/Are + subject + adjective?',
        'example' => 'Is she tall?',
        'short' => "Yes, she is. / No, she isn't.",
        'full' => "Yes, she is tall. / No, she isn't tall.",
    ],
    [
        'type' => 'Have (physical features)',
        'structure' => 'Does + subject + have + noun?',
        'example' => 'Does he have curly hair?',
        'short' => "Yes, he does. / No, he doesn't.",
        'full' => "Yes, he has curly hair. / No, he doesn't have curly hair.",
    ],
    [
        'type' => 'Wh- question (general)',
        'structure' => 'What does + subject + look like?',
        'example' => 'What does she look like?',
        'short' => 'She is short with long brown hair.',
        'full' => 'She is short. She has long brown hair.',
    ],
    [
        'type' => 'Wh- question (details)',
        'structure' => 'What colour / How + adjective?',
        'example' => 'What colour are his eyes?',
        'short' => "They're brown.",
        'full' => 'His eyes are brown.',
    ],
    [
        'type' => 'Choice question',
        'structure' => 'Is/Does + subject + A or B?',
        'example' => 'Is he tall or short?',
        'short' => "He's tall.",
        'full' => 'He is tall.',
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('style')
    <style>
        .summary-page {
            min-height: 100dvh;
            width: 100%;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #111827;
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(103, 63, 231, 0.14), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(59, 130, 246, 0.12), transparent 56%),
                #f8fafc;
        }

        .summary-shell {
            margin: 0 auto;
            width: 100%;
            max-width: 1320px;
            padding: 20px 16px 26px;
        }

        .summary-title {
            margin: 0 0 12px;
            font-size: clamp(1.7rem, 2.2vw, 2.25rem);
            line-height: 1.1;
            font-weight: 900;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        .summary-subtitle {
            margin: 0 0 18px;
            font-size: clamp(0.95rem, 1.15vw, 1.05rem);
            font-weight: 700;
            color: #334155;
        }

        .table-wrap {
            margin-top: 0.35rem;
            border-radius: 1.25rem;
            overflow: hidden;
            border: 1px solid rgba(226, 232, 240, 0.9);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(248, 250, 252, 0.95) 100%);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 16px 36px -26px rgba(15, 23, 42, 0.38);
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
            background: transparent;
        }

        .summary-table th,
        .summary-table td {
            border-right: 1px solid #dbe2ea;
            border-bottom: 1px solid #dbe2ea;
            padding: 14px 13px;
            vertical-align: middle;
            text-align: left;
            color: #1f2937;
            font-size: clamp(0.86rem, 1.05vw, 1rem);
            line-height: 1.35;
            background: rgba(255, 255, 255, 0.86);
        }

        .summary-table th {
            background: linear-gradient(135deg, #f97316, #f59e0b);
            font-size: clamp(0.92rem, 1.15vw, 1.08rem);
            font-weight: 900;
            color: #ffffff;
            border-right-color: rgba(255, 255, 255, 0.3);
            border-bottom-color: rgba(255, 255, 255, 0.25);
        }

        .summary-table td:first-child {
            font-weight: 900;
            color: #111827;
        }

        .summary-table tbody tr:nth-child(even) td {
            background: rgba(241, 245, 249, 0.92);
        }

        .summary-table th:last-child,
        .summary-table td:last-child {
            border-right: none;
        }

        .summary-table tbody tr:last-child td {
            border-bottom: none;
        }

        .summary-table tbody tr:hover td {
            background: rgba(236, 245, 255, 0.86);
        }

        .structure-text {
            font-weight: 800;
            color: #dc2626 !important;
        }

        .summary-table col:nth-child(1) { width: 14.5%; }
        .summary-table col:nth-child(2) { width: 26.5%; }
        .summary-table col:nth-child(3) { width: 21.5%; }
        .summary-table col:nth-child(4) { width: 18.25%; }
        .summary-table col:nth-child(5) { width: 19.25%; }

        .mobile-cards {
            display: none;
        }

        @media (max-width: 980px) {
            .summary-shell {
                padding: 16px 12px 20px;
            }

            .table-wrap {
                display: none;
            }

            .mobile-cards {
                display: grid;
                gap: 10px;
            }

            .mobile-card {
                border: 1px solid rgba(203, 213, 225, 0.9);
                border-radius: 14px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(248, 250, 252, 0.94) 100%);
                padding: 12px;
                box-shadow: 0 12px 26px -20px rgba(15, 23, 42, 0.32);
            }

            .mobile-card h3 {
                margin: 0 0 8px;
                font-size: 1.03rem;
                line-height: 1.2;
                font-weight: 900;
                color: #111827;
            }

            .mobile-line {
                margin: 0;
                font-size: 0.93rem;
                line-height: 1.35;
                color: #1f2937;
            }

            .mobile-line + .mobile-line {
                margin-top: 5px;
            }

            .mobile-label {
                font-weight: 900;
                color: #0f172a;
            }

            .mobile-structure {
                color: #ef4444;
                font-weight: 800;
            }
        }

        .dark .summary-page {
            background:
                radial-gradient(980px 560px at 8% 10%, rgba(96, 165, 250, 0.18), transparent 55%),
                radial-gradient(900px 560px at 92% 14%, rgba(192, 132, 252, 0.16), transparent 56%),
                radial-gradient(880px 640px at 50% 100%, rgba(99, 102, 241, 0.12), transparent 60%),
                linear-gradient(180deg, #020617 0%, #0f172a 100%);
        }

        .dark .summary-title,
        .dark .summary-subtitle {
            color: #f8fafc;
        }

        .dark .table-wrap {
            border-color: rgba(71, 85, 105, 0.72);
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.88) 0%, rgba(15, 23, 42, 0.84) 100%);
            box-shadow: 0 18px 44px -24px rgba(2, 6, 23, 0.68);
        }

        .dark .summary-table {
            background: transparent;
        }

        .dark .summary-table th,
        .dark .summary-table td {
            border-right-color: rgba(100, 116, 139, 0.34);
            border-bottom-color: rgba(100, 116, 139, 0.34);
            color: #f1f5f9;
        }

        .dark .summary-table th {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.9), rgba(245, 158, 11, 0.85));
            color: #ffffff;
            border-right-color: rgba(148, 163, 184, 0.35);
            border-bottom-color: rgba(148, 163, 184, 0.28);
        }

        .dark .summary-table td:first-child {
            color: #ffffff;
        }

        .dark .summary-table td {
            background: rgba(30, 41, 59, 0.75);
        }

        .dark .summary-table tbody tr:nth-child(even) td {
            background: rgba(15, 23, 42, 0.82);
        }

        .dark .summary-table tbody tr:hover td {
            background: rgba(30, 58, 138, 0.28);
        }

        .dark .mobile-card {
            background: rgba(30, 41, 59, 0.86);
            border-color: rgba(100, 116, 139, 0.35);
        }

        .dark .mobile-card h3,
        .dark .mobile-line,
        .dark .mobile-label {
            color: #f8fafc;
        }
    </style>
@endsection

@section('content')
    <main class="summary-page">
        <section class="summary-shell">
            @include('slider.components.title-subtitle', [
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
            ])

            <div class="table-wrap">
                <table class="summary-table" aria-label="Appearance question and answer table">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>Question Type</th>
                        <th>Question Structure</th>
                        <th>Example Question</th>
                        <th>Short Answer</th>
                        <th>Full Answer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row['type'] }}</td>
                            <td class="structure-text">{{ $row['structure'] }}</td>
                            <td>{{ $row['example'] }}</td>
                            <td>{{ $row['short'] }}</td>
                            <td>{{ $row['full'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <section class="mobile-cards" aria-label="Appearance question and answer cards">
                @foreach($rows as $row)
                    <article class="mobile-card">
                        <h3>{{ $row['type'] }}</h3>
                        <p class="mobile-line">
                            <span class="mobile-label">Structure:</span>
                            <span class="mobile-structure">{{ $row['structure'] }}</span>
                        </p>
                        <p class="mobile-line"><span class="mobile-label">Example:</span> {{ $row['example'] }}</p>
                        <p class="mobile-line"><span class="mobile-label">Short:</span> {{ $row['short'] }}</p>
                        <p class="mobile-line"><span class="mobile-label">Full:</span> {{ $row['full'] }}</p>
                    </article>
                @endforeach
            </section>
        </section>
    </main>
@endsection