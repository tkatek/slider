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
        $answerIndexMap = [];

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
                $answerIndex = $answerIndexMap[$normalizeAnswer($answerText)] ?? 0;

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
                'sport_answer_index' => $answerIndexMap[$normalizeAnswer($sportAnswer)] ?? 0,
                'hobby_answer_index' => $answerIndexMap[$normalizeAnswer($hobbyAnswer)] ?? 0,
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
    $progressLabel = $isSpeakerMatchingMode ? 'Slots' : 'Blanks';
    $dialogueCardClass = trim((string) ($content['dialogue_card_class'] ?? 'w-full'));
    $sentenceContainerClass = trim((string) ($content['sentence_container_class'] ?? 'w-full max-w-full'));
    $sentenceLineClass = trim((string) ($content['sentence_line_class'] ?? ''));
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

        @keyframes waveGrowth {
            0%,100% { height: 7px; }
            50% { height: 15px; }
        }

        #dragDropBlanksGame {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            -webkit-user-select: none;
            user-select: none;
        }

        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
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

        .ddb-btn-primary:hover {
            transform: scale(1.05);
        }

        .ddb-btn-primary:active {
            transform: scale(.95);
        }

        .ddb-btn-script {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            box-shadow: 0 10px 24px rgba(59,130,246,.14);
        }

        .ddb-btn-script:hover {
            box-shadow: 0 12px 28px rgba(59,130,246,.20);
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

        .wave-bar {
            display: none;
            width: 3px;
            height: 10px;
            background: currentColor;
            border-radius: 999px;
            margin: 0 1px;
        }

        .audio-listen-btn.playing .wave-bar {
            display: block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        .audio-listen-btn.playing .static-icon {
            display: none;
        }

        .ddb-native-audio {
            display: none;
        }

        .ddb-audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(199,210,254,0.55);
        }

        .dark .ddb-audio-track {
            background: rgba(99,102,241,0.25);
        }

        .ddb-audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .ddb-audio-knob {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: white;
            border: 2px solid #4f46e5;
            box-shadow: 0 6px 14px rgba(2,6,23,0.18);
            left: 0%;
            pointer-events: none;
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

        @media (max-width: 1023.98px) {
            #ddbWordBankPanel {
                max-height: min(35vh, 310px);
            }

            #ddbPoolContent {
                max-height: calc(min(35vh, 310px) - 56px);
                overflow-y: auto;
                overflow-x: hidden;
            }
        }

        @media (min-width: 1024px) {
            #ddbPoolRail {
                position: relative;
                align-self: stretch;
            }

            #ddbPoolBar {
                inset-inline: auto;
                bottom: auto;
            }

            #ddbPoolBar.ddb-desktop-fixed {
                position: fixed;
                top: var(--ddb-sticky-top, 16px);
                bottom: auto;
                z-index: 1400;
            }

            #ddbPoolBar.ddb-desktop-bottom {
                position: absolute;
                top: auto;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1;
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
    </style>
@endsection

