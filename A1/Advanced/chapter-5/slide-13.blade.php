@php
    $content = [
        'page_title' => 'Practice 6',
        'title' => 'Practice 6',
        'subtitle' => 'Drag and drop the sentences into their correct order',
        'desktop_layout_breakpoint' => 1024,

        'tile_class' => '!px-0.5 !py-0.5 !text-[11px] !min-h-[28px] sm:!px-2 sm:!py-1 sm:!text-sm sm:!min-h-[36px]',
        'word_bank_panel_class' => 'lg:max-h-[calc(100vh-7rem)]',
        'pool_content_class' => 'lg:max-h-[calc(100vh-15rem)] lg:overflow-y-auto lg:pr-1 lg:pb-3',
        'writing_title' => 'Write 3 questions you ask at the ticket booth. You can use the examples below',
        'writing_subtitle' => 'Example:',
        'writing_examples' => [
            'What time does the bus leave?',
            'How much is the ticket?',
        ],
        'writing_input_count' => 3,

        'sentences' => [
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-sky-500 to-cyan-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(14,165,233,.24)]\">1</span> {{1}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">2</span> {{2}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-emerald-500 to-teal-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(16,185,129,.24)]\">3</span> {{3}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(245,158,11,.24)]\">4</span> {{4}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-rose-500 to-pink-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(244,63,94,.24)]\">5</span> {{5}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.24)]\">6</span> {{6}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-lime-500 to-green-400 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(132,204,22,.24)]\">7</span> {{7}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(239,68,68,.24)]\">8</span> {{8}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(6,182,212,.24)]\">9</span> {{9}}",
            "<span class=\"inline-flex items-center rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 px-3 py-1 text-sm font-black text-white shadow-[0_10px_24px_rgba(168,85,247,.24)]\">10</span> {{10}}",
        ],

        'answers' => [
            'Can I help you?',
            "I'd like a bus ticket to Summerwell, please.",
            'Sure. Only one ticket?',
            'Yes, one ticket for me. How much is it?',
            "That’s four pounds, please.",
            'Here you are.',
            "And here’s your ticket.",
            'Thanks. What time does the bus leave?',
            'It leaves in ten minutes. Hurry up!', 
            'Oh, thank you! Goodbye!',
        ],
    ];
@endphp

@php
    $content = is_array($content ?? null) ? $content : [];

    $escapeHtml = function ($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    };

    $normalizeAnswer = function ($value) {
        $value = (string) $value;
        $value = preg_replace('/\s+/u', ' ', $value);
        $value = trim($value);
        return mb_strtolower($value);
    };

    $normalizeAnswerExact = function ($value) {
        $value = (string) $value;
        $value = preg_replace('/\s+/u', ' ', $value);
        return trim($value);
    };

    $sentences = array_values($content['sentences'] ?? []);
    $answers = array_values($content['answers'] ?? []);
    $lines = array_values($content['lines'] ?? []);
    $bank = array_values($content['bank'] ?? []);
    $speakers = array_values($content['speakers'] ?? []);
    $speakerAnswersMap = $content['speaker_answers'] ?? [];

    $sentenceItems = [];
    $speakerItems = [];
    $answersForJs = [];
    $answerTexts = [];

    $isClassicSentenceMode = !empty($sentences) && !empty($answers);
    $isDialogueBankMode = !$isClassicSentenceMode && !empty($lines) && !empty($bank);
    $isSpeakerMatchingMode = !$isClassicSentenceMode && !$isDialogueBankMode && !empty($speakers) && !empty($bank) && !empty($speakerAnswersMap);

    if ($isClassicSentenceMode) {
        $placeholderPattern = '/\{\{(\d+)\}\}/';

        foreach ($sentences as $sentence) {
            $parts = preg_split($placeholderPattern, (string) $sentence, -1, PREG_SPLIT_DELIM_CAPTURE);
            $tokens = [];

            foreach ($parts as $partIndex => $part) {
                if ($partIndex % 2 === 0) {
                    if ($part !== '') {
                        $tokens[] = [
                            'type' => 'html',
                            'value' => $part,
                        ];
                    }
                    continue;
                }

                $answerIndex = (int) $part;
                $answerText = isset($answers[$answerIndex - 1]) ? (string) $answers[$answerIndex - 1] : '';

                $tokens[] = [
                    'type' => 'blank',
                    'id' => 'blank_' . $answerIndex,
                    'answer' => $answerText,
                    'answer_index' => $answerIndex,
                ];
            }

            $sentenceItems[] = [
                'tokens' => $tokens,
            ];
        }

        foreach ($answers as $answerIndex => $answer) {
            $answerText = (string) $answer;
            $answersForJs[] = [
                'id' => 'answer_' . ($answerIndex + 1),
                'text' => $answerText,
                'answerIndex' => $answerIndex + 1,
            ];
            $answerTexts[] = $answerText;
        }
    }

    if ($isDialogueBankMode || $isSpeakerMatchingMode) {
        $answerIndexExactMap = [];
        $answerIndexMap = [];
        $answerVariantCounts = [];

        foreach ($bank as $index => $bankItem) {
            $answerText = is_array($bankItem)
                ? (string) ($bankItem['answer'] ?? $bankItem['text'] ?? '')
                : (string) $bankItem;

            $answerIndex = $index + 1;

            $answersForJs[] = [
                'id' => 'answer_' . $answerIndex,
                'text' => $answerText,
                'answerIndex' => $answerIndex,
            ];

            if (!isset($answerIndexExactMap[$normalizeAnswerExact($answerText)])) {
                $answerIndexExactMap[$normalizeAnswerExact($answerText)] = $answerIndex;
            }

            $normalizedAnswer = $normalizeAnswer($answerText);
            $answerVariantCounts[$normalizedAnswer] = ($answerVariantCounts[$normalizedAnswer] ?? 0) + 1;

            if (!isset($answerIndexMap[$normalizeAnswer($answerText)])) {
                $answerIndexMap[$normalizeAnswer($answerText)] = $answerIndex;
            }

            $answerTexts[] = $answerText;
        }
    }

    if ($isDialogueBankMode) {
        $placeholderPattern = '/\[\[(.*?)\]\]/';

        foreach ($lines as $lineIndex => $line) {
            $speaker = is_array($line) ? (string) ($line['speaker'] ?? '') : '';
            $speakerClass = is_array($line) ? trim((string) ($line['speaker_class'] ?? '')) : '';
            $text = is_array($line) ? (string) ($line['text'] ?? '') : (string) $line;

            $tokens = [];

            if ($speaker !== '') {
                $speakerClasses = $speakerClass !== '' ? $speakerClass : 'text-indigo-600 dark:text-indigo-400';
                $tokens[] = [
                    'type' => 'html',
                    'value' => "<strong class=\"{$escapeHtml($speakerClasses)}\">{$escapeHtml($speaker)}:</strong> ",
                ];
            }

            $parts = preg_split($placeholderPattern, $text, -1, PREG_SPLIT_DELIM_CAPTURE);

            foreach ($parts as $partIndex => $part) {
                if ($partIndex % 2 === 0) {
                    if ($part !== '') {
                        $tokens[] = [
                            'type' => 'html',
                            'value' => $escapeHtml($part),
                        ];
                    }
                    continue;
                }

                $answerText = trim((string) $part);
                $exactAnswerKey = $normalizeAnswerExact($answerText);
                $normalizedAnswer = $normalizeAnswer($answerText);
                $answerIndex = $answerIndexExactMap[$exactAnswerKey]
                    ?? (($answerVariantCounts[$normalizedAnswer] ?? 0) === 1
                        ? ($answerIndexMap[$normalizedAnswer] ?? 0)
                        : 0);

                $tokens[] = [
                    'type' => 'blank',
                    'id' => 'blank_' . ($lineIndex + 1) . '_' . $partIndex,
                    'answer' => $answerText,
                    'answer_index' => $answerIndex,
                ];
            }

            $sentenceItems[] = [
                'tokens' => $tokens,
            ];
        }
    }

    if ($isSpeakerMatchingMode) {
        $speakerSportPlaceholder = (string) ($content['speaker_sport_placeholder'] ?? 'Sport');
        $speakerHobbyPlaceholder = (string) ($content['speaker_hobby_placeholder'] ?? 'Hobby');

        foreach ($speakers as $speakerIndex => $speaker) {
            $speakerKey = 'speaker' . ($speakerIndex + 1);
            $speakerPair = $speakerAnswersMap[$speakerKey] ?? ['', ''];

            $sportAnswer = (string) ($speakerPair[0] ?? '');
            $hobbyAnswer = (string) ($speakerPair[1] ?? '');

            $speakerItems[] = [
                'label' => (string) ($speaker['label'] ?? ('Speaker ' . ($speakerIndex + 1) . ':')),
                'sport_id' => (string) ($speaker['sport_id'] ?? ('speaker' . ($speakerIndex + 1) . 'Sport')),
                'hobby_id' => (string) ($speaker['hobby_id'] ?? ('speaker' . ($speakerIndex + 1) . 'Hobby')),
                'sport_placeholder' => (string) ($speaker['sport_placeholder'] ?? $speakerSportPlaceholder),
                'hobby_placeholder' => (string) ($speaker['hobby_placeholder'] ?? $speakerHobbyPlaceholder),
                'sport_answer' => $sportAnswer,
                'hobby_answer' => $hobbyAnswer,
                'sport_answer_index' => $answerIndexExactMap[$normalizeAnswerExact($sportAnswer)]
                    ?? ((($answerVariantCounts[$normalizeAnswer($sportAnswer)] ?? 0) === 1)
                        ? ($answerIndexMap[$normalizeAnswer($sportAnswer)] ?? 0)
                        : 0),
                'hobby_answer_index' => $answerIndexExactMap[$normalizeAnswerExact($hobbyAnswer)]
                    ?? ((($answerVariantCounts[$normalizeAnswer($hobbyAnswer)] ?? 0) === 1)
                        ? ($answerIndexMap[$normalizeAnswer($hobbyAnswer)] ?? 0)
                        : 0),
            ];
        }
    }

    $estimateBlankWidth = function ($texts) {
        $maxLen = 0;

        foreach ($texts as $text) {
            $len = mb_strlen((string) $text);
            if ($len > $maxLen) {
                $maxLen = $len;
            }
        }

        $px = max(82, (int) round($maxLen * 9 + 30));
        return $px . 'px';
    };

    $globalBlankWidth = $estimateBlankWidth($answerTexts);
    $baseBlankWidth = max(68, (int) round(((int) rtrim($globalBlankWidth, 'px')) * 0.78));
    $mobileBlankWidth = max(34, (int) round($baseBlankWidth * 0.5));
    $tabletBlankWidth = max(46, (int) round($baseBlankWidth * 0.68));
    $desktopBlankWidth = max(58, (int) round($baseBlankWidth * 0.82));

    $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
    $rawScript = $content['script'] ?? [];
    $scriptLines = is_array($rawScript)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
            static fn ($line) => $line !== ''
        ));
    $hasScript = $scriptLines !== [];
    $dialogueCardClass = trim((string) ($content['dialogue_card_class'] ?? 'w-full'));
    $sentenceContainerClass = trim((string) ($content['sentence_container_class'] ?? 'w-full max-w-full'));
    $sentenceLineClass = trim((string) ($content['sentence_line_class'] ?? ''));
    $tileClass = trim((string) ($content['tile_class'] ?? ''));
    $wordBankPanelClass = trim((string) ($content['word_bank_panel_class'] ?? ''));
    $poolContentClass = trim((string) ($content['pool_content_class'] ?? ''));
    $subtitleBubble = trim((string) ($content['subtitle_bubble'] ?? ''));
    $desktopLayoutBreakpoint = max(0, (int) ($content['desktop_layout_breakpoint'] ?? 1280));
    $writingTitle = trim((string) ($content['writing_title'] ?? ''));
    $writingSubtitle = trim((string) ($content['writing_subtitle'] ?? ''));
    $writingExamples = array_values(array_filter(
        array_map(static fn ($example) => trim((string) $example), $content['writing_examples'] ?? []),
        static fn ($example) => $example !== ''
    ));
    $writingInputCount = max(0, (int) ($content['writing_input_count'] ?? 0));
@endphp

@extends('slider.simple-layout')

@section("style")
    <style>
        @keyframes popIn {
            0% { transform: scale(.96); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0%,100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        @keyframes glowBlank {
            0%,100% { box-shadow: 0 0 0 0 rgba(99,102,241,.16); }
            50% { box-shadow: 0 0 0 8px rgba(99,102,241,0); }
        }

        @keyframes riseFade {
            0% { transform: translateY(0) scale(.8) rotate(0deg); opacity: 0; }
            15% { opacity: 1; }
            100% { transform: translateY(-34px) scale(1.12) rotate(10deg); opacity: 0; }
        }

        #dragDropBlanksGame {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            -webkit-user-select: none;
            user-select: none;
        }

        .game-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, opacity .2s ease;
        }

        .ddb-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: #fff;
            border: 1px solid rgba(255,255,255,.2);
            background: linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow: 0 10px 24px rgba(79,70,229,.10);
            transition: transform .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .game-btn:hover,
        .ddb-btn-primary:hover {
            transform: scale(1.05);
        }

        .game-btn:active,
        .ddb-btn-primary:active {
            transform: scale(.98);
        }

        .ddb-btn-reveal {
            color: rgb(154 52 18);
            border-color: rgb(253 186 116);
            background: rgb(255 237 213);
            box-shadow: 0 8px 22px rgba(234,88,12,.10);
        }

        .ddb-btn-reveal:hover {
            background: rgb(254 215 170);
            box-shadow: 0 10px 24px rgba(234,88,12,.14);
        }

        .ddb-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border-radius: .5rem;
            padding: .375rem .75rem;
            font-size: .75rem;
            font-weight: 900;
            color: rgb(15 23 42);
            border: 1px solid rgb(226 232 240);
            background: #fff;
            box-shadow: 0 8px 22px rgba(2,6,23,.05);
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease;
        }

        .ddb-btn-secondary:hover {
            transform: scale(1.05);
            background: rgb(248 250 252);
        }

        .ddb-btn-secondary:active {
            transform: scale(.98);
        }

        .dark .ddb-btn-secondary {
            color: #fff;
            border-color: rgb(51 65 85);
            background: rgb(30 41 59);
        }

        .dark .ddb-btn-secondary:hover {
            background: rgb(51 65 85);
        }

        .dark .ddb-btn-reveal {
            color: rgb(254 215 170);
            border-color: rgba(194, 65, 12, .45);
            background: rgba(154, 52, 18, .35);
        }

        .dark .ddb-btn-reveal:hover {
            background: rgba(154, 52, 18, .5);
        }

        @media (max-width: 639.98px) {
            .ddb-btn-primary,
            .ddb-btn-secondary {
                gap: .25rem;
                padding: .3rem .45rem;
                font-size: .64rem;
                line-height: 1;
                white-space: nowrap;
            }
        }

        .ddb-dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .ddb-returning {
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index: 9000;
        }

        .ddb-shake { animation: shake .35s ease-in-out; }
        .ddb-locked { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); }

        .ddb-emoji-burst {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            font-size: 1rem;
            animation: riseFade .7s ease forwards;
            z-index: 20;
        }

        .ddb-blank-slot.ddb-slot-ready {
            animation: glowBlank 1.8s infinite;
        }

        .ddb-blank-slot[data-placeholder]:empty::before {
            content: attr(data-placeholder);
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: rgba(100, 116, 139, .88);
            pointer-events: none;
        }

        .dark .ddb-blank-slot[data-placeholder]:empty::before {
            color: rgba(148, 163, 184, .95);
        }

        #ddbPoolContent {
            align-content: start;
        }

        #ddbPoolRail {
            order: -1;
            width: 100%;
            max-width: 100%;
            flex: 0 0 auto;
        }

        #ddbPoolBar {
            position: relative;
            width: 100%;
            max-width: 100%;
            padding: 0;
        }

        #ddbPoolRail.ddb-pool-fixed {
            min-height: var(--ddb-pool-height, 0px);
        }

        #ddbPoolRail.ddb-pool-fixed #ddbPoolBar {
            position: fixed;
            top: var(--ddb-pool-top, .5rem);
            left: var(--ddb-pool-left, 0px);
            width: var(--ddb-pool-width, 100%);
            z-index: 1500;
        }

        @media (max-width: 1279.98px) {
            #ddbWordBankPanel {
                max-height: none;
            }

            #ddbPoolContent {
                max-height: none;
                overflow-y: visible;
                overflow-x: visible;
                padding-bottom: .9rem;
                padding-right: 0;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .ddb-returning,
            .ddb-shake,
            .ddb-locked,
            .ddb-emoji-burst,
            .ddb-blank-slot.ddb-slot-ready {
                animation: none !important;
                transition: none !important;
            }
        }

        .ddb-subtitle-bubble {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            max-width: min(100%, 42rem);
            margin: .15rem auto 0;
            padding: .72rem 1rem;
            border-radius: 1.25rem;
            border: 1px solid rgba(99, 102, 241, .14);
            background:
                    linear-gradient(180deg, rgba(255,255,255,.96), rgba(239,246,255,.92));
            box-shadow: 0 14px 34px -24px rgba(37,99,235,.4);
            font-size: .95rem;
            line-height: 1.4;
            font-weight: 800;
            color: #1e3a8a;
            text-align: center;
        }

        .dark .ddb-subtitle-bubble {
            border-color: rgba(129, 140, 248, .24);
            background:
                    linear-gradient(180deg, rgba(30,41,59,.92), rgba(15,23,42,.94));
            color: #dbeafe;
            box-shadow: 0 18px 38px -26px rgba(59,130,246,.38);
        }

        @media (min-width: 640px) {
            .ddb-subtitle-bubble {
                padding: .82rem 1.25rem;
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section("content")
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center" id="dragDropBlanksGame">
        @include('slider.components.title-subtitle')

        @include('slider.components.game-status')

        <div id="ddbLayoutShell" class="mx-auto flex w-full flex-none min-h-0 flex-col gap-3 px-4 pt-2 pb-4 sm:gap-4 sm:px-6 sm:pt-3 sm:pb-5 lg:px-8 xl:pt-2">
            <section id="ddbGameColumn" class="w-full flex flex-col">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 auto-rows-max">
                    <div class="mx-auto w-full max-w-5xl">
                        <div id="ddbDialogueCard"
                             class="relative isolate {{ $dialogueCardClass }} text-left overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible mb-4">
                            <div id="ddbDialogueInner" class="relative z-[1] px-3 py-3 sm:px-4 sm:py-3.5 lg:overflow-visible">
                                <div class="space-y-3 sm:space-y-4">
                                    @include('slider.components.audio-player')

                                    <div class="ddb-game-section w-full rounded-[1.2rem]">
                                        @if($isSpeakerMatchingMode)
                                            <div class="space-y-3">
                                                @foreach($speakerItems as $speaker)
                                                    <div class="rounded-[1.2rem] border border-slate-200/70 bg-white/70 px-3 py-3 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/25">
                                                        <div class="grid gap-3 lg:grid-cols-[170px_minmax(0,1fr)] lg:items-center">
                                                            <div class="flex items-center gap-2.5">
                                                                <div class="grid h-9 w-9 place-items-center rounded-xl border border-slate-200/70 bg-white/80 text-sm shadow-sm dark:border-slate-700/60 dark:bg-slate-900/30 shrink-0">
                                                                    🎙️
                                                                </div>

                                                                <div class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                                                    {{ $speaker['label'] }}
                                                                </div>
                                                            </div>

                                                            <div class="grid gap-2.5 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] sm:items-center">
                                                                <span
                                                                        id="{{ $speaker['sport_id'] }}"
                                                                        class="ddb-blank-slot ddb-slot-ready inline-flex min-h-[48px] w-full items-center justify-center rounded-lg border border-dashed border-slate-300/90 bg-white/70 px-3 py-2 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                        style="min-width:{{ $mobileBlankWidth }}px;"
                                                                        data-initial-min-width-mobile="{{ $mobileBlankWidth }}px"
                                                                        data-initial-min-width-sm="{{ $tabletBlankWidth }}px"
                                                                        data-initial-min-width-lg="{{ $desktopBlankWidth }}px"
                                                                        data-blank="{{ $speaker['sport_id'] }}"
                                                                        data-answer-index="{{ $speaker['sport_answer_index'] }}"
                                                                        data-accept="{{ $speaker['sport_answer'] }}"
                                                                        data-placeholder="{{ $speaker['sport_placeholder'] }}"
                                                                ></span>

                                                                <div class="hidden sm:flex items-center justify-center text-[10px] font-black uppercase tracking-[0.16em] text-slate-400 dark:text-slate-500">
                                                                    and
                                                                </div>

                                                                <span
                                                                        id="{{ $speaker['hobby_id'] }}"
                                                                        class="ddb-blank-slot ddb-slot-ready inline-flex min-h-[48px] w-full items-center justify-center rounded-lg border border-dashed border-slate-300/90 bg-white/70 px-3 py-2 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                        style="min-width:{{ $mobileBlankWidth }}px;"
                                                                        data-initial-min-width-mobile="{{ $mobileBlankWidth }}px"
                                                                        data-initial-min-width-sm="{{ $tabletBlankWidth }}px"
                                                                        data-initial-min-width-lg="{{ $desktopBlankWidth }}px"
                                                                        data-blank="{{ $speaker['hobby_id'] }}"
                                                                        data-answer-index="{{ $speaker['hobby_answer_index'] }}"
                                                                        data-accept="{{ $speaker['hobby_answer'] }}"
                                                                        data-placeholder="{{ $speaker['hobby_placeholder'] }}"
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="grid gap-4 lg:grid-cols-2 lg:items-start">
                                                <div class="rounded-[1.2rem] border border-slate-200/70 bg-white/70 px-3 py-3 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/25">
                                                    <div class="flex flex-col gap-0">
                                                        @foreach($sentenceItems as $item)
                                                            <div class="{{ $sentenceContainerClass }}">
                                                                <div class="ddb-sentence-line {{ $sentenceLineClass }} flex w-full max-w-full items-stretch gap-2 px-1.5 py-0.5 text-base font-semibold leading-[1.45] text-slate-900 sm:gap-3 sm:text-lg lg:text-[1.15rem] dark:text-slate-100">
                                                                    @foreach($item['tokens'] as $token)
                                                                        @if($token['type'] === 'html')
                                                                            <span class="inline-flex shrink-0 items-center">{!! $token['value'] !!}</span>
                                                                        @else
                                                                            <span
                                                                                    class="ddb-blank-slot ddb-slot-ready inline-flex min-h-[50px] w-full flex-1 items-center justify-center rounded-xl border border-dashed border-slate-300/90 bg-white/70 px-2 py-2 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                                    style="min-width:0;"
                                                                                    data-initial-min-width-mobile="{{ $mobileBlankWidth }}px"
                                                                                    data-initial-min-width-sm="{{ $tabletBlankWidth }}px"
                                                                                    data-initial-min-width-lg="{{ $desktopBlankWidth }}px"
                                                                                    data-blank="{{ $token['id'] }}"
                                                                                    data-answer-index="{{ $token['answer_index'] }}"
                                                                                    data-accept="{{ $token['answer'] }}"
                                                                                    data-width-mode="full"
                                                                            ></span>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="rounded-[1.2rem] border border-slate-200/80 bg-gradient-to-br from-stone-50 via-white to-slate-100 px-4 py-4 shadow-sm dark:border-slate-700/70 dark:bg-gradient-to-br dark:from-slate-900 dark:via-slate-900 dark:to-slate-800">
                                                    @if($writingTitle !== '')
                                                        <h3 class="text-base font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-lg">
                                                            {{ $writingTitle }}
                                                        </h3>
                                                    @endif

                                                    @if($writingSubtitle !== '' || !empty($writingExamples))
                                                        <div class="mt-3 rounded-2xl border border-slate-200/80 bg-white/85 px-3 py-3 text-sm leading-6 text-slate-700 shadow-inner dark:border-slate-700/70 dark:bg-slate-950/70 dark:text-slate-200">
                                                            @if($writingSubtitle !== '')
                                                                <p class="font-black text-slate-800 dark:text-slate-100">{{ $writingSubtitle }}</p>
                                                            @endif

                                                            @foreach($writingExamples as $example)
                                                                <p>{{ $example }}</p>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                    @if($writingInputCount > 0)
                                                        <div class="mt-4 space-y-3">
                                                            @foreach(range(1, $writingInputCount) as $inputIndex)
                                                                <input
                                                                    type="text"
                                                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm outline-none transition focus:border-slate-400 focus:ring-2 focus:ring-slate-200 dark:border-slate-600 dark:bg-slate-950/90 dark:text-slate-100 dark:focus:border-slate-500 dark:focus:ring-slate-500/20"
                                                                >
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('slider.components.game-win-modal')

                    <template id="ddbTileTpl">
                        <div
                                class="ddb-draggable-item {{ $tileClass }} select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-base inline-flex min-h-[42px] w-auto max-w-full shrink-0 items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="ddbPoolRail">
                <div id="ddbPoolBar">
                    <div class="mx-auto w-full max-w-6xl px-0 pb-0">
                        <div id="ddbWordBankPanel"
                             class="relative overflow-hidden rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_18px_45px_rgba(2,6,23,0.10)] dark:border-slate-700/60 dark:bg-slate-950/75 {{ $wordBankPanelClass }}">
                            <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                            <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 xl:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-1.5 sm:gap-2">
                                    <div class="flex shrink-0 items-center gap-1 sm:gap-2">
                                        <button id="ddbPrevWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8 xl:hidden" aria-label="Previous words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div id="ddbPoolCount" class="inline-flex items-center gap-1 rounded-full border border-slate-200/70 bg-white/80 px-2 py-1 text-[10px] font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100 sm:gap-1.5 sm:px-3 sm:py-1.5 sm:text-xs">
                                            0/0
                                        </div>

                                        <button id="ddbNextWordsBtn" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] sm:h-8 sm:w-8 xl:hidden" aria-label="Next words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex shrink-0 items-center justify-end gap-1 sm:gap-2">
                                        <button
                                                type="button"
                                                id="ddbCheckAnswersBtn"
                                                class="ddb-btn-primary disabled:cursor-not-allowed disabled:opacity-40"
                                        >
                                            <span class="sm:hidden">Check</span>
                                            <span class="hidden sm:inline">Check answers</span>
                                        </button>

                                        <button
                                                type="button"
                                                id="ddbRevealAnswersBtn"
                                                class="ddb-btn-primary ddb-btn-reveal"
                                        >
                                            <span class="sm:hidden">Reveal</span>
                                            <span class="hidden sm:inline">Reveal answers</span>
                                        </button>

                                        <button
                                                type="button"
                                                id="ddbRetakeTestBtn"
                                                class="ddb-btn-secondary hidden"
                                        >
                                            <span class="sm:hidden">Retake</span>
                                            <span class="hidden sm:inline">Retake test</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                <div class="relative mt-3">
                                    <div id="ddbPoolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 xl:w-full {{ $poolContentClass }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section("script")
    <script>
        (function () {
            var ANSWERS = @json($answersForJs);
            var IS_SPEAKER_MATCHING_MODE = @json($isSpeakerMatchingMode);
            var DESKTOP_LAYOUT_BREAKPOINT = Number(@json($desktopLayoutBreakpoint));

            var SFX = {
                enabled: true,
                sources: {
                    correct: @json($content['sfx']['correct'] ?? '/slider/sounds/correct.wav'),
                    wrong: @json($content['sfx']['wrong'] ?? '/slider/sounds/wrong.wav'),
                    success: @json($content['sfx']['success'] ?? '/slider/sounds/success.wav')
                },
                volume: { correct: 1, wrong: 1, success: 1 }
            };

            var audio = {
                correct: new Audio(SFX.sources.correct),
                wrong: new Audio(SFX.sources.wrong),
                success: new Audio(SFX.sources.success)
            };

            function clamp01(v){
                v = Number(v);
                if (!Number.isFinite(v)) return 0.5;
                return Math.max(0, Math.min(1, v));
            }

            function applyVolumes(){
                audio.correct.volume = clamp01(SFX.volume.correct);
                audio.wrong.volume = clamp01(SFX.volume.wrong);
                audio.success.volume = clamp01(SFX.volume.success);
            }
            applyVolumes();

            function play(sound){
                if (!SFX.enabled || !sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(function(){});
            }

            function playCorrect(){ play(audio.correct); }
            function playWrong(){ play(audio.wrong); }
            function playWin(){ play(audio.success); }

            function isEmbedded(){
                try { return window.top !== window.self; }
                catch(e){ return true; }
            }

            window.dragDropBlanksGoNext = function () {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.nextSlide === "function") {
                            window.parent.nextSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
                        return;
                    } catch (e) {}
                }
            };

            window.stopSlideAudio = function(){
                Object.keys(audio).forEach(function(key){
                    if (audio[key]) {
                        audio[key].pause();
                        audio[key].currentTime = 0;
                    }
                });

                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
            };

            function getInitialBlankMinWidth(blank){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1280) return blank.dataset.initialMinWidthLg || blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                if (w >= 640) return blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                return blank.dataset.initialMinWidthMobile || '';
            }

            function normalizeAnswerText(value){
                return String(value || '').replace(/\s+/g, ' ').trim();
            }

            function DragDropBlanksGame(){
                this.layoutShell = document.getElementById('ddbLayoutShell');
                this.poolContent = document.getElementById('ddbPoolContent');
                this.poolCount = document.getElementById('ddbPoolCount');
                this.winModal = document.getElementById('winModal');
                this.tileTpl = document.getElementById('ddbTileTpl');
                this.gameColumn = document.getElementById('ddbGameColumn');
                this.poolRail = document.getElementById('ddbPoolRail');
                this.poolBar = document.getElementById('ddbPoolBar');
                this.dialogueCard = document.getElementById('ddbDialogueCard');
                this.gameSection = document.querySelector('.ddb-game-section');
                this.prevWordsBtn = document.getElementById('ddbPrevWordsBtn');
                this.nextWordsBtn = document.getElementById('ddbNextWordsBtn');
                this.checkAnswersBtn = document.getElementById('ddbCheckAnswersBtn');
                this.revealAnswersBtn = document.getElementById('ddbRevealAnswersBtn');
                this.retakeTestBtn = document.getElementById('ddbRetakeTestBtn');
                this.restartBtnModal = document.getElementById('restartBtnModal');
                this.continueBtnModal = document.getElementById('continueBtnModal');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.hasCheckedAnswers = false;
                this.isRevealingAnswers = false;
                this.isReviewingCorrection = false;

                this._raf = null;
                this._mx = 0;
                this._my = 0;

                this.tileDeck = { all: [], active: [], waiting: [], history: [] };
                this.resizeTimer = null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handleResize = this.handleResize.bind(this);
                this.handleScroll = this.handleScroll.bind(this);
                this.showPrevWords = this.showPrevWords.bind(this);
                this.showNextWords = this.showNextWords.bind(this);
                this.handleCheckAnswers = this.handleCheckAnswers.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.burstEmojis = ['✨', '🎉', '💫', '⭐', '👏'];

                if (this.checkAnswersBtn) {
                    this.checkAnswersBtn.addEventListener('click', this.handleCheckAnswers);
                }

                if (this.revealAnswersBtn) {
                    this.revealAnswersBtn.addEventListener('click', this.handleRevealAnswers);
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.addEventListener('click', this.handleRetakeTest);
                }

                if (this.restartBtnModal) {
                    this.restartBtnModal.addEventListener('click', this.init.bind(this));
                }

                if (this.continueBtnModal) {
                    this.continueBtnModal.addEventListener('click', window.dragDropBlanksGoNext);
                }
            }

            DragDropBlanksGame.prototype.init = function(){
                var self = this;

                this.winModal.classList.add('hidden');
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.gameCompleted = false;
                this.hasUsedReveal = false;
                this.hasCheckedAnswers = false;
                this.isRevealingAnswers = false;
                this.isReviewingCorrection = false;

                clearInterval(this.timerInt);
                this.startTimer();
                this.updateStats();

                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(s){
                    s.innerHTML = '';
                    s.style.width = '';
                    s.style.minWidth = getInitialBlankMinWidth(s);
                    s.classList.add('ddb-slot-ready');
                    s.classList.remove(
                        'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                        'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                        'text-rose-700','border-rose-500/55','bg-rose-50/90',
                        'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                    );
                });

                this.poolContent.innerHTML = '';
                this.tileDeck = {
                    all: this.shuffle(ANSWERS.map(function(answer){
                        return {
                            id: answer.id,
                            text: answer.text,
                            answerIndex: answer.answerIndex
                        };
                    })),
                    active: [],
                    waiting: [],
                    history: []
                };
                this.tileDeck.waiting = this.tileDeck.all.slice();

                this.loadTiles();
                this.updatePoolCount();
                this.updateActionButtons();
                window.removeEventListener('resize', this.handleResize);
                window.addEventListener('resize', this.handleResize, { passive: true });

                window.removeEventListener('scroll', this.handleScroll);
                window.addEventListener('scroll', this.handleScroll, { passive: true });
                document.removeEventListener('scroll', this.handleScroll, true);
                document.addEventListener('scroll', this.handleScroll, { passive: true, capture: true });

                if (this.prevWordsBtn) {
                    this.prevWordsBtn.removeEventListener('click', this.showPrevWords);
                    this.prevWordsBtn.addEventListener('click', this.showPrevWords);
                }

                if (this.nextWordsBtn) {
                    this.nextWordsBtn.removeEventListener('click', this.showNextWords);
                    this.nextWordsBtn.addEventListener('click', this.showNextWords);
                }

                setTimeout(function(){
                    self.syncVisibleTileCount();
                    self.updatePoolSticky();
                }, 120);
            };

            DragDropBlanksGame.prototype.startTimer = function(){
                var self = this;

                this.timerInt = setInterval(function(){
                    self.updateTimer();
                }, 1000);

                this.updateTimer();
            };

            DragDropBlanksGame.prototype.formatElapsedTime = function(){
                var elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                var mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                var secs = String(elapsed % 60).padStart(2, '0');

                return mins + ':' + secs;
            };

            DragDropBlanksGame.prototype.updateTimer = function(){
                var timerEl = document.getElementById('gameTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            };

            DragDropBlanksGame.prototype.getFilledBlankCount = function(){
                return Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).filter(function(blank){
                    return !!blank.querySelector('.ddb-draggable-item');
                }).length;
            };

            DragDropBlanksGame.prototype.updateStats = function(){
                var progressEl = document.getElementById('tilesCount');
                var correctEl = document.getElementById('correctCount');
                var mistakesEl = document.getElementById('mistakesCount');
                var total = ANSWERS.length;
                var filled = this.getFilledBlankCount();

                if (progressEl) progressEl.textContent = filled + '/' + total;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            };

            DragDropBlanksGame.prototype.handleResize = function(){
                var self = this;
                clearTimeout(this.resizeTimer);
                this.resizeTimer = setTimeout(function(){
                    self.syncVisibleTileCount();
                    self.updatePoolSticky();
                }, 120);
            };

            DragDropBlanksGame.prototype.handleScroll = function(){
                this.updatePoolSticky();
            };

            DragDropBlanksGame.prototype.getPoolStickyTop = function(){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= DESKTOP_LAYOUT_BREAKPOINT) return 16;
                if (w >= 640) return 12;
                return 8;
            };

            DragDropBlanksGame.prototype.updatePoolSticky = function(){
                var top;
                var railRect;
                var barHeight;

                if (!this.poolRail || !this.poolBar) return;

                top = this.getPoolStickyTop();
                railRect = this.poolRail.getBoundingClientRect();
                barHeight = Math.ceil(this.poolBar.offsetHeight || 0);

                if (railRect.top > top) {
                    this.poolRail.classList.remove('ddb-pool-fixed');
                    this.poolRail.style.removeProperty('--ddb-pool-height');
                    this.poolRail.style.removeProperty('--ddb-pool-top');
                    this.poolRail.style.removeProperty('--ddb-pool-left');
                    this.poolRail.style.removeProperty('--ddb-pool-width');
                    return;
                }

                this.poolRail.style.setProperty('--ddb-pool-height', barHeight + 'px');
                this.poolRail.style.setProperty('--ddb-pool-top', top + 'px');
                this.poolRail.style.setProperty('--ddb-pool-left', Math.round(railRect.left) + 'px');
                this.poolRail.style.setProperty('--ddb-pool-width', Math.round(railRect.width) + 'px');
                this.poolRail.classList.add('ddb-pool-fixed');
            };

            DragDropBlanksGame.prototype.getVisibleWordLimit = function(){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= DESKTOP_LAYOUT_BREAKPOINT) return Number.MAX_SAFE_INTEGER;
                if (w < 640) return 5;
                return 9;
            };

            DragDropBlanksGame.prototype.createTileNode = function(itemData, index){
                var self = this;
                var node = this.tileTpl.content.firstElementChild.cloneNode(true);

                node.textContent = itemData.text;
                node.dataset.id = itemData.id;
                node.dataset.answerIndex = itemData.answerIndex;
                node.dataset.accept = itemData.text;
                node.addEventListener('pointerdown', function(e){
                    self.handlePointerDown(e, node);
                });

                this.tileSkins[index % this.tileSkins.length].split(' ').forEach(function(cls){
                    node.classList.add(cls);
                });

                return node;
            };

            DragDropBlanksGame.prototype.ensureActiveTileCount = function(){
                var deck = this.tileDeck;
                var desired = this.getVisibleWordLimit();

                if (!deck) return;

                while (deck.active.length < desired && deck.waiting.length > 0) {
                    deck.active.push(deck.waiting.shift());
                }

                while (deck.active.length > desired) {
                    deck.waiting.unshift(deck.active.pop());
                }
            };

            DragDropBlanksGame.prototype.renderActiveTiles = function(){
                var self = this;
                var deck = this.tileDeck;

                this.poolContent.innerHTML = '';
                if (!deck) return;

                deck.active.forEach(function(itemData, index){
                    var node = self.createTileNode(itemData, index);
                    self.poolContent.appendChild(node);
                });

                this.updateNavButtons();
                this.updatePoolSticky();
            };

            DragDropBlanksGame.prototype.updateNavButtons = function(){
                var deck = this.tileDeck;
                if (!deck) return;

                if (this.prevWordsBtn) this.prevWordsBtn.disabled = deck.history.length === 0;
                if (this.nextWordsBtn) this.nextWordsBtn.disabled = deck.waiting.length === 0;
            };

            DragDropBlanksGame.prototype.syncVisibleTileCount = function(){
                var deck = this.tileDeck;

                if (!deck) return;
                if (this.draggedItem) return;

                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
            };

            DragDropBlanksGame.prototype.loadTiles = function(){
                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
            };

            DragDropBlanksGame.prototype.refillPoolAfterLock = function(){
                var deck = this.tileDeck;
                if (!deck) return;

                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
            };

            DragDropBlanksGame.prototype.showNextWords = function(){
                var deck = this.tileDeck;
                var desired = this.getVisibleWordLimit();

                if (!deck || this.draggedItem || deck.waiting.length === 0) return;

                deck.history.push(deck.active.slice());

                while (deck.active.length > 0) {
                    deck.waiting.push(deck.active.shift());
                }

                while (deck.active.length < desired && deck.waiting.length > 0) {
                    deck.active.push(deck.waiting.shift());
                }

                this.renderActiveTiles();
            };

            DragDropBlanksGame.prototype.showPrevWords = function(){
                var deck = this.tileDeck;
                if (!deck || this.draggedItem || deck.history.length === 0) return;

                while (deck.active.length > 0) {
                    deck.waiting.unshift(deck.active.pop());
                }

                deck.active = deck.history.pop();
                this.renderActiveTiles();
            };

            DragDropBlanksGame.prototype.updatePoolCount = function(){
                var total = ANSWERS.length;
                var remaining = total - this.getFilledBlankCount();

                if (this.poolCount) this.poolCount.textContent = remaining + '/' + total;
            };

            DragDropBlanksGame.prototype.getRemainingTileCount = function(){
                return ANSWERS.length - this.getFilledBlankCount();
            };

            DragDropBlanksGame.prototype.updateActionButtons = function(){
                var allFilled = this.getRemainingTileCount() === 0;
                var canCheck = allFilled && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                var canReveal = !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted;
                var canRetake = this.hasUsedReveal || this.isReviewingCorrection;

                if (this.checkAnswersBtn) {
                    this.checkAnswersBtn.classList.toggle('hidden', this.hasUsedReveal || this.gameCompleted);
                    this.checkAnswersBtn.disabled = !canCheck;
                }

                if (this.revealAnswersBtn) {
                    this.revealAnswersBtn.classList.toggle('hidden', this.hasUsedReveal || this.gameCompleted);
                    this.revealAnswersBtn.disabled = !canReveal;
                }

                if (this.retakeTestBtn) {
                    this.retakeTestBtn.classList.toggle('hidden', !canRetake);
                }
            };

            DragDropBlanksGame.prototype.shuffle = function(arr){
                var a = arr.slice();
                var i, j, temp;

                for (i = a.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    temp = a[i];
                    a[i] = a[j];
                    a[j] = temp;
                }

                return a;
            };

            DragDropBlanksGame.prototype.normalizeTileForBlank = function(tile, blank){
                var shouldFillWidth = !!(blank && blank.dataset.widthMode === 'full');

                tile.classList.remove(
                    'hover:-translate-y-0.5','revealed-answer',
                    'ring-emerald-400/50','ring-emerald-400/70','ring-rose-400/70',
                    'border-rose-300','text-rose-700','dark:border-rose-900/40','dark:text-rose-200',
                    'bg-rose-500','dark:bg-rose-500','border-slate-300/70','dark:border-slate-600/40',
                    'w-fit','w-full'
                );
                tile.classList.add(
                    'ddb-locked','inline-flex','max-w-full','items-center','justify-center','text-center',
                    'px-2','py-1.5','leading-tight','rounded-lg'
                );
                tile.classList.add(shouldFillWidth ? 'w-full' : 'w-fit');
                tile.style.cursor = (this.gameCompleted || this.hasUsedReveal) ? 'default' : 'grab';
            };

            DragDropBlanksGame.prototype.setBlankState = function(blank, type){
                if (!blank) return;

                blank.classList.remove(
                    'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                    'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                    'text-rose-700','border-rose-500/55','bg-rose-50/90',
                    'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                );

                if (type === 'correct') {
                    blank.classList.add(
                        'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                        'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45'
                    );
                } else if (type === 'wrong') {
                    blank.classList.add(
                        'text-rose-700','border-rose-500/55','bg-rose-50/90',
                        'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                    );
                }
            };

            DragDropBlanksGame.prototype.setTileState = function(tile, state){
                if (!tile) return;

                tile.classList.remove(
                    'ring-emerald-400/70','ring-rose-400/70',
                    'border-rose-300','text-rose-700','dark:border-rose-900/40','dark:text-rose-200'
                );

                if (state === 'correct') {
                    tile.classList.add('ring-emerald-400/70');
                } else if (state === 'wrong') {
                    tile.classList.add(
                        'ring-rose-400/70','border-rose-300','text-rose-700',
                        'dark:border-rose-900/40','dark:text-rose-200'
                    );
                }
            };

            DragDropBlanksGame.prototype.clearCheckedFeedback = function(){
                var self = this;

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(blank){
                    self.setBlankState(blank, null);

                    if (blank.firstElementChild && blank.firstElementChild.classList.contains('ddb-draggable-item')) {
                        self.normalizeTileForBlank(blank.firstElementChild, blank);
                    }
                });

                this.correctCount = 0;
                this.hasCheckedAnswers = false;
                this.updateStats();
            };

            DragDropBlanksGame.prototype.markTileAsRevealed = function(tile, blank){
                if (!tile) return;

                tile.classList.remove(
                    'ring-emerald-400/50',
                    'bg-gradient-to-br','from-sky-500','to-blue-600',
                    'from-rose-500','to-fuchsia-600',
                    'from-emerald-500','to-teal-600',
                    'from-amber-500','to-orange-600',
                    'from-indigo-500','to-violet-600',
                    'from-cyan-500','to-sky-600'
                );
                tile.classList.add(
                    'bg-rose-500',
                    'text-white',
                    'border-slate-300/70',
                    'dark:bg-rose-500',
                    'dark:text-white',
                    'dark:border-slate-600/40',
                    'ring-slate-400/40',
                    'revealed-answer'
                );

                if (!blank) return;

                blank.classList.remove('ddb-slot-ready');
                blank.classList.remove(
                    'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                    'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                    'text-rose-700','border-rose-500/55','bg-rose-50/90',
                    'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                );
                blank.classList.add(
                    'border-slate-300/70',
                    'bg-rose-50/90',
                    'dark:border-slate-600/40',
                    'dark:bg-rose-950/30'
                );
            };

            DragDropBlanksGame.prototype.flashBlankState = function(blank, type){
                if (!blank) return;

                blank.classList.remove(
                    'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                    'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                    'text-rose-700','border-rose-500/55','bg-rose-50/90',
                    'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                );

                if (type === 'correct') {
                    blank.classList.add(
                        'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                        'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45'
                    );
                } else if (type === 'wrong') {
                    blank.classList.add(
                        'text-rose-700','border-rose-500/55','bg-rose-50/90',
                        'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                    );
                    setTimeout(function(){
                        blank.classList.remove(
                            'text-rose-700','border-rose-500/55','bg-rose-50/90',
                            'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                        );
                    }, 850);
                }
            };

            DragDropBlanksGame.prototype.handlePointerDown = function(e, item){
                var rect;

                if (this.gameCompleted || this.isRevealingAnswers || item.classList.contains('revealed-answer')) return;

                if (this.hasCheckedAnswers && !this.hasUsedReveal) {
                    this.clearCheckedFeedback();
                }

                e.preventDefault();
                if (item.setPointerCapture) item.setPointerCapture(e.pointerId);

                this.draggedItem = item;
                this.originalParent = item.parentElement;

                rect = item.getBoundingClientRect();

                this.placeholder = document.createElement('div');
                this.placeholder.className = 'rounded-xl border border-dashed border-slate-300/80 bg-slate-200/35 dark:border-slate-700/70 dark:bg-slate-800/30';
                this.placeholder.style.width = rect.width + 'px';
                this.placeholder.style.height = rect.height + 'px';
                this.originalParent.insertBefore(this.placeholder, item);

                item.classList.add('ddb-dragging');
                item.style.width = rect.width + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top = (e.clientY - this.offsetY) + 'px';
                item.style.transform = 'scale(1.05) rotate(-2deg)';

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                document.addEventListener('pointercancel', this.handlePointerUp, { passive: false });
            };

            DragDropBlanksGame.prototype.handlePointerMove = function(e){
                var self = this;

                if (!this.draggedItem) return;
                e.preventDefault();

                this._mx = e.clientX - this.offsetX;
                this._my = e.clientY - this.offsetY;

                if (!this._raf) {
                    this._raf = requestAnimationFrame(function(){
                        if (!self.draggedItem) {
                            self._raf = null;
                            return;
                        }
                        self.draggedItem.style.left = self._mx + 'px';
                        self.draggedItem.style.top = self._my + 'px';
                        self._raf = null;
                    });
                }

                this.checkHover(e.clientX, e.clientY);
            };

            DragDropBlanksGame.prototype.handlePointerUp = function(e){
                var blank;

                if (!this.draggedItem) return;

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerUp);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                blank = this.getBlankTarget(e.clientX, e.clientY);

                if (blank && blank.classList.contains('ddb-blank-slot')) {
                    this.handlePlaceDrop(blank);
                } else {
                    this.handleWrongDrop(blank, { countAsMistake: false });
                }

                this.draggedItem = null;
            };

            DragDropBlanksGame.prototype.checkHover = function(x, y){
                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(b){
                    b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                });

                var blank = this.getBlankTarget(x, y);
                if (blank) {
                    blank.classList.add('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                }
            };

            DragDropBlanksGame.prototype.getBlankTarget = function(x, y){
                var below;
                var exactBlank;
                var threshold;
                var nearestBlank = null;
                var nearestDistance = Infinity;

                this.draggedItem.hidden = true;
                below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;
                exactBlank = below.closest('.ddb-blank-slot');

                if (exactBlank) return exactBlank;

                threshold = window.innerWidth >= 1280 ? 42 : (window.innerWidth >= 640 ? 34 : 28);

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(blank){
                    var rect;
                    var dx = 0;
                    var dy = 0;
                    var distance;

                    if (blank.children.length > 0) return;

                    rect = blank.getBoundingClientRect();

                    if (x < rect.left) dx = rect.left - x;
                    else if (x > rect.right) dx = x - rect.right;

                    if (y < rect.top) dy = rect.top - y;
                    else if (y > rect.bottom) dy = y - rect.bottom;

                    distance = Math.sqrt((dx * dx) + (dy * dy));

                    if (distance <= threshold && distance < nearestDistance) {
                        nearestDistance = distance;
                        nearestBlank = blank;
                    }
                });

                return nearestBlank;
            };

            DragDropBlanksGame.prototype.spawnBurst = function(target, emojis){
                var rect = target.getBoundingClientRect();
                var host = document.body;

                if (!emojis || !emojis.length) return;

                emojis.forEach(function(emoji, i){
                    var el = document.createElement('div');
                    el.className = 'ddb-emoji-burst';
                    el.textContent = emoji;
                    el.style.left = (rect.left + rect.width / 2 + (i - 1) * 10) + 'px';
                    el.style.top = (rect.top + rect.height / 2) + 'px';
                    el.style.position = 'fixed';
                    el.style.animationDelay = (i * 0.04) + 's';
                    host.appendChild(el);

                    setTimeout(function(){
                        el.remove();
                    }, 800);
                });
            };

            DragDropBlanksGame.prototype.removeActiveTileById = function(id){
                var deck = this.tileDeck;
                if (!deck) return;

                deck.active = deck.active.filter(function(item){
                    return item.id !== id;
                });

                deck.history = deck.history.map(function(page){
                    return page.filter(function(item){
                        return item.id !== id;
                    });
                }).filter(function(page){
                    return page.length > 0;
                });

                deck.waiting = deck.waiting.filter(function(item){
                    return item.id !== id;
                });
            };

            DragDropBlanksGame.prototype.findAnswerData = function(answerIndex){
                var i;

                for (i = 0; i < ANSWERS.length; i++) {
                    if (Number(ANSWERS[i].answerIndex || 0) === Number(answerIndex || 0)) {
                        return ANSWERS[i];
                    }
                }

                return null;
            };

            DragDropBlanksGame.prototype.findBlankByAnswerIndex = function(answerIndex){
                return Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).find(function(blank){
                    return blank.children.length === 0 && Number(blank.dataset.answerIndex || 0) === Number(answerIndex || 0);
                }) || null;
            };

            DragDropBlanksGame.prototype.lockTileIntoBlank = function(item, blank, options){
                var settings = options || {};
                var widthMode = blank && blank.dataset ? blank.dataset.widthMode : '';

                if (!item || !blank) return false;

                item.classList.remove('ddb-dragging', 'ddb-returning', 'ddb-shake');
                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                blank.innerHTML = '';
                blank.appendChild(item);
                blank.style.minWidth = widthMode === 'full' ? '0px' : getInitialBlankMinWidth(blank);
                blank.style.width = widthMode === 'full' ? '100%' : (IS_SPEAKER_MATCHING_MODE ? '' : 'fit-content');
                blank.classList.remove('ddb-slot-ready');
                this.normalizeTileForBlank(item, blank);

                if (settings.revealed) {
                    this.markTileAsRevealed(item, blank);
                } else if (!settings.suppressFeedback) {
                    this.setBlankState(blank, 'correct');
                }

                if (settings.countAsCorrect) {
                    this.correctCount++;
                }

                if (settings.countAsMistake) {
                    this.mistakeCount++;
                }

                return true;
            };

            DragDropBlanksGame.prototype.handlePlaceDrop = function(blank){
                var item = this.draggedItem;
                var sourceBlank = this.originalParent && this.originalParent.classList && this.originalParent.classList.contains('ddb-blank-slot')
                    ? this.originalParent
                    : null;
                var existingItem = blank ? blank.querySelector('.ddb-draggable-item') : null;
                var tileId = item.dataset.id;

                item.classList.remove('ddb-dragging', 'ddb-shake');

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                if (this.placeholder && this.placeholder.parentNode) this.placeholder.remove();
                this.placeholder = null;

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(b){
                    b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                });

                if (blank === sourceBlank) {
                    this.lockTileIntoBlank(item, blank, { suppressFeedback: true });
                    this.updateStats();
                    this.updateActionButtons();
                    return;
                }

                if (existingItem && sourceBlank && sourceBlank !== blank) {
                    sourceBlank.innerHTML = '';
                    blank.innerHTML = '';

                    this.lockTileIntoBlank(existingItem, sourceBlank, { suppressFeedback: true });
                    this.lockTileIntoBlank(item, blank, { suppressFeedback: true });
                    this.updatePoolCount();
                    this.updateStats();
                    this.updateActionButtons();
                    return;
                }

                if (existingItem) {
                    this.handleWrongDrop(blank, { countAsMistake: false });
                    return;
                }

                this.lockTileIntoBlank(item, blank, { suppressFeedback: true });

                if (!sourceBlank) {
                    this.removeActiveTileById(tileId);
                    this.refillPoolAfterLock();
                } else {
                    this.updatePoolCount();
                }

                this.updateStats();
                this.updateActionButtons();
            };

            DragDropBlanksGame.prototype.handleWrongDrop = function(blank, options){
                var self = this;
                var item = this.draggedItem;
                var phRect;
                var settings = options || {};
                var countAsMistake = settings.countAsMistake === true;

                if (countAsMistake) {
                    playWrong();
                    this.mistakeCount++;
                    this.updateStats();
                }

                if (blank && countAsMistake) {
                    this.flashBlankState(blank, 'wrong');
                    item.classList.add('ddb-shake');
                    item.classList.add('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');

                    setTimeout(function(){
                        item.classList.remove('ddb-shake');
                        item.classList.remove('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');
                    }, 380);
                }

                item.classList.add('ddb-returning');
                item.style.transform = 'scale(1)';

                if (this.placeholder) {
                    phRect = this.placeholder.getBoundingClientRect();
                    item.style.left = phRect.left + 'px';
                    item.style.top = phRect.top + 'px';
                }

                setTimeout(function(){
                    item.classList.remove('ddb-dragging','ddb-returning');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (self.originalParent && self.placeholder) {
                        self.originalParent.insertBefore(item, self.placeholder);
                        self.placeholder.remove();
                    }
                    self.placeholder = null;

                    Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(b){
                        b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                    });
                }, 440);
            };

            DragDropBlanksGame.prototype.handleCheckAnswers = function(){
                var self = this;
                var blanks;
                var hasWrong = false;

                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;
                if (this.getRemainingTileCount() > 0) return;

                blanks = Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot'));
                this.correctCount = 0;

                blanks.forEach(function(blank){
                    var item = blank.querySelector('.ddb-draggable-item');
                    var expectedIndex = Number(blank.dataset.answerIndex || 0);
                    var gotIndex = item ? Number(item.dataset.answerIndex || 0) : 0;
                    var expectedText = normalizeAnswerText(blank.dataset.accept || '');
                    var gotText = item ? normalizeAnswerText(item.dataset.accept || item.textContent || '') : '';
                    var isCorrect = !!item && (((expectedIndex && gotIndex === expectedIndex) || (expectedText !== '' && expectedText === gotText)));

                    self.setBlankState(blank, isCorrect ? 'correct' : 'wrong');

                    if (item) {
                        self.normalizeTileForBlank(item, blank);
                        self.setTileState(item, isCorrect ? 'correct' : 'wrong');
                    }

                    if (isCorrect) {
                        self.correctCount += 1;
                    } else {
                        hasWrong = true;
                    }
                });

                this.hasCheckedAnswers = true;

                if (hasWrong) {
                    playWrong();
                    this.mistakeCount += 1;
                } else {
                    this.gameCompleted = true;
                    this.spawnBurst(this.dialogueCard || this.gameSection || document.body, this.burstEmojis.sort(function(){ return Math.random() - 0.5; }).slice(0, 3));
                    this.checkComplete();
                }

                this.updateStats();
                this.updateActionButtons();
            };

            DragDropBlanksGame.prototype.handleRevealAnswers = function(){
                var self = this;
                var blanks;

                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.hasCheckedAnswers = false;
                this.updateActionButtons();

                blanks = Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot'));

                blanks.forEach(function(blank){
                    var answerData = self.findAnswerData(blank.dataset.answerIndex);
                    var item;

                    if (!answerData) return;

                    blank.innerHTML = '';
                    self.setBlankState(blank, null);

                    item = self.createTileNode({
                        id: answerData.id,
                        text: answerData.text,
                        answerIndex: answerData.answerIndex
                    }, self.correctCount + self.mistakeCount);

                    self.lockTileIntoBlank(item, blank, {
                        revealed: true,
                        countAsMistake: false,
                        countAsCorrect: false
                    });
                });

                self.correctCount = ANSWERS.length;
                this.isRevealingAnswers = false;
                this.gameCompleted = true;
                this.poolContent.innerHTML = '';
                this.updateStats();
                this.updateActionButtons();
                this.checkComplete({ showModal: false });
            };

            DragDropBlanksGame.prototype.handleRetakeTest = function(){
                this.init();
            };

            DragDropBlanksGame.prototype.reviewCorrection = function(){
                this.isReviewingCorrection = true;
                if (this.winModal) {
                    this.winModal.classList.add('hidden');
                }
                this.updateActionButtons();
            };

            DragDropBlanksGame.prototype.checkComplete = function(options){
                options = options || {};

                var total = ANSWERS.length;
                var locked = document.querySelectorAll('.ddb-blank-slot .ddb-draggable-item.ddb-locked').length;
                var self = this;
                var shouldShowModal = options.showModal !== false;

                if (total !== locked) return;

                setTimeout(function(){
                    clearInterval(self.timerInt);
                    self.gameCompleted = true;
                    if (shouldShowModal) {
                        playWin();
                    }
                    self.poolContent.innerHTML = '';
                    if (self.poolCount) self.poolCount.textContent = '0/0';
                    self.updateNavButtons();
                    self.updateActionButtons();
                    self.updatePoolSticky();

                    if (!shouldShowModal) return;

                    var finalCorrect = document.getElementById('finalCorrect');
                    var finalTime = document.getElementById('finalTime');
                    var finalMistakes = document.getElementById('finalMistakes');

                    if (finalCorrect) finalCorrect.textContent = self.correctCount + '/' + total;
                    if (finalTime) finalTime.textContent = self.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = self.mistakeCount;

                    self.winModal.classList.remove('hidden');
                }, 260);
            };

            window.dragDropBlanksGame = new DragDropBlanksGame();

            document.addEventListener('DOMContentLoaded', function(){
                window.dragDropBlanksGame.init();
            });
        })();
    </script>
@endsection

