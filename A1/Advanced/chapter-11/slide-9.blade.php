<?php
$content = [
    'page_title' => 'Grammar',

    'title' => 'Grammar',
    'subtitle' => 'Degrees of comparison',
    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-red-500 via-orange-500 to-amber-500',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'lg:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-orange-200/80 bg-gradient-to-br from-orange-50 via-white to-amber-50 p-5 sm:p-6 shadow-sm dark:border-orange-400/25 dark:from-slate-900 dark:via-slate-900 dark:to-orange-950/30">
                            <p class="text-xl sm:text-2xl font-black tracking-[-0.02em] leading-tight text-slate-950 dark:text-slate-50">
                                Where’s the adjective in each of these two examples?
                            </p>

                            <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="rounded-3xl border border-red-200/80 bg-white px-5 py-5 shadow-sm dark:border-red-400/25 dark:bg-slate-950/50">
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        Diesel is <span class="text-red-500 dark:text-red-300">the cheapest</span> fuel.
                                    </p>
                                </div>

                                <div class="rounded-3xl border border-red-200/80 bg-white px-5 py-5 shadow-sm dark:border-red-400/25 dark:bg-slate-950/50">
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        Regular fuel is <span class="text-red-500 dark:text-red-300">cheaper</span> than Premium one.
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