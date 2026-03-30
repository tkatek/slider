@extends('slider.simple-layout')
@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? 'Lesson Objectives'));
    $title = trim((string)($content['title'] ?? 'Lesson Objectives'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $topBadge = trim((string)($content['top_badge'] ?? ''));
    $cardGridClass = trim((string)($content['cards_grid'] ?? 'grid-cols-1 sm:grid-cols-2'));
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

        .objective-card.card-indigo::before {
            background: radial-gradient(circle, rgba(99, 102, 241, 0.22) 0%, rgba(99, 102, 241, 0) 72%);
        }

        .objective-card.card-indigo::after {
            background: radial-gradient(circle, rgba(59, 130, 246, 0.16) 0%, rgba(59, 130, 246, 0) 72%);
        }

        .objective-card.card-emerald::before {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.22) 0%, rgba(16, 185, 129, 0) 72%);
        }

        .objective-card.card-emerald::after {
            background: radial-gradient(circle, rgba(20, 184, 166, 0.16) 0%, rgba(20, 184, 166, 0) 72%);
        }

        .objective-card.card-amber::before {
            background: radial-gradient(circle, rgba(245, 158, 11, 0.22) 0%, rgba(245, 158, 11, 0) 72%);
        }

        .objective-card.card-amber::after {
            background: radial-gradient(circle, rgba(249, 115, 22, 0.14) 0%, rgba(249, 115, 22, 0) 72%);
        }

        .objective-card.card-rose::before {
            background: radial-gradient(circle, rgba(244, 63, 94, 0.20) 0%, rgba(244, 63, 94, 0) 72%);
        }

        .objective-card.card-rose::after {
            background: radial-gradient(circle, rgba(236, 72, 153, 0.14) 0%, rgba(236, 72, 153, 0) 72%);
        }

        .objective-card.has-image .objective-image-box {
            aspect-ratio: 1 / 1;
            flex-shrink: 0;
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
    <div class="lo-page relative h-[100dvh] w-full overflow-hidden bg-[radial-gradient(980px_560px_at_8%_10%,rgba(103,63,231,.14),transparent_55%),radial-gradient(900px_560px_at_92%_14%,rgba(59,130,246,.12),transparent_56%),radial-gradient(880px_640px_at_50%_100%,rgba(16,185,129,.08),transparent_60%)]">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid place-items-center text-center gap-6 sm:gap-8">

                        <div id="heroBlock" class="flex flex-col justify-start text-center">
                            <div class="mx-auto w-full max-w-[42rem]">
                                <h1 class="mt-3 mx-auto max-w-4xl tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5 sm:mt-4 lg:mt-5">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{ $title }}
                                    </span>
                                </h1>

                                @if($subtitle !== '')
                                    <p class="mx-auto mt-3 max-w-2xl text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100 lg:mt-4 lg:max-w-[31rem]">
                                        {{ $subtitle }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div id="cardsWrap" class="w-full max-w-5xl text-left">
                            <div class="grid {{ $cardGridClass }} gap-3 sm:gap-4 lg:gap-4">
                                @foreach($outcomes as $outcome)
                                    @php
                                        $styles = ['card-indigo', 'card-emerald', 'card-amber', 'card-rose'];
                                        $style = $styles[($loop->iteration - 1) % count($styles)];

                                        $number = trim((string)($outcome['number'] ?? '')) !== ''
                                            ? trim((string)$outcome['number'])
                                            : str_pad((string)$loop->iteration, 2, '0', STR_PAD_LEFT);

                                        $badge = trim((string)($outcome['badge'] ?? '')) !== ''
                                            ? trim((string)$outcome['badge'])
                                            : 'from-indigo-500 to-blue-500';

                                        $itemTitle = trim((string)($outcome['title'] ?? ''));
                                        $description = trim((string)($outcome['description'] ?? ''));
                                        $image = trim((string)($outcome['image'] ?? ''));
                                        $hasImage = $image !== '';
                                    @endphp

                                    <article class="objective-card {{ $style }} {{ $hasImage ? 'has-image' : '' }} rounded-[24px] border border-white/70 bg-white/70 p-4 shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[148px] sm:p-5">
                                        @if($hasImage)
                                            <div class="objective-row relative z-10 grid items-center gap-4 sm:gap-5 md:grid-cols-[1fr_132px] lg:grid-cols-[1fr_148px]">
                                                <div class="min-w-0">
                                                    <div class="objective-chip inline-flex w-fit items-center rounded-full bg-gradient-to-r {{ $badge }} px-3 py-1 shadow-sm">
                                                        <span class="text-sm sm:text-base font-black leading-[1.45] text-white">
                                                            {{ $number }}
                                                        </span>
                                                    </div>

                                                    <p class="mt-3 text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                        {{ $itemTitle }}
                                                    </p>

                                                    @if($description !== '')
                                                        <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                            {{ $description }}
                                                        </p>
                                                    @endif
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
                                                <div class="objective-chip inline-flex w-fit items-center rounded-full bg-gradient-to-r {{ $badge }} px-3 py-1 shadow-sm">
                                                    <span class="text-sm sm:text-base font-black leading-[1.45] text-white">
                                                        {{ $number }}
                                                    </span>
                                                </div>

                                                <p class="mt-3 text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                    {{ $itemTitle }}
                                                </p>

                                                @if($description !== '')
                                                    <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                        {{ $description }}
                                                    </p>
                                                @endif
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
