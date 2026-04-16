@extends('slider.simple-layout')

@section('style')
    @parent
    <style>
        .language-page {
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

        .sentence-card {
            position: relative;
            overflow: hidden;
        }

        .sentence-card::before,
        .sentence-card::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
            filter: blur(10px);
            opacity: 0.9;
        }

        .sentence-card::before {
            width: 110px;
            height: 110px;
            top: -34px;
            right: -22px;
        }

        .sentence-card::after {
            width: 84px;
            height: 84px;
            bottom: -34px;
            left: -18px;
            opacity: 0.55;
        }

        .sentence-card.sentence-card-orange::before {
            background: radial-gradient(circle, rgba(249, 115, 22, 0.24) 0%, rgba(249, 115, 22, 0) 72%);
        }

        .sentence-card.sentence-card-orange::after {
            background: radial-gradient(circle, rgba(251, 191, 36, 0.18) 0%, rgba(251, 191, 36, 0) 72%);
        }

        .sentence-card.sentence-card-indigo::before {
            background: radial-gradient(circle, rgba(79, 70, 229, 0.24) 0%, rgba(79, 70, 229, 0) 72%);
        }

        .sentence-card.sentence-card-indigo::after {
            background: radial-gradient(circle, rgba(96, 165, 250, 0.18) 0%, rgba(96, 165, 250, 0) 72%);
        }

        .play-hit { -webkit-tap-highlight-color: transparent; }
        .play-hit:focus-visible { outline: none; }

        .audio-btn {
            position: relative;
            overflow: hidden;
        }

        .audio-btn .static-icon {
            display: block;
        }

        .audio-btn .wave-wrap {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 2px;
            height: 16px;
        }

        .audio-btn .wave-bar {
            width: 3px;
            height: 8px;
            background: currentColor;
            border-radius: 999px;
        }

        .audio-btn.speaking .static-icon {
            display: none;
        }

        .audio-btn.speaking .wave-wrap {
            display: inline-flex;
        }

        .audio-btn.speaking .wave-bar:nth-child(1) {
            animation: waveBounce 0.7s ease-in-out infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(2) {
            animation: waveBounce 0.7s ease-in-out 0.12s infinite;
        }

        .audio-btn.speaking .wave-bar:nth-child(3) {
            animation: waveBounce 0.7s ease-in-out 0.24s infinite;
        }

        @keyframes waveBounce {
            0%, 100% {
                height: 7px;
                opacity: 0.7;
            }
            50% {
                height: 16px;
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    @php
        $playLabel = trim((string)($content['play_label'] ?? 'Play audio'));
        $footerText = trim((string)($content['footer_text'] ?? ''));
        $footerItems = is_array($content['footer_items'] ?? null) ? $content['footer_items'] : [];
        $footerBelowImage = (bool)($content['footer_below_image'] ?? false);
        $hideImage = (bool)($content['hide_image'] ?? false);
        $itemsGridClass = trim((string)($content['items_grid_class'] ?? 'grid grid-cols-1 gap-3 sm:gap-4 text-left'));

        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';

        $sentenceCardThemeClass = $isOrangeTheme
            ? 'sentence-card-orange'
            : 'sentence-card-indigo';

        $frameBorderOne = $isOrangeTheme
            ? 'border-amber-300/60'
            : 'border-indigo-300/60';

        $frameBorderTwo = $isOrangeTheme
            ? 'border-orange-300/40'
            : 'border-blue-300/40';

        $imageShellShadow = $isOrangeTheme
            ? 'shadow-orange-400/20 dark:shadow-orange-400/10'
            : 'shadow-indigo-500/20 dark:shadow-indigo-500/10';

        $imageBgClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-orange-100 via-amber-100 to-yellow-100 dark:from-slate-800 dark:via-orange-950/30 dark:to-slate-700'
            : 'bg-gradient-to-br from-indigo-100 via-blue-100 to-violet-100 dark:from-slate-800 dark:via-indigo-950/30 dark:to-slate-700';

        $glowOneClass = $isOrangeTheme
            ? 'bg-amber-300/30 dark:bg-amber-300/20'
            : 'bg-blue-300/30 dark:bg-blue-300/20';

        $glowTwoClass = $isOrangeTheme
            ? 'bg-orange-400/20 dark:bg-orange-400/20'
            : 'bg-violet-400/20 dark:bg-violet-400/20';

        $audioBtnClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-orange-500/20 focus-visible:ring-orange-300/40'
            : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-indigo-500/20 focus-visible:ring-indigo-300/40';
    @endphp

    <div class="language-page relative h-[100dvh] w-full overflow-hidden">
        <div id="slideViewport" class="slide-viewport">
            <div id="slideShell" class="slide-shell mx-auto w-full max-w-[1280px] px-4 py-6 sm:px-6 sm:py-8 lg:px-8 lg:py-6">
                <main class="w-full">
                    <section class="grid grid-cols-1 gap-8 lg:grid-cols-[minmax(320px,42%)_minmax(0,58%)] lg:gap-12 xl:gap-16 items-center">
                        <div class="w-full text-center lg:text-left">

                            @include('slider.components.title-subtitle')

                            @unless($hideImage)
                                <div class="w-full mx-auto max-w-[300px] sm:max-w-[420px] lg:max-w-[460px]">
                                    <div class="relative p-4">
                                        <div class="absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2 {{ $frameBorderOne }} pointer-events-none"></div>
                                        <div class="absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed {{ $frameBorderTwo }} pointer-events-none"></div>

                                        <div class="relative aspect-square w-full overflow-hidden rounded-[22px] shadow-2xl {{ $imageShellShadow }}">
                                            <div class="absolute inset-0 {{ $imageBgClass }}"></div>
                                            <div class="absolute -left-10 -top-10 h-36 w-36 rounded-full {{ $glowOneClass }} blur-2xl"></div>
                                            <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full {{ $glowTwoClass }} blur-2xl"></div>

                                            <img
                                                    src="{{ $content['image'] }}"
                                                    alt=""
                                                    class="relative z-10 block h-full w-full object-cover select-none"
                                                    loading="lazy"
                                                    draggable="false"
                                            />
                                        </div>
                                    </div>
                                </div>

                                @if(($footerText || count($footerItems)) && $footerBelowImage)
                                    <div class="mt-4 rounded-2xl border border-white/70 bg-white/70 p-4 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-5">
                                        @if($footerText)
                                            <p class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                                {!! $footerText !!}
                                            </p>
                                        @endif

                                        @if(count($footerItems))
                                            <ul class="mt-2 space-y-1 text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                                @foreach($footerItems as $footerItem)
                                                    <li>{!! $footerItem !!}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif
                            @endunless
                        </div>

                        <div class="w-full">
                            <section id="cards" class="w-full">
                                <div class="{{ $itemsGridClass }}">
                                    @foreach($content['items'] as $item)
                                        <article class="sentence-card {{ $sentenceCardThemeClass }} rounded-[20px] border border-white/70 bg-white/70 p-3 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:min-h-[76px] sm:p-3.5">
                                            <div class="relative z-10 flex items-center gap-3">
                                                <div class="shrink-0 text-xl leading-none sm:text-2xl">
                                                    {{ $item['emoji'] ?? '🎉' }}
                                                </div>

                                                <div class="min-w-0 flex-1">
                                                    <div class="text-base sm:text-lg font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 leading-tight break-words">
                                                        {!! $item['text'] !!}
                                                    </div>
                                                </div>

                                                <div class="shrink-0">
                                                    <button
                                                            type="button"
                                                            class="audio-btn speak-btn play-hit inline-flex h-9 w-9 items-center justify-center rounded-full {{ $audioBtnClass }} text-white backdrop-blur-md ring-1 ring-white/25 shadow-lg focus-visible:ring-4"
                                                            aria-label="{{ $playLabel }}"
                                                            data-sound="{{ $item['sound'] }}"
                                                    >
                                                        <svg class="static-icon w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>
                                                        <span class="wave-wrap" aria-hidden="true">
                                                            <span class="wave-bar"></span>
                                                            <span class="wave-bar"></span>
                                                            <span class="wave-bar"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </section>

                            @if(($footerText || count($footerItems)) && !$footerBelowImage)
                                <div class="mt-4 rounded-2xl border border-white/70 bg-white/70 p-4 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-5">
                                    @if($footerText)
                                        <p class="text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                            {!! $footerText !!}
                                        </p>
                                    @endif

                                    @if(count($footerItems))
                                        <ul class="mt-2 space-y-1 text-sm font-bold leading-[1.45] text-slate-600 dark:text-slate-200 sm:text-base">
                                            @foreach($footerItems as $footerItem)
                                                <li>{!! $footerItem !!}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection