@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'Grammar Focus',
        'subtitle'   => 'Present simple: active & passive',

        'active_examples' => [
            'Advertising <span class="font-black text-blue-600 dark:text-blue-300">is</span> an important part of modern life.',
            'We <span class="font-black text-blue-600 dark:text-blue-300">see</span> advertisements on buses, billboards, and websites.',
            'Advertisers <span class="font-black text-blue-600 dark:text-blue-300">use</span> different techniques.',
        ],

        'remember' => [
            'Use the base verb for plural subjects<br><span class="font-bold">(they <span class="font-black text-blue-600 dark:text-blue-300">use</span>, we <span class="font-black text-blue-600 dark:text-blue-300">see</span>)</span>',
            'Add <span class="font-black">-s</span> for he/she/it<br><span class="font-bold">(advertising <span class="font-black text-blue-600 dark:text-blue-300">is</span>)</span>',
        ],

        'passive_examples' => [
            'Advertisements <span class="font-black text-emerald-600 dark:text-emerald-300">are seen</span> on buses and websites.',
            'Products <span class="font-black text-emerald-600 dark:text-emerald-300">are promoted</span> through social media.',
            'Customers <span class="font-black text-emerald-600 dark:text-emerald-300">are influenced</span> by advertising techniques.',
        ],

        'formula' => [
            'am / is / are',
            '+',
            'past participle',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-4 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 grid w-full max-w-[980px] gap-4">

                {{-- PART 1 --}}
                <section class="overflow-hidden rounded-[1.35rem] border-2 border-blue-200 bg-white shadow-sm dark:border-blue-800 dark:bg-slate-900">
                    <div class="flex items-center gap-2 border-b-2 border-blue-100 bg-blue-50 px-4 py-2 text-blue-950 dark:border-blue-800 dark:bg-blue-950/40 dark:text-blue-100">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 border-blue-200 bg-white text-xl font-black text-blue-700 shadow-sm dark:border-blue-700 dark:bg-slate-900 dark:text-blue-200">
                            1
                        </div>

                        <h2 class="text-base font-black uppercase leading-tight tracking-wide sm:text-xl">
                            Present Simple
                            <span class="text-sm font-extrabold normal-case sm:text-base">
                                (Facts and General Truths)
                            </span>
                        </h2>
                    </div>

                    <div class="grid gap-4 p-4 lg:grid-cols-[1fr_20rem] lg:items-center">
                        <article>
                            <p class="text-sm font-extrabold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                We use the present simple to talk about facts, habits, and general ideas.
                            </p>

                            <p class="mt-3 text-sm font-black text-blue-700 dark:text-blue-300 sm:text-base">
                                Examples from the text:
                            </p>

                            <ul class="mt-3 space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                @foreach($content['active_examples'] as $example)
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-blue-500"></span>
                                        <span>{!! $example !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </article>

                        {{-- REMEMBER BOX --}}
                        <aside class="rounded-2xl border-2 border-blue-200 bg-blue-50/70 p-4 shadow-sm dark:border-blue-800 dark:bg-blue-950/30">
                            <div class="mx-auto mb-3 inline-flex rounded-xl border border-blue-200 bg-white px-5 py-1.5 text-sm font-black uppercase text-blue-800 shadow-sm dark:border-blue-700 dark:bg-slate-900 dark:text-blue-200">
                                Remember
                            </div>

                            <div class="grid gap-2">
                                @foreach($content['remember'] as $item)
                                    <div class="rounded-xl border border-blue-100 bg-white px-3 py-2 shadow-sm dark:border-blue-800 dark:bg-slate-900">
                                        <div class="flex gap-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100">
                                            <span class="shrink-0 text-blue-600">✅</span>
                                            <span>{!! $item !!}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </section>

                {{-- PART 2 --}}
                <section class="overflow-hidden rounded-[1.35rem] border-2 border-green-200 bg-white shadow-sm dark:border-green-800 dark:bg-slate-900">
                    <div class="flex items-center gap-2 border-b-2 border-green-100 bg-green-50 px-4 py-2 text-green-950 dark:border-green-800 dark:bg-green-950/40 dark:text-green-100">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 border-green-200 bg-white text-xl font-black text-green-700 shadow-sm dark:border-green-700 dark:bg-slate-900 dark:text-green-200">
                            2
                        </div>

                        <h2 class="text-base font-black uppercase leading-tight tracking-wide sm:text-xl">
                            Passive Voice
                            <span class="text-sm font-extrabold normal-case sm:text-base">
                                (Focus on the Action)
                            </span>
                        </h2>
                    </div>

                    <div class="grid gap-4 p-4 lg:grid-cols-[1fr_20rem] lg:items-center">
                        <article>
                            <p class="text-sm font-extrabold leading-snug text-slate-900 dark:text-slate-100 sm:text-base">
                                We use the passive voice when we don’t know or don’t need to mention who does the action.
                            </p>

                            <p class="mt-3 text-sm font-black text-emerald-700 dark:text-emerald-300 sm:text-base">
                                Examples from the text:
                            </p>

                            <ul class="mt-3 space-y-2 text-sm font-bold leading-snug text-slate-800 dark:text-slate-100 sm:text-base">
                                @foreach($content['passive_examples'] as $example)
                                    <li class="flex gap-2">
                                        <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-emerald-500"></span>
                                        <span>{!! $example !!}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-4 flex items-center gap-3">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-3xl shadow-inner dark:bg-slate-800">
                                    📺
                                </div>

                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-50 text-3xl shadow-inner dark:bg-green-950/40">
                                    📣
                                </div>
                            </div>
                        </article>

                        {{-- FORMULA BOX --}}
                        <aside class="rounded-2xl border-2 border-green-200 bg-green-50/70 p-4 text-center shadow-sm dark:border-green-800 dark:bg-green-950/30">
                            <div class="mx-auto mb-3 inline-flex rounded-xl border border-green-200 bg-white px-5 py-1.5 text-sm font-black uppercase text-green-800 shadow-sm dark:border-green-700 dark:bg-slate-900 dark:text-green-200">
                                Formula
                            </div>

                            <div class="rounded-xl border border-green-100 bg-white px-5 py-4 shadow-sm dark:border-green-800 dark:bg-slate-900">
                                <p class="text-lg font-black leading-snug text-slate-900 dark:text-white">
                                    {{ $content['formula'][0] }}
                                </p>

                                <p class="my-1 text-xl font-black leading-none text-green-700 dark:text-green-300">
                                    {{ $content['formula'][1] }}
                                </p>

                                <p class="text-lg font-black leading-snug text-slate-900 dark:text-white">
                                    {{ $content['formula'][2] }}
                                </p>
                            </div>
                        </aside>
                    </div>
                </section>

            </div>
        </section>
    </main>
@endsection