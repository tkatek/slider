@extends('slider.simple-layout')
@php
    $content = is_array($content ?? null) ? $content : [];
    $pageTitle = trim((string)($content['page_title'] ?? 'Lesson Objectives'));
    $title = trim((string)($content['title'] ?? 'Lesson Objectives'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $topBadge = trim((string)($content['top_badge'] ?? ''));
    $cardGridClass = trim((string)($content['cards_grid'] ?? 'grid-cols-1'));
    $outcomes = is_array($content['outcomes'] ?? null) ? $content['outcomes'] : [];
@endphp
@section('style')
    @parent
    <style>
        .lo-page {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .slide-viewport {
            height: 100dvh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .slide-shell {
            min-height: 100dvh;
            display: flex;
            align-items: center;
            transition: padding 0.2s ease, align-items 0.2s ease;
        }

        .slide-shell.is-scrollable {
            align-items: flex-start;
        }

        .objective-card {
            position: relative;
            overflow: hidden;
        }

        .objective-card::before,
        .objective-card::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .objective-card::before {
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
        }

        .objective-card::after {
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: 0.55;
        }

        .objective-card.card-orange::before {
            background: radial-gradient(circle, rgba(249, 115, 22, 0.24) 0%, rgba(249, 115, 22, 0) 72%);
        }

        .objective-card.card-orange::after {
            background: radial-gradient(circle, rgba(251, 146, 60, 0.18) 0%, rgba(251, 146, 60, 0) 72%);
        }

        .objective-card.card-amber::before {
            background: radial-gradient(circle, rgba(245, 158, 11, 0.24) 0%, rgba(245, 158, 11, 0) 72%);
        }

        .objective-card.card-amber::after {
            background: radial-gradient(circle, rgba(252, 211, 77, 0.18) 0%, rgba(252, 211, 77, 0) 72%);
        }

        .objective-card.card-tangerine::before {
            background: radial-gradient(circle, rgba(234, 88, 12, 0.22) 0%, rgba(234, 88, 12, 0) 72%);
        }

        .objective-card.card-tangerine::after {
            background: radial-gradient(circle, rgba(249, 115, 22, 0.16) 0%, rgba(249, 115, 22, 0) 72%);
        }

        .objective-card.card-indigo::before {
            background: radial-gradient(circle, rgba(79, 70, 229, 0.24) 0%, rgba(79, 70, 229, 0) 72%);
        }

        .objective-card.card-indigo::after {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.18) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .objective-card.card-sky::before {
            background: radial-gradient(circle, rgba(37, 99, 235, 0.22) 0%, rgba(37, 99, 235, 0) 72%);
        }

        .objective-card.card-sky::after {
            background: radial-gradient(circle, rgba(96, 165, 250, 0.16) 0%, rgba(96, 165, 250, 0) 72%);
        }

        .objective-card.card-violet::before {
            background: radial-gradient(circle, rgba(124, 58, 237, 0.22) 0%, rgba(124, 58, 237, 0) 72%);
        }

        .objective-card.card-violet::after {
            background: radial-gradient(circle, rgba(139, 92, 246, 0.16) 0%, rgba(139, 92, 246, 0) 72%);
        }

        .objective-card.has-image .objective-image-box {
            aspect-ratio: 1 / 1;
            flex-shrink: 0;
        }

        .objective-heading {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .objective-heading .objective-chip {
            flex-shrink: 0;
        }

        .objective-heading .objective-text {
            min-width: 0;
        }

        @media (max-width: 639px) {
            .objective-card.has-image .objective-row {
                grid-template-columns: minmax(0, 1fr) 88px;
                align-items: center;
            }
        }

    </style>
@endsection

@section('content')
    <div class="lo-page relative h-[100dvh] w-full overflow-hidden">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid grid-cols-1 lg:grid-cols-[minmax(0,40%)_minmax(0,60%)] gap-8 lg:gap-12 items-center">

                        {{-- Left column: title & subtitle --}}
                        <div class="text-left flex flex-col gap-4">
                            @php
                                $titleWrapClass = 'header-spacing my-0 space-y-5 px-0 text-left xl:mb-[160px]';
                                $titleHeadingClass = 'mb-3 text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl xl:text-7xl';
                                $subtitleClass = 'max-w-xl text-lg font-bold leading-[1.45] text-stone-800 dark:text-orange-100 sm:text-xl lg:text-2xl';
                            @endphp
                            @include('slider.components.title-subtitle')
                        </div>

                        {{-- Right column: outcome cards stacked --}}
                        <div id="cardsWrap" class="w-full text-left">
                            <div class="grid grid-cols-1 gap-3 sm:gap-4">
                                @foreach($outcomes as $outcome)
                                    @php
                                        $styles = ($theme['name'] ?? null) === 'orange'
                                            ? ['card-orange', 'card-amber', 'card-tangerine']
                                            : ['card-indigo', 'card-sky', 'card-violet'];
                                        $style = $styles[($loop->iteration - 1) % count($styles)];

                                        $itemTitle = trim((string)($outcome['title'] ?? ''));
                                        $emoji = trim((string)($outcome['emoji'] ?? ''));
                                        $image = trim((string)($outcome['image'] ?? ''));
                                        $hasImage = $image !== '';
                                    @endphp

                                    <article class="objective-card {{ $style }} {{ $hasImage ? 'has-image' : '' }} rounded-[24px] border border-white/70 bg-white/70 p-4 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[100px] sm:p-5">
                                        @if($hasImage)
                                            <div class="objective-row relative z-10 grid items-center gap-4 sm:gap-5 md:grid-cols-[1fr_132px] lg:grid-cols-[1fr_148px]">
                                                <div class="min-w-0">
                                                    <div class="objective-heading">
                                                        @if($emoji !== '')
                                                            <div class="objective-chip inline-flex w-fit items-center">
                                                                <span class="text-2xl sm:text-3xl leading-none">
                                                                    {{ $emoji }}
                                                                </span>
                                                            </div>
                                                        @endif

                                                        <div class="objective-text">
                                                            <p class="objective-title text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                                {{ $itemTitle }}
                                                            </p>

                                                            @if($outcome['description'] !== '')
                                                                <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                                    {!! $outcome['description'] !!}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="objective-image-box w-full rounded-2xl border border-slate-200 bg-white/90 p-2 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                                                    <img
                                                            src="{{ $image }}"
                                                            alt="{{ $itemTitle }}"
                                                            class="h-full w-full rounded-xl object-cover"
                                                            loading="lazy"
                                                            draggable="false"
                                                    >
                                                </div>
                                            </div>
                                        @else
                                            <div class="relative z-10 flex h-full flex-col justify-center">
                                                <div class="objective-heading">
                                                    @if($emoji !== '')
                                                        <div class="objective-chip inline-flex w-fit items-center">
                                                            <span class="text-2xl sm:text-3xl leading-none">
                                                                {{ $emoji }}
                                                            </span>
                                                        </div>
                                                    @endif

                                                    <div class="objective-text">
                                                        <p class="objective-title text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                            {{ $itemTitle }}
                                                        </p>

                                                        @if($outcome['description'] !== '')
                                                            <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                                {!! $outcome['description'] !!}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </article>
                                @endforeach
                            </div>
                        </div>

                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const heroBlock = document.getElementById("heroBlock");
            const cards = document.querySelectorAll(".objective-card");
            const viewport = document.getElementById("slideViewport");
            const shell = document.getElementById("slideShell");

            function syncLayoutMode() {
                if (!viewport || !shell) return;

                shell.classList.remove("is-scrollable");

                requestAnimationFrame(() => {
                    const needsScroll = viewport.scrollHeight > viewport.clientHeight + 2;
                    shell.classList.toggle("is-scrollable", needsScroll);
                });
            }

            let resizeRaf = null;

            function handleResize() {
                if (resizeRaf) cancelAnimationFrame(resizeRaf);
                resizeRaf = requestAnimationFrame(() => {
                    syncLayoutMode();
                });
            }

            window.addEventListener("resize", handleResize);
            window.addEventListener("load", syncLayoutMode);

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(syncLayoutMode);
            }

            window.resetSlide = () => {
                syncLayoutMode();
            };

            syncLayoutMode();
        });
    </script>
@endsection
