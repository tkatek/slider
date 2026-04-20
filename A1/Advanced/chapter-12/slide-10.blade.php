<?php
$content = [
    'page_title'    => 'Comparatives & Superlatives',
    'title'         => 'Comparatives & Superlatives:',
    'subtitle'      => 'Study the table and guess the missing words.',
    'questions' => [
        [
            'prompt'  => 'The big phone’s screen is ___ than the small one’s.',
            'correct' => 'bigger',
            'options' => ['bigger', 'smaller'],
        ],
        [
            'prompt'  => 'The small phone is ___ than the big one.',
            'correct' => 'cheaper',
            'options' => ['cheaper', 'more expensive'],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
<section class="bg-[#f8fafc] dark:bg-[#0f172a] min-h-[100dvh] flex flex-col font-sans">
    <div class="mx-auto flex w-full max-w-[1400px] flex-1 flex-col px-3 py-6 sm:px-6 lg:px-8">

        <div class="header-spacing text-center space-y-4 my-5 sm:my-6">
            <h1 class="page-title">
                <span class="page-title-text bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent font-black text-4xl sm:text-5xl lg:text-6xl leading-[1.02] tracking-[-0.04em]">
                    {{ ($content['title'] ) }}
                </span>
            </h1>

            @if(!empty($content['subtitle']))
                <p class="page-subtitle mx-auto mt-3 max-w-2xl text-base font-bold text-slate-700 dark:text-slate-300 sm:text-lg">
                    {{ $content['subtitle'] }}
                </p>
            @endif
        </div>

        <div class="flex flex-col xl:flex-row flex-1 gap-6 pb-8 items-stretch xl:items-start">

            <!-- Left side: Table -->
            <div class="w-full xl:w-[65%] xl:flex-shrink-0 overflow-hidden rounded-[1.25rem] sm:rounded-[2rem] border border-slate-200 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:border-slate-700/50 dark:bg-[#1e293b] flex flex-col">

                <!-- Desktop Table View -->
                <div class="hidden md:block flex-1 overflow-x-auto custom-scrollbar w-full" style="-webkit-overflow-scrolling: touch;">
                    <table class="w-full h-full text-left border-collapse min-w-[550px] md:min-w-[700px] m-0">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-md">
                                <th class="px-2 py-2 sm:px-3 sm:py-3 text-xs sm:text-sm lg:text-base font-extrabold tracking-widest uppercase border-r border-white/20 whitespace-nowrap text-center">Type</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 text-xs sm:text-sm lg:text-base font-extrabold tracking-widest uppercase border-r border-white/20 whitespace-nowrap text-center">Rule</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 text-xs sm:text-sm lg:text-base font-extrabold tracking-widest uppercase whitespace-nowrap text-center">Base Adjective</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 text-xs sm:text-sm lg:text-base font-extrabold tracking-widest uppercase whitespace-nowrap text-center text-white">Comparative</th>
                                <th class="px-2 py-2 sm:px-3 sm:py-3 text-xs sm:text-sm lg:text-base font-extrabold tracking-widest uppercase whitespace-nowrap text-center text-white">Superlative</th>
                            </tr>
                        </thead>
                        <tbody class="text-slate-700 dark:text-white text-base font-medium align-middle">
                            <!-- Short Adjectives (6 rows) -->
                            <tr class="bg-white dark:bg-[#1e293b] border-b border-slate-100 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 font-black text-slate-900 dark:text-white border-r border-slate-100 dark:border-slate-600 text-center align-middle" rowspan="6">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-lg sm:text-xl shadow-sm">
                                            <i class="fa-solid fa-compress-alt"></i>
                                        </div>
                                        <span class="text-[10px] sm:text-xs tracking-widest uppercase">Short<br>Adjectives</span>
                                    </div>
                                </td>
                                <td class="p-2 sm:p-3 font-extrabold text-slate-500 dark:text-white border-r border-slate-100 dark:border-slate-600 text-center align-middle whitespace-nowrap text-sm sm:text-base" rowspan="6">
                                    Add<br>
                                    <span class="text-indigo-600 dark:text-indigo-400">-er</span> <br>
                                    / <br>
                                    <span class="text-blue-600 dark:text-blue-400">-est</span>
                                </td>
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">noisy</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">noisier</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the noisiest</span></td>
                            </tr>
                            <tr class="bg-white dark:bg-[#1e293b] border-b border-slate-100 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">fast</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">faster</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the fastest</span></td>
                            </tr>
                            <tr class="bg-white dark:bg-[#1e293b] border-b border-slate-100 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">clean</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">cleaner</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the cleanest</span></td>
                            </tr>
                            <tr class="bg-white dark:bg-[#1e293b] border-b border-slate-100 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">green</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">greener</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the greenest</span></td>
                            </tr>
                            <tr class="bg-white dark:bg-[#1e293b] border-b border-slate-100 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">fresh</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">fresher</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the freshest</span></td>
                            </tr>
                            <tr class="bg-white dark:bg-[#1e293b] hover:bg-slate-50 dark:hover:bg-slate-800/80 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">cheap</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">cheaper</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the cheapest</span></td>
                            </tr>

                            <!-- Long Adjectives (3 rows) -->
                            <tr class="bg-slate-50 dark:bg-slate-800/40 border-b border-slate-200 dark:border-slate-700 border-t-[4px] hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-colors">
                                <td class="p-2 sm:p-3 font-black text-slate-900 dark:text-white border-r border-slate-200 dark:border-slate-700 text-center align-middle" rowspan="3">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-100 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center text-lg sm:text-xl shadow-sm">
                                            <i class="fa-solid fa-expand-arrows-alt"></i>
                                        </div>
                                        <span class="text-[10px] sm:text-xs tracking-widest uppercase">Long<br>Adjectives</span>
                                    </div>
                                </td>
                                <td class="p-2 sm:p-3 font-extrabold text-slate-500 dark:text-white border-r border-slate-200 dark:border-slate-700 text-center align-middle whitespace-nowrap text-sm sm:text-base" rowspan="3">
                                    Use<br>
                                    <span class="text-indigo-600 dark:text-indigo-400">more</span> <br>
                                    / <br>
                                    <span class="text-blue-600 dark:text-blue-400">the most</span>
                                </td>
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">crowded</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">more crowded</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the most crowded</span></td>
                            </tr>
                            <tr class="bg-slate-50 dark:bg-slate-800/40 border-b border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">exciting</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">more exciting</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the most exciting</span></td>
                            </tr>
                            <tr class="bg-slate-50 dark:bg-slate-800/40 border-b border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-colors">
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-white text-base sm:text-lg">difficult</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">more difficult</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the most difficult</span></td>
                            </tr>

                            <!-- Irregular Adjectives (1 row) -->
                            <tr class="bg-rose-50/50 dark:bg-rose-900/10 border-t-[4px] border-rose-200 dark:border-rose-800/50 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition-colors">
                                <td class="p-2 sm:p-3 font-black text-rose-900 dark:text-rose-200 border-r border-rose-100 dark:border-rose-800/30 text-center align-middle">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 flex items-center justify-center text-lg sm:text-xl shadow-sm">
                                            <i class="fa-solid fa-shapes"></i>
                                        </div>
                                        <span class="text-[10px] sm:text-xs tracking-widest uppercase">Irregular</span>
                                    </div>
                                </td>
                                <td class="p-2 sm:p-3 font-extrabold text-rose-500 dark:text-rose-400 border-r border-rose-100 dark:border-rose-800/30 text-center align-middle whitespace-nowrap text-sm sm:text-base">
                                    Change form
                                </td>
                                <td class="p-2 sm:p-3 text-center font-extrabold text-slate-700 dark:text-slate-200 text-base sm:text-lg">good</td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[6rem] items-center justify-center bg-rose-100/80 text-rose-700 border border-rose-200 dark:bg-rose-500/20 dark:text-rose-300 dark:border-rose-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">better</span></td>
                                <td class="p-2 sm:p-3 text-center"><span class="inline-flex min-w-[7rem] items-center justify-center bg-rose-100/80 text-rose-700 border border-rose-200 dark:bg-rose-500/20 dark:text-rose-300 dark:border-rose-500/30 px-3 py-1 rounded-xl font-black shadow-sm text-sm sm:text-base">the best</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards View -->
                <div class="block md:hidden flex-1 overflow-y-auto w-full p-4 space-y-5 bg-slate-50 dark:bg-[#0f172a]/50">

                    <!-- Short Adjectives -->
                    <div class="bg-white dark:bg-[#1e293b] rounded-[1.25rem] border border-slate-200 dark:border-slate-700 p-4 shadow-sm">
                        <div class="flex flex-row items-center gap-3 mb-4 pb-3 border-b border-slate-100 dark:border-slate-700">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-lg shadow-sm shrink-0">
                                <i class="fa-solid fa-compress-alt"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-wider text-xs">Short Adjectives</h3>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 font-extrabold mt-0.5">
                                    Rule: Add <span class="text-indigo-600 dark:text-indigo-400">-er</span> / <span class="text-blue-600 dark:text-blue-400">-est</span>
                                </p>
                            </div>
                        </div>

                        <!-- Header for grid -->
                        <div class="grid grid-cols-3 gap-2 mb-2 px-1 text-center">
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-slate-400 dark:text-slate-500">Base</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-indigo-400 dark:text-indigo-500">Comparative</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-blue-400 dark:text-blue-500">Superlative</div>
                        </div>

                        <!-- Items -->
                        <div class="space-y-2">
                            @php
                                $short_adjs = [
                                    ['noisy', 'noisier', 'the noisiest'],
                                    ['fast', 'faster', 'the fastest'],
                                    ['clean', 'cleaner', 'the cleanest'],
                                    ['green', 'greener', 'the greenest'],
                                    ['fresh', 'fresher', 'the freshest'],
                                    ['cheap', 'cheaper', 'the cheapest'],
                                ];
                            @endphp
                            @foreach($short_adjs as $adj)
                            <div class="grid grid-cols-3 gap-2 items-center text-center bg-slate-50 dark:bg-slate-800/50 p-2 rounded-xl border border-slate-100 dark:border-slate-700/50 hover:bg-slate-100 transition-colors">
                                <div class="font-extrabold text-slate-700 dark:text-white text-xs sm:text-sm">{{ $adj[0] }}</div>
                                <div><span class="inline-flex w-full py-1.5 px-1 items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 rounded-lg font-black shadow-sm text-[10px] sm:text-xs">{{ $adj[1] }}</span></div>
                                <div><span class="inline-flex w-full py-1.5 px-1 items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 rounded-lg font-black shadow-sm text-[10px] sm:text-xs">{{ $adj[2] }}</span></div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Long Adjectives -->
                    <div class="bg-white dark:bg-[#1e293b] rounded-[1.25rem] border border-slate-200 dark:border-slate-700 p-4 shadow-sm">
                        <div class="flex flex-row items-center gap-3 mb-4 pb-3 border-b border-slate-100 dark:border-slate-700">
                            <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center text-lg shadow-sm shrink-0">
                                <i class="fa-solid fa-expand-arrows-alt"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-slate-900 dark:text-white uppercase tracking-wider text-xs">Long Adjectives</h3>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 font-extrabold mt-0.5">
                                    Rule: Use <span class="text-indigo-600 dark:text-indigo-400">more</span> / <span class="text-blue-600 dark:text-blue-400">the most</span>
                                </p>
                            </div>
                        </div>

                        <!-- Header for grid -->
                        <div class="grid grid-cols-3 gap-2 mb-2 px-1 text-center">
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-slate-400 dark:text-slate-500">Base</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-indigo-400 dark:text-indigo-500">Comparative</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-blue-400 dark:text-blue-500">Superlative</div>
                        </div>

                        <!-- Items -->
                        <div class="space-y-2">
                            @php
                                $long_adjs = [
                                    ['crowded', 'more crowded', 'the most crowded'],
                                    ['exciting', 'more exciting', 'the most exciting'],
                                    ['difficult', 'more difficult', 'the most difficult'],
                                ];
                            @endphp
                            @foreach($long_adjs as $adj)
                            <div class="grid grid-cols-3 gap-2 items-center text-center bg-slate-50 dark:bg-slate-800/50 p-2 rounded-xl border border-slate-100 dark:border-slate-700/50 hover:bg-slate-100 transition-colors">
                                <div class="font-extrabold text-slate-700 dark:text-white text-[11px] min-[400px]:text-xs">{{ $adj[0] }}</div>
                                <div><span class="inline-flex w-full py-1.5 px-0.5 min-[400px]:px-1 items-center justify-center bg-indigo-50 text-indigo-700 border border-indigo-200 dark:bg-indigo-500/20 dark:text-white dark:border-indigo-500/30 rounded-lg font-black shadow-sm text-[9px] min-[400px]:text-[10px] leading-tight">{{ $adj[1] }}</span></div>
                                <div><span class="inline-flex w-full py-1.5 px-0.5 min-[400px]:px-1 items-center justify-center bg-blue-50 text-blue-700 border border-blue-200 dark:bg-blue-500/20 dark:text-white dark:border-blue-500/30 rounded-lg font-black shadow-sm text-[9px] min-[400px]:text-[10px] leading-tight">{{ $adj[2] }}</span></div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Irregular Adjectives -->
                    <div class="bg-white dark:bg-[#1e293b] rounded-[1.25rem] border border-rose-200 dark:border-rose-800/50 p-4 shadow-sm bg-rose-50/20 dark:bg-rose-900/5">
                        <div class="flex flex-row items-center gap-3 mb-4 pb-3 border-b border-rose-100 dark:border-rose-800/30">
                            <div class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-500/20 text-rose-600 dark:text-rose-400 flex items-center justify-center text-lg shadow-sm shrink-0">
                                <i class="fa-solid fa-shapes"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-rose-900 dark:text-rose-200 uppercase tracking-wider text-xs">Irregular</h3>
                                <p class="text-[11px] text-rose-500 dark:text-rose-400 font-extrabold mt-0.5">
                                    Rule: Change form completely
                                </p>
                            </div>
                        </div>

                        <!-- Header for grid -->
                        <div class="grid grid-cols-3 gap-2 mb-2 px-1 text-center">
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-slate-400 dark:text-slate-500">Base</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-rose-400 dark:text-rose-500">Comparative</div>
                            <div class="text-[10px] font-extrabold tracking-widest uppercase text-rose-400 dark:text-rose-500">Superlative</div>
                        </div>

                        <!-- Items -->
                        <div class="space-y-2">
                            <div class="grid grid-cols-3 gap-2 items-center text-center bg-white dark:bg-slate-800/50 p-2 rounded-xl border border-rose-100 dark:border-rose-800/30 hover:bg-rose-50 transition-colors">
                                <div class="font-extrabold text-slate-700 dark:text-white text-xs sm:text-sm">good</div>
                                <div><span class="inline-flex w-full py-1.5 px-1 items-center justify-center bg-rose-100/80 text-rose-700 border border-rose-200 dark:bg-rose-500/20 dark:text-rose-300 dark:border-rose-500/30 rounded-lg font-black shadow-sm text-[10px] sm:text-xs">better</span></div>
                                <div><span class="inline-flex w-full py-1.5 px-1 items-center justify-center bg-rose-100/80 text-rose-700 border border-rose-200 dark:bg-rose-500/20 dark:text-rose-300 dark:border-rose-500/30 rounded-lg font-black shadow-sm text-[10px] sm:text-xs">the best</span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right side: Questions -->
            <div class="w-full xl:w-[35%] flex flex-col gap-6">
                @foreach($content['questions'] as $index => $q)
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xl dark:border-slate-700/50 dark:bg-[#1e293b]">
                    <div class="mb-4 flex items-center justify-between">
                        <span class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-3 py-1 text-sm font-black text-indigo-700 dark:bg-indigo-500/20 dark:text-indigo-400">
                            Question {{ $index + 1 }}
                        </span>
                        <button onclick="resetAnswer({{ $index }})"
                                id="reset-btn-{{ $index }}"
                                class="hidden items-center gap-1.5 text-sm font-bold text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                            <i class="fa-solid fa-rotate-right"></i> Retry
                        </button>
                    </div>
                    <p class="mb-6 text-xl font-bold leading-relaxed text-slate-800 dark:text-white">
                        {!! str_replace('___', '<span class="inline-block border-b-2 border-slate-400 dark:border-slate-500 min-w-[3rem] px-2 text-center text-indigo-600 dark:text-indigo-400 transition-colors" id="blank-'.$index.'">___</span>', $q['prompt']) !!}
                    </p>

                    <div class="flex flex-col gap-3" id="options-{{ $index }}">
                        @foreach($q['options'] as $optIndex => $opt)
                        <button onclick="checkAnswer({{ $index }}, '{{ addslashes($opt) }}', '{{ addslashes($q['correct']) }}', this)"
                            class="w-full text-left rounded-xl border border-slate-200 bg-slate-50 px-5 py-3 text-lg font-bold text-slate-700 transition hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700 active:scale-[0.98] dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:hover:border-indigo-500/50 dark:hover:bg-indigo-500/10 dark:hover:text-indigo-300">
                            {{ $opt }}
                        </button>
                        @endforeach
                    </div>
                    <div id="feedback-{{ $index }}" class="mt-4 hidden rounded-xl px-4 py-3 text-sm font-bold text-center"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    // Audio contexts for correct and wrong answers
    const audioCorrect = new Audio('https://assets.mixkit.co/active_storage/sfx/2000/2000-preview.mp3');
    const audioWrong = new Audio('https://assets.mixkit.co/active_storage/sfx/2003/2003-preview.mp3');

    function checkAnswer(qIndex, selected, correct, btnElement) {
        const feedback = document.getElementById('feedback-' + qIndex);
        const blank = document.getElementById('blank-' + qIndex);
        const allButtons = btnElement.parentElement.querySelectorAll('button');

        allButtons.forEach(btn => {
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');
            if (btn.textContent.trim() === correct) {
                btn.classList.remove('border-slate-200', 'bg-slate-50', 'text-slate-700', 'dark:border-slate-600', 'dark:bg-slate-800', 'dark:text-slate-200');
                btn.classList.add('border-emerald-500', 'bg-emerald-50', 'text-emerald-700', 'dark:bg-emerald-500/20', 'dark:text-emerald-400');
            }
        });

        if (selected === correct) {
            // Play Correct Sound
            audioCorrect.currentTime = 0;
            audioCorrect.play().catch(e => console.log('Audio playback prevented', e));

            blank.textContent = selected;
            blank.classList.remove('border-slate-400', 'text-indigo-600');
            blank.classList.add('border-emerald-500', 'text-emerald-600', 'dark:text-emerald-400', 'dark:border-emerald-400');
            feedback.className = "mt-4 rounded-xl px-4 py-3 text-base font-bold text-center bg-emerald-100 text-emerald-700 dark:bg-emerald-500/20 dark:text-emerald-400 animate-[pop-correct_0.4s_ease-out]";
            feedback.innerHTML = '<i class="fa-solid fa-check-circle mr-2"></i> Great job! That is correct.';
        } else {
            // Play Wrong Sound
            audioWrong.currentTime = 0;
            audioWrong.play().catch(e => console.log('Audio playback prevented', e));

            btnElement.classList.remove('border-emerald-500', 'bg-emerald-50', 'text-emerald-700');
            btnElement.classList.add('border-rose-500', 'bg-rose-50', 'text-rose-700', 'dark:bg-rose-500/20', 'dark:text-rose-400');

            blank.textContent = correct;
            blank.classList.remove('border-slate-400', 'text-indigo-600');
            blank.classList.add('border-rose-500', 'text-emerald-600', 'dark:text-emerald-400');

            feedback.className = "mt-4 rounded-xl px-4 py-3 text-base font-bold text-center bg-rose-100 text-rose-700 dark:bg-rose-500/20 dark:text-rose-400 animate-[shake_0.4s_ease-in-out]";
            feedback.innerHTML = '<i class="fa-solid fa-xmark-circle mr-2"></i> Incorrect. The correct answer was "'+correct+'".';
        }
        feedback.classList.remove('hidden');

        // Show Retry button
        const resetBtn = document.getElementById('reset-btn-' + qIndex);
        resetBtn.classList.remove('hidden');
        resetBtn.classList.add('flex');
    }

    function resetAnswer(qIndex) {
        const feedback = document.getElementById('feedback-' + qIndex);
        const blank = document.getElementById('blank-' + qIndex);
        const resetBtn = document.getElementById('reset-btn-' + qIndex);
        const buttonsContainer = document.getElementById('options-' + qIndex);
        const allButtons = buttonsContainer.querySelectorAll('button');

        // Reset blank
        blank.textContent = '___';
        blank.className = "inline-block border-b-2 border-slate-400 dark:border-slate-500 min-w-[3rem] px-2 text-center text-indigo-600 dark:text-indigo-400 transition-colors";

        // Reset feedback
        feedback.className = "mt-4 hidden rounded-xl px-4 py-3 text-sm font-bold text-center";

        // Hide reset button
        resetBtn.classList.remove('flex');
        resetBtn.classList.add('hidden');

        // Reset all multiple choice buttons
        allButtons.forEach(btn => {
            btn.disabled = false;
            btn.className = "w-full text-left rounded-xl border border-slate-200 bg-slate-50 px-5 py-3 text-lg font-bold text-slate-700 transition hover:border-indigo-300 hover:bg-indigo-50 hover:text-indigo-700 active:scale-[0.98] dark:border-slate-600 dark:bg-slate-800 dark:text-slate-200 dark:hover:border-indigo-500/50 dark:hover:bg-indigo-500/10 dark:hover:text-indigo-300";
        });
    }
</script>

<style>
    /* Custom Scrollbar for responsive table */
    .custom-scrollbar::-webkit-scrollbar { height: 8px; width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 9999px; }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #475569; }

    /* Hide scrollbar on mobile/tablet (below 1280px) but keep functionality */
    @media (max-width: 1279px) {
        .custom-scrollbar::-webkit-scrollbar { display: none; height: 0; width: 0; }
        .custom-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    }

    @keyframes pop-correct {
        0% { transform: scale(0.95); opacity: 0; }
        50% { transform: scale(1.02); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
</style>
@endsection

