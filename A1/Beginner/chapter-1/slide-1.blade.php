<?php
    $content=[
        'title'=>"UNIT 01 — INTRODUCTION AND GREETING",
        'subtitle'=>"Meet and Greet",
        'paragraph'=>""
    ];
?>
@extends("slider.simple-layout")
@section("style")
@endsection

@section("content")
    <div class="relative min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1200px] items-center px-6 py-10 lg:px-16 lg:py-16">
            <div class="slide-content grid w-full grid-cols-1 items-center gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-20">
                <div class="text-section z-10 text-center lg:text-left">
                    <div class="unit-badge mb-6 inline-flex items-center rounded-full border border-indigo-100 bg-indigo-50 px-5 py-2 text-[0.75rem] font-extrabold uppercase tracking-[0.15em] text-indigo-600 dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-300">
                        {{ $content['title'] }}
                    </div>

                    <h1 class="hero-title mb-8 text-4xl font-black leading-[1.05] tracking-[-0.04em] sm:text-5xl lg:text-[5.5rem]">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{ $content['subtitle'] }}
                        </span>
                    </h1>
                    <p class="hero-subtitle mb-14 max-w-[480px] lg:mx-0 mx-auto
                        text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                        {{ $content['paragraph'] }}
                    </p>

                    <div class="flex items-center justify-center gap-6 lg:justify-start" id="cta-line">
                        <div class="h-px w-20 bg-indigo-200 dark:bg-indigo-800"></div>
                        <span class="text-xs font-black uppercase tracking-widest text-indigo-400 dark:text-indigo-500">Ready to Begin?</span>
                    </div>
                </div>

                <div class="image-section relative flex items-center justify-center lg:justify-start">
                    <button id="start-btn"
                            class="group relative mx-auto flex items-center gap-4 rounded-[1.2rem] bg-slate-900 px-6 py-4 text-lg font-black text-white shadow-2xl sm:rounded-[2rem] sm:px-12 sm:py-6 sm:text-2xl lg:mx-0 dark:bg-white dark:text-slate-900 dark:shadow-indigo-500/30">
                        <span>Start Session</span>
                        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-indigo-500 text-[10px] sm:h-10 sm:w-10 sm:text-sm">⚡</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.resetSlide = () => {};
            const startBtn = document.getElementById('start-btn');
            startBtn.addEventListener('click', () => {
                if (window.parent && typeof window.parent.nextSlide === 'function') {
                    window.parent.nextSlide();
                }
            });
        });
    </script>
@endsection
