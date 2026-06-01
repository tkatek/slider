@php
    $content = is_array($content ?? null) ? $content : [];

    $unit = trim((string)($content['unit'] ?? ''));
    $lesson = trim((string)($content['lesson'] ?? ''));
    $unitNumber = trim((string)($content['unit_number'] ?? ''));
    $lessonNumber = trim((string)($content['lesson_number'] ?? ''));

    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? 'Slide image');

    $buttonText = trim((string)($content['button'] ?? 'Start Session'));

    $nextFallback = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));

    $imageSizeClass = trim((string)($content['image_size'] ?? 'max-w-[380px] sm:max-w-[560px] lg:max-w-[640px]'));
    $imageClass = trim((string)($content['image_class'] ?? 'block w-full h-auto object-contain select-none'));
    $imageStyle = trim((string)($content['image_style'] ?? ''));
@endphp

@extends('slider.simple-layout')

@section('content')
    <div id="introUnitTitleImage" class="font-sans h-[100dvh] overflow-hidden">
        <main class="mx-auto flex h-full w-full max-w-5xl items-start justify-center px-4 pb-4 pt-[7vh] sm:items-center sm:px-8 sm:py-5">
            <section class="w-full p-4 sm:p-6">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    @if($unitNumber !== '')
                        <div id="unitPill"
                             class="inline-flex items-center gap-2 rounded-full px-4 py-2 border border-indigo-500/25 bg-white/70 dark:bg-slate-800/60 backdrop-blur shadow-sm shadow-indigo-500/10 text-[0.72rem] font-black tracking-[0.22em] uppercase select-none pointer-events-none -mb-1 sm:-mb-2">
                            <span class="text-slate-700 dark:text-slate-200">Unit</span>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 text-white text-[0.7rem] leading-none">
                                {{ $unitNumber }}
                            </span>
                        </div>
                    @endif

                    <div id="titleBlock" class="space-y-3 sm:space-y-4">
                        <!-- Unit line (smaller, one line) -->
                        <div class="flex items-center justify-center gap-2 sm:gap-3 flex-nowrap whitespace-nowrap">
                            <h1 id="titleMain" class="font-black leading-none tracking-[-0.03em] text-lg sm:text-xl lg:text-2xl xl:text-3xl">
                                <span class="text-slate-800 dark:text-slate-100">{{ $unit }}</span>
                            </h1>
                        </div>

                        <!-- Lesson line (bigger, more important) -->
                        @if($lessonNumber !== '' || $lesson !== '')
                            <h2 id="titleSub" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 pt-1">
                                @if($lessonNumber !== '')
                                    <span class="inline-flex items-center rounded-full px-4 py-1.5 sm:px-5 sm:py-2 text-[0.8rem] sm:text-[0.95rem] lg:text-[1rem] font-black tracking-[0.14em] uppercase text-white bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 border border-white/20 shadow-sm shadow-indigo-500/20">
                                        Lesson {{ $lessonNumber }}
                                    </span>
                                @endif

                                @if($lesson !== '')
                                    <span class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-black leading-[1.02] tracking-[-0.04em]">
                                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                            {{ $lesson }}
                                        </span>
                                    </span>
                                @endif
                            </h2>
                        @endif
                    </div>

                    @if($image !== '')
                        <div id="heroImage" class="w-full mx-auto mb-2 mt-4 {{ $imageSizeClass }}" @if($imageStyle !== '') style="{{ $imageStyle }}" @endif>
                            <img
                                    id="heroImg"
                                    class="{{ $imageClass }}"
                                    alt="{{ $imageAlt }}"
                                    src="{{ $image }}"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />
                        </div>
                    @endif

                    <button
                            id="startBtn"
                            type="button"
                            data-next-fallback="{{ $nextFallback }}"
                            aria-label="{{ $buttonText }}"
                            class="mt-1 inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 sm:px-7 sm:py-3.5 text-sm sm:text-base font-black text-white border border-white/20 bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 dark:bg-gradient-to-br dark:from-purple-500 dark:via-indigo-600 dark:to-purple-700 shadow-xl shadow-indigo-600/10 transition-transform duration-200 hover:scale-[1.04] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30"
                    >
                        <span>{{ $buttonText }}</span>
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/20 border border-white/25 text-white leading-none">⚡</span>
                    </button>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.getElementById("introUnitTitleImage");
            if (!root) return;

            const els = {
                unit: document.getElementById("unitPill"),
                titleBlock: document.getElementById("titleBlock"),
                hero: document.getElementById("heroImage"),
                btn: document.getElementById("startBtn"),
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
