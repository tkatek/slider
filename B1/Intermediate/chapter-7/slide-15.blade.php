@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus: Practice 6',
        'subtitle'   => '',
    ];

    $truths = [
        'Firstborn children often become leaders.',
        'Middle children are often good with people.',
        'Youngest children learn from their older siblings.',
        'Only children get all their parents’ attention.',
        'Twins share a strong bond.',
        'Gap children mature quickly.',
    ];

    $forms = [
        [
            'label' => 'Affirmative',
            'items' => [
                'They get along well.',
                'He learns quickly.',
                'She is independent.',
            ],
        ],
        [
            'label' => 'Negative',
            'items' => [
                'They don’t feel pressure.',
                'He doesn’t depend on others.',
                'She isn’t shy.',
            ],
        ],
        [
            'label' => 'Question',
            'items' => [
                'Do they understand each other well?',
                'Does she like new experiences?',
                'Is he organized?',
            ],
        ],
    ];

    $practiceA = [
        ['before' => 'Firstborn children often', 'verb' => 'be', 'after' => 'responsible.'],
        ['before' => 'Middle children usually', 'verb' => 'get along', 'after' => 'well with others.'],
        ['before' => 'Youngest children', 'verb' => 'learn', 'after' => 'from older siblings.'],
        ['before' => 'Only children', 'verb' => 'receive', 'after' => 'a lot of attention.'],
        ['before' => 'Twins', 'verb' => 'share', 'after' => 'a close bond.'],
        ['before' => 'Gap children', 'verb' => 'mature', 'after' => 'quickly.'],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-3 py-3 sm:px-4">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-3 grid w-full max-w-7xl gap-4 xl:grid-cols-[0.95fr_1.05fr]">

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="bg-blue-900 px-4 py-2 text-center">
                    <h2 class="text-sm font-black uppercase leading-tight text-white sm:text-base">
                        Part 1: Present Simple - General Truths & Tendencies
                    </h2>
                </div>

                <div class="grid gap-3 p-3 sm:p-4">
                    <article class="rounded-xl border border-amber-200 bg-amber-50/70 p-3 dark:border-amber-700/60 dark:bg-amber-950/20">
                        <div class="flex items-start gap-3">
                            <div class="hidden text-4xl sm:block">👦</div>

                            <div class="min-w-0 flex-1 rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <p class="text-sm font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-base">
                                    We use Present Simple to talk about general truths and typical behaviors.
                                </p>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    @foreach($truths as $truth)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                            <span>{{ $truth }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="hidden text-4xl sm:block">👧</div>
                        </div>
                    </article>

                    <article class="rounded-xl border border-blue-200 bg-blue-50/70 p-3 dark:border-blue-700/60 dark:bg-blue-950/20">
                        <h3 class="mb-2 text-center text-base font-black text-slate-900 dark:text-slate-50">
                            Present Simple: Form
                        </h3>

                        <div class="overflow-hidden rounded-xl border border-blue-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                            @foreach($forms as $form)
                                <div class="grid grid-cols-1 border-b border-blue-100 last:border-b-0 dark:border-slate-700 sm:grid-cols-[7rem_1fr]">
                                    <div class="bg-blue-50 px-3 py-2 text-xs font-black text-blue-800 dark:bg-slate-800 dark:text-blue-300 sm:flex sm:items-center">
                                        {{ $form['label'] }}
                                    </div>

                                    <div class="space-y-1 px-3 py-2 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($form['items'] as $item)
                                            <p>{{ $item }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3 rounded-xl border border-green-200 bg-green-50 px-3 py-2 text-center dark:border-green-700 dark:bg-green-950/30">
                            <p class="text-xs font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                Use Present Simple for things that are usually true, not just now.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <article class="overflow-hidden rounded-2xl border border-blue-200 bg-white shadow-lg shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900">
                <div class="bg-blue-900 px-4 py-2 text-center">
                    <h3 class="text-sm font-black uppercase text-white sm:text-base">
                        Practice 1: Present Simple
                    </h3>
                </div>

                <div class="space-y-4 p-3 sm:p-4">
                    <div>
                        <p class="text-xs font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-sm">
                            A. Complete the sentences with the correct form of the verb in Present Simple.
                        </p>

                        <div class="mt-3 grid gap-2">
                            @foreach($practiceA as $index => $item)
                                <label class="flex flex-wrap items-center gap-x-2 gap-y-2 rounded-xl border border-slate-200 bg-slate-50 p-2.5 dark:border-slate-700 dark:bg-slate-800/60">
                                    <span class="text-xs font-black text-slate-500 dark:text-slate-300">
                                        {{ $index + 1 }}.
                                    </span>

                                    <span class="min-w-0 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        {{ $item['before'] }}
                                    </span>

                                    <input
                                            type="text"
                                            class="min-h-9 w-full rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm font-bold text-slate-900 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/15 dark:border-slate-600 dark:bg-slate-950 dark:text-slate-50 sm:w-32 lg:w-36"
                                            autocomplete="off"
                                    >

                                    <span class="min-w-0 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        ({{ $item['verb'] }}) {{ $item['after'] }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-sm">
                            B. Write true sentences about people in general.
                        </p>

                        <p class="mt-1.5 text-xs font-bold text-blue-900 dark:text-blue-300 sm:text-sm">
                            Example: People usually help their friends.
                        </p>

                        <div class="mt-3 grid gap-2">
                            @for($i = 1; $i <= 3; $i++)
                                <label class="grid gap-2 rounded-xl border border-slate-200 bg-slate-50 p-2.5 dark:border-slate-700 dark:bg-slate-800/60 sm:grid-cols-[auto_1fr] sm:items-center">
                                    <span class="text-xs font-black text-slate-500 dark:text-slate-300">
                                        {{ $i }}.
                                    </span>

                                    <input
                                            type="text"
                                            class="min-h-9 w-full rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm font-bold text-slate-900 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/15 dark:border-slate-600 dark:bg-slate-950 dark:text-slate-50"
                                            autocomplete="off"
                                    >
                                </label>
                            @endfor
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
@endsection
