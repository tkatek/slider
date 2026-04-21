<?php
$content = [
    'page_title' => 'Remember!',
    'title'      => 'Remember!',
    'subtitle'   => 'Inquiring About Phone Plans',
    'questions'  => [
        [
            'icon' => '💬',
            'text' => 'What plans do you have?',
            'color' => 'from-blue-500 to-cyan-500',
            'bg' => 'bg-blue-50 dark:bg-blue-900/10',
            'border' => 'border-blue-200 dark:border-blue-800/50'
        ],
        [
            'icon' => '📊',
            'text' => 'How much data is included?',
            'color' => 'from-indigo-500 to-purple-500',
            'bg' => 'bg-indigo-50 dark:bg-indigo-900/10',
            'border' => 'border-indigo-200 dark:border-indigo-800/50'
        ]
    ],
    'image' => materialAsset('slider/A1/Advanced/chapter-12/img/slide16/inquiring-plans.webp') // Make sure this image is uploaded to your server
];

if (!function_exists('materialAsset')) {
    function materialAsset($path) {
        return 'https://remtoo.net/' . $path;
    }
}
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <section class="min-h-[100dvh] flex flex-col font-sans">
        <div class="mx-auto flex w-full max-w-[1280px] flex-1 flex-col px-4 sm:px-6 lg:px-8 py-6 lg:py-10">

            <!-- Title Section -->
            <div class="header-spacing text-center space-y-4 my-5 sm:my-8">
                <h1 class="page-title">
                <span class="page-title-text bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent font-black text-4xl sm:text-5xl lg:text-6xl leading-[1.02] tracking-[-0.04em]">
                    {{ $content['title'] }}
                </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="page-subtitle mx-auto mt-3 max-w-2xl text-base font-bold text-slate-600 dark:text-slate-400 sm:text-lg lg:text-xl">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </div>

            <!-- Main Content: Two Columns -->
            <div class="flex flex-col lg:flex-row flex-1 gap-10 lg:gap-12 items-center justify-center mt-4">

                <!-- Left Side: Essential Questions -->
                <div class="w-full lg:w-1/2 flex flex-col gap-6 w-full max-w-lg mx-auto lg:mx-0">
                    <div class="inline-flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center text-sm shadow-sm">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <span class="text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest">Key Questions</span>
                    </div>

                    @foreach($content['questions'] as $q)
                        <div class="group relative flex items-center gap-5 p-6 sm:p-8 rounded-[2rem] {{ $q['bg'] }} border-2 {{ $q['border'] }} shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <!-- Decorative glow behind card -->
                            <div class="absolute inset-0 bg-gradient-to-br {{ $q['color'] }} opacity-0 group-hover:opacity-5 rounded-[2rem] transition-opacity duration-300 pointer-events-none"></div>

                            <!-- Icon -->
                            <div class="flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 shrink-0 rounded-2xl bg-white dark:bg-slate-800 shadow-[0_8px_20px_-6px_rgba(0,0,0,0.15)] dark:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.4)] text-3xl sm:text-4xl group-hover:scale-110 transition-transform duration-300">
                                {!! $q['icon'] !!}
                            </div>

                            <!-- Question Text -->
                            <div class="flex-1">
                                <h2 class="text-2xl sm:text-3xl font-black text-slate-800 dark:text-slate-100 leading-tight">
                                    “{{ $q['text'] }}”
                                </h2>
                            </div>

                            <!-- Quote decoration -->
                            <i class="fa-solid fa-quote-right absolute top-6 right-8 text-4xl opacity-5 dark:opacity-10 text-slate-900 dark:text-white pointer-events-none"></i>
                        </div>
                    @endforeach
                </div>

                <!-- Right Side: Pro App UI Mockup -->
                <div class="w-full lg:w-1/2 flex items-center justify-center relative min-h-[500px] mt-8 lg:mt-0">
                    <!-- Background Glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-blue-400 dark:from-indigo-600 dark:to-blue-600 rounded-full blur-[100px] opacity-30 dark:opacity-20 pointer-events-none"></div>

                    <!-- Phone Mockup -->
                    <div class="relative z-10 w-[300px] sm:w-[320px] bg-slate-50 dark:bg-[#0f172a] rounded-[3rem] border-[10px] border-slate-800 dark:border-slate-950 shadow-2xl overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-500">

                        <!-- Phone Notch -->
                        <div class="absolute top-0 inset-x-0 h-6 flex justify-center z-20">
                            <div class="w-32 h-5 bg-slate-800 dark:bg-slate-950 rounded-b-3xl"></div>
                        </div>

                        <!-- App Header -->
                        <div class="pt-10 pb-6 px-6 bg-gradient-to-br from-indigo-600 to-blue-600 text-white rounded-b-[2rem] shadow-md relative overflow-hidden">
                            <!-- Decorative Header Pattern -->
                            <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="absolute -left-10 -bottom-10 w-24 h-24 bg-blue-400/20 rounded-full blur-2xl"></div>

                            <div class="flex justify-between items-center mb-6 relative z-10">
                                <i class="fa-solid fa-bars text-indigo-100 hover:text-white cursor-pointer"></i>
                                <span class="font-bold tracking-widest text-[10px] text-indigo-200">MY CARRIER</span>
                                <i class="fa-regular fa-bell text-indigo-100 hover:text-white cursor-pointer"></i>
                            </div>
                            <p class="text-indigo-200 text-xs font-bold uppercase tracking-wider mb-1 relative z-10">Current Plan</p>
                            <div class="flex items-end justify-between relative z-10">
                                <h3 class="text-2xl sm:text-3xl font-black tracking-tight">Premium <span class="text-lg text-emerald-300 bg-white/20 px-2 py-0.5 rounded-lg ml-1">5G</span></h3>
                                <div class="text-right leading-none">
                                    <span class="text-2xl sm:text-3xl font-black">$30</span>
                                    <span class="text-indigo-200 text-xs font-bold block mt-1">/mo</span>
                                </div>
                            </div>
                        </div>

                        <!-- App Body -->
                        <div class="flex-1 p-5 flex flex-col gap-4 bg-slate-50 dark:bg-[#0f172a]">

                            <!-- Data Usage Widget -->
                            <div class="bg-white dark:bg-slate-800 rounded-[1.5rem] p-5 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] dark:shadow-none border border-slate-100 dark:border-slate-700/50">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-bold">
                                        <div class="w-8 h-8 rounded-xl bg-blue-100 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 flex items-center justify-center">
                                            <i class="fa-solid fa-chart-pie text-sm"></i>
                                        </div>
                                        Data Usage
                                    </div>
                                    <span class="text-[10px] font-black text-slate-400 dark:text-slate-500 bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded-md uppercase tracking-wider">This Month</span>
                                </div>

                                <div class="mb-3 flex justify-between items-end">
                                    <span class="text-3xl font-black text-slate-900 dark:text-white leading-none tracking-tight">12.5 <span class="text-sm text-slate-400 font-bold">GB</span></span>
                                    <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wide">of 20 GB</span>
                                </div>

                                <!-- Progress Bar -->
                                <div class="w-full h-3 bg-slate-100 dark:bg-slate-700/50 rounded-full overflow-hidden shadow-inner">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 w-[62%] rounded-full relative">
                                        <div class="absolute top-0 right-0 bottom-0 w-10 bg-gradient-to-r from-transparent to-white/30 rounded-r-full"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Features Details -->
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-white dark:bg-slate-800 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] dark:shadow-none border border-slate-100 dark:border-slate-700/50 hover:border-indigo-300 dark:hover:border-indigo-600 transition-colors cursor-pointer group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <i class="fa-solid fa-phone text-xs"></i>
                                        </div>
                                        <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Calls & Texts</span>
                                    </div>
                                    <span class="text-xs font-black text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2 py-1 rounded-md">Unlimited</span>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-white dark:bg-slate-800 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] dark:shadow-none border border-slate-100 dark:border-slate-700/50 hover:border-indigo-300 dark:hover:border-indigo-600 transition-colors cursor-pointer group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-500/20 text-purple-600 dark:text-purple-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <i class="fa-solid fa-file-contract text-xs"></i>
                                        </div>
                                        <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Contract</span>
                                    </div>
                                    <span class="text-xs font-black text-purple-600 dark:text-purple-400 bg-purple-50 dark:bg-purple-900/30 px-2 py-1 rounded-md">No Contract</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Floating Badges -->
                    <div class="hidden sm:flex absolute -right-4 lg:-right-8 top-1/4 z-20 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md p-3.5 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-600 items-center gap-3 transform rotate-3 hover:rotate-0 hover:-translate-y-1 transition-all cursor-default">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 dark:bg-indigo-500/20 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <i class="fa-solid fa-bolt text-lg"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-tight mb-0.5">Network</p>
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100 leading-tight">Super Fast 5G</p>
                        </div>
                    </div>

                    <div class="hidden sm:flex absolute -left-4 lg:-left-12 bottom-1/3 z-20 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md p-3.5 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-600 items-center gap-3 transform -rotate-3 hover:rotate-0 hover:-translate-y-1 transition-all cursor-default">
                        <div class="w-10 h-10 rounded-full bg-emerald-50 dark:bg-emerald-500/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                            <i class="fa-solid fa-piggy-bank text-lg"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-tight mb-0.5">Value</p>
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100 leading-tight">Best Price</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection

