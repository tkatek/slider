@php
    $questionsCollection = collect($questions ?? [])->values();
    $problemsCollection = collect($problems ?? [])->values();
    $sections = [];

    if ($questionsCollection->count()) {
        $sections[] = [
            'id' => 'direct-questions',
            'label' => 'Direct Questions',
            'title' => null,
            'audio_url' => null,
            'obtained_note' => $test->auth_student_question_response_sum_note ?? null,
            'total_note' => $test->questions_sum_note ?? null,
            'questions' => $questionsCollection,
        ];
    }

    foreach ($problemsCollection as $problemIndex => $problem) {
        $sections[] = [
            'id' => 'problem-' . ($problem->id ?? $problemIndex),
            'label' => $problem->label ?? ('Problem ' . ($problemIndex + 1)),
            'title' => $problem->title ?? null,
            'audio_url' => $problem->hasMedia('audio') ? $problem->getFirstMediaUrl('audio') : null,
            'obtained_note' => $problem->auth_student_question_response_sum_note ?? null,
            'total_note' => $problem->questions_sum_note ?? null,
            'questions' => collect($problem->questions ?? [])->values(),
        ];
    }

    $authStudentResponse = $test->authStudentResponse ?? null;
    $quizTotal = (float) ($authStudentResponse->quiz_note ?? 0);
    $obtainedTotal = (float) ($noteObtained ?? 0);
    $overallScorePercent = $quizTotal > 0 ? ($obtainedTotal * 100) / $quizTotal : 0;
    $studentId = $authStudentResponse->student_id ?? null;
    $certificateUrl = null;
    $retakeUrl = null;

    if (($test->has_certificate ?? false) && $overallScorePercent >= 50 && $studentId) {
        $certificateUrl = route('downloadCertificate', ['test' => $test->id, 'student' => $studentId]);
    }

    if ($test->retakable ?? false) {
        $retakeUrl = ($test->isRandom ?? false)
            ? route('student.test.showRandom', ['test' => $test->id])
            : route('student.test.show', ['test' => $test->id]);
    }

    $formatNote = function ($value) {
        return sprintf('%0.2f', (float) ($value ?? 0));
    };

    $normalizeAnswerList = function ($raw) {
        if (is_array($raw)) {
            return array_values(array_filter($raw, function ($value) {
                return $value !== null && $value !== '';
            }));
        }

        $raw = trim((string) $raw);
        if ($raw === '') {
            return [];
        }

        $decoded = json_decode($raw, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return array_values(array_filter($decoded, function ($value) {
                return $value !== null && $value !== '';
            }));
        }

        return array_values(array_filter(array_map('trim', explode(',', $raw)), function ($value) {
            return $value !== '';
        }));
    };

    $hasMeaningfulHtml = function ($value) {
        if ($value === null) {
            return false;
        }

        $text = preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $value)));
        return trim((string) $text) !== '';
    };

    $findChoiceById = function ($question, $choiceId) {
        return collect($question->choices ?? [])->first(function ($choice) use ($choiceId) {
            return (string) $choice->id === (string) $choiceId;
        });
    };

    $getChoiceContent = function ($choice, $field = 'choice') {
        if (!$choice) {
            return '';
        }

        return (string) ($choice->{$field} ?? '');
    };

    $getStudentResponse = function ($question) {
        return $question->authStudentResponse ?? null;
    };
@endphp
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Correction Reader</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #faf9f7;
            --bg-secondary: #f3f1ed;
            --fg: #1a1916;
            --fg-muted: #6b6860;
            --accent: #1d5c5c;
            --accent-light: #2a8585;
            --accent-pale: #e8f2f2;
            --success: #2f6d53;
            --success-pale: #edf7f1;
            --danger: #b54b5d;
            --danger-pale: #fbf0f2;
            --warning: #c66d20;
            --warning-pale: #fff3e8;
            --card: #ffffff;
            --border: #e5e2dc;
            --shadow: rgba(26, 25, 22, 0.08);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--fg);
            line-height: 1.6;
        }

        h1, h2, h3, h4 {
            font-family: 'Fraunces', serif;
            font-weight: 600;
            line-height: 1.25;
        }

        .font-display { font-family: 'Fraunces', serif; }

        .bg-pattern {
            background-image:
                    radial-gradient(circle at 20% 50%, rgba(29, 92, 92, 0.03) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(29, 92, 92, 0.04) 0%, transparent 40%),
                    radial-gradient(circle at 60% 80%, rgba(180, 83, 9, 0.02) 0%, transparent 40%);
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 4px 24px var(--shadow), 0 1px 3px var(--shadow);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 15px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background: var(--accent-light);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: var(--fg);
            border: 2px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .btn-outline:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        .progress-track {
            height: 6px;
            background: var(--bg-secondary);
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
            border-radius: 999px;
            transition: width 0.3s ease;
        }

        .section-tab {
            padding: 10px 20px;
            font-weight: 500;
            color: var(--fg-muted);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
            border: none;
            background: transparent;
            font-family: inherit;
            font-size: inherit;
        }

        .section-tab:hover {
            color: var(--fg);
            background: var(--bg-secondary);
        }

        .section-tab.active {
            color: var(--accent);
            background: var(--accent-pale);
            font-weight: 700;
        }

        .hidden { display: none !important; }

        .summary-card {
            padding: 18px 20px;
            border-radius: 18px;
            border: 1px solid var(--border);
            background: linear-gradient(180deg, rgba(255,255,255,0.95), rgba(243,241,237,0.9));
        }

        .hero-card {
            padding: 28px;
            border-radius: 28px;
            background:
                    radial-gradient(circle at top left, rgba(29, 92, 92, 0.11), transparent 38%),
                    linear-gradient(145deg, rgba(255,255,255,0.98), rgba(243,241,237,0.92));
        }

        .action-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .score-ring-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }

        .score-ring-card {
            padding: 22px 18px;
            border-radius: 24px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.88);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 14px;
        }

        .score-ring {
            --progress: 0deg;
            width: 128px;
            height: 128px;
            border-radius: 999px;
            display: grid;
            place-items: center;
            background:
                    radial-gradient(circle at center, white 56%, transparent 57%),
                    conic-gradient(var(--accent) 0deg var(--progress), rgba(229, 226, 220, 0.8) var(--progress) 360deg);
            box-shadow: inset 0 0 0 1px rgba(29, 92, 92, 0.08);
        }

        .score-ring__inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            line-height: 1.1;
        }

        .score-ring__percent {
            font-size: 28px;
            font-weight: 900;
            color: var(--accent);
        }

        .score-ring__caption {
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--fg-muted);
            font-weight: 800;
        }

        .detail-shell {
            margin-top: 28px;
        }

        .score-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .score-pill--total {
            background: var(--accent-pale);
            color: var(--accent);
        }

        .score-pill--question {
            background: var(--warning-pale);
            color: var(--warning);
        }

        .split-layout {
            display: grid;
            gap: 24px;
        }

        .split-layout--with-title {
            grid-template-columns: minmax(0, 1fr);
        }

        .split-panel {
            min-width: 0;
        }

        .answer-panels {
            display: grid;
            gap: 16px;
            margin-top: 20px;
        }

        .answer-panels--single {
            grid-template-columns: minmax(0, 1fr);
        }

        .answer-panel {
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px;
            background: var(--card);
        }

        .answer-panel--student {
            background: linear-gradient(180deg, rgba(255,255,255,1), rgba(255,243,232,0.7));
        }

        .answer-panel--correct {
            background: linear-gradient(180deg, rgba(255,255,255,1), rgba(237,247,241,0.75));
        }

        .panel-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .panel-kicker--student {
            background: var(--warning-pale);
            color: var(--warning);
        }

        .panel-kicker--correct {
            background: var(--success-pale);
            color: var(--success);
        }

        .muted-empty {
            color: var(--fg-muted);
            font-style: italic;
        }

        .answer-status-note {
            margin-bottom: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid rgba(181, 75, 93, 0.2);
            background: var(--danger-pale);
            color: var(--danger);
            font-weight: 700;
        }

        .rich-copy {
            overflow-wrap: anywhere;
        }

        .answer-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .answer-choice,
        .answer-pair,
        .answer-order-item,
        .answer-fill-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.88);
        }

        .answer-choice__mark,
        .answer-order-item__index,
        .answer-fill-item__index,
        .answer-pair__index {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            flex-shrink: 0;
            background: var(--bg-secondary);
            color: var(--fg-muted);
        }

        .answer-choice--selected {
            border-color: rgba(29, 92, 92, 0.22);
            background: var(--accent-pale);
        }

        .answer-choice--selected .answer-choice__mark {
            background: var(--accent);
            color: white;
        }

        .answer-choice--correct {
            border-color: rgba(47, 109, 83, 0.24);
            background: var(--success-pale);
        }

        .answer-choice--correct .answer-choice__mark {
            background: var(--success);
            color: white;
        }

        .answer-choice--wrong {
            border-color: rgba(181, 75, 93, 0.28);
            background: var(--danger-pale);
        }

        .answer-choice--wrong .answer-choice__mark {
            background: var(--danger);
            color: white;
        }

        .answer-grid-two {
            display: grid;
            gap: 12px;
        }

        .audio-card {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid rgba(29, 92, 92, 0.12);
            background:
                    linear-gradient(135deg, rgba(232, 242, 242, 0.95), rgba(255, 255, 255, 0.98)),
                    var(--card);
            box-shadow: 0 10px 24px rgba(26, 25, 22, 0.06);
        }

        .audio-card__label {
            display: inline-flex;
            align-items: center;
            align-self: flex-start;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(29, 92, 92, 0.08);
            color: var(--accent);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .audio-card__label::before {
            content: '';
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: var(--accent);
            box-shadow: 0 0 0 5px rgba(29, 92, 92, 0.12);
        }

        .audio-player {
            width: 100%;
            display: block;
            border-radius: 14px;
            overflow: hidden;
            background: transparent;
            accent-color: var(--accent);
        }

        .media-image {
            max-width: min(100%, 420px);
            border-radius: 16px;
            border: 1px solid var(--border);
            display: block;
        }

        @media (min-width: 1024px) {
            .split-layout--with-title {
                grid-template-columns: minmax(0, 0.95fr) minmax(0, 1.05fr);
                align-items: start;
            }

            .answer-panels {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .section-tab {
                white-space: nowrap;
                padding: 8px 14px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="bg-pattern">
<header class="sticky top-0 z-50 border-b border-[var(--border)] bg-white/90 backdrop-blur-md">
    <div class="mx-auto max-w-[1480px] px-4 py-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl font-display text-[var(--accent)]">Test Correction</h1>
                <p class="text-sm text-[var(--fg-muted)] sm:text-base">See your result first, then open the full correction when you want the details.</p>
            </div>
            <div class="text-right">
                <span class="score-pill score-pill--total">Total Score</span>
                <div class="mt-2 text-2xl font-black text-[var(--accent)] sm:text-3xl">
                    {{ $formatNote($obtainedTotal) }}
                    <span class="text-base font-semibold text-[var(--fg-muted)]">/ {{ $formatNote($quizTotal) }}</span>
                </div>
            </div>
        </div>
        <div class="mt-4 hidden" id="progressArea">
            <div class="mb-2 flex items-center justify-between text-sm">
                <span id="progressLabel">Progress: 0%</span>
                <span id="questionCounter" class="font-semibold text-[var(--accent)]">Question 1</span>
            </div>
            <div class="progress-track">
                <div id="progressBar" class="progress-fill" style="width: 0%"></div>
            </div>
        </div>
    </div>
</header>

<main class="mx-auto max-w-[1480px] px-4 py-6">
    <section id="summaryView" class="hero-card card">
        <div class="grid gap-8 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] lg:items-start">
            <div>
                <span class="score-pill score-pill--total">{{ ($authStudentResponse && $authStudentResponse->isCorrected) ? 'Corrected' : 'Provisional Correction' }}</span>
                <h2 class="mt-4 text-3xl font-display text-[var(--accent)] sm:text-4xl">Your score is {{ $formatNote($obtainedTotal) }} / {{ $formatNote($quizTotal) }}</h2>
                <p class="mt-3 max-w-2xl text-[15px] text-[var(--fg-muted)]">
                    The first view keeps things simple: actions, section scores, and a button to open the full correction in detail.
                </p>
                <div class="action-row mt-6">
                    @if($retakeUrl)
                        <a href="{{ $retakeUrl }}" class="btn btn-outline">Retake Exam</a>
                    @endif
                    @if($certificateUrl)
                        <a href="{{ $certificateUrl }}" target="_blank" class="btn btn-outline">Download Certificate</a>
                    @endif
                    <button id="showCorrectionBtn" type="button" class="btn btn-primary">Show Correction</button>
                </div>
            </div>

            <div class="summary-card card">
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-[var(--fg-muted)]">Overall Result</p>
                <div class="mt-4 flex items-center gap-4">
                    <div class="score-ring" style="--progress: {{ max(0, min(360, $overallScorePercent * 3.6)) }}deg;">
                        <div class="score-ring__inner">
                            <span class="score-ring__percent">{{ round($overallScorePercent) }}%</span>
                            <span class="score-ring__caption">Score</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-[var(--accent)]">{{ $formatNote($obtainedTotal) }} / {{ $formatNote($quizTotal) }}</p>
                        <p class="mt-2 text-sm text-[var(--fg-muted)]">
                            {{ ($test->has_certificate ?? false) ? 'Certificate unlocks from 50% and above.' : 'This exam does not include a certificate.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if(count($sections))
            <div class="mt-8">
                <h3 class="text-xl font-display text-[var(--accent)]">Section Scores</h3>
                <div class="score-ring-grid mt-4">
                    @foreach($sections as $section)
                        @php
                            $sectionObtained = (float) ($section['obtained_note'] ?? 0);
                            $sectionTotal = (float) ($section['total_note'] ?? 0);
                            $sectionPercent = $sectionTotal > 0 ? ($sectionObtained * 100) / $sectionTotal : 0;
                            $sectionDegrees = max(0, min(360, $sectionPercent * 3.6));
                        @endphp
                        <article class="score-ring-card">
                            <div class="score-ring" style="--progress: {{ $sectionDegrees }}deg;">
                                <div class="score-ring__inner">
                                    <span class="score-ring__percent">{{ round($sectionPercent) }}%</span>
                                    <span class="score-ring__caption">Section</span>
                                </div>
                            </div>
                            <div>
                                <p class="font-bold text-[var(--accent)]">{{ $section['label'] }}</p>
                                <p class="mt-1 text-sm text-[var(--fg-muted)]">{{ $formatNote($sectionObtained) }} / {{ $formatNote($sectionTotal) }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section id="correctionInterface" class="hidden detail-shell">
        <nav class="mb-6 overflow-x-auto" id="sectionNav">
            <div class="flex min-w-max gap-2">
                @foreach($sections as $sectionIndex => $section)
                    <button class="section-tab {{ $sectionIndex === 0 ? 'active' : '' }}" data-section="{{ $section['id'] }}" type="button">{{ $sectionIndex + 1 }}. {{ $section['label'] }}</button>
                @endforeach
            </div>
        </nav>

        <div id="sectionContainer">
            @php
                $globalQuestionNumber = 0;
            @endphp
            @foreach($sections as $section)
                @foreach($section['questions'] as $question)
                    @php
                        $globalQuestionNumber++;
                        $studentResponse = $getStudentResponse($question);
                        $studentAnswerRaw = $studentResponse->answer ?? null;
                        $studentChoiceIds = $normalizeAnswerList($studentAnswerRaw);
                        $correctChoiceIds = $normalizeAnswerList($question->correctResponse ?? null);
                        $multiChoiceCorrectIds = [];

                        if ($question->type_question_id == 1) {
                            foreach (($question->choices ?? []) as $choiceItem) {
                                if (!empty($choiceItem->isCorrect)) {
                                    $multiChoiceCorrectIds[] = (string) $choiceItem->id;
                                }
                            }
                        }

                        $studentChoiceIdStrings = array_values(array_map('strval', $studentChoiceIds));
                        $correctChoiceIdStrings = $question->type_question_id == 1
                            ? array_values($multiChoiceCorrectIds)
                            : array_values(array_map('strval', $correctChoiceIds));
                        $hasSubmittedMultiChoice = $question->type_question_id == 1 && count($studentChoiceIdStrings) > 0;
                        $sortedStudentChoiceIds = $studentChoiceIdStrings;
                        $sortedCorrectChoiceIds = $correctChoiceIdStrings;
                        sort($sortedStudentChoiceIds);
                        sort($sortedCorrectChoiceIds);
                        $isWrongMultiChoiceAnswer = $hasSubmittedMultiChoice && $sortedStudentChoiceIds !== $sortedCorrectChoiceIds;
                        $studentNote = $studentResponse->note ?? 0;
                        $questionNote = $question->note ?? 0;
                        $sectionHasTitle = $hasMeaningfulHtml($section['title'] ?? null);
                        $studentRecordUrl = $studentResponse ? $studentResponse->getFirstMediaUrl('record') : '';
                        $correctAnswerHtml = $question->type_question_id == 10 ? ($studentResponse->correctAnswer ?? $question->correctResponse) : ($question->correctResponse ?? null);
                    @endphp
                    <div class="question-step {{ $globalQuestionNumber === 1 ? '' : 'hidden' }}" data-section="{{ $section['id'] }}" data-question-number="{{ $globalQuestionNumber }}">
                        <div class="card p-6 sm:p-8">
                            <div class="split-layout {{ $sectionHasTitle ? 'split-layout--with-title' : '' }}">
                                @if($sectionHasTitle)
                                    <aside class="split-panel rounded-2xl bg-[var(--bg-secondary)] p-5 text-lg font-medium">
                                        {!! $section['title'] !!}
                                        @if($section['audio_url'])
                                            <div class="audio-card mt-5">
                                                <span class="audio-card__label">Section Audio</span>
                                                <audio controls controlslist="nodownload noplaybackrate" preload="none" class="audio-player">
                                                    <source src="{{ $section['audio_url'] }}" type="audio/mpeg">
                                                </audio>
                                            </div>
                                        @endif
                                    </aside>
                                @endif

                                <div class="split-panel min-w-0">
                                    <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-[var(--fg-muted)]">{{ $section['label'] }}</p>
                                            <h2 class="mt-1 text-2xl font-display">Question {{ $globalQuestionNumber }}</h2>
                                        </div>
                                        <span class="score-pill score-pill--question">Score {{ $formatNote($studentNote) }} / {{ $formatNote($questionNote) }}</span>
                                    </div>

                                    <div class="rich-copy">
                                        {!! $question->title !!}
                                    </div>

                                    @if($question->hasMedia('audio'))
                                        <div class="audio-card mt-5">
                                            <span class="audio-card__label">Question Audio</span>
                                            <audio controls controlslist="nodownload noplaybackrate" preload="none" class="audio-player">
                                                <source src="{{ $question->getFirstMediaUrl('audio') }}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    @endif

                                    @if($question->hasMedia('image'))
                                        <div class="mt-5">
                                            <img class="media-image" src="{{ $question->getFirstMediaUrl('image', 'card') }}" alt="Question image">
                                        </div>
                                    @endif

                                    <div class="answer-panels {{ $question->type_question_id == 1 ? 'answer-panels--single' : '' }}">
                                        <section class="answer-panel answer-panel--student">
                                            <div class="mb-4 flex items-center justify-between gap-3">
                                                <span class="panel-kicker panel-kicker--student">Your Answer</span>
                                                <span class="text-sm font-semibold text-[var(--fg-muted)]">Question score: {{ $formatNote($studentNote) }}</span>
                                            </div>

                                            @if($question->type_question_id == 1)
                                                <div class="answer-list">
                                                    @if(!$hasSubmittedMultiChoice)
                                                        <div class="answer-status-note">No answer submitted. Correct answer is highlighted in green.</div>
                                                    @elseif($isWrongMultiChoiceAnswer)
                                                        <div class="answer-status-note">Incorrect answer. Your wrong choice is red and the correct answer is green.</div>
                                                    @endif
                                                    @foreach($question->choices as $choice)
                                                        @php
                                                            $choiceId = (string) $choice->id;
                                                            $isChoiceMarkedCorrect = !empty($choice->isCorrect);
                                                            $isSelected = in_array($choiceId, $studentChoiceIdStrings, true);
                                                            $choiceClasses = [];
                                                            $choiceMark = '○';

                                                            if (!$hasSubmittedMultiChoice) {
                                                                if ($isChoiceMarkedCorrect) {
                                                                    $choiceClasses[] = 'answer-choice--correct';
                                                                    $choiceMark = '✓';
                                                                }
                                                            } elseif ($isWrongMultiChoiceAnswer) {
                                                                if ($isChoiceMarkedCorrect) {
                                                                    $choiceClasses[] = 'answer-choice--correct';
                                                                    $choiceMark = '✓';
                                                                } elseif ($isSelected) {
                                                                    $choiceClasses[] = 'answer-choice--wrong';
                                                                    $choiceMark = '✕';
                                                                }
                                                            } elseif ($isSelected) {
                                                                $choiceClasses[] = 'answer-choice--selected';
                                                                $choiceMark = '✓';
                                                            }
                                                        @endphp
                                                        <div class="answer-choice {{ implode(' ', $choiceClasses) }}">
                                                            <span class="answer-choice__mark">{{ $choiceMark }}</span>
                                                            <div class="rich-copy">{!! $choice->choice !!}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif(in_array($question->type_question_id, [2, 4, 10], true))
                                                <div class="rich-copy">
                                                    @if($hasMeaningfulHtml($studentAnswerRaw))
                                                        {!! $studentAnswerRaw !!}
                                                    @else
                                                        <p class="muted-empty">No answer submitted.</p>
                                                    @endif
                                                </div>
                                            @elseif($question->type_question_id == 5)
                                                <div class="answer-list">
                                                    @foreach($question->choices as $choiceIndex => $choice)
                                                        @php
                                                            $matchedChoice = isset($studentChoiceIds[$choiceIndex])
                                                                ? $findChoiceById($question, $studentChoiceIds[$choiceIndex])
                                                                : null;
                                                        @endphp
                                                        <div class="answer-pair">
                                                            <span class="answer-pair__index">{{ $choiceIndex + 1 }}</span>
                                                            <div class="min-w-0">
                                                                <p class="mb-2 font-bold">{!! $choice->choice !!}</p>
                                                                <div class="rich-copy">
                                                                    {!! $matchedChoice ? $getChoiceContent($matchedChoice, 'answer') : '<span class="muted-empty">No match selected.</span>' !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif($question->type_question_id == 9)
                                                <div class="answer-list">
                                                    @forelse($studentChoiceIds as $orderedChoiceId)
                                                        @php
                                                            $orderedChoice = $findChoiceById($question, $orderedChoiceId);
                                                        @endphp
                                                        <div class="answer-order-item">
                                                            <span class="answer-order-item__index">{{ $loop->iteration }}</span>
                                                            <div class="rich-copy">{!! $orderedChoice ? $getChoiceContent($orderedChoice) : '<span class="muted-empty">Unknown choice.</span>' !!}</div>
                                                        </div>
                                                    @empty
                                                        <p class="muted-empty">No ordered answer submitted.</p>
                                                    @endforelse
                                                </div>
                                            @elseif($question->type_question_id == 11)
                                                @if($studentRecordUrl)
                                                    <div class="audio-card">
                                                        <span class="audio-card__label">Recorded Answer</span>
                                                        <audio controls class="audio-player">
                                                            <source src="{{ $studentRecordUrl }}">
                                                        </audio>
                                                    </div>
                                                @else
                                                    <p class="muted-empty">No recording submitted.</p>
                                                @endif
                                            @elseif($question->type_question_id == 12)
                                                @php
                                                    $studentFillAnswers = $normalizeAnswerList($studentAnswerRaw);
                                                @endphp
                                                <div class="answer-list">
                                                    @forelse($studentFillAnswers as $fillAnswer)
                                                        <div class="answer-fill-item">
                                                            <span class="answer-fill-item__index">{{ $loop->iteration }}</span>
                                                            <div class="rich-copy">{{ $fillAnswer }}</div>
                                                        </div>
                                                    @empty
                                                        <p class="muted-empty">No fill-in answers submitted.</p>
                                                    @endforelse
                                                </div>
                                            @elseif($question->type_question_id == 13)
                                                @if(trim((string) $studentAnswerRaw) !== '')
                                                    <div class="rich-copy">{{ $studentAnswerRaw }}</div>
                                                @else
                                                    <p class="muted-empty">No ordered sentence submitted.</p>
                                                @endif
                                            @else
                                                <p class="muted-empty">This question type is not supported in test reader correction.</p>
                                            @endif
                                        </section>

                                        @if($question->type_question_id != 1)
                                            <section class="answer-panel answer-panel--correct">
                                                <div class="mb-4 flex items-center justify-between gap-3">
                                                    <span class="panel-kicker panel-kicker--correct">Correct Answer</span>
                                                </div>

                                                @if($question->type_question_id == 5)
                                                    <div class="answer-list">
                                                        @foreach($question->choices as $choiceIndex => $choice)
                                                            <div class="answer-pair">
                                                                <span class="answer-pair__index">{{ $choiceIndex + 1 }}</span>
                                                                <div class="min-w-0">
                                                                    <p class="mb-2 font-bold">{!! $choice->choice !!}</p>
                                                                    <div class="rich-copy">{!! $choice->answer !!}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($question->type_question_id == 9)
                                                    <div class="answer-list">
                                                        @foreach($question->choices as $choice)
                                                            <div class="answer-order-item">
                                                                <span class="answer-order-item__index">{{ $loop->iteration }}</span>
                                                                <div class="rich-copy">{!! $choice->choice !!}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @elseif($question->type_question_id == 12)
                                                    @php
                                                        $correctFillAnswers = $normalizeAnswerList($question->correctResponse ?? null);
                                                    @endphp
                                                    <div class="answer-list">
                                                        @forelse($correctFillAnswers as $fillAnswer)
                                                            <div class="answer-fill-item">
                                                                <span class="answer-fill-item__index">{{ $loop->iteration }}</span>
                                                                <div class="rich-copy">{{ $fillAnswer }}</div>
                                                            </div>
                                                        @empty
                                                            <p class="muted-empty">No correction available.</p>
                                                        @endforelse
                                                    </div>
                                                @elseif($question->type_question_id == 10 && $hasMeaningfulHtml($correctAnswerHtml))
                                                    <div class="rich-copy">{!! $correctAnswerHtml !!}</div>
                                                @elseif($hasMeaningfulHtml($correctAnswerHtml))
                                                    <div class="rich-copy">{!! $correctAnswerHtml !!}</div>
                                                @else
                                                    <p class="muted-empty">No correction available.</p>
                                                @endif
                                            </section>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        <div class="mt-8 flex justify-between">
            <button id="prevBtn" class="btn btn-outline" type="button">Previous</button>
            <button id="nextBtn" class="btn btn-primary" type="button">Next</button>
        </div>
    </section>
</main>

<script>
    function getSteps() {
        return Array.from(document.querySelectorAll('.question-step'));
    }

    const state = {
        globalStep: 0
    };

    function updateProgress() {
        const steps = getSteps();
        const total = steps.length;
        const pct = total > 0 ? Math.round(((state.globalStep + 1) / total) * 100) : 0;
        const current = steps[state.globalStep];

        document.getElementById('progressBar').style.width = pct + '%';
        document.getElementById('progressLabel').textContent = `Progress: ${pct}%`;
        document.getElementById('questionCounter').textContent = current
            ? `Question ${current.dataset.questionNumber} of ${total}`
            : 'Question 0';
    }

    function updateNavigationButtons() {
        const steps = getSteps();
        const total = steps.length;
        document.getElementById('prevBtn').disabled = state.globalStep === 0;
        document.getElementById('nextBtn').disabled = state.globalStep >= total - 1;
    }

    function renderCurrentStep() {
        const steps = getSteps();
        const current = steps[state.globalStep];
        if (!current) return;

        steps.forEach((stepEl, idx) => {
            stepEl.classList.toggle('hidden', idx !== state.globalStep);
        });

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.classList.toggle('active', tab.dataset.section === current.dataset.section);
        });

        updateNavigationButtons();
        updateProgress();
    }

    function findFirstStepIndexForSection(sectionId) {
        return getSteps().findIndex(step => step.dataset.section === sectionId);
    }

    function init() {
        const showCorrectionBtn = document.getElementById('showCorrectionBtn');
        const correctionInterface = document.getElementById('correctionInterface');
        const progressArea = document.getElementById('progressArea');

        document.querySelectorAll('audio').forEach(audio => {
            audio.playbackRate = 1;
            audio.defaultPlaybackRate = 1;
            audio.addEventListener('ratechange', () => {
                if (audio.playbackRate !== 1) {
                    audio.playbackRate = 1;
                }
            });
        });

        document.querySelectorAll('.section-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                const targetStep = findFirstStepIndexForSection(tab.dataset.section);
                if (targetStep < 0) return;
                state.globalStep = targetStep;
                renderCurrentStep();
            });
        });

        if (showCorrectionBtn && correctionInterface && progressArea) {
            showCorrectionBtn.addEventListener('click', () => {
                correctionInterface.classList.remove('hidden');
                progressArea.classList.remove('hidden');
                showCorrectionBtn.disabled = true;
                showCorrectionBtn.textContent = 'Correction Opened';
                correctionInterface.scrollIntoView({ behavior: 'smooth', block: 'start' });
                renderCurrentStep();
            });
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            if (state.globalStep > 0) {
                state.globalStep--;
                renderCurrentStep();
            }
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            const total = getSteps().length;
            if (state.globalStep < total - 1) {
                state.globalStep++;
                renderCurrentStep();
            }
        });

        renderCurrentStep();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
</script>
</body>
</html>
