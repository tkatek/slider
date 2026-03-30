{{-- resources/views/slider/slide-rooms-responsive.blade.php --}}
<?php


$content = [
    'page_title' => 'New Vocabulary',
    'title'      => 'New Vocabulary',
    'subtitle'   => 'Rooms in a Home',
    'rows'       => [
        [
            'room' => ['emoji' => '🛏️', 'text' => 'Bedroom',     'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/bedroom.mp3')],
            'desc' => ['emoji' => '😴',  'text' => 'A room where you sleep and rest.', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/a-room-where-you-sleep-and-rest.mp3')],
        ],
        [
            'room' => ['emoji' => '🚿', 'text' => 'Bathroom',    'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/bathroom.mp3')],
            'desc' => ['emoji' => '🧼', 'text' => 'A room where you wash and use the toilet.', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/a-room-where-you-wash-and-use-the-toilet.mp3')],
        ],
        [
            'room' => ['emoji' => '🍳', 'text' => 'Kitchen',     'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/kitchen.mp3')],
            'desc' => ['emoji' => '👩‍🍳', 'text' => 'A room where you cook and prepare food.', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/a-room-where-you-cook-and-prepare-food.mp3')],
        ],
        [
            'room' => ['emoji' => '🛋️', 'text' => 'Living room', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/living-room.mp3')],
            'desc' => ['emoji' => '📺', 'text' => 'A room where you relax, watch TV, or sit with family.', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/a-room-where-you-relax-watch-tv-or-sit-with-family.mp3')],
        ],
        [
            'room' => ['emoji' => '🍽️', 'text' => 'Dining room', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/dining-room.mp3')],
            'desc' => ['emoji' => '🥘', 'text' => 'A room where you eat meals at a table.', 'sound' => materialAsset('slider/A1/Beginner/chapter-5/audios/slide7/a-room-where-you-eat-meals-at-a-table.mp3')],
        ],
    ],
];
?>

@extends('slider.simple-layout')
@section('style')
    <style>
        .wave-bar {
            display: none;
            width: 3px;
            height: 12px;
            background: currentColor;
            border-radius: 2px;
            margin: 0 1px;
        }

        .speak-btn.speaking .wave-bar { display: block; }
        .speak-btn.speaking .static-icon { display: none; }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-6 sm:py-8 lg:py-0 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">

                    <div class="header-spacing text-center space-y-6 my-8">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title']  }}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{ $content['subtitle']  }}
                        </p>
                    </div>

                    <div id="tableWrap" class="w-full max-w-4xl">

                        <div class="sm:hidden grid gap-3">
                            @foreach($content['rows'] as $row)
                                <div class="room-card rounded-2xl p-4
                                            bg-white/85 dark:bg-slate-900/25
                                            shadow-xl shadow-slate-900/10 dark:shadow-black/40
                                            ring-1 ring-slate-200/70 dark:ring-slate-700/50
                                            text-left">
                                    <div class="grid grid-cols-[minmax(0,1fr)_auto] items-start gap-3">
                                        <div class="flex items-center gap-2 min-w-0">
                                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl
                                                         bg-slate-900/5 dark:bg-white/10 ring-1 ring-slate-200/70 dark:ring-slate-700/50
                                                         text-xl leading-none shrink-0">
                                                {{ $row['room']['emoji'] ?? '🏠' }}
                                            </span>

                                            <div class="min-w-0">
                                                <div class="font-black text-lg text-slate-900 dark:text-slate-50 leading-tight truncate">
                                                    {{ $row['room']['text'] }}
                                                </div>
                                                <div class="text-sm font-semibold text-slate-500 dark:text-slate-300">
                                                    Room name
                                                </div>
                                            </div>
                                        </div>

                                        <button
                                                type="button"
                                                class="speak-btn shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-xl
                                                   bg-indigo-600/10 text-indigo-700 ring-1 ring-indigo-500/20
                                                   dark:bg-indigo-500/15 dark:text-indigo-200 dark:ring-indigo-400/25"
                                                data-src="{{ $row['room']['sound'] ?? '' }}"
                                                aria-label="Play room audio"
                                        >
                                            <!-- Speaker Icon (Static) -->
                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <!-- Wave Bars (Animated) -->
                                            <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                        </button>
                                    </div>

                                    <div class="my-3 h-px bg-slate-200/70 dark:bg-slate-700/50"></div>

                                    <div class="grid grid-cols-[minmax(0,1fr)_auto] items-start gap-3">
                                        <div class="flex items-start gap-2 min-w-0">
                                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl
                                                         bg-slate-900/5 dark:bg-white/10 ring-1 ring-slate-200/70 dark:ring-slate-700/50
                                                         text-xl leading-none shrink-0 mt-0.5">
                                                {{ $row['desc']['emoji'] ?? '💬' }}
                                            </span>

                                            <div class="min-w-0">
                                                <div class="text-base font-semibold text-slate-800 dark:text-slate-100 leading-[1.45]">
                                                    {{ $row['desc']['text'] }}
                                                </div>
                                                <div class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-300">
                                                    Description
                                                </div>
                                            </div>
                                        </div>

                                        <button
                                                type="button"
                                                class="speak-btn shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-xl
                                                   bg-indigo-600/10 text-indigo-700 ring-1 ring-indigo-500/20
                                                   dark:bg-indigo-500/15 dark:text-indigo-200 dark:ring-indigo-400/25"
                                                data-src="{{ $row['desc']['sound'] ?? '' }}"
                                                aria-label="Play description audio"
                                        >
                                            <!-- Speaker Icon (Static) -->
                                            <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                            </svg>

                                            <!-- Wave Bars (Animated) -->
                                            <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                            <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ Desktop/tablet (table) --}}
                        <div class="hidden sm:block rounded-2xl overflow-hidden
                                    bg-white/85 dark:bg-slate-900/25
                                    shadow-xl shadow-slate-900/10 dark:shadow-black/40
                                    ring-1 ring-slate-200/70 dark:ring-slate-700/50">
                            <div class="px-4 sm:px-5 py-3.5 text-left
                                        bg-gradient-to-r from-indigo-600/10 via-blue-600/10 to-purple-600/10
                                        dark:from-indigo-500/10 dark:via-blue-500/10 dark:to-purple-500/10
                                        border-b border-slate-200/70 dark:border-slate-700/50">
                                <div class="grid grid-cols-12 gap-3 items-center">
                                    <div class="col-span-5 font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">Room Name</div>
                                    <div class="col-span-7 font-black text-sm sm:text-base text-slate-900 dark:text-slate-50">Description</div>
                                </div>
                            </div>

                            <div class="divide-y divide-slate-200/70 dark:divide-slate-700/50">
                                @foreach($content['rows'] as $row)
                                    <div class="room-row px-4 sm:px-5 py-3.5 text-left
                                                bg-white/70 dark:bg-slate-900/10
                                                ">
                                        <div class="grid grid-cols-12 gap-3 items-start md:gap-12">

                                            <div class="col-span-5">
                                                <div class="flex items-center justify-between gap-3">
                                                    <div class="flex min-w-0 items-center gap-2">
                                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                                                                 bg-slate-900/5 dark:bg-white/10 ring-1 ring-slate-200/70 dark:ring-slate-700/50
                                                                 text-xl leading-none">
                                                        {{ $row['room']['emoji'] ?? '🏠' }}
                                                    </span>

                                                    <span class="min-w-0 font-extrabold text-base sm:text-lg text-slate-900 dark:text-slate-50 leading-tight">
                                                        {{ $row['room']['text'] }}
                                                    </span>
                                                    </div>

                                                    <button
                                                            type="button"
                                                            class="speak-btn inline-flex items-center justify-center h-9 w-9 rounded-xl
                                                               bg-indigo-600/10 text-indigo-700 ring-1 ring-indigo-500/20
                                                               dark:bg-indigo-500/15 dark:text-indigo-200 dark:ring-indigo-400/25"
                                                            data-src="{{ $row['room']['sound'] ?? '' }}"
                                                            aria-label="Play room audio"
                                                    >
                                                        <!-- Speaker Icon (Static) -->
                                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>

                                                        <!-- Wave Bars (Animated) -->
                                                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                                            <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-span-7">
                                                <div class="flex items-start justify-between gap-3">
                                                    <div class="flex min-w-0 items-start gap-2">
                                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                                                                 bg-slate-900/5 dark:bg-white/10 ring-1 ring-slate-200/70 dark:ring-slate-700/50
                                                                 text-xl leading-none mt-0.5">
                                                        {{ $row['desc']['emoji'] ?? '💬' }}
                                                    </span>

                                                    <span class="min-w-0 text-base sm:text-lg font-bold text-slate-700 dark:text-slate-200 leading-[1.45]">
                                                        {{ $row['desc']['text'] }}
                                                    </span>
                                                    </div>

                                                    <button
                                                            type="button"
                                                            class="speak-btn inline-flex items-center justify-center h-9 w-9 rounded-xl
                                                               bg-indigo-600/10 text-indigo-700 ring-1 ring-indigo-500/20
                                                               dark:bg-indigo-500/15 dark:text-indigo-200 dark:ring-indigo-400/25"
                                                            data-src="{{ $row['desc']['sound'] ?? '' }}"
                                                            aria-label="Play description audio"
                                                    >
                                                        <!-- Speaker Icon (Static) -->
                                                        <svg class="static-icon w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                            <path d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>

                                                        <!-- Wave Bars (Animated) -->
                                                        <div class="wave-bar" style="animation-delay: 0.1s"></div>
                                                        <div class="wave-bar" style="animation-delay: 0.2s"></div>
                                                        <div class="wave-bar" style="animation-delay: 0.3s"></div>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <audio id="globalAudio" preload="none"></audio>

                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const audio = document.getElementById("globalAudio");
            const allBtns = document.querySelectorAll(".speak-btn");
            let currentBtn = null;

            function setBtnState(btn, isPlaying) {
                if (!btn) return;
                // Toggle 'speaking' class to switch between Speaker Icon and Wave Bars via CSS
                btn.classList.toggle("speaking", isPlaying);
            }

            function resetAllBtns() {
                allBtns.forEach(b => setBtnState(b, false));
            }

            function stop() {
                try {
                    audio.pause();
                    audio.currentTime = 0;
                } catch(e) {}
                resetAllBtns();
                currentBtn = null;
            }

            function play(src, btn) {
                if (!src) return;

                // Stop any currently playing audio
                stop();

                // Start new audio
                audio.src = src;
                audio.currentTime = 0;

                const p = audio.play();
                if (p && typeof p.catch === "function") p.catch(() => {});

                currentBtn = btn;
                setBtnState(btn, true);
            }

            // Assign events
            allBtns.forEach(b => {
                b.addEventListener("click", () => {
                    const src = b.getAttribute("data-src");

                    // If clicking the currently playing button, stop it
                    if (currentBtn === b && !audio.paused) {
                        stop();
                    } else {
                        // Otherwise play
                        play(src, b);
                    }
                });
            });

            // When audio finishes naturally, reset button state
            audio.addEventListener("ended", () => {
                resetAllBtns();
                currentBtn = null;
            });

            window.resetSlide = () => { stop(); };
        });
    </script>
@endsection
