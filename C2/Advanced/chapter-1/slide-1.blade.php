@php
    $content = [
        'unit' => 'Advanced',
        'lesson' => 'Expressing Complex Opinions',
        'unit_number' => '1',
        'lesson_number' => '1',
        'image' => materialAsset('slider/activities/silent-letters/slide3.webp'),
        'image_alt' => 'Notebook and writing',
        'button' => 'Start Session',
        'next_fallback' => 'slide-2.blade.php', 
    ];

    $content = is_array($content ?? null) ? $content : []; 

    $unit = trim((string)($content['unit'] ?? ''));
    $lesson = trim((string)($content['lesson'] ?? ''));
    $unitNumber = trim((string)($content['unit_number'] ?? ''));
    $lessonNumber = trim((string)($content['lesson_number'] ?? ''));
    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? 'Slide image');
    $buttonText = trim((string)($content['button'] ?? 'Start Session'));
    $nextFallback = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));
@endphp

@extends('slider.simple-layout')

@section('title', trim(($unitNumber !== '' ? $unitNumber . ' ' : '') . $unit . ' ' . $lesson))

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-5 shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-20 -top-20 h-44 w-44 rounded-full bg-red-500/15 blur-3xl dark:bg-red-500/10"></div>
                <div class="pointer-events-none absolute -right-16 top-8 h-44 w-44 rounded-full bg-orange-400/18 blur-3xl dark:bg-orange-500/10"></div>
                <div class="pointer-events-none absolute bottom-[-3rem] left-1/2 h-52 w-52 -translate-x-1/2 rounded-full bg-rose-500/12 blur-3xl dark:bg-rose-500/10"></div>

                <div class="relative z-10 mx-auto grid max-w-6xl overflow-hidden rounded-[1.45rem] border border-red-100/80 bg-white shadow-[0_28px_72px_-42px_rgba(127,29,29,0.42)] ring-1 ring-white/80 dark:border-white/10 dark:bg-slate-900 dark:ring-red-400/10 lg:grid-cols-[minmax(0,1fr)_minmax(300px,42%)]">
                    <section class="relative order-1 px-5 py-7 text-center sm:px-7 sm:py-9 lg:order-1 lg:px-10 lg:py-12 lg:text-left">
                        <div class="pointer-events-none absolute left-0 top-8 hidden h-28 w-1.5 rounded-r-full bg-gradient-to-b from-red-600 via-rose-500 to-orange-400 lg:block"></div>

                        <div class="mx-auto mb-7 flex max-w-xl items-center justify-center gap-3 lg:mx-0 lg:justify-start">
                            @if($unitNumber !== '')
                                <div class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-[0.72rem] font-black uppercase tracking-[0.18em] text-red-700 shadow-sm dark:border-red-400/20 dark:bg-red-500/10 dark:text-red-200">
                                    <span class="text-slate-500 dark:text-slate-300">Unit</span>
                                    <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full bg-gradient-to-br from-red-600 to-rose-600 px-2 text-xs text-white shadow-sm shadow-red-700/20 dark:from-red-500 dark:to-rose-500">
                                        {{ $unitNumber }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        @if($unit !== '')
                            <p class="text-sm font-black uppercase tracking-[0.26em] text-red-700/80 dark:text-red-200/80 sm:text-base">
                                {{ $unit }}
                            </p>
                        @endif

                        @if($lesson !== '')
                            <h1 class="mx-auto mt-3 max-w-3xl text-4xl font-black leading-[1.04] tracking-[-0.04em] sm:text-[2.85rem] lg:mx-0 lg:text-5xl xl:text-6xl">
                                <span class="bg-gradient-to-r from-red-800 via-red-600 to-rose-600 bg-clip-text text-transparent dark:from-red-300 dark:via-red-200 dark:to-rose-300">
                                    {{ $lesson }}
                                </span>
                            </h1>
                        @endif

                        @if($lessonNumber !== '')
                            <div class="mx-auto mt-6 flex max-w-sm items-center justify-center gap-4 rounded-[1.25rem] border border-red-100 bg-red-50/80 px-4 py-3 shadow-[0_16px_42px_-32px_rgba(127,29,29,0.35)] dark:border-red-400/15 dark:bg-red-500/10 lg:mx-0">
                                <span class="text-xs font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-300">Lesson</span>
                                <span class="text-4xl font-black leading-none text-red-700 dark:text-red-200">{{ $lessonNumber }}</span>
                            </div>
                        @endif

                        @if($buttonText !== '')
                            <button
                                    id="startBtn"
                                    type="button"
                                    aria-label="{{ $buttonText }}"
                                    data-next-fallback="{{ $nextFallback }}"
                                    class="group mt-7 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/25 bg-gradient-to-r from-red-700 via-rose-600 to-orange-500 px-5 py-3 text-sm font-black text-white shadow-xl shadow-red-900/15 transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.03] hover:shadow-red-900/20 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-red-500/25 dark:from-red-700 dark:via-rose-700 dark:to-orange-700 dark:shadow-black/35 sm:px-7 sm:py-3.5 sm:text-base"
                            >
                                <span>{{ $buttonText }}</span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none transition-transform duration-200 group-hover:translate-x-1">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </button>
                        @endif
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

                            @if($lessonNumber !== '')
                                <div class="absolute bottom-5 left-5 flex h-20 w-20 items-center justify-center rounded-[1.35rem] border border-white/25 bg-white/92 text-4xl font-black leading-none text-red-700 shadow-[0_18px_48px_-24px_rgba(0,0,0,0.5)] dark:bg-slate-950/88 dark:text-red-200">
                                    {{ $lessonNumber }}
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
        document.addEventListener("DOMContentLoaded", () => {
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
