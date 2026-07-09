@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'New Language',
        'title'      => 'New Language',
        'subtitle'   => '',

        'synonyms' => [
            ['word' => 'Empathy', 'emoji' => '🫂', 'match' => 'Understanding, compassion', 'match_emoji' => '❤️'],
            ['word' => 'Judging', 'emoji' => '🤨', 'match' => 'Criticizing, evaluating unfairly', 'match_emoji' => '🔍'],
            ['word' => 'Worthless', 'emoji' => '🗑️', 'match' => 'Useless', 'match_emoji' => '☂️'],
            ['word' => 'Compassion', 'emoji' => '❤️', 'match' => 'Kindness', 'match_emoji' => '💕'],
            ['word' => 'Tolerance', 'emoji' => '🤝', 'match' => 'Acceptance, openness', 'match_emoji' => '🚪'],
            ['word' => 'Ignite', 'emoji' => '🔥', 'match' => 'Start, trigger, spark', 'match_emoji' => '✨'],
            ['word' => 'Outcasted', 'emoji' => '🚶', 'match' => 'Excluded, isolated', 'match_emoji' => '🌑'],
        ],

        'antonyms' => [
            ['word' => 'Empathy', 'emoji' => '🫂', 'match' => 'Indifference', 'match_emoji' => '🤷'],
            ['word' => 'Compassion', 'emoji' => '❤️', 'match' => 'Cruelty / coldness', 'match_emoji' => '💙'],
            ['word' => 'Tolerance', 'emoji' => '🤝', 'match' => 'Intolerance', 'match_emoji' => '🙅'],
            ['word' => 'Respect', 'emoji' => '🤝', 'match' => 'Disrespect', 'match_emoji' => '😠'],
            ['word' => 'Inclusion', 'emoji' => '🫂', 'match' => 'Exclusion', 'match_emoji' => '👉'],
            ['word' => 'Kindness', 'emoji' => '💝', 'match' => 'Harshness', 'match_emoji' => '😡'],
        ],

        'note' => 'Small words, big impact. Choose kindness, empathy, and understanding.',
    ];
@endphp

@section('content')
    <main class="min-h-[100dvh] w-full overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1280px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 grid w-full max-w-[1120px] gap-4 lg:grid-cols-2">

                {{-- Synonyms --}}
                <section class="rounded-2xl border border-emerald-200 bg-white dark:border-emerald-400/30 dark:bg-slate-900">
                    <div class="rounded-t-2xl border-b border-emerald-200 bg-emerald-50 px-4 py-3 text-center dark:border-emerald-400/30 dark:bg-emerald-500/10">
                        <h2 class="text-2xl font-black uppercase leading-snug tracking-tight text-emerald-700 dark:text-emerald-300 sm:text-3xl">
                            🌿 Synonyms
                        </h2>
                        <p class="mt-1 text-sm font-bold leading-snug text-emerald-800/80 dark:text-emerald-100/80">
                            Words with similar meanings.
                        </p>
                    </div>

                    <div class="divide-y divide-emerald-100 dark:divide-slate-700">
                        @foreach($content['synonyms'] as $item)
                            <div class="grid grid-cols-[minmax(0,1fr)_28px_minmax(0,1fr)] items-center gap-2 px-3 py-3 sm:grid-cols-[minmax(0,1fr)_34px_minmax(0,1fr)] sm:px-4">
                                <div class="flex min-w-0 items-center gap-2 sm:gap-3">
                                    <span class="shrink-0 text-xl leading-none sm:text-2xl">
                                        {{ $item['emoji'] }}
                                    </span>
                                    <p class="min-w-0 break-words text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-base">
                                        {{ $item['word'] }}
                                    </p>
                                </div>

                                <div class="text-center text-lg font-black leading-none text-emerald-600 dark:text-emerald-300 sm:text-xl">
                                    →
                                </div>

                                <div class="flex min-w-0 items-center gap-2 sm:gap-3">
                                    <span class="shrink-0 text-xl leading-none sm:text-2xl">
                                        {{ $item['match_emoji'] }}
                                    </span>
                                    <p class="min-w-0 break-words text-sm font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                        {{ $item['match'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Antonyms --}}
                <section class="rounded-2xl border border-purple-200 bg-white dark:border-purple-400/30 dark:bg-slate-900">
                    <div class="rounded-t-2xl border-b border-purple-200 bg-purple-50 px-4 py-3 text-center dark:border-purple-400/30 dark:bg-purple-500/10">
                        <h2 class="text-2xl font-black uppercase leading-snug tracking-tight text-purple-700 dark:text-purple-300 sm:text-3xl">
                            ☘️ Antonyms
                        </h2>
                        <p class="mt-1 text-sm font-bold leading-snug text-purple-800/80 dark:text-purple-100/80">
                            Words with opposite meanings.
                        </p>
                    </div>

                    <div class="divide-y divide-purple-100 dark:divide-slate-700">
                        @foreach($content['antonyms'] as $item)
                            <div class="grid grid-cols-[minmax(0,1fr)_28px_minmax(0,1fr)] items-center gap-2 px-3 py-3 sm:grid-cols-[minmax(0,1fr)_34px_minmax(0,1fr)] sm:px-4">
                                <div class="flex min-w-0 items-center gap-2 sm:gap-3">
                                    <span class="shrink-0 text-xl leading-none sm:text-2xl">
                                        {{ $item['emoji'] }}
                                    </span>
                                    <p class="min-w-0 break-words text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-base">
                                        {{ $item['word'] }}
                                    </p>
                                </div>

                                <div class="text-center text-lg font-black leading-none text-purple-600 dark:text-purple-300 sm:text-xl">
                                    ↔
                                </div>

                                <div class="flex min-w-0 items-center gap-2 sm:gap-3">
                                    <span class="shrink-0 text-xl leading-none sm:text-2xl">
                                        {{ $item['match_emoji'] }}
                                    </span>
                                    <p class="min-w-0 break-words text-sm font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                        {{ $item['match'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Note --}}
                <div class="rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-center dark:border-amber-400/30 dark:bg-amber-500/10 lg:col-span-2">
                    <p class="break-words text-sm font-black leading-snug text-slate-900 dark:text-white sm:text-base lg:text-lg">
                        💗 {{ $content['note'] }} 🌱
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection