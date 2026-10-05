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
                $answerSource = $answers[$answerIndex - 1] ?? '';
                $answerText = is_array($answerSource)
                    ? (string) ($answerSource['answer'] ?? $answerSource['text'] ?? '')
                    : (string) $answerSource;

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

        $classicWordBank = array_key_exists('word_bank', $content) && is_array($content['word_bank'])
            ? array_values($content['word_bank'])
            : $answers;
        $classicBankAnswerIndexes = array_fill(0, count($classicWordBank), 0);
        $availableClassicBankIndexes = array_keys($classicWordBank);

        foreach ($answers as $answerIndex => $answer) {
            $answerText = is_array($answer)
                ? (string) ($answer['answer'] ?? $answer['text'] ?? '')
                : (string) $answer;
            $matchingBankOffset = null;

            foreach ($availableClassicBankIndexes as $offset => $bankIndex) {
                $bankItem = $classicWordBank[$bankIndex];
                $bankText = is_array($bankItem)
                    ? (string) ($bankItem['answer'] ?? $bankItem['text'] ?? '')
                    : (string) $bankItem;

                if ($normalizeAnswer($bankText) === $normalizeAnswer($answerText)) {
                    $matchingBankOffset = $offset;
                    $classicBankAnswerIndexes[$bankIndex] = $answerIndex + 1;
                    break;
                }
            }

            if ($matchingBankOffset === null) {
                $classicWordBank[] = $answer;
                $classicBankAnswerIndexes[] = $answerIndex + 1;
            } else {
                array_splice($availableClassicBankIndexes, $matchingBankOffset, 1);
            }
        }

        foreach ($classicWordBank as $bankIndex => $bankItem) {
            $answerText = is_array($bankItem)
                ? (string) ($bankItem['answer'] ?? $bankItem['text'] ?? '')
                : (string) $bankItem;
            $answersForJs[] = [
                'id' => 'answer_' . ($bankIndex + 1),
                'text' => $answerText,
                'audio' => is_array($bankItem) ? (string) ($bankItem['audio'] ?? $bankItem['sound'] ?? '') : '',
                'answerIndex' => $classicBankAnswerIndexes[$bankIndex] ?? 0,
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
                'audio' => is_array($bankItem) ? (string) ($bankItem['audio'] ?? $bankItem['sound'] ?? '') : '',
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

    $answerTileType = trim((string) ($content['answer_tile_type'] ?? 'text'));
    $globalBlankWidth = $estimateBlankWidth($answerTexts);
    $baseBlankWidth = max(68, (int) round(((int) rtrim($globalBlankWidth, 'px')) * 0.78));
    $mobileBlankWidth = max(34, (int) round($baseBlankWidth * 0.5));
    $tabletBlankWidth = max(46, (int) round($baseBlankWidth * 0.68));
    $desktopBlankWidth = max(58, (int) round($baseBlankWidth * 0.82));

    if ($answerTileType === 'audio') {
        $mobileBlankWidth = 72;
        $tabletBlankWidth = 82;
        $desktopBlankWidth = 92;
    }

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
    $bankWidthClass = trim((string) ($content['bank_width_class'] ?? 'max-w-5xl'));
    $subtitleBubble = trim((string) ($content['subtitle_bubble'] ?? ''));
    $desktopLayoutBreakpoint = max(0, (int) ($content['desktop_layout_breakpoint'] ?? 1280));
    $stickyBankTopOffset = $content['sticky_bank_top_offset'] ?? null;
    $stickyBankGapPx = max(0, (int) ($content['sticky_bank_gap_px'] ?? 12));

    $bankLayout = trim((string) ($content['bank_layout'] ?? 'auto'));
    if (!in_array($bankLayout, ['auto', 'all', 'paginated'], true)) {
        $bankLayout = 'auto';
    }

    $answerCount = count($answersForJs);
    $showAllBankItems = $bankLayout === 'all';
    $showAllScrollThreshold = max(0, (int) ($content['show_all_scroll_threshold'] ?? 16));
    $allowShowAllBankScroll = $showAllBankItems && $showAllScrollThreshold > 0 && $answerCount > $showAllScrollThreshold;
    $bankVisibleCap = max(0, (int) ($content['bank_visible_cap'] ?? 0));
    $mobileBankVisibleCap = max(0, (int) ($content['mobile_bank_visible_cap'] ?? 6));
    $tabletBankVisibleCap = max(0, (int) ($content['tablet_bank_visible_cap'] ?? 8));
    $desktopBankVisibleCap = max(0, (int) ($content['desktop_bank_visible_cap'] ?? 10));
    $wideBankVisibleCap = max(0, (int) ($content['wide_bank_visible_cap'] ?? 12));

    $shuffleBank = (bool) ($content['shuffle_bank'] ?? true);

    $exercisePageSize = $isClassicSentenceMode ? max(0, (int) ($content['exercise_page_size'] ?? 0)) : 0;
    $exercisePageCount = $exercisePageSize > 0 ? (int) ceil(count($answers) / $exercisePageSize) : 0;
    if ($exercisePageSize > 0) {
        $sentencePage = 0;
        foreach ($sentenceItems as &$sentenceItem) {
            foreach ($sentenceItem['tokens'] as $sentenceToken) {
                if ($sentenceToken['type'] === 'blank') {
                    $sentencePage = (int) floor(($sentenceToken['answer_index'] - 1) / $exercisePageSize);
                    break;
                }
            }
            // Dialogue lines without blanks stay with the preceding sentence.
            $sentenceItem['page_index'] = $sentencePage;
        }
        unset($sentenceItem);
    }

    $sentenceCount = count($sentenceItems);
    $compactCenterDefault = !$playerAudio
        && !$hasScript
        && !$isSpeakerMatchingMode
        && $answerCount > 0
        && $answerCount <= 8
        && $sentenceCount > 0
        && $sentenceCount <= 6;
    $compactCenter = array_key_exists('compact_center', $content)
        ? (bool) $content['compact_center']
        : $compactCenterDefault;
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
            --ddb-accent: rgb(79,70,229);
            --ddb-accent-soft: rgba(238,242,255,.96);
            --ddb-accent-border: rgba(99,102,241,.35);
            --ddb-accent-ring: rgba(99,102,241,.18);
            --ddb-accent-shadow: rgba(79,70,229,.16);
            --ddb-accent-text: rgb(67,56,202);
            --ddb-accent-hover-bg: rgba(238,242,255,.78);
            --ddb-accent-revealed-bg: rgba(238,242,255,.95);
            --ddb-accent-revealed-border: rgba(129,140,248,.42);
            --ddb-accent-revealed-ring: rgba(129,140,248,.16);
            --ddb-primary-gradient: linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            -webkit-user-select: none;
            user-select: none;
        }

        .dark #dragDropBlanksGame {
            --ddb-accent: rgb(224,231,255);
            --ddb-accent-soft: rgba(67,56,202,.34);
            --ddb-accent-border: rgba(129,140,248,.45);
            --ddb-accent-ring: rgba(129,140,248,.20);
            --ddb-accent-shadow: rgba(2,6,23,.28);
            --ddb-accent-text: rgb(224,231,255);
            --ddb-accent-hover-bg: rgba(67,56,202,.24);
            --ddb-accent-revealed-bg: rgba(67,56,202,.28);
            --ddb-accent-revealed-border: rgba(129,140,248,.42);
            --ddb-accent-revealed-ring: rgba(129,140,248,.18);
        }

        .slide-layout.slide-theme-orange #dragDropBlanksGame {
            --ddb-accent: rgb(234,88,12);
            --ddb-accent-soft: rgba(255,237,213,.96);
            --ddb-accent-border: rgba(251,146,60,.42);
            --ddb-accent-ring: rgba(251,146,60,.22);
            --ddb-accent-shadow: rgba(234,88,12,.16);
            --ddb-accent-text: rgb(194,65,12);
            --ddb-accent-hover-bg: rgba(255,237,213,.80);
            --ddb-accent-revealed-bg: rgba(255,237,213,.95);
            --ddb-accent-revealed-border: rgba(251,146,60,.45);
            --ddb-accent-revealed-ring: rgba(251,146,60,.18);
            --ddb-primary-gradient: linear-gradient(135deg, #f59e0b, #f97316, #ea580c);
        }

        .dark .slide-layout.slide-theme-orange #dragDropBlanksGame {
            --ddb-accent: rgb(255,237,213);
            --ddb-accent-soft: rgba(154,52,18,.36);
            --ddb-accent-border: rgba(251,146,60,.48);
            --ddb-accent-ring: rgba(251,146,60,.24);
            --ddb-accent-shadow: rgba(2,6,23,.30);
            --ddb-accent-text: rgb(255,237,213);
            --ddb-accent-hover-bg: rgba(154,52,18,.26);
            --ddb-accent-revealed-bg: rgba(154,52,18,.30);
            --ddb-accent-revealed-border: rgba(251,146,60,.46);
            --ddb-accent-revealed-ring: rgba(251,146,60,.20);
        }

        .slide-layout.slide-theme-green #dragDropBlanksGame {
            --ddb-accent: rgb(22,163,74);
            --ddb-accent-soft: rgba(220,252,231,.96);
            --ddb-accent-border: rgba(34,197,94,.40);
            --ddb-accent-ring: rgba(34,197,94,.20);
            --ddb-accent-shadow: rgba(22,163,74,.15);
            --ddb-accent-text: rgb(21,128,61);
            --ddb-accent-hover-bg: rgba(220,252,231,.78);
            --ddb-accent-revealed-bg: rgba(220,252,231,.95);
            --ddb-accent-revealed-border: rgba(34,197,94,.42);
            --ddb-accent-revealed-ring: rgba(34,197,94,.18);
            --ddb-primary-gradient: linear-gradient(135deg, #22c55e, #16a34a, #15803d);
        }

        .dark .slide-layout.slide-theme-green #dragDropBlanksGame {
            --ddb-accent: rgb(220,252,231);
            --ddb-accent-soft: rgba(22,101,52,.36);
            --ddb-accent-border: rgba(74,222,128,.46);
            --ddb-accent-ring: rgba(74,222,128,.22);
            --ddb-accent-shadow: rgba(2,6,23,.30);
            --ddb-accent-text: rgb(220,252,231);
            --ddb-accent-hover-bg: rgba(22,101,52,.26);
            --ddb-accent-revealed-bg: rgba(22,101,52,.32);
            --ddb-accent-revealed-border: rgba(74,222,128,.44);
            --ddb-accent-revealed-ring: rgba(74,222,128,.20);
        }

        #ddbLayoutShell {
            flex: 0 0 auto;
            width: 100%;
            max-width: 1500px;
            justify-content: center;
            align-items: center;
        }

        #dragDropBlanksGame.ddb-compact-center #ddbLayoutShell {
            justify-content: center;
            padding-top: clamp(1rem, 4vh, 3rem);
            padding-bottom: clamp(1.5rem, 6vh, 4.5rem);
        }

        #ddbGameColumn {
            flex: 0 0 auto;
            width: 100%;
        }

        #ddbDialogueCard {
            margin-bottom: 0 !important;
        }

        #ddbDialogueInner {
            padding: .7rem;
        }

        .ddb-speaker-list {
            display: grid;
            gap: .55rem;
        }

        .ddb-speaker-row {
            border-radius: 1rem;
        }

        .ddb-speaker-icon {
            width: 2rem;
            height: 2rem;
            border-radius: .8rem;
        }

        .ddb-speaker-answer-grid {
            gap: .55rem;
        }

        @media (min-width: 640px) {
            #ddbDialogueInner {
                padding: .85rem;
            }

            .ddb-speaker-list {
                gap: .65rem;
            }
        }

        @media (min-width: 1024px) {
            #ddbDialogueInner {
                padding: 1rem;
            }

            .ddb-speaker-row {
                padding-block: .65rem !important;
            }
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
            background: var(--ddb-primary-gradient);
            box-shadow: 0 10px 24px var(--ddb-accent-ring);
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
            color: var(--ddb-accent-text);
            border-color: var(--ddb-accent-border);
            background: var(--ddb-accent-soft);
            box-shadow: 0 8px 22px var(--ddb-accent-ring);
        }

        .ddb-btn-reveal:hover {
            background: var(--ddb-accent-hover-bg);
            box-shadow: 0 10px 24px var(--ddb-accent-ring);
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
            color: var(--ddb-accent-text);
            border-color: var(--ddb-accent-border);
            background: var(--ddb-accent-soft);
        }

        .dark .ddb-btn-reveal:hover {
            background: var(--ddb-accent-hover-bg);
        }

        #ddbRevealAnswersBtn {
            min-height: 2.25rem;
            color: #4935df;
            border-color: #dad7f2;
            background: #fafaff;
            border-radius: .75rem;
            padding: .5rem 1.2rem;
            font-weight: 800;
            box-shadow: 0 1px 3px rgba(58, 45, 110, .08);
        }

        #ddbRevealAnswersBtn:hover:not(:disabled) {
            border-color: #b9acee;
            background: #f1edff;
        }

        .dark #ddbRevealAnswersBtn {
            color: #c4b5fd;
            border-color: #4a4569;
            background: #25243b;
        }

        .dark #ddbRevealAnswersBtn:hover:not(:disabled) {
            background: #302b4b;
        }

        #ddbRevealAnswersBtn:focus-visible {
            outline: 2px solid #a99aee;
            outline-offset: 2px;
        }

        .ddb-dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
            border-color: var(--ddb-accent-border) !important;
            box-shadow:
                    0 0 0 4px var(--ddb-accent-ring),
                    0 18px 38px rgba(15,23,42,.24),
                    0 8px 18px var(--ddb-accent-shadow) !important;
            filter: saturate(1.04);
        }

        .ddb-draggable-item.ddb-wrong-feedback {
            border-color: rgba(244,63,94,.72) !important;
            box-shadow:
                    0 0 0 3px rgba(244,63,94,.22),
                    0 14px 30px rgba(15,23,42,.18) !important;
        }

        .dark .ddb-draggable-item.ddb-wrong-feedback {
            border-color: rgba(251,113,133,.74) !important;
            box-shadow:
                    0 0 0 3px rgba(251,113,133,.24),
                    0 16px 34px rgba(2,6,23,.34) !important;
        }

        .ddb-blank-slot.ddb-wrong-slot {
            border-color: rgba(244,63,94,.70) !important;
            background: rgba(255,255,255,.78) !important;
            box-shadow:
                    inset 0 0 0 1px rgba(244,63,94,.22),
                    0 0 0 4px rgba(244,63,94,.12) !important;
        }

        .dark .ddb-blank-slot.ddb-wrong-slot {
            border-color: rgba(251,113,133,.68) !important;
            background: rgba(15,23,42,.28) !important;
            box-shadow:
                    inset 0 0 0 1px rgba(251,113,133,.20),
                    0 0 0 4px rgba(251,113,133,.14) !important;
        }

        .ddb-returning {
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index: 9000;
        }

        .ddb-shake { animation: shake .35s ease-in-out; }
        .ddb-locked { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); pointer-events: none; }
        .ddb-locked.ddb-audio-tile { pointer-events: auto; cursor: default; }

        .ddb-audio-tile {
            min-width: 5.15rem !important;
            min-height: 2.85rem !important;
            max-width: 5.75rem !important;
            justify-content: center !important;
            gap: .55rem !important;
            padding: .38rem .58rem !important;
            border-radius: 1.1rem !important;
            text-align: center !important;
            color: rgb(30 41 59) !important;
            background: rgba(255,255,255,.96) !important;
            border-color: rgba(203,213,225,.92) !important;
            box-shadow: 0 10px 22px rgba(15,23,42,.10) !important;
        }

        .ddb-audio-tile::before {
            display: none !important;
        }

        .dark .ddb-audio-tile {
            color: rgb(248 250 252) !important;
            background: rgba(15,23,42,.92) !important;
            border-color: rgba(71,85,105,.92) !important;
            box-shadow: 0 12px 26px rgba(2,6,23,.34) !important;
        }

        .ddb-audio-tile-main {
            display: inline-flex;
            min-width: 0;
            align-items: center;
            justify-content: center;
        }

        .ddb-audio-tile-btn {
            display: inline-flex;
            width: 2.18rem;
            height: 2.18rem;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            background: var(--ddb-accent);
            color: #fff;
            border: 1px solid rgba(255,255,255,.38);
            box-shadow: 0 8px 16px var(--ddb-accent-shadow);
            cursor: pointer;
            transition: transform .16s ease, filter .16s ease, box-shadow .16s ease;
        }

        .dark .ddb-audio-tile-btn {
            background: var(--ddb-accent-soft);
            color: var(--ddb-accent-text);
            border-color: var(--ddb-accent-border);
            box-shadow: 0 10px 20px rgba(2,6,23,.3);
        }

        .ddb-audio-tile-index {
            display: none !important;
        }

        .ddb-audio-tile-btn:hover {
            transform: scale(1.04);
            background: var(--ddb-accent);
            filter: brightness(.96);
        }

        .dark .ddb-audio-tile-btn:hover {
            background: var(--ddb-accent-soft);
            filter: brightness(1.08);
        }

        .ddb-audio-tile-btn:focus-visible {
            outline: 2px solid var(--ddb-accent-border);
            outline-offset: 2px;
        }

        .ddb-audio-tile-grip {
            display: inline-flex;
            width: .95rem;
            height: 1.9rem;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            color: rgba(100,116,139,.72);
            opacity: .9;
        }

        .ddb-audio-tile-grip::before {
            content: '';
            width: .25rem;
            height: 1.25rem;
            border-radius: 9999px;
            background:
                    radial-gradient(circle, currentColor 1.5px, transparent 2px) 0 0 / .25rem .42rem;
        }

        .dark .ddb-audio-tile-grip {
            color: rgba(203,213,225,.74);
        }

        .ddb-audio-tile.ddb-audio-playing {
            box-shadow:
                    0 0 0 3px var(--ddb-accent-ring),
                    0 14px 30px rgba(2,6,23,.16) !important;
        }

        .ddb-audio-tile.ddb-audio-playing .ddb-audio-tile-btn {
            background: var(--ddb-accent);
            color: #fff;
            filter: brightness(.96);
        }

        .dark .ddb-audio-tile.ddb-audio-playing .ddb-audio-tile-btn {
            background: var(--ddb-accent-soft);
            color: var(--ddb-accent-text);
            filter: brightness(1.08);
        }

        .ddb-blank-slot .ddb-audio-tile {
            min-width: 3.75rem !important;
            min-height: 2rem !important;
            max-width: 4rem !important;
            justify-content: center !important;
            padding: .18rem .3rem !important;
            gap: 0 !important;
            box-shadow: none !important;
        }

        .ddb-blank-slot .ddb-audio-tile-index,
        .ddb-blank-slot .ddb-audio-tile-grip {
            display: none !important;
        }

        .ddb-blank-slot .ddb-audio-tile-btn {
            width: 1.65rem;
            height: 1.65rem;
        }

        .ddb-emoji-burst {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            font-size: .95rem;
            animation: riseFade .58s ease forwards;
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

        #ddbWordBankPanel {
            max-height: none;
            border-radius: 1rem !important;
            overflow: visible !important;
            box-shadow: 0 8px 24px rgba(2,6,23,.06) !important;
        }

        #ddbWordBankPanel::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            background: linear-gradient(180deg, rgba(255,255,255,.72), rgba(255,255,255,0));
            opacity: .48;
        }

        .dark #ddbWordBankPanel::before {
            background: linear-gradient(180deg, rgba(30,41,59,.38), rgba(15,23,42,0));
            opacity: .56;
        }

        .dark #ddbWordBankPanel {
            box-shadow: 0 12px 30px rgba(2,6,23,.32) !important;
        }

        .ddb-bank-inner {
            padding: .45rem .65rem .6rem !important;
        }

        #ddbPoolContent {
            width: 100%;
            min-height: 2.3rem;
            align-content: center;
            justify-content: center;
            max-height: none;
            overflow: visible;
            padding: .05rem 0 .05rem;
        }

        #dragDropBlanksGame.ddb-answer-audio #ddbPoolContent {
            gap: .45rem .55rem;
            min-height: 2.9rem;
        }

        #dragDropBlanksGame.ddb-answer-audio .ddb-bank-inner {
            padding-top: .55rem !important;
            padding-bottom: .65rem !important;
        }

        #ddbPoolRail.ddb-show-all-scroll #ddbPoolContent {
            max-height: min(28vh, 220px);
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: .25rem;
        }

        @media (max-width: 639.98px) {
            #ddbPoolRail.ddb-show-all-scroll #ddbPoolContent {
                max-height: min(30vh, 190px);
            }
        }

        #ddbPoolRail {
            order: -1;
            width: 100%;
            max-width: 100%;
            flex: 0 0 auto;
            margin-top: .15rem;
        }

        #ddbPoolRail.ddb-show-all-bank .ddb-pool-nav-btn {
            display: none !important;
        }

        #ddbPoolBar {
            position: relative;
            width: 100%;
            max-width: 100%;
            padding: 0;
            z-index: 900;
        }

        #ddbPoolRail.ddb-pool-fixed {
            min-height: calc(var(--ddb-pool-height, 0px) + var(--ddb-sticky-bank-gap, 12px));
        }

        #ddbPoolRail.ddb-pool-fixed #ddbPoolBar {
            position: fixed;
            top: var(--ddb-pool-top, .5rem);
            left: var(--ddb-pool-left, 0px);
            width: var(--ddb-pool-width, 100%);
            z-index: 2200;
            padding-left: .75rem;
            padding-right: .75rem;
        }

        #ddbPoolRail.ddb-pool-fixed #ddbPoolBar > div {
            max-width: min(64rem, calc(100vw - 1.5rem));
        }

        #ddbPoolRail.ddb-pool-fixed #ddbWordBankPanel {
            box-shadow: 0 12px 30px rgba(15,23,42,.12) !important;
        }

        .dark #ddbPoolRail.ddb-pool-fixed #ddbWordBankPanel {
            box-shadow: 0 16px 34px rgba(2,6,23,.34) !important;
        }

        .ddb-draggable-item {
            white-space: normal;
            overflow-wrap: break-word;
            word-break: normal;
            line-height: 1.22;
            max-width: min(100%, 22rem);
        }

        .ddb-draggable-item.ddb-neutral-answer,
        #dragDropBlanksGame .ddb-draggable-item.ddb-neutral-answer {
            gap: .8rem;
            border-color: #d6d0ef;
            border-radius: 1rem;
            background: #f8f7ff;
            color: #242052;
            font-weight: 800;
            box-shadow: 0 3px 8px rgba(58, 45, 110, .055);
        }

        .ddb-neutral-answer:not(.ddb-locked) {
            min-height: 2.5rem;
            padding: .45rem .75rem;
        }

        .ddb-neutral-answer:not(.ddb-locked)::before {
            content: '';
            flex: 0 0 16px;
            width: 16px;
            height: 16px;
            background: radial-gradient(circle, #6350df 2.5px, transparent 3px) 0 0 / 8px 8px;
        }

        #dragDropBlanksGame .ddb-neutral-answer:not(.ddb-locked):hover {
            border-color: #b9acee;
            background: #f1edff;
        }

        .dark .ddb-draggable-item.ddb-neutral-answer,
        .dark #dragDropBlanksGame .ddb-draggable-item.ddb-neutral-answer {
            border-color: #4a4569;
            background: #25243b;
            color: #eeeaff;
        }

        .dark .ddb-neutral-answer:not(.ddb-locked)::before {
            background-image: radial-gradient(circle, #ae9bff 2.5px, transparent 3px);
        }

        .dark #dragDropBlanksGame .ddb-neutral-answer:not(.ddb-locked):hover { background: #302b4b; }

        .ddb-draggable-item:focus-visible,
        .ddb-pool-nav-btn:focus-visible {
            outline: 3px solid var(--ddb-accent-border);
            outline-offset: 2px;
        }

        .ddb-bank-navigation {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            min-height: 2.25rem;
            border: 1px solid #dad7f2;
            border-radius: .75rem;
            background: #fafaff;
            box-shadow: 0 1px 3px rgba(58, 45, 110, .08);
        }

        .ddb-pool-nav-btn {
            width: 2.125rem;
            height: 2.125rem;
            flex: 0 0 auto;
            border-radius: .65rem;
            color: #4935df;
            transition: background-color .15s ease, color .15s ease;
        }

        .ddb-pool-nav-btn:hover:not(:disabled) { background: #f1edff; }
        .ddb-pool-nav-btn:disabled { color: #b7b5c8; cursor: not-allowed; }

        #ddbPoolCount {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 1.125rem;
            padding: 0 .65rem;
            border-inline: 1px solid #e9e6f5;
            color: #484260;
            font-weight: 800;
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        #ddbPoolRail.ddb-show-all-bank #ddbPoolCount { border-inline: 0; }
        .dark .ddb-bank-navigation { background: #25243b; border-color: #4a4569; }
        .dark .ddb-pool-nav-btn { color: #c4b5fd; }
        .dark .ddb-pool-nav-btn:hover:not(:disabled) { background: #302b4b; }
        .dark .ddb-pool-nav-btn:disabled { color: #716c87; }
        .dark #ddbPoolCount { color: #eeeaff; border-color: #4a4569; }

        .ddb-short-answer {
            flex: 0 1 auto;
        }

        .ddb-phrase-answer {
            flex: 0 1 auto;
            max-width: min(100%, 18rem);
        }

        .ddb-long-answer {
            flex: 0 1 min(100%, 28rem);
            max-width: min(100%, 36rem);
            justify-content: flex-start !important;
            text-align: left !important;
            padding-inline: .9rem !important;
            padding-left: 1.35rem !important;
        }

        .ddb-draggable-item.revealed-answer {
            color: var(--ddb-accent-text) !important;
            background: var(--ddb-accent-revealed-bg) !important;
            border-color: var(--ddb-accent-revealed-border) !important;
            box-shadow: 0 0 0 2px var(--ddb-accent-revealed-ring), 0 8px 16px rgba(15,23,42,.08) !important;
        }

        .dark .ddb-draggable-item.revealed-answer {
            color: var(--ddb-accent-text) !important;
            background: var(--ddb-accent-revealed-bg) !important;
            border-color: var(--ddb-accent-revealed-border) !important;
        }

        .ddb-blank-slot.ddb-slot-hover {
            background: var(--ddb-accent-hover-bg) !important;
            box-shadow: 0 0 0 2px var(--ddb-accent-border) !important;
            transform: scale(1.02);
        }

        .ddb-blank-slot.ddb-revealed-slot {
            background: var(--ddb-accent-revealed-bg) !important;
            border-color: var(--ddb-accent-revealed-border) !important;
            box-shadow: inset 0 0 0 1px var(--ddb-accent-revealed-ring), 0 8px 16px rgba(15,23,42,.06) !important;
        }

        @media (max-width: 639.98px) {
            .ddb-audio-tile {
                min-width: 4.75rem !important;
                min-height: 2.62rem !important;
                max-width: 5.1rem !important;
                padding: .32rem .48rem !important;
                gap: .45rem !important;
            }

            .ddb-audio-tile-btn {
                width: 1.92rem;
                height: 1.92rem;
            }

            .ddb-audio-tile-grip {
                width: .78rem;
                height: 1.65rem;
            }

            .ddb-bank-inner {
                padding: .35rem .5rem .5rem !important;
            }

            #ddbPoolContent {
                gap: .45rem;
                padding-top: .08rem;
            }

            .ddb-draggable-item {
                min-height: 2.2rem;
                font-size: .78rem;
                line-height: 1.2;
            }

            .ddb-phrase-answer {
                max-width: 100%;
            }

            .ddb-long-answer {
                flex-basis: auto;
                max-width: 100%;
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
            padding-bottom: 1.25rem;
        }

        @media (max-width: 1023.98px) {
            .audio-player-has-floating #ddbLayoutShell {
                padding-bottom: calc(5.5rem + env(safe-area-inset-bottom, 0px));
            }
        }

        #ddbDialogueCard [data-audio-player] {
            border-radius: 1rem;
            padding: .55rem .7rem;
            box-shadow: none;
        }

        #ddbDialogueCard .audio-player-toggle {
            width: 2.25rem;
            height: 2.25rem;
            box-shadow: 0 8px 18px rgba(15, 23, 42, .14);
        }

        #ddbDialogueCard .audio-player-track {
            height: .45rem;
        }

        #ddbDialogueCard .audio-player-knob {
            width: .7rem;
            height: .7rem;
        }

        #ddbDialogueCard [data-audio-player-script-open] {
            border-radius: .7rem;
            padding: .4rem .65rem;
            font-size: .68rem;
        }

        @media (min-width: 640px) {
            #ddbDialogueCard [data-audio-player] {
                padding: .65rem .85rem;
            }

            #ddbDialogueCard .audio-player-toggle {
                width: 2.5rem;
                height: 2.5rem;
            }
        }

        #dragDropBlanksGame .audio-player-floating {
            right: 1.35rem;
            bottom: calc(1.25rem + env(safe-area-inset-bottom, 0px));
        }

        @media (max-width: 640px) {
            #dragDropBlanksGame .audio-player-floating {
                right: .9rem;
                bottom: calc(.95rem + env(safe-area-inset-bottom, 0px));
            }
        }
    </style>
