@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $type = trim((string) ($content['type'] ?? 'intro'));
    $isOutro = $type === 'outro';

    $unit = trim((string) ($content['unit'] ?? ''));
    $lesson = trim((string) ($content['lesson'] ?? ''));
    $unitNumber = trim((string) ($content['unit_number'] ?? ''));
    $lessonNumber = trim((string) ($content['lesson_number'] ?? ''));

    $title = trim((string) ($content['title'] ?? ($isOutro ? 'Thank You!' : '')));
    $subtitle = trim((string) ($content['subtitle'] ?? ''));
    $subtitleHtml = preg_replace('/&lt;br\s*\/?&gt;/i', '<br>', e($subtitle));

    $badge = trim((string) ($content['badge'] ?? ($isOutro ? 'Lesson Complete' : 'English Lesson')));

    $image = (string) ($content['image'] ?? '');
    $imageAlt = (string) ($content['image_alt'] ?? 'Slide image');

    $buttonText = trim((string) ($content['button'] ?? ($isOutro ? 'Start Again' : 'Start Session')));

    $nextFallback = trim((string) ($content['next_fallback'] ?? 'slide-2.blade.php'));
    $firstFallback = trim((string) ($content['first_fallback'] ?? 'slide-1.blade.php'));

    $imageSizeClass = trim((string) ($content['image_size'] ?? 'max-w-[260px] sm:max-w-[320px] md:max-w-[350px] lg:max-w-[400px] xl:max-w-[430px]'));
    $imageClass = trim((string) ($content['image_class'] ?? 'relative z-10 block h-full w-full select-none object-cover'));
    $imageStyle = trim((string) ($content['image_style'] ?? ''));
    $imageAspectRatio = trim((string) ($content['image_aspect_ratio'] ?? '1 / 1'));

    $outerShape = 'rounded-[2rem] rounded-tr-[5rem] rounded-bl-[4rem]';
    $innerShape = 'rounded-[1.55rem] rounded-tr-[4rem] rounded-bl-[3.2rem]';

    $lessonClass = trim((string) ($content['lesson_class'] ?? 'text-[1.9rem] sm:text-[2.35rem] md:text-[2.8rem] lg:text-[3.25rem] xl:text-[3.75rem]'));
    $lessonAllowHtml = !empty($content['lesson_allow_html']);

    $pageTitle = $isOutro
        ? $title
        : trim(($unitNumber !== '' ? 'Unit ' . $unitNumber . ' ' : '') . $unit . ' ' . ($lessonNumber !== '' ? 'Lesson ' . $lessonNumber . ' ' : '') . $lesson);

    $hasImage = $image !== '';
@endphp

@section('title', $pageTitle)

