@extends('slider.simple-layout')

@php
    $content = [
        'title' => 'Past regrets',
        'subtitle' => 'Should have',

        'structure' => [
            [
                'label' => 'Affirmative',
                'label_class' => 'text-emerald-700 dark:text-emerald-300',
                'formula' => 'Subject + should have + past participle.',
                'example' => 'I should have studied for the test.',
                'icon' => '✓',
                'icon_class' => 'bg-emerald-500 text-white',
            ],
            [
                'label' => 'Negative',
                'label_class' => 'text-red-600 dark:text-red-300',
                'formula' => 'Subject + shouldn’t have + past participle.',
                'example' => 'I shouldn’t have eaten so much chocolate.',
                'icon' => '×',
                'icon_class' => 'bg-red-500 text-white',
            ],
        ],

        'uses' => [
            [
                'emoji' => '🙁',
                'title' => 'To talk about a mistake in the past.',
                'example' => 'I shouldn’t have left my keys at home.',
            ],
            [
                'emoji' => '💡',
                'title' => 'To say what would have been the better choice.',
                'example' => 'You should have asked for help.',
            ],
            [
                'emoji' => '🤍',
                'title' => 'To show we feel sorry or regret something.',
                'example' => 'I should have listened to your advice.',
            ],
        ],

        'examples' => [
            [
                'emoji' => '📚',
                'situation' => 'You didn’t study for the exam.',
                'example' => 'I should have studied.',
            ],
            [
                'emoji' => '🍕',
                'situation' => 'You ate something unhealthy.',
                'example' => 'I shouldn’t have eaten so much pizza.',
            ],
            [
                'emoji' => '⏰',
                'situation' => 'You woke up late and missed the bus.',
                'example' => 'I should have woken up earlier.',
            ],
            [
                'emoji' => '🗣️',
                'situation' => 'You said something hurtful.',
                'example' => 'I shouldn’t have said that.',
            ],
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-3 sm:py-4">
        <section class="mx-auto w-full max-w-[92rem] px-3 sm:px-5 lg:px-7">
            <div class="overflow-hidden rounded-[1.8rem] border border-slate-200 bg-white shadow-2xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900/90">
                <header class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 px-5 py-4 text-center sm:px-7">
                    <h1 class="text-3xl font-black leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                        {{ $content['title'] }}:
                        <span class="text-yellow-300">{{ $content['subtitle'] }}</span>
                    </h1>
                </header>

                <div class="space-y-3 bg-gradient-to-br from-white via-amber-50/40 to-white p-3 dark:from-slate-900 dark:via-slate-950 dark:to-slate-900 sm:p-4">
                    <section class="rounded-2xl border border-amber-300 bg-white/92 px-4 py-3 text-center dark:border-amber-500/40 dark:bg-slate-950/55 sm:px-6">
                        <p class="mx-auto max-w-5xl text-base font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-xl">
                            We use
                            <span class="text-red-600 dark:text-red-400">should have + past participle</span>
                            to talk about something that was the better or right thing to do in the past, but we didn’t do it.
                            It shows <span class="text-blue-700 dark:text-blue-300">regret</span>.
                        </p>
                    </section>

                    <section class="overflow-hidden rounded-2xl border border-emerald-300 bg-white dark:border-emerald-500/40 dark:bg-slate-950/55">
                        <div class="bg-emerald-700 px-4 py-2 text-lg font-black text-white dark:bg-emerald-600">
                            1. Structure
                        </div>

                        <div class="divide-y divide-slate-200 dark:divide-slate-700">
                            @foreach($content['structure'] as $row)
                                <div class="grid grid-cols-1 divide-y divide-slate-200 dark:divide-slate-700 md:grid-cols-[11rem_1fr_1.15fr] md:divide-x md:divide-y-0">
                                    <div class="flex items-center justify-center px-4 py-4">
                                        <p class="text-lg font-black {{ $row['label_class'] }}">
                                            {{ $row['label'] }}
                                        </p>
                                    </div>

                                    <div class="flex items-center px-4 py-4">
                                        <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                            {!! str_replace(['should have', 'shouldn’t have'], ['<span class="text-red-600 dark:text-red-400">should have</span>', '<span class="text-red-600 dark:text-red-400">shouldn’t have</span>'], $row['formula']) !!}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between gap-3 px-4 py-4">
                                        <div>
                                            <p class="text-sm font-black text-slate-600 dark:text-slate-300">Example:</p>
                                            <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                                {!! str_replace(['should have', 'shouldn’t have'], ['<span class="text-red-600 dark:text-red-400">should have</span>', '<span class="text-red-600 dark:text-red-400">shouldn’t have</span>'], $row['example']) !!}
                                            </p>
                                        </div>

                                        <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full text-3xl font-black {{ $row['icon_class'] }}">
                                            {{ $row['icon'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <section class="overflow-hidden rounded-2xl border border-blue-300 bg-white dark:border-blue-500/40 dark:bg-slate-950/55">
                        <div class="bg-blue-700 px-4 py-2 text-lg font-black text-white dark:bg-blue-600">
                            2. When do we use it?
                        </div>

                        <div class="grid divide-y divide-blue-100 dark:divide-slate-700 md:grid-cols-3 md:divide-x md:divide-y-0">
                            @foreach($content['uses'] as $index => $use)
                                <article class="grid grid-cols-[3.5rem_minmax(0,1fr)] gap-3 px-4 py-4">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-slate-900 bg-white text-3xl shadow-sm dark:border-slate-200 dark:bg-slate-900">
                                        {{ $use['emoji'] }}
                                    </div>

                                    <div>
                                        <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                            {{ $index + 1 }}. {{ $use['title'] }}
                                        </p>

                                        <p class="mt-2 text-sm font-black leading-snug text-slate-800 dark:text-slate-100">
                                            {!! str_replace(['should have', 'shouldn’t have'], ['<span class="text-red-600 dark:text-red-400">should have</span>', '<span class="text-red-600 dark:text-red-400">shouldn’t have</span>'], $use['example']) !!}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <section class="overflow-hidden rounded-2xl border border-purple-300 bg-white dark:border-purple-500/40 dark:bg-slate-950/55">
                        <div class="bg-purple-800 px-4 py-2 text-lg font-black text-white dark:bg-purple-600">
                            3. More examples
                        </div>

                        <div class="grid grid-cols-[5rem_1fr_1.15fr] border-b border-purple-200 bg-purple-50 text-sm font-black text-slate-950 dark:border-slate-700 dark:bg-purple-500/10 dark:text-white sm:text-base">
                            <div class="px-3 py-2"></div>
                            <div class="border-l border-purple-200 px-3 py-2 text-center dark:border-slate-700">Situation</div>
                            <div class="border-l border-purple-200 px-3 py-2 text-center dark:border-slate-700">Example</div>
                        </div>

                        <div class="divide-y divide-purple-200 dark:divide-slate-700">
                            @foreach($content['examples'] as $row)
                                <div class="grid grid-cols-[5rem_1fr_1.15fr]">
                                    <div class="flex items-center justify-center px-3 py-3 text-4xl">
                                        {{ $row['emoji'] }}
                                    </div>

                                    <div class="flex items-center border-l border-purple-200 px-3 py-3 dark:border-slate-700">
                                        <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                            {{ $row['situation'] }}
                                        </p>
                                    </div>

                                    <div class="flex items-center border-l border-purple-200 px-3 py-3 dark:border-slate-700">
                                        <p class="text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                            {!! str_replace(['should have', 'shouldn’t have'], ['<span class="text-red-600 dark:text-red-400">should have</span>', '<span class="text-red-600 dark:text-red-400">shouldn’t have</span>'], $row['example']) !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
@endsection
