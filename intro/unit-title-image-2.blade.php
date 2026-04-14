@php
    $content      = is_array($content ?? null) ? $content : [];

    $unit         = trim((string)($content['unit']         ?? ''));
    $lesson       = trim((string)($content['lesson']       ?? ''));
    $unitNumber   = trim((string)($content['unit_number']  ?? ''));
    $lessonNumber = trim((string)($content['lesson_number']?? ''));

    $image        = (string)($content['image']      ?? '');
    $imageAlt     = (string)($content['image_alt']  ?? 'Slide image');

    $buttonText   = trim((string)($content['button']     ?? 'Start Session'));

    $imageSizeClass = trim((string)($content['image_size']  ?? 'max-w-[300px] sm:max-w-[420px] lg:max-w-[460px]'));
    $imageClass     = trim((string)($content['image_class'] ?? 'block w-full h-full object-contain select-none'));
    $imageStyle     = trim((string)($content['image_style'] ?? ''));
@endphp

@extends('slider.simple-layout')

@section('content')

    <div id="introUnitTitleImageAlt" class="min-h-[100dvh] overflow-x-hidden overflow-y-auto">

        <main class="relative z-10 w-full max-w-6xl px-4 sm:px-8 mx-auto py-8 sm:py-12">
            <section class="grid items-center gap-8 sm:grid-cols-[minmax(220px,42%)_minmax(0,1fr)] sm:gap-10 lg:gap-16 lg:grid-cols-[minmax(320px,460px)_minmax(0,1fr)] min-h-[calc(100dvh-6rem)]">

                {{-- ── LEFT: Image column ── --}}
                <div class="w-full mx-auto {{ $imageSizeClass }}">

                    {{-- Padding creates space for the offset decorative borders --}}
                    <div class="relative p-4">

                        {{-- Decorative border A — solid amber, offset top-left --}}
                        <div class="absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2 border-amber-300/60 pointer-events-none"></div>

                        {{-- Decorative border B — dashed sienna, offset bottom-right --}}
                        <div class="absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed border-orange-300/40 pointer-events-none"></div>

                        {{-- Hero image card --}}
                        <div id="heroImage"
                             class="relative aspect-square w-full overflow-hidden rounded-[22px] shadow-2xl shadow-orange-400/20 dark:shadow-orange-400/10"
                             @if($imageStyle !== '') style="{{ $imageStyle }}" @endif>

                            {{-- Warm gradient background --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-100 via-amber-100 to-yellow-100 dark:from-slate-800 dark:via-orange-950/30 dark:to-slate-700"></div>

                            {{-- Inner ambient glows --}}
                            <div class="absolute -left-10 -top-10 h-36 w-36 rounded-full bg-amber-300/30 blur-2xl dark:bg-amber-300/20"></div>
                            <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-orange-400/20 blur-2xl dark:bg-orange-400/20"></div>

                            <img
                                    id="heroImg"
                                    class="relative z-10 {{ $imageClass }}"
                                    alt="{{ $imageAlt }}"
                                    src="{{ $image }}"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />
                        </div>

                        {{-- Floating lesson badge --}}
                        @if($lessonNumber !== '')
                            <div class="absolute -top-2 -right-2 z-20 w-[76px] h-[76px] rounded-full bg-orange-500 dark:bg-orange-400 text-white dark:text-slate-950 flex flex-col items-center justify-center leading-none shadow-xl shadow-orange-500/25 dark:shadow-orange-400/20">
                                <span class="text-[8px] font-bold tracking-[.15em] uppercase opacity-80">Lesson</span>
                                <span class="text-[1.65rem] font-black mt-0.5 leading-none">{{ $lessonNumber }}</span>
                            </div>
                        @endif

                    </div>
                </div>

                {{-- ── RIGHT: Text column ── --}}
                <div class="text-center sm:text-left">

                    {{-- Gradient divider accent --}}
                    <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-yellow-300 via-orange-400 to-amber-500 mb-7 mx-auto sm:mx-0"></div>

                    <div id="titleBlock" class="space-y-5 sm:space-y-6">

                        {{-- Unit subtitle --}}
                        @if($unit !== '')
                            <div id="titleMain" class="flex flex-wrap items-center justify-center gap-3 sm:justify-start">
                                @if($unitNumber !== '')
                                    <span class="inline-flex items-center rounded-lg bg-stone-800 px-3.5 py-2 text-sm font-black uppercase tracking-[.14em] text-orange-100 shadow-sm shadow-stone-800/15 dark:bg-orange-100 dark:text-stone-900 dark:shadow-orange-100/10">
                                        Unit {{ $unitNumber }}
                                    </span>
                                @endif

                                <h1 class="font-semibold leading-snug text-xl sm:text-2xl lg:text-3xl text-stone-800 dark:text-orange-100">
                                    {{ $unit }}
                                </h1>
                            </div>
                        @endif

                        {{-- Lesson headline --}}
                        @if($lesson !== '')
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl xl:text-[5rem] font-black leading-[.9] tracking-tight">
                            <span class="bg-gradient-to-br from-orange-600 via-orange-500 to-amber-500 bg-clip-text text-transparent dark:from-orange-400 dark:via-orange-300 dark:to-amber-300">
                                {{ $lesson }}
                            </span>
                            </h2>
                        @endif

                    </div>

                    {{-- CTA button --}}
                    <button
                            id="startBtn"
                            type="button"
                            aria-label="{{ $buttonText }}"
                            class="group mt-8 inline-flex items-center justify-center gap-2.5 rounded-lg px-5 py-3 sm:px-6 sm:py-3.5 text-xs sm:text-sm font-black text-white bg-gradient-to-r from-amber-400 via-orange-400 to-orange-500 border border-orange-300/50 shadow-lg shadow-orange-400/20 transition-all duration-200 hover:from-amber-500 hover:via-orange-500 hover:to-orange-400 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-orange-400/25 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-orange-400/30"
                    >
                        <span>{{ $buttonText }}</span>
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-white/20 border border-white/20 text-white leading-none transition-transform duration-200 group-hover:translate-x-1">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    </button>

                </div>

            </section>
        </main>
    </div>

@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("introUnitTitleImageAlt");
            if (!root) return;

            const els = {
                titleBlock: document.getElementById("titleBlock"),
                hero:       document.getElementById("heroImage"),
                btn:        document.getElementById("startBtn"),
            };

            function goToNextSlide() {
                const fallback = els.btn?.dataset?.nextFallback || "slide-2.blade.php";

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

            if (!els.btn) return;

            els.btn.addEventListener("click", () => {
                goToNextSlide();
            });
        });
    </script>
@endsection
