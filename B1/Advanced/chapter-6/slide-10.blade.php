@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'The verb Help',
        'subtitle' => '',
    ];

    $examples = [
        [
            'number' => '1',
            'icon'   => '📋',
            'text'   => 'Here are six simple ways we can <span class="font-black text-green-700 dark:text-green-300">help</span>.',
            'structure' => [
                'title' => 'Structure:',
                'formula' => 'help (no object)',
                'meaning' => 'Here, <span class="font-black text-green-700 dark:text-green-300">help</span> means do something useful. No infinitive follows because the meaning is clear.',
            ],
        ],
        [
            'number' => '2',
            'icon'   => '🚌',
            'text'   => 'Travel by bus, bike, or on foot instead of driving whenever possible. This <span class="font-black text-green-700 dark:text-green-300">helps reduce</span> carbon emissions and <span class="font-black text-green-700 dark:text-green-300">keeps the air cleaner</span>.',
            'structure' => [
                'title' => 'Structure:',
                'formula' => 'help + base verb',
                'badge' => 'help + reduce',
                'meaning_label' => 'Meaning:',
                'meaning' => 'It helps reduce carbon emissions.',
            ],
        ],
        [
            'number' => '3',
            'icon'   => '🌳',
            'text'   => 'Planting trees <span class="font-black text-green-700 dark:text-green-300">helps absorb</span> carbon dioxide, while protecting forests and wildlife habitats <span class="font-black text-green-700 dark:text-green-300">keeps ecosystems healthy</span>.',
            'structure' => [
                'title' => 'Structure:',
                'formula' => 'help + base verb',
                'badge' => 'help + absorb',
                'meaning_label' => 'Meaning:',
                'meaning' => 'Trees help absorb carbon dioxide.',
            ],
        ],
        [
            'number' => '4',
            'icon'   => '🌍',
            'text'   => 'By making these simple changes, we can all <span class="font-black text-green-700 dark:text-green-300">help create</span> a cleaner, greener, and more sustainable future.',
            'structure' => [
                'title' => 'Structure:',
                'formula' => 'help + base verb',
                'badge' => 'help + create',
                'meaning_label' => 'Meaning:',
                'meaning' => 'We help create a better future.',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1060px]">

                {{-- RULE --}}
                <section class="relative rounded-2xl border-2 border-green-200 bg-white/95 px-4 pb-4 pt-7 shadow-sm dark:border-green-800 dark:bg-slate-900 sm:px-6">
                    <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 rounded-lg bg-green-700 px-8 py-1.5 text-sm font-black uppercase tracking-wide text-white shadow-sm dark:bg-green-800">
                        Rule
                    </div>

                    <p class="text-center text-base font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-lg">
                        After <span class="font-black text-green-700 dark:text-green-300">help</span>, we can use:
                    </p>

                    <div class="mt-3 grid grid-cols-1 items-center gap-3 sm:grid-cols-[1fr_auto_1fr]">
                        <div class="flex items-center justify-center gap-3 rounded-xl border border-green-100 bg-green-50/70 px-4 py-3 dark:border-green-800 dark:bg-green-950/30">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-600 text-white">✓</span>
                            <div class="text-center">
                                <p class="text-base font-black text-slate-900 dark:text-white">
                                    help + object + base verb
                                </p>
                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200">
                                    (without to)
                                </p>
                            </div>
                        </div>

                        <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-green-700 text-sm font-black text-white shadow-sm dark:bg-green-800">
                            or
                        </div>

                        <div class="flex items-center justify-center gap-3 rounded-xl border border-green-100 bg-green-50/70 px-4 py-3 dark:border-green-800 dark:bg-green-950/30">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-600 text-white">✓</span>
                            <div class="text-center">
                                <p class="text-base font-black text-slate-900 dark:text-white">
                                    help + object + to + base verb
                                </p>
                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200">
                                    (with to)
                                </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-3 text-center text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                        Both forms are correct, but the version
                        <span class="font-black text-green-700 dark:text-green-300">without “to”</span>
                        is more common in modern English.
                    </p>
                </section>

                {{-- EXAMPLES --}}
                <section class="relative mt-7 rounded-2xl border-2 border-green-200 bg-white/95 p-4 pt-8 shadow-sm dark:border-green-800 dark:bg-slate-900">
                    <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 whitespace-nowrap rounded-lg bg-green-700 px-6 py-1.5 text-sm font-black uppercase tracking-wide text-white shadow-sm dark:bg-green-800 sm:text-base">
                        Examples from the script
                    </div>

                    <div class="grid gap-3">
                        @foreach($examples as $example)
                            <article class="grid grid-cols-1 overflow-hidden rounded-2xl border border-green-100 bg-white shadow-sm dark:border-green-800 dark:bg-slate-900 lg:grid-cols-[5.25rem_1fr_18rem]">
                                <div class="flex items-center gap-3 border-b border-green-100 bg-green-50/60 px-4 py-3 dark:border-green-800 dark:bg-green-950/25 lg:flex-col lg:justify-center lg:border-b-0 lg:border-r">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-700 text-lg font-black text-white shadow-sm">
                                        {{ $example['number'] }}
                                    </div>

                                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-3xl shadow-inner dark:bg-slate-900">
                                        {{ $example['icon'] }}
                                    </div>
                                </div>

                                <div class="flex items-center px-4 py-3">
                                    <p class="text-base font-bold leading-snug text-slate-900 dark:text-slate-100 sm:text-lg">
                                        {!! $example['text'] !!}
                                    </p>
                                </div>

                                <div class="border-t border-dashed border-green-200 bg-green-50/45 px-4 py-3 dark:border-green-800 dark:bg-green-950/20 lg:border-l lg:border-t-0">
                                    <p class="text-sm font-black text-green-700 dark:text-green-300">
                                        {{ $example['structure']['title'] }}
                                    </p>

                                    <p class="text-sm font-bold leading-snug text-slate-900 dark:text-slate-100">
                                        {!! $example['structure']['formula'] !!}
                                    </p>

                                    @if(!empty($example['structure']['badge']))
                                        <div class="mt-2 inline-flex rounded-lg bg-green-100 px-4 py-1 text-sm font-black text-green-800 dark:bg-green-900/40 dark:text-green-200">
                                            {{ $example['structure']['badge'] }}
                                        </div>
                                    @endif

                                    @if(!empty($example['structure']['meaning_label']))
                                        <p class="mt-2 text-sm font-black text-green-700 dark:text-green-300">
                                            {{ $example['structure']['meaning_label'] }}
                                        </p>
                                    @endif

                                    <p class="text-sm font-bold leading-snug text-slate-800 dark:text-slate-200">
                                        {!! $example['structure']['meaning'] !!}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection