@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];
    $theme = $theme ?? [];

    $type = $content['type'] ?? 'intro';
    $isOutro = $type === 'outro';

    $unit = trim((string) ($content['unit'] ?? ''));
    $lesson = trim((string) ($content['lesson'] ?? ''));
    $unitNumber = trim((string) ($content['unit_number'] ?? ''));
    $lessonNumber = trim((string) ($content['lesson_number'] ?? ''));

    $title = trim((string) ($content['title'] ?? 'Thank You'));
    $subtitle = trim((string) ($content['subtitle'] ?? ''));
    $badge = trim((string) ($content['badge'] ?? 'Lesson Complete'));

    $image = (string) ($content['image'] ?? ''); 
    $imageAlt = (string) ($content['image_alt'] ?? 'Slide image');

    $buttonText = trim((string) ($content['button'] ?? ($isOutro ? 'Start Again' : 'Start Session')));
    $nextFallback = trim((string) ($content['next_fallback'] ?? 'slide-2.blade.php'));
    $firstFallback = trim((string) ($content['first_fallback'] ?? 'slide-1.blade.php')); 

    $buttonGradient = $theme['button_gradient_class'] ?? 'bg-[image:var(--top-bar-gradient)]';
    $titleGradient = $theme['title_gradient_class'] ?? 'bg-[image:var(--top-bar-gradient)] bg-clip-text text-transparent';

    $pageTitle = $isOutro  
        ? $title
        : trim(($unitNumber !== '' ? $unitNumber . ' ' : '') . $unit . ' ' . $lesson);
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/80 px-4 py-5 shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-7 lg:px-8 lg:py-8">

                <div class="pointer-events-none absolute -left-20 -top-20 h-44 w-44 rounded-full bg-[var(--ambient-one)] opacity-40 blur-3xl"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-44 w-44 rounded-full bg-[var(--ambient-two)] opacity-35 blur-3xl"></div>
                <div class="pointer-events-none absolute bottom-[-3rem] left-1/2 h-52 w-52 -translate-x-1/2 rounded-full bg-[var(--ambient-three)] opacity-30 blur-3xl"></div>

                <div class="relative z-10 mx-auto grid max-w-6xl overflow-hidden rounded-[1.5rem] border border-slate-200/80 bg-white shadow-[0_28px_72px_-42px_rgba(15,23,42,0.45)] ring-1 ring-white/70 dark:border-white/10 dark:bg-slate-900 dark:ring-white/10 {{ $image !== '' ? 'lg:grid-cols-[minmax(0,1fr)_minmax(280px,40%)]' : '' }}">

                    <section class="relative flex min-h-[390px] items-center justify-center px-5 py-8 text-center sm:min-h-[430px] sm:px-8 sm:py-10 lg:min-h-[500px] lg:px-10 lg:py-12">
                        <div class="pointer-events-none absolute left-0 top-1/2 hidden h-28 w-1.5 -translate-y-1/2 rounded-r-full {{ $buttonGradient }} lg:block"></div>

                        <div class="mx-auto max-w-2xl">
                            @if(!$isOutro)
                                @if($unitNumber !== '')
                                    <div class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-[0.72rem] font-black uppercase tracking-[0.18em] text-slate-700 shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-slate-200">
                                        <span class="text-slate-500 dark:text-slate-300">Unit</span>
                                        <span class="{{ $buttonGradient }} inline-flex h-7 min-w-7 items-center justify-center rounded-full px-2 text-xs text-white shadow-sm">
                                            {{ $unitNumber }}
                                        </span>
                                    </div>
                                @endif

                                @if($unit !== '')
                                    <p class="text-sm font-black uppercase tracking-[0.26em] text-slate-600 dark:text-slate-300 sm:text-base">
                                        {{ $unit }}
                                    </p>
                                @endif

                                @if($lesson !== '')
                                    <h1 class="mx-auto mt-3 max-w-3xl text-3xl font-black leading-[1.06] tracking-[-0.04em] sm:text-[2.55rem] lg:text-[2.85rem] xl:text-5xl">
                                        <span class="{{ $titleGradient }}">
                                            {{ $lesson }}
                                        </span>
                                    </h1>
                                @endif

                                @if($lessonNumber !== '')
                                    <div class="mx-auto mt-6 flex max-w-sm items-center justify-center gap-4 rounded-[1.25rem] border border-slate-200 bg-slate-50/80 px-4 py-3 shadow-sm dark:border-white/10 dark:bg-white/5">
                                        <span class="text-xs font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-300">
                                            Lesson
                                        </span>
                                        <span class="text-4xl font-black leading-none text-slate-900 dark:text-white">
                                            {{ $lessonNumber }}
                                        </span>
                                    </div>
                                @endif
                            @else
                                @if($badge !== '')
                                    <div class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-[0.72rem] font-black uppercase tracking-[0.18em] text-slate-700 shadow-sm dark:border-white/10 dark:bg-white/5 dark:text-slate-200">
                                        {{ $badge }}
                                    </div>
                                @endif

                                <h1 class="mx-auto max-w-3xl text-4xl font-black leading-[1.04] tracking-[-0.04em] sm:text-[2.85rem] lg:text-5xl xl:text-6xl">
                                    <span class="{{ $titleGradient }}">
                                        {{ $title }}
                                    </span>
                                </h1>

                                @if($subtitle !== '')
                                    <p class="mx-auto mt-5 max-w-xl text-base font-bold leading-relaxed text-slate-600 dark:text-slate-200 sm:text-lg">
                                        {!! $subtitle !!}
                                    </p>
                                @endif
                            @endif

                            @if($buttonText !== '')
                                <button
                                        id="introOutroBtn"
                                        type="button"
                                        data-type="{{ $type }}"
                                        data-next-fallback="{{ $nextFallback }}"
                                        data-first-fallback="{{ $firstFallback }}"
                                        class="group mt-7 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/25 {{ $buttonGradient }} px-5 py-3 text-sm font-black text-white shadow-xl shadow-slate-900/15 transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.03] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/25 dark:shadow-black/35 sm:px-7 sm:py-3.5 sm:text-base"
                                >
                                    <span>{{ $buttonText }}</span>

                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none transition-transform duration-200 {{ $isOutro ? 'group-hover:-translate-x-1' : 'group-hover:translate-x-1' }}">
                                        {{ $isOutro ? '↻' : '→' }}
                                    </span>
                                </button>
                            @endif
                        </div>
                    </section>

                    @if($image !== '')
                        <aside class="relative min-h-[230px] overflow-hidden bg-slate-950 lg:min-h-[500px]">
                            <img
                                    src="{{ $image }}"
                                    alt="{{ $imageAlt }}"
                                    class="absolute inset-0 h-full w-full object-cover"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />

                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-transparent lg:bg-gradient-to-l lg:from-slate-950/35 lg:via-transparent lg:to-transparent"></div>
                            <div class="pointer-events-none absolute inset-4 rounded-[1.1rem] border border-white/35 lg:inset-5 lg:rounded-[1.35rem]"></div>

                            @if(!$isOutro && $lessonNumber !== '')
                                <div class="absolute bottom-5 left-5 flex h-20 w-20 items-center justify-center overflow-hidden rounded-[1.35rem] border border-white/45 bg-white/10 shadow-[0_18px_48px_-24px_rgba(0,0,0,0.55)] backdrop-blur-md ring-1 ring-white/20">
                                    <span class="absolute inset-0 bg-gradient-to-br from-white/24 via-white/8 to-white/4"></span>
                                    <span class="absolute inset-x-0 top-0 h-px bg-white/70"></span>
                                    <span class="absolute inset-y-0 left-0 w-px bg-white/45"></span>
                                    <span class="relative z-10 text-4xl font-black leading-none text-white drop-shadow-[0_3px_14px_rgba(0,0,0,0.95)]">
                                        {{ $lessonNumber }}
                                    </span>
                                </div>
                            @endif
                        </aside>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('introOutroBtn');

            function goToNextSlide() {
                const fallback = btn?.dataset?.nextFallback || 'slide-2.blade.php';

                try {
                    if (window.parent && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        return;
                    }
                } catch (e) {}

                try {
                    if (window.parent && window.parent !== window) {
                        window.parent.postMessage({ type: 'BEC_NAV', action: 'next' }, '*');
                        return;
                    }
                } catch (e) {}

                if (fallback) {
                    window.location.href = fallback;
                }
            }

            function goToFirstSlide() {
                const fallback = btn?.dataset?.firstFallback || 'slide-1.blade.php';

                try {
                    if (window.parent && typeof window.parent.goToSlide === 'function') {
                        window.parent.goToSlide(0);
                        return;
                    }
                } catch (e) {}

                try {
                    if (window.parent && window.parent !== window) {
                        window.parent.postMessage({ type: 'BEC_NAV', action: 'first' }, '*');
                        return;
                    }
                } catch (e) {}

                if (fallback) {
                    window.location.href = fallback;
                }
            }

            window.resetSlide = () => {};

            if (btn) {
                btn.addEventListener('click', () => {
                    if (btn.dataset.type === 'outro') {
                        goToFirstSlide();
                        return;
                    }

                    goToNextSlide();
                });
            }
        });
    </script>
@endsection
