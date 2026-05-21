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
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden px-3 py-3 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-7">
        <section class="w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-3 flex w-full flex-wrap items-center justify-center gap-2 rounded-2xl border border-slate-200/80 bg-white/85 px-4 py-2.5 shadow-lg shadow-slate-200/50 backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/85 dark:shadow-slate-950/20">
                <span class="text-xs font-black uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">
                    Example:
                </span>
                <span class="text-sm font-black leading-snug text-amber-600 dark:text-amber-300 sm:text-base">
                    {{ $content['example'] }}
                </span>
            </div>

            <section class="mx-auto mt-3 rounded-3xl border border-slate-200/80 bg-white/90 p-3 shadow-lg shadow-slate-200/50 backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/90 dark:shadow-slate-950/20 sm:p-4">
                <div class="grid gap-2.5 sm:grid-cols-3">
                    <div class="rounded-2xl bg-violet-50 p-3 text-center ring-1 ring-violet-100 dark:bg-violet-500/10 dark:ring-violet-400/10">
                        <p class="text-xs font-black uppercase text-violet-700 dark:text-violet-200">
                            Subject
                        </p>
                        <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                            @foreach($content['word_bank']['subjects'] as $word)
                                <span class="rounded-full bg-white px-2.5 py-1 text-xs font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                    {{ $word }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-2xl bg-amber-50 p-3 text-center ring-1 ring-amber-100 dark:bg-amber-500/10 dark:ring-amber-400/10">
                        <p class="text-xs font-black uppercase text-amber-700 dark:text-amber-200">
                            Helper
                        </p>
                        <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                            @foreach($content['word_bank']['helpers'] as $word)
                                <span class="rounded-full bg-white px-3 py-1 text-sm font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                    {{ $word }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-2xl bg-rose-50 p-3 text-center ring-1 ring-rose-100 dark:bg-rose-500/10 dark:ring-rose-400/10">
                        <p class="text-xs font-black uppercase text-rose-700 dark:text-rose-200">
                            Verb
                        </p>
                        <div class="mt-2 flex flex-wrap justify-center gap-1.5">
                            @foreach($content['word_bank']['verbs'] as $word)
                                <span class="rounded-full bg-white px-2.5 py-1 text-xs font-black text-slate-900 shadow-sm dark:bg-slate-900 dark:text-slate-50">
                                    {{ $word }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-3 grid grid-cols-1 gap-3 lg:grid-cols-2">
                @foreach($content['items'] as $index => $item)
                    <article class="relative rounded-2xl border border-slate-200 bg-white p-3 shadow-lg shadow-slate-200/60 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20">
                        <div class="grid grid-cols-[92px_minmax(0,1fr)] gap-3 sm:grid-cols-[118px_minmax(0,1fr)] xl:grid-cols-[130px_minmax(0,1fr)]">
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100 dark:border-slate-700 dark:bg-slate-800">
                                <img
                                        src="{{ $item['image'] }}"
                                        alt="{{ $item['label'] }}"
                                        class="aspect-[5/4] h-full w-full object-cover"
                                >
                            </div>

                            <div class="flex min-w-0 flex-col pr-8">
                                <span class="w-fit max-w-full truncate rounded-full bg-slate-100 px-3 py-1 text-xs font-black text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                                    {{ $item['label'] }}
                                </span>

                                <label class="mt-2 block flex-1">
                                    <span class="sr-only">Write a sentence about {{ $item['label'] }}</span>
                                    <textarea
                                            name="sentence_{{ $index + 1 }}"
                                            class="min-h-[92px] w-full resize-none rounded-2xl border-2 border-slate-200 bg-slate-50 px-4 py-3 text-base font-black leading-snug text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-stone-500 focus:bg-white focus:ring-4 focus:ring-stone-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-stone-300 sm:min-h-[100px] xl:min-h-[108px]"
                                            placeholder="I have..."
                                            autocomplete="off"
                                    ></textarea>
                                </label>
                            </div>
                        </div>

                        <span class="absolute right-3 top-3 flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-r {{ $accentFrom }} {{ $accentVia }} {{ $accentTo }} text-xs font-black text-white shadow-md">
                            {{ $index + 1 }}
                        </span>
                    </article>
                @endforeach
            </section>
        </section>
    </main>
@endsection