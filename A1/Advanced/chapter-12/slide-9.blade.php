@php
//    $content = is_array($content ?? null) ? $content : [];
    $title = 'Grammar';
    $subtitle = 'Comparative & Superlative forms';
    $imagePath = materialAsset('slider/A1/Advanced/chapter-12/img/slide10/comp.webp');
@endphp

@extends('slider.simple-layout')

@section('title', $title)

@section('style')
<style>
    .glass-card {
        background: white;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05);
    }
    .dark .glass-card {
        background: rgba(30, 41, 59, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
    }

    .sentence-card {
        transition: all 0.3s ease;
    }
    .sentence-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px -10px rgba(79, 70, 229, 0.15);
        border-color: rgba(79, 70, 229, 0.3);
    }
    .dark .sentence-card:hover {
        box-shadow: 0 12px 30px -10px rgba(99, 102, 241, 0.2);
        border-color: rgba(99, 102, 241, 0.4);
    }

    .remember-box {
        background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
        border: 1px solid rgba(99, 102, 241, 0.3);
    }
    .dark .remember-box {
        background: linear-gradient(135deg, rgba(67, 56, 202, 0.15) 0%, rgba(49, 46, 129, 0.25) 100%);
        border: 1px solid rgba(99, 102, 241, 0.3);
    }
</style>
@endsection

@section('content')
<section class="grammar-shell min-h-[100dvh] font-sans flex items-center justify-center py-6">
    <div class="mx-auto w-full max-w-[1400px] px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-6 sm:mb-8 lg:mb-12">
            <h1 class="text-3xl sm:text-4xl lg:text-6xl font-black leading-tight tracking-[-0.04em] bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent pb-2">
                {{ $title }}
            </h1>
            @if($subtitle)
            <p class="mt-2 text-lg sm:text-xl lg:text-2xl font-bold text-slate-600 dark:text-slate-300">
                {{ $subtitle }}
            </p>
            @endif
        </div>

        <div class="flex flex-col lg:flex-row gap-6 sm:gap-8 lg:gap-12 items-center justify-center">

            <!-- Left Side: Grammar Points -->
            <div class="w-full lg:w-[55%] flex flex-col space-y-3 sm:space-y-4">
                <div class="sentence-card glass-card rounded-2xl p-3 sm:p-4 lg:p-5 flex items-start gap-3 sm:gap-4">
                    <div class="mt-1 flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-base sm:text-lg">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </div>
                    <p class="text-base sm:text-lg lg:text-xl font-semibold text-slate-800 dark:text-slate-200 leading-relaxed">
                        The big phone is <span class="font-bold text-indigo-600 dark:text-indigo-400">more expensive</span> than the small one.
                    </p>
                </div>

                <div class="sentence-card glass-card rounded-2xl p-3 sm:p-4 lg:p-5 flex items-start gap-3 sm:gap-4">
                    <div class="mt-1 flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-sky-100 dark:bg-sky-900/50 flex items-center justify-center text-sky-600 dark:text-sky-400 text-base sm:text-lg">
                        <i class="fa-solid fa-piggy-bank"></i>
                    </div>
                    <p class="text-base sm:text-lg lg:text-xl font-semibold text-slate-800 dark:text-slate-200 leading-relaxed">
                        The small phone is <span class="font-bold text-sky-600 dark:text-sky-400">cheaper</span> than the big one.
                    </p>
                </div>

                <div class="sentence-card glass-card rounded-2xl p-3 sm:p-4 lg:p-5 flex items-start gap-3 sm:gap-4">
                    <div class="mt-1 flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-violet-100 dark:bg-violet-900/50 flex items-center justify-center text-violet-600 dark:text-violet-400 text-base sm:text-lg">
                        <i class="fa-solid fa-feather-pointed"></i>
                    </div>
                    <p class="text-base sm:text-lg lg:text-xl font-semibold text-slate-800 dark:text-slate-200 leading-relaxed">
                        The <span class="font-bold text-violet-600 dark:text-violet-400">cheaper</span> one is <span class="font-bold text-violet-600 dark:text-violet-400">lighter</span> and <span class="font-bold text-violet-600 dark:text-violet-400">easier</span> to hold.
                    </p>
                </div>

                <div class="sentence-card glass-card rounded-2xl p-3 sm:p-4 lg:p-5 flex items-start gap-3 sm:gap-4">
                    <div class="mt-1 flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center text-blue-600 dark:text-blue-400 text-base sm:text-lg">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <p class="text-base sm:text-lg lg:text-xl font-semibold text-slate-800 dark:text-slate-200 leading-relaxed">
                        The <span class="font-bold text-blue-600 dark:text-blue-400">more expensive</span> one has a <span class="font-bold text-blue-600 dark:text-blue-400">bigger</span> screen and a <span class="font-bold text-blue-600 dark:text-blue-400">better</span> camera at night.
                    </p>
                </div>

                <!-- Remember Section -->
                <div class="mt-4 sm:mt-6 remember-box rounded-2xl p-4 sm:p-5 lg:p-6 shadow-lg relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 opacity-10">
                        <i class="fa-solid fa-lightbulb text-5xl sm:text-6xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <div class="flex items-start gap-3 sm:gap-4 relative z-10">
                        <div class="flex-shrink-0 text-indigo-600 dark:text-indigo-400 text-2xl sm:text-3xl pt-1">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-black text-indigo-900 dark:text-indigo-300 mb-1 sm:mb-2 tracking-tight uppercase">Remember</h3>
                            <p class="text-base sm:text-lg lg:text-xl font-semibold text-indigo-950/80 dark:text-indigo-100/90 leading-relaxed">
                                Comparatives compare two things by adding <span class="bg-indigo-200/60 dark:bg-indigo-900/50 px-2 py-0.5 rounded font-black text-indigo-700 dark:text-indigo-300">'-er'</span> or putting <span class="bg-indigo-200/60 dark:bg-indigo-900/50 px-2 py-0.5 rounded font-black text-indigo-700 dark:text-indigo-300">'more'</span> before the word + <span class="font-black text-indigo-700 dark:text-indigo-300">than</span>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Image -->
            <div class="w-full lg:w-[45%] relative h-full sm:h-[750px] md:h-[750px] lg:h-[550px] group flex items-center justify-center">
                @if($imagePath)
                    <img src="{{ $imagePath }}" alt="Comparing Phones" class="max-w-full max-h-full object-contain transition-transform duration-700 lg:group-hover:scale-105 drop-shadow-2xl" onerror="this.style.display='none'">
                @endif
            </div>

        </div>
    </div>
</section>
@endsection

