@extends('slider.simple-layout')

@php
    $items = array_values(array_filter(
        is_array($content['items'] ?? null) ? $content['items'] : [],
        static function ($item) {
            return is_array($item);
        }
    ));

    $rawGridClass = (string) ($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3');
    $gridClass = trim((string) preg_replace('/\s+/', ' ', $rawGridClass));

    $audioBtnClass = ($theme['name'] ?? null) === 'orange'
        ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-lg shadow-orange-500/20'
        : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-lg shadow-indigo-500/20';

    $audioBtnRingClass = ($theme['name'] ?? null) === 'orange'
        ? 'focus-visible:ring-orange-300/40'
        : 'focus-visible:ring-indigo-300/40';
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        .play-hit {
            -webkit-tap-highlight-color: transparent;
        }

        .play-hit:focus-visible {
            outline: none;
        }

        .wave-bar {
            display: none;
            width: 2.5px;
            height: 10px;
            border-radius: 999px;
            background: currentColor;
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
            0%, 100% { height: 5px; }
            50% { height: 13px; }
        }

        .polite-shell {
            width: 100%;
            min-height: 100dvh;
            padding: clamp(1rem, 2vw, 1.5rem) clamp(.85rem, 2vw, 1.5rem) clamp(1.4rem, 2.8vw, 2rem);
            font-family: "Plus Jakarta Sans", sans-serif;
            background: transparent;
            display: flex;
            align-items: center;
        }

        .content-wrap {
            width: 100%;
            max-width: 1440px;
            margin-inline: auto;
            display: grid;
            gap: clamp(1rem, 1.6vw, 1.4rem);
            align-content: center;
        }

        .polite-grid-wrap {
            width: 100%;
        }

        .polite-grid {
            width: 100%;
            gap: clamp(.75rem, 1vw, 1rem);
            align-items: stretch;
        }

        .polite-card {
            position: relative;
            min-width: 0;
            height: 100%;
            overflow: hidden;
            border-radius: 1.35rem;
            border: 1px solid rgba(226, 232, 240, .95); 
            background: rgba(255, 255, 255, .90);
            backdrop-filter: blur(10px);
            box-shadow:
                    0 10px 28px rgba(15, 23, 42, .07),
                    0 6px 16px rgba(99, 102, 241, .06);
            transition:
                    transform .18s ease,
                    box-shadow .18s ease,
                    border-color .18s ease;
        }

        .polite-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 1px;
            background: linear-gradient(90deg, rgba(99, 102, 241, 0), rgba(99, 102, 241, .28), rgba(14, 165, 233, 0));
        }

        .dark .polite-card {
            border-color: rgba(71, 85, 105, .45);
            background: rgba(15, 23, 42, .80);
            box-shadow:
                    0 12px 30px rgba(0, 0, 0, .22),
                    0 8px 20px rgba(99, 102, 241, .10);
        }

        .polite-card:hover {
            transform: translateY(-2px);
            box-shadow:
                    0 14px 34px rgba(15, 23, 42, .09),
                    0 8px 18px rgba(99, 102, 241, .09);
        }

        .dark .polite-card:hover {
            box-shadow:
                    0 16px 36px rgba(0, 0, 0, .28),
                    0 10px 22px rgba(99, 102, 241, .12);
        }

        .card-inner {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-rows: auto 1fr;
            gap: .85rem;
            height: 100%;
            padding: .95rem .9rem 1rem;
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            min-width: 0;
        }

        .emoji-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.9rem;
            height: 2.9rem;
            flex-shrink: 0;
            border-radius: 1rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, .14), rgba(14, 165, 233, .12));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .45);
            font-size: 1.45rem;
            line-height: 1;
        }

        .dark .emoji-badge {
            background: linear-gradient(135deg, rgba(99, 102, 241, .22), rgba(14, 165, 233, .16));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .04);
        }

        .audio-wrap {
            flex-shrink: 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .speak-btn {
            width: 2.3rem;
            height: 2.3rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            color: #fff;
            transition: transform .16s ease, box-shadow .16s ease, opacity .16s ease;
        }

        .speak-btn:hover:not(:disabled) {
            transform: scale(1.04);
        }

        .speak-btn:active:not(:disabled) {
            transform: scale(.96);
        }

        .speak-btn:disabled {
            opacity: .42;
            cursor: default;
            box-shadow: none !important;
        }

        .speak-btn .static-icon {
            width: .92rem;
            height: .92rem;
        }

        .card-copy {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: .36rem;
        }

        .card-title {
            margin: 0;
            font-size: clamp(.94rem, .88rem + .18vw, 1.06rem);
            line-height: 1.24;
            font-weight: 900;
            letter-spacing: -.02em;
            color: #0f172a;
            word-break: break-word;
        }

        .dark .card-title {
            color: #f8fafc;
        }

        .card-subtitle {
            margin: 0;
            font-size: clamp(.8rem, .76rem + .12vw, .92rem);
            line-height: 1.45;
            font-weight: 700;
            color: #475569;
        }

        .dark .card-subtitle {
            color: #cbd5e1;
        }

        @media (max-width: 639px) {
            .card-inner {
                padding: .9rem .82rem .95rem;
            }

            .emoji-badge {
                width: 2.7rem;
                height: 2.7rem;
                border-radius: .92rem;
                font-size: 1.35rem;
            }

            .speak-btn {
                width: 2.15rem;
                height: 2.15rem;
            }

            .card-title {
                font-size: .92rem;
            }
        }

        @media (min-width: 1200px) and (max-width: 1359px) {
            .card-inner {
                padding: 1rem;
            }
        }

        @media (min-width: 1360px) {
            .card-inner {
                padding: 1.02rem 1rem 1rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .polite-card,
            .speak-btn,
            .wave-bar {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="polite-shell">
        <div class="content-wrap">
            @include('slider.components.title-subtitle')

            <section class="polite-grid-wrap">
                <div class="polite-grid grid {{ $gridClass }}">
                    @foreach($items as $item)
                        @php
                            $hasAudio = !empty($item['sound']);
                        @endphp

                        <article class="polite-card">
                            <div class="card-inner">
                                <div class="card-top">
                                    <span class="emoji-badge" aria-hidden="true">
                                        {{ $item['emoji'] ?? '✨' }}
                                    </span>

                                    <div class="audio-wrap">
                                        <button
                                                type="button"
                                                class="play-hit speak-btn {{ $audioBtnClass }} focus-visible:ring-4 {{ $audioBtnRingClass }}"
                                                aria-label="Play Audio"
                                                aria-pressed="false"
                                                data-audio="{{ $item['sound'] ?? '' }}"
                                                @unless($hasAudio) disabled aria-disabled="true" @endunless
                                        >
                                            <svg class="static-icon" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <span class="wave-bar" style="animation-delay:.1s"></span>
                                            <span class="wave-bar" style="animation-delay:.2s"></span>
                                            <span class="wave-bar" style="animation-delay:.3s"></span>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-copy">
                                    <h2 class="card-title">
                                        @if(!empty($item['text_html']))
                                            {!! $item['text_html'] !!}
                                        @else
                                            {{ $item['text'] ?? '' }}
                                        @endif
                                    </h2>

                                    @if(!empty($item['subtitle']))
                                        <p class="card-subtitle">{{ $item['subtitle'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var buttons = Array.prototype.slice.call(
                document.querySelectorAll('.speak-btn[data-audio]:not([disabled])')
            );

            if (!buttons.length) {
                window.stopSlideAudio = function () {};
                window.resetSlide = function () {};
                return;
            }

            var audio = new Audio();
            audio.preload = 'auto';

            var currentBtn = null;

            function setBtnState(btn, isPlaying) {
                if (!btn) return;
                btn.classList.toggle('speaking', isPlaying);
                btn.setAttribute('aria-pressed', isPlaying ? 'true' : 'false');
            }

            function clearCurrent() {
                if (currentBtn) {
                    setBtnState(currentBtn, false);
                }
                currentBtn = null;
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (e) {}

                clearCurrent();
            }

            function playOrToggle(btn) {
                var src = btn.getAttribute('data-audio') || '';

                if (!src) return;

                if (currentBtn === btn && !audio.paused) {
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                setBtnState(currentBtn, true);

                try {
                    audio.src = src;
                    audio.currentTime = 0;

                    var playPromise = audio.play();

                    if (playPromise && typeof playPromise.catch === 'function') {
                        playPromise.catch(function () {
                            stopAudio();
                        });
                    }
                } catch (e) {
                    stopAudio();
                }
            }

            buttons.forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggle(btn);
                });
            });

            audio.addEventListener('ended', stopAudio);
            audio.addEventListener('error', stopAudio);

            document.addEventListener('visibilitychange', function () {
                if (document.hidden) {
                    stopAudio();
                }
            });

            document.addEventListener('click', function (e) {
                var nextTrigger = e.target.closest(
                    '.next-slide, [data-next-slide], .slide-next, .swiper-button-next, .splide__arrow--next'
                );

                if (nextTrigger) {
                    stopAudio();
                }
            }, true);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    stopAudio();
                }
            });

            var observer = new MutationObserver(function () {
                if (currentBtn && !document.body.contains(currentBtn)) {
                    stopAudio();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            window.addEventListener('beforeunload', function () {
                stopAudio();
                observer.disconnect();
            });

            window.addEventListener('pagehide', function () {
                stopAudio();
                observer.disconnect();
            });

            window.stopSlideAudio = stopAudio;
            window.resetSlide = stopAudio;
        });
    </script>
@endsection
