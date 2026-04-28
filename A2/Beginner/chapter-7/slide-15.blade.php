<?php
if (!function_exists('materialAsset')) {
    function materialAsset($path) {
        return 'https://remtoo.net/' . $path;
    }
}

$content = [
    'page_title' => 'Practice 7',
    'title'      => 'Practice 7',
    'subtitle'   => 'Listen to the conversation. Write the missing words.',
    'instruction'=> 'Listen to the conversation. Write the missing words.',
    'audio'      => materialAsset('slider/A2/Beginner/chapter-7/audios/slide15/practice.mp3'),

    'fill_lines' => [
        ['text' => 'A: What does your new boyfriend look like, Jenna?', 'answers' => []],
        ['text' => 'B: Well, he\'s really good looking.', 'answers' => []],
        ['text' => 'A: Oh! ___ he tall?', 'answers' => ['Is']],
        ['text' => 'B: ___, he ___. He\'s pretty short.', 'answers' => ['No', "isn't"]],
        ['text' => 'A: Really? ___ you taller than him?', 'answers' => ['Are']],
        ['text' => 'B: No, we’re about the same height. Let’s see… and he has curly brown hair.', 'answers' => []],
        ['text' => 'A: He sounds cute. ___ he ___ about your age?', 'answers' => ['Is', 'he']],
        ['text' => 'B: ___, he ___. And we have the same birthday!', 'answers' => ['Yes', 'is']],
    ],

    'transcript' => [
        ['speaker' => 'A', 'text' => 'What does your new boyfriend look like, Jenna?'],
        ['speaker' => 'B', 'text' => 'Well, he\'s really good looking.'],
        ['speaker' => 'A', 'text' => 'Oh! <strong>Is</strong> he tall?'],
        ['speaker' => 'B', 'text' => '<strong>No</strong>, he <strong>isn\'t</strong>. He\'s pretty short.'],
        ['speaker' => 'A', 'text' => 'Really? <strong>Are</strong> you taller than him?'],
        ['speaker' => 'B', 'text' => 'No, we\'re about the same height. Let\'s see... and he has curly brown hair.'],
        ['speaker' => 'A', 'text' => 'He sounds cute. <strong>Is he</strong> about your age?'],
        ['speaker' => 'B', 'text' => '<strong>Yes</strong>, he <strong>is</strong>. And we have the same birthday!'],
    ],
];

