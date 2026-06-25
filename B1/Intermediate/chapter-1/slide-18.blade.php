@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Speaking',
        'title'      => 'Speaking',
        'subtitle'   => '',

        'image' => materialAsset('slider/B1/Intermediate/chapter-1/img/slide18.webp'),

        'instruction' => 'Who do you think the people are? How old are they? Where are they?',

        'speaking' => [
            [
                'text'  => 'One sentence with must be',
                'color' => 'bg-emerald-500',
            ],
            [
                'text'  => 'One sentence with might be',
                'color' => 'bg-blue-500',
            ],
            [
                'text'  => "One sentence with can't be",
                'color' => 'bg-rose-500',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1240px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 grid w-full max-w-[1120px] items-center gap-5 lg:grid-cols-[0.9fr_1.35fr]">
                <section class="rounded-[1.5rem] border border-slate-200/90 bg-white/95 p-5 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-6 lg:p-7">
                    <h2 class="text-2xl font-black leading-tight tracking-tight text-slate-950 dark:text-white sm:text-3xl">
                        Make three guesses about the picture
                    </h2>

                    <p class="mt-4 text-base font-bold leading-relaxed text-slate-700 dark:text-slate-200 sm:text-lg">
                        {{ $content['instruction'] }}
                    </p>

                    <div class="mt-6 rounded-2xl bg-slate-100 p-4 dark:bg-slate-950/60">


                        <div class="mt-4 space-y-3">
                            @foreach($content['speaking'] as $item)
                                <div class="flex gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-3 dark:border-slate-700 dark:bg-slate-900/80">
                                    <span class="mt-1 h-3 w-3 shrink-0 rounded-full {{ $item['color'] }}"></span>

                                    <p class="text-sm font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-base">
                                        {{ $item['text'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <figure class="overflow-hidden rounded-[1.5rem] border border-slate-200/90 bg-white p-3 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900/90 dark:shadow-slate-950/20">
                    <div class="aspect-[5/4] w-full overflow-hidden rounded-[1.1rem] bg-white dark:bg-slate-950">
                        <img
                                src="{{ $content['image'] }}"
                                alt="Modals of deduction in the present"
                                class="h-full w-full object-contain"
                        >
                    </div>
                </figure>
            </div>
        </section>
    </main>
@endsection