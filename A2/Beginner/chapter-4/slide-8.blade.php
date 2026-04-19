<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title' => 'New Vocabulary',
    'subtitle' => '',
    'groups' => [
        [
            'key' => 'weekend-activities',
            'title' => 'Weekend Activities',
            'grid_class' => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            'items' => [
                [
                    'text' => 'Go shopping',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/go-shopping.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/shopping.webp'),
                ],
                [
                    'text' => 'Play tennis',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/play-tennis.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/tennis.webp'),
                ],
                [
                    'text' => 'Watch a movie',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/watch-a-movie.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/movie.webp'),
                ],
            ],
        ],
        [
            'key' => 'chores',
            'title' => 'Chores',
            'grid_class' => 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4',
            'items' => [
                [
                    'text' => 'Wash dishes',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/wash-dishes.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/wash.webp'),
                ],
                [
                    'text' => 'Vacuum',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/vacuum.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/vacuum.webp'),
                ],
                [
                    'text' => 'Mop',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/mop.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/mop.webp'),
                ],
                [
                    'text' => 'Clean',
                    'sound' => materialAsset('slider/A2/Beginner/chapter-4/audios/slide8/clean.mp3'),
                    'image' => materialAsset('slider/A2/Beginner/chapter-4/img/slide8/clean.webp'),
                ],
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = $content['page_title'] ?? 'Slide';
    $title = $content['title'] ?? '';
    $subtitle = $content['subtitle'] ?? '';
    $hasSubtitle = trim((string) $subtitle) !== '';
    $gridClass = (string) ($content['grid_class'] ?? 'grid-cols-2 sm:grid-cols-2 lg:grid-cols-4');
    $items = is_array($content['items'] ?? null) ? $content['items'] : [];
    $groups = is_array($content['groups'] ?? null) ? array_values($content['groups']) : [];
    $allowHtmlSubtitles = (bool) ($content['allow_html_subtitles'] ?? false);

    $normalizeCols = static fn ($cols) => max(1, min(6, (int) $cols));

    $extractCols = static function (?string $breakpoint, string $classString, int $fallback) use ($normalizeCols) {
        $pattern = $breakpoint
            ? '/(?:^|\s)' . preg_quote($breakpoint, '/') . ':grid-cols-(\d+)/'
            : '/(?:^|\s)grid-cols-(\d+)/';

        if (preg_match($pattern, $classString, $match)) {
            return $normalizeCols($match[1]);
        }

        return $fallback;
    };

    $buildGroupConfig = static function (array $group, int $index) use ($extractCols, $gridClass) {
        $groupItems = is_array($group['items'] ?? null) ? array_values($group['items']) : [];
        $groupGridClass = (string) ($group['grid_class'] ?? $gridClass);
        $baseCols = $extractCols(null, $groupGridClass, 2);
        $smCols = $extractCols('sm', $groupGridClass, $baseCols);
        $lgCols = $extractCols('lg', $groupGridClass, $smCols);
        $xlCols = $extractCols('xl', $groupGridClass, $lgCols);

        return [
            'key' => (string) ($group['key'] ?? ('group-' . $index)),
            'title' => trim((string) ($group['title'] ?? '')),
            'items' => $groupItems,
            'base_cols' => $baseCols,
            'sm_cols' => $smCols,
            'lg_cols' => $lgCols,
            'xl_cols' => $xlCols,
        ];
    };

    $groupSections = [];

    foreach ($groups as $index => $group) {
        if (!is_array($group)) {
            continue;
        }

        $section = $buildGroupConfig($group, $index);
        if ($section['items'] === []) {
            continue;
        }

        $groupSections[] = $section;
    }

    if ($groupSections === [] && $items !== []) {
        $groupSections[] = $buildGroupConfig([
            'key' => 'group-0',
            'title' => '',
            'items' => $items,
            'grid_class' => $gridClass,
        ], 0);
    }
@endphp

@section('title', $pageTitle)

@section('style')
    <style>
        .image-card-shell{
            min-height:100dvh;
            width:100%;
            overflow-x:hidden;
            font-family:"Plus Jakarta Sans", sans-serif;
        }

        .image-card-inner{
            min-height:100dvh;
            width:100%;
            max-width:1280px;
            margin:0 auto;
            padding:20px 16px 28px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .image-card-main{
            width:100%;
        }

        .image-card-main > #gameTitle{
            margin-top:0 !important;
            margin-bottom:22px !important;
            padding-left:0 !important;
            padding-right:0 !important;
        }

        .image-card-main[data-has-subtitle="0"] > #gameTitle{
            margin-bottom:28px !important;
        }

        .image-card-main[data-has-subtitle="1"] > #gameTitle{
            margin-bottom:22px !important;
        }

        .image-card-grid{
            display:grid;
            width:100%;
            max-width:1180px;
            margin:0 auto;
            gap:14px;
            grid-template-columns:repeat(1, minmax(0, 1fr));
        }

        .image-card-grid[data-base-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
        .image-card-grid[data-base-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
        .image-card-grid[data-base-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
        .image-card-grid[data-base-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
        .image-card-grid[data-base-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}

        .image-card-groups{
            display:flex;
            flex-direction:column;
            gap:28px;
        }

        .image-card-group{
            width:100%;
        }

        .image-card-group-title{
            margin:0 auto 12px;
            width:100%;
            max-width:1180px;
            text-align:left;
            font-size:1.2rem;
            line-height:1.2;
            font-weight:900;
            letter-spacing:-0.03em;
            color:#0f172a;
        }

        .dark .image-card-group-title{
            color:#f8fafc;
        }

        .image-vocab-card{
            position:relative;
            display:flex;
            flex-direction:column;
            min-height:100%;
            overflow:hidden;
            border-radius:28px;
            border:1px solid rgba(226,232,240,.95);
            background:rgba(255,255,255,.92);
            box-shadow:0 22px 50px -34px rgba(15,23,42,.32);
            transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .dark .image-vocab-card{
            border-color:rgba(51,65,85,.95);
            background:rgba(15,23,42,.9);
            box-shadow:0 24px 50px -34px rgba(2,6,23,.7);
        }

        .image-vocab-card:hover{
            transform:translateY(-3px);
            border-color:rgba(100,116,139,.32);
            box-shadow:0 28px 60px -36px rgba(15,23,42,.24);
        }

        .image-vocab-card.ring-2{
            border-color:rgba(100,116,139,.34);
            box-shadow:0 0 0 1px rgba(100,116,139,.12), 0 24px 52px -34px rgba(15,23,42,.30);
        }

        .card-media-box{
            position:relative;
            overflow:hidden;
            background:#e2e8f0;
        }

        .dark .card-media-box{
            background:#1e293b;
        }

        .card-media-box::before{
            content:"";
            display:block;
            padding-top:70%;
        }

        .card-image{
            position:absolute;
            inset:0;
            display:block;
            width:100%;
            height:100%;
            object-fit:cover;
            transition:transform .35s ease;
        }

        .image-vocab-card:hover .card-image{
            transform:scale(1.03);
        }

        .card-image-overlay{
            position:absolute;
            inset:0;
            background:
                linear-gradient(to top, rgba(15,23,42,.6), rgba(15,23,42,.08) 48%, rgba(15,23,42,0) 72%),
                linear-gradient(135deg, rgba(59,130,246,.24), transparent 58%);
            pointer-events:none;
        }

        .card-audio{
            position:absolute;
            top:12px;
            right:12px;
            z-index:2;
        }

        .card-body{
            display:flex;
            flex:1;
            flex-direction:column;
            gap:10px;
            padding:15px 15px 16px;
        }

        .card-body-title{
            display:flex;
            align-items:center;
            gap:.45rem;
            color:#0f172a;
            font-size:1.02rem;
            line-height:1.25;
            font-weight:900;
            letter-spacing:-0.03em;
        }

        .dark .card-body-title{
            color:#f8fafc;
        }

        .card-body-emoji{
            flex-shrink:0;
            font-size:1.05em;
            line-height:1;
        }

        .card-subtitle{
            color:#475569;
            font-size:.88rem;
            line-height:1.5;
            font-weight:700;
        }

        .dark .card-subtitle{
            color:#cbd5e1;
        }

        .speak-btn{
            -webkit-tap-highlight-color:transparent;
            border:0;
            cursor:pointer;
        }

        .speak-btn:focus-visible{
            outline:none;
        }

        .speak-btn-shell{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            width:44px;
            height:44px;
            border-radius:999px;
            color:#ffffff;
            border:1px solid rgba(255,255,255,.62);
            background:rgba(15,23,42,.22);
            box-shadow:
                0 14px 28px -18px rgba(15,23,42,.6),
                inset 0 1px 0 rgba(255,255,255,.18);
            backdrop-filter:blur(10px);
            -webkit-backdrop-filter:blur(10px);
            transition:transform .16s ease, background-color .16s ease;
        }

        .speak-btn:hover .speak-btn-shell{
            transform:scale(1.04);
            background:rgba(15,23,42,.3);
        }

        .speak-btn.speaking .speak-btn-shell{
            background:rgba(79,70,229,.54);
        }

        .wave-bar{
            display:none;
            width:3px;
            height:12px;
            background:currentColor;
            border-radius:2px;
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
            0%,100%{height:6px;}
            50%{height:16px;}
        }

        @media (min-width: 640px){
            .image-card-inner{
                padding:24px 20px 32px;
            }

            .image-card-grid{
                gap:16px;
            }

            .image-card-groups{
                gap:32px;
            }

            .image-card-main[data-has-subtitle="0"] > #gameTitle{
                margin-bottom:32px !important;
            }

            .image-card-main[data-has-subtitle="1"] > #gameTitle{
                margin-bottom:26px !important;
            }

            .image-card-grid[data-sm-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .image-card-grid[data-sm-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .image-card-grid[data-sm-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .image-card-grid[data-sm-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .image-card-grid[data-sm-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .image-card-grid[data-sm-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1024px){
            .image-card-grid{
                gap:18px;
            }

            .image-card-groups{
                gap:36px;
            }

            .image-card-main[data-has-subtitle="0"] > #gameTitle{
                margin-bottom:36px !important;
            }

            .image-card-main[data-has-subtitle="1"] > #gameTitle{
                margin-bottom:28px !important;
            }

            .image-card-grid[data-lg-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .image-card-grid[data-lg-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .image-card-grid[data-lg-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .image-card-grid[data-lg-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .image-card-grid[data-lg-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .image-card-grid[data-lg-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (min-width: 1280px){
            .image-card-grid[data-xl-cols="1"]{grid-template-columns:repeat(1, minmax(0, 1fr));}
            .image-card-grid[data-xl-cols="2"]{grid-template-columns:repeat(2, minmax(0, 1fr));}
            .image-card-grid[data-xl-cols="3"]{grid-template-columns:repeat(3, minmax(0, 1fr));}
            .image-card-grid[data-xl-cols="4"]{grid-template-columns:repeat(4, minmax(0, 1fr));}
            .image-card-grid[data-xl-cols="5"]{grid-template-columns:repeat(5, minmax(0, 1fr));}
            .image-card-grid[data-xl-cols="6"]{grid-template-columns:repeat(6, minmax(0, 1fr));}
        }

        @media (max-width: 639px){
            .image-card-main > #gameTitle{
                margin-bottom:18px !important;
            }

            .image-card-main[data-has-subtitle="0"] > #gameTitle{
                margin-bottom:24px !important;
            }

            .image-card-main[data-has-subtitle="1"] > #gameTitle{
                margin-bottom:18px !important;
            }

            .card-body{
                padding:13px 13px 14px;
            }

            .card-subtitle{
                font-size:.82rem;
            }
        }

        @media (prefers-reduced-motion: reduce){
            .image-vocab-card,
            .card-image,
            .speak-btn-shell{
                transition:none !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="image-card-shell">
        <div class="image-card-inner">
            <main class="image-card-main" data-has-subtitle="{{ $hasSubtitle ? '1' : '0' }}">
                @include('slider.components.title-subtitle')

                <div class="image-card-groups">
                    @foreach($groupSections as $group)
                        <section class="image-card-group" data-group-key="{{ $group['key'] }}">
                            @if($group['title'] !== '')
                                <h2 class="image-card-group-title">{{ $group['title'] }}</h2>
                            @endif

                            <div
                                class="image-card-grid"
                                data-base-cols="{{ $group['base_cols'] }}"
                                data-sm-cols="{{ $group['sm_cols'] }}"
                                data-lg-cols="{{ $group['lg_cols'] }}"
                                data-xl-cols="{{ $group['xl_cols'] }}"
                            >
                                @foreach($group['items'] as $item)
                                    <article class="image-vocab-card vocab-card">
                                        <div class="card-media-box">
                                            <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['text'] }}"
                                                loading="lazy"
                                                class="card-image"
                                            />
                                            <div class="card-image-overlay"></div>

                                            <div class="card-audio">
                                                <button
                                                    type="button"
                                                    class="speak-btn"
                                                    aria-label="Play Audio"
                                                    data-audio="{{ $item['sound'] }}"
                                                >
                                                    <span class="speak-btn-shell">
                                                        <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>
                                                        <span class="wave-bar" style="animation-delay:.1s"></span>
                                                        <span class="wave-bar" style="animation-delay:.2s"></span>
                                                        <span class="wave-bar" style="animation-delay:.3s"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="card-body-title">
                                                <span>{{ $item['text'] }}</span>
                                                @if(!empty($item['emoji']))
                                                    <span class="card-body-emoji" aria-hidden="true">{{ $item['emoji'] }}</span>
                                                @endif
                                            </div>

                                            @if(!empty($item['subtitle']))
                                                <div class="card-subtitle">
                                                    @if($allowHtmlSubtitles)
                                                        {!! $item['subtitle'] !!}
                                                    @else
                                                        {{ $item['subtitle'] }}
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = Array.from(document.querySelectorAll(".speak-btn"));

            const audio = new Audio();
            audio.preload = "auto";
            audio.crossOrigin = "anonymous";

            let currentBtn = null;
            let currentCard = null;
            let currentSrc = "";

            function setBtnState(btn, isPlaying) {
                if (btn) btn.classList.toggle("speaking", isPlaying);
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
                try {
                    audio.pause();
                    audio.currentTime = 0;
                    audio.removeAttribute("src");
                    audio.load();
                } catch (error) {}

                resetCurrent();
            }

            function playOrToggle(btn) {
                const src = btn.getAttribute("data-audio") || "";
                const card = btn.closest(".vocab-card");
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
                } catch (error) {
                    stopAudio();
                }
            }

            audio.addEventListener("ended", stopAudio);
            audio.addEventListener("error", stopAudio);

            buttons.forEach((btn) => {
                btn.addEventListener("click", (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    playOrToggle(btn);
                });
            });

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
