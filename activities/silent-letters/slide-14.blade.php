@php
    $content = [
        'page_title' => 'Do you have any questions ?',
        'title_first' => 'Do you have any',
        'title_second' => 'questions ?',
        'decorations' => [
            [
                'emoji' => '🤔',
                'class' => 'left-5 top-5 text-4xl -rotate-12 sm:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '❓',
                'class' => 'right-6 top-6 text-5xl rotate-12 sm:text-6xl lg:text-7xl',
            ],
            [
                'emoji' => '💬',
                'class' => 'left-8 bottom-8 text-3xl rotate-12 sm:text-4xl lg:text-5xl',
            ],
            [
                'emoji' => '🙋',
                'class' => 'right-8 bottom-8 text-3xl -rotate-6 sm:text-4xl lg:text-5xl',
            ],
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-8 text-center shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-10 lg:px-8 lg:py-12">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-44 w-44 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                @foreach($content['decorations'] as $decoration)
                    <div
                            aria-hidden="true"
                            class="pointer-events-none absolute hidden select-none opacity-75 drop-shadow-sm sm:block {{ $decoration['class'] }}"
                    >
                        {{ $decoration['emoji'] }}
                    </div>
                @endforeach

                <div class="relative z-10 mx-auto flex max-w-5xl flex-col items-center">
                    <div class="mb-6 inline-flex items-center justify-center gap-3 rounded-full border border-white/70 bg-white/50 px-4 py-2 text-2xl shadow-sm backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:mb-8 sm:text-3xl">
                        <span aria-hidden="true">🤔</span>
                        <span aria-hidden="true">💬</span>
                        <span aria-hidden="true">❓</span>
                    </div>

                    <div class="w-full max-w-5xl rounded-[1.45rem] border border-white/75 bg-white/72 px-5 py-10 shadow-[0_18px_46px_-34px_rgba(15,23,42,0.28)] backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:rounded-[1.8rem] sm:px-8 sm:py-12 lg:px-10 lg:py-14">
                        <h1 class="text-4xl font-black leading-[1.12] tracking-[-0.045em] sm:text-5xl lg:text-6xl">
                            <span class="[background-image:var(--top-bar-gradient)] bg-clip-text text-transparent">
                                {{ $content['title_first'] }}
                            </span>
                            <span class="text-orange-500 dark:text-orange-400">
                                {{ ' ' . $content['title_second'] }}
                            </span>
                        </h1>
                    </div>
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
