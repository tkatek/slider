@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Grammar: Past Perfect',
        'subtitle' => 'We use the Past Perfect to talk about an action that happened <span class="text-red-600 dark:text-red-400 font-black">BEFORE</span> another action in the past.',

        'form_examples' => [
            '<span class="text-red-600 dark:text-red-400 font-black">had</span> baked',
            '<span class="text-red-600 dark:text-red-400 font-black">had</span> eaten',
            '<span class="text-red-600 dark:text-red-400 font-black">had</span> left',
            '<span class="text-red-600 dark:text-red-400 font-black">had</span> assumed',
        ],

        'signal_words' => [
            'before',
            'after',
            'by the time',
            'already',
            'just',
            'never',
            'until then',
        ],
    ];
@endphp

@section('content')
    <style>
        .past-perfect-focus {
            container-type: inline-size;
        }

        .past-perfect-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
        }

        .past-perfect-form {
            order: 1;
        }

        .past-perfect-signal {
            order: 2;
        }

        .past-perfect-how {
            order: 3;
        }

        @container (min-width: 640px) {
            .past-perfect-grid {
                grid-template-columns: 0.9fr 1.1fr;
            }

            .past-perfect-how {
                grid-column: 1 / -1;
            }

            .past-perfect-signal-inner {
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto;
                align-items: end;
            }
        }

        @container (min-width: 980px) {
            .past-perfect-grid {
                grid-template-columns: 0.82fr 1.65fr 1fr;
                align-items: stretch;
            }

            .past-perfect-form {
                order: 1;
            }

            .past-perfect-how {
                order: 2;
                grid-column: auto;
            }

            .past-perfect-signal {
                order: 3;
            }

            .past-perfect-signal-inner {
                display: block;
            }
        }
    </style>

    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-4 sm:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[84rem] px-3 pt-4 sm:px-4 lg:px-6">
            <div class="past-perfect-focus">
                <div class="past-perfect-grid gap-4">

                    {{-- FORM --}}
                    <article class="past-perfect-form relative overflow-hidden rounded-3xl border border-green-300 bg-white shadow-lg shadow-slate-900/5 dark:border-green-500/40 dark:bg-slate-900/80">
                        <h2 class="bg-green-700 px-4 py-2 text-center text-base font-black uppercase tracking-wide text-white dark:bg-green-600 sm:text-lg">
                            Form
                        </h2>

                        <div class="relative z-10 space-y-4 p-4 pb-16">
                            <div class="rounded-2xl border border-green-200 bg-green-50 px-4 py-3 dark:border-green-500/30 dark:bg-green-500/10">
                                <p class="text-center text-lg font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-xl">
                                    <span class="text-red-600 dark:text-red-400">had</span>
                                    + past participle
                                </p>
                            </div>

                            <div>
                                <p class="mb-2 text-base font-black text-green-800 dark:text-green-300">
                                    Examples:
                                </p>

                                <ul class="space-y-1.5">
                                    @foreach($content['form_examples'] as $example)
                                        <li class="flex items-center gap-2 text-sm font-extrabold text-slate-900 dark:text-slate-100 sm:text-base">
                                            <span class="h-2 w-2 shrink-0 rounded-full bg-green-600 dark:bg-green-400"></span>
                                            <span>{!! $example !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="pointer-events-none absolute bottom-3 right-4 text-6xl leading-none sm:text-7xl">
                            🍪
                        </div>
                    </article>

                    {{-- HOW IT WORKS --}}
                    <article class="past-perfect-how relative overflow-hidden rounded-3xl border border-blue-300 bg-white shadow-lg shadow-slate-900/5 dark:border-blue-500/40 dark:bg-slate-900/80">
                        <h2 class="bg-blue-700 px-4 py-2 text-center text-base font-black uppercase tracking-wide text-white dark:bg-blue-600 sm:text-lg">
                            How It Works
                        </h2>

                        <div class="relative z-10 space-y-4 p-4">
                            <p class="text-center text-sm font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                The Past Perfect shows the
                                <span class="text-green-700 dark:text-green-400 font-black">first action</span>
                                in the past.
                            </p>

                            <div class="rounded-2xl border border-blue-200 bg-blue-50 px-4 py-4 dark:border-blue-500/30 dark:bg-blue-500/10">
                                <div class="relative mx-auto h-[6.5rem] max-w-[40rem]">
                                    <div class="absolute left-6 right-6 top-[2.3rem] h-1 rounded-full bg-slate-900 dark:bg-slate-200"></div>

                                    <div class="absolute right-5 top-[2.02rem] h-0 w-0 border-y-[8px] border-l-[14px] border-y-transparent border-l-slate-900 dark:border-l-slate-200"></div>

                                    <div class="absolute left-[25%] top-[1.65rem] flex -translate-x-1/2 flex-col items-center">
                                        <span class="h-6 w-6 rounded-full bg-green-600 ring-4 ring-white dark:ring-slate-900"></span>
                                        <span class="mt-1 text-base font-black text-green-700 dark:text-green-400">First</span>
                                        <span class="text-xs font-extrabold text-green-700 dark:text-green-400">(Past Perfect)</span>
                                    </div>

                                    <div class="absolute left-[68%] top-[1.65rem] flex -translate-x-1/2 flex-col items-center">
                                        <span class="h-6 w-6 rounded-full bg-blue-600 ring-4 ring-white dark:ring-slate-900"></span>
                                        <span class="mt-1 text-base font-black text-blue-700 dark:text-blue-400">Then</span>
                                        <span class="text-xs font-extrabold text-blue-700 dark:text-blue-400">(Past Simple)</span>
                                    </div>

                                    <div class="absolute left-[29%] top-[2.8rem] h-9 w-[36%] rounded-b-full border-b-2 border-green-600 dark:border-green-400"></div>

                                    <p class="absolute right-8 top-0 text-xs font-black text-slate-700 dark:text-slate-200">
                                        time
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-blue-300 bg-white px-4 py-3 text-center dark:border-blue-500/40 dark:bg-slate-950/50">
                                <p class="text-sm font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                    Arthur
                                    <span class="text-red-600 dark:text-red-400">had eaten</span>
                                    all the cookies before Emma
                                    <span class="text-blue-700 dark:text-blue-400">found</span>
                                    him.
                                </p>

                                <p class="mt-1.5 text-xs font-extrabold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    First he ate the cookies. Then Emma found him.
                                </p>
                            </div>
                        </div>

                        <div class="pointer-events-none absolute bottom-3 right-4 text-6xl leading-none opacity-20 sm:text-7xl">
                            ⏱️
                        </div>
                    </article>

                    {{-- SIGNAL WORDS --}}
                    <article class="past-perfect-signal relative overflow-hidden rounded-3xl border border-purple-300 bg-white shadow-lg shadow-slate-900/5 dark:border-purple-500/40 dark:bg-slate-900/80">
                        <h2 class="bg-purple-700 px-4 py-2 text-center text-base font-black uppercase tracking-wide text-white dark:bg-purple-600 sm:text-lg">
                            Signal Words
                        </h2>

                        <div class="past-perfect-signal-inner relative z-10 gap-4 p-4 pb-20">
                            <ul class="space-y-2">
                                @foreach($content['signal_words'] as $word)
                                    <li class="flex items-center gap-2 text-sm font-extrabold text-slate-900 dark:text-slate-100 sm:text-base">
                                        <span class="h-2 w-2 shrink-0 rounded-full bg-purple-600 dark:bg-purple-400"></span>
                                        {{ $word }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pointer-events-none absolute bottom-3 right-4 text-7xl leading-none sm:text-8xl">
                            🔍
                        </div>
                    </article>

                </div>
            </div>
        </section>
    </main>
@endsection