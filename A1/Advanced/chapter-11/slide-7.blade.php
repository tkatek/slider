<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => 'Useful sentences for conversations at the petrol station.',
    'items'      => [
        [
            'emoji' => '⛽',
            'text'  => 'Now I have to fill the tank at <span class="hl-warm font-black">the nearest</span> fuel station.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Now-have.mpeg'),
        ],
        [
            'emoji' => '☀️',
            'text'  => 'It\'s a <span class="hl-cool font-black">fine day</span>, isn\'t it? - <span class="hl-cool font-black">Yes, indeed it is</span>.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-a-fine-day.mpeg'),
        ],
        [
            'emoji' => '💬',
            'text'  => '<span class="hl-cool font-black">How may I assist you</span> today?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/How-may.mpeg'),
        ],
        [
            'emoji' => '🚗',
            'text'  => '<span class="hl-cool font-black">I need</span> a full tank of petrol for my car, please.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/I-need-full.mpeg'),
        ],
        [
            'emoji' => '❓',
            'text'  => '<span class="hl-cool font-black">Could you</span> tell me the difference?',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Could-you-tell.mpeg'),
        ],
        [
            'emoji' => '💵',
            'text'  => 'It\'s a bit <span class="hl-warm font-black">more expensive than</span> regular petrol.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-s-a-bit-more.mpeg'),
        ],
        [
            'emoji' => '✅',
            'text'  => '<span class="hl-cool font-black">It\'s worth</span> the cost.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/It-s-worth.mpeg'),
        ],
        [
            'emoji' => '🧾',
            'text'  => 'The total for the petrol <span class="hl-cool font-black">comes to</span> $45.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/The-total.mpeg'),
        ],
        [
            'emoji' => '🤝',
            'text'  => 'Here you go.',
            'sound' => materialAsset('slider/A1/Advanced/chapter-11/audios/slide7/Here-you-go.mpeg'),
        ],
    ],
];
?>
@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .hl-cool {
            color: #1d4ed8;
        }

        .dark .hl-cool {
            color: #93c5fd;
        }

        .hl-warm {
            color: #b45309;
        }

        .dark .hl-warm {
            color: #fbbf24;
        }

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
    <main class="w-full overflow-hidden">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-start pt-8 pb-6 px-4 sm:px-6 sm:py-6 lg:items-center lg:px-8">
            <section class="w-full">
                <div class="grid place-items-center gap-5 text-center sm:gap-6">
                    <div class="space-y-2 sm:space-y-3">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        @if(!empty($content['subtitle']))
                            <p class="mx-auto max-w-3xl text-sm font-semibold tracking-[-0.01em] text-slate-700 dark:text-slate-200 sm:text-base lg:text-lg">
                                {{ $content['subtitle'] }}
                            </p>
                        @endif
                    </div>

                    <section class="w-full max-w-6xl">
                        <div class="grid grid-cols-1 gap-3 text-left md:grid-cols-2">
                            @foreach($content['items'] as $item)
                                <article class="rounded-[24px] border border-slate-200/70 bg-white/80 p-3.5 shadow-[0_14px_44px_-26px_rgba(15,23,42,0.38)] backdrop-blur-xl dark:border-slate-700/35 dark:bg-slate-950/40 sm:p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-indigo-500/25 bg-indigo-500/10 text-lg text-indigo-700 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                            <span class="leading-none">{{ $item['emoji'] ?? 'ðŸŽ‰' }}</span>
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <div class="text-base font-black leading-[1.3] tracking-[-0.02em] text-slate-900 dark:text-slate-50 sm:text-lg">
                                                {!! $item['text'] !!}
                                            </div>
                                        </div>

                                        <button
                                            type="button"
                                            class="audio-btn inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500/80 via-violet-500/80 to-blue-500/80 text-white shadow-lg shadow-indigo-900/20 ring-1 ring-white/25 focus-visible:ring-4 focus-visible:ring-indigo-300/40"
                                            aria-label="Play audio"
                                            data-sound="{{ $item['sound'] }}"
                                        >
                                            <svg class="static-icon h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>
                                            <span class="wave-wrap" aria-hidden="true">
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                                <span class="wave-bar"></span>
                                            </span>
                                        </button>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection

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
                    button.classList.toggle("speaking", isSpeaking);
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

                        const p = audio.play();
                        if (p && typeof p.catch === "function") {
                            p.catch(() => stop());
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

                document.addEventListener("click", (e) => {
                    const btn = e.target.closest(".audio-btn");
                    if (!btn) return;

                    e.preventDefault();
                    const src = btn.dataset.sound || btn.getAttribute("data-sound") || "";
                    window[KEY].play(src, btn);
                });
            }
        })();

        window.resetSlide = function () {};
    </script>
@endsection

