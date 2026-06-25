@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus: Relative Pronouns',
        'subtitle'   => '',
        'image'      => materialAsset('slider/B1/Intermediate/chapter-9/img/slide11.webp'),
    ];

    $pronouns = [
        [
            'word' => 'who',
            'color' => 'text-purple-700 dark:text-purple-300',
            'bg' => 'bg-purple-50 dark:bg-purple-950/30',
            'border' => 'border-purple-200 dark:border-purple-800',
            'meaning' => 'refers to people',
            'example' => 'The first people <span class="font-black text-purple-700 dark:text-purple-300">who</span> inspired me were my parents.',
        ],
        [
            'word' => 'that',
            'color' => 'text-emerald-700 dark:text-emerald-300',
            'bg' => 'bg-emerald-50 dark:bg-emerald-950/30',
            'border' => 'border-emerald-200 dark:border-emerald-800',
            'meaning' => 'refers to people or things',
            'example' => 'Values <span class="font-black text-emerald-700 dark:text-emerald-300">that</span> helped me become more confident.',
        ],
        [
            'word' => 'which',
            'color' => 'text-sky-700 dark:text-sky-300',
            'bg' => 'bg-sky-50 dark:bg-sky-950/30',
            'border' => 'border-sky-200 dark:border-sky-800',
            'meaning' => 'refers to things or ideas',
            'example' => 'A book <span class="font-black text-sky-700 dark:text-sky-300">which</span> changed the way I thought.',
        ],
        [
            'word' => 'where',
            'color' => 'text-orange-700 dark:text-orange-300',
            'bg' => 'bg-orange-50 dark:bg-orange-950/30',
            'border' => 'border-orange-200 dark:border-orange-800',
            'meaning' => 'refers to places',
            'example' => 'Places <span class="font-black text-orange-700 dark:text-orange-300">where</span> I can learn about different cultures.',
        ],
        [
            'word' => 'when',
            'color' => 'text-pink-700 dark:text-pink-300',
            'bg' => 'bg-pink-50 dark:bg-pink-950/30',
            'border' => 'border-pink-200 dark:border-pink-800',
            'meaning' => 'refers to time',
            'example' => 'A time <span class="font-black text-pink-700 dark:text-pink-300">when</span> I wanted to become an architect.',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-5">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-5 grid w-full max-w-6xl gap-5 sm:grid-cols-[0.85fr_1.15fr]">
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="aspect-[5/4] overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800">
                    <img
                            src="{{ $content['image'] }}"
                            alt=""
                            class="h-full w-full object-cover"
                    >
                </div>

                <div class="mt-4 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-4 text-center dark:border-amber-700 dark:bg-amber-950/30">
                    <p class="text-xl font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-2xl">
                        “The first people
                        <span class="text-purple-700 dark:text-purple-300">who</span>
                        inspired me were my parents.”
                    </p>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-5">
                <div class="rounded-2xl bg-purple-700 px-4 py-3 text-center">
                    <h2 class="text-lg font-black uppercase text-white sm:text-xl">
                        Relative Pronouns
                    </h2>
                </div>

                <p class="mt-4 text-base font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-lg">
                    Relative pronouns connect a part of a sentence to more information about a noun
                    <span class="text-slate-500 dark:text-slate-300">(a person, place, thing, time, or idea).</span>
                </p>

                <div class="mt-4 grid gap-3">
                    @foreach($pronouns as $item)
                        <article class="grid gap-2 rounded-xl border p-3 {{ $item['bg'] }} {{ $item['border'] }} sm:grid-cols-[5rem_9rem_1fr] sm:items-center">
                            <div class="text-xl font-black {{ $item['color'] }}">
                                {{ $item['word'] }}
                            </div>

                            <div class="text-sm font-bold leading-snug text-slate-700 dark:text-slate-200">
                                {{ $item['meaning'] }}
                            </div>

                            <div class="text-sm font-bold leading-snug text-slate-900 dark:text-slate-50">
                                {!! $item['example'] !!}
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection