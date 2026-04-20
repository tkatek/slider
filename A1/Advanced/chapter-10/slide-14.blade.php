<?php
$content = [
    'page_title' => 'Quick wrap up!',
    'title'      => 'Quick wrap up!',
    'subtitle'   => 'Let\'s practice the vocabulary.',
    'questions'  => [
        [
            'image'      => materialAsset('slider/A1/Advanced/chapter-10/img/slide14/question1.webp'),
            'question'   => 'What are the people doing in the picture?',
            'options'    => [
                ['title' => 'Running',  'icon' => 'fa-person-running'],
                ['title' => 'Painting', 'icon' => 'fa-palette'],
                ['title' => 'Playing',  'icon' => 'fa-gamepad'],
                ['title' => 'Dancing',  'icon' => 'fa-music'],
            ]
        ],
        [
            'image'      => materialAsset('slider/A1/Advanced/chapter-10/img/slide14/question2.webp'),
            'question'   => 'What are the correct sentences?',
            'options'    => [
                ['title' => 'I am watching',  'icon' => 'fa-eye'],
                ['title' => 'They studying', 'icon' => 'fa-book-open'],
                ['title' => 'She not plays',  'icon' => 'fa-ban'],
                ['title' => 'They are studying',  'icon' => 'fa-graduation-cap'],
            ]
        ]
    ]
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
                                <h2 class="text-2xl sm:text-3xl font-black text-slate-800 dark:text-white leading-[1.3]" x-text="currentQuestion.question">
                                    {{ $content['questions'][0]['question'] }}
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
                                        <span x-text="option.title" class="text-sm xl:text-base"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Navigation Controls -->
                        <div class="flex justify-between items-center mt-4">
                            <button @click="prevQuestion"
                                    class="px-6 py-2.5 rounded-xl font-bold transition-all"
                                    :class="currentQuestionIndex > 0 ? 'bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-100 shadow-sm border border-slate-200 dark:border-slate-700' : 'opacity-0 pointer-events-none'">
                                <i class="fa-solid fa-arrow-left-long mr-2"></i> Previous
                            </button>

                            <div class="flex gap-2">
                                <template x-for="(q, idx) in questions" :key="idx">
                                    <div class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                         :class="idx === currentQuestionIndex ? 'bg-indigo-600 w-6' : 'bg-indigo-200 dark:bg-indigo-900'"></div>
                                </template>
                            </div>

                            <button @click="nextQuestion"
                                    class="px-6 py-2.5 rounded-xl font-bold transition-all"
                                    :class="currentQuestionIndex < questions.length - 1 ? 'bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-500/30' : 'opacity-0 pointer-events-none'">
                                Next <i class="fa-solid fa-arrow-right-long ml-2"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Right Side: Pro App UI Mockup (with branching) -->
                <div class="w-full lg:w-1/2 flex items-center justify-center relative min-h-[350px] sm:min-h-[400px] lg:min-h-[500px] mt-2 sm:mt-8 lg:mt-0 mb-6 lg:mb-0 order-first lg:order-last">
                    <!-- Background Glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-blue-400 dark:from-indigo-600 dark:to-blue-600 rounded-full blur-[100px] opacity-30 dark:opacity-20 pointer-events-none"></div>

                    <!-- Wrapper to synchronize phone and branches -->
                    <div class="relative w-full max-w-[300px] sm:max-w-[340px] lg:max-w-[360px] xl:max-w-[400px]">
                        <!-- Central Image Mockup -->
                        <div class="relative z-20 w-72 h-72 sm:w-80 sm:h-80 lg:w-[360px] lg:h-[360px] xl:w-[400px] xl:h-[400px] mx-auto bg-slate-50 dark:bg-[#0f172a] rounded-[2rem] sm:rounded-[3rem] border-[8px] md:border-[10px] border-slate-800 dark:border-slate-950 shadow-2xl overflow-hidden flex items-center justify-center transition-all duration-500"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-90"
                             x-transition:enter-end="opacity-100 transform scale-100">
                            <img :src="currentQuestion.image" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110" alt="Activity">
                        </div>

                        <!-- Branching Options -->
                        <div class="absolute inset-0 z-10 hidden lg:block pointer-events-none" x-show="options.length >= 4">
                            <!-- Top Left -->
                            <div class="absolute top-[5%] left-[-140px] xl:left-[-190px] transform transition-all duration-500"
                                 :class="selectedOption === 0 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(0)"
                                     :class="selectedOption === 0 ? 'border-emerald-500 shadow-emerald-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 0 ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid" :class="options[0]?.icon"></i>
                                    </div>
                                    <span class="font-black text-center text-xs xl:text-sm text-slate-900 dark:text-white leading-tight" x-text="options[0]?.title"></span>
                                </div>
                                <svg class="absolute top-1/2 left-full w-28 xl:w-40 h-32 overflow-visible origin-top-left -z-10"
                                     style="transform: translateY(-50%)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,150 100,150" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 0 ? '!text-emerald-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Top Right -->
                            <div class="absolute top-[22%] right-[-140px] xl:right-[-190px] transform transition-all duration-500"
                                 :class="selectedOption === 1 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(1)"
                                     :class="selectedOption === 1 ? 'border-indigo-500 shadow-indigo-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 1 ? 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid" :class="options[1]?.icon"></i>
                                    </div>
                                    <span class="font-black text-center text-xs xl:text-sm text-slate-900 dark:text-white leading-tight" x-text="options[1]?.title"></span>
                                </div>
                                <svg class="absolute top-1/2 right-full w-24 xl:w-36 h-32 overflow-visible origin-top-right -z-10"
                                     style="transform: translate(-100%, -50%) scaleX(-1)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,120 100,120" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 1 ? '!text-indigo-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Bottom Left -->
                            <div class="absolute bottom-[10%] left-[-120px] xl:left-[-170px] transform transition-all duration-500"
                                 :class="selectedOption === 2 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(2)"
                                     :class="selectedOption === 2 ? 'border-purple-500 shadow-purple-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 2 ? 'bg-purple-500 text-white shadow-lg shadow-purple-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid" :class="options[2]?.icon"></i>
                                    </div>
                                    <span class="font-black text-center text-xs xl:text-sm text-slate-900 dark:text-white leading-tight" x-text="options[2]?.title"></span>
                                </div>
                                <svg class="absolute bottom-1/2 left-full w-24 xl:w-36 h-32 overflow-visible origin-bottom-left -z-10"
                                     style="transform: translateY(50%) scaleY(-1)" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <path d="M0,50 C50,50 50,100 100,100" fill="none" stroke-width="3"
                                          class="text-slate-300 dark:text-slate-700 transition-colors duration-300 stroke-current"
                                          :class="selectedOption === 2 ? '!text-purple-500' : ''" stroke-dasharray="6,6"/>
                                </svg>
                            </div>

                            <!-- Bottom Right -->
                            <div class="absolute bottom-[2%] right-[-110px] xl:right-[-150px] transform transition-all duration-500"
                                 :class="selectedOption === 3 ? 'scale-110 z-30' : 'scale-100 z-10'">
                                <div class="bg-white/95 dark:bg-slate-800/95 p-4 rounded-2xl shadow-xl border-2 w-32 flex flex-col items-center pointer-events-auto cursor-pointer"
                                     @click="selectOption(3)"
                                     :class="selectedOption === 3 ? 'border-amber-500 shadow-amber-500/30' : 'border-slate-200 dark:border-slate-700'">
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-2 text-xl"
                                         :class="selectedOption === 3 ? 'bg-amber-500 text-white shadow-lg shadow-amber-500/40' : 'bg-slate-100 text-slate-600 dark:bg-slate-700 dark:text-slate-300'">
                                        <i class="fa-solid" :class="options[3]?.icon"></i>
                                    </div>
                                    <span class="font-black text-center text-xs xl:text-sm text-slate-900 dark:text-white leading-tight" x-text="options[3]?.title"></span>
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
                currentQuestionIndex: 0,
                selectedOption: null,
                questions: {!! json_encode($content['questions']) !!},

                get currentQuestion() {
                    return this.questions[this.currentQuestionIndex];
                },
                get options() {
                    return this.currentQuestion.options;
                },
                selectOption(index) {
                    this.selectedOption = index;
                },
                nextQuestion() {
                    if (this.currentQuestionIndex < this.questions.length - 1) {
                        this.currentQuestionIndex++;
                        this.selectedOption = null;
                    }
                },
                prevQuestion() {
                    if (this.currentQuestionIndex > 0) {
                        this.currentQuestionIndex--;
                        this.selectedOption = null;
                    }
                }
            }))
        });
    </script>

@endsection

