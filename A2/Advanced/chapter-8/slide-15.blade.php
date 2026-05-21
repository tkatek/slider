<?php
$content = [
    'page_title' => 'Target Language Pattern',
    'title'      => 'Target Language Pattern',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Structure Model',
            'title_plain' => true,
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'items' => [
                        '<div class="grid gap-4 text-base font-bold text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                            <div class="grid gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-4 dark:border-slate-700 dark:bg-slate-900/70 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,0.9fr)] sm:items-center sm:px-5">
                                <div class="font-black text-red-600 dark:text-red-400">
                                    {I have a problem + verb-ing}
                                </div>

                                <div class="hidden text-3xl font-black text-slate-800 dark:text-slate-100 sm:block">
                                    →
                                </div>

                                <div>
                                    The problem
                                </div>
                            </div>

                            <div class="grid gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-4 dark:border-slate-700 dark:bg-slate-900/70 sm:grid-cols-[minmax(0,1fr)_auto_minmax(0,0.9fr)] sm:items-center sm:px-5">
                                <div class="font-black text-red-600 dark:text-red-400">
                                    Imperative verb
                                </div>

                                <div class="hidden text-3xl font-black text-slate-800 dark:text-slate-100 sm:block">
                                    →
                                </div>

                                <div>
                                    The solution
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Examples',
            'title_plain' => true,
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'items' => [
                        '<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-900/70">
                            <div class="grid grid-cols-1 border-b border-slate-200 dark:border-slate-700 sm:grid-cols-2">
                                <div class="border-b border-slate-200 px-4 py-3 text-base font-black text-red-600 dark:border-slate-700 dark:text-red-400 sm:border-b-0 sm:border-r">
                                    • Problem
                                </div>
                                <div class="px-4 py-3 text-base font-black text-red-600 dark:text-red-400">
                                    • Solution
                                </div>
                            </div>

                            <div class="divide-y divide-slate-200 dark:divide-slate-700">
                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-bold text-slate-900 dark:border-slate-700 dark:text-slate-100 sm:border-b-0 sm:border-r sm:text-base">
                                        • I have a problem learning new vocabulary.
                                    </div>
                                    <div class="px-4 py-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        • Write new words in a notebook.
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-bold text-slate-900 dark:border-slate-700 dark:text-slate-100 sm:border-b-0 sm:border-r sm:text-base">
                                        • I have a problem speaking English.
                                    </div>
                                    <div class="px-4 py-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        • Practise speaking every day.
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-bold text-slate-900 dark:border-slate-700 dark:text-slate-100 sm:border-b-0 sm:border-r sm:text-base">
                                        • I have a problem understanding accents.
                                    </div>
                                    <div class="px-4 py-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        • Listen to English videos online.
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-bold text-slate-900 dark:border-slate-700 dark:text-slate-100 sm:border-b-0 sm:border-r sm:text-base">
                                        • I have a problem with grammar.
                                    </div>
                                    <div class="px-4 py-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        • Learn the rules and practise more.
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <div class="border-b border-slate-200 px-4 py-3 text-sm font-bold text-slate-900 dark:border-slate-700 dark:text-slate-100 sm:border-b-0 sm:border-r sm:text-base">
                                        • I have a problem remembering words.
                                    </div>
                                    <div class="px-4 py-3 text-sm font-bold text-slate-900 dark:text-slate-100 sm:text-base">
                                        • Repeat the words aloud.
                                    </div>
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