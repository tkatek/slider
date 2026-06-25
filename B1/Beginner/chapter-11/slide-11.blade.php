@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Talking About Regrets',
        'title'      => 'Talking About Regrets',
        'subtitle'   => '',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 flex w-full max-w-5xl items-center justify-center">
            <div class="w-full overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-5 shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-7 lg:p-8">

                <div class="mx-auto flex w-full flex-col gap-5 rounded-[1.5rem] border border-slate-200 bg-slate-50 px-6 py-7 text-left dark:border-slate-700 dark:bg-slate-800/60 sm:px-8 lg:px-10">

                    <div class="max-w-4xl">
                        <div class="mb-3">
                            <span class="inline-flex rounded-full bg-orange-100 px-4 py-1.5 text-sm font-black uppercase tracking-wide text-orange-600 dark:bg-orange-500/15 dark:text-orange-300">
                                Use
                            </span>
                        </div>

                        <p class="text-xl font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-2xl lg:text-3xl">
                            Use the Third Conditional to reflect on missed chances and past mistakes.
                        </p>
                    </div>

                    <div class="h-px w-full max-w-3xl bg-slate-200 dark:bg-slate-700"></div>

                    <div class="w-full max-w-4xl rounded-[1.25rem] border border-purple-100 bg-white px-5 py-5 text-left shadow-md shadow-slate-900/10 dark:border-purple-500/20 dark:bg-slate-900">
                        <div class="mb-3">
                            <span class="inline-flex rounded-full bg-slate-100 px-4 py-1.5 text-xs font-black uppercase tracking-wide text-slate-500 dark:bg-slate-800 dark:text-slate-300 sm:text-sm">
                                Examples
                            </span>
                        </div>

                        <div class="space-y-4">
                            <p class="text-xl font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-2xl lg:text-3xl">
                                “If I
                                <span class="text-purple-600 dark:text-purple-300">hadn’t missed</span>
                                the bus,
                                I
                                <span class="text-purple-600 dark:text-purple-300">wouldn’t have been</span>
                                late.”
                            </p>

                            <p class="text-xl font-black leading-snug text-slate-800 dark:text-slate-100 sm:text-2xl lg:text-3xl">
                                “If I
                                <span class="text-purple-600 dark:text-purple-300">had called</span>
                                sooner,
                                things
                                <span class="text-purple-600 dark:text-purple-300">would have been</span>
                                different.”
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection