<?php

$content = [
    'title'      => 'Grammar Concept',
    'subtitle'   => 'The Causative (Have Something Done)',

    'cards' => [
        [
            'number'      => '1',
            'title'       => 'Present Tense Causative:',
            'sentence'    => 'David <span class="font-black text-sky-700 dark:text-sky-300">has</span> his car <span class="font-black text-sky-700 dark:text-sky-300">washed</span> every week.',
            'image'       => materialAsset('slider/B1/Advanced/chapter-7/img/slide12/1.webp'),
            'headers'     => ['Subject', '+ Verb (Present)', '+ Object', '+ Past Participle', '(Complement)'],
            'row'         => ['David', 'has', 'his car', 'washed', 'every week.'],
            'description' => 'This structure is used for routines, facts, or actions that happen regularly. David arranges for this service.',
        ],
        [
            'number'      => '2',
            'title'       => 'Past Tense Causative:',
            'sentence'    => 'David <span class="font-black text-sky-700 dark:text-sky-300">had</span> his car <span class="font-black text-sky-700 dark:text-sky-300">repaired</span> yesterday.',
            'image'       => materialAsset('slider/B1/Advanced/chapter-7/img/slide12/2.webp'),
            'headers'     => ['Subject', '+ Verb (Past)', '+ Object', '+ Past Participle', '(Complement)'],
            'row'         => ['David', 'had', 'his car', 'repaired', 'yesterday.'],
            'description' => 'This structure indicates that the arrangement and the completion of the action both occurred at a specific time in the past.',
        ],
    ],
];

?>

@extends('slider.simple-layout')

@section('content')
    @php
        $title = $content['title'] ?? '';
        $subtitle = $content['subtitle'] ?? '';
    @endphp

    <main class="flex min-h-[100dvh] w-full flex-col justify-center px-4 py-5 sm:px-6 lg:px-8">
        <div class="mx-auto w-full max-w-7xl">
            @include('slider.components.title-subtitle', [
                'title' => $title,
                'subtitle' => $subtitle,

            ])

            <section class="mt-5 grid gap-4 lg:grid-cols-2">
                @foreach($content['cards'] as $card)
                    <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white/90 shadow-[0_20px_55px_-38px_rgba(15,23,42,0.35)] backdrop-blur-xl dark:border-slate-700 dark:bg-slate-900/75">
                        <div class="p-4 sm:p-5">
                            <div class="flex items-start gap-3">
                                <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slate-900 text-base font-black text-white dark:bg-white dark:text-slate-950">
                                    {{ $card['number'] }}
                                </span>

                                <div class="min-w-0">
                                    <h2 class="text-xl font-black leading-tight text-slate-950 dark:text-white sm:text-2xl">
                                        {{ $card['title'] }}
                                    </h2>

                                    <p class="mt-1 text-lg font-extrabold leading-tight text-slate-800 dark:text-slate-100 sm:text-xl">
                                        {!! $card['sentence'] !!}
                                    </p>
                                </div>
                            </div>

                            <div class="mx-auto mt-4 w-full max-w-[300px] overflow-hidden rounded-2xl border border-slate-200 bg-slate-100 dark:border-slate-700 dark:bg-slate-950 sm:max-w-[340px] lg:max-w-[360px]">
                                <img
                                        src="{{ $card['image'] }}"
                                        alt=""
                                        class="block w-full object-cover"
                                        style="aspect-ratio: 5 / 4;"
                                        loading="lazy"
                                        draggable="false"
                                >
                            </div>
                        </div>

                        <div class="px-4 pb-4 sm:px-5 sm:pb-5">
                            <div class="overflow-hidden rounded-2xl border border-slate-300 dark:border-slate-700">
                                <div class="grid grid-cols-5 bg-sky-100 text-center text-[11px] font-black leading-tight text-slate-800 dark:bg-sky-950/50 dark:text-sky-100 sm:text-xs">
                                    @foreach($card['headers'] as $header)
                                        <div class="border-r border-slate-300 px-2 py-2 last:border-r-0 dark:border-slate-700">
                                            {{ $header }}
                                        </div>
                                    @endforeach
                                </div>

                                <div class="grid grid-cols-5 bg-white text-center text-sm font-black text-slate-950 dark:bg-slate-900 dark:text-white sm:text-base">
                                    @foreach($card['row'] as $cell)
                                        <div class="border-r border-t border-slate-300 px-2 py-2 last:border-r-0 dark:border-slate-700">
                                            @if(in_array($cell, ['has', 'had', 'washed', 'repaired']))
                                                <span class="text-sky-700 dark:text-sky-300">{{ $cell }}</span>
                                            @else
                                                {{ $cell }}
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <p class="mt-3 text-center text-sm font-bold leading-snug text-slate-600 dark:text-slate-200 sm:text-base">
                                {{ $card['description'] }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </main>
@endsection