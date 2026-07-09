@extends('slider.simple-layout')

@php
    $content = [

        'title'      => 'Quick Wrap Up',
        'subtitle'   => '',

        'sentence' => 'One environmental problem I learned about today is',
        'words_title' => 'Three new words I learned:',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden bg-gradient-to-br from-emerald-50 via-white to-sky-50 px-4 py-5 text-slate-950 dark:from-slate-950 dark:via-slate-900 dark:to-emerald-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1050px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-8 w-full max-w-[850px] overflow-hidden rounded-[2rem] border border-emerald-200 bg-white/95 shadow-[0_24px_70px_rgba(15,118,110,0.14)] dark:border-emerald-500/25 dark:bg-slate-900/90">

                <div class="border-b border-emerald-200 bg-emerald-100/80 px-6 py-4 text-emerald-900 dark:border-emerald-500/25 dark:bg-emerald-900/30 dark:text-emerald-100">
                    <h2 class="text-xl font-black sm:text-2xl">
                        {{ $content['subtitle'] }}
                    </h2>
                </div>

                <div class="space-y-8 p-6 sm:p-8">

                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-5 dark:border-slate-700 dark:bg-slate-950/35">
                        <label class="block text-lg font-extrabold leading-relaxed text-slate-900 dark:text-slate-50 sm:text-2xl">
                            {{ $content['sentence'] }}
                        </label>

                        <input
                                type="text"
                                class="mt-4 h-14 w-full rounded-2xl border border-slate-300 bg-white px-4 text-xl font-bold text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:focus:ring-emerald-900/40"
                                placeholder="Write your answer here..."
                                autocomplete="off"
                        >
                    </div>

                    <div>
                        <h3 class="mb-4 text-xl font-black text-slate-900 dark:text-white sm:text-2xl">
                            {{ $content['words_title'] }}
                        </h3>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <input
                                    type="text"
                                    class="h-14 rounded-2xl border border-slate-300 bg-white px-4 text-center text-lg font-bold text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:focus:ring-emerald-900/40"
                                    placeholder="Word 1"
                                    autocomplete="off"
                            >

                            <input
                                    type="text"
                                    class="h-14 rounded-2xl border border-slate-300 bg-white px-4 text-center text-lg font-bold text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:focus:ring-emerald-900/40"
                                    placeholder="Word 2"
                                    autocomplete="off"
                            >

                            <input
                                    type="text"
                                    class="h-14 rounded-2xl border border-slate-300 bg-white px-4 text-center text-lg font-bold text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:focus:ring-emerald-900/40"
                                    placeholder="Word 3"
                                    autocomplete="off"
                            >
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection