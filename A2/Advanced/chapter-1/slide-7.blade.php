<?php
$content = [
    'title'    => 'New Language',
    'subtitle' => '',

    // Set this to true when you want the no-image version
    'hide_image' => true,

    // Keep image here if you want to switch back later by setting hide_image to false
    'image'    => materialAsset('slider/A2/Advanced/chapter-1/img/slide4.webp'),

    // This will be used for the no-image version too
    'items_grid_class' => 'grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4',

    'items' => [
        [
            'emoji' => '💼',
            'text'  => 'What’s your <span class="font-black text-rose-700 dark:text-rose-300">role</span> in the company?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/1.mp3'),
        ],
        [
            'emoji' => '👔',
            'text'  => 'What do you <span class="font-black text-rose-700 dark:text-rose-300">do for a living</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/2.mp3'),
        ],
        [
            'emoji' => '✅',
            'text'  => 'What are you <span class="font-black text-rose-700 dark:text-rose-300">responsible for</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/3.mp3'),
        ],
        [
            'emoji' => '🎨',
            'text'  => 'I’m <span class="font-black text-rose-700 dark:text-rose-300">the head of</span> design.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/4.mp3'),
        ],
        [
            'emoji' => '🧑‍🎨',
            'text'  => 'I <span class="font-black text-rose-700 dark:text-rose-300">manage</span> artists and graphic designers.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/5.mp3'),
        ],
        [
            'emoji' => '🤝',
            'text'  => 'What about you?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/6.mp3'),
        ],
        [
            'emoji' => '🎬',
            'text'  => 'I’m a content producer.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/7.mp3'),
        ],
        [
            'emoji' => '✍️',
            'text'  => 'I’m responsible for writing.',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/8.mp3'),
        ],
        [
            'emoji' => '❓',
            'text'  => 'What <span class="font-black text-rose-700 dark:text-rose-300">do you do</span>?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/9.mp3'),
        ],
        [
            'emoji' => '❤️',
            'text'  => 'Do you like your job?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/10.mp3'),
        ],
        [
            'emoji' => '😍',
            'text'  => 'Yes, I love it!',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/11.mp3'),
        ],
        [
            'emoji' => '⭐',
            'text'  => 'What’s the best part of your job?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/12.mp3'),
        ],
        [
            'emoji' => '👥',
            'text'  => 'Do you like the people you work with?',
            'sound' => materialAsset('slider/A2/Advanced/chapter-1/audios/slide7/13.mp3'),
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('script')
    <script>
        (function () {
            const KEY = "__BEC_GLOBAL_SLIDER_AUDIO__";

            if (!window[KEY]) {
                const audio = new Audio();
                audio.preload = "auto";
                audio.crossOrigin = "anonymous";

                let activeButton = null;

                function setSpeaking(button, isSpeaking) {
                    if (!button) return;

                    const icon = button.querySelector(".static-icon");
                    const wave = button.querySelector(".wave-wrap");

                    if (icon) {
                        icon.classList.toggle("hidden", isSpeaking);
                        icon.classList.toggle("block", !isSpeaking);
                    }

                    if (wave) {
                        wave.classList.toggle("hidden", !isSpeaking);
                        wave.classList.toggle("inline-flex", isSpeaking);
                    }
                }

                function clearActive() {
                    if (activeButton) {
                        setSpeaking(activeButton, false);
                        activeButton = null;
                    }
                }

                function stop() {
                    try {
                        audio.pause();
                        audio.currentTime = 0;
                    } catch (e) {}

                    clearActive();
                }

                function play(src, button) {
                    if (!src) return;

                    const resolved = new URL(src, window.location.href).toString();

                    if (activeButton === button && !audio.paused && audio.src === resolved) {
                        stop();
                        return;
                    }

                    stop();

                    try {
                        if (audio.src !== resolved) audio.src = resolved;

                        audio.currentTime = 0;
                        activeButton = button;
                        setSpeaking(activeButton, true);

                        const promise = audio.play();

                        if (promise && typeof promise.catch === "function") {
                            promise.catch(() => stop());
                        }
                    } catch (e) {
                        stop();
                    }
                }

                audio.addEventListener("ended", stop);

                audio.addEventListener("pause", () => {
                    if (audio.currentTime === 0 || audio.ended) {
                        clearActive();
                    }
                });

                audio.addEventListener("error", stop);

                window[KEY] = { audio, play, stop };
            }

            window.stopSlideAudio = function () {
                window[KEY].stop();
            };

            if (!window.__BEC_AUDIO_DELEGATE__) {
                window.__BEC_AUDIO_DELEGATE__ = true;

                document.addEventListener("click", (event) => {
                    const button = event.target.closest(".audio-btn");
                    if (!button) return;

                    event.preventDefault();

                    const src = button.dataset.sound || button.getAttribute("data-sound") || "";
                    window[KEY].play(src, button);
                });
            }
        })();

        window.resetSlide = function () {};
    </script>
@endsection

@section('content')
    @php
        $playLabel = trim((string)($content['play_label'] ?? 'Play audio'));
        $footerText = trim((string)($content['footer_text'] ?? ''));
        $footerItems = is_array($content['footer_items'] ?? null) ? $content['footer_items'] : [];
        $footerBelowImage = (bool)($content['footer_below_image'] ?? false);

        $hideImage = (bool)($content['hide_image'] ?? false);
        $hasImage = !$hideImage && !empty($content['image']);

        $imageAspectRatio = trim((string)($content['image_aspect_ratio'] ?? '1 / 1'));

        $itemsGridClass = trim((string)($content['items_grid_class'] ?? (
            $hasImage
                ? 'grid grid-cols-1 gap-2.5 sm:gap-3 lg:gap-3.5 text-left'
                : 'grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-left'
        )));

        $isOrangeTheme = ($theme['name'] ?? null) === 'orange';

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

        $cardGlowOneClass = $isOrangeTheme
            ? 'bg-orange-400/20'
            : 'bg-indigo-500/20';

        $cardGlowTwoClass = $isOrangeTheme
            ? 'bg-amber-300/20'
            : 'bg-blue-400/20';

        $audioBtnClass = $isOrangeTheme
            ? 'bg-gradient-to-br from-amber-400 via-orange-400 to-orange-500 shadow-orange-500/20 focus-visible:ring-orange-300/40'
            : 'bg-gradient-to-br from-indigo-500 via-blue-500 to-violet-500 shadow-indigo-500/20 focus-visible:ring-indigo-300/40';

        $sectionClass = $hasImage
            ? 'grid grid-cols-1 items-center gap-6 lg:grid-cols-[minmax(0,52%)_minmax(320px,42%)] lg:gap-10 xl:gap-12'
            : 'mx-auto grid w-full max-w-5xl grid-cols-1 items-center gap-6';

        $textColumnClass = $hasImage
            ? 'w-full text-center lg:text-left'
            : 'mx-auto w-full text-center';
    @endphp

    <div class="relative h-[100dvh] w-full overflow-hidden font-sans">
        <div id="slideViewport" class="h-[100dvh] overflow-x-hidden overflow-y-auto">
            <div
                    id="slideShell"
                    class="mx-auto flex min-h-[100dvh] w-full max-w-[1280px] items-center px-4 py-5 sm:px-6 sm:py-7 lg:px-8 lg:py-6"
            >
                <main class="w-full">
                    <section class="{{ $sectionClass }}">

                        <div class="{{ $textColumnClass }}">
                            @include('slider.components.title-subtitle')

                            <section id="cards" class="mt-5 w-full sm:mt-6 lg:mt-7">
                                <div class="{{ $itemsGridClass }}">
                                    @foreach($content['items'] as $item)
                                        <article class="relative overflow-hidden rounded-2xl border border-white/70 bg-white/70 p-3 text-left shadow-[0_12px_28px_-22px_rgba(15,23,42,0.18)] backdrop-blur-md transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_18px_36px_-24px_rgba(15,23,42,0.24)] dark:border-white/10 dark:bg-white/5 sm:p-3.5 lg:p-4">
                                            <div class="pointer-events-none absolute -right-5 -top-7 h-20 w-20 rounded-full {{ $cardGlowOneClass }} blur-xl"></div>
                                            <div class="pointer-events-none absolute -bottom-7 -left-5 h-16 w-16 rounded-full {{ $cardGlowTwoClass }} blur-xl"></div>

                                            <div class="relative z-10 flex items-center gap-3 sm:gap-3.5 lg:gap-4">
                                                <div class="shrink-0 text-2xl leading-none sm:text-3xl lg:text-[2rem]">
                                                    {{ $item['emoji'] ?? '🎉' }}
                                                </div>

                                                <div class="min-w-0 flex-1">
                                                    <div class="break-words text-base font-extrabold leading-snug tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-lg lg:text-xl">
                                                        {!! $item['text'] !!}
                                                    </div>
                                                </div>

                                                @if(!empty($item['sound']))
                                                    <div class="shrink-0">
                                                        <button
                                                                type="button"
                                                                class="audio-btn inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-full {{ $audioBtnClass }} text-white shadow-md ring-1 ring-white/25 backdrop-blur-md [-webkit-tap-highlight-color:transparent] focus-visible:outline-none focus-visible:ring-4 sm:h-10 sm:w-10"
                                                                aria-label="{{ $playLabel }}"
                                                                data-sound="{{ $item['sound'] }}"
                                                        >
                                                            <svg class="static-icon block h-4 w-4 sm:h-[18px] sm:w-[18px]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                            </svg>

                                                            <span class="wave-wrap hidden h-4 items-center justify-center gap-[2px]" aria-hidden="true">
                                                                <span class="h-1.5 w-[2.5px] animate-pulse rounded-full bg-current"></span>
                                                                <span class="h-3.5 w-[2.5px] animate-pulse rounded-full bg-current [animation-delay:120ms]"></span>
                                                                <span class="h-2 w-[2.5px] animate-pulse rounded-full bg-current [animation-delay:240ms]"></span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                @endif
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

                        @if($hasImage)
                            <div class="w-full">
                                <div class="mx-auto w-full max-w-[300px] sm:max-w-[400px] lg:max-w-[430px] xl:max-w-[460px]">
                                    <div class="relative p-3 sm:p-4">
                                        <div class="pointer-events-none absolute inset-0 -translate-x-3 translate-y-3 rounded-[24px] border-2 {{ $frameBorderOne }}"></div>
                                        <div class="pointer-events-none absolute inset-0 translate-x-3 -translate-y-3 rounded-[24px] border border-dashed {{ $frameBorderTwo }}"></div>

                                        <div
                                                class="relative w-full overflow-hidden rounded-[22px] shadow-2xl {{ $imageShellShadow }}"
                                                style="aspect-ratio: {{ $imageAspectRatio }};"
                                        >
                                            <div class="absolute inset-0 {{ $imageBgClass }}"></div>
                                            <div class="absolute -left-10 -top-10 h-36 w-36 rounded-full {{ $glowOneClass }} blur-2xl"></div>
                                            <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full {{ $glowTwoClass }} blur-2xl"></div>

                                            <img
                                                    src="{{ $content['image'] }}"
                                                    alt=""
                                                    class="relative z-10 block h-full w-full select-none object-cover"
                                                    loading="lazy"
                                                    draggable="false"
                                            />
                                        </div>
                                    </div>
                                </div>

                                @if(($footerText || count($footerItems)) && $footerBelowImage)
                                    <div class="mx-auto mt-4 max-w-[460px] rounded-2xl border border-white/70 bg-white/70 p-4 text-left shadow-[0_16px_34px_-24px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-5">
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
                        @endif

                    </section>
                </main>
            </div>
        </div>
    </div>
@endsection