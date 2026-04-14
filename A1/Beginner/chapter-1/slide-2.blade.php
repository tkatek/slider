<?php
$content = [
    'title' => "Introducing yourself",
    'subtitle' => "Hello! Can you introduce yourself?",
    'images' => [
        'female' => materialAsset('slider/A1/Beginner/chapter-1/img/female.webp'),
        'male'   => materialAsset('slider/A1/Beginner/chapter-1/img/male.webp'),
    ]
];
?>
@extends("slider.simple-layout")

@section('title', $content['title'])

@section("style")
@endsection

@section("content")
    <div class="relative min-h-[100dvh] w-full overflow-x-hidden overflow-y-auto">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1100px] flex-col items-center justify-center gap-6 px-6 py-8">
            <div class="header-section text-center space-y-6 my-8">
                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                    {{ $content['subtitle'] }}
                </p>
            </div>

            <div class="video-grid grid w-full grid-cols-1 gap-6 md:grid-cols-2 md:gap-8">
                <div class="video-card group relative aspect-square overflow-hidden rounded-[2.5rem] border-4 border-white bg-slate-300 shadow-[0_40px_80px_-30px_rgba(0,0,0,0.15)] max-md:aspect-[4/3] dark:border-slate-700 dark:bg-slate-800" id="card-1">
                    <img class="h-full w-full object-cover" src="{{ $content['images']['female'] }}" alt="Instructor">
                    <div class="participant-name absolute bottom-6 left-6 rounded-2xl border border-white bg-white/90 px-5 py-2.5 text-sm font-bold text-slate-800 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)] backdrop-blur dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100">
                        Tutor
                    </div>
                    <div class="mic-wave absolute right-6 top-6 flex h-[14px] items-end gap-[3px] rounded-lg bg-white/90 p-2 backdrop-blur dark:bg-slate-900/90">
                        <div class="wave-bar h-[8px] w-[3px] rounded-[1.5px] bg-indigo-500"></div>
                        <div class="wave-bar h-[12px] w-[3px] rounded-[1.5px] bg-indigo-500"></div>
                        <div class="wave-bar h-[10px] w-[3px] rounded-[1.5px] bg-indigo-500"></div>
                    </div>
                </div>

                <div class="video-card group relative aspect-square overflow-hidden rounded-[2.5rem] border-4 border-white bg-slate-300 shadow-[0_40px_80px_-30px_rgba(0,0,0,0.15)] max-md:aspect-[4/3] dark:border-slate-700 dark:bg-slate-800" id="card-2">
                    <img class="h-full w-full object-cover" src="{{ $content['images']['male'] }}" alt="Student">
                    <div class="participant-name absolute bottom-6 left-6 rounded-2xl border border-white bg-white/90 px-5 py-2.5 text-sm font-bold text-slate-800 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)] backdrop-blur dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100">
                        Your Preview
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection