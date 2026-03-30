<?php
$content = [
    'page_title' => 'Notice the following',
    'title'      => 'Notice the following',
    'subtitle'   => '',

    'bullets' => [
        [
            'parts' => [
                ['t' => 'There', 'c' => 'text-indigo-600'],
                ['t' => ' is',    'c' => 'text-red-500'],
                ['t' => ' a fire. ', 'c' => 'text-slate-900 dark:text-slate-50'],
                ['t' => '(There is + a/an + singular noun)', 'c' => 'text-indigo-600'],
            ],
        ],
        [
            'parts' => [
                ['t' => 'There', 'c' => 'text-indigo-600'],
                ['t' => ' are',  'c' => 'text-red-500'],
                ['t' => ' injured people. ', 'c' => 'text-slate-900 dark:text-slate-50'],
                ['t' => '(There are + plural noun.)', 'c' => 'text-indigo-600'],
            ],
        ],
    ],

    'prompt' => "Now it’s your turn: There is or There are...?!",

    'images' => [
        ['src' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/forrest-fire.webp'), 'alt' => '1'],
        ['src' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/car-accident.webp'), 'alt' => '2'],
        ['src' => materialAsset('slider/A1/Intermediate/chapter-6/img/slide4/house-on-fire.webp'), 'alt' => '3'],
    ],
];
?>

@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
    <style>
        .img-box{
            width: min(400px, 100%);
            aspect-ratio: 5 / 4; /* 400x320 */
        }
        .img-box img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
@endsection

@section("content")
    <main class="min-h-[100dvh] w-full flex items-center justify-center px-4 sm:px-8 py-8 sm:py-10">
        <div class="w-full max-w-6xl">
            <header id="titleBlock" class="text-center mb-6 sm:mb-10">
                <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="mt-2 font-extrabold tracking-[-0.02em] text-sm sm:text-base text-slate-700 dark:text-slate-200">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            <section id="slideBody" class="space-y-6 sm:space-y-8">
                {{-- BULLETS --}}
                <div class="rounded-[28px] border border-slate-200/70 bg-white/60 backdrop-blur-xl shadow-xl
                            dark:border-slate-700/30 dark:bg-slate-950/35 p-5 sm:p-7">
                    <ul class="space-y-6 sm:space-y-8">
                        @foreach($content['bullets'] as $b)
                            <li class="flex items-start gap-4">
                                <span class="mt-3 h-3 w-3 rounded-full bg-black/90 dark:bg-white/90 shrink-0"></span>

                                <div class="font-black leading-tight tracking-[-0.03em] text-2xl sm:text-3xl lg:text-4xl">
                                    @foreach($b['parts'] as $p)
                                        <span class="{{ $p['c'] }}">{{ $p['t'] }}</span>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8 sm:mt-10 text-center font-black tracking-[-0.03em] text-xl sm:text-2xl text-slate-900 dark:text-slate-50">
                        {{ $content['prompt'] }}
                    </div>
                </div>

                {{-- 3 IMAGES (400x320) --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 justify-items-center">
                    @foreach($content['images'] as $img)
                        <div class="img-box rounded-[24px] overflow-hidden border border-slate-200/70 bg-white/70 shadow-lg
                                    dark:border-slate-700/30 dark:bg-slate-950/30">
                            <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}">
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
