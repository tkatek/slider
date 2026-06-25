@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar',
        'title'      => 'Grammar: Speculating and predicting',
        'subtitle'   => '',

        'instruction' => [
            'Look at the chart',
            'Read the examples and notice the use of modals of prediction:',
        ],

        'image' => materialAsset('slider/B1/Intermediate/chapter-3/img/slide10.webp'),

        'examples' => [
            [
                'text' => 'Tom <span class="text-emerald-600 dark:text-emerald-300">will definitely</span> pass all his exams.',
                'dot'  => 'bg-emerald-500',
            ],
            [
                'text' => 'I <span class="text-rose-600 dark:text-rose-300">definitely won’t</span> go to bed late tonight.',
                'dot'  => 'bg-rose-500',
            ],
            [
                'text' => 'Lisa <span class="text-blue-600 dark:text-blue-300">could / may / might</span> go to the doctor’s tomorrow.',
                'dot'  => 'bg-blue-500',
            ],
            [
                'text' => 'I <span class="text-amber-600 dark:text-amber-300">may not / might not</span> get the answer right.',
                'dot'  => 'bg-amber-500',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1280px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 w-full max-w-[1180px] rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5 lg:p-6">
                <div class="grid gap-5 lg:grid-cols-[1.08fr_0.92fr] lg:items-stretch">
                    <div class="flex min-w-0 flex-col">
                        <div class="space-y-3 rounded-2xl border border-amber-200 bg-amber-50/80 p-4 dark:border-amber-400/30 dark:bg-amber-500/10 sm:p-5">
                            @foreach($content['instruction'] as $line)
                                <div class="flex gap-3 text-base font-black leading-tight text-slate-900 dark:text-amber-100 sm:text-lg lg:text-xl">
                                    <span class="mt-1.5 h-2.5 w-2.5 shrink-0 rounded-full bg-amber-500"></span>
                                    <p class="min-w-0">{{ $line }}</p>
                                </div>
                            @endforeach
                        </div>

                        <figure class="mt-4 flex-1 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-950">
                            <div class="aspect-[3/2] w-full overflow-hidden lg:aspect-auto lg:h-full lg:min-h-[330px]">
                                <img
                                        src="{{ $content['image'] }}"
                                        alt="Probability and possibility scale"
                                        class="h-full w-full object-contain"
                                >
                            </div>
                        </figure>
                    </div>

                    <div class="flex rounded-2xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/60 sm:p-5">
                        <ul class="flex w-full flex-col justify-center gap-3">
                            @foreach($content['examples'] as $example)
                                <li class="flex gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 text-base font-black leading-snug text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                                    <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full {{ $example['dot'] }}"></span>
                                    <span class="min-w-0">{!! $example['text'] !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
