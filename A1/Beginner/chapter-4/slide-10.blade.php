<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Read the sentences out loud.',
    'items'      => [
        [
            'who'   => 'Tom',
            'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/tom.webp'),
            'text'  => 'I<span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">’m</span> Tom.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide10/1.mp3'),
        ],
        [
            'who'   => 'Tom',
            'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/uncle.webp'),
            'text'  => 'He is <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">our</span> uncle.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide10/2.mp3'),
        ],
        [
            'who'   => 'Tom',
            'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/father.webp'),
            'text'  => 'This is <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">my</span> father.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide10/3.mp3'),
        ],
        [
            'who'   => 'Tom',
            'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide10/aunt.webp'),
            'text'  => 'My <span class="bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 bg-clip-text text-transparent">aunt</span> is Anna.',
            'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide10/4.mp3'),
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .play-hit{-webkit-tap-highlight-color:transparent;}
        .play-hit:focus-visible{outline:none;}

        .sentence-card.is-playing{
            border-color:rgba(99,102,241,.28);
            box-shadow:
                    0 18px 40px -24px rgba(79,70,229,.30),
                    0 0 0 1px rgba(99,102,241,.14);
            background:rgba(255,255,255,.78);
        }

        .dark .sentence-card.is-playing{
            border-color:rgba(129,140,248,.26);
            box-shadow:
                    0 18px 40px -24px rgba(79,70,229,.24),
                    0 0 0 1px rgba(129,140,248,.14);
            background:rgba(2,6,23,.48);
        }

        .speak-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:0;
            width:28px;
            height:28px;
            padding:0;
            border:0;
            background:transparent;
            box-shadow:none;
            cursor:pointer;
        }

        .audio-icon{
            width:24px;
            height:24px;
            display:block;
        }

        .wave-bar{
            display:none;
            width:3px;
            height:12px;
            border-radius:999px;
            margin:0 1px;
            background:linear-gradient(180deg, #3B82F6 0%, #8B5CF6 100%);
        }

        .speak-btn.speaking .wave-bar{ display:block; }

        .speak-btn.speaking .static-icon{
            display:none;
        }

    </style>
@endsection

@section('content')
    <main id="newLanguageSlide" class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-7 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-4 sm:gap-5">

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

                    <section id="cards" class="w-full">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-4 text-left">
                            @foreach($content['items'] as $i => $item)
                                <article
                                        class="sentence-card overflow-hidden rounded-[26px] border border-slate-200/70 bg-white/65 backdrop-blur-xl
                                           shadow-[0_14px_44px_-26px_rgba(15,23,42,0.45)]
                                           dark:border-slate-700/35 dark:bg-slate-950/40"
                                >
                                    <div class="grid min-h-[170px] grid-cols-[120px_minmax(0,1fr)] sm:min-h-[190px] sm:grid-cols-[145px_minmax(0,1fr)]">
                                        <div class="flex items-center justify-center pl-5 sm:pl-6">
                                            <div class="h-[70%] w-full overflow-hidden rounded-[22px]">
                                                <img
                                                        src="{{ $item['image'] }}"
                                                        alt="{{ $item['who'] }}"
                                                        class="h-full w-full object-cover"
                                                        loading="lazy"
                                                        decoding="async"
                                                        draggable="false"
                                                />
                                            </div>
                                        </div>

                                        <div class="flex min-w-0 items-center justify-between gap-3 p-5 sm:p-6 sm:pl-12">
                                            <div class="min-w-0 text-left">
                                                <div class="text-[11px] sm:text-xs font-black tracking-[0.18em] uppercase text-slate-500 dark:text-slate-300">
                                                    {{ $item['who'] }}
                                                </div>

                                                <div class="mt-1 text-xl sm:text-[1.7rem] font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 leading-tight break-words">
                                                    {!! $item['text'] !!}
                                                </div>
                                            </div>

                                            @if(!empty($item['sound']))
                                                <button
                                                        type="button"
                                                        class="play-hit speak-btn shrink-0"
                                                        aria-label="Play sentence {{ $i + 1 }}"
                                                        data-audio="{{ $item['sound'] }}"
                                                >
                                                    <svg class="static-icon audio-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                        <defs>
                                                            <linearGradient id="speakerGradient-{{ $i }}" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#3B82F6"/>
                                                                <stop offset="1" stop-color="#8B5CF6"/>
                                                            </linearGradient>
                                                        </defs>
                                                        <path
                                                                d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                                                                stroke="url(#speakerGradient-{{ $i }})"
                                                                stroke-width="2.5"
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                        />
                                                    </svg>

                                                    <span class="wave-bar" style="animation-delay:.1s"></span>
                                                    <span class="wave-bar" style="animation-delay:.2s"></span>
                                                    <span class="wave-bar" style="animation-delay:.3s"></span>
                                                </button>
                                            @endif
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
            const root = document.getElementById("newLanguageSlide");
            if (!root) return;

            const els = {
                title: root.querySelector("#titleBlock"),
                cards: Array.from(root.querySelectorAll(".sentence-card")),
            };

            const buttons = Array.from(root.querySelectorAll(".speak-btn"));
            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying){
                if (btn) btn.classList.toggle("speaking", isPlaying);
            }

            function setCardState(card, isPlaying){
                if (!card) return;
                card.classList.toggle("is-playing", isPlaying);
            }

            function resetCurrent(){
                if (currentBtn) setBtnState(currentBtn, false);
                if (currentCard) setCardState(currentCard, false);
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
                const card = btn.closest(".sentence-card");
                if (!src) return;

                if (currentSrc === src && !audio.paused){
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

                    if (playPromise && typeof playPromise.catch === "function"){
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

                if (nextTrigger){
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
            window.resetSlide = () => {
                stopAudio();
            };
        });
    </script>
@endsection
