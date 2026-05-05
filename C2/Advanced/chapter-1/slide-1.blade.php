@php
    $content = [
        'title' => 'Let’s Learn About',
        'subtitle' => 'Silent letters',
        'image' => materialAsset('slider/activities/silent-letters/slide3.webp'),
        'image_alt' => 'Notebook and writing',
        'emojis' => ['📚', '🤫', '✨'],
        'button' => 'Start Session',
        'button_action' => 'next',
        'next_fallback' => 'slide-2.blade.php',
    ];
@endphp

@php
    $content = is_array($content ?? null) ? $content : [];

    $title = trim((string)($content['title'] ?? ''));
    $subtitle = trim((string)($content['subtitle'] ?? ''));
    $buttonText = trim((string)($content['button'] ?? ''));
    $buttonAction = trim((string)($content['button_action'] ?? 'next'));
    $nextFallback = trim((string)($content['next_fallback'] ?? 'slide-2.blade.php'));
    $restartFallback = trim((string)($content['restart_fallback'] ?? 'slide-1.blade.php'));
    $image = (string)($content['image'] ?? materialAsset('slider/activities/silent-letters/slide3.webp'));
    $imageAlt = (string)($content['image_alt'] ?? 'Notebook and writing');
    $emojis = is_array($content['emojis'] ?? null) ? $content['emojis'] : [];
@endphp

@extends('slider.simple-layout')

@section('title', $title)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-5 shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-44 w-44 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                <div class="relative z-10 mx-auto grid max-w-6xl items-center gap-6 rounded-[1.45rem] border border-white bg-white px-4 py-5 shadow-[0_22px_58px_-36px_rgba(15,23,42,0.32)] ring-1 ring-white/80 dark:border-white/10 dark:bg-slate-900 dark:ring-white/10 sm:rounded-[2rem] sm:px-6 sm:py-7 lg:grid-cols-[0.9fr_1.25fr] lg:gap-8 lg:px-8 lg:py-8 xl:gap-10">
                    <aside class="order-2 lg:order-1">
                        <div class="relative mx-auto w-full max-w-[280px] overflow-hidden rounded-[1.7rem] border border-white/70 bg-white/60 p-2.5 shadow-[0_28px_70px_-34px_rgba(15,23,42,0.48)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 dark:shadow-black/45 sm:max-w-[340px] sm:rounded-[2rem] sm:p-3 lg:max-w-[380px]">
                            <div class="pointer-events-none absolute -left-10 -top-10 h-32 w-32 rounded-full opacity-45 blur-3xl [background:var(--ambient-one)]"></div>
                            <div class="pointer-events-none absolute -right-10 bottom-0 h-32 w-32 rounded-full opacity-40 blur-3xl [background:var(--ambient-two)]"></div>

                            <div class="relative overflow-hidden rounded-[1.35rem] border border-white/70 bg-white/70 shadow-[0_18px_45px_-32px_rgba(15,23,42,0.28)] dark:border-white/10 dark:bg-white/10 sm:rounded-[1.75rem]">
                                <img
                                        src="{{ $image }}"
                                        alt="{{ $imageAlt }}"
                                        class="aspect-[4/3] w-full object-cover lg:aspect-square"
                                        loading="lazy"
                                        draggable="false"
                                />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-white/10 dark:from-slate-950/55"></div>
                                <div class="pointer-events-none absolute inset-3 rounded-[1.1rem] border border-white/45 dark:border-white/10 sm:rounded-[1.35rem]"></div>
                            </div>
                        </div>
                    </aside>

                    <section class="order-1 text-center lg:order-2 lg:text-left">
                        @if(count($emojis))
                            <div class="mx-auto mb-5 inline-flex -translate-y-0.5 items-center justify-center gap-3 rounded-full border border-white/80 bg-white px-4 py-2 text-2xl shadow-[0_12px_28px_-18px_rgba(15,23,42,0.30)] ring-1 ring-white/65 backdrop-blur-md dark:border-white/10 dark:bg-slate-800 dark:shadow-[0_14px_34px_-22px_rgba(0,0,0,0.68)] dark:ring-white/10 sm:text-3xl lg:mx-0">
                                @foreach($emojis as $emojiItem)
                                    @php
                                        $emoji = is_array($emojiItem) ? (string)($emojiItem['emoji'] ?? '') : (string)$emojiItem;
                                    @endphp

                                    @if($emoji !== '')
                                        <span aria-hidden="true" class="drop-shadow-md">{{ $emoji }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                        @if($title !== '')
                            <h1 class="[background-image:var(--top-bar-gradient)] bg-clip-text pb-2 text-4xl font-black leading-[1.08] tracking-[-0.045em] text-transparent sm:text-5xl lg:text-6xl">
                                {!! strip_tags($title, '<br>') !!}
                            </h1>
                        @endif

                        @if($subtitle !== '')
                            <p class="mx-auto mt-4 max-w-3xl text-2xl font-black leading-tight tracking-[-0.03em] text-slate-800 dark:text-slate-100 sm:text-3xl lg:mx-0 lg:text-4xl">
                                {!! strip_tags($subtitle, '<br>') !!}
                            </p>
                        @endif

                        @if($buttonText !== '')
                            <button
                                    id="startBtn"
                                    type="button"
                                    aria-label="{{ $buttonText }}"
                                    data-button-action="{{ $buttonAction }}"
                                    data-next-fallback="{{ $nextFallback }}"
                                    data-restart-fallback="{{ $restartFallback }}"
                                    class="mt-7 inline-flex items-center justify-center gap-2.5 rounded-2xl border border-white/25 [background:var(--top-bar-gradient)] px-5 py-3 text-sm font-black text-white shadow-xl shadow-slate-900/10 transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.03] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/25 dark:border-white/10 dark:shadow-black/35 sm:px-7 sm:py-3.5 sm:text-base"
                            >
                                <span>{{ $buttonText }}</span>
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl border border-white/25 bg-white/20 text-white leading-none">
                                    <i class="fa-solid {{ $buttonAction === 'restart' ? 'fa-arrow-rotate-left' : 'fa-arrow-right' }}"></i>
                                </span>
                            </button>
                        @endif
                    </section>
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btn = document.getElementById("startBtn");

            if (!btn) {
                window.resetSlide = () => {};
                return;
            }

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

            function goToFirstSlide() {
                const fallback = btn?.dataset?.restartFallback || "slide-1.blade.php";

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
                    if (window.parent && window.parent !== window) {
                        window.parent.postMessage({ type: "BEC_NAV", action: "first" }, "*");
                        return;
                    }
                } catch (e) {}

                if (fallback) {
                    window.location.href = fallback;
                }
            }

            window.resetSlide = () => {};

            btn.addEventListener("click", () => {
                const action = btn?.dataset?.buttonAction || "next";

                if (action === "restart") {
                    goToFirstSlide();
                    return;
                }

                goToNextSlide();
            });
        });
    </script>
@endsection


