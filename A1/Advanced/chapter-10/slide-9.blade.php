<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Present Continuous',
    'title_class' => 'text-3xl sm:text-5xl md:text-6xl',

    'grammar_cards' => [
        [
            'title' => 'Questions',
            'tone' => 'sky',
            'items' => [
                'What <span class="grammar-highlight">is</span> he <span class="grammar-highlight">doing</span>?',
                'What <span class="grammar-highlight">is</span> she <span class="grammar-highlight">doing</span>?',
                'What <span class="grammar-highlight">are</span> they <span class="grammar-highlight">doing</span>?',
            ],
        ],
        [
            'title' => 'Affirmative',
            'tone' => 'emerald',
            'items' => [
                'He is working.',
                'She is shopping.',
                'They are talking.',
            ],
        ],
        [
            'title' => 'Negative',
            'tone' => 'rose',
            'items' => [
                'He is not coming.',
                'She is not sleeping.',
                'They are not working.',
            ],
        ],
        [
            'title' => 'Yes / No Questions',
            'tone' => 'amber',
            'items' => [
                '<span class="grammar-highlight">Are</span> you work<span class="grammar-highlight">ing</span>?',
                '<span class="grammar-highlight">Is</span> she com<span class="grammar-highlight">ing</span>?',
                '<span class="grammar-highlight">Are</span> they help<span class="grammar-highlight">ing</span> you?',
            ],
        ],
        [
            'title' => 'Short Response',
            'tone' => 'indigo',
            'items' => [
                'Yes, I am.',
                'No, I am not.',
                'Yes, he is.',
                'No, he is not.',
                'Yes, they are.',
                'No, they are not.',
            ],
        ],
    ],
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .grammar-card[data-tone="sky"] {
            --grammar-border: rgba(125, 211, 252, 0.62);
            --grammar-bg: rgba(240, 249, 255, 0.72);
            --grammar-heading: #075985;
            --grammar-glow: rgba(14, 165, 233, 0.13);
        }

        .grammar-card[data-tone="emerald"] {
            --grammar-border: rgba(110, 231, 183, 0.62);
            --grammar-bg: rgba(236, 253, 245, 0.72);
            --grammar-heading: #047857;
            --grammar-glow: rgba(16, 185, 129, 0.13);
        }

        .grammar-card[data-tone="rose"] {
            --grammar-border: rgba(253, 164, 175, 0.62);
            --grammar-bg: rgba(255, 241, 242, 0.74);
            --grammar-heading: #be123c;
            --grammar-glow: rgba(244, 63, 94, 0.12);
        }

        .grammar-card[data-tone="amber"] {
            --grammar-border: rgba(252, 211, 77, 0.66);
            --grammar-bg: rgba(255, 251, 235, 0.74);
            --grammar-heading: #b45309;
            --grammar-glow: rgba(245, 158, 11, 0.13);
        }

        .grammar-card[data-tone="indigo"] {
            --grammar-border: rgba(167, 139, 250, 0.78);
            --grammar-bg: rgba(245, 243, 255, 0.78);
            --grammar-heading: #5b21b6;
            --grammar-glow: rgba(124, 58, 237, 0.14);
        }

        .dark .grammar-card {
            --grammar-bg: rgba(15, 23, 42, 0.58);
            --grammar-heading: #f8fafc;
            --grammar-glow: rgba(148, 163, 184, 0.08);
        }

        .grammar-card {
            position: relative;
            overflow: hidden;
            border-color: var(--grammar-border);
            background:
                    radial-gradient(circle at top left, var(--grammar-glow), transparent 46%),
                    var(--grammar-bg);
        }

        .grammar-card h3 {
            color: var(--grammar-heading);
        }

        .grammar-card .grammar-highlight {
            color: #ef4444;
            font-weight: 900;
        }

        .dark .grammar-card .grammar-highlight {
            color: #f87171;
        }
    </style>
@endsection

@section('content')
    <main class="min-h-[100dvh] w-full">
        <div class="mx-auto flex min-h-[100dvh] w-full max-w-7xl flex-col px-4 py-5 sm:px-6 sm:py-6 lg:px-8 lg:py-7">
            @include('slider.components.title-subtitle')

            <section class="flex w-full flex-1 items-center justify-center py-4 sm:py-5 lg:py-6">
                <div class="w-full max-w-6xl rounded-[2rem] border border-white/70 bg-white/68 p-4 shadow-[0_24px_70px_-38px_rgba(15,23,42,0.42)] backdrop-blur-xl dark:border-slate-700/40 dark:bg-slate-950/48 sm:p-5 lg:p-6 xl:p-7">
                    <div class="grid grid-cols-1 gap-3.5 sm:grid-cols-2 sm:gap-4 lg:grid-cols-3 lg:gap-5">
                        @foreach($content['grammar_cards'] as $card)
                            <article
                                    class="grammar-card rounded-[1.45rem] border px-4 py-4 shadow-[0_16px_38px_-30px_rgba(15,23,42,0.55)] transition duration-300 sm:px-5 sm:py-5
                                {{ $card['title'] === 'Yes / No Questions' ? 'lg:col-start-1' : '' }}
                                {{ $card['title'] === 'Short Response' ? 'sm:col-span-2 lg:col-span-1 lg:col-start-2' : '' }}"
                                    data-tone="{{ $card['tone'] ?? 'sky' }}"
                            >
                                <h3 class="mb-3.5 text-lg font-black leading-tight tracking-[-0.025em] sm:text-xl lg:text-[1.35rem]">
                                    {{ $card['title'] }}
                                </h3>

                                <div class="space-y-2.5 text-[0.98rem] font-semibold leading-[1.35] tracking-[-0.01em] text-slate-800 dark:text-slate-100 sm:text-[1.05rem] lg:text-[1.12rem]">
                                    @foreach(($card['items'] ?? []) as $item)
                                        <p class="flex items-start gap-3">
                                            <span class="mt-[0.48em] h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>

                                            <span class="block">
                                                {!! $item !!}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection