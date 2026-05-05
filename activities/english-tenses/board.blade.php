@php
    $content = is_array($content ?? null) ? $content : [];

    $boardTitle      = trim((string)($content['board_title'] ?? 'English Tenses'));
    $boardSubtitle   = trim((string)($content['board_subtitle'] ?? '12 Basic Formulas'));
    $buttonText      = trim((string)($content['button'] ?? 'Start Session'));
    $tone            = trim((string)($content['tone'] ?? 'mint'));
    $buttonAction    = trim((string)($content['button_action'] ?? 'next'));
    $nextFallback    = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));
    $restartFallback = trim((string)($content['restart_fallback'] ?? 'slide-1.blade.php'));
    $subtitleClass   = trim((string)($content['subtitle_class'] ?? ''));

    $boardTones = [
        'mint' => [
            'frame' => 'from-amber-200 via-orange-300 to-amber-500 dark:from-amber-950 dark:via-orange-950 dark:to-stone-950',
            'frameInner' => 'from-yellow-100/55 via-white/20 to-orange-900/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-emerald-900 via-green-800 to-emerald-950 dark:from-emerald-950 dark:via-slate-950 dark:to-green-950',
            'chalk' => 'text-emerald-50 dark:text-emerald-50',
            'muted' => 'text-emerald-100/78 dark:text-emerald-100/72',
            'line' => 'bg-emerald-100/28 dark:bg-emerald-100/16',
            'tray' => 'from-amber-200 via-orange-200 to-amber-400 dark:from-stone-900 dark:via-amber-950 dark:to-stone-950',
            'eraser' => 'bg-emerald-100/90 dark:bg-emerald-50/75',
            'button' => 'from-emerald-500 via-teal-500 to-cyan-500 hover:from-emerald-600 hover:via-teal-600 hover:to-cyan-600 dark:from-emerald-700 dark:via-teal-800 dark:to-cyan-900 dark:hover:from-emerald-600 dark:hover:via-teal-700 dark:hover:to-cyan-800 focus-visible:ring-emerald-400/30',
            'shadow' => 'shadow-emerald-900/20 dark:shadow-black/55',
        ],
        'peach' => [
            'frame' => 'from-orange-200 via-amber-300 to-orange-500 dark:from-orange-950 dark:via-stone-950 dark:to-amber-950',
            'frameInner' => 'from-orange-50/60 via-white/20 to-orange-950/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-stone-800 via-orange-950 to-stone-950 dark:from-stone-950 dark:via-orange-950 dark:to-slate-950',
            'chalk' => 'text-orange-50 dark:text-orange-50',
            'muted' => 'text-orange-100/78 dark:text-orange-100/72',
            'line' => 'bg-orange-100/28 dark:bg-orange-100/16',
            'tray' => 'from-orange-200 via-amber-200 to-orange-400 dark:from-stone-900 dark:via-orange-950 dark:to-stone-950',
            'eraser' => 'bg-orange-100/90 dark:bg-orange-50/75',
            'button' => 'from-orange-400 via-amber-400 to-rose-400 hover:from-orange-500 hover:via-amber-500 hover:to-rose-500 dark:from-orange-700 dark:via-amber-800 dark:to-rose-900 dark:hover:from-orange-600 dark:hover:via-amber-700 dark:hover:to-rose-800 focus-visible:ring-orange-400/30',
            'shadow' => 'shadow-orange-900/20 dark:shadow-black/55',
        ],
        'lavender' => [
            'frame' => 'from-violet-200 via-fuchsia-300 to-violet-500 dark:from-violet-950 dark:via-slate-950 dark:to-fuchsia-950',
            'frameInner' => 'from-violet-50/60 via-white/20 to-violet-950/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-slate-900 via-indigo-950 to-violet-950 dark:from-slate-950 dark:via-indigo-950 dark:to-violet-950',
            'chalk' => 'text-violet-50 dark:text-violet-50',
            'muted' => 'text-violet-100/78 dark:text-violet-100/72',
            'line' => 'bg-violet-100/28 dark:bg-violet-100/16',
            'tray' => 'from-violet-200 via-fuchsia-200 to-violet-400 dark:from-slate-900 dark:via-violet-950 dark:to-slate-950',
            'eraser' => 'bg-violet-100/90 dark:bg-violet-50/75',
            'button' => 'from-violet-400 via-fuchsia-400 to-pink-500 hover:from-violet-500 hover:via-fuchsia-500 hover:to-pink-500 dark:from-violet-700 dark:via-fuchsia-800 dark:to-pink-900 dark:hover:from-violet-600 dark:hover:via-fuchsia-700 dark:hover:to-pink-800 focus-visible:ring-violet-400/30',
            'shadow' => 'shadow-violet-900/20 dark:shadow-black/55',
        ],
        'rose' => [
            'frame' => 'from-rose-200 via-orange-300 to-rose-500 dark:from-rose-950 dark:via-slate-950 dark:to-orange-950',
            'frameInner' => 'from-rose-50/60 via-white/20 to-rose-950/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-slate-900 via-rose-950 to-slate-950 dark:from-slate-950 dark:via-rose-950 dark:to-black',
            'chalk' => 'text-rose-50 dark:text-rose-50',
            'muted' => 'text-rose-100/78 dark:text-rose-100/72',
            'line' => 'bg-rose-100/28 dark:bg-rose-100/16',
            'tray' => 'from-rose-200 via-orange-200 to-rose-400 dark:from-slate-900 dark:via-rose-950 dark:to-slate-950',
            'eraser' => 'bg-rose-100/90 dark:bg-rose-50/75',
            'button' => 'from-rose-400 via-pink-400 to-orange-400 hover:from-rose-500 hover:via-pink-500 hover:to-orange-500 dark:from-rose-700 dark:via-pink-800 dark:to-orange-900 dark:hover:from-rose-600 dark:hover:via-pink-700 dark:hover:to-orange-800 focus-visible:ring-rose-400/30',
            'shadow' => 'shadow-rose-900/20 dark:shadow-black/55',
        ],
        'green' => [
            'frame' => 'from-amber-200 via-orange-300 to-amber-500 dark:from-amber-950 dark:via-orange-950 dark:to-stone-950',
            'frameInner' => 'from-yellow-100/55 via-white/20 to-orange-900/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-emerald-900 via-green-800 to-emerald-950 dark:from-emerald-950 dark:via-slate-950 dark:to-green-950',
            'chalk' => 'text-emerald-50 dark:text-emerald-50',
            'muted' => 'text-emerald-100/78 dark:text-emerald-100/72',
            'line' => 'bg-emerald-100/28 dark:bg-emerald-100/16',
            'tray' => 'from-amber-200 via-orange-200 to-amber-400 dark:from-stone-900 dark:via-amber-950 dark:to-stone-950',
            'eraser' => 'bg-emerald-100/90 dark:bg-emerald-50/75',
            'button' => 'from-emerald-500 via-teal-500 to-cyan-500 hover:from-emerald-600 hover:via-teal-600 hover:to-cyan-600 dark:from-emerald-700 dark:via-teal-800 dark:to-cyan-900 dark:hover:from-emerald-600 dark:hover:via-teal-700 dark:hover:to-cyan-800 focus-visible:ring-emerald-400/30',
            'shadow' => 'shadow-emerald-900/20 dark:shadow-black/55',
        ],
        'slate' => [
            'frame' => 'from-stone-300 via-stone-500 to-stone-700 dark:from-stone-900 dark:via-slate-950 dark:to-black',
            'frameInner' => 'from-white/35 via-white/10 to-black/25 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-slate-800 via-slate-900 to-black dark:from-slate-950 dark:via-black dark:to-slate-950',
            'chalk' => 'text-slate-50 dark:text-slate-50',
            'muted' => 'text-slate-100/76 dark:text-slate-100/70',
            'line' => 'bg-slate-100/24 dark:bg-slate-100/14',
            'tray' => 'from-stone-300 via-stone-400 to-stone-600 dark:from-slate-900 dark:via-stone-950 dark:to-black',
            'eraser' => 'bg-slate-100/90 dark:bg-slate-50/75',
            'button' => 'from-slate-600 via-slate-700 to-slate-900 hover:from-slate-700 hover:via-slate-800 hover:to-black dark:from-slate-700 dark:via-slate-800 dark:to-black dark:hover:from-slate-600 dark:hover:via-slate-700 dark:hover:to-slate-950 focus-visible:ring-slate-400/30',
            'shadow' => 'shadow-slate-900/25 dark:shadow-black/60',
        ],
        'blue' => [
            'frame' => 'from-sky-200 via-blue-300 to-cyan-500 dark:from-blue-950 dark:via-slate-950 dark:to-cyan-950',
            'frameInner' => 'from-sky-50/60 via-white/20 to-blue-950/20 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-slate-900 via-blue-950 to-cyan-950 dark:from-slate-950 dark:via-blue-950 dark:to-black',
            'chalk' => 'text-cyan-50 dark:text-cyan-50',
            'muted' => 'text-cyan-100/78 dark:text-cyan-100/72',
            'line' => 'bg-cyan-100/28 dark:bg-cyan-100/16',
            'tray' => 'from-sky-200 via-cyan-200 to-blue-400 dark:from-slate-900 dark:via-blue-950 dark:to-slate-950',
            'eraser' => 'bg-cyan-100/90 dark:bg-cyan-50/75',
            'button' => 'from-sky-500 via-blue-500 to-cyan-500 hover:from-sky-600 hover:via-blue-600 hover:to-cyan-600 dark:from-sky-700 dark:via-blue-800 dark:to-cyan-900 dark:hover:from-sky-600 dark:hover:via-blue-700 dark:hover:to-cyan-800 focus-visible:ring-sky-400/30',
            'shadow' => 'shadow-blue-900/20 dark:shadow-black/55',
        ],
        'brown' => [
            'frame' => 'from-amber-300 via-orange-500 to-stone-700 dark:from-amber-950 dark:via-orange-950 dark:to-stone-950',
            'frameInner' => 'from-amber-50/55 via-white/15 to-stone-950/25 dark:from-white/10 dark:via-white/[0.03] dark:to-black/35',
            'board' => 'from-stone-800 via-amber-950 to-stone-950 dark:from-stone-950 dark:via-amber-950 dark:to-black',
            'chalk' => 'text-amber-50 dark:text-amber-50',
            'muted' => 'text-amber-100/78 dark:text-amber-100/72',
            'line' => 'bg-amber-100/28 dark:bg-amber-100/16',
            'tray' => 'from-amber-300 via-orange-400 to-stone-600 dark:from-stone-900 dark:via-amber-950 dark:to-black',
            'eraser' => 'bg-amber-100/90 dark:bg-amber-50/75',
            'button' => 'from-amber-500 via-orange-500 to-stone-700 hover:from-amber-600 hover:via-orange-600 hover:to-stone-800 dark:from-amber-700 dark:via-orange-800 dark:to-stone-950 dark:hover:from-amber-600 dark:hover:via-orange-700 dark:hover:to-stone-900 focus-visible:ring-amber-400/30',
            'shadow' => 'shadow-stone-900/25 dark:shadow-black/60',
        ],
    ];

    $boardTheme = $boardTones[$tone] ?? $boardTones['mint'];
@endphp

@extends('slider.simple-layout')

@section('title', $boardTitle)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-3.5 py-5 text-center shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-44 w-44 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                <div class="relative z-10 mx-auto flex max-w-6xl flex-col items-center">
                    <div class="relative w-full max-w-[960px]">
                        <div class="pointer-events-none absolute inset-x-8 top-10 h-52 rounded-full bg-white/35 blur-3xl dark:bg-white/[0.035]"></div>

                        <div class="relative rounded-[1.25rem] border border-white/70 bg-white/58 p-1.5 shadow-2xl {{ $boardTheme['shadow'] }} backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:rounded-[1.75rem] sm:p-2.5">
                            <div class="relative rounded-[1rem] bg-gradient-to-br {{ $boardTheme['frame'] }} p-2.5 shadow-[inset_0_1px_0_rgba(255,255,255,.45),inset_0_-12px_26px_rgba(0,0,0,.14)] sm:rounded-[1.45rem] sm:p-4 lg:p-5">
                                <div class="pointer-events-none absolute inset-2 rounded-[0.8rem] bg-gradient-to-br {{ $boardTheme['frameInner'] }} sm:inset-3 sm:rounded-[1.1rem]"></div>

                                <div class="relative overflow-hidden rounded-[0.75rem] border border-black/10 bg-gradient-to-br {{ $boardTheme['board'] }} px-4 py-7 shadow-[inset_0_2px_12px_rgba(0,0,0,.34),inset_0_-18px_30px_rgba(0,0,0,.18)] ring-1 ring-white/20 dark:border-white/5 dark:ring-white/10 sm:rounded-[1.05rem] sm:px-7 sm:py-10 md:px-10 md:py-11 lg:px-12 lg:py-12">
                                    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,rgba(255,255,255,.15)_1px,transparent_0)] bg-[size:18px_18px] opacity-35 dark:opacity-20"></div>
                                    <div class="pointer-events-none absolute inset-0 bg-[linear-gradient(120deg,rgba(255,255,255,.12),transparent_34%,rgba(255,255,255,.06)_58%,transparent_80%)] opacity-70 dark:opacity-30"></div>
                                    <div class="pointer-events-none absolute left-6 right-6 top-5 h-px {{ $boardTheme['line'] }}"></div>
                                    <div class="pointer-events-none absolute -left-16 -top-16 h-40 w-40 rounded-full bg-white/14 blur-3xl dark:bg-white/[0.04]"></div>
                                    <div class="pointer-events-none absolute -right-14 -bottom-16 h-44 w-44 rounded-full bg-white/10 blur-3xl dark:bg-white/[0.035]"></div>

                                    <div class="relative z-10 mx-auto flex min-h-[245px] max-w-4xl flex-col items-center justify-center text-center sm:min-h-[290px] lg:min-h-[315px]">
                                        @if($boardTitle !== '')
                                            <h1 class="max-w-[12ch] text-balance text-4xl font-black leading-[0.98] tracking-[-0.045em] {{ $boardTheme['chalk'] }} drop-shadow-sm sm:max-w-none sm:text-6xl lg:text-7xl">
                                                {!! strip_tags($boardTitle, '<br>') !!}
                                            </h1>
                                        @endif

                                        @if($boardSubtitle !== '')
                                            <div class="mx-auto mt-5 w-full max-w-4xl rounded-[1rem] border border-white/20 bg-white/[0.08] px-3.5 py-4 shadow-[0_16px_36px_-28px_rgba(0,0,0,.8)] ring-1 ring-white/10 backdrop-blur-sm dark:border-white/10 dark:bg-white/[0.055] sm:mt-7 sm:rounded-[1.35rem] sm:px-6 sm:py-5 lg:px-7">
                                                <div class="text-base font-black leading-[1.55] tracking-[-0.015em] {{ $subtitleClass !== '' ? $subtitleClass : $boardTheme['muted'] }} [&_.text-slate-500]:text-slate-100/90 dark:[&_.text-slate-500]:text-slate-100/80 sm:text-xl lg:text-2xl">
                                                    {!! $boardSubtitle !!}
                                                </div>
                                            </div>
                                        @endif
                                    </div> 

                                    <div class="pointer-events-none absolute bottom-2 right-4 hidden items-end gap-1.5 sm:flex">
                                        <span class="h-2.5 w-12 rounded-sm {{ $boardTheme['eraser'] }} shadow-sm"></span>
                                        <span class="h-2 w-7 rounded-sm bg-rose-100/90 shadow-sm dark:bg-rose-50/65"></span>
                                    </div>
                                </div>

                                <div class="relative mx-auto mt-2 h-3 w-[92%] rounded-b-xl bg-gradient-to-r {{ $boardTheme['tray'] }} shadow-[inset_0_1px_0_rgba(255,255,255,.55)] sm:mt-3 sm:h-4"></div>
                            </div>
                        </div>
                    </div>

                    @if($buttonText !== '')
                        <button
                                id="startBtn"
                                type="button"
                                aria-label="{{ $buttonText }}"
                                data-button-action="{{ $buttonAction }}"
                                data-next-fallback="{{ $nextFallback }}"
                                data-restart-fallback="{{ $restartFallback }}"
                                class="group mt-7 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/45 bg-gradient-to-r {{ $boardTheme['button'] }} px-5 py-3 text-sm font-black text-white shadow-xl shadow-slate-900/10 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-2xl active:translate-y-0 active:scale-[0.98] focus-visible:outline-none focus-visible:ring-4 dark:border-white/10 dark:shadow-black/30 sm:mt-8 sm:px-6 sm:py-3.5"
                        >
                            <span>{{ $buttonText }}</span>
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none shadow-inner transition-transform duration-200 {{ $buttonAction === 'restart' ? 'group-hover:rotate-[-35deg]' : 'group-hover:translate-x-1' }} dark:bg-white/10">
                                <i class="fa-solid {{ $buttonAction === 'restart' ? 'fa-rotate-right' : 'fa-arrow-right' }}"></i>
                            </span>
                        </button>
                    @endif
                </div>
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
