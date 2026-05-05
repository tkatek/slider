<?php
$content = [
    'page_title' => 'Silent Letters Practice',

    'title' => 'Can you find the silent letters in these words ?',

    'words' => [
        'knife',
        'wrapper',
        'wrong',
        'write',
        'gnome',
        'wreck',
        'crumb',
        'lamb',
        'knuckle',
        'know',
    ],

    'decorations' => [
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:heart-suit.svg',
            'alt' => 'Heart',
            'class' => 'left-4 top-[18%] w-14 sm:w-16 lg:w-20 rotate-[-10deg]',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:spiral-notepad.svg',
            'alt' => 'Notepad',
            'class' => 'right-5 top-6 w-20 sm:w-24 lg:w-32 rotate-[10deg]',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:closed-book.svg',
            'alt' => 'Book',
            'class' => 'left-5 bottom-5 w-20 sm:w-24 lg:w-32 rotate-[-7deg]',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:pencil.svg',
            'alt' => 'Pencil',
            'class' => 'left-[9%] bottom-8 w-14 sm:w-16 lg:w-20 rotate-[2deg]',
        ],
        [
            'src' => 'https://api.iconify.design/fluent-emoji-flat:heart-suit.svg',
            'alt' => 'Heart',
            'class' => 'right-5 bottom-7 w-16 sm:w-20 lg:w-24 rotate-[10deg]',
        ],
    ],
];
?>

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? 'Silent Letters Practice'));
    $title = trim((string)($content['title'] ?? ''));
    $words = is_array($content['words'] ?? null) ? $content['words'] : [];
    $decorations = is_array($content['decorations'] ?? null) ? $content['decorations'] : [];
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <style>
        #silentLettersFindSlide {
            isolation: isolate;

            --card-bg: rgba(255, 255, 255, 0.84);
            --card-border: rgba(226, 232, 240, 0.78);
            --word-bg: rgba(255, 255, 255, 0.72);
            --word-border: rgba(226, 232, 240, 0.82);
            --card-shadow: 0 30px 90px rgba(15, 23, 42, 0.10);
        }

        .dark #silentLettersFindSlide {
            --card-bg: rgba(15, 23, 42, 0.84);
            --card-border: rgba(148, 163, 184, 0.22);
            --word-bg: rgba(30, 41, 59, 0.72);
            --word-border: rgba(148, 163, 184, 0.18);
            --card-shadow: 0 34px 100px rgba(0, 0, 0, 0.44);
        }

        #silentLettersFindSlide .theme-gradient-text {
            background-image: var(--top-bar-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        #silentLettersFindSlide .theme-soft-one {
            background: var(--ambient-one);
        }

        #silentLettersFindSlide .theme-soft-two {
            background: var(--ambient-two);
        }

        #silentLettersFindSlide .theme-soft-three {
            background: var(--ambient-three);
        }

        #silentLettersFindSlide .slide-title {
            font-size: clamp(2rem, 4.8vw, 4.25rem);
            line-height: 1.05;
            letter-spacing: -0.055em;
            font-weight: 900;
            text-wrap: balance;
        }

        #silentLettersFindSlide .word-card {
            background:
                    linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.58)),
                    var(--word-bg);
            border-color: var(--word-border);
        }

        .dark #silentLettersFindSlide .word-card {
            background:
                    linear-gradient(135deg, rgba(51, 65, 85, 0.62), rgba(15, 23, 42, 0.54)),
                    var(--word-bg);
        }

        #silentLettersFindSlide .word-text {
            font-size: clamp(1.45rem, 2.8vw, 2.75rem);
            line-height: 1;
            letter-spacing: -0.045em;
            font-weight: 850;
        }

        #silentLettersFindSlide .word-card:nth-child(4n + 1) .word-dot {
            background: linear-gradient(135deg, #818cf8, #60a5fa);
        }

        #silentLettersFindSlide .word-card:nth-child(4n + 2) .word-dot {
            background: linear-gradient(135deg, #f472b6, #fb7185);
        }

        #silentLettersFindSlide .word-card:nth-child(4n + 3) .word-dot {
            background: linear-gradient(135deg, #34d399, #22c55e);
        }

        #silentLettersFindSlide .word-card:nth-child(4n + 4) .word-dot {
            background: linear-gradient(135deg, #fbbf24, #fb923c);
        }

        @media (max-height: 780px) and (min-width: 1024px) {
            #silentLettersFindSlide .slide-title {
                font-size: clamp(1.9rem, 4vw, 3.35rem);
            }

            #silentLettersFindSlide .word-text {
                font-size: clamp(1.35rem, 2.35vw, 2.25rem);
            }

            #silentLettersFindSlide .main-card {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            #silentLettersFindSlide .words-grid {
                margin-top: 2rem;
                gap: 0.85rem;
            }
        }

        @media (max-width: 640px) {
            #silentLettersFindSlide .main-card {
                border-radius: 1.75rem;
                padding: 1.25rem 1rem 1.35rem;
            }

            #silentLettersFindSlide .slide-title {
                font-size: clamp(1.55rem, 8vw, 2.25rem);
                line-height: 1.12;
                letter-spacing: -0.035em;
                font-weight: 800;
            }

            #silentLettersFindSlide .mobile-helper {
                display: flex;
            }

            #silentLettersFindSlide .words-grid {
                margin-top: 1rem;
                gap: 0.65rem;
            }

            #silentLettersFindSlide .word-card {
                border-radius: 1.15rem;
                padding: 0.8rem 0.75rem;
                box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
            }

            #silentLettersFindSlide .word-text {
                font-size: clamp(1.05rem, 6.4vw, 1.55rem);
                letter-spacing: -0.025em;
                font-weight: 750;
            }
        }
    </style>

    <div id="silentLettersFindSlide" class="font-sans min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-4 py-5 sm:px-6 lg:px-8">
            <section class="relative flex w-full items-center justify-center py-3 sm:py-6">

                @foreach($decorations as $decoration)
                    @php
                        $src = (string)($decoration['src'] ?? '');
                        $alt = (string)($decoration['alt'] ?? '');
                        $class = trim((string)($decoration['class'] ?? ''));
                    @endphp

                    @if($src !== '')
                        <img
                                src="{{ $src }}"
                                alt="{{ $alt }}"
                                aria-hidden="true"
                                class="pointer-events-none absolute z-20 hidden select-none drop-shadow-xl sm:block {{ $class }}"
                                draggable="false"
                                loading="eager"
                                decoding="async"
                        />
                    @endif
                @endforeach

                <div
                        class="main-card relative w-full overflow-hidden rounded-[2.5rem] border px-5 py-9 text-center backdrop-blur-xl sm:px-8 sm:py-12 lg:px-12 lg:py-14"
                        style="background: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);"
                >
                    {{-- Soft theme glows from simple-layout --}}
                    <div class="theme-soft-one pointer-events-none absolute -left-24 -top-24 h-72 w-72 rounded-full blur-3xl"></div>
                    <div class="theme-soft-two pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full blur-3xl"></div>
                    <div class="theme-soft-three pointer-events-none absolute bottom-[-9rem] left-1/2 h-80 w-80 -translate-x-1/2 rounded-full blur-3xl"></div>

                    <div class="pointer-events-none absolute left-1/2 top-0 h-px w-2/3 -translate-x-1/2 bg-gradient-to-r from-transparent via-white/80 to-transparent dark:via-white/20"></div>

                    <div class="relative z-10 mx-auto max-w-6xl">
                        <div class="mobile-helper mb-4 hidden items-center justify-center gap-2 sm:hidden">
                            <span class="rounded-full border border-indigo-200/70 bg-indigo-50 px-3 py-1.5 text-sm font-bold text-indigo-700 shadow-sm dark:border-indigo-400/20 dark:bg-indigo-400/10 dark:text-indigo-200">
                                🔎 Find
                            </span>
                            <span class="rounded-full border border-pink-200/70 bg-pink-50 px-3 py-1.5 text-sm font-bold text-pink-700 shadow-sm dark:border-pink-400/20 dark:bg-pink-400/10 dark:text-pink-200">
                                👂 Listen
                            </span>
                            <span class="rounded-full border border-emerald-200/70 bg-emerald-50 px-3 py-1.5 text-sm font-bold text-emerald-700 shadow-sm dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-200">
                                ✏️ Circle
                            </span>
                        </div>

                        @if($title !== '')
                            <h1 class="slide-title mx-auto max-w-5xl">
                                <span class="theme-gradient-text">
                                    {!! strip_tags($title, '<br>') !!}
                                </span>
                            </h1>
                        @endif

                        @if(count($words))
                            <div class="words-grid mx-auto mt-10 grid max-w-5xl grid-cols-2 gap-3 sm:mt-12 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 lg:gap-5">
                                @foreach($words as $word)
                                    <div class="word-card group relative overflow-hidden border px-4 py-4 shadow-lg shadow-slate-900/5 backdrop-blur transition duration-200 hover:-translate-y-1 hover:shadow-xl dark:shadow-black/20 sm:rounded-[1.75rem] sm:px-5 sm:py-5">
                                        <span class="word-dot absolute left-3 top-3 h-2.5 w-2.5 rounded-full opacity-80 sm:h-3 sm:w-3"></span>

                                        <span class="word-text block text-slate-800 dark:text-slate-50">
                                            {{ $word }}
                                        </span>

                                        <span class="mt-2 hidden text-[0.65rem] font-extrabold uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500 sm:block">
                                            silent letter
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        window.resetSlide = function () {};
    </script>
@endsection