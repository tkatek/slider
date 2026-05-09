<?php
$content = [
    'page_title' => 'Language Patterns & Phrases',
    'title'      => 'Language Patterns & Phrases',
    'subtitle'   => '',

    'cards_grid_class' => 'mt-5 grid grid-cols-1 gap-4',

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
                        '<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
                            <div class="overflow-x-auto">
                                <table class="w-full min-w-[820px] border-collapse text-left">
                                    <thead>
                                        <tr class="border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800/80">
                                            <th class="w-1/3 px-4 py-3 text-sm font-black text-purple-700 dark:text-purple-300">Phrase / Pattern</th>
                                            <th class="w-1/3 px-4 py-3 text-sm font-black text-purple-700 dark:text-purple-300">Usage</th>
                                            <th class="w-1/3 px-4 py-3 text-sm font-black text-purple-700 dark:text-purple-300">Example from Script</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-sm sm:text-base font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">Maybe you felt...</td>
                                            <td class="px-4 py-3">Used to suggest or empathize with possible emotions.</td>
                                            <td class="px-4 py-3">Maybe you felt excited. Maybe you felt nervous.</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">Mix of feelings</td>
                                            <td class="px-4 py-3">Describes experiencing several different emotions at once.</td>
                                            <td class="px-4 py-3">That mix of feelings is pretty common...</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">Use your noggin</td>
                                            <td class="px-4 py-3">An informal idiom meaning "use your brain" or "think."</td>
                                            <td class="px-4 py-3">Use your noggin to think about these two questions...</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">Loved ones</td>
                                            <td class="px-4 py-3">Refers to family and close friends you care about.</td>
                                            <td class="px-4 py-3">...to join loved ones, find new opportunities...</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">No matter where...</td>
                                            <td class="px-4 py-3">Emphasizes that the following statement is universally true.</td>
                                            <td class="px-4 py-3">No matter where someone comes from...</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">Starting somewhere new</td>
                                            <td class="px-4 py-3">Describes the act of beginning life in a different place.</td>
                                            <td class="px-4 py-3">Starting somewhere new can feel scary sometimes...</td>
                                        </tr>

                                        <tr class="border-b border-slate-200 dark:border-slate-700">
                                            <td class="px-4 py-3 font-black">At the same time</td>
                                            <td class="px-4 py-3">Used to show that two things are happening simultaneously.</td>
                                            <td class="px-4 py-3">And at the same time, you might feel hopeful...</td>
                                        </tr>

                                        <tr>
                                            <td class="px-4 py-3 font-black">Feel like they belong</td>
                                            <td class="px-4 py-3">To have the sense of being accepted in a community.</td>
                                            <td class="px-4 py-3">What can you do to help them feel like they belong?</td>
                                        </tr>
                                    </tbody>
                                </table>
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
