@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $gridClass = (string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4');
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    $squareImages = !empty($content['square_images']);
    $playerAudio = !empty($content['audio']) ? $content['audio'] : null;

    $normalizeScriptLines = static function ($rawScript) {
        return is_array($rawScript)
            ? array_values(array_filter(array_map(static fn ($line) => trim((string) $line), $rawScript), static fn ($line) => $line !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/(?<=[.!?])\s+/', trim((string) $rawScript)) ?: []),
                static fn ($line) => $line !== ''
            ));
    };

    $scriptLines = $normalizeScriptLines($content['script'] ?? []);
    $hasScript = $scriptLines !== [];

    $normalizeCols = static fn ($cols) => max(1, min(6, (int) $cols));

    $extractCols = static function (?string $breakpoint, string $classString, int $fallback) use ($normalizeCols) {
        $pattern = $breakpoint
            ? '/(?:^|\s)' . preg_quote($breakpoint, '/') . ':grid-cols-(\d+)/'
            : '/(?:^|\s)grid-cols-(\d+)/';

        if (preg_match($pattern, $classString, $match)) {
            return $normalizeCols($match[1]);
        }

        return $fallback;
    };

    $baseCols = $extractCols(null, $gridClass, 1);
    $smCols = $extractCols('sm', $gridClass, $baseCols);
    $lgCols = $extractCols('lg', $gridClass, $smCols);
    $xlCols = $extractCols('xl', $gridClass, $lgCols);

    $storageKey = 'missing-word-game-' . md5(request()->path());
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .word-game-shell{
            min-height:100dvh;
            width:100%;
            overflow-x:hidden;
            font-family:"Plus Jakarta Sans", sans-serif;
            background:
                    linear-gradient(180deg, rgba(255,255,255,.65) 0%, rgba(248,250,252,.88) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(79,70,229,.08), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.08), transparent 55%);
        }

        .dark .word-game-shell{
            background:
                    linear-gradient(180deg, rgba(2,6,23,.88) 0%, rgba(15,23,42,.96) 100%),
                    radial-gradient(900px 420px at 8% 6%, rgba(99,102,241,.16), transparent 55%),
                    radial-gradient(720px 420px at 100% 0%, rgba(59,130,246,.14), transparent 55%);
        }

        .word-game-inner{
            min-height:100dvh;
            width:100%;
            max-width:1320px;
            margin:0 auto;
            padding:20px 16px 28px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .word-game-main{
            width:100%;
        }

        .top-actions{
            width:100%;
            max-width:80rem;
            margin:0 auto 16px;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:12px;
            flex-wrap:wrap;
        }

        .top-actions-buttons{
            display:flex;
            align-items:center;
            gap:.75rem;
            flex-wrap:wrap;
        }

        .mca-btn-primary{
            appearance:none;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.55rem .85rem;
            font-size:.8rem;
            font-weight:900;
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
            background:linear-gradient(135deg, #9333ea, #4f46e5, #2563eb);
            box-shadow:0 10px 24px rgba(79,70,229,.10);
            transition:transform .2s ease, box-shadow .2s ease, opacity .2s ease, background-color .2s ease;
        }

        .mca-btn-primary:hover{
            transform:scale(1.05);
        }

        .mca-btn-primary:active{
            transform:scale(.95);
        }

        .mca-btn-reveal{
            color:rgb(154 52 18);
            border-color:rgb(253 186 116);
            background:rgb(255 237 213);
            box-shadow:0 8px 22px rgba(234,88,12,.10);
        }

        .mca-btn-reveal:hover{
            background:rgb(254 215 170);
            box-shadow:0 10px 24px rgba(234,88,12,.14);
        }

        .dark .mca-btn-reveal{
            color:rgb(254 215 170);
            border-color:rgba(194, 65, 12, .45);
            background:rgba(154, 52, 18, .35);
        }

        .dark .mca-btn-reveal:hover{
            background:rgba(154, 52, 18, .5);
        }

        .mca-btn-check{
            background:linear-gradient(135deg, #4f46e5, #3b82f6);
            box-shadow:0 10px 24px rgba(59,130,246,.14);
        }

        .mca-btn-check:hover{
            box-shadow:0 12px 28px rgba(59,130,246,.20);
        }

        .mca-btn-secondary{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            border-radius:.5rem;
            padding:.55rem .85rem;
            font-size:.8rem;
            font-weight:900;
            color:rgb(15 23 42);
            border:1px solid rgb(226 232 240);
            background:#fff;
            box-shadow:0 8px 22px rgba(2,6,23,.05);
            transition:transform .2s ease, background .2s ease, box-shadow .2s ease, opacity .2s ease, color .2s ease, border-color .2s ease;
        }

        .mca-btn-secondary:hover{
            transform:scale(1.05);
            background:rgb(248 250 252);
        }

        .mca-btn-secondary:active{
            transform:scale(.98);
        }

        .dark .mca-btn-secondary{
            color:rgb(241 245 249);
            border-color:rgba(71,85,105,.8);
            background:rgba(15,23,42,.92);
            box-shadow:0 8px 22px rgba(2,6,23,.18);
        }

        .dark .mca-btn-secondary:hover{
            background:rgba(30,41,59,.96);
        }

        .word-grid{
            display:grid;
            width:100%;
            max-width:1240px;
            margin:0 auto;
            gap:14px;
            grid-template-columns:repeat(1, minmax(0, 1fr));
        }

        .word-grid[data-base-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));} 
        .word-grid[data-base-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
        .word-grid[data-base-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
        .word-grid[data-base-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
        .word-grid[data-base-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}

        .word-card{
            display:flex;
            flex-direction:column;
            min-height:100%;
            border-radius:24px;
            border:1px solid rgba(217,226,241,.9);
            background:linear-gradient(180deg, rgba(255,255,255,.95) 0%, rgba(248,250,252,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(15,23,42,.12);
            padding:16px;
            transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .dark .word-card{
            border-color:rgba(71,85,105,.8);
            background:linear-gradient(180deg, rgba(15,23,42,.94) 0%, rgba(17,24,39,.94) 100%);
            box-shadow:0 12px 28px -24px rgba(2,6,23,.35);
        }

        .word-card:hover{
            transform:translateY(-2px);
            border-color:rgba(99,102,241,.28);
            box-shadow:0 18px 40px -28px rgba(37,99,235,.18);
        }

        .word-card.ring-2{
            border-color:rgba(99,102,241,.34);
            box-shadow:0 0 0 1px rgba(99,102,241,.12), 0 18px 40px -28px rgba(79,70,229,.35);
        }

        .word-image-frame{
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:180px;
            height:clamp(180px, 18vw, 230px);
            padding:0;
            border-radius:18px;
            overflow:hidden;
            background:rgba(238,242,255,.72);
            border:1px solid rgba(199,210,254,.65);
        }

        .dark .word-image-frame{
            background:rgba(30,41,59,.72);
            border-color:rgba(99,102,241,.18);
        }

        .word-image{
            width:100%;
            height:100%;
            max-height:none;
            object-fit:cover;
        }

        .word-image-empty{
            display:flex;
            align-items:center;
            justify-content:center;
            width:100%;
            min-height:170px;
            border-radius:16px;
            border:1px dashed rgba(148,163,184,.7);
            color:#94a3b8;
            font-size:.95rem;
            line-height:1.35;
            font-weight:800;
            text-align:center;
            padding:12px;
            background:rgba(255,255,255,.45);
        }

        .dark .word-image-empty{
            border-color:rgba(100,116,139,.75);
            color:#94a3b8;
            background:rgba(15,23,42,.35);
        }

        .card-audio{
            position:absolute;
            top:12px;
            right:12px;
            z-index:2;
        }

        .speak-btn{
            -webkit-tap-highlight-color:transparent;
            border:0;
            cursor:pointer;
            background:transparent;
            padding:0;
        }

        .speak-btn:focus-visible{
            outline:none;
        }

        .speak-btn-shell{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:44px;
            height:44px;
            border-radius:999px;
            color:#ffffff;
            border:1px solid rgba(255,255,255,.62);
            background:rgba(15,23,42,.22);
            box-shadow:
                    0 14px 28px -18px rgba(15,23,42,.6),
                    inset 0 1px 0 rgba(255,255,255,.18);
            backdrop-filter:blur(10px);
            -webkit-backdrop-filter:blur(10px);
            transition:transform .16s ease, background-color .16s ease;
        }

        .speak-btn:hover .speak-btn-shell{
            transform:scale(1.04);
            background:rgba(15,23,42,.3);
        }

        .speak-btn.speaking .speak-btn-shell{
            background:rgba(79,70,229,.54);
        }

        .wave-bar{
            display:none;
            width:3px;
            height:12px;
            background:currentColor;
            border-radius:2px;
            margin:0 1px;
        }

        .speak-btn.speaking .wave-bar{
            display:block;
            animation:waveGrowth .6s infinite ease-in-out;
        }

        .speak-btn.speaking .static-icon{
            display:none;
        }

        @keyframes waveGrowth{
            0%,100%{height:6px;}
            50%{height:16px;}
        }

        .word-answer{
            margin-top:14px;
            width:100%;
            display:flex;
            align-items:center;
            gap:8px;
            flex-wrap:wrap;
            font-size:1.04rem;
            line-height:1.4;
            font-weight:900;
            color:#0f172a;
        }

        .dark .word-answer{
            color:#f8fafc;
        }

        .word-prefix,
        .word-suffix{
            flex:0 0 auto;
            letter-spacing:.01em;
            white-space:pre;
        }

        .word-input{
            box-sizing:content-box;
            flex:var(--answer-length, 1) 1 var(--answer-text-width, 3ch);
            width:var(--answer-text-width, 3ch);
            min-width:var(--answer-text-width, 1ch);
            height:36px;
            border-radius:12px;
            border:1.5px solid #cbd5e1;
            background:rgba(255,255,255,.96);
            color:#0f172a;
            padding:6px 8px;
            font-size:.95rem;
            line-height:1;
            font-weight:900;
            text-align:center;
            text-transform:uppercase;
            outline:none;
            transition:border-color .18s ease, box-shadow .18s ease, background-color .18s ease;
        }

        .word-input:focus{
            border-color:#6366f1;
            box-shadow:0 0 0 4px rgba(99,102,241,.12);
        }

        .dark .word-input{
            border-color:#334155;
            background:rgba(15,23,42,.98);
            color:#f8fafc;
        }

        .word-input.is-correct{
            border-color:#16a34a;
            background:rgba(220,252,231,.9);
            color:#166534;
        }

        .word-input.is-wrong{
            border-color:#dc2626;
            background:rgba(254,226,226,.95);
            color:#991b1b;
        }

        .dark .word-input.is-correct{
            background:rgba(20,83,45,.34);
            color:#bbf7d0;
        }

        .dark .word-input.is-wrong{
            background:rgba(127,29,29,.34);
            color:#fecaca;
        }

        .word-result{
            min-width:22px;
            font-size:1.1rem;
            font-weight:900;
            line-height:1;
        }

        .word-result.is-correct{
            color:#16a34a;
        }

        .word-result.is-wrong{
            color:#dc2626;
        }

        @media (min-width: 640px){
            .word-game-inner{
                padding:24px 20px 32px;
            }

            .word-grid{
                gap:16px;
            }

            .word-grid[data-sm-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .word-grid[data-sm-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .word-grid[data-sm-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .word-grid[data-sm-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .word-grid[data-sm-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .word-grid[data-sm-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1024px){
            .word-grid{
                gap:18px;
            }

            .word-grid[data-lg-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .word-grid[data-lg-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .word-grid[data-lg-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .word-grid[data-lg-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .word-grid[data-lg-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .word-grid[data-lg-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1280px){
            .word-grid[data-xl-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .word-grid[data-xl-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .word-grid[data-xl-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .word-grid[data-xl-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .word-grid[data-xl-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .word-grid[data-xl-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (max-width: 639px){
            .word-card{
                padding:14px;
                border-radius:24px;
            }

            .word-image-frame{
                min-height:150px;
                height:170px;
            }

            .word-image{
                max-height:none;
            }

            .word-answer{
                font-size:.98rem;
            }

            .word-input{
                width:var(--answer-text-width, 3ch);
                min-width:var(--answer-text-width, 1ch);
                height:34px;
            }
        }

        .word-game-square-images .word-image-frame{
            aspect-ratio:1 / 1;
            height:auto;
            min-height:0;
        }

        .word-game-square-images .word-image{
            object-fit:cover;
        }
    </style>
@endsection

@section('content')
    <div class="word-game-shell">
        <div class="word-game-inner">
            <main class="word-game-main{{ $squareImages ? ' word-game-square-images' : '' }}">
                @include('slider.components.title-subtitle')


                @include('slider.components.game-status')

                @if(!empty($playerAudio))
                    <div class="mx-auto mt-4 mb-6 max-w-4xl px-1 sm:px-0">
                        @include('slider.components.audio-player')
                    </div>
                @endif

                <div class="top-actions">
                    <div class="top-actions-buttons">
                        <button type="button" class="mca-btn-primary mca-btn-reveal" id="btnRevealAnswers">Reveal answers</button>
                        <button type="button" class="mca-btn-secondary hidden" id="btnRetakeTest">Retake test</button>
                        <button type="button" class="mca-btn-primary mca-btn-check" id="checkAnswersBtn">Check Answers</button>
                    </div>
                </div>

                <section
                        class="word-grid"
                        data-base-cols="{{ $baseCols }}"
                        data-sm-cols="{{ $smCols }}"
                        data-lg-cols="{{ $lgCols }}"
                        data-xl-cols="{{ $xlCols }}"
                >
                    @foreach($items as $index => $item)
                        @php
                            $parts = $item['parts'] ?? null;

                            if (!is_array($parts)) {
                                $parts = [];

                                if (($item['prefix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['prefix']];
                                }

                                $parts[] = ['answer' => (string) ($item['answer'] ?? '')];

                                if (($item['suffix'] ?? '') !== '') {
                                    $parts[] = ['text' => $item['suffix']];
                                }
                            }
                        @endphp

                        <article class="word-card">
                            <div class="word-image-frame">
                                @if(!empty($item['image']))
                                    <img
                                            src="{{ $item['image'] }}"
                                            alt="{{ $item['name'] ?? ('Item ' . ($item['number'] ?? ($index + 1))) }}"
                                            loading="lazy"
                                            class="word-image"
                                    />
                                @else
                                    <div class="word-image-empty">Image not available</div>
                                @endif

                                @if(!empty($item['sound']))
                                    <div class="card-audio">
                                        <button
                                                type="button"
                                                class="speak-btn"
                                                aria-label="Play Audio"
                                                data-audio="{{ $item['sound'] }}"
                                        >
                                            <span class="speak-btn-shell">
                                                <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>
                                                <span class="wave-bar" style="animation-delay:.1s"></span>
                                                <span class="wave-bar" style="animation-delay:.2s"></span>
                                                <span class="wave-bar" style="animation-delay:.3s"></span>
                                            </span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div class="word-answer">
                                @php $inputCounter = 0; @endphp

                                @foreach($parts as $part)
                                    @if(array_key_exists('text', $part))
                                        <span class="word-prefix">{{ $part['text'] }}</span>
                                    @endif

                                    @if(array_key_exists('answer', $part))
                                        @php
                                            $fieldId = 'missing-word-' . $index . '-' . $inputCounter;
                                            $answerValue = strtoupper((string) $part['answer']);
                                            $maxLength = max(1, mb_strlen((string) $part['answer']));
                                        @endphp

                                        <input
                                                id="{{ $fieldId }}"
                                                type="text"
                                                class="word-input js-word-input"
                                                style="--answer-length: {{ $maxLength }}; --answer-text-width: {{ $maxLength }}ch"
                                                maxlength="{{ $maxLength }}"
                                                placeholder="{{ $part['placeholder'] ?? '' }}"
                                                data-key="{{ $index }}-{{ $inputCounter }}"
                                                data-group="{{ $index }}"
                                                data-answer="{{ $answerValue }}"
                                                autocomplete="off"
                                                autocapitalize="characters"
                                                spellcheck="false"
                                        />

                                        @php $inputCounter++; @endphp
                                    @endif
                                @endforeach

                                <span class="word-result js-word-result" aria-live="polite"></span>
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storageKey = @json($storageKey);
            const inputs = Array.from(document.querySelectorAll('.js-word-input'));
            const cards = Array.from(document.querySelectorAll('.word-card'));
            const checkBtn = document.getElementById('checkAnswersBtn');
            const btnRevealAnswers = document.getElementById('btnRevealAnswers');
            const btnRetakeTest = document.getElementById('btnRetakeTest');
            const progressCountEl = document.getElementById('tilesCount');
            const correctCountEl = document.getElementById('correctCount');
            const mistakesCountEl = document.getElementById('mistakesCount');
            const timerEl = document.getElementById('gameTimer');

            const audio = {
                correct: new Audio('/slider/sounds/correct.wav'),
                wrong: new Audio('/slider/sounds/wrong.wav'),
                success: new Audio('/slider/sounds/success.wav')
            };
            const vocabAudio = new Audio();
            vocabAudio.preload = 'auto';
            vocabAudio.crossOrigin = 'anonymous';
            let currentAudioBtn = null;
            let currentAudioCard = null;
            let currentAudioSrc = '';

            Object.values(audio).forEach((sound) => {
                sound.preload = 'auto';
                sound.volume = 1;
            });

            const play = (sound) => {
                if (!sound) return;
                try {
                    sound.pause();
                    sound.currentTime = 0;
                    sound.play().catch(() => {});
                } catch (e) {}
            };

            const setAudioBtnState = (btn, isPlaying) => {
                if (btn) btn.classList.toggle('speaking', isPlaying);
            };

            const setAudioCardState = (card, isPlaying) => {
                if (!card) return;
                card.classList.toggle('ring-2', isPlaying);
                card.classList.toggle('ring-indigo-500/30', isPlaying);
                card.classList.toggle('dark:ring-indigo-400/20', isPlaying);
            };

            const resetCurrentAudio = () => {
                if (currentAudioBtn) setAudioBtnState(currentAudioBtn, false);
                if (currentAudioCard) setAudioCardState(currentAudioCard, false);
                currentAudioBtn = null;
                currentAudioCard = null;
                currentAudioSrc = '';
            };

            const stopVocabAudio = () => {
                try {
                    vocabAudio.pause();
                    vocabAudio.currentTime = 0;
                    vocabAudio.removeAttribute('src');
                    vocabAudio.load();
                } catch (e) {}

                resetCurrentAudio();
            };

            const playOrToggleVocabAudio = (btn) => {
                const src = btn.getAttribute('data-audio') || '';
                const card = btn.closest('.word-card');
                if (!src) return;

                if (currentAudioSrc === src && !vocabAudio.paused) {
                    stopVocabAudio();
                    return;
                }

                stopVocabAudio();
                window.stopAudioPlayer?.();

                currentAudioBtn = btn;
                currentAudioCard = card;
                currentAudioSrc = src;

                setAudioBtnState(currentAudioBtn, true);
                setAudioCardState(currentAudioCard, true);

                try {
                    vocabAudio.src = src;
                    vocabAudio.currentTime = 0;
                    const playPromise = vocabAudio.play();
                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(() => stopVocabAudio());
                    }
                } catch (e) {
                    stopVocabAudio();
                }
            };

            let savedData = {};
            let wrongTries = 0;
            let startTime = Date.now();
            let timerInt = null;

            try {
                savedData = JSON.parse(localStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                savedData = {};
            }

            const saveAll = () => {
                const payload = {};
                inputs.forEach((input) => {
                    payload[input.dataset.key] = input.value || '';
                });
                localStorage.setItem(storageKey, JSON.stringify(payload));
            };

            const normalizeValue = (value) => {
                return (value || '')
                    .toUpperCase()
                    .replace(/[^A-Z0-9]/g, '');
            };

            const formatTime = (seconds) => {
                if (!isFinite(seconds) || seconds < 0) seconds = 0;
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            };

            const updateTimer = () => {
                if (!timerEl) return;
                timerEl.textContent = formatTime((Date.now() - startTime) / 1000);
            };

            const startTimer = () => {
                clearInterval(timerInt);
                updateTimer();
                timerInt = setInterval(updateTimer, 1000);
            };

            const clearCardFeedback = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                const result = card.querySelector('.js-word-result');

                cardInputs.forEach((input) => {
                    input.classList.remove('is-correct', 'is-wrong');
                });

                if (result) {
                    result.textContent = '';
                    result.classList.remove('is-correct', 'is-wrong');
                }
            };

            const isCardCorrect = (card) => {
                const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                if (!cardInputs.length) return false;

                return cardInputs.every((input) => {
                    const userValue = normalizeValue(input.value);
                    const correctValue = (input.dataset.answer || '').toUpperCase();
                    return userValue !== '' && userValue === correctValue;
                });
            };

            const getCorrectTotal = () => {
                return cards.filter((card) => isCardCorrect(card)).length;
            };

            const updateStatusUI = () => {
                const correctTotal = getCorrectTotal();
                const totalCards = cards.length;

                if (progressCountEl) progressCountEl.textContent = `${correctTotal}/${totalCards}`;
                if (correctCountEl) correctCountEl.textContent = String(correctTotal);
                if (mistakesCountEl) mistakesCountEl.textContent = String(wrongTries);
            };

            const updateActionButtons = ({ revealed = false } = {}) => {
                if (btnRevealAnswers) {
                    btnRevealAnswers.classList.toggle('hidden', revealed);
                }
                if (btnRetakeTest) {
                    btnRetakeTest.classList.toggle('hidden', !revealed);
                }
            };

            inputs.forEach((input) => {
                const key = input.dataset.key;
                const answer = (input.dataset.answer || '').toUpperCase();

                if (typeof savedData[key] === 'string') {
                    input.value = normalizeValue(savedData[key]).slice(0, answer.length);
                }

                input.addEventListener('input', () => {
                    input.value = normalizeValue(input.value).slice(0, answer.length);

                    const card = input.closest('.word-card');
                    if (card) clearCardFeedback(card);

                    saveAll();
                    updateStatusUI();
                });

                input.addEventListener('blur', () => {
                    input.value = normalizeValue(input.value).slice(0, answer.length);
                    saveAll();
                });
            });

            document.querySelectorAll('.speak-btn').forEach((btn) => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggleVocabAudio(btn);
                });
            });

            vocabAudio.addEventListener('ended', stopVocabAudio);
            vocabAudio.addEventListener('error', stopVocabAudio);

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopVocabAudio();
            });

            window.addEventListener('beforeunload', stopVocabAudio);
            window.addEventListener('pagehide', stopVocabAudio);

            checkBtn?.addEventListener('click', () => {
                let hasWrong = false;
                let hasCorrect = false;
                let allCorrect = true;

                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');
                    let cardCorrect = true;

                    cardInputs.forEach((input) => {
                        const userValue = normalizeValue(input.value);
                        const correctValue = (input.dataset.answer || '').toUpperCase();

                        input.classList.remove('is-correct', 'is-wrong');

                        if (userValue !== '' && userValue === correctValue) {
                            input.classList.add('is-correct');
                        } else {
                            input.classList.add('is-wrong');
                            cardCorrect = false;
                        }
                    });

                    if (result) {
                        result.classList.remove('is-correct', 'is-wrong');

                        if (cardCorrect) {
                            result.textContent = '✓';
                            result.classList.add('is-correct');
                            hasCorrect = true;
                        } else {
                            result.textContent = '✕';
                            result.classList.add('is-wrong');
                            hasWrong = true;
                            allCorrect = false;
                        }
                    }
                });

                if (hasWrong) {
                    wrongTries += 1;
                    play(audio.wrong);
                } else if (hasCorrect) {
                    play(audio.correct);
                }

                if (allCorrect && cards.length > 0) {
                    play(audio.success);
                    clearInterval(timerInt);
                }

                updateStatusUI();
                saveAll();
            });

            btnRevealAnswers?.addEventListener('click', () => {
                cards.forEach((card) => {
                    const cardInputs = Array.from(card.querySelectorAll('.js-word-input'));
                    const result = card.querySelector('.js-word-result');

                    cardInputs.forEach((input) => {
                        const correctValue = (input.dataset.answer || '').toUpperCase();
                        input.value = correctValue;
                        input.classList.remove('is-wrong');
                        input.classList.add('is-correct');
                    });

                    if (result) {
                        result.textContent = '✓';
                        result.classList.remove('is-wrong');
                        result.classList.add('is-correct');
                    }
                });

                saveAll();
                updateStatusUI();
                updateActionButtons({ revealed: true });
                play(audio.success);
                clearInterval(timerInt);
            });

            btnRetakeTest?.addEventListener('click', () => {
                window.resetSlide?.();
            });

            updateActionButtons({ revealed: false });
            updateStatusUI();
            startTimer();

            window.resetSlide = () => {
                stopVocabAudio();
                window.stopAudioPlayer?.();

                inputs.forEach((input) => {
                    input.value = '';
                });

                cards.forEach((card) => clearCardFeedback(card));

                wrongTries = 0;
                startTime = Date.now();
                localStorage.removeItem(storageKey);
                updateActionButtons({ revealed: false });
                updateStatusUI();
                startTimer();
            };

            window.stopSlideAudio = () => {
                clearInterval(timerInt);
                stopVocabAudio();
                window.stopAudioPlayer?.();
                Object.values(audio).forEach((sound) => {
                    try {
                        sound.pause();
                        sound.currentTime = 0;
                    } catch (e) {}
                });
            };
        });
    </script>
@endsection
