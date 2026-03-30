{{-- resources/views/slider/slide-daily-routine.blade.php --}}
<?php
$content = [
    'page_title' => 'What time?',
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

@section('title', $content['page_title'])

@section('style')
    @parent
    <style>
        .routine-page {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .routine-title {
            letter-spacing: -0.04em;
        }

        .routine-text {
            letter-spacing: -0.02em;
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

        .card-audio-btn.speaking .wave-bar {
            display: block;
        }

        .card-audio-btn.speaking .static-icon {
            display: none;
        }

        .routine-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(99, 102, 241, 0.18),
                    0 24px 44px -30px rgba(15, 23, 42, 0.22);
        }

        .dark .routine-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(129, 140, 248, 0.22),
                    0 24px 44px -30px rgba(2, 6, 23, 0.28);
        }
    </style>
@endsection

@section('content')
    <div class="routine-page min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-10 sm:py-12 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-8 sm:gap-10">

                        {{-- Title --}}
                        <div id="titleBlock" class="space-y-2 sm:space-y-3">
                            <h1 class="routine-title font-black leading-[1.02] text-4xl sm:text-5xl lg:text-6xl">
                                <span class="bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            </h1>

                            @if(trim($content['subtitle']) !== '')
                                <p class="mx-auto max-w-xl font-bold text-base sm:text-lg text-slate-600 dark:text-slate-300">
                                    {{ $content['subtitle'] }}
                                </p>
                            @endif
                        </div>

                        {{-- Cards --}}
                        <div class="w-full max-w-4xl flex flex-col gap-4 sm:gap-5">
                            @foreach($content['cards'] as $index => $card)
                                @php
                                    $imageLeft = $index % 2 === 0;
                                    $sound = trim((string)($card['sound'] ?? ''));
                                    $audioLeft = trim((string)($card['text'] ?? '')) === 'What time do you eat breakfast?';
                                @endphp

                                <div class="routine-card relative rounded-3xl overflow-hidden
                                            bg-white dark:bg-slate-900
                                            border border-slate-200/70 dark:border-slate-700/60
                                            shadow-sm hover:shadow-md
                                            transition-all duration-200
                                            hover:-translate-y-0.5">

                                    @if($sound !== '')
                                        <button
                                                type="button"
                                                class="card-audio-btn absolute top-3 z-20 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/85 text-slate-700 ring-1 ring-slate-200 shadow-md backdrop-blur focus-visible:ring-4 focus-visible:ring-indigo-300/40 dark:bg-slate-800/90 dark:text-white dark:ring-slate-600 {{ $audioLeft ? 'left-3' : 'right-3' }}"
                                                data-audio="{{ $sound }}"
                                        >
                                            <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <span class="wave-bar" style="animation-delay:.1s"></span>
                                            <span class="wave-bar" style="animation-delay:.2s"></span>
                                            <span class="wave-bar" style="animation-delay:.3s"></span>
                                        </button>
                                    @endif

                                    <div class="flex h-[138px] sm:h-[168px]">

                                        {{-- Image (Left) --}}
                                        @if($imageLeft)
                                            <div class="w-[32%] sm:w-[22%] bg-slate-100 dark:bg-slate-800">
                                                <img
                                                        src="{{ $card['image'] }}"
                                                        alt=""
                                                        class="h-full w-full object-cover"
                                                        loading="lazy"
                                                        decoding="async"
                                                >
                                            </div>
                                        @endif

                                        {{-- Text --}}
                                        <div class="flex-1 flex items-center px-6 sm:px-10 text-left">
                                            <p class="routine-text font-black text-2xl sm:text-3xl text-slate-900 dark:text-slate-100 leading-snug">
                                                {{ $card['text'] }}
                                            </p>
                                        </div>

                                        {{-- Image (Right) --}}
                                        @if(!$imageLeft)
                                            <div class="w-[32%] sm:w-[22%] bg-slate-100 dark:bg-slate-800">
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
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const audioButtons = Array.from(document.querySelectorAll(".card-audio-btn"));

            if (!audioButtons.length) return;

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying) {
                if (!btn) return;
                btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying) {
                if (!card) return;
                card.classList.toggle("is-playing", isPlaying);
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
                const card = btn.closest(".routine-card");

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

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            audioButtons.forEach((btn) => {
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

            window.stopSlideAudio = stopAudio;
            window.resetSlide = stopAudio;
        });
    </script>
@endsection
