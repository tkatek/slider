@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $get = static fn (string $key, string $default = ''): string =>
        trim((string) ($content[$key] ?? $default));

    $type = strtolower($get('type', 'intro'));
    $type = in_array($type, ['intro', 'outro'], true) ? $type : 'intro';
    $isOutro = $type === 'outro';

    $unit = $get('unit');
    $unitNumber = $get('unit_number');
    $lesson = $get('lesson');
    $lessonNumber = $get('lesson_number');

    $title = $get('title', $isOutro ? 'Excellent Work!' : '');
    $subtitle = $get('subtitle');
    $heading = $isOutro ? $title : ($lesson !== '' ? $lesson : $title);

    $image = $get('image');
    $imageAlt = $get('image_alt');

    $allowedImagePositions = [
        'center',
        'top',
        'bottom',
        'left',
        'right',
        'top left',
        'top right',
        'bottom left',
        'bottom right',
    ];

    $imagePosition = strtolower($get('image_position', 'center'));
    $imagePosition = in_array($imagePosition, $allowedImagePositions, true)
        ? $imagePosition
        : 'center';

    $buttonText = $get('button', $isOutro ? 'Start Again' : 'Start Session');
    $nextFallback = $get('next_fallback', 'slide-2.blade.php');
    $firstFallback = $get('first_fallback', 'slide-1.blade.php');
    $fallback = $isOutro ? $firstFallback : $nextFallback;
    $action = $isOutro ? 'first' : 'next';

    // Use a concrete trusted origin in production when the parent origin is known.
    $parentOrigin = $get('parent_origin', '*');

    $pageTitle = $isOutro
        ? $heading
        : trim(implode(' ', array_filter([
            $unitNumber !== '' ? 'Unit ' . $unitNumber : null,
            $unit !== '' ? $unit : null,
            $lessonNumber !== '' ? 'Lesson ' . $lessonNumber : null,
            $lesson !== '' ? $lesson : null,
        ])));

    $pageTitle = $pageTitle !== '' ? $pageTitle : $heading;

    // Keep the layout's gradients; use its theme name for the surrounding accents.
    $introOutroPrimaryColor = $theme['primary_color'] ?? 'bg-gradient-to-br from-indigo-600 to-blue-500';
    $introOutroButtonColor = $theme['button_primary_color'] ?? 'bg-gradient-to-tr from-blue-500 via-indigo-500 to-purple-600';
    $introOutroPalettes = [
        'default' => [
            'surface' => 'bg-slate-50 dark:bg-slate-950 dark:text-slate-50',
            'glow_light_primary' => 'bg-indigo-100/65',
            'glow_light_secondary' => 'bg-blue-50/90',
            'glow_dark_primary' => 'bg-indigo-600/15',
            'glow_dark_secondary' => 'bg-blue-500/10',
            'glow_dark_center' => 'bg-purple-500/5',
            'badge' => 'bg-indigo-100 text-indigo-900 dark:bg-indigo-950 dark:text-indigo-50 dark:ring-indigo-800/80',
            'unit' => 'dark:text-indigo-50',
            'image' => 'border-indigo-100 ring-indigo-100/70 shadow-[0_20px_55px_-38px_rgba(79,70,229,0.45)] dark:border-indigo-700 dark:bg-slate-900 dark:ring-indigo-950',
            'lesson' => 'bg-indigo-600 dark:bg-indigo-300 dark:text-indigo-950',
            'subtitle' => 'dark:text-slate-400',
            'button' => 'shadow-[0_16px_34px_-24px_rgba(79,70,229,0.75)] focus-visible:ring-indigo-300/35 dark:shadow-[0_16px_34px_-20px_rgba(99,102,241,0.5)] dark:focus-visible:ring-indigo-500/35',
        ],
        'orange' => [
            'surface' => 'bg-orange-50 dark:bg-stone-950 dark:text-orange-50',
            'glow_light_primary' => 'bg-orange-100/65',
            'glow_light_secondary' => 'bg-amber-50/90',
            'glow_dark_primary' => 'bg-orange-600/15',
            'glow_dark_secondary' => 'bg-amber-500/10',
            'glow_dark_center' => 'bg-orange-500/5',
            'badge' => 'bg-orange-100 text-orange-900 dark:bg-orange-950 dark:text-orange-50 dark:ring-orange-800/80',
            'unit' => 'dark:text-orange-50',
            'image' => 'border-orange-200 ring-orange-100/70 shadow-[0_20px_55px_-38px_rgba(234,88,12,0.45)] dark:border-orange-700 dark:bg-stone-900 dark:ring-orange-950',
            'lesson' => 'bg-orange-600 dark:bg-orange-300 dark:text-orange-950',
            'subtitle' => 'dark:text-stone-400',
            'button' => 'shadow-[0_16px_34px_-24px_rgba(234,88,12,0.75)] focus-visible:ring-orange-300/35 dark:shadow-[0_16px_34px_-20px_rgba(249,115,22,0.5)] dark:focus-visible:ring-orange-500/35',
        ],
        'green' => [
            'surface' => 'bg-emerald-50 dark:bg-slate-950 dark:text-emerald-50',
            'glow_light_primary' => 'bg-emerald-100/65',
            'glow_light_secondary' => 'bg-green-50/90',
            'glow_dark_primary' => 'bg-emerald-700/15',
            'glow_dark_secondary' => 'bg-green-600/10',
            'glow_dark_center' => 'bg-emerald-500/5',
            'badge' => 'bg-emerald-100 text-emerald-900 dark:bg-emerald-950 dark:text-emerald-50 dark:ring-emerald-800/80',
            'unit' => 'dark:text-emerald-50',
            'image' => 'border-emerald-200 ring-emerald-100/70 shadow-[0_20px_55px_-38px_rgba(4,120,87,0.45)] dark:border-emerald-700 dark:bg-slate-900 dark:ring-emerald-950',
            'lesson' => 'bg-emerald-700 dark:bg-emerald-300 dark:text-emerald-950',
            'subtitle' => 'dark:text-slate-400',
            'button' => 'shadow-[0_16px_34px_-24px_rgba(4,120,87,0.75)] focus-visible:ring-emerald-300/35 dark:shadow-[0_16px_34px_-20px_rgba(5,150,105,0.5)] dark:focus-visible:ring-emerald-500/35',
        ],
        'rose' => [
            'surface' => 'bg-[#FFFDFE] dark:bg-[#100A0D] dark:text-[#FFF7FA]',
            'glow_light_primary' => 'bg-[#FCE7F3]/65',
            'glow_light_secondary' => 'bg-[#FDF2F8]/90',
            'glow_dark_primary' => 'bg-[rgba(112,26,61,0.16)]',
            'glow_dark_secondary' => 'bg-[rgba(157,23,77,0.12)]',
            'glow_dark_center' => 'bg-[rgba(190,24,93,0.045)]',
            'badge' => 'bg-[#FCE7F3] text-[#701A3D] dark:bg-[#32111F] dark:text-[#FFF7FA] dark:ring-[#701A3D]/80',
            'unit' => 'dark:text-[#FFF7FA]',
            'image' => 'border-[#E8DADD] ring-[#FCE7F3]/70 shadow-[0_20px_55px_-38px_rgba(112,26,61,0.45)] dark:border-[#9D174D] dark:bg-[#1B0D14] dark:ring-[#32111F]',
            'lesson' => 'bg-[#D83F69] dark:bg-[#F9A8D4] dark:text-[#701A3D]',
            'subtitle' => 'dark:text-[#B9A7AE]',
            'button' => 'shadow-[0_16px_34px_-24px_rgba(112,26,61,0.75)] focus-visible:ring-[#F9A8D4]/35 dark:shadow-[0_16px_34px_-20px_rgba(157,23,77,0.5)] dark:focus-visible:ring-[#BE185D]/35',
        ],
    ];
    $introOutroColors = $introOutroPalettes[$theme['name'] ?? 'default'] ?? $introOutroPalettes['default'];
