<?php
$content = [
    "title"        => "What Are Sports Events?",
    "paragraph"    => "A planned activity where people or teams compete in physical games.",
    "accent_word"  => "compete",
    "image"        => materialAsset('slider/A1/Intermediate/chapter-1/img/slide-2-staduim.webp'),
    "image_alt"    => "Sports",
];

$content["paragraph_html"] = str_replace(
    $content["accent_word"],
    '<span class="font-extrabold text-indigo-600 dark:text-indigo-300">' . e($content["accent_word"]) . '</span>',
    e($content["paragraph"])
);
?>

@extends("slider.simple-layout")

@section("title", $content["title"])

@section("content")
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-6 sm:gap-8">
                        <div class="header-spacing text-center space-y-6 my-8">
                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                    {{ $content["title"] }}
                                </span>
                            </h1>
                        </div>

                        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[0.9fr_1.1fr] gap-5 sm:gap-6 lg:gap-8 items-start">
                            <figure class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-[0_16px_55px_-35px_rgba(2,6,23,.35)] dark:border-slate-700 dark:bg-slate-900">
                                <img
                                    src="{{ $content["image"] }}"
                                    alt="{{ $content["image_alt"] }}"
                                    class="w-full h-full object-contain"
                                >
                            </figure>

                            <article class="w-full">
                                <div class="grid grid-cols-1 gap-4 sm:gap-5">
                                    <div class="relative z-10 flex items-start gap-4 sm:gap-5 rounded-3xl border border-slate-200 bg-white px-5 py-5 text-left shadow-[0_16px_55px_-35px_rgba(2,6,23,.18)] dark:border-slate-700 dark:bg-slate-900">
                                        <div class="flex h-14 w-14 sm:h-16 sm:w-16 shrink-0 items-center justify-center rounded-2xl border-2 border-indigo-100 bg-indigo-50/80 text-2xl sm:text-3xl text-indigo-600 dark:border-white/10 dark:bg-white/5 dark:text-indigo-300">
                                            🏟️
                                        </div>

                                        <div class="min-w-0 flex-1">
                                            <p class="text-lg sm:text-xl lg:text-[1.35rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                                {!! $content["paragraph_html"] !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection
