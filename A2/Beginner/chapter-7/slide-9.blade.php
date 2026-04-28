<?php
$content = [
    'page_title' => 'Grammar Focus',
    'title' => 'Grammar Focus',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-3',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '👤 General appearance',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">What does she look like?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s tall, with brown hair.</p>
                            <p class="pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s pretty.</p>
                        </div>',
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">Does he wear glasses?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">No, he wears contacts.</p>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '📏 Height',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">How tall is she?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s 1 meter 78.</p>
                            <p class="pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">She’s 5 foot 10.</p>
                        </div>',
                        '<div class="rounded-2xl border border-slate-200 bg-white px-4 py-3 dark:border-slate-700 dark:bg-slate-900/70">
                            <p class="text-base font-bold leading-[1.55] text-slate-800 dark:text-slate-100">How tall is he?</p>
                            <p class="mt-2 pl-5 text-base font-bold leading-[1.55] text-slate-700 dark:text-slate-200">He’s medium height.</p>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '📐 Saying heights',
            'tone' => 'from-zinc-500 to-stone-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<table class="w-full table-fixed border-collapse overflow-hidden rounded-2xl text-center text-[12px] font-bold sm:text-sm">
                            <thead>
                                <tr class="bg-orange-100 text-orange-950 dark:bg-orange-900/40 dark:text-orange-100">
                                    <th class="w-[28%] border border-orange-200 px-2 py-2 dark:border-orange-800/60"></th>
                                    <th class="border border-orange-200 px-2 py-2 dark:border-orange-800/60">U.S.</th>
                                    <th class="border border-orange-200 px-2 py-2 dark:border-orange-800/60">Metric</th>
                                </tr>
                            </thead>

                            <tbody class="text-slate-900 dark:text-slate-100">
                                <tr>
                                    <td rowspan="3" class="border border-orange-200 px-2 py-3 align-middle text-base font-black text-orange-700 dark:border-orange-800/60 dark:text-orange-300">
                                        Tiffany is
                                    </td>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        five (foot) ten.
                                    </td>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        one meter seventy-eight tall.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        five foot ten inches (tall).
                                    </td>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        1 meter 78.
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        5’10”.
                                    </td>
                                    <td class="border border-orange-100 px-2 py-3 dark:border-orange-900/50">
                                        178 cm.
                                    </td>
                                </tr>
                            </tbody>
                        </table>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])