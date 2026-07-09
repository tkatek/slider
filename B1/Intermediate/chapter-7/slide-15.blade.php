@extends('slider.simple-layout')

@php
    $content = [

        'title'      => 'Grammar Focus',
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
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-3 py-3 sm:px-4">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-3 grid w-full max-w-7xl gap-4 md:grid-cols-[minmax(0,0.95fr)_minmax(280px,1.05fr)]">

            {{-- LEFT SIDE --}}
            <div class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-lg shadow-emerald-900/10 dark:border-emerald-900/60 dark:bg-slate-900">
                <div class="bg-gradient-to-r from-emerald-800 via-green-700 to-teal-700 px-4 py-2 text-center">
                    <h2 class="text-sm font-black uppercase leading-tight text-white sm:text-base">
                        Part 1: Present Simple - General Truths & Tendencies
                    </h2>
                </div>

                <div class="grid gap-3 p-3 sm:p-4">
                    <article class="rounded-xl border border-emerald-200 bg-emerald-50/70 p-3 dark:border-emerald-800/60 dark:bg-emerald-950/20">
                        <div class="flex items-start gap-3">
                            <div class="hidden text-4xl sm:block">👦</div>

                            <div class="min-w-0 flex-1 rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <p class="text-sm font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-base">
                                    We use Present Simple to talk about general truths and typical behaviors.
                                </p>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    @foreach($truths as $truth)
                                        <li class="flex gap-2">
                                            <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-700 dark:bg-emerald-300"></span>
                                            <span>{{ $truth }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="hidden text-4xl sm:block">👧</div>
                        </div>
                    </article>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <article class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-lg shadow-emerald-900/10 dark:border-emerald-900/60 dark:bg-slate-900">
                <div class="bg-gradient-to-r from-emerald-800 via-green-700 to-teal-700 px-4 py-2 text-center">
                    <h3 class="text-sm font-black uppercase text-white sm:text-base">
                        Present Simple: Form
                    </h3>
                </div>

                <div class="p-3 sm:p-4">
                    <article class="rounded-xl border border-emerald-200 bg-emerald-50/70 p-3 dark:border-emerald-800/60 dark:bg-emerald-950/20">
                        <div class="overflow-hidden rounded-xl border border-emerald-200 bg-white dark:border-emerald-900/60 dark:bg-slate-900">
                            @foreach($forms as $form)
                                <div class="grid grid-cols-1 border-b border-emerald-100 last:border-b-0 dark:border-emerald-900/60 sm:grid-cols-[8rem_1fr]">
                                    <div class="bg-emerald-50 px-3 py-3 text-xs font-black text-emerald-800 dark:bg-emerald-950/40 dark:text-emerald-300 sm:flex sm:items-center sm:text-sm">
                                        {{ $form['label'] }}
                                    </div>

                                    <div class="space-y-2 px-3 py-3 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($form['items'] as $item)
                                            <p>{{ $item }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3 rounded-xl border border-green-200 bg-green-50 px-3 py-3 text-center dark:border-green-800 dark:bg-green-950/30">
                            <p class="text-xs font-extrabold leading-snug text-emerald-900 dark:text-emerald-100 sm:text-sm">
                                Use Present Simple for things that are usually true, not just now.
                            </p>
                        </div>
                    </article>
                </div>
            </article>

        </section>
    </main>
@endsection
