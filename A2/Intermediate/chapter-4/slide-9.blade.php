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
            'tone' => 'from-sky-500 to-blue-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                            <table class="w-full table-fixed border-collapse text-center text-[12px] font-bold sm:text-sm">
                                <thead>
                                    <tr class="bg-sky-600 text-white">
                                        <th class="border border-sky-500 px-2 py-2">subject</th>
                                        <th class="border border-sky-500 px-2 py-2">was / were</th>
                                        <th class="border border-sky-500 px-2 py-2">verb + ing</th>
                                    </tr>
                                </thead>
                                <tbody class="text-slate-900 dark:text-slate-100">
                                    <tr class="bg-sky-50/70 dark:bg-slate-800/70">
                                        <td class="border border-slate-200 px-2 py-3 leading-7 dark:border-slate-700">
                                            I<br>He<br>She<br>It
                                        </td>
                                        <td class="border border-slate-200 px-2 py-3 dark:border-slate-700">
                                            <span class="rounded-xl bg-rose-100 px-3 py-1 font-black text-rose-700 ring-1 ring-rose-200 dark:bg-rose-500/15 dark:text-rose-200 dark:ring-rose-400/20">was</span>
                                        </td>
                                        <td rowspan="2" class="border border-slate-200 bg-white px-2 py-3 leading-7 dark:border-slate-700 dark:bg-slate-900">
                                            singing<br>playing<br>reading<br>going<br>writing
                                        </td>
                                    </tr>
                                    <tr class="bg-violet-50/70 dark:bg-slate-800/45">
                                        <td class="border border-slate-200 px-2 py-3 leading-7 dark:border-slate-700">
                                            You<br>We<br>They
                                        </td>
                                        <td class="border border-slate-200 px-2 py-3 dark:border-slate-700">
                                            <span class="rounded-xl bg-rose-100 px-3 py-1 font-black text-rose-700 ring-1 ring-rose-200 dark:bg-rose-500/15 dark:text-rose-200 dark:ring-rose-400/20">were</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-emerald-500 to-teal-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="rounded-2xl border border-emerald-100 bg-emerald-50/80 px-5 py-5 text-xl font-black leading-snug text-slate-950 shadow-sm dark:border-emerald-400/20 dark:bg-emerald-950/30 dark:text-white">
                            We use the <span class="rounded-xl bg-rose-100 px-2 py-0.5 text-rose-700 ring-1 ring-rose-200 dark:bg-rose-500/15 dark:text-rose-200 dark:ring-rose-400/20">past continuous</span> to describe:<br>
                            <span class="mt-3 inline-flex rounded-xl bg-white px-3 py-2 text-emerald-700 ring-1 ring-emerald-100 dark:bg-slate-900/80 dark:text-emerald-200 dark:ring-emerald-400/20">An action in progress in the past</span>
                        </div>',
                    ],
                ],
            ],
        ],
        [
            'type' => 'sections',
            'title' => 'Examples',
            'tone' => 'from-amber-500 to-orange-600',
            'card_class' => 'lg:col-span-2',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-xl border border-amber-100 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-amber-400/20 dark:bg-slate-900 dark:text-white">
                                She <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-700 dark:bg-rose-500/15 dark:text-rose-200">was cleaning</span> the room.
                            </div>
                            <div class="rounded-xl border border-amber-100 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-amber-400/20 dark:bg-slate-900 dark:text-white">
                                I <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-700 dark:bg-rose-500/15 dark:text-rose-200">was stacking</span> the chairs.
                            </div>
                            <div class="rounded-xl border border-amber-100 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-amber-400/20 dark:bg-slate-900 dark:text-white">
                                They <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-700 dark:bg-rose-500/15 dark:text-rose-200">were waiting</span> for the bus.
                            </div>
                            <div class="rounded-xl border border-amber-100 bg-white px-4 py-3 font-bold text-slate-900 shadow-sm dark:border-amber-400/20 dark:bg-slate-900 dark:text-white">
                                We <span class="rounded-lg bg-rose-100 px-1.5 py-0.5 font-black text-rose-700 dark:bg-rose-500/15 dark:text-rose-200">were listening</span> to the music.
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