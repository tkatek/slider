@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $title = trim((string)($content['title'] ?? 'Discussion'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $cards = is_array($content['cards'] ?? null) ? $content['cards'] : [];
    $supportItems = is_array($content['support_items'] ?? null)
        ? array_values($content['support_items'])
        : (is_array($content['practice_phrases'] ?? null) ? array_values($content['practice_phrases']) : []);
    $supportTitle = trim((string)($content['support_title'] ?? ($content['practice_phrases_title'] ?? 'Useful language')));
    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? '');
@endphp

@section('style')
    @parent
    <style>
        .discussion-page {
            font-family: "Plus Jakarta Sans", sans-serif;
            --discussion-card-glow-one: rgba(99, 102, 241, 0.24);
            --discussion-card-glow-two: rgba(59, 130, 246, 0.18);
            --discussion-card-glow-three: rgba(124, 58, 237, 0.22);
            --discussion-card-glow-soft: rgba(96, 165, 250, 0.16);
            --discussion-frame-one: rgba(129, 140, 248, 0.62);
            --discussion-frame-two: rgba(59, 130, 246, 0.42);
            --discussion-image-bg: linear-gradient(135deg, rgba(224, 231, 255, 0.9), rgba(219, 234, 254, 0.86), rgba(237, 233, 254, 0.86));
            --discussion-image-glow-one: rgba(96, 165, 250, 0.30);
            --discussion-image-glow-two: rgba(139, 92, 246, 0.20);
            --discussion-shadow: rgba(99, 102, 241, 0.20);
        }

        .slide-theme-orange .discussion-page {
            --discussion-card-glow-one: rgba(249, 115, 22, 0.24);
            --discussion-card-glow-two: rgba(251, 146, 60, 0.18);
            --discussion-card-glow-three: rgba(245, 158, 11, 0.24);
            --discussion-card-glow-soft: rgba(252, 211, 77, 0.18);
            --discussion-frame-one: rgba(251, 191, 36, 0.62);
            --discussion-frame-two: rgba(249, 115, 22, 0.42);
            --discussion-image-bg: linear-gradient(135deg, rgba(255, 237, 213, 0.92), rgba(254, 243, 199, 0.88), rgba(254, 249, 195, 0.86));
            --discussion-image-glow-one: rgba(252, 211, 77, 0.32);
            --discussion-image-glow-two: rgba(249, 115, 22, 0.22);
            --discussion-shadow: rgba(249, 115, 22, 0.20);
        }

        .slide-theme-green .discussion-page {
            --discussion-card-glow-one: rgba(34, 197, 94, 0.22);
            --discussion-card-glow-two: rgba(16, 185, 129, 0.18);
            --discussion-card-glow-three: rgba(132, 204, 22, 0.22);
            --discussion-card-glow-soft: rgba(110, 231, 183, 0.16);
            --discussion-frame-one: rgba(52, 211, 153, 0.58);
            --discussion-frame-two: rgba(34, 197, 94, 0.40);
            --discussion-image-bg: linear-gradient(135deg, rgba(220, 252, 231, 0.90), rgba(209, 250, 229, 0.86), rgba(236, 252, 203, 0.82));
            --discussion-image-glow-one: rgba(74, 222, 128, 0.26);
            --discussion-image-glow-two: rgba(16, 185, 129, 0.20);
            --discussion-shadow: rgba(34, 197, 94, 0.18);
        }

        .dark .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(49, 46, 129, 0.30), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(99, 102, 241, 0.12);
        }

        .dark .slide-theme-orange .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(154, 52, 18, 0.30), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(251, 146, 60, 0.12);
        }

        .dark .slide-theme-green .discussion-page {
            --discussion-image-bg: linear-gradient(135deg, rgba(30, 41, 59, 0.95), rgba(6, 78, 59, 0.34), rgba(15, 23, 42, 0.95));
            --discussion-shadow: rgba(16, 185, 129, 0.12);
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

        .objective-card.card-theme-one::before {
            background: radial-gradient(circle, var(--discussion-card-glow-one) 0%, transparent 72%);
        }

        .objective-card.card-theme-one::after {
            background: radial-gradient(circle, var(--discussion-card-glow-two) 0%, transparent 72%);
        }

        .objective-card.card-theme-two::before {
            background: radial-gradient(circle, var(--discussion-card-glow-three) 0%, transparent 72%);
        }

        .objective-card.card-theme-two::after {
            background: radial-gradient(circle, var(--discussion-card-glow-soft) 0%, transparent 72%);
        }

        .objective-card.card-theme-three::before {
            background: radial-gradient(circle, var(--discussion-card-glow-two) 0%, transparent 72%);
        }

        .objective-card.card-theme-three::after {
            background: radial-gradient(circle, var(--discussion-card-glow-one) 0%, transparent 72%);
        }

        .discussion-frame-one {
            border-color: var(--discussion-frame-one);
        }

        .discussion-frame-two {
            border-color: var(--discussion-frame-two);
        }

        .discussion-image-shell {
            box-shadow: 0 25px 50px -12px var(--discussion-shadow);
        }

        .discussion-image-bg {
            background: var(--discussion-image-bg);
        }

        .discussion-glow-one {
            background: var(--discussion-image-glow-one);
        }

        .discussion-glow-two {
            background: var(--discussion-image-glow-two);
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
    @php
        $primaryGradient = trim((string) ($theme['primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
        $buttonGradient = trim((string) ($theme['button_primary_color'] ?? 'bg-[image:var(--top-bar-gradient)]'));
        $labelClass = 'mb-1 block bg-clip-text text-[0.65rem] font-black uppercase tracking-[0.22em] text-transparent ' . $primaryGradient;
        $cardStyles = ['card-theme-one', 'card-theme-two', 'card-theme-three'];
        $practiceDotClass = $buttonGradient;

    @endphp
    <div class="discussion-page relative h-[100dvh] w-full overflow-hidden">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="discussion-layout grid grid-cols-1 gap-8 sm:grid-cols-[minmax(0,58%)_minmax(220px,42%)] lg:grid-cols-[minmax(0,58%)_minmax(320px,42%)] sm:gap-8 lg:gap-12 xl:gap-16 items-center">
                        <div class="discussion-copy w-full text-center sm:text-left">
                            @php
                                $titleWrapClass = 'discussion-title-wrap header-spacing my-0 mb-6 space-y-3 px-0 text-center sm:text-left';
                                $titleHeadingClass = 'mb-2 text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl xl:text-6xl';
                            @endphp
                            @include('slider.components.title-subtitle')

                            @if($supportItems !== [])
                                <div class="mb-3 rounded-[18px] border border-slate-200/80 bg-white/70 p-3 text-left shadow-[0_14px_28px_-24px_rgba(15,23,42,0.24)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-4">
                                    @if($supportTitle !== '')
                                        <p class="bg-clip-text text-[0.62rem] font-black uppercase tracking-[0.2em] text-transparent {{ $primaryGradient }}">
                                            {{ $supportTitle }}
                                        </p>
                                    @endif

                                    <ul class="mt-2 space-y-1.5">
                                        @foreach($supportItems as $phrase)
                                            @php
                                                $phraseText = trim((string) $phrase);
                                            @endphp

                                            @if($phraseText !== '')
                                                <li class="flex items-start gap-2.5">
                                                    <span class="mt-[0.42rem] h-2 w-2 shrink-0 rounded-full shadow-sm {{ $practiceDotClass }}"></span>
                                                    <span class="text-sm font-extrabold leading-[1.3] text-slate-700 dark:text-slate-200 sm:text-[0.95rem]">
                                                        {!! $phraseText !!}
                                                    </span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 gap-3 sm:gap-4">
                                @foreach($cards as $index => $card)
                                    @php
                                        $style = $cardStyles[$index % count($cardStyles)];
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
                                                        <span class="{{ $labelClass }}">
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
                                <div class="discussion-frame-one pointer-events-none absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2"></div>
                                <div class="discussion-frame-two pointer-events-none absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed"></div>

                                <div class="discussion-image-shell relative aspect-square w-full overflow-hidden rounded-[22px]">
                                    <div class="discussion-image-bg absolute inset-0"></div>
                                    <div class="discussion-glow-one absolute -left-10 -top-10 h-36 w-36 rounded-full blur-2xl"></div>
                                    <div class="discussion-glow-two absolute -right-10 -bottom-10 h-40 w-40 rounded-full blur-2xl"></div>

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
