<?php
$content = [
    'page_title' => 'How to write your address',
    'title'      => 'How to write your address',
    'subtitle'   => 'Put your address in the right order so it’s easy to read and understand.',

    'example_title'    => 'Example Form',
    'example_subtitle' => 'This is a sample filled address.',
    'fields' => [
        ['label' => '🏠 House No.',      'value' => '133'],
        ['label' => '🛣️ Street',        'value' => 'Main Street'],
        ['label' => '🏙️ Town / City',    'value' => 'Springfield'],
        ['label' => '🗺️ State / Region', 'value' => 'IL'],
        ['label' => '📮 Postal code',    'value' => '62704'],
    ],
    'example_label' => 'Example:',
    'example_value' => '133 Main Street, Springfield, IL 62704',

    'steps_title'    => 'Steps',
    'steps_subtitle' => 'Follow this order every time.',
    'steps' => [
        ['n' => '1', 'title' => 'Number',        'desc' => 'Write the house or building number first.'],
        ['n' => '2', 'title' => 'Street',        'desc' => 'Write the street name after the number.'],
        ['n' => '3', 'title' => 'Town / City',   'desc' => 'Write the town (or city) where you live.'],
        ['n' => '4', 'title' => 'State / Region','desc' => 'Write the state (or region) last.'],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-7 sm:py-8 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-4 sm:gap-5">

                    <div class="header-spacing text-center space-y-6 my-8">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{$content['title']}}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{$content['subtitle']}}
                        </p>
                    </div>
                    <div id="cardsWrap" class="w-full">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-4 items-stretch text-left">

                            <article id="card1"
                                     class="rounded-[24px] border border-slate-200 bg-white shadow-xl
                                            dark:border-slate-700 dark:bg-slate-900/95 p-5 sm:p-7">

                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                            {{ $content['example_title'] }}
                                        </h2>
                                        <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                            {{ $content['example_subtitle'] }}
                                        </p>
                                    </div>

                                    <div class="shrink-0 rounded-2xl border border-indigo-200 bg-indigo-50 px-2.5 py-1
                                                dark:border-indigo-400/20 dark:bg-indigo-400/10">
                                        <span class="text-xs sm:text-sm font-black text-indigo-700 dark:text-indigo-200">
                                            Address
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 space-y-2.5">
                                    @foreach($content['fields'] as $row)
                                        <div class="flex items-center justify-between gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                                                    dark:border-slate-700 dark:bg-slate-950/40">
                                            <div class="text-sm sm:text-base font-bold text-slate-700 dark:text-slate-200">
                                                {{ $row['label'] }}
                                            </div>
                                            <div class="rounded-xl border border-slate-200 bg-white px-3 py-1.5
                                                        dark:border-slate-700 dark:bg-slate-900/70">
                                                <span class="text-sm sm:text-base font-bold tracking-[-0.01em] text-slate-800 dark:text-slate-50">
                                                    {{ $row['value'] }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-4 rounded-[18px] border border-slate-200 bg-indigo-50/70 p-4
                                            dark:border-slate-700 dark:bg-indigo-400/10">
                                    <p class="text-sm sm:text-base font-bold text-slate-600 dark:text-slate-200">
                                        {{ $content['example_label'] }}
                                    </p>
                                    <p class="mt-1.5 text-base sm:text-lg font-black tracking-[-0.02em] leading-[1.45] text-slate-800 dark:text-slate-50 break-words">
                                        {{ $content['example_value'] }}
                                    </p>
                                </div>
                            </article>

                            <article id="card2"
                                     class="rounded-[24px] border border-slate-200 bg-white shadow-xl
                                            dark:border-slate-700 dark:bg-slate-900/95 p-5 sm:p-7">

                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                            {{ $content['steps_title'] }}
                                        </h2>
                                        <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                            {{ $content['steps_subtitle'] }}
                                        </p>
                                    </div>

                                    <div class="shrink-0 rounded-2xl border border-emerald-200 bg-emerald-50 px-2.5 py-1
                                                dark:border-emerald-300/20 dark:bg-emerald-400/10">
                                        <span class="text-xs sm:text-sm font-black text-emerald-700 dark:text-emerald-200">
                                            Order
                                        </span>
                                    </div>
                                </div>

                                <ol class="mt-4 space-y-2.5">
                                    @foreach($content['steps'] as $step)
                                        <li class="rounded-2xl border border-slate-200 bg-slate-50 p-4
                                                   dark:border-slate-700 dark:bg-slate-950/40">
                                            <div class="flex items-start gap-3">
                                                <div class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-full
                                                            border border-indigo-200 bg-indigo-50
                                                            dark:border-indigo-300/20 dark:bg-indigo-400/10">
                                                    <span class="text-sm font-black text-slate-800 dark:text-slate-50">
                                                        {{ $step['n'] }}
                                                    </span>
                                                </div>

                                                <div class="min-w-0">
                                                    <p class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50 leading-tight">
                                                        {{ $step['title'] }}
                                                    </p>
                                                    <p class="mt-1 text-sm sm:text-base font-bold leading-[1.45] text-slate-600 dark:text-slate-200">
                                                        {{ $step['desc'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </article>

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
