<?php
$content = [
    'page_title' => 'practice.1',
    'title'      => 'Practice 1: Warm-up',
    'subtitle'   => '',

    'instructions' => [
        'Imagine you own these items. Which of them would you lend to a friend? and which ones wouldn’t you lend?',
        'Check ( ✓ ) a response for each item:',
    ],

    'items' => [
        [
            'title' => 'A tablet',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/slide3/tablet.webp'),
        ],
        [
            'title' => 'A credit card',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/slide3/credit-card.webp'),
        ],
        [
            'title' => 'A power drill',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/slide3/power-drill.webp'),
        ],
        [
            'title' => 'A tent',
            'image' => materialAsset('slider/B1/Beginner/chapter-2/img/slide3/tent.webp'),
        ],
    ],

    'responses' => [
        'wouldn’t mind lending',
        'wouldn’t want to lend',
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'] ?? $content['title'] ?? '')

@section('content')
    @php
        $greenGradient = 'bg-gradient-to-br from-emerald-500 to-green-600';
        $softGreenGradient = 'bg-gradient-to-tr from-emerald-400 via-green-500 to-teal-500';
    @endphp

    <main class="relative min-h-[100dvh] w-full overflow-hidden">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center px-4 py-5 sm:px-6 sm:py-6 lg:px-8">
            <section class="w-full">
                <div class="mx-auto w-full max-w-7xl space-y-4 sm:space-y-5">
                    @include('slider.components.title-subtitle')

                    <section class="relative overflow-hidden rounded-[2rem] border border-slate-200/75 bg-white/80 p-4 shadow-[0_22px_55px_-42px_rgba(15,23,42,0.45)] backdrop-blur-xl dark:border-slate-700/60 dark:bg-slate-900/55 sm:p-5 lg:p-6">
                        <div class="absolute -right-16 -top-16 h-44 w-44 rounded-full bg-emerald-400/15 blur-3xl dark:bg-emerald-300/10"></div>
                        <div class="absolute -bottom-20 -left-20 h-52 w-52 rounded-full bg-green-400/15 blur-3xl dark:bg-green-300/10"></div>

                        <div class="relative space-y-4 lg:space-y-5">
                            <div class="rounded-2xl border border-slate-200/80 bg-white/80 p-4 shadow-[0_14px_35px_-32px_rgba(15,23,42,0.5)] dark:border-slate-700/60 dark:bg-slate-950/35 sm:p-5">
                                <div class="grid gap-2">
                                    @foreach($content['instructions'] ?? [] as $instruction)
                                        <p class="flex gap-3 text-base font-bold leading-[1.45] text-slate-800 dark:text-slate-100 sm:text-lg lg:text-xl">
                                            <span class="mt-2.5 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-950 dark:bg-slate-50"></span>
                                            <span>{!! $instruction !!}</span>
                                        </p>
                                    @endforeach
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4 lg:gap-4">
                                @foreach($content['items'] ?? [] as $index => $item)
                                    <article class="rounded-[1.65rem] border border-slate-200/75 bg-white/80 p-3.5 shadow-[0_18px_42px_-34px_rgba(15,23,42,0.45)] backdrop-blur-xl transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_24px_50px_-38px_rgba(15,23,42,0.5)] dark:border-slate-700/55 dark:bg-slate-900/55 sm:p-4">
                                        <h3 class="text-center text-lg font-black leading-tight tracking-[-0.03em] text-slate-950 dark:text-slate-50 sm:text-xl lg:text-[1.35rem]">
                                            {{ $item['title'] ?? '' }}
                                        </h3>

                                        <div class="mx-auto mt-3 aspect-square w-full max-w-[170px] overflow-hidden rounded-[1.4rem] border border-slate-200/80 bg-slate-50/90 p-3 shadow-inner dark:border-slate-700/70 dark:bg-slate-950/45 sm:max-w-[190px] lg:max-w-[180px] xl:max-w-[200px]">
                                            <img
                                                    src="{{ $item['image'] ?? '' }}"
                                                    alt="{{ $item['title'] ?? '' }}"
                                                    class="h-full w-full object-contain"
                                                    loading="lazy"
                                                    draggable="false"
                                            />
                                        </div>

                                        <div class="mt-4 grid gap-2.5">
                                            @foreach($content['responses'] ?? [] as $responseIndex => $response)
                                                <button
                                                        type="button"
                                                        class="choice-btn flex min-h-[54px] items-center justify-between gap-3 rounded-2xl border border-slate-200/80 bg-white/80 px-3 py-2.5 text-left shadow-sm transition duration-200 hover:border-emerald-300 hover:bg-emerald-50/70 dark:border-slate-700/65 dark:bg-slate-950/35 dark:hover:border-emerald-400/60 dark:hover:bg-emerald-500/10"
                                                        data-card="{{ $index }}"
                                                        data-choice="{{ $responseIndex }}"
                                                        aria-pressed="false"
                                                >
                                                    <span class="text-sm font-black leading-tight tracking-[-0.02em] text-slate-800 dark:text-slate-100 sm:text-[0.95rem]">
                                                        {{ $response }}
                                                    </span>

                                                    <span class="choice-box flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border-2 border-slate-300 bg-white text-white transition duration-200 dark:border-slate-600 dark:bg-slate-900">
                                                        <svg class="hidden h-5 w-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            @endforeach
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        (function () {
            function resetButton(button) {
                button.setAttribute('aria-pressed', 'false');
                button.classList.remove('border-emerald-400', 'bg-emerald-50', 'dark:border-emerald-400', 'dark:bg-emerald-500/15');

                const box = button.querySelector('.choice-box');
                const icon = button.querySelector('.choice-box svg');

                if (box) {
                    box.classList.remove('border-emerald-500', 'bg-emerald-500');
                    box.classList.add('border-slate-300', 'bg-white', 'dark:border-slate-600', 'dark:bg-slate-900');
                }

                if (icon) {
                    icon.classList.add('hidden');
                }
            }

            function selectButton(button) {
                button.setAttribute('aria-pressed', 'true');
                button.classList.add('border-emerald-400', 'bg-emerald-50', 'dark:border-emerald-400', 'dark:bg-emerald-500/15');

                const box = button.querySelector('.choice-box');
                const icon = button.querySelector('.choice-box svg');

                if (box) {
                    box.classList.remove('border-slate-300', 'bg-white', 'dark:border-slate-600', 'dark:bg-slate-900');
                    box.classList.add('border-emerald-500', 'bg-emerald-500');
                }

                if (icon) {
                    icon.classList.remove('hidden');
                }
            }

            document.querySelectorAll('.choice-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    const cardIndex = button.getAttribute('data-card');

                    document.querySelectorAll('.choice-btn[data-card="' + cardIndex + '"]').forEach(function (cardButton) {
                        resetButton(cardButton);
                    });

                    selectButton(button);
                });
            });

            window.resetSlide = function () {
                document.querySelectorAll('.choice-btn').forEach(function (button) {
                    resetButton(button);
                });
            };
        })();
    </script>
@endsection