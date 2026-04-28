<?php
$content = [
    'page_title' => 'Listen',
    'title' => 'Listen',
    'subtitle' => 'repeat the sentences & Check () the features you like.',
    'instruction' => '',
    'cards' => [
        [
            'sentence' => 'He has a beard and a mustache.',
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide17/Sixteen.webp'),
            'alt' => 'A man with a beard and mustache',
        ],
        [
            'sentence' => 'She has pierced ears.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Pierced-ears.webp'),
            'alt' => 'A woman with pierced ears',
        ],
        [
            'sentence' => 'He has a shaved head. He\'s bald.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/shaved-head.webp'),
            'alt' => 'A man with a shaved head',
        ],
        [
            'sentence' => 'She wears braces.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Baces.webp'),
            'alt' => 'A girl wearing braces',
        ],
        [
            'sentence' => 'She has long fingernails.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Fingernails.webp'),
            'alt' => 'Long fingernails',
        ],
        [
            'sentence' => 'He wears his hair in a ponytail.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Ponytail.webp'),
            'alt' => 'A man with a ponytail',
        ],
        [
            'sentence' => 'She\'s got freckles.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/Freckles.webp'),
            'alt' => 'A girl with freckles',
        ],
        [
            'sentence' => 'She wears her hair in cornrows.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide6/cornrows.webp'),
            'alt' => 'A girl with cornrows',
        ],
        [
            'sentence' => 'She wears glasses.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/intelligent.webp'),
            'alt' => 'A woman wearing glasses',
        ],
        [
            'sentence' => 'He\'s very muscular.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/Muscular.webp'),
            'alt' => 'A muscular man',
        ],
        [
            'sentence' => 'She wears braids.',
            'image' => materialAsset('slider/A2/Beginner/chapter-8/img/slide9/braided-hair.webp'),
            'alt' => 'A woman with braids',
        ],
        [
            'sentence' => 'He\'s got spiked hair.',
            'image' => materialAsset('slider/A2/Beginner/chapter-7/img/slide4/spiky.webp'),
            'alt' => 'A man with spiked hair',
        ],
    ],
];

$baseCols = 1;
$smCols = 2;
$lgCols = 3;
$xlCols = 4;
$items = $content['cards'];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .listen-instruction {
            border-radius: 16px;
            border: 1px dashed #93c5fd;
            background: rgba(255, 255, 255, 0.82);
            color: #1e3a8a;
        }

        .dark .listen-instruction {
            border-color: #475569;
            background: rgba(15, 23, 42, 0.75);
            color: #dbeafe;
        }

        .image-card-grid {
            display: grid;
            width: 100%;
            margin: 0 auto;
            gap: 14px;
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .image-card-grid[data-base-cols="2"] { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .image-card-grid[data-base-cols="3"] { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .image-card-grid[data-base-cols="4"] { grid-template-columns: repeat(4, minmax(0, 1fr)); }

        .image-vocab-card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 100%;
            overflow: hidden;
            border-radius: 24px;
            border: 1px solid rgba(191, 219, 254, .95);
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 18px 44px -30px rgba(15, 23, 42, .24);
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
            cursor: pointer;
        }

        .dark .image-vocab-card {
            border-color: rgba(51, 65, 85, .95);
            background: rgba(15, 23, 42, .9);
            box-shadow: 0 20px 46px -32px rgba(2, 6, 23, .72);
        }

        .image-vocab-card:hover {
            transform: translateY(-2px);
            border-color: rgba(59, 130, 246, .45);
            box-shadow: 0 24px 54px -32px rgba(37, 99, 235, .32);
        }

        .image-vocab-card.is-selected {
            border-color: rgba(249, 115, 22, .75);
            box-shadow: 0 0 0 2px rgba(249, 115, 22, .18), 0 24px 54px -32px rgba(249, 115, 22, .35);
        }

        .card-media-box {
            position: relative;
            overflow: hidden;
            background: #e2e8f0;
        }

        .card-media-box::before {
            content: "";
            display: block;
            padding-top: 70%;
        }

        .dark .card-media-box {
            background: #1e293b;
        }

        .card-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .35s ease;
        }

        .image-vocab-card:hover .card-image {
            transform: scale(1.03);
        }

        .card-image-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to top, rgba(15, 23, 42, .62), rgba(15, 23, 42, .09) 45%, rgba(15, 23, 42, 0) 70%),
                linear-gradient(135deg, rgba(59, 130, 246, .22), transparent 56%);
            pointer-events: none;
        }

        .card-index-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
            width: 28px;
            height: 28px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            font-weight: 900;
            color: #1d4ed8;
            background: rgba(219, 234, 254, .95);
            border: 1px solid rgba(255, 255, 255, .7);
        }

        .dark .card-index-badge {
            color: #bfdbfe;
            background: rgba(30, 41, 59, .95);
            border-color: rgba(100, 116, 139, .65);
        }

        .card-audio {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 3;
        }

        .speak-btn {
            border: 0;
            cursor: pointer;
            -webkit-tap-highlight-color: transparent;
            background: transparent;
        }

        .speak-btn:focus-visible {
            outline: none;
        }

        .speak-btn-shell {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, .62);
            background: rgba(15, 23, 42, .34);
            box-shadow: 0 10px 22px -14px rgba(15, 23, 42, .8), inset 0 1px 0 rgba(255, 255, 255, .16);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: transform .16s ease, background-color .16s ease;
        }

        .speak-btn:hover .speak-btn-shell {
            transform: scale(1.05);
            background: rgba(15, 23, 42, .45);
        }

        .speak-btn.speaking .speak-btn-shell {
            background: rgba(249, 115, 22, .9);
        }

        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speak-btn.speaking .wave-bar {
            display: block;
            animation: waveGrowth .6s infinite ease-in-out;
        }

        .speak-btn.speaking .static-icon {
            display: none;
        }

        @keyframes waveGrowth {
            0%, 100% { height: 6px; }
            50% { height: 16px; }
        }

        .card-selected-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: .2rem .55rem;
            font-size: .68rem;
            font-weight: 900;
            letter-spacing: .02em;
            color: #ffffff;
            background: #f97316;
            border: 1px solid rgba(255, 255, 255, .5);
        }

        .image-vocab-card.is-selected .card-selected-badge {
            display: inline-flex;
        }

        .card-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: center;
            padding: 13px 13px 14px;
            border-top: 1px solid #dbeafe;
        }

        .dark .card-body {
            border-top-color: #334155;
        }

        .card-checkline {
            display: flex;
            align-items: flex-start;
            gap: .6rem;
            cursor: pointer;
            user-select: none;
        }

        .card-check-input {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        .card-check-indicator {
            display: none;
        }

        .dark .card-check-indicator {
            display: none;
        }

        .card-check-input:checked + .card-check-indicator {
            display: none;
        }

        .card-body-title {
            color: #0f172a;
            font-size: .95rem;
            line-height: 1.32;
            font-weight: 900;
            letter-spacing: -.02em;
        }

        .dark .card-body-title {
            color: #f8fafc;
        }

        .listen-toolbar {
            border-radius: 14px;
            border: 1px solid #bfdbfe;
            /*background: rgba(255, 255, 255, 0.75);*/
        }

        .dark .listen-toolbar {
            border-color: #334155;
            background: rgba(2, 6, 23, 0.5);
        }

        .clear-btn {
            border-radius: 10px;
            border: 1px solid #f97316;
            background: #f97316;
            color: #ffffff;
            font-weight: 800;
            font-size: 0.8rem;
            padding: 0.35rem 0.75rem;
            transition: background .15s ease, transform .15s ease;
        }

        .clear-btn:hover {
            background: #ea580c;
        }

        .clear-btn:active {
            transform: scale(0.97);
        }

        @media (min-width: 640px) {
            .image-card-grid {
                gap: 16px;
            }

            .image-card-grid[data-sm-cols="1"] { grid-template-columns: repeat(1, minmax(0, 1fr)); }
            .image-card-grid[data-sm-cols="2"] { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .image-card-grid[data-sm-cols="3"] { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .image-card-grid[data-sm-cols="4"] { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        @media (min-width: 1024px) {
            .image-card-grid[data-lg-cols="1"] { grid-template-columns: repeat(1, minmax(0, 1fr)); }
            .image-card-grid[data-lg-cols="2"] { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .image-card-grid[data-lg-cols="3"] { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .image-card-grid[data-lg-cols="4"] { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        @media (min-width: 1280px) {
            .image-card-grid[data-xl-cols="1"] { grid-template-columns: repeat(1, minmax(0, 1fr)); }
            .image-card-grid[data-xl-cols="2"] { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .image-card-grid[data-xl-cols="3"] { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .image-card-grid[data-xl-cols="4"] { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }

        @media (max-width: 640px) {
            .card-body-title {
                font-size: 0.88rem;
                line-height: 1.2rem;
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-7xl px-3 sm:px-6 lg:px-8 py-4 sm:py-6">
            <section class="listen-board p-3.5 sm:p-5 lg:p-6">
                <header class="mb-4 text-center">
                    @include('slider.components.title-subtitle')
                </header>

                <div class="listen-toolbar px-3 py-2.5 mb-4 flex items-center justify-between gap-2 flex-wrap">
                    <p class="text-xs sm:text-sm font-extrabold text-slate-700 dark:text-slate-100">
                        Selected: <span id="selectedCount">0</span> / {{ count($content['cards']) }}
                    </p>
                    <button id="clearChecksBtn" type="button" class="clear-btn">Clear checks</button>
                </div>

                <section
                    class="image-card-grid"
                    data-base-cols="{{ $baseCols }}"
                    data-sm-cols="{{ $smCols }}"
                    data-lg-cols="{{ $lgCols }}"
                    data-xl-cols="{{ $xlCols }}"
                >
                    @foreach($items as $index => $item)
                        <article class="image-vocab-card vocab-card" data-index="{{ $index }}">
                            <div class="card-media-box">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['alt'] ?? $item['sentence'] }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="card-image"
                                >
                                <div class="card-image-overlay"></div>
                                <div class="card-audio">
                                    <button
                                        type="button"
                                        class="speak-btn js-speak-btn"
                                        aria-label="Play sentence {{ $index + 1 }}"
                                        data-text="{{ $item['sentence'] }}"
                                    >
                                        <span class="speak-btn-shell">
                                            <svg class="static-icon h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <span class="wave-bar" style="animation-delay:.1s"></span>
                                            <span class="wave-bar" style="animation-delay:.2s"></span>
                                            <span class="wave-bar" style="animation-delay:.3s"></span>
                                        </span>
                                    </button>
                                </div>
                                <span class="card-selected-badge">Selected</span>
                            </div>

                            <div class="card-body">
                                <label class="card-checkline" for="feature_{{ $index }}">
                                    <input id="feature_{{ $index }}" type="checkbox" class="js-feature-check card-check-input" aria-label="Select feature {{ $index + 1 }}">
                                    <span class="card-check-indicator" aria-hidden="true"></span>
                                    <span class="card-body-title">{{ $item['sentence'] }}</span>
                                </label>
                            </div>
                        </article>
                    @endforeach
                </section>
            </section>
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
            const checks = Array.from(document.querySelectorAll('.js-feature-check'));
            const cards = Array.from(document.querySelectorAll('.vocab-card'));
            const speakButtons = Array.from(document.querySelectorAll('.js-speak-btn'));
            const selectedCountEl = document.getElementById('selectedCount');
            const clearBtn = document.getElementById('clearChecksBtn');
            const synth = window.speechSynthesis || null;
            const AudioContextClass = window.AudioContext || window.webkitAudioContext;

            let activeSpeakBtn = null;
            let fxCtx = null;

            const playSelectSound = () => {
                try {
                    if (!AudioContextClass) return;
                    if (!fxCtx) fxCtx = new AudioContextClass();
                    if (fxCtx.state === 'suspended') fxCtx.resume();

                    const now = fxCtx.currentTime;
                    const osc = fxCtx.createOscillator();
                    const gain = fxCtx.createGain();

                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(640, now);
                    osc.frequency.linearRampToValueAtTime(840, now + 0.1);

                    gain.gain.setValueAtTime(0, now);
                    gain.gain.linearRampToValueAtTime(0.17, now + 0.02);
                    gain.gain.exponentialRampToValueAtTime(0.001, now + 0.2);

                    osc.connect(gain);
                    gain.connect(fxCtx.destination);
                    osc.start(now);
                    osc.stop(now + 0.21);
                } catch (e) {
                    // Ignore sound errors.
                }
            };

            const stopSpeaking = () => {
                if (synth) synth.cancel();
                if (activeSpeakBtn) activeSpeakBtn.classList.remove('speaking');
                activeSpeakBtn = null;
            };

            const speakText = (btn) => {
                const text = (btn.getAttribute('data-text') || '').trim();
                if (!text || !synth || typeof SpeechSynthesisUtterance === 'undefined') return;

                if (activeSpeakBtn === btn) {
                    stopSpeaking();
                    return;
                }

                stopSpeaking();

                const utterance = new SpeechSynthesisUtterance(text);
                utterance.rate = 0.92;
                utterance.pitch = 1;
                utterance.lang = 'en-US';
                utterance.onend = stopSpeaking;
                utterance.onerror = stopSpeaking;

                activeSpeakBtn = btn;
                activeSpeakBtn.classList.add('speaking');
                synth.speak(utterance);
            };

            const syncCardState = (checkbox) => {
                const card = checkbox.closest('.vocab-card');
                if (!card) return;
                card.classList.toggle('is-selected', checkbox.checked);
            };

            const syncCount = () => {
                const selected = checks.filter((checkbox) => checkbox.checked).length;
                if (selectedCountEl) selectedCountEl.textContent = String(selected);
            };

            checks.forEach((checkbox) => {
                checkbox.addEventListener('change', () => {
                    syncCardState(checkbox);
                    syncCount();
                    if (checkbox.checked) playSelectSound();
                });
            });

            clearBtn?.addEventListener('click', () => {
                checks.forEach((checkbox) => {
                    checkbox.checked = false;
                    syncCardState(checkbox);
                });
                syncCount();
            });

            cards.forEach((card) => {
                card.addEventListener('click', (event) => {
                    if (event.target.closest('.js-speak-btn')) {
                        return;
                    }

                    if (event.target.closest('.card-checkline') || event.target.closest('.card-check-input')) {
                        return;
                    }

                    const checkbox = card.querySelector('.js-feature-check');
                    if (!checkbox) return;

                    checkbox.checked = !checkbox.checked;
                    syncCardState(checkbox);
                    syncCount();
                    if (checkbox.checked) playSelectSound();
                });
            });

            speakButtons.forEach((btn) => {
                btn.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    speakText(btn);
                });
            });

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) stopSpeaking();
            });

            window.addEventListener('pagehide', stopSpeaking);
            window.addEventListener('beforeunload', stopSpeaking);

            window.stopSlideAudio = stopSpeaking;

            checks.forEach(syncCardState);
            syncCount();
        });
    </script>
@endsection
