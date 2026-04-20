<?php
$content = [
    'page_title' => 'Quick wrap up!',
    'title'      => 'Quick wrap up!',
    'subtitle'   => 'Let\'s review what we\'ve learned about choosing a mobile phone and plan.',
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
<style>
    .option-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    .option-card:hover { transform: translateY(-2px); }
</style>

<section class="bg-[#f8fafc] dark:bg-[#0f172a] min-h-[100dvh] flex flex-col font-sans relative overflow-hidden">
    <div class="mx-auto flex w-full max-w-[1280px] flex-1 flex-col px-4 sm:px-6 lg:px-8 py-6 lg:py-10 relative z-10">

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

            <!-- Left Side: Interactive Questions -->
            <div class="w-full lg:w-1/2 flex flex-col gap-6 w-full max-w-lg mx-auto lg:mx-0 min-h-[400px] justify-center">

                <!-- Question -->
                <div class="flex flex-col gap-6 transform transition-all duration-500">

                    <div class="inline-flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center text-sm shadow-sm">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <span class="text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest">Question</span>
                    </div>

                    <div class="group relative flex items-center gap-5 p-6 sm:p-8 rounded-[2rem] bg-orange-50 dark:bg-orange-900/10 border-2 border-orange-200 dark:border-orange-800/50 shadow-lg transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500 to-amber-500 opacity-0 group-hover:opacity-5 rounded-[2rem] transition-opacity duration-300 pointer-events-none"></div>
                        <div class="flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 shrink-0 rounded-2xl bg-white dark:bg-slate-800 shadow-md text-2xl sm:text-3xl">
                            📱
                        </div>
                        <div class="flex-1">
                            <h2 class="text-xl sm:text-2xl font-black text-slate-800 dark:text-slate-100 leading-tight">
                                “What’s the most important feature you need in your mobile phone? and why?”
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side: Pro App UI Mockup -->
            <div class="w-full lg:w-1/2 flex items-center justify-center relative min-h-[500px] mt-8 lg:mt-0">
                <!-- Background Glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-blue-400 dark:from-indigo-600 dark:to-blue-600 rounded-full blur-[100px] opacity-30 dark:opacity-20 pointer-events-none"></div>

                <!-- Central Phone Mockup -->
                <div class="relative z-20 w-[280px] sm:w-[320px] bg-slate-50 dark:bg-[#0f172a] rounded-[3rem] border-[10px] border-slate-800 dark:border-slate-950 shadow-2xl overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">

                    <!-- Phone Notch -->
                    <div class="absolute top-0 inset-x-0 h-6 flex justify-center z-20">
                        <div class="w-32 h-5 bg-slate-800 dark:bg-slate-950 rounded-b-3xl"></div>
                    </div>

                    <!-- App Header -->
                    <div class="pt-10 pb-6 px-6 bg-gradient-to-br from-indigo-600 to-blue-600 text-white rounded-b-[2rem] shadow-md relative overflow-hidden">
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
                            <div class="flex items-center justify-between p-4 bg-white dark:bg-slate-800 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] dark:shadow-none border border-slate-100 dark:border-slate-700/50">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                        <i class="fa-solid fa-phone text-xs"></i>
                                    </div>
                                    <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Calls & Texts</span>
                                </div>
                                <span class="text-xs font-black text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-2 py-1 rounded-md">Unlimited</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Floating Badges -->
                <div>
                    <div class="hidden sm:flex absolute -right-4 lg:-right-8 top-1/4 z-30 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md p-3.5 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-600 items-center gap-3 transform rotate-3 hover:rotate-0 hover:-translate-y-1 transition-all cursor-default">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 dark:bg-indigo-500/20 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <i class="fa-solid fa-bolt text-lg"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest leading-tight mb-0.5">Network</p>
                            <p class="text-sm font-black text-slate-800 dark:text-slate-100 leading-tight">Super Fast 5G</p>
                        </div>
                    </div>

                    <div class="hidden sm:flex absolute -left-4 lg:-left-12 bottom-1/3 z-30 bg-white/95 dark:bg-slate-800/95 backdrop-blur-md p-3.5 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-600 items-center gap-3 transform -rotate-3 hover:rotate-0 hover:-translate-y-1 transition-all cursor-default">
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

    </div>
</section>

@endsection

