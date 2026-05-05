@php
    $content = [
        'title' => 'Hello, Everyone!',
        'subtitle' => 'Warm up',
        'note_title' => 'Introduce yourself !!',

        'questions' => [
            [
                'emoji' => '👋',
                'text' => 'What’s your name ?',
                'accent' => 'from-indigo-500 to-violet-500',
                'soft' => 'bg-indigo-50/85 dark:bg-indigo-500/10',
                'ring' => 'ring-indigo-200/70 dark:ring-indigo-400/20',
            ],
            [
                'emoji' => '🌍',
                'text' => 'Where are you from?',
                'accent' => 'from-sky-500 to-cyan-500',
                'soft' => 'bg-sky-50/85 dark:bg-sky-500/10',
                'ring' => 'ring-sky-200/70 dark:ring-sky-400/20',
            ],
            [
                'emoji' => '🎂',
                'text' => 'How old are you ?',
                'accent' => 'from-pink-500 to-rose-500',
                'soft' => 'bg-pink-50/85 dark:bg-pink-500/10',
                'ring' => 'ring-pink-200/70 dark:ring-pink-400/20',
            ],
            [
                'emoji' => '⭐',
                'text' => 'What are your hobbies?',
                'accent' => 'from-amber-400 to-orange-500',
                'soft' => 'bg-amber-50/90 dark:bg-amber-500/10',
                'ring' => 'ring-amber-200/80 dark:ring-amber-400/20',
            ],
            [
                'emoji' => '💼',
                'text' => 'What do you do?',
                'accent' => 'from-violet-500 to-fuchsia-500',
                'soft' => 'bg-violet-50/85 dark:bg-violet-500/10',
                'ring' => 'ring-violet-200/70 dark:ring-violet-400/20',
            ],
            [
                'emoji' => '📚',
                'text' => 'Why do you want to learn English?',
                'accent' => 'from-emerald-500 to-teal-500',
                'soft' => 'bg-emerald-50/85 dark:bg-emerald-500/10',
                'ring' => 'ring-emerald-200/70 dark:ring-emerald-400/20',
            ],
        ],

        'decorations' => [
            [
                'emoji' => '⭐',
                'class' => 'left-5 top-5 text-4xl sm:text-5xl lg:text-6xl -rotate-12',
            ],
            [
                'emoji' => '✨',
                'class' => 'left-7 bottom-7 text-3xl sm:text-4xl lg:text-5xl rotate-12',
            ],
            [
                'emoji' => '🎓',
                'class' => 'right-7 bottom-7 text-5xl sm:text-6xl lg:text-7xl -rotate-12',
            ],
            [
                'emoji' => '📚',
                'class' => 'right-8 top-8 text-4xl sm:text-5xl lg:text-6xl rotate-6',
            ],
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $content['title'])

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
                            class="pointer-events-none absolute hidden select-none opacity-80 drop-shadow-sm sm:block {{ $decoration['class'] }}"
                    >
                        {{ $decoration['emoji'] }}
                    </div>
                @endforeach

                <div class="relative z-10 mx-auto max-w-6xl">
                    <header class="mx-auto max-w-4xl text-center">
                        <div class="mx-auto mb-3 inline-flex items-center gap-2 rounded-full border border-white/75 bg-white/75 px-4 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-slate-600 shadow-sm backdrop-blur-md dark:border-white/10 dark:bg-white/5 dark:text-slate-300 sm:hidden">
                            <span>👋</span>
                            <span>{{ $content['subtitle'] }}</span>
                        </div>

                        <h1 class="[background-image:var(--top-bar-gradient)] bg-clip-text pb-2 text-4xl font-black leading-[1.14] tracking-[-0.045em] text-transparent sm:text-5xl sm:leading-[1.14] lg:text-6xl lg:leading-[1.12]">
                            {{ $content['title'] }}
                        </h1>

                        <p class="mt-1 hidden text-2xl font-black leading-tight tracking-[-0.03em] text-slate-800 dark:text-slate-100 sm:block sm:text-3xl lg:text-4xl">
                            {{ $content['subtitle'] }}
                        </p>

                        <div class="mt-4 flex justify-center sm:mt-5">
                            <p class="inline-flex items-center gap-2 rounded-2xl border border-indigo-100/80 bg-gradient-to-r from-indigo-50/95 via-white/90 to-violet-50/95 px-4 py-2.5 text-lg font-black leading-tight tracking-[-0.03em] text-slate-900 shadow-[0_18px_42px_-30px_rgba(79,70,229,0.38)] backdrop-blur-md dark:border-white/10 dark:from-indigo-500/10 dark:via-white/5 dark:to-violet-500/10 dark:text-slate-50 sm:px-6 sm:py-3 sm:text-2xl lg:text-3xl">
                                <span class="text-xl sm:text-2xl">✨</span>
                                <span>{{ $content['note_title'] }}</span>
                            </p>
                        </div>
                    </header>

                    <div class="mx-auto mt-5 grid max-w-5xl grid-cols-1 gap-3 sm:mt-8 sm:gap-4 lg:mt-9 xl:grid-cols-2">
                        @foreach($content['questions'] as $question)
                            <article class="group relative flex min-h-[62px] -translate-y-0.5 items-center gap-3 overflow-hidden rounded-[1.35rem] border border-white/80 bg-white/90 px-3.5 py-3 shadow-[0_20px_52px_-30px_rgba(15,23,42,0.34)] ring-1 ring-white/65 backdrop-blur-md transition duration-300 hover:-translate-y-1.5 hover:scale-[1.015] hover:border-white hover:bg-white hover:shadow-[0_26px_70px_-34px_rgba(15,23,42,0.48)] hover:ring-indigo-200/70 dark:border-white/10 dark:bg-white/10 dark:ring-white/10 dark:hover:border-white/15 dark:hover:bg-white/15 dark:hover:shadow-black/35 dark:hover:ring-white/20 sm:min-h-[68px] sm:gap-4 sm:rounded-[1.45rem] sm:px-5 sm:py-4">
                                <span class="absolute inset-y-3 left-0 w-1 rounded-r-full bg-gradient-to-b {{ $question['accent'] }}"></span>

                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl text-2xl shadow-md ring-1 transition duration-300 group-hover:scale-110 group-hover:rotate-[-3deg] {{ $question['soft'] }} {{ $question['ring'] }} sm:h-12 sm:w-12">
                                    {{ $question['emoji'] }}
                                </span>

                                <div class="min-w-0 flex-1">
                                    <p class="text-base font-black leading-[1.32] tracking-[-0.02em] text-slate-800 dark:text-slate-100 sm:text-lg lg:text-xl">
                                        {{ $question['text'] }}
                                    </p>
                                </div>

                                <span class="hidden h-2.5 w-2.5 shrink-0 rounded-full bg-gradient-to-r shadow-sm transition duration-300 group-hover:scale-125 {{ $question['accent'] }} sm:block"></span>
                            </article>
                        @endforeach
                    </div>

                    <div class="mx-auto mt-5 flex max-w-sm items-center justify-center gap-3 rounded-full border border-white/70 bg-white/45 px-4 py-2.5 text-xl shadow-sm backdrop-blur-md dark:border-white/10 dark:bg-white/5 sm:hidden">
                        <span class="opacity-80">⭐</span>
                        <span class="opacity-80">🎓</span>
                        <span class="opacity-80">📚</span>
                        <span class="opacity-80">✨</span>
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
