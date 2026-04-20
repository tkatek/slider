<?php
$content = [
    'page_title' => 'Quick wrap up!',
    'title'      => 'Quick wrap up!',
    'subtitle'   => 'Which question would you ask to find the cheapest plan?',
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .option-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .option-card:hover { transform: translateY(-2px); }
    </style>

    <section class="bg-[#f8fafc] dark:bg-[#0f172a] min-h-[100dvh] flex flex-col font-sans relative overflow-hidden" x-data="wrapUpSlide()">
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

                    <!-- Step 2 Question (Now main question) -->
                    <div class="flex flex-col gap-6 transform transition-all duration-500">
                        <div class="inline-flex items-center gap-2 mb-2">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-circle-question"></i>
                            </div>
                            <span class="text-sm font-black text-slate-700 dark:text-slate-300 uppercase tracking-widest">Question</span>
                        </div>

                        <div class="group relative flex flex-col gap-5 p-6 sm:p-8 rounded-[2rem] bg-indigo-50 dark:bg-indigo-900/10 border-2 border-indigo-200 dark:border-indigo-800/50 shadow-lg">
                            <div class="flex items-start gap-3 sm:gap-4 mb-2">
                                <span class="text-4xl sm:text-5xl text-indigo-400 dark:text-indigo-500 opacity-60 leading-none font-serif mt-[-8px] sm:mt-[-12px]">"</span>
                                <h2 class="text-2xl sm:text-3xl font-black text-slate-800 dark:text-white leading-[1.3]">
                                    Which question would you ask to find the <span class="text-indigo-700 dark:text-indigo-300 bg-indigo-200/50 dark:bg-indigo-800/50 px-2 py-0.5 rounded-lg whitespace-nowrap">cheapest plan</span>?
                                </h2>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <template x-for="(option, index) in options" :key="index">
                                    <button @click="selectOption(index)"
                                            class="option-card flex items-center gap-3 p-4 rounded-xl border-2 text-left w-full focus:outline-none font-bold"
                                            :class="selectedOption === index
                                            ? 'border-indigo-500 bg-white dark:bg-slate-800 text-indigo-600 dark:text-indigo-400 shadow-md transform scale-[1.02]'
                                            : 'border-slate-200 dark:border-slate-700 bg-white/50 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:border-indigo-300 dark:hover:border-indigo-600'">
                                        <div class="flex items-center justify-center w-8 h-8 rounded-lg shadow-sm"
                                             :class="selectedOption === index ? 'bg-indigo-500 text-white' : 'bg-slate-100 dark:bg-slate-700'">
                                            <i class="fa-solid" :class="option.icon"></i>
                                        </div>
                                        <span x-text="option.title"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Side: Pro App UI Mockup (with branching) -->
                <div class="w-full lg:w-1/2 flex items-center justify-center relative min-h-[500px] mt-8 lg:mt-0">
                    <!-- Background Glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-blue-400 dark:from-indigo-600 dark:to-blue-600 rounded-full blur-[100px] opacity-30 dark:opacity-20 pointer-events-none"></div>

                    <!-- Wrapper to synchronize phone and branches -->
                    <div class="relative w-[280px] sm:w-[320px]">
                        <!-- Central Phone Mockup -->
                        <div class="relative z-20 w-full bg-slate-50 dark:bg-[#0f172a] rounded-[3rem] border-[10px] border-slate-800 dark:border-slate-950 shadow-2xl overflow-hidden flex flex-col transition-all duration-500 scale-95">

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

                        <!-- Branching Options -->
                        <div class="absolute inset-0 z-10 hidden lg:block pointer-events-none">
                            <!-- Top Left: Price -->
                            <div class="absolute top-[5%] left-[-160px] xl:left-[-220px] transform transition-all duration-500"
                                 :class="selectedOption === 0 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(0)"
                                     :class="selectedOption === 0 ? 'border-emerald-500 shadow-emerald-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 0 ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    <span class="font-black text-sm text-slate-900 dark:text-white">Price</span>
                                </div>
                                <svg class="absolute top-1/2 left-full w-28 xl:w-40 h-32 overflow-visible origin-top-left -z-10"
                                     style="transform: translateY(-50%)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,150 100,150" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 0 ? '!text-emerald-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Top Right: Data -->
                            <div class="absolute top-[22%] right-[-160px] xl:right-[-220px] transform transition-all duration-500"
                                 :class="selectedOption === 1 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(1)"
                                     :class="selectedOption === 1 ? 'border-indigo-500 shadow-indigo-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 1 ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid fa-wifi"></i>
                                    </div>
                                    <span class="font-black text-sm text-slate-900 dark:text-white">Data</span>
                                </div>
                                <svg class="absolute top-1/2 right-full w-28 xl:w-40 h-32 overflow-visible origin-top-right -z-10"
                                     style="transform: translate(-100%, -50%) scaleX(-1)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,120 100,120" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 1 ? '!text-indigo-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Bottom Left: Features -->
                            <div class="absolute bottom-[10%] left-[-140px] xl:left-[-190px] transform transition-all duration-500"
                                 :class="selectedOption === 2 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(2)"
                                     :class="selectedOption === 2 ? 'border-purple-500 shadow-purple-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 2 ? 'bg-purple-500 text-white shadow-lg shadow-purple-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </div>
                                    <span class="font-black text-sm text-slate-900 dark:text-white">Features</span>
                                </div>
                                <svg class="absolute bottom-1/2 left-full w-28 xl:w-40 h-32 overflow-visible origin-bottom-left -z-10"
                                     style="transform: translateY(50%) scaleY(-1)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,100 100,100" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 2 ? '!text-purple-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Bottom Right: Plans -->
                            <div class="absolute bottom-[2%] right-[-130px] xl:right-[-170px] transform transition-all duration-500"
                                 :class="selectedOption === 3 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(3)"
                                     :class="selectedOption === 3 ? 'border-amber-500 shadow-amber-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 3 ? 'bg-amber-500 text-white shadow-lg shadow-amber-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid fa-file-contract"></i>
                                    </div>
                                    <span class="font-black text-sm text-slate-900 dark:text-white">Plans</span>
                                </div>
                                <svg class="absolute bottom-1/2 right-full w-24 xl:w-32 h-32 overflow-visible origin-bottom-right -z-10"
                                     style="transform: translate(-100%, 50%) scaleX(-1) scaleY(-1)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,150 100,150" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 3 ? '!text-amber-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('wrapUpSlide', () => ({
                selectedOption: null,
                options: [
                    { title: 'Price', icon: 'fa-tag' },
                    { title: 'Data', icon: 'fa-wifi' },
                    { title: 'Features', icon: 'fa-layer-group' },
                    { title: 'Plans', icon: 'fa-file-contract' }
                ],
                selectOption(index) {
                    this.selectedOption = index;
                }
            }))
        });
    </script>

@endsection

