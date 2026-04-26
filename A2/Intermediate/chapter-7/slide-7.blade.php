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
            'tone' => 'from-blue-500 to-indigo-600',
            'plain_sections' => true,
            'raw_items' => true,
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<div class="overflow-x-auto rounded-xl border border-slate-200 dark:border-slate-700">
                            <table class="w-full min-w-[980px] border-collapse text-left text-sm font-bold">
                                <thead>
                                    <tr class="bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-100">
                                        <th class="border-b border-slate-200 px-4 py-3 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">• Form</th>
                                        <th class="border-b border-slate-200 px-4 py-3 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">Structure</th>
                                        <th class="border-b border-slate-200 px-4 py-3 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">Use</th>
                                        <th class="border-b border-slate-200 px-4 py-3 dark:border-slate-700">Example</th>
                                        <th class="border-b border-slate-200 px-4 py-3 text-orange-600 dark:border-slate-700 dark:text-orange-300">Signal Words / Clues</th>
                                    </tr>
                                </thead>
                                <tbody class="text-slate-900 dark:text-slate-100">
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-5 text-xl font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">1. Will</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">will + base verb</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Predictions (opinion)<br>- Instant decisions<br>- Promises</td>
                                        <td class="border-b border-slate-200 px-4 py-5 dark:border-slate-700">I think it will rain. I will help you.</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-orange-600 dark:border-slate-700 dark:text-orange-300">I think, maybe, probably, I guess</td>
                                    </tr>
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-5 text-xl font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">2. Going to</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">am/is/are + going to + base verb</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Plans & intentions<br>- Predictions (with evidence)</td>
                                        <td class="border-b border-slate-200 px-4 py-5 dark:border-slate-700">I’m going to study medicine.<br>Look at the clouds! It’s going to rain.</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-orange-600 dark:border-slate-700 dark:text-orange-300">plan, intend, already decided</td>
                                    </tr>
                                    <tr>
                                        <td class="border-b border-slate-200 px-4 py-5 text-xl font-black text-indigo-700 dark:border-slate-700 dark:text-indigo-300">3. Present Continuous</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-emerald-600 dark:border-slate-700 dark:text-emerald-300">am/is/are + verb-ing</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-indigo-700 dark:border-slate-700 dark:text-indigo-300">- Fixed arrangements (near future)</td>
                                        <td class="border-b border-slate-200 px-4 py-5 dark:border-slate-700">I’m meeting my friend tomorrow.</td>
                                        <td class="border-b border-slate-200 px-4 py-5 text-orange-600 dark:border-slate-700 dark:text-orange-300">tomorrow, tonight, at 7, next week</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-5 text-xl font-black text-indigo-700 dark:text-indigo-300">4. Present Simple</td>
                                        <td class="px-4 py-5 text-emerald-600 dark:text-emerald-300">base verb / s-form</td>
                                        <td class="px-4 py-5 text-indigo-700 dark:text-indigo-300">- Schedules & timetables</td>
                                        <td class="px-4 py-5">The train leaves at 6 p.m.</td>
                                        <td class="px-4 py-5 text-orange-600 dark:text-orange-300">timetable, schedule, fixed time</td>
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