$parsedLines = [];
foreach ($content['fill_lines'] as $lineIdx => $line) {
    $answers = is_array($line['answers'] ?? null) ? array_values($line['answers']) : [];
    $blankIndex = 0;

    $html = preg_replace_callback('/___/', function () use (&$blankIndex, $lineIdx, $answers) {
        $answer = (string) ($answers[$blankIndex] ?? '');
        $safeAnswer = htmlspecialchars($answer, ENT_QUOTES, 'UTF-8');
        $inputId = 'blank_' . $lineIdx . '_' . $blankIndex;
        $blankIndex++;

        return '<input type="text" id="'.$inputId.'" class="missing-input" data-answer="'.$safeAnswer.'" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" placeholder="..." />';
    }, (string) ($line['text'] ?? ''));

    $parsedLines[] = [
        'html' => $html,
    ];
}
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .wave-bar {
            display: none;
            width: 3px;
            height: 10px;
            background: currentColor;
            border-radius: 999px;
            margin: 0 1px;
        }

        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
        }

        .audio-listen-btn.playing .wave-bar {
            display: block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        .audio-listen-btn.playing .static-icon {
            display: none;
        }

        @keyframes waveGrowth {
            0%,100% { height: 7px; }
            50% { height: 15px; }
        }


        .lesson-card {
            border-radius: 24px;
            border: 1px solid rgba(226, 232, 240, 1);
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.04);
        }

        .dark .lesson-card {
            border-color: rgba(51, 65, 85, 1);
            background: #0f172a;
            box-shadow: none;
        }

        .audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(203, 213, 225, 0.88);
            cursor: pointer;
        }

        .dark .audio-track {
            background: rgba(71, 85, 105, 0.55);
        }

        .audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #94a3b8 0%, #64748b 100%);
        }

        .audio-knob {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border-radius: 9999px;
            background: #1e293b;
            border: 2px solid #f8fafc;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.28);
            left: 0%;
            pointer-events: none;
        }

        .exercise-line {
            border-radius: 18px;
            border: 1px solid rgba(226, 232, 240, 1);
            background: rgba(255, 255, 255, 0.95);
        }

        .dark .exercise-line {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(15, 23, 42, 0.9);
        }

        .line-index {
            border: 2px solid rgba(224, 231, 255, 1);
            background: rgba(238, 242, 255, .8);
            color: #4f46e5;
        }

        .dark .line-index {
            border-color: rgba(255, 255, 255, .1);
            background: rgba(255, 255, 255, .05);
            color: #a5b4fc;
        }

        .line-text {
            font-size: 1.02rem;
            line-height: 1.5;
            font-weight: 700;
            color: #334155;
        }

        .dark .line-text {
            color: #e2e8f0;
        }

        .missing-input {
            display: inline-block;
            min-width: 78px;
            width: auto;
            border: none;
            border-bottom: 3px solid #64748b;
            background: rgba(241, 245, 249, 0.72);
            border-radius: 10px 10px 0 0;
            padding: 3px 8px;
            margin: 0 4px;
            text-align: center;
            font-weight: 800;
            font-size: 1.08rem;
            color: #4f46e5;
            transition: all .2s ease;
            vertical-align: baseline;
        }

        .missing-input::placeholder {
            color: #94a3b8;
            font-size: .92rem;
            font-weight: 700;
        }

        .dark .missing-input {
            background: rgba(30, 41, 59, .7);
            border-bottom-color: #64748b;
            color: #ffffff;
        }

        .dark .missing-input::placeholder {
            color: #64748b;
        }

        .missing-input:focus {
            outline: none;
            border-bottom-color: #ff8e07;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .14);
        }

        .missing-input.is-correct {
            border-bottom-color: #22c55e;
            color: #16a34a;
            background: rgba(34, 197, 94, .14);
        }

        .dark .missing-input.is-correct {
            color: #4ade80;
        }

        .missing-input.is-wrong {
            border-bottom-color: #ef4444;
            color: #dc2626;
            background: rgba(239, 68, 68, .12);
        }

        .dark .missing-input.is-wrong {
            color: #fca5a5;
        }

        .transcript-box {
            border-radius: 18px;
            border: 1px solid rgba(226, 232, 240, 1);
            background: rgba(248, 250, 252, .9);
        }

        .dark .transcript-box {
            border-color: rgba(51, 65, 85, 1);
            background: rgba(2, 6, 23, .4);
        }

        .transcript-line {
            font-size: 1.05rem;
            line-height: 1.45;
            color: #334155;
            font-weight: 600;
        }

        .dark .transcript-line {
            color: #e2e8f0;
        }

        .transcript-line strong {
            font-weight: 900;
            color: #0f172a;
        }

        .dark .transcript-line strong {
            color: #ffffff;
        }

        .speaker-token {
            min-width: 28px;
            display: inline-block;
            font-weight: 900;
            color: #1e293b;
        }

        .dark .speaker-token {
            color: #ffffff;
        }

        @media (max-width: 640px) {
            .line-text {
                font-size: .98rem;
            }

            .missing-input {
                min-width: 66px;
                font-size: 1rem;
            }

            .transcript-line {
                font-size: .98rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 sm:py-8">

            <header class="w-full flex flex-col items-center justify-center mb-6 sm:mb-8 text-center">
    @include('slider.components.title-subtitle')
</header>

            <section class="lesson-card p-4 sm:p-5 mb-4">
                <div class="rounded-2xl border border-slate-200 bg-slate-100/85 px-4 py-3 shadow-sm dark:border-slate-600 dark:bg-slate-800/80 sm:px-5 sm:py-3.5 flex items-start gap-4">
                    <button
                        id="playAudioBtn"
                        type="button"
                        class="play-hit audio-listen-btn inline-flex h-12 w-12 items-center justify-center rounded-full bg-[#1e2a44] hover:bg-[#243250] text-white shadow-[0_8px_18px_rgba(15,23,42,0.28)] transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-slate-300/40"
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
                        <div class="audio-track" id="audioTrack" aria-label="Audio progress">
                            <div class="audio-fill" id="audioFill"></div>
                            <div class="audio-knob" id="audioKnob"></div>
                        </div>

                        <div class="mt-2 flex justify-between text-[11px] font-extrabold text-slate-700 dark:text-slate-200">
                            <span id="audioCurrent">0:00</span>
                            <span id="audioTotal">0:00</span>
                        </div>
                    </div>
                </div>

                <audio id="promptAudio" preload="metadata">
                    <source src="{{ $content['audio'] }}" type="audio/mpeg">
                </audio>
            </section>

            <div class="w-full">
                <section class="lesson-card p-4 sm:p-5">
                    <div class="flex items-center justify-between mb-3 gap-2 flex-wrap">
                        <h2 class="font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">
                            Fill in the missing words
                        </h2>

                        <div class="flex flex-wrap items-center gap-2">
                            <button id="transcriptBtn" type="button" class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-black border border-slate-300 bg-white text-slate-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all active:scale-95">
                                Answer & Transcript
                            </button>
                            <button id="resetBtn" type="button" class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-black border border-slate-300 bg-white text-slate-700 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all active:scale-95">
                                Reset
                            </button>
                            <button id="revealBtn" type="button" class="inline-flex items-center justify-center rounded-lg px-3 py-1.5 text-xs font-black text-white border border-white/15 bg-gradient-to-br from-orange-600 to-amber-500 shadow-lg shadow-orange-500/20 hover:from-orange-500 hover:to-amber-400 transition-all active:scale-95">
                                Reveal Correction
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-2">
                        @foreach($parsedLines as $idx => $line)
                            <article class="exercise-line p-3.5 sm:p-4">
                                <div class="flex items-start gap-2">
                                    <div class="line-index h-8 w-8 sm:h-9 sm:w-9 shrink-0 rounded-xl flex items-center justify-center font-extrabold text-[0.82rem] sm:text-[0.9rem]">
                                        {{ $idx + 1 }}
                                    </div>

                                    <p class="line-text min-w-0 flex-1">
                                        {!! $line['html'] !!}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <p id="fillFeedback" class="mt-3 text-sm sm:text-base font-black text-slate-600 dark:text-slate-300"></p>
                </section>
            </div>

            <div id="transcriptModal" class="hidden fixed inset-0 z-[3000]">
                <div id="transcriptBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm dark:bg-black/60"></div>

                <div class="relative flex min-h-full w-full items-center justify-center p-4 sm:p-6">
                    <div class="w-full max-w-3xl max-h-[85dvh] overflow-y-auto rounded-3xl border border-slate-200/70 bg-white/95 shadow-2xl dark:border-slate-700/70 dark:bg-slate-900/95 text-left">
                        <div class="flex items-center justify-between border-b border-slate-200/70 px-4 py-3 dark:border-slate-700/70 sm:px-5 sm:py-4">
                            <div class="font-black text-sm text-slate-900 dark:text-slate-50 sm:text-base">
                                Answer & Transcript
                            </div>

                            <button
                                id="closeTranscriptBtn"
                                type="button"
                                class="rounded-xl px-3 py-1.5 text-[11px] sm:text-xs font-black border border-slate-200/70 bg-white/70 text-slate-700 transition hover:-translate-y-0.5 dark:border-slate-700/35 dark:bg-slate-900/20 dark:text-slate-200"
                                aria-label="Close transcript"
                            >
                                Close
                            </button>
                        </div>

                        <div class="max-h-[70vh] overflow-auto p-3 sm:p-4">
                            <div class="transcript-box p-3 sm:p-4 space-y-3">
                                @foreach($content['transcript'] as $line)
                                    <p class="transcript-line">
                                        <span class="speaker-token">{{ $line['speaker'] }}:</span>
                                        <span>{!! $line['text'] !!}</span>
                                    </p>
                                @endforeach
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
        function onReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const BIND_KEY = '__BEC_BIND_CH7_SLIDE15__';
            if (window[BIND_KEY]) window[BIND_KEY].abort();
            const ac = new AbortController();
            window[BIND_KEY] = ac;

            const audio = document.getElementById('promptAudio');
            const playBtn = document.getElementById('playAudioBtn');
            const track = document.getElementById('audioTrack');
            const fill = document.getElementById('audioFill');
            const knob = document.getElementById('audioKnob');
            const currentEl = document.getElementById('audioCurrent');
            const totalEl = document.getElementById('audioTotal');

            const inputs = Array.from(document.querySelectorAll('.missing-input'));
            const revealBtn = document.getElementById('revealBtn');
            const resetBtn = document.getElementById('resetBtn');
            const feedback = document.getElementById('fillFeedback');

                        const transcriptBtn = document.getElementById('transcriptBtn');
            const transcriptModal = document.getElementById('transcriptModal');
            const transcriptBackdrop = document.getElementById('transcriptBackdrop');
            const closeTranscriptBtn = document.getElementById('closeTranscriptBtn');

            const fx = {
                reveal: new Audio('/slider/sounds/success.wav'),
                reset: new Audio('/slider/sounds/click.wav')
            };

            function playFx(type) {
                const sound = fx[type];
                if (!sound) return;
                sound.pause();
                sound.currentTime = 0;
                sound.play().catch(() => {});
            }

            function fmt(seconds) {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${mins}:${String(secs).padStart(2, '0')}`;
            }

            function syncAudioUi() {
                if (!audio) return;
                const duration = isFinite(audio.duration) ? audio.duration : 0;
                const current = isFinite(audio.currentTime) ? audio.currentTime : 0;
                const pct = duration > 0 ? (current / duration) * 100 : 0;

                if (currentEl) currentEl.textContent = fmt(current);
                if (totalEl) totalEl.textContent = duration ? fmt(duration) : '0:00';
                if (fill) fill.style.width = `${pct}%`;
                if (knob) knob.style.left = `${pct}%`;
                if (playBtn) playBtn.classList.toggle('playing', !audio.paused);
            }

            function normalize(value) {
                return (value || '')
                    .toLowerCase()
                    .replace(/[’‘]/g, "'")
                    .replace(/[^a-z']/g, '')
                    .trim();
            }

            function markInput(input, ok) {
                input.classList.remove('is-correct', 'is-wrong');
                input.classList.add(ok ? 'is-correct' : 'is-wrong');
            }

            playBtn?.addEventListener('click', () => {
                if (!audio) return;
                if (audio.paused) audio.play().catch(() => {});
                else audio.pause();
            }, { signal: ac.signal });

            track?.addEventListener('click', (event) => {
                if (!audio) return;
                const rect = event.currentTarget.getBoundingClientRect();
                const x = Math.min(Math.max(0, event.clientX - rect.left), rect.width);
                const ratio = rect.width > 0 ? x / rect.width : 0;
                if (isFinite(audio.duration) && audio.duration > 0) {
                    audio.currentTime = ratio * audio.duration;
                    syncAudioUi();
                }
            }, { signal: ac.signal });

            if (audio) {
                audio.preload = 'metadata';
                audio.addEventListener('loadedmetadata', syncAudioUi, { signal: ac.signal });
                audio.addEventListener('timeupdate', syncAudioUi, { signal: ac.signal });
                audio.addEventListener('ended', syncAudioUi, { signal: ac.signal });
                audio.addEventListener('play', syncAudioUi, { signal: ac.signal });
                audio.addEventListener('pause', syncAudioUi, { signal: ac.signal });
            }

            revealBtn?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    const answer = String(input.dataset.answer || '');
                    input.value = answer;
                    markInput(input, true);
                });

                playFx('reveal');
                feedback.textContent = 'Corrections are now shown.';
                feedback.className = 'mt-3 text-sm sm:text-base font-black text-indigo-600 dark:text-indigo-300';
            }, { signal: ac.signal });

            resetBtn?.addEventListener('click', () => {
                inputs.forEach((input) => {
                    input.value = '';
                    input.classList.remove('is-correct', 'is-wrong');
                });

                playFx('reset');
                feedback.textContent = '';
                feedback.className = 'mt-3 text-sm sm:text-base font-black text-slate-600 dark:text-slate-300';
            }, { signal: ac.signal });

                        function openTranscriptModal() {
                if (!transcriptModal) return;
                transcriptModal.classList.remove('hidden');
                document.documentElement.classList.add('overflow-hidden');
            }

            function closeTranscriptModal() {
                if (!transcriptModal) return;
                transcriptModal.classList.add('hidden');
                document.documentElement.classList.remove('overflow-hidden');
            }

            transcriptBtn?.addEventListener('click', openTranscriptModal, { signal: ac.signal });
            closeTranscriptBtn?.addEventListener('click', closeTranscriptModal, { signal: ac.signal });
            transcriptBackdrop?.addEventListener('click', closeTranscriptModal, { signal: ac.signal });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') closeTranscriptModal();
            }, { signal: ac.signal });

            inputs.forEach((input) => {
                input.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        revealBtn?.click();
                    }
                }, { signal: ac.signal });
            });

                        window.stopSlideAudio = function () {
                if (audio) {
                    audio.pause();
                    audio.currentTime = 0;
                    syncAudioUi();
                }
                closeTranscriptModal();
            };

            window.destroySlide = function () {
                ac.abort();
            };

            syncAudioUi();
        });
    </script>
@endsection


