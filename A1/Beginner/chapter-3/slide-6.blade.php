<?php
$content = [
    'title' => 'Questions You May Hear',
    'subtitle' => 'Common questions during a job interview',
    'questions' => [
        [
            'question' => 'What is your name?',
            'plus' => 'This is the first question you will hear.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/1.mp3'),
        ],
        [
            'question' => 'Where are you from?',
            'plus' => 'The interviewer wants to know your background.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/2.mp3'),
        ],
        [
            'question' => 'Do you have experience?',
            'plus' => 'They will ask if you have relevant skills.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/3.mp3'),
        ],
        [
            'question' => 'Why do you want this job?',
            'plus' => 'This question helps them understand your motivation.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-3/audio/slide6/4.mp3'),
        ],
    ]
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .slide-font { font-family: "Plus Jakarta Sans", sans-serif; }

        .play-hit { -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible { outline: none; }

        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speak-btn.speaking .wave-bar { display: block; }

        .speak-btn.speaking .static-icon {
            display: none;
        }

        .question-audio-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(99,102,241,.18),
                    0 18px 32px rgba(15,23,42,.10);
        }

        .dark .question-audio-card.is-playing {
            box-shadow:
                    0 0 0 2px rgba(129,140,248,.22),
                    0 18px 32px rgba(2,6,23,.22);
        }
    </style>
@endsection

@section("content")
    <div id="interviewQuestionsSlide" class="slide-font relative min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="relative z-10 mx-auto flex min-h-[100dvh] w-full max-w-[1160px] items-center px-4 py-8 sm:px-8 sm:py-12 lg:px-10">
            <section class="w-full">
                <div data-anim="head" class="grid place-items-center gap-4 text-center sm:gap-5">
                    <div class="inline-flex items-center rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1 dark:border-indigo-400/20 dark:bg-indigo-400/10">
                        <span class="text-xs sm:text-sm font-black text-indigo-700 dark:text-indigo-200">
                            Interview Practice
                        </span>
                    </div>

                    <div class="header-spacing text-center space-y-6 my-8">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{$content['subtitle']}}
                        </p>
                    </div>
                </div>

                <div data-anim="list" class="mx-auto mt-7 w-full max-w-4xl space-y-3 sm:mt-8 sm:space-y-4">
                    @foreach($content['questions'] as $index => $item)
                        <article class="question-audio-card rounded-[24px] border border-slate-200 bg-white shadow-xl p-4 sm:p-5 dark:border-slate-700 dark:bg-slate-900/95">
                            <div class="grid grid-cols-[auto_1fr_auto] items-start gap-3 sm:gap-4">
                                <span class="inline-flex h-10 min-w-10 items-center justify-center rounded-full border border-indigo-200 bg-indigo-50 px-2 dark:border-indigo-300/20 dark:bg-indigo-400/10">
                                    <span class="text-sm font-black text-slate-800 dark:text-slate-50">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </span>

                                <div class="min-w-0">
                                    <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                        {{ $item['question'] }}
                                    </h2>
                                    <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                        {{ $item['plus'] }}
                                    </p>
                                </div>

                                @if(!empty($item['sound']))
                                    <button
                                            type="button"
                                            class="play-hit speak-btn inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg shadow-indigo-900/30 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                            aria-label="Play Audio"
                                            data-audio="{{ $item['sound'] }}"
                                    >
                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                        </svg>

                                        <span class="wave-bar" style="animation-delay:.1s"></span>
                                        <span class="wave-bar" style="animation-delay:.2s"></span>
                                        <span class="wave-bar" style="animation-delay:.3s"></span>
                                    </button>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("interviewQuestionsSlide");
            if (!root) return;

            const head = root.querySelector('[data-anim="head"]');
            const cards = Array.from(root.querySelectorAll('[data-anim="list"] > article'));
            const buttons = Array.from(root.querySelectorAll(".speak-btn"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying){
                if(btn) btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying){
                if (!card) return;
                card.classList.toggle("is-playing", isPlaying);
                card.classList.toggle("ring-2", isPlaying);
                card.classList.toggle("ring-indigo-500/30", isPlaying);
                card.classList.toggle("dark:ring-indigo-400/20", isPlaying);
            }

            function resetCurrent(){
                if(currentBtn) setBtnState(currentBtn, false);
                if(currentCard) setCardState(currentCard, false);
                currentBtn = null;
                currentCard = null;
                currentSrc = "";
            }

            function stopAudio(){
                try{
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                }catch(e){}
                resetCurrent();
            }

            function playOrToggle(btn){
                const src = btn.getAttribute("data-audio") || "";
                const card = btn.closest(".question-audio-card");
                if(!src) return;

                if(currentSrc === src && !audio.paused){
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                currentCard = card;
                currentSrc = src;

                setBtnState(currentBtn, true);
                setCardState(currentCard, true);

                try{
                    audio.src = src;
                    audio.currentTime = 0;
                    const playPromise = audio.play();
                    if(playPromise && typeof playPromise.catch === "function"){
                        playPromise.catch(() => stopAudio());
                    }
                }catch(e){
                    stopAudio();
                }
            }

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            buttons.forEach(btn => {
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

                if(nextTrigger){
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

            function forceVisible(){
                if (head) {
                    head.style.opacity = "1";
                    head.style.visibility = "visible";
                    head.style.transform = "translate3d(0,0,0)";
                }

                cards.forEach((card) => {
                    card.style.opacity = "1";
                    card.style.visibility = "visible";
                    card.style.transform = "translate3d(0,0,0)";
                });
            }

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
                forceVisible();
            };

            forceVisible();
        });
    </script>
@endsection
