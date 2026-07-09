@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Practice 1',
        'title'      => 'Warm-up: Practice 1',
        'subtitle'   => 'Let’s revise past & present speculations',

        'instruction' => 'Make deductions about each of the pictures. You can use either modals of deduction for present or past events.',

        'images' => [
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide2/1.webp'),
                'alt'   => '',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide2/2.webp'),
                'alt'   => '',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide2/3.webp'),
                'alt'   => '',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide2/4.webp'),
                'alt'   => '',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide2/5.webp'),
                'alt'   => '',
            ],
        ],

        'options' => [
            [
                'text'  => 'He/She must be...',
                'class' => 'bg-amber-50 border-amber-200 text-slate-900 dark:bg-amber-500/10 dark:border-amber-400/40 dark:text-amber-100',
            ],
            [
                'text'  => 'They can’t have...',
                'class' => 'bg-rose-50 border-rose-200 text-slate-900 dark:bg-rose-500/10 dark:border-rose-400/40 dark:text-rose-100',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1280px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 w-full max-w-[1120px] rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5 lg:p-6">
                <p class="text-base font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-lg lg:text-xl">
                    {{ $content['instruction'] }}
                </p>

                <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">
                    @foreach($content['images'] as $index => $item)
                        <figure class="{{ $index === 4 ? 'col-span-2 sm:col-span-1' : '' }} overflow-hidden rounded-xl border border-slate-200 bg-slate-50 shadow-sm dark:border-slate-700 dark:bg-slate-950">
                            <div class="relative aspect-[5/4] w-full overflow-hidden">
                                <img
                                        src="{{ $item['image'] }}"
                                        alt="{{ $item['alt'] }}"
                                        class="h-full w-full object-cover"
                                >

                                <span class="absolute left-2 top-2 flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-sm font-black text-white shadow-lg ring-2 ring-white/90 dark:ring-slate-950/80">
                    {{ $index + 1 }}
                </span>
                            </div>
                        </figure>
                    @endforeach
                </div>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach($content['options'] as $option)
                        <div class="flex min-h-[86px] items-center justify-center rounded-2xl border-2 px-5 py-4 text-center shadow-sm {{ $option['class'] }}">
                            <p class="text-xl font-black italic leading-tight sm:text-2xl">
                                {{ $option['text'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection