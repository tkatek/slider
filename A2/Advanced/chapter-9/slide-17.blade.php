<?php

$content = [
    'page_title' => 'Remember This',
    'title'      => 'Remember This',
    'subtitle'   => '',

    'messages' => [
        [
            'emoji' => '🌱',
            'text'  => 'Your small steps today are building the foundation for big achievements tomorrow.',
        ],
        [
            'emoji' => '✨',
            'text'  => 'Keep taking small steps forward, celebrate your progress, and never stop believing in yourself.',
        ],
    ],
];

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-[980px]">
            @include('slider.components.title-subtitle')

            <section class="mx-auto mt-6 flex max-w-3xl flex-col gap-4 sm:mt-7 sm:gap-5">
                @foreach($content['messages'] as $message)
                    <article class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 p-5 shadow-xl shadow-slate-200/60 backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/25 sm:p-7 lg:p-8">
                        <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-amber-400 via-orange-400 to-sky-400"></div>

                        <div class="pointer-events-none absolute -right-4 -top-4 h-24 w-24 rounded-full bg-amber-200/40 blur-2xl dark:bg-amber-400/10"></div>
                        <div class="pointer-events-none absolute -bottom-6 -left-5 h-24 w-24 rounded-full bg-sky-200/45 blur-2xl dark:bg-sky-400/10"></div>

                        <div class="relative flex flex-col items-center gap-3 text-center sm:flex-row sm:text-left">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-3xl bg-gradient-to-br from-amber-100 to-sky-100 text-4xl shadow-inner dark:from-amber-500/15 dark:to-sky-500/15 sm:h-20 sm:w-20 sm:text-5xl">
                                {{ $message['emoji'] }}
                            </div>

                            <p class="text-xl font-black leading-[1.45] tracking-[-0.02em] text-slate-800 dark:text-slate-100 sm:text-2xl lg:text-[1.7rem]">
                                {{ $message['text'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </section>
        </section>
    </main>

    <script>
        window.resetSlide = function () {};
    </script>
@endsection