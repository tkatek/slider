<?php
$content = [
    'page_title' => 'Grammar',
    'title' => 'Grammar',
    'subtitle' => 'We use different forms to talk about the future',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-slate-500 to-indigo-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<style>
                            .future-table {
                                width: 100%;
                                border-collapse: separate;
                                border-spacing: 0;
                                table-layout: fixed;
                            }

                            .future-table th,
                            .future-table td {
                                overflow-wrap: anywhere;
                                word-break: normal;
                            }

                            @media (max-width: 767px) {
                                .future-table,
                                .future-table thead,
                                .future-table tbody,
                                .future-table tr,
                                .future-table td {
                                    display: block;
                                    width: 100%;
                                }

                                .future-table thead {
                                    display: none;
                                }

                                .future-table tr {
                                    margin-bottom: 1rem;
                                    overflow: hidden;
                                    border-radius: 1rem;
                                    border: 1px solid rgba(226, 232, 240, .95);
                                    background: rgba(255, 255, 255, .94);
                                }

                                .dark .future-table tr {
                                    border-color: rgba(51, 65, 85, .9);
                                    background: rgba(15, 23, 42, .86);
                                }

                                .future-table td {
                                    border-bottom: 1px solid rgba(226, 232, 240, .85);
                                    padding: .75rem .9rem;
                                }

                                .dark .future-table td {
                                    border-bottom-color: rgba(51, 65, 85, .85);
                                }

                                .future-table td:last-child {
                                    border-bottom: 0;
                                }

                                .future-table td::before {
                                    content: attr(data-label);
                                    display: block;
                                    margin-bottom: .25rem;
                                    font-size: .68rem;
                                    font-weight: 1000;
                                    letter-spacing: .08em;
                                    text-transform: uppercase;
                                    color: #64748b;
                                }

                                .dark .future-table td::before {
                                    color: #94a3b8;
                                }
                            }
                        </style>

                        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                            <table class="future-table text-left text-xs font-bold text-slate-900 dark:text-slate-100 sm:text-sm">
                                <thead>
                                    <tr class="bg-slate-100 dark:bg-slate-800">
                                        <th class="w-[16%] border-b border-slate-200 px-3 py-3 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">• Form</th>
                                        <th class="w-[20%] border-b border-slate-200 px-3 py-3 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">Structure</th>
                                        <th class="w-[22%] border-b border-slate-200 px-3 py-3 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">Use</th>
                                        <th class="w-[24%] border-b border-slate-200 px-3 py-3 dark:border-slate-700">Example</th>
                                        <th class="w-[18%] border-b border-slate-200 px-3 py-3 text-orange-600 dark:border-slate-700 dark:text-orange-300">Signal Words / Clues</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd:bg-white even:bg-slate-50/70 dark:odd:bg-slate-900 dark:even:bg-slate-800/45">
                                        <td data-label="• Form" class="border-b border-slate-200 px-3 py-4 text-base font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">1. Will</td>
                                        <td data-label="Structure" class="border-b border-slate-200 px-3 py-4 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">will + base verb</td>
                                        <td data-label="Use" class="border-b border-slate-200 px-3 py-4 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Predictions (opinion)<br>- Instant decisions<br>- Promises</td>
                                        <td data-label="Example" class="border-b border-slate-200 px-3 py-4 dark:border-slate-700">I think it will rain. I will help you.</td>
                                        <td data-label="Signal Words / Clues" class="border-b border-slate-200 px-3 py-4 text-orange-600 dark:border-slate-700 dark:text-orange-300">I think, maybe, probably, I guess</td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-slate-50/70 dark:odd:bg-slate-900 dark:even:bg-slate-800/45">
                                        <td data-label="• Form" class="border-b border-slate-200 px-3 py-4 text-base font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">2. Going to</td>
                                        <td data-label="Structure" class="border-b border-slate-200 px-3 py-4 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">am/is/are + going to + base verb</td>
                                        <td data-label="Use" class="border-b border-slate-200 px-3 py-4 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Plans & intentions<br>- Predictions (with evidence)</td>
                                        <td data-label="Example" class="border-b border-slate-200 px-3 py-4 dark:border-slate-700">I’m going to study medicine.<br>Look at the clouds! It’s going to rain.</td>
                                        <td data-label="Signal Words / Clues" class="border-b border-slate-200 px-3 py-4 text-orange-600 dark:border-slate-700 dark:text-orange-300">plan, intend, already decided</td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-slate-50/70 dark:odd:bg-slate-900 dark:even:bg-slate-800/45">
                                        <td data-label="• Form" class="border-b border-slate-200 px-3 py-4 text-base font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">3. Present Continuous</td>
                                        <td data-label="Structure" class="border-b border-slate-200 px-3 py-4 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">am/is/are + verb-ing</td>
                                        <td data-label="Use" class="border-b border-slate-200 px-3 py-4 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Fixed arrangements (near future)</td>
                                        <td data-label="Example" class="border-b border-slate-200 px-3 py-4 dark:border-slate-700">I’m meeting my friend tomorrow.</td>
                                        <td data-label="Signal Words / Clues" class="border-b border-slate-200 px-3 py-4 text-orange-600 dark:border-slate-700 dark:text-orange-300">tomorrow, tonight, at 7, next week</td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-slate-50/70 dark:odd:bg-slate-900 dark:even:bg-slate-800/45">
                                        <td data-label="• Form" class="px-3 py-4 text-base font-black text-indigo-700 dark:text-indigo-300">4. Present Simple</td>
                                        <td data-label="Structure" class="px-3 py-4 text-emerald-600 dark:text-emerald-300">base verb / s-form</td>
                                        <td data-label="Use" class="px-3 py-4 text-indigo-700 dark:text-indigo-300">- Schedules & timetables</td>
                                        <td data-label="Example" class="px-3 py-4">The train leaves at 6 p.m.</td>
                                        <td data-label="Signal Words / Clues" class="px-3 py-4 text-orange-600 dark:text-orange-300">timetable, schedule, fixed time</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])