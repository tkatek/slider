@php
    $content = is_array($content ?? null) ? $content : [];

    $normalizeAnswer = function ($value) {
        $value = (string) $value;
        $value = preg_replace('/\s+/u', ' ', $value);
        $value = trim($value);
        return mb_strtolower($value);
    };

    $bankWords = array_values($content['bank'] ?? []);
    $lines = array_values($content['lines'] ?? []);

    $bankItemsForJs = [];
    $answerIndexMap = [];
    $maxLen = 0;

    foreach ($bankWords as $index => $word) {
        $word = (string) $word;
        $answerIndex = $index + 1;

        $bankItemsForJs[] = [
            'id' => 'bank_' . $answerIndex,
            'text' => $word,
            'answerIndex' => $answerIndex,
        ];

        if (!isset($answerIndexMap[$normalizeAnswer($word)])) {
            $answerIndexMap[$normalizeAnswer($word)] = $answerIndex;
        }

        $maxLen = max($maxLen, mb_strlen($word));
    }

    $baseBlankWidth = max(110, (int) round($maxLen * 8.8 + 34));
    $mobileBlankWidth = max(78, (int) round($baseBlankWidth * 0.56));
    $tabletBlankWidth = max(92, (int) round($baseBlankWidth * 0.72));
    $desktopBlankWidth = max(108, (int) round($baseBlankWidth * 0.9));

    $lineItems = [];
    $placeholderPattern = '/\[\[(.*?)\]\]/';

    foreach ($lines as $lineIndex => $line) {
        $speaker = (string) ($line['speaker'] ?? '');
        $text = (string) ($line['text'] ?? '');

        $parts = preg_split($placeholderPattern, $text, -1, PREG_SPLIT_DELIM_CAPTURE);
        $tokens = [];

        foreach ($parts as $partIndex => $part) {
            if ($partIndex % 2 === 0) {
                if ($part !== '') {
                    $tokens[] = [
                        'type' => 'text',
                        'value' => $part,
                    ];
                }
                continue;
            }

            $answer = trim((string) $part);
            $answerIndex = $answerIndexMap[$normalizeAnswer($answer)] ?? 0;

            $tokens[] = [
                'type' => 'blank',
                'id' => 'blank_' . ($lineIndex + 1) . '_' . $partIndex,
                'answer' => $answer,
                'answer_index' => $answerIndex,
            ];
        }

        $lineItems[] = [
            'speaker' => $speaker,
            'tokens' => $tokens,
        ];
    }

    $playerAudio = (string) ($content['audio'] ?? '');
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? ($content['title'] ?? 'Practice'))

@section('style')
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

        #dragDialogueDropGame {
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
        }

        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
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

        .ddg-dragging {
            position: fixed !important;
            pointer-events: none !important;
            z-index: 9999 !important;
            cursor: grabbing !important;
            transition: none !important;
            will-change: left, top, transform;
        }

        .ddg-returning {
            transition: top .42s cubic-bezier(.23,1,.32,1), left .42s cubic-bezier(.23,1,.32,1), transform .42s;
            z-index: 9000;
        }

        .ddg-shake { animation: shake .35s ease-in-out; }
        .ddg-locked { animation: popIn .35s cubic-bezier(.175,.885,.32,1.275); pointer-events: none; }

        .ddg-emoji-burst {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            font-size: 1rem;
            animation: riseFade .7s ease forwards;
            z-index: 20;
        }

        .ddg-drop-slot {
            position: relative;
            transition: all .22s ease;
            vertical-align: middle;
        }

        .ddg-drop-slot.ddg-slot-ready {
            animation: glowBlank 1.8s infinite;
        }

        .ddg-drop-slot.ddg-slot-empty::after {
            content: 'drop';
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 .5rem;
            font-size: .62rem;
            font-weight: 800;
            letter-spacing: .10em;
            text-transform: uppercase;
            color: rgb(148 163 184 / .92);
            pointer-events: none;
        }

        .dark .ddg-drop-slot.ddg-slot-empty::after {
            color: rgb(148 163 184 / .78);
        }

        .ddg-audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(199,210,254,0.55);
        }

        .dark .ddg-audio-track {
            background: rgba(99,102,241,0.25);
        }

        .ddg-audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .ddg-audio-knob {
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

        #ddgPoolContent {
            align-content: start;
        }

        @media (max-width: 1023.98px) {
            #ddgWordBankPanel {
                max-height: min(35vh, 310px);
            }

            #ddgPoolContent {
                max-height: calc(min(35vh, 310px) - 56px);
                overflow-y: auto;
                overflow-x: hidden;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .ddg-returning,
            .ddg-shake,
            .ddg-locked,
            .ddg-emoji-burst,
            .ddg-drop-slot.ddg-slot-ready,
            .audio-listen-btn {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col" id="dragDialogueDropGame">
        <div id="ddgTitleBlock" class="header-spacing text-center space-y-6 my-8">
            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                    {{ $content['title'] ?? 'Practice' }}
                </span>
            </h1>

            @if(!empty($content['subtitle']))
                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            @endif
        </div>

        <div id="ddgStatusRow" class="mx-auto mb-5 w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-200/70 bg-white/60 shadow-lg backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/60">
            <div class="grid grid-cols-4">
                @foreach(['Blanks' => 'ddgProgressCount', 'Correct' => 'ddgCorrectCount', 'Mistakes' => 'ddgMistakesCount', 'Time' => 'ddgTimer'] as $label => $id)
                    <div class="px-3 py-3 sm:px-4 sm:py-4 @if(!$loop->last) border-r border-slate-200/70 dark:border-slate-800 @endif">
                        <div class="hidden text-[11px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-400 sm:inline-block">
                            {{ $label }}
                        </div>
                        <div class="text-base font-black sm:text-lg">
                            @if($label === 'Blanks')
                                🧩
                            @elseif($label === 'Correct')
                                ✅
                            @elseif($label === 'Mistakes')
                                ❌
                            @else
                                ⏱️
                            @endif
                            <span id="{{ $id }}">{{ $label === 'Time' ? '00:00' : ($label === 'Blanks' ? '0/0' : '0') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="ddgLayoutShell" class="mx-auto flex w-full flex-1 min-h-0 flex-col px-4 pt-4 pb-[calc(min(35vh,310px)+16px)] sm:px-6 sm:pt-5 sm:pb-[calc(min(35vh,310px)+20px)] lg:flex-row lg:items-start lg:justify-center lg:gap-5 lg:px-8 lg:pt-4 lg:pb-0">
            <section id="ddgGameColumn" class="w-full flex flex-col lg:w-[68%] lg:flex-none">
                <div class="grid place-items-center text-center gap-3 sm:gap-4 auto-rows-max">
                    <div class="w-full">
                        <div id="ddgGameCard" class="relative isolate w-full text-left overflow-hidden rounded-[1.6rem] border border-slate-200/70 bg-white/70 shadow-[0_18px_55px_rgba(2,6,23,0.08)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/60 lg:overflow-visible mb-4">
                            <div class="relative z-[1] px-3 py-4 sm:px-4 sm:py-4 lg:overflow-visible">
                                <div class="space-y-4 sm:space-y-5">
                                    <div class="rounded-[1.2rem] border border-slate-200/70 bg-white/65 p-3 shadow-[0_10px_28px_rgba(2,6,23,0.05)] dark:border-slate-700/60 dark:bg-slate-900/35 sm:p-4">
                                        <div class="hidden mb-4 flex flex-wrap items-center justify-between gap-3">
                                            <div class="flex items-center gap-3">
                                                <div class="grid h-10 w-10 place-items-center rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 text-white shadow-lg">
                                                    🎧
                                                </div>

                                                <div>
                                                    <h2 class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                                        Listen and complete
                                                    </h2>
                                                    <p class="text-[11px] font-extrabold uppercase tracking-[0.16em] text-slate-500 dark:text-slate-400">
                                                        Drag each word into the correct blank
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                                <span>🎯</span>
                                                <span>{{ count($bankWords) }} words</span>
                                            </div>
                                        </div>

                                        <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-4 py-3 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30 sm:px-5 sm:py-3.5">
                                            <div class="flex items-center gap-4">
                                                <button
                                                        id="ddgPlayAudioBtn"
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

                                                <div class="flex-1 flex flex-col gap-2">
                                                    <div class="ddg-audio-track mt-1 cursor-pointer" id="ddgProgressTrack" aria-label="Audio progress">
                                                        <div class="ddg-audio-fill" id="ddgProgressFill"></div>
                                                        <div class="ddg-audio-knob" id="ddgProgressKnob"></div>
                                                    </div>

                                                    <div class="flex justify-between text-[11px] font-extrabold text-indigo-700 dark:text-indigo-200">
                                                        <span id="ddgCurrentTime">0:00</span>
                                                        <span id="ddgTotalTime">0:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 rounded-[1.2rem] border border-slate-200/70 bg-white/70 p-3 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/25 sm:p-4">
                                            <div class="space-y-3 sm:space-y-3.5">
                                                @foreach($lineItems as $item)
                                                    <div class="w-full max-w-full">
                                                        <div class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.5] text-slate-900 dark:text-slate-100">
                                                            <span class="font-black">{{ $item['speaker'] }}:</span>
                                                            @foreach($item['tokens'] as $token)
                                                                @if($token['type'] === 'text')
                                                                    <span>{{ $token['value'] }}</span>
                                                                @else
                                                                    <span
                                                                            class="ddg-drop-slot ddg-slot-ready ddg-slot-empty inline-flex align-middle mx-1 rounded-lg border border-dashed border-slate-300/90 bg-white/70 text-slate-700 transition-all duration-200 dark:border-slate-600/70 dark:bg-slate-900/25 dark:text-slate-200"
                                                                            style="min-width: {{ $mobileBlankWidth }}px; min-height: 30px;"
                                                                            data-initial-min-width-mobile="{{ $mobileBlankWidth }}px"
                                                                            data-initial-min-width-sm="{{ $tabletBlankWidth }}px"
                                                                            data-initial-min-width-lg="{{ $desktopBlankWidth }}px"
                                                                            data-blank="{{ $token['id'] }}"
                                                                            data-answer-index="{{ $token['answer_index'] }}"
                                                                            data-answer="{{ $token['answer'] }}"
                                                                    ></span>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="ddgWinModal" class="hidden fixed inset-0 z-[3000]">
                        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                        <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                            <div class="w-full max-w-lg max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95">
                                <div class="p-6 text-center sm:p-8">
                                    <div class="mb-3 text-6xl">🎉</div>

                                    <h2 class="text-2xl font-black text-slate-900 dark:text-white sm:text-3xl">
                                        Done!
                                    </h2>

                                    <div class="mt-5 grid w-full grid-cols-1 gap-3 sm:grid-cols-3">
                                        @foreach(['Correct' => 'ddgFinalCorrect', 'Time' => 'ddgFinalTime', 'Mistakes' => 'ddgFinalMistakes'] as $label => $id)
                                            <div class="rounded-2xl border border-slate-200/70 bg-white/80 p-3 shadow dark:border-slate-700 dark:bg-slate-800/80">
                                                <div class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $label }}</div>
                                                <div id="{{ $id }}" class="text-xl font-black text-slate-900 dark:text-white">0</div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                        <button
                                                type="button"
                                                class="w-full rounded-2xl border border-slate-200 bg-white px-8 py-3 font-black text-slate-900 shadow-lg transition-colors hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700"
                                                onclick="window.dragDialogueDropGame && window.dragDialogueDropGame.init()"
                                        >
                                            Restart 🔁
                                        </button>

                                        <button
                                                type="button"
                                                class="w-full rounded-2xl bg-indigo-600 px-8 py-3 font-black text-white shadow-lg transition-colors hover:bg-indigo-500"
                                                onclick="window.dragDialogueDropGoNext && window.dragDialogueDropGoNext()"
                                        >
                                            Continue ⚡
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <template id="ddgTileTpl">
                        <div
                                class="ddg-draggable-item select-none touch-none cursor-grab rounded-xl px-2 py-2 sm:px-2.5 sm:py-2.5 text-sm inline-flex min-h-[42px] w-auto max-w-full shrink-0 items-center justify-center text-center leading-snug font-black text-white shadow-[0_10px_20px_rgba(2,6,23,0.16)] border border-white/20 transition-transform duration-150 hover:-translate-y-0.5 active:translate-y-0"
                                style="touch-action:none;"
                        ></div>
                    </template>

                    <audio id="ddgAudio" preload="metadata" src="{{ $playerAudio }}"></audio>
                </div>
            </section>

            <div id="ddgPoolBar" class="fixed inset-x-0 bottom-0 z-[1500] lg:order-first lg:sticky lg:inset-x-auto lg:top-4 lg:bottom-auto lg:w-[32%] lg:self-start">
                <div class="mx-auto w-full px-3 sm:px-6 lg:px-0 pb-0">
                    <div id="ddgWordBankPanel" class="relative overflow-hidden rounded-t-3xl sm:rounded-3xl border border-slate-200/70 bg-white/90 backdrop-blur-xl shadow-[0_-18px_55px_rgba(2,6,23,0.16)] dark:border-slate-700/60 dark:bg-slate-950/75 lg:rounded-3xl lg:shadow-[0_18px_45px_rgba(2,6,23,0.10)]">
                        <div class="pointer-events-none absolute inset-0 opacity-80 bg-[radial-gradient(120%_120%_at_0%_0%,rgba(99,102,241,0.16)_0%,transparent_55%),radial-gradient(120%_120%_at_100%_0%,rgba(59,130,246,0.12)_0%,transparent_55%)]"></div>

                        <div class="relative px-3 pt-3 pb-4 sm:px-4 sm:py-4 lg:px-6">
                            <div class="flex items-center justify-center">
                                <div class="h-1.5 w-14 rounded-full bg-slate-900/10 dark:bg-white/10"></div>
                            </div>

                            <div class="mt-3 flex items-center justify-between gap-2">
                                <div class="flex items-center gap-2">
                                    <button id="ddgPrevWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Previous words">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M12.79 4.23a.75.75 0 0 1-.02 1.06L8.06 10l4.71 4.71a.75.75 0 1 1-1.06 1.06l-5.24-5.24a.75.75 0 0 1 0-1.06l5.24-5.24a.75.75 0 0 1 1.08-.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                    <div class="inline-flex items-center gap-2 rounded-full border border-indigo-200/70 bg-indigo-50/80 px-3 py-1.5 text-[11px] font-black uppercase tracking-[0.14em] text-indigo-700 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:text-indigo-300">
                                        <span id="ddgCurrentSectionBadge">🎯</span>
                                        <span id="ddgCurrentSectionLabel">Word Bank</span>
                                    </div>

                                    <button id="ddgNextWordsBtn" type="button" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-slate-700 shadow-[0_10px_24px_rgba(15,23,42,.12)] transition disabled:cursor-not-allowed disabled:opacity-40 dark:bg-slate-900/85 dark:text-slate-200 dark:shadow-[0_10px_24px_rgba(2,6,23,.35)] lg:hidden" aria-label="Next words">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                            <path fill-rule="evenodd" d="M7.21 15.77a.75.75 0 0 1 .02-1.06L11.94 10 7.23 5.29a.75.75 0 0 1 1.06-1.06l5.24 5.24c.3.3.3.77 0 1.06l-5.24 5.24a.75.75 0 0 1-1.08.02Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>

                                <div id="ddgPoolCount" class="inline-flex items-center gap-1.5 rounded-full border border-slate-200/70 bg-white/80 px-3 py-1.5 text-[10px] sm:text-xs font-black text-slate-700 shadow-sm dark:border-slate-700/60 dark:bg-slate-900/50 dark:text-slate-100">
                                    0/0
                                </div>
                            </div>

                            <div class="mt-3 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                            <div class="relative mt-3">
                                <div id="ddgPoolContent" class="mx-auto flex w-fit max-w-full flex-wrap items-start justify-start gap-2 sm:gap-2.5 lg:w-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            var BANK_ITEMS = @json($bankItemsForJs);

            var SFX = {
                correct: new Audio(@json($content['sfx']['correct'] ?? '')),
                wrong: new Audio(@json($content['sfx']['wrong'] ?? '')),
                success: new Audio('/slider/sounds/success.wav')
            };

            var playerAudio = document.getElementById('ddgAudio');
            var DESKTOP_GAME_WIDTH = 68;
            var DESKTOP_POOL_WIDTH = 32;

            function clamp01(v) {
                v = Number(v);
                if (!Number.isFinite(v)) return 0.5;
                return Math.max(0, Math.min(1, v));
            }

            function applyVolumes() {
                Object.keys(SFX).forEach(function (key) {
                    if (SFX[key]) SFX[key].volume = clamp01(1);
                });
            }
            applyVolumes();

            function play(sound) {
                if (!sound || !sound.src) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(function(){});
            }

            function playCorrect() { play(SFX.correct); }
            function playWrong() { play(SFX.wrong); }
            function playWin() { play(SFX.success); }

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function formatTime(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                var m = Math.floor(seconds / 60);
                var s = Math.floor(seconds % 60);
                return m + ':' + String(s).padStart(2, '0');
            }

            function syncPlayerUI() {
                var duration = isFinite(playerAudio.duration) ? playerAudio.duration : 0;
                var current = isFinite(playerAudio.currentTime) ? playerAudio.currentTime : 0;
                var pct = duration > 0 ? (current / duration) * 100 : 0;

                var currentTimeEl = document.getElementById('ddgCurrentTime');
                var totalTimeEl = document.getElementById('ddgTotalTime');
                var progressFill = document.getElementById('ddgProgressFill');
                var progressKnob = document.getElementById('ddgProgressKnob');
                var playBtn = document.getElementById('ddgPlayAudioBtn');

                if (currentTimeEl) currentTimeEl.textContent = formatTime(current);
                if (totalTimeEl) totalTimeEl.textContent = duration ? formatTime(duration) : '0:00';
                if (progressFill) progressFill.style.width = pct + '%';
                if (progressKnob) progressKnob.style.left = pct + '%';
                if (playBtn) playBtn.classList.toggle('playing', !playerAudio.paused);
            }

            function getInitialBlankMinWidth(blank) {
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1024) return blank.dataset.initialMinWidthLg || blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                if (w >= 640) return blank.dataset.initialMinWidthSm || blank.dataset.initialMinWidthMobile || '';
                return blank.dataset.initialMinWidthMobile || '';
            }

            window.dragDialogueDropGoNext = function () {
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

            };

            window.stopSlideAudio = function () {
                if (playerAudio) {
                    playerAudio.pause();
                    playerAudio.currentTime = 0;
                }

                Object.keys(SFX).forEach(function (key) {
                    if (SFX[key]) {
                        SFX[key].pause();
                        SFX[key].currentTime = 0;
                    }
                });

                syncPlayerUI();
            };

            function DragDialogueDropGame() {
                this.poolContent = document.getElementById('ddgPoolContent');
                this.poolCount = document.getElementById('ddgPoolCount');
                this.currentSectionLabel = document.getElementById('ddgCurrentSectionLabel');
                this.currentSectionBadge = document.getElementById('ddgCurrentSectionBadge');
                this.winModal = document.getElementById('ddgWinModal');
                this.tileTpl = document.getElementById('ddgTileTpl');

                this.playBtn = document.getElementById('ddgPlayAudioBtn');
                this.progressTrack = document.getElementById('ddgProgressTrack');
                this.prevWordsBtn = document.getElementById('ddgPrevWordsBtn');
                this.nextWordsBtn = document.getElementById('ddgNextWordsBtn');
                this.gameColumn = document.getElementById('ddgGameColumn');
                this.poolBar = document.getElementById('ddgPoolBar');
                this.gameCard = document.getElementById('ddgGameCard');

                this.draggedItem = null;
                this.placeholder = null;
                this.originalParent = null;
                this.offsetX = 0;
                this.offsetY = 0;
                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();
                this.timerInt = null;

                this._raf = null;
                this._mx = 0;
                this._my = 0;

                this.tileDeck = { all: [], active: [], waiting: [], history: [] };
                this.resizeTimer = null;

                this.handlePointerMove = this.handlePointerMove.bind(this);
                this.handlePointerUp = this.handlePointerUp.bind(this);
                this.handleResize = this.handleResize.bind(this);
                this.showPrevWords = this.showPrevWords.bind(this);
                this.showNextWords = this.showNextWords.bind(this);

                this.tileSkins = [
                    'bg-gradient-to-br from-sky-500 to-blue-600',
                    'bg-gradient-to-br from-rose-500 to-fuchsia-600',
                    'bg-gradient-to-br from-emerald-500 to-teal-600',
                    'bg-gradient-to-br from-amber-500 to-orange-600',
                    'bg-gradient-to-br from-indigo-500 to-violet-600',
                    'bg-gradient-to-br from-cyan-500 to-sky-600'
                ];

                this.burstEmojis = ['✨', '🎉', '💫', '⭐', '👏'];
                this.bindPlayer();
            }

            DragDialogueDropGame.prototype.bindPlayer = function () {
                var self = this;

                if (this.playBtn) {
                    this.playBtn.addEventListener('click', function () {
                        try {
                            if (playerAudio.paused) playerAudio.play();
                            else playerAudio.pause();
                        } catch (e) {}
                        syncPlayerUI();
                    });
                }

                if (this.progressTrack) {
                    this.progressTrack.addEventListener('click', function (e) {
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
            };

            DragDialogueDropGame.prototype.init = function () {
                var self = this;

                if (this.winModal) this.winModal.classList.add('hidden');

                this.correctCount = 0;
                this.mistakeCount = 0;
                this.startTime = Date.now();

                clearInterval(this.timerInt);
                this.startTimer();
                this.updateStats();

                if (playerAudio) {
                    playerAudio.pause();
                    playerAudio.currentTime = 0;
                    syncPlayerUI();
                }

                Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (blank) {
                    blank.innerHTML = '';
                    blank.style.minWidth = getInitialBlankMinWidth(blank);
                    blank.classList.add('ddg-slot-ready', 'ddg-slot-empty');
                    blank.classList.remove(
                        'text-emerald-700','border-emerald-500/55','bg-emerald-50/90',
                        'dark:text-emerald-300','dark:bg-emerald-950/35','dark:border-emerald-500/45',
                        'text-rose-700','border-rose-500/55','bg-rose-50/90',
                        'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40',
                        'ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]'
                    );
                });

                this.poolContent.innerHTML = '';
                this.tileDeck = {
                    all: this.shuffle(BANK_ITEMS.map(function (item) {
                        return {
                            id: item.id,
                            text: item.text,
                            answerIndex: item.answerIndex
                        };
                    })),
                    active: [],
                    waiting: [],
                    history: []
                };
                this.tileDeck.waiting = this.tileDeck.all.slice();

                this.loadTiles();
                this.updatePoolCount();
                this.updateDesktopColumnWidths();

                window.removeEventListener('resize', this.handleResize);
                window.addEventListener('resize', this.handleResize, { passive: true });

                if (this.prevWordsBtn) {
                    this.prevWordsBtn.removeEventListener('click', this.showPrevWords);
                    this.prevWordsBtn.addEventListener('click', this.showPrevWords);
                }

                if (this.nextWordsBtn) {
                    this.nextWordsBtn.removeEventListener('click', this.showNextWords);
                    this.nextWordsBtn.addEventListener('click', this.showNextWords);
                }

                setTimeout(function () {
                    self.playIn();
                }, 10);
            };

            DragDialogueDropGame.prototype.startTimer = function () {
                var self = this;

                this.timerInt = setInterval(function () {
                    self.updateTimer();
                }, 1000);

                this.updateTimer();
            };

            DragDialogueDropGame.prototype.formatElapsedTime = function () {
                var elapsed = Math.floor((Date.now() - this.startTime) / 1000);
                var mins = String(Math.floor(elapsed / 60)).padStart(2, '0');
                var secs = String(elapsed % 60).padStart(2, '0');
                return mins + ':' + secs;
            };

            DragDialogueDropGame.prototype.updateTimer = function () {
                var timerEl = document.getElementById('ddgTimer');
                if (timerEl) timerEl.textContent = this.formatElapsedTime();
            };

            DragDialogueDropGame.prototype.updateStats = function () {
                var progressEl = document.getElementById('ddgProgressCount');
                var correctEl = document.getElementById('ddgCorrectCount');
                var mistakesEl = document.getElementById('ddgMistakesCount');
                var total = BANK_ITEMS.length;

                if (progressEl) progressEl.textContent = this.correctCount + '/' + total;
                if (correctEl) correctEl.textContent = this.correctCount;
                if (mistakesEl) mistakesEl.textContent = this.mistakeCount;
            };

            DragDialogueDropGame.prototype.handleResize = function () {
                var self = this;
                clearTimeout(this.resizeTimer);
                this.resizeTimer = setTimeout(function () {
                    Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (blank) {
                        if (!blank.querySelector('.ddg-draggable-item')) {
                            blank.style.minWidth = getInitialBlankMinWidth(blank);
                        }
                    });
                    self.syncVisibleTileCount();
                    self.updateDesktopColumnWidths();
                }, 120);
            };

            DragDialogueDropGame.prototype.getVisibleWordLimit = function () {
                var w = window.innerWidth || document.documentElement.clientWidth || 0;
                if (w >= 1024) return Number.MAX_SAFE_INTEGER;
                if (w < 640) return 8;
                return 10;
            };

            DragDialogueDropGame.prototype.playIn = function () {
                var titleBlock = document.getElementById('ddgTitleBlock');
                var statusRow = document.getElementById('ddgStatusRow');
                var gameCard = document.getElementById('ddgGameCard');
                var wordBankPanel = document.getElementById('ddgWordBankPanel');

                if (!window.gsap) return;
                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

                var items = [titleBlock, statusRow, wordBankPanel, gameCard].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: 'all' });

                gsap.timeline({ defaults: { ease: 'power3.out' } })
                    .from(titleBlock, { opacity: 0, y: 14, duration: 0.7 }, 0.08)
                    .from(statusRow, { opacity: 0, y: 10, duration: 0.55 }, 0.14)
                    .from(wordBankPanel, { opacity: 0, x: -12, duration: 0.55 }, 0.20)
                    .from(gameCard, { opacity: 0, y: 10, scale: .988, duration: 0.6 }, 0.24);
            };

            DragDialogueDropGame.prototype.updateDesktopColumnWidths = function () {
                var viewportWidth = window.innerWidth || document.documentElement.clientWidth || 0;

                if (!this.gameColumn || !this.poolBar || !this.gameCard) return;

                if (viewportWidth < 1024) {
                    this.gameColumn.style.width = '';
                    this.gameColumn.style.maxWidth = '';
                    this.gameColumn.style.flexBasis = '';
                    this.poolBar.style.width = '';
                    this.poolBar.style.maxWidth = '';
                    this.poolBar.style.flexBasis = '';
                    return;
                }

                this.gameColumn.style.width = DESKTOP_GAME_WIDTH + '%';
                this.gameColumn.style.maxWidth = DESKTOP_GAME_WIDTH + '%';
                this.gameColumn.style.flexBasis = DESKTOP_GAME_WIDTH + '%';

                this.poolBar.style.width = DESKTOP_POOL_WIDTH + '%';
                this.poolBar.style.maxWidth = DESKTOP_POOL_WIDTH + '%';
                this.poolBar.style.flexBasis = DESKTOP_POOL_WIDTH + '%';
            };

            DragDialogueDropGame.prototype.createTileNode = function (itemData, index) {
                var self = this;
                var node = this.tileTpl.content.firstElementChild.cloneNode(true);

                node.textContent = itemData.text;
                node.dataset.id = itemData.id;
                node.dataset.answerIndex = itemData.answerIndex;
                node.addEventListener('pointerdown', function (e) {
                    self.handlePointerDown(e, node);
                });

                this.tileSkins[index % this.tileSkins.length].split(' ').forEach(function (cls) {
                    node.classList.add(cls);
                });

                return node;
            };

            DragDialogueDropGame.prototype.ensureActiveTileCount = function () {
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

            DragDialogueDropGame.prototype.renderActiveTiles = function () {
                var self = this;
                var deck = this.tileDeck;

                this.poolContent.innerHTML = '';
                if (!deck) return;

                deck.active.forEach(function (itemData, index) {
                    var node = self.createTileNode(itemData, index);
                    self.poolContent.appendChild(node);
                });

                this.updateNavButtons();
            };

            DragDialogueDropGame.prototype.updateNavButtons = function () {
                var deck = this.tileDeck;
                if (!deck) return;

                if (this.prevWordsBtn) this.prevWordsBtn.disabled = deck.history.length === 0;
                if (this.nextWordsBtn) this.nextWordsBtn.disabled = deck.waiting.length === 0;
            };

            DragDialogueDropGame.prototype.syncVisibleTileCount = function () {
                var deck = this.tileDeck;

                if (!deck) return;
                if (this.draggedItem) return;

                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
            };

            DragDialogueDropGame.prototype.loadTiles = function () {
                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
                this.updateDesktopColumnWidths();

                if (this.currentSectionLabel) this.currentSectionLabel.textContent = 'Word Bank';
                if (this.currentSectionBadge) this.currentSectionBadge.textContent = '🎯';
            };

            DragDialogueDropGame.prototype.refillPoolAfterLock = function () {
                var deck = this.tileDeck;
                if (!deck) return;

                this.ensureActiveTileCount();
                this.renderActiveTiles();
                this.updatePoolCount();
            };

            DragDialogueDropGame.prototype.showNextWords = function () {
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

            DragDialogueDropGame.prototype.showPrevWords = function () {
                var deck = this.tileDeck;
                if (!deck || this.draggedItem || deck.history.length === 0) return;

                while (deck.active.length > 0) {
                    deck.waiting.unshift(deck.active.pop());
                }

                deck.active = deck.history.pop();
                this.renderActiveTiles();
            };

            DragDialogueDropGame.prototype.updatePoolCount = function () {
                var total = BANK_ITEMS.length;
                var locked = document.querySelectorAll('.ddg-drop-slot .ddg-draggable-item.ddg-locked').length;
                var remaining = total - locked;

                if (this.poolCount) this.poolCount.textContent = remaining + '/' + total;
            };

            DragDialogueDropGame.prototype.shuffle = function (arr) {
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

            DragDialogueDropGame.prototype.normalizeTileForBlank = function (tile) {
                tile.classList.remove('cursor-grab', 'hover:-translate-y-0.5');
                tile.classList.add(
                    'ddg-locked','ring-2','ring-emerald-400/50',
                    'inline-flex','w-fit','max-w-full','items-center','justify-center','text-center',
                    'px-2','py-1.5','leading-tight','rounded-lg'
                );
                tile.style.cursor = 'default';
            };

            DragDialogueDropGame.prototype.flashBlankState = function (blank, type) {
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
                    setTimeout(function () {
                        blank.classList.remove(
                            'text-rose-700','border-rose-500/55','bg-rose-50/90',
                            'dark:text-rose-300','dark:bg-rose-950/30','dark:border-rose-500/40'
                        );
                    }, 850);
                }
            };

            DragDialogueDropGame.prototype.handlePointerDown = function (e, item) {
                var rect;

                if (item.classList.contains('ddg-locked')) return;

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

                item.classList.add('ddg-dragging');
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

            DragDialogueDropGame.prototype.handlePointerMove = function (e) {
                var self = this;

                if (!this.draggedItem) return;
                e.preventDefault();

                this._mx = e.clientX - this.offsetX;
                this._my = e.clientY - this.offsetY;

                if (!this._raf) {
                    this._raf = requestAnimationFrame(function () {
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

            DragDialogueDropGame.prototype.handlePointerUp = function (e) {
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

                if (blank && blank.classList.contains('ddg-drop-slot') && blank.children.length === 0) {
                    var expectedIndex = Number(blank.dataset.answerIndex || 0);
                    var gotIndex = Number(this.draggedItem.dataset.answerIndex || 0);

                    if (expectedIndex && gotIndex === expectedIndex) {
                        this.handleCorrectDrop(blank);
                    } else {
                        this.handleWrongDrop(blank);
                    }
                } else {
                    this.handleWrongDrop(blank);
                }

                this.draggedItem = null;
            };

            DragDialogueDropGame.prototype.checkHover = function (x, y) {
                Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (blank) {
                    blank.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                });

                var blank = this.getBlankTarget(x, y);
                if (blank) {
                    blank.classList.add('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                }
            };

            DragDialogueDropGame.prototype.getBlankTarget = function (x, y) {
                var below;
                var exactBlank;
                var threshold;
                var nearestBlank = null;
                var nearestDistance = Infinity;

                this.draggedItem.hidden = true;
                below = document.elementFromPoint(x, y);
                this.draggedItem.hidden = false;

                if (!below) return null;
                exactBlank = below.closest('.ddg-drop-slot');

                if (exactBlank) return exactBlank;

                threshold = window.innerWidth >= 1024 ? 42 : (window.innerWidth >= 640 ? 34 : 28);

                Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (blank) {
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

            DragDialogueDropGame.prototype.spawnBurst = function (target, emojis) {
                var rect = target.getBoundingClientRect();
                var host = document.body;

                if (!emojis || !emojis.length) return;

                emojis.forEach(function (emoji, i) {
                    var el = document.createElement('div');
                    el.className = 'ddg-emoji-burst';
                    el.textContent = emoji;
                    el.style.left = (rect.left + rect.width / 2 + (i - 1) * 10) + 'px';
                    el.style.top = (rect.top + rect.height / 2) + 'px';
                    el.style.position = 'fixed';
                    el.style.animationDelay = (i * 0.04) + 's';
                    host.appendChild(el);

                    setTimeout(function () {
                        el.remove();
                    }, 800);
                });
            };

            DragDialogueDropGame.prototype.removeActiveTileById = function (id) {
                var deck = this.tileDeck;
                if (!deck) return;

                deck.active = deck.active.filter(function (item) {
                    return item.id !== id;
                });

                deck.history = deck.history.map(function (page) {
                    return page.filter(function (item) {
                        return item.id !== id;
                    });
                }).filter(function (page) {
                    return page.length > 0;
                });

                deck.waiting = deck.waiting.filter(function (item) {
                    return item.id !== id;
                });
            };

            DragDialogueDropGame.prototype.handleCorrectDrop = function (blank) {
                var item = this.draggedItem;
                var tileId = item.dataset.id;

                playCorrect();
                this.spawnBurst(blank, this.burstEmojis.sort(function () { return Math.random() - 0.5; }).slice(0, 3));

                item.classList.remove('ddg-dragging', 'ddg-shake');

                item.style.position = '';
                item.style.left = '';
                item.style.top = '';
                item.style.width = '';
                item.style.zIndex = '';
                item.style.transform = '';

                blank.innerHTML = '';
                blank.appendChild(item);
                blank.classList.remove('ddg-slot-ready', 'ddg-slot-empty');
                blank.style.minWidth = '0px';
                blank.style.width = 'fit-content';
                this.flashBlankState(blank, 'correct');
                this.normalizeTileForBlank(item);

                if (this.placeholder && this.placeholder.parentNode) this.placeholder.remove();
                this.placeholder = null;

                this.correctCount++;
                this.updateStats();
                this.removeActiveTileById(tileId);

                Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (b) {
                    b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                });

                this.refillPoolAfterLock();
                this.updateDesktopColumnWidths();
                this.checkComplete();
            };

            DragDialogueDropGame.prototype.handleWrongDrop = function (blank) {
                var self = this;
                var item = this.draggedItem;
                var phRect;

                playWrong();
                this.mistakeCount++;
                this.updateStats();

                if (blank) {
                    this.flashBlankState(blank, 'wrong');
                    item.classList.add('ddg-shake');
                    item.classList.add('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');

                    setTimeout(function () {
                        item.classList.remove('ddg-shake');
                        item.classList.remove('border-rose-300','bg-rose-50','text-rose-700','dark:bg-rose-900/25','dark:border-rose-900/40','dark:text-rose-200');
                    }, 380);
                }

                item.classList.add('ddg-returning');
                item.style.transform = 'scale(1)';

                if (this.placeholder) {
                    phRect = this.placeholder.getBoundingClientRect();
                    item.style.left = phRect.left + 'px';
                    item.style.top = phRect.top + 'px';
                }

                setTimeout(function () {
                    item.classList.remove('ddg-dragging','ddg-returning');
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

                    Array.prototype.slice.call(document.querySelectorAll('.ddg-drop-slot')).forEach(function (b) {
                        b.classList.remove('ring-2','ring-indigo-500/40','bg-indigo-50/60','dark:bg-indigo-500/10','scale-[1.02]');
                    });
                }, 440);
            };

            DragDialogueDropGame.prototype.checkComplete = function () {
                var total = BANK_ITEMS.length;
                var locked = document.querySelectorAll('.ddg-drop-slot .ddg-draggable-item.ddg-locked').length;
                var self = this;

                if (total !== locked) return;

                setTimeout(function () {
                    clearInterval(self.timerInt);
                    playWin();

                    self.poolContent.innerHTML = '';
                    if (self.poolCount) self.poolCount.textContent = '0/0';
                    if (self.currentSectionLabel) self.currentSectionLabel.textContent = 'Completed';
                    if (self.currentSectionBadge) self.currentSectionBadge.textContent = '🎉';
                    self.updateNavButtons();

                    var finalCorrect = document.getElementById('ddgFinalCorrect');
                    var finalTime = document.getElementById('ddgFinalTime');
                    var finalMistakes = document.getElementById('ddgFinalMistakes');

                    if (finalCorrect) finalCorrect.textContent = self.correctCount + '/' + total;
                    if (finalTime) finalTime.textContent = self.formatElapsedTime();
                    if (finalMistakes) finalMistakes.textContent = self.mistakeCount;

                    if (self.winModal) self.winModal.classList.remove('hidden');
                }, 260);
            };

            window.dragDialogueDropGame = new DragDialogueDropGame();

            document.addEventListener('DOMContentLoaded', function () {
                syncPlayerUI();
                window.dragDialogueDropGame.init();
            });
        })();
    </script>
@endsection
