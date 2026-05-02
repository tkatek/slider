<?php
$content = [
    'page_title' => "New Language",
    'title'      => 'New Language',
    'subtitle'   => "You don’t look well!",

    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-5 lg:grid-cols-1',

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
                        '<div class="space-y-4">
                            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-4 dark:border-slate-700 dark:bg-slate-900/70">
                                <h3 class="mb-5 text-xl sm:text-2xl font-black leading-tight text-slate-900 dark:text-slate-100">
                                    You don’t <span class="text-emerald-500 dark:text-emerald-300">look</span> well!
                                </h3>

                                <ul class="space-y-3 text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-lime-600 dark:text-lime-300">feel</span> <span class="text-red-500 dark:text-red-300">terrified</span>.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-pink-500 dark:text-pink-300">am</span> <span class="text-red-500 dark:text-red-300">scared</span>.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-pink-500 dark:text-pink-300">am</span> so <span class="text-red-500 dark:text-red-300">bored</span>.</span>
                                    </li>
                                    <li class="flex gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>I <span class="text-pink-500 dark:text-pink-300">am</span> <span class="text-red-500 dark:text-red-300">surprised</span>.</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-2xl border border-indigo-100 bg-indigo-50/90 px-5 py-4 dark:border-indigo-400/20 dark:bg-indigo-950/20">
                                <p class="text-base sm:text-lg font-black leading-[1.45] text-slate-900 dark:text-slate-100">
                                    👉 Notice the use of <span class="text-orange-500 dark:text-orange-300">adjectives</span>.
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