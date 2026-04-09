@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Listening',
        'title' => 'Listening',
        'subtitle' => 'Listen to Antoinne
from France, speaking about good and bad things about
his country ',
        'audio' => materialAsset('slider/A1/Advanced/chapter-8/audios/france.mp3'),
        'script_paragraphs' => [
            "Hi, I'm Antoine from France. My question is what is the best and worst of my country, France.",
            "So, I will start with the worst I think. For me the worst is the people mentality. For example, if you go to.... Okay, I'm from the countryside in France, so I'm from a little city, and every time I go to a big city like Paris for example, people are really mean to me. They are really rude, like in the subway, or even in the streets, they are always like not smiling, not saying hi to anybody. I'm quite used to say like 'Hi' to people, when I'm walking down the street and so on. And that was the worst part, so now I'm going to talk about the best part for me. For me in France, the best part is coming from diversity, and for example in the heart, we have a lot of museum, a lot of monuments, and the food also. We have like so much different kind of food, and it's ... I think France is like a really diversified country and that's why I love that place. Thank you",
        ],
        'positive_adjectives' => ['diversified'],
        'negative_adjectives' => ['worst', 'mean', 'rude'],
    ];
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        .listening-shell {
            min-height: 100dvh;
            width: 100%;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", sans-serif;
            background:
                linear-gradient(180deg, rgba(255,255,255,.65) 0%, rgba(248,250,252,.88) 100%),
                radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .listening-shell {
            background:
                linear-gradient(180deg, rgba(2,6,23,.88) 0%, rgba(15,23,42,.96) 100%),
                radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .listening-card {
            border-radius: 28px;
            border: 1px solid rgba(217,226,241,.9);
            background: rgba(255,255,255,.72);
            box-shadow: 0 18px 44px -34px rgba(15,23,42,.16);
            backdrop-filter: blur(8px);
        }

        .dark .listening-card {
            border-color: rgba(71,85,105,.8);
            background: rgba(15,23,42,.6);
            box-shadow: 0 18px 44px -34px rgba(2,6,23,.45);
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

        .mca-native-audio {
            display: none;
        }

        .mca-audio-track {
            position: relative;
            height: 10px;
            width: 100%;
            border-radius: 999px;
            overflow: hidden;
            background: rgba(165,180,252,.42);
        }

        .dark .mca-audio-track {
            background: rgba(99,102,241,.25);
        }

        .mca-audio-fill {
            height: 100%;
            width: 0%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 100%);
        }

        .mca-audio-knob {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border-radius: 999px;
            background: #fff;
            border: 2px solid #4f46e5;
            box-shadow: 0 6px 14px rgba(2,6,23,.18);
            left: 0%;
            pointer-events: none;
        }

        .mca-inline-audio-box {
            padding: .875rem 1.1rem;
        }

        .mca-inline-audio-row {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mca-inline-audio-main {
            flex: 1;
            min-width: 0;
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .mca-inline-audio-progress {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: .45rem;
        }

        .mca-inline-audio-btn {
            height: 3rem;
            width: 3rem;
            flex-shrink: 0;
        }

        .mca-inline-audio-icon {
            height: 1.25rem;
            width: 1.25rem;
        }

        .mca-inline-audio-track {
            height: 10px;
        }

        .mca-inline-audio-times {
            font-size: 11px;
        }

        .script-card {
            border-radius: 24px;
            border: 1px solid rgba(217,226,241,.9);
            background: linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(15,23,42,.12);
        }

        .dark .script-card {
            border-color: rgba(71,85,105,.8);
            background: linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow: 0 12px 28px -24px rgba(2,6,23,.35);
        }

        .tag-chip {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: .5rem .9rem;
            font-size: .95rem;
            line-height: 1.2;
            font-weight: 900;
        }

        .tag-positive {
            color: #166534;
            background: #ecfdf5;
            border: 1px solid rgba(34,197,94,.18);
        }

        .tag-negative {
            color: #c2410c;
            background: #fff7ed;
            border: 1px solid rgba(249,115,22,.18);
        }

        .dark .tag-positive {
            color: #bbf7d0;
            background: rgba(34,197,94,.12);
            border-color: rgba(34,197,94,.25);
        }

        .dark .tag-negative {
            color: #fdba74;
            background: rgba(249,115,22,.12);
            border-color: rgba(249,115,22,.25);
        }

        @keyframes waveGrowth {
            0%,100% { height:6px; }
            50% { height:14px; }
        }

        @media (max-width: 640px) {
            .mca-inline-audio-row {
                align-items: flex-start;
            }
        }
    </style>
@endsection

@section('content')
    <main class="listening-shell w-full">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-6 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <header class="mb-6 text-center flex flex-col items-center gap-[0.55rem]">
                    <h1 class="font-black leading-[1.08] tracking-[-0.04em] text-4xl sm:text-5xl lg:text-6xl pb-[0.08em]">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['title'] }}
                        </span>
                    </h1>
                    @if($content['subtitle'] !== '')
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    @endif
                </header>

                <section class="listening-card p-3 sm:p-4 lg:p-5">
                    <div class="mca-inline-audio-box rounded-2xl border border-indigo-100 bg-indigo-50/90 shadow-sm dark:border-indigo-700/60 dark:bg-indigo-900/30">
                        <div class="mca-inline-audio-row">
                            <button
                                id="btnPlayInlineAudio"
                                type="button"
                                class="play-hit audio-listen-btn mca-inline-audio-btn inline-flex items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-blue-500 text-white shadow-lg shadow-indigo-900/20 transition-all duration-150 active:scale-95 hover:scale-[1.06] focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                aria-label="Play audio"
                            >
                                <svg class="static-icon mca-inline-audio-icon" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8 5v14l11-7-11-7z"/>
                                </svg>
                                <span class="wave-bar" style="animation-delay:.1s"></span>
                                <span class="wave-bar" style="animation-delay:.2s"></span>
                                <span class="wave-bar" style="animation-delay:.3s"></span>
                            </button>

                            <div class="mca-inline-audio-main">
                                <div class="mca-inline-audio-progress">
                                    <div class="mca-audio-track mca-inline-audio-track cursor-pointer" id="inlineQuestionAudioProgressTrack" aria-label="Audio progress">
                                        <div class="mca-audio-fill" id="inlineQuestionAudioProgressFill"></div>
                                        <div class="mca-audio-knob" id="inlineQuestionAudioProgressKnob"></div>
                                    </div>
                                    <div class="mca-inline-audio-times flex justify-between font-extrabold text-indigo-700 dark:text-indigo-200">
                                        <span id="inlineQuestionAudioCurrentTime">0:00</span>
                                        <span id="inlineQuestionAudioTotalTime">0:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <audio id="inlineQuestionAudio" class="mca-native-audio" preload="auto" src="{{ $content['audio'] }}"></audio>
                    </div>

                    <div class="mt-4 grid gap-4 lg:grid-cols-[minmax(0,1.65fr)_minmax(280px,0.95fr)]">
                        <div class="script-card p-5 sm:p-6">
                            <div class="text-sm uppercase tracking-[0.2em] font-black text-slate-400 dark:text-slate-500">Script</div>
                            <div class="mt-3 space-y-4 text-base sm:text-lg font-bold leading-[1.7] text-slate-700 dark:text-slate-200">
                                @foreach($content['script_paragraphs'] as $paragraph)
                                    <p>{{ $paragraph }}</p>
                                @endforeach
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="script-card p-5 sm:p-6">
                                <div class="text-sm uppercase tracking-[0.2em] font-black text-emerald-600 dark:text-emerald-300">Positive adjectives</div>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach($content['positive_adjectives'] as $word)
                                        <span class="tag-chip tag-positive">{{ $word }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="script-card p-5 sm:p-6">
                                <div class="text-sm uppercase tracking-[0.2em] font-black text-orange-500 dark:text-orange-300">Negative adjectives</div>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach($content['negative_adjectives'] as $word)
                                        <span class="tag-chip tag-negative">{{ $word }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (() => {
            const audio = document.getElementById('inlineQuestionAudio');
            const btn = document.getElementById('btnPlayInlineAudio');
            const track = document.getElementById('inlineQuestionAudioProgressTrack');
            const fill = document.getElementById('inlineQuestionAudioProgressFill');
            const knob = document.getElementById('inlineQuestionAudioProgressKnob');
            const current = document.getElementById('inlineQuestionAudioCurrentTime');
            const total = document.getElementById('inlineQuestionAudioTotalTime');

            if (!audio || !btn || !track || !fill || !knob || !current || !total) {
                return;
            }

            const formatTime = (value) => {
                if (!Number.isFinite(value) || value < 0) return '0:00';
                const mins = Math.floor(value / 60);
                const secs = Math.floor(value % 60).toString().padStart(2, '0');
                return `${mins}:${secs}`;
            };

            const updateProgress = () => {
                const duration = Number.isFinite(audio.duration) && audio.duration > 0 ? audio.duration : 0;
                const time = Number.isFinite(audio.currentTime) ? audio.currentTime : 0;
                const ratio = duration > 0 ? Math.min(1, Math.max(0, time / duration)) : 0;
                fill.style.width = `${ratio * 100}%`;
                knob.style.left = `${ratio * 100}%`;
                current.textContent = formatTime(time);
                total.textContent = formatTime(duration);
            };

            const stopAudio = () => {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (e) {}
                btn.classList.remove('playing');
                updateProgress();
            };

            btn.addEventListener('click', () => {
                if (audio.paused) {
                    const playPromise = audio.play();
                    btn.classList.add('playing');
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(() => {
                            btn.classList.remove('playing');
                        });
                    }
                } else {
                    audio.pause();
                    btn.classList.remove('playing');
                }
            });

            track.addEventListener('click', (event) => {
                const rect = track.getBoundingClientRect();
                const ratio = rect.width > 0 ? (event.clientX - rect.left) / rect.width : 0;
                if (Number.isFinite(audio.duration) && audio.duration > 0) {
                    audio.currentTime = Math.min(audio.duration, Math.max(0, ratio * audio.duration));
                    updateProgress();
                }
            });

            audio.addEventListener('timeupdate', updateProgress);
            audio.addEventListener('loadedmetadata', updateProgress);
            audio.addEventListener('durationchange', updateProgress);
            audio.addEventListener('ended', () => {
                btn.classList.remove('playing');
                updateProgress();
            });
            audio.addEventListener('pause', () => {
                if (!audio.ended) {
                    btn.classList.remove('playing');
                }
            });
            audio.addEventListener('play', () => {
                btn.classList.add('playing');
            });

            updateProgress();

            window.stopSlideAudio = stopAudio;
            window.resetSlide = function () {
                stopAudio();
            };
        })();
    </script>
@endsection
