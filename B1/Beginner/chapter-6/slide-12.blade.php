<?php
$content = [
    'page_title' => '',
    'title'      => 'Grammar',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-indigo-500 to-violet-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-6 py-6 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                            <h3 class="text-2xl sm:text-4xl font-black tracking-[-0.03em] text-slate-950 dark:text-slate-100">
                                Like / Love / Enjoy / Prefer + noun / v-ing
                            </h3>

                            <h4 class="mt-5 text-2xl sm:text-3xl font-black text-red-500 dark:text-red-300">
                                Examples:
                            </h4>

                            <div class="mt-4 space-y-4 text-xl sm:text-3xl font-black leading-[1.35] text-slate-950 dark:text-slate-100">
                                <p>
                                    I enjoy hiki<span class="text-red-500 dark:text-red-300">ng</span>.
                                </p>

                                <p>
                                    I prefer outdoor
                                    <span class="text-blue-700 dark:text-blue-300">activities</span>.
                                </p>

                                <p>
                                    I like read<span class="text-red-500 dark:text-red-300">ing</span>,
                                    but I love camp<span class="text-red-500 dark:text-red-300">ing</span>.
                                </p>
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