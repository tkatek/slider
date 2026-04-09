@extends('slider.simple-layout')

@section('title', $content['page_title'])

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
                radial-gradient(120% 120% at 0% 0%, rgba(59,130,246,.08) 0%, transparent 46%),
                radial-gradient(120% 120% at 100% 0%, rgba(129,140,248,.08) 0%, transparent 44%),
                rgba(255,255,255,.82);
            padding:1.3rem 1.35rem;
            box-shadow:0 24px 55px -42px rgba(15,23,42,.22);
            backdrop-filter:blur(10px);
        }

        .dark .reading-card{
            border-color:rgba(71,85,105,.88);
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(59,130,246,.18) 0%, transparent 46%),
                radial-gradient(120% 120% at 100% 0%, rgba(129,140,248,.14) 0%, transparent 44%),
                rgba(15,23,42,.84);
        }

        .reading-card::before{
            content:"";
            position:absolute;
            inset:0 auto 0 0;
            width:6px;
            border-radius:inherit;
            background:linear-gradient(180deg, #38bdf8 0%, #6366f1 55%, #8b5cf6 100%);
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
            border:1px solid rgba(148,163,184,.22);
            background:rgba(255,255,255,.72);
            padding:.45rem .78rem;
            font-size:.7rem;
            font-weight:900;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:#475569;
            box-shadow:0 10px 24px rgba(15,23,42,.06);
        }

        .dark .reading-badge{
            border-color:rgba(148,163,184,.18);
            background:rgba(15,23,42,.64);
            color:#cbd5e1;
        }

        .reading-badge-dot{
            height:.5rem;
            width:.5rem;
            border-radius:999px;
            background:linear-gradient(135deg, #38bdf8 0%, #6366f1 100%);
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
            color:#4338ca;
        }

        .dark .reading-copy p:first-child::first-letter{
            color:#93c5fd;
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
    @endphp
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid items-center gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:gap-12">

                    {{-- LEFT --}}
                    <div class="space-y-6 text-center lg:text-left">
                        <div id="titleBlock" class="space-y-2">

                            @if($heading !== '')
                                <div class="lg:mx-0">
                                    <span class="inline-flex items-center justify-center rounded-full border border-indigo-200/80 bg-white px-4 py-2 text-sm sm:text-base font-semibold tracking-[-0.01em] text-indigo-700 shadow-sm ring-1 ring-indigo-100 dark:border-indigo-500/30 dark:bg-slate-800 dark:text-indigo-300 dark:ring-indigo-500/20">
                                        {{ $heading }}
                                    </span>
                                </div>
                            @endif
                            <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            </h1>

                            <p class="mx-auto max-w-xl font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200 lg:mx-0">
                                {{ $content['subtitle'] }}
                            </p>
                        </div>

                        <div class="flex flex-wrap justify-center gap-4 lg:justify-start">
                            @foreach($content['images'] as $index => $img)
                                <div class="aspect-square w-24 overflow-hidden sm:w-28 lg:w-32">
                                    <div class="h-full w-full overflow-hidden {{ $index === 0 ? 'blob-shape-1' : ($index === 1 ? 'blob-shape-2' : 'blob-shape-3') }}">
                                        <img
                                                src="{{ $img['src'] }}"
                                                alt="{{ $img['alt'] }}"
                                                class="h-full w-full object-cover"
                                        >
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
            const imageCards = Array.from(document.querySelectorAll(".blob-shape-1, .blob-shape-2, .blob-shape-3"));

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
