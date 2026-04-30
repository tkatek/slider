<?php
$content = [
    'title' => 'Practice 4',
    'subtitle' => 'How do you like to eat different kinds of food?',
    'table_title' => 'Fill in with the suitable word with each adjective',

    'image' => materialAsset('slider/A2/Beginner/chapter11/img/slide13.webp'),

    'items' => [
        ['adjective' => 'Fried', 'inputs' => 4],
        ['adjective' => 'Grilled', 'inputs' => 4],
        ['adjective' => 'Steamed', 'inputs' => 4],
    ],
];
?>
@extends('slider.simple-layout')

@section('title', $content['title'])

@section('content')
    <div class="min-h-[100dvh] w-full py-6 sm:py-8 lg:py-10">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6">
            <header class="mb-4 sm:mb-6 text-center">
                @include('slider.components.title-subtitle')
            </header>

            <div class="rounded-[2rem] border border-slate-200/80 bg-white/90 p-4 shadow-xl backdrop-blur-xl dark:border-white/10 dark:bg-slate-800/80 sm:p-6 lg:p-8">

                <div class="mb-4 flex flex-wrap items-center justify-between gap-3 sm:mb-5">
                    <h2 class="text-lg font-black leading-tight text-orange-600 dark:text-orange-300 sm:text-xl lg:text-2xl">
                        {{ $content['table_title'] }}
                    </h2>

                    <button
                            type="button"
                            onclick="resetSlide()"
                            class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-2 text-xs font-bold text-slate-700 shadow-sm transition hover:border-orange-300 hover:bg-orange-50 hover:text-orange-600 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200 dark:hover:border-orange-500/40 dark:hover:bg-orange-500/10 dark:hover:text-orange-300 sm:px-4 sm:py-2.5 sm:text-sm"
                            aria-label="Clear all inputs"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-4.5 sm:w-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"/>
                            <path d="M8 6V4.8c0-.44.36-.8.8-.8h6.4c.44 0 .8.36.8.8V6"/>
                            <path d="M19 6l-1 13.2c-.04.46-.43.8-.9.8H6.9c-.47 0-.86-.34-.9-.8L5 6"/>
                            <path d="M10 10v6"/>
                            <path d="M14 10v6"/>
                        </svg>
                        <span>Clear inputs</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-12 lg:gap-6">

                    {{-- Image Section --}}
                    <div class="lg:col-span-5">
                        <div class="mx-auto aspect-square w-full max-w-[420px] overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-lg dark:border-slate-700/80 dark:bg-slate-800 lg:max-w-none">
                            <img
                                    src="{{ $content['image'] }}"
                                    alt="Different foods"
                                    class="h-full w-full object-cover"
                                    loading="eager"
                            >
                        </div>
                    </div>

                    {{-- Inputs Section --}}
                    <div class="lg:col-span-7">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                            @foreach($content['items'] as $item)
                                <div class="flex flex-col items-center gap-4 rounded-[1.5rem] border border-slate-200/90 bg-white/70 p-4 transition duration-200 hover:-translate-y-0.5 hover:shadow-lg dark:border-slate-700/70 dark:bg-slate-700/40 sm:p-5">
                                    <div class="inline-flex min-w-[130px] items-center justify-center rounded-xl bg-gradient-to-r from-orange-500 to-orange-400 px-4 py-2 text-center text-base font-black text-white shadow-md sm:text-lg">
                                        {{ $item['adjective'] }}
                                    </div>

                                    <div class="flex w-full flex-col gap-3">
                                        @for($i = 0; $i < $item['inputs']; $i++)
                                            <input
                                                    type="text"
                                                    class="w-full rounded-xl border-0 border-b-4 border-slate-200 bg-transparent px-3 py-3 text-center text-sm font-semibold text-slate-900 placeholder:italic placeholder:text-slate-400 focus:border-orange-500 focus:outline-none focus:ring-0 dark:border-slate-600 dark:text-slate-50 dark:placeholder:text-slate-500 sm:text-base"
                                                    placeholder="food item"
                                                    aria-label="Food {{ $i + 1 }} for {{ $item['adjective'] }}"
                                            >
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('input[type="text"]');

            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    if (input.value.trim()) {
                        input.classList.remove('border-slate-200', 'dark:border-slate-600');
                        input.classList.add('border-emerald-500');
                    } else {
                        input.classList.remove('border-emerald-500');
                        input.classList.add('border-slate-200', 'dark:border-slate-600');
                    }
                });
            });

            window.resetSlide = function () {
                inputs.forEach(function (input) {
                    input.value = '';
                    input.classList.remove('border-emerald-500');
                    input.classList.add('border-slate-200', 'dark:border-slate-600');
                });
            };

            window.stopSlideAudio = function () {};
        });
    </script>
@endsection
