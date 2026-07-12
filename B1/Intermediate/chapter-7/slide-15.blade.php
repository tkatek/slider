@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Grammar Focus',
        'subtitle' => 'PART 1: PRESENT SIMPLE - General Truths & Tendencies',
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
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-4 w-full max-w-[1180px]">
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">

                {{-- LEFT PANEL --}}
                <article class="rounded-2xl border-2 border-green-200 bg-white p-4 shadow-sm dark:border-green-800 dark:bg-slate-900 sm:p-5">
                    <div class="mx-auto max-w-md text-center">
                        <p class="text-base font-black leading-snug text-slate-950 dark:text-white sm:text-lg lg:text-xl">
                            We use
                            <span class="text-green-700 dark:text-green-300">Present Simple</span>
                            to talk about general truths and typical behaviors.
                        </p>
                    </div>

                    <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-[4.5rem_1fr_4.5rem] sm:items-end">
                        <div class="hidden h-full items-end justify-center sm:flex">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-50 text-4xl shadow-inner dark:bg-green-950/40">
                                👦
                            </div>
                        </div>

                        <div class="rounded-2xl border-2 border-green-100 bg-green-50/70 p-4 dark:border-green-800 dark:bg-green-950/30">
                            <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                @foreach($truths as $truth)
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                        <span>{{ $truth }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="hidden h-full items-end justify-center sm:flex">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-50 text-4xl shadow-inner dark:bg-green-950/40">
                                👧
                            </div>
                        </div>
                    </div>
                </article>

                {{-- RIGHT PANEL --}}
                <article class="rounded-2xl border-2 border-green-200 bg-white p-4 shadow-sm dark:border-green-800 dark:bg-slate-900 sm:p-5">
                    <h2 class="text-center text-lg font-black text-slate-950 dark:text-white sm:text-xl lg:text-2xl">
                        Present Simple: Form
                    </h2>

                    <div class="mt-4 overflow-hidden rounded-xl border-2 border-green-200 bg-white dark:border-green-800 dark:bg-slate-900">
                        @foreach($forms as $form)
                            <div class="grid grid-cols-1 border-b-2 border-green-200 last:border-b-0 dark:border-green-800 sm:grid-cols-[9rem_1fr]">
                                <div class="flex items-center justify-center bg-green-50 px-4 py-3 text-sm font-black text-green-800 dark:bg-green-950/40 dark:text-green-200 sm:text-base">
                                    {{ $form['label'] }}
                                </div>

                                <div class="space-y-2 border-t-2 border-green-100 px-4 py-3 text-sm font-bold leading-snug text-slate-800 dark:border-green-800 dark:text-slate-100 sm:border-l-2 sm:border-t-0 sm:text-base">
                                    @foreach($form['items'] as $item)
                                        <p>{{ $item }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5 rounded-xl border-2 border-green-200 bg-green-50 px-4 py-4 text-center dark:border-green-800 dark:bg-green-950/40">
                        <p class="text-sm font-extrabold leading-snug text-green-950 dark:text-green-100 sm:text-base lg:text-lg">
                            Use Present Simple for things that are usually true, not just now.
                        </p>
                    </div>
                </article>

            </div>
        </section>
    </main>
@endsection