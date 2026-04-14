@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .play-hit{ -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible{ outline: none; }
        .txt-shadow{ text-shadow: 0 10px 28px rgba(0,0,0,.55), 0 2px 10px rgba(0,0,0,.45); }
        .title-wrap{ overflow:hidden; min-width:0; }
        .title-text{ display:inline-block; white-space:nowrap; }
        .card-media{ aspect-ratio: var(--card-ar, 15 / 8); }

        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speak-btn.speaking .wave-bar { display: block; }
        .speak-btn.speaking .static-icon { display: none; }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-5 sm:gap-6">
                    @include('slider.components.title-subtitle')

                    <section id="vocabGrid" class="w-full max-w-6xl">
                        <div class="grid {{ $content['grid_class'] ?? 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4' }} gap-3 sm:gap-4 auto-rows-fr items-stretch">
                            @foreach($content['items'] as $i => $item)
                                @php
                                    preg_match('/^\X/u', $item['emoji'] ?? '', $m);
                                    $oneEmoji = $m[0] ?? '';
                                @endphp

                                <article
                                        class="vocab-card group relative w-full overflow-hidden rounded-3xl border border-slate-200/70 bg-slate-900/10 shadow-xl
                                           dark:border-slate-700/30 dark:bg-slate-950/35
                                           "
                                        data-audio="{{ $item['sound'] }}"
                                >
                                    <div class="relative card-media w-full">
                                        <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['text'] }}"
                                                loading="lazy"
                                                class="absolute inset-0 h-full w-full object-cover"

                                        >

                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>

                                        <div class="absolute inset-0 grid place-items-center">
                                            <button
                                                    type="button"
                                                    class="play-hit speak-btn inline-flex h-12 w-12 items-center justify-center rounded-full
                                                       bg-white/14 text-white backdrop-blur
                                                       ring-1 ring-white/20 shadow-2xl shadow-black/30
                                                       focus-visible:ring-4 focus-visible:ring-indigo-500/30"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $item['sound'] }}"
                                            >
                                                <!-- Speaker Icon (Static) -->
                                                <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                    <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                </svg>

                                                <!-- Wave Bars (Animated) -->
                                                <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                                <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                                <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                            </button>
                                        </div>

                                        <div class="absolute inset-x-0 bottom-0 px-3 pb-3 sm:px-4 sm:pb-4">
                                            <div class="flex items-center justify-between gap-2">
                                                <div class="title-wrap min-w-0 flex-1 txt-shadow text-[0.82rem] sm:text-[0.95rem] font-black tracking-[-0.03em] text-white leading-tight text-left">
                                                    <span class="title-text">{{ $item['text'] }}</span>
                                                </div>
                                                <span class="shrink-0 txt-shadow text-lg sm:text-xl leading-none select-none">
                                                    {{ $oneEmoji }}
                                                </span>
                                            </div>
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

            function setCardAspectSafely() {
                document.documentElement.style.setProperty("--card-ar", "25 / 16");

                requestAnimationFrame(() => {
                    const overflow = document.documentElement.scrollHeight > window.innerHeight + 2;
                    if (overflow) {
                        document.documentElement.style.setProperty("--card-ar", "15 / 8");
                    }
                });
            }

            setCardAspectSafely();

            window.addEventListener("resize", () => {
                clearTimeout(window.__uiTO);
                window.__uiTO = setTimeout(() => {
                    setCardAspectSafely();
                }, 140);
            }, { passive: true });

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying) {
                if (!btn) return;
                // Toggle 'speaking' class to switch between Speaker Icon and Wave Bars via CSS
                btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;
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
                try { audio.pause(); audio.currentTime = 0; } catch (e) {}
                resetCurrent();
            }

            function playOrToggle(btn) {
                const src = btn.getAttribute("data-audio") || "";
                const card = btn.closest(".vocab-card");
                if (!src) return;

                // If clicking the currently playing button, stop it
                if (currentSrc === src && !audio.paused) {
                    stopAudio();
                    return;
                }

                // Otherwise, stop any existing and start new
                stopAudio();

                currentBtn = btn;
                currentCard = card;
                currentSrc = src;

                setBtnState(currentBtn, true);
                setCardState(currentCard, true);

                try {
                    audio.src = src;
                    audio.currentTime = 0;
                    const p = audio.play();
                    if (p && typeof p.catch === "function") p.catch(() => stopAudio());
                } catch (e) {
                    stopAudio();
                }
            }

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            buttons.forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggle(btn);
                });
            });

            window.resetSlide = () => {
                setCardAspectSafely();
                stopAudio();
            };

            setCardAspectSafely();
            window.stopSlideAudio = stopAudio;
        });
    </script>
@endsection
