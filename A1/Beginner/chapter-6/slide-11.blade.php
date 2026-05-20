<?php

$content = [
    'title'      => 'What time?',
    'subtitle'   => '',
    'cards'      => [
        [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/wake.webp'),
            'text'  => 'What time do you wake up?',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/wake-up.mp3'),
        ],
        [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/breakfast.webp'),
            'text'  => 'What time do you eat breakfast?',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/eat-breakfast.mp3'),
        ],
        [
            'image' => materialAsset('slider/A1/Beginner/chapter-6/img/work.webp'),
            'text'  => 'What time do you go to work?',
            'sound' => materialAsset('slider/A1/Beginner/chapter-6/audios/go-to-work.mp3'),
        ],
    ],
];

?>

@extends('slider.simple-layout')

@section('title', $content['title'])

@section('content')
    @php
        $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
    @endphp

    <main class="h-[100dvh] w-full overflow-hidden">
        <div class="mx-auto flex h-full w-full max-w-5xl items-center px-4 py-5 sm:px-8 sm:py-5 lg:py-5">
            <section class="w-full">
                <div class="grid place-items-center gap-5 text-center sm:gap-6">
                    <div class="w-full">
                        @include('slider.components.title-subtitle')
                    </div>

                    <div class="flex w-full max-w-[23rem] flex-col gap-3 sm:max-w-4xl sm:gap-3.5 lg:max-w-[54rem]">
                        @foreach($content['cards'] as $index => $card)
                            @php
                                $imageLeft = $index % 2 === 0;
                                $text = trim((string) ($card['text'] ?? ''));
                                $sound = trim((string) ($card['sound'] ?? ''));
                                $audioLeft = $text === 'What time do you eat breakfast?';
                            @endphp

                            <article
                                class="routine-card relative overflow-hidden rounded-[1.55rem] border border-white/90 bg-white/90 shadow-[0_22px_48px_-30px_rgba(15,23,42,0.46)] ring-1 ring-slate-200/90 backdrop-blur-xl transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_30px_60px_-34px_rgba(15,23,42,0.52)] dark:border-white/10 dark:bg-slate-900/82 dark:ring-white/10"
                            >
                                @if($sound !== '')
                                    <button
                                            type="button"
                                            class="card-audio-btn absolute top-3 z-20 inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-white/20 {{ $buttonGradient }} text-white shadow-lg shadow-slate-900/10 backdrop-blur-sm transition-[transform,background-color,border-color,color] duration-200 ease-out hover:-rotate-3 hover:scale-105 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-300/40 sm:h-9 sm:w-9 {{ $audioLeft ? 'left-3' : 'right-3' }}"
                                            data-audio="{{ $sound }}"
                                            aria-label="Play audio"
                                    >
                                        <svg class="js-static-icon h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                        </svg>

                                        <span class="js-wave-wrap hidden items-center gap-0.5" aria-hidden="true">
                                            <span class="h-1.5 w-[2px] animate-pulse rounded-full bg-current"></span>
                                            <span class="h-3 w-[2px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                            <span class="h-2 w-[2px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                        </span>
                                    </button>
                                @endif

                                <div class="flex min-h-28 sm:min-h-32 lg:min-h-36">
                                    @if($imageLeft)
                                        <div class="h-28 w-28 shrink-0 overflow-hidden bg-slate-100 ring-1 ring-inset ring-slate-200/70 dark:bg-slate-800 dark:ring-white/10 sm:h-32 sm:w-32 lg:h-36 lg:w-36">
                                            <img
                                                    src="{{ $card['image'] }}"
                                                    alt=""
                                                    class="h-full w-full object-cover"
                                                    loading="lazy"
                                                    decoding="async"
                                            >
                                        </div>
                                    @endif

                                    <div class="flex min-w-0 flex-1 items-center justify-center py-4 text-center {{ $audioLeft ? 'pl-14 pr-4 sm:pl-16 sm:pr-6 lg:pl-[4.5rem] lg:pr-8' : 'pl-4 pr-14 sm:pl-6 sm:pr-16 lg:pl-8 lg:pr-[4.5rem]' }}">
                                        <p class="max-w-[34rem] text-[1.05rem] font-black leading-snug tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-2xl lg:text-[1.72rem]">
                                            {{ $text }}
                                        </p>
                                    </div>

                                    @if(!$imageLeft)
                                        <div class="h-28 w-28 shrink-0 overflow-hidden bg-slate-100 ring-1 ring-inset ring-slate-200/70 dark:bg-slate-800 dark:ring-white/10 sm:h-32 sm:w-32 lg:h-36 lg:w-36">
                                            <img
                                                    src="{{ $card['image'] }}"
                                                    alt=""
                                                    class="h-full w-full object-cover"
                                                    loading="lazy"
                                                    decoding="async"
                                            >
                                        </div>
                                    @endif
                                </div>

                                <div class="playing-indicator absolute inset-x-0 bottom-0 h-1 origin-left scale-x-0 {{ $buttonGradient }} transition-transform duration-150"></div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = Array.from(document.querySelectorAll(".card-audio-btn"));
            const audio = new Audio();

            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentButton = null;
            let currentCard = null;
            let currentSrc = "";
            let progressFrame = null;

            function setButtonState(button, isPlaying) {
                if (!button) return;

                button.querySelector(".js-static-icon")?.classList.toggle("hidden", isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("hidden", !isPlaying);
                button.querySelector(".js-wave-wrap")?.classList.toggle("flex", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;

                card.classList.toggle("ring-4", isPlaying);
                card.classList.toggle("ring-indigo-400/25", isPlaying);

                if (!isPlaying) {
                    const indicator = card.querySelector(".playing-indicator");
                    if (indicator) indicator.style.transform = "scaleX(0)";
                }
            }

            function cancelProgress() {
                if (!progressFrame) return;

                cancelAnimationFrame(progressFrame);
                progressFrame = null;
            }

            function updateProgress() {
                if (!currentCard || audio.paused) return;

                const indicator = currentCard.querySelector(".playing-indicator");
                const progress = audio.duration ? audio.currentTime / audio.duration : 0;

                if (indicator) {
                    indicator.style.transform = `scaleX(${Math.min(Math.max(progress || 0, 0), 1)})`;
                }

                progressFrame = requestAnimationFrame(updateProgress);
            }

            function resetCurrent() {
                setButtonState(currentButton, false);
                setCardState(currentCard, false);

                currentButton = null;
                currentCard = null;
                currentSrc = "";
                cancelProgress();
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

            function playOrToggle(button) {
                const src = button.getAttribute("data-audio") || "";
                const card = button.closest(".routine-card");

                if (!src) return;

                if (currentSrc === src && !audio.paused) {
                    stopAudio();
                    return;
                }

                stopAudio();

                currentButton = button;
                currentCard = card;
                currentSrc = src;

                setButtonState(currentButton, true);
                setCardState(currentCard, true);

                try {
                    audio.src = src;
                    audio.currentTime = 0;

                    const playPromise = audio.play();
                    if (playPromise && typeof playPromise.catch === "function") {
                        playPromise.catch(() => stopAudio());
                    }

                    updateProgress();
                } catch (e) {
                    stopAudio();
                }
            }

            buttons.forEach((button) => {
                button.addEventListener("click", (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    playOrToggle(button);
                });
            });

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopAudio();
            });

            window.addEventListener("beforeunload", stopAudio);
            window.addEventListener("pagehide", stopAudio);

            document.addEventListener("click", (event) => {
                const nextTrigger = event.target.closest(
                    ".next-slide, [data-next-slide], .slide-next, .swiper-button-next, .splide__arrow--next"
                );

                if (nextTrigger) {
                    stopAudio();
                }
            }, true);

            const observer = new MutationObserver(() => {
                if (currentButton && !document.body.contains(currentButton)) {
                    stopAudio();
                }
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });

            window.stopSlideAudio = stopAudio;  
            window.resetSlide = stopAudio;
        });
    </script>
@endsection
