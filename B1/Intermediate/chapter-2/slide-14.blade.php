@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Speaking',
        'title'      => 'Speaking',
        'subtitle'   => 'Make speculations',

        'situations' => [
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide13/1.webp'),
                'alt' => '',
                'number_class' => 'bg-sky-500',
                'sentence' => 'Nobody answered the phone at the clinic. It ________ closed early.',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide13/2.webp'),
                'alt' => '',
                'number_class' => 'bg-violet-500',
                'sentence' => 'John ____________ gone on holiday. I saw him this morning downtown.',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide13/3.webp'),
                'alt' => '',
                'number_class' => 'bg-emerald-500',
                'sentence' => 'I can’t believe Jim hasn’t arrived yet. He ________ caught the wrong train.',
            ],
            [
                'image' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide13/4.webp'),
                'alt' => '',
                'number_class' => 'bg-rose-500',
                'sentence' => 'The lake is frozen today. It ________ snowed yesterday.',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1280px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 grid w-full max-w-[1180px] grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach($content['situations'] as $index => $situation)
                    <article class="grid grid-cols-[50%_1fr] overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-md shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20">
                        <div class="aspect-[5/4] w-full bg-slate-100 dark:bg-slate-950">
                            <img
                                    src="{{ $situation['image'] }}"
                                    alt="{{ $situation['alt'] }}"
                                    class="h-full w-full object-cover"
                            >
                        </div>

                        <div class="flex items-center p-3 sm:p-4">
                            <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base lg:text-lg">
                                <span class="mr-1.5 inline-flex h-7 w-7 items-center justify-center rounded-full {{ $situation['number_class'] }} text-sm font-black text-white">
                                    {{ $index + 1 }}
                                </span>
                                {{ $situation['sentence'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>
@endsection