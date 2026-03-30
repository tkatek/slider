<?php
$content = [
    'title' => 'Talking About Bills',
    'subtitle' => '',
    'image' => materialAsset('slider/A1/Beginner/chapter-12/img/slide4.webp'),
    'image_alt' => 'Bills and payment documents',
    'questions' => [
        'What kind of bills can you see?',
        'How often do you pay your bills?',
        'Do you need to go to the bank to pay your bills?',
    ],
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .nice-scroll::-webkit-scrollbar { width: 8px; height: 8px; }
        .nice-scroll::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.45);
            border-radius: 999px;
        }
        .nice-scroll::-webkit-scrollbar-track { background: transparent; }
    </style>
@endsection

@section("content")
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-6 sm:gap-8">
                        <div class="header-spacing text-center space-y-6 my-8">
                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            </h1>

                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{ $content['subtitle'] }}
                            </p>
                        </div>

                        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[0.9fr_1.1fr] gap-5 sm:gap-6 lg:gap-8 items-start">
                            <figure class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-[0_16px_55px_-35px_rgba(2,6,23,.35)] dark:border-slate-700 dark:bg-slate-900">
                                <img
                                    src="{{ $content['image'] }}"
                                    alt="{{ $content['image_alt'] }}"
                                    class="w-full h-full object-contain"
                                >
                            </figure>

                            <article class="w-full">
                                <div class="nice-scroll grid grid-cols-1 gap-4 sm:gap-5">
                                    @foreach($content['questions'] as $index => $question)
                                        <div class="relative z-10 flex items-start gap-4 sm:gap-5 rounded-3xl border border-slate-200 bg-white px-5 py-5 text-left shadow-[0_16px_55px_-35px_rgba(2,6,23,.18)] dark:border-slate-700 dark:bg-slate-900">
                                            <div class="flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl border-2 border-indigo-100 bg-indigo-50/80 text-[0.95rem] font-extrabold text-indigo-600 dark:border-white/10 dark:bg-white/5 dark:text-indigo-300">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                                    {{ $question }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
