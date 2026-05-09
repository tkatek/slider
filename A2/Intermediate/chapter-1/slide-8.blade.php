<?php
$content = [
    'page_title' => 'New Language',
    'title'      => 'New Language',
    'subtitle'   => '',
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'title_plain' => true,
            'tone' => 'from-sky-500 to-blue-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid gap-4">
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70 sm:px-5">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-lg font-black text-sky-700 ring-1 ring-sky-100 dark:bg-sky-500/10 dark:text-sky-200 dark:ring-sky-400/20">1</span>
                                    <p class="text-lg font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-xl lg:text-2xl">
                                        &ldquo;People greet each other
                                        <span class="text-violet-600 dark:text-violet-300">by</span>+
                                        <span class="text-red-500 dark:text-red-300">verb-ing</span>&rdquo;
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70 sm:px-5">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-lg font-black text-violet-700 ring-1 ring-violet-100 dark:bg-violet-500/10 dark:text-violet-200 dark:ring-violet-400/20">2</span>
                                    <p class="text-lg font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-xl lg:text-2xl">
                                        &ldquo;In
                                        <span class="text-red-500 dark:text-red-300">(country name)</span>___,
                                        people usually
                                        <span class="text-red-500 dark:text-red-300">(verb)</span>...&rdquo;
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70 sm:px-5">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-orange-50 text-lg font-black text-orange-700 ring-1 ring-orange-100 dark:bg-orange-500/10 dark:text-orange-200 dark:ring-orange-400/20">3</span>
                                    <p class="text-lg font-black leading-snug text-slate-950 dark:text-slate-50 sm:text-xl lg:text-2xl">
                                        &ldquo;This is a sign of respect.&rdquo;
                                    </p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
