@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $title = trim((string)($content['title'] ?? 'Discussion'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $supportItems = is_array($content['support_items'] ?? null)
        ? array_values($content['support_items'])
        : (is_array($content['practice_phrases'] ?? null) ? array_values($content['practice_phrases']) : []);
    $supportTitle = trim((string)($content['support_title'] ?? ($content['practice_phrases_title'] ?? 'Useful language')));
    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? '');
@endphp

@section('style')
    @parent
    <style>
        .discussion-page {
            font-family: "Plus Jakarta Sans", sans-serif;
            --discussion-card-glow-one: rgba(99, 102, 241, 0.24);
            --discussion-card-glow-two: rgba(59, 130, 246, 0.18);
            --discussion-card-glow-three: rgba(124, 58, 237, 0.22);
            --discussion-card-glow-soft: rgba(96, 165, 250, 0.16);
            --discussion-frame-one: rgba(129, 140, 248, 0.62);
            --discussion-frame-two: rgba(59, 130, 246, 0.42);
            --discussion-image-bg: linear-gradient(135deg, rgba(224, 231, 255, 0.9), rgba(219, 234, 254, 0.86), rgba(237, 233, 254, 0.86));
            --discussion-image-glow-one: rgba(96, 165, 250, 0.30);
            --discussion-image-glow-two: rgba(139, 92, 246, 0.20);
            --discussion-shadow: rgba(99, 102, 241, 0.20);
        }

        .slide-theme-orange .discussion-page {
            --discussion-card-glow-one: rgba(249, 115, 22, 0.24);
            --discussion-card-glow-two: rgba(251, 146, 60, 0.18);
            --discussion-card-glow-three: rgba(245, 158, 11, 0.24);
            --discussion-card-glow-soft: rgba(252, 211, 77, 0.18);
            --discussion-frame-one: rgba(251, 191, 36, 0.62);
            --discussion-frame-two: rgba(249, 115, 22, 0.42);
            --discussion-image-bg: linear-gradient(135deg, rgba(255, 237, 213, 0.92), rgba(254, 243, 199, 0.88), rgba(254, 249, 195, 0.86));
            --discussion-image-glow-one: rgba(252, 211, 77, 0.32);
            --discussion-image-glow-two: rgba(249, 115, 22, 0.22);
            --discussion-shadow: rgba(249, 115, 22, 0.20);
        }

        .slide-theme-green .discussion-page {
            --discussion-card-glow-one: rgba(34, 197, 94, 0.22);
            --discussion-card-glow-two: rgba(16, 185, 129, 0.18);
            --discussion-card-glow-three: rgba(132, 204, 22, 0.22);
            --discussion-card-glow-soft: rgba(110, 231, 183, 0.16);
            --discussion-frame-one: rgba(52, 211, 153, 0.58);
            --discussion-frame-two: rgba(34, 197, 94, 0.40);
            --discussion-image-bg: linear-gradient(135deg, rgba(220, 252, 231, 0.90), rgba(209, 250, 229, 0.86), rgba(236, 252, 203, 0.82));
            --discussion-image-glow-one: rgba(74, 222, 128, 0.26);
            --discussion-image-glow-two: rgba(16, 185, 129, 0.20);
            --discussion-shadow: rgba(34, 197, 94, 0.18);
        }

        .dark .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(49, 46, 129, 0.30), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(99, 102, 241, 0.12);
        }

        .dark .slide-theme-orange .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(154, 52, 18, 0.30), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(251, 146, 60, 0.12);
        }

        .dark .slide-theme-green .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(6, 78, 59, 0.34), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(16, 185, 129, 0.12);
        }

        .slide-viewport {
            height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .slide-shell {
            min-height: 100dvh;
            display: flex;
            align-items: center;
            transition: padding 0.2s ease, align-items 0.2s ease;
        }

        .slide-shell.is-scrollable {
            align-items: flex-start;
        }

        .objective-card {
            position: relative;
            overflow: hidden;
        }

        .objective-card::before,
        .objective-card::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .objective-card::before {
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
        }

        .objective-card::after {
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: 0.55;
        }

        .objective-card.card-theme-one::before {
            background: radial-gradient(circle, var(--discussion-card-glow-one) 0%, transparent 72%);
        }

        .objective-card.card-theme-one::after {
            background: radial-gradient(circle, var(--discussion-card-glow-two) 0%, transparent 72%);
        }

        .objective-card.card-theme-two::before {
            background: radial-gradient(circle, var(--discussion-card-glow-three) 0%, transparent 72%);
        }

        .objective-card.card-theme-two::after {
            background: radial-gradient(circle, var(--discussion-card-glow-soft) 0%, transparent 72%);
        }

        .objective-card.card-theme-three::before {
            background: radial-gradient(circle, var(--discussion-card-glow-two) 0%, transparent 72%);
        }

        .objective-card.card-theme-three::after {
            background: radial-gradient(circle, var(--discussion-card-glow-one) 0%, transparent 72%);
        }

        .discussion-frame-one {
            border-color: var(--discussion-frame-one);
        }

        .discussion-frame-two {
            border-color: var(--discussion-frame-two);
        }

        .discussion-image-shell {
            box-shadow: 0 25px 50px -12px var(--discussion-shadow);
        }

        .discussion-image-bg {
            background: var(--discussion-image-bg);
        }

        .discussion-glow-one {
            background: var(--discussion-image-glow-one);
        }

        .discussion-glow-two {
            background: var(--discussion-image-glow-two);
        }

        .objective-heading {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .objective-heading .objective-chip {
            flex-shrink: 0;
        }

        .objective-heading .objective-text {
            min-width: 0;
        }

        .discussion-page .objective-label {
            display: inline-flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 7px 12px;
            border: 1px solid #c7d2fe;
            border-radius: 10px;
            background: #eef2ff;
            background-clip: border-box;
            color: #4338ca;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.25;
            letter-spacing: 0;
            text-transform: none;
        }
        .discussion-page .card-theme-two .objective-label {
            background: #eff6ff;
            border-color: #bfdbfe;
            color: #1d4ed8;
        }
        .discussion-page .card-theme-three .objective-label {
            background: #f0f9ff;
            border-color: #bae6fd;
            color: #0369a1;
        }
        .dark .discussion-page .objective-label {
            background: #252450;
            border-color: #4338ca;
            color: #c7d2fe;
        }
        .dark .discussion-page .card-theme-two .objective-label {
            background: #172e50;
            border-color: #1e40af;
            color: #bfdbfe;
        }
        .dark .discussion-page .card-theme-three .objective-label {
            background: #103247;
            border-color: #075985;
            color: #bae6fd;
        }
        .slide-theme-orange .discussion-page .objective-label {
            background: #fff7ed;
            border-color: #fed7aa;
            color: #9a3412;
        }
        .slide-theme-green .discussion-page .objective-label {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #047857;
        }
        .dark .slide-theme-orange .discussion-page .objective-label {
            background: #431f16;
            border-color: #9a3412;
            color: #fed7aa;
        }
        .dark .slide-theme-green .discussion-page .objective-label {
            background: #10332b;
            border-color: #065f46;
            color: #a7f3d0;
        }
    </style>
@endsection

@section("content")
    @php
        $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
        $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
        $cardStyles = ['card-theme-one', 'card-theme-two', 'card-theme-three'];
        $practiceDotClass = $buttonGradient;

    @endphp
    <div class="discussion-page relative h-[100dvh] w-full overflow-hidden">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="discussion-layout grid grid-cols-1 gap-8 sm:grid-cols-[minmax(0,58%)_minmax(220px,42%)] lg:grid-cols-[minmax(0,58%)_minmax(320px,42%)] sm:gap-8 lg:gap-12 xl:gap-16 items-center">
                        <div class="discussion-copy w-full text-center sm:text-left">
                            @php
                                $titleWrapClass = 'discussion-title-wrap header-spacing my-0 mb-6 space-y-3 px-0 text-center sm:text-left';
                                $titleHeadingClass = 'mb-2 text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl xl:text-6xl';
                            @endphp
                            @include('slider.components.title-subtitle')

                            @if(empty($content['questions_before_support']))
                                @include('slider.other.discussion-support')
                            @endif

                            <div class="grid grid-cols-1 gap-3 sm:gap-4">
                                @foreach($cards as $index => $card)
                                    @php
                                        $style = $cardStyles[$index % count($cardStyles)];
                                        $emoji = trim((string)($card['emoji'] ?? ''));
                                        $label = trim((string)($card['label'] ?? ''));
                                        $text = trim((string)($card['text'] ?? ''));
                                        $sound = trim((string)($card['sound'] ?? ''));
                                    @endphp

                                    <article class="objective-card {{ $style }} rounded-[24px] border border-white/70 bg-white/70 p-4 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[100px] sm:p-5">
                                        <div class="relative z-10 flex h-full flex-col justify-center">
                                            <div class="objective-heading">
                                                @if(!empty($content['numbered']))
                                                    <span class="objective-chip inline-flex h-8 w-8 items-center justify-center rounded-xl text-sm font-extrabold text-white shadow-sm {{ $buttonGradient }}">
                                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                                    </span>
                                                @elseif($emoji !== '')
                                                <div class="objective-chip inline-flex w-fit items-center">
                                                    <span class="text-2xl sm:text-3xl leading-none">
                                                        {{ $emoji }}
                                                    </span>
                                                </div>
                                                @endif

                                                <div class="objective-text flex-1">
                                                    @if($label !== '')
                                                        <span class="objective-label">
                                                            {{ $label }}
                                                        </span>
                                                    @endif

                                                    @if($text !== '')
                                                        <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                            {!! $text !!}
                                                        </p>
                                                    @endif
                                                </div>
                                                @if($sound !== '')
                                                <button
                                                        type="button"
                                                        class="audio-btn inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full {{ $buttonGradient }} text-white shadow-lg shadow-slate-900/15 ring-1 ring-white/25 transition hover:scale-105 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-300/40 dark:shadow-black/25 sm:h-10 sm:w-10"
                                                        aria-label="Play audio"
                                                        aria-pressed="false"
                                                        data-sound="{{ $sound }}"
                                                >
                                                    <svg class="js-static-icon h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                    </svg>

                                                    <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                                        <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                                        <span class="h-3.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                        <span class="h-2.5 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                    </span>
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                            @if(!empty($content['questions_before_support']))
                                <div class="mt-4">
                                    @include('slider.other.discussion-support')
                                </div>
                            @endif
                        </div>

                        <div class="discussion-image-wrap w-full mx-auto max-w-[300px] sm:max-w-[420px] lg:max-w-[460px]">
                            <div class="relative p-4">
                                <div class="discussion-frame-one pointer-events-none absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2"></div>
                                <div class="discussion-frame-two pointer-events-none absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed"></div>

                                <div class="discussion-image-shell relative {{ $content['image_aspect_class'] ?? 'aspect-square' }} w-full overflow-hidden rounded-[22px]">
                                    <div class="discussion-image-bg absolute inset-0"></div>
                                    <div class="discussion-glow-one absolute -left-10 -top-10 h-36 w-36 rounded-full blur-2xl"></div>
                                    <div class="discussion-glow-two absolute -right-10 -bottom-10 h-40 w-40 rounded-full blur-2xl"></div>

                                    <img
                                            src="{{ $image }}"
                                            alt="{{ $imageAlt }}"
                                            class="relative z-10 block h-full w-full {{ $content['image_fit_class'] ?? 'object-cover' }} select-none"
                                            loading="lazy"
                                            draggable="false"
                                    >
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "auto";
                audio.crossOrigin = "anonymous";

                let activeButton = null;

                function setPlaying(button, isPlaying) {
                    if (!button) return;
                    button.setAttribute('aria-pressed', String(isPlaying));
                    button.setAttribute('aria-label', isPlaying ? 'Stop audio' : 'Play audio');

                    button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                    button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                    button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
                }

                function clearActive() {
                    if (activeButton) {
                        setPlaying(activeButton, false);
                        activeButton = null;
                    }
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}

                    clearActive();
                }

                function play(src, button) {
                    if (!src) return;

                    const resolved = new URL(src, window.location.href).toString();

                    if (activeButton === button && !audio.paused && audio.src === resolved) {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        if (audio.src !== resolved) audio.src = resolved;

                        audio.currentTime = 0;
                        activeButton = button;
                        setPlaying(activeButton, true);

                        const promise = audio.play();

                        if (promise && typeof promise.catch === "function") {
                            promise.catch(() => stop());
                        }
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", stop);
                audio.addEventListener("pause", () => {
                    if (audio.currentTime === 0 || audio.ended) {
                        clearActive();
                    }
                });
                audio.addEventListener("error", stop);

                window[KEY] = { audio, play, stop };
            }

            window.stopSlideAudio = function () {
                window[KEY].stop();
            };

            if (!window.__BEC_AUDIO_DELEGATE__) {
                window.__BEC_AUDIO_DELEGATE__ = true;

                document.addEventListener("click", (event) => {
                    const button = event.target.closest(".audio-btn");
                    if (!button) return;

                    event.preventDefault();

                    const src = button.dataset.sound || button.getAttribute("data-sound") || "";
                    window[KEY].play(src, button);
                });
            }
        })();

        document.addEventListener("DOMContentLoaded", () => {
            const viewport = document.getElementById("slideViewport");
            const shell = document.getElementById("slideShell");

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove("is-scrollable");

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle("is-scrollable", needsScroll);
                });
            }

            let resizeRaf = null;

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(syncLayoutMode);
            }

            window.addEventListener("resize", handleResize);
            window.addEventListener("load", syncLayoutMode);

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.resetSlide = () => {
                window.stopSlideAudio();
                syncLayoutMode();
            };

            syncLayoutMode();
        });
    </script>
@endsection
