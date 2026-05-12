<?php
$content = [
    'page_title' => 'Target language Pattern',
    'title'      => 'Target language Pattern',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-purple-500 to-yellow-400',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 via-purple-50 to-yellow-50 px-5 py-4 shadow-sm dark:border-purple-400/20 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                            <h3 class="bg-gradient-to-r from-blue-600 via-purple-600 to-yellow-500 bg-clip-text text-base sm:text-lg font-black uppercase tracking-wide text-transparent dark:from-blue-300 dark:via-purple-300 dark:to-yellow-200">
                                Structure Model
                            </h3>

                            <div class="mt-4 space-y-3 text-base sm:text-lg lg:text-xl font-bold text-slate-900 dark:text-slate-100">
                                <p class="flex items-start gap-3">
                                    <span class="text-blue-500 dark:text-blue-300">•</span>
                                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-yellow-500 bg-clip-text font-black text-transparent dark:from-blue-300 dark:via-purple-300 dark:to-yellow-200">{I have a problem + verb-ing}</span>
                                </p>

                                <p class="flex items-start gap-3">
                                    <span class="text-purple-500 dark:text-purple-300">•</span>
                                    <span class="font-black text-slate-900 dark:text-slate-100">↓</span>
                                </p>

                                <p class="flex items-start gap-3">
                                    <span class="text-yellow-500 dark:text-yellow-300">•</span>
                                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-yellow-500 bg-clip-text font-black text-transparent dark:from-blue-300 dark:via-purple-300 dark:to-yellow-200">Imperative verb</span>
                                </p>
                            </div>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-purple-500 to-yellow-400',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="space-y-4">
                            <h3 class="bg-gradient-to-r from-blue-600 via-purple-600 to-yellow-500 bg-clip-text text-center text-xl sm:text-2xl lg:text-3xl font-black tracking-tight text-transparent">
                                Examples
                            </h3>

                            <div class="hidden overflow-hidden rounded-2xl border border-blue-100 bg-white shadow-sm dark:border-purple-400/20 dark:bg-slate-900/70 sm:block">
                                <table class="w-full min-w-[720px] border-collapse text-left">
                                    <thead>
                                        <tr class="border-b border-blue-100 bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 dark:border-purple-400/20 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <th class="w-1/2 px-4 py-3 text-sm sm:text-base font-black text-blue-700 dark:text-blue-200">
                                                • Problem
                                            </th>
                                            <th class="w-1/2 px-4 py-3 text-sm sm:text-base font-black text-purple-700 dark:text-purple-200">
                                                • Solution
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-sm sm:text-base lg:text-lg font-bold text-slate-800 dark:text-slate-100">
                                        <tr class="border-b border-blue-100/70 dark:border-slate-700">
                                            <td class="px-4 py-3">• I have a problem learning new vocabulary.</td>
                                            <td class="px-4 py-3">• Write new words in a notebook.</td>
                                        </tr>
                                        <tr class="border-b border-purple-100/70 dark:border-slate-700">
                                            <td class="px-4 py-3">• I have a problem speaking English.</td>
                                            <td class="px-4 py-3">• Practise speaking every day.</td>
                                        </tr>
                                        <tr class="border-b border-yellow-100/80 dark:border-slate-700">
                                            <td class="px-4 py-3">• I have a problem understanding accents.</td>
                                            <td class="px-4 py-3">• Listen to English videos online.</td>
                                        </tr>
                                        <tr class="border-b border-blue-100/70 dark:border-slate-700">
                                            <td class="px-4 py-3">• I have a problem with grammar.</td>
                                            <td class="px-4 py-3">• Learn the rules and practise more.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3">• I have a problem remembering words.</td>
                                            <td class="px-4 py-3">• Repeat the words aloud.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="grid gap-3 sm:hidden">
                                <div class="rounded-2xl border border-blue-100 bg-white p-4 shadow-sm dark:border-purple-400/20 dark:bg-slate-900/70">
                                    <div class="grid grid-cols-2 gap-2 bg-gradient-to-r from-blue-600 via-purple-600 to-yellow-500 bg-clip-text text-xs font-black uppercase tracking-[0.06em] text-transparent">
                                        <span>• Problem</span>
                                        <span>• Solution</span>
                                    </div>

                                    <div class="mt-3 space-y-2 text-sm font-bold text-slate-900 dark:text-slate-100">
                                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 px-3 py-2 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <span>• I have a problem learning new vocabulary.</span>
                                            <span>• Write new words in a notebook.</span>
                                        </div>

                                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 px-3 py-2 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <span>• I have a problem speaking English.</span>
                                            <span>• Practise speaking every day.</span>
                                        </div>

                                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 px-3 py-2 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <span>• I have a problem understanding accents.</span>
                                            <span>• Listen to English videos online.</span>
                                        </div>

                                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 px-3 py-2 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <span>• I have a problem with grammar.</span>
                                            <span>• Learn the rules and practise more.</span>
                                        </div>

                                        <div class="grid grid-cols-2 gap-2 rounded-xl bg-gradient-to-r from-blue-50 via-purple-50 to-yellow-50 px-3 py-2 dark:from-blue-950/30 dark:via-purple-950/25 dark:to-yellow-950/15">
                                            <span>• I have a problem remembering words.</span>
                                            <span>• Repeat the words aloud.</span>
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

@include("slider.other.grammar-info-cards", ['content' => $content])