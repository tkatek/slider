@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Speaking Time!',
        'title'      => 'Speaking Time!',
        'subtitle'   => '',

        'activity_title' => 'Make a Wish',

        'prompts' => [
            'A wish for my family:',
            'A wish for the world:',
            'A wish for a friend:',
            'A wish for myself:',
        ],
    ];

    $promptEmojis = ['👨‍👩‍👧', '🌍', '🤝', '✨'];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto flex w-full max-w-6xl flex-1 items-center px-3 py-3 sm:px-6 lg:px-8">
            <div class="mx-auto w-full max-w-4xl">
                <div class="relative mx-auto overflow-hidden rounded-[1.75rem] border-2 border-slate-900/80 bg-white/85 p-4 shadow-[0_18px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/80 dark:bg-slate-900/90 sm:p-5 lg:p-7">

                    <div class="pointer-events-none absolute inset-2 rounded-[1.35rem] border border-slate-300/80 dark:border-slate-700/80"></div>

                    <div class="pointer-events-none absolute -right-16 -top-16 h-40 w-40 rounded-full bg-emerald-100/70 blur-2xl dark:bg-emerald-400/10"></div>
                    <div class="pointer-events-none absolute -bottom-16 -left-16 h-44 w-44 rounded-full bg-teal-100/70 blur-2xl dark:bg-teal-400/10"></div>

                    <h2 class="relative text-center text-3xl font-black leading-none tracking-[-0.03em] text-slate-950 dark:text-slate-50 sm:text-4xl md:text-5xl lg:text-6xl">
                        {{ $content['activity_title'] }}
                    </h2>

                    <div class="relative mx-auto mt-4 grid max-w-3xl grid-cols-1 gap-3 sm:mt-5 sm:grid-cols-2 sm:gap-4 lg:mt-6">
                        @foreach($content['prompts'] as $index => $prompt)
                            <label
                                    class="flex min-h-[7.75rem] flex-col justify-center rounded-3xl border-2 border-slate-900/80 bg-white/90 p-3 shadow-[0_10px_26px_rgba(15,23,42,0.06)] transition hover:-translate-y-0.5 hover:shadow-[0_16px_34px_rgba(15,23,42,0.09)] dark:border-slate-700/80 dark:bg-slate-950/45 sm:min-h-[10rem] sm:p-4 lg:min-h-[10.5rem] lg:p-5"
                            >
                                <span class="flex items-center justify-center gap-2 text-center text-sm font-black leading-tight text-slate-950 dark:text-slate-50 sm:text-base lg:text-lg">
                                    <span class="text-xl leading-none sm:text-2xl">
                                        {{ $promptEmojis[$index] ?? '✨' }}
                                    </span>

                                    <span>
                                        {{ $prompt }}
                                    </span>
                                </span>

                                <textarea
                                        name="wish_{{ $index + 1 }}"
                                        rows="3"
                                        class="mt-2 block h-[4.25rem] w-full resize-none border-0 bg-transparent text-center text-sm font-bold leading-7 text-slate-950 outline-none focus:ring-0 dark:text-slate-50 sm:mt-3 sm:h-[5.25rem] sm:text-base"
                                        style="background-image: repeating-linear-gradient(to bottom, transparent 0, transparent 27px, rgba(148,163,184,.65) 28px);"
                                ></textarea>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection