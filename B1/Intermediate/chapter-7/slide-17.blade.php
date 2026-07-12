@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Grammar Focus',
        'subtitle' => 'PART 2: MODALS – may / can (for possibility & general tendency)',
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
            class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8"
    >
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
                            <span class="text-green-700 dark:text-green-300">may</span>
                            and
                            <span class="text-green-700 dark:text-green-300">can</span>
                            to talk about possibility or general ability.
                        </p>
                    </div>

                    <div class="mt-6 space-y-6">

                        {{-- MAY --}}
                        <div class="grid grid-cols-[4.5rem_1fr] gap-4 sm:grid-cols-[6rem_1fr]">
                            <div class="flex items-start justify-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-50 text-4xl shadow-inner dark:bg-green-950/40 sm:h-20 sm:w-20 sm:text-5xl">
                                    🏆
                                </div>
                            </div>

                            <div>
                                <div class="mb-3 inline-flex rounded-xl border border-green-200 bg-green-100 px-4 py-2 text-sm font-black text-green-950 dark:border-green-700 dark:bg-green-950/50 dark:text-green-100 sm:text-base">
                                    may = possibility
                                </div>

                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                        <span>She may feel pressure.</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                        <span>They may find it hard to develop an identity.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- CAN --}}
                        <div class="grid grid-cols-[4.5rem_1fr] gap-4 sm:grid-cols-[6rem_1fr]">
                            <div class="flex items-start justify-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-50 text-4xl shadow-inner dark:bg-green-950/40 sm:h-20 sm:w-20 sm:text-5xl">
                                    👍
                                </div>
                            </div>

                            <div>
                                <div class="mb-3 inline-flex rounded-xl border border-green-200 bg-green-100 px-4 py-2 text-sm font-black text-green-950 dark:border-green-700 dark:bg-green-950/50 dark:text-green-100 sm:text-base">
                                    can = ability / tendency
                                </div>

                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                        <span>They can solve problems.</span>
                                    </li>
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                        <span>Twins can understand each other well.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </article>

                {{-- RIGHT PANEL --}}
                <article class="rounded-2xl border-2 border-green-200 bg-white p-4 shadow-sm dark:border-green-800 dark:bg-slate-900 sm:p-5">
                    <h2 class="text-center text-lg font-black text-slate-950 dark:text-white sm:text-xl lg:text-2xl">
                        may vs. can
                    </h2>

                    <div class="mt-4 overflow-hidden rounded-xl border-2 border-green-200 bg-white dark:border-green-800 dark:bg-slate-900">
                        <div class="grid grid-cols-2 border-b-2 border-green-200 bg-green-50 text-center dark:border-green-800 dark:bg-green-950/40">
                            <div class="border-r-2 border-green-200 px-3 py-2 text-base font-black text-green-950 dark:border-green-800 dark:text-green-100 sm:text-lg">
                                may
                            </div>
                            <div class="px-3 py-2 text-base font-black text-green-950 dark:text-green-100 sm:text-lg">
                                can
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <div class="border-b-2 border-green-200 p-3 dark:border-green-800 sm:border-b-0 sm:border-r-2 sm:p-4">
                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                    @foreach($mayPoints as $point)
                                        <li class="flex gap-2">
                                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <p class="mt-4 text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                    Example:<br>
                                    <span class="font-bold">He may take risks.</span>
                                </p>
                            </div>

                            <div class="p-3 sm:p-4">
                                <ul class="space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                    @foreach($canPoints as $point)
                                        <li class="flex gap-2">
                                            <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-green-500"></span>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <p class="mt-4 text-sm font-black leading-snug text-slate-950 dark:text-white sm:text-base">
                                    Example:<br>
                                    <span class="font-bold">He can be creative.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 rounded-xl border-2 border-green-200 bg-green-50 px-4 py-4 dark:border-green-800 dark:bg-green-950/40">
                        <p class="text-sm font-extrabold leading-snug text-green-950 dark:text-green-100 sm:text-base lg:text-lg">
                            Both <span class="font-black">may</span> and <span class="font-black">can</span>
                            are often used in general truths, not just in the present moment.
                        </p>
                    </div>
                </article>

            </div>
        </section>
    </main>
@endsection