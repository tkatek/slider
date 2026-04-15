<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Permissions , Obligation, & Prohibitions',
    'cards_grid_class' => 'mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-sky-400 to-blue-500',
            'badge_class' => '',
            'card_class' => 'lg:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="font-medium">We use <span class="font-extrabold text-red-500 dark:text-red-400">can</span> to talk about things that are allowed, and <span class="font-extrabold text-red-500 dark:text-red-400">can&rsquo;t</span> or <span class="font-extrabold text-amber-500 dark:text-amber-400">mustn&rsquo;t</span> to talk about things that <span class="font-extrabold text-lime-500 dark:text-lime-400">are not allowed</span>. We also use <span class="font-extrabold text-sky-500 dark:text-sky-400">Must</span> for things we are obliged to do.</span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-purple-400 to-violet-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block font-medium"><span class="grid grid-cols-[minmax(0,1.15fr)_auto_minmax(0,1fr)] items-center gap-3 text-center"><span class="block space-y-1"><span class="block font-extrabold text-slate-900 dark:text-slate-100">Can</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">can&rsquo;t</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">must</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">mustn&rsquo;t</span></span><span class="block font-extrabold text-slate-700 dark:text-slate-200">+</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">The infinitive verb</span></span><span class="mt-4 block text-center">I <span class="font-extrabold text-red-500 dark:text-red-400">can cross</span> the road now.</span></span>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-cyan-400 to-blue-500',
            'badge_class' => '',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block font-medium"><span class="grid grid-cols-[minmax(0,1.15fr)_auto_minmax(0,1fr)] items-center gap-3 text-center"><span class="block space-y-1"><span class="block font-extrabold text-slate-900 dark:text-slate-100">am</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">is</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">are</span></span><span class="block font-extrabold text-slate-700 dark:text-slate-200">+</span><span class="block space-y-1"><span class="block font-extrabold text-slate-900 dark:text-slate-100">allowed</span><span class="block font-extrabold text-slate-900 dark:text-slate-100">+ to + infinitive</span></span></span><span class="mt-4 block text-center">I <span class="font-extrabold text-slate-900 dark:text-slate-100">am allowed</span> <span class="font-extrabold text-red-500 dark:text-red-400">to cross</span> the road now.</span></span>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@extends("slider.simple-layout")

@section('title', $content['title'] ?? 'Slide')

@section("content")
    <div class="[font-family:'Plus_Jakarta_Sans',sans-serif] min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1180px] items-center px-4 py-8 sm:px-8 sm:py-12 lg:px-10">
            <section class="w-full">
                @include('slider.components.title-subtitle')

                <div class="{{ $content['cards_grid_class'] ?? 'mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2' }}">
                    @foreach(($content['cards'] ?? []) as $index => $card)
                        <article class="{{ $card['card_class'] ?? '' }} group relative overflow-hidden rounded-[28px] border border-slate-200/80 bg-white px-5 py-5 shadow-[0_10px_30px_rgba(15,23,42,0.05)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_18px_45px_rgba(15,23,42,0.1)] sm:px-6 sm:py-6 dark:border-slate-700/80 dark:bg-slate-900 dark:shadow-[0_10px_30px_rgba(0,0,0,0.18)]">
                            <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-slate-200/70 dark:bg-slate-700/70"></div>

                            <div class="relative">
                                @if(!empty($card['title']))
                                    <h3 class="mb-5 text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-2xl">
                                        {!! $card['title'] !!}
                                    </h3>
                                @endif

                                @if(($card['type'] ?? '') === 'sections')
                                    <div class="space-y-4">
                                        @foreach(($card['sections'] ?? []) as $section)
                                            <div class="space-y-4">
                                                @if(!empty($section['heading']))
                                                    <p class="text-xl font-black tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-2xl">
                                                        {!! $section['heading'] !!}
                                                    </p>
                                                @endif

                                                <div class="space-y-3">
                                                    @foreach(($section['items'] ?? []) as $item)
                                                        <div class="rounded-[22px] border border-slate-200/80 bg-slate-50 px-4 py-4 sm:px-5 sm:py-5 dark:border-slate-700/80 dark:bg-slate-800/70">
                                                            <div class="text-sm font-bold leading-[1.75] text-slate-700 dark:text-slate-200 sm:text-base
                                        [&_.grid]:gap-4
                                        [&_.grid]:sm:gap-5
                                        [&_.space-y-1]:space-y-1.5
                                        [&_.text-center]:text-center">
                                                                {!! $item !!}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
@endsection