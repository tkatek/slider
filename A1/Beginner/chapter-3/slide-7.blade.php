<?php
$content = [
    'title' => 'Target New Language',
    'subtitle' => 'Group interview questions by type, then practice answers.',
    'columns' => [
        [
            'title' => 'About You',
            'tone' => 'from-indigo-600 to-blue-500',
            'items' => [
                ['q' => 'What is your name?', 'a' => 'My name is ___.'],
                ['q' => 'What job do you want?', 'a' => 'I want to be a ___.'],
            ],
        ],
        [
            'title' => 'Experience',
            'tone' => 'from-emerald-600 to-cyan-500',
            'items' => [
                ['q' => 'Do you have experience?', 'a' => "Yes, I do. / No, I don't."],
                ['q' => 'Do you work now?', 'a' => "Yes, I do. / No, I don't."],
            ],
        ],
        [
            'title' => 'Availability',
            'tone' => 'from-violet-600 to-fuchsia-500',
            'items' => [
                ['q' => 'Can you work on weekends?', 'a' => "Yes, I can. / No, I can't."],
                ['q' => 'Can you start tomorrow?', 'a' => "Yes, I can. / No, I can't."],
            ],
        ],
    ],
    'grammar' => [
        'heading' => 'Grammar Focus',
        'left' => ['Do + subject + base verb', "Yes, I do. / No, I don't."],
        'right' => ['Can + subject + base verb', "Yes, I can. / No, I can't."],
    ],
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .slide-font { font-family: "Plus Jakarta Sans", sans-serif; }
    </style>
@endsection

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden overflow-y-auto">

        <main class="relative z-10 mx-auto flex min-h-[100dvh] w-full max-w-[1320px] items-center px-4 py-8 sm:px-8 sm:py-12 lg:px-12">
            <section class="w-full">
                <header data-anim="head" class="text-center">
                    <div class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 dark:border-slate-700 dark:bg-slate-900/95">
                    <span class="text-xs sm:text-sm font-black text-slate-800 dark:text-slate-50">
                        Question Buckets
                    </span>
                    </div>

                    <div class="header-spacing text-center space-y-6 my-8">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{$content['subtitle']}}
                        </p>
                    </div>
                </header>

                <div data-anim="cols" class="mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3">
                    @foreach($content['columns'] as $col)
                        <article class="rounded-[24px] border border-slate-200 bg-white shadow-xl p-4 sm:p-5 dark:border-slate-700 dark:bg-slate-900/95">
                            <div class="rounded-2xl bg-gradient-to-r {{ $col['tone'] }} px-4 py-3">
                                <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-white">
                                    {{ $col['title'] }}
                                </p>
                            </div>

                            <div class="mt-3 space-y-3">
                                @foreach($col['items'] as $item)
                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/40">
                                        <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                            {{ $item['q'] }}
                                        </p>
                                        <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                            {{ $item['a'] }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>

                <aside data-anim="grammar" class="mt-5 rounded-[24px] border border-slate-200 bg-white shadow-xl p-4 sm:p-5 dark:border-slate-700 dark:bg-slate-900/95">
                    <p class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                        {{ $content['grammar']['heading'] }}
                    </p>

                    <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div class="rounded-2xl border border-indigo-200 bg-indigo-50/90 px-4 py-4 dark:border-indigo-400/20 dark:bg-indigo-400/10">
                            <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                {{ $content['grammar']['left'][0] }}
                            </p>
                            <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                {{ $content['grammar']['left'][1] }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-emerald-200 bg-emerald-50/90 px-4 py-4 dark:border-emerald-300/20 dark:bg-emerald-400/10">
                            <p class="text-base sm:text-lg font-black tracking-[-0.02em] leading-tight text-slate-800 dark:text-slate-50">
                                {{ $content['grammar']['right'][0] }}
                            </p>
                            <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                {{ $content['grammar']['right'][1] }}
                            </p>
                        </div>
                    </div>
                </aside>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
