<?php
$content = [
    'page_title' => 'Tips for Learning English',
    'title'      => 'Tips for Learning English',
    'subtitle'   => 'Use these simple tips to improve your English every day.',

    'tips' => [
        [
            'emoji' => '🎧',
            'title' => 'Listen Every Day',
            'text'  => 'Listen to English every day through videos, podcasts, or learner websites.',
            'color' => 'from-blue-500 to-cyan-500',
            'bg'    => 'bg-blue-50 dark:bg-blue-500/10',
            'ring'  => 'ring-blue-200 dark:ring-blue-400/20',
        ],
        [
            'emoji' => '🧠',
            'title' => 'Learn Real Meaning',
            'text'  => 'Learn new words and common phrases to understand real meaning.',
            'color' => 'from-violet-500 to-purple-500',
            'bg'    => 'bg-violet-50 dark:bg-violet-500/10',
            'ring'  => 'ring-violet-200 dark:ring-violet-400/20',
        ],
        [
            'emoji' => '📺',
            'title' => 'Watch Real Situations',
            'text'  => 'Watch shows to see how expressions are used in real situations.',
            'color' => 'from-rose-500 to-pink-500',
            'bg'    => 'bg-rose-50 dark:bg-rose-500/10',
            'ring'  => 'ring-rose-200 dark:ring-rose-400/20',
        ],
        [
            'emoji' => '📚',
            'title' => 'Read to Write Better',
            'text'  => 'Read stories or texts to improve writing.',
            'color' => 'from-emerald-500 to-teal-500',
            'bg'    => 'bg-emerald-50 dark:bg-emerald-500/10',
            'ring'  => 'ring-emerald-200 dark:ring-emerald-400/20',
        ],
        [
            'emoji' => '✍️',
            'title' => 'Keep a Journal',
            'text'  => 'Keep a journal to practise grammar, vocabulary, and build confidence.',
            'color' => 'from-amber-500 to-orange-500',
            'bg'    => 'bg-amber-50 dark:bg-amber-500/10',
            'ring'  => 'ring-amber-200 dark:ring-amber-400/20',
        ],

    ],
];
?>

@extends('slider.simple-layout')

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto flex min-h-[100dvh] w-full max-w-6xl items-center px-4 py-5 sm:px-6 sm:py-7 lg:px-8">
                <section class="relative w-full">
                    <div class="pointer-events-none absolute -left-16 top-10 h-56 w-56 rounded-full bg-[var(--ambient-one)] opacity-30 blur-3xl"></div>
                    <div class="pointer-events-none absolute -right-16 bottom-8 h-60 w-60 rounded-full bg-[var(--ambient-two)] opacity-25 blur-3xl"></div>

                    <div class="relative mx-auto grid w-full gap-5 text-center sm:gap-6">
                        @include('slider.components.title-subtitle')

                        <section class="mx-auto grid w-full max-w-5xl gap-3 sm:gap-4 lg:grid-cols-2">
                            @foreach($content['tips'] as $index => $tip)
                                <article
                                        class="tip-card group relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white/90 p-4 text-left shadow-xl shadow-slate-900/5 ring-1 {{ $tip['ring'] }} backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-2xl dark:border-white/10 dark:bg-slate-900/80 sm:p-5
                                    {{ $index === 4 ? 'lg:col-span-2 lg:mx-auto lg:w-[52%]' : '' }}"
                                >
                                    <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r {{ $tip['color'] }}"></div>

                                    <div class="flex items-start gap-4">
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl {{ $tip['bg'] }} text-2xl shadow-inner sm:h-14 sm:w-14 sm:text-3xl">
                                            {{ $tip['emoji'] }}
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <div class="mb-1 flex items-center gap-2">
                                                <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-black text-slate-600 dark:bg-white/10 dark:text-slate-300">
                                                    {{ $index + 1 }}
                                                </span>

                                                <h3 class="bg-gradient-to-r {{ $tip['color'] }} bg-clip-text text-base font-black leading-tight tracking-[-0.02em] text-transparent sm:text-lg">
                                                    {{ $tip['title'] }}
                                                </h3>
                                            </div>

                                            <p class="text-sm font-bold leading-[1.55] text-slate-600 dark:text-slate-200 sm:text-base">
                                                {{ $tip['text'] }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </section>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        window.resetSlide = function () {};
    </script>
@endsection