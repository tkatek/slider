
@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-5 sm:gap-6">
                    <div id="titleBlock" class="space-y-1 sm:space-y-2">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        <p class="font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    </div>

                    <section id="vocabGrid" class="w-full max-w-6xl">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 text-left">
                            @foreach($content['items'] as $i => $item)
                                <article
                                        class="vocab-card group w-full rounded-3xl border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                                           dark:border-slate-700/30 dark:bg-slate-950/35 p-4 sm:p-5
                                           transition-transform duration-200 hover:-translate-y-0.5"
                                        data-audio="{{ $item['sound'] }}"
                                >
                                    <div class="flex items-start gap-3">
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[2.4rem] sm:text-[2.7rem] leading-none select-none">
                                                {{ $item['emoji'] }}
                                            </div>

                                            <div class="mt-2 sm:mt-3 text-base sm:text-lg font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 leading-tight break-words">
                                                {{ $item['text'] }}
                                            </div>
                                        </div>

                                        <button
                                                type="button"
                                                class="speak-btn shrink-0 inline-flex h-11 w-11 sm:h-11 sm:w-11 items-center justify-center rounded-2xl
                                                   bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 text-white
                                                   shadow-md shadow-indigo-600/20 ring-1 ring-white/20
                                                   transition-transform duration-200 active:scale-95 hover:scale-[1.03]
                                                   focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30"
                                                aria-label="Play"
                                                data-audio="{{ $item['sound'] }}"
                                        >
                                            <svg viewBox="0 0 24 24" class="h-6 w-6" fill="currentColor" aria-hidden="true">
                                                <path d="M8 5v14l11-7z"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="mt-4 h-px w-full bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent dark:via-indigo-400/15"></div>

                                    <div class="mt-3 flex items-center justify-between gap-3">
                                        <span class="text-[10px] sm:text-[11px] font-black uppercase tracking-[0.28em] text-slate-500 dark:text-slate-300">
                                            Listen
                                        </span>
                                        <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-extrabold text-slate-600 dark:text-slate-200 whitespace-nowrap">
                                            <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500/60 ring-2 ring-emerald-500/20 dark:bg-emerald-400/60 dark:ring-emerald-400/20"></span>
                                            Tap ▶
                                        </span>
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
            const titleBlock = document.getElementById("titleBlock");
            const cards = Array.from(document.querySelectorAll(".vocab-card"));
            const buttons = Array.from(document.querySelectorAll(".speak-btn"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentCard = null;

            function setPlaying(card, isPlaying) {
                if (!card) return;
                card.classList.toggle("ring-2", isPlaying);
                card.classList.toggle("ring-indigo-500/30", isPlaying);
                card.classList.toggle("dark:ring-indigo-400/20", isPlaying);
            }

            function stopAudio() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch (e) {}
                if (currentCard) setPlaying(currentCard, false);
                currentCard = null;
            }

            function playAudio(src, card) {
                if (!src) return;

                if (currentCard && currentCard !== card) setPlaying(currentCard, false);
                currentCard = card || null;
                setPlaying(currentCard, true);

                try {
                    if (audio.src !== src) audio.src = src;
                    audio.currentTime = 0;

                    const p = audio.play();
                    if (p && typeof p.catch === "function") {
                        p.catch(() => {
                            setPlaying(currentCard, false);
                            currentCard = null;
                        });
                    }
                } catch (e) {
                    setPlaying(currentCard, false);
                    currentCard = null;
                }
            }

            audio.addEventListener("ended", () => {
                setPlaying(currentCard, false);
                currentCard = null;
            });

            audio.addEventListener("error", () => {
                setPlaying(currentCard, false);
                currentCard = null;
            });

            buttons.forEach((btn) => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    const src = btn.getAttribute("data-audio") || "";
                    const card = btn.closest(".vocab-card");
                    stopAudio();
                    playAudio(src, card);
                });
            });

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [titleBlock, ...cards].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(titleBlock, { opacity: 0, y: 16, duration: 0.85 }, 0.05)
                    .from(cards, { opacity: 0, y: 10, duration: 0.55, stagger: 0.06 }, 0.20);
            }

            window.resetSlide = playIn;
            playIn();

            window.stopSlideAudio = function () {
                stopAudio();
            };
        });
    </script>
@endsection
