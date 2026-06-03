@extends('slider.simple-layout')

@php
    $allowedTypes = ['letters', 'words', 'sentence'];
    $gameType = in_array(($content['type'] ?? 'letters'), $allowedTypes, true)
        ? (string) ($content['type'] ?? 'letters')
        : 'letters';

    $playerAudio = !empty($content['audio']) ? $content['audio'] : (!empty($content['audio_src']) ? $content['audio_src'] : null);
    $rawScript = $content['script'] ?? $content['transcript'] ?? [];
    $scriptLines = is_array($rawScript)
        ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
        : array_values(array_filter(
            array_map('trim', preg_split('/\R+/', trim((string) $rawScript)) ?: []),
            static fn ($line) => $line !== ''
        ));
    $hasScript = $scriptLines !== [];

    $defaultInstructions = [
        'letters' => 'Unscramble the letters to make the correct word.',
        'words' => 'Unscramble the words to make the correct answer.',
        'sentence' => 'Put the words in order to make correct sentences',
    ];

    $instructionText = trim((string) ($content['instruction'] ?? $defaultInstructions[$gameType] ?? 'Drag the tiles to make the correct answer.'));
    $pageTitle = trim((string) ($content['page_title'] ?? $content['title'] ?? 'Unscramble'));
    $nextButtonClass = trim((string) ($theme['button_primary_color'] ?? 'bg-indigo-600 hover:bg-indigo-500'));
    $themeName = strtolower((string) ($theme['name'] ?? 'default'));
    $isOrangeTheme = $themeName === 'orange';
    $isGreenTheme = $themeName === 'green';

    if ($isGreenTheme) {
        $nextButtonClass = 'bg-gradient-to-br from-emerald-700 via-emerald-600 to-green-500 dark:from-emerald-300 dark:via-emerald-400 dark:to-green-400 dark:text-emerald-950';
    }

    $accentButtonClass = $isOrangeTheme
        ? 'border-orange-300/80 bg-orange-50 text-orange-700 hover:bg-orange-100 dark:border-orange-500/35 dark:bg-orange-500/15 dark:text-orange-200 dark:hover:bg-orange-500/20'
        : ($isGreenTheme
            ? 'border-emerald-300/80 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 dark:border-emerald-500/35 dark:bg-emerald-500/15 dark:text-emerald-200 dark:hover:bg-emerald-500/20'
            : 'border-indigo-300/80 bg-indigo-50 text-indigo-700 hover:bg-indigo-100 dark:border-indigo-500/35 dark:bg-indigo-500/15 dark:text-indigo-200 dark:hover:bg-indigo-500/20');
    $accentSoftTextClass = $isOrangeTheme
        ? 'text-orange-700 dark:text-orange-200'
        : ($isGreenTheme ? 'text-emerald-700 dark:text-emerald-200' : 'text-indigo-700 dark:text-indigo-200');
    $accentRingClass = $isOrangeTheme
        ? 'focus-visible:ring-orange-400/30'
        : ($isGreenTheme ? 'focus-visible:ring-emerald-400/30' : 'focus-visible:ring-indigo-400/30');
    $slotFilledClasses = $isOrangeTheme
        ? ['border-orange-300/80', 'bg-orange-50/85', 'dark:border-orange-400/35', 'dark:bg-orange-500/10']
        : ($isGreenTheme
            ? ['border-emerald-300/80', 'bg-emerald-50/85', 'dark:border-emerald-400/35', 'dark:bg-emerald-500/10']
            : ['border-indigo-300/80', 'bg-indigo-50/80', 'dark:border-indigo-400/35', 'dark:bg-indigo-500/10']);
    $slotFocusClass = $isOrangeTheme
        ? 'focus-visible:ring-orange-400/25'
        : ($isGreenTheme ? 'focus-visible:ring-emerald-400/25' : 'focus-visible:ring-indigo-400/25');
    $slotHotClasses = $isOrangeTheme
        ? ['slot-hot', 'ring-4', 'ring-orange-300/50', 'border-orange-500', 'bg-orange-50/90', 'dark:bg-orange-500/15']
        : ($isGreenTheme
            ? ['slot-hot', 'ring-4', 'ring-emerald-300/50', 'border-emerald-500', 'bg-emerald-50/90', 'dark:bg-emerald-500/15']
            : ['slot-hot', 'ring-4', 'ring-indigo-300/50', 'border-indigo-500', 'bg-indigo-50/90', 'dark:bg-indigo-500/15']);
    $gameWidthClass = trim((string) ($content['game_width_class'] ?? 'max-w-5xl'));
    $verticalAlignment = trim((string) ($content['vertical_alignment'] ?? 'auto'));
    if (!in_array($verticalAlignment, ['auto', 'top', 'center'], true)) {
        $verticalAlignment = 'auto';
    }
    $topAlignGame = $verticalAlignment === 'top' || ($verticalAlignment === 'auto' && ($playerAudio || $hasScript));
    $mainJustifyClass = $topAlignGame ? 'justify-start pt-4 sm:pt-5' : 'justify-center pt-3 sm:pt-4';

    $normalizeChunkWords = static function ($value): array {
        if (is_array($value)) {
            $words = [];
            foreach ($value as $entry) {
                $entryText = trim((string) $entry);
                if ($entryText === '') {
                    continue;
                }
                $parts = preg_split('/\s+/u', $entryText) ?: [];
                foreach ($parts as $part) {
                    $part = trim((string) $part);
                    if ($part !== '') {
                        $words[] = $part;
                    }
                }
            }
            return $words;
        }

        $text = trim((string) $value);
        if ($text === '') {
            return [];
        }

        return array_values(array_filter(preg_split('/\s+/u', $text) ?: [], static fn ($part) => trim((string) $part) !== ''));
    };

    $normalizeScrambleItem = static function ($value) use ($normalizeChunkWords) {
        if (is_array($value)) {
            return $normalizeChunkWords($value);
        }

        if (is_string($value) || is_numeric($value)) {
            return trim((string) $value);
        }

        $candidate = $value['word'] ?? $value['label'] ?? $value['text'] ?? $value['value'] ?? '';
        return is_array($candidate) ? $normalizeChunkWords($candidate) : trim((string) $candidate);
    };

    $baseQuestions = [];
    $rawQuestions = is_array($content['questions'] ?? null) ? array_values($content['questions']) : [];

    foreach ($rawQuestions as $question) {
        if (!is_array($question)) {
            continue;
        }

        $prompt = trim((string) ($question['prompt'] ?? ''));
        $before = trim((string) ($question['before'] ?? ''));
        $after = trim((string) ($question['after'] ?? ''));
        $image = trim((string) ($question['image'] ?? ''));
        $rawAnswer = $question['answer'] ?? null;
        $chunks = [];

        if (is_array($rawAnswer)) {
            foreach ($rawAnswer as $chunk) {
                $chunkWords = $normalizeChunkWords($chunk);
                if ($chunkWords !== []) {
                    $chunks[] = $chunkWords;
                }
            }
        } elseif ($rawAnswer !== null) {
            $answerText = trim((string) $rawAnswer);
            if ($answerText !== '') {
                $chunks[] = $normalizeChunkWords($answerText);
            }
        }

        if ($chunks === []) {
            continue;
        }

        $baseQuestions[] = [
            'prompt' => $prompt,
            'before' => $before,
            'after' => $after,
            'image' => $image,
            'chunks' => $chunks,
        ];
    }

    if ($baseQuestions === []) {
        $rawSentences = is_array($content['sentences'] ?? null) ? array_values($content['sentences']) : [];
        $rawScramble = is_array($content['scramble'] ?? null) ? array_values($content['scramble']) : [];
        $scrambleItems = array_map($normalizeScrambleItem, $rawScramble);
        $placeholderPattern = '/\{\{\s*(\d+)\s*\}\}/';

        foreach ($rawSentences as $sentence) {
            $sentenceText = (string) $sentence;
            preg_match_all($placeholderPattern, $sentenceText, $matches, PREG_OFFSET_CAPTURE);
            if (empty($matches[1])) {
                continue;
            }

            $allMatches = $matches[0];
            $numberMatches = $matches[1];
            $firstOffset = $allMatches[0][1] ?? 0;
            $lastIndex = count($allMatches) - 1;
            $lastMatchText = $allMatches[$lastIndex][0] ?? '';
            $lastMatchOffset = $allMatches[$lastIndex][1] ?? 0;

            $before = trim(preg_replace('/\s+/u', ' ', substr($sentenceText, 0, $firstOffset)) ?? '');
            $after = trim(preg_replace('/\s+/u', ' ', substr($sentenceText, $lastMatchOffset + strlen($lastMatchText))) ?? '');

            $chunks = [];
            foreach ($numberMatches as $numberMatch) {
                $scrambleIndex = (int) ($numberMatch[0] ?? 0) - 1;
                $scrambleValue = $scrambleItems[$scrambleIndex] ?? '';

                if (is_array($scrambleValue)) {
                    if ($scrambleValue !== []) {
                        $chunks[] = $scrambleValue;
                    }
                    continue;
                }

                $chunkWords = $normalizeChunkWords($scrambleValue);
                if ($chunkWords !== []) {
                    $chunks[] = $chunkWords;
                }
            }

            if ($chunks === []) {
                continue;
            }

            $baseQuestions[] = [
                'prompt' => '',
                'before' => $before,
                'after' => $after,
                'image' => '',
                'chunks' => $chunks,
            ];
        }
    }

    $roundsData = [];

    foreach ($baseQuestions as $question) {
        $flatWords = [];
        foreach ($question['chunks'] as $chunkWords) {
            foreach ($chunkWords as $word) {
                $word = trim((string) $word);
                if ($word !== '') {
                    $flatWords[] = $word;
                }
            }
        }

        if ($flatWords === []) {
            continue;
        }

        $tokens = [];
        $groupSizes = [];

        if ($gameType === 'sentence') {
            $tokens = $flatWords;
        } elseif ($gameType === 'words') {
            foreach ($question['chunks'] as $chunkWords) {
                $chunkCount = 0;
                foreach ($chunkWords as $word) {
                    $word = trim((string) $word);
                    if ($word === '') {
                        continue;
                    }
                    $tokens[] = $word;
                    $chunkCount += 1;
                }
                if ($chunkCount > 0) {
                    $groupSizes[] = $chunkCount;
                }
            }
        } else {
            foreach ($flatWords as $word) {
                $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY) ?: [];
                if ($chars === []) {
                    continue;
                }
                $groupSizes[] = count($chars);
                foreach ($chars as $char) {
                    $tokens[] = $char;
                }
            }
        }

        if ($tokens === []) {
            continue;
        }

        $roundsData[] = [
            'prompt' => $question['prompt'],
            'before' => $question['before'],
            'after' => $question['after'],
            'image' => $question['image'],
            'tokens' => $tokens,
            'groups' => $groupSizes,
            'answer_normalized' => $gameType === 'letters'
                ? mb_strtolower(implode('', $flatWords))
                : mb_strtolower(implode(' ', $tokens)),
        ];
    }
@endphp

@section('title', $pageTitle)

@section('content')
    <main id="unscramble-game" class="min-h-[100dvh] w-full overflow-x-hidden bg-transparent text-slate-900 transition-colors duration-300 dark:text-slate-100">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1500px] flex-col {{ $mainJustifyClass }} px-3 pb-4 sm:px-5 sm:pb-5 lg:px-7">
            <div class="grid w-full place-items-center gap-2.5 text-center sm:gap-3">
                @include('slider.components.title-subtitle')

                @unless(!empty($content['hide_status_bar']))
                    @include('slider.components.game-status')
                @endunless

                @if($playerAudio || $hasScript)
                    <section class="mx-auto w-full max-w-5xl rounded-[1.35rem] border border-slate-200/70 bg-white/75 p-3 shadow-[0_12px_36px_rgba(2,6,23,0.06)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 sm:p-4">
                        @include('slider.components.audio-player')
                    </section>
                @endif

                <section id="uns-game-card" class="mx-auto w-full {{ $gameWidthClass }}">
                    <div class="relative isolate overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/75 p-2.5 text-left shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 sm:p-3 lg:p-4">
                        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.10)_0%,transparent_52%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.08)_0%,transparent_52%)] dark:bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.14)_0%,transparent_52%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.10)_0%,transparent_52%)]"></div>

                        <div class="relative z-[1] flex flex-wrap items-center justify-between gap-2.5">
                            <div class="min-w-0 flex flex-1 flex-wrap items-center gap-2">
                                <div id="uns-round-indicator" class="inline-flex rounded-full border border-slate-200/70 bg-white/75 px-2.5 py-1 text-[10px] font-black text-slate-500 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/45 dark:text-slate-300">
                                    0 of 0
                                </div>
                                <div class="min-w-0 text-xs font-black leading-[1.35] text-slate-900 dark:text-slate-100 sm:text-sm lg:text-base">
                                    {{ $instructionText }}
                                </div>
                            </div>

                            <button
                                    id="uns-reveal"
                                    type="button"
                                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border px-3 py-1.5 text-[11px] font-black shadow-sm transition duration-200 ease-out hover:scale-[1.03] active:scale-95 sm:text-xs {{ $accentButtonClass }} {{ $accentRingClass }} focus-visible:outline-none focus-visible:ring-4"
                            >
                                Reveal answer
                            </button>
                        </div>

                        <div class="relative z-[1] mt-2.5 grid gap-2.5 sm:mt-3 sm:gap-3">
                            <div id="uns-image-wrap" class="hidden justify-center">
                                <img id="uns-image" src="" alt="" class="aspect-[5/3] w-full max-w-[15rem] rounded-[1.35rem] object-cover shadow-[0_12px_30px_rgba(2,6,23,0.12)] sm:max-w-[17rem] lg:max-w-[19rem]">
                            </div>

                            <div class="rounded-[1.25rem] border border-slate-200/70 bg-white/80 p-2.5 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/35 sm:p-3">
                                <div id="uns-prompt" class="hidden mb-2 text-left text-[11px] font-black uppercase tracking-[0.14em] {{ $accentSoftTextClass }} sm:text-xs"></div>
                                <div id="uns-answer-feedback" class="hidden mb-2 text-left">
                                    <span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-black tracking-[0.08em] sm:text-sm"></span>
                                </div>

                                <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-2 rounded-[1rem] border border-slate-200/60 bg-slate-50/55 px-3 py-3 text-center dark:border-slate-700/50 dark:bg-slate-900/30 sm:px-4 sm:py-3.5">
                                    <span id="uns-before" class="text-sm font-bold leading-[1.5] text-slate-900 dark:text-slate-100 sm:text-base lg:text-[1.05rem]"></span>
                                    <div id="uns-slots" class="flex flex-wrap items-center justify-center gap-2 sm:gap-2.5"></div>
                                    <span id="uns-after" class="text-sm font-bold leading-[1.5] text-slate-900 dark:text-slate-100 sm:text-base lg:text-[1.05rem]"></span>
                                </div>
                            </div>

                            <div class="rounded-[1.25rem] border border-slate-200/70 bg-slate-50/80 p-2.5 shadow-sm backdrop-blur dark:border-slate-700/60 dark:bg-slate-950/35 sm:p-3">
                                <div class="mb-2 flex flex-wrap items-center justify-between gap-2">
                                    <div class="text-left text-[11px] font-black uppercase tracking-[0.14em] text-slate-500 dark:text-slate-300">
                                        Tile Bank
                                    </div>
                                    <div class="inline-flex rounded-full border border-slate-200/80 bg-white/75 px-2 py-1 text-[10px] font-bold text-slate-500 shadow-sm dark:border-slate-700/70 dark:bg-slate-900/60 dark:text-slate-300 sm:hidden">
                                        Tap or drag
                                    </div>
                                </div>

                                <div id="uns-bank" class="flex flex-wrap items-center justify-center gap-2 sm:gap-2.5"></div>
                            </div>
                        </div>

                        <div class="relative z-[1] mt-2.5 grid grid-cols-2 gap-2 sm:mt-3 lg:grid-cols-4 lg:gap-2.5">
                            <button id="uns-reset" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-300/70 bg-white/75 px-3 py-2 text-xs font-black text-slate-600 shadow-sm transition duration-200 ease-out hover:scale-[1.02] hover:bg-white active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm">
                                Reset
                            </button>

                            <button id="uns-hint" type="button" class="inline-flex w-full items-center justify-center rounded-lg border px-3 py-2 text-xs font-black shadow-sm transition duration-200 ease-out hover:scale-[1.02] active:scale-95 disabled:cursor-not-allowed disabled:opacity-55 sm:text-sm {{ $accentButtonClass }}">
                                Hint (<span id="uns-hint-count">2</span>)
                            </button>

                            <button id="uns-prev" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-300/70 bg-white/75 px-3 py-2 text-xs font-black text-slate-600 shadow-sm transition duration-200 ease-out hover:scale-[1.02] hover:bg-white active:scale-95 dark:border-slate-700/70 dark:bg-slate-900/55 dark:text-slate-200 dark:hover:bg-slate-800 sm:text-sm">
                                ‹ Previous
                            </button>

                            <button id="uns-next" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-transparent px-3 py-2 text-xs font-black text-white shadow-[0_10px_24px_rgba(79,70,229,.14)] transition duration-200 ease-out hover:scale-[1.03] active:scale-95 sm:text-sm {{ $nextButtonClass }}">
                                Next ›
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        @include('slider.components.game-win-modal', [
            'modalId' => 'uns-results',
            'modalTitle' => 'Done!',
            'modalStats' => [
                ['label' => 'Score', 'id' => 'uns-final-score'],
                ['label' => 'Time', 'id' => 'uns-final-time'],
                ['label' => 'Mistakes', 'id' => 'uns-final-mistakes'],
            ],
            'modalActions' => [
                [
                    'label' => 'Restart',
                    'id' => 'uns-restart-popup',
                    'class' => 'inline-flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-8 py-3 text-sm font-black text-slate-900 shadow-[0_8px_22px_#0206170D] transition hover:scale-[1.02] hover:bg-slate-50 active:scale-95 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700',
                ],
                [
                    'label' => 'Continue',
                    'id' => 'uns-continue-popup',
                    'class' => 'inline-flex w-full items-center justify-center rounded-xl border border-white/20 px-8 py-3 text-sm font-black text-white shadow-[0_10px_24px_#4F46E51A] transition hover:scale-[1.02] active:scale-95 ' . $nextButtonClass,
                ],
            ],
        ])
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const GAME_TYPE = @json($gameType);
            const QUESTION_SOURCE = @json($roundsData);
            const SLOT_FILLED_CLASSES = @json($slotFilledClasses);
            const SLOT_FOCUS_CLASS = @json($slotFocusClass);
            const SLOT_HOT_CLASSES = @json($slotHotClasses);

            const root = document.getElementById('unscramble-game');
            if (!root) return;

            const roundLabel = document.getElementById('tilesCount');
            const correctCount = document.getElementById('correctCount');
            const mistakesCount = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');
            const hintCount = document.getElementById('uns-hint-count');
            const roundIndicator = document.getElementById('uns-round-indicator');

            const promptEl = document.getElementById('uns-prompt');
            const beforeEl = document.getElementById('uns-before');
            const afterEl = document.getElementById('uns-after');
            const imageWrap = document.getElementById('uns-image-wrap');
            const imageEl = document.getElementById('uns-image');
            const feedbackWrap = document.getElementById('uns-answer-feedback');
            const feedbackPill = feedbackWrap ? feedbackWrap.querySelector('span') : null;
            const bankEl = document.getElementById('uns-bank');
            const slotsEl = document.getElementById('uns-slots');

            const resetBtn = document.getElementById('uns-reset');
            const hintBtn = document.getElementById('uns-hint');
            const revealBtn = document.getElementById('uns-reveal');
            const prevBtn = document.getElementById('uns-prev');
            const nextBtn = document.getElementById('uns-next');

            const resultsOverlay = document.getElementById('uns-results');
            const finalScoreEl = document.getElementById('uns-final-score');
            const finalTimeEl = document.getElementById('uns-final-time');
            const finalMistakesEl = document.getElementById('uns-final-mistakes');
            const restartPopupBtn = document.getElementById('uns-restart-popup');
            const continuePopupBtn = document.getElementById('uns-continue-popup');
            let feedbackResetTimer = null;

            const sfx = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav'),
                tap: new Audio('/slider/sounds/click.wav')
            };

            sfx.correct.volume = 0.55;
            sfx.wrong.volume = 0.55;
            sfx.success.volume = 0.65;
            sfx.tap.volume = 0.25;

            function play(sound) {
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(function () {});
            }

            function stopAllSfx() {
                Object.values(sfx).forEach(function (audio) {
                    audio.pause();
                    audio.currentTime = 0;
                });
            }

            function formatTime(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return mins + ':' + String(secs).padStart(2, '0');
            }

            function shuffle(items) {
                const copy = items.slice();
                for (let i = copy.length - 1; i > 0; i -= 1) {
                    const j = Math.floor(Math.random() * (i + 1));
                    const temp = copy[i];
                    copy[i] = copy[j];
                    copy[j] = temp;
                }
                return copy;
            }

            function makeId() {
                return Math.random().toString(16).slice(2) + Date.now().toString(16);
            }

            function shuffleTileGroup(source) {
                if (source.length <= 1) {
                    return source.slice();
                }

                let shuffled = shuffle(source);
                let attempts = 0;
                while (attempts < 10 && shuffled.every(function (tile, index) {
                    return tile.text === source[index].text;
                })) {
                    shuffled = shuffle(source);
                    attempts += 1;
                }

                return shuffled;
            }

            function buildShuffledTiles(tokens, groups) {
                const source = tokens.map(function (token, index) {
                    return {
                        id: makeId(),
                        text: token,
                        used: false
                    };
                });

                if (source.length <= 1) {
                    return source;
                }

                const normalizedGroups = Array.isArray(groups)
                    ? groups.map(function (size) { return Number(size) || 0; }).filter(function (size) { return size > 0; })
                    : [];

                if (!normalizedGroups.length) {
                    return shuffleTileGroup(source);
                }

                const groupedTiles = [];
                let cursor = 0;

                normalizedGroups.forEach(function (size) {
                    const group = source.slice(cursor, cursor + size);
                    if (!group.length) return;
                    groupedTiles.push.apply(groupedTiles, shuffleTileGroup(group));
                    cursor += size;
                });

                if (cursor < source.length) {
                    groupedTiles.push.apply(groupedTiles, shuffleTileGroup(source.slice(cursor)));
                }

                return groupedTiles;
            }

            function buildRound(round) {
                return {
                    prompt: String(round.prompt || '').trim(),
                    before: String(round.before || '').trim(),
                    after: String(round.after || '').trim(),
                    image: String(round.image || '').trim(),
                    tokens: Array.isArray(round.tokens) ? round.tokens.map(function (token) { return String(token || '').trim(); }).filter(Boolean) : [],
                    groups: Array.isArray(round.groups) ? round.groups.map(function (size) { return Number(size) || 0; }).filter(function (size) { return size > 0; }) : [],
                    answerNormalized: String(round.answer_normalized || '').trim().toLowerCase(),
                    tiles: [],
                    slots: [],
                    solved: false
                };
            }

            function prepareRound(round) {
                round.tiles = buildShuffledTiles(round.tokens, round.groups);
                round.slots = round.tokens.map(function () {
                    return { tileId: null, text: '' };
                });
                round.solved = false;
                return round;
            }

            function buildRounds() {
                return QUESTION_SOURCE.map(buildRound).map(prepareRound);
            }

            const state = {
                idx: 0,
                locked: false,
                correct: 0,
                mistakes: 0,
                hintsLeft: 2,
                rounds: buildRounds()
            };

            let timerInt = null;
            let startTime = Date.now();
            let suppressClickUntil = 0;
            let drag = {
                pointerId: null,
                tileId: null,
                startX: 0,
                startY: 0,
                moved: false,
                active: false,
                ghost: null,
                over: null
            };

            function currentRound() {
                return state.rounds[state.idx] || null;
            }

            function currentAnswerString() {
                const round = currentRound();
                if (!round) return '';
                if (GAME_TYPE === 'letters') {
                    return round.slots.map(function (slot) { return slot.text; }).join('').toLowerCase();
                }
                return round.slots.map(function (slot) { return slot.text; }).join(' ').toLowerCase();
            }

            function allFilled() {
                const round = currentRound();
                return !!round && round.slots.every(function (slot) { return !!slot.tileId; });
            }

            function findTile(id) {
                const round = currentRound();
                return round ? round.tiles.find(function (tile) { return tile.id === id; }) || null : null;
            }

            function nextEmptySlot() {
                const round = currentRound();
                return round ? round.slots.findIndex(function (slot) { return !slot.tileId; }) : -1;
            }

            function setQuestionImage(src, alt) {
                if (!imageWrap || !imageEl) return;
                if (src) {
                    imageEl.src = src;
                    imageEl.alt = alt || 'Question image';
                    imageWrap.classList.remove('hidden');
                    imageWrap.classList.add('flex');
                } else {
                    imageEl.removeAttribute('src');
                    imageEl.alt = '';
                    imageWrap.classList.add('hidden');
                    imageWrap.classList.remove('flex');
                }
            }

            function setDisabled(button, disabled) {
                if (!button) return;
                button.disabled = disabled;
                button.classList.toggle('opacity-60', disabled);
                button.classList.toggle('pointer-events-none', disabled);
                button.classList.toggle('cursor-not-allowed', disabled);
            }

            function clearAnswerFeedback() {
                if (!feedbackWrap || !feedbackPill) return;
                feedbackWrap.classList.add('hidden');
                feedbackPill.textContent = '';
                feedbackPill.className = 'inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-black tracking-[0.08em] sm:text-sm';
            }

            function animateAnswerFeedback(type) {
                if (!feedbackWrap || !feedbackPill) return;

                if (feedbackResetTimer) {
                    clearTimeout(feedbackResetTimer);
                    feedbackResetTimer = null;
                }

                clearAnswerFeedback();

                const isCorrect = type === 'correct';
                const isNeutral = type === 'neutral';
                feedbackWrap.classList.remove('hidden');
                feedbackPill.textContent = isCorrect ? 'Correct' : (isNeutral ? 'Answer revealed' : 'Try again');
                feedbackPill.classList.add(
                    isCorrect ? 'bg-emerald-100' : (isNeutral ? 'bg-slate-100' : 'bg-rose-100'),
                    isCorrect ? 'text-emerald-800' : (isNeutral ? 'text-slate-700' : 'text-rose-800'),
                    isCorrect ? 'dark:bg-emerald-500/15' : (isNeutral ? 'dark:bg-slate-700/40' : 'dark:bg-rose-500/15'),
                    isCorrect ? 'dark:text-emerald-300' : (isNeutral ? 'dark:text-slate-200' : 'dark:text-rose-300')
                );

                feedbackPill.getAnimations().forEach(function (animation) {
                    animation.cancel();
                });
                feedbackPill.animate(
                    [
                        { opacity: 0, transform: 'translateY(-6px) scale(0.96)', offset: 0 },
                        { opacity: 1, transform: 'translateY(0) scale(1)', offset: 0.45 },
                        { opacity: 1, transform: 'translateY(0) scale(1)', offset: 1 }
                    ],
                    {
                        duration: 260,
                        easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                        fill: 'both'
                    }
                );

                feedbackResetTimer = setTimeout(function () {
                    clearAnswerFeedback();
                    feedbackResetTimer = null;
                }, isCorrect ? 700 : (isNeutral ? 750 : 600));
            }

            function updateTopUI() {
                const total = state.rounds.length;
                const round = currentRound();

                if (roundLabel) roundLabel.textContent = total ? (state.idx + 1) + '/' + total : '0/0';
                if (roundIndicator) roundIndicator.textContent = total ? (state.idx + 1) + ' of ' + total : '0 of 0';
                if (correctCount) correctCount.textContent = String(state.correct);
                if (mistakesCount) mistakesCount.textContent = String(state.mistakes);
                if (hintCount) hintCount.textContent = String(state.hintsLeft);

                setDisabled(prevBtn, state.idx <= 0 || state.locked);
                setDisabled(nextBtn, state.idx >= total - 1 || state.locked);
                setDisabled(hintBtn, !round || round.solved || state.hintsLeft <= 0 || state.locked);
                setDisabled(revealBtn, !round || round.solved || state.locked);
            }

            function renderPrompt() {
                const round = currentRound();
                if (!round) {
                    promptEl.classList.add('hidden');
                    beforeEl.textContent = '';
                    afterEl.textContent = '';
                    setQuestionImage('', '');
                    return;
                }

                if (round.prompt) {
                    promptEl.textContent = round.prompt;
                    promptEl.classList.remove('hidden');
                } else {
                    promptEl.textContent = '';
                    promptEl.classList.add('hidden');
                }

                beforeEl.textContent = round.before || '';
                afterEl.textContent = round.after || '';
                setQuestionImage(round.image || '', round.prompt || 'Question image');
            }

            function slotSizeClasses() {
                if (GAME_TYPE === 'letters') {
                    return 'min-h-[40px] min-w-[40px] px-2.5 py-2 text-sm sm:min-h-[46px] sm:min-w-[46px] sm:px-2.5 sm:text-base lg:min-h-[48px] lg:min-w-[48px]';
                }
                if (GAME_TYPE === 'sentence') {
                    return 'min-h-[42px] min-w-[62px] px-3 py-2 text-sm sm:min-h-[50px] sm:min-w-[76px] sm:px-3.5 sm:text-base';
                }
                return 'min-h-[42px] min-w-[70px] px-3 py-2 text-sm sm:min-h-[50px] sm:min-w-[86px] sm:px-3.5 sm:text-base';
            }

            function tileSizeClasses() {
                if (GAME_TYPE === 'letters') {
                    return 'min-h-[40px] min-w-[48px] px-2.5 py-2 text-sm sm:min-h-[50px] sm:min-w-[58px] sm:px-3 sm:text-lg';
                }
                if (GAME_TYPE === 'sentence') {
                    return 'min-h-[42px] px-3 py-2 text-sm sm:min-h-[50px] sm:px-3.5 sm:text-base';
                }
                return 'min-h-[42px] min-w-[70px] px-3 py-2 text-sm sm:min-h-[50px] sm:min-w-[86px] sm:px-3.5 sm:text-base';
            }

            function buildGroupedIndexes(groups, total) {
                if (GAME_TYPE === 'sentence' || !groups.length) {
                    return [Array.from({ length: total }, function (_, index) { return index; })];
                }

                const output = [];
                let cursor = 0;
                groups.forEach(function (size) {
                    output.push(Array.from({ length: size }, function (_, index) { return cursor + index; }));
                    cursor += size;
                });
                return output;
            }

            function createSlotButton(slot, slotIndex) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.slotIndex = String(slotIndex);
                if (slot.text) button.dataset.filled = '1';
                button.className = [
                    'slot',
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'rounded-xl',
                    'border-2',
                    'border-dashed',
                    ...(slot.text ? SLOT_FILLED_CLASSES : ['border-slate-300/90', 'bg-white/90', 'dark:border-slate-600/80', 'dark:bg-slate-950/45']),
                    'font-black',
                    'text-slate-900',
                    'shadow-sm',
                    'transition',
                    'active:scale-95',
                    'focus-visible:outline-none',
                    'focus-visible:ring-4',
                    SLOT_FOCUS_CLASS,
                    'dark:text-slate-50',
                    slotSizeClasses()
                ].join(' ');

                button.textContent = slot.text || '';
                button.addEventListener('click', function () {
                    if (state.locked) return;
                    const round = currentRound();
                    if (!round || round.solved) return;
                    clearSlot(slotIndex);
                });
                return button;
            }

            function renderSlots() {
                const round = currentRound();
                slotsEl.innerHTML = '';
                if (!round) return;

                const groupedIndexes = buildGroupedIndexes(round.groups || [], round.slots.length);
                const wrapperClasses = GAME_TYPE === 'sentence'
                    ? 'flex flex-wrap items-center justify-center gap-2 sm:gap-2.5'
                    : 'inline-flex flex-wrap items-center justify-center gap-2 rounded-2xl border border-dashed border-slate-200/80 bg-white/65 px-2 py-2 dark:border-slate-700/70 dark:bg-slate-900/35';

                groupedIndexes.forEach(function (indexes) {
                    const group = document.createElement('div');
                    group.className = wrapperClasses;
                    indexes.forEach(function (slotIndex) {
                        group.appendChild(createSlotButton(round.slots[slotIndex], slotIndex));
                    });
                    slotsEl.appendChild(group);
                });
            }

            function startGhost(button, x, y) {
                const ghost = button.cloneNode(true);
                ghost.style.position = 'fixed';
                ghost.style.zIndex = '9999';
                ghost.style.pointerEvents = 'none';
                ghost.style.opacity = '0.94';
                ghost.style.transform = 'translate(-50%, -50%) scale(1.06)';
                ghost.classList.add('shadow-2xl');
                document.body.appendChild(ghost);
                drag.ghost = ghost;
                moveGhost(x, y);
            }

            function moveGhost(x, y) {
                if (!drag.ghost) return;
                drag.ghost.style.left = x + 'px';
                drag.ghost.style.top = y + 'px';
            }

            function clearHot() {
                root.querySelectorAll('.slot-hot').forEach(function (element) {
                    element.classList.remove(...SLOT_HOT_CLASSES);
                });
            }

            function stopGhost() {
                if (drag.ghost) {
                    drag.ghost.remove();
                    drag.ghost = null;
                }
                clearHot();
                drag.over = null;
            }

            function slotUnderPointer(x, y) {
                const element = document.elementFromPoint(x, y);
                return element && element.closest ? element.closest('.slot') : null;
            }

            function stopDragging() {
                drag.active = false;
                drag.pointerId = null;
                drag.tileId = null;
                drag.moved = false;
                stopGhost();
                document.removeEventListener('pointermove', handleGlobalPointerMove);
                document.removeEventListener('pointerup', handleGlobalPointerUp);
                document.removeEventListener('pointercancel', handleGlobalPointerUp);
            }

            function maybeStartDragging(clientX, clientY, tileId, button) {
                if (drag.active) return;
                const dx = clientX - drag.startX;
                const dy = clientY - drag.startY;
                if (Math.hypot(dx, dy) < 8) return;
                drag.active = true;
                drag.moved = true;
                drag.tileId = tileId;
                startGhost(button, clientX, clientY);
            }

            function handleGlobalPointerMove(event) {
                if (drag.pointerId !== event.pointerId) return;
                const button = root.querySelector('[data-tile-id="' + drag.tileId + '"]');
                if (!button) return;

                maybeStartDragging(event.clientX, event.clientY, drag.tileId, button);
                if (!drag.active) return;

                event.preventDefault();
                moveGhost(event.clientX, event.clientY);
                const slot = slotUnderPointer(event.clientX, event.clientY);
                clearHot();

                if (slot && !slot.dataset.filled) {
                    slot.classList.add(...SLOT_HOT_CLASSES);
                    drag.over = slot;
                } else {
                    drag.over = null;
                }
            }

            function handleGlobalPointerUp(event) {
                if (drag.pointerId !== event.pointerId) return;

                const tileId = drag.tileId;
                const slot = drag.over;
                const wasDragging = drag.active;
                stopDragging();
                if (wasDragging) suppressClickUntil = Date.now() + 120;
                if (!wasDragging || !slot || !tileId) return;

                const slotIndex = Number(slot.dataset.slotIndex);
                placeTile(tileId, { preferredSlot: slotIndex });
            }

            function createTileButton(tile) {
                const button = document.createElement('button');
                button.type = 'button';
                button.dataset.tileId = tile.id;
                button.className = [
                    'tile',
                    'relative',
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'rounded-xl',
                    'border',
                    'border-slate-200/80',
                    'bg-white/95',
                    'font-black',
                    'text-slate-900',
                    'shadow-[0_7px_16px_rgba(15,23,42,0.08)]',
                    'transition',
                    'hover:-translate-y-0.5',
                    'hover:shadow-[0_10px_22px_rgba(15,23,42,0.12)]',
                    'active:scale-95',
                    'focus-visible:outline-none',
                    'focus-visible:ring-4',
                    SLOT_FOCUS_CLASS,
                    'dark:border-slate-700/70',
                    'dark:bg-slate-900/80',
                    'dark:text-slate-50',
                    'dark:shadow-black/20',
                    tileSizeClasses()
                ].join(' ');
                button.textContent = tile.text;

                if (tile.used) {
                    button.classList.add('opacity-25', 'pointer-events-none', 'scale-95');
                }

                button.addEventListener('click', function () {
                    if (state.locked || tile.used) return;
                    if (Date.now() < suppressClickUntil) return;
                    play(sfx.tap);
                    placeTile(tile.id);
                });

                button.addEventListener('pointerdown', function (event) {
                    if (state.locked || tile.used) return;
                    drag.pointerId = event.pointerId;
                    drag.tileId = tile.id;
                    drag.startX = event.clientX;
                    drag.startY = event.clientY;
                    drag.moved = false;
                    drag.over = null;
                    document.addEventListener('pointermove', handleGlobalPointerMove, { passive: false });
                    document.addEventListener('pointerup', handleGlobalPointerUp);
                    document.addEventListener('pointercancel', handleGlobalPointerUp);
                    button.setPointerCapture && button.setPointerCapture(event.pointerId);
                });

                return button;
            }

            function renderBank() {
                const round = currentRound();
                bankEl.innerHTML = '';
                if (!round) return;

                const wrapperClass = GAME_TYPE === 'sentence'
                    ? 'contents'
                    : 'inline-flex flex-wrap items-center justify-center gap-2 rounded-2xl border border-dashed border-slate-200/80 bg-white/65 px-2 py-2 dark:border-slate-700/70 dark:bg-slate-900/35';

                const groups = buildGroupedIndexes(round.groups || [], round.tiles.length);

                groups.forEach(function (indexes) {
                    const currentGroup = document.createElement('div');
                    currentGroup.className = wrapperClass;
                    indexes.forEach(function (tileIndex) {
                        const tile = round.tiles[tileIndex];
                        if (!tile) return;
                        currentGroup.appendChild(createTileButton(tile));
                    });
                    bankEl.appendChild(currentGroup);
                });
            }

            function syncUI() {
                const round = currentRound();
                renderPrompt();
                renderSlots();
                renderBank();
                updateTopUI();

                if (!round) {
                    slotsEl.innerHTML = '';
                    bankEl.innerHTML = '';
                }
            }

            function placeTile(tileId, options) {
                const round = currentRound();
                const tile = findTile(tileId);
                if (!round || !tile || tile.used || round.solved || state.locked) return;

                let slotIndex = typeof (options && options.preferredSlot) === 'number' ? options.preferredSlot : -1;
                if (!(slotIndex >= 0 && round.slots[slotIndex] && !round.slots[slotIndex].tileId)) {
                    slotIndex = nextEmptySlot();
                }
                if (slotIndex < 0) return;

                round.slots[slotIndex].tileId = tile.id;
                round.slots[slotIndex].text = tile.text;
                tile.used = true;
                syncUI();

                if (allFilled()) {
                    setTimeout(checkCurrent, 120);
                }
            }

            function clearSlot(slotIndex) {
                const round = currentRound();
                if (!round || state.locked) return;
                const slot = round.slots[slotIndex];
                if (!slot || !slot.tileId) return;
                const tile = findTile(slot.tileId);
                if (tile) tile.used = false;
                slot.tileId = null;
                slot.text = '';
                syncUI();
            }

            function resetRound() {
                const round = currentRound();
                if (!round || state.locked) return;
                round.tiles.forEach(function (tile) { tile.used = false; });
                round.tiles = buildShuffledTiles(round.tokens, round.groups);
                round.slots = round.tokens.map(function () {
                    return { tileId: null, text: '' };
                });
                round.solved = false;
                syncUI();
            }

            function useHint() {
                const round = currentRound();
                if (!round || round.solved || state.hintsLeft <= 0 || state.locked) return;
                const firstMissing = round.slots.findIndex(function (slot) { return !slot.tileId; });
                if (firstMissing < 0) return;
                const needed = round.tokens[firstMissing];
                const tile = round.tiles.find(function (entry) {
                    return !entry.used && entry.text === needed;
                });
                if (!tile) return;
                state.hintsLeft -= 1;
                placeTile(tile.id, { preferredSlot: firstMissing });
                updateTopUI();
            }

            function revealCurrent() {
                const round = currentRound();
                if (!round || round.solved || state.locked) return;

                round.tiles.forEach(function (tile) {
                    tile.used = false;
                });
                round.slots.forEach(function (slot) {
                    slot.tileId = null;
                    slot.text = '';
                });

                round.tokens.forEach(function (token, index) {
                    const tile = round.tiles.find(function (entry) {
                        return !entry.used && entry.text === token;
                    });
                    if (!tile) return;

                    tile.used = true;
                    round.slots[index].tileId = tile.id;
                    round.slots[index].text = tile.text;
                });

                round.solved = true;
                state.mistakes += 1;
                play(sfx.wrong);
                syncUI();
                animateAnswerFeedback('neutral');

                if (state.rounds.every(function (entry) { return entry.solved; })) {
                    setTimeout(finishGame, 500);
                }
            }

            function checkCurrent() {
                const round = currentRound();
                if (!round || round.solved || state.locked) return;

                if (!allFilled()) {
                    play(sfx.wrong);
                    return;
                }

                if (currentAnswerString() === round.answerNormalized) {
                    round.solved = true;
                    state.correct += 1;
                    play(sfx.correct);
                    syncUI();
                    animateAnswerFeedback('correct');

                    setTimeout(function () {
                        if (state.rounds.every(function (entry) { return entry.solved; })) {
                            finishGame();
                            return;
                        }

                        const nextUnsolved = state.rounds.findIndex(function (entry, index) {
                            return index > state.idx && !entry.solved;
                        });

                        if (nextUnsolved >= 0) {
                            loadRound(nextUnsolved);
                            return;
                        }

                        const fallback = state.rounds.findIndex(function (entry) { return !entry.solved; });
                        if (fallback >= 0) {
                            loadRound(fallback);
                        }
                    }, 500);
                } else {
                    state.mistakes += 1;
                    play(sfx.wrong);
                    updateTopUI();
                    animateAnswerFeedback('wrong');
                }
            }

            function startTimer() {
                if (timerInt) clearInterval(timerInt);
                startTime = Date.now();
                if (timerEl) timerEl.textContent = '0:00';
                timerInt = setInterval(function () {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    if (timerEl) timerEl.textContent = formatTime(elapsed);
                }, 1000);
            }

            function loadRound(index) {
                clearAnswerFeedback();
                resultsOverlay.classList.add('hidden');
                state.idx = index;
                syncUI();
            }

            function finishGame() {
                state.locked = true;
                if (timerInt) clearInterval(timerInt);
                play(sfx.success);

                if (roundLabel) roundLabel.textContent = 'Done • ' + state.rounds.length + '/' + state.rounds.length;
                if (finalScoreEl) finalScoreEl.textContent = state.correct + '/' + state.rounds.length;
                if (finalTimeEl) finalTimeEl.textContent = timerEl ? timerEl.textContent : '00:00';
                if (finalMistakesEl) finalMistakesEl.textContent = String(state.mistakes);

                resultsOverlay.classList.remove('hidden');
            }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function goNextSlide() {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.nextSlide === 'function') {
                            window.parent.nextSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                        return;
                    } catch (e) {}
                }
            }

            function stopSharedAudioModal() {
                const modal = document.querySelector('[data-audio-player-modal]');
                if (modal) {
                    modal.classList.add('hidden');
                }
            }
            function resetSlide() {
                if (timerInt) clearInterval(timerInt);
                stopDragging();
                state.idx = 0;
                state.locked = false;
                state.correct = 0;
                state.mistakes = 0;
                state.hintsLeft = 2;
                state.rounds = buildRounds();
                if (correctCount) correctCount.textContent = '0';
                if (mistakesCount) mistakesCount.textContent = '0';
                if (timerEl) timerEl.textContent = '00:00';
                stopSharedAudioModal();
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
                startTimer();
                loadRound(0);
            }

            resetBtn && resetBtn.addEventListener('click', resetRound);
            hintBtn && hintBtn.addEventListener('click', useHint);
            revealBtn && revealBtn.addEventListener('click', revealCurrent);
            prevBtn && prevBtn.addEventListener('click', function (event) {
                event.preventDefault();
                if (state.locked || state.idx <= 0) return;
                loadRound(state.idx - 1);
            });
            nextBtn && nextBtn.addEventListener('click', function (event) {
                event.preventDefault();
                if (state.locked || state.idx >= state.rounds.length - 1) return;
                loadRound(state.idx + 1);
            });
            continuePopupBtn && continuePopupBtn.addEventListener('click', function (event) {
                event.preventDefault();
                goNextSlide();
            });
            restartPopupBtn && restartPopupBtn.addEventListener('click', function (event) {
                event.preventDefault();
                resetSlide();
            });

            window.resetSlide = resetSlide;
            window.stopSlideAudio = function () {
                stopDragging();
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
                stopSharedAudioModal();
                stopAllSfx();
            };

            document.addEventListener('visibilitychange', function () {
                if (document.hidden) {
                    window.stopSlideAudio();
                }
            });

            if (!state.rounds.length) {
                syncUI();
                setQuestionImage('', '');
                promptEl.textContent = 'No questions available.';
                promptEl.classList.remove('hidden');
                return;
            }

            startTimer();
            loadRound(0);
        });
    </script>
@endsection