@endsection

@section("content")
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center {{ $compactCenter ? 'ddb-compact-center' : '' }} {{ $answerTileType === 'audio' ? 'ddb-answer-audio' : '' }}" id="dragDropBlanksGame" style="--ddb-sticky-bank-gap: {{ $stickyBankGapPx }}px;">
        @include('slider.components.title-subtitle')

        @include('slider.components.game-status')

        <div id="ddbLayoutShell" class="mx-auto flex w-full flex-none min-h-0 flex-col gap-2 px-3 pt-2 pb-4 sm:gap-2.5 sm:px-5 sm:pt-2 sm:pb-5 lg:px-7 xl:pt-1">
            <section id="ddbGameColumn" class="mx-auto w-full max-w-5xl flex flex-col">
                <div class="grid place-items-center text-center gap-2.5 sm:gap-3 auto-rows-max">
                    <div class="mx-auto w-full max-w-5xl">
                        <div id="ddbDialogueCard"
                             class="relative isolate {{ $dialogueCardClass }} text-left overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible mb-4">
                            <div id="ddbDialogueInner" class="relative z-[1] px-3 py-3 sm:px-4 sm:py-3.5 lg:overflow-visible">
                                <div class="space-y-2.5 sm:space-y-3">
                                    @include('slider.components.audio-player', [
                                        'audioPlayerScriptAllowHtml' => true,
                                    ])

                                    <div class="ddb-game-section w-full rounded-[1.2rem]">
                                        @if($isSpeakerMatchingMode)
                                            <div class="ddb-speaker-list">
                                                @foreach($speakerItems as $speaker)
                                                    <div class="ddb-speaker-row border border-slate-200/70 bg-white/70 px-3 py-2.5 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/25">
                                                        <div class="grid gap-2.5 lg:grid-cols-[160px_minmax(0,1fr)] lg:items-center">
                                                            <div class="flex items-center gap-2.5">
                                                                <div class="ddb-speaker-icon grid place-items-center border border-slate-200/70 bg-white/80 text-sm shadow-sm dark:border-slate-700/60 dark:bg-slate-900/30 shrink-0">
                                                                    🎙️
                                                                </div>

                                                                <div class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                                                    {{ $speaker['label'] }}
                                                                </div>
                                                            </div>

                                                            <div class="ddb-speaker-answer-grid grid sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,1fr)] sm:items-center">
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
                                                    <div class="{{ $sentenceContainerClass }}" @if($exercisePageSize > 0) data-ddb-exercise-page="{{ $item['page_index'] }}" @if($item['page_index'] > 0) hidden @endif @endif>
                                                        <div class="ddb-sentence-line {{ $sentenceLineClass }} w-fit max-w-full px-1.5 py-0.5 text-base sm:text-lg lg:text-[1.15rem] font-semibold text-slate-900 dark:text-slate-100 !leading-[1.9] sm:!leading-[1.95] lg:!leading-[2]">
                                                            @foreach($item['tokens'] as $token)
                                                                @if($token['type'] === 'html')
                                                                    <span>{!! $token['value'] !!}</span>
                                                                @else
                                                                    <span
                                                                            class="ddb-blank-slot ddb-slot-ready inline-flex align-middle mx-1 rounded-lg border border-dashed border-slate-300/90 bg-white/70 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                            style="min-width:{{ $mobileBlankWidth }}px; min-height:24px;"
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

                    <div class="hidden">
                        <div class="ring-2 ring-indigo-500/40 bg-indigo-50/60 dark:bg-indigo-500/10 ring-emerald-400/50 border-rose-300 bg-rose-50 text-rose-700 dark:bg-rose-900/25 dark:border-rose-900/40 dark:text-rose-200"></div>
                    </div>

                    <template id="ddbTileTpl">
                        <div
                                class="ddb-draggable-item ddb-neutral-answer {{ $tileClass }} relative select-none touch-none cursor-grab text-[11px] sm:text-sm inline-flex w-auto max-w-full shrink-0 items-center justify-center text-center leading-tight border transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                                role="button"
                                tabindex="0"
                                aria-grabbed="false"
                        ></div>
                    </template>
                </div>
            </section>

            <div id="ddbPoolRail" class="{{ $showAllBankItems ? 'ddb-show-all-bank' : '' }} {{ $allowShowAllBankScroll ? 'ddb-show-all-scroll' : '' }}" data-show-all-bank="{{ $showAllBankItems ? '1' : '0' }}" data-bank-layout="{{ $bankLayout }}">
                <div id="ddbPoolBar">
                    <div class="mx-auto w-full {{ $bankWidthClass }} px-0 pb-0">
                        <div id="ddbWordBankPanel"
                             class="relative overflow-hidden rounded-2xl border border-slate-200/70 bg-white/95 shadow-[0_8px_24px_rgba(2,6,23,0.06)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-950/95 {{ $wordBankPanelClass }}">
                            <div class="relative ddb-bank-inner px-2.5 py-2 sm:px-4 sm:py-2.5">

                                <div class="flex items-center justify-between gap-2">
                                    <div class="ddb-bank-navigation">
                                        <button id="ddbPrevWordsBtn" type="button" class="ddb-pool-nav-btn {{ $showAllBankItems ? 'hidden' : '' }} inline-flex items-center justify-center" aria-label="{{ $exercisePageSize > 0 ? 'Previous part' : 'Previous words' }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m14 6-6 6 6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </button>

                                        <div id="ddbPoolCount" aria-live="polite" class="text-[11px] sm:text-xs">
                                            0/0
                                        </div>

                                        <button id="ddbNextWordsBtn" type="button" class="ddb-pool-nav-btn {{ $showAllBankItems ? 'hidden' : '' }} inline-flex items-center justify-center" aria-label="{{ $exercisePageSize > 0 ? 'Next part' : 'Next words' }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="m10 6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </button>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-end gap-2">
                                        <button
                                                type="button"
                                                id="ddbRevealAnswersBtn"
                                                class="inline-flex items-center justify-center border text-[11px] transition-colors duration-200 active:scale-95 sm:text-xs"
                                        >
                                            Show Answer
                                        </button>

                                        <button
                                                type="button"
                                                id="ddbRetakeTestBtn"
                                                class="hidden inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300/70 bg-white/80 px-3 py-1.5 text-[11px] font-black text-slate-700 shadow-sm transition-colors duration-200 hover:bg-slate-50 active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/70 dark:text-slate-100 dark:hover:bg-slate-800 sm:text-xs"
                                        >
                                            Retake test
                                        </button>
                                    </div>
                                </div>

                                <div class="my-1.5 h-px w-full bg-slate-200/50 dark:bg-slate-700/45"></div>

                                <div class="relative">
                                    <div id="ddbPoolContent" class="mx-auto flex w-full max-w-full flex-wrap items-start justify-center gap-1.5 sm:gap-2 {{ $poolContentClass }}"></div>
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
            var EXERCISE_PAGE_SIZE = @json($exercisePageSize);
            var EXERCISE_PAGE_COUNT = @json($exercisePageCount);
            var IS_SPEAKER_MATCHING_MODE = @json($isSpeakerMatchingMode);
            var DESKTOP_LAYOUT_BREAKPOINT = Number(@json($desktopLayoutBreakpoint));
            var ANSWER_TILE_TYPE = @json($answerTileType);
            var STICKY_BANK_TOP_OFFSET = @json($stickyBankTopOffset);
            var STICKY_BANK_GAP_PX = Number(@json($stickyBankGapPx));
            var SHOW_ALL_BANK_ITEMS = @json($showAllBankItems);
            var SHUFFLE_BANK = @json($shuffleBank);
            var BANK_VISIBLE_CAP = Number(@json($bankVisibleCap));
            var MOBILE_BANK_VISIBLE_CAP = Number(@json($mobileBankVisibleCap));
            var TABLET_BANK_VISIBLE_CAP = Number(@json($tabletBankVisibleCap));
            var DESKTOP_BANK_VISIBLE_CAP = Number(@json($desktopBankVisibleCap));
            var WIDE_BANK_VISIBLE_CAP = Number(@json($wideBankVisibleCap));

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
                success: new Audio(SFX.sources.success),
                tile: new Audio()
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

            function clearActiveTileAudio(){
                Array.prototype.slice.call(document.querySelectorAll('.ddb-audio-playing')).forEach(function(tile){
                    tile.classList.remove('ddb-audio-playing');
                });
            }

            audio.tile.addEventListener('ended', clearActiveTileAudio);
            audio.tile.addEventListener('error', clearActiveTileAudio);

            function playTileAudio(src, tile){
                if (!src) return;

                try {
                    clearActiveTileAudio();
                    if (audio.tile.src !== src) {
                        audio.tile.src = src;
                    }
                    audio.tile.pause();
                    audio.tile.currentTime = 0;
                    if (tile) {
                        tile.classList.add('ddb-audio-playing');
                    }
                    var promise = audio.tile.play();
                    if (promise && typeof promise.catch === 'function') {
                        promise.catch(clearActiveTileAudio);
                    }
                } catch (e) {}
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
                clearActiveTileAudio();

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

            function getCssPixelVariable(name, fallback){
                var raw = getComputedStyle(document.documentElement).getPropertyValue(name) || '';
                var value = parseFloat(raw);
                return Number.isFinite(value) ? value : fallback;
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
                this.activeExercisePage = 0;
                this.resizeTimer = null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handlePointerCancel = this.handlePointerCancel.bind(this);
                this.handleWindowBlur = this.handleWindowBlur.bind(this);
                this.handleResize = this.handleResize.bind(this);
                this.handleScroll = this.handleScroll.bind(this);
                this.showPrevWords = this.showPrevWords.bind(this);
                this.showNextWords = this.showNextWords.bind(this);
                this.handleRevealAnswers = this.handleRevealAnswers.bind(this);
                this.handleRetakeTest = this.handleRetakeTest.bind(this);

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

                window.removeEventListener('blur', this.handleWindowBlur);
                window.addEventListener('blur', this.handleWindowBlur);
            }

            DragDropBlanksGame.prototype.init = function(){
                var self = this;

                this.resetActiveDrag(true);
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
                        'ddb-slot-hover','ddb-revealed-slot','ddb-wrong-slot',
                        'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                        'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                        'text-rose-700','border-rose-500/55','bg-rose-50/90',
                        'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                    );
                });

                this.poolContent.innerHTML = '';

                var mappedAnswers = ANSWERS.map(function(answer){
                    return {
                        id: answer.id,
                        text: answer.text,
                        audio: answer.audio || '',
                        answerIndex: answer.answerIndex
                    };
                });

                this.tileDeck = {
                    all: SHUFFLE_BANK ? this.shuffle(mappedAnswers) : mappedAnswers,
                    active: [],
                    waiting: [],
                    history: []
                };
                this.tileDeck.waiting = this.tileDeck.all.slice();

                if (EXERCISE_PAGE_SIZE > 0) {
                    this.showExercisePage(0, false);
                } else {
                    this.loadTiles();
                }
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
                var total = document.querySelectorAll('.ddb-blank-slot').length;

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
                var configuredOffset = parseFloat(STICKY_BANK_TOP_OFFSET);
                var gap = Number.isFinite(STICKY_BANK_GAP_PX) ? Math.max(0, STICKY_BANK_GAP_PX) : 12;

                if (Number.isFinite(configuredOffset)) {
                    return Math.max(0, configuredOffset) + gap;
                }

                return Math.max(0, getCssPixelVariable('--dd-top-pool-offset', 0)) + gap;
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

                var expandedPageTooTall = EXERCISE_PAGE_SIZE > 0 && barHeight + top > window.innerHeight * 0.65;
                if (railRect.top > top || expandedPageTooTall) {
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

                if (SHOW_ALL_BANK_ITEMS) return Number.MAX_SAFE_INTEGER;
                if (Number.isFinite(BANK_VISIBLE_CAP) && BANK_VISIBLE_CAP > 0) return BANK_VISIBLE_CAP;
                if (w < 640) return MOBILE_BANK_VISIBLE_CAP > 0 ? MOBILE_BANK_VISIBLE_CAP : 8;
                if (w < 1024) return TABLET_BANK_VISIBLE_CAP > 0 ? TABLET_BANK_VISIBLE_CAP : 9;
                if (w < 1440) return DESKTOP_BANK_VISIBLE_CAP > 0 ? DESKTOP_BANK_VISIBLE_CAP : 10;
                return WIDE_BANK_VISIBLE_CAP > 0 ? WIDE_BANK_VISIBLE_CAP : 12;
            };

            DragDropBlanksGame.prototype.createTileNode = function(itemData){
                var self = this;
                var node = this.tileTpl.content.firstElementChild.cloneNode(true);

                node.dataset.id = itemData.id;
                node.dataset.answerIndex = itemData.answerIndex;
                node.dataset.accept = itemData.text;
                node.dataset.audio = itemData.audio || '';
                node.setAttribute('aria-label', 'Answer: ' + normalizeAnswerText(itemData.text || ''));
                node.setAttribute('aria-grabbed', 'false');

                if (ANSWER_TILE_TYPE === 'audio') {
                    node.classList.add('ddb-audio-tile');
                    node.setAttribute('aria-label', 'Audio answer. Press play to listen, or drag the card to a blank.');
                    node.innerHTML = [
                        '<span class="ddb-audio-tile-main">',
                        '<button type="button" class="ddb-audio-tile-btn" data-ddb-audio-button="1" aria-label="Play audio">',
                        '<svg class="h-4 w-4 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24" aria-hidden="true">',
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M5 9v6h4l5 4V5L9 9H5z"></path>',
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M17 9.5a4 4 0 010 5"></path>',
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 7a7 7 0 010 10"></path>',
                        '</svg>',
                        '</button>',
                        '</span>',
                        '<span class="ddb-audio-tile-grip" aria-hidden="true"></span>'
                    ].join('');

                    node.querySelector('[data-ddb-audio-button]').addEventListener('pointerdown', function(e){
                        e.stopPropagation();
                    });
                    node.querySelector('[data-ddb-audio-button]').addEventListener('click', function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        playTileAudio(itemData.audio || '', node);
                    });
                } else {
                    var answerTextLength = normalizeAnswerText(itemData.text || '').length;

                    if (answerTextLength > 42) {
                        node.classList.add('ddb-long-answer');
                    } else if (answerTextLength > 18) {
                        node.classList.add('ddb-phrase-answer');
                    } else {
                        node.classList.add('ddb-short-answer');
                    }

                    node.textContent = itemData.text;
                }

                node.addEventListener('pointerdown', function(e){
                    self.handlePointerDown(e, node);
                });

                return node;
            };

            DragDropBlanksGame.prototype.ensureActiveTileCount = function(){
                var deck = this.tileDeck;
                var desired = this.getVisibleWordLimit();

                if (!deck) return;

                if (EXERCISE_PAGE_SIZE > 0) {
                    var pageIndex = this.activeExercisePage;
                    var lockedIds = new Set(Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot .ddb-locked')).map(function(tile){
                        return tile.dataset.id;
                    }));
                    deck.active = deck.all.filter(function(item){
                        return Math.floor((item.answerIndex - 1) / EXERCISE_PAGE_SIZE) === pageIndex && !lockedIds.has(item.id);
                    });
                    deck.waiting = [];
                    return;
                }

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

                deck.active.forEach(function(itemData){
                    var node = self.createTileNode(itemData);
                    self.poolContent.appendChild(node);
                });

                this.updateNavButtons();
                this.updatePoolSticky();
            };

            DragDropBlanksGame.prototype.updateNavButtons = function(){
                var deck = this.tileDeck;
                if (!deck) return;

                if (EXERCISE_PAGE_SIZE > 0) {
                    if (this.prevWordsBtn) {
                        this.prevWordsBtn.classList.remove('hidden');
                        this.prevWordsBtn.disabled = this.activeExercisePage === 0;
                    }
                    if (this.nextWordsBtn) {
                        this.nextWordsBtn.classList.remove('hidden');
                        this.nextWordsBtn.disabled = this.activeExercisePage >= EXERCISE_PAGE_COUNT - 1;
                    }
                    return;
                }

                if (SHOW_ALL_BANK_ITEMS) {
                    if (this.prevWordsBtn) {
                        this.prevWordsBtn.classList.add('hidden');
                        this.prevWordsBtn.disabled = true;
                    }
                    if (this.nextWordsBtn) {
                        this.nextWordsBtn.classList.add('hidden');
                        this.nextWordsBtn.disabled = true;
                    }
                    return;
                }

                if (this.prevWordsBtn) {
                    var hasPrevWords = deck.history.length > 0;
                    this.prevWordsBtn.classList.remove('hidden');
                    this.prevWordsBtn.disabled = !hasPrevWords;
                }

                if (this.nextWordsBtn) {
                    var hasNextWords = deck.waiting.length > 0;
                    this.nextWordsBtn.classList.remove('hidden');
                    this.nextWordsBtn.disabled = !hasNextWords;
                }
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

            DragDropBlanksGame.prototype.getCurrentBlanks = function(){
                var pageIndex = this.activeExercisePage;
                return Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).filter(function(blank){
                    if (!EXERCISE_PAGE_SIZE) return true;
                    var sentence = blank.closest('[data-ddb-exercise-page]');
                    return sentence && Number(sentence.dataset.ddbExercisePage) === pageIndex;
                });
            };

            DragDropBlanksGame.prototype.showExercisePage = function(index, scrollToStart){
                if (index < 0 || index >= EXERCISE_PAGE_COUNT || this.draggedItem || this.isRevealingAnswers) return;
                this.activeExercisePage = index;
                Array.prototype.slice.call(document.querySelectorAll('[data-ddb-exercise-page]')).forEach(function(sentence){
                    sentence.hidden = Number(sentence.dataset.ddbExercisePage) !== index;
                });
                this.loadTiles();
                this.updateActionButtons();
                if (scrollToStart !== false && this.poolRail) {
                    this.poolRail.scrollIntoView({ block: 'start', behavior: 'auto' });
                }
            };

            DragDropBlanksGame.prototype.showNextWords = function(){
                if (EXERCISE_PAGE_SIZE > 0) {
                    this.showExercisePage(this.activeExercisePage + 1);
                    return;
                }
                if (SHOW_ALL_BANK_ITEMS) return;

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
                if (EXERCISE_PAGE_SIZE > 0) {
                    this.showExercisePage(this.activeExercisePage - 1);
                    return;
                }
                if (SHOW_ALL_BANK_ITEMS) return;

                var deck = this.tileDeck;
                if (!deck || this.draggedItem || deck.history.length === 0) return;

                while (deck.active.length > 0) {
                    deck.waiting.unshift(deck.active.pop());
                }

                deck.active = deck.history.pop();
                this.renderActiveTiles();
            };

            DragDropBlanksGame.prototype.updatePoolCount = function(){
                if (EXERCISE_PAGE_SIZE > 0) {
                    if (this.poolCount) this.poolCount.textContent = 'Part ' + (this.activeExercisePage + 1) + ' of ' + EXERCISE_PAGE_COUNT;
                    return;
                }
                var total = ANSWERS.length;
                var locked = document.querySelectorAll('.ddb-blank-slot .ddb-draggable-item.ddb-locked').length;
                var remaining = total - locked;

                if (this.poolCount) this.poolCount.textContent = remaining + '/' + total;
            };

            DragDropBlanksGame.prototype.getRemainingTileCount = function(){
                if (EXERCISE_PAGE_SIZE > 0) {
                    return this.getCurrentBlanks().filter(function(blank){ return blank.children.length === 0; }).length;
                }
                return ANSWERS.length - document.querySelectorAll('.ddb-blank-slot .ddb-draggable-item.ddb-locked').length;
            };

            DragDropBlanksGame.prototype.updateActionButtons = function(){
                var canReveal = this.getRemainingTileCount() > 0 && (EXERCISE_PAGE_SIZE > 0 || !this.hasUsedReveal) && !this.isRevealingAnswers && !this.gameCompleted && !this.isReviewingCorrection;
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

                tile.classList.remove('ring-emerald-400/50');
                tile.classList.add(
                    'ring-slate-400/40',
                    'revealed-answer'
                );

                if (!blank) return;

                blank.classList.remove('ddb-slot-ready');
                blank.classList.remove(
                    'ddb-slot-hover','ddb-wrong-slot',
                    'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                    'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                    'text-rose-700','border-rose-500/55','bg-rose-50/90',
                    'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                );
                blank.classList.add('ddb-revealed-slot');
            };

            DragDropBlanksGame.prototype.flashBlankState = function(blank, type){
                if (!blank) return;

                blank.classList.remove(
                    'ddb-slot-hover','ddb-revealed-slot','ddb-wrong-slot',
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
                    blank.classList.add('ddb-wrong-slot');
                    setTimeout(function(){
                        blank.classList.remove('ddb-wrong-slot');
                    }, 620);
                }
            };

            DragDropBlanksGame.prototype.clearHoverState = function(){
                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(b){
                    b.classList.remove('ddb-slot-hover');
                });
            };

            DragDropBlanksGame.prototype.stopDragTracking = function(){
                document.removeEventListener('pointermove', this.handlePointerMove);
                document.removeEventListener('pointerup', this.handlePointerUp);
                document.removeEventListener('pointercancel', this.handlePointerCancel);

                if (this._raf) {
                    cancelAnimationFrame(this._raf);
                    this._raf = null;
                }
            };

            DragDropBlanksGame.prototype.resetActiveDrag = function(restoreTile){
                var item = this.draggedItem;
                var placeholder = this.placeholder;

                this.stopDragTracking();
                this.clearHoverState();

                if (item) {
                    item.classList.remove('ddb-dragging','ddb-returning','ddb-shake','ddb-wrong-feedback');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';
                    item.setAttribute('aria-grabbed', 'false');

                    if (restoreTile !== false) {
                        if (placeholder && placeholder.parentNode) {
                            placeholder.parentNode.insertBefore(item, placeholder);
                        } else if (this.originalParent) {
                            this.originalParent.appendChild(item);
                        } else if (this.poolContent) {
                            this.poolContent.appendChild(item);
                        }
                    }
                }

                if (placeholder && placeholder.parentNode) {
                    placeholder.remove();
                }

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
            };

            DragDropBlanksGame.prototype.handlePointerCancel = function(){
                this.resetActiveDrag(true);
            };

            DragDropBlanksGame.prototype.handleWindowBlur = function(){
                if (this.draggedItem) {
                    this.resetActiveDrag(true);
                }
            };

            DragDropBlanksGame.prototype.handlePointerDown = function(e, item){
                var rect;

                if (item.classList.contains('ddb-locked') || this.draggedItem || this.gameCompleted || this.isRevealingAnswers) return;

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
                item.setAttribute('aria-grabbed', 'true');
                item.style.width = rect.width + 'px';

                this.offsetX = e.clientX - rect.left;
                this.offsetY = e.clientY - rect.top;

                document.body.appendChild(item);

                item.style.left = (e.clientX - this.offsetX) + 'px';
                item.style.top = (e.clientY - this.offsetY) + 'px';
                item.style.transform = 'scale(1.04) rotate(-1deg)';

                document.addEventListener('pointermove', this.handlePointerMove, { passive: false });
                document.addEventListener('pointerup', this.handlePointerUp, { passive: false });
                document.addEventListener('pointercancel', this.handlePointerCancel, { passive: false });
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

                this.stopDragTracking();

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

            };

            DragDropBlanksGame.prototype.checkHover = function(x, y){
                this.clearHoverState();

                var blank = this.getBlankTarget(x, y);
                if (blank) {
                    blank.classList.add('ddb-slot-hover');
                }
            };

            DragDropBlanksGame.prototype.getBlankTarget = function(x, y){
                var below;
                var exactBlank;
                var threshold;
                var nearestBlank = null;
                var nearestDistance = Infinity;

                if (!this.draggedItem) return null;

                this.draggedItem.hidden = true;
                below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;
                exactBlank = below.closest('.ddb-blank-slot');

                if (exactBlank) {
                    return exactBlank.children.length === 0 ? exactBlank : null;
                }

                threshold = window.innerWidth >= 1280 ? 42 : (window.innerWidth >= 640 ? 34 : 28);

                Array.prototype.slice.call(document.querySelectorAll('.ddb-blank-slot')).forEach(function(blank){
                    var rect;
                    var dx = 0;
                    var dy = 0;
                    var distance;

                    if (blank.children.length > 0 || !blank.getClientRects().length) return;

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

                item.classList.remove('ddb-dragging', 'ddb-returning', 'ddb-shake', 'ddb-wrong-feedback');
                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                blank.innerHTML = '';
                blank.appendChild(item);
                blank.style.minWidth = IS_SPEAKER_MATCHING_MODE ? getInitialBlankMinWidth(blank) : '0px';
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
                this.spawnBurst(blank, ['✓']);

                item.classList.remove('ddb-dragging', 'ddb-shake', 'ddb-wrong-feedback');

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                if (this.placeholder && this.placeholder.parentNode) this.placeholder.remove();
                this.placeholder = null;

                this.lockTileIntoBlank(item, blank, { countAsCorrect: true, countAsMistake: false, revealed: false });
                item.setAttribute('aria-grabbed', 'false');
                this.updateStats();
                this.removeActiveTileById(tileId);

                this.clearHoverState();
                this.draggedItem = null;
                this.originalParent = null;

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
                    item.classList.add('ddb-shake', 'ddb-wrong-feedback');

                    setTimeout(function(){
                        item.classList.remove('ddb-shake', 'ddb-wrong-feedback');
                    }, 380);
                }

                item.classList.add('ddb-returning');
                item.setAttribute('aria-grabbed', 'false');
                item.style.transform = 'scale(1)';

                if (this.placeholder) {
                    phRect = this.placeholder.getBoundingClientRect();
                    item.style.left = phRect.left + 'px';
                    item.style.top = phRect.top + 'px';
                }

                setTimeout(function(){
                    item.classList.remove('ddb-dragging','ddb-returning','ddb-wrong-feedback');
                    item.style.position = '';
                    item.style.left = '';
                    item.style.top = '';
                    item.style.width = '';
                    item.style.zIndex = '';
                    item.style.transform = '';

                    if (self.originalParent && self.placeholder && self.placeholder.parentNode) {
                        self.originalParent.insertBefore(item, self.placeholder);
                        self.placeholder.remove();
                    } else if (self.originalParent) {
                        self.originalParent.appendChild(item);
                    } else if (self.poolContent) {
                        self.poolContent.appendChild(item);
                    }
                    self.placeholder = null;
                    self.draggedItem = null;
                    self.originalParent = null;
                    self.clearHoverState();
                }, 440);
            };

            DragDropBlanksGame.prototype.handleRevealAnswers = function(){
                var self = this;
                var remainingAnswers;

                if (this.draggedItem || this.isRevealingAnswers || this.gameCompleted || (!EXERCISE_PAGE_SIZE && this.hasUsedReveal)) return;

                remainingAnswers = this.getCurrentBlanks().filter(function(blank){
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
                        audio: answerData.audio || '',
                        answerIndex: answerData.answerIndex
                    });

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

                var total = document.querySelectorAll('.ddb-blank-slot').length;
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
                    if (EXERCISE_PAGE_SIZE > 0) self.updatePoolCount();
                    else if (self.poolCount) self.poolCount.textContent = '0/0';
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

            window.resetSlide = function(){
                window.stopSlideAudio();
                if (window.dragDropBlanksGame) {
                    window.dragDropBlanksGame.init();
                }
            };

            document.addEventListener('DOMContentLoaded', function(){
                window.dragDropBlanksGame.init();
            });
        })();
    </script> 
@endsection
