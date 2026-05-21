<?php

$content = [
    'page_title' => '',
    'title'      => 'Notice the following',
    'subtitle'   => '',
];

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-[1100px]">
            @if(!empty($content['title']) || !empty($content['subtitle']))
                @include('slider.components.title-subtitle')
            @endif

            <div class="mx-auto max-w-4xl">
                <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-5 shadow-xl shadow-slate-200/60 backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/25 sm:p-7 lg:p-10">
                    <h2 class="text-center text-3xl font-black leading-[1.08] tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl lg:text-5xl">
                        Are you an
                        <span class="text-red-500 dark:text-red-400">immigrant</span>
                        or an
                        <span class="text-sky-500 dark:text-sky-400">emigrant</span>?!
                    </h2>

                    <div class="relative mx-auto mt-6 max-w-3xl rounded-[2rem] border border-slate-200/80 bg-slate-50/95 px-5 py-5 shadow-lg shadow-slate-200/50 dark:border-slate-700/80 dark:bg-slate-950/90 dark:shadow-slate-950/20 sm:px-7 sm:py-6">
                        <div class="absolute -bottom-3 left-10 h-6 w-6 rotate-45 border-b border-r border-slate-200/80 bg-slate-50/95 dark:border-slate-700/80 dark:bg-slate-950/90"></div>

                        <div class="relative space-y-3 text-center">
                            <p class="text-lg font-black leading-[1.45] text-slate-800 dark:text-slate-100 sm:text-xl">
                                <span class="text-red-500 dark:text-red-400">Immigrant</span>
                                means coming in.
                            </p>

                            <p class="text-lg font-black leading-[1.45] text-slate-800 dark:text-slate-100 sm:text-xl">
                                <span class="text-sky-500 dark:text-sky-400">Emigrant</span>
                                means going out.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        window.resetSlide = function () {};
    </script>
@endsection