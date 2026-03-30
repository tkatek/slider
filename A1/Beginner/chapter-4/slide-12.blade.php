<?php
$content = [
    'page_title' => 'Describing my Family',
    'title'      => 'Describing my Family',
    'subtitle'   => 'Adjectives & Opposites',

    'examples' => [
        [
            'prefix' => 'My aunt is kind',
            'image'  => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/kind.webp'),
            'sound'  => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/My-aunt.mp3'),
        ],
        [
            'prefix' => 'My mom is small',
            'image'  => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/mom.webp'),
            'sound'  => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/My-mom.mp3'),
        ],
        [
            'prefix' => 'My uncle is tall',
            'image'  => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/uncle.webp'),
            'sound'  => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/My-uncle.mp3'),
        ],
        [
            'prefix' => 'My sister is thin',
            'image'  => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/thin.webp'),
            'sound'  => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/My-sister.mp3'),
        ],
    ],

    'pairs' => [
        [
            'left' => [
                'word'  => 'Tall',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/tall.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Tall.mp3'),
            ],
            'right' => [
                'word'  => 'Short',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/short.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Short.mp3'),
            ],
        ],
        [
            'left' => [
                'word'  => 'Young',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/young.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Young.mp3'),
            ],
            'right' => [
                'word'  => 'Old',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/old.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Old.mp3'),
            ],
        ],
        [
            'left' => [
                'word'  => 'Kind',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/kind.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Kind.mp3'),
            ],
            'right' => [
                'word'  => 'Unkind',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/unkind.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Unkind.mp3'),
            ],
        ],
        [
            'left' => [
                'word'  => 'Fat',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/fat.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Fat.mp3'),
            ],
            'right' => [
                'word'  => 'Thin',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/thin.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Thin.mp3'),
            ],
        ],
        [
            'left' => [
                'word'  => 'Big',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/big.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Big.mp3'),
            ],
            'right' => [
                'word'  => 'Small',
                'image' => materialAsset('slider/A1/Beginner/chapter-4/img/slide12/small.webp'),
                'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/slide12/Small.mp3'),
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        :root{
            --bubble-bg: rgba(255,255,255,0.85);
            --bubble-line: rgba(99,102,241,0.15);
            --bubble-shadow: 0 10px 25px -5px rgba(2,6,23,0.05);
        }

        .dark {
            --bubble-bg: rgba(30, 41, 59, 0.75);
            --bubble-line: rgba(255,255,255,0.1);
            --bubble-shadow: 0 20px 25px -5px rgba(0,0,0,0.3);
        }

        .speech {
            position: relative;
            border-radius: 20px;
            padding: 14px 18px;
            background: var(--bubble-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: var(--bubble-shadow);
            border: 1px solid var(--bubble-line);
            transition: box-shadow .2s ease, border-color .2s ease, background-color .2s ease;
        }

        .speech.is-playing{
            border-color: rgba(99,102,241,.28);
            box-shadow:
                    0 18px 40px -24px rgba(79,70,229,.30),
                    0 0 0 1px rgba(99,102,241,.14);
        }

        .dark .speech.is-playing{
            border-color: rgba(129,140,248,.26);
            box-shadow:
                    0 18px 40px -24px rgba(79,70,229,.24),
                    0 0 0 1px rgba(129,140,248,.14);
        }

        .speech__tail {
            position: absolute;
            width: 14px;
            height: 14px;
            background: inherit;
            border: inherit;
            border-top: 0;
            border-left: 0;
        }

        .speech--tl .speech__tail { bottom: -7px; right: 20%; transform: rotate(45deg); }
        .speech--tr .speech__tail { bottom: -7px; left: 20%; transform: rotate(45deg); }
        .speech--bl .speech__tail { top: -7px; right: 20%; transform: rotate(-135deg); }
        .speech--br .speech__tail { top: -7px; left: 20%; transform: rotate(-135deg); }
        .speech--down .speech__tail { bottom: -7px; left: 50%; transform: translateX(-50%) rotate(45deg); }
        .speech--up .speech__tail { top: -7px; left: 50%; transform: translateX(-50%) rotate(-135deg); }

        .grammar-table{
            border-radius: 2rem;
            overflow: hidden;
        }

        .pair-row{
            transition: background-color .2s ease;
        }

        .pair-row:hover{
            background: rgba(99,102,241,.04);
        }

        .dark .pair-row:hover{
            background: rgba(99,102,241,.08);
        }

        .pair-cell{
            transition: background-color .2s ease, box-shadow .2s ease;
        }

        .pair-cell.is-playing{
            background: rgba(99,102,241,.08);
            box-shadow: inset 0 0 0 1px rgba(99,102,241,.16);
        }

        .dark .pair-cell.is-playing{
            background: rgba(99,102,241,.14);
            box-shadow: inset 0 0 0 1px rgba(129,140,248,.20);
        }

        .word-chip{
            display:inline-flex;
            align-items:center;
            justify-content:space-between;
            gap:.8rem;
            min-width:170px;
            padding:0 1rem 0 0;
            border-radius:999px;
            font-size:.9rem;
            font-weight:800;
            letter-spacing:-0.01em;
            line-height:1;
            white-space:nowrap;
            border:1px solid rgba(79,70,229,.18);
            color:#3730a3;
            background:linear-gradient(180deg, rgba(99,102,241,.12), rgba(59,130,246,.09));
        }

        .dark .word-chip{
            border-color:rgba(129,140,248,.24);
            color:#e0e7ff;
            background:linear-gradient(180deg, rgba(99,102,241,.20), rgba(59,130,246,.12));
        }

        .chip-word{
            display:inline-block;
            text-align:left;
        }

        .chip-image,
        .bubble-image{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width: 3.5rem;
            height: 3.5rem;
            overflow: hidden;
            border-radius: 999px;
            border: 1px solid rgba(99,102,241,.18);
            background: rgba(255,255,255,0.9);
            flex-shrink: 0;
        }

        .chip-image img,
        .bubble-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .audio-inline{
            display:flex;
            align-items:center;
            width:100%;
        }

        .bubble-line{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            flex-wrap:wrap;
        }

        .play-hit{-webkit-tap-highlight-color:transparent;}
        .play-hit:focus-visible{outline:none;}

        .speak-btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:0;
            width:22px;
            height:22px;
            padding:0;
            border:0;
            background:transparent;
            box-shadow:none;
            cursor:pointer;
            flex-shrink:0;
        }

        .audio-icon{
            width:20px;
            height:20px;
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
    <main id="familySlide" class="w-full min-h-[100dvh]">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 lg:min-h-[100dvh] flex flex-col justify-center">

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

            <div id="stage" class="relative w-full max-w-5xl mx-auto lg:pt-14 lg:pb-14">

                <div class="hidden lg:block">
                    <div class="absolute -top-16 -left-4 w-64 xl:w-72">
                        <div class="speech speech--tl">
                            <span class="speech__tail"></span>
                            <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold leading-snug text-sm xl:text-base text-center"></p>
                        </div>
                    </div>
                    <div class="absolute -top-16 -right-4 w-64 xl:w-72">
                        <div class="speech speech--tr">
                            <span class="speech__tail"></span>
                            <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold leading-snug text-sm xl:text-base text-center"></p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -left-4 w-64 xl:w-72">
                        <div class="speech speech--bl">
                            <span class="speech__tail"></span>
                            <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold leading-snug text-sm xl:text-base text-center"></p>
                        </div>
                    </div>
                    <div class="absolute -bottom-16 -right-4 w-64 xl:w-72">
                        <div class="speech speech--br">
                            <span class="speech__tail"></span>
                            <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold leading-snug text-sm xl:text-base text-center"></p>
                        </div>
                    </div>
                </div>

                <div class="lg:hidden mb-6 mx-auto w-full max-w-md">
                    <div class="speech speech--down">
                        <span class="speech__tail"></span>
                        <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold text-center text-sm"></p>
                    </div>
                </div>

                <div id="adjectivesCard" class="relative z-10 mx-auto w-full max-w-2xl rounded-[2rem] border border-slate-200/60 dark:border-slate-800 bg-white/90 dark:bg-slate-900/80 backdrop-blur-md shadow-2xl overflow-hidden">
                    <div class="px-6 py-8 sm:px-10">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-black text-slate-900 dark:text-white">Vocabulary 📖</h2>
                            <div class="px-3 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 text-xs font-black uppercase tracking-widest rounded-full">Opposites</div>
                        </div>

                        <div class="overflow-hidden grammar-table">
                            <table class="w-full text-left sm:text-lg">
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                @foreach($content['pairs'] as $index => $pair)
                                    <tr class="pair-row block sm:table-row">
                                        <td class="pair-cell block py-2.5 pr-0 text-left sm:table-cell sm:pr-6">
                                            <div class="audio-inline justify-start">
                                                <span class="word-chip w-full">
                                                    <span class="chip-image">
                                                        <img src="{{ $pair['left']['image'] }}" alt="{{ $pair['left']['word'] }}" loading="lazy" decoding="async" draggable="false">
                                                    </span>
                                                    <span class="chip-word">{{ $pair['left']['word'] }}</span>

                                                    <button
                                                            type="button"
                                                            class="play-hit speak-btn pair-audio"
                                                            aria-label="Play {{ $pair['left']['word'] }}"
                                                            data-audio="{{ $pair['left']['sound'] }}"
                                                    >
                                                        <svg class="static-icon audio-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                            <defs>
                                                                <linearGradient id="pairLeftGradient-{{ $index }}" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#3B82F6"/>
                                                                    <stop offset="1" stop-color="#8B5CF6"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" stroke="url(#pairLeftGradient-{{ $index }})" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <span class="wave-bar" style="animation-delay:.1s"></span>
                                                        <span class="wave-bar" style="animation-delay:.2s"></span>
                                                        <span class="wave-bar" style="animation-delay:.3s"></span>
                                                    </button>

                                                </span>
                                            </div>
                                        </td>

                                        <td class="hidden py-2.5 text-center sm:table-cell">
                                            <span class="text-slate-300 dark:text-slate-600 font-black">✕</span>
                                        </td>

                                        <td class="pair-cell block py-2.5 pl-0 text-left sm:table-cell sm:pl-6 sm:text-right">
                                            <div class="audio-inline justify-start sm:justify-end">
                                                <span class="word-chip w-full">
                                                    <span class="chip-image">
                                                        <img src="{{ $pair['right']['image'] }}" alt="{{ $pair['right']['word'] }}" loading="lazy" decoding="async" draggable="false">
                                                    </span>
                                                    <span class="chip-word">{{ $pair['right']['word'] }}</span>

                                                    <button
                                                            type="button"
                                                            class="play-hit speak-btn pair-audio"
                                                            aria-label="Play {{ $pair['right']['word'] }}"
                                                            data-audio="{{ $pair['right']['sound'] }}"
                                                    >
                                                        <svg class="static-icon audio-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                            <defs>
                                                                <linearGradient id="pairRightGradient-{{ $index }}" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
                                                                    <stop stop-color="#3B82F6"/>
                                                                    <stop offset="1" stop-color="#8B5CF6"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" stroke="url(#pairRightGradient-{{ $index }})" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <span class="wave-bar" style="animation-delay:.1s"></span>
                                                        <span class="wave-bar" style="animation-delay:.2s"></span>
                                                        <span class="wave-bar" style="animation-delay:.3s"></span>
                                                    </button>

                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="lg:hidden mt-6 mx-auto w-full max-w-md">
                    <div class="speech speech--up">
                        <span class="speech__tail"></span>
                        <p data-bubble class="text-slate-800 dark:text-slate-100 font-bold text-center text-sm"></p>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("familySlide");
            if (!root) return;

            const bubbleEls = Array.from(root.querySelectorAll("[data-bubble]"));
            const pairBtns = Array.from(root.querySelectorAll(".pair-audio"));
            const examples = @json($content['examples']);

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentTarget = null;
            let currentSrc = "";

            function speakerIconSvg(id){
                return `
                    <svg class="static-icon audio-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <defs>
                            <linearGradient id="${id}" x1="0" y1="0" x2="24" y2="24" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3B82F6"/>
                                <stop offset="1" stop-color="#8B5CF6"/>
                            </linearGradient>
                        </defs>
                        <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" stroke="url(#${id})" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="wave-bar" style="animation-delay:.1s"></span>
                    <span class="wave-bar" style="animation-delay:.2s"></span>
                    <span class="wave-bar" style="animation-delay:.3s"></span>
                `;
            }

            function setBtnState(btn, isPlaying){
                if (btn) btn.classList.toggle("speaking", isPlaying);
            }

            function setTargetState(target, isPlaying){
                if (!target) return;
                target.classList.toggle("is-playing", isPlaying);
            }

            function resetCurrent(){
                if (currentBtn) setBtnState(currentBtn, false);
                if (currentTarget) setTargetState(currentTarget, false);
                currentBtn = null;
                currentTarget = null;
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

            function playOrToggle(btn, target){
                const src = btn.getAttribute("data-audio") || "";
                if (!src) return;

                if (currentSrc === src && !audio.paused){
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                currentTarget = target;
                currentSrc = src;

                setBtnState(currentBtn, true);
                setTargetState(currentTarget, true);

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

            function shuffle(array){
                const arr = [...array];
                for (let i = arr.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [arr[i], arr[j]] = [arr[j], arr[i]];
                }
                return arr;
            }

            function fillBubbles() {
                const shuffled = shuffle(examples);

                bubbleEls.forEach((el, i) => {
                    const item = shuffled[i % shuffled.length];
                    const gradientId = `bubbleInlineGradient-${i}`;

                    el.innerHTML = `
                        <span class="bubble-line">
                            <span class="bubble-image"><img src="${item.image}" alt="${item.prefix}"></span>
                            <span>${item.prefix}</span>
                            <button
                                type="button"
                                class="play-hit speak-btn bubble-audio"
                                aria-label="Play ${item.prefix}"
                                data-audio="${item.sound || ''}"
                            >
                                ${speakerIconSvg(gradientId)}
                            </button>
                        </span>
                    `;
                });

                root.querySelectorAll(".bubble-audio").forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        playOrToggle(btn, btn.closest(".speech"));
                    });
                });
            }

            pairBtns.forEach(btn => {
                btn.addEventListener("click", (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    playOrToggle(btn, btn.closest(".pair-cell"));
                });
            });

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

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

            function renderStatic() {
                fillBubbles();
            }

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
                renderStatic();
            };

            renderStatic();
        });
    </script>
@endsection