@section("content")
    <main class="flex min-h-[100dvh] w-full flex-col" id="dragDropBlanksGame">
        <div id="ddbTitleBlock" class="header-spacing text-center space-y-6 my-8">
            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $content['title'] ?? '' }}
                </span>
            </h1>

            @if(!empty($content['subtitle']))
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            @endif
        </div>

        <div id="ddbStatusRow" class="mx-auto mb-5 w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
            <div class="grid grid-cols-4">
                @foreach([$progressLabel => 'ddbProgressCount', 'Correct' => 'ddbCorrectCount', 'Mistakes' => 'ddbMistakesCount', 'Time' => 'ddbTimer'] as $label => $id)
                    <div class="px-3 py-3 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                        <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                            {{ $label }}
                        </div>
                        <div class="text-base font-black sm:text-lg">
                            @if($label === 'Blanks' || $label === 'Slots')
                                🧩
                            @elseif($label === 'Correct')
                                ✅
                            @elseif($label === 'Mistakes')
                                ❌
                            @else
                                ⏱️
                            @endif
                            <span id="{{ $id }}">{{ $label === 'Time' ? '00:00' : (($label === 'Blanks' || $label === 'Slots') ? '0/0' : '0') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="ddbLayoutShell" class="mx-auto flex w-full flex-1 min-h-0 flex-col px-4 pt-4 pb-[calc(min(35vh,310px)+16px)] sm:px-6 sm:pt-5 sm:pb-[calc(min(35vh,310px)+20px)] lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pt-4 lg:pb-0">
            <section id="ddbGameColumn" class="w-full flex flex-col lg:w-[70%] lg:flex-none">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 auto-rows-max">
                    <div class="w-full">
                        <div id="ddbDialogueCard"
                             class="relative isolate {{ $dialogueCardClass }} text-left overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible mb-4">
                            <div id="ddbDialogueInner" class="relative z-[1] px-3 py-4 sm:px-4 sm:py-4 lg:overflow-visible">
                                <div class="space-y-4 sm:space-y-5">
                                    @if(!empty($playerAudio))
                                        <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-4 py-3 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-5 sm:py-3.5">
                                            <div class="flex items-start gap-4">
                                                <button
                                                        id="ddbPlayAudioBtn"
                                                        type="button"
                                                        class="play-hit audio-listen-btn inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                                        aria-label="Play audio"
                                                >
                                                    <svg class="static-icon h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                        <path d="M8 5v14l11-7-11-7z"/>
                                                    </svg>

                                                    <span class="wave-bar" style="animation-delay:.1s"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s"></span>
                                                </button>

                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-center gap-3">
                                                        <div class="flex-1 flex flex-col gap-2 min-w-0">
                                                            <div class="ddb-audio-track mt-1 cursor-pointer" id="ddbProgressTrack" aria-label="Audio progress">
                                                                <div class="ddb-audio-fill" id="ddbProgressFill"></div>
                                                                <div class="ddb-audio-knob" id="ddbProgressKnob"></div>
                                                            </div>

                                                            <div class="flex justify-between text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                                                <span id="ddbCurrentTime">0:00</span>
                                                                <span id="ddbTotalTime">0:00</span>
                                                            </div>
                                                        </div>

                                                        @if($hasScript)
                                                            <button
                                                                    id="ddbShowScriptBtn"
                                                                    type="button"
                                                                    class="ddb-btn-primary ddb-btn-script shrink-0"
                                                            >
                                                                <span>Script</span>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <audio id="ddbPromptAudio" class="ddb-native-audio" preload="metadata">
                                                <source src="{{ $playerAudio }}" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    @endif

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
                                                                        data-placeholder="{{ $speaker['hobby_placeholder'] }}"
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="flex flex-col">
                                                @foreach($sentenceItems as $item)
                                                    <div class="{{ $sentenceContainerClass }}">
                                                        <div class="ddb-sentence-line w-fit max-w-full px-1.5 py-1 text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100 !leading-[2.4]">
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

                    <div id="ddbWinModal" class="hidden fixed inset-0 z-[3000]">
                        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                        <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                            <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">
                                <div class="p-6 text-center sm:p-8">
                                    <div class="mb-3 text-6xl">🎉</div>

                                    <h2 class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">
                                        Done!
                                    </h2>

                                    <div class="mt-5 grid w-full grid-cols-1 gap-3 sm:grid-cols-3">
                                        @foreach(['Correct' => 'ddbFinalCorrect', 'Time' => 'ddbFinalTime', 'Mistakes' => 'ddbFinalMistakes'] as $label => $id)
                                            <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow dark:border-slate-700 dark:bg-slate-800/80">
                                                <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                                <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                        <button
                                                type="button"
                                                class="ddb-btn-secondary w-full px-8 py-3 text-sm"
                                                onclick="window.dragDropBlanksGame && window.dragDropBlanksGame.reviewCorrection()"
                                        >
                                            Review correction
                                        </button>

                                        <button
                                                type="button"
                                                class="ddb-btn-primary w-full px-8 py-3 text-sm"
                                                onclick="window.dragDropBlanksGoNext && window.dragDropBlanksGoNext()"
                                        >
                                            Continue ⚡
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($hasScript)
                        <div id="ddbScriptModal" class="hidden fixed inset-0 z-[3000]">
                            <div id="ddbScriptBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                            <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                                <div class="w-full max-w-3xl max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95 text-left">
                                    <div class="flex items-center justify-between border-b border-slate-200/70 px-4 py-3 dark:border-slate-700/70 sm:px-5 sm:py-4">
                                        <div class="font-black text-sm text-slate-900 dark:text-slate-50 sm:text-base">
                                            Script
                                        </div>

                                        <button
                                                id="ddbCloseScriptBtn"
                                                type="button"
                                                class="ddb-btn-secondary"
                                                aria-label="Close script"
                                        >
                                            Close
                                        </button>
                                    </div>

                                    <div class="max-h-[70vh] overflow-auto p-3 sm:p-4">
                                        <div class="space-y-2">
                                            @foreach($scriptLines as $i => $line)
                                                <div class="rounded-2xl border border-slate-200/60 bg-white/70 p-2.5 dark:border-slate-700/30 dark:bg-slate-900/20">
                                                    <div class="flex items-start gap-2.5">
                                                        <div class="flex h-7 w-7 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-xs font-black text-slate-700 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200">
                                                            {{ $i + 1 }}
                                                        </div>

                                                        <div class="min-w-0 flex-1">
                                                            <div class="text-xs font-semibold text-slate-700 dark:text-slate-200 sm:text-sm">
                                                                {{ $line }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <template id="ddbTileTpl">
                        <div
                                class="ddb-draggable-item select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-base inline-flex min-h-[42px] w-auto max-w-full shrink-0 items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="ddbPoolRail" class="w-full lg:order-first lg:self-stretch">
                <div id="ddbPoolBar" class="fixed inset-x-0 bottom-0 z-[1500] lg:relative lg:inset-auto lg:bottom-auto lg:top-auto lg:left-auto">
                    <div class="mx-auto w-full px-3 sm:px-6 lg:px-0 pb-0">
                        <div id="ddbWordBankPanel"
                             class="relative overflow-hidden rounded-t-3xl sm:rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                            <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                            <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                                <div class="flex items-center justify-center">
                                    <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                                </div>

                                <div class="mt-3 flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <button id="ddbPrevWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Previous words">
                                            <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                                <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div id="ddbPoolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                            0/0
                                        </div>

                                        <button id="ddbNextWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Next words">
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
                                    <div id="ddbPoolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 lg:w-full"></div>
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
            var DESKTOP_GAME_WIDTH = Number(@json($content['desktop_game_width'] ?? 70));
            var DESKTOP_POOL_WIDTH = Number(@json($content['desktop_pool_width'] ?? 30));
            var MOBILE_BANK_GAP = Number(@json($content['mobile_bank_gap'] ?? 20));
            var DESKTOP_STICKY_TOP = Number(@json($content['desktop_sticky_top'] ?? 16));
            var playerAudio = document.getElementById('ddbPromptAudio');
            var playAudioBtn = document.getElementById('ddbPlayAudioBtn');
            var progressTrack = document.getElementById('ddbProgressTrack');
            var showScriptBtn = document.getElementById('ddbShowScriptBtn');
            var scriptModal = document.getElementById('ddbScriptModal');
            var scriptBackdrop = document.getElementById('ddbScriptBackdrop');
            var closeScriptBtn = document.getElementById('ddbCloseScriptBtn');

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

            function formatTime(seconds){
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                var m = Math.floor(seconds / 60);
                var s = Math.floor(seconds % 60);
                return m + ':' + String(s).padStart(2, '0');
            }

            function syncPlayerUI(){
                if (!playerAudio) return;

                var duration = isFinite(playerAudio.duration) ? playerAudio.duration : 0;
                var current = isFinite(playerAudio.currentTime) ? playerAudio.currentTime : 0;
                var pct = duration > 0 ? (current / duration) * 100 : 0;

                var currentTimeEl = document.getElementById('ddbCurrentTime');
                var totalTimeEl = document.getElementById('ddbTotalTime');
                var progressFill = document.getElementById('ddbProgressFill');
                var progressKnob = document.getElementById('ddbProgressKnob');

                if (currentTimeEl) currentTimeEl.textContent = formatTime(current);
                if (totalTimeEl) totalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
                if (progressFill) progressFill.style.width = pct + '%';
                if (progressKnob) progressKnob.style.left = pct + '%';
                if (playAudioBtn) playAudioBtn.classList.toggle('playing', !playerAudio.paused);
            }

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

                if (playerAudio) {
                    playerAudio.pause();
                    playerAudio.currentTime = 0;
                    syncPlayerUI();
                }
            };

            if (playAudioBtn && playerAudio) {
                playAudioBtn.addEventListener('click', function(){
                    if (playerAudio.paused) playerAudio.play().catch(function(){});
                    else playerAudio.pause();
                });
            }

            if (progressTrack && playerAudio) {
                progressTrack.addEventListener('click', function(e){
                    var rect = e.currentTarget.getBoundingClientRect();
                    var x = Math.min(Math.max(0, e.clientX - rect.left), rect.width);
                    var ratio = rect.width > 0 ? x / rect.width : 0;

                    if (isFinite(playerAudio.duration) && playerAudio.duration > 0) {
                        playerAudio.currentTime = ratio * playerAudio.duration;
                        syncPlayerUI();
                    }
                });
            }

            if (playerAudio) {
                playerAudio.preload = 'metadata';
                playerAudio.addEventListener('loadedmetadata', syncPlayerUI);
                playerAudio.addEventListener('timeupdate', syncPlayerUI);
                playerAudio.addEventListener('ended', syncPlayerUI);
                playerAudio.addEventListener('play', syncPlayerUI);
                playerAudio.addEventListener('pause', syncPlayerUI);
            }

            if (showScriptBtn) {
                showScriptBtn.addEventListener('click', function () {
                    if (scriptModal) scriptModal.classList.remove('hidden');
                });
            }

            if (closeScriptBtn) {
                closeScriptBtn.addEventListener('click', function () {
                    if (scriptModal) scriptModal.classList.add('hidden');
                });
            }

            if (scriptBackdrop) {
                scriptBackdrop.addEventListener('click', function () {
                    if (scriptModal) scriptModal.classList.add('hidden');
                });
            }

            function getInitialBlankMinWidth(blank){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1024) return blank.dataset.initialMinWidthLg || blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                if (w >= 640) return blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                return blank.dataset.initialMinWidthMobile || '';
            }

            function DragDropBlanksGame(){
                this.layoutShell = document.getElementById('ddbLayoutShell');
                this.poolContent = document.getElementById('ddbPoolContent');
                this.poolCount = document.getElementById('ddbPoolCount');
                this.winModal = document.getElementById('ddbWinModal');
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

                if (playerAudio) {
                    playerAudio.pause();
                    playerAudio.currentTime = 0;
                    syncPlayerUI();
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
                this.updateDesktopColumnWidths();
                this.updateMobileBottomSpacing();

                window.removeEventListener('resize', this.handleResize);
                window.addEventListener('resize', this.handleResize, { passive: true });

                window.removeEventListener('scroll', this.handleScroll);
                window.addEventListener('scroll', this.handleScroll, { passive: true });

                if (this.prevWordsBtn) {
                    this.prevWordsBtn.removeEventListener('click', this.showPrevWords);
                    this.prevWordsBtn.addEventListener('click', this.showPrevWords);
                }

                if (this.nextWordsBtn) {
                    this.nextWordsBtn.removeEventListener('click', this.showNextWords);
                    this.nextWordsBtn.addEventListener('click', this.showNextWords);
                }

                setTimeout(function(){
                    self.updateMobileBottomSpacing();
                    self.updateDesktopStickyPosition();
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
                var timerEl = document.getElementById('ddbTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            };

            DragDropBlanksGame.prototype.updateStats = function(){
                var progressEl = document.getElementById('ddbProgressCount');
                var correctEl = document.getElementById('ddbCorrectCount');
                var mistakesEl = document.getElementById('ddbMistakesCount');
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
                    self.updateDesktopColumnWidths();
                    self.updateMobileBottomSpacing();
                    self.updateDesktopStickyPosition();
                }, 120);
            };

            DragDropBlanksGame.prototype.handleScroll = function(){
                this.updateDesktopStickyPosition();
            };

            DragDropBlanksGame.prototype.updateMobileBottomSpacing = function(){
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
                var panelHeight;

                if (!this.layoutShell || !this.poolBar) return;

                if (viewportWidth >= 1024) {
                    this.layoutShell.style.paddingBottom = '';
                    return;
                }

                panelHeight = Math.ceil(this.poolBar.getBoundingClientRect().height || 0);
                this.layoutShell.style.paddingBottom = (panelHeight + MOBILE_BANK_GAP) + 'px';
            };

            DragDropBlanksGame.prototype.getVisibleWordLimit = function(){
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1024) return Number.MAX_SAFE_INTEGER;
                if (w < 640) return 8;
                return 9;
            };

            DragDropBlanksGame.prototype.getDesktopStickyTop = function(){
                return Math.max(0, Number.isFinite(DESKTOP_STICKY_TOP) ? DESKTOP_STICKY_TOP : 16);
            };

            DragDropBlanksGame.prototype.resetDesktopStickyState = function(){
                if (!this.poolBar) return;

                this.poolBar.classList.remove('ddb-desktop-fixed', 'ddb-desktop-bottom');
                this.poolBar.style.top = '';
                this.poolBar.style.left = '';
                this.poolBar.style.right = '';
                this.poolBar.style.width = '';
                this.poolBar.style.maxWidth = '';
                this.poolBar.style.setProperty('--ddb-sticky-top', '');

                if (this.poolRail) {
                    this.poolRail.style.minHeight = '';
                }
            };

            DragDropBlanksGame.prototype.updateDesktopStickyPosition = function(){
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
                var stickyTop = this.getDesktopStickyTop();
                var railRect;
                var barHeight;
                var fixedWidth;
                var fixedLeft;

                if (!this.poolBar || !this.poolRail) return;

                if (viewportWidth < 1024) {
                    this.resetDesktopStickyState();
                    return;
                }

                barHeight = Math.ceil(this.poolBar.offsetHeight || 0);
                this.poolRail.style.minHeight = barHeight + 'px';
                railRect = this.poolRail.getBoundingClientRect();

                this.poolBar.style.setProperty('--ddb-sticky-top', stickyTop + 'px');

                if (railRect.top > stickyTop) {
                    this.resetDesktopStickyState();
                    this.poolRail.style.minHeight = barHeight + 'px';
                    return;
                }

                if (railRect.bottom <= stickyTop + barHeight) {
                    this.poolBar.classList.remove('ddb-desktop-fixed');
                    this.poolBar.classList.add('ddb-desktop-bottom');
                    this.poolBar.style.top = '';
                    this.poolBar.style.left = '0';
                    this.poolBar.style.right = '0';
                    this.poolBar.style.width = '100%';
                    this.poolBar.style.maxWidth = '100%';
                    return;
                }

                fixedWidth = Math.round(railRect.width);
                fixedLeft = Math.round(railRect.left);

                this.poolBar.classList.remove('ddb-desktop-bottom');
                this.poolBar.classList.add('ddb-desktop-fixed');
                this.poolBar.style.top = stickyTop + 'px';
                this.poolBar.style.left = fixedLeft + 'px';
                this.poolBar.style.right = 'auto';
                this.poolBar.style.width = fixedWidth + 'px';
                this.poolBar.style.maxWidth = fixedWidth + 'px';
            };

            DragDropBlanksGame.prototype.updateDesktopColumnWidths = function(){
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;
                var hasCustomGameWidth = DESKTOP_GAME_WIDTH > 0;
                var hasCustomPoolWidth = DESKTOP_POOL_WIDTH > 0;
                var dialoguePercent = hasCustomGameWidth ? DESKTOP_GAME_WIDTH : 70;
                var poolPercent = hasCustomPoolWidth ? DESKTOP_POOL_WIDTH : 30;

                if (!this.gameColumn || !this.poolRail || !this.dialogueCard) return;

                if (viewportWidth < 1024) {
                    this.gameColumn.style.width = '';
                    this.gameColumn.style.maxWidth = '';
                    this.gameColumn.style.flexBasis = '';

                    this.poolRail.style.width = '';
                    this.poolRail.style.maxWidth = '';
                    this.poolRail.style.flexBasis = '';

                    this.resetDesktopStickyState();
                    return;
                }

                if (hasCustomGameWidth && !hasCustomPoolWidth) {
                    poolPercent = Math.max(0, 100 - dialoguePercent);
                } else if (!hasCustomGameWidth && hasCustomPoolWidth) {
                    dialoguePercent = Math.max(0, 100 - poolPercent);
                }

                this.gameColumn.style.width = dialoguePercent + '%';
                this.gameColumn.style.maxWidth = dialoguePercent + '%';
                this.gameColumn.style.flexBasis = dialoguePercent + '%';

                this.poolRail.style.width = poolPercent + '%';
                this.poolRail.style.maxWidth = poolPercent + '%';
                this.poolRail.style.flexBasis = poolPercent + '%';

                this.updateDesktopStickyPosition();
            };

            DragDropBlanksGame.prototype.createTileNode = function(itemData, index){
                var self = this;
                var node = this.tileTpl.content.firstElementChild.cloneNode(true);

                node.textContent = itemData.text;
                node.dataset.id = itemData.id;
                node.dataset.answerIndex = itemData.answerIndex;
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
                this.updateDesktopStickyPosition();
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
                this.updateDesktopColumnWidths();
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

                this.updateDesktopStickyPosition();
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

                    if (expectedIndex && gotIndex === expectedIndex) {
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

                threshold = window.innerWidth >= 1024 ? 42 : (window.innerWidth >= 640 ? 34 : 28);

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
                this.updateDesktopColumnWidths();
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
                    self.updateDesktopStickyPosition();

                    if (!shouldShowModal) return;

                    var finalCorrect = document.getElementById('ddbFinalCorrect');
                    var finalTime = document.getElementById('ddbFinalTime');
                    var finalMistakes = document.getElementById('ddbFinalMistakes');

                    if (finalCorrect) finalCorrect.textContent = self.correctCount + '/' + total;
                    if (finalTime) finalTime.textContent = self.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = self.mistakeCount;

                    self.winModal.classList.remove('hidden');
                }, 260);
            };

            window.dragDropBlanksGame = new DragDropBlanksGame();

            document.addEventListener('DOMContentLoaded', function(){
                syncPlayerUI();
                window.dragDropBlanksGame.init();
            });
        })();
    </script>
@endsection
