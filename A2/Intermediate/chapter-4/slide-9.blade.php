<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'Past Continuous Tense',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 lg:grid-cols-2',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-slate-500 to-slate-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<table class="w-full table-fixed border-collapse overflow-hidden rounded-2xl text-center text-[12px] font-bold sm:text-sm">
                            <thead>
                                <tr class="bg-slate-200 text-slate-950 dark:bg-slate-700 dark:text-white">
                                    <th class="border border-slate-400 px-2 py-2 dark:border-slate-600">subject</th>
                                    <th class="border border-slate-400 px-2 py-2 dark:border-slate-600">was / were</th>
                                    <th class="border border-slate-400 px-2 py-2 dark:border-slate-600">verb + ing</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-900 dark:text-slate-100">
                                <tr>
                                    <td class="border border-slate-300 px-2 py-3 leading-7 dark:border-slate-700">
                                        I<br>He<br>She<br>It
                                    </td>
                                    <td class="border border-slate-300 px-2 py-3 dark:border-slate-700">
                                        <span class="text-red-600 dark:text-red-300 font-black">was</span>
                                    </td>
                                    <td rowspan="2" class="border border-slate-300 px-2 py-3 leading-7 dark:border-slate-700">
                                        singing<br>playing<br>reading<br>going<br>writing
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 px-2 py-3 leading-7 dark:border-slate-700">
                                        You<br>We<br>They
                                    </td>
                                    <td class="border border-slate-300 px-2 py-3 dark:border-slate-700">
                                        <span class="text-red-600 dark:text-red-300 font-black">were</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-zinc-500 to-zinc-700',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-zinc-200 bg-zinc-50 px-5 py-5 text-xl font-black leading-snug text-slate-950 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white">
                            We use the <span class="text-red-600 dark:text-red-300">past continuous</span> to describe:<br>
                            An action in progress in the past
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Examples',
            'tone' => 'from-stone-500 to-stone-700',
            'card_class' => 'lg:col-span-2',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-xl border border-stone-200 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-stone-700 dark:bg-slate-900 dark:text-white">
                                She <span class="text-red-600 dark:text-red-300 font-black">was cleaning</span> the room.
                            </div>
                            <div class="rounded-xl border border-stone-200 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-stone-700 dark:bg-slate-900 dark:text-white">
                                I <span class="text-red-600 dark:text-red-300 font-black">was stacking</span> the chairs.
                            </div>
                            <div class="rounded-xl border border-stone-200 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-stone-700 dark:bg-slate-900 dark:text-white">
                                They <span class="text-red-600 dark:text-red-300 font-black">were waiting</span> for the bus.
                            </div>
                            <div class="rounded-xl border border-stone-200 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-stone-700 dark:bg-slate-900 dark:text-white">
                                We <span class="text-red-600 dark:text-red-300 font-black">were listening</span> to the music.
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
