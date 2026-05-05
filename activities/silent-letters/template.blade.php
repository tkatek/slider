@php
    $pageTitle = $content['page_title']
        ?? trim(($content['title_prefix'] ?? '') . ' ' . ($content['title_highlight'] ?? '') . ' ' . ($content['title_suffix'] ?? ''));

    $imageFit = $content['image_fit'] ?? 'cover';
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-4 py-5 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[2rem] border border-white/70 bg-white/80 px-4 py-6 shadow-[0_24px_70px_-32px_rgba(15,23,42,0.28)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-40 w-40 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                @foreach(($content['decorations'] ?? []) as $decoration)
                    @if(!empty($decoration['emoji']))
                        <div
                                aria-hidden="true"
                                class="pointer-events-none absolute hidden select-none opacity-80 drop-shadow-sm sm:block {{ $decoration['class'] ?? '' }}"
                        >
                            {{ $decoration['emoji'] }}
                        </div>
                    @endif
                @endforeach

                <div class="relative z-10 mx-auto max-w-6xl">
                    <header class="mx-auto max-w-5xl text-center">
                        <h1 class="text-3xl font-black leading-[1.12] tracking-[-0.04em] text-slate-900 dark:text-slate-50 sm:text-4xl lg:text-5xl">
                            @if(!empty($content['title']))
                                <span class="[background-image:var(--top-bar-gradient)] bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            @else
                                <span class="[background-image:var(--top-bar-gradient)] bg-clip-text text-transparent">
                                    {{ $content['title_prefix'] }}
                                </span>

                                <span class="mx-1 text-orange-500 dark:text-orange-400">
                                    {{ $content['title_highlight'] }}
                                </span>

                                <span class="[background-image:var(--top-bar-gradient)] bg-clip-text text-transparent">
                                    {{ $content['title_suffix'] }}
                                </span>
                            @endif
                        </h1>
                    </header>

                    @if(!empty($content['items']))
                        <div class="mt-8 grid grid-cols-2 gap-4 sm:mt-10 sm:gap-5 lg:grid-cols-4 lg:gap-6">
                            @foreach($content['items'] as $item)
                                <article class="rounded-[1.6rem] border border-white/70 bg-white/65 p-3 text-center shadow-[0_16px_40px_-28px_rgba(15,23,42,0.18)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:p-4">
                                    <div class="mx-auto flex aspect-[5/4] w-full items-center justify-center overflow-hidden rounded-[1.35rem] bg-white/75 p-2 dark:bg-slate-900/40 sm:p-3">
                                        <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['alt'] ?? '' }}"
                                                class="h-full w-full rounded-[1.05rem] {{ $imageFit === 'contain' ? 'object-contain' : 'object-cover' }}"
                                                loading="lazy"
                                                draggable="false"
                                        />
                                    </div>

                                    <div class="mt-3 text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 sm:mt-4 sm:text-3xl">
                                        {!! $item['label'] !!}
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif

                    @if(!empty($content['question']))
                        <div class="mt-7 text-center sm:mt-8">
                            <p class="text-xl font-black leading-[1.25] tracking-[-0.03em] text-orange-500 dark:text-orange-400 sm:text-2xl lg:text-[2rem]">
                                {{ $content['question'] }}
                            </p>
                        </div>
                    @endif

                    @if(!empty($content['words']))
                        <div class="mx-auto mt-5 grid max-w-5xl grid-cols-2 gap-x-4 gap-y-4 text-center sm:mt-6 sm:grid-cols-4 lg:grid-cols-5 lg:gap-x-8 lg:gap-y-5">
                            @foreach($content['words'] as $word)
                                <div class="rounded-2xl border border-white/60 bg-white/55 px-3 py-2 shadow-[0_12px_28px_-24px_rgba(15,23,42,0.22)] backdrop-blur-md dark:border-white/10 dark:bg-white/5">
                                    <span class="text-xl font-black leading-none tracking-[-0.04em] text-slate-800 dark:text-slate-50 sm:text-2xl">
                                        {!! $word !!}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        window.resetSlide = function () {};
    </script>
@endsection
