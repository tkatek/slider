<?php
$content = [
    'page_title' => 'Steps for Writing a Standard Address (U.S.)',
    'title'      => 'Steps for Writing a Standard Address',
    'subtitle'   => 'Follow this order to make your address clear and easy to read.',

    'steps_label' => 'Step by step',
    'steps' => [
        ['n' => '1', 'icon' => '👤', 'title' => 'Recipient Name',        'desc' => 'Write the full name (title is optional) on the first line.'],
        ['n' => '2', 'icon' => '🏠', 'title' => 'Street Address',         'desc' => 'Write the house/building number and street name.'],
        ['n' => '3', 'icon' => '🚪', 'title' => 'Unit / Apartment',       'desc' => 'If you have one, add it on the same line (or right below).'],
        ['n' => '4', 'icon' => '🏙️', 'title' => 'City, State, ZIP',        'desc' => 'City, then state abbreviation, then ZIP code.'],
        ['n' => '5', 'icon' => '🌍', 'title' => 'Country (International)', 'desc' => 'If sending internationally, add the country on the last line in ALL CAPS.'],
    ],
    'example_label' => 'Example',
    'example'       => "John Doe\\n123 Main St Apt 4\\nNew York, NY 10001\\nUSA",

    'remember_title' => '✅ Remember',
    'remember_desc'  => 'Keep each part on its own line for clarity.',
    'state_title'    => '📌 State',
    'state_desc'     => 'In the U.S., states often use abbreviations (NY, CA, TX, FL…).',
];

$example = preg_replace("/[ \t]+/", " ", str_replace("\\n", "\n", $content['example']));
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .address-guide-shell {
            position: relative;
            overflow: hidden;
        }

        .address-guide-shell::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(520px 220px at 0% 0%, rgba(99, 102, 241, 0.12), transparent 60%),
                radial-gradient(480px 240px at 100% 0%, rgba(59, 130, 246, 0.10), transparent 58%);
            pointer-events: none;
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-[1400px] px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-6 sm:gap-8">

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

                    <div id="cardsWrap" class="w-full text-left">
                        <div class="address-guide-shell grid grid-cols-1 gap-5 rounded-[32px] border border-slate-200 bg-white px-4 py-4 shadow-[0_24px_70px_-42px_rgba(15,23,42,0.28)] dark:border-slate-700 dark:bg-slate-900/95 sm:px-5 sm:py-5 lg:grid-cols-[1.05fr_0.95fr] lg:gap-6 lg:px-6 lg:py-6">

                            {{-- Steps --}}
                            <article class="rounded-[28px] border border-slate-200/80 bg-slate-50/90 p-5 dark:border-slate-700 dark:bg-slate-950/55 sm:p-6">
                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="grid h-11 w-11 place-items-center rounded-2xl bg-gradient-to-br from-indigo-600 to-blue-500 text-white shadow-lg shadow-indigo-500/20">
                                            <span class="text-xl leading-none">🧭</span>
                                        </div>
                                        <div>
                                            <p class="text-[11px] font-black uppercase tracking-[0.24em] text-indigo-600 dark:text-indigo-300">
                                                {{ $content['steps_label'] }}
                                            </p>
                                            <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                                Address Order
                                            </h2>
                                        </div>
                                    </div>

                                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-black uppercase tracking-[0.18em] text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-200">
                                        U.S.
                                    </span>
                                </div>

                                <ol class="mt-5 grid gap-3">
                                    @foreach($content['steps'] as $s)
                                        <li class="rounded-[24px] border border-slate-200 bg-white px-4 py-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/75">
                                            <div class="grid grid-cols-[auto_1fr] items-start gap-4">
                                                <div class="flex items-center gap-2 sm:gap-3">
                                                    <div class="grid h-9 w-9 place-items-center rounded-full bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 text-sm font-black text-white shadow-sm shadow-indigo-500/25">
                                                        {{ $s['n'] }}
                                                    </div>
                                                    <div class="grid h-10 w-10 place-items-center rounded-2xl bg-indigo-50 text-lg text-indigo-700 dark:bg-indigo-500/12 dark:text-indigo-200">
                                                        <span class="leading-none">{{ $s['icon'] }}</span>
                                                    </div>
                                                </div>

                                                <div class="min-w-0">
                                                    <p class="text-base sm:text-lg font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50 leading-tight">
                                                        {{ $s['title'] }}
                                                    </p>
                                                    <p class="mt-1.5 text-sm sm:text-base font-bold leading-[1.5] text-slate-600 dark:text-slate-200">
                                                        {{ $s['desc'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </article>

                            {{-- Example --}}
                            <article class="rounded-[28px] border border-slate-200/80 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-900/90 sm:p-6">
                                <div class="flex items-center gap-3">
                                    <div class="grid h-11 w-11 place-items-center rounded-2xl bg-blue-50 text-xl text-blue-700 dark:bg-blue-500/12 dark:text-blue-200">
                                        <span class="leading-none">🧾</span>
                                    </div>
                                    <div>
                                        <p class="text-[11px] font-black uppercase tracking-[0.24em] text-blue-600 dark:text-blue-300">
                                            {{ $content['example_label'] }}
                                        </p>
                                        <h2 class="text-xl sm:text-2xl font-black tracking-[-0.02em] text-slate-800 dark:text-slate-50">
                                            Sample Address
                                        </h2>
                                    </div>
                                </div>

                                <div class="mt-5 rounded-[26px] border border-blue-100 bg-gradient-to-br from-blue-50 to-indigo-50 p-5 dark:border-blue-400/10 dark:from-slate-950 dark:to-slate-900">
                                    <div class="rounded-[22px] border border-slate-200/80 bg-white px-4 py-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/80">
                                        <div class="flex items-center justify-between gap-3 border-b border-dashed border-slate-200 pb-3 dark:border-slate-700">
                                            <span class="text-[11px] font-black uppercase tracking-[0.22em] text-slate-500 dark:text-slate-300">Mailing Format</span>
                                            <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-black uppercase tracking-[0.18em] text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-200">Clear</span>
                                        </div>
                                        <pre class="m-0 pt-4 whitespace-pre-wrap  font-mono text-sm sm:text-base font-semibold leading-[1.8] text-slate-800 dark:text-slate-50">{{ $example }}</pre>
                                    </div>
                                </div>

                                <div class="mt-4 grid gap-3 ">
                                    <div class="rounded-[24px] border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/40">
                                        <p class="text-base font-black text-slate-800 dark:text-slate-50">
                                            {{ $content['remember_title'] }}
                                        </p>
                                        <p class="mt-1 text-sm sm:text-base font-bold text-slate-600 dark:text-slate-200 leading-[1.45]">
                                            {{ $content['remember_desc'] }}
                                        </p>
                                    </div>

                                    <div class="rounded-[24px] border border-slate-200 bg-slate-50 p-4 dark:border-slate-700 dark:bg-slate-950/40">
                                        <p class="text-base font-black text-slate-800 dark:text-slate-50">
                                            {{ $content['state_title'] }}
                                        </p>
                                        <p class="mt-1 text-sm sm:text-base font-bold text-slate-600 dark:text-slate-200 leading-[1.45]">
                                            {{ $content['state_desc'] }}
                                        </p>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
