<?php

$content = [
    "title" => "Polite phrases to use",
    "phrases" => [
        [
            "title" => "Please",
            "paragraph" => 'Use "please" when you ask for something. It shows respect and makes your request sound kind.'
        ],
        [
            "title" => "Thank you",
            "paragraph" => 'Use "thank you" when someone helps you or gives information. It shows appreciation and leaves a good impression.'
        ],
        [
            "title" => "Excuse me",
            "paragraph" => 'Use "excuse me" to get attention or interrupt politely. It helps you ask questions without sounding rude.'
        ],
        [
            "title" => "May I ask",
            "paragraph" => 'Use "May I ask..." before a question. It sounds polite, respectful, and professional in an interview.'
        ],
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
        <main class="relative z-10 mx-auto flex min-h-[100dvh] w-full max-w-[1280px] items-center px-4 py-8 sm:px-8 sm:py-12">
            <section class="w-full">
                <div class="header-spacing text-center space-y-6 my-8">
                    <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                    </h1>
                </div>

                <div data-anim="split" class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-2">
                    @foreach($content['phrases'] as $index => $item)
                        <article class="rounded-[24px] border border-slate-200 bg-white shadow-xl p-5 sm:p-6 dark:border-slate-700 dark:bg-slate-900/95">
                            <div class="grid grid-cols-[auto_1fr] items-start gap-4">
                            <span class="inline-flex h-10 min-w-10 items-center justify-center rounded-full border border-indigo-200 bg-indigo-50 dark:border-indigo-300/20 dark:bg-indigo-400/10">
                                <span class="text-sm font-black text-slate-800 dark:text-slate-50">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </span>

                                <div>
                                    <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                        {{ $item['title'] }}
                                    </h2>

                                    <p class="mt-3 border-l-4 border-indigo-200 pl-4 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:border-indigo-400/20 dark:text-slate-200">
                                        {{ $item['paragraph'] }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
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
