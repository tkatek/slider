<?php

$content = [
    'page_title' => 'Make Sentences',
    'title'      => 'Practice 3: Make Sentences',
    'subtitle'   => 'Use the words to make complete sentences just like the example.',

    'example' => 'I have visited the Eiffel Tower.',

    'word_bank' => [
        'subjects' => [
            'I',
            'You',
            'We',
            'They',
            'He',
            'She',
            'It',
        ],
        'helpers' => [
            'have',
            'has',
        ],
        'verbs' => [
            'eaten',
            'ridden',
            'visited',
            'met',
            'travelled', 
            'read',
        ],
    ],

    'items' => [
        [
            'label' => 'sushi',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/sushi.webp'),
        ],
        [
            'label' => 'a horse',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/horse.webp'),
        ],
        [
            'label' => 'the Eiffel Tower',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/eiffel-tower.webp'),
        ],
        [
            'label' => 'a celebrity',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/celebrity.webp'),
        ],
        [
            'label' => 'to Italy',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/italy.webp'),
        ],
        [
            'label' => 'a Harry Potter book',
            'image' => materialAsset('slider/A2/Advanced/chapter-4/img/slide9/harry-potter-book.webp'),
        ],
    ],
];

$theme = $theme ?? [];
$accentFrom = $theme['from'] ?? 'from-stone-700';
$accentVia = $theme['via'] ?? 'via-zinc-700';
$accentTo = $theme['to'] ?? 'to-slate-800';

?>

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="w-full max-w-[1360px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 grid w-full gap-4 lg:mt-7 lg:grid-cols-[250px_minmax(0,1fr)] lg:gap-5 xl:grid-cols-[270px_minmax(0,1fr)]">
                <aside class="rounded-2xl border border-slate-200 bg-white p-4 shadow-lg shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-5">
                    <div class="rounded-2xl bg-gradient-to-r {{ $accentFrom }} {{ $accentVia }} {{ $accentTo }} p-[2px]">
                        <div class="rounded-[0.9rem] bg-white px-4 py-3 dark:bg-slate-950">
                            <p class="text-sm font-black uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Example
                            </p>
                            <p class="mt-2 text-base font-black leading-snug text-amber-600 dark:text-amber-300 sm:text-lg">
                                {{ $content['example'] }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-3 gap-3 lg:grid-cols-1">
                        <div class="rounded-2xl bg-violet-50 p-3 text-center dark:bg-violet-500/10">
                            <p class="text-xs font-black uppercase text-violet-700 dark:text-violet-200">
                                Subject
                            </p>
                            <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                                @foreach($content['word_bank']['subjects'] as $word)
                                    <span class="rounded-full bg-white px-2 py-1 text-xs font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                        {{ $word }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-2xl bg-amber-50 p-3 text-center dark:bg-amber-500/10">
                            <p class="text-xs font-black uppercase text-amber-700 dark:text-amber-200">
                                Helper
                            </p>
                            <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                                @foreach($content['word_bank']['helpers'] as $word)
                                    <span class="rounded-full bg-white px-2.5 py-1 text-sm font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                        {{ $word }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-2xl bg-rose-50 p-3 text-center dark:bg-rose-500/10">
                            <p class="text-xs font-black uppercase text-rose-700 dark:text-rose-200">
                                Verb
                            </p>
                            <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                                @foreach($content['word_bank']['verbs'] as $word)
                                    <span class="rounded-full bg-white px-2 py-1 text-xs font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                        {{ $word }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>

                <section class="grid grid-cols-1 gap-3 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach($content['items'] as $index => $item)
                        <article class="rounded-2xl border border-slate-200 bg-white p-3 shadow-lg shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20">
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100 dark:border-slate-700 dark:bg-slate-800">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['label'] }}"
                                    class="aspect-[5/3] h-full w-full object-cover"
                                >
                            </div>

                            <div class="mt-3 flex items-center justify-between gap-3">
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-black text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                    {{ $item['label'] }}
                                </span>
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-gradient-to-r {{ $accentFrom }} {{ $accentVia }} {{ $accentTo }} text-xs font-black text-white">
                                    {{ $index + 1 }}
                                </span>
                            </div>

                            <label class="mt-3 block">
                                <span class="sr-only">Write a sentence about {{ $item['label'] }}</span>
                                <input
                                    type="text"
                                    name="sentence_{{ $index + 1 }}"
                                    class="h-11 w-full rounded-xl border-2 border-slate-200 bg-slate-50 px-3 text-sm font-black text-slate-950 outline-none transition focus:border-stone-500 focus:bg-white focus:ring-4 focus:ring-stone-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:focus:border-stone-300 sm:text-base"
                                    placeholder="I have..."
                                    autocomplete="off"
                                >
                            </label>
                        </article>
                    @endforeach
                </section>
            </div>
        </section>
    </main>
@endsection
