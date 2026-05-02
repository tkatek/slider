<?php
$content = [
    'page_title' => 'Too / Very',
    'title'      => 'Grammar Focus',
    'subtitle'   => 'Too / Very (Describing Problems)',

    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-5 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => 'Very',
            'tone' => 'from-emerald-500 via-green-500 to-lime-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-5">
                            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-5 py-5 dark:border-emerald-400/20 dark:bg-emerald-950/20">
                                <p class="text-xl sm:text-2xl font-black leading-tight text-slate-900 dark:text-slate-50">
                                    We use <span class="text-emerald-700 dark:text-emerald-300">very</span> and <span class="text-violet-700 dark:text-violet-300">too</span> with adjectives.
                                </p>
                            </div>

                            <div class="rounded-2xl border border-yellow-100 bg-yellow-50/90 px-5 py-5 dark:border-yellow-400/20 dark:bg-yellow-950/20">
                                <div class="flex items-center gap-4">
                                    <span class="text-4xl leading-none">✔</span>
                                    <p class="text-2xl sm:text-3xl font-black leading-tight text-yellow-500 dark:text-yellow-300">
                                        Very = normal degree
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-5 dark:border-slate-700 dark:bg-slate-900/70">
                                <div class="space-y-4 text-xl sm:text-2xl font-black leading-[1.35] text-slate-900 dark:text-slate-100">
                                    <p>The connection is <span class="text-yellow-500 dark:text-yellow-300">very slow</span>.</p>
                                    <p>The message is <span class="text-yellow-500 dark:text-yellow-300">very long</span>.</p>
                                </div>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],

        [
            'type' => 'sections',
            'title' => 'Too',
            'tone' => 'from-violet-500 via-purple-500 to-indigo-500',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-5">
                            <div class="rounded-2xl border border-violet-100 bg-violet-50/90 px-5 py-5 dark:border-violet-400/20 dark:bg-violet-950/20">
                                <div class="flex items-center gap-4">
                                    <span class="text-4xl leading-none">✔</span>
                                    <p class="text-2xl sm:text-3xl font-black leading-tight text-violet-700 dark:text-violet-300">
                                        Too = more than needed <span class="text-lg sm:text-xl">(a problem)</span>
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-5 dark:border-slate-700 dark:bg-slate-900/70">
                                <ul class="space-y-4 text-xl sm:text-2xl font-black leading-[1.35] text-slate-900 dark:text-slate-100">
                                    <li class="flex gap-3">
                                        <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>The connection is <span class="text-red-500 dark:text-red-300">too</span> slow.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>The message is <span class="text-red-500 dark:text-red-300">too</span> long.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>It\'s <span class="text-red-500 dark:text-red-300">too</span> noisy.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-5 py-4 dark:border-emerald-400/20 dark:bg-emerald-950/20">
                                <p class="text-lg sm:text-xl font-black leading-[1.4] text-slate-900 dark:text-slate-100">
                                    👉 Use: describing communication problems
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

@include("slider.other.grammar-info-cards", ["content" => $content])