@section('content')
    <div id="introOutroGreenOrbit" class="min-h-[100dvh] overflow-x-hidden overflow-y-auto font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-4 py-5 sm:px-6 sm:py-6 lg:px-8">
            <section class="relative w-full overflow-hidden">

                <div class="pointer-events-none absolute left-0 top-1/2 hidden h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full bg-emerald-200/30 blur-3xl dark:bg-emerald-500/10 lg:block"></div>
                <div class="pointer-events-none absolute bottom-4 right-12 hidden h-64 w-64 rounded-full bg-green-200/25 blur-3xl dark:bg-green-500/10 lg:block"></div>

                <div class="relative z-10 mx-auto grid min-h-[min(620px,calc(100dvh-2rem))] w-full max-w-6xl grid-cols-1 items-center gap-7 px-5 py-6 sm:gap-8 sm:px-8 sm:py-8 md:grid-cols-[minmax(0,0.9fr)_minmax(280px,0.85fr)] md:gap-8 md:px-8 md:py-7 lg:grid-cols-[minmax(0,0.9fr)_minmax(330px,0.9fr)] lg:gap-10 lg:px-10 lg:py-8 xl:gap-12 xl:px-12">

                    <div class="order-1 flex w-full flex-col items-center text-center md:-translate-y-3 md:items-start md:text-left lg:-translate-y-4 {{ $hasImage ? '' : 'md:col-span-2 md:mx-auto md:max-w-4xl md:items-center md:text-center' }}">
                        <div id="titleBlock" class="relative w-full max-w-3xl">
                            @if(!$isOutro)
                                <div class="space-y-5 sm:space-y-6 lg:space-y-7">
                                    @if($unit !== '' || $unitNumber !== '' || $badge !== '')
                                        <div class="flex flex-wrap items-center justify-center gap-2.5 md:justify-start {{ $hasImage ? '' : 'md:justify-center' }}">
                                            @if($unitNumber !== '')
                                                <span class="inline-flex items-center rounded-full bg-[#064E3B] px-4 py-2 text-[0.72rem] font-black uppercase tracking-[0.17em] text-white shadow-[0_14px_28px_-18px_rgba(6,78,59,0.9)] ring-1 ring-emerald-950/10 dark:bg-emerald-300 dark:text-emerald-950 dark:ring-emerald-200/20 sm:px-5 sm:py-2 sm:text-[0.78rem]">
                                                    Unit {{ $unitNumber }}
                                                </span>
                                            @endif

                                            @if($unit !== '' || $badge !== '')
                                                <span class="hidden h-1.5 w-1.5 rounded-full bg-emerald-500/70 dark:bg-emerald-300/70 sm:inline-flex"></span>

                                                <span class="text-lg font-black leading-tight tracking-[-0.03em] text-emerald-950 dark:text-emerald-50 sm:text-xl lg:text-2xl">
                                                    {{ $unit !== '' ? $unit : $badge }}
                                                </span>
                                            @endif

                                            @if($title !== '' && $title !== $lesson && $title !== $unit)
                                                <span class="basis-full text-base font-black leading-tight tracking-[-0.02em] text-emerald-950/80 dark:text-emerald-50/80 sm:text-lg lg:text-xl">
                                                    {{ $title }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif

                                    @if($lessonNumber !== '' || $lesson !== '')
                                        <div class="flex flex-col items-center gap-3 md:items-start {{ $hasImage ? '' : 'md:items-center' }}">
                                            @if($lessonNumber !== '')
                                                <div class="inline-flex items-center rounded-full border border-emerald-300/60 bg-white/85 px-3.5 py-1.5 shadow-sm shadow-emerald-900/5 backdrop-blur dark:border-emerald-300/20 dark:bg-emerald-950/45">
                                                    <span class="text-[0.7rem] font-black uppercase tracking-[0.16em] text-emerald-700 dark:text-emerald-100 sm:text-[0.76rem]">
                                                        Lesson {{ $lessonNumber }}
                                                    </span>
                                                </div>
                                            @endif

                                            @if($lesson !== '')
                                                <h1 class="{{ $lessonClass }} font-black leading-[1.02] tracking-[-0.045em]">
                                                    <span class="bg-gradient-to-br from-[#064E3B] via-[#047857] to-[#10B981] bg-clip-text text-transparent dark:from-emerald-50 dark:via-emerald-200 dark:to-green-300">
                                                        @if($lessonAllowHtml)
                                                            {!! $lesson !!}
                                                        @else
                                                            {{ $lesson }}
                                                        @endif
                                                    </span>
                                                </h1>
                                            @endif
                                        </div>
                                    @endif

                                    @if($subtitle !== '')
                                        <p class="mx-auto max-w-2xl text-base font-semibold leading-[1.6] text-emerald-950/70 dark:text-emerald-50/75 md:mx-0 md:text-lg {{ $hasImage ? '' : 'md:mx-auto' }}">
                                            {!! nl2br($subtitleHtml) !!}
                                        </p>
                                    @endif
                                </div>
                            @else
                                <div class="space-y-4">
                                    @if($badge !== '')
                                        <div class="flex justify-center md:justify-start {{ $hasImage ? '' : 'md:justify-center' }}">
                                            <span class="inline-flex items-center rounded-full bg-[#064E3B] px-4 py-2 text-[0.7rem] font-black uppercase tracking-[0.16em] text-white shadow-sm shadow-emerald-900/10 dark:bg-emerald-300 dark:text-emerald-950 sm:text-[0.76rem]">
                                                {{ $badge }}
                                            </span>
                                        </div>
                                    @endif

                                    <h1 class="text-4xl font-black leading-[.95] tracking-tight sm:text-5xl lg:text-6xl xl:text-7xl">
                                        <span class="bg-gradient-to-br from-[#064E3B] via-[#047857] to-[#10B981] bg-clip-text text-transparent dark:from-emerald-50 dark:via-emerald-200 dark:to-green-300">
                                            {{ $title }}
                                        </span>
                                    </h1>

                                    @if($subtitle !== '')
                                        <p class="mx-auto max-w-2xl text-lg font-bold leading-relaxed text-emerald-950/75 dark:text-emerald-50/80 sm:text-xl md:mx-0 lg:text-2xl {{ $hasImage ? '' : 'md:mx-auto' }}">
                                            {!! nl2br($subtitleHtml) !!}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @if($buttonText !== '')
                            <div class="mt-8 flex w-full justify-center md:mt-10 md:justify-start {{ $hasImage ? '' : 'md:justify-center' }}">
                                <button
                                        id="introOutroBtn"
                                        type="button"
                                        data-type="{{ $type }}"
                                        data-next-fallback="{{ $nextFallback }}"
                                        data-first-fallback="{{ $firstFallback }}"
                                        aria-label="{{ $buttonText }}"
                                        class="group inline-flex w-full max-w-[250px] items-center justify-center gap-3 rounded-[1.15rem] bg-gradient-to-r from-[#064E3B] via-[#047857] to-[#059669] px-5 py-3 text-sm font-black text-white shadow-[0_20px_45px_-22px_rgba(6,78,59,0.85)] transition-all duration-200 hover:-translate-y-0.5 hover:scale-[1.02] hover:from-[#053E30] hover:via-[#03624E] hover:to-[#047857] active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-emerald-400/35 dark:from-emerald-300 dark:via-emerald-300 dark:to-green-400 dark:text-emerald-950 dark:hover:from-emerald-200 dark:hover:via-emerald-200 dark:hover:to-green-300 sm:w-auto sm:px-7 sm:py-3.5 sm:text-base"
                                >
                                    <span>{{ $buttonText }}</span>
                                    <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-white/20 bg-white/15 text-white leading-none transition-transform duration-200 dark:border-emerald-950/10 dark:bg-emerald-950/10 dark:text-emerald-950 {{ $isOutro ? 'group-hover:-translate-x-1' : 'group-hover:translate-x-1' }}">
                                        <i class="fa-solid {{ $isOutro ? 'fa-arrow-rotate-left' : 'fa-arrow-right' }}"></i>
                                    </span>
                                </button>
                            </div>
                        @endif
                    </div>

                    @if($hasImage)
                        <div class="order-2 flex w-full items-center justify-center md:-translate-y-2">
                            <div class="relative mx-auto flex w-full max-w-[350px] items-center justify-center sm:max-w-[420px] md:max-w-[390px] lg:max-w-[450px]">
                                <div class="relative z-10 w-full {{ $imageSizeClass }}" @if($imageStyle !== '') style="{{ $imageStyle }}" @endif>
                                    <div class="pointer-events-none absolute -inset-4 {{ $outerShape }} bg-emerald-200/25 blur-2xl dark:bg-emerald-500/10"></div>
                                    <div class="pointer-events-none absolute -inset-2 {{ $outerShape }} border border-emerald-300/45 dark:border-emerald-300/15"></div>

                                    <div class="relative overflow-hidden {{ $outerShape }} border border-white/80 bg-white/80 p-3 shadow-[0_30px_75px_-45px_rgba(6,78,59,0.55)] ring-1 ring-emerald-100/90 backdrop-blur-xl dark:border-emerald-300/10 dark:bg-slate-950/35 dark:ring-emerald-300/10">
                                        <div class="relative overflow-hidden {{ $innerShape }}" style="aspect-ratio: {{ $imageAspectRatio }};">
                                            <div class="absolute inset-0 z-10 bg-gradient-to-br from-white/10 via-transparent to-emerald-100/10 dark:from-white/5 dark:to-emerald-400/5"></div>

                                            <img
                                                    id="heroImg"
                                                    class="{{ $imageClass }} h-full w-full object-cover"
                                                    alt="{{ $imageAlt }}"
                                                    src="{{ $image }}"
                                                    loading="eager"
                                                    decoding="async"
                                                    draggable="false"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    if (window.parent && typeof window.parent.firstSlide === 'function') {
                        window.parent.firstSlide();
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