@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Grammar Focus',
        'title'      => 'Grammar Focus',
        'subtitle'   => 'Present simple: active & passive',

        'active_examples' => [
            'Advertising <span class="font-black text-blue-600 dark:text-blue-300">is</span> an important part of modern life.',
            'We <span class="font-black text-blue-600 dark:text-blue-300">see</span> advertisements on buses, billboards, and websites.',
            'Advertisers <span class="font-black text-blue-600 dark:text-blue-300">use</span> different techniques.',
        ],

        'remember' => [
            'Use the base verb for plural subjects (they <span class="font-black text-blue-600 dark:text-blue-300">use</span>, we <span class="font-black text-blue-600 dark:text-blue-300">see</span>)',
            'Add -s for he/she/it (advertising <span class="font-black text-blue-600 dark:text-blue-300">is</span>)',
        ],

        'passive_examples' => [
            'Advertisements <span class="font-black text-emerald-600 dark:text-emerald-300">are seen</span> on buses and websites.',
            'Products <span class="font-black text-emerald-600 dark:text-emerald-300">are promoted</span> through social media.',
            'Customers <span class="font-black text-emerald-600 dark:text-emerald-300">are influenced</span> by advertising techniques.',
        ],

        'formula' => 'am / is / are + past participle',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden px-4 py-5 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-[1180px]">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 grid w-full max-w-[1050px] gap-5 lg:grid-cols-2">

                <section class="rounded-2xl border border-blue-200 bg-white p-5 shadow-xl shadow-slate-200/70 dark:border-blue-500/30 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-6">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-600 text-2xl text-white">
                            📘
                        </div>

                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-blue-600 dark:text-blue-300">
                                Present Simple
                            </p>
                            <h2 class="text-2xl font-black text-slate-950 dark:text-white">
                                Facts and General Truths
                            </h2>
                        </div>
                    </div>

                    <p class="mt-5 text-base font-bold leading-relaxed text-slate-700 dark:text-slate-200">
                        We use the present simple to talk about facts, habits, and general ideas.
                    </p>

                    <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/50">
                        <p class="mb-3 text-sm font-black uppercase tracking-wide text-blue-600 dark:text-blue-300">
                            Examples from the text:
                        </p>

                        <ul class="space-y-3 text-base font-black leading-snug text-slate-900 dark:text-slate-100">
                            @foreach($content['active_examples'] as $example)
                                <li class="flex gap-2">
                                    <span class="text-blue-600">🔵</span>
                                    <span>{!! $example !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-5 rounded-xl bg-blue-50 p-4 dark:bg-blue-500/10">
                        <p class="mb-3 text-sm font-black uppercase tracking-wide text-blue-700 dark:text-blue-200">
                            ✅ Remember
                        </p>

                        <ul class="space-y-2 text-sm font-bold text-slate-700 dark:text-slate-200">
                            @foreach($content['remember'] as $item)
                                <li class="flex gap-2">
                                    <span>✅</span>
                                    <span>{!! $item !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <section class="rounded-2xl border border-emerald-200 bg-white p-5 shadow-xl shadow-slate-200/70 dark:border-emerald-500/30 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-6">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-600 text-2xl text-white">
                            📣
                        </div>

                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600 dark:text-emerald-300">
                                Passive Voice
                            </p>
                            <h2 class="text-2xl font-black text-slate-950 dark:text-white">
                                Focus on the Action
                            </h2>
                        </div>
                    </div>

                    <p class="mt-5 text-base font-bold leading-relaxed text-slate-700 dark:text-slate-200">
                        We use the passive voice when we don’t know or don’t need to mention who does the action.
                    </p>

                    <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/50">
                        <p class="mb-3 text-sm font-black uppercase tracking-wide text-emerald-600 dark:text-emerald-300">
                            Examples from the text:
                        </p>

                        <ul class="space-y-3 text-base font-black leading-snug text-slate-900 dark:text-slate-100">
                            @foreach($content['passive_examples'] as $example)
                                <li class="flex gap-2">
                                    <span class="text-emerald-600">🟢</span>
                                    <span>{!! $example !!}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-5 rounded-xl bg-emerald-50 p-4 text-center dark:bg-emerald-500/10">
                        <p class="text-sm font-black uppercase tracking-wide text-emerald-700 dark:text-emerald-200">
                            Formula
                        </p>
                        <p class="mt-2 text-2xl font-black text-slate-950 dark:text-white">
                            {{ $content['formula'] }}
                        </p>
                    </div>
                </section>

            </div>
        </section>
    </main>
@endsection