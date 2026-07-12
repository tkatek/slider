@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Grammar Focus',
        'subtitle' => 'To + infinitive',
    ];

    $examples = [
        [
            'number' => '1',
            'icon'   => '🌬️',
            'text'   => 'Choose renewable energy sources, such as solar and wind power, <span class="font-black text-green-700 dark:text-green-300">to reduce</span> our reliance on fossil fuels.',
        ],
        [
            'number' => '2',
            'icon'   => '🌳',
            'text'   => 'Planting trees helps absorb carbon dioxide <span class="font-black text-green-700 dark:text-green-300">to keep</span> ecosystems healthy.',
        ],
        [
            'number' => '3',
            'icon'   => '👥',
            'text'   => 'We can educate ourselves and others <span class="font-black text-green-700 dark:text-green-300">to take</span> action.',
        ],
        [
            'number' => '4',
            'icon'   => '♻️',
            'text'   => 'Reduce the amount of waste you produce <span class="font-black text-green-700 dark:text-green-300">to protect</span> our planet.',
        ],
        [
            'number' => '5',
            'icon'   => '🚲',
            'text'   => 'Travel by bus, bike, or on foot instead of driving <span class="font-black text-green-700 dark:text-green-300">to help reduce</span> carbon emissions.',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1100px] overflow-hidden rounded-[1.5rem] border-2 border-green-200 bg-white/95 shadow-sm dark:border-green-800 dark:bg-slate-900">

                {{-- TOP RULE --}}
                <div class="border-b-2 border-green-100 px-4 py-3 text-center dark:border-green-800">
                    <h2 class="text-lg font-black leading-tight text-green-700 dark:text-green-300 sm:text-2xl lg:text-3xl">
                        We use <span class="text-green-800 dark:text-green-200">to + infinitive</span> to show purpose.
                    </h2>
                </div>

                <div class="border-b-2 border-green-100 bg-green-50/70 px-4 py-3 text-center dark:border-green-800 dark:bg-green-950/30">
                    <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-xl">
                        The structure is:
                        <span class="ml-1 font-black text-green-700 dark:text-green-300 sm:ml-2">
                            to + base verb
                        </span>
                    </p>
                </div>

                <div class="grid gap-4 p-4 lg:grid-cols-[0.85fr_1.35fr]">

                    {{-- LEFT SIDE --}}
                    <div class="grid gap-4">

                        {{-- HOW IT WORKS --}}
                        <article class="rounded-2xl border-2 border-green-200 bg-white p-4 shadow-sm dark:border-green-800 dark:bg-slate-900">
                            <div class="mb-3 inline-flex rounded-lg bg-green-700 px-5 py-1.5 text-sm font-black uppercase tracking-wide text-white shadow-sm dark:bg-green-800">
                                How it works
                            </div>

                            <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-lg">
                                We use <span class="font-black text-green-700 dark:text-green-300">to + infinitive</span>
                                to explain why we do something.
                            </p>

                            <div class="mt-6 rounded-xl border border-green-100 bg-green-50/70 px-4 py-4 dark:border-green-800 dark:bg-green-950/30">
                                <p class="text-base font-bold text-slate-900 dark:text-slate-100 sm:text-lg">
                                    It answers the question:
                                </p>

                                <p class="mt-2 text-xl font-black leading-tight text-green-700 dark:text-green-300 sm:text-2xl">
                                    Why? / For what purpose?
                                </p>
                            </div>
                        </article>

                        {{-- FORM --}}
                        <article class="rounded-2xl border-2 border-green-200 bg-white p-4 text-center shadow-sm dark:border-green-800 dark:bg-slate-900">
                            <div class="mb-3 inline-flex rounded-lg bg-green-700 px-8 py-1.5 text-sm font-black uppercase tracking-wide text-white shadow-sm dark:bg-green-800">
                                Form
                            </div>

                            <div class="mx-auto max-w-sm rounded-xl border-2 border-yellow-200 bg-yellow-50 px-4 py-4 dark:border-yellow-700 dark:bg-yellow-950/30">
                                <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-3 text-lg font-black sm:text-2xl">
                                    <div>
                                        <span class="text-green-700 dark:text-green-300">to</span>
                                        <p class="mt-1 text-xs font-bold text-slate-700 dark:text-slate-200 sm:text-sm">
                                            purpose
                                        </p>
                                    </div>

                                    <span class="text-slate-900 dark:text-white">+</span>

                                    <div>
                                        <span class="text-green-700 dark:text-green-300">base verb</span>
                                        <p class="mt-1 text-xs font-bold text-slate-700 dark:text-slate-200 sm:text-sm">
                                            infinitive
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <p class="mx-auto mt-4 max-w-sm text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                We do something
                                <span class="font-black text-green-700 dark:text-green-300">(to + base verb)</span>
                                for a reason or purpose.
                            </p>
                        </article>
                    </div>

                    {{-- RIGHT SIDE --}}
                    <article class="rounded-2xl border-2 border-green-200 bg-white p-4 shadow-sm dark:border-green-800 dark:bg-slate-900">
                        <div class="mb-3 inline-flex rounded-lg bg-green-700 px-5 py-1.5 text-sm font-black uppercase tracking-wide text-white shadow-sm dark:bg-green-800 sm:text-base">
                            Examples from the script
                        </div>

                        <div class="space-y-2">
                            @foreach($examples as $example)
                                <div class="grid grid-cols-[2rem_1fr_2.5rem] items-center gap-3 border-b border-dashed border-green-200 pb-2 last:border-b-0 last:pb-0 dark:border-green-800 sm:grid-cols-[2.25rem_1fr_3.25rem]">
                                    <div class="flex h-7 w-7 items-center justify-center rounded-full bg-green-600 text-sm font-black text-white shadow-sm sm:h-8 sm:w-8">
                                        {{ $example['number'] }}
                                    </div>

                                    <p class="text-sm font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                        {!! $example['text'] !!}
                                    </p>

                                    <div class="flex justify-center text-2xl sm:text-4xl">
                                        {{ $example['icon'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
@endsection