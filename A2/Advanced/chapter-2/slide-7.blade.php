<?php
$content = [
    'page_title' => "New Language",
    'title'      => 'New Language',
    'subtitle'   => 'Using "to + verb" for Purpose',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-purple-500 to-amber-400',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-4">
                            <div class="rounded-3xl border border-blue-100/80 bg-gradient-to-br from-white via-blue-50/70 to-purple-50/60 px-5 py-5 shadow-sm dark:border-purple-400/20 dark:from-slate-900/90 dark:via-blue-950/25 dark:to-purple-950/20 sm:px-6 sm:py-6">
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="inline-block border-b-4 border-amber-400 pb-1 text-xl font-black leading-tight tracking-[-0.03em] text-slate-900 dark:border-amber-300 dark:text-slate-100 sm:text-2xl lg:text-3xl">
                                            Using
                                            <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-amber-500 bg-clip-text text-transparent dark:from-blue-300 dark:via-purple-300 dark:to-amber-200">
                                                "to + verb"
                                            </span>
                                            for Purpose
                                        </h3>

                                        <p class="mt-5 text-lg font-black leading-[1.3] tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-xl lg:text-2xl">
                                            We use
                                            <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-amber-500 bg-clip-text text-transparent dark:from-blue-300 dark:via-purple-300 dark:to-amber-200">
                                                to + verb
                                            </span>
                                            to explain why:
                                        </p>
                                    </div>

                                    <ul class="space-y-3 text-sm font-black leading-[1.55] text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                        <li class="flex gap-3 rounded-2xl border border-blue-100/80 bg-white/70 px-4 py-3 dark:border-blue-400/15 dark:bg-slate-950/30">
                                            <span class="mt-2.5 h-2.5 w-2.5 shrink-0 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 dark:from-blue-300 dark:to-purple-300"></span>
                                            <span>
                                                Pet Food Taster
                                                <span class="border-b-2 border-purple-500 font-black text-purple-600 dark:border-purple-300 dark:text-purple-300">tastes</span>
                                                pet food
                                                <span class="font-black text-amber-500 dark:text-amber-300">to make sure</span>
                                                it is safe for animals.
                                            </span>
                                        </li>

                                        <li class="flex gap-3 rounded-2xl border border-purple-100/80 bg-white/70 px-4 py-3 dark:border-purple-400/15 dark:bg-slate-950/30">
                                            <span class="mt-2.5 h-2.5 w-2.5 shrink-0 rounded-full bg-gradient-to-br from-purple-500 to-amber-400 dark:from-purple-300 dark:to-amber-300"></span>
                                            <span>
                                                A professional sleeper
                                                <span class="font-black text-purple-600 dark:text-purple-300">tests</span>
                                                beds.
                                                <span class="mx-1 font-black text-blue-500 dark:text-blue-300">→</span>
                                                They
                                                <span class="font-black text-purple-600 dark:text-purple-300">work</span>
                                                <span class="font-black text-amber-500 dark:text-amber-300">to</span>
                                                test beds.
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="rounded-3xl border border-amber-200/80 bg-gradient-to-br from-amber-50/95 via-white to-blue-50/70 px-5 py-4 shadow-sm dark:border-amber-400/20 dark:from-amber-950/15 dark:via-slate-900/90 dark:to-blue-950/20 sm:px-6">
                                <p class="mb-3 text-base font-black leading-tight tracking-[-0.02em] text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                                    Complete the following:
                                </p>

                                <ul class="space-y-3 text-sm font-black leading-[1.5] text-slate-900 dark:text-slate-100 sm:text-base lg:text-lg">
                                    <li class="flex gap-3 rounded-2xl border border-white/80 bg-white/70 px-4 py-3 dark:border-slate-700 dark:bg-slate-950/35">
                                        <span class="mt-2.5 h-2.5 w-2.5 shrink-0 rounded-full bg-gradient-to-br from-blue-500 via-purple-500 to-amber-400 dark:from-blue-300 dark:via-purple-300 dark:to-amber-300"></span>
                                        <span>
                                            professional mourners go to funerals
                                            <span class="font-black text-amber-500 dark:text-amber-300">to</span>
                                            <span class="mx-1 inline-block min-w-[110px] border-b-4 border-dotted border-purple-500 align-middle dark:border-purple-300 sm:min-w-[150px]"></span>
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