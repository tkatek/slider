<?php
$content = [
    'page_title' => 'How do you go to work?',
    'title'      => 'How do you go to work?',
    'subtitle'   => 'Do you go?',
    'options'    => [
        ['emoji' => '🚗', 'text' => 'By Car'],
        ['emoji' => '🚌', 'text' => 'By Bus'],
        ['emoji' => '🚆', 'text' => 'By Train'],
        ['emoji' => '🚶‍♂️', 'text' => 'On Foot'],
    ],
    'image'      => materialAsset('slider/A1/Beginner/chapter-8/img/c8-slide4.webp'),

    'image_sizes' => [
        'base' => ['w' => '100%',  'h' => '220px'],
        'sm'   => ['w' => '560px', 'h' => '320px'],
        'lg'   => ['w' => '600px', 'h' => '400px'],
    ],
];
?>

@php 
    $img = $content['image_sizes'] ?? []; 
    $baseW = $img['base']['w'] ?? '100%';
    $baseH = $img['base']['h'] ?? '220px';
    $smW   = $img['sm']['w']   ?? '560px';
    $smH   = $img['sm']['h']   ?? '320px';
    $lgW   = $img['lg']['w']   ?? '600px';
    $lgH   = $img['lg']['h']   ?? '400px';
@endphp

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .go-work-hero-image{
            display: block;
            width: min(var(--img-w), 100%);
            height: var(--img-h);
            object-fit: contain;
            object-position: center;
            background-repeat: no-repeat;
            background-position: center;
        }

        @media (min-width: 640px){
            .go-work-hero-image{
                width: min(var(--img-w-sm), 100%);
                height: var(--img-h-sm);
            }
        }

        @media (min-width: 1024px){
            .go-work-hero-image{
                width: min(var(--img-w-lg), 100%);
                height: var(--img-h-lg);
            }
        }
    </style>
@endsection

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-4 sm:gap-5 lg:gap-6">
                    <div class="header-spacing w-full text-center space-y-3 sm:space-y-4 mt-1 mb-1 sm:mt-2 sm:mb-2">

                        <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title']}}
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                            {{ $content['subtitle']}}
                        </p>
                    </div>

                    <div class="w-full max-w-4xl">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 lg:gap-5">
                            @foreach($content['options'] as $opt)
                                <div class="rounded-2xl border border-slate-200/70 bg-white px-4 py-4 sm:px-5 sm:py-5 shadow-[0_16px_55px_-35px_rgba(2,6,23,.35)] dark:border-white/10 dark:bg-slate-900/40">
                                    <div class="flex items-center justify-center gap-3">
                                        <span class="text-3xl sm:text-4xl lg:text-5xl">{{ $opt['emoji'] }}</span>
                                        <span class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                            {{ $opt['text'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <img
                            src="{{ $content['image'] }}"
                            alt="How do you go to work"
                            class="go-work-hero-image mx-auto max-w-full rounded-2xl"
                            style="--img-w: {{ $baseW }}; --img-h: {{ $baseH }}; --img-w-sm: {{ $smW }}; --img-h-sm: {{ $smH }}; --img-w-lg: {{ $lgW }}; --img-h-lg: {{ $lgH }};"
                            loading="eager"
                            decoding="async"
                    />
                </div>
            </section>
        </div>
    </main>
@endsection
