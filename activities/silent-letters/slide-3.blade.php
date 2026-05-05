@php
    $content = [
        'page_title' => 'What are Silent letters?',
        'title' => 'What are Silent letters?',
        'subtitle' => '',
        'points' => [
            [
                'emoji' => '🤫',
                'text' => 'Some letters in words do not make a sounds.',
                'accent' => 'from-indigo-500 to-violet-500',
                'soft' => 'bg-indigo-50/85 dark:bg-indigo-500/10',
                'ring' => 'ring-indigo-200/70 dark:ring-indigo-400/20',
            ],
            [
                'emoji' => '✍️',
                'text' => 'Silent letters are letters that you can’t hear when you say the words, but are there when you write them.',
                'accent' => 'from-sky-500 to-cyan-500',
                'soft' => 'bg-sky-50/85 dark:bg-sky-500/10',
                'ring' => 'ring-sky-200/70 dark:ring-sky-400/20',
            ],
        ],

        'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=900&h=900&auto=format&fit=crop',
        'image_alt' => 'Notebook and writing',

        'decorations' => [
            [
                'emoji' => '📚',
                'class' => 'left-5 top-5 text-4xl sm:text-5xl lg:text-6xl -rotate-12',
            ],
            [
                'emoji' => '✏️',
                'class' => 'right-6 top-7 text-4xl sm:text-5xl lg:text-6xl rotate-12',
            ],
            [
                'emoji' => '✨',
                'class' => 'left-8 bottom-8 text-3xl sm:text-4xl lg:text-5xl rotate-12',
            ],
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-5 shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
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

                <div class="relative z-10 mx-auto grid max-w-6xl items-center gap-6 lg:grid-cols-[0.86fr_1.55fr] lg:gap-8 xl:gap-10">
                    <aside class="hidden lg:flex">
                        <div class="relative mx-auto w-full max-w-[360px] overflow-hidden rounded-[2.2rem] border border-white/70 bg-white/60 p-3 shadow-[0_22px_58px_-38px_rgba(15,23,42,0.35)] backdrop-blur-md dark:border-white/10 dark:bg-white/5">
                            <div class="pointer-events-none absolute -left-10 -top-10 h-32 w-32 rounded-full opacity-45 blur-3xl [background:var(--ambient-one)]"></div>
                            <div class="pointer-events-none absolute -right-10 bottom-0 h-32 w-32 rounded-full opacity-40 blur-3xl [background:var(--ambient-two)]"></div>

                            <div class="relative overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/70 shadow-[0_18px_45px_-32px_rgba(15,23,42,0.28)] dark:border-white/10 dark:bg-white/10">
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="{{ $content['image_alt'] }}"
                                        class="aspect-square w-full object-cover"
                                        loading="lazy"
                                        draggable="false"
                                />

                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-white/10 dark:from-slate-950/55"></div>
                                <div class="pointer-events-none absolute inset-3 rounded-[1.35rem] border border-white/45 dark:border-white/10"></div>
                            </div>
                        </div>
                    </aside>

                    <section class="w-full">
                        <header class="mx-auto max-w-4xl text-center lg:text-left">
                            <h1 class="[background-image:var(--top-bar-gradient)] bg-clip-text pb-2 text-4xl font-black leading-[1.14] tracking-[-0.045em] text-transparent sm:text-5xl sm:leading-[1.14] lg:text-6xl lg:leading-[1.12]">
                                {{ $content['title'] }}
                            </h1>
                        </header>

                        <div class="mx-auto mt-5 grid max-w-4xl grid-cols-1 gap-3 sm:mt-7 sm:gap-4 lg:mx-0 lg:mt-8">
                            @foreach($content['points'] as $index => $point)
                                <article class="group relative -translate-y-0.5 overflow-hidden rounded-[1.45rem] border border-white/80 bg-white/90 px-4 py-4 shadow-[0_20px_52px_-30px_rgba(15,23,42,0.34)] ring-1 ring-white/65 backdrop-blur-md transition duration-300 hover:-translate-y-1.5 hover:scale-[1.015] hover:border-white hover:bg-white hover:shadow-[0_26px_70px_-34px_rgba(15,23,42,0.48)] hover:ring-indigo-200/70 dark:border-white/10 dark:bg-white/10 dark:ring-white/10 dark:hover:border-white/15 dark:hover:bg-white/15 dark:hover:shadow-black/35 dark:hover:ring-white/20 sm:rounded-[1.7rem] sm:px-5 sm:py-5 lg:px-6">
                                    <span class="absolute inset-y-4 left-0 w-1 rounded-r-full bg-gradient-to-b {{ $point['accent'] }}"></span>

                                    <div class="relative z-10 flex items-start gap-3 sm:gap-4">
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl text-2xl shadow-md ring-1 transition duration-300 group-hover:scale-110 group-hover:rotate-[-3deg] {{ $point['soft'] }} {{ $point['ring'] }} sm:h-14 sm:w-14 sm:text-3xl">
                                            {{ $point['emoji'] }}
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <div class="mb-2 inline-flex rounded-full bg-slate-900/5 px-2.5 py-1 text-xs font-black tracking-[0.12em] text-slate-500 shadow-sm transition duration-300 group-hover:bg-slate-900/10 group-hover:text-slate-700 dark:bg-white/10 dark:text-slate-300 dark:group-hover:bg-white/15 dark:group-hover:text-slate-100">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>

                                            <p class="text-base font-black leading-[1.45] tracking-[-0.02em] text-slate-800 dark:text-slate-100 sm:text-lg lg:text-[1.35rem]">
                                                {{ $point['text'] }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mx-auto mt-5 flex max-w-sm items-center justify-center gap-3 rounded-full border border-white/70 bg-white/45 px-4 py-2.5 text-xl shadow-sm backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:hidden">
                            <span class="opacity-80">🤫</span>
                            <span class="opacity-80">✍️</span>
                            <span class="opacity-80">📚</span>
                            <span class="opacity-80">✨</span>
                        </div>
                    </section>
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
