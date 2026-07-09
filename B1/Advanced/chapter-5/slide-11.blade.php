@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Grammar focus',
        'subtitle' => 'Comparative & superlative',

        'intro' => [
            'We use <span class="font-black text-green-700">comparative</span> forms to compare two things.',
            'We use <span class="font-black text-green-700">superlative</span> forms to compare three or more things.',
        ],

        'comparative' => [
            'title' => 'Comparative',
            'description' => 'Used to compare <span class="font-black text-green-700">two</span> people, places or things.',
            'forms' => [
                'adjective + -er',
                'more + adjective',
            ],
            'examples' => [
                'Climate change is <span class="font-black text-green-700">more serious</span> than ever.',
                'Public transport is <span class="font-black text-green-700">better</span> for the environment than driving.',
            ],
            'more_examples' => [
                'Renewable energy is <span class="font-black text-green-700">more effective</span> than fossil fuels.',
                'Walking or biking is <span class="font-black text-green-700">healthier</span> than driving.',
                'Reducing our energy consumption is <span class="font-black text-green-700">more important</span> than ever.',
            ],
        ],

        'superlative' => [
            'title' => 'Superlative',
            'description' => 'Used to compare <span class="font-black text-green-700">three or more</span> people, places or things.',
            'forms' => [
                'the + adjective + -est',
                'the most + adjective',
            ],
            'examples' => [
                'Protecting our planet is <span class="font-black text-green-700">the most important</span> responsibility.',
                'Solar energy is one of the <span class="font-black text-green-700">cleanest</span> energy sources.',
            ],
            'more_examples' => [
                'Taking action now is <span class="font-black text-green-700">the best</span> way to protect our future.',
                'Using public transport is one of the <span class="font-black text-green-700">most effective</span> ways to reduce pollution.',
                'Our oceans are some of the <span class="font-black text-green-700">most beautiful</span> places on Earth.',
            ],
        ],

        'remember' => [
            'Use comparative forms <span class="font-black text-green-700">(-er / more)</span> for <span class="font-black text-green-700">two</span> things.',
            'Use superlative forms <span class="font-black text-green-700">(the -est / the most)</span> for <span class="font-black text-green-700">three or more</span> things.',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto w-full">

                <div class="rounded-2xl border border-green-300 bg-white px-5 py-3 text-center dark:border-green-700 dark:bg-slate-900">
                    @foreach($content['intro'] as $line)
                        <p class="text-lg font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-2xl">
                            {!! $line !!}
                        </p>
                    @endforeach
                </div>

                <div class="mt-7 grid gap-5 lg:grid-cols-2">

                    {{-- COMPARATIVE --}}
                    <section class="relative rounded-2xl border border-green-300 bg-white p-4 pt-8 dark:border-green-700 dark:bg-slate-900">
                        <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-full bg-green-800 px-8 py-2 text-white shadow-sm">
                            <h2 class="text-xl font-black uppercase tracking-wide">
                                {{ $content['comparative']['title'] }}
                            </h2>
                        </div>

                        <p class="text-center text-base font-bold text-slate-900 dark:text-slate-100">
                            {!! $content['comparative']['description'] !!}
                        </p>

                        <div class="mt-4 overflow-hidden rounded-xl border border-green-300 dark:border-green-700">
                            <div class="grid grid-cols-2 border-b border-green-300 bg-green-50 dark:border-green-700 dark:bg-green-950/30">
                                <div class="border-r border-green-300 px-4 py-2 text-center text-base font-black uppercase text-green-700 dark:border-green-700 dark:text-green-300">
                                    Form
                                </div>
                                <div class="px-4 py-2 text-center text-base font-black uppercase text-green-700 dark:text-green-300">
                                    Example
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="border-r border-green-300 px-4 py-4 dark:border-green-700">
                                    <ul class="space-y-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        @foreach($content['comparative']['forms'] as $form)
                                            <li>{{ $form }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="px-4 py-4">
                                    <ul class="space-y-2 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                        @foreach($content['comparative']['examples'] as $example)
                                            <li class="flex gap-2">
                                                <span>•</span>
                                                <span>{!! $example !!}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="inline-flex rounded-lg bg-green-500 px-4 py-1 text-sm font-black uppercase text-white">
                                More Examples
                            </div>

                            <ul class="mt-3 space-y-2 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                @foreach($content['comparative']['more_examples'] as $example)
                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>{!! $example !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    {{-- SUPERLATIVE --}}
                    <section class="relative rounded-2xl border border-green-300 bg-white p-4 pt-8 dark:border-green-700 dark:bg-slate-900">
                        <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-full bg-green-800 px-8 py-2 text-white shadow-sm">
                            <h2 class="text-xl font-black uppercase tracking-wide">
                                {{ $content['superlative']['title'] }}
                            </h2>
                        </div>

                        <p class="text-center text-base font-bold text-slate-900 dark:text-slate-100">
                            {!! $content['superlative']['description'] !!}
                        </p>

                        <div class="mt-4 overflow-hidden rounded-xl border border-green-300 dark:border-green-700">
                            <div class="grid grid-cols-2 border-b border-green-300 bg-green-50 dark:border-green-700 dark:bg-green-950/30">
                                <div class="border-r border-green-300 px-4 py-2 text-center text-base font-black uppercase text-green-700 dark:border-green-700 dark:text-green-300">
                                    Form
                                </div>
                                <div class="px-4 py-2 text-center text-base font-black uppercase text-green-700 dark:text-green-300">
                                    Example
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="border-r border-green-300 px-4 py-4 dark:border-green-700">
                                    <ul class="space-y-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        @foreach($content['superlative']['forms'] as $form)
                                            <li>{{ $form }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="px-4 py-4">
                                    <ul class="space-y-2 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                        @foreach($content['superlative']['examples'] as $example)
                                            <li class="flex gap-2">
                                                <span>•</span>
                                                <span>{!! $example !!}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="inline-flex rounded-lg bg-green-500 px-4 py-1 text-sm font-black uppercase text-white">
                                More Examples
                            </div>

                            <ul class="mt-3 space-y-2 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                @foreach($content['superlative']['more_examples'] as $example)
                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>{!! $example !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>

                {{-- REMEMBER --}}
                <section class="mt-5 rounded-2xl border border-amber-300 bg-white px-5 py-3 dark:border-amber-700 dark:bg-slate-900">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-green-600 text-2xl text-white">
                            💡
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="mb-1 inline-flex rounded-lg bg-green-500 px-4 py-1 text-sm font-black uppercase text-white">
                                Remember!
                            </div>

                            <ul class="space-y-1 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                @foreach($content['remember'] as $item)
                                    <li class="flex gap-2">
                                        <span>•</span>
                                        <span>{!! $item !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="hidden shrink-0 text-5xl text-green-600 md:block">
                            ♻️
                        </div>
                    </div>
                </section>

            </div>
        </section>
    </main>
@endsection