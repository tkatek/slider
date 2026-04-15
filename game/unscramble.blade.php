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
        'letters' => 'Drag the letters to make the correct word.',
        'words' => 'Drag the words to make the correct answer.',
        'sentence' => 'Drag the words to make the correct sentence.',
    ];

    $instructionText = trim((string) ($content['instruction'] ?? $defaultInstructions[$gameType] ?? 'Drag the tiles to make the correct answer.'));
    $pageTitle = trim((string) ($content['page_title'] ?? $content['title'] ?? 'Unscramble'));

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

    foreach ($rawQuestions as $questionIndex => $question) {
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
            $firstMatch = $allMatches[0][0] ?? '';
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
            foreach ($flatWords as $word) {
                $tokens[] = $word;
                $groupSizes[] = 1;
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
@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <main id="unscramble-game" class="min-h-[100dvh] w-full overflow-x-hidden bg-transparent text-slate-900 transition-colors dark:text-slate-100">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-6xl flex-col px-4 py-6 sm:px-8 sm:py-8 lg:justify-center">
            <div class="grid place-items-center gap-5 text-center sm:gap-6">
                @include('slider.components.title-subtitle')
                @include('slider.components.game-status')

                @if($playerAudio || $hasScript)
                    <section class="w-full max-w-4xl rounded-3xl border border-slate-200/70 bg-white/70 p-4 shadow-xl backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
                        @include('slider.components.audio-player')
                    </section>
                @endif
                <section class="w-full max-w-5xl rounded-3xl border border-slate-200/70 bg-white/70 p-4 shadow-xl backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60 sm:p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3 text-left">
                        <div class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">
                            {{ $instructionText }}
                        </div>

                        <button
                                id="uns-reveal"
                                type="button"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-amber-300 bg-amber-100 px-3 py-2 text-xs font-black text-amber-900 shadow-sm transition hover:scale-105 active:scale-95 dark:border-amber-700/50 dark:bg-amber-900/30 dark:text-amber-200"
                        >
                            Reveal answer
                        </button>
                    </div>

                    <div class="mt-4 grid gap-4">
                        <div id="uns-image-wrap" class="hidden justify-center">
                            <img id="uns-image" src="" alt="" class="h-40 w-full max-w-md rounded-2xl object-cover shadow-lg sm:h-52">
                        </div>

                        <div class="rounded-3xl border border-slate-200/70 bg-white/80 p-4 shadow-sm dark:border-slate-700 dark:bg-slate-950/30 sm:p-6">
                            <div id="uns-prompt" class="hidden mb-3 text-center text-sm font-black uppercase tracking-[0.14em] text-indigo-600 dark:text-indigo-300"></div>

                            <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-3 text-center">
                                <span id="uns-before" class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]"></span>
                                <div id="uns-slots" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3"></div>
                                <span id="uns-after" class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]"></span>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-200/70 bg-slate-50/80 p-4 dark:border-slate-700 dark:bg-slate-950/30 sm:p-5">
                            <div id="uns-bank" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3"></div>
                        </div>

                        <div class="flex flex-wrap items-center justify-center gap-2 text-[11px] font-semibold text-slate-700 dark:text-slate-200 sm:text-sm">
                            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white/80 px-3 py-1.5 shadow-sm dark:border-slate-700 dark:bg-slate-900/60">👆 Tap</span>
                            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white/80 px-3 py-1.5 shadow-sm dark:border-slate-700 dark:bg-slate-900/60">🤏 Drag</span>
                            <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white/80 px-3 py-1.5 shadow-sm dark:border-slate-700 dark:bg-slate-900/60">✖ Tap slot to remove</span>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3 lg:grid-cols-4">
                        <button id="uns-reset" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm font-black text-slate-900 shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                            Reset 🔁
                        </button>

                        <button id="uns-hint" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-amber-300 bg-amber-100 px-3 py-3 text-sm font-black text-amber-900 shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-amber-700/50 dark:bg-amber-900/30 dark:text-amber-200">
                            Hint 💡 (<span id="uns-hint-count">2</span>)
                        </button>

                        <button id="uns-prev" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm font-black text-slate-900 shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                            Previous
                        </button>

                        <button id="uns-next" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-indigo-500 bg-indigo-600 px-3 py-3 text-sm font-black text-white shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-indigo-400 dark:bg-indigo-500">
                            Next
                        </button>
                    </div>
                </section>
            </div>
        </div>

        <div id="uns-results" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/45 p-4 backdrop-blur-sm">
            <div class="w-full max-w-lg rounded-3xl border border-slate-200/70 bg-white/95 p-6 shadow-2xl dark:border-slate-700 dark:bg-slate-900/95 sm:p-8">
                <div class="mb-3 text-6xl">🎉</div>
                <h2 class="text-3xl font-black tracking-tight text-slate-900 dark:text-white sm:text-4xl">Done!</h2>

                <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow-sm dark:border-slate-700 dark:bg-slate-800/80">
                        <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Score</div>
                        <div id="uns-final-score" class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">0</div>
                    </div>
                    <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow-sm dark:border-slate-700 dark:bg-slate-800/80">
                        <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Time</div>
                        <div id="uns-final-time" class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">00:00</div>
                    </div>
                    <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow-sm dark:border-slate-700 dark:bg-slate-800/80">
                        <div class="text-[0.65rem] font-black uppercase tracking-[0.22em] text-slate-400">Mistakes</div>
                        <div id="uns-final-mistakes" class="text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-[1.15rem]">0</div>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <button id="uns-restart-popup" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-3 text-sm font-black text-slate-900 shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                        Restart 🔁
                    </button>
                    <button id="uns-continue-popup" type="button" class="inline-flex w-full items-center justify-center rounded-lg border border-indigo-500 bg-indigo-600 px-3 py-3 text-sm font-black text-white shadow-sm transition hover:scale-[1.02] active:scale-[.98] dark:border-indigo-400 dark:bg-indigo-500">
                        Continue ⚡
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const GAME_TYPE = @json($gameType);
            const QUESTION_SOURCE = @json($roundsData);

            const root = document.getElementById('unscramble-game');
            if (!root) return;

            const roundLabel = document.getElementById('tilesCount');
            const correctCount = document.getElementById('correctCount');
            const mistakesCount = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');
            const hintCount = document.getElementById('uns-hint-count');

            const promptEl = document.getElementById('uns-prompt');
            const beforeEl = document.getElementById('uns-before');
            const afterEl = document.getElementById('uns-after');
            const imageWrap = document.getElementById('uns-image-wrap');
            const imageEl = document.getElementById('uns-image');
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

            function buildShuffledTiles(tokens) {
                const source = tokens.map(function (token, index) {
                    return {
                        id: makeId(),
                        text: token,
                        used: false,
                        originalIndex: index
                    };
                });

                if (source.length <= 1) {
                    return source;
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
                    solved: false,
                    revealed: false
                };
            }

            function prepareRound(round) {
                round.tiles = buildShuffledTiles(round.tokens);
                round.slots = round.tokens.map(function () {
                    return { tileId: null, text: '' };
                });
                round.solved = false;
                round.revealed = false;
                return round;
            }

            const state = {
                idx: 0,
                locked: false,
                correct: 0,
                mistakes: 0,
                hintsLeft: 2,
                rounds: QUESTION_SOURCE.map(buildRound).map(prepareRound)
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

            function updateTopUI() {
                const total = state.rounds.length;
                const round = currentRound();

                if (roundLabel) roundLabel.textContent = total ? (state.idx + 1) + '/' + total : '0/0';
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
                    return 'min-h-[44px] min-w-[44px] px-3 py-2 text-base sm:min-h-[56px] sm:min-w-[56px] sm:px-4 sm:text-xl';
                }
                return 'min-h-[48px] min-w-[72px] px-3 py-2.5 text-sm sm:min-h-[58px] sm:min-w-[92px] sm:px-4 sm:text-base';
            }

            function tileSizeClasses() {
                if (GAME_TYPE === 'letters') {
                    return 'min-h-[44px] min-w-[56px] px-3 py-2 text-base sm:min-h-[56px] sm:min-w-[72px] sm:px-4 sm:text-xl';
                }
                if (GAME_TYPE === 'sentence') {
                    return 'min-h-[46px] px-3 py-2.5 text-sm sm:min-h-[56px] sm:px-4 sm:text-base';
                }
                return 'min-h-[46px] min-w-[72px] px-3 py-2.5 text-sm sm:min-h-[56px] sm:min-w-[92px] sm:px-4 sm:text-base';
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
                    'rounded-2xl',
                    'border',
                    'border-dashed',
                    'border-slate-300',
                    'bg-white/80',
                    'font-black',
                    'text-slate-900',
                    'shadow-sm',
                    'transition',
                    'active:scale-95',
                    'dark:border-slate-600',
                    'dark:bg-slate-950/40',
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
                    ? 'flex flex-wrap items-center justify-center gap-2 sm:gap-3'
                    : 'inline-flex flex-wrap items-center justify-center gap-2 rounded-2xl border border-dashed border-indigo-200 bg-indigo-50/60 px-2.5 py-2 dark:border-indigo-500/30 dark:bg-indigo-500/10';

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
                ghost.style.opacity = '0.92';
                ghost.style.transform = 'translate(-50%, -50%) scale(1.05)';
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
                    element.classList.remove('slot-hot', 'ring-4', 'ring-indigo-300/50', 'border-indigo-500');
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
                    slot.classList.add('slot-hot', 'ring-4', 'ring-indigo-300/50', 'border-indigo-500');
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
                    'inline-flex',
                    'items-center',
                    'justify-center',
                    'rounded-2xl',
                    'border',
                    'border-slate-200',
                    'bg-white/85',
                    'font-black',
                    'text-slate-900',
                    'shadow-sm',
                    'transition',
                    'hover:-translate-y-0.5',
                    'active:scale-95',
                    'dark:border-slate-700',
                    'dark:bg-slate-900/70',
                    'dark:text-slate-50',
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
                    : 'inline-flex flex-wrap items-center justify-center gap-2 rounded-2xl border border-dashed border-indigo-200 bg-indigo-50/60 px-2.5 py-2 dark:border-indigo-500/30 dark:bg-indigo-500/10';

                let currentGroup = null;
                const groups = buildGroupedIndexes(round.groups || [], round.tiles.length);

                groups.forEach(function (indexes) {
                    currentGroup = document.createElement('div');
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

                let slotIndex = typeof options?.preferredSlot === 'number' ? options.preferredSlot : -1;
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
                round.tiles = buildShuffledTiles(round.tokens);
                round.slots = round.tokens.map(function () {
                    return { tileId: null, text: '' };
                });
                round.solved = false;
                round.revealed = false;
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

                round.tiles.forEach(function (tile) { tile.used = false; });
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
                round.revealed = true;
                state.mistakes += 1;
                play(sfx.wrong);
                syncUI();

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
                }
            }

            function startTimer() {
                if (timerInt) clearInterval(timerInt);
                startTime = Date.now();
                timerInt = setInterval(function () {
                    const elapsed = Math.floor((Date.now() - startTime) / 1000);
                    if (timerEl) timerEl.textContent = formatTime(elapsed);
                }, 1000);
            }

            function loadRound(index) {
                resultsOverlay.classList.add('hidden');
                resultsOverlay.classList.remove('flex');
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
                resultsOverlay.classList.add('flex');
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
                state.rounds = QUESTION_SOURCE.map(buildRound).map(prepareRound);
                if (correctCount) correctCount.textContent = '0';
                if (mistakesCount) mistakesCount.textContent = '0';
                if (timerEl) timerEl.textContent = '00:00';
                stopSharedAudioModal();
                if (typeof window.stopAudioPlayer === 'function') {
                    window.stopAudioPlayer();
                }
                resultsOverlay.classList.add('hidden');
                resultsOverlay.classList.remove('flex');
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
