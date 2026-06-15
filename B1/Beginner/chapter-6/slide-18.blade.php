@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'What is the difference?',
        'title'      => 'What is the difference?',
        'subtitle'   => '',

        'sections' => [
            [
                'title' => 'Indoor / Indoors',
                'theme' => 'blue',
                'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide18/indoor-room.webp'),
                'example_image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide18/indoor-games.webp'),
                'definitions' => [
                    [
                        'term' => 'INDOOR',
                        'type' => 'adjective',
                        'text' => 'describes something that is inside a building or room.',
                    ],
                    [
                        'term' => 'INDOORS',
                        'type' => 'adverb',
                        'text' => 'means to, into, or within the inside of a building.',
                    ],
                ],
                'examples' => [
                    ['label' => 'INDOOR', 'type' => 'adjective', 'items' => ['We played indoor games.', 'She has an indoor swimming pool.']],
                    ['label' => 'INDOORS', 'type' => 'adverb', 'items' => ['Please come indoors.', 'The cat stayed indoors all day.', 'Let us have lunch indoors.']],
                ],
                'tip' => [
                    'Use INDOOR to describe a noun.',
                    'Use INDOORS to describe movement or being inside.',
                ],
            ],
            [
                'title' => 'Outdoor / Outdoors',
                'theme' => 'green',
                'image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide18/outdoor-park.webp'),
                'example_image' => materialAsset('slider/B1/Beginner/chapter-6/img/slide18/outdoor-picnic.webp'),
                'definitions' => [
                    [
                        'term' => 'OUTDOOR',
                        'type' => 'adjective',
                        'text' => 'describes something that is outside a building or room.',
                    ],
                    [
                        'term' => 'OUTDOORS',
                        'type' => 'adverb',
                        'text' => 'means to, into, or within the outside of a building.',
                    ],
                ],
                'examples' => [
                    ['label' => 'OUTDOOR', 'type' => 'adjective', 'items' => ['We had an outdoor picnic.', 'She loves outdoor activities.']],
                    ['label' => 'OUTDOORS', 'type' => 'adverb', 'items' => ['Let us go outdoors.', 'The children played outdoors.', 'He prefers to eat outdoors.']],
                ],
                'tip' => [
                    'Use OUTDOOR to describe a noun.',
                    'Use OUTDOORS to describe movement or being outside.',
                ],
            ],
        ],

        'quick_check' => [
            ['text' => 'We sat ___ and read.', 'options' => 'indoors / indoor'],
            ['text' => 'It is a beautiful ___ concert.', 'options' => 'outdoors / outdoor'],
            ['text' => 'Please bring your shoes ___.', 'options' => 'indoors / indoor'],
            ['text' => 'He enjoys exercising ___.', 'options' => 'outdoors / outdoor'],
        ],
    ];

    $highlightTerms = static function (string $text, string $class): string {
        $escaped = e($text);

        return preg_replace(
            '/\b(indoor|indoors|outdoor|outdoors)\b/i',
            '<span class="font-black '.$class.'">$1</span>',
            $escaped
        );
    };

    $formatDefinition = static function (string $text): string {
        $escaped = e($text);

        return preg_replace(
            '/\b(inside|outside)\b/i',
            '<span class="font-black underline decoration-2 underline-offset-2">$1</span>',
            $escaped
        );
    };
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-4">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[82rem] px-3 py-3 sm:px-5 lg:px-6">
            <div class="rounded-3xl border border-slate-200/80 bg-white/90 p-4 shadow-xl shadow-slate-900/5 dark:border-slate-700/80 dark:bg-slate-950/70 sm:p-5">
                <div class="mb-4 rounded-2xl bg-white p-3 text-center ring-1 ring-slate-200/70 dark:bg-slate-900/60 dark:ring-slate-700/80">
                    <div class="flex flex-wrap items-center justify-center gap-3 text-2xl font-black uppercase leading-tight sm:text-3xl lg:text-4xl">
                        <span class="text-blue-700 dark:text-blue-300">Indoor / Indoors</span>
                        <span class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-300 text-lg text-slate-950 shadow-sm sm:h-14 sm:w-14 sm:text-xl">
                            vs.
                        </span>
                        <span class="text-green-800 dark:text-green-300">Outdoor / Outdoors</span>
                    </div>

                    <p class="mt-2 text-base font-extrabold italic text-slate-900 dark:text-slate-100 sm:text-lg">
                        They sound the same but have different meanings and uses.
                    </p>
                </div>

                <div class="grid gap-4 lg:grid-cols-2">
                    @foreach($content['sections'] as $section)
                        @php
                            $isBlue = $section['theme'] === 'blue';
                            $mainClass = $isBlue ? 'text-blue-700 dark:text-blue-300' : 'text-green-800 dark:text-green-300';
                            $borderClass = $isBlue ? 'border-blue-200 dark:border-blue-500/30' : 'border-green-200 dark:border-green-500/30';
                            $softClass = $isBlue ? 'bg-blue-50 dark:bg-blue-500/10' : 'bg-green-50 dark:bg-green-500/10';
                            $headerClass = $isBlue ? 'bg-blue-700 dark:bg-blue-500' : 'bg-green-700 dark:bg-green-500';
                        @endphp

                        <article class="overflow-hidden rounded-2xl border {{ $borderClass }} bg-white dark:bg-slate-900/50">
                            <h2 class="{{ $headerClass }} px-4 py-2 text-center text-lg font-black uppercase text-white sm:text-xl">
                                {{ $section['title'] }}
                            </h2>

                            <div class="grid gap-3 p-3">
                                <div class="grid gap-3 sm:grid-cols-[1fr_13rem]">
                                    <div class="grid gap-3">
                                        @foreach($section['definitions'] as $definition)
                                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-950/35">
                                                <p class="text-base font-black {{ $mainClass }}">
                                                    {{ $definition['term'] }}
                                                    <span class="text-xs text-slate-500 dark:text-slate-300">({{ $definition['type'] }})</span>
                                                </p>
                                                <p class="mt-1 text-sm font-semibold leading-snug text-slate-800 dark:text-slate-100">
                                                    {!! $formatDefinition($definition['text']) !!}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <img
                                            src="{{ $section['image'] }}"
                                            alt="{{ $section['title'] }}"
                                            class="h-44 w-full rounded-xl border border-slate-200 object-cover dark:border-slate-700 sm:h-full"
                                    >
                                </div>

                                <div>
                                    <div class="{{ $headerClass }} rounded-t-xl py-1 text-center text-xs font-black uppercase text-white">
                                        Examples
                                    </div>

                                    <div class="grid gap-3 rounded-b-xl border border-t-0 border-slate-200 bg-white p-3 dark:border-slate-700 dark:bg-slate-950/35 sm:grid-cols-[1fr_13rem]">
                                        <div class="grid gap-3">
                                            @foreach($section['examples'] as $example)
                                                <div>
                                                    <p class="text-sm font-black {{ $mainClass }}">
                                                        {{ $example['label'] }}
                                                        <span class="text-xs text-slate-500 dark:text-slate-300">({{ $example['type'] }})</span>
                                                    </p>
                                                    <ul class="mt-1 list-disc space-y-1 pl-5 text-sm font-semibold leading-snug text-slate-800 dark:text-slate-100">
                                                        @foreach($example['items'] as $item)
                                                            <li>{!! $highlightTerms($item, $mainClass) !!}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>

                                        <img
                                                src="{{ $section['example_image'] }}"
                                                alt="{{ $section['title'] }} examples"
                                                class="h-44 w-full rounded-xl border border-slate-200 object-cover dark:border-slate-700 sm:h-full"
                                        >
                                    </div>
                                </div>

                                <div class="flex gap-3 rounded-xl {{ $softClass }} p-3">
                                    <div class="text-2xl">Tip</div>
                                    <div class="text-sm font-semibold leading-snug text-slate-800 dark:text-slate-100">
                                        @foreach($section['tip'] as $tip)
                                            <p>{!! $highlightTerms($tip, $mainClass) !!}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900/50">
                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-black uppercase text-pink-600 dark:border-slate-700 dark:text-pink-300">
                        Quick Check!
                    </div>

                    <div class="grid divide-y divide-slate-200 dark:divide-slate-700 sm:grid-cols-2 sm:divide-x sm:divide-y-0 xl:grid-cols-4">
                        @foreach($content['quick_check'] as $check)
                            <div class="p-3 text-sm font-bold leading-snug text-slate-900 dark:text-slate-100">
                                <span class="font-black">{{ $loop->iteration }}.</span>
                                {{ $check['text'] }}
                                <div class="mt-1 text-xs font-semibold text-slate-500 dark:text-slate-400">
                                    ({{ $check['options'] }})
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
