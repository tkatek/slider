
@extends('slider.simple-layout')
@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? 'Lesson Objectives'));
    $title = trim((string)($content['title'] ?? 'Lesson Objectives'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $topBadge = trim((string)($content['top_badge'] ?? ''));
    $cardGridClass = trim((string)($content['cards_grid'] ?? 'grid-cols-1 sm:grid-cols-2'));
    $outcomes = is_array($content['outcomes'] ?? null) ? $content['outcomes'] : [];
@endphp

@section('title', $pageTitle)

@section('style')
    @parent
    <style>
        .lo-page {
            font-family: "Plus Jakarta Sans", sans-serif;
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

        .objective-card.card-indigo::before {
            background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(99, 102, 241, 0) 72%);
        }

        .objective-card.card-indigo::after {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .objective-card.card-emerald::before {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.22) 0%, rgba(16, 185, 129, 0) 72%);
        }

        .objective-card.card-emerald::after {
            background: radial-gradient(circle, rgba(20, 184, 166, 0.16) 0%, rgba(20, 184, 166, 0) 72%);
        }

        .objective-card.card-amber::before {
            background: radial-gradient(circle, rgba(245, 158, 11, 0.22) 0%, rgba(245, 158, 11, 0) 72%);
        }

        .objective-card.card-amber::after {
            background: radial-gradient(circle, rgba(249, 115, 22, 0.14) 0%, rgba(249, 115, 22, 0) 72%);
        }

        .objective-card.card-rose::before {
            background: radial-gradient(circle, rgba(244, 63, 94, 0.20) 0%, rgba(244, 63, 94, 0) 72%);
        }

        .objective-card.card-rose::after {
            background: radial-gradient(circle, rgba(236, 72, 153, 0.14) 0%, rgba(236, 72, 153, 0) 72%);
        }

        .objective-card.has-image .objective-image-box {
            aspect-ratio: 1 / 1;
            flex-shrink: 0;
        }

        .objective-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(99, 102, 241, 0.18),
                    0 24px 44px -30px rgba(15, 23, 42, 0.22);
        }

        .dark .objective-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(129, 140, 248, 0.22),
                    0 24px 44px -30px rgba(2, 6, 23, 0.28);
        }

        .card-audio-btn {
            -webkit-tap-highlight-color: transparent;
        }

        .card-audio-btn:focus-visible {
            outline: none;
        }

        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 999px;
            margin: 0 1px;
        }

        .card-audio-btn.speaking .wave-bar { display: block; }

        .card-audio-btn.speaking .static-icon {
            display: none;
        }

        @media (max-width: 639px) {
            .objective-card.has-image .objective-row {
                grid-template-columns: minmax(0, 1fr) 88px;
                align-items: center;
            }
        }
    </style>
@endsection

