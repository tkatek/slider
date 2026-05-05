<?php
$content = [
    'title'    => 'Let’s Learn About',
    'subtitle' => 'Silent letters',

    'vectors' => [
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:books.svg',
            'alt' => 'Books',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:smiling-face-with-heart-eyes.svg',
            'alt' => 'Happy face',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:star.svg',
            'alt' => 'Star',
        ],
    ],

    'button' => 'Start Session',
];
?>

@php
    $content = is_array($content ?? null) ? $content : [];

    $title = trim((string)($content['title'] ?? ''));
    $subtitle = trim((string)($content['subtitle'] ?? ''));

    $vectors = is_array($content['vectors'] ?? null) ? $content['vectors'] : [];

    $buttonText = trim((string)($content['button'] ?? 'Start Session'));
    $nextFallback = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));
@endphp

@extends('slider.simple-layout')

@section('content')
    <style>
        #simpleIntroVectors {
            isolation: isolate;

            --intro-card-bg: rgba(255, 255, 255, 0.78);
            --intro-card-border: rgba(226, 232, 240, 0.82);
            --intro-card-shadow: 0 30px 90px rgba(15, 23, 42, 0.11);

            --intro-surface-bg: rgba(255, 255, 255, 0.72);
            --intro-surface-border: rgba(226, 232, 240, 0.82);

            --intro-muted: #475569;
        }

        .dark #simpleIntroVectors {
            --intro-card-bg: rgba(15, 23, 42, 0.78);
            --intro-card-border: rgba(148, 163, 184, 0.20);
            --intro-card-shadow: 0 34px 100px rgba(0, 0, 0, 0.44);

            --intro-surface-bg: rgba(30, 41, 59, 0.68);
            --intro-surface-border: rgba(148, 163, 184, 0.18);

            --intro-muted: #cbd5e1;
        }

        #simpleIntroVectors .theme-gradient-bg {
            background: var(--top-bar-gradient);
        }

        #simpleIntroVectors .theme-gradient-text {
            background-image: var(--top-bar-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #simpleIntroVectors .theme-soft-one {
            background: var(--ambient-one);
        }

        #simpleIntroVectors .theme-soft-two {
            background: var(--ambient-two);
        }

        #simpleIntroVectors .theme-soft-three {
            background: var(--ambient-three);
        }

        #simpleIntroVectors .intro-title {
            font-size: clamp(2.45rem, 6.2vw, 5.15rem);
            line-height: 0.96;
            letter-spacing: -0.065em;
            text-wrap: balance;
        }

        #simpleIntroVectors .intro-subtitle {
            font-size: clamp(1.3rem, 2.65vw, 2.35rem);
            line-height: 1.12;
            letter-spacing: -0.045em;
            text-wrap: balance;
        }

        #simpleIntroVectors .intro-card {
            background: var(--intro-card-bg);
            border-color: var(--intro-card-border);
            box-shadow: var(--intro-card-shadow);
        }

        #simpleIntroVectors .vector-tile {
            background: var(--intro-surface-bg);
            border-color: var(--intro-surface-border);
        }

        @media (max-height: 780px) and (min-width: 768px) {
            #simpleIntroVectors .intro-title {
                font-size: clamp(2.25rem, 5vw, 4.15rem);
            }

            #simpleIntroVectors .intro-subtitle {
                font-size: clamp(1.15rem, 2.1vw, 1.85rem);
            }

            #simpleIntroVectors .intro-card {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }

            #simpleIntroVectors .vector-row {
                margin-top: 2rem;
            }
        }

        @media (max-width: 640px) {
            #simpleIntroVectors .intro-card {
                border-radius: 1.75rem;
            }
        }
    </style>

    <div id="simpleIntroVectors" class="font-sans min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-6xl items-center justify-center px-4 py-6 sm:px-6 lg:px-8">
            <section class="flex w-full items-center justify-center py-4 sm:py-6">
                <div class="intro-card relative w-full overflow-hidden rounded-[2.5rem] border px-5 py-12 text-center backdrop-blur-xl sm:px-8 sm:py-16 lg:px-12 lg:py-20">

                    {{-- Soft theme glows from simple-layout --}}
                    <div class="theme-soft-one pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full blur-3xl"></div>
                    <div class="theme-soft-two pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full blur-3xl"></div>
                    <div class="theme-soft-three pointer-events-none absolute bottom-[-9rem] left-1/2 h-80 w-80 -translate-x-1/2 rounded-full blur-3xl"></div>

                    {{-- Subtle glass highlight --}}
                    <div class="pointer-events-none absolute left-1/2 top-0 h-px w-2/3 -translate-x-1/2 bg-gradient-to-r from-transparent via-white/80 to-transparent dark:via-white/20"></div>

                    <div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center">
                        @if($title !== '')
                            <h1 id="titleMain" class="intro-title font-black">
                                <span class="theme-gradient-text">
                                    {!! strip_tags($title, '<br>') !!}
                                </span>
                            </h1>
                        @endif

                        @if($subtitle !== '')
                            <p class="intro-subtitle mt-4 max-w-3xl font-black text-slate-700 dark:text-slate-100 sm:mt-5">
                                {!! strip_tags($subtitle, '<br>') !!}
                            </p>
                        @endif

                        @if(count($vectors))
                            <div id="vectorRow" class="vector-row mt-9 flex flex-wrap items-center justify-center gap-4 sm:mt-10 sm:gap-5 lg:gap-6">
                                @foreach($vectors as $index => $vector)
                                    @php
                                        $src = (string)($vector['src'] ?? '');
                                        $alt = (string)($vector['alt'] ?? '');

                                        $rotations = [
                                            'rotate-[-7deg]',
                                            'rotate-[3deg]',
                                            'rotate-[7deg]',
                                            'rotate-[-3deg]',
                                        ];

                                        $offsets = [
                                            'sm:-translate-y-1',
                                            'sm:translate-y-2',
                                            'sm:-translate-y-1',
                                            'sm:translate-y-1',
                                        ];

                                        $rotation = $rotations[$index % count($rotations)];
                                        $offset = $offsets[$index % count($offsets)];
                                    @endphp

                                    @if($src !== '')
                                        <div class="group relative {{ $offset }}">
                                            <div class="theme-gradient-bg absolute -inset-1 rounded-[1.8rem] opacity-30 blur-md transition duration-300 group-hover:opacity-45"></div>

                                            <div class="vector-tile relative flex h-20 w-20 items-center justify-center rounded-[1.6rem] border shadow-lg shadow-slate-900/10 backdrop-blur transition duration-300 group-hover:-translate-y-1 group-hover:shadow-xl dark:shadow-black/25 sm:h-24 sm:w-24 lg:h-28 lg:w-28">
                                                <img
                                                        src="{{ $src }}"
                                                        alt="{{ $alt }}"
                                                        class="h-12 w-12 select-none object-contain drop-shadow-sm transition duration-300 group-hover:scale-110 sm:h-14 sm:w-14 lg:h-16 lg:w-16 {{ $rotation }}"
                                                        loading="eager"
                                                        decoding="async"
                                                        draggable="false"
                                                />
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        @if($buttonText !== '')
                            <button
                                    id="startBtn"
                                    type="button"
                                    aria-label="{{ $buttonText }}"
                                    data-next-fallback="{{ $nextFallback }}"
                                    class="theme-gradient-bg mt-11 inline-flex items-center justify-center gap-2 rounded-2xl border border-white/25 px-5 py-3 text-sm font-black text-white shadow-xl shadow-slate-900/10 transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.03] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/25 dark:border-white/10 dark:shadow-black/35 sm:px-7 sm:py-3.5 sm:text-base"
                            >
                                <span>{{ $buttonText }}</span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-full border border-white/25 bg-white/20 text-white leading-none">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("simpleIntroVectors");
            if (!root) return;

            const btn = document.getElementById("startBtn");

            function goToNextSlide() {
                const fallback = btn?.dataset?.nextFallback || "slide-2.blade.php";

                try {
                    if (window.parent && typeof window.parent.nextSlide === "function") {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    if (window.parent && window.parent !== window) {
                        window.parent.postMessage({ type: "BEC_NAV", action: "next" }, "*");
                        return;
                    }
                } catch (e) {}

                if (fallback) {
                    window.location.href = fallback;
                }
            }

            window.resetSlide = () => {};

            if (btn) {
                btn.addEventListener("click", goToNextSlide);
            }
        });
    </script>
@endsection