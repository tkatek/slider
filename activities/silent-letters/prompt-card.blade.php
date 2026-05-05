@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? ''));
    $title = trim((string)($content['title'] ?? ''));
    $promptFirst = trim((string)($content['prompt_first'] ?? ''));
    $promptSecond = trim((string)($content['prompt_second'] ?? ''));
    $decorations = is_array($content['decorations'] ?? null) ? $content['decorations'] : [];
    $pillEmojis = is_array($content['pill_emojis'] ?? null) ? $content['pill_emojis'] : [];
@endphp

@extends('slider.simple-layout') 

@section('title', $pageTitle)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-8 text-center shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-10 lg:px-8 lg:py-12">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-44 w-44 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                @foreach($decorations as $decoration)
                    @php
                        $emoji = (string)($decoration['emoji'] ?? '');
                        $class = trim((string)($decoration['class'] ?? ''));
                    @endphp

                    @if($emoji !== '')
                        <div
                                aria-hidden="true"
                                class="pointer-events-none absolute hidden select-none opacity-75 drop-shadow-sm sm:block {{ $class }}"
                        >
                            {{ $emoji }}
                        </div>
                    @endif
                @endforeach

                <div class="relative z-10 mx-auto flex max-w-5xl flex-col items-center">
                    @if(count($pillEmojis))
                        <div class="group mb-5 inline-flex -translate-y-0.5 items-center justify-center gap-3 rounded-full border border-white/80 bg-white/90 px-4 py-2 text-2xl shadow-[0_14px_36px_-28px_rgba(15,23,42,0.34)] ring-1 ring-white/65 backdrop-blur-md transition duration-300 hover:-translate-y-1 hover:scale-[1.015] hover:bg-white hover:shadow-[0_20px_54px_-30px_rgba(15,23,42,0.46)] hover:ring-indigo-200/70 dark:border-white/10 dark:bg-white/10 dark:ring-white/10 dark:hover:bg-white/15 dark:hover:ring-white/20 sm:mb-6 sm:text-3xl">
                            @foreach($pillEmojis as $emoji)
                                <span aria-hidden="true" class="transition duration-300 group-hover:scale-110 group-hover:rotate-[-3deg]">{{ $emoji }}</span>
                            @endforeach
                        </div>
                    @endif

                    @if($title !== '')
                        <h1 class="[background-image:var(--top-bar-gradient)] bg-clip-text pb-2 text-4xl font-black leading-[1.08] tracking-[-0.045em] text-transparent sm:text-5xl lg:text-6xl">
                            {{ $title }}
                        </h1>
                    @endif

                    @if($promptFirst !== '' || $promptSecond !== '')
                        <div class="{{ $title !== '' ? 'mt-7 sm:mt-8' : '' }} group w-full max-w-4xl -translate-y-0.5 rounded-[1.45rem] border border-white/80 bg-white/90 px-5 py-7 shadow-[0_20px_52px_-30px_rgba(15,23,42,0.34)] ring-1 ring-white/65 backdrop-blur-md transition duration-300 hover:-translate-y-1.5 hover:scale-[1.015] hover:border-white hover:bg-white hover:shadow-[0_26px_70px_-34px_rgba(15,23,42,0.48)] hover:ring-indigo-200/70 dark:border-white/10 dark:bg-white/10 dark:ring-white/10 dark:hover:border-white/15 dark:hover:bg-white/15 dark:hover:shadow-black/35 dark:hover:ring-white/20 sm:rounded-[1.8rem] sm:px-7 sm:py-8 lg:px-9 lg:py-10">
                            <p class="text-3xl font-black leading-[1.25] tracking-[-0.035em] sm:text-4xl lg:text-5xl">
                                @if($promptFirst !== '')
                                    <span class="text-orange-500 transition duration-300 group-hover:text-orange-600 dark:text-orange-400 dark:group-hover:text-orange-300">
                                        {{ $promptFirst }}
                                    </span>
                                @endif

                                @if($promptSecond !== '')
                                    <span class="text-slate-800 transition duration-300 group-hover:text-slate-950 dark:text-slate-100 dark:group-hover:text-white">
                                        {{ $promptFirst !== '' ? ' ' : '' }}{{ $promptSecond }}
                                    </span>
                                @endif
                            </p>
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
