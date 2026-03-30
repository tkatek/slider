<?php
$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => '',

    'left' => [
        'number' => 1,
        'icon'   => '🏠',
        'title'  => 'Family Basics',
        'image'  => materialAsset('slider/A1/Beginner/chapter-4/img/slide15.webp'),
        'words'  => [
            ['icon' => '👨', 'text' => 'Father', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Father.mp3')],
            ['icon' => '👩', 'text' => 'Mother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Mother.mp3')],
            ['icon' => '👦', 'text' => 'Brother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Brother.mp3')],
            ['icon' => '👧', 'text' => 'Sister', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Sister.mp3')],
            ['icon' => '👧', 'text' => 'Daughter', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Daughter.mp3')],
            ['icon' => '👦', 'text' => 'Son', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Son.mp3')],
        ],
    ],

    'right' => [
        'number' => 2,
        'icon'   => '🌿',
        'title'  => 'Other Family Words',
        'words'  => [
            ['icon' => '👴', 'text' => 'Grandfather', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandfather.mp3')],
            ['icon' => '👵', 'text' => 'Grandmother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Grandmother.mp3')],
            ['icon' => '🧔', 'text' => 'Uncle', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Uncle.mp3')],
            ['icon' => '👩‍🦱', 'text' => 'Aunt', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Aunt.mp3')],
            ['icon' => '🧑‍🤝‍🧑', 'text' => 'Cousin', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Cousin.mp3')],
            ['icon' => '👧', 'text' => 'Niece', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Niece.mp3')],
            ['icon' => '👦', 'text' => 'Nephew', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Nephew.mp3')],
            ['icon' => '👩‍🍼', 'text' => 'Stepmother', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepmother.mp3')],
            ['icon' => '🧔‍♂️', 'text' => 'Stepfather', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Stepfather.mp3')],
            ['icon' => '🤝', 'text' => 'Brother-in-law', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Brother-in-law.mp3')],
            ['icon' => '🤝', 'text' => 'Sister-in-law', 'sound' => materialAsset('slider/A1/Beginner/chapter-4/audios/Sister-in-law.mp3')],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .thin-scroll::-webkit-scrollbar{ width: 10px; }
        .thin-scroll::-webkit-scrollbar-thumb{
            background: rgba(100,116,139,.28);
            border-radius: 999px;
            border: 3px solid transparent;
            background-clip: content-box;
        }
        .dark .thin-scroll::-webkit-scrollbar-thumb{
            background: rgba(148,163,184,.22);
            border: 3px solid transparent;
            background-clip: content-box;
        }

        /* 🌊 Audio Icon States */
        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        /* When speaking: show waves, hide speaker icon */
        .vocab-item.speaking .wave-bar { display: block; }
        .vocab-item.speaking .static-icon { display: none; }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-6xl px-4 sm:px-8 py-6 sm:py-7 lg:py-6 lg:min-h-[100dvh] lg:flex lg:flex-col lg:justify-center">
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

            <section class="grid grid-cols-1 lg:grid-cols-2 gap-3 sm:gap-4 items-stretch">
                <section id="panel1"
                         class="anim-panel rounded-[26px] border border-slate-200/60 bg-white/55 backdrop-blur-xl
                                shadow-xl shadow-slate-900/5 dark:border-slate-700/30 dark:bg-slate-950/30 dark:shadow-black/30
                                p-3 sm:p-4 lg:flex lg:flex-col">

                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">{{ $content['left']['icon'] }}</span>
                            <h2 class="text-lg sm:text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                {{ $content['left']['title'] }}
                            </h2>
                        </div>

                        <div class="px-2.5 py-1 rounded-full text-xs sm:text-sm font-black
                                    border border-slate-200/70 bg-white/70 dark:border-slate-700/30 dark:bg-slate-900/20
                                    text-slate-700 dark:text-slate-200">
                            {{ $content['left']['number'] }}
                        </div>
                    </div>

                    <div class="mt-3">
                        <img
                                src="{{ $content['left']['image'] }}"
                                alt="{{ $content['left']['title'] }}"
                                width="512"
                                height="512"
                                loading="lazy"
                                decoding="async"
                                class="w-full max-w-[440px] sm:max-w-[280px] lg:max-w-[440px] mx-auto object-contain select-none"
                                draggable="false"
                        />
                    </div>

                    <div class="mt-3 flex-1 overflow-y-auto thin-scroll lg:pr-1 lg:-mr-1 px-1 pb-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                            @foreach($content['left']['words'] as $word)
                                <div class="vocab-item rounded-2xl p-3 bg-white/85 dark:bg-slate-900/25
                                            shadow-md shadow-slate-900/10 dark:shadow-black/40
                                            ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                            cursor-pointer"
                                     data-sound="{{ $word['sound'] }}">
                                    <div class="flex items-center justify-between gap-3 anim-item">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-xl flex items-center justify-center font-black text-sm
                                                        border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                                        dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                                {{ $word['icon'] }}
                                            </div>
                                            <div class="font-semibold tracking-[-0.01em] text-slate-800 dark:text-slate-50 text-base sm:text-lg leading-[1.4]">
                                                {{ $word['text'] }}
                                            </div>
                                        </div>

                                        <!-- Audio Icon Container -->
                                        <div class="audio-icon-container flex items-center justify-center text-slate-500 dark:text-slate-400">
                                            <!-- Speaker Icon (Static) -->
                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <!-- Wave Bars (Animated) -->
                                            <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </section>

                <section id="panel2"
                         class="anim-panel rounded-[26px] border border-slate-200/60 bg-white/55 backdrop-blur-xl
                                shadow-xl shadow-slate-900/5 dark:border-slate-700/30 dark:bg-slate-950/30 dark:shadow-black/30
                                p-3 sm:p-4 lg:flex lg:flex-col">

                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-lg">{{ $content['right']['icon'] }}</span>
                            <h2 class="text-lg sm:text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-50">
                                {{ $content['right']['title'] }}
                            </h2>
                        </div>

                        <div class="px-2.5 py-1 rounded-full text-xs sm:text-sm font-black
                                    border border-slate-200/70 bg-white/70 dark:border-slate-700/30 dark:bg-slate-900/20
                                    text-slate-700 dark:text-slate-200">
                            {{ $content['right']['number'] }}
                        </div>
                    </div>

                    <div class="mt-3 flex-1 overflow-y-auto thin-scroll lg:pr-1 lg:-mr-1 px-1 pb-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                            @foreach($content['right']['words'] as $word)
                                <div class="vocab-item rounded-2xl p-3 bg-white/85 dark:bg-slate-900/25
                                            shadow-md shadow-slate-900/10 dark:shadow-black/40
                                            ring-1 ring-slate-200/60 dark:ring-slate-700/40
                                            cursor-pointer"
                                     data-sound="{{ $word['sound'] }}">
                                    <div class="flex items-center justify-between gap-3 anim-item">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-xl flex items-center justify-center font-black text-sm
                                                        border border-indigo-500/25 bg-indigo-500/10 text-indigo-700
                                                        dark:border-indigo-500/30 dark:bg-indigo-500/15 dark:text-indigo-200">
                                                {{ $word['icon'] }}
                                            </div>
                                            <div class="font-semibold tracking-[-0.01em] text-slate-800 dark:text-slate-50 text-base sm:text-lg leading-[1.4]">
                                                {{ $word['text'] }}
                                            </div>
                                        </div>

                                        <!-- Audio Icon Container -->
                                        <div class="audio-icon-container flex items-center justify-center text-slate-500 dark:text-slate-400">
                                            <!-- Speaker Icon (Static) -->
                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <!-- Wave Bars (Animated) -->
                                            <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </section>

        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // --- Audio Player Logic ---
            let currentAudio = null;

            document.querySelectorAll('.vocab-item').forEach(item => {
                item.addEventListener('click', function() {
                    const soundSrc = this.dataset.sound;
                    if (!soundSrc) return;

                    // If clicking the same item that is playing, stop it
                    if (currentAudio && currentAudio.src === soundSrc && !currentAudio.paused) {
                        currentAudio.pause();
                        currentAudio.currentTime = 0;
                        this.classList.remove('speaking');
                        currentAudio = null;
                        return;
                    }

                    // Stop any previous audio
                    if (currentAudio) {
                        currentAudio.pause();
                        currentAudio.currentTime = 0;
                        document.querySelectorAll('.vocab-item.speaking').forEach(el => el.classList.remove('speaking'));
                    }

                    // Play new audio
                    const audio = new Audio(soundSrc);
                    currentAudio = audio;

                    // Toggle .speaking class to change icons
                    this.classList.add('speaking');

                    audio.play().catch(e => {
                        console.log("Audio play error:", e);
                        this.classList.remove('speaking');
                    });

                    audio.onended = () => {
                        this.classList.remove('speaking');
                        if (currentAudio === audio) currentAudio = null;
                    };
                });
            });

            window.resetSlide = () => {
                if (currentAudio) {
                    currentAudio.pause();
                    currentAudio.currentTime = 0;
                    document.querySelectorAll('.vocab-item.speaking').forEach(el => el.classList.remove('speaking'));
                    currentAudio = null;
                }
            };
        });
    </script>
@endsection
