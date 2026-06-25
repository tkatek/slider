@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar',
        'title'      => 'Grammar',
        'subtitle'   => 'Modals of deduction in the present',

        'image' => materialAsset('slider/B1/Intermediate/chapter-1/img/slide11.webp'),

        'questions' => [
            [
                'text'  => 'Which sentence shows certainty?',
                'color' => 'bg-emerald-500',
            ],
            [
                'text'  => 'Which sentence shows possibility?',
                'color' => 'bg-blue-500',
            ],
            [
                'text'  => 'Which sentence shows impossibility?',
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
                        Notice the sentences
                    </h2>

                    <div class="mt-5 space-y-3">
                        @foreach($content['questions'] as $question)
                            <div class="flex gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-3 dark:border-slate-700 dark:bg-slate-950/60">
                                <span class="mt-1 h-3 w-3 shrink-0 rounded-full {{ $question['color'] }}"></span>

                                <p class="text-sm font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-base">
                                    {{ $question['text'] }}
                                </p>
                            </div>
                        @endforeach
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