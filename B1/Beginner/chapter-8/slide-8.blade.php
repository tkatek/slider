<?php
$content = [
    'page_title' => '',
    'title'      => 'Grammar',
    'subtitle'   => '"If" Second Conditional',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-red-500 via-violet-600 to-blue-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-5">
                            <div class="rounded-3xl border border-slate-200/80 bg-white/90 px-5 py-5 shadow-sm dark:border-slate-700/70 dark:bg-slate-900/80 sm:px-6 lg:px-8">
                                <h3 class="text-xl font-black leading-tight text-slate-950 dark:text-white sm:text-2xl lg:text-3xl">
                                    We use the Second Conditional to talk about:
                                </h3>

                                <ul class="mt-3 space-y-1.5 pl-7 text-lg font-black leading-tight text-slate-950 dark:text-white sm:text-xl lg:text-2xl">
                                    <li class="list-disc">imaginary situations</li>
                                    <li class="list-disc">dreams</li>
                                    <li class="list-disc">unlikely situations</li>
                                </ul>
                            </div>

                            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                                <div class="grid grid-cols-1 divide-y divide-slate-200 dark:divide-slate-700 lg:grid-cols-[1.05fr_1fr] lg:divide-x lg:divide-y-0">
                                    <div class="flex flex-col">
                                        <div class="border-b border-slate-200 px-5 py-4 text-center dark:border-slate-700">
                                            <h3 class="text-xl font-black text-red-500 sm:text-2xl">
                                                Structure
                                            </h3>
                                        </div>

                                        <div class="flex flex-1 items-center px-5 py-6 sm:px-7 lg:min-h-[170px]">
                                            <p class="text-xl font-black leading-snug text-red-500 sm:text-2xl lg:text-3xl">
                                                If + past simple + would + base verb
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="border-b border-slate-200 px-5 py-4 text-center dark:border-slate-700">
                                            <h3 class="text-xl font-black text-red-500 sm:text-2xl">
                                                Example from the Conversations
                                            </h3>
                                        </div>

                                        <div class="divide-y divide-slate-200 dark:divide-slate-700">
                                            <p class="px-5 py-4 text-base font-black leading-snug text-slate-950 dark:text-white sm:text-lg">
                                                If you <span class="text-red-500">were</span> the boss, what <span class="text-violet-600 dark:text-violet-300">would you change?</span>
                                            </p>

                                            <p class="px-5 py-4 text-base font-black leading-snug text-slate-950 dark:text-white sm:text-lg">
                                                If the weather <span class="text-red-500">was</span> nice, I <span class="text-violet-600 dark:text-violet-300">would work</span> at night.
                                            </p>

                                            <p class="px-5 py-4 text-base font-black leading-snug text-slate-950 dark:text-white sm:text-lg">
                                                If I <span class="text-red-500">had</span> a million pounds, <span class="text-violet-600 dark:text-violet-300">I\'d quit</span> my university course
                                            </p>
                                        </div>
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

@include("slider.other.grammar-info-cards", ["content" => $content])