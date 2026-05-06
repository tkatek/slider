@php
    $content = is_array($content ?? null) ? $content : [];

    $title = trim((string)($content['title'] ?? 'Thank you'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $subtitleHtml = preg_replace('/&lt;br\s*\/?&gt;/i', '<br>', e($subtitle));
    $image = (string)($content['image'] ?? '');
    $buttonText = trim((string)($content['button'] ?? 'Start Again'));
@endphp

@extends('slider.simple-layout')

@section('content')
    <main class="relative z-10 mx-auto w-full max-w-6xl px-4 py-8 sm:px-8 sm:py-12">
        <section class="grid min-h-[calc(100dvh-6rem)] items-center gap-8 sm:grid-cols-[minmax(220px,42%)_minmax(0,1fr)] sm:gap-10 lg:grid-cols-[minmax(320px,460px)_minmax(0,1fr)] lg:gap-16">
            @if($image !== '')
                <div class="mx-auto w-full max-w-[300px] sm:max-w-[420px] lg:max-w-[460px]">
                    <div class="relative p-4">
                        <div class="pointer-events-none absolute inset-0 -translate-x-3.5 translate-y-3.5 rounded-[26px] border-2 border-amber-300/60"></div>
                        <div class="pointer-events-none absolute inset-0 translate-x-3.5 -translate-y-3.5 rounded-[26px] border border-dashed border-orange-300/40"></div>

                        <div class="relative aspect-square w-full overflow-hidden rounded-[22px] shadow-2xl shadow-orange-400/20 dark:shadow-orange-400/10">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-100 via-amber-100 to-yellow-100 dark:from-slate-800 dark:via-orange-950/30 dark:to-slate-700"></div>
                            <div class="absolute -left-10 -top-10 h-36 w-36 rounded-full bg-amber-300/30 blur-2xl dark:bg-amber-300/20"></div>
                            <div class="absolute -right-10 -bottom-10 h-40 w-40 rounded-full bg-orange-400/20 blur-2xl dark:bg-orange-400/20"></div>

                            <img
                                    class="relative z-10 block h-full w-full select-none object-contain"
                                    alt=""
                                    src="{{ $image }}"
                                    loading="eager"
                                    decoding="async"
                                    draggable="false"
                            />
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-center sm:text-left">
                <div class="mb-7 h-[3px] w-12 rounded-full bg-gradient-to-r from-yellow-300 via-orange-400 to-amber-500 mx-auto sm:mx-0"></div>

                <h1 class="text-5xl font-black leading-[.9] tracking-tight sm:text-6xl lg:text-7xl xl:text-[5.5rem]">
                    <span class="bg-gradient-to-br from-orange-600 via-orange-500 to-amber-500 bg-clip-text text-transparent dark:from-orange-400 dark:via-orange-300 dark:to-amber-300">
                        {{ $title }}
                    </span>
                </h1>

                @if($subtitle !== '')
                    <p class="mt-5 max-w-2xl text-lg font-bold leading-relaxed text-stone-800 dark:text-orange-100 sm:text-xl lg:text-2xl">
                        {!! nl2br($subtitleHtml) !!}
                    </p>
                @endif

                <button
                        id="restartBtn"
                        type="button"
                        aria-label="{{ $buttonText }}"
                        class="group mt-8 inline-flex items-center justify-center gap-2.5 rounded-lg border border-orange-300/50 bg-gradient-to-r from-amber-400 via-orange-400 to-orange-500 px-5 py-3 text-xs font-black text-white shadow-lg shadow-orange-400/20 transition-all duration-200 hover:-translate-y-0.5 hover:from-amber-500 hover:via-orange-500 hover:to-orange-400 hover:shadow-xl hover:shadow-orange-400/25 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-orange-400/30 sm:px-6 sm:py-3.5 sm:text-sm"
                >
                    <span>{{ $buttonText }}</span>
                    <span class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-white bg-white text-stone-900 leading-none transition-transform duration-200 group-hover:-translate-x-1">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                    </span>
                </button>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const restartBtn = document.getElementById("restartBtn");
            if (!restartBtn) return;

            function isEmbedded() {
                try { return window.top !== window.self; }
                catch (e) { return true; }
            }

            function goToFirstSlide() {
                if (isEmbedded()) {
                    try {
                        if (window.parent && typeof window.parent.goToSlide === "function") {
                            window.parent.goToSlide(0);
                            return;
                        }
                    } catch (e) {}

                    try {
                        if (window.parent && typeof window.parent.firstSlide === "function") {
                            window.parent.firstSlide();
                            return;
                        }
                    } catch (e) {}

                    try {
                        window.parent.postMessage({ type: "BEC_NAV", action: "first" }, "*");
                        return;
                    } catch (e) {}
                }

                window.location.href = "slide-1.blade.php";
            }

            window.resetSlide = () => {};
            restartBtn.addEventListener("click", goToFirstSlide);
        });
    </script>
@endsection
