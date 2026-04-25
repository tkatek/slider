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
        .ddb-locked { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); pointer-events: none; }

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

        .audio-player-has-floating #ddbLayoutShell {
            padding-bottom: calc(6.25rem + env(safe-area-inset-bottom, 0px));
        }

        @media (max-width: 640px) {
            .audio-player-has-floating #ddbLayoutShell {
                padding-bottom: calc(5.5rem + env(safe-area-inset-bottom, 0px));
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
                                            <div class="flex flex-col gap-0">
                                                @foreach($sentenceItems as $item)
                                                    <div class="{{ $sentenceContainerClass }}">
                                                        <div class="ddb-sentence-line {{ $sentenceLineClass }} w-fit max-w-full px-1.5 py-0.5 text-base sm:text-lg lg:text-[1.15rem] font-semibold leading-[1.45] text-slate-900 dark:text-slate-100 !leading-[2.25] sm:!leading-[2.35]">
                                                            @foreach($item['tokens'] as $token)
                                                                @if($token['type'] === 'html')
                                                                    <span>{!! $token['value'] !!}</span>
                                                                @else
                                                                    <span
                                                                            class="ddb-blank-slot ddb-slot-ready inline-flex align-middle mx-1 rounded-lg border border-dashed border-slate-300/90 bg-white/70 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                            style="min-width:{{ $mobileBlankWidth }}px; min-height:28px;"
                                                                            data-initial-min-width-mobile="{{ $mobileBlankWidth }}px"
                                                                            data-initial-min-width-sm="{{ $tabletBlankWidth }}px"
                                                                            data-initial-min-width-lg="{{ $desktopBlankWidth }}px"
                                                                            data-blank="{{ $token['id'] }}"
                                                                            data-answer-index="{{ $token['answer_index'] }}"
                                                                            data-accept="{{ $token['answer'] }}"
                                                                    ></span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
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

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <button id="ddbPrevWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] xl:hidden" aria-label="Previous words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div id="ddbPoolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                            0/0
                                        </div>

                                        <button id="ddbNextWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] xl:hidden" aria-label="Next words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                                type="button"
                                                id="ddbRevealAnswersBtn"
                                                class="ddb-btn-primary ddb-btn-reveal"
                                        >
                                            Reveal answers
                                        </button>

                                        <button
                                                type="button"
                                                id="ddbRetakeTestBtn"
                                                class="ddb-btn-secondary hidden"
                                        >
                                            Retake test
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

            DragDropBlanksGame.prototype.updateStats = function(){
                var progressEl = document.getElementById('tilesCount');
                var correctEl = document.getElementById('correctCount');
                var mistakesEl = document.getElementById('mistakesCount');
                var total = ANSWERS.length;

                if (progressEl) progressEl.textContent = this.correctCount + '/' + total;
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

            DragDropBlanksGame.prototype.syncAudioPlayerFloating = function(isPoolFixed){
                if (typeof window.setAudioPlayerFloatingVisible === 'function') {
                    window.setAudioPlayerFloatingVisible(!!isPoolFixed);
                }
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
                    this.syncAudioPlayerFloating(false);
                    return;
                }

                this.poolRail.style.setProperty('--ddb-pool-height', barHeight + 'px');
                this.poolRail.style.setProperty('--ddb-pool-top', top + 'px');
                this.poolRail.style.setProperty('--ddb-pool-left', Math.round(railRect.left) + 'px');
                this.poolRail.style.setProperty('--ddb-pool-width', Math.round(railRect.width) + 'px');
                this.poolRail.classList.add('ddb-pool-fixed');
                this.syncAudioPlayerFloating(true);
            };

            DragDropBlanksGame.prototype.getVisibleWordLimit = function(){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= DESKTOP_LAYOUT_BREAKPOINT) return Number.MAX_SAFE_INTEGER;
                if (w < 640) return 8;
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
                var locked = document.querySelectorAll('.ddb-blank-slot .ddb-draggable-item.ddb-locked').length;
                var remaining = total - locked;

                if (this.poolCount) this.poolCount.textContent = remaining + '/' + total;
            };

            DragDropBlanksGame.prototype.getRemainingTileCount = function(){
                return ANSWERS.length - document.querySelectorAll('.ddb-blank-slot .ddb-draggable-item.ddb-locked').length;
            };

            DragDropBlanksGame.prototype.updateActionButtons = function(){
                var canReveal = this.getRemainingTileCount() > 0 && !this.hasUsedReveal && !this.isRevealingAnswers && !this.gameCompleted && !this.isReviewingCorrection;
                var canRetake = this.hasUsedReveal || this.isReviewingCorrection;

                if (this.revealAnswersBtn) {
                    this.revealAnswersBtn.classList.toggle('hidden', !canReveal);
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

            DragDropBlanksGame.prototype.normalizeTileForBlank = function(tile){
                tile.classList.remove('cursor-grab','hover:-translate-y-0.5');
                tile.classList.add(
                    'ddb-locked','ring-2','ring-emerald-400/50',
                    'inline-flex','w-fit','max-w-full','items-center','justify-center','text-center',
                    'px-2','py-1.5','leading-tight','rounded-lg'
                );
                tile.style.cursor = 'default';
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

                if (item.classList.contains('ddb-locked')) return;

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
                var shouldCountMistake = false;

                if (!this.draggedItem) return;

                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerUp);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }

                blank = this.getBlankTarget(e.clientX, e.clientY);

                if (blank && blank.classList.contains('ddb-blank-slot') && blank.children.length === 0) {
                    var expectedIndex = Number(blank.dataset.answerIndex || 0);
                    var gotIndex = Number(this.draggedItem.dataset.answerIndex || 0);
                    var expectedText = normalizeAnswerText(blank.dataset.accept || '');
                    var gotText = normalizeAnswerText(this.draggedItem.dataset.accept || this.draggedItem.textContent || '');

                    if ((expectedIndex && gotIndex === expectedIndex) || (expectedText !== '' && expectedText === gotText)) {
                        this.handleCorrectDrop(blank);
                    } else {
                        shouldCountMistake = true;
                        this.handleWrongDrop(blank, { countAsMistake: shouldCountMistake });
                    }
                } else {
                    this.handleWrongDrop(blank, { countAsMistake: shouldCountMistake });
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
                blank.style.minWidth = getInitialBlankMinWidth(blank);
                blank.style.width = IS_SPEAKER_MATCHING_MODE ? '' : 'fit-content';
                blank.classList.remove('ddb-slot-ready');
                this.normalizeTileForBlank(item);

                if (settings.revealed) {
                    this.markTileAsRevealed(item, blank);
                } else {
                    this.flashBlankState(blank, 'correct');
                }

                if (settings.countAsCorrect) {
                    this.correctCount++;
                }

                if (settings.countAsMistake) {
                    this.mistakeCount++;
                }

                return true;
            };

            DragDropBlanksGame.prototype.handleCorrectDrop = function(blank){
                var item = this.draggedItem;
                var tileId = item.dataset.id;

                playCorrect();
                this.spawnBurst(blank, this.burstEmojis.sort(function(){ return Math.random() - 0.5; }).slice(0, 3));

                item.classList.remove('ddb-dragging', 'ddb-shake');

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                if (this.placeholder && this.placeholder.parentNode) this.placeholder.remove();
                this.placeholder = null;

                this.lockTileIntoBlank(item, blank, { countAsCorrect: true, countAsMistake: false, revealed: false });
                this.updateStats();
                this.removeActiveTileById(tileId);

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(b){
                    b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                });

                this.refillPoolAfterLock();
                this.updateActionButtons();
                this.checkComplete();
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

            DragDropBlanksGame.prototype.handleRevealAnswers = function(){
                var self = this;
                var remainingAnswers;

                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || this.hasUsedReveal) return;

                remainingAnswers = Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).filter(function(blank){
                    return blank.children.length === 0;
                });

                if (!remainingAnswers.length) return;

                this.isRevealingAnswers = true;
                this.hasUsedReveal = true;
                this.updateActionButtons();

                remainingAnswers.forEach(function(blank){
                    var answerData = self.findAnswerData(blank.dataset.answerIndex);
                    var item;

                    if (!answerData) return;

                    item = self.createTileNode({
                        id: answerData.id,
                        text: answerData.text,
                        answerIndex: answerData.answerIndex
                    }, self.correctCount + self.mistakeCount);

                    self.lockTileIntoBlank(item, blank, {
                        revealed: true,
                        countAsMistake: true,
                        countAsCorrect: false
                    });
                    self.removeActiveTileById(answerData.id);
                });

                this.isRevealingAnswers = false;
                this.refillPoolAfterLock();
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
