<?php
$content = [
    'page_title' => "New Language",
    'title'      => 'New Language',
    'subtitle'   => 'Using "to + verb" for Purpose',

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
                            <div class="rounded-3xl border border-slate-200 bg-white px-5 py-5 shadow-sm dark:border-slate-700 dark:bg-slate-900/75 sm:px-6 sm:py-6">
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="inline-block border-b-4 border-slate-900 pb-1 text-2xl font-black leading-tight tracking-[-0.03em] text-slate-900 dark:border-slate-100 dark:text-slate-100 sm:text-3xl lg:text-4xl">
                                            Using <span class="text-amber-500 dark:text-amber-300">"to + verb"</span> for Purpose
                                        </h3>

                                        <p class="mt-5 text-xl font-black leading-[1.25] tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-2xl lg:text-3xl">
                                            We use <span class="text-amber-500 dark:text-amber-300">to + verb</span> to explain why:
                                        </p>
                                    </div>

                                    <ul class="space-y-4 text-base font-black leading-[1.55] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                                        <li class="flex gap-3">
                                            <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                            <span>
                                                Pet Food Taster
                                                <span class="border-b-2 border-red-500 text-red-500 dark:border-red-300 dark:text-red-300">tastes</span>
                                                pet food
                                                <span class="text-amber-500 dark:text-amber-300">to make sure</span>
                                                it is safe for animals.
                                            </span>
                                        </li>

                                        <li class="flex gap-3">
                                            <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                            <span>
                                                A professional sleeper
                                                <span class="text-red-500 dark:text-red-300">tests</span>
                                                beds.
                                                <span class="mx-1 text-slate-500 dark:text-slate-400">→</span>
                                                They
                                                <span class="text-red-500 dark:text-red-300">work</span>
                                                <span class="text-amber-500 dark:text-amber-300">to</span>
                                                test beds
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="rounded-3xl border border-amber-200 bg-amber-50/90 px-5 py-4 shadow-sm dark:border-amber-400/20 dark:bg-amber-950/20 sm:px-6">
                                <p class="mb-3 text-lg font-black leading-tight text-slate-900 dark:text-slate-100 sm:text-xl lg:text-2xl">
                                    Complete the following:
                                </p>

                                <ul class="space-y-3 text-base font-black leading-[1.5] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                                    <li class="flex gap-3">
                                        <span class="mt-3 h-2.5 w-2.5 shrink-0 rounded-full bg-slate-900 dark:bg-slate-100"></span>
                                        <span>
                                            professional mourners go to funerals
                                            <span class="text-amber-500 dark:text-amber-300">to</span>
                                            <span class="mx-1 inline-block min-w-[110px] border-b-4 border-dotted border-slate-900 align-middle dark:border-slate-100 sm:min-w-[150px]"></span>
                                            sadness
                                        </span>
                                    </li>
                                </ul>
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