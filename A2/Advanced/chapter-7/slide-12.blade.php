<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar: Imperatives',
    'subtitle'   => '',

    'rule' => [
        'before'    => 'Notice how we use',
        'highlight' => 'the base verb form',
        'after'     => 'at the beginning of the sentence to give orders',
    ],

    'examples' => [
        ['emoji' => '🎯', 'text' => 'Set goals.'],
        ['emoji' => '📈', 'text' => 'Work towards goals.'],
        ['emoji' => '⚡', 'text' => 'Increase productivity.'],
        ['emoji' => '🏁', 'text' => 'Reach your goal.'],
        ['emoji' => '🧘', 'text' => 'Do things within your ability.'],
        ['emoji' => '✅', 'text' => 'Complete a goal.'],
        ['emoji' => '🚀', 'text' => 'Set the next goal.'],
    ],
];
?>

@extends('slider.simple-layout')

@section('content')
    <main class="min-h-[100dvh] w-full overflow-hidden px-3 py-4 text-slate-950 dark:text-slate-50 sm:px-5 lg:px-7">
        <section class="mx-auto flex min-h-[calc(100dvh-2rem)] w-full max-w-[1360px] flex-col justify-center">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-4 w-full max-w-[1180px] sm:mt-5 lg:mt-6">
                <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/90 p-4 shadow-2xl shadow-slate-200/70 backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/90 dark:shadow-slate-950/30 sm:p-5 lg:p-6">
                    <div class="pointer-events-none absolute -left-28 -top-28 h-72 w-72 rounded-full bg-[var(--ambient-one)] opacity-25 blur-3xl"></div>
                    <div class="pointer-events-none absolute -right-28 -bottom-28 h-72 w-72 rounded-full bg-[var(--ambient-two)] opacity-25 blur-3xl"></div>

                    <div class="relative grid items-center gap-4 lg:grid-cols-[0.95fr_1.35fr] lg:gap-6">
                        <div class="rounded-[1.75rem] border border-blue-100 bg-gradient-to-br from-blue-50 via-white to-indigo-50 p-4 shadow-lg shadow-blue-100/60 dark:border-blue-900/40 dark:from-blue-950/30 dark:via-slate-950/80 dark:to-indigo-950/30 dark:shadow-none sm:p-5 lg:p-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-3xl shadow-lg shadow-blue-500/25">
                                    📘
                                </div>

                                <div>
                                    <p class="text-sm font-black uppercase tracking-[0.18em] text-blue-700 dark:text-blue-300">
                                        {{ $content['page_title'] }}
                                    </p>
                                    <h1 class="mt-1 text-3xl font-black leading-none tracking-[-0.04em] text-slate-950 dark:text-white sm:text-4xl lg:text-5xl">
                                        {{ $content['subtitle'] }}
                                    </h1>
                                </div>
                            </div>

                            <div class="mt-5 rounded-3xl border border-white/80 bg-white/85 p-4 shadow-inner dark:border-slate-700/60 dark:bg-slate-900/70 sm:p-5">
                                <p class="text-xl font-black leading-[1.35] tracking-[-0.025em] text-slate-950 dark:text-slate-50 sm:text-2xl lg:text-[1.85rem]">
                                    {{ $content['rule']['before'] }}
                                    <span class="inline rounded-xl bg-rose-100 px-2 py-0.5 text-rose-600 underline decoration-rose-400 decoration-4 underline-offset-4 dark:bg-rose-950/60 dark:text-rose-300">
                                        {{ $content['rule']['highlight'] }}
                                    </span>
                                    {{ $content['rule']['after'] }}
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
                            @foreach($content['examples'] as $index => $example)
                                <article class="{{ $index === 6 ? 'sm:col-span-3 lg:col-span-2' : '' }} group relative overflow-hidden rounded-[1.6rem] border border-slate-200/80 bg-slate-50/90 p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:bg-white hover:shadow-xl hover:shadow-blue-100/70 dark:border-slate-700/70 dark:bg-slate-950/60 dark:hover:border-blue-500/50 dark:hover:bg-slate-900 dark:hover:shadow-none">
                                    <div class="pointer-events-none absolute -right-8 -top-8 h-20 w-20 rounded-full bg-blue-400/10 blur-2xl transition duration-300 group-hover:bg-blue-400/20"></div>

                                    <div class="relative flex min-h-[118px] flex-col justify-between sm:min-h-[130px] lg:min-h-[138px]">
                                        <div class="flex items-start justify-between gap-3">
                                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-3xl shadow-sm ring-1 ring-slate-200 transition duration-300 group-hover:scale-110 dark:bg-slate-900 dark:ring-slate-700 sm:h-16 sm:w-16 sm:text-4xl">
                                                {{ $example['emoji'] }}
                                            </div>

                                            <div class="h-2.5 w-2.5 rounded-full bg-blue-500/60 shadow-[0_0_20px_rgba(59,130,246,0.55)]"></div>
                                        </div>

                                        <p class="mt-4 text-base font-black leading-tight tracking-[-0.02em] text-slate-950 dark:text-white sm:text-lg lg:text-[1.05rem]">
                                            {{ $example['text'] }}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection