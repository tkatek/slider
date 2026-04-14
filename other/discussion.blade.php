@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $title = trim((string)($content['title'] ?? 'Discussion'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? '');
@endphp

@section('style')
    @parent
    <style>
        .discussion-page {
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

    </style>
@endsection

@section("content")
    <div class="discussion-page relative h-[100dvh] w-full overflow-hidden">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="discussion-layout grid grid-cols-1 gap-8 sm:grid-cols-[minmax(0,58%)_minmax(220px,42%)] lg:grid-cols-[minmax(0,58%)_minmax(320px,42%)] sm:gap-8 lg:gap-12 xl:gap-16 items-center">
                        <div class="discussion-copy w-full text-center sm:text-left">
                            @php
                                $titleWrapClass = 'discussion-title-wrap header-spacing my-0 mb-6 space-y-3 px-0 text-center sm:text-left';
                                $titleHeadingClass = 'mb-2 text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl xl:text-6xl';
                                $subtitleClass = 'discussion-subtitle mx-auto max-w-2xl text-base font-bold leading-[1.45] text-stone-800 dark:text-orange-100 sm:mx-0 sm:text-lg lg:text-xl';
                            @endphp
                            @include('slider.components.title-subtitle')

                            <div class="grid grid-cols-1 gap-3 sm:gap-4">
                                @foreach($cards as $index => $card)
                                    @php
                                        $styles = ['card-orange', 'card-amber', 'card-tangerine'];
                                        $style = $styles[$index % count($styles)];
                                        $emoji = trim((string)($card['emoji'] ?? ''));
                                        $label = trim((string)($card['label'] ?? ''));
                                        $text = trim((string)($card['text'] ?? ''));
                                    @endphp

                                    <article class="objective-card {{ $style }} rounded-[24px] border border-white/70 bg-white/70 p-4 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[100px] sm:p-5">
                                        <div class="relative z-10 flex h-full flex-col justify-center">
                                            <div class="objective-heading">
                                                <div class="objective-chip inline-flex w-fit items-center">
                                                    <span class="text-2xl sm:text-3xl leading-none">
                                                        {{ $emoji }}
                                                    </span>
                                                </div>

                                                <div class="objective-text">
                                                    @if($label !== '')
                                                        <span class="mb-1 block text-[0.65rem] font-black uppercase tracking-[0.22em] text-orange-500 dark:text-orange-300">
                                                            {{ $label }}
                                                        </span>
                                                    @endif

                                                    @if($text !== '')
                                                        <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                                            {!! $text !!}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                        <div class="discussion-image-wrap w-full mx-auto max-w-[300px] sm:max-w-[420px] lg:max-w-[460px]">
                            <div class="relative p-4">
                                <div class="absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2 border-amber-300/60 pointer-events-none"></div>
                                <div class="absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed border-orange-300/40 pointer-events-none"></div>

                                <div class="relative aspect-square w-full overflow-hidden rounded-[22px] shadow-2xl shadow-orange-400/20 dark:shadow-orange-400/10">
                                    <div class="absolute inset-0 bg-gradient-to-br from-orange-100 via-amber-100 to-yellow-100 dark:from-slate-800 dark:via-orange-950/30 dark:to-slate-700"></div>
                                    <div class="absolute -left-10 -top-10 h-36 w-36 rounded-full bg-amber-300/30 blur-2xl dark:bg-amber-300/20"></div>
                                    <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-orange-400/20 blur-2xl dark:bg-orange-400/20"></div>

                                    <img
                                            src="{{ $image }}"
                                            alt="{{ $imageAlt }}"
                                            class="relative z-10 block h-full w-full object-cover select-none"
                                            loading="lazy"
                                            draggable="false"
                                    >
                                </div>
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
                resizeRaf = requestAnimationFrame(syncLayoutMode);
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
