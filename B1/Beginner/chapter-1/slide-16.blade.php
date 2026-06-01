<?php

$content = [
    'page_title' => 'Speaking',
    'title'      => 'Speaking',
    'subtitle'   => 'Read each request & say a suitable responce',

    'items' => [
        [
            'number' => '1',
            'text'   => 'Could you please help me move this Saturday?',
            'mood'   => 'happy',
            'color'  => 'blue',
        ],
        [
            'number' => '2',
            'text'   => 'Would you be able to lend me your laptop for a day?',
            'mood'   => 'sad',
            'color'  => 'green',
        ],
        [
            'number' => '3',
            'text'   => 'Is there any chance you could pick me up from the airport?',
            'mood'   => 'happy',
            'color'  => 'yellow',
        ],
        [
            'number' => '4',
            'text'   => 'Would you mind watching my dog while I’m on holiday?',
            'mood'   => 'sad',
            'color'  => 'purple',
        ],
        [
            'number' => '5',
            'text'   => 'Could you please water my plants while I’m away?',
            'mood'   => 'happy',
            'color'  => 'pink',
        ],
    ],
];

?>

@extends('slider.simple-layout')

@php
    $content = is_array($content ?? null) ? $content : [];

    $pageTitle = trim((string)($content['page_title'] ?? 'Polite Requests'));
    $title = trim((string)($content['title'] ?? 'Polite Requests'));
    $subtitle = trim((string)($content['subtitle'] ?? ''));

    $items = is_array($content['items'] ?? null) ? $content['items'] : [];

    $rowStyles = [
        'blue' => [
            'number' => 'bg-[#1f78b4]',
            'box'    => 'border-[#7aa8cf] bg-[#edf5ff] dark:border-[#3f78a8] dark:bg-[#102438]',
        ],
        'green' => [
            'number' => 'bg-[#66a848]',
            'box'    => 'border-[#8fc57b] bg-[#effbea] dark:border-[#559944] dark:bg-[#142b1a]',
        ],
        'yellow' => [
            'number' => 'bg-[#d7a817]',
            'box'    => 'border-[#e7c85f] bg-[#fff7dd] dark:border-[#b99122] dark:bg-[#302611]',
        ],
        'purple' => [
            'number' => 'bg-[#8c6ad6]',
            'box'    => 'border-[#b6a0ea] bg-[#f2edff] dark:border-[#7c63c8] dark:bg-[#21183a]',
        ],
        'pink' => [
            'number' => 'bg-[#ee6e9a]',
            'box'    => 'border-[#f3a3bf] bg-[#fff0f6] dark:border-[#c95683] dark:bg-[#351726]',
        ],
    ];
@endphp

@section('content')
    <div class="relative h-[100dvh] w-full overflow-y-auto overflow-x-hidden font-['Plus_Jakarta_Sans']">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-[1180px] items-center px-4 py-4 sm:px-6 sm:py-5 lg:px-8 lg:py-6">
            <main class="w-full">
                <section class="grid w-full place-items-center gap-5 sm:gap-6">

                    @include('slider.components.title-subtitle')

                    <div class="w-full max-w-5xl rounded-[28px] border border-white/70 bg-white/70 p-3 shadow-[0_22px_60px_-34px_rgba(15,23,42,0.35)] backdrop-blur-md dark:border-white/12 dark:bg-slate-950/45 dark:shadow-[0_22px_60px_-34px_rgba(0,0,0,0.75)] sm:p-4">
                        <div class="space-y-2 sm:space-y-3">
                            @foreach($items as $item)
                                @php
                                    $number = trim((string)($item['number'] ?? $loop->iteration));
                                    $text = trim((string)($item['text'] ?? ''));
                                    $mood = trim((string)($item['mood'] ?? 'happy'));
                                    $color = trim((string)($item['color'] ?? 'blue'));

                                    $style = $rowStyles[$color] ?? $rowStyles['blue'];
                                    $isHappy = $mood === 'happy';
                                @endphp

                                <article class="grid grid-cols-[minmax(0,1fr)_70px] items-stretch gap-2 sm:grid-cols-[minmax(0,1fr)_92px] sm:gap-3">
                                    <div class="grid min-h-[52px] grid-cols-[40px_minmax(0,1fr)] overflow-hidden rounded-md border shadow-sm dark:shadow-none sm:min-h-[58px] sm:grid-cols-[48px_minmax(0,1fr)] {{ $style['box'] }}">
                                        <div class="flex items-center justify-center {{ $style['number'] }}">
                                            <span class="text-xl font-black leading-none text-white sm:text-2xl">
                                                {{ $number }}
                                            </span>
                                        </div>

                                        <div class="flex items-center px-3 py-2 sm:px-5">
                                            <p class="text-sm font-bold leading-[1.35] tracking-[-0.01em] text-slate-800 dark:text-slate-50 sm:text-base lg:text-lg">
                                                {{ $text }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex min-h-[52px] items-center justify-center rounded-md border border-black/10 shadow-sm dark:shadow-none sm:min-h-[58px] {{ $isHappy ? 'bg-[#8bd957] text-slate-950 dark:border-emerald-300/30 dark:bg-emerald-500/25 dark:text-emerald-100' : 'bg-[#ff5d67] text-slate-950 dark:border-rose-300/30 dark:bg-rose-500/25 dark:text-rose-100' }}">
                                        @if($isHappy)
                                            <svg
                                                    viewBox="0 0 64 64"
                                                    class="h-9 w-9 sm:h-11 sm:w-11"
                                                    fill="none"
                                                    aria-hidden="true"
                                            >
                                                <circle cx="32" cy="32" r="24" stroke="currentColor" stroke-width="4"/>
                                                <circle cx="23" cy="25" r="3.5" fill="currentColor"/>
                                                <circle cx="41" cy="25" r="3.5" fill="currentColor"/>
                                                <path d="M21 37C24 45 40 45 43 37" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                                            </svg>
                                        @else
                                            <svg
                                                    viewBox="0 0 64 64"
                                                    class="h-9 w-9 sm:h-11 sm:w-11"
                                                    fill="none"
                                                    aria-hidden="true"
                                            >
                                                <circle cx="32" cy="32" r="24" stroke="currentColor" stroke-width="4"/>
                                                <circle cx="23" cy="26" r="3.5" fill="currentColor"/>
                                                <circle cx="41" cy="26" r="3.5" fill="currentColor"/>
                                                <path d="M22 44C26 37 38 37 42 44" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                                            </svg>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>

                </section>
            </main>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script>
        window.resetSlide = function () {};
    </script>
@endsection
