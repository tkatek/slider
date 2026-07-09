@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus',
        'subtitle'   => 'Gerund after “BY”',

        'rule' => 'We use by + verb (-ing) to explain how something happens.',

        'examples' => [
            'We learn new things by listening to others.',
            'We become more open-minded by asking questions.',
            'We build friendships by showing interest.',
            'We understand others by thinking about their feelings.',
            'We improve by practicing every day.',
        ],

        'practice' => [
            [
                'number' => 1,
                'sentence' => 'We can learn about other cultures by',
                'verb' => 'listen',
            ],
            [
                'number' => 2,
                'sentence' => 'We become more open-minded by',
                'verb' => 'ask',
            ],
            [
                'number' => 3,
                'sentence' => 'We build friendships by',
                'verb' => 'show',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2.5rem)] w-full max-w-[1200px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-5 w-full">
                <div class="rounded-2xl border border-purple-200 bg-purple-50 px-5 py-4 text-center dark:border-purple-400/30 dark:bg-purple-500/10">
                    <p class="text-[clamp(1.1rem,2vw,1.7rem)] font-black leading-snug text-slate-900 dark:text-white">
                        We use
                        <span class="text-purple-700 dark:text-purple-300">by</span>
                        +
                        <span class="text-emerald-600 dark:text-emerald-300">verb (-ing)</span>
                        to explain how something happens.
                    </p>
                </div>

                <div class="mt-5 grid gap-5 lg:grid-cols-[1.15fr_0.85fr]">
                    <section class="rounded-2xl border border-purple-200 bg-white p-5 dark:border-purple-400/30 dark:bg-slate-900">
                        <h2 class="mb-4 text-2xl font-black uppercase tracking-tight text-purple-700 dark:text-purple-300 sm:text-3xl">
                            Examples
                        </h2>

                        <div class="grid gap-3">
                            @foreach($content['examples'] as $example)
                                <div class="rounded-xl bg-purple-50 px-4 py-3 dark:bg-purple-500/10">
                                    <p class="text-base font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-lg">
                                        {!! preg_replace('/\bby ([a-z]+ing)\b/i', '<span class="text-purple-700 dark:text-purple-300">by</span> <span class="text-emerald-600 dark:text-emerald-300">$1</span>', $example) !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="rounded-2xl border border-amber-200 bg-white p-5 dark:border-amber-400/30 dark:bg-slate-900">
                        <h2 class="mb-4 text-2xl font-black uppercase tracking-tight text-amber-600 dark:text-amber-300 sm:text-3xl">
                            Your Turn!
                        </h2>

                        <div class="grid gap-4">
                            @foreach($content['practice'] as $item)
                                <div class="flex items-start gap-3 rounded-xl bg-amber-50 px-4 py-4 dark:bg-amber-500/10">
                                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-purple-600 text-sm font-black text-white">
                                        {{ $item['number'] }}
                                    </span>

                                    <p class="text-base font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-lg">
                                        {{ $item['sentence'] }}
                                        <span class="mx-2 inline-block min-w-[120px] border-b-4 border-slate-700 align-middle dark:border-slate-200"></span>
                                        <span class="text-slate-500 dark:text-slate-400">
                                            ({{ $item['verb'] }})
                                        </span>.
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection