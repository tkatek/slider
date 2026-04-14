@extends('slider.simple-layout')
@php
    $content = is_array($content ?? null) ? $content : [];
    $grid = is_array($content['grid'] ?? null) ? $content['grid'] : [];
    $itemCount = max(1, count($content['items'] ?? []));

    $colsBase = min((int)($grid['base'] ?? 2), $itemCount);
    $colsSm = min((int)($grid['sm'] ?? 3), $itemCount);
    $colsLg = min((int)($grid['lg'] ?? 4), $itemCount);
    $colsXl = min((int)($grid['xl'] ?? $colsLg), $itemCount);

    $maxW = (int)($grid['max'] ?? 340);
    $gap = (int)($grid['gap'] ?? 14);
    $cardMaxLg = ($colsLg <= 2) ? max($maxW, 460) : $maxW;
    $cardMaxXl = ($colsXl <= 2) ? max($maxW, 520) : $cardMaxLg;
@endphp

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-3 sm:px-8 py-5 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-4 sm:gap-6">
                    @include('slider.components.title-subtitle')

                    <section id="vocabGrid" class="w-full max-w-6xl">
                        <div
                                id="vocabGridInner"
                                class="grid w-full max-w-full justify-center justify-items-stretch text-left gap-[var(--gap)] [grid-template-columns:repeat(var(--cols-base),minmax(0,var(--card-max-base)))] sm:[grid-template-columns:repeat(var(--cols-sm),minmax(0,var(--card-max-base)))] lg:[grid-template-columns:repeat(var(--cols-lg),minmax(0,var(--card-max-lg)))] xl:[grid-template-columns:repeat(var(--cols-xl),minmax(0,var(--card-max-xl)))]"
                                style="--gap: {{ $gap }}px; --cols-base: {{ $colsBase }}; --cols-sm: {{ $colsSm }}; --cols-lg: {{ $colsLg }}; --cols-xl: {{ $colsXl }}; --card-max-base: {{ $maxW }}px; --card-max-lg: {{ $cardMaxLg }}px; --card-max-xl: {{ $cardMaxXl }}px;"
                        >
                            @foreach($content['items'] as $i => $item)
                                <article
                                        class="vocab-card group w-full max-w-none rounded-3xl border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                                           dark:border-slate-700/30 dark:bg-slate-950/35
                                           overflow-hidden"
                                        data-audio="{{ $item['sound'] }}"
                                >
                                    <div class="relative">
                                        <div class="aspect-[16/10] w-full overflow-hidden">
                                            <img
                                                    src="{{ $item['image'] }}"
                                                    alt="{{ $item['text'] }}"
                                                    class="h-full w-full object-cover"
                                            >
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/65 via-slate-950/15 to-transparent"></div>

                                        <button
                                                type="button"
                                                class="speak-btn absolute right-3 bottom-3 sm:right-4 sm:bottom-4 inline-flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-2xl
                                                   bg-white/20 backdrop-blur-md text-white
                                                   ring-1 ring-white/30
                                                   focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-white/40"
                                                aria-label="Play"
                                                data-audio="{{ $item['sound'] }}"
                                        >
                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <span class="wave-bar hidden mx-[1px] h-3 w-[3px] rounded-[2px] bg-current"></span>
                                            <span class="wave-bar hidden mx-[1px] h-3 w-[3px] rounded-[2px] bg-current"></span>
                                            <span class="wave-bar hidden mx-[1px] h-3 w-[3px] rounded-[2px] bg-current"></span>
                                        </button>
                                    </div>

                                    <div class="p-3 sm:p-5">
                                        <div class="text-sm sm:text-lg font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 leading-tight break-words">
                                            {{ $item['text'] }}
                                        </div>

                                        <div class="mt-3 sm:mt-4 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                        <div class="mt-2.5 sm:mt-3 flex items-center justify-between gap-3">
                                            <span class="text-[9px] sm:text-[11px] font-black uppercase tracking-[0.28em] text-slate-500 dark:text-slate-300">
                                                Listen
                                            </span>
                                            <span class="inline-flex items-center gap-2 text-[11px] sm:text-sm font-extrabold text-slate-600 dark:text-slate-200 whitespace-nowrap">
                                                <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500/60 ring-2 ring-emerald-500/20 dark:bg-emerald-400/60 dark:ring-emerald-400/20"></span>
                                                Tap to listen
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = Array.from(document.querySelectorAll(".speak-btn"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentCard = null;
            let currentBtn = null;

            function setPlaying(card, btn, isPlaying) {
                if (!card) return;
                card.classList.toggle("ring-2", isPlaying);
                card.classList.toggle("ring-indigo-500/30", isPlaying);
                card.classList.toggle("dark:ring-indigo-400/20", isPlaying);

                if (btn) {
                    const icon = btn.querySelector(".static-icon");
                    const waveBars = btn.querySelectorAll(".wave-bar");
                    if (icon) icon.classList.toggle("hidden", isPlaying);
                    waveBars.forEach((bar) => bar.classList.toggle("hidden", !isPlaying));
                }
            }

            function stopAudio() {
                try { audio.pause(); audio.currentTime = 0; } catch (e) {}
                if (currentCard && currentBtn) setPlaying(currentCard, currentBtn, false);
                currentCard = null;
                currentBtn = null;
            }

            function playAudio(src, card, btn) {
                if (!src) return;

                // If same card clicked, stop
                if (currentCard === card && !audio.paused) {
                    stopAudio();
                    return;
                }

                // Stop previous
                stopAudio();

                currentCard = card || null;
                currentBtn = btn || null;

                setPlaying(currentCard, currentBtn, true);

                try {
                    if (audio.src !== src) audio.src = src;
                    audio.currentTime = 0;

                    const p = audio.play();
                    if (p && typeof p.catch === "function") {
                        p.catch(() => {
                            setPlaying(currentCard, currentBtn, false);
                            currentCard = null;
                            currentBtn = null;
                        });
                    }
                } catch (e) {
                    setPlaying(currentCard, currentBtn, false);
                    currentCard = null;
                    currentBtn = null;
                }
            }

            audio.addEventListener("ended", () => {
                if (currentCard && currentBtn) setPlaying(currentCard, currentBtn, false);
                currentCard = null;
                currentBtn = null;
            });

            audio.addEventListener("error", () => {
                if (currentCard && currentBtn) setPlaying(currentCard, currentBtn, false);
                currentCard = null;
                currentBtn = null;
            });

            buttons.forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    const src = btn.getAttribute("data-audio") || "";
                    const card = btn.closest(".vocab-card");
                    playAudio(src, card, btn);
                });
            });

            window.resetSlide = () => {
                stopAudio();
            };

            window.stopSlideAudio = function () {
                stopAudio();
            };
        });
    </script>
@endsection
