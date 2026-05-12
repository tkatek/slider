@php
    $content = [
        'title' => 'Thank You',
        'subtitle' => "Don't forget to complete your homework",
        'badge' => 'Lesson Complete',
        'image' => materialAsset('slider/C2/chapter-1/img/thankyou.webp'),
        'image_alt' => 'Notebook and writing',
        'button' => 'Start Again',
        'first_fallback' => 'slide-1.blade.php',
    ];

    $content = is_array($content ?? null) ? $content : [];

    $title = trim((string) ($content['title'] ?? 'Thank You'));
    $subtitle = trim((string) ($content['subtitle'] ?? ''));
    $badge = trim((string) ($content['badge'] ?? 'Lesson Complete'));
    $image = (string) ($content['image'] ?? '');
    $imageAlt = (string) ($content['image_alt'] ?? 'Slide image');
    $buttonText = trim((string) ($content['button'] ?? 'Start Again'));
    $firstFallback = trim((string) ($content['first_fallback'] ?? 'slide-1.blade.php'));
@endphp

@extends('slider.simple-layout')

@section('title', $title)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-5 shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-20 -top-20 h-44 w-44 rounded-full bg-red-500/15 blur-3xl dark:bg-red-500/10"></div>
                <div class="pointer-events-none absolute -right-16 top-8 h-44 w-44 rounded-full bg-orange-400/18 blur-3xl dark:bg-orange-500/10"></div>
                <div class="pointer-events-none absolute bottom-[-3rem] left-1/2 h-52 w-52 -translate-x-1/2 rounded-full bg-rose-500/12 blur-3xl dark:bg-rose-500/10"></div>

                <div class="relative z-10 mx-auto grid max-w-6xl overflow-hidden rounded-[1.45rem] border border-red-100/80 bg-white shadow-[0_28px_72px_-42px_rgba(127,29,29,0.42)] ring-1 ring-white/80 dark:border-white/10 dark:bg-slate-900 dark:ring-red-400/10 lg:grid-cols-[minmax(0,1fr)_minmax(300px,42%)]">
                    <section class="relative order-1 flex min-h-[420px] items-center justify-center px-5 py-8 text-center sm:px-8 sm:py-10 lg:order-1 lg:min-h-[520px] lg:px-10 lg:py-14">
                        <div class="pointer-events-none absolute left-0 top-1/2 hidden h-28 w-1.5 -translate-y-1/2 rounded-r-full bg-gradient-to-b from-red-600 via-rose-500 to-orange-400 lg:block"></div>

                        <div class="mx-auto max-w-2xl">
                            @if($badge !== '')
                                <div class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-[0.72rem] font-black uppercase tracking-[0.18em] text-red-700 shadow-sm dark:border-red-400/20 dark:bg-red-500/10 dark:text-red-200">
                                    {{ $badge }}
                                </div>
                            @endif

                            <h1 class="mx-auto max-w-3xl text-4xl font-black leading-[1.04] tracking-[-0.04em] sm:text-[2.85rem] lg:text-5xl xl:text-6xl">
                                <span class="bg-gradient-to-r from-red-800 via-red-600 to-rose-600 bg-clip-text text-transparent dark:from-red-300 dark:via-red-200 dark:to-rose-300">
                                    {{ $title }}
                                </span>
                            </h1>

                            @if($subtitle !== '')
                                <p class="mx-auto mt-5 max-w-xl text-base font-bold leading-relaxed text-slate-600 dark:text-slate-200 sm:text-lg">
                                    {!! $subtitle !!}
                                </p>
                            @endif

                            @if($buttonText !== '')
                                <button
                                        id="startAgainBtn"
                                        type="button"
                                        aria-label="{{ $buttonText }}"
                                        data-first-fallback="{{ $firstFallback }}"
                                        class="group mt-8 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/25 bg-gradient-to-r from-red-700 via-rose-600 to-orange-500 px-5 py-3 text-sm font-black text-white shadow-xl shadow-red-900/15 transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.03] hover:shadow-red-900/20 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-red-500/25 dark:from-red-700 dark:via-rose-700 dark:to-orange-700 dark:shadow-black/35 sm:px-7 sm:py-3.5 sm:text-base"
                                >
                                    <span>{{ $buttonText }}</span>
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none transition-transform duration-200 group-hover:-translate-x-1">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </span>
                                </button>
                            @endif
                        </div>
                    </section>

                    @if($image !== '')
                        <aside class="relative order-2 min-h-[240px] overflow-hidden bg-slate-950 lg:order-2 lg:min-h-[520px]">
                            <img
                                    src="{{ $image }}"
                                    alt="{{ $imageAlt }}"
                                    class="absolute inset-0 h-full w-full object-cover"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />

                            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-red-950/72 via-red-950/10 to-transparent lg:bg-gradient-to-l lg:from-red-950/35 lg:via-transparent lg:to-transparent"></div>
                            <div class="pointer-events-none absolute inset-4 rounded-[1.1rem] border border-white/35 lg:inset-5 lg:rounded-[1.35rem]"></div>
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
            const btn = document.getElementById('startAgainBtn');

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
                btn.addEventListener('click', goToFirstSlide);
            }
        });
    </script>
@endsection
