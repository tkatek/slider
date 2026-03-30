@php
    $content = is_array($content ?? null) ? $content : [];

    $unit = trim((string)($content['unit'] ?? ''));
    $lesson = trim((string)($content['lesson'] ?? ''));
    $unitNumber = trim((string)($content['unit_number'] ?? ''));
    $lessonNumber = trim((string)($content['lesson_number'] ?? ''));

    $image = (string)($content['image'] ?? '');
    $imageAlt = (string)($content['image_alt'] ?? 'Slide image');

    $buttonText = trim((string)($content['button'] ?? 'Start Session'));
    $nextFallback = (string)($content['next_fallback'] ?? 'slide-2.blade.php');

    $imageSizeClass = trim((string)($content['image_size'] ?? 'max-w-[380px] sm:max-w-[560px] lg:max-w-[640px]'));
    $imageClass = trim((string)($content['image_class'] ?? 'block w-full h-auto object-contain select-none'));
    $imageStyle = trim((string)($content['image_style'] ?? ''));
@endphp
@extends("slider.simple-layout")
@section("style")
@endsection

@section("content")
    <div class="relative min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1200px] items-center px-6 py-10 lg:px-16 lg:py-16">
            <div class="slide-content grid w-full grid-cols-1 items-center gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">
                <div class="text-section z-10 text-center lg:text-left">
                    <div class="unit-badge inline-flex items-center gap-2 rounded-full px-4 py-2 border border-indigo-500/25 bg-white/70 dark:bg-slate-800/60 backdrop-blur shadow-sm shadow-indigo-500/10 text-[0.72rem] font-black tracking-[0.22em] uppercase select-none pointer-events-none opacity-0 transition-all duration-300">
                        <span class="text-slate-700 dark:text-slate-200">Unit</span>
                        @if($unitNumber !== '')
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 text-white text-[0.7rem] leading-none">{{ $unitNumber }}</span>
                        @endif
                    </div>
                    <h2 class="font-black leading-none tracking-[-0.03em] text-lg text-slate-800 dark:text-slate-100 sm:text-xl lg:text-2xl xl:text-3xl mb-3">
                        {{ $unit }}
                    </h2>

                    @if($lessonNumber !== '')
                        <div class="mb-5 inline-flex items-center rounded-full px-4 py-1.5 sm:px-5 sm:py-2 text-[0.8rem] sm:text-[0.95rem] lg:text-[1rem] font-black tracking-[0.14em] uppercase text-white bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 border border-white/20 shadow-sm shadow-indigo-500/20">
                            Lesson {{ $lessonNumber }}
                        </div>
                    @endif

                    <h1 class="hero-title mb-8 text-4xl font-black leading-[1.05] tracking-[-0.04em] opacity-0 sm:text-5xl lg:text-[5.5rem]">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['lesson'] }}
                        </span>
                    </h1>

                    <button id="start-btn"
                            class="mt-1 hidden lg:inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-black text-white border border-white/20 bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 shadow-xl shadow-indigo-600/10 transition-transform duration-200 hover:scale-110 active:scale-95 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30 sm:px-7 sm:py-3.5 sm:text-base lg:mx-0">
                        <span>{{ $buttonText }}</span>
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/20 border border-white/25 text-white leading-none">⚡</span>
                    </button>

                </div>
                <div id="heroImage" class="w-full mx-auto mb-2 mt-4 relative flex items-center justify-center lg:justify-start {{ $imageSizeClass }}" @if($imageStyle !== '') style="{{ $imageStyle }}" @endif>
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

            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tl = gsap.timeline();

            tl.from(".hero-image-wrapper", {
                scale: 0.95,
                opacity: 0,
                duration: 0.8,
                ease: "expo.out"
            });

            tl.to(".unit-badge", {
                opacity: 1,
                y: -10,
                duration: 0.5,
                ease: "back.out(1.7)"
            }, "-=0.6");

            tl.to(".hero-title", {
                opacity: 1,
                y: -15,
                duration: 0.6,
                ease: "power4.out"
            }, "-=0.4");

            tl.to(".hero-subtitle", {
                opacity: 1,
                y: -10,
                duration: 0.5,
                ease: "power3.out"
            }, "-=0.3");

            tl.to(".floating-accent", {
                opacity: 1,
                x: -15,
                duration: 0.6,
                ease: "power4.out"
            }, "-=0.4");

            tl.to("#cta-line", {
                opacity: 1,
                duration: 0.6
            }, "-=0.2");

            // --- EXTERNAL CONTROLS (For Navigation) ---
            window.resetSlide = () => {
                tl.pause(0);
                gsap.set(".hero-title, .hero-subtitle, .unit-badge, #cta-line, .image-section, #start-btn", {
                    clearProps: "all"
                });
                tl.restart();
            };

            // --- CLICK TRANSITION LOGIC ---
            const startBtn = document.getElementById('start-btn');
            startBtn.addEventListener('click', () => {
                const outTl = gsap.timeline({
                    onComplete: () => {
                        if (window.parent && typeof window.parent.nextSlide === 'function') {
                            window.parent.nextSlide();
                        }
                    }
                });

                // Perfect Animation: Disperse effect
                outTl.to(".hero-title", {y: -50, opacity: 0, scale: 1.1, duration: 0.5, ease: "power2.in"})
                    .to(".hero-subtitle", {y: 20, opacity: 0, duration: 0.4}, "-=0.4")
                    .to(".unit-badge", {scale: 0.8, opacity: 0, duration: 0.3}, "-=0.4")
                    .to("#cta-line", {x: -30, opacity: 0, duration: 0.3}, "-=0.3")
                    .to(".image-section", {scale: 0.9, opacity: 0, duration: 0.5, ease: "power3.in"}, "-=0.5")
                    .to(startBtn, {scale: 0, opacity: 0, duration: 0.4, ease: "back.in(1.7)"}, "-=0.5");
            });
        });
    </script>

@endsection
