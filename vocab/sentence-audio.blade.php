@extends('slider.simple-layout')

@php
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    $gridClass = trim((string)($content['grid_class'] ?? 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3'));

    $audioBtnClass = ($theme['name'] ?? null) === 'orange'
        ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-lg shadow-orange-500/20'
        : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-lg shadow-indigo-500/20';

    $audioBtnRingClass = ($theme['name'] ?? null) === 'orange'
        ? 'focus-visible:ring-orange-300/40'
        : 'focus-visible:ring-indigo-300/40';
@endphp

@section('title', $content['page_title'])

@section('style')
    <style>
        .play-hit{-webkit-tap-highlight-color:transparent;}
        .play-hit:focus-visible{outline:none;}

        .title-glow{
            filter:drop-shadow(0 10px 26px rgba(99,102,241,.12));
        }

        .wave-bar{
            display:none;
            width:2.5px;
            height:10px;
            background:currentColor;
            border-radius:999px;
            margin:0 1px;
        }

        .speak-btn.speaking .wave-bar{
            display:block;
            animation:waveGrowth .6s infinite ease-in-out;
        }

        .speak-btn.speaking .static-icon{
            display:none;
        }

        @keyframes waveGrowth{
            0%,100%{height:5px;}
            50%{height:13px;}
        }

        .polite-shell{
            font-family:"Plus Jakarta Sans",sans-serif;
            min-height:100dvh;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            background:transparent;
        }

        .content-wrap{
            width:100%;
            max-width:1320px;
            margin-inline:auto;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }

        .title-block{
            width:100%;
            max-width:42rem;
            margin-inline:auto;
            text-align:center;
        }

        .title-block p{
            max-width:31rem;
            margin-inline:auto;
        }

        .polite-grid-wrap{
            width:100%;
            display:flex;
            justify-content:center;
        }

        .polite-grid{
            width:100%;
            max-width:1120px;
            gap:1rem;
        }

        @media (min-width: 1024px){
            .polite-grid{
                gap:1.1rem;
            }
        }

        .polite-card{
            position:relative;
            overflow:hidden;
            border-radius:1.5rem;
            border:1px solid rgba(226,232,240,.95);
            background:rgba(255,255,255,.92);
            backdrop-filter:blur(10px);
            box-shadow:
                    0 14px 34px rgba(15,23,42,.07),
                    0 8px 20px rgba(99,102,241,.07);
            transition:
                    transform .2s ease,
                    box-shadow .2s ease,
                    border-color .2s ease;
            min-height:160px;
        }

        .dark .polite-card{
            border-color:rgba(71,85,105,.45);
            background:rgba(15,23,42,.82);
            box-shadow:
                    0 14px 34px rgba(0,0,0,.20),
                    0 8px 20px rgba(99,102,241,.10);
        }

        .polite-card:hover{
            transform:translateY(-3px);
            box-shadow:
                    0 18px 40px rgba(15,23,42,.10),
                    0 10px 24px rgba(99,102,241,.10);
        }

        .dark .polite-card:hover{
            box-shadow:
                    0 18px 40px rgba(0,0,0,.26),
                    0 10px 24px rgba(99,102,241,.14);
        }

        .card-inner{
            display:flex;
            flex-direction:column;
            gap:.9rem;
            height:100%;
            padding:1rem 1rem 1.05rem;
        }

        @media (min-width: 640px){
            .card-inner{
                padding:1.08rem 1.12rem 1.12rem;
            }
        }

        @media (min-width: 1024px){
            .card-inner{
                padding:1.15rem;
            }
        }

        .card-top{
            display:flex;
            align-items:flex-start;
            justify-content:space-between;
            gap:.85rem;
        }

        .emoji-badge{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:3.1rem;
            height:3.1rem;
            flex-shrink:0;
            border-radius:1rem;
            background:linear-gradient(135deg, rgba(99,102,241,.14), rgba(14,165,233,.12));
            box-shadow:inset 0 1px 0 rgba(255,255,255,.45);
            font-size:1.6rem;
        }

        .dark .emoji-badge{
            background:linear-gradient(135deg, rgba(99,102,241,.20), rgba(14,165,233,.16));
            box-shadow:inset 0 1px 0 rgba(255,255,255,.04);
        }

        .card-copy{
            display:flex;
            flex-direction:column;
            gap:.42rem;
            min-width:0;
        }

        .card-title{
            font-size:1rem;
            line-height:1.2;
            font-weight:900;
            color:#0f172a;
            letter-spacing:-0.02em;
        }

        .card-title .title-highlight{
            background:linear-gradient(135deg, #f97316 0%, #fb923c 52%, #fdba74 100%);
            -webkit-background-clip:text;
            background-clip:text;
            color:transparent;
        }

        .dark .card-title{
            color:#f8fafc;
        }

        .card-subtitle{
            font-size:.875rem;
            line-height:1.45;
            font-weight:700;
            color:#475569;
        }

        .dark .card-subtitle{
            color:#cbd5e1;
        }

        @media (min-width: 640px){
            .card-title{
                font-size:1.125rem;
            }

            .card-subtitle{
                font-size:1rem;
            }
        }

        @media (min-width: 1024px){
            .card-title{
                font-size:1.125rem;
            }

            .card-subtitle{
                font-size:1rem;
            }
        }

        .audio-wrap{
            flex-shrink:0;
        }

        .speak-btn{
            width:2.25rem;
            height:2.25rem;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            border-radius:999px;
            color:#fff;
            transition:transform .16s ease, box-shadow .16s ease;
        }

        .speak-btn:hover{
            transform:scale(1.04);
        }

        .speak-btn:active{
            transform:scale(.96);
        }

        .speak-btn .static-icon{
            width:.9rem;
            height:.9rem;
        }

        @media (max-width: 639px){
            .polite-shell{
                padding:1rem .85rem;
            }

            .content-wrap{
                gap:1rem;
            }
        }

        @media (min-width: 640px){
            .polite-shell{
                padding:1.2rem;
            }

            .content-wrap{
                gap:1.15rem;
            }
        }

        @media (min-width: 1024px){
            .polite-shell{
                padding:1.3rem 1.5rem;
            }

            .content-wrap{
                gap:1.25rem;
            }
        }

        @media (prefers-reduced-motion: reduce){
            .polite-card,
            .speak-btn{
                transition:none !important;
            }
        }
    </style>
@endsection

@section('content')
    <main class="polite-shell">
        <div class="content-wrap">
            @include('slider.components.title-subtitle')

            <section class="polite-grid-wrap">
                <div class="polite-grid grid {{ $gridClass }}">
                    @foreach($items as $item)
                        <article class="polite-card">
                            <div class="card-inner">
                                <div class="card-top">
                                    <span class="emoji-badge" aria-hidden="true">
                                        {{ $item['emoji'] ?? '✨' }}
                                    </span>

                                    <div class="audio-wrap">
                                        <button
                                                type="button"
                                                class="play-hit speak-btn {{ $audioBtnClass }} focus-visible:ring-4 {{ $audioBtnRingClass }}"
                                                aria-label="Play Audio"
                                                data-audio="{{ $item['sound'] ?? '' }}"
                                        >
                                            <svg class="static-icon" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <span class="wave-bar" style="animation-delay:.1s"></span>
                                            <span class="wave-bar" style="animation-delay:.2s"></span>
                                            <span class="wave-bar" style="animation-delay:.3s"></span>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-copy">
                                    <h2 class="card-title">
                                        @if(!empty($item['text_html']))
                                            {!! $item['text_html'] !!}
                                        @else
                                            {{ $item['text'] }}
                                        @endif
                                    </h2>

                                    @if(!empty($item['subtitle']))
                                        <p class="card-subtitle">{{ $item['subtitle'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
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

            let currentBtn = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying){
                if(btn) btn.classList.toggle("speaking", isPlaying);
            }

            function resetCurrent(){
                if(currentBtn) setBtnState(currentBtn, false);
                currentBtn = null;
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
                if(!src) return;

                if(currentSrc === src && !audio.paused){
                    stopAudio();
                    return;
                }

                stopAudio();

                currentBtn = btn;
                currentSrc = src;

                setBtnState(currentBtn, true);

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

            window.stopSlideAudio = stopAudio;
            window.resetSlide = () => {
                stopAudio();
            };
        });
    </script>
@endsection
