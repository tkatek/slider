@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Qualities That Inspire',
        'title'      => 'Qualities That Inspire!',
        'subtitle'   => '',
    ];

    $qualities = [
        [
            'emoji' => '💪',
            'title' => 'Courage',
            'text'  => 'Someone who faces challenges without fear and never backs down.',
            'class' => 'bg-cyan-50 border-cyan-200',
        ],
        [
            'emoji' => '💗',
            'title' => 'Passion',
            'text'  => 'Someone who truly loves what they do and gives it their all!',
            'class' => 'bg-amber-50 border-amber-200',
        ],
        [
            'emoji' => '🤝',
            'title' => 'Helpfulness',
            'text'  => 'A person who supports others and makes the world better!',
            'class' => 'bg-orange-50 border-orange-200',
        ],
        [
            'emoji' => '⭐',
            'title' => 'Honesty',
            'text'  => 'Someone who always tells the truth and keeps their promises.',
            'class' => 'bg-pink-50 border-pink-200',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden px-4 py-6 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mt-7 grid items-center gap-5 sm:grid-cols-[1.05fr_0.95fr]">
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach($qualities as $quality)
                        <article class="{{ $quality['class'] }} flex min-h-[12rem] flex-col items-center justify-center rounded-[1.75rem] border p-6 text-center shadow-sm dark:border-slate-700 dark:bg-slate-900/70 sm:min-h-[14rem]">
                            <div class="text-4xl">{{ $quality['emoji'] }}</div>

                            <h2 class="mt-3 text-2xl font-black text-slate-900 dark:text-white">
                                {{ $quality['title'] }}
                            </h2>

                            <p class="mt-3 max-w-xs text-lg font-bold leading-snug text-slate-700 dark:text-slate-200">
                                {{ $quality['text'] }}
                            </p>
                        </article>
                    @endforeach
                </div>

                <aside class="flex min-h-[24rem] items-center justify-center rounded-[2rem] border border-slate-200 bg-white/80 p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900/80 dark:shadow-slate-950/20">
                    <img
                            src="{{ materialAsset('slider/B1/Intermediate/chapter-9/img/slide21.webp') }}"
                            alt="Qualities That Inspire"
                            class="aspect-[5/4] w-full max-w-md rounded-[1.5rem] object-cover"
                    >
                </aside>
            </div>
        </section>
    </main>
@endsection