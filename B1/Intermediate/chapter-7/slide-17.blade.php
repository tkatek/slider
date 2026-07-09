@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'Grammar Focus',
        'subtitle'   => '',
    ];

    $mayPoints = [
        'shows possibility',
        'used when we are not sure',
        'something might happen',
    ];

    $canPoints = [
        'shows ability or general tendency',
        'used for things people are able to do',
    ];
@endphp

@section('content')
    <main
            id="mayCanPracticeSlide"
            class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-3 py-3 sm:px-4"
    >
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-3 grid w-full max-w-7xl gap-4 md:grid-cols-[minmax(0,1fr)_minmax(280px,0.95fr)]">

            {{-- LEFT SIDE --}}
            <div class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-lg shadow-emerald-900/10 dark:border-emerald-800/70 dark:bg-slate-900">
                <div class="bg-gradient-to-r from-emerald-800 via-green-700 to-teal-700 px-4 py-2 text-center">
                    <h2 class="text-sm font-black uppercase leading-tight text-white sm:text-base">
                        Part 2: Modals - may / can
                    </h2>
                </div>

                <div class="grid gap-3 p-3 sm:p-4">
                    <article class="rounded-xl border border-emerald-200 bg-emerald-50/60 p-3 dark:border-emerald-700/60 dark:bg-emerald-950/20">
                        <p class="text-center text-sm font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-base">
                            We use <span class="text-emerald-700 dark:text-emerald-300">may</span> and
                            <span class="text-emerald-700 dark:text-emerald-300">can</span> to talk about possibility or general ability.
                        </p>

                        <div class="mt-4 grid gap-3">
                            <div class="rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl">🏆</span>
                                    <p class="rounded-lg bg-emerald-100 px-3 py-1.5 text-sm font-black text-emerald-900 dark:bg-emerald-500/20 dark:text-emerald-200">
                                        may = possibility
                                    </p>
                                </div>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    <li class="flex gap-2">
                                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                        <span>She may feel pressure.</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                        <span>They may find it hard to develop an identity.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-xl bg-white p-3 shadow-sm dark:bg-slate-900">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl">💪</span>
                                    <p class="rounded-lg bg-emerald-100 px-3 py-1.5 text-sm font-black text-emerald-900 dark:bg-emerald-500/20 dark:text-emerald-200">
                                        can = ability / tendency
                                    </p>
                                </div>

                                <ul class="mt-3 space-y-1.5 text-xs font-bold leading-snug text-slate-700 dark:text-slate-200 sm:text-sm">
                                    <li class="flex gap-2">
                                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                        <span>They can solve problems.</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                        <span>Twins can understand each other well.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <article class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-lg shadow-emerald-900/10 dark:border-emerald-800/70 dark:bg-slate-900">
                <div class="bg-gradient-to-r from-emerald-800 via-green-700 to-teal-700 px-4 py-2 text-center">
                    <h3 class="text-sm font-black uppercase text-white sm:text-base">
                        may vs. can
                    </h3>
                </div>

                <div class="p-3 sm:p-4">
                    <article class="rounded-xl border border-emerald-200 bg-emerald-50/60 p-3 dark:border-emerald-700/60 dark:bg-emerald-950/20">
                        <div class="overflow-hidden rounded-xl border border-emerald-200 bg-white dark:border-slate-700 dark:bg-slate-900">
                            <div class="grid grid-cols-2 border-b border-emerald-100 bg-emerald-50 text-center text-sm font-black text-emerald-900 dark:border-slate-700 dark:bg-slate-800 dark:text-emerald-200">
                                <div class="border-r border-emerald-100 px-3 py-2 dark:border-slate-700">may</div>
                                <div class="px-3 py-2">can</div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div class="border-b border-emerald-100 p-3 dark:border-slate-700 sm:border-b-0 sm:border-r">
                                    <ul class="space-y-1.5 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($mayPoints as $point)
                                            <li class="flex gap-2">
                                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <p class="mt-3 text-xs font-black text-slate-900 dark:text-slate-50 sm:text-sm">
                                        Example:<br>He may take risks.
                                    </p>
                                </div>

                                <div class="p-3">
                                    <ul class="space-y-1.5 text-xs font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-sm">
                                        @foreach($canPoints as $point)
                                            <li class="flex gap-2">
                                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-600"></span>
                                                <span>{{ $point }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <p class="mt-3 text-xs font-black text-slate-900 dark:text-slate-50 sm:text-sm">
                                        Example:<br>He can be creative.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 rounded-xl border border-emerald-200 bg-emerald-100/70 px-3 py-3 text-center dark:border-emerald-700 dark:bg-emerald-950/40">
                            <p class="text-xs font-extrabold leading-snug text-emerald-900 dark:text-emerald-100 sm:text-sm">
                                Both may and can are often used in general truths, not just in the present moment.
                            </p>
                        </div>
                    </article>
                </div>
            </article>

        </section>
    </main>
@endsection
