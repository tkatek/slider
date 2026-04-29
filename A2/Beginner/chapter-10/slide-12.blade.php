<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => '',
    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-amber-400 via-orange-400 to-orange-500',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'lg:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-orange-200/80 bg-gradient-to-br from-orange-50 via-white to-amber-50 p-5 shadow-sm dark:border-orange-400/25 dark:from-slate-900 dark:via-slate-900 dark:to-orange-950/30">
                            <p class="text-xl sm:text-2xl font-black tracking-[-0.02em] leading-tight text-slate-950 dark:text-slate-50">
                                <span class="text-orange-600 dark:text-orange-300">1.</span> Form:
                            </p>

                            <div class="mt-5 grid grid-cols-1 gap-4 lg:grid-cols-2">
                                <div class="rounded-3xl border border-orange-200 bg-white p-5 dark:border-orange-400/25 dark:bg-slate-950/50">
                                    <p class="text-xl sm:text-2xl font-black leading-tight text-slate-950 dark:text-slate-50">
                                        <span class="text-orange-600 dark:text-orange-300">Should</span>
                                        <span class="text-slate-500 dark:text-slate-300"> + </span>
                                        <span class="text-amber-600 dark:text-amber-300">base verb</span>
                                    </p>

                                    <p class="mt-4 text-base sm:text-lg font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="font-black text-orange-500 dark:text-orange-300">→</span>
                                        You <span class="font-black text-amber-500 dark:text-amber-300">should</span> walk more.
                                    </p>
                                </div>

                                <div class="rounded-3xl border border-orange-200 bg-white p-5 dark:border-orange-400/25 dark:bg-slate-950/50">
                                    <p class="text-xl sm:text-2xl font-black leading-tight text-slate-950 dark:text-slate-50">
                                        <span class="text-rose-500 dark:text-rose-300">Shouldn’t</span>
                                        <span class="text-slate-500 dark:text-slate-300"> + </span>
                                        <span class="text-amber-600 dark:text-amber-300">base verb</span>
                                    </p>

                                    <p class="mt-4 text-base sm:text-lg font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="font-black text-orange-500 dark:text-orange-300">→</span>
                                        You <span class="font-black text-amber-500 dark:text-amber-300">shouldn’t</span> sit for too long.
                                    </p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],

        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-orange-500 via-amber-500 to-yellow-500',
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'lg:col-span-2',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-3xl border border-orange-200/80 bg-white p-5 shadow-sm dark:border-orange-400/25 dark:bg-slate-900/80">
                            <p class="text-xl sm:text-2xl font-black tracking-[-0.02em] leading-tight text-slate-950 dark:text-slate-50">
                                <span class="text-orange-600 dark:text-orange-300">2.</span> Use
                            </p>

                            <p class="mt-4 text-base sm:text-lg font-black leading-[1.45] text-slate-950 dark:text-slate-50">
                                We use <span class="text-orange-600 dark:text-orange-300">should</span> / <span class="text-rose-500 dark:text-rose-300">shouldn’t</span> to:
                            </p>

                            <div class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                <div class="rounded-2xl border border-orange-100 bg-orange-50/70 px-4 py-3 dark:border-orange-400/20 dark:bg-orange-950/20">
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="mr-2 text-orange-500 dark:text-orange-300">●</span>
                                        Give advice
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-orange-100 bg-orange-50/70 px-4 py-3 dark:border-orange-400/20 dark:bg-orange-950/20">
                                    <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <span class="mr-2 text-orange-500 dark:text-orange-300">●</span>
                                        Talk about healthy habits
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