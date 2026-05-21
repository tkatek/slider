<?php
$content = [
    'page_title' => 'Grammar',
    'title'      => 'Grammar',
    'subtitle'   => 'Present Continuous',
    'title_class' => 'text-3xl sm:text-5xl md:text-6xl',

    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '<span class="inline-flex rounded-xl bg-sky-50 px-3 py-1 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300">Questions</span>',
            'title_plain' => true,
            'plain_sections' => true,
            'sections' => [
                [
                    'items' => [
                        'What <span class="hl-red">is</span> he <span class="hl-red">doing</span>?',
                        'What <span class="hl-red">is</span> she <span class="hl-red">doing</span>?',
                        'What <span class="hl-red">are</span> they <span class="hl-red">doing</span>?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="inline-flex rounded-xl bg-emerald-50 px-3 py-1 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">Affirmative</span>',
            'title_plain' => true,
            'plain_sections' => true,
            'sections' => [
                [
                    'items' => [
                        'He is working.',
                        'She is shopping.',
                        'They are talking.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="inline-flex rounded-xl bg-rose-50 px-3 py-1 text-rose-700 dark:bg-rose-500/10 dark:text-rose-300">Negative</span>',
            'title_plain' => true,
            'plain_sections' => true,
            'sections' => [
                [
                    'items' => [
                        'He is not coming.',
                        'She is not sleeping.',
                        'They are not working.',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="inline-flex rounded-xl bg-amber-50 px-3 py-1 text-amber-700 dark:bg-amber-500/10 dark:text-amber-300">Yes / No Questions</span>',
            'title_plain' => true,
            'plain_sections' => true,
            'sections' => [
                [
                    'items' => [
                        '<span class="hl-red">Are</span> you work<span class="hl-red">ing</span>?',
                        '<span class="hl-red">Is</span> she com<span class="hl-red">ing</span>?',
                        '<span class="hl-red">Are</span> they help<span class="hl-red">ing</span> you?',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '<span class="inline-flex rounded-xl bg-indigo-50 px-3 py-1 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-300">Short Response</span>',
            'title_plain' => true,
            'plain_sections' => true,
            'raw_items' => true,
            'card_class' => 'sm:col-span-2 lg:col-span-2',
            'sections' => [
                [
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">Yes, I am.</div>
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">No, I am not.</div>
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">Yes, he is.</div>
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">No, he is not.</div>
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">Yes, they are.</div>
                            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 text-base font-bold leading-[1.45] text-slate-700 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-200">No, they are not.</div>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])