@section('content')
    <div class="lo-page relative h-[100dvh] w-full overflow-hidden bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid items-center gap-4 sm:gap-5 lg:grid-cols-[0.92fr_1.08fr] lg:gap-7 xl:gap-9">

                        <div id="heroBlock" class="flex flex-col justify-center text-center lg:text-left">
                            <div class="mx-auto w-full max-w-[42rem] lg:mx-0">
                                @if($topBadge !== '')
                                    <div class="inline-flex items-center justify-center rounded-full border border-indigo-200/70 bg-white/75 px-3 py-1.5 shadow-sm backdrop-blur dark:border-white/10 dark:bg-white/5 lg:justify-start">
                                        <span class="text-xs sm:text-sm font-black text-indigo-700 dark:text-indigo-200">
                                            {{ $topBadge }}
                                        </span>
                                    </div>
                                @endif

                                <h1 class="mt-3 mx-auto max-w-4xl font-black leading-[1.02] tracking-tight text-4xl sm:mt-4 sm:text-5xl lg:mt-5 lg:text-6xl lg:mx-0">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{ $title }}
                                    </span>
                                </h1>

                                @if($subtitle !== '')
                                    <p class="mx-auto mt-3 max-w-2xl font-bold tracking-[-0.01em] text-base sm:text-lg leading-[1.45] text-slate-600 dark:text-slate-200 lg:mx-0 lg:mt-4 lg:max-w-[31rem]">
                                        {{ $subtitle }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div id="cardsWrap" class="w-full">
                            <div class="grid {{ $cardGridClass }} gap-3 sm:gap-4 lg:gap-4">
                                @foreach($outcomes as $outcome)
                                    @php
                                        $styles = ['card-indigo', 'card-emerald', 'card-amber', 'card-rose'];
                                        $style = $styles[($loop->iteration - 1) % count($styles)];

                                        $number = trim((string)($outcome['number'] ?? '')) !== ''
                                            ? trim((string)$outcome['number'])
                                            : str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT);

                                        $badge = trim((string)($outcome['badge'] ?? '')) !== ''
                                            ? trim((string)$outcome['badge'])
                                            : 'from-indigo-500 to-blue-500';

                                        $itemTitle = trim((string)($outcome['title'] ?? ''));
                                        $description = trim((string)($outcome['description'] ?? ''));
                                        $image = trim((string)($outcome['image'] ?? ''));
                                        $sound = trim((string)($outcome['sound'] ?? ''));
                                        $hasImage = $image !== '';
                                    @endphp

                                    <article class="objective-card {{ $style }} {{ $hasImage ? 'has-image' : '' }} rounded-[24px] border border-white/70 bg-white/70 p-4 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[148px] sm:p-5">
                                        @if($sound !== '')
                                            <button
                                                    type="button"
                                                    class="card-audio-btn absolute right-3 top-3 z-20 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/55 text-slate-700 ring-1 ring-white/60 shadow-lg backdrop-blur-xl focus-visible:ring-4 focus-visible:ring-indigo-300/40 dark:bg-white/10 dark:text-white dark:ring-white/15 sm:right-4 sm:top-4 sm:h-10 sm:w-10"                                                    data-audio="{{ $sound }}"
                                            >
                                                <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <span class="wave-bar" style="animation-delay:.1s"></span>
                                                <span class="wave-bar" style="animation-delay:.2s"></span>
                                                <span class="wave-bar" style="animation-delay:.3s"></span>
                                            </button>
                                        @endif

                                        @if($hasImage)
                                            <div class="objective-row relative z-10 grid items-center gap-4 pr-12 sm:gap-5 sm:pr-14 md:grid-cols-[1fr_132px] lg:grid-cols-[1fr_148px]">
                                                <div class="min-w-0">
                                                    <div class="objective-chip inline-flex w-fit items-center rounded-full bg-gradient-to-r {{ $badge }} px-3 py-1 shadow-sm">
                                                        <span class="text-sm sm:text-base font-black leading-[1.45] text-white">
                                                            {{ $number }}
                                                        </span>
                                                    </div>

                                                    <p class="mt-3 text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                        {{ $itemTitle }}
                                                    </p>

                                                    @if($description !== '')
                                                        <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                            {{ $description }}
                                                        </p>
                                                    @endif
                                                </div>

                                                <div class="objective-image-box w-full rounded-2xl border border-slate-200 bg-white/90 p-2 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                                                    <img
                                                            src="{{ $image }}"
                                                            alt="{{ $itemTitle }}"
                                                            class="h-full w-full rounded-xl object-cover"
                                                            loading="lazy"
                                                            draggable="false"
                                                    >
                                                </div>
                                            </div>
                                        @else
                                            <div class="relative z-10 flex h-full flex-col justify-center pr-12 sm:pr-14">
                                                <div class="objective-chip inline-flex w-fit items-center rounded-full bg-gradient-to-r {{ $badge }} px-3 py-1 shadow-sm">
                                                    <span class="text-sm sm:text-base font-black leading-[1.45] text-white">
                                                        {{ $number }}
                                                    </span>
                                                </div>

                                                <p class="mt-3 text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                    {{ $itemTitle }}
                                                </p>

                                                @if($description !== '')
                                                    <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                        {{ $description }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </article>
                                @endforeach
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
        document.addEventListener("DOMContentLoaded", () => {
            const heroBlock = document.getElementById("heroBlock");
            const cards = Array.from(document.querySelectorAll(".objective-card"));
            const viewport = document.getElementById("slideViewport");
            const shell = document.getElementById("slideShell");
            const audioButtons = Array.from(document.querySelectorAll(".card-audio-btn"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";
            let resizeRaf = null;

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove("is-scrollable");

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle("is-scrollable", needsScroll);
                });
            }

            function setBtnState(btn, isPlaying) {
                if (!btn) return;
                btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;
                card.classList.toggle("is-playing", isPlaying);
                card.classList.toggle("ring-2", isPlaying);
                card.classList.toggle("ring-indigo-500/30", isPlaying);
                card.classList.toggle("dark:ring-indigo-400/20", isPlaying);
            }

            function resetCurrent() {
                if (currentBtn) setBtnState(currentBtn, false);
                if (currentCard) setCardState(currentCard, false);
                currentBtn = null;
                currentCard = null;
                currentSrc = "";
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                } catch (e) {}

                resetCurrent();
            }

            function playOrToggle(btn) {
                const src = btn.getAttribute("data-audio") || "";
                const card = btn.closest(".objective-card");

                if (!src) return;

                if (currentSrc === src && !audio.paused) {
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                currentCard = card;
                currentSrc = src;

                setBtnState(currentBtn, true);
                setCardState(currentCard, true);

                try {
                    audio.src = src;
                    audio.currentTime = 0;

                    const playPromise = audio.play();
                    if (playPromise && typeof playPromise.catch === "function") {
                        playPromise.catch(() => stopAudio());
                    }
                } catch (e) {
                    stopAudio();
                }
            }

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(() => {
                    syncLayoutMode();
                });
            }

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            audioButtons.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggle(btn);
                });
            });

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAudio();
            });

            window.addEventListener("beforeunload", stopAudio);
            window.addEventListener("pagehide", stopAudio);
            window.addEventListener("resize", handleResize);
            window.addEventListener("load", syncLayoutMode);

            document.addEventListener("click", (e) => {
                const nextTrigger = e.target.closest(
                    ".next-slide, [data-next-slide], .slide-next, .swiper-button-next, .splide__arrow--next"
                );

                if (nextTrigger) {
                    stopAudio();
                }
            }, true);

            const observer = new MutationObserver(() => {
                if (currentBtn && !document.body.contains(currentBtn)) {
                    stopAudio();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
                syncLayoutMode();
            };

            syncLayoutMode();
        });
    </script>
@endsection
