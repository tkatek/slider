@php
    $content = is_array($content ?? null) ? $content : [];

    $boardTitle      = trim((string)($content['board_title'] ?? 'English Tenses'));
    $boardSubtitle   = trim((string)($content['board_subtitle'] ?? '12 Basic Formulas'));
    $buttonText      = trim((string)($content['button'] ?? 'Start Session'));
    $tone            = trim((string)($content['tone'] ?? 'mint'));
    $buttonAction    = trim((string)($content['button_action'] ?? 'next'));
    $nextFallback    = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));
    $restartFallback = trim((string)($content['restart_fallback'] ?? 'slide-1.blade.php'));

    $boardTones = [
        'mint' => [
            'page'          => 'from-teal-50 via-cyan-50 to-amber-50 dark:from-slate-950 dark:via-teal-950/45 dark:to-slate-950',
            'halo'          => 'bg-teal-300/30 dark:bg-teal-400/10',
            'haloTwo'       => 'bg-amber-300/35 dark:bg-amber-500/10',
            'frame'         => 'bg-gradient-to-br from-[#ffd77f] via-[#ffc763] to-[#f6a94c] dark:from-amber-950 dark:via-orange-950/90 dark:to-stone-950',
            'frameSoft'     => 'bg-amber-200/80 dark:bg-amber-900/35',
            'board'         => 'bg-gradient-to-br from-[#99e1dc] via-[#7fd3cc] to-[#56bdb6] dark:from-teal-950 dark:via-slate-900 dark:to-cyan-950',
            'inner'         => 'bg-white/38 dark:bg-slate-950/25',
            'titleGradient' => 'from-teal-950 via-slate-900 to-cyan-900 dark:from-white dark:via-slate-200 dark:to-teal-200',
            'subtitle'      => 'text-slate-700 dark:text-slate-200',
            'tape'          => 'bg-gradient-to-br from-rose-200 via-[#f7a6a2] to-orange-200 dark:from-rose-950 dark:via-rose-900 dark:to-orange-950',
            'accentOne'     => 'bg-[#b8cb8f] dark:bg-lime-900/45',
            'accentTwo'     => 'bg-[#f9b0aa] dark:bg-rose-900/45',
            'accentThree'   => 'bg-[#ec9f89] dark:bg-orange-900/45',
            'accentFour'    => 'bg-[#c2b3d5] dark:bg-violet-900/45',
            'button'        => 'from-amber-400 via-orange-400 to-rose-400 hover:from-amber-500 hover:via-orange-500 hover:to-rose-500 dark:from-amber-700 dark:via-orange-800 dark:to-rose-900 dark:hover:from-amber-600 dark:hover:via-orange-700 dark:hover:to-rose-800 focus-visible:ring-orange-400/30',
            'ring'          => 'ring-teal-100/70 dark:ring-teal-700/20',
            'shadow'        => 'shadow-orange-300/30 dark:shadow-black/50',
        ],

        'peach' => [
            'page'          => 'from-orange-50 via-amber-50 to-rose-50 dark:from-slate-950 dark:via-orange-950/40 dark:to-slate-950',
            'halo'          => 'bg-orange-300/30 dark:bg-orange-400/10',
            'haloTwo'       => 'bg-rose-300/30 dark:bg-rose-500/10',
            'frame'         => 'bg-gradient-to-br from-orange-300 via-orange-400 to-rose-400 dark:from-orange-950 dark:via-stone-950 dark:to-rose-950',
            'frameSoft'     => 'bg-amber-200/80 dark:bg-amber-900/35',
            'board'         => 'bg-gradient-to-br from-orange-100 via-orange-200 to-amber-200 dark:from-stone-950 dark:via-orange-950/55 dark:to-slate-950',
            'inner'         => 'bg-white/40 dark:bg-slate-950/25',
            'titleGradient' => 'from-orange-950 via-slate-900 to-rose-900 dark:from-white dark:via-orange-100 dark:to-rose-200',
            'subtitle'      => 'text-slate-700 dark:text-slate-200',
            'tape'          => 'bg-gradient-to-br from-rose-200 via-rose-300 to-orange-200 dark:from-rose-950 dark:via-rose-900 dark:to-orange-950',
            'accentOne'     => 'bg-orange-300 dark:bg-orange-900/45',
            'accentTwo'     => 'bg-red-200 dark:bg-red-900/45',
            'accentThree'   => 'bg-rose-300 dark:bg-rose-900/45',
            'accentFour'    => 'bg-amber-200 dark:bg-amber-900/45',
            'button'        => 'from-orange-400 via-amber-400 to-rose-400 hover:from-orange-500 hover:via-amber-500 hover:to-rose-500 dark:from-orange-700 dark:via-amber-800 dark:to-rose-900 dark:hover:from-orange-600 dark:hover:via-amber-700 dark:hover:to-rose-800 focus-visible:ring-orange-400/30',
            'ring'          => 'ring-orange-100/80 dark:ring-orange-700/20',
            'shadow'        => 'shadow-orange-300/30 dark:shadow-black/50',
        ],

        'lavender' => [
            'page'          => 'from-violet-50 via-fuchsia-50 to-pink-50 dark:from-slate-950 dark:via-violet-950/45 dark:to-slate-950',
            'halo'          => 'bg-violet-300/30 dark:bg-violet-400/10',
            'haloTwo'       => 'bg-fuchsia-300/30 dark:bg-fuchsia-500/10',
            'frame'         => 'bg-gradient-to-br from-violet-300 via-violet-400 to-fuchsia-400 dark:from-violet-950 dark:via-slate-950 dark:to-fuchsia-950',
            'frameSoft'     => 'bg-fuchsia-200/75 dark:bg-fuchsia-900/35',
            'board'         => 'bg-gradient-to-br from-violet-200 via-violet-300 to-fuchsia-200 dark:from-slate-950 dark:via-violet-950/60 dark:to-slate-950',
            'inner'         => 'bg-white/40 dark:bg-slate-950/25',
            'titleGradient' => 'from-violet-950 via-slate-900 to-fuchsia-900 dark:from-white dark:via-violet-100 dark:to-fuchsia-200',
            'subtitle'      => 'text-slate-700 dark:text-slate-200',
            'tape'          => 'bg-gradient-to-br from-pink-200 via-pink-300 to-fuchsia-200 dark:from-pink-950 dark:via-pink-900 dark:to-fuchsia-950',
            'accentOne'     => 'bg-violet-300 dark:bg-violet-900/45',
            'accentTwo'     => 'bg-fuchsia-300 dark:bg-fuchsia-900/45',
            'accentThree'   => 'bg-rose-300 dark:bg-rose-900/45',
            'accentFour'    => 'bg-indigo-300 dark:bg-indigo-900/45',
            'button'        => 'from-violet-400 via-fuchsia-400 to-pink-500 hover:from-violet-500 hover:via-fuchsia-500 hover:to-pink-500 dark:from-violet-700 dark:via-fuchsia-800 dark:to-pink-900 dark:hover:from-violet-600 dark:hover:via-fuchsia-700 dark:hover:to-pink-800 focus-visible:ring-violet-400/30',
            'ring'          => 'ring-violet-100/80 dark:ring-violet-700/20',
            'shadow'        => 'shadow-violet-300/30 dark:shadow-black/50',
        ],

        'rose' => [
            'page'          => 'from-rose-50 via-pink-50 to-orange-50 dark:from-slate-950 dark:via-rose-950/40 dark:to-slate-950',
            'halo'          => 'bg-rose-300/30 dark:bg-rose-400/10',
            'haloTwo'       => 'bg-orange-300/30 dark:bg-orange-500/10',
            'frame'         => 'bg-gradient-to-br from-rose-300 via-rose-400 to-orange-400 dark:from-rose-950 dark:via-slate-950 dark:to-orange-950',
            'frameSoft'     => 'bg-pink-200/80 dark:bg-pink-900/35',
            'board'         => 'bg-gradient-to-br from-pink-100 via-pink-200 to-rose-200 dark:from-slate-950 dark:via-rose-950/55 dark:to-slate-950',
            'inner'         => 'bg-white/42 dark:bg-slate-950/25',
            'titleGradient' => 'from-rose-950 via-slate-900 to-orange-900 dark:from-white dark:via-rose-100 dark:to-orange-200',
            'subtitle'      => 'text-slate-700 dark:text-slate-200',
            'tape'          => 'bg-gradient-to-br from-orange-200 via-orange-300 to-rose-200 dark:from-orange-950 dark:via-orange-900 dark:to-rose-950',
            'accentOne'     => 'bg-rose-200 dark:bg-rose-900/45',
            'accentTwo'     => 'bg-pink-300 dark:bg-pink-900/45',
            'accentThree'   => 'bg-red-300 dark:bg-red-900/45',
            'accentFour'    => 'bg-fuchsia-300 dark:bg-fuchsia-900/45',
            'button'        => 'from-rose-400 via-pink-400 to-orange-400 hover:from-rose-500 hover:via-pink-500 hover:to-orange-500 dark:from-rose-700 dark:via-pink-800 dark:to-orange-900 dark:hover:from-rose-600 dark:hover:via-pink-700 dark:hover:to-orange-800 focus-visible:ring-rose-400/30',
            'ring'          => 'ring-rose-100/80 dark:ring-rose-700/20',
            'shadow'        => 'shadow-rose-300/30 dark:shadow-black/50',
        ],
    ];

    $boardTheme = $boardTones[$tone] ?? $boardTones['mint'];
@endphp

@extends('slider.simple-layout')

@section('content')
    <style>
        #introBoardSlide {
            isolation: isolate;
        }

        #introBoardSlide .intro-board-title {
            font-size: clamp(2.25rem, 6.2vw, 5rem);
            letter-spacing: -0.055em;
        }

        #introBoardSlide .intro-board-subtitle {
            font-size: clamp(1rem, 2.15vw, 1.72rem);
        }

        #introBoardSlide .board-noise {
            background-image:
                    radial-gradient(circle at 1px 1px, rgba(255,255,255,.28) 1px, transparent 0);
            background-size: 18px 18px;
        }

        #introBoardSlide .board-glass-line {
            background:
                    linear-gradient(90deg, transparent, rgba(255,255,255,.55), transparent);
        }

        .dark #introBoardSlide .board-noise {
            background-image:
                    radial-gradient(circle at 1px 1px, rgba(255,255,255,.055) 1px, transparent 0);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-sky-300"] {
            color: rgb(56 189 248 / 0.82);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-fuchsia-300"] {
            color: rgb(217 70 239 / 0.78);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-rose-300"] {
            color: rgb(244 63 94 / 0.78);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-emerald-300"] {
            color: rgb(16 185 129 / 0.78);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-orange-300"] {
            color: rgb(249 115 22 / 0.8);
        }

        .dark #introBoardSlide .tense-formula-card [class*="dark:text-violet-300"] {
            color: rgb(139 92 246 / 0.82);
        }

        @media (max-height: 780px) and (min-width: 768px) {
            #introBoardSlide .intro-board-title {
                font-size: clamp(2.4rem, 5.4vw, 4.25rem);
            }

            #introBoardSlide .intro-board-shell {
                max-width: 820px;
            }

            #introBoardSlide .intro-board-content {
                min-height: 250px;
            }
        }

        @media (max-width: 640px) {
            #introBoardSlide .intro-board-title {
                font-size: clamp(2.1rem, 12vw, 3.15rem);
                letter-spacing: -0.045em;
            }
        }
    </style>

    <div
            id="introBoardSlide"
            class="relative min-h-[100dvh] overflow-x-hidden overflow-y-auto bg-gradient-to-br {{ $boardTheme['page'] }}"
    >
        {{-- Soft background atmosphere --}}
        <div class="pointer-events-none absolute -left-28 top-0 h-72 w-72 rounded-full {{ $boardTheme['halo'] }} blur-3xl"></div>
        <div class="pointer-events-none absolute -right-28 bottom-0 h-80 w-80 rounded-full {{ $boardTheme['haloTwo'] }} blur-3xl"></div>
        <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(rgba(255,255,255,.34)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.34)_1px,transparent_1px)] bg-[size:42px_42px] opacity-35 dark:opacity-[0.035]"></div>

        <main class="relative z-10 mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-6 sm:px-6 sm:py-8 lg:px-8 lg:py-7">
            <section class="flex w-full flex-col items-center justify-center">
                <div class="intro-board-shell relative w-full max-w-[940px] px-1 sm:px-4">
                    {{-- Main floating glow --}}
                    <div class="pointer-events-none absolute inset-x-8 top-16 h-64 rounded-full bg-white/45 blur-3xl dark:bg-white/[0.035]"></div>

                    {{-- Top left soft blob --}}
                    <div class="pointer-events-none absolute -left-4 -top-5 z-20 hidden h-24 w-24 rounded-[44%_56%_51%_49%] {{ $boardTheme['accentOne'] }} shadow-xl shadow-black/5 sm:block lg:-left-7 lg:-top-8 lg:h-32 lg:w-32"></div>
                    <div class="pointer-events-none absolute left-2 top-0 z-20 hidden h-20 w-20 rounded-[44%_56%_51%_49%] border-[5px] border-slate-700/45 bg-transparent dark:border-white/10 sm:block lg:h-28 lg:w-28"></div>

                    {{-- Top right corner pattern --}}
                    <div class="pointer-events-none absolute -right-2 top-5 z-20 h-20 w-20 {{ $boardTheme['accentTwo'] }} shadow-xl shadow-black/5 [clip-path:polygon(100%_0,0_0,100%_100%)] sm:-right-5 sm:h-28 sm:w-28 lg:h-34 lg:w-34"></div>
                    <div class="pointer-events-none absolute right-2 top-8 z-30 grid rotate-[8deg] grid-cols-4 gap-1.5 sm:right-5 sm:top-10 sm:gap-2">
                        @for($i = 0; $i < 16; $i++)
                            <span class="block h-2 w-1.5 rotate-[-35deg] rounded-full bg-white/85 shadow-[4px_2px_0_0_rgba(255,255,255,.82)] dark:bg-slate-300/25 dark:shadow-[4px_2px_0_0_rgba(203,213,225,.18)] sm:h-2.5 sm:w-2"></span>
                        @endfor
                    </div>

                    {{-- Bottom left corner pattern --}}
                    <div class="pointer-events-none absolute -left-2 bottom-7 z-20 h-20 w-20 {{ $boardTheme['accentThree'] }} shadow-xl shadow-black/5 [clip-path:polygon(0_0,0_100%,100%_100%)] sm:-left-5 sm:h-28 sm:w-28 lg:h-34 lg:w-34"></div>
                    <div class="pointer-events-none absolute left-2 bottom-9 z-30 grid grid-cols-5 gap-1.5 sm:left-4 sm:bottom-11 sm:grid-cols-6 sm:gap-2">
                        @for($i = 0; $i < 24; $i++)
                            <span class="block h-1.5 w-1.5 rounded-full bg-white/90 dark:bg-slate-300/25 sm:h-2 sm:w-2"></span>
                        @endfor
                    </div>

                    {{-- Bottom right soft blob --}}
                    <div class="pointer-events-none absolute -bottom-5 -right-4 z-20 hidden h-24 w-24 rounded-[57%_43%_47%_53%] {{ $boardTheme['accentFour'] }} shadow-xl shadow-black/5 sm:block lg:-bottom-8 lg:-right-7 lg:h-32 lg:w-32"></div>
                    <div class="pointer-events-none absolute -bottom-1 right-2 z-20 hidden h-20 w-20 rounded-[57%_43%_47%_53%] border-[5px] border-slate-700/45 bg-transparent dark:border-white/10 sm:block lg:h-28 lg:w-28"></div>

                    {{-- Small doodles --}}
                    <div class="pointer-events-none absolute left-[11%] top-3 z-30 hidden -rotate-[18deg] flex-col gap-1 sm:flex">
                        <span class="block h-0.5 w-8 rounded-full bg-red-400/80 dark:bg-red-500/35"></span>
                        <span class="block h-0.5 w-7 translate-x-1 rounded-full bg-red-400/80 dark:bg-red-500/35"></span>
                        <span class="block h-0.5 w-6 translate-x-2 rounded-full bg-red-400/80 dark:bg-red-500/35"></span>
                    </div>

                    <div class="pointer-events-none absolute right-[10%] bottom-2 z-30 hidden rotate-[8deg] flex-col gap-1.5 sm:flex">
                        <span class="block h-1.5 w-10 rounded-full bg-slate-700/45 dark:bg-slate-300/20"></span>
                        <span class="block h-1.5 w-8 rounded-full bg-slate-700/45 dark:bg-slate-300/20"></span>
                        <span class="block h-1.5 w-10 rounded-full bg-slate-700/45 dark:bg-slate-300/20"></span>
                    </div>

                    {{-- Modern tape --}}
                    <div class="pointer-events-none absolute left-[14%] -top-4 z-40 h-16 w-10 rotate-[-3deg] rounded-t-xl {{ $boardTheme['tape'] }} shadow-xl shadow-black/10 ring-1 ring-white/45 dark:ring-white/10 sm:left-[16%] sm:-top-7 sm:h-24 sm:w-12">
                        <div class="absolute inset-x-1 top-2 h-1 rounded-full bg-white/35 dark:bg-white/10"></div>
                        <div class="absolute bottom-[-1px] left-0 h-5 w-1/2 {{ $boardTheme['board'] }} [clip-path:polygon(0_100%,100%_100%,0_0)]"></div>
                        <div class="absolute bottom-[-1px] right-0 h-5 w-1/2 {{ $boardTheme['board'] }} [clip-path:polygon(0_100%,100%_100%,100%_0)]"></div>
                    </div>

                    <div class="pointer-events-none absolute right-[14%] -top-4 z-40 h-16 w-10 rotate-[3deg] rounded-t-xl {{ $boardTheme['tape'] }} shadow-xl shadow-black/10 ring-1 ring-white/45 dark:ring-white/10 sm:right-[16%] sm:-top-7 sm:h-24 sm:w-12">
                        <div class="absolute inset-x-1 top-2 h-1 rounded-full bg-white/35 dark:bg-white/10"></div>
                        <div class="absolute bottom-[-1px] left-0 h-5 w-1/2 {{ $boardTheme['board'] }} [clip-path:polygon(0_100%,100%_100%,0_0)]"></div>
                        <div class="absolute bottom-[-1px] right-0 h-5 w-1/2 {{ $boardTheme['board'] }} [clip-path:polygon(0_100%,100%_100%,100%_0)]"></div>
                    </div>

                    {{-- Main board --}}
                    <div class="relative z-10 rounded-[1.65rem] bg-white/55 p-2 shadow-2xl {{ $boardTheme['shadow'] }} ring-1 ring-white/80 backdrop-blur-xl dark:bg-slate-950/55 dark:ring-white/[0.07] sm:rounded-[2rem] sm:p-3">
                        <div class="relative rounded-[1.25rem] {{ $boardTheme['frame'] }} p-3 shadow-[inset_0_1px_0_rgba(255,255,255,.48),inset_0_-18px_36px_rgba(0,0,0,.08)] sm:rounded-[1.65rem] sm:p-4 md:p-5">
                            {{-- Subtle scalloped base --}}
                            <div class="pointer-events-none absolute inset-x-4 -bottom-6 z-0 flex h-14 items-start justify-around overflow-hidden rounded-b-[2rem] {{ $boardTheme['frame'] }} sm:inset-x-7 sm:-bottom-8 sm:h-[4.5rem]">
                                @for($i = 0; $i < 8; $i++)
                                    <span class="-mt-7 block h-12 w-20 rounded-full bg-white/60 dark:bg-slate-950/60 sm:-mt-8 sm:h-14 sm:w-24"></span>
                                @endfor
                            </div>

                            <div class="relative z-10 overflow-hidden rounded-[1rem] {{ $boardTheme['board'] }} px-4 py-8 shadow-[inset_0_1px_0_rgba(255,255,255,0.62),inset_0_-18px_34px_rgba(15,23,42,.06)] ring-1 {{ $boardTheme['ring'] }} dark:shadow-[inset_0_1px_0_rgba(255,255,255,0.08),inset_0_-18px_34px_rgba(0,0,0,.2)] sm:rounded-[1.35rem] sm:px-8 sm:py-11 md:px-12 md:py-12 lg:px-14 lg:py-14">
                                {{-- Board texture and light --}}
                                <div class="pointer-events-none absolute inset-0 {{ $boardTheme['inner'] }}"></div>
                                <div class="board-noise pointer-events-none absolute inset-0 opacity-45"></div>
                                <div class="pointer-events-none absolute -left-14 -top-16 h-44 w-44 rounded-full bg-white/25 blur-3xl dark:bg-white/[0.035]"></div>
                                <div class="pointer-events-none absolute -right-14 -bottom-16 h-52 w-52 rounded-full bg-white/25 blur-3xl dark:bg-white/[0.035]"></div>
                                <div class="board-glass-line pointer-events-none absolute left-8 right-8 top-6 h-px opacity-70 dark:opacity-20"></div>

                                <div class="intro-board-content relative z-10 mx-auto flex min-h-[255px] max-w-4xl flex-col items-center justify-center text-center sm:min-h-[300px] md:min-h-[315px] lg:min-h-[330px]">
                                    @if($boardTitle !== '')


                                        <h1 class="intro-board-title max-w-[11ch] font-sans font-black leading-[0.98] text-balance sm:max-w-none">
                                            <span class="bg-gradient-to-r {{ $boardTheme['titleGradient'] }} bg-clip-text text-transparent drop-shadow-sm">
                                                {!! strip_tags($boardTitle, '<br>') !!}
                                            </span>
                                        </h1>
                                    @endif

                                    @if($boardSubtitle !== '')
                                        <div class="tense-formula-card mx-auto mt-5 w-full max-w-4xl rounded-[1.25rem] border border-white/55 bg-white/62 px-4 py-4 shadow-[0_18px_45px_rgba(15,23,42,.10)] ring-1 ring-white/65 backdrop-blur-md dark:border-white/10 dark:bg-slate-950/38 dark:ring-white/[0.06] dark:shadow-black/25 sm:mt-7 sm:rounded-[1.6rem] sm:px-6 sm:py-5 md:px-8">
                                            <div class="intro-board-subtitle font-sans font-black leading-[1.58] tracking-[-0.018em] {{ $boardTheme['subtitle'] }}">
                                                {!! $boardSubtitle !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button
                        id="startBtn"
                        type="button"
                        aria-label="{{ $buttonText }}"
                        data-button-action="{{ $buttonAction }}"
                        data-next-fallback="{{ $nextFallback }}"
                        data-restart-fallback="{{ $restartFallback }}"
                        class="group mt-9 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/45 bg-gradient-to-r {{ $boardTheme['button'] }} px-5 py-3 text-sm font-black text-white shadow-xl shadow-orange-400/20 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-2xl active:translate-y-0 active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 dark:border-white/10 dark:shadow-black/30 sm:mt-12 sm:px-6 sm:py-3.5 md:mt-10"
                >
                    <span>{{ $buttonText }}</span>
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none shadow-inner transition-transform duration-200 group-hover:translate-x-1 dark:bg-white/10">
                        <i class="fa-solid {{ $buttonAction === 'restart' ? 'fa-rotate-right' : 'fa-arrow-right' }}"></i>
                    </span>
                </button>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("startBtn");

            if (!btn) return;

            function goToNextSlide() {
                const action = btn?.dataset?.buttonAction || "next";
                const fallback = btn?.dataset?.nextFallback || "slide-2.blade.php";
                const restartFallback = btn?.dataset?.restartFallback || "slide-1.blade.php";

                if (action === "restart") {
                    try {
                        if (window.parent && typeof window.parent.goToSlide === "function") {
                            window.parent.goToSlide(0);
                            return;
                        }
                    } catch (e) {}

                    try {
                        if (window.parent && window.parent !== window) {
                            window.parent.postMessage({ type: "BEC_NAV", action: "restart", slide: 0 }, "*");
                            return;
                        }
                    } catch (e) {}

                    if (restartFallback) {
                        window.location.href = restartFallback;
                    }

                    return;
                }

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

            btn.addEventListener("click", goToNextSlide);
        });
    </script>
@endsection