@endphp

@section('title', $pageTitle)

@section('content')
    <div class="relative min-h-dvh overflow-x-hidden font-sans text-slate-950 transition-colors duration-300 {{ $introOutroColors['surface'] }}">
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            {{-- Light-mode background glows --}}
            <div class="absolute -left-52 -top-40 h-[30rem] w-[30rem] rounded-full blur-[110px] dark:hidden {{ $introOutroColors['glow_light_primary'] }}"></div>
            <div class="absolute -bottom-48 -right-52 h-[34rem] w-[34rem] rounded-full blur-[120px] dark:hidden {{ $introOutroColors['glow_light_secondary'] }}"></div>
            <div class="absolute right-[12%] top-[10%] h-48 w-48 rounded-full bg-white/75 blur-[85px] dark:hidden"></div>

            {{-- Dark-mode background glows --}}
            <div class="absolute -left-40 -top-44 hidden h-[32rem] w-[32rem] rounded-full blur-[140px] dark:block {{ $introOutroColors['glow_dark_primary'] }}"></div>
            <div class="absolute -bottom-52 -right-44 hidden h-[34rem] w-[34rem] rounded-full blur-[150px] dark:block {{ $introOutroColors['glow_dark_secondary'] }}"></div>
            <div class="absolute left-1/2 top-[44%] hidden h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full blur-[125px] dark:block {{ $introOutroColors['glow_dark_center'] }}"></div>
        </div>

        <main class="relative z-10 flex min-h-dvh items-start justify-center px-5 py-[clamp(0.75rem,2dvh,2rem)] sm:px-8">
            <section class="mx-auto my-auto flex w-full max-w-[860px] flex-col items-center justify-center text-center">
                @if(!$isOutro && ($unitNumber !== '' || $unit !== ''))
                    <div class="mb-[clamp(0.6rem,1.7dvh,1.5rem)] flex flex-wrap items-center justify-center gap-x-3 gap-y-2">
                        @if($unitNumber !== '')
                            <span class="inline-flex items-center justify-center rounded-full px-4 py-2 text-[0.72rem] font-black uppercase tracking-[0.17em] transition-colors duration-300 dark:ring-1 sm:px-5 sm:text-[0.78rem] {{ $introOutroColors['badge'] }}">
                                Unit {{ $unitNumber }}
                            </span>
                        @endif

                        @if($unit !== '')
                            <p class="text-xl font-black leading-tight tracking-[-0.03em] text-slate-700 transition-colors duration-300 sm:text-2xl lg:text-[1.75rem] {{ $introOutroColors['unit'] }}">
                                {{ $unit }}
                            </p>
                        @endif
                    </div>
                @elseif($isOutro)
                    <span class="mb-[clamp(0.6rem,1.7dvh,1.5rem)] inline-flex items-center justify-center rounded-full px-4 py-2 text-[0.72rem] font-black uppercase tracking-[0.17em] transition-colors duration-300 dark:ring-1 sm:px-5 sm:text-[0.78rem] {{ $introOutroColors['badge'] }}">
                        Session complete
                    </span>
                @endif

                @if($image !== '')
                    <div class="w-[min(92vw,46dvh,28rem)] shrink-0">
                        <div class="aspect-[5/4] overflow-hidden rounded-[1.65rem] border-[3px] bg-white ring-[7px] transition-colors duration-300 dark:shadow-[0_22px_60px_-36px_rgba(0,0,0,0.85)] {{ $introOutroColors['image'] }}">
                            <img
                                    class="h-full w-full object-cover"
                                    style="object-position: {{ $imagePosition }};"
                                    src="{{ $image }}"
                                    alt="{{ $imageAlt }}"
                                    loading="eager"
                                    fetchpriority="high"
                                    decoding="async"
                                    draggable="false"
                            />
                        </div>
                    </div>
                @endif

                <div class="mt-[clamp(0.7rem,2dvh,1.75rem)] flex w-full flex-col items-center">
                    @if(!$isOutro && $lessonNumber !== '')
                        <span class="mb-[clamp(0.4rem,0.9dvh,0.7rem)] inline-flex items-center justify-center rounded-full px-4 py-1.5 text-[0.68rem] font-black uppercase tracking-[0.16em] text-white shadow-sm transition-colors duration-300 sm:px-5 sm:text-xs {{ $introOutroColors['lesson'] }}">
                            Lesson {{ $lessonNumber }}
                        </span>
                    @endif

                    @if($heading !== '')
                        <h1
                                class="break-words {{ $introOutroPrimaryColor }} bg-clip-text pb-[0.12em] font-black text-transparent tracking-[-0.045em] transition-colors duration-300 {{ $isOutro
                                ? 'max-w-[700px] text-[clamp(2.55rem,5vw,5.25rem)] leading-[1.05]'
                                : 'max-w-[650px] text-[clamp(2.15rem,4.1vw,4.15rem)] leading-[1.05]' }}"
                                style="text-wrap: balance;"
                        >
                            {{ $heading }}
                        </h1>
                    @endif

                    @if($subtitle !== '')
                        <p
                                class="mt-[clamp(0.4rem,1dvh,0.8rem)] max-w-2xl text-[clamp(0.85rem,1.6dvh,1.05rem)] font-medium leading-[1.45] text-slate-500 transition-colors duration-300 {{ $introOutroColors['subtitle'] }}"
                                style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;"
                        >
                            {!! nl2br(e($subtitle)) !!}
                        </p>
                    @endif

                    @if($buttonText !== '')
                        <a
                                id="introOutroLink"
                                href="{{ $fallback !== '' ? $fallback : '#' }}"
                                data-action="{{ $action }}"
                                data-parent-origin="{{ $parentOrigin }}"
                                class="group mt-[clamp(1rem,2.4dvh,1.75rem)] inline-flex min-w-[185px] items-center justify-center gap-3 rounded-2xl {{ $introOutroButtonColor }} px-6 py-[clamp(0.65rem,1.4dvh,0.85rem)] text-sm font-extrabold text-white transition duration-200 hover:-translate-y-0.5 hover:brightness-110 focus-visible:outline-none focus-visible:ring-4 motion-reduce:transform-none motion-reduce:transition-none sm:min-w-[195px] sm:text-base {{ $introOutroColors['button'] }}"
                        >
                            <span>{{ $buttonText }}</span>

                            <span
                                    class="text-lg leading-none transition-transform duration-200 motion-reduce:transition-none {{ $isOutro ? 'group-hover:-rotate-12' : 'group-hover:translate-x-1' }}"
                                    aria-hidden="true"
                            >
                                {{ $isOutro ? '↻' : '→' }}
                            </span>
                        </a>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const link = document.getElementById('introOutroLink');

            if (!link) {
                return;
            }

            link.addEventListener('click', (event) => {
                if (window.parent === window) {
                    return; // Use the normal href fallback outside an iframe.
                }

                const action = link.dataset.action;
                const parentOrigin = link.dataset.parentOrigin || '*';
                let handledByDirectApi = false;

                // Same-origin integrations can expose direct navigation methods.
                try {
                    if (action === 'next' && typeof window.parent.nextSlide === 'function') {
                        window.parent.nextSlide();
                        handledByDirectApi = true;
                    } else if (action === 'first' && typeof window.parent.goToSlide === 'function') {
                        window.parent.goToSlide(0);
                        handledByDirectApi = true;
                    }
                } catch (_) {
                    // Cross-origin property access is expected to fail; postMessage still works.
                }

                if (handledByDirectApi) {
                    event.preventDefault();
                    return;
                }

                try {
                    window.parent.postMessage(
                        {
                            type: 'BEC_NAV',
                            action,
                        },
                        parentOrigin
                    );

                    event.preventDefault();
                } catch (error) {
                    // Keep the native href fallback when messaging cannot be used.
                    console.warn('Parent navigation is unavailable.', error);
                }
            });
        });
    </script>
@endsection
