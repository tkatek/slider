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
    </style>
@endsection

@section('content')
    @php
        $heading = trim((string)($content['heading'] ?? ''));
        $showPointDots = $content['show_point_dots'] ?? true;
        $pointTextClass = trim((string)($content['point_text_class'] ?? 'text-base font-bold leading-relaxed text-slate-800 dark:text-slate-100 sm:text-lg'));
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

                            <p class="mx-auto max-w-2xl font-semibold tracking-[-0.01em] text-base sm:text-lg text-slate-700 dark:text-slate-200 lg:mx-0">
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
