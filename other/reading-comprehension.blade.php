@extends('slider.simple-layout')

@section('title', $content['page_title'])

@php
    $isOrangeTheme = ($theme['name'] ?? null) === 'orange';
    $readingCardLightGlowOne = $isOrangeTheme ? 'rgba(254, 215, 170, .42)' : 'rgba(191,219,254,.42)';
    $readingCardLightGlowTwo = $isOrangeTheme ? 'rgba(253, 186, 116, .30)' : 'rgba(199,210,254,.34)';
    $readingCardDarkGlowOne = $isOrangeTheme ? 'rgba(249, 115, 22, .18)' : 'rgba(59,130,246,.18)';
    $readingCardDarkGlowTwo = $isOrangeTheme ? 'rgba(251, 146, 60, .14)' : 'rgba(129,140,248,.14)';
    $readingAccentGradient = $isOrangeTheme
        ? 'linear-gradient(180deg, #fb923c 0%, #f97316 52%, #ea580c 100%)'
        : 'linear-gradient(180deg, #38bdf8 0%, #4f46e5 52%, #8b5cf6 100%)';
    $readingBadgeBorder = $isOrangeTheme ? 'rgba(251, 146, 60, .24)' : 'rgba(148,163,184,.22)';
    $readingBadgeBg = $isOrangeTheme ? 'rgba(255, 247, 237, .82)' : 'rgba(255,255,255,.72)';
    $readingBadgeDarkBorder = $isOrangeTheme ? 'rgba(251, 146, 60, .24)' : 'rgba(148,163,184,.18)';
    $readingBadgeDarkBg = $isOrangeTheme ? 'rgba(124, 45, 18, .34)' : 'rgba(15,23,42,.64)';
    $readingBadgeText = $isOrangeTheme ? '#c2410c' : '#475569';
    $readingBadgeDarkText = $isOrangeTheme ? '#fdba74' : '#cbd5e1';
    $readingDotGradient = $isOrangeTheme
        ? 'linear-gradient(135deg, #fb923c 0%, #f97316 100%)'
        : 'linear-gradient(135deg, #38bdf8 0%, #6366f1 100%)';
    $readingDropCapLight = $isOrangeTheme ? '#c2410c' : '#4338ca';
    $readingDropCapDark = $isOrangeTheme ? '#fdba74' : '#93c5fd';
@endphp

@section('style')
    <style type="text/tailwindcss">
        .blob-shape-1 {
            border-radius: 58% 42% 64% 36% / 42% 53% 47% 58%;
        }
        .blob-shape-2 {
            border-radius: 36% 64% 41% 59% / 57% 37% 63% 43%;
        }
        .blob-shape-3 {
            border-radius: 61% 39% 50% 50% / 32% 61% 39% 68%;
        }

        .reading-pane{
            height:100%;
            padding:.85rem .95rem;
            text-align:left;
        }

        .reading-card{
            position:relative;
            height:100%;
            overflow:auto;
            border-radius:1.65rem;
            border:1px solid rgba(226,232,240,.8);
            background:
                radial-gradient(120% 120% at 0% 0%, {{ $readingCardLightGlowOne }} 0%, transparent 44%),
                radial-gradient(120% 120% at 100% 0%, {{ $readingCardLightGlowTwo }} 0%, transparent 42%),
                rgba(255,255,255,.82);
            padding:1.3rem 1.35rem;
            box-shadow:0 24px 55px -42px rgba(15,23,42,.22);
            backdrop-filter:blur(10px);
        }

        .dark .reading-card{
            border-color:rgba(71,85,105,.88);
            background:
                radial-gradient(120% 120% at 0% 0%, {{ $readingCardDarkGlowOne }} 0%, transparent 44%),
                radial-gradient(120% 120% at 100% 0%, {{ $readingCardDarkGlowTwo }} 0%, transparent 42%),
                rgba(15,23,42,.84);
        }

        .reading-card::before{
            content:"";
            position:absolute;
            inset:0 auto 0 0;
            width:6px;
            border-radius:inherit;
            background:{{ $readingAccentGradient }};
            opacity:.9;
        }

        .reading-card.is-plain-mode{
            border-color:rgba(226,232,240,.72);
            box-shadow:0 18px 52px -40px rgba(15,23,42,.25);
        }

        .dark .reading-card.is-plain-mode{
            border-color:rgba(71,85,105,.78);
        }

        .reading-header{
            position:relative;
            padding-left:.35rem;
        }

        .reading-badge{
            display:inline-flex;
            align-items:center;
            gap:.45rem;
            border-radius:999px;
            border:1px solid {{ $readingBadgeBorder }};
            background:{{ $readingBadgeBg }};
            padding:.45rem .78rem;
            font-size:.7rem;
            font-weight:900;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:{{ $readingBadgeText }};
            box-shadow:0 10px 24px rgba(15,23,42,.06);
        }

        .dark .reading-badge{
            border-color:{{ $readingBadgeDarkBorder }};
            background:{{ $readingBadgeDarkBg }};
            color:{{ $readingBadgeDarkText }};
        }

        .reading-badge-dot{
            height:.5rem;
            width:.5rem;
            border-radius:999px;
            background:{{ $readingDotGradient }};
        }

        .reading-title{
            margin-top:.9rem;
            max-width:24ch;
            font-size:1.4rem;
            line-height:1.06;
            font-weight:800;
            letter-spacing:-.05em;
            color:#0f172a;
        }

        .dark .reading-title{
            color:#f8fafc;
        }

        .reading-copy{
            margin-top:1rem;
            display:grid;
            gap:.75rem;
        }

        .reading-copy p{
            margin:0;
            position:relative;
            padding:0 .1rem;
            font-size:.9rem;
            line-height:1.62;
            font-weight:600;
            letter-spacing:-.012em;
            color:#334155;
        }

        .dark .reading-copy p{
            color:#e2e8f0;
        }

        .reading-copy p:first-child::first-letter{
            float:left;
            margin:.08rem .5rem 0 0;
            font-size:2.35rem;
            line-height:.86;
            font-weight:900;
            color:{{ $readingDropCapLight }};
        }

        .dark .reading-copy p:first-child::first-letter{
            color:{{ $readingDropCapDark }};
        }

        .reading-question-card{
            border:1px solid rgba(226,232,240,.82);
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(251,146,60,.12) 0%, transparent 42%),
                rgba(255,255,255,.82);
            box-shadow:0 16px 38px -30px rgba(15,23,42,.26);
        }

        .dark .reading-question-card{
            border-color:rgba(71,85,105,.78);
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(251,146,60,.18) 0%, transparent 42%),
                rgba(15,23,42,.78);
        }

        @media (min-width: 640px){
            .reading-pane{
                padding:1rem 1.1rem;
            }

            .reading-card{
                padding:1.45rem 1.5rem;
            }

            .reading-title{
                font-size:1.75rem;
            }

            .reading-copy p{
                font-size:1.4rem;
            }
        }

        @media (min-width: 1024px){
            .reading-pane{
                padding:1.05rem 1.15rem;
            }

            .reading-card{
                padding:1.55rem 1.65rem;
            }

            .reading-copy p{
                font-size:1.4rem;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $heading = trim((string)($content['heading'] ?? ''));
        $showPointDots = $content['show_point_dots'] ?? true;
        $pointTextClass = trim((string)($content['point_text_class'] ?? 'text-base font-bold leading-relaxed text-slate-800 dark:text-slate-100 sm:text-lg'));
        $passageTitle = trim((string)($content['passage_title'] ?? $content['reading_title'] ?? ''));
        $passageLabel = trim((string)($content['passage_label'] ?? 'Reading Passage'));
        $rawPassage = $content['passage'] ?? $content['reading'] ?? [];
        $passageParagraphs = is_array($rawPassage)
            ? array_values(array_filter(array_map(static fn ($paragraph) => trim((string) $paragraph), $rawPassage), static fn ($paragraph) => $paragraph !== ''))
            : array_values(array_filter(
                array_map('trim', preg_split('/\R{2,}/', trim((string) $rawPassage)) ?: []),
                static fn ($paragraph) => $paragraph !== ''
            ));
        $usePassageCard = $passageParagraphs !== [];
        $images = is_array($content['images'] ?? null) ? array_values($content['images']) : [];
        $questions = is_array($content['questions'] ?? null) ? array_values($content['questions']) : [];
    @endphp
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid items-center gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:gap-12">

                    {{-- LEFT --}}
                    <div class="space-y-6 text-center lg:text-left">
                        @include('slider.components.title-subtitle')

                        @if(count($questions))
                            <div class="grid gap-3 text-left">
                                @foreach($questions as $index => $question)
                                    <div class="reading-question-card rounded-2xl p-4 backdrop-blur-md sm:p-5">
                                        <div class="flex items-start gap-3">
                                            <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-orange-400 to-amber-500 text-sm font-black text-white shadow-lg shadow-orange-500/20">
                                                {{ $index + 1 }}
                                            </span>
                                            <p class="text-sm font-extrabold leading-[1.45] text-slate-800 dark:text-slate-100 sm:text-base">
                                                {!! $question !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @elseif(count($images))
                            <div class="flex flex-wrap justify-center gap-4">
                                @foreach($images as $index => $img)
                                    @if(!empty($img['html']))
                                        <div class="{{ $img['class'] ?? 'w-full max-w-xl' }}">
                                            {!! $img['html'] !!}
                                        </div>
                                    @elseif(!empty($img['src']))
                                        <div class="aspect-square w-24 overflow-hidden sm:w-28 lg:w-32">
                                            <div class="h-full w-full overflow-hidden {{ $index === 0 ? 'blob-shape-1' : ($index === 1 ? 'blob-shape-2' : 'blob-shape-3') }}">
                                                <img
                                                        src="{{ $img['src'] }}"
                                                        alt="{{ $img['alt'] ?? '' }}"
                                                        class="h-full w-full object-cover"
                                                >
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- RIGHT --}}
                    @if($usePassageCard)
                        <div id="contentCard" class="reading-card is-plain-mode">
                            <div class="reading-header">
                                <div class="reading-badge">
                                    <span class="reading-badge-dot"></span>
                                    <span>{{ $passageLabel }}</span>
                                </div>

                                @if($passageTitle !== '')
                                    <h2 class="reading-title">{{ $passageTitle }}</h2>
                                @endif
                            </div>

                            <div class="reading-copy">
                                @foreach($passageParagraphs as $paragraph)
                                    <p>{!! $paragraph !!}</p>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div id="contentCard" class="rounded-[28px] border border-slate-200/70 bg-white/70 p-5 shadow-[0_14px_40px_-28px_rgba(15,23,42,0.35)] dark:border-slate-700/40 dark:bg-slate-950/35 sm:p-6">
                            <div class="space-y-4">
                                @foreach($content['points'] as $point)
                                    <div class="flex items-start gap-3">
                                        @if($showPointDots)
                                            <span class="mt-2 block h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        @endif
                                        <p class="{{ $pointTextClass }}">
                                            {!! $point !!}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        function onReady(fn) {
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", fn, { once: true });
            } else {
                fn();
            }
        }

        onReady(() => {
            const titleBlock = document.getElementById("titleBlock");
            const contentCard = document.getElementById("contentCard");
            const imageCards = Array.from(document.querySelectorAll(".blob-shape-1, .blob-shape-2, .blob-shape-3, .reading-question-card"));

            function playIn() {
                if (!window.gsap) return;
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

                const items = [titleBlock, ...imageCards, contentCard].filter(Boolean);
                gsap.killTweensOf(items);
                gsap.set(items, { clearProps: "all" });

                gsap.timeline({ defaults: { ease: "power3.out" } })
                    .from(titleBlock, { opacity: 0, y: 16, duration: 0.7 }, 0.06)
                    .from(imageCards, { opacity: 0, y: 10, scale: 0.96, duration: 0.45, stagger: 0.08 }, 0.16)
                    .from(contentCard, { opacity: 0, y: 16, duration: 0.55 }, 0.22);
            }

            window.resetSlide = playIn;
            playIn();
        });
    </script>
@endsection
