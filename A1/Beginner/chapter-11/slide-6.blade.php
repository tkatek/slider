<?php
$content = [
    'page_title'  => 'Inside my house',
    'title'       => 'Inside my house',
    'description' => 'What can you see?',
    'image'       => materialAsset('slider/A1/Beginner/chapter-11/img/slide6.webp'),
];
?>

@php
    $subtitle = $content['subtitle'] ?? $content['description'] ?? '';
    $prompts = [
        ['emoji' => '👀', 'text' => 'Look closely at the details.'],
        ['emoji' => '✍️', 'text' => 'Try to describe what you see in full sentences.'],
    ];
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden">
        <main class="w-full">
            <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 sm:py-8 lg:min-h-[100dvh] lg:flex lg:items-center">
                <section class="w-full">
                    <div class="grid place-items-center text-center gap-4 sm:gap-5">
                        <div class="header-spacing text-center space-y-4 my-5 sm:my-6" data-slide-item>
                            <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                                <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                    {{ $content['title'] }}
                                </span>
                            </h1>

                            <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                {{ $subtitle }}
                            </p>
                        </div>

                        <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[1.05fr_0.95fr] gap-4 sm:gap-5 items-stretch">
                            <figure class="h-full" data-slide-item>
                                <div class="flex h-full min-h-[320px] sm:min-h-[380px] md:min-h-[360px] lg:min-h-[470px] items-center justify-center overflow-hidden rounded-[2rem]">
                                    <img
                                        src="{{ $content['image'] }}"
                                        alt="{{ $content['title'] }}"
                                        class="h-full w-full rounded-[2rem] object-contain"
                                    >
                                </div>
                            </figure>

                            <div class="h-full px-1 sm:px-2 md:px-1 lg:px-3" data-slide-item>
                                <div class="flex h-full flex-col justify-center gap-3 sm:gap-4 lg:gap-5 text-left">
                                    @foreach($prompts as $prompt)
                                        <div class="relative z-10 flex items-center gap-3 sm:gap-4 rounded-[1.75rem] border border-slate-200 bg-white px-4 py-3 sm:px-4 sm:py-4 shadow-[0_16px_55px_-35px_rgba(2,6,23,.25)] dark:border-slate-700 dark:bg-slate-900">
                                            <div class="flex h-[3.25rem] w-[3.25rem] sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-2xl bg-indigo-50/90 text-2xl text-indigo-600 dark:bg-white/5 dark:text-indigo-300">
                                                {{ $prompt['emoji'] }}
                                            </div>

                                            <p class="text-lg sm:text-xl md:text-[1.15rem] lg:text-[1.45rem] font-bold leading-[1.4] text-slate-900 dark:text-slate-100">
                                                {{ $prompt['text'] }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const items = document.querySelectorAll("[data-slide-item]");

            if (!window.gsap || window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
                items.forEach((el) => {
                    el.style.opacity = "1";
                    el.style.transform = "none";
                });
                return;
            }

            gsap.timeline({ defaults: { ease: "power3.out" } })
                .from(items, { opacity: 0, y: 16, duration: 0.6, stagger: 0.15 });
        });
    </script>
@endsection
