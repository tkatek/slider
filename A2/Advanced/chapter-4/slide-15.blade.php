<?php

$content = [
    'page_title' => 'Quick Wrap Up',
    'title'      => 'Quick Wrap Up!',
    'subtitle'   => 'Look at the pictures, choose the right verb form, and make 2 questions.',

    'prompt' => 'Have you ever...?',

    'verb_forms' => [
        'ride',
        'rode',
        'ridden',
    ],

    'pictures' => [
        [
            'alt'   => 'A person riding a horse',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/horse.webp'),
        ],
        [
            'alt'   => 'A person riding a motorbike near the sea',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/moto.webp'),
        ],
    ],
];

$theme = $theme ?? [];
$accentFrom = $theme['from'] ?? 'from-stone-700'; 
$accentVia = $theme['via'] ?? 'via-zinc-700';
$accentTo = $theme['to'] ?? 'to-slate-800';

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full rounded-2xl border border-slate-200 bg-white p-3 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:mt-6 sm:p-5 lg:mt-10 lg:rounded-[1.75rem] lg:p-8">
                <div class="grid grid-cols-2 items-stretch gap-3 lg:grid-cols-[1fr_0.9fr_1fr] lg:items-center lg:gap-8">
                    @foreach($content['pictures'] as $index => $picture)
                        @if($index === 1)
                            <div class="order-1 col-span-2 flex flex-col items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-4 py-5 text-center dark:border-slate-700 dark:bg-slate-950/60 sm:px-5 sm:py-6 lg:order-none lg:col-span-1 lg:px-5 lg:py-7">
                                <p class="text-2xl font-black leading-tight text-slate-950 dark:text-slate-50 sm:text-3xl lg:text-5xl">
                                    Have you
                                </p>

                                <p class="mt-2 text-2xl font-black leading-tight text-slate-950 dark:text-slate-50 sm:mt-3 sm:text-3xl lg:mt-5 lg:text-5xl">
                                    ever...?
                                </p>

                                <div class="mt-4 w-full max-w-xs rounded-xl bg-gradient-to-r {{ $accentFrom }} {{ $accentVia }} {{ $accentTo }} p-[2px] sm:mt-5 lg:mt-7">
                                    <div class="rounded-[0.65rem] bg-amber-100 px-3 py-2 text-base font-black text-slate-950 sm:px-5 sm:py-3 sm:text-xl lg:text-2xl">
                                        {{ implode(' - ', $content['verb_forms']) }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <figure class="{{ $index === 0 ? 'order-2' : 'order-3' }} overflow-hidden rounded-2xl border border-slate-200 bg-slate-100 shadow-sm dark:border-slate-700 dark:bg-slate-800 lg:order-none">
                            <img
                                src="{{ $picture['image'] }}"
                                alt="{{ $picture['alt'] }}"
                                class="aspect-[5/4] h-full w-full object-cover sm:aspect-[4/3]"
                            >
